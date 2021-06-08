<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Tests\Traits\HasAdminAreas;

class DeliveryGuyTest extends TestCase
{
    use HasAdminAreas;

    protected function setUp(): void
    {
        parent::setUp();

        $this->createPage = route('admin.delivery-guys.create');
        $this->storePage  = route('admin.delivery-guys.store');
    }

    public function test_an_admin_can_store_a_delivery_guy()
    {
        $this->actAsAdmin();

        $inputs   = User::factory()->raw();
        $inputs   += ['password_confirmation' => $inputs['password']];
        $response = $this->post($this->storePage, $inputs);

        $deliveryGuys = User::query()->where('email', $inputs['email'])->firstOrFail();

        $response->assertRedirect();
        $this->assertDatabaseCount('users', 2);
        $this->assertTrue($deliveryGuys->hasRole('livreur'));
    }

    public function test_an_admin_can_remove_a_user_delivery_guy_role()
    {
        $this->actAsAdmin();

        $deliveryGuy = User::factory()->create();
        $deliveryGuy->assignRole('livreur');

        $response = $this->delete(route('admin.delivery-guys.destroy', ['delivery_guy' => $deliveryGuy]));

        $response->assertRedirect();
        $this->assertFalse($deliveryGuy->refresh()->hasRole('livreur'));
    }
}
