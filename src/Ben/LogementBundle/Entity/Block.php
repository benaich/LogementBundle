<?php

namespace Ben\LogementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Block
 *
 * @ORM\Table(name="block")
 * @ORM\Entity(repositoryClass="Ben\LogementBundle\Entity\BlockRepository")
 */
class Block
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
     * @ORM\Column(name="floors", type="string", length=255)
     */
    private $floors;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
    * @ORM\OneToMany(targetEntity="Ben\LogementBundle\Entity\Room", mappedBy="block", cascade={"remove", "persist"})
    */
    private $rooms;
    
    /**
    * @ORM\ManyToOne(targetEntity="Ben\LogementBundle\Entity\Logement",inversedBy="blocks")
    * @ORM\JoinColumn(name="logement_id",referencedColumnName="id", nullable=false)
    * @Assert\Valid()
    */
    private $logement;
    
    /************ constructeur ************/
    
    public function __construct()
    {
        $this->rooms = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Block
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
     * Set floors
     *
     * @param string $floors
     * @return Block
     */
    public function setFloors($floors)
    {
        $this->floors = $floors;
    
        return $this;
    }

    /**
     * Get floors
     *
     * @return string 
     */
    public function getFloors()
    {
        return $this->floors;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Block
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Add rooms
     *
     * @param \Ben\LogementBundle\Entity\Room $rooms
     * @return Block
     */
    public function addRoom(\Ben\LogementBundle\Entity\Room $rooms)
    {
        $this->rooms[] = $rooms;
    
        return $this;
    }

    /**
     * Remove rooms
     *
     * @param \Ben\LogementBundle\Entity\Room $rooms
     */
    public function removeRoom(\Ben\LogementBundle\Entity\Room $rooms)
    {
        $this->rooms->removeElement($rooms);
    }

    /**
     * Get rooms
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRooms()
    {
        return $this->rooms;
    }

    /**
     * Set logement
     *
     * @param \Ben\LogementBundle\Entity\Logement $logement
     * @return Block
     */
    public function setLogement(\Ben\LogementBundle\Entity\Logement $logement)
    {
        $this->logement = $logement;
    
        return $this;
    }

    /**
     * Get logement
     *
     * @return \Ben\LogementBundle\Entity\Logement 
     */
    public function getLogement()
    {
        return $this->logement;
    }

    public function setData($data)
    {
        $this->setName($data['PAVILLON']);
        $this->setFloors($data['NOMBRE_ETAGE']);
        $this->setType($data['TYPE']);
        return $this;
    }
    public function __toString()
    {
       return $this->name;
    }
}