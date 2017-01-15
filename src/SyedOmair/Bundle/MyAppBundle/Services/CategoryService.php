<?php
namespace SyedOmair\Bundle\MyAppBundle\Services;

use SyedOmair\Bundle\MyAppBundle\Entity\Category;

class CategoryService extends BaseService
{
    public function __construct($entityManager, $errorService)
    {
        parent::__construct($entityManager, $errorService);
    }

    public function getACategory($id)
    {
        $category =  $this->entityManager->getRepository('MyAppBundle:Category')->findOneById($id);

        $dataArray = array('category' => $this->responseArray($category));
        return $this->successResponse($dataArray);
    }

    public function getCategoriesForCatalog($catalog_id, $page, $limit,  $orderby, $sort)
    {
        $categories = $this->entityManager->getRepository('MyAppBundle:Category')->findCategoriesForCatalog($catalog_id, $page, $limit, $orderby, $sort);
        $categoriesCount = $this->entityManager->getRepository('MyAppBundle:Category')->findCategoriesForCatalogCount($catalog_id);
        
        $rtnCategories = array();
        $i=0;
        foreach($categories as $key=>$category)
        {
            $rtnCategories[$i] = $this-> responseArray($category);
            $i++;
        }
        return $this->successResponseList($rtnCategories, $categoriesCount['category_count'], $page, $limit);
    }

    public function create($parameters, $catalog_id)
    {
        $catalog = $this->entityManager->getRepository('MyAppBundle:Catalog')->findOneById($catalog_id);

        $category = new Category();
        $category->setName($parameters['name']);
        $category->setCatalog($catalog);
        $this->entityManager->persist($category);
        $this->entityManager->flush();

        $dataArray = array('category_id' => $category->getId());
        return $this->successResponse($dataArray);
    }

    private function responseArray($category)
    {
        $responseArray = array(
            'id' => $category->getId(),
            'name' => $category->getName(),
            'catalog_name' => $category->getCatalog()->getName()
        );
    return $responseArray;
    }
}
