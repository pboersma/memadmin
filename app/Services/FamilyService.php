<?php

namespace App\Services;

use App\Repositories\FamilyRepository;
use Carbon\Carbon;

class FamilyService extends BaseService
{
    private ContributionService $contributionService;

    public function __construct(FamilyRepository $repository, ContributionService $contributionService)
    {
        parent::__construct($repository);
        $this->contributionService = $contributionService;
    }

    /**
     * Get all members of a given family by ID.
     *
     * @param int $familyId
     *
     * @return array
     */
    public function getFamilyMembers(int $familyId): array
    {
        return $this->repository->getFamilyMembers($familyId);
    }

    /**
     * Calculate the total contribution amount for a given family.
     *
     * @param int $familyId
     *
     * @return float
     */
    public function calculateTotalContribution(int $familyId): float
    {
        $members = $this->getFamilyMembers($familyId);

        $total = 0;

        foreach ($members as $member) {
            $age = (int) Carbon::parse($member->birthdate)->diffInYears(Carbon::parse(session('fiscal_year')->year . '-01-01'));

            $contribution = $this->contributionService->getContributionForMember(
                $member->member_type_id,
                $age,
                session('fiscal_year')->id
            );

            if ($contribution) {
                $total += $contribution->amount;
            }
        }

        return $total;
    }
}
