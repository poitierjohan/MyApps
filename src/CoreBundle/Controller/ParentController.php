<?php

namespace CoreBundle\Controller;

use Dywee\CoreBundle\Controller\ParentController as DyweeParentController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

class ParentController extends DyweeParentController
{
    public function getActiveSheet()
    {
        $session = new Session();
        return $session->get('activeSheet');
    }

    public function setActiveSheet($sheet)
    {
        $session = new Session();
        return $session->set('activeSheet', $sheet);
    }

    /**
     * Overwrite de handelForm adapté pour la gestion des User
     */
    public function handleForm($object, Request $request, $parameters = null){
        $new = !is_numeric($object->getId());
        if($new) {
            if(method_exists($object, 'setUser')){
                $object->setUser($this->getUser());
            }
        }

        return parent::handleForm($object, $request, $parameters);
    }
}