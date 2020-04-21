<?php

namespace Boot\Foundation\Mail;

trait Emailable
{
    public static $email_key = 'email';

    public function scopeEmailAddresses($query)
    {
        return $query->get()->pluck(self::$email_key)->all();
    }

    public static function setEmailKey($column = 'email')
    {
        self::$email_key = $column;
    }

    protected function getEmailAddress()
    {
        return static::$email_key;
    }
}
