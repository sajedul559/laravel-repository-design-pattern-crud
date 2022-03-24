<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\Student\StudentInterface;
use App\Repository\Student\StudentRepository;
use App\Repository\User\UserInterface;
use App\Repository\User\UserRepository;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(StudentInterface::class,StudentRepository::class);
        $this->app->bind(UserInterface::class,UserRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
