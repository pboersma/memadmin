<?php

namespace App\Services;

use App\Repositories\MemberTypeRepository;

class MemberTypeService extends BaseService
{
    public function __construct(MemberTypeRepository $repository)
    {
        parent::__construct($repository);
    }
}
