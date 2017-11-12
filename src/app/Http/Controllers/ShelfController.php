<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShelfController extends Controller
{
    public function index()
    {
        return view('shelf.index');
    }

    public function show(int $shelfId)
    {
        return view('shelf.show');
    }
}
