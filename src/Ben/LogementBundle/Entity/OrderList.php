<?php

namespace Ben\LogementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ben\LogementBundle\Entity\OrderList
 *
 * @ORM\Table(name="orderList")
 * @ORM\Entity(repositoryClass="Ben\LogementBundle\Entity\OrderListRepository")
 */
class OrderList
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    public static $valideStatus = 'valide';
    
    /**
     * @var string
     * 
     * @ORM\Column(name="ids", type="text")
    */
    private $ids;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255)
     */
    private $status;

    /**
     * @var integer
     *
     * @ORM\Column(name="length", type="integer")
     */
    private $length;

    /**
     * @var \DateTime $created
     *
     * @ORM\Column(name="created", type="date")
     */
    private $created;
    
    /**
    * @ORM\ManyToOne(targetEntity="Ben\LogementBundle\Entity\Logement",inversedBy="orderlists")
    * @ORM\JoinColumn(name="logement_id",referencedColumnName="id", nullable=false)
    */
    private $logement;

    /************ constructeur ************/

    public function __construct() {
        $this->created = new \DateTime;
        $this->status = OrderList::$valideStatus;
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
     * Set created
     *
     * @param \DateTime $created
     * @return OrderList
     */
    public function setCreated($created)
    {
        $this->created = $created;
    
        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return OrderList
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
        return ($this->status === OrderList::$valideStatus);
    }

    /**
     * Set ids
     *
     * @param string $ids
     * @return OrderList
     */
    public function setIds($ids)
    {
        $this->ids = $ids;
    
        return $this;
    }

    /**
     * Get ids
     *
     * @return string 
     */
    public function getIds()
    {
        return $this->ids;
    }


    /**
     * Set length
     *
     * @param integer $length
     * @return Person
     */
    public function setLength($length)
    {
        $this->length = $length;
    
        return $this;
    }

    /**
     * Get length
     *
     * @return integer 
     */
    public function getLength()
    {
        return $this->length;
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

}