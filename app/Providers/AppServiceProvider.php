<?php

namespace App\Providers;

use App\Models\Content\Comment;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('admin.layouts.header', function($view){
            $view->with('unseenComments', Comment::where('seen', 0)->get());
        });
    }
}
