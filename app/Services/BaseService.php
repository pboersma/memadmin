<?php

namespace App\Services;

use App\Interfaces\RepositoryInterface;

abstract class BaseService
{
    protected RepositoryInterface $repository;

    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAll(): array
    {
        return $this->repository->getAll();
    }

    public function getById(int $id): object
    {
        return $this->repository->get($id);
    }

    public function create(array $payload): void
    {
        $this->repository->create($payload);
    }

    public function update(int $id, array $payload): void
    {
        $this->repository->update($id, $payload);
    }

    public function delete(int $id): void
    {
        $this->repository->delete($id);
    }
}
