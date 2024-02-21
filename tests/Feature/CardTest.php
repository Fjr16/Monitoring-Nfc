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
        // $this->seed([DatabaseSeeder::class]);
        $response = $this->post('/check/card/number', [
            'card_id' => '1234',
            'image' => 'data:image/png;base64,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',
        ]);

        $response->assertJson([
            "success" => "Berhasil",
        ]);

        $response->assertStatus(200);
    }

    // the field card_id and image is requires
    public function test_accessing_card_failed_required(): void
    {
        $response = $this->post('/check/card/number', [
            'card_id' => null,
            'image' => null
        ]);

        $response->assertJson([
            "success" => "Gagal",
        ]);

        $response->assertStatus(404);
    }
    public function test_accessing_card_failed_user_not_found(): void
    {
        $response = $this->post('/check/card/number', [
            'card_id' => '22222222', // unregistered card id
            'image' => 'data:image/png;base64,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',
        ]);

        $response->assertJson([
            "success" => "Gagal",
        ]);

        $response->assertStatus(404);
    }
}
