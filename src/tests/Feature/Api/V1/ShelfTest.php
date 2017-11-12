<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Repositories\Eloquent\User;
use App\Repositories\Eloquent\Shelf;
use App\Repositories\Eloquent\Collection;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ShelfTest extends TestCase
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
        $shelf = factory(Shelf::class)->create([
            'owner_id' => $user->id
        ]);
        $response = $this->actingAs($user)
            ->get("api/v1/shelf/$shelf->id");

        $response->assertStatus(200);
    }

    public function testShowError()
    {
        $user = factory(User::class)->create();
        $shelf = factory(Shelf::class)->create([
            'is_secret' => 1,
            'owner_id'  => 100
        ]);
        $collection = factory(Collection::class)->create([
            'user_id'  => $user->id,
            'shelf_id' => $shelf->id,
        ]);
        $response = $this->actingAs($user)
            ->get("api/v1/shelf/$shelf->id");

        $response->assertStatus(400);
    }

    public function testCreate()
    {
        $user = factory(User::class)->create();
        $params = [
            'name'        => 'test',
            'description' => 'test',
            'is_secret'   => 0,
        ];
        $response = $this->actingAs($user)
            ->post('api/v1/shelf/create', $params);

        $response->assertStatus(200);
    }

    public function testUpdate()
    {
        $user = factory(User::class)->create();
        $shelf = factory(Shelf::class)->create([
            'owner_id' => $user->id
        ]);
        $params = [
            'name'        => 'test',
            'description' => 'test',
        ];
        $response = $this->actingAs($user)
            ->post("api/v1/shelf/$shelf->id/update", $params);

        $response->assertStatus(200);
    }

    public function testUpdateError()
    {
        $user = factory(User::class)->create();
        $shelf = factory(Shelf::class)->create([
            'owner_id'  => 100
        ]);
        $params = [
            'name'        => 'test',
            'description' => 'test',
        ];
        $response = $this->actingAs($user)
            ->post("api/v1/shelf/$shelf->id/update", $params);

        $response->assertStatus(400);
    }

    public function testDelete()
    {
        $user = factory(User::class)->create();
        $shelf = factory(Shelf::class)->create([
            'owner_id' => $user->id
        ]);
        $response = $this->actingAs($user)
            ->post("api/v1/shelf/$shelf->id/delete");

        $response->assertStatus(200);
    }

    public function testDeleteError()
    {
        $user = factory(User::class)->create();
        $shelf = factory(Shelf::class)->create([
            'owner_id'  => 100
        ]);
        $response = $this->actingAs($user)
            ->post("api/v1/shelf/$shelf->id/delete");

        $response->assertStatus(400);
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
