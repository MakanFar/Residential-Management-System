<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;

class LoginTest extends TestCase
{
    public function test_login_page_render()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }


    public function test_dashboard_page_render_aftr_login()
    {
        //make new user and login to see the dashboard 
        $user = new User();
        $user->fillable = ['name', 'name@mail.com', '1234', ' 0'];
        $this->actingAs($user);

        $response = $this->get('/dashboard');
        $response->assertStatus(200);
    }
}
