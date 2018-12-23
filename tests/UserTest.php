<?php

use \PHPUnit\Framework\TestCase;

/**
 * User test case.
 */

class UserTest extends TestCase
{
    public function testReturnsFullName()
    {
        $user = new User;

        $user->first_name = "Teresa";
        $user->sure_name = "Green";
        $this->assertEquals('Teresa Green', $user->getFullName());
    }
    public function testFullNameIsEmptyByDefault()
    {
        $user = new User;
        $this->assertEquals('', $user->getFullName());
    }

    /**
     * @test
     */
    public function user_has_first_name()
    {
        $user = new User;
        $user->first_name = "Teresa";
        $this->assertEquals('Teresa', $user->first_name);
    }

    public function testNotificationIsSent()
    {
        $user = new User;
        $mock_mailer = $this->createMock(Mailer::class);
        $mock_mailer->method('sendMessage')
            ->willReturn(true);
        $user->email = 'dave@example.com';
        $this->assertTrue($user->notify('Hello'));
    }
}

