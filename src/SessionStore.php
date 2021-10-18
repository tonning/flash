<?php

namespace Tonning\Flash;

interface SessionStore
{
    public function flash(string $name, array $data);
}
