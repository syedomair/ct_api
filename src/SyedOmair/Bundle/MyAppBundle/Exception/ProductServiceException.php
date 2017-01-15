<?php
namespace SyedOmair\Bundle\MyAppBundle\Exception;

class ProductServiceException  extends CustomException
{
    public function getProductsInvalidParameterId()
    {
        $this->errorMessage = 'Parameter missing: id ';
        $this->errorCode = 20001;
        return $this;
    }
}
