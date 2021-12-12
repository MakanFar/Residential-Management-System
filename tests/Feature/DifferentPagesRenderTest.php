<?php

namespace Tests\Feature;

use Tests\TestCase;

class DifferentPagesRenderTest extends TestCase
{

    public function test_register_page_render()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
    }


    public function test_login_page_render()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }


    public function test_main_page_render()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_myaccount_page_render()
    {
        $response = $this->get('/myaccount');
        $response->assertStatus(200);
    }


    public function test_logout()
    {
        $response = $this->get('/logout');
        $response->assertStatus(405);
    }
}
