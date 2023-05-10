<?php

namespace App\Providers;

use App\Models\Notification;
use App\View\Components\AdminLayout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        
        View::composer('layouts.admin', function( $view )
        {
            $notifications = Notification::where('lu',0)->where('user_id',Auth::user()->id)->orderBy('created_at', 'DESC')->get();
            $view->with( 'notifications', $notifications );
        } );
    }
}
