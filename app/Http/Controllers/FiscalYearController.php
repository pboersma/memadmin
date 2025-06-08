<?php

namespace App\Http\Controllers;

use App\Services\FiscalYearService;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

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

        $set_year = $this->fiscalYearService->getByYear($year);

        if (!$set_year) {
            return redirect()->back()->withErrors(['year' => 'Invalid Fiscal Year.']);
        }

        session(['fiscal_year' => $set_year]);

        return redirect()->back()->with('success', 'Fiscal year set successfully.');
    }
}
