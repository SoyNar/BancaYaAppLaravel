<?php

namespace App\Interfaces;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface UserRepository
{
    /**
     * Obtiene todos los registros.
     *
     * @return Collection
     */
    public function getAll(): Collection;

    /**
     * Encuentra un registro por su ID.
     *
     * @param int $id
     * @return User|null
     */
    public function findById(int $id): ?User;

    /**
     * Crea un nuevo registro.
     *
     * @param array $data
     * @return User
     */
    public function create(array $data): User;

    /**
     * Actualiza un registro existente.
     *
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update(int $id, array $data): bool;

    /**
     * Elimina un registro.
     *
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool;

    public function createTurn(string $document) : Turn;
}
