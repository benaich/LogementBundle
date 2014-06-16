<?php

namespace Ben\LogementBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BlockType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array('label'  => 'Nom du pavillon'))
            ->add('floors', 'text', array('label'  => 'Nombre d\'etages'))
            ->add('type', 'choice', array('choices' => array('Garçon'=>'Garçon', 'Fille'=>'Fille')))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ben\LogementBundle\Entity\Block'
        ));
    }

    public function getName()
    {
        return 'ben_logementbundle_blocktype';
    }
}
