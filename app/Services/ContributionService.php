<?php

namespace App\Services;

use App\Repositories\ContributionRepository;

class ContributionService extends BaseService
{
    public function __construct(ContributionRepository $repository)
    {
        parent::__construct($repository);
    }
}
