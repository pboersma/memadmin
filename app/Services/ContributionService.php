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

    public function getContributionForMember(int $memberTypeId, int $age, int $fiscalYearId): ?object
    {
        return $this->repository->findByTypeAndAgeAndYear($memberTypeId, $age, $fiscalYearId);
    }
}
