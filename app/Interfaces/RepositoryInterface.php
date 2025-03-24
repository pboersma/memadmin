<?php

namespace App\Interfaces;

interface RepositoryInterface
{
    /**
     * Retrieve all records.
     *
     * @return array
     */
    public function getAll(): array;

    /**
     * Retrieve a single record by its unique identifier.
     *
     * @param int $id
     *
     * @return object
     */
    public function get(int $id): object;

    /**
     * Create a new record with the given data.
     *
     * @param array $payload
     *
     * @return void
     */
    public function create(array $payload): void;

    /**
     * Update an existing record with the given data.
     *
     * @param int $id
     * @param array $payload
     *
     * @return void
     */
    public function update(int $id, array $payload): void;

    /**
     * Delete a record by its unique identifier.
     *
     * @param int $id
     *
     * @return void
     */
    public function delete(int $id): void;
}
