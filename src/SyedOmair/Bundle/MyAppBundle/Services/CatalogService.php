<?php
namespace SyedOmair\Bundle\MyAppBundle\Services;

use SyedOmair\Bundle\MyAppBundle\Entity\Catalog;

class CatalogService extends BaseService
{
    public function __construct($entityManager, $errorService)
    {
        parent::__construct($entityManager, $errorService);
    }

    public function getACatalog($id)
    {
        $catalog =  $this->entityManager->getRepository('MyAppBundle:Catalog')->findOneById($id);

        $dataArray = array('catalog' => $this->responseArray($catalog));
        return $this->successResponse($dataArray);
    }

    public function create($parameters)
    {
        $catalog = new Catalog();
        $catalog->setName($parameters['name']);
        $this->entityManager->persist($catalog);
        $this->entityManager->flush();

        $dataArray = array('catalog_id' => $catalog->getId());
        return $this->successResponse($dataArray);
    }

    private function responseArray($catalog)
    {
        $responseArray = array(
            'id' => $catalog->getId(),
            'name' => $catalog->getName()
        );
    return $responseArray;
    }
}
