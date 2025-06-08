<?php

namespace App\Http\Controllers;

use App\Services\ContributionService;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use App\Interfaces\ControllerInterface;
use App\Services\FamilyMemberService;
use App\Services\FamilyService;
use App\Services\MemberTypeService;
use Carbon\Carbon;

class FamilyMemberController implements ControllerInterface
{
    protected FamilyMemberService $familyMemberService;

    protected FamilyService $familyService;

    protected MemberTypeService $memberTypeService;

    protected ContributionService $contributionService;

    public function __construct(
        FamilyMemberService $familyMemberService,
        FamilyService $familyService,
        MemberTypeService $memberTypeService,
        ContributionService $contributionService,
    ) {
        $this->familyMemberService = $familyMemberService;
        $this->familyService = $familyService;
        $this->memberTypeService = $memberTypeService;
        $this->contributionService = $contributionService;
    }

    /**
     * @inheritDoc
     */
    public function index(): View
    {
        $family_members = $this->familyMemberService->getAll();

        return view('panel.family_members.index', compact('family_members'));
    }

    /**
     * @inheritDoc
     */
    public function create(): View
    {
        $families = $this->familyService->getAll();
        $member_types = $this->memberTypeService->getAll();

        return view('panel.family_members.create', compact('families'), compact('member_types'));
    }

    public function store(Request $request): RedirectResponse
    {
        $this->familyMemberService->create($request->all());

        return redirect()->route('family_members.index');
    }

    /**
     * @inheritDoc
     */
    public function edit($id): View
    {
        $family_member = $this->familyMemberService->getById($id);

        return view('panel.family_members.edit', compact('family_member'));
    }

    /**
     * @inheritDoc
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $this->familyMemberService->update($id, $request->all());

        return redirect()->route('family_members.index');
    }

    /**
     * @inheritDoc
     */
    public function show(int $id): View
    {
        $family_member = $this->familyMemberService->getWithMemberType($id);

        $fiscalYear = session('fiscal_year')->year;
        $referenceDate = Carbon::create($fiscalYear, 1, 1);

        $age = Carbon::parse($family_member->birthdate)->diffInYears($referenceDate);

        $contribution = $this->contributionService->getContributionByAgeWithDiscount($age);

        return view(
            'panel.family_members.show',
            compact(
                'family_member',
                'contribution'
            )
        );
    }

    /**
     * @inheritDoc
     */
    public function destroy(int $id): RedirectResponse
    {
        $this->familyMemberService->delete($id);

        return redirect()->route('family_members.index');
    }
}
