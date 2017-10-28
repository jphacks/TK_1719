<?php

use Illuminate\Database\Seeder;
use App\Repositories\Eloquent\Collection;

class CollectionsTableSeeder extends Seeder
{
    public function run()
    {
        return Collection::create([
            'url'      => 'localhost:8111',
            'title'    => 'test',
            'image'    => base_path("tests/Resources/upload.jpg"),
            'shelf_id' => '1',
            'user_id'  => '1',
        ]);
    }
}
