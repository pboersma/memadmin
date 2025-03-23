<?php

namespace App\Services;

use App\Repositories\FamilyMemberRepository;

class FamilyMemberService
{
    protected FamilyMemberRepository $familyMemberRepository;

    public function __construct()
    {
        $this->familyMemberRepository = new FamilyMemberRepository();
    }

    public function getAllFamilyMembers(): array
    {
        return $this->familyMemberRepository->getAll();
    }

    public function createFamilyMember(array $payload): void
    {
        $this->familyMemberRepository->create($payload);
    }

    public function updateFamilyMember(int $id, array $payload): void
    {
        $this->familyMemberRepository->update($id, $payload);
    }

    public function deleteFamilyMember(int $id): void
    {
        $this->familyMemberRepository->delete($id);
    }

    public function getFamilyMember(int $id): object
    {
        return $this->familyMemberRepository->get($id);
    }
}
