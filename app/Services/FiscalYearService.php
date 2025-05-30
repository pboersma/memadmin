<?php

namespace App\Services;

use App\Repositories\FiscalYearRepository;

class FiscalYearService extends BaseService
{
    public function __construct(FiscalYearRepository $repository)
    {
        parent::__construct($repository);
    }

    public function existsByYear(int $year): bool
    {
        return $this->repository->existsByYear($year);
    }
}
