<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Repositories\Eloquent\User;
use App\Repositories\Eloquent\Collection;
use App\Repositories\Eloquent\Shelf;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CollectionTest extends TestCase
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
        $collection = factory(Collection::class)->create([
            'user_id' => $user
        ]);
        $response = $this->actingAs($user)
            ->get("api/v1/collection/$collection->id");

        $response->assertStatus(200);
    }

    public function testShowError()
    {
        $user = factory(User::class)->create();
        $shelf = factory(Shelf::class)->create([
            'is_secret' => 1,
        ]);
        $collection = factory(Collection::class)->create([
            'shelf_id' => $shelf->id,
            'user_id'  => $user->id,
        ]);
        $response = $this->actingAs($user)
            ->get("api/v1/collection/$collection->id");

        $response->assertStatus(400);
    }

    public function testStore()
    {
        $user = factory(User::class)->create();
        $shelfId = 1;
        $params = [
            'url'      => 'http://www.atmarkit.co.jp/ait/articles/1701/30/news037.html',
            'shelf_id' => $shelfId,
        ];
        $response = $this->actingAs($user)
            ->post("api/v1/collection/store", $params);

        $response->assertStatus(200);
    }

    public function testUpdate()
    {
        $user = factory(User::class)->create();
        $collection = factory(Collection::class)->create();
        $params = [
            'shelf_id' => 100
        ];
        $response = $this->actingAs($user)
            ->post("api/v1/collection/$collection->id/update", $params);

        $response->assertStatus(200);
    }

    public function testDelete()
    {
        $user = factory(User::class)->create();
        $collection = factory(Collection::class)->create();
        $response = $this->actingAs($user)
            ->post("api/v1/collection/$collection->id/delete");

        $response->assertStatus(200);
    }

    public function testAttach()
    {
        $url      = 'localhost:8111';
        $title    = 'test';
        $imageUrl = base_path('tests/Resources/upload.jpg');
        $user       = factory(User::class)->create();
        $shelf1     = factory(Shelf::class)->create([
            'owner_id' => $user->id
        ]);
        $shelf2     = factory(Shelf::class)->create([
            'owner_id' => $user->id
        ]);
        $collection = $user->collections()->create([
            'url'      => $url,
            'title'    => $title,
            'image'    => $imageUrl,
            'shelf_id' => $shelf1->id,
        ]);
        $response = $this->actingAs($user)
            ->post("api/v1/collection/$collection->id/shelf/$shelf2->id/attach");
        $response->assertStatus(200);
    }
}
