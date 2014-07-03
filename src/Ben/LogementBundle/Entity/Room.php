<?php

namespace Ben\LogementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Room
 *
 * @ORM\Table(name="room")
 * @ORM\Entity(repositoryClass="Ben\LogementBundle\Entity\RoomRepository")
 * @UniqueEntity(fields={"name", "block"}, message="duplicate room")
 */
class Room
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
     * @var integer
     *
     * @ORM\Column(name="floor", type="integer")
     */
    private $floor;

    /**
     * @var integer
     *
     * @ORM\Column(name="capacity", type="integer")
     */
    private $capacity;

    /**
     * @var integer
     *
     * @ORM\Column(name="free", type="integer")
     * @Assert\Min(0)
     */
    private $free;
    
    /**
    * @ORM\ManyToOne(targetEntity="Ben\LogementBundle\Entity\Block", inversedBy="rooms")
    * @ORM\JoinColumn(name="block_id", referencedColumnName="id", nullable=false)
    * @Assert\Valid()
    */
    private $block;

    /**
    * @ORM\OneToMany(targetEntity="Ben\LogementBundle\Entity\Reservation", mappedBy="room", cascade={"remove", "persist"})
    */
    protected $reservations;
    
    /************ constructeur ************/
    
    public function __construct()
    {
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
     * __toString
     *
     * @return string 
     */
    public function __toString()
    {
        return $this->getName();
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Room
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
     * Set floor
     *
     * @param integer $floor
     * @return Room
     */
    public function setFloor($floor)
    {
        $this->floor = $floor;
    
        return $this;
    }

    /**
     * Get floor
     *
     * @return integer 
     */
    public function getFloor()
    {
        return $this->floor;
    }

    /**
     * Set capacity
     *
     * @param integer $capacity
     * @return Room
     */
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;
    
        return $this;
    }

    /**
     * Get capacity
     *
     * @return integer 
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * Set free
     *
     * @param integer $free
     * @return Room
     */
    public function plusFree()
    {
        $this->free++;
    
        return $this;
    }

    /**
     * Set free
     *
     * @param integer $free
     * @return Room
     */
    public function minusFree()
    {
        $this->free--;
    
        return $this;
    }

    /**
     * Set free
     *
     * @param integer $free
     * @return Room
     */
    public function setFree($free)
    {
        $this->free = $free;
    
        return $this;
    }

    /**
     * Get free
     *
     * @return integer 
     */
    public function getFree()
    {
        return $this->free;
    }

    /**
     * Get free
     *
     * @return integer 
     */
    public function isFree()
    {
        return ($this->free > 0);
    }

    /**
     * Set block
     *
     * @param \Ben\LogementBundle\Entity\Block $block
     * @return Room
     */
    public function setBlock(\Ben\LogementBundle\Entity\Block $block)
    {
        $this->block = $block;
    
        return $this;
    }

    /**
     * Get block
     *
     * @return \Ben\LogementBundle\Entity\Block 
     */
    public function getBlock()
    {
        return $this->block;
    }

    /**
     * Add reservation
     *
     * @param Ben\LogementBundle\Entity\Reservation $reservation
     * @return reservations
     */
    public function addReservation(\Ben\LogementBundle\Entity\Reservation $reservation)
    {
        $this->reservations[] = $reservation;
        $reservation->setRoom($this);
    
        return $this;
    }

    /**
     * Remove reservations
     *
     * @param Ben\LogementBundle\Entity\Reservation $reservations
     */
    public function removeReservation(\Ben\LogementBundle\Entity\Reservation $reservation)
    {
        $this->reservations->removeElement($reservation);
    }

    /**
     * Get reservations
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getReservations()
    {
        return $this->reservations;
    } 

    public function setData($data)
    {
        $this->setName($data['NOM_CHAMBRE']);
        $this->setCapacity($data['CAPACITE']);
        $this->setFloor($data['ETAGE']);
        $this->setFree($data['CAPACITE']);
        return $this;
    }
}