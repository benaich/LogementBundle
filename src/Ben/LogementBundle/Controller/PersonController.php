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
        $universities = $em->getRepository('BenLogementBundle:Logement')->find($logement->getId())->getEtablissements();
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
        $entitiesLength = $em->getRepository('BenLogementBundle:Person')->counter($logement->getId(), Person::$eligibleStatus);
        return $this->render('BenLogementBundle:Person:list_eligible.html.twig', array(
                    'status' => Person::$eligibleStatus,
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
        $logement = $this->container->get('security.context')->getToken()->getUser()->getLogement();
        $template = $request->get('template');
        $template="BenLogementBundle:Person:$template.html.twig";
        $entities = $em->getRepository('BenLogementBundle:Person')->search($perPage, $page, $keyword, $type, $status, $searchEntity, $logement->getId());
        return $this->render($template, array(
                    'entities' => $entities,
                    'nombreParPage' => $perPage,
                    'nombrePage' => ceil(count($entities) / $perPage),
                    'page' => $page
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
        $entities = array();
        if ($request->getMethod() === 'POST') {
            $em = $this->getDoctrine()->getManager();
            $limit = $request->get('limit');
            $limit = ($limit>0) ? $limit : 0;
            $gender = $request->get('gender');
            $logement = $this->container->get('security.context')->getToken()->getUser()->getLogement();
            $specialEntities = $em->getRepository('BenLogementBundle:Person')
                                 ->getList($logement->getId(), $gender, Person::$specialType, $limit);
            $entities = $em->getRepository('BenLogementBundle:Person')
                                 ->getList($logement->getId(), $gender, Person::$newType, $limit-count($specialEntities));
            $entities = array_merge($specialEntities, $entities);
        }

        return $this->render('BenLogementBundle:Person:list.html.twig', array(
                'entities' => $entities));

    }


    /**
     * valider la liste elegible
     * @Secure(roles="ROLE_USER")
     */
    public function validateListAction(Request $request)
    {
        $entities = $request->get('entities');
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('BenLogementBundle:Person');
        foreach( $entities as $id){
            $entity = $repository->find($id);
            if (!$entity)  throw $this->createNotFoundException('Unable to find Person entity.');
            $entity->setStatus(Person::$eligibleStatus);
            $em->persist($entity);
        }
        $em->flush();

        return $this->redirect($this->generateUrl('etudiant_elegible'));

    }

    /**
     * Deletes a Person entity.
     * @Secure(roles="ROLE_USER")
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BenLogementBundle:Person')->find($id);
            if (!$entity) throw $this->createNotFoundException('Unable to find Person entity.');

            $room = $entity->getReservations()->last()->getRoom();
            $room->plusFree();
            $em->persist($room);
            $em->remove($entity);
            $em->flush();
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
     * cancel a reservation
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
            $entity->setStatus(Person::$valideStatus);
            $entity->popReservation();
            $em->persist($entity);
        }
        $em->flush();
        return new Response('1');
    }
}
