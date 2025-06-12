<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Services\FiscalYearService;

class EnsureFiscalYearSession
{
    public function handle(Request $request, Closure $next)
    {
        if (!Session::has('fiscal_year')) {
            $fiscalYearService = app(FiscalYearService::class);
            $fiscalYears = $fiscalYearService->getAll();
            $currentYear = now()->year;
            $currentFiscalYear = collect($fiscalYears)->firstWhere('year', (string) $currentYear);

            if ($currentFiscalYear) {
                Session::put('fiscal_year', (object) $currentFiscalYear);
            }
        }

        return $next($request);
    }
}
