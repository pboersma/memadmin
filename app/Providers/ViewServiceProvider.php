<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use App\Services\FiscalYearService;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * This method registers a view composer for the 'partials.menu' view.
     * It injects the available fiscal years into the view and ensures
     * that the current fiscal year is stored in the session if not already set.
     *
     * @return void
     */
    public function boot(): void
    {
        View::composer('partials.menu', function ($view) {
            $fiscalYearService = app(FiscalYearService::class);
            $fiscalYears = $fiscalYearService->getAll();

            if (!Session::has('fiscal_year')) {
                $currentYear = now()->year;
                $currentFiscalYear = collect($fiscalYears)->firstWhere('year', (string) $currentYear);

                if ($currentFiscalYear) {
                    Session::put('fiscal_year', (object) $currentFiscalYear);
                }
            }

            $view->with('fiscalYears', $fiscalYears);
        });
    }
}
