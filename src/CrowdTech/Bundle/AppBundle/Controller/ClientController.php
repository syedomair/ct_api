<?php
namespace CrowdTech\Bundle\AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use FOS\RestBundle\Request\ParamFetcher;
use FOS\RestBundle\Controller\Annotations\QueryParam;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;

class ClientController  extends BaseFOSRestController
{
    /**
     *  Get Clients 
     *             
     * @QueryParam(name="page", requirements="\d+", default="0", description="record offset.")
     * @QueryParam(name="limit", requirements="\d+", default="100", description="number of records.")
     * @QueryParam(name="orderby", requirements="[a-z]+", allowBlank=true, default="name", description="OrderBy field")
     * @QueryParam(name="sort", requirements="(asc|desc)+", allowBlank=true, default="asc", description="Sorting order")
     *             
     * @Route("/clients")
     * @Method("GET")
     */
    public function getClientsAction(ParamFetcher $paramFetcher) 
    {
        $page = $paramFetcher->get('page');
        $limit = $paramFetcher->get('limit');
        $orderby = $paramFetcher->get('orderby');
        $sort = $paramFetcher->get('sort');

        return $this->handleView($this->createView($this->get('client_service')->getClients($page, $limit, $orderby, $sort)));
    }

    /**
     * Create a new Client
     *
     * @Route("/clients")
     * @Method("POST")
     */
    public function postClientAction(Request $request) 
    {
        $parameters = json_decode($request->getContent(), true);
        return $this->handleView($this->createView($this->get('client_service')->create($parameters)));
    }

    /**
     * Retrieve information about this Client
     *    
     * @Route("/client/{client_id}")
     * @Method("GET")
     */
    public function getClientAction($client_id) 
    {
        return $this->handleView($this->createView($this->get('client_service')->getAClient($client_id)));
    }
}
