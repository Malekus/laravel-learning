<?php

namespace Tests\Unit;

use App\Http\Controllers\ProblemeController;
use App\Personne;
use App\Probleme;
use Illuminate\Support\Facades\Crypt;
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

   public function testIndexPersonne(){

        $response = $this->call('GET', '/api/personnes');
        $personnes = $response->json();
        $this->assertEquals(200, $response->getStatusCode());
        dd(Crypt::decryptString($personnes[0]['sexe']));
   }

}
