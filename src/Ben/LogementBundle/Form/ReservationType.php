<?php

namespace Ben\LogementBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('reference')
            ->add('date_from', 'date', array('widget' => 'single_text'))
            ->add('date_to', 'date', array('widget' => 'single_text'))
            ->add('price')
            ->add('person')
            ->add('room')
            ->add('status', 'choice', array('choices' => array('valide' => 'valide','non valide' => 'non valide')))
            ->add('oldroom', 'hidden')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ben\LogementBundle\Entity\Reservation'
        ));
    }

    public function getName()
    {
        return 'reservationtype';
    }
}
