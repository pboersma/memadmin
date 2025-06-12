<?php

namespace App\Services;

use App\Repositories\RoleRepository;

class RoleService extends BaseService
{
    public function __construct(RoleRepository $repository)
    {
        parent::__construct($repository);
    }

    public function getRolesForUser(int $userId): array
    {
        return $this->repository->getRolesByUserId($userId);
    }
}
