<?php

namespace Ben\LogementBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use JMS\SecurityExtraBundle\Annotation\Secure;

use Ben\LogementBundle\Entity\Import;
use Ben\LogementBundle\Form\ImportType;
use Ben\LogementBundle\Entity\Person;
use \Ben\LogementBundle\Entity\Room;

class DefaultController extends Controller
{
    /**
     * Dashboard
     * @Secure(roles="ROLE_USER")
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $logement = $this->container->get('security.context')->getToken()->getUser()->getLogement();
        if (!$logement)  throw $this->createNotFoundException('Unable to find logement entity.');

        $data = $em->getRepository('BenLogementBundle:Room')->getStats($logement->getId());

        $data['requestMen'] = $em->getRepository('BenLogementBundle:Person')->counter($logement->getId(), 'request', 'Garçon');
        $data['requestWomen'] = $em->getRepository('BenLogementBundle:Person')->counter($logement->getId(), 'request', 'Fille');
        $data['request'] = $data['requestMen'] + $data['requestWomen'];

        $data['residentMen'] = $em->getRepository('BenLogementBundle:Person')->counter($logement->getId(), Person::$residentStatus, 'Garçon');
        $data['residentWomen'] = $em->getRepository('BenLogementBundle:Person')->counter($logement->getId(), Person::$residentStatus, 'Fille');
        $data['resident'] = $data['residentMen'] + $data['residentWomen'];

        $data['oldResident'] = $em->getRepository('BenLogementBundle:Person')->counter($logement->getId(), Person::$residentStatus, 'all', Person::$oldType);
        $data['oldResidentMen'] = $em->getRepository('BenLogementBundle:Person')->counter($logement->getId(), Person::$residentStatus, 'Garçon', Person::$oldType);
        $data['oldResidentWomen'] = $em->getRepository('BenLogementBundle:Person')->counter($logement->getId(), Person::$residentStatus, 'Fille', Person::$oldType);

        $data['newResidentMen'] = $em->getRepository('BenLogementBundle:Person')->counter($logement->getId(), Person::$residentStatus, 'Garçon', Person::$newType);
        $data['newResidentWomen'] = $em->getRepository('BenLogementBundle:Person')->counter($logement->getId(), Person::$residentStatus, 'Fille', Person::$newType);
        $data['newResident'] = $data['newResidentMen'] + $data['newResidentWomen'];

        $data['foreignResidentMen'] = $em->getRepository('BenLogementBundle:Person')->counter($logement->getId(), Person::$residentStatus, 'Garçon', Person::$foreignType);
        $data['foreignResidentWomen'] = $em->getRepository('BenLogementBundle:Person')->counter($logement->getId(), Person::$residentStatus, 'Fille', Person::$foreignType);
        $data['foreignResident'] = $data['foreignResidentMen'] + $data['foreignResidentWomen'];

        return $this->render('BenLogementBundle:Default:index.html.twig', $data);
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
                    $this->addLogement();
                    if($request->get('room')) {
                        $this->addBlock();
                        $this->addRoom();
                    }
                    if($request->get('person')) $this->addPerson();
                    if($request->get('university')) $this->addUniversity();
                }
            }
        }

        return $this->render('BenLogementBundle:Default:import.html.twig', array(
            'entity'      => $entity,
            'form'   => $form->createView(),
        ));
    }

    public function addPerson()
    {
        $conn = $this->get('doctrine.dbal.sqlite_connection');

        $em = $this->getDoctrine()->getManager();
        $logement = $conn->fetchAll("select * from REFERENTIEL;")[0]['NOM'];
        $logement = $em->getRepository('BenLogementBundle:Logement')->findOneByName($logement);
        $data_array = $conn->fetchAll("select e.*, datetime(e.DATE_NAISSANCE_ETUDIANT) as birday, datetime(e.DATE_DEBUT) as date_from, datetime(e.DATE_FIN) as date_to, datetime(p.DATE_PAY) as DATE_PAY, p.MONTANT 
         from ETUDIANT as e
         left join  PAIEMENT as p on e.N_DOSSIER = p.N_DOSSIER 
         where e.ETAT_ETUDIANT = 'résidant'
         group by e.ID_ETUDIANT;");
        foreach ($data_array as $data) {    
            $person  = new Person();
            $person->setData($data);
            $etablissement = $em->getRepository('BenLogementBundle:University')->findOneByName($data['ETABLISMENT']);
            $person->setEtablissement($etablissement);
            $person->setLogement($logement);
            $em->persist($person);
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
        /* update user default logement */
        $userManager = $this->get('fos_user.user_manager');
        $user = $this->container->get('security.context')->getToken()->getUser();
        $user->setLogement($entity);
        $userManager->updateUser($user);

        $length = count($data_array);
        $this->get('session')->getFlashBag()->add('success', "$length logement ajouté.");
        return $data_array;
    }

    public function addBlock()
    {
        $conn = $this->get('doctrine.dbal.sqlite_connection');
        $em = $this->getDoctrine()->getManager();
        
        $logement = $conn->fetchAll("select *  from REFERENTIEL;")[0]['NOM'];
        $logement = $em->getRepository('BenLogementBundle:Logement')->findOneByName($logement);
        $data_array = $conn->fetchAll("select *  from PAVILLON;");
        $unique_aray = array_map(function($data){
            return $data['PAVILLON'];
        }, $data_array);
        $unique_aray = array_keys(array_unique($unique_aray));
        $uniquedata = [];
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
        $logement = $conn->fetchAll("select * from REFERENTIEL;")[0]['NOM'];
        $logement = $em->getRepository('BenLogementBundle:Logement')->findOneByName($logement);
        $data_array = $conn->fetchAll("select *  from CHAMBRE;");

        $unique_aray = array_map(function($data){
             unset($data['ID_CHAMBRE'], $data['CAPACITE'], $data['LIBRE'], $data['TYPE']);
             return implode($data, '/');
        }, $data_array);
        $unique_aray = array_keys(array_unique($unique_aray));
        $uniquedata = [];
        foreach ($unique_aray as $key) {
            $uniquedata[] = $data_array[$key];
        }
        foreach ($uniquedata as $data) {    
            $entity  = new Room();
            $block = $em->getRepository('BenLogementBundle:Block')->findbyLogement($logement->getId(), $data['PAVILLON']);
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
        $logement = $conn->fetchAll("select * from REFERENTIEL;");
        if(!$logement){
            $this->get('session')->getFlashBag()->add('danger', "cette base de données est invalide");
            return false;
        }
        $logement = $logement[0]['NOM'];
        $entity = $em->getRepository('BenLogementBundle:Logement')->findOneByName($logement);
        if ($entity)  {
            $this->get('session')->getFlashBag()->add('danger', "cette base de données a déja été importé");
            return false;
        }
                
        return true;
    }
}
