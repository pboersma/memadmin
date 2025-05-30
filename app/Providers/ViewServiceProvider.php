<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use App\Services\FiscalYearService;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

        if (!Session::has('fiscal_year')) {
            Session::put('fiscal_year', now()->year);
        }

        View::composer('partials.menu', function ($view) {
            $fiscalYearService = app(FiscalYearService::class);
            $fiscalYears = $fiscalYearService->getAll();

            $view->with('fiscalYears', $fiscalYears);
        });
    }
}
