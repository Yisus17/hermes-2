<?php

namespace App\Http\Controllers;

use App\Company;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $PAGE_SIZE = 30;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentCompanyId = auth::user()->company->id;
        $currentUser = auth::user();
        $users = null;
        switch ($currentUser->role_id) {
            case (Config::get('constants.roles_id.admin')):
                $users = User::paginate($this->PAGE_SIZE);
                break;
            case (Config::get('constants.roles_id.moderator')):
                $users = User::where('company_id', $currentCompanyId)
                    ->where('role_id', '<>', Config::get('constants.roles_id.admin'))
                    ->paginate($this->PAGE_SIZE);

                break;
            case (Config::get('constants.roles_id.simple_user')):
                return redirect('home-simple-user');
        }

        return view('users.list', compact('users', 'currentUser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $companies = Company::all();
        $isCreatingForm = true;
        return view('users.create', compact('roles', 'companies', 'isCreatingForm'));
    }

    public function store(Request $request)
    {
        return $this->storeOrUpdate($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        $companies = Company::all();
        $isCreatingForm = false;

        return view('users.edit', compact('user', 'roles', 'companies', 'isCreatingForm'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $this->storeOrUpdate($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userToDelete = User::findOrFail($id);
        $userToDelete->delete();
        return redirect('users')->with('message', 'Usuario eliminado exitosamente');
    }

    public function search(Request $request)
    {
        $companyId = auth::user()->company->id;
        $querySearch = $request->keyword;
        // Clean search
        if (strlen($querySearch) == 0) { 
            $users = null;
            switch (auth::user()->role_id) {
                case (Config::get('constants.roles_id.admin')):
                    $users = User::paginate($this->PAGE_SIZE);
                    break;
                case (Config::get('constants.roles_id.moderator')):
                    $users = User::where('company_id', $companyId)
                        ->where('role_id', '<>', Config::get('constants.roles_id.admin'))
                        ->paginate($this->PAGE_SIZE);
                    break;
            }
        } else {
            $users = User::where('name', 'LIKE', '%' . $querySearch . '%')
                ->orWhere('email', 'LIKE', '%' . $querySearch . '%')
                ->orWhere('id', 'LIKE', '%' . $querySearch . '%')
                ->orWhereHas('company', function ($query) use ($querySearch, $companyId) {
                    $query->where('name', 'LIKE', '%' . $querySearch . '%')->where('id', $companyId);
                })
                ->paginate($this->PAGE_SIZE);
            $users->appends(array('keyword' => $querySearch));
        }

        if ($request->ajax()) {
            return view('users.partials.results', compact('users'));
        } else {
            return view('users.list', compact('users', 'querySearch'));
        }
    }

    public function storeOrUpdate(Request $request, $id = null)
    {
        //Create
        if ($id == null) {
            $user = new User($request->all());
            $user->password = Hash::make($user->password);

            if (!$request->has('company_id')) {
                //setting the company from the creator of this user
                $user->company_id = auth::user()->company->id;
            }
        } else {
            //Edit
            $user = User::findOrFail($id);
            $user->update($request->all());
            if ($request->has('password')) {
                $user->password = Hash::make($user->password);
            }
        }

        $user->save();
        $message = $id == null ? 'Contacto creado exitosamente' : 'Contacto editado exitosamente';

        return redirect('users')->with('message', $message);
    }
}
