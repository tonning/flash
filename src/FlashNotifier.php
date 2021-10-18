<?php

namespace Tonning\Flash;

use Illuminate\Support\Collection;
use Illuminate\Support\HtmlString;

class FlashNotifier
{
    protected Collection $messages;

    function __construct(protected SessionStore $session)
    {
        $this->messages = collect();
    }

    public function info(string|Message $message)
    {
        $this->message($message, 'info');
    }

    public function success(string|Message $message)
    {
        $this->message($message, 'success');
    }

    public function error(string|Message $message)
    {
        $this->message($message, 'error');
    }

    public function warning(string|Message $message, string $title = null)
    {
        $this->message($message, 'warning', $title);
    }

    protected function message(string|Message $message, string $level, string $title = null)
    {
        if (! $message instanceof Message) {
            $message = new Message($message, $level, $title);
        }

        if (! $this->messages->has($level)) {
            $this->messages->put($level, new MessageBag([$message]));
        } else {
            $this->messages[$level]->push($message);
        }

        return $this->flash();
    }

    public function hasAny(): bool
    {
        return count($this->messages) > 0 || (config('flash.display_errors') && view()->getShared()['errors']->count() > 0);
    }

    protected function flash()
    {
        $this->session->flash('tonning.flash.notifications', $this->messages);

        return $this;
    }

    public function render()
    {
        return view('flash::messages');
    }

    public function __toString() : string
    {
        return new HtmlString($this->render());
    }
}
