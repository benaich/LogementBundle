<?php

namespace Ben\LogementBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LogementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array('label'  => 'Nom'))
            ->add('city', 'text', array('label'  => 'Ville'))
            ->add('place_etranger', 'number', array('label'  => 'Nombre de place pour les étrangers'))
            ->add('place_ancien', 'number', array('label'  => 'Nombre de place pour les anciens'))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ben\LogementBundle\Entity\Logement'
        ));
    }

    public function getName()
    {
        return 'ben_logementbundle_logementtype';
    }
}
