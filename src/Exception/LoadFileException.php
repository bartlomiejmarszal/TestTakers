<?php

namespace App\Exception;


use Throwable;

class LoadFileException extends \Exception
{
    public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        $message = 'File can not be loaded! ' . $message;
        parent::__construct($message, $code, $previous);
    }
}