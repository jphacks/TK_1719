<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\StoreCollectionRequest;
use App\Http\Requests\Api\V1\UpdateCollectionRequest;
use App\Exceptions\ShelfException;
use App\Services\CollectionService;

class CollectionController extends Controller
{
    protected $collectionService;

    public function __construct(CollectionService $collectionService)
    {
        $this->collectionService = $collectionService;
    }

    public function show(int $collectionId)
    {
        $collection = $this->collectionService->findOrFail($collectionId);
        return response()->json([
            'collection' => $collection
        ], 200);
    }

    public function search(array $attributes)
    {
        //Not yet implements
    }

    public function store(StoreCollectionRequest $request)
    {
        $user = auth()->user();
        $inputs = [
            'url'      => $request->input('url'),
            'shelf_id' => $request->input('shelf_id'),
        ];
        $collection = $this->collectionService->create($inputs, $user);
        return response()->json([
            'message' => 'Create collection successful',
            'collection' => $collection
        ], 200);
    }

    public function update(UpdateCollectionRequest $request, int $collectionId)
    {
        $shelfId = $request->input('shelf_id');
        $collection = $this->collectionService->update($shelfId, $collectionId);
        return response()->json([
            'message' => 'Update collection successful',
            'collection' => $collection
        ], 200);
    }

    public function delete(int $collectionId)
    {
        $collection = $this->collectionService->delete($collectionId);
        return response()->json([
            'message' => 'Delete collection successful',
            'collection' => $collection
        ], 200);
    }

    public function attach($collectionId, $shelfId)
    {
        $user = auth()->user();
        try {
            $this->collectionService->attach($collectionId, $shelfId, $user);
        } catch(ShelfException $e) {
            if ($e->getCode() == ShelfException::NOT_OWNER) {
                return response()->json([
                    'message' => $e->getMessage(),
                ], 400);
            }
            throw $e;
        }
    }
}
