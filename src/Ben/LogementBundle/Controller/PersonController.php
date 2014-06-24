<?php

namespace Ben\LogementBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Httpfoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use JMS\SecurityExtraBundle\Annotation\Secure;

use Ben\LogementBundle\Entity\Person;
use Ben\LogementBundle\Form\PersonType;
use Ben\LogementBundle\Form\PersonHandler;
use Ben\LogementBundle\Entity\OrderList;

use Ben\LogementBundle\Pagination\Paginator;

/**
 * Person controller.
 *
 */
class PersonController extends Controller
{ 
    /**
     * @Secure(roles="ROLE_USER")
     */
    public function indexAction($status)
    {
        $em = $this->getDoctrine()->getManager();
        $logement = $this->container->get('security.context')->getToken()->getUser()->getLogement();
        if (!$logement)  throw $this->createNotFoundException('Unable to find logement entity.');
        $universities = $em->getRepository('BenLogementBundle:University')->findByType('etablissement');
        $entitiesLength = $em->getRepository('BenLogementBundle:Person')->counter($logement->getId(), $status);
        $template = 'index';
        $template = ($status === Person::$notValideStatus) ? 'rejected' : $template;
        $template="BenLogementBundle:Person:$template.html.twig";
        return $this->render($template, array(
                    'status' => $status,
                    'universities' => $universities,
                    'entitiesLength' => $entitiesLength
                    ));
    } 

    /**
     * @Secure(roles="ROLE_USER")
     */
    public function listElegibleAction()
    {
        $em = $this->getDoctrine()->getManager();
        $logement = $this->container->get('security.context')->getToken()->getUser()->getLogement();
        if (!$logement)  throw $this->createNotFoundException('Unable to find logement entity.');
        $universities = $em->getRepository('BenLogementBundle:University')->findAll();
        $orderList = $em->getRepository('BenLogementBundle:OrderList')->findbyLogement($logement->getId());
        $entitiesLength = $em->getRepository('BenLogementBundle:Person')->counter($logement->getId(), Person::$eligibleStatus);
        return $this->render('BenLogementBundle:Person:list_eligible.html.twig', array(
                    'status' => Person::$eligibleStatus,
                    'universities' => $universities,
                    'orderList' => $orderList,
                    'entitiesLength' => $entitiesLength
                    ));
    }

    /**
     * @Secure(roles="ROLE_USER")
     */
    public function ajaxListAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $perPage = $request->get('perpage');
        $page = $request->get('page');
        $keyword = $request->get('keyword');
        $type = $request->get('type');
        $status = $request->get('status');
        $searchEntity = $request->get('searchEntity');
        $orderList = $request->get('orderList');
        if (!empty($orderList)) {
            $orderList = explode(',', $orderList);
            array_pop($orderList);
        }
        $logement = $this->container->get('security.context')->getToken()->getUser()->getLogement();
        if (!$logement)  throw $this->createNotFoundException('Unable to find logement entity.');
        $template = $request->get('template');
        $template="BenLogementBundle:Person:$template.html.twig";
        $entities = $em->getRepository('BenLogementBundle:Person')->search($perPage, $page, $keyword, $type, $status, $searchEntity, $logement->getId(), $orderList);
        
