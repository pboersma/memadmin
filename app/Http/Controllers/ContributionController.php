<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Carbon\Carbon;
use App\Http\Requests\ContributionStoreRequest;
use App\Http\Requests\ContributionUpdateRequest;
use App\Services\DiscountService;
use App\Services\FamilyMemberService;
use App\Services\MemberTypeService;
use App\Services\ContributionService;

class ContributionController extends Controller
{
    protected ContributionService $contributionService;

    protected MemberTypeService $memberTypeService;

    protected DiscountService $discountService;

    public function __construct(
        ContributionService $contributionService,
        MemberTypeService $memberTypeService,
        FamilyMemberService $familyMemberService,
        DiscountService $discountService,
    ) {
        parent::__construct(
            $contributionService,
            [
                'plural' => 'contributions',
                'singular' => 'contribution'
            ],
            [
                'storeRequest' => ContributionStoreRequest::class,
                'updateRequest' => ContributionUpdateRequest::class,
            ]
        );

        $this->contributionService = $contributionService;
        $this->memberTypeService = $memberTypeService;
        $this->familyMemberService = $familyMemberService;
        $this->discountService = $discountService;
    }

    /**
     * Show the contribution form with age and matching discount based on birthdate and fiscal year.
     *
     * @return View
     */
    public function create(): View
    {
        $request = request();

        $referenceDate = Carbon::create(session('fiscal_year')->year, 1, 1);
        $birthdate = Carbon::parse($request->birthdate);
        $age = (int) $birthdate->diffInYears($referenceDate);

        $discounts = collect($this->discountService->getAll());
        $memberType = $this->memberTypeService->getById($request->member_type_id);

        $currentDiscount = $discounts->first(
            fn($rule) => $age >= $rule->min_age && $age <= $rule->max_age
        );

        return view('panel.contributions.create', [
            'age' => $age,
            'current_discount' => $currentDiscount,
            'member_type' => $memberType,
        ]);
    }
}
