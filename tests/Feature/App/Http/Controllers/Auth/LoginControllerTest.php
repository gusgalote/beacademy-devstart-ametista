<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Logged user should be redirected to the home page
     *
     * @return void
     */
    public function test_logged_user_should_be_redirected_to_home()
    {
        $user = User::factory()->create();

        $this->actingAs($user)->get('/login')->assertRedirect('/me');
    }

    /**
     * Guest should be able to login
     *
     * @return void
     */
    public function test_guest_should_be_able_to_login()
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response->assertRedirect('/me');
    }
}
