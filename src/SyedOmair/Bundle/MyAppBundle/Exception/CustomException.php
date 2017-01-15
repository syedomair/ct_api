<?php
namespace SyedOmair\Bundle\MyAppBundle\Exception;

class CustomException extends \Exception
{
    protected $errorMessage;
    protected $errorCode;

    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    public function getErrorCode() 
    {
        return $this->errorCode;
    }
}
