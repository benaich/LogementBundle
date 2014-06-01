<?php

namespace Ben\LogementBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RoomType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array('label'  => 'Nom de la chambre'))
            ->add('capacity', 'text', array('label'  => 'Capacité'))
            ->add('free', 'text', array('label'  => 'Place libre'))
            ->add('floor', 'text', array('label'  => 'N° d\'étage'))
            ->add('block', null, array('label'  => 'Nom du pavillon'))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ben\LogementBundle\Entity\Room'
        ));
    }

    public function getName()
    {
        return 'ben_logementbundle_roomtype';
    }
}
