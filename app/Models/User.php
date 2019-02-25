<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'password', 'username', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    // public function lessons()
    // {
    //     return $this->hasMany(Lesson::class);
    // }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function hasRole($role)
    {
        if ($this->role()->where('name', $role)->first()) {
                return true;
            }        
        return false;
    }

    public function generates()
    {
        return $this->hasMany(Generate::class);
    }

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class);
    }

    public function approvals()
    {
        return $this->hasMany(Approval::class);
    }

}
 











































    // public function authorizeRoles($roles)
    // {
    //     if ($this->hasAnyRole($roles)) {
    //         return true;
    //     }
    //     abort(401, 'Error');
    // }

    // public function hasAnyRole($roles)
    // {
    //     if (is_array($roles)) {
    //         foreach ($roles as $role) {
    //             if ($this->hasRole($role)) {
    //                 return true;
    //             }
    //         }
    //     } else {
    //         if ($this->hasRole($role)) {
    //             return true;
    //         }
    //     }
    //     return false;
    // }
