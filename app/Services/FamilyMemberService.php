<?php

namespace App\Services;

use App\Repositories\FamilyMemberRepository;

class FamilyMemberService extends BaseService
{
    public function __construct(FamilyMemberRepository $repository)
    {
        parent::__construct($repository);
    }
}
