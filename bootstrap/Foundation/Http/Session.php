<?php

namespace Boot\Foundation\Http;

use Symfony\Component\HttpFoundation\Session\Session as SymfonySession;

class Session extends SymfonySession
{
    public function flash($key = false, $value = false)
    {
        if (!$key and !$value) {
            return $this->getFlashBag();
        }

        if ($key and !$value) {
            return data_get($this->getFlashBag()->all(), $key);
        }

        if ($key and $value) {
            return $this->getFlashBag()->add($key, $value);
        }
    }
}
