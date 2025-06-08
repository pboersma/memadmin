<?php

namespace App\Services;

use App\Repositories\FiscalYearRepository;

class FiscalYearService extends BaseService
{
    public function __construct(FiscalYearRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * Get a fiscal year by its year value.
     *
     * @param int $year
     *
     * @return object
     */
    public function getByYear(int $year): object
    {
        return $this->repository->getByYear($year);
    }
}
