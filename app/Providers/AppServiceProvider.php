<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use App\jurusan;
use App\ppdbjurusan;
use DB;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

          view()->composer('layout.bsidebar', function($view)
        {
            $jurusan= ppdbjurusan::all();
            $view->with('jurusan',$jurusan );
        } );


        view()->composer('layout.bsidebar', function($view)
        {
            $jurusan= jurusan::all();
            $view->with('coba',$jurusan );
        } );

         view()->composer('layout.header', function($view)
        {
            $jurusan= jurusan::all();
            $view->with('coba',$jurusan );
        } );

    }
}
