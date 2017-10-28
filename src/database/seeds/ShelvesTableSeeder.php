<?php

use Illuminate\Database\Seeder;
use App\Repositories\Eloquent\Shelf;

class ShelvesTableSeeder extends Seeder
{
    public function run()
    {
        return Shelf::create([
            'name'        => 'root',
            'description' => 'Test data',
            'owner_id'    => '1',
        ]);
    }
}
