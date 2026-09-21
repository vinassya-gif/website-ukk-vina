<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Jurusan;
use App\Models\Ekstrakurikuler;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('layouts.app', function ($view) {
            $view->with('navJurusans', Jurusan::all());
            $view->with('navEkskul', Ekstrakurikuler::all());
        });
    }
}