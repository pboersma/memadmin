<?php

namespace App\Interfaces;

interface ServiceInterface
{
    /**
     * Retrieve all entities.
     *
     * @return array
     */
    public function getAll(): array;

    /**
     * Retrieve a single entity by its unique identifier.
     *
     * @param int  $id
     *
     * @return object
     */
    public function getById(int $id): object;

    /**
     * Create a new entity with the given data.
     *
     * @param array $payload
     *
     * @return void
     */
    public function create(array $payload): void;

    /**
     * Update an existing entity with the given data.
     *
     * @param int $id
     * @param array $payload
     *
     * @return void
     */
    public function update(int $id, array $payload): void;

    /**
     * Delete an entity by its unique identifier.
     *
     * @param int $id
     *
     * @return void
     */
    public function delete(int $id): void;
}
