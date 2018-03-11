<?php

namespace Tests\Unit\Film;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

Use FormationLaravel\Movies;

class FilmUniTest extends TestCase
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

    public function testSimple()
    {
       $film = new Movies;
       $film->title = 'test';
    
        $this->assertEquals($film->title, 'test');
    }

}
