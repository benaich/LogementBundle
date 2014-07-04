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

use Ben\LogementBundle\Pagination\Paginator;

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
        if (!$logement)  throw $this->createNotFoundException('Unable to find logement entity.');
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
        $source = $request->get('source');
        $logement = $this->container->get('security.context')->getToken()->getUser()->getLogement()->getId();
        if (!$logement)  throw $this->createNotFoundException('Unable to find logement entity.');
        $searchEntity = $request->get('searchEntity');
        $template='BenLogementBundle:Room:ajax_list.html.twig';
        $entities = $em->getRepository('BenLogementBundle:Room')->search($perPage, $page, $logement, $searchEntity);

        $pagination = (new Paginator())->setItems(count($entities), $perPage)->setPage($page)->toArray();
        return $this->render($template, array(
                    'entities' => $entities,
                    'pagination' => $pagination,
                    'source' => $source
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

            $this->get('session')->getFlashBag()->add('success', "la chambre a été ajouté avec succée.");
            return $this->redirect($this->generateUrl('room_show', array('id' => $entity->getId())));
        }

        $this->get('session')->getFlashBag()->add('error', "Il y a des erreurs dans le formulaire soumis !");
        return $this->render('BenLogementBundle:Room:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a mutiple Rooms entity.
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
     * Creates mutiple Room entity.
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
                    for ($i=1; $i <= $value['length'] ; $i++) { 
                        $room_number = ($i<10)? '0'.$i : $i;
                        $data['NOM_CHAMBRE'] = $key.$room_number; // floor.room_number
                        $data['CAPACITE'] = $value['capacity'];
                        $data['LIBRE'] = $value['capacity'];
                        $data['ETAGE'] = $key;
                        $room  = new Room();
                        $room->setData($data);
                        $rooms[] = $room;
                    }
                    $key++;
                }

                $logement = $this->container->get('security.context')->getToken()->getUser()->getLogement();
                if (!$logement)  throw $this->createNotFoundException('Unable to find logement entity.');
                $block->setLogement($logement);
                $block->setFloors(count($floors));
                $em->persist($block);
                foreach ($rooms as $room) {
                    $room->setBlock($block);
                    $em->persist($room);
                }
                $em->flush();
            }
            $this->get('session')->getFlashBag()->add('success', "Le pavillon a été ajouté avec succée.");
            return $this->redirect($this->generateUrl('block_show', array('id' => $block->getId())));
        }

        $this->get('session')->getFlashBag()->add('error', "Il y a des erreurs dans le formulaire soumis !");
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

            $this->get('session')->getFlashBag()->add('success', "Mise à jour effectué avec succée.");
            return $this->redirect($this->generateUrl('room_edit', array('id' => $entity->getId())));
        }

        $this->get('session')->getFlashBag()->add('error', "Il y a des erreurs dans le formulaire soumis !");
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
    public function deleteAction(Request $request, Room $entity)
    {
        $form = $this->createDeleteForm($entity->getId());
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', "Supression effectué avec succée.");
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

        $reservation1 = $person1->getReservation();
        $reservation2 = $person2->getReservation();
        $reservation1->switchRoom($reservation2);

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
        $em = $this->getDoctrine()->getManager();
        $reservations = $entity->getReservations();
        foreach ($reservations as $reservation) $em->remove($reservation);
        
        $em->flush();
        $this->get('session')->getFlashBag()->add('success', "Action effectué avec succée.");
        return $this->redirect($this->generateUrl('room_show', array('id' => $entity->getId())));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
    
    /**
     * export to excel.
     * @Secure(roles="ROLE_USER")
     *
     */
    public function toExcelAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('BenLogementBundle:room')->findAll();
        // ask the service for a Excel5
        $phpExcelObject = $this->get('phpexcel')->createPHPExcelObject();

        $phpExcelObject->getProperties()->setCreator("onousc");
        $phpExcelObject->setActiveSheetIndex(0)
            ->setCellValue("A1", "Id")
            ->setCellValue("B1", "Chambre")
            ->setCellValue("C1", "Etage")
            ->setCellValue("D1", "Pavillon")
            ->setCellValue("E1", "Chambre pour")
            ->setCellValue("F1", "Capacité")
            ->setCellValue("G1", "Place libre");
        $i=2;
        foreach ($entities as $entity) {
           $phpExcelObject->setActiveSheetIndex(0)
                ->setCellValue("A$i", $entity->getId())
                ->setCellValue("B$i", $entity->getName())
                ->setCellValue("C$i", $entity->getFloor())
                ->setCellValue("D$i", $entity->getBlock()->getName())
                ->setCellValue("E$i", $entity->getBlock()->getType())
                ->setCellValue("F$i", $entity->getCapacity())
                ->setCellValue("G$i", $entity->getFree());
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
        $response->headers->set('Content-Disposition', "attachment;filename=onousc_chambre_$now.xls");
        $response->headers->set('Pragma', 'public');
        $response->headers->set('Cache-Control', 'maxage=1');

        return $response;        
    }
}
