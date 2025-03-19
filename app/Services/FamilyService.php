<?php

namespace App\Services;

use App\Repositories\FamilyRepository;

class FamilyService
{
    protected FamilyRepository $familyRepository;

    public function __construct()
    {
        $this->familyRepository = new FamilyRepository();
    }

    public function getAllFamilies(): array
    {
        return $this->familyRepository->getAll();
    }
}
