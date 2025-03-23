<?php

namespace App\Http\Controllers;

use App\Services\FamilyService;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use App\Services\FamilyMemberService;

class FamilyMemberController implements ControllerInterface
{
    protected FamilyMemberService $familyMemberService;
    protected FamilyService $familyService;

    public function __construct(FamilyMemberService $familyMemberService, FamilyService $familyService)
    {
        $this->familyMemberService = $familyMemberService;
        $this->familyService = $familyService;
    }

    public function index(): View
    {
        $family_members = $this->familyMemberService->getAllFamilyMembers();

        return view('panel.family_members.index', compact('family_members'));
    }

    public function create(): View
    {
        $families = $this->familyService->getAllFamilies();

        return view('panel.family_members.create', compact('families'));
    }

    public function store(Request $request): RedirectResponse
    {
        $this->familyMemberService->createFamilyMember($request->all());

        return redirect()->route('family_members.index');
    }
}
