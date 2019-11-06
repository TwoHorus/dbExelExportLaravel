<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;
class RouteTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        //$user = factory(User::class)->create();
        $response = $this->get('test');
        $response->assertStatus(200);
        $response = $this->call('POST', '/handle', ['year' => 2017,'ACTION' => 'Export']);//actingAs($user) NOT NEEDED
        $response->assertStatus(200);
    }
}
