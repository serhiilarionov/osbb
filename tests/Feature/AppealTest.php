<?php

namespace Tests\Feature;

use App\Models\Appeal;
use App\Models\User;
use Tests\TestCase;

class AppealTest extends TestCase
{
    public function testsUserAreCreatedCorrectly()
    {
        User::factory(1)->create();

        Appeal::factory(1)->create(['client_id' => 1,'in_work' => false]);

        $this->json('PATCH', '/api/appeals/1/takeInWork')
            ->assertStatus(201)
            ->assertJson(['in_work' => true]);

    }
}
