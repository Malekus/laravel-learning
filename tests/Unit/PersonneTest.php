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

   public function testIndexPersonne(){
        $response = $this->get('/personnes');
        $response->assertStatus(200);

   }

   public function testShowPersonne(){
       $response = $this->call('GET', '/personnes/{id}', ['id' => 30]);
       $personne = json_decode($response->getContent());
       dd($personne->id);
   }

}
