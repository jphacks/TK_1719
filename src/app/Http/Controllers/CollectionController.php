<?php

namespace App\Http\Controllers;

use App\Services\CollectionService;

class CollectionController extends Controller
{
    protected $collectionService;

    public function __construct(CollectionService $collectionService) {
        $this->collectionService = $collectionService;
    }

    public function index()
    {
        return view('collection.index');
    }

    public function show(int $collectionId)
    {
        $collection = $this->collectionService->findOrFail($collectionId);
        return view('collection.show', ['collection' => $collection]);
    }
}
