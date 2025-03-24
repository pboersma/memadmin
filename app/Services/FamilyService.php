<?php

namespace App\Services;

use App\Repositories\FamilyRepository;

class FamilyService extends BaseService
{
    public function __construct(FamilyRepository $repository)
    {
        parent::__construct($repository);
    }
}
