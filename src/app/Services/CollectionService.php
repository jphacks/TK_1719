<?php

namespace App\Services;

use App\Repositories\CollectionRepository;
use App\Repositories\ShelfRepository;
use App\Exceptions\ShelfException;
use DB;

class CollectionService
{
    protected $collectionRepository;
    protected $shelfRepository;

    public function __construct(
        CollectionRepository $collectionRepository,
        ShelfRepository $shelfRepository
    )
    {
        $this->collectionRepository = $collectionRepository;
        $this->shelfRepository      = $shelfRepository;
    }

    public function findOrFail($collectionId)
    {
        return $this->collectionRepository->findOrFail($collectionId);
    }

    public function create($attributes, $user)
    {
        $url = $attributes['url'];
        try {
            $html  = $this->collectionRepository->fetch($url);
            $nodes = $this->collectionRepository->getNodes($html);
        } catch (ShelfException $e) {
            //TODO Implement exception
            throw $e;
        }

        $attributes['title']   = $nodes['title'];
        $attributes['image']   = $nodes['image'];
        $attributes['user_id'] = $user->id;
        return DB::transaction(function () use ($attributes) {
            return $this->collectionRepository->create($attributes);
        });
    }

    public function update($shelfId, $collectionId)
    {
        return DB::transaction(function () use ($shelfId, $collectionId) {
            return $this->collectionRepository->update($shelfId, $collectionId);
        });
    }

    public function delete($collectionId)
    {
        $collection = $this->collectionRepository->findOrFail($collectionId);
        return DB::transaction(function () use ($collectionId) {
            $this->collectionRepository->delete($collectionId);
        });
        return $collection;
    }

    public function attach($collectionId, $shelfId, $user)
    {
        $shelf = $this->shelfRepository->findOrFail($shelfId);
        $collection = $this->collectionRepository->findOrFail($collectionId);
        if ($shelf->owner_id != $user->id) {
            throw new ShelfException('You are not owner', ShelfException::NOT_OWNER);
        }
        //TODO Implement validation user is collections owner
        DB::transaction(function () use ($shelf, $collection) {
            $this->collectionRepository->attach($shelf, $collection);
        });
    }
}
