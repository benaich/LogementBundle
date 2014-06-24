<?php

namespace Proxies\__CG__\Ben\LogementBundle\Entity;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class Person extends \Ben\LogementBundle\Entity\Person implements \Doctrine\ORM\Proxy\Proxy
{
    private $_entityPersister;
    private $_identifier;
    public $__isInitialized__ = false;
    public function __construct($entityPersister, $identifier)
    {
        $this->_entityPersister = $entityPersister;
        $this->_identifier = $identifier;
    }
    /** @private */
    public function __load()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;

            if (method_exists($this, "__wakeup")) {
                // call this after __isInitialized__to avoid infinite recursion
                // but before loading to emulate what ClassMetadata::newInstance()
                // provides.
                $this->__wakeup();
            }

            if ($this->_entityPersister->load($this->_identifier, $this) === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            unset($this->_entityPersister, $this->_identifier);
        }
    }

    /** @private */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int) $this->_identifier["id"];
        }
        $this->__load();
        return parent::getId();
    }

    public function __toString()
    {
        $this->__load();
        return parent::__toString();
    }

    public function setCne($cne)
    {
        $this->__load();
        return parent::setCne($cne);
    }

    public function getCne()
    {
        $this->__load();
        return parent::getCne();
    }

    public function setParentsRevenu($parentsRevenu)
    {
        $this->__load();
        return parent::setParentsRevenu($parentsRevenu);
    }

    public function getParentsRevenu()
    {
        $this->__load();
        return parent::getParentsRevenu();
    }

    public function setBroSisNumber($broSisNumber)
    {
        $this->__load();
        return parent::setBroSisNumber($broSisNumber);
    }

    public function getBroSisNumber()
    {
        $this->__load();
        return parent::getBroSisNumber();
    }

    public function setNiveauEtude($niveauEtude)
    {
        $this->__load();
        return parent::setNiveauEtude($niveauEtude);
    }

    public function getNiveauEtude()
    {
        $this->__load();
        return parent::getNiveauEtude();
    }

    public function setType($type)
    {
        $this->__load();
        return parent::setType($type);
    }

    public function getType()
    {
        $this->__load();
        return parent::getType();
    }

    public function setStatus($status)
    {
        $this->__load();
        return parent::setStatus($status);
    }

    public function getStatus()
    {
        $this->__load();
        return parent::getStatus();
    }

    public function setNDossier($nDossier)
    {
        $this->__load();
        return parent::setNDossier($nDossier);
    }

    public function getNDossier()
    {
        $this->__load();
        return parent::getNDossier();
    }

    public function setConditionSpecial($condition_special)
    {
        $this->__load();
        return parent::setConditionSpecial($condition_special);
    }

    public function getConditionSpecial()
    {
        $this->__load();
        return parent::getConditionSpecial();
    }

    public function setAncientete($ancientete)
    {
        $this->__load();
        return parent::setAncientete($ancientete);
    }

    public function getAncientete()
    {
        $this->__load();
        return parent::getAncientete();
    }

    public function setDiplome($diplome)
    {
        $this->__load();
        return parent::setDiplome($diplome);
    }

    public function getDiplome()
    {
        $this->__load();
        return parent::getDiplome();
    }

    public function setRemarque($remarque)
    {
        $this->__load();
        return parent::setRemarque($remarque);
    }

    public function getRemarque()
    {
        $this->__load();
        return parent::getRemarque();
    }

    public function setPassport($passport)
    {
        $this->__load();
        return parent::setPassport($passport);
    }

    public function getPassport()
    {
        $this->__load();
        return parent::getPassport();
    }

    public function setCarteSejour($carteSejour)
    {
        $this->__load();
        return parent::setCarteSejour($carteSejour);
    }

    public function getCarteSejour()
    {
        $this->__load();
        return parent::getCarteSejour();
    }

    public function setExellence($exellence)
    {
        $this->__load();
        return parent::setExellence($exellence);
    }

    public function getExellence()
    {
        $this->__load();
        return parent::getExellence();
    }

    public function setObtentionBac($obtention_bac)
    {
        $this->__load();
        return parent::setObtentionBac($obtention_bac);
    }

    public function getObtentionBac()
    {
        $this->__load();
        return parent::getObtentionBac();
    }

    public function setFamilyName($familyName)
    {
        $this->__load();
        return parent::setFamilyName($familyName);
    }

    public function getFamilyName()
    {
        $this->__load();
        return parent::getFamilyName();
    }

    public function setFirstName($firstName)
    {
        $this->__load();
        return parent::setFirstName($firstName);
    }

    public function getFirstName()
    {
        $this->__load();
        return parent::getFirstName();
    }

    public function getFullName()
    {
        $this->__load();
        return parent::getFullName();
    }

    public function setFamilyNameAr($familyNameAr)
    {
        $this->__load();
        return parent::setFamilyNameAr($familyNameAr);
    }

    public function getFamilyNameAr()
    {
        $this->__load();
        return parent::getFamilyNameAr();
    }

    public function setFirstNameAr($firstNameAr)
    {
        $this->__load();
        return parent::setFirstNameAr($firstNameAr);
    }

    public function getFirstNameAr()
    {
        $this->__load();
        return parent::getFirstNameAr();
    }

    public function setEmail($email)
    {
        $this->__load();
        return parent::setEmail($email);
    }

    public function getEmail()
    {
        $this->__load();
        return parent::getEmail();
    }

    public function setCin($cin)
    {
        $this->__load();
        return parent::setCin($cin);
    }

    public function getCin()
    {
        $this->__load();
        return parent::getCin();
    }

    public function setBirdDay($birdDay)
    {
        $this->__load();
        return parent::setBirdDay($birdDay);
    }

    public function getBirdDay()
    {
        $this->__load();
        return parent::getBirdDay();
    }

    public function setGender($gender)
    {
        $this->__load();
        return parent::setGender($gender);
    }

    public function getGender()
    {
        $this->__load();
        return parent::getGender();
    }

    public function setAddress($address)
    {
        $this->__load();
        return parent::setAddress($address);
    }

    public function getAddress()
    {
        $this->__load();
        return parent::getAddress();
    }

    public function setCity($city)
    {
        $this->__load();
        return parent::setCity($city);
    }

    public function getCity()
    {
        $this->__load();
        return parent::getCity();
    }

    public function setContry($contry)
    {
        $this->__load();
        return parent::setContry($contry);
    }

    public function getContry()
    {
        $this->__load();
        return parent::getContry();
    }

    public function setTel($tel)
    {
        $this->__load();
        return parent::setTel($tel);
    }

    public function getTel()
    {
        $this->__load();
        return parent::getTel();
    }

    public function setNote($note)
    {
        $this->__load();
        return parent::setNote($note);
    }

    public function getNote()
    {
        $this->__load();
        return parent::getNote();
    }

    public function setReservation(\Ben\LogementBundle\Entity\Reservation $reservation)
    {
        $this->__load();
        return parent::setReservation($reservation);
    }

    public function getReservation()
    {
        $this->__load();
        return parent::getReservation();
    }

    public function removeReservation()
    {
        $this->__load();
        return parent::removeReservation();
    }

    public function hasReservation()
    {
        $this->__load();
        return parent::hasReservation();
    }

    public function setLogement(\Ben\LogementBundle\Entity\Logement $logement)
    {
        $this->__load();
        return parent::setLogement($logement);
    }

    public function getLogement()
    {
        $this->__load();
        return parent::getLogement();
    }

    public function setEtablissement(\Ben\LogementBundle\Entity\University $etablissement = NULL)
    {
        $this->__load();
        return parent::setEtablissement($etablissement);
    }

    public function getEtablissement()
    {
        $this->__load();
        return parent::getEtablissement();
    }

    public function calculateNote()
    {
        $this->__load();
        return parent::calculateNote();
    }

    public function setData($data)
    {
        $this->__load();
        return parent::setData($data);
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'family_name', 'first_name', 'family_name_ar', 'first_name_ar', 'email', 'cin', 'cne', 'bird_day', 'gender', 'address', 'city', 'contry', 'tel', 'parents_revenu', 'bro_sis_number', 'n_dossier', 'condition_special', 'ancientete', 'niveau_etude', 'diplome', 'remarque', 'passport', 'carte_sejour', 'type', 'status', 'exellence', 'obtention_bac', 'note', 'reservation', 'logement', 'etablissement');
    }

    public function __clone()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;
            $class = $this->_entityPersister->getClassMetadata();
            $original = $this->_entityPersister->load($this->_identifier);
            if ($original === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            foreach ($class->reflFields as $field => $reflProperty) {
                $reflProperty->setValue($this, $reflProperty->getValue($original));
            }
            unset($this->_entityPersister, $this->_identifier);
        }
        
    }
}