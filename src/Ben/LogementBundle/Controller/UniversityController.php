<?php

namespace Ben\LogementBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Httpfoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use JMS\SecurityExtraBundle\Annotation\Secure;

use Ben\LogementBundle\Entity\University;
use Ben\LogementBundle\Form\UniversityType;

/**
 * University controller.
 *
 */
class UniversityController extends Controller
{
    /**
     * Lists all University entities.
     * @Secure(roles="ROLE_USER")
     *
     */
    public function indexAction($type)
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BenLogementBundle:University')->findByType($type);

        return $this->render('BenLogementBundle:University:index_'.$type.'.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * json rooms entities.
     * @Secure(roles="ROLE_USER")
     *
     */
    public function jsonListAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('BenLogementBundle:University')->getEtablissement($id);
        $response = new Response(json_encode($entities));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * Finds and displays a University entity.
     * @Secure(roles="ROLE_USER")
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenLogementBundle:University')->find($id);
        if (!$entity) throw $this->createNotFoundException('Unable to find University entity.');

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BenLogementBundle:University:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new University entity.
     * @Secure(roles="ROLE_MANAGER")
     *
     */
    public function newAction($type)
    {
        $entity = new University($type);
        $form   = $this->createForm(new UniversityType($type), $entity);

        return $this->render('BenLogementBundle:University:new.html.twig', array(
            'type' => $type,
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new University entity.
     * @Secure(roles="ROLE_MANAGER")
     *
     */
    public function createAction(Request $request, $type)
    {
        $entity  = new University($type);
        $form = $this->createForm(new UniversityType($type), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity->setType($type);
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('university_show', array('id' => $entity->getId())));
        }

        return $this->render('BenLogementBundle:University:new.html.twig', array(
            'entity' => $entity,
            'type' => $type,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing University entity.
     * @Secure(roles="ROLE_MANAGER")
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenLogementBundle:University')->find($id);
        if (!$entity) throw $this->createNotFoundException('Unable to find University entity.');

        $editForm = $this->createForm(new UniversityType($entity->getType()), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BenLogementBundle:University:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing University entity.
     * @Secure(roles="ROLE_MANAGER")
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenLogementBundle:University')->find($id);
        if (!$entity) throw $this->createNotFoundException('Unable to find University entity.');

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new UniversityType($entity->getType()), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('university_edit', array('id' => $id)));
        }

        return $this->render('BenLogementBundle:University:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a University entity.
     * @Secure(roles="ROLE_MANAGER")
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BenLogementBundle:University')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find University entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('university'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
