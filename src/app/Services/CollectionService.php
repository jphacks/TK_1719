<?php

namespace App\Services;

use App\Repositories\CollectionRepository;
use DB;

class CollectionService
{
    protected $collectionRepository;

    public function __construct(CollectionRepository $collectionRepository)
    {
        $this->collectionRepository = $collectionRepository;
    }

    public function findOrFail($collectionId)
    {
        return $this->collectionRepository->findOrFail($collectionId);
    }

    public function create($attributes)
    {
        $url = $attributes['url'];
        try {
            $html  = $this->collectionRepository->fetch($url);
            $nodes = $this->collectionRepository->getNodes($html);
        } catch (\Exception $e) {
            //TODO Implement exception
            throw $e;
        }

        $attributes['title'] = $nodes['title'];
        $attributes['image'] = $nodes['image'];
        return DB::transaction(function () use ($attributes) {
            return $this->collectionRepository->create($attributes);
        });
    }

    public function attach($shelfId, $collectionId)
    {
        return DB::transaction(function () use ($shelfId, $collectionId) {
            return $this->collectionRepository->attach($shelfId, $collectionId);
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
}
