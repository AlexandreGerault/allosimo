<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomepageTest extends TestCase
{
    public function test_redirected_to_login_if_guest()
    {
        $response = $this->get('/');

        $response->assertRedirect(route('login'));
    }

    public function test_homepage_when_connected()
    {
        $this->actingAs(User::factory()->create());
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
