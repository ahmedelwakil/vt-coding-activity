<?php

namespace App\Exceptions;

class NWSException extends \Exception
{
    public function __construct(string $message)
    {
        parent::__construct($message, 0, null);
    }
}
