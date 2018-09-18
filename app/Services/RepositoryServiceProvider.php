<?php
/**
 * Created by PhpStorm.
 * User: PC01
 * Date: 9/17/2018
 * Time: 7:33 PM
 */

namespace App\Services;

use App\Services\Providers\HelperServiceProvider;
use Illuminate\Support\ServiceProvider;
use App\Services\Providers\UsersServiceProvider;
use App\Services\Providers\CategoryServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->register(HelperServiceProvider::class);
        $this->app->register(UsersServiceProvider::class);
        $this->app->register(CategoryServiceProvider::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}