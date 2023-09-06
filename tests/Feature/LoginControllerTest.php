<?php

namespace Tests\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use Illuminate\Support\Facades\Hash;

class LoginControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_login_with_valid_credentials()
    {

        User::create([
            'name' => 'John Doe',
            'email' => 'joashn@examplae.com',
            'password' => Hash::make("secret12345"),
            'password_confirmation' => 'secret12345'
        ]);
    //     // Send a POST request to the login route with valid credentials
        $response = $this->json('POST', '/api/login', [
            'email' => 'joashn@examplae.com',
            'password' => 'secret12345',
        ]);

        // Check that the response has a valid token
        $response->assertStatus(200)
            ->assertJsonStructure(['user', 'token']);
    }

    public function test_user_cannot_login_with_invalid_credentials()
    {
        // Send a POST request to the login route with invalid credentials
        $response = $this->json('POST', '/api/login', [
            'email' => 'invalid@example.com',
            'password' => 'invalid-password',
        ]);

        // Check that the response indicates unauthorized access (401)
        $response->assertStatus(401)
            ->assertJson(['error' => 'Invalid credentials']);
    }
}