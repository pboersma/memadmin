<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Services\FiscalYearService;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ValidateFiscalYear
{
    protected FiscalYearService $fiscalYearService;

    public function __construct(FiscalYearService $fiscalYearService)
    {
        $this->fiscalYearService = $fiscalYearService;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $year = $request->route('year');

        if (!$year || !$this->fiscalYearService->existsByYear($year)) {
            throw new NotFoundHttpException("Boekjaar $year bestaat niet.");
        }

        return $next($request);
    }
}
