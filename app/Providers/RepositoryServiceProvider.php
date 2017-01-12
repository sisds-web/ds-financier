<?php

namespace DSFinancier\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
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
        $this->app->bind(\DSFinancier\Repositories\BankRepository::class, \DSFinancier\Repositories\BankRepositoryEloquent::class);
        $this->app->bind(\DSFinancier\Repositories\BankAccountRepository::class, \DSFinancier\Repositories\BankAccountRepositoryEloquent::class);
        //:end-bindings:
    }
}
