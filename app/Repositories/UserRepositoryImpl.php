<?php

namespace App\Repositories;

use App\Enums\CategoryEnum;
use App\Models\Turn;
use App\Models\User;
use App\Interfaces\UserRepository;
use Illuminate\Database\Eloquent\Collection;

class UserRepositoryImpl implements UserRepository
{

    protected $category;
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
/**
 * metodo para crear un turno el usuario
 * ingresa su numero de documento
 * y se crea un turno
 * un array con los datos solicitados
 * se tornar el turno del usuario
*/
    public function createTurn(array $data): Turn
    {

//dd($data);

      $ticket = $this->generateTicket($data['category']);

try {
    $turn = Turn::create([
        'ticket' =>  $ticket,
        'date_attention' => now(),
        'client_id' => User::where('document', $data['document'])->value('id'),
        'category' => $data['category'],
        'status' => 'PENDING',
    ]);
} catch (\Exception $e) {
    dd($e->getMessage()); // Muestra el error
}
        return $turn;
    }
/**
 * Este metodo genera tickets dependiendo la cateogira
 * Cuenta desde 000,
 * verifica si hay numeros antes
*/
    public function generateTicket($category)

    {

      $lastTicket  = Turn::where('category',$category)
                      ->orderByDesc('ticket')
                        ->value('ticket');
        var_dump($lastTicket);
        $nextNumber = $lastTicket ? (int) substr($lastTicket, 1) + 1 : 1;
        $nextNumberFormatted = str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
        $categoryLetter = CategoryEnum::tryFrom($category)?->value;

        return $categoryLetter . $nextNumberFormatted;
    }

}
