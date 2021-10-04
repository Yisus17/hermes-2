<?php

namespace App\Http\Controllers;

use App\Company;
use App\Sector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

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
        $companies = Company::paginate(getPagePaginatorsSize());
        return view('companies.list', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sectors = Sector::all();
        return view('companies.create', compact('sectors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::findOrFail($id);
        $sectors = Sector::all();
        return view('companies.edit', compact('company', 'sectors'));
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
        // $companyToDelete = Company::findOrFail($id);
		// $companyToDelete->delete();
		// return redirect('companies')->with('message', 'Emprendimiento eliminado exitosamente');
    }

    public function search(Request $request)
    {
        $querySearch = $request->keyword;
        if (strlen($querySearch) == 0) { // clear search
            $companies =  Company::paginate(30);
        } else {
            $companies = Company::where('name', 'LIKE', '%' . $querySearch . '%')
                ->orWhere('id', 'LIKE', '%' . $querySearch . '%')
                ->orWhereHas('sector', function ($query) use ($querySearch) {
                    $query->where('name', 'LIKE', '%' . $querySearch . '%');
                })
                ->paginate(30);
            $companies->appends(array('keyword' => $querySearch));
        }

        if ($request->ajax()) {
            return view('companies.partials.results', compact('companies'));
        } else {
            return view('companies.list', compact('companies', 'querySearch'));
        }
    }

    public function storeOrUpdate(Request $request, $id = null)
    {

        if ($id == null) {
            $company = new Company($request->all());
        } else {
            $company = Company::findOrFail($id);
            $company->update($request->all());
        }

        $company->save();
        $message = $id == null ? 'Emprendimiento creado exitosamente' : 'Emprendimiento editado exitosamente';

        return redirect('companies')->with('message', $message);
    }
}
