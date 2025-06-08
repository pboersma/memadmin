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

    public function getWithMemberType(int $id): ?object
    {
        $member = $this->repository->get($id);

        if (!$member) {
            return null;
        }

        $memberType = $this->memberTypeRepository->get($member->member_type_id);
        $member->member_type = $memberType;

        return $member;
    }
}
