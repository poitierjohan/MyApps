<?php

namespace CodeLibrary\CodeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class CodeController extends Controller
{
    /**
     * @Route(
     *     "/admin/codeLibrary/code/dashboard",
     *     name="admin_codeLibrary_code_dashboard"
     * )
     */
    public function dashboardAction()
    {
        return $this->render("CodeLibraryCodeBundle:Code:dashboard.html.twig");
    }
}
