<?php

namespace Ben\LogementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * University
 *
 * @ORM\Table(name="university")
 * @ORM\Entity(repositoryClass="Ben\LogementBundle\Entity\UniversityRepository")
 */
class University
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
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;
    
    /**
    * @ORM\ManyToOne(targetEntity="Ben\LogementBundle\Entity\University", inversedBy="children")
    * @ORM\JoinColumn(nullable=true, onDelete="SET NULL")
    */
    protected $parent;
    
    /**
    * @ORM\OneToMany(targetEntity="Ben\LogementBundle\Entity\University",mappedBy="parent", cascade={"remove", "persist"})
    */
    private $children;
    
    /**
    * @ORM\OneToMany(targetEntity="Ben\LogementBundle\Entity\Person",mappedBy="etablissement")
    */
    private $persons;
    
    /************ Constructor ************/
    
    public function __construct()
    {
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /************  setters & getters ************/


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
     * @return University
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
     * Set name
     *
     * @param string $type
     * @return University
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
     * Set parent
     *
     * @param \Ben\LogementBundle\Entity\University $parent
     * @return University
     */
    public function setParent(\Ben\LogementBundle\Entity\University $parent = null)
    {
        $this->parent = $parent;
    
        return $this;
    }

    /**
     * Get parent
     *
     * @return \Ben\LogementBundle\Entity\University 
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Add children
     *
     * @param \Ben\LogementBundle\Entity\University $children
     * @return University
     */
    public function addChildren(\Ben\LogementBundle\Entity\University $children)
    {
        $this->children[] = $children;
        $children->setParent($this);
        return $this;
    }

    /**
     * Remove children
     *
     * @param \Ben\LogementBundle\Entity\University $children
     */
    public function removeChildren(\Ben\LogementBundle\Entity\University $children)
    {
        $this->children->removeElement($children);
    }

    /**
     * Get children
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getChildren()
    {
        return $this->children;
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

    public function __toString()
    {
        return $this->name;
    }
}