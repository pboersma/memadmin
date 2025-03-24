<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use App\Interfaces\ControllerInterface;
use App\Services\FamilyMemberService;
use App\Services\FamilyService;

class FamilyMemberController implements ControllerInterface
{
    protected FamilyMemberService $familyMemberService;
    protected FamilyService $familyService;

    public function __construct(FamilyMemberService $familyMemberService, FamilyService $familyService)
    {
        $this->familyMemberService = $familyMemberService;
        $this->familyService = $familyService;
    }

    /**
     * @inheritDoc
     */
    public function index(): View
    {
        $family_members = $this->familyMemberService->getAll();

        return view('panel.family_members.index', compact('family_members'));
    }

    public function create(): View
    {
        $families = $this->familyService->getAll();

        return view('panel.family_members.create', compact('families'));
    }

    public function store(Request $request): RedirectResponse
    {
        $this->familyMemberService->create($request->all());

        return redirect()->route('family_members.index');
    }
}
