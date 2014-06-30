<?php

namespace Ben\LogementBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use JMS\SecurityExtraBundle\Annotation\Secure;

use Ben\LogementBundle\Entity\Import;
use Ben\LogementBundle\Form\ImportType;
use Ben\LogementBundle\Entity\Person;
use \Ben\LogementBundle\Entity\Room;

class StatsController extends Controller
{
    /**
     * Dashboard
     * @Secure(roles="ROLE_USER")
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $logement = $this->container->get('security.context')->getToken()->getUser()->getLogement();
        if (!$logement)  throw $this->createNotFoundException('Unable to find logement entity.');
        $data = $em->getRepository('BenLogementBundle:Person')->statsByCity($logement->getId());

        return $this->render('BenLogementBundle:Stats:city.html.twig', array('entities' => $data));
    }
    /**
     * Dashboard
     * @Secure(roles="ROLE_USER")
     *
     */
    public function statsByUniversityAction()
    {
        $em = $this->getDoctrine()->getManager();
        $logement = $this->container->get('security.context')->getToken()->getUser()->getLogement();
        if (!$logement)  throw $this->createNotFoundException('Unable to find logement entity.');
        $data = $em->getRepository('BenLogementBundle:Person')->statsByUniversity($logement->getId());

        return $this->render('BenLogementBundle:Stats:university.html.twig', array('entities' => $data));
    }
    /**
     * Dashboard
     * @Secure(roles="ROLE_USER")
     *
     */
    public function statsByDiplomeAction()
    {
        $em = $this->getDoctrine()->getManager();
        $logement = $this->container->get('security.context')->getToken()->getUser()->getLogement();
        if (!$logement)  throw $this->createNotFoundException('Unable to find logement entity.');
        $data = $em->getRepository('BenLogementBundle:Person')->statsByDiplome($logement->getId());

        return $this->render('BenLogementBundle:Stats:cycle.html.twig', array('entities' => $data));
    }
    /**
     * Dashboard
     * @Secure(roles="ROLE_USER")
     *
     */
    public function statsByAgeAction()
    {
        $em = $this->getDoctrine()->getManager();
        $logement = $this->container->get('security.context')->getToken()->getUser()->getLogement();
        if (!$logement)  throw $this->createNotFoundException('Unable to find logement entity.');
        $data = $em->getRepository('BenLogementBundle:Person')->statsByAge($logement->getId());

        return $this->render('BenLogementBundle:Stats:age.html.twig', array('entities' => $data));
    }
    /**
     * Dashboard
     * @Secure(roles="ROLE_USER")
     *
     */
    public function statsByAncienteteAction()
    {
        $em = $this->getDoctrine()->getManager();
        $logement = $this->container->get('security.context')->getToken()->getUser()->getLogement();
        if (!$logement)  throw $this->createNotFoundException('Unable to find logement entity.');
        $data = $em->getRepository('BenLogementBundle:Person')->statsByAncientete($logement->getId());

        return $this->render('BenLogementBundle:Stats:ancientete.html.twig', array('entities' => $data));
    }
}
