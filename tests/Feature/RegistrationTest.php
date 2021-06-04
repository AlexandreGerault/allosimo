<?php

namespace Tests\Feature;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_new_users_can_register()
    {
        $response = $this->post(
            '/register',
            [
                'name'                  => 'Test User',
                'email'                 => 'test@example.com',
                'password'              => 'password',
                'password_confirmation' => 'password',
                'address'               => '36 rue des tilleuls',
                'town'                  => 'Paris',
                'phone'                 => '06 31 31 31 31'
            ]
        );

        $user = User::query()->where('name', '=', 'Test User')->first();
        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
        $this->assertSame(
            $user->roles()->first()->name,
            'client'
        );
    }
}
