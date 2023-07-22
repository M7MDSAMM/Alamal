<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Route;


class ApplicationTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        // $routes = collect(app('router')->getRoutes())->map(function ($route) {
        //     return $route->uri();
        // });

        // // Randomly select 5 routes
        // $randomRoutes = $routes->random(5);

        // foreach ($randomRoutes as $uri) {
        //     $response = $this->get($uri);

            // $response->assertStatus();
        // }
    }

    public function testLoginPage()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    public function testPatientLoginPage()
    {
        $response = $this->get('/patient/login');
        $response->assertStatus(200);
    }


}
