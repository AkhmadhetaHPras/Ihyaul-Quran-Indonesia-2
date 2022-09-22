<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;

class AdminTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_show_index()
    {
        // Setup
        $user = User::find(1);
        $this->be($user);

        // Do Something
        $response = $this->get('/admin/admin');

        // Assert
        $response->assertStatus(200);
        $response->assertSeeText('Admin / Daftar');
        $response->assertSeeText('#ID');
    }

    public function test_admin_datatable()
    {
        // Setup
        $user = User::find(1);
        $this->be($user);

        // Do Something
        $response = $this->getJson('/admin/admin', ['HTTP_X-Requested-With' => 'XMLHttpRequest']);

        // Assert
        $response->assertJsonFragment(['name' => 'Yukina Sato']);
        $response->assertStatus(200);
    }
}
