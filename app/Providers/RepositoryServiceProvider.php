<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(){
        $this->app->bind(
            \App\Repositories\OauthClientRepository::class, 
            \App\Repositories\OauthClientRepositoryEloquent::class
        );
        $this->app->bind(
            \App\Repositories\BranchRepository::class, 
            \App\Repositories\BranchRepositoryEloquent::class
        );
        $this->app->bind(
            \App\Repositories\CategoryRepository::class, 
            \App\Repositories\CategoryRepositoryEloquent::class
        );
        $this->app->bind(
            \App\Repositories\ClientRepository::class, 
            \App\Repositories\ClientRepositoryEloquent::class
        );
        $this->app->bind(
            \App\Repositories\CouponRepository::class, 
            \App\Repositories\CouponRepositoryEloquent::class
        );
        $this->app->bind(
            \App\Repositories\CompanyRepository::class, 
            \App\Repositories\CompanyRepositoryEloquent::class
        );
        $this->app->bind(
            \App\Repositories\EmployeeRepository::class, 
            \App\Repositories\EmployeeRepositoryEloquent::class
        );
        $this->app->bind(
            \App\Repositories\MenuRepository::class, 
            \App\Repositories\MenuRepositoryEloquent::class
        );
        $this->app->bind(
            \App\Repositories\MenuTimeRepository::class, 
            \App\Repositories\MenuTimeRepositoryEloquent::class
        );
        $this->app->bind(
            \App\Repositories\OrderRepository::class, 
            \App\Repositories\OrderRepositoryEloquent::class
        );
        $this->app->bind(
            \App\Repositories\OrderItemRepository::class, 
            \App\Repositories\OrderItemRepositoryEloquent::class
        );
        $this->app->bind(
            \App\Repositories\ProductRepository::class, 
            \App\Repositories\ProductRepositoryEloquent::class
        );
        $this->app->bind(
            \App\Repositories\UserRepository::class, 
            \App\Repositories\UserRepositoryEloquent::class
        );

    }
}
