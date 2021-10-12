<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Config;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'last_name', 'email', 'password', 'role_id', 'company_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function company()
    { //$user-company
        return $this->belongsTo(Company::class);
    }

    public function isAdmin()
    {
        return $this->role_id == Config::get('constants.roles_id.admin');
    }

    public function isModerator()
    {
        return $this->role_id == Config::get('constants.roles_id.moderator');
    }

    public function isSimple()
    {
        return $this->role_id == Config::get('constants.roles_id.simple');
    }
}
