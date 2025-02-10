<?php

namespace App\Repositories;

use App\Models\Turn;
use App\Models\User;
use App\Interfaces\UserRepository;
use Illuminate\Database\Eloquent\Collection;

class UserRepositoryImpl implements UserRepository
{
    /**
     * @var User
     */
    protected $model;

    /**
     * Constructor.
     *
     * @param User $model
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    /**
     * @inheritDoc
     */
    public function getAll(): Collection
    {
        return $this->model->all();
    }

    /**
     * @inheritDoc
     */
    public function findById(int $id): ?User
    {
        return $this->model->find($id);
    }

    /**
     * @inheritDoc
     */
    public function create(array $data): User
    {
        return $this->model->create($data);
    }

    /**
     * @inheritDoc
     */
    public function update(int $id, array $data): bool
    {
        $model = $this->findById($id);
        if (!$model) {
            return false;
        }
        return $model->update($data);
    }

    /**
     * @inheritDoc
     */
    public function delete(int $id): bool
    {
        $model = $this->findById($id);
        if (!$model) {
            return false;
        }
        return $model->delete();
    }

    public function createTurn(string $document): Turn
    {
        // TODO: Implement createTurn() method.
        $turn =  Turn::all();
        return $turn;
    }


}
