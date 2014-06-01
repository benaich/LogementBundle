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
            ->add('niveau_etude')
            ->add('diplome');

         if($this->type ==='nouveau')
            $builder
            ->add('parents_revenu')
            ->add('bro_sis_number')
            ->add('exellence');

         if($this->type ==='special')
            $builder
            ->add('condition_special', 'choice', array('choices' => array(
                       'Handicapé' => 'Handicapé',
                       'Ancien combattant ' => 'Ancien combattant',
                       'Ancien militaire' => 'Ancien militaire',
                       'Pupille de l’état' => 'Pupille de l’état',
                       'Gendarmerie Royale militaire' => 'Gendarmerie Royale militaire'),
                'required' => false,));

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
