<?php

namespace Tests\Feature;

use Database\Seeders\DatabaseSeeder;
use Tests\TestCase;

class CardTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_registration_card(): void
    {
        $response = $this->get('/get/card/number/1234');

        $response->assertJson([
            "success" => "Berhasil",
        ]);

        $response->assertStatus(200);
    }

    public function test_accessing_card_success(): void
    {
        $this->seed([DatabaseSeeder::class]);
        $response = $this->get('/check/card/number/1234');

        $response->assertJson([
            "success" => "Berhasil",
        ]);

        $response->assertStatus(200);
    }

    public function test_accessing_card_failed(): void
    {
        $response = $this->get('/check/card/number/453454');

        $response->assertJson([
            "success" => "Gagal",
        ]);

        $response->assertStatus(404);
    }
}
