<?php
namespace CrowdTech\Bundle\AppBundle\Services;

use CrowdTech\Bundle\AppBundle\Entity\Client;

class ClientService extends BaseService
{
    public function __construct($entityManager, $errorService)
    {
        parent::__construct($entityManager, $errorService);
    }

    public function getAClient($id)
    {
        $client =  $this->entityManager->getRepository('AppBundle:Client')->findOneById($id);

        $dataArray = array('client' => $this->responseArray($client));
        return $this->successResponse($dataArray);
    }

    public function create($parameters)
    {
        $client = new Client();
        $client->setName($parameters['name']);
        $this->entityManager->persist($client);
        $this->entityManager->flush();

        $dataArray = array('client_id' => $client->getId());
        return $this->successResponse($dataArray);
    }

    private function responseArray($client)
    {
        $responseArray = array(
            'id' => $client->getId(),
            'name' => $client->getName()
        );
    return $responseArray;
    }
}
