<?php

namespace Ben\LogementBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PersonType extends AbstractType
{
    private $type;

    public function __construct($type = 'nouveau')
    {
        $this->type = $type;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('n_dossier')
            ->add('family_name')
            ->add('first_name')
            ->add('email')
            ->add('bird_day', 'date', array('widget' => 'single_text'))
            ->add('gender', 'choice', array('choices' => array('Garçon' => 'Garçon','Fille' => 'Fille'),
                'required' => false,))
            ->add('address')
            ->add('city')
            ->add('tel')
            ->add('etablissement')
            ->add('niveau_etude', 'choice', array('choices' => array('S1'=>'S1' ,'S2'=>'S2' ,'S3'=>'S3' ,'S4'=>'S4' ,'S5'=>'S5' ,'S6'=>'S6' ,'S7'=>'S7' ,'S8'=>'S8' ,'S9'=>'S9' ,'S10'=>'S10', '>=S11'=>'>=S11'),
                'required' => true,))
            ->add('diplome');

         if($this->type ==='nouveau')
            $builder
            ->add('parents_revenu')
            ->add('bro_sis_number')
            ->add('exellence')
            ->add('obtention_bac', 'choice', array('choices' => array('2006'=>'2006','2007'=>'2007','2008'=>'2008','2009'=>'2009','2010'=>'2010','2011'=>'2011','2012'=>'2012','2013'=>'2013','2014'=>'2014'),
                'required' => true,));

         if($this->type ==='special')
            $builder
            ->add('condition_special');

        if($this->type ==='etranger')
            $builder
            ->add('contry')
            ->add('passport')
            ->add('carte_sejour')
        ;
        if($this->type !=='etranger')
            $builder
            ->add('cin')
            ->add('cne')
        ;
            $builder
            ->add('type', 'hidden');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ben\LogementBundle\Entity\Person'
        ));
    }

    public function getName()
    {
        return 'ben_persontype';
    }
}
