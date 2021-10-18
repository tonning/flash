<?php

namespace Tonning\Flash;

class Message
{
    public function __construct(public string $message, public string $level, public ?string $title = null)
    {
    }
}
