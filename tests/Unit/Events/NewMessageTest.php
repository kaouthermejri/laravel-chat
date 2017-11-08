<?php

namespace Tests\Unit\Events;

use Tests\TestCase;
use Tests\Fixtures\User;
use Matthewbdaly\LaravelChat\Eloquent\Models\Message;
use Matthewbdaly\LaravelChat\Events\NewMessage;
use Event;

class NewMessageTest extends TestCase
{
    public function testEvent()
    {
        $msg = new NewMessage;
        $this->assertTrue(method_exists($msg, 'broadcast'));
        $this->assertTrue(method_exists($msg, 'broadcastOn'));
        $this->assertTrue(method_exists($msg, 'dispatch'));
        $this->assertTrue(method_exists($msg, 'dontBroadcastToCurrentUser'));
        $this->assertTrue(method_exists($msg, 'broadcastToEveryone'));
    }
}
