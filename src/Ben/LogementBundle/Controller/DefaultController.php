<?php

namespace Ben\LogementBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use JMS\SecurityExtraBundle\Annotation\Secure;

use Ben\LogementBundle\Entity\Import;
use Ben\LogementBundle\Form\ImportType;

class DefaultController extends Controller
{
    /**
     * Dashboard
     * @Secure(roles="ROLE_USER")
     *
     */
    public function indexAction()
    {
        return $this->render('BenLogementBundle:Default:index.html.twig');
    }

    /**
     * Dashboard
     * @Secure(roles="ROLE_MANAGER")
     *
     */
    public function importAction(Request $request)
    {
        $entity = new Import();
        $form   = $this->createForm(new ImportType(), $entity);
        if ($request->getMethod() === 'POST') {
            $form->bind($request);
            if ($form->isValid()) {
                $entity->upload();
                if ($this->valideDb()) {
                    // $this->addBlock();
                    // $this->addRoom();
                    $this->addPerson();
                }
            }
        }

        return $this->render('BenLogementBundle:Default:import.html.twig', array(
            'entity'      => $entity,
            'form'   => $form->createView(),
        ));
    }

    // public function addNew()
    // {
    //     $conn = $this->get('doctrine.dbal.sqlite_connection');

    //     $em = $this->getDoctrine()->getManager();
    //     $logement = $conn->fetchAll("select *  from REFERENTIEL;")[0]['NOM'];
    //     $logement = $em->getRepository('BenLogementBundle:Logement')->findOneByName($logement);
    //     $data_array = $conn->fetchAll("select e.*, datetime(e.DATE_NAISSANCE_ETUDIANT) as birday
    //      from ETUDIANT as e where ETAT_ETUDIANT ='non résidant';");
    //     foreach ($data_array as $data) {    
    //         $person  = new \Ben\LogementBundle\Entity\Person();
    //         $person->setData($data);
    //         $etablissement = $em->getRepository('BenLogementBundle:University')->findOneByName($data['ETABLISMENT']);
    //         $person->setEtablissement($etablissement);
    //         $person->setLogement($logement);
    //         $em->persist($person);
    //     }
    //     $em->flush();
    //     return $data_array;
    // }
    public function addPerson()
    {
        $conn = $this->get('doctrine.dbal.sqlite_connection');

        $em = $this->getDoctrine()->getManager();
        $logement = $conn->fetchAll("select *  from REFERENTIEL;")[0]['NOM'];
        $logement = $em->getRepository('BenLogementBundle:Logement')->findOneByName($logement);
        $data_array = $conn->fetchAll("select e.*, datetime(e.DATE_NAISSANCE_ETUDIANT) as birday, datetime(e.DATE_DEBUT) as date_from, datetime(e.DATE_FIN) as date_to, datetime(p.DATE_PAY) as DATE_PAY, p.MONTANT 
         from ETUDIANT as e
         left join  PAIEMENT as p on e.N_DOSSIER = p.N_DOSSIER ;");
        foreach ($data_array as $data) {    
            $person  = new \Ben\LogementBundle\Entity\Person();
            $person->setData($data);
            $etablissement = $em->getRepository('BenLogementBundle:University')->findOneByName($data['ETABLISMENT']);
            $person->setEtablissement($etablissement);
            $person->setLogement($logement);
            $em->persist($person);


            $reservation  = new \Ben\LogementBundle\Entity\Reservation();
            $room = $em->getRepository('BenLogementBundle:Room')->findRoombyName($logement->getName(), $data['PAVILLON'], $data['CHAMBRE']);
            if($room){
                $reservation->setData($data);
                $reservation->setPerson($person);
                $reservation->setRoom($room);
                $em->persist($reservation);
            }
        }

        $em->flush();
        $length = count($data_array);
        $this->get('session')->getFlashBag()->add('success', "$length étudiants ont été ajouté à la base de données.");
        return $data_array;
    }

    public function addLogement()
    {
        $conn = $this->get('doctrine.dbal.sqlite_connection');

        $em = $this->getDoctrine()->getManager();
        $data_array = $conn->fetchAll("select *  from REFERENTIEL;");
        foreach ($data_array as $data) {    
            $entity  = new \Ben\LogementBundle\Entity\Logement();
            $entity->setData($data);
            $em->persist($entity);
        }
        $em->flush();
        $length = count($data_array);
        $this->get('session')->getFlashBag()->add('success', "$length logement ajouté.");
        return $data_array;
    }

    public function addBlock()
    {
        $conn = $this->get('doctrine.dbal.sqlite_connection');

        $em = $this->getDoctrine()->getManager();
        $logement = $em->getRepository('BenLogementBundle:Logement')->find(1);
        $data_array = $conn->fetchAll("select *  from PAVILLON;");
        $unique_aray = array_map(function($data){
            return $data['PAVILLON'];
        }, $data_array);
        $unique_aray = array_keys(array_unique($unique_aray));
        foreach ($unique_aray as $key) {
            $uniquedata[] = $data_array[$key];
        }
        foreach ($uniquedata as $data) {    
            $entity  = new \Ben\LogementBundle\Entity\Block();
            $entity->setData($data);
            $entity->setLogement($logement);
            $em->persist($entity);
        }
        $em->flush();
        $length = count($data_array);
        $this->get('session')->getFlashBag()->add('success', "$length pavillons a été ajouté à la base de données.");
        return $data_array;
    }

    public function addRoom()
    {
        $conn = $this->get('doctrine.dbal.sqlite_connection');

        $em = $this->getDoctrine()->getManager();
        $data_array = $conn->fetchAll("select *  from CHAMBRE;");
        $unique_aray = array_map(function($data){
             unset($data['ID_CHAMBRE'], $data['CAPACITE'], $data['LIBRE'], $data['TYPE']);
             return implode($data, '/');
        }, $data_array);
        $unique_aray = array_keys(array_unique($unique_aray));
        foreach ($unique_aray as $key) {
            $uniquedata[] = $data_array[$key];
        }

        foreach ($uniquedata as $data) {    
            $entity  = new \Ben\LogementBundle\Entity\Room();
            $block = $em->getRepository('BenLogementBundle:Block')->findOneByName($data['PAVILLON']);
            $entity->setData($data);
            $entity->setBlock($block);
            $em->persist($entity);
        }
        $em->flush();
        $length = count($uniquedata);
        $this->get('session')->getFlashBag()->add('success', "$length chambres ont été ajouté à la base de données.");
        return $uniquedata;
    }
    
    public function addUniversity()
    {
        $conn = $this->get('doctrine.dbal.sqlite_connection');
        $em = $this->getDoctrine()->getManager();

        /* University */
        $data_array = $conn->fetchAll('SELECT * FROM ETABLISSEMENT group by UNIVERSITE');
        $em = $this->getDoctrine()->getManager();
        foreach ($data_array as $data) {    
            $entity  = new \Ben\LogementBundle\Entity\University();
            $entity->setName($data['UNIVERSITE']);
            $entity->setType('university');
            $em->persist($entity);
        }
        $length = count($data_array);
        $this->get('session')->getFlashBag()->add('success', "$length universitées ont été ajouté à la base de données.");
        $em->flush();

        /* Etablissement */
        $entities = $em->getRepository('BenLogementBundle:University')->findByType('university');
        foreach ($entities as $university) {
            $data_array = $conn->fetchAll("SELECT * FROM ETABLISSEMENT where UNIVERSITE = '".$university->getName()."'");
            foreach ($data_array as $data) {    
                $entity  = new \Ben\LogementBundle\Entity\University();
                $entity->setName($data['ETABLISSEMENT']);
                $entity->setType('etablissement');
                $entity->setParent($university);
                $em->persist($entity);
            }
        }
        $em->flush();
        $length = count($data_array);
        $this->get('session')->getFlashBag()->add('success', "$length etablissements ont été ajouté à la base de données.");
        return $data_array;
    }

    public function valideDb()
    {
        $conn = $this->get('doctrine.dbal.sqlite_connection');
        $em = $this->getDoctrine()->getManager();
        $logement = $conn->fetchAll("select *  from REFERENTIEL;")[0]['NOM'];
        $entity = $em->getRepository('BenLogementBundle:Logement')->findOneByName($logement);
        // if ($entity)  {
        //     $this->get('session')->getFlashBag()->add('danger', "cette base de données a déja été importé");
        //     return false;
        // }
                
        return true;
    }
}
