<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Services\FiscalYearService;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('partials.menu', function ($view) {
            $fiscalYearService = app(FiscalYearService::class);
            $fiscalYears = $fiscalYearService->getAll();

            $view->with('fiscalYears', $fiscalYears);
        });
    }
}
