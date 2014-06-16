<?php

namespace Ben\LogementBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Ben\LogementBundle\Entity\UniversityRepository;

class UniversityType extends AbstractType
{
    private $type;

    public function __construct($type)
    {
        $this->type = $type;
    }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name','text', array('label' => 'Nom'));
        if($this->type !=='university'){
         $builder->add('parent', 'entity', array(
                        'label' => 'Nom de l\'université',
                        'class' => 'BenLogementBundle:University',
                        'query_builder' => function(UniversityRepository $er) {
                            return $er->createQueryBuilder('u')->where('u.parent IS NULL');
                        })
                    );
        }
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ben\LogementBundle\Entity\University'
        ));
    }

    public function getName()
    {
        return 'ben_logementbundle_universitytype';
    }
}
