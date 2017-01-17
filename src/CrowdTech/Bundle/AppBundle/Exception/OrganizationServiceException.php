<?php
namespace CrowdTech\Bundle\AppBundle\Exception;

class OrganizationServiceException  extends CustomException
{
    public function getOrganizationInvalidParameterId()
    {
        $this->errorMessage = 'Parameter missing: id ';
        $this->errorCode = 20001;
        return $this;
    }
}
