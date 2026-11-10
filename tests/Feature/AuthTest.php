<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_page_is_available(): void
    {
        $this->get(route('login'))->assertOk();
    }

    public function test_user_can_login_with_valid_credentials(): void
    {
        $user = User::factory()->create([
            'password' => Hash::make('password'),
        ]);

        $this->post(route('login'), [
            'email' => $user->email,
            'password' => 'password',
        ])->assertRedirect('/');

        $this->assertAuthenticatedAs($user);
    }

    public function test_user_cannot_login_with_invalid_password(): void
    {
        $user = User::factory()->create();

        $this->from(route('login'))
            ->post(route('login'), [
                'email' => $user->email,
                'password' => 'wrong-password',
            ])
            ->assertRedirect(route('login'))
            ->assertSessionHasErrors('email');

        $this->assertGuest();
    }

    public function test_registered_user_gets_reader_role(): void
    {
        $this->post(route('register'), [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ])->assertRedirect('/');

        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com',
            'role' => User::ROLE_READER,
        ]);
    }

    public function test_admin_panel_is_forbidden_for_readers(): void
    {
        $reader = User::factory()->create(['role' => User::ROLE_READER]);

        $this->actingAs($reader)
            ->get(route('admin.main.index'))
            ->assertNotFound();
    }

    public function test_admin_panel_is_forbidden_when_role_is_missing(): void
    {
        $user = User::factory()->create(['role' => null]);

        $this->actingAs($user)
            ->get(route('admin.main.index'))
            ->assertNotFound();
    }

    public function test_admin_panel_is_available_for_admins(): void
    {
        $admin = User::factory()->create(['role' => User::ROLE_ADMIN]);

        $this->actingAs($admin)
            ->get(route('admin.main.index'))
            ->assertOk();
    }
}
