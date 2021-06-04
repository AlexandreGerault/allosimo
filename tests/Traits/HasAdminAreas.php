<?php

namespace Tests\Traits;

use App\Models\User;

trait HasAdminAreas
{
    protected string $createPage;
    protected string $storePage;

    /**
     * CREATE A RESTAURANT
     */
    public function test_a_guest_cannot_show_create_page()
    {
        $response = $this->get($this->createPage);

        $response->assertRedirect();
    }

    public function test_a_non_administrator_cannot_show_the_page()
    {
        $user = User::factory()->create();
        $user->assignRole('client');
        $this->actingAs($user);

        $response = $this->get($this->createPage);

        $response->assertForbidden();
    }

    public function test_an_administrator_can_show_the_page()
    {
        $user = User::factory()->create();
        $user->assignRole('administrateur');
        $this->actingAs($user);

        $response = $this->get($this->createPage);

        $response->assertSuccessful();
    }

    public function test_a_guest_cannot_store()
    {
        $response = $this->post($this->storePage);

        $response->assertRedirect();
    }

    public function test_a_non_admin_user_cannot_store()
    {
        $user = User::factory()->create();
        $user->assignRole('client');
        $this->actingAs($user);

        $response = $this->post($this->storePage);

        $response->assertForbidden();
    }
}
