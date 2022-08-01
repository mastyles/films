<?php

namespace Tests\Unit;

use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * Testing if '/' route redirects to somewhere else with a 302 status code.
     *
     * @return void
     */
    public function test_login_form()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    /**
     * Testing for the registeration of a new user, password confirmation and then the redirection.
     *
     * @return void
     */
    public function test_new_registeration()
    {
        $response = $this->post('/register', [
            'first_name' => 'Ahmed',
            'last_name' => 'Khan',
            'email' => 'khan100@gmail.com',
            'password' => 'password1234',
            'password_confirmation' => 'password1234'
        ]);

        $response->assertRedirect('/');
    }

}
