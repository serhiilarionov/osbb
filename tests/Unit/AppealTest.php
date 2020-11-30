<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\Appeal;
use PHPUnit\Framework\TestCase;

class AppealTest extends TestCase
{
    public function testCreatedAppeal()
    {
        $user = new User([
            'name' => 'test',
            'email' => 'test@test.com',
            'password' => 'test',
        ]);

        $appeal = new Appeal([
            'title' => 'test',
            'text' => 'test test',
            'client_id' => $user->id,
        ]);
        
        $this->assertEquals('test', $appeal->title);
        $this->assertEquals('test test', $appeal->text);
    }

}
