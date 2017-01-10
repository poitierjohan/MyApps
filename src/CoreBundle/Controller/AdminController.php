<?php

namespace CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;

class AdminController extends Controller
{

    public function dropdownSheetAction()
    {
        $em = $this->getDoctrine()->getManager();
        $sheets = $em->getRepository('ERPDocumentBundle:Sheet')->findByUser($this->getUser());

        $session = new Session();

        return $this->render('@Core/Navbar/dropdownSheet.html.twig', [
            "sheets" => $sheets,
            "actualSheet" => $session->get('activeSheet')
        ]);
    }
}