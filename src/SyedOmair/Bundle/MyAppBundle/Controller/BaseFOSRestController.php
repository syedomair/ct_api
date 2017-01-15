<?php
namespace SyedOmair\Bundle\MyAppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;

class  BaseFOSRestController extends FOSRestController
{
    protected function createView($returnData){
        $view = new View();
        $view->setData($returnData);  
        $view->setStatusCode($returnData['status']);
        $view->setFormat('json');
        return $view;
    }
}

