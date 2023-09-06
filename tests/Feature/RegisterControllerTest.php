<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Tymon\JWTAuth\Facades\JWTAuth;

class RegisterControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_register()
    {
        $response = $this->json('POST', '/api/register', [
            'name' => 'John Doe',
            'email' => 'joashn@examplae.com',
            'password' => 'secret12345',
            'password_confirmation' => 'secret12345',
        ]);

        $response->assertStatus(201); // Check for a successful registration
    }
}
