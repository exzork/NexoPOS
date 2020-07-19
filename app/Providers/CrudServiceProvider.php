<?php

namespace App\Providers;

use App\Crud\CustomerCrud;
use App\Crud\CustomerGroupCrud;
use App\Crud\OrderCrud;
use Illuminate\Support\ServiceProvider;
use Hook;

class CrudServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Hook::addFilter( 'ns.crud-resource', function( $namespace ) {
            switch( $namespace ) {
                case 'ns.orders': return OrderCrud::class;
                case 'ns.customers': return CustomerCrud::class;
                case 'ns.customers-groups': return CustomerGroupCrud::class;
            }
            return $namespace;
        });

    }
}