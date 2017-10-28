<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Repositories\Eloquent\User;
use App\Repositories\Eloquent\Shelf;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ShelfTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreate()
    {
        $user = factory(User::class)->create();
        $params = [
            'name'        => 'test',
            'description' => 'test',
        ];
        $response = $this->actingAs($user)
            ->post('api/v1/shelf/create', $params);

        $response->assertStatus(200);
    }

    public function testUpdate()
    {
        $user = factory(User::class)->create();
        $shelf = factory(Shelf::class)->create();
        $params = [
            'name'        => 'test',
            'description' => 'test',
        ];
        $response = $this->actingAs($user)
            ->post("api/v1/shelf/$shelf->id/update", $params);

        $response->assertStatus(200);
    }

    public function testDelete()
    {
        $user = factory(User::class)->create();
        $shelf = factory(Shelf::class)->create();
        $response = $this->actingAs($user)
            ->post("api/v1/shelf/$shelf->id/delete");

        $response->assertStatus(200);
    }

    public function testFollow()
    {
        $user = factory(User::class)->create();
        $shelf = factory(Shelf::class)->create();
        $response = $this->actingAs($user)
            ->post("api/v1/shelf/$shelf->id/follow");

        $response->assertStatus(200);
    }

    public function testReFollow()
    {
        $user = factory(User::class)->create();
        $shelf = factory(Shelf::class)->create();
        $response = $this->actingAs($user)
            ->post("api/v1/shelf/$shelf->id/refollow");

        $response->assertStatus(200);
    }
}
