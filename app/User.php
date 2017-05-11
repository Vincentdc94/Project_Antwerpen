<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    protected $table = 'users';
    
    use Notifiable;

    protected $guarded = 'role_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName', 'lastName', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function gameInfo()
    {
        return $this->hasOne('App\gameInfo');
    }

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function isAdmin()
    {
        if ($this->role_id === 4)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function hasRole($givenRole)
    {
        $role = $this->role->name;



        if($givenRole == $role)
        {
            //dd("user is " . $role . " and given role is " . $givenRole);

            return true;
        }
        else
        {
            return false;
        }
    }
}
