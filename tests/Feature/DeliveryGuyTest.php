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
        $this->withoutExceptionHandling();
        $this->actAsAdmin();

        $inputs   = User::factory()->raw();
        $inputs   += ['password_confirmation' => $inputs['password']];
        $response = $this->post($this->storePage, $inputs);

        $deliveryGuys = User::query()->where('email', $inputs['email'])->firstOrFail();

        $response->assertRedirect();
        $this->assertDatabaseCount('users', 2);
        $this->assertTrue($deliveryGuys->hasRole('livreur'));
    }
}
