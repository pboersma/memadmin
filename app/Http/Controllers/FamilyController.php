<?php

namespace App\Http\Controllers;

use App\Services\FamilyService;

class FamilyController
{
    protected FamilyService $familyService;

    public function __construct(FamilyService $familyService)
    {
        $this->familyService = $familyService;
    }

    public function index()
    {
        $families = $this->familyService->getAllFamilies();

        return view('panel.families.index', compact('families'));
    }
}
