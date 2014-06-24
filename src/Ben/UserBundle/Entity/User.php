<?php

namespace Ben\UserBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass="UserRepository"))
 * @ORM\Table(name="user")
 * @ORM\HasLifecycleCallbacks
 */
class User extends BaseUser{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string $family_name
     *
     * @ORM\Column(name="family_name", type="string", length=255, nullable=true)
     * @Assert\MaxLength(limit=20, message="Le contenu ne doit pas dépassé {{ limit }} carractere|Le contenu ne doit pas dépassé {{ limit }} carractere")
     * @Assert\MinLength(limit=2)
     * @Assert\NotBlank()
     */
    private $family_name;

    /**
     * @var string $first_name
     *
     * @ORM\Column(name="first_name", type="string", length=255, nullable=true)
     */
    private $first_name;

    /**
     * @var string $tel
     *
     * @ORM\Column(name="tel", type="string", length=45, nullable=true)
     */
    private $tel;

    /**
     * @var \DateTime $created
     *
     * @ORM\Column(name="created", type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    protected $created;

    /**
     * @var \DateTime $lastActivity
     *
     * @ORM\Column(name="lastActivity", type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    protected $lastActivity;
    
    /**
    * @ORM\OneToOne(targetEntity="Ben\LogementBundle\Entity\image", cascade={"remove", "persist"})
    * @Assert\Valid()
    */
    private $image;
    
    /**
    * @ORM\ManyToOne(targetEntity="Ben\LogementBundle\Entity\Logement")
    * @ORM\JoinColumn(nullable=true, onDelete="SET NULL")
    */
    protected $logement;
    
    /************ constructeur ************/
    
    public function __construct()
    {
        parent::__construct();
        $this->created = new \DateTime;
        $this->lastActivity = new \DateTime;
        $this->image= new \Ben\LogementBundle\Entity\image();
        $this->image->setPath("anonymous.jpg");
    }
    
    /************ getters & setters  ************/

    /**
     * Get fullname
     *
     * @return string 
     */
    public function getFullName()
    {
        return $this->family_name.' '.$this->first_name;
    }

    /**
     * Set family_name
     *
     * @param string $familyName
     * @return profile
     */
    public function setFamilyName($familyName)
    {
        $this->family_name = $familyName;
    
        return $this;
    }

    /**
     * Get family_name
     *
     * @return string 
     */
    public function getFamilyName()
    {
        return $this->family_name;
    }

    /**
     * Set first_name
     *
     * @param string $firstName
     * @return profile
     */
    public function setFirstName($firstName)
    {
        $this->first_name = $firstName;
    
        return $this;
    }

    /**
     * Get first_name
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Set tel
     *
     * @param string $tel
     * @return profile
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    
        return $this;
    }

    /**
     * Get tel
     *
     * @return string 
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return User
     */
    public function setCreated($created) {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated() {
        return $this->created;
    }

    /**
     * Set lastActivity
     *
     * @param \DateTime $lastActivity
     * @return User
     */
    public function setLastActivity($lastActivity) {
        $this->lastActivity = $lastActivity;

        return $this;
    }

    /**
     * Get lastActivity
     *
     * @return \DateTime 
     */
    public function getLastActivity() {
        return $this->lastActivity;
    }

    /**
     * Set lastActivity
     *
     * @param \DateTime $lastActivity
     * @return User
     */
    public function isActiveNow() {
        $this->lastActivity = new \DateTime();

        return $this;
    }

    /**
     * Set image
     *
     * @param \Ben\LogementBundle\Entity\image $image
     * @return profile
     */
    public function setImage(\Ben\LogementBundle\Entity\image $image = null)
    {
        $this->image = $image;
    
        return $this;
    }

    /**
     * Get image
     *
     * @return \Ben\LogementBundle\Entity\image 
     */
    public function getImage()
    {
        return $this->image;
    }
    
    /**
     * Get logement
     *
     * @return \Ben\LogementBundle\Entity\Logement 
     */
    public function setLogement(\Ben\LogementBundle\Entity\Logement $logement = null)
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

    /**
     * Get the most significant role
     *
     * @return string 
     */
    public function getRole()
    {
        $roles = ['ROLE_ADMIN', 'ROLE_MANAGER', 'ROLE_USER'];
        if(in_array('ROLE_ADMIN', $this->roles)) $role = 'Administrateur';
        else if(in_array('ROLE_MANAGER', $this->roles)) $role = 'Manager';
        else $role = 'utilisateur';
        return $role;
    }
}

?>
