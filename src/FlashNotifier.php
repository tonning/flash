<?php

namespace Tonning\Flash;

use Illuminate\Support\Collection;
use Illuminate\Support\HtmlString;

class FlashNotifier
{
    protected Collection $messages;

    public function __construct(protected SessionStore $session)
    {
        $this->messages = collect();
    }

    public function info(string|Message $message, string $title = null)
    {
        $this->message($message, 'info', $title);
    }

    public function success(string|Message $message, string $title = null)
    {
        $this->message($message, 'success', $title);
    }

    public function error(string|Message $message, string $title = null)
    {
        $this->message($message, 'error', $title);
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
        return count(session('tonning.flash.notifications', [])) > 0 || (config('flash.display_errors') && view()->getShared()['errors']->count() > 0);
    }

    public function all()
    {
        $notifications = session('tonning.flash.notifications', collect());
        $errors = (config('flash.display_errors') ? view()->getShared()['errors'] : []);

        return $notifications->merge($errors);
    }

    protected function flash()
    {
        $this->session->flash('tonning.flash.notifications', $this->messages);

        return $this;
    }

    public function clear()
    {
        session()->forget('tonning.flash.notifications');
    }

    public function render()
    {
        return view('flash::messages');
    }

    public function __toString(): string
    {
        return new HtmlString($this->render());
    }
}
