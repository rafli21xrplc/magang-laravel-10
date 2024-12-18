<?php

namespace App\Providers;

use App\Contracts\Interfaces\EmployeeInterface;
use App\Contracts\Repositories\EmployeeRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    private array $register = [
        EmployeeInterface::class => EmployeeRepository::class
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        foreach ($this->register as $index => $value) $this->app->bind($index, $value);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
