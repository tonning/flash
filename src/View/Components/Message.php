<?php

namespace Tonning\Flash\View\Components;

use Illuminate\View\Component;
use Tonning\Flash\MessageBag;

class Message extends Component
{
    public ?string $title;

    public function __construct(public MessageBag $messages, public string $level)
    {
        $this->title = $this->messages->first()->title ?? '';
    }

    public function render()
    {
        return view('flash::' . $this->level);
    }
}