        $pagination = (new Paginator())->setItems(count($entities), $perPage)->setPage($page)->toArray();
        return $this->render($template, array(
                    'entities' => $entities,
                    'pagination' => $pagination
                    ));
    }

    /**
     * Finds and displays a Person entity.
     * @Secure(roles="ROLE_USER")
     */
    public function showAction(Person $entity)
    {

        $deleteForm = $this->createDeleteForm($entity->getId());

        return $this->render('BenLogementBundle:Person:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        
            ));
    }

    /**
     * Displays a form to create a new Person entity.
     * @Secure(roles="ROLE_USER")
     */
    public function newAction($type)
    {
        $entity = new Person();
        $entity->setType($type);
        $em = $this->getDoctrine()->getManager();
        $universities = $em->getRepository('BenLogementBundle:University')->findByType('university');
        $form   = $this->createForm(new PersonType($type), $entity);

        return $this->render('BenLogementBundle:Person:new.html.twig', array(
            'entity' => $entity,
            'universities' => $universities,
            'personType' =>  $entity->getType(),
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Person entity.
     * @Secure(roles="ROLE_USER")
     */
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $securityContext = $this->container->get('security.context');
        $type = $request->get('type');
        $entity  = new Person();
        $form = $this->createForm(new PersonType($type), $entity);

        $formHandler = new PersonHandler($form, $request, $em, $securityContext);
        if ($formHandler->process()) {
            $this->get('session')->getFlashBag()->add('success', "L'étudiant a été ajouté avec succée.");
            return $this->redirect($this->generateUrl('etudiant_show', array('id' => $entity->getId())));
        }

        $universities = $em->getRepository('BenLogementBundle:University')->findByType('university');
        $this->get('session')->getFlashBag()->add('danger', "Il y a des erreurs dans le formulaire soumis !");
        return $this->render('BenLogementBundle:Person:new.html.twig', array(
            'entity' => $entity,
            'universities' => $universities,
            'personType' =>  $entity->getType(),
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Person entity.
     * @Secure(roles="ROLE_USER")
     */
    public function editAction(Person $entity, $type)
    {
        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(new PersonType($type), $entity);
        $universities = $em->getRepository('BenLogementBundle:University')->findByType('university');

        return $this->render('BenLogementBundle:Person:edit.html.twig', array(
            'entity'      => $entity,
            'universities' => $universities,
            'personType' => $entity->getType(),
            'form'   => $form->createView(),
        ));
    }

    /**
     * Edits an existing Person entity.
     * @Secure(roles="ROLE_USER")
     */
    public function updateAction(Request $request, Person $entity)
    {
        $em = $this->getDoctrine()->getManager();
        $type = $request->get('type');

        $form = $this->createForm(new PersonType($type), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $entity->calculateNote(); /* pour clalculer la note de logement */
            $em->persist($entity);
            $em->flush();

            $this->get('session')->getFlashBag()->add('success', "Mise à jour éffectué avec succée.");
            return $this->redirect($this->generateUrl('etudiant_edit', array('id' => $entity->getId(), 'type' => $entity->getType())));
        }

        $universities = $em->getRepository('BenLogementBundle:University')->findByType('university');
        $this->get('session')->getFlashBag()->add('danger', "Il y a des erreurs dans le formulaire soumis !");
        return $this->render('BenLogementBundle:Person:edit.html.twig', array(
            'entity'      => $entity,
            'universities' => $universities,
            'personType' =>  $entity->getType(),
            'form'   => $form->createView(),
        ));
    }

    /**
     * @Secure(roles="ROLE_USER")
     */
    public function setStatusAction(Request $request, $status)
    {
        $entities = $request->get('entities');
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('BenLogementBundle:Person');
        foreach( $entities as $id){
            $entity = $repository->find($id);
            if (!$entity)  throw $this->createNotFoundException('Unable to find Person entity.');
            $entity->setStatus($status);
            $em->persist($entity);
        }
        $em->flush();
        return new Response('1');
    }


    /**
     * generer une liste elegible 
     * @Secure(roles="ROLE_USER")
     */
    public function generateListAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $logement = $this->container->get('security.context')->getToken()->getUser()->getLogement();
        if (!$logement)  throw $this->createNotFoundException('Unable to find logement entity.');
        $entities = array();
        $universities = $em->getRepository('BenLogementBundle:University')->findUniversity($logement->getId());
        if ($request->getMethod() === 'POST') {
            $gender = $request->get('gender');
            $quota = $request->get('quota');
            foreach ($quota as $university => $limit) {
                $limit = ($limit>0) ? $limit : 0;
                if($limit){
                    $specialEntities = $em->getRepository('BenLogementBundle:Person')
                        ->getList($logement->getId(), $university, $gender, Person::$specialType, Person::$valideStatus, $limit);
                    $newEntities = $em->getRepository('BenLogementBundle:Person')
                        ->getList($logement->getId(), $university, $gender, Person::$newType, Person::$valideStatus, $limit-count($specialEntities));
                    $entities[] = array_merge($specialEntities, $newEntities);
                }
            }
        }

        return $this->render('BenLogementBundle:Person:list.html.twig', array(
                'entities' => $entities,
                'universities' => $universities,
                ));

    }

    /**
     * valider la liste elegible
     * @Secure(roles="ROLE_USER")
     */
    public function validateListAction(Request $request)
    {
        $entities = $request->get('entities');
        $persons_id = '';
        if ($entities) {
            $em = $this->getDoctrine()->getManager();
            $repository = $em->getRepository('BenLogementBundle:Person');
            foreach( $entities as $id){
                $entity = $repository->find($id);
                if (!$entity)  throw $this->createNotFoundException('Unable to find Person entity.');
                $entity->setStatus(Person::$eligibleStatus);
                $persons_id .= $entity->getId().',';
                $em->persist($entity);
            }

            $logement = $this->container->get('security.context')->getToken()->getUser()->getLogement();
            if (!$logement)  throw $this->createNotFoundException('Unable to find logement entity.');
            $OrderList = new OrderList();
            $OrderList->setIds($persons_id);
            $OrderList->setLogement($logement);
            $OrderList->setLength(count($entities));
            $em->persist($OrderList);

            $em->flush();
            $this->get('session')->getFlashBag()->add('success', "Action effectué avec succée.");
            return $this->redirect($this->generateUrl('etudiant_elegible'));
        }
        
        $this->get('session')->getFlashBag()->add('danger', "Il y a des erreurs dans le formulaire soumis !");
        return $this->redirect($this->generateUrl('etudiant_generate_list'));

    }

    /**
     * valider la liste elegible
     * @Secure(roles="ROLE_USER")
     */
    public function clearOrdersAction()
    {
        $em = $this->getDoctrine()->getManager();
        $logement = $this->container->get('security.context')->getToken()->getUser()->getLogement();
        if (!$logement)  throw $this->createNotFoundException('Unable to find logement entity.');
        $entities = $em->getRepository('BenLogementBundle:OrderList')->findbyLogement($logement->getId());
        foreach( $entities as $entity) $em->remove($entity);
        $em->flush();

        $this->get('session')->getFlashBag()->add('success', "Action effectué avec succée.");
        return $this->redirect($this->generateUrl('etudiant_elegible'));

    }

    /**
     * 
     * @Secure(roles="ROLE_USER")
     */
    public function removeSomeAction(Request $request)
    {
        $entities = $request->get('entities');
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('BenLogementBundle:Person');
        foreach( $entities as $id){
            $entity = $repository->find($id);
            if (!$entity)  throw $this->createNotFoundException('Unable to find Person entity.');
            $em->remove($entity);
        }
        $em->flush();

        return new Response('1');

    }

    /**
     * Deletes a Person entity.
     * @Secure(roles="ROLE_USER")
     *
     */
    public function deleteAction(Request $request, Person $entity)
    {
        $form = $this->createDeleteForm($entity->getId());
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($entity);
            $em->flush();

            $this->get('session')->getFlashBag()->add('success', "Supression effectué avec succée.");
        }

        return $this->redirect($this->generateUrl('etudiant'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }

    /**
     * cancel a reservation (reject)
     * @Secure(roles="ROLE_USER")
     *
     */
    public function cancelAction(Request $request)
    {        
        $entities = $request->get('entities');
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('BenLogementBundle:Person');
        foreach( $entities as $id){
            $entity = $repository->find($id);
            if (!$entity)  throw $this->createNotFoundException('Unable to find Person entity.');
            $reservation = $entity->getReservation();
            if($reservation){
                $entity->removeReservation();
                $em->remove($reservation);
            }else{
                $entity->setStatus(Person::$notValideStatus);
            }
            $entity->setRemarque($request->get('remarque'));
            $em->persist($entity);
        }
        $em->flush();
        return new Response('1');
    }

    /**
     * export to excel
     * @Secure(roles="ROLE_USER")
     */
    public function toExcelAction($status)
    {

        $em = $this->getDoctrine()->getManager();
        if ($status === 'all')
            $entities = $em->getRepository('BenLogementBundle:Person')->findAll();
        else $entities = $em->getRepository('BenLogementBundle:Person')->findByStatus($status);
        // ask the service for a Excel5
       $phpExcelObject = $this->get('phpexcel')->createPHPExcelObject();

       $phpExcelObject->getProperties()->setCreator("onousc");
       $phpExcelObject->setActiveSheetIndex(0)
            ->setCellValue("A1", "Id")
            ->setCellValue("B1", "Nom")
            ->setCellValue("C1", "Prenom")
            ->setCellValue("D1", "CIN")
            ->setCellValue("E1", "CNE")
            ->setCellValue("F1", "Email")
            ->setCellValue("G1", "Sexe")
            ->setCellValue("H1", "Adresse")
            ->setCellValue("I1", "Province")
            ->setCellValue("J1", "Pays")
            ->setCellValue("K1", "Telephone")
            ->setCellValue("L1", "Note de lgement")
            ->setCellValue("M1", "Revenu des parents")
            ->setCellValue("N1", "Nombre des fréres/soeurs")
            ->setCellValue("O1", "Niveau d'etude")
            ->setCellValue("P1", "Etat")
            ->setCellValue("Q1", "N° dossier")
            ->setCellValue("R1", "Comportement")
            ->setCellValue("S1", "Ancienneté")
            ->setCellValue("T1", "Cycle d'étude")
            ->setCellValue("U1", "Remarque")
            ->setCellValue("V1", "N° passport")
            ->setCellValue("W1", "Carte de sejour")
            ->setCellValue("X1", "Note du Baccalauréat")
            ->setCellValue("Y1", "Etablissement")
            ->setCellValue("Z1", "Date de naissance");
       $i=2;
       foreach ($entities as $entity) {
            $university = ($entity->getEtablissement()) ? $entity->getEtablissement()->getName() : '';
           $phpExcelObject->setActiveSheetIndex(0)
                ->setCellValue("A$i", $entity->getId())
                ->setCellValue("B$i", $entity->getFamilyName())
                ->setCellValue("C$i", $entity->getFirstName())
                ->setCellValue("D$i", $entity->getCin())
                ->setCellValue("E$i", $entity->getCne())
                ->setCellValue("F$i", $entity->getEmail())
                ->setCellValue("G$i", $entity->getGender())
                ->setCellValue("H$i", $entity->getAddress())
                ->setCellValue("I$i", $entity->getCity())
                ->setCellValue("J$i", $entity->getContry())
                ->setCellValue("K$i", $entity->getTel())
                ->setCellValue("L$i", $entity->getNote())
                ->setCellValue("M$i", $entity->getParentsRevenu())
                ->setCellValue("N$i", $entity->getBroSisNumber())
                ->setCellValue("O$i", $entity->getNiveauEtude())
                ->setCellValue("P$i", $entity->getStatus())
                ->setCellValue("Q$i", $entity->getNDossier())
                ->setCellValue("R$i", $entity->getConditionSpecial())
                ->setCellValue("S$i", $entity->getAncientete())
                ->setCellValue("T$i", $entity->getDiplome())
                ->setCellValue("U$i", $entity->getRemarque())
                ->setCellValue("V$i", $entity->getPassport())
                ->setCellValue("W$i", $entity->getCarteSejour())
                ->setCellValue("X$i", $entity->getExellence())
                ->setCellValue("Y$i", $university)
                ->setCellValue("Z$i", $entity->getBirdDay()->format('d/m/Y'));
            $i++;
       }

       $phpExcelObject->getActiveSheet()->setTitle('Liste des étudiants');

       // Set active sheet index to the first sheet, so Excel opens this as the first sheet
       $phpExcelObject->setActiveSheetIndex(0);

        // create the writer
        $writer = $this->get('phpexcel')->createWriter($phpExcelObject, 'Excel5');
        // create the response
        $response = $this->get('phpexcel')->createStreamedResponse($writer);
        // adding headers
        $now = new \DateTime;
        $now = $now->format('d-m-Y_H-i');
        $response->headers->set('Content-Type', 'text/vnd.ms-excel; charset=utf-8');
        $response->headers->set('Content-Disposition', "attachment;filename=onousc-$now.xls");
        $response->headers->set('Pragma', 'public');
        $response->headers->set('Cache-Control', 'maxage=1');

        return $response;        
    }

    /**
     * export to pdf
     * @Secure(roles="ROLE_USER")
     */
    public function toPdfAction($type, $status)
    {
        $em = $this->getDoctrine()->getManager();
        $logement = $this->container->get('security.context')->getToken()->getUser()->getLogement();
        if (!$logement)  throw $this->createNotFoundException('Unable to find logement entity.');
        $entities = $em->getRepository('BenLogementBundle:Person')
            ->getList($logement->getId(),null, 'all', $type, $status);

        $now = new \DateTime;
        $now = $now->format('d-m-Y_H-i');
        $html = $this->renderView('BenLogementBundle:Person:print.html.twig', array(
            'entities' => $entities,
            'type' => $type,
            'status' => $status));

        return new Response(
            $this->get('knp_snappy.pdf')->getOutputFromHtml($html),
            200,
            array(
                'Content-Type'          => 'application/pdf',
                'Content-Disposition'   => 'attachment; filename="file'.$now.'.pdf"'
            )
        );
    }


    /**
     * render html response to the pdf function
     * temporary function just for testing 
     */
    public function prepareToPdfAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('BenLogementBundle:Person')->findByStatus(Person::$residentStatus);

        return $this->render('BenLogementBundle:Person:print.html.twig', array('entities' => $entities, 'type' => 'all'));
    }
}
