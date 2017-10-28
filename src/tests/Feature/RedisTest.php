<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Redis;

class RedisTest extends TestCase
{
    public function testSet()
    {
        $name = 'Taylor';
        Redis::set('name', $name);

        $value = Redis::get('name');
        $this->assertEquals($name, $value);
    }
}
