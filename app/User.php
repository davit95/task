<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Role;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts() {
        return $this->hasMany('App\Models\Post');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function role() {
        return $this->hasOne('App\Models\Role', 'id', 'role_id');
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @return boolean
     */
    public function isAdmin() {
        $role = $this->role;
        return $role->id == Role::ADMIN;
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @return boolean
     */
    public function isClient() {
        $role = $this->role;
        return $role->id == Role::CLIENT;
    }
}
