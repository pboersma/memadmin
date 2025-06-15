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

    /**
     * Sets the fiscal year in the session if it exists in the database.
     *
     * @param Request $request
     *
     * @return RedirectResponse
     */
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
