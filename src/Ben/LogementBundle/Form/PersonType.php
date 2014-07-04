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
            ->add('bird_day', 'date', array('widget' => 'single_text'))
            ->add('gender', 'choice', array('choices' => array('Garçon' => 'Garçon','Fille' => 'Fille'),
                'required' => false,))
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
            ->add('city', 'choice', array('choices' => array('Agadir Ida Outanane'=>'Agadir Ida Outanane', 'Al Haouz'=>'Al Haouz', 'Al Houceima'=>'Al Houceima', 'Meknes'=>'Meknes', 'Aousserd'=>'Aousserd', 'Assa Zag'=>'Assa Zag', 'Azilal'=>'Azilal', 'Beni Mellal'=>'Beni Mellal', 'Benslimane'=>'Benslimane', 'Berkane'=>'Berkane', 'Boujdour'=>'Boujdour', 'Boulmane'=>'Boulmane', 'Casablanca Anfa'=>'Casablanca Anfa', 'Al fida_Mers Sultan'=>'Al fida_Mers Sultan', 'Ain Sebaa_Hay Mohammadi'=>'Ain Sebaa_Hay Mohammadi', 'Ain Chok'=>'Ain Chok', 'Hay Hassani'=>'Hay Hassani', 'Ben Msik'=>'Ben Msik', 'Moulay R\'chid_Sidi Otmane'=>'Moulay R\'chid_Sidi Otmane', 'Sidi Bernoussi'=>'Sidi Bernoussi', 'Chefchaouen'=>'Chefchaouen', 'Chichaoua'=>'Chichaoua', 'Chtouka Ait Baha'=>'Chtouka Ait Baha', 'El Hajeb'=>'El Hajeb', 'El Jadida'=>'El Jadida', 'El Kelaa Des Sraghna'=>'El Kelaa Des Sraghna', 'Errachidia'=>'Errachidia', 'Essaouira'=>'Essaouira', 'Es-smara'=>'Es-smara', 'Fahs Anjra'=>'Fahs Anjra', 'Fès'=>'Fès', 'Figuig'=>'Figuig', 'Guelmim'=>'Guelmim', 'Ifrane'=>'Ifrane', 'Inzegane Ait Melloul'=>'Inzegane Ait Melloul', 'Jerada'=>'Jerada', 'Kenitra'=>'Kenitra', 'Khemisset'=>'Khemisset', 'Khenifra'=>'Khenifra', 'Khouribga'=>'Khouribga', 'Laayoune'=>'Laayoune', 'Larache'=>'Larache', 'Marrakech'=>'Marrakech', 'Mediouna'=>'Mediouna', 'Mohammadia'=>'Mohammadia', 'Nador'=>'Nador', 'Nouaceur'=>'Nouaceur', 'Oued Ed-dahab'=>'Oued Ed-dahab', 'Ouarzazate'=>'Ouarzazate', 'Oujda Angad'=>'Oujda Angad', 'Rabat'=>'Rabat', 'Safi'=>'Safi', 'Salé'=>'Salé', 'Sefrou'=>'Sefrou', 'Settat'=>'Settat', 'Sidi Kacem'=>'Sidi Kacem', 'Skhirate Temara'=>'Skhirate Temara', 'Tanger Assilah'=>'Tanger Assilah', 'Tantan'=>'Tantan', 'Taounate'=>'Taounate', 'Taourirt'=>'Taourirt', 'Taroudant'=>'Taroudant', 'Tata'=>'Tata', 'Taza'=>'Taza', 'Tetouan'=>'Tetouan', 'M\'diq Fnidaq'=>'M\'diq Fnidaq', 'Tiznit'=>'Tiznit', 'Zagoura'=>'Zagoura', 'Moulay Yacoub'=>'Moulay Yacoub', 'Berrechid'=>'Berrechid', 'Driouch'=>'Driouch', 'Fkih ben salah'=>'Fkih ben salah', 'Guercif'=>'Guercif', 'Midelt'=>'Midelt', 'Ouezzane'=>'Ouezzane', 'Rehamna'=>'Rehamna', 'Sidi bennour'=>'Sidi bennour', 'Sidi ifni'=>'Sidi ifni', 'Sidi slimane'=>'Sidi slimane', 'Tarfaya'=>'Tarfaya', 'Tinghir'=>'Tinghir', 'Youssoufia'=>'Youssoufia'),
                'required' => true,))
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
