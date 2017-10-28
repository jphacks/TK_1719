<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\StoreShelfRequest;
use App\Http\Requests\Api\V1\UpdateShelfRequest;
use App\Services\ShelfService;
use App\Exceptions\ShelfException;

class ShelfController extends Controller
{
    protected $shelfService;

    public function __construct(ShelfService $shelfService)
    {
        $this->shelfService = $shelfService;
    }

    public function show(int $shelfId)
    {
        $user = auth()->user();
        try {
            $shelf = $this->shelfService->findOrFail($shelfId, $user);
        } catch (ShelfException $e) {
            if ($e->getCode() == ShelfException::NOT_ENOUGH_PERMISSION) {
                return response()->json([
                    'message' => $e->getMessage()
                ], 400);
            }

            throw $e;
        }
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
            'is_secret'   => $request->input('is_secret', 0),
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
        $user = auth()->user();

        try {
            $shelf = $this->shelfService->update($shelfId, $inputs, $user);
        } catch (ShelfException $e) {
            if ($e->getCode() == ShelfException::NOT_ENOUGH_PERMISSION) {
                return response()->json([
                    'message' => $e->getMessage()
                ], 400);
            }

            throw $e;
        }
        return response()->json([
            'message' => 'Update successful',
            'shelf' => $shelf
        ], 200);
    }

    public function delete(int $shelfId)
    {
        $user = auth()->user();
        try {
            $shelf = $this->shelfService->delete($shelfId, $user);
        } catch (ShelfException $e) {
            if ($e->getCode() == ShelfException::NOT_ENOUGH_PERMISSION) {
                return response()->json([
                    'message' => $e->getMessage()
                ], 400);
            }

            throw $e;
        }
        return response()->json([
            'message' => 'Delete successful',
            'shelf' => $shelf
        ], 200);
    }

    public function follow(int $shelfId)
    {
        $user = auth()->user();
        $shelf = $this->shelfService->follow($shelfId, $user);
        return response()->json([
            'message' => 'Attach successful',
            'shelf'   => $shelf,
        ], 200);
    }

    public function refollow(int $shelfId)
    {
        $user = auth()->user();
        $shelf = $this->shelfService->refollow($shelfId, $user);
        return response()->json([
            'message' => 'Detach successful',
            'shelf'   => $shelf,
        ], 200);
    }
}
