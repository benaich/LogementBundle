<?php

namespace Ben\LogementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Logement
 *
 * @ORM\Table(name="logement")
 * @ORM\Entity(repositoryClass="Ben\LogementBundle\Entity\LogementRepository")
 */
class Logement
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255, nullable=true)
     */
    private $city;

    /**
     * @var integer
     *
     * @ORM\Column(name="place_etranger", type="integer", nullable=true)
     */
    private $place_etranger;

    /**
     * @var integer
     *
     * @ORM\Column(name="place_ancien", type="integer", nullable=true)
     */
    private $place_ancien;

    /**
    * @ORM\OneToMany(targetEntity="Ben\LogementBundle\Entity\Block", mappedBy="logement", cascade={"remove", "persist"})
    */
    private $blocks;
    
    /**
    * @ORM\OneToMany(targetEntity="Ben\LogementBundle\Entity\Person", mappedBy="logement", cascade={"remove", "persist"})
    */
    private $persons;
    
    /**
    * @ORM\OneToMany(targetEntity="Ben\UserBundle\Entity\User", mappedBy="logement")
    */
    private $users;

    /**
    * @ORM\OneToMany(targetEntity="Ben\LogementBundle\Entity\OrderList", mappedBy="logement", cascade={"remove", "persist"})
    */
    private $orderlists;
    
    /************ constructeur ************/
    
    public function __construct()
    {
        $this->blocks = new ArrayCollection();
        $this->persons = new ArrayCollection();
        $this->users = new ArrayCollection();
        $this->orderlists = new ArrayCollection();
    }
    
    /************ getters & setters  ************/

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Logement
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Logement
     */
    public function setCity($city)
    {
        $this->city = $city;
    
        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set place_etranger
     *
     * @param integer $placeEtranger
     * @return Logement
     */
    public function setPlaceEtranger($placeEtranger)
    {
        $this->place_etranger = $placeEtranger;
    
        return $this;
    }

    /**
     * Get place_etranger
     *
     * @return integer 
     */
    public function getPlaceEtranger()
    {
        return $this->place_etranger;
    }

    /**
     * Set place_ancien
     *
     * @param integer $placeAncien
     * @return Logement
     */
    public function setPlaceAncien($placeAncien)
    {
        $this->place_ancien = $placeAncien;
    
        return $this;
    }

    /**
     * Get place_ancien
     *
     * @return integer 
     */
    public function getPlaceAncien()
    {
        return $this->place_ancien;
    }

    /**
     * Get blocks
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBlocks()
    {
        return $this->blocks;
    }

    /**
     * Get orderlists
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOrderlists()
    {
        return $this->orderlists;
    }

    /**
     * Get persons
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPersons()
    {
        return $this->persons;
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }
    
    public function __toString()
    {
        return $this->name;
    }

    public function setData($data)
    {
        $this->setName($data['NOM']);
        $this->setCity($data['VILLE']);
        $this->setPlaceEtranger($data['PLACE_ETRANGER']);
        $this->setPlaceAncien($data['PLACE_ANCIEN']);
        
        return $this;
    }
}