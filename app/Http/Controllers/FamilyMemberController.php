<?php

namespace App\Http\Controllers;

use App\Services\FamilyMemberService;

class FamilyMemberController
{
    protected FamilyMemberService $familyMemberService;

    public function __construct(FamilyMemberService $familyMemberService)
    {
        $this->familyMemberService = $familyMemberService;
    }

    public function index()
    {
        $family_members = $this->familyMemberService->getAllFamilyMembers();

        return view('panel.family_members.index', compact('family_members'));
    }
}
