<?php

namespace ERP\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('code', null, [
                "label" => "Code TIERS"
            ])
            ->add('society', null, [
                "label" => "Société"
            ])
            ->add('lastName', null, [
                "label" => "NOM"
            ])
            ->add('firstName', null, [
                "label" => "Prénom"
            ])
            ->add('tvaNumber', null, [
                "label" => "N° TVA"
            ])
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ERP\UserBundle\Entity\User'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'erp_userbundle_user';
    }


}
