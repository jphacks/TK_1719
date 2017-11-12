<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function index()
    {
        return view('collection.index');
    }

    public function show(int $collectionId)
    {
        return view('collection.show');
    }
}
