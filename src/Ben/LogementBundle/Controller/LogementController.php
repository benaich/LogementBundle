<?php

namespace Ben\LogementBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use JMS\SecurityExtraBundle\Annotation\Secure;

use Ben\LogementBundle\Entity\Logement;
use Ben\LogementBundle\Form\LogementType;

/**
 * Logement controller.
 *
 */
class LogementController extends Controller
{
    /**
     * Lists all Logement entities.
     * @Secure(roles="ROLE_USER")
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BenLogementBundle:Logement')->findAll();

        return $this->render('BenLogementBundle:Logement:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Logement entity.
     * @Secure(roles="ROLE_USER")
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenLogementBundle:Logement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Logement entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BenLogementBundle:Logement:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Logement entity.
     * @Secure(roles="ROLE_MANAGER")
     *
     */
    public function newAction()
    {
        $entity = new Logement();
        $form   = $this->createForm(new LogementType(), $entity);

        return $this->render('BenLogementBundle:Logement:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Logement entity.
     * @Secure(roles="ROLE_MANAGER")
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Logement();
        $form = $this->createForm(new LogementType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('logement_show', array('id' => $entity->getId())));
        }

        return $this->render('BenLogementBundle:Logement:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Logement entity.
     * @Secure(roles="ROLE_MANAGER")
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenLogementBundle:Logement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Logement entity.');
        }

        $editForm = $this->createForm(new LogementType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BenLogementBundle:Logement:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Logement entity.
     * @Secure(roles="ROLE_MANAGER")
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenLogementBundle:Logement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Logement entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new LogementType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('logement_edit', array('id' => $id)));
        }

        return $this->render('BenLogementBundle:Logement:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Logement entity.
     * @Secure(roles="ROLE_MANAGER")
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BenLogementBundle:Logement')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Logement entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('logement'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
