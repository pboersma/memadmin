<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use App\Services\ContributionService;
use App\Services\FamilyMemberService;
use App\Services\FamilyService;
use App\Services\MemberTypeService;
use App\Http\Requests\FamilyMemberStoreRequest;
use App\Http\Requests\FamilyMemberUpdateRequest;
use Carbon\Carbon;

class FamilyMemberController extends Controller
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
        parent::__construct(
            $familyMemberService,
            [
                'plural' => 'family_members',
                'singular' => 'family_member'
            ],
            [
                'storeRequest' => FamilyMemberStoreRequest::class,
                'updateRequest' => FamilyMemberUpdateRequest::class,
            ]
        );

        $this->familyMemberService = $familyMemberService;
        $this->familyService = $familyService;
        $this->memberTypeService = $memberTypeService;
        $this->contributionService = $contributionService;
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

    /**
     * @inheritDoc
     */
    public function show(int $id): View
    {
        $family_member = $this->familyMemberService->getWithMemberType($id);

        $referenceDate = Carbon::create(session('fiscal_year')->year, 1, 1);
        $birthdate = Carbon::parse($family_member->birthdate);
        $age = (int) $birthdate->diffInYears($referenceDate);

        $contribution = $this->contributionService->getContributionByAgeWithDiscount($age);

        return view(
            'panel.family_members.show',
            compact(
                'family_member',
                'contribution'
            )
        );
    }
}
