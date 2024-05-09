<?php

namespace Tests\Unit;

use Tests\TestCase;

class HomePageControllerTest extends TestCase
{
    /** @test */
    public function it_loads_the_home_page()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSeeText('Produkty');
    }

    /** @test */
    public function it_loads_the_contact_footer_page()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSeeText('2024 E-shop');
}
}