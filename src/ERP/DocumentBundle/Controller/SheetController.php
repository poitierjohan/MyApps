<?php

namespace ERP\DocumentBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\HttpFoundation\Request;

class SheetController extends ParentController
{
    /**
     * @Route(
     *     "admin/erp/document/sheet/switch",
     *     name="admin_erp_document_sheet_switch"
     * )
     */
    public function switchAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $sheets = $em->getRepository("ERPDocumentBundle:Sheet")->findByUser($this->getUser());

        $form = $this->get('form.factory')->createBuilder()
            ->add('sheet', ChoiceType::class, [
                "choices" => $sheets,
                "label" => "Journal",
                "choice_label" => "name"
            ])
            ->setAction($this->generateUrl('admin_erp_document_sheet_switch'))
            ->getForm();

        if ($form->handleRequest($request)->isValid())
        {
            $this->setActiveSheet($form->getViewData()['sheet']);
        }

        return $this->render("@ERPDocument/Sheet/switch.html.twig", [
            "form" => $form->createView()
        ]);
    }

    /**
     * @Route(
     *     "admin/erp/document/sheet",
     *     name="admin_erp_document_sheet_table"
     * )
     */
    public function tableAction($parameters = null)
    {
        $parameters['repository_method'] = "findByUser";
        $parameters['repository_argument'] = $this->getUser();
        return parent::tableAction($parameters); // TODO: Change the autogenerated stub
    }

    /**
     * @Route(
     *     "admin/erp/document/sheet/add",
     *     name="admin_erp_document_sheet_add"
     * )
     */
    public function addAction(Request $request, $parameters = null)
    {
        $parameters['redirectTo'] = "referer";
        $parameters['formAction'] = $this->generateUrl('admin_erp_document_sheet_add');

        return parent::addAction($request, $parameters);
    }

    /**
     * @Route(
     *     "admin/erp/document/sheet/update/{id}",
     *     name="admin_erp_document_sheet_update",
     *     requirements={"id" = "\d+"}
     * )
     */
    public function updateAction($id, Request $request, $parameters = null)
    {
        $parameters['redirectTo'] = "referer";
        $parameters['formAction'] = $this->generateUrl('admin_erp_document_sheet_update', [
            "id" => $id
        ]);

        return parent::updateAction($id, $request, $parameters);
    }

    /**
     * @Route(
     *     "admin/erp/document/sheet/delete/{id}",
     *     name="admin_erp_document_sheet_delete",
     *     requirements={"id" = "\d+"},
     *     options = {"expose" = true}
     * )
     */
    public function deleteAction($id, Request $request, $parameters = null)
    {
        $parameters['redirectTo'] = $this->generateUrl('admin_erp_document_sheet_table');

        return parent::deleteAction($id, $request, $parameters);
    }
}
