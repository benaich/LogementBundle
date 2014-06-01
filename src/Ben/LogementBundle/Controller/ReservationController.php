<?php

namespace Ben\LogementBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use JMS\SecurityExtraBundle\Annotation\Secure;

use Ben\LogementBundle\Entity\Reservation;
use Ben\LogementBundle\Form\ReservationType;
use Ben\LogementBundle\Entity\Person;

/**
 * Reservation controller.
 *
 */
class ReservationController extends Controller
{
    /**
     * Lists all Reservation entities.
     * @Secure(roles="ROLE_USER")
     *
     */
    public function indexAction($page, $perPage)
    {
        $em = $this->getDoctrine()->getManager();

        $logement = $this->container->get('security.context')->getToken()->getUser()->getLogement();
        $entities = $em->getRepository('BenLogementBundle:Reservation')->findbyLogement($perPage, $page, $logement->getId());

        return $this->render('BenLogementBundle:Reservation:index.html.twig', array(
            'entities' => $entities,
            'nombreParPage' => $perPage,
            'nombrePage' => ceil(count($entities) / $perPage),
            'page' => $page
            ));
    }

    /**
     * Finds and displays a Reservation entity.
     * @Secure(roles="ROLE_USER")
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenLogementBundle:Reservation')->find($id);
        if (!$entity) throw $this->createNotFoundException('Unable to find Reservation entity.');

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BenLogementBundle:Reservation:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Reservation entity.
     * @Secure(roles="ROLE_USER")
     *
     */
    public function newAction(Person $person)
    {
        if ($person->hasReservation()) {
            $this->get('session')->getFlashBag()->add('success', "L'étudiant est déja résidant.");
            $person->setStatus(Person::$residentStatus);
            $em = $this->getDoctrine()->getManager();
            $em->persist($person);
            $em->flush();
            return $this->redirect($this->generateUrl('etudiant_show', array('id' => $person->getId())));
        }
        $entity = new Reservation();
        $entity->setPerson($person);
        $form   = $this->createForm(new ReservationType(), $entity);

        return $this->render('BenLogementBundle:Reservation:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Reservation entity.
     * @Secure(roles="ROLE_USER")
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Reservation();
        $form = $this->createForm(new ReservationType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $entity->getPerson()->setStatus(Person::$residentStatus);
            $entity->getRoom()->minusFree();
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('reservation_show', array('id' => $entity->getId())));
        }

        return $this->render('BenLogementBundle:Reservation:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Reservation entity.
     * @Secure(roles="ROLE_USER")
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenLogementBundle:Reservation')->find($id);
        if (!$entity) throw $this->createNotFoundException('Unable to find Reservation entity.');

        $entity->setOldroom($entity->getRoom()->getId());

        $editForm = $this->createForm(new ReservationType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BenLogementBundle:Reservation:edit.html.twig', array(
            'entity'      => $entity,
            'form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Reservation entity.
     * @Secure(roles="ROLE_USER")
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenLogementBundle:Reservation')->find($id);
        if (!$entity) throw $this->createNotFoundException('Unable to find Reservation entity.');

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ReservationType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            if ($entity->getOldroom() != $entity->getRoom()->getId()) {
                $room = $em->getRepository('BenLogementBundle:Room')->find($entity->getOldroom());
                $room->plusFree();
                $entity->getRoom()->minusFree();
                $em->persist($room);
            }
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('reservation_edit', array('id' => $id)));
        }

        return $this->render('BenLogementBundle:Reservation:edit.html.twig', array(
            'entity'      => $entity,
            'form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Reservation entity.
     * @Secure(roles="ROLE_USER")
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BenLogementBundle:Reservation')->find($id);
            if (!$entity) throw $this->createNotFoundException('Unable to find Reservation entity.');

            $room = $entity->getRoom();
            $room->plusFree();
            $person = $entity->getPerson();
            $person->setStatus(Person::$eligibleStatus);
            $em->persist($room);
            $em->persist($person);

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('reservation'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
