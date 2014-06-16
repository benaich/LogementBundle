<?php

namespace Ben\LogementBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use JMS\SecurityExtraBundle\Annotation\Secure;

use Ben\LogementBundle\Entity\Block;
use Ben\LogementBundle\Form\BlockType;

/**
 * Block controller.
 *
 */
class BlockController extends Controller
{
    /**
     * Lists all Block entities.
     * @Secure(roles="ROLE_USER")
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $logement = $this->container->get('security.context')->getToken()->getUser()->getLogement();
        if (!$logement)  throw $this->createNotFoundException('Unable to find logement entity.');
        $entities = $em->getRepository('BenLogementBundle:Block')->findbyLogement($logement->getId());

        return $this->render('BenLogementBundle:Block:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Block entity.
     * @Secure(roles="ROLE_USER")
     *
     */
    public function showAction(Block $entity)
    {

        $deleteForm = $this->createDeleteForm($entity->getId());

        return $this->render('BenLogementBundle:Block:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Block entity.
     * @Secure(roles="ROLE_USER")
     *
     */
    public function newAction()
    {
        $entity = new Block();
        $form   = $this->createForm(new BlockType(), $entity);

        return $this->render('BenLogementBundle:Block:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Block entity.
     * @Secure(roles="ROLE_USER")
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Block();
        $form = $this->createForm(new BlockType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $logement = $this->container->get('security.context')->getToken()->getUser()->getLogement();
            if (!$logement)  throw $this->createNotFoundException('Unable to find logement entity.');
            $entity->setLogement($logement);
            $em->persist($entity);
            $em->flush();

            $this->get('session')->getFlashBag()->add('success', "Le pavillon a été ajouté avec succée.");
            return $this->redirect($this->generateUrl('block_show', array('id' => $entity->getId())));
        }

        $this->get('session')->getFlashBag()->add('error', "Il y a des erreurs dans le formulaire soumis !");
        return $this->render('BenLogementBundle:Block:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Block entity.
     * @Secure(roles="ROLE_MANAGER")
     *
     */
    public function editAction(Block $entity)
    {
        $em = $this->getDoctrine()->getManager();
        $deleteForm = $this->createDeleteForm($entity->getId());
        $editForm = $this->createForm(new BlockType(), $entity);

        return $this->render('BenLogementBundle:Block:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Block entity.
     * @Secure(roles="ROLE_MANAGER")
     *
     */
    public function updateAction(Request $request, Block $entity)
    {
        $em = $this->getDoctrine()->getManager();
        $deleteForm = $this->createDeleteForm($entity->getId());
        $editForm = $this->createForm(new BlockType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            $this->get('session')->getFlashBag()->add('success', "Mise à jour effectué avec succée.");
            return $this->redirect($this->generateUrl('block_edit', array('id' => $entity->getId())));
        }

        $this->get('session')->getFlashBag()->add('error', "Il y a des erreurs dans le formulaire soumis !");
        return $this->render('BenLogementBundle:Block:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Block entity.
     * @Secure(roles="ROLE_MANAGER")
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BenLogementBundle:Block')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Block entity.');
            }

            $this->get('session')->getFlashBag()->add('success', "Supression effectué avec succée.");
            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('block'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
