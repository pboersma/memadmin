<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Services\FiscalYearService;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * This method registers a view composer for the 'partials.menu' view.
     * It injects the available fiscal years into the view.
     *
     * @return void
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
