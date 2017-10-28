<?php

namespace App\Repositories;

use App\Repositories\Eloquent\User;
use App\Repositories\Eloquent\Shelf;

class ShelfRepository
{
    public function findOrFail(int $shelfId)
    {
        return Shelf::findOrFail($shelfId);
    }

    public function create(array $attributes)
    {
        return Shelf::create($attributes);
    }

    public function update(int $shelfId, array $attributes)
    {
        $shelf = $this->findOrFail($shelfId);
        $shelf->fill($attributes);
        $shelf->save();
        return $shelf;
    }

    public function delete(int $shelfId)
    {
        return Shelf::destroy($shelfId);
    }

    public function follow($shelf, $user)
    {
        $user->shelves()->updateExistingPivot($shelf->id, ['is_favorite' => 1]);
    }

    public function refollow($shelf, $user)
    {
        $user->shelves()->updateExistingPivot($shelf->id, ['is_favorite' => 0]);
    }
}
