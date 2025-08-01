<?php

namespace App\Services;

use App\Repositories\ContributionRepository;
use App\Repositories\DiscountRepository;

class ContributionService extends BaseService
{
    private DiscountRepository $discountRepository;

    public function __construct(
        ContributionRepository $repository,
        DiscountRepository $discountRepository
    ) {
        parent::__construct($repository);
        $this->discountRepository = $discountRepository;
    }

    /**
     * Get a contribution by age and append the matching discount.
     *
     * @param int $age
     *
     * @return object|null
     */
    public function getContributionByAgeWithDiscount(int $age): ?object
    {
        $contribution = $this->repository->getContributionByAge($age);

        if (!$contribution) {
            return null;
        }

        $contribution->discount = $this->discountRepository->getByAge($contribution->age);

        return $contribution;
    }

    /**
     * Get the contribution record for a member based on type, age, and fiscal year.
     *
     * @param int $memberTypeId
     * @param int $age
     * @param int $fiscalYearId
     *
     * @return object|null
     */
    public function getContributionForMember(int $memberTypeId, int $age, int $fiscalYearId): ?object
    {
        return $this->repository->findByTypeAndAgeAndYear($memberTypeId, $age, $fiscalYearId);
    }

    public function getAll(): array
    {
        $fiscalYear = session('fiscal_year');
        return $this->repository->getAllWhere('fiscal_year_id', $fiscalYear->id);
    }
}
