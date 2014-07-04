<?php

namespace Ben\LogementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation")
 * @ORM\Entity(repositoryClass="Ben\LogementBundle\Entity\ReservationRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Reservation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /* static params */
    public static $notValideStatus  = 'non valide';
    public static $valideStatus     = 'valide';

    /**
     * @var integer
     *
     * @ORM\Column(name="reference", type="integer")
     */
    private $reference;

    /**
     * @var \DateTime $date_payement
     *
     * @ORM\Column(name="date_payement", type="date")
     */
    private $date_payement;

    /**
     * @var \DateTime $date_from
     *
     * @ORM\Column(name="date_from", type="date")
     */
    private $date_from;

    /**
     * @var \DateTime $date_to
     *
     * @ORM\Column(name="date_to", type="date")
     */
    private $date_to;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255)
     */
    private $status;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float")
     */
    private $price;
    
    /**
    * @ORM\OneToOne(targetEntity="Ben\LogementBundle\Entity\Person", inversedBy="reservation")
    * @ORM\JoinColumn(name="person_id",referencedColumnName="id", nullable=false)
    */
    private $person;
    
    /**
    * @ORM\ManyToOne(targetEntity="Ben\LogementBundle\Entity\Room", inversedBy="reservations")
    * @ORM\JoinColumn(name="room_id",referencedColumnName="id", nullable=false)
    * @Assert\valid
    * @Assert\NotBlank
    */
    private $room;

    private $oldroom;

    /************ constructeur ************/

    public function __construct() {
        $this->date_from = new \DateTime;
        $this->date_payement = new \DateTime;
        $this->date_to = new \DateTime;
        $this->status = Reservation::$valideStatus;
        $this->reference = 0;
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
     * set id
     *
     * @param integer 
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
        return $this;
    }

    /**
     * Get reference
     *
     * @return integer 
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set date_from
     *
     * @param \DateTime $datePayement
     * @return Reservation
     */
    public function setDatePayement($datePayement)
    {
        $this->date_payement = $datePayement;
    
        return $this;
    }

    /**
     * Get date_Payement
     *
     * @return \DateTime 
     */
    public function getDatePayement()
    {
        return $this->date_payement;
    }

    /**
     * Set date_from
     *
     * @param \DateTime $dateFrom
     * @return Reservation
     */
    public function setDateFrom($dateFrom)
    {
        $this->date_from = $dateFrom;
    
        return $this;
    }

    /**
     * Get date_from
     *
     * @return \DateTime 
     */
    public function getDateFrom()
    {
        return $this->date_from;
    }

    /**
     * Set date_to
     *
     * @param \DateTime $dateTo
     * @return Reservation
     */
    public function setDateTo($dateTo)
    {
        $this->date_to = $dateTo;
    
        return $this;
    }

    /**
     * Get date_to
     *
     * @return \DateTime 
     */
    public function getDateTo()
    {
        return $this->date_to;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Reservation
     */
    public function setStatus($status)
    {
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * check status
     *
     * @return boolean 
     */
    public function isValide()
    {
        return ($this->status === Reservation::$valideStatus);
    }

    /**
     * Set price
     *
     * @param float $price
     * @return Reservation
     */
    public function setPrice($price)
    {
        $this->price = $price;
    
        return $this;
    }

    /**
     * Get price
     *
     * @return float 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set person
     *
     * @param \Ben\LogementBundle\Entity\person $person
     * @return Reservation
     */
    public function setPerson(\Ben\LogementBundle\Entity\person $person)
    {
        $this->person = $person;
    
        return $this;
    }

    /**
     * Get person
     *
     * @return \Ben\LogementBundle\Entity\person 
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * Set room
     *
     * @param \Ben\LogementBundle\Entity\Room $room
     * @return Reservation
     */
    public function setRoom(\Ben\LogementBundle\Entity\Room $room)
    {
        $this->room = $room;
    
        return $this;
    }

    /**
     * Get room
     *
     * @return \Ben\LogementBundle\Entity\Room 
     */
    public function getRoom()
    {
        return $this->room;
    }

    /**
     * Set oldroom
     *
     * @param int $oldroom
     * @return Reservation
     */
    public function setOldroom($oldroom)
    {
        $this->oldroom = $oldroom;
    
        return $this;
    }

    /**
     * Get oldroom
     *
     * @return int 
     */
    public function getOldroom()
    {
        return $this->oldroom;
    }

    public function switchRoom(Reservation $entity)
    {
        $temp = $this->room;
        $this->room = $entity->getRoom();
        $entity->setRoom($temp);
        
        return $this;
    }

    /**
     * @ORM\PreRemove()
     */
    public function freeRoom()
    {
        $this->room->plusFree();
        $this->person->setStatus(\Ben\LogementBundle\Entity\person::$notValideStatus);
    }

    public function setData($data)
    {
        $this->setDatePayement(new \DateTime($data['DATE_PAY']));
        $this->setDateFrom(new \DateTime($data['date_from']));
        $this->setDateTo(new \DateTime($data['date_to']));
        $this->setPrice(floatval($data['MONTANT']));
        $this->setStatus(Reservation::$valideStatus);

        return $this;
    }
}