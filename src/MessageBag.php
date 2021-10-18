<?php

namespace Tonning\Flash;

use Illuminate\Support\Collection;

class MessageBag extends Collection
{
    public function __construct(protected array $messages = [])
    {
        $this->items = $this->messages;
    }
}
