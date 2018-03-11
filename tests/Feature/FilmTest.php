<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FilmTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }
    public function testFeature()
    {
        $response= $this->call('GET', '/test');

        $this->factory->define(App\movies::class, function(Faker $faker){
            return [
                'title' => 'testfilm' 
            ];
        });
        $this->assertTrue(true);
    }
}
