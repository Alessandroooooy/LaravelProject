<?php


namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use TCG\Voyager\Contracts\User as VoyagerUser;
use TCG\Voyager\Models\Role;
use TCG\Voyager\Traits\VoyagerUser as VoyagerUserTrait;

class User extends \TCG\Voyager\Models\User implements VoyagerUser
{
    use Notifiable, VoyagerUserTrait;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

// Определение отношения с заказами пользователя
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

// Определение отношения с ролями пользователя
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles', 'user_id', 'role_id');
    }

// Метод для назначения роли пользователю
    public function assignRole($role)
    {
        return $this->roles()->sync($role, false);
    }

}
