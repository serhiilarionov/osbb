<?php

namespace Tests\Unit;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    use WithFaker, HasFactory;

    public function testCreateUser()
    {
        $user = new User([
            'name' => 'test',
            'email' => 'test@test.com',
            'password' => 'test',
        ]);

        $this->assertEquals('test', $user->name);
        $this->assertEquals('test@test.com', $user->email);
    }

}
