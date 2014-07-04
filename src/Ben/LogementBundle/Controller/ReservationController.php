<?php

namespace Ben\LogementBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use JMS\SecurityExtraBundle\Annotation\Secure;

use Ben\LogementBundle\Entity\Reservation;
use Ben\LogementBundle\Form\ReservationType;
use Ben\LogementBundle\Entity\Person;

use Ben\LogementBundle\Pagination\Paginator;

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
    public function indexAction($page, $perPage, $status)
    {
        $em = $this->getDoctrine()->getManager();

        $logement = $this->container->get('security.context')->getToken()->getUser()->getLogement();
        if (!$logement)  throw $this->createNotFoundException('Unable to find logement entity.');
        $entities = $em->getRepository('BenLogementBundle:Reservation')->findbyLogement($logement->getId(), $perPage, $page, $status);
        $pagination = (new Paginator())->setItems(count($entities), $perPage)->setPage($page)->toArray();
        return $this->render('BenLogementBundle:Reservation:index.html.twig', array(
            'entities' => $entities,
            'status' => $status,
            'pagination' => $pagination
            ));
    }

    /**
     * Finds and displays a Reservation entity.
     * @Secure(roles="ROLE_USER")
     *
     */
    public function showAction(Reservation $entity)
    {
        $em = $this->getDoctrine()->getManager();
        $deleteForm = $this->createDeleteForm($entity->getId());

        return $this->render('BenLogementBundle:Reservation:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
            ));
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
            $entity->getRoom()->minusFree();
            if($entity->getStatus() === Reservation::$valideStatus){
                $entity->getPerson()->setStatus(Person::$residentStatus);
            }else{
                $entity->getPerson()->setStatus(Person::$suspendedStatus);
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            $this->get('session')->getFlashBag()->add('success', "Paiement effectué avec succée.");
            return $this->redirect($this->generateUrl('reservation_show', array('id' => $entity->getId())));
        }
        
        $this->get('session')->getFlashBag()->add('danger', "Il y a des erreurs dans le formulaire soumis !");
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
    public function editAction(Reservation $entity)
    {
        $entity->setOldroom($entity->getRoom()->getId());

        $editForm = $this->createForm(new ReservationType(), $entity);
        $deleteForm = $this->createDeleteForm($entity->getId());

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
    public function updateAction(Request $request, Reservation $entity)
    {
        $em = $this->getDoctrine()->getManager();

        $deleteForm = $this->createDeleteForm($entity->getId());
        $editForm = $this->createForm(new ReservationType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            if ($entity->getOldroom() != $entity->getRoom()->getId()) {
                $room = $em->getRepository('BenLogementBundle:Room')->find($entity->getOldroom());
                $room->plusFree();
                $entity->getRoom()->minusFree();
                $em->persist($room);
            }
            
            if($entity->getStatus() === Reservation::$valideStatus){
                $entity->getPerson()->setStatus(Person::$residentStatus);
            }else{
                $entity->getPerson()->setStatus(Person::$suspendedStatus);
            }
            $em->persist($entity);
            $em->flush();

            $this->get('session')->getFlashBag()->add('success', "Action effectué avec succée.");
            return $this->redirect($this->generateUrl('reservation_show', array('id' => $entity->getId())));
        }

        $this->get('session')->getFlashBag()->add('danger', "Il y a des erreurs dans le formulaire soumis !");
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
    public function deleteAction(Request $request, Reservation $entity)
    {
        $form = $this->createDeleteForm($entity->getId());
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', "Action effectué avec succée.");
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

    /**
     * @Secure(roles="ROLE_USER")
     */
    public function setStatusAction(Reservation $entity, $status)
    {
        $em = $this->getDoctrine()->getManager();
        if($status == 1){
            $entity->setStatus(Reservation::$valideStatus);
            $entity->getPerson()->setStatus(Person::$residentStatus);
        }else{
            $entity->setStatus(Reservation::$notValideStatus);
            $entity->getPerson()->setStatus(Person::$suspendedStatus);
        }
        $em->persist($entity);
        $em->flush();
        $this->get('session')->getFlashBag()->add('success', "Action effectué avec succée.");
        return $this->redirect($this->generateUrl('reservation_show', array('id' => $entity->getId())));
    }
}
