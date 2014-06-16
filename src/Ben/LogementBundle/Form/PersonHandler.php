<?php

namespace Ben\LogementBundle\Form;

use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;
use Ben\LogementBundle\Entity\Person;
use Symfony\Component\Security\Core\SecurityContext;

class PersonHandler {

    protected $form;
    protected $request;
    protected $em;
    protected $securityContext;
    

    public function __construct(Form $form, Request $request, EntityManager $em, SecurityContext $securityContext) {
        $this->form = $form;
        $this->request = $request;
        $this->em = $em;
        $this->securityContext = $securityContext;
    }

    public function process() {
        if ($this->request->getMethod() === 'POST') {
            $this->form->bindRequest($this->request);
            if ($this->form->isValid()) {
                $this->onSuccess($this->form->getData());
                return true;
            }
        }
        return false;
    }

    public function onSuccess(Person $entity) {
        if($this->request->get('_route')=='etudiant_create'){
            $logement = $this->securityContext->getToken()->getUser()->getLogement();
            $entity->setLogement($logement);
        }

        if($entity->getType()===Person::$foreignType)
            $entity->setStatus(Person::$eligibleStatus);
        $entity->calculateNote(); // pour clalculer la note de logement 
        $this->em->persist($entity);
        $this->em->flush();
    }

}