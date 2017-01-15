<?php
namespace SyedOmair\Bundle\MyAppBundle\Exception;

class UserServiceException  extends CustomException
{
    public function createUserAlreadyExists()
    {
        $this->errorMessage = 'User already exists';
        $this->errorCode = 30001;
        return $this;
    }
}
