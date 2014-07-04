<?php

namespace Ben\LogementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Person
 *
 * @ORM\Table(name="person")
 * @ORM\Entity(repositoryClass="Ben\LogementBundle\Entity\PersonRepository")
 * @UniqueEntity(fields="n_dossier", message="Un dossier existe déja avec ce nom")
 * @UniqueEntity(fields="cne", message="Un étudiant existe déja avec ce cne")
 * @UniqueEntity(fields="cin", message="Un étudiant existe déja avec ce cin")
 */
class Person
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
    public static $eligibleStatus   = 'éligible';
    public static $residentStatus   = 'résidant';
    public static $suspendedStatus   = 'suspendu';
    public static $archiveStatus   = 'archive';

    public static $foreignType      = 'etranger';
    public static $newType          = 'nouveau';
    public static $oldType          = 'ancien';
    public static $specialType      = 'special';

    /**
     * @var string $family_name
     *
     * @ORM\Column(name="family_name", type="string", length=255, nullable=true)
     */
    private $family_name;

    /**
     * @var string $first_name
     *
     * @ORM\Column(name="first_name", type="string", length=255, nullable=true)
     */
    private $first_name;

    /**
     * @var string $family_name_ar
     *
     * @ORM\Column(name="family_name_ar", type="string", length=255, nullable=true)
     */
    private $family_name_ar;

    /**
     * @var string $first_name_ar
     *
     * @ORM\Column(name="first_name_ar", type="string", length=255, nullable=true)
     */
    private $first_name_ar;

    /**
     * @var string $cin
     *
     * @ORM\Column(name="cin", type="string", length=255, nullable=true)
     */
    private $cin;

    /**
     * @var string
     *
     * @ORM\Column(name="cne", type="string", length=255, nullable=true))
     */
    private $cne;

    /**
     * @var \DateTime $bird_day
     *
     * @ORM\Column(name="bird_day", type="date", nullable=true))
     * @Assert\Date()
     */
    private $bird_day;

    /**
     * @var string $gender
     *
     * @ORM\Column(name="gender", type="string", length=255, nullable=true)
     */
    private $gender;

    /**
     * @var string $city
     *
     * @ORM\Column(name="city", type="string", length=255, nullable=true)
     */
    private $city;

    /**
     * @var string $contry
     *
     * @ORM\Column(name="contry", type="string", length=255, nullable=true)
     */
    private $contry;

    /**
     * @var float
     *
     * @ORM\Column(name="parents_revenu", type="float")
     */
    private $parents_revenu;

    /**
     * @var integer
     *
     * @ORM\Column(name="bro_sis_number", type="integer")
     */
    private $bro_sis_number;

    /**
     * @var string
     *
     * @ORM\Column(name="n_dossier", type="string")
     */
    private $n_dossier;

    /**
     * @var string
     *
     * @ORM\Column(name="condition_special", type="string", length=255, nullable=true)
     */
    private $condition_special;

    /**
     * @var integer
     *
     * @ORM\Column(name="ancientete", type="integer", length=255, nullable=true)
     */
    private $ancientete;

    /**
     * @var string
     *
     * @ORM\Column(name="niveau_etude", type="string", nullable=true)
     */
    private $niveau_etude;

    /**
     * @var string
     *
     * @ORM\Column(name="diplome", type="string", length=255, nullable=true)
     */
    private $diplome;

    /**
     * @var string
     *
     * @ORM\Column(name="remarque", type="text", nullable=true)
     */
    private $remarque;

    /**
     * @var string
     *
     * @ORM\Column(name="passport", type="string", length=255, nullable=true)
     */
    private $passport;

    /**
     * @var string
     *
     * @ORM\Column(name="carte_sejour", type="string", length=255, nullable=true)
     */
    private $carte_sejour;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255, nullable=true)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="exellence", type="string", length=255, nullable=true)
     */
    private $exellence;

    /**
     * @var string
     *
     * @ORM\Column(name="obtention_bac", type="string", length=255, nullable=true)
     */
    private $obtention_bac;

    /**
     * @var float
     *
     * @ORM\Column(name="note", type="float")
     */
    private $note;

    /**
     * @var \DateTime $created
     *
     * @ORM\Column(name="created", type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    protected $created;

    /**
    * @ORM\OneToOne(targetEntity="Ben\LogementBundle\Entity\Reservation", mappedBy="person", cascade={"remove", "persist"})
    */
    protected $reservation;
    
    /**
    * @ORM\ManyToOne(targetEntity="Ben\LogementBundle\Entity\Logement",inversedBy="persons")
    * @ORM\JoinColumn(name="logement_id",referencedColumnName="id", nullable=true)
    */
    private $logement;
    
    /**
    * @ORM\ManyToOne(targetEntity="Ben\LogementBundle\Entity\University", inversedBy="persons")
    * @ORM\JoinColumn(nullable=true, onDelete="SET NULL")
    */
    protected $etablissement;
    
    /************ Le constructeur ************/
    
    public function __construct()
    {
        $this->bird_day =  new \DateTime;
        $this->created = new \DateTime;
        $this->note=0;
        $this->ancientete = 1;
        $this->parents_revenu=0;
        $this->bro_sis_number=0;
        $this->status= Person::$valideStatus;
    }
    
    /************ Les setters et getters ************/

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
    public function __toString()
    {
        return $this->getFullName();
    }
    /**
     * Set cne
     *
     * @param string $cne
     * @return Person
     */
    public function setCne($cne)
    {
        $this->cne = $cne;
    
        return $this;
    }

    /**
     * Get cne
     *
     * @return string 
     */
    public function getCne()
    {
        return $this->cne;
    }

    /**
     * Set parents_revenu
     *
     * @param float $parentsRevenu
     * @return Person
     */
    public function setParentsRevenu($parentsRevenu)
    {
        $this->parents_revenu = $parentsRevenu;
    
        return $this;
    }

    /**
     * Get parents_revenu
     *
     * @return float 
     */
    public function getParentsRevenu()
    {
        return $this->parents_revenu;
    }

    /**
     * Set bro_sis_number
     *
     * @param integer $broSisNumber
     * @return Person
     */
    public function setBroSisNumber($broSisNumber)
    {
        $this->bro_sis_number = $broSisNumber;
    
        return $this;
    }

    /**
     * Get bro_sis_number
     *
     * @return integer 
     */
    public function getBroSisNumber()
    {
        return $this->bro_sis_number;
    }

    /**
     * Set niveau_etude
     *
     * @param string $niveauEtude
     * @return Person
     */
    public function setNiveauEtude($niveauEtude)
    {
        $this->niveau_etude = $niveauEtude;
    
        return $this;
    }

    /**
     * Get niveau_etude
     *
     * @return string 
     */
    public function getNiveauEtude()
    {
        return $this->niveau_etude;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Person
     */
    public function setType($type)
    {
        $this->type = $type;
        if($this->type == Person::$foreignType)
            $this->city = $this->contry;
    
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
     * Set status
     *
     * @param string $status
     * @return Person
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
     * Set n_dossier
     *
     * @param integer $nDossier
     * @return Person
     */
    public function setNDossier($nDossier)
    {
        $this->n_dossier = $nDossier;
    
        return $this;
    }

    /**
     * Get n_dossier
     *
     * @return string 
     */
    public function getNDossier()
    {
        return $this->n_dossier;
    }

    /**
     * Set condition_special
     *
     * @param string $condition_special
     * @return Person
     */
    public function setConditionSpecial($condition_special)
    {
        $this->condition_special = $condition_special;
    
        return $this;
    }

    /**
     * Get condition_special
     *
     * @return string 
     */
    public function getConditionSpecial()
    {
        return $this->condition_special;
    }

    /**
     * Set ancientete
     *
     * @param integer $ancientete
     * @return Person
     */
    public function setAncientete($ancientete)
    {
        $this->ancientete = $ancientete;
    
        return $this;
    }

    /**
     * Get ancientete
     *
     * @return integer 
     */
    public function getAncientete()
    {
        return $this->ancientete;
    }

    /**
     * Set diplome
     *
     * @param string $diplome
     * @return Person
     */
    public function setDiplome($diplome)
    {
        $this->diplome = $diplome;
    
        return $this;
    }

    /**
     * Get diplome
     *
     * @return string 
     */
    public function getDiplome()
    {
        return $this->diplome;
    }

    /**
     * Set remarque
     *
     * @param string $remarque
     * @return Person
     */
    public function setRemarque($remarque)
    {
        $this->remarque = $remarque;
    
        return $this;
    }

    /**
     * Get remarque
     *
     * @return string 
     */
    public function getRemarque()
    {
        return $this->remarque;
    }

    /**
     * Set passport
     *
     * @param string $passport
     * @return Person
     */
    public function setPassport($passport)
    {
        $this->passport = $passport;
    
        return $this;
    }

    /**
     * Get passport
     *
     * @return string 
     */
    public function getPassport()
    {
        return $this->passport;
    }

    /**
     * Set carte_sejour
     *
     * @param string $carteSejour
     * @return Person
     */
    public function setCarteSejour($carteSejour)
    {
        $this->carte_sejour = $carteSejour;
    
        return $this;
    }

    /**
     * Get carte_sejour
     *
     * @return string 
     */
    public function getCarteSejour()
    {
        return $this->carte_sejour;
    }

    /**
     * Set exellence
     *
     * @param string $exellence
     * @return Person
     */
    public function setExellence($exellence)
    {
        $this->exellence = $exellence;
    
        return $this;
    }

    /**
     * Get exellence
     *
     * @return string 
     */
    public function getExellence()
    {
        return $this->exellence;
    }

    /**
     * Set obtention_bac
     *
     * @param string $obtention_bac
     * @return Person
     */
    public function setObtentionBac($obtention_bac)
    {
        $this->obtention_bac = $obtention_bac;
    
        return $this;
    }

    /**
     * Get obtention_bac
     *
     * @return string 
     */
    public function getObtentionBac()
    {
        return $this->obtention_bac;
    }

    /**
     * Set family_name
     *
     * @param string $familyName
     * @return Person
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
     * @return Person
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
     * Get FullName
     *
     * @return string 
     */
    public function getFullName()
    {
        return $this->family_name.' '.$this->first_name;
    }


    /**
     * Set family_name_ar
     *
     * @param string $familyName
     * @return Person
     */
    public function setFamilyNameAr($familyNameAr)
    {
        $this->family_name_ar = $familyNameAr;
    
        return $this;
    }

    /**
     * Get family_name_ar
     *
     * @return string 
     */
    public function getFamilyNameAr()
    {
        return $this->family_name_ar;
    }

    /**
     * Set first_name_ar
     *
     * @param string $firstName
     * @return Person
     */
    public function setFirstNameAr($firstNameAr)
    {
        $this->first_name_ar = $firstNameAr;
    
        return $this;
    }

    /**
     * Get first_name_ar
     *
     * @return string 
     */
    public function getFirstNameAr()
    {
        return $this->first_name_ar;
    }

    /**
     * Set cin
     *
     * @param string $cin
     * @return Person
     */
    public function setCin($cin)
    {
        $this->cin = $cin;
    
        return $this;
    }

    /**
     * Get cin
     *
     * @return string 
     */
    public function getCin()
    {
        return $this->cin;
    }

    /**
     * Set bird_day
     *
     * @param \DateTime $birdDay
     * @return Person
     */
    public function setBirdDay($birdDay)
    {
        $this->bird_day = $birdDay;
    
        return $this;
    }

    /**
     * Get bird_day
     *
     * @return \DateTime 
     */
    public function getBirdDay()
    {
        return $this->bird_day;
    }

    /**
     * Set gender
     *
     * @param string $gender
     * @return Person
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    
        return $this;
    }

    /**
     * Get gender
     *
     * @return string 
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Person
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
     * Set contry
     *
     * @param string $contry
     * @return Person
     */
    public function setContry($contry)
    {
        $this->contry = $contry;

        return $this;
    }

    /**
     * Get contry
     *
     * @return string 
     */
    public function getContry()
    {
        return $this->contry;
    }

    /**
     * Set note
     *
     * @param float $note
     * @return Person
     */
    public function setNote($note)
    {
        $this->note = $note;
    
        return $this;
    }

    /**
     * Get note
     *
     * @return float 
     */
    public function getNote()
    {
        return $this->note;
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
     * set reservation
     *
     * @param Ben\LogementBundle\Entity\Reservation $reservation
     * @return Person
     */
    public function setReservation(\Ben\LogementBundle\Entity\Reservation $reservation)
    {
        $this->reservation = $reservation;
    
        return $this;
    }

    /**
     * Get reservation
     *
     * @return Ben\LogementBundle\Entity\Reservation
     */
    public function getReservation()
    {
        return $this->reservation;
    } 

    /**
     * remove reservation
     *
     * @return Person
     */
    public function removeReservation()
    {
        $this->reservation = null;
        return $this;
    }  

    /**
     * already has a reservation
     */
    public function hasReservation()
    {
        if(!$this->reservation) return false;
        return true ;
    }

    /**
     * check if user has a valide reservation
     */
    public function isResident()
    {
        if(!$this->reservation) return false;
        return ($this->reservation->getStatus() === \Ben\LogementBundle\Entity\Reservation::$valideStatus) ;
    }

    /**
     * Set logement
     *
     * @param \Ben\LogementBundle\Entity\Logement $logement
     * @return Person
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

    /**
     * Set etablissement
     *
     * @param \Ben\LogementBundle\Entity\University $etablissement
     * @return Person
     */
    public function setEtablissement(\Ben\LogementBundle\Entity\University $etablissement = null)
    {
        $this->etablissement = $etablissement;
    
        return $this;
    }

    /**
     * Get etablissement
     *
     * @return \Ben\LogementBundle\Entity\University 
     */
    public function getEtablissement()
    {
        return $this->etablissement;
    }
    public function calculateNote()
    {
        $revenu = $this->getParentsRevenu();
        $brothers = $this->getBroSisNumber();
        $bacYear = $this->getObtentionBac();
        $exellence = $this->getExellence();

        if ($revenu == 0 ) $revenu=14;
        elseif ($revenu  < 4000 )$revenu=13;
        elseif ($revenu  < 9000 )$revenu=12;
        elseif ($revenu  < 18000 )$revenu=11;
        elseif ($revenu  < 36000 )$revenu=10;
        elseif ($revenu  < 54000 )$revenu=9;
        elseif ($revenu  < 72000 )$revenu=8;
        elseif ($revenu  < 90000 )$revenu=7;
        elseif ($revenu  < 108000 )$revenu=6;
        elseif ($revenu  < 126000 )$revenu=5;
        elseif ($revenu  < 144000 )$revenu=4;
        elseif ($revenu  < 162000 )$revenu=3;
        elseif ($revenu  < 180000 )$revenu=2;
        else $revenu=1;

        if ($brothers > 4 ) $brothers=10;
        else $brothers *=2;

        $now = new \DateTime;
        $currentYear = $now->format('Y');
        $bacYear = $currentYear - $bacYear;
        if($bacYear > 4) $bacYear = 1;
        else $bacYear = 3.5 - (0.5*$bacYear);

        if ($exellence < 10.5 ) $exellence=1;
        elseif ($exellence  < 11 )$exellence=2;
        elseif ($exellence  < 11.5 )$exellence=3;
        elseif ($exellence  < 12 )$exellence=4;
        elseif ($exellence  < 12.5 )$exellence=5;
        elseif ($exellence  < 13 )$exellence=6;
        elseif ($exellence  < 13.5 )$exellence=7;
        elseif ($exellence  < 14 )$exellence=8;
        elseif ($exellence  < 14.5 )$exellence=9;
        elseif ($exellence  < 15 )$exellence=10;
        elseif ($exellence  < 15.5 )$exellence=11;
        elseif ($exellence  < 16 )$exellence=12;
        else $exellence=13;

        $note = $revenu * 20 + $brothers * 5 + $bacYear * 3 + $exellence * 2;
        $this->setNote($note);
    }
    public function setData($data)
    {
        $this->setFamilyName($data['NOM_ETUDIANT']);
        $this->setFirstName($data['PRENOM_ETUDIANT']);
        $this->setFamilyNameAr($data['NOM_ETUDIANT_ARABE']);
        $this->setFirstNameAr($data['PRENOM_ETUDIANT_ARABE']);
        $this->setEmail($data['EMAIL_ETUDIANT']);
        $this->setCin($data['CIN_ETUDIANT']);
        $this->setBirdDay(new \DateTime($data['birday']));
        $this->setGender($data['SEXE_ETUDIANT']);
        $this->setAddress($data['ADRESSE_ETUDIANT']);
        $this->setCity($data['VILLE_ETUDIANT']);
        $this->setContry($data['PAYS']);
        $this->setTel($data['TEL_ETUDIANT']);
        $this->setCne($data['CNE_ETUDIANT']);
        $this->setParentsRevenu(floatval($data['REVENU_DES_PARENTS']));
        $this->setBroSisNumber(intval($data['NOMBRE_DES_FRERES_SOEURS']));
        $this->setNiveauEtude($data['NIVEAU_ETUDE']);
        $this->setStatus($data['ETAT_ETUDIANT']);
        $this->setNDossier($data['N_DOSSIER']);
        $this->setConditionSpecial($data['COMPORTEMENT']);
        $this->setAncientete((intval($data['ANCIENNETE'])+1));
        $this->setDiplome($data['DIPLOME']);
        $this->setRemarque($data['REMARQUE']);
        $this->setPassport($data['PASSPORT']);
        $this->setCarteSejour($data['CARTE_SEJOUR']);
        $this->setExellence($data['EXCELLENCE']);
        $this->created->modify('-1 year');

        $this->type = ($data['COMPORTEMENT'] != '') ? 'special' : 'ancien';
        $this->type = ($data['PASSPORT'] != '') ? 'etranger' : $this->type;

        $this->setStatus(Person::$suspendedStatus);

        $this->calculateNote();

        
    
        return $this;
    }
}