<?php

namespace WebsiteBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class WebsiteController extends ParentController
{
    /**
     * @Route(
     *     "/",
     *     name="website_home"
     * )
     */
    public function HomeAction()
    {
        return $this->render('WebsiteBundle:Website:index.html.twig');
    }
}
