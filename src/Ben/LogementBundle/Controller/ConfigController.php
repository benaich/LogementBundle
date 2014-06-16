<?php

namespace Ben\LogementBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use JMS\SecurityExtraBundle\Annotation\Secure;

use Ben\LogementBundle\Entity\Config;
use Ben\LogementBundle\Form\configType;

/**
 * config controller.
 *
 */
class ConfigController extends Controller
{
    /**
     * Lists all config entities.
     * @Secure(roles="ROLE_MANAGER")
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BenLogementBundle:Config')->findAll();
        $logements = $em->getRepository('BenLogementBundle:Logement')->findAll();
        $config=[];

        foreach ($entities as $entity) {
           $config[$entity->getTheKey()] = $entity->getTheValue();
        }
        $img = new \Ben\LogementBundle\Entity\image();
        $imgform   = $this->createForm(new \Ben\LogementBundle\Form\imageType(), $img);

        return $this->render('BenLogementBundle:Config:index.html.twig', array(
            'config' => $config,
            'logements' => $logements,
            'imgform' => $imgform->createView()
        ));
    }

    /**
     * Finds and displays a config entity.
     * @Secure(roles="ROLE_MANAGER")
     *
     */
    public function showAction(config $entity)
    {
        $deleteForm = $this->createDeleteForm($entity->getId());

        return $this->render('BenLogementBundle:Config:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new config entity.
     * @Secure(roles="ROLE_MANAGER")
     *
     */
    public function newAction()
    {
        $entity = new config();
        $form   = $this->createForm(new configType(), $entity);

        return $this->render('BenLogementBundle:Config:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new config entity.
     * @Secure(roles="ROLE_MANAGER")
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new config();
        $form = $this->createForm(new configType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('config_show', array('id' => $entity->getId())));
        }

        return $this->render('BenLogementBundle:Config:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing config entity.
     * @Secure(roles="ROLE_MANAGER")
     *
     */
    public function editAction(config $entity)
    {
        $editForm = $this->createForm(new configType(), $entity);
        $deleteForm = $this->createDeleteForm($entity->getId());

        return $this->render('BenLogementBundle:Config:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing config entity.
     * @Secure(roles="ROLE_MANAGER")
     *
     */
    public function updateAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $config = $request->get('config');

        /* handle img */
        $img = new \Ben\LogementBundle\Entity\image();
        $imgform   = $this->createForm(new \Ben\LogementBundle\Form\imageType(), $img);
        
        $imgform->bind($request);
        if($img->upload())
            $config['app_logo'] = $img->getWebPath();

        foreach ($config as $key => $value) {
            $em->getRepository('BenLogementBundle:Config')->updateBy($key, $value);
        }

        $this->get('session')->getFlashBag()->add('success', "Vos modifications ont été enregistré avec succée.");
        return $this->redirect($this->generateUrl('config'));
    }

    /**
     * Deletes a config entity.
     * @Secure(roles="ROLE_MANAGER")
     *
     */
    public function deleteAction(Request $request, config $entity)
    {
        $form = $this->createDeleteForm($entity->getId());
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', "Action effectué avec succée.");
        }

        return $this->redirect($this->generateUrl('config'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
