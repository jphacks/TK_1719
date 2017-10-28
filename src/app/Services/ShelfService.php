<?php

namespace App\Services;

use App\Repositories\ShelfRepository;
use App\Repositories\Eloquent\User;
use DB;

class ShelfService
{
    protected $shelfRepository;

    public function __construct(ShelfRepository $shelfRepository)
    {
        $this->shelfRepository = $shelfRepository;
    }

    public function findOrFail(int $shelfId)
    {
        return $this->shelfRepository->findOrFail($shelfId);
    }

    public function create(array $attributes, User $user)
    {
        $attributes['owner_id'] = $user->id;
        return DB::transaction(function () use ($attributes) {
            $shelf = $this->shelfRepository->create($attributes);
            //TODO Implement attach
            return $shelf;
        });
    }

    public function update(int $shelfId, array $attributes)
    {
        return DB::transaction(function () use ($shelfId, $attributes) {
            return $this->shelfRepository->update($shelfId, $attributes);
        });
    }

    public function delete(int $shelfId)
    {
        return DB::transaction(function () use ($shelfId) {
            $shelf = $this->shelfRepository->findOrFail($shelfId);
            $this->shelfRepository->delete($shelfId);
            return $shelf;
        });
    }
}
