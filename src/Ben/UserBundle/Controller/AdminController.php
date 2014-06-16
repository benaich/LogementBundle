<?php

namespace Ben\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Httpfoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Ben\UserBundle\Entity\User;
use Ben\UserBundle\Form\userType;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Ben\LogementBundle\Pagination\Paginator;

class AdminController extends Controller
{
    /**
     * @Secure(roles="ROLE_MANAGER")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entitiesLength = $em->getRepository('BenUserBundle:User')->counter();
        return $this->render('BenUserBundle:admin:index.html.twig', array(
                'entitiesLength' => $entitiesLength[1]));
    }

    /**
     * @Secure(roles="ROLE_MANAGER")
     */
    public function ajaxListAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $perPage = $request->get('perpage');
        $page = $request->get('page');
        $keyword = $request->get('keyword');
        $template='BenUserBundle:admin:ajax_list.html.twig';
        $entities = $em->getRepository('BenUserBundle:user')->getUsersBy($perPage, $page, $keyword);
        
        $pagination = (new Paginator())->setItems(count($entities), $perPage)->setPage($page)->toArray();
        return $this->render($template, array(
                    'entities' => $entities,
                    'pagination' => $pagination
                    ));
    }

    /**
     * @Secure(roles="ROLE_MANAGER")
     */
    public function newAction()
    {
        $entity = new User();
        $form = $this->createForm(new userType(), $entity);
        return $this->render('BenUserBundle:admin:new.html.twig', array('entity' => $entity, 'form' => $form->createView()));
    }

    /**
     * @Secure(roles="ROLE_MANAGER")
     */
    public function addAction(Request $request)
    {
        $em = $this->get('fos_user.user_manager');
        $entity = new User();
        $form = $this->createForm(new userType(), $entity);
        $form->bind($request);
        if ($form->isValid()) {
            $em->updateUser($entity, false);
            $entity->getImage()->upload();

            $this->getDoctrine()->getManager()->flush();
            $this->get('session')->getFlashBag()->add('success', "L'utilisateur a été ajouté avec succès.");
            return $this->redirect($this->generateUrl('ben_show_user', array('id' => $entity->getId())));
        }
        $this->get('session')->getFlashBag()->add('error', "Il y a des erreurs dans le formulaire soumis !");

        return $this->render('BenUserBundle:admin:new.html.twig', array('entity' => $entity, 'form' => $form->createView()));
    }

    /**
     * @Secure(roles="ROLE_MANAGER")
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('BenUserBundle:user')->find($id);
        if (!$entity) throw $this->createNotFoundException('Unable to find posts entity.');

        return $this->render('BenUserBundle:admin:show.html.twig', array('entity' => $entity));
    }

    /**
     * @Secure(roles="ROLE_MANAGER")
     */
    public function editAction(User $entity)
    {
        $form = $this->createForm(new userType(), $entity);
        return $this->render('BenUserBundle:admin:edit.html.twig', array('entity' => $entity, 'form' => $form->createView()));
    }

    /**
     * @Secure(roles="ROLE_MANAGER")
     */
    public function updateAction(Request $request, User $user) {
        $em = $this->get('fos_user.user_manager');
        $form = $this->createForm(new userType(), $user);
        $form->bind($request);
        /* check if user has admin role */
        if (in_array('ROLE_ADMIN', $user->getRoles())){
            $this->get('session')->getFlashBag()->add('danger', "impossible de modifier les informations d'un administrateur de cette interface");
            return $this->redirect($this->generateUrl('ben_users'));
        }
        if ($form->isValid()) {
            $em->updateUser($user, false);
            $user->getImage()->manualRemove($user->getImage()->getAbsolutePath());
            $user->getImage()->upload();

            $this->getDoctrine()->getManager()->flush();
            $this->get('session')->getFlashBag()->add('success', "Vos modifications ont été enregistrées.");
            return $this->redirect($this->generateUrl('ben_edit_user', array('id' => $user->getId())));
        }
        $this->get('session')->getFlashBag()->add('error', "Il y a des erreurs dans le formulaire soumis !");
        
        return $this->render('BenUserBundle:admin:edit.html.twig', array('entity' => $user, 'form' => $form->createView()));
    }

    /**
     * @Secure(roles="ROLE_MANAGER")
     */
    public function deleteAction($user)
    {
    	$entity = array();
        return $this->render('BenUserBundle:admin:new.html.twig', array('entity' => $entity));
    }
 
    /**
     * @Secure(roles="ROLE_MANAGER")
     */   
    public function removeUsersAction(Request $request)
    {
        $loginUser = $this->container->get('security.context')->getToken()->getUser();
        $users = $request->get('users');
        $userManager = $this->get('fos_user.user_manager');
        foreach( $users as $id){
            $user = $userManager->findUserBy(array('id' => $id));
            if($loginUser == $user) return new Response('Impossible de supprimer cet utilisateur');
            $userManager->deleteUser($user);
        }
        return new Response('supression effectué avec succès');
    } 

    /**
     * @Secure(roles="ROLE_MANAGER")
     */
    public function enableUsersAction(Request $request, $etat)
    {
        $users = $request->get('users');
        $userManager = $this->get('fos_user.user_manager');
        $etat = ($etat==1);
        foreach( $users as $id){
            $user = $userManager->findUserBy(array('id' => $id));
            $user->setEnabled($etat);
            $userManager->updateUser($user);
        }
        return new Response('1');
    }

    /**
     * @Secure(roles="ROLE_MANAGER")
     */    
    public function setRoleAction(Request $request, $role)
    {
        if($role=='ADMIN') $role='ROLE_ADMIN';
        else $role='ROLE_USER';

        $users = $request->get('users');
        $userManager = $this->get('fos_user.user_manager');
        foreach( $users as $id){
            $user = $userManager->findUserBy(array('id' => $id));
            $user->removeRole('ROLE_ADMIN');
            $user->addRole($role);
            $userManager->updateUser($user);
        }
        return new Response('1');
    }

    /**
     * @Secure(roles="ROLE_MANAGER")
     */    
    public function exportAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        
        $entities = $em->getRepository('BenUserBundle:user')->getUsers();
        $response = $this->render('BenUserBundle:admin:list.csv.twig',array(
                    'entities' => $entities,
                    ));
         $response->headers->set('Content-Type', 'text/csv');
         $response->headers->set('Content-Disposition', 'attachment; filename="contacts.csv"');

        return $response;
    }


    /**
     * Displays a form to edit an existing profil entity.
     * @Secure(roles="IS_AUTHENTICATED_REMEMBERED")
     */
    public function editMeAction() {
        $entity = $this->container->get('security.context')->getToken()->getUser();
        $isAdmin = $this->get('security.context')->isGranted('ROLE_MANAGER');
        $form = $this->createForm(new UserType(false, $isAdmin), $entity);
        return $this->render('BenUserBundle:myProfile:edit.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
                ));
    }


    /**
     * Edits an existing profil entity.
     * @Secure(roles="IS_AUTHENTICATED_REMEMBERED")
     */
    public function updateMeAction(Request $request, \Ben\UserBundle\Entity\User $entity) {
        $em = $this->getDoctrine()->getManager();
        $isAdmin = $this->get('security.context')->isGranted('ROLE_MANAGER');
        $form = $this->createForm(new UserType(false, $isAdmin), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em->persist($entity);
            $entity->getImage()->manualRemove($entity->getImage()->getAbsolutePath());
            $entity->getImage()->upload();
               
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', "Vos modifications ont été enregistrées.");
            return $this->redirect($this->generateUrl('ben_profile_edit', array('name' => $entity->getId())));
        }
        $this->get('session')->getFlashBag()->add('error', "Il y a des erreurs dans le formulaire soumis !");

        return $this->render('BenUserBundle:myProfile:edit.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
                ));
    }
}