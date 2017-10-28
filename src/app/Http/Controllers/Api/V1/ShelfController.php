<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\StoreShelfRequest;
use App\Http\Requests\Api\V1\UpdateShelfRequest;
use App\Services\ShelfService;

class ShelfController extends Controller
{
    protected $shelfService;

    public function __construct(ShelfService $shelfService)
    {
        $this->shelfService = $shelfService;
    }

    public function show(int $shelfId)
    {
        $shelf = $this->shelfService->findOrFail($shelfId);
        return response()->json([
            'shelf' => $shelf
        ], 200);
    }

    public function search(array $attributes)
    {
        //Not yet implements
    }

    public function store(StoreShelfRequest $request)
    {
        $inputs = [
            'name'        => $request->input('name'),
            'description' => $request->input('description', ''),
        ];
        $user = auth()->user();
        $shelf = $this->shelfService->create($inputs, $user);

        return response()->json([
            'message' => 'Create successful',
            'shelf' => $shelf
        ], 200);
    }

    public function update(UpdateShelfRequest $request, int $shelfId)
    {
        $inputs = [];
        if ($request->input('name')) {
            $inputs['name'] = $request->input('name');
        }
        if ($request->input('description')) {
            $inputs['description'] = $request->input('description');
        }

        $shelf = $this->shelfService->update($shelfId, $inputs);
        return response()->json([
            'message' => 'Update successful',
            'shelf' => $shelf
        ], 200);
    }

    public function delete(int $shelfId)
    {
        //TODO User who has permission can delete
        $shelf = $this->shelfService->delete($shelfId);
        return response()->json([
            'message' => 'Delete successful',
            'shelf' => $shelf
        ], 200);
    }
}
