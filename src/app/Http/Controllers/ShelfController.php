<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use App\Services\ShelfService;

class ShelfController extends Controller
{
    protected $shelfService;
    protected $userService;

    public function __construct(
        ShelfService $shelfService,
        UserService $userService
    ) {
        $this->userService = $userService;
        $this->shelfService = $shelfService;
    }

    public function index($userId)
    {
        $user = $this->userService->findOrFail($userId);
        $shelves = $user->shelves;

        return view('shelf.index', ['shelves' => $shelves]);
    }

    public function show(int $shelfId)
    {
        $shelf = $this->shelfService->findOrFail($shelfId);
        $collections = $shelf->collections;
        return view('shelf.show', [
            'shelf' => $shelf,
            'collections' => $collections,
        ]);
    }
}
