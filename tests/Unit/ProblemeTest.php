<?php

namespace Tests\Unit;

use Tests\TestCase;

class ProblemeTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testResoudre()
    {
        $response = $this->call('GET', '/probleme/resoudre/20');
        $response->assertStatus(200);
    }
}
