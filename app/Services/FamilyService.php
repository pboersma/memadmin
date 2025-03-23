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

    public function getFamily(int $id): object
    {
        return $this->familyRepository->get($id);
    }

    public function updateFamily(int $id, array $payload): void
    {
        $this->familyRepository->update($id, $payload);
    }

    public function deleteFamily(int $id): void
    {
        $this->familyRepository->delete($id);
    }

    public function createFamily(array $payload): void
    {
        $this->familyRepository->create($payload);
    }
}
