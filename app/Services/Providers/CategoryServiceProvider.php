<?php
/**
 * Created by PhpStorm.
 * User: PC01
 * Date: 9/18/2018
 * Time: 2:03 PM
 */

namespace App\Services\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Models\Category;
use App\Services\Repositories\Eloquent\DbCategoryRepository;
use App\Services\Repositories\Interfaces\CategoryInterface;

class CategoryServiceProvider extends ServiceProvider
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
        $this->app->singleton(CategoryInterface::class, function () {
            return new DbCategoryRepository(new Category());
        });
    }
}