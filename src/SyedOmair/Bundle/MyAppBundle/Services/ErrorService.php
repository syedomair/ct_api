<?php
namespace SyedOmair\Bundle\MyAppBundle\Services;

use FOS\RestBundle\Util\Codes;
use Symfony\Component\HttpFoundation\Request;
use Exception;
use SyedOmair\Bundle\MyAppBundle\Exception\CustomException;

class ErrorService
{
    public function throwException(CustomException $exception) {

        $data = array(
            'error_code' => $exception->getErrorCode(),
            'error_message' => $exception->geterrorMessage()
        );

        $error = array(
            'status' => $exception->getCode(),
            'data' => $data,
        );
        
        throw new Exception(json_encode($error) ,Codes::HTTP_BAD_REQUEST, NULL);
    }
}
