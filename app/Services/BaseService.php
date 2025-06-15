<?php

namespace App\Services;

use App\Interfaces\RepositoryInterface;
use App\Interfaces\ServiceInterface;

abstract class BaseService implements ServiceInterface
{
    protected RepositoryInterface $repository;

    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @inheritDoc
     */
    public function getAll(): array
    {
        return $this->repository->getAll();
    }

    /**
     * @inheritDoc
     */
    public function getById(int $id): ?object
    {
        return $this->repository->get($id);
    }

    /**
     * @inheritDoc
     */
    public function create(array $payload): void
    {
        $this->repository->create($payload);
    }

    /**
     * @inheritDoc
     */
    public function update(int $id, array $payload): void
    {
        $this->repository->update($id, $payload);
    }

    /**
     * @inheritDoc
     */
    public function delete(int $id): void
    {
        $this->repository->delete($id);
    }
}
