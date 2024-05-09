<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }

     /** @test */
     public function a_user_can_register()
     {
         $response = $this->post('/register', [
             'name' => 'Test User',
             'email' => 'test@example.com',
             'password' => 'password',
             'password_confirmation' => 'password',
         ]);
 
         $response->assertRedirect('/home');
         $this->assertCount(1, User::all());
     }

     /** @test */
    public function a_user_cannot_register_with_invalid_data()
    {
        $response = $this->post('/register', [
            'name' => '',
            'email' => 'not an email',
            'password' => 'short',
            'password_confirmation' => 'different',
        ]);

        $response->assertSessionHasErrors(['name', 'email', 'password']);
        $this->assertCount(0, User::all());
    }
}
