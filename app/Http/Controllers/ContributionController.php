<?php

namespace App\Http\Controllers;

use App\Services\DiscountService;
use App\Services\FamilyMemberService;
use App\Services\MemberTypeService;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use App\Interfaces\ControllerInterface;
use App\Services\ContributionService;
use Carbon\Carbon;

class ContributionController implements ControllerInterface
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
        $this->contributionService = $contributionService;
        $this->memberTypeService = $memberTypeService;
        $this->familyMemberService = $familyMemberService;
        $this->discountService = $discountService;
    }

    /**
     * @inheritDoc
     */
    public function index(): View
    {
        $contributions = $this->contributionService->getAll();

        return view('panel.contributions.index', compact('contributions'));
    }

    /**
     * Show the contribution form with age and matching discount based on birthdate and fiscal year.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create(): View
    {
        $request = request();

        $referenceDate = Carbon::create(session('fiscal_year')->year, 1, 1);

        $birthdate = Carbon::parse($request->birthdate);
        $age = $birthdate->diffInYears($referenceDate);

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

    /**
     * @inheritDoc
     */
    public function store(Request $request): RedirectResponse
    {
        $this->contributionService->create($request->all());

        return redirect()->route('contributions.index');
    }

    /**
     * @inheritDoc
     */
    public function edit($id): View
    {
        $contribution = $this->contributionService->getById($id);

        return view('panel.contributions.edit', compact('contribution'));
    }

    /**
     * @inheritDoc
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $this->contributionService->update($id, $request->all());

        return redirect()->route('contributions.index');
    }

    /**
     * @inheritDoc
     */
    public function show(int $id): View
    {
        $contribution = $this->contributionService->getById($id);

        return view('panel.contributions.show', compact('contribution'));
    }

    /**
     * @inheritDoc
     */
    public function destroy(int $id): RedirectResponse
    {
        $this->contributionService->delete($id);

        return redirect()->route('contributions.index');
    }
}
