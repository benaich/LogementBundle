<?php

namespace Ben\LogementBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Httpfoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use JMS\SecurityExtraBundle\Annotation\Secure;

use Ben\LogementBundle\Entity\Room;
use Ben\LogementBundle\Entity\Block;
use Ben\LogementBundle\Form\RoomType;
use Ben\LogementBundle\Entity\Person;

/**
 * Room controller.
 *
 */
class RoomController extends Controller
{
    /**
     * Lists all Room entities.
     * @Secure(roles="ROLE_USER")
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $logement = $this->container->get('security.context')->getToken()->getUser()->getLogement();
        $blocks = $em->getRepository('BenLogementBundle:Block')->findbyLogement($logement->getId());
        $entities = $em->getRepository('BenLogementBundle:Room')->findbyLogement($logement->getId());

        $entitiesLength = $em->getRepository('BenLogementBundle:Room')->counter($logement->getId());
        return $this->render('BenLogementBundle:Room:index.html.twig', array(
            'entities' => $entities,
            'blocks' => $blocks,
            'entitiesLength' => $entitiesLength
        ));
    }

    /**
     * @Secure(roles="ROLE_USER")
     * 
     */
    public function ajaxListAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $perPage = $request->get('perpage');
        $page = $request->get('page');
        $logement = $this->container->get('security.context')->getToken()->getUser()->getLogement()->getId();
        $searchEntity = $request->get('searchEntity');
        $template='BenLogementBundle:Room:ajax_list.html.twig';
        $entities = $em->getRepository('BenLogementBundle:Room')->search($perPage, $page, $logement, $searchEntity);
        return $this->render($template, array(
                    'entities' => $entities,
                    'nombreParPage' => $perPage,
                    'nombrePage' => ceil(count($entities) / $perPage),
                    'page' => $page));
    }

    /**
     * @Secure(roles="ROLE_USER")
     * 
     */
    public function freeRoomsAction(Request $request, Person $person)
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('BenLogementBundle:Room')->getFreeRooms($person->getLogement()->getId(), $person->getGender());
        return $this->render('BenLogementBundle:Room:ajax_list.html.twig', array(
                    'entities' => $entities,
                    'nombreParPage' => 99999,
                    ));
    }

    /**
     * Finds and displays a Room entity.
     * @Secure(roles="ROLE_USER")
     *
     */
    public function showAction(Room $entity)
    {
        $em = $this->getDoctrine()->getManager();

        $deleteForm = $this->createDeleteForm($entity->getId());

        return $this->render('BenLogementBundle:Room:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView()
            ));
    }

    /**
     * Displays a form to create a new Room entity.
     * @Secure(roles="ROLE_USER")
     *
     */
    public function newAction()
    {
        $entity = new Room();
        $form   = $this->createForm(new RoomType(), $entity);

        return $this->render('BenLogementBundle:Room:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Room entity.
     * @Secure(roles="ROLE_USER")
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Room();
        $form = $this->createForm(new RoomType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('room_show', array('id' => $entity->getId())));
        }

        return $this->render('BenLogementBundle:Room:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Room entity.
     * @Secure(roles="ROLE_USER")
     *
     */
    public function newMultipleAction()
    {
        $entity = new Block();
        $form = $this->createFormBuilder($entity)
                ->add('name')
                ->add('type', 'choice', array('choices' => array('Garçon' => 'Garçon','Fille' => 'Fille'),'required' => false,))
                ->add('floors', 'hidden')
            ->getForm();

        return $this->render('BenLogementBundle:Room:multiple_form.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Room entity.
     * @Secure(roles="ROLE_USER")
     *
     */
    public function createMultipleAction(Request $request)
    {
        $block  = new Block();
        $form = $this->createFormBuilder($block)
                ->add('name')
                ->add('type', 'choice', array('choices' => array('Garçon' => 'Garçon','Fille' => 'Fille'),'required' => false,))
                ->add('floors', 'hidden')
            ->getForm();
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $floors = $request->get('floor');
            if(count($floors) > 0){
                foreach ($floors as $key => $value ) {
                    $key++;
                    for ($i=1; $i <= $value['length'] ; $i++) { 
                       $data['NOM_CHAMBRE'] = $key.$value['number'].$i; // floor.room.number
                       $data['CAPACITE'] = $value['capacity'];
                       $data['LIBRE'] = $value['capacity'];
                       $data['ETAGE'] = $key;
                       $room  = new Room();
                       $room->setData($data);
                       $rooms[] = $room;
                    }
                }

                $logement = $this->container->get('security.context')->getToken()->getUser()->getLogement();
                $block->setLogement($logement);
                $block->setFloors(count($floors));
                $em->persist($block);
                foreach ($rooms as $room) {
                    $room->setBlock($block);
                    $em->persist($room);
                }
                $em->flush();
            }
            return $this->redirect($this->generateUrl('block_show', array('id' => $block->getId())));
        }

        return $this->render('BenLogementBundle:Room:multiple_form.html.twig', array(
            'entity' => $block,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Room entity.
     * @Secure(roles="ROLE_USER")
     *
     */
    public function editAction(Room $entity)
    {
        $em = $this->getDoctrine()->getManager();

        $editForm = $this->createForm(new RoomType(), $entity);
        $deleteForm = $this->createDeleteForm($entity->getId());

        return $this->render('BenLogementBundle:Room:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Room entity.
     * @Secure(roles="ROLE_USER")
     *
     */
    public function updateAction(Request $request, Room $entity)
    {
        $em = $this->getDoctrine()->getManager();

        $deleteForm = $this->createDeleteForm($entity->getId());
        $editForm = $this->createForm(new RoomType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('room_edit', array('id' => $id)));
        }

        return $this->render('BenLogementBundle:Room:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Room entity.
     * @Secure(roles="ROLE_USER")
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BenLogementBundle:Room')->find($id);
            if (!$entity) throw $this->createNotFoundException('Unable to find Room entity.');

            $this->setFree($entity);
            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('room'));
    }

    /**
     * switch rooms between two persons
     * @Secure(roles="ROLE_USER")
     *
     */
    public function switchAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $ids = $request->get('entities');
        $person1 = $em->getRepository('BenLogementBundle:Person')->find($ids[0]);
        if (!$person1)  throw $this->createNotFoundException('Unable to find Person entity.');
        $person2 = $em->getRepository('BenLogementBundle:Person')->find($ids[1]);
        if (!$person2)  throw $this->createNotFoundException('Unable to find Person entity.');

        $reservation1 = $person1->getReservations()->last();
        $reservation2 = $person2->getReservations()->last();

        $room1 = $reservation1->getRoom();
        $room2 = $reservation2->getRoom();

        $reservation1->setRoom($room2);
        $reservation2->setRoom($room1);

        $em->persist($reservation1);
        $em->persist($reservation2);
        $em->flush();
        
        return new Response('1');
    }

    /**
     * free a room
     * @Secure(roles="ROLE_USER")
     *
     */
    public function setFreeAction(Room $entity)
    {
        $this->setFree($entity);
        
        return $this->redirect($this->generateUrl('room_show', array('id' => $entity->getId())));
    }

    /* helper functions */
    public function setFree(Room $entity)
    {
        $em = $this->getDoctrine()->getManager();
        $reservations = $entity->setFree($entity->getCapacity())->getReservations();
        foreach ($reservations as $reservation) {
            $person = $reservation->getPerson()->setStatus(Person::$valideStatus);
        }
        
        $em->persist($entity);
        foreach ($reservations as $reservation) $em->remove($reservation);
        $em->flush();
    }
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
