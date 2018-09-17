<?php
/**
 * Created by PhpStorm.
 * User: PC01
 * Date: 9/17/2018
 * Time: 8:28 PM
 */

namespace App\Services\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Models\User;
use App\Services\Repositories\Interfaces\UserInterface;
use App\Services\Repositories\Eloquent\DbUsersRepository;

class UsersServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(UserInterface::class, function () {
            return new DbUsersRepository(new User());
        });
    }
}