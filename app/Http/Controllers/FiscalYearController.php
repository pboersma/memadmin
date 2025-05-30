<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\FamilyService;
use App\Services\FiscalYearService;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

class FiscalYearController
{
    protected FiscalYearService $fiscalYearService;

    public function __construct(FiscalYearService $fiscalYearService)
    {
        $this->fiscalYearService = $fiscalYearService;
    }

    public function set(Request $request): RedirectResponse
    {
        $year = (int) $request->input('fiscal_year');

        if (!$this->fiscalYearService->existsByYear($year)) {
            return redirect()->back()->withErrors(['year' => 'Invalid Fiscal Year.']);
        }

        session(['fiscal_year' => $year]);

        return redirect()->back()->with('success', 'Fiscal year set successfully.');
    }
}
