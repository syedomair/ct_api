<?php
namespace CrowdTech\Bundle\AppBundle\Services;

use CrowdTech\Bundle\AppBundle\Entity\Organization;

class OrganizationService extends BaseService
{
    public function __construct($entityManager, $errorService)
    {
        parent::__construct($entityManager, $errorService);
    }

    public function getAOrganization($id)
    {
        $organization =  $this->entityManager->getRepository('AppBundle:Organization')->findOneById($id);

        $dataArray = array('organization' => $this->responseArray($organization));
        return $this->successResponse($dataArray);
    }

    public function getOrganizationsForClient($client_id, $page, $limit,  $orderby, $sort)
    {
        $organizations = $this->entityManager->getRepository('AppBundle:Organization')->findOrganizationForClient($client_id, $page, $limit, $orderby, $sort);
        $organizationCount = $this->entityManager->getRepository('AppBundle:Organization')->findOrganizationForClientCount($client_id);
        
        $rtnCategories = array();
        $i=0;
        foreach($organizations as $key=>$organization)
        {
            $rtnOrganizations[$i] = $this-> responseArray($organization);
            $i++;
        }
        return $this->successResponseList($rtnOrganizations, $organizationCount['organization_count'], $page, $limit);
    }

    public function create($parameters, $client_id)
    {
        $client = $this->entityManager->getRepository('AppBundle:Client')->findOneById($client_id);

        $organization = new Organization();
        $organization->setName($parameters['name']);
        $organization->setClient($client);
        $this->entityManager->persist($organization);
        $this->entityManager->flush();

        $dataArray = array('organization_id' => $organization->getId());
        return $this->successResponse($dataArray);
    }

    private function responseArray($organization)
    {
        $responseArray = array(
            'id' => $organization->getId(),
            'name' => $organization->getName(),
            'client_name' => $organization->getClient()->getName()
        );
    return $responseArray;
    }
}
