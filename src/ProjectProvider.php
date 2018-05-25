<?php

namespace Project\Blog;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Event;

/**
*
*/
class ProjectProvider extends RouteServiceProvider
{
    public function boot(){
        parent::boot();
        if (!is_link($link = public_path('assets/blog'))) symlink(realpath(__dir__ . '/../dist'), $link);
        if (!is_link($link = base_path('resources/views/blog'))) symlink(realpath(__dir__ . '/../views'), $link);
        $this->publishes([ realpath(__DIR__.'/../migrations') => $this->app->databasePath().'/migrations' ], 'migrations');
    }
    public function register(){
        $this->commands([
            Commands\TestCommand::class,
        ]);
    }
    public function map(){
        Route::middleware(['web'])
          ->namespace('Project\Blog\Controllers')
          ->group(realpath(__dir__ . '/../routes/web.php'));
    }
}
