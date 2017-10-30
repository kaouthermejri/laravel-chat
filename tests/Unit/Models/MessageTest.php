<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Tests\Fixtures\User;
use Matthewbdaly\LaravelChat\Eloquent\Models\Message;
use Matthewbdaly\LaravelChat\Events\NewMessage;
use Event;

class MessageTest extends TestCase
{
    public function testCreatingAMessage()
    {
        // Fake events
        Event::fake();

        // Create sender
        $sender = factory(User::class)->create([]);

        // Create recipient
        $recipient = factory(User::class)->create([]);

        // Create message
        $msg = factory(Message::class)->create([
            'sender_id' => $sender->id,
            'sender_type' => get_class($sender),
            'recipient_id' => $recipient->id,
            'recipient_type' => get_class($recipient),
            'content' => 'Hello there',
        ]);

        // Retrieve it
        $saved = Message::first();
        $this->assertNotNull($saved);

        // Check attributes
        $this->assertEquals($sender->id, $saved->sender_id);
        $this->assertEquals($recipient->id, $saved->recipient_id);
        $this->assertEquals('Hello there', $saved->content);

        // Check event dispatched
        Event::assertDispatched(NewMessage::class);
    }
}
