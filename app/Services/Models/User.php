<?php
/**
 * Created by PhpStorm.
 * User: PC01
 * Date: 9/17/2018
 * Time: 4:58 PM
 */

namespace App\Services\Models;

use Cartalyst\Sentinel\Users\EloquentUser as EloquentUser;

class User extends EloquentUser
{
    protected $table = 'users';

    protected $fillable = [
        'email',
        'username',
        'password',
        'full_name',
        'permissions',
    ];
    protected $loginNames = ['username'];
}