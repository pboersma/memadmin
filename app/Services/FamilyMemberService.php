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
}
