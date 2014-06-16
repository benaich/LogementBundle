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
    
    /**
     * Deletes a University entity.
     * @Secure(roles="ROLE_MANAGER")
     *
     */
    public function toExcelAction($type)
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('BenLogementBundle:university')->findByType($type);
        // ask the service for a Excel5
        $phpExcelObject = $this->get('phpexcel')->createPHPExcelObject();

        $phpExcelObject->getProperties()->setCreator("onousc");
        $phpExcelObject->setActiveSheetIndex(0)
            ->setCellValue("A1", "Id");

        if($type === 'university') $phpExcelObject
            ->setActiveSheetIndex(0)->setCellValue("B1", "Univérsité");
        else $phpExcelObject->setActiveSheetIndex(0)
            ->setCellValue("B1", "Etablissement")
            ->setCellValue("C1", "Univérsité");
        $i=2;
        foreach ($entities as $entity) {
           $phpExcelObject->setActiveSheetIndex(0)
                ->setCellValue("A$i", $entity->getId())
                ->setCellValue("B$i", $entity->getName());

           if($type !== 'university')
            $phpExcelObject->setActiveSheetIndex(0)
                ->setCellValue("C$i", $entity->getParent()->getName());
            $i++;
        }

        $phpExcelObject->getActiveSheet()->setTitle('Liste des Chambres');

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
        $response->headers->set('Content-Disposition', "attachment;filename=onousc_university_$now.xls");
        $response->headers->set('Pragma', 'public');
        $response->headers->set('Cache-Control', 'maxage=1');

        return $response;        
    }
}
