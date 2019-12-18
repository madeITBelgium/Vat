<?php
namespace TPWeb\Vat;


use Exception;

class ServiceUnavailableException extends Exception
{
    public function __construct($message, Exception $previous = null)
    {
        parent::__construct($message, 0, $previous);
    }
}
