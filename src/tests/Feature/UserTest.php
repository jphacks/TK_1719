<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Repositories\Eloquent\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */

    public function testShow()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)
            ->get("api/v1/user/$user->id");

        $response->assertStatus(200);
    }

    public function testShowSelf()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)
            ->get('api/v1/user/self');

        $response->assertStatus(200);
    }

    public function testUpdate()
    {
        $user = factory(User::class)->create([
            'password' => 1111111
        ]);
        $params = [
            'name'        => 'test',
            'description' => 'test',
            'email'       => 'test@fez-inc.jp',
            'password'    => $user->password,
            'password_confirmation'    => $user->password,
        ];
        $response = $this->actingAs($user)
            ->post("api/v1/user/$user->id/update", $params);

        $response->assertStatus(200);
    }
}
