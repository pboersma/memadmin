<?php

namespace App\Services;

use App\Repositories\FamilyMemberRepository;
use App\Repositories\MemberTypeRepository;

class FamilyMemberService extends BaseService
{
    private MemberTypeRepository $memberTypeRepository;

    public function __construct(
        FamilyMemberRepository $repository,
        MemberTypeRepository $memberTypeRepository
    ) {
        parent::__construct($repository);
        $this->memberTypeRepository = $memberTypeRepository;
    }

    /**
     * Get a family member by ID with its associated member type.
     *
     * @param int $id

     * @return object|null
     */
    public function getWithMemberType(int $id): ?object
    {
        $member = $this->repository->get($id);

        if (!$member) {
            return null;
        }

        $memberType = $this->memberTypeRepository->get($member->member_type_id);
        $member->mem_type = $memberType;

        return $member;
    }
}
