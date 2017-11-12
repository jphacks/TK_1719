<?php

use Illuminate\Database\Seeder;
use App\Repositories\Eloquent\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        return User::create([
            'name'     => 'root',
            'email'    => 'chinarra.tabata@gmail.com',
            'password' => '11111111',
        ]);
    }
}
