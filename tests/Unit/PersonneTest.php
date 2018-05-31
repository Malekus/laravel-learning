<?php

namespace Tests\Unit;

use App\Http\Controllers\ProblemeController;
use App\Personne;
use App\Probleme;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PersonneTest extends TestCase
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

    public function testCreatePersonne(){
        $personne = factory(Personne::class)->create();
        $probleme = factory(Probleme::class)->make(['personne_id'=> $personne]);

        dd($probleme);
    }
}
