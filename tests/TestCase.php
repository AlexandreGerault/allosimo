<?php

namespace Tests;

use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        (new DatabaseSeeder())->call(RoleSeeder::class);
    }

    public function actAsAdmin()
    {
        $user = User::factory()->create();
        $user->assignRole('administrateur');
        $this->actingAs($user);
    }
}
