<?php


namespace App\Exceptions;

use Exception;


class PetApiException extends Exception
{
    protected $response;

    public function __construct($message, $response = null, $code = 0, Exception $previous = null)
    {
        $this->response = $response;
        parent::__construct($message, $code, $previous);
    }

    public function getResponse()
    {
        return $this->response;
    }
}
