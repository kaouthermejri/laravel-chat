<?php

namespace Matthewbdaly\LaravelChat\Eloquent\Models;

use Illuminate\Database\Eloquent\Model;
use Matthewbdaly\LaravelChat\Events\NewMessage;

class Message extends Model
{
    protected $dispatchesEvents = [
        'created' => NewMessage::class,
    ];
}
