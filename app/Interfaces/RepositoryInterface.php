<?php

namespace App\Interfaces;

interface RepositoryInterface
{
    public function getAll(): array;

    public function get(int $id): object;

    public function create(array $payload): void;

    public function update(int $id, array $payload): void;

    public function delete(int $id): void;
}
