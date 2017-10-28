<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Repositories\Eloquent\User;
use App\Repositories\Eloquent\Collection;
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
        $collection = factory(Collection::class)->create();
        $response = $this->actingAs($user)
            ->get("api/v1/collection/$collection->id");

        $response->assertStatus(200);
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

    public function testAttach()
    {
        $user = factory(User::class)->create();
        $collection = factory(Collection::class)->create();
        $params = [
            'shelf_id' => 100
        ];
        $response = $this->actingAs($user)
            ->post("api/v1/collection/$collection->id/attach", $params);

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
}
