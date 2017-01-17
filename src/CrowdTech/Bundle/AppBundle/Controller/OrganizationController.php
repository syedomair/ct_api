<?php
namespace CrowdTech\Bundle\AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use FOS\RestBundle\Request\ParamFetcher;
use FOS\RestBundle\Controller\Annotations\QueryParam;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;

class OrganizationController  extends BaseFOSRestController
{
    /**
     *  Get Organizations 
     *             
     * @QueryParam(name="page", requirements="\d+", default="0", description="record offset.")
     * @QueryParam(name="limit", requirements="\d+", default="100", description="number of records.")
     * @QueryParam(name="orderby", requirements="[a-z]+", allowBlank=true, default="name", description="OrderBy field")
     * @QueryParam(name="sort", requirements="(asc|desc)+", allowBlank=true, default="asc", description="Sorting order")
     *             
     * @Route("/organizations/client/{client_id}")
     * @Method("GET")
     */
    public function getOrganizationsAction($client_id, ParamFetcher $paramFetcher) 
    {
        $page = $paramFetcher->get('page');
        $limit = $paramFetcher->get('limit');
        $orderby = $paramFetcher->get('orderby');
        $sort = $paramFetcher->get('sort');

        return $this->handleView($this->createView($this->get('organization_service')->getOrganizationsForClient($client_id, $page, $limit, $orderby, $sort)));
    }

    /**
     * Create a new Organization
     *
     * @Route("/organizations/{client_id}")
     * @Method("POST")
     */
    public function postOrganizaitonsAction(Request $request, $client_id) 
    {
        $parameters = json_decode($request->getContent(), true);
        return $this->handleView($this->createView($this->get('organization_service')->create($parameters, $client_id)));
    }

    /**
     * Retrieve information about this Organization
     *    
     * @Route("/organizations/{organization_id}")
     * @Method("GET")
     */
    public function getOrganizationAction($organization_id) 
    {
        return $this->handleView($this->createView($this->get('organization_service')->getAOrganization($organization_id)));
    }
}
