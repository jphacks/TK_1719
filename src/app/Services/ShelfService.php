<?php

namespace App\Services;

use App\Repositories\ShelfRepository;
use App\Repositories\Eloquent\User;
use App\Exceptions\ShelfException;
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
        $shelf = $this->shelfRepository->findOrFail($shelfId);
        return $shelf;
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

    public function update(int $shelfId, array $attributes, $user)
    {
        $shelf = $this->shelfRepository->findOrFail($shelfId);
        if ($shelf->owner_id != $user->id) {
            throw new ShelfException(
                'Cannnot show shelf because you have no permission',
                ShelfException::NOT_ENOUGH_PERMISSION
            );
        }
        DB::transaction(function () use ($shelfId, $attributes) {
            return $this->shelfRepository->update($shelfId, $attributes);
        });
    }

    public function delete(int $shelfId, $user)
    {
        $shelf = $this->shelfRepository->findOrFail($shelfId);
        if ($shelf->owner_id != $user->id) {
            throw new ShelfException(
                'Cannnot show shelf because you have no permission',
                ShelfException::NOT_ENOUGH_PERMISSION
            );
        }
        return DB::transaction(function () use ($shelfId) {
            $shelf = $this->shelfRepository->findOrFail($shelfId);
            $this->shelfRepository->delete($shelfId);
            return $shelf;
        });
    }

    public function follow($shelfId, $user)
    {
        return DB::transaction(function () use ($shelfId, $user) {
            $shelf = $this->shelfRepository->findOrFail($shelfId);
            $this->shelfRepository->follow($shelf, $user);
            return $shelf;
        });
    }

    public function refollow($shelfId, $user)
    {
        return DB::transaction(function () use ($shelfId, $user) {
            $shelf = $this->shelfRepository->findOrFail($shelfId);
            $this->shelfRepository->refollow($shelf, $user);
            return $shelf;
        });
    }
}
