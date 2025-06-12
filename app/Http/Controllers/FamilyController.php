<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Requests\FamilyStoreRequest;
use App\Http\Requests\FamilyUpdateRequest;
use App\Services\ContributionService;
use App\Services\FamilyService;

class FamilyController extends Controller
{
    protected FamilyService $familyService;

    protected ContributionService $contributionService;

    public function __construct(FamilyService $familyService, ContributionService $contributionService)
    {
        parent::__construct(
            $familyService,
            [
                'plural' => 'families',
                'singular' => 'family'
            ],
            [
                'storeRequest' => FamilyStoreRequest::class,
                'updateRequest' => FamilyUpdateRequest::class,
            ]
        );

        $this->familyService = $familyService;
        $this->contributionService = $contributionService;
    }

    /**
     * @inheritDoc
     */
    public function index(): View
    {
        $families = $this->familyService->getAll();

        foreach ($families as $family) {
            $family->total_contribution = $this->familyService->calculateTotalContribution($family->id);
        }

        return view('panel.families.index', compact('families'));
    }

    /**
     * @inheritDoc
     */
    public function show(int $id): View
    {
        $family = $this->familyService->getById($id);
        $family_members = $this->familyService->getFamilyMembers($id);
        $fiscalYear = session('fiscal_year');
        $totalContribution = 0;

        foreach ($family_members as $member) {
            $age = (int) Carbon::parse($member->birthdate)->diffInYears(Carbon::parse($fiscalYear->year . '-01-01'));

            $contribution = $this->contributionService->getContributionForMember(
                $member->member_type_id,
                $age,
                $fiscalYear->id
            );

            $member->contribution = $contribution;
            $totalContribution += $contribution?->amount ?? 0;
        }

        return view('panel.families.show', compact(['family', 'family_members', 'totalContribution']));
    }
}
