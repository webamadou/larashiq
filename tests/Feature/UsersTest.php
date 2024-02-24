<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class UsersTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        Role::create(['name' => Role::SIMPLE_USER]);
        Role::create(['name' => Role::SUPER_ADMIN]);
    }

    /**
     * @test
     * @group user_tests
     */
    public function a_user_cannot_be_created_if_not_superadmin()
    {
        // first test if user cannot be created if not logged in
        $response = $this->post('backoffice/users', $this->setData());
        $response->assertRedirect('/login');
        $this->assertCount(0, User::all());

        // test if user cannot be created if not super-admin
        $user = User::factory()->create();
        Role::updateOrCreate(['name' => Role::ADMIN]);
        $user->assignRole(Role::ADMIN);
        $response = $this->actingAs($user)->post('backoffice/users', $this->setData());

        $response->assertStatus(403);
        $this->assertCount(1, User::all());
    }

    /**
     * @test
     * @group user_tests
     */
    public function a_user_can_be_create_if_superadmin()
    {
        $user = User::factory()->create();
        $user->assignRole(Role::SUPER_ADMIN);
        $response = $this->actingAs($user)->post('backoffice/users', $this->setData());

        $response->assertRedirect(route('bo.users.index'));
        $this->assertCount(2, User::all());
    }

    /**
     * @test
     * @group user_tests
     */
    public function a_user_can_be_updated_if_superadmin()
    {
        $currentUser = User::factory()->create();
        $currentUser->assignRole(Role::SUPER_ADMIN);
        $response = $this->actingAs($currentUser)->post('backoffice/users', $this->setData());
        $user = User::find(2);

        $this->assertEquals($this->setData()['name'], $user->name);
        $data = $this->setData();
        $user->name = 'Edited name';
        $response = $this->actingAs($currentUser)->put("backoffice/users/{$user->id}", $user->toArray());
        $user2 = User::find(2);

        $this->assertEquals('Edited name', $user2->name);
    }

    /**
     * @test
     * @group user_test
     */
    public function a_super_admin_cannot_be_deleted()
    {
        $currentUser = User::factory()->create();
        $this->assertDatabaseCount('users', 1);
        $currentUser->assignRole(Role::SUPER_ADMIN);

        $response = $this->actingAs($currentUser)->delete('backoffice/users/'.$currentUser->id);

        $response->assertRedirect(route('bo.users.index'));
        $this->assertDatabaseCount('users', 1);
    }

    /**
     * @test
     * @group user_test
     */
    public function a_super_admin_can_be_deleted_only_if_superadmin()
    {
        User::factory()->count(2)->create();
        $currentUser = User::find(1);
        $response = $this->actingAs($currentUser)->delete('backoffice/users/2');
        $this->assertEquals($response->status(), 403);
        // On assigne le role super admin
        $currentUser->assignRole(Role::SUPER_ADMIN);

        $this->assertDatabaseCount('users', 2);

        $response = $this->actingAs($currentUser)->delete('backoffice/users/2');
        $this->assertDatabaseCount('users', 1);
    }

    private function setData()
    {
        return [
            'name' => 'Fofana',
            'first_name' => 'Moussa',
            'email' => 'moussa_fofana@email.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'profile_type' => null,
            'phone_number' => '+221772132209',
            'gender' => 0,
        ];
    }
}
