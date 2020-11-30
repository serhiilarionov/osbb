<?php

namespace Tests\Feature;

use App\Models\Appeal;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Client\Factory;
use Tests\TestCase;

class UserTest extends TestCase
{

    public function testAppealByUserAreListedCorrectly()
    {
        User::factory(1)->create();

        Appeal::factory()->create([
            'title' => 'firsttest',
            'text' => 'firsttest firsttest',
            'client_id' => 1
        ]);

        Appeal::factory()->create([
            'title' => 'seacondtest',
            'text' => 'seacondtest seacondtest',
            'client_id' => 1
        ]);

        $this->json('GET', '/api/users/1/appeals')
            ->assertStatus(201)
            ->assertJson([
                [ 'title' => 'firsttest', 'text' => 'firsttest firsttest' ],
                [ 'title' => 'seacondtest', 'text' => 'seacondtest seacondtest' ]
            ])
            ->assertJsonStructure([
                '*' => ['id', 'text', 'title', 'created_at', 'updated_at'],
            ]);
    }

    public function testAppealByUserAreListedInorrectly()
    {

        $this->json('GET', '/api/users/1/appeals')
            ->assertStatus(404);
    }

    public function testsUserAreCreatedCorrectly()
    {
        $testUser = [
            'name' => 'corecttest',
            'email' => 'corecttest@corecttest.com',
            'password' => 'corecttest',
        ];

        $this->json('POST', '/api/users', $testUser)
            ->assertStatus(201)
            ->assertJson(['name' => 'corecttest', 'email' => 'corecttest@corecttest.com']);

    }

    public function testsUserAreCreatedIncorrectly()
    {
        $testUser = [
            'name' => 'incorecttest',
            'email' => 'incorecttest@test.com',
        ];

        $this->json('POST', '/api/users', $testUser)
            ->assertStatus(500);

    }

    public function testsAppealAreCreatedCorrectly()
    {
        User::factory(1)->create();

        $testAppeal = [
            'title' => 'corecttest',
            'text' => 'corecttest corecttest',
        ];

        $this->json('POST', '/api/users/1/appeals', $testAppeal)
            ->assertStatus(201)
            ->assertJson(['title' => 'corecttest', 'text' => 'corecttest corecttest']);

    }

    public function testsAppealAreCreatedIncorrectly()
    {
        User::factory(1)->create();

        $testAppeal = [];

        $this->json('POST', '/api/users/1/appeals', $testAppeal)
            ->assertStatus(500);

    }
}
