<?php

namespace CoreBundle\Controller;

use Dywee\CoreBundle\Controller\ParentController as DyweeParentController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class ParentController extends DyweeParentController
{
    /**
     * Overwrite de handelForm adapté pour
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