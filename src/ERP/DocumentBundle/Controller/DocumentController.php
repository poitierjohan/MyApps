<?php

namespace ERP\DocumentBundle\Controller;

use ERP\DocumentBundle\Entity\Document;
use ERP\DocumentBundle\Form\DocumentType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class DocumentController extends ParentController
{
    /**
     * @Route(
     *     "admin/erp/document/document",
     *     name="admin_erp_document_document_table"
     * )
     */
    public function tableAction($parameters = null)
    {
        $activeSheet = $this->get('session')->get('activeSheet');
        if ($activeSheet)
        {
            $parameters['repository_method'] = "findBySheet";
            $parameters['repository_argument'] = $this->getActiveSheet();
        }

        return parent::tableAction($parameters);
    }

    /**
     * @Route(
     *     "admin/erp/document/document/add/{id}",
     *     name="admin_erp_document_document_add"
     * )
     */
    public function addFromParentAction($id, Request $request, $parameters = null)
    {
        $em = $this->getDoctrine()->getManager();
        $sheet = $em->getRepository('ERPDocumentBundle:Sheet')->findOneById($id);
        $lastDocument = $em->getRepository('ERPDocumentBundle:Document')->findLastDocument($sheet);
        //dump($lastDocument);
        if (!$lastDocument)
            $number = date("Y").'0001';
        else
        {
            $year = substr($lastDocument[0]->getNumber(), 0, 4);
            if ($year != date("Y"))
                $number = date("Y").'0001';
            else
                $number = $lastDocument[0]->getNumber() + 1;
        }

        $document = new Document();
        $document->setSheet($sheet);
        $document->setNumber($number);

        $form = $this->get('form.factory')->createBuilder('ERP\DocumentBundle\Form\DocumentType', $document)
            ->setAction($this->generateUrl('admin_erp_document_document_add', ["id" => $id]))
            ->getForm();

        if ($form->handleRequest($request)->isValid())
        {
            $em->persist($document);
            $em->flush();

            return $this->redirectToRoute('admin_erp_document_document_table');
        }

        return $this->render("@ERPDocument/Document/add.html.twig", [
            "form" => $form->createView()
        ]);
    }

    /**
     * @Route(
     *     "admin/erp/document/document/update/{id}",
     *     name="admin_erp_document_document_update",
     *     requirements={"id" = "\d+"}
     * )
     */
    public function updateAction($id, Request $request, $parameters = null)
    {
        $parameters['redirectTo'] = "referer";
        $parameters['formAction'] = $this->generateUrl('admin_erp_document_document_update', [
            "id" => $id
        ]);

        return parent::updateAction($id, $request, $parameters);
    }

    /**
     * @Route(
     *     "admin/erp/document/document/delete/{id}",
     *     name="admin_erp_document_document_delete",
     *     requirements={"id" = "\d+"},
     *     options = {"expose" = true}
     * )
     */
    public function deleteAction($id, Request $request, $parameters = null)
    {
        $parameters['redirectTo'] = $this->generateUrl('admin_erp_document_document_table');

        return parent::deleteAction($id, $request, $parameters);
    }
}
