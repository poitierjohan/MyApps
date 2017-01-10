<?php

namespace ERP\DocumentBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DocumentType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('number', null, [
                "label" => "Numéro de doc."
            ])
            ->add('reference', null, [
                "label" => "Référénce"
            ])
            ->add('user', EntityType::class, [
                "class" => "ERPUserBundle:User",
                "choice_label" => "codeWithCompleteName",
                "label" => "Client",
                "attr" => [
                    "class" => "select2"
                ]
            ])
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ERP\DocumentBundle\Entity\Document'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'erp_documentbundle_document';
    }


}
