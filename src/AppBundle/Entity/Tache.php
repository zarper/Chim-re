<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tache
 *
 * @ORM\Table(name="tache")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TacheRepository")
 */
class Tache
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=500, nullable=true)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datedebut", type="datetime", nullable=true)
     */
    private $datedebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datefin", type="datetime", nullable=true)
     */
    private $datefin;
    
    /**
     * @var string
     *
     * @ORM\Column(name="comentaire", type="string", length=500, nullable=true)
     */
    private $comentaire;
    
    /**
     * @ORM\ManyToOne(targetEntity="Etape")
     * @ORM\JoinColumn(name="etape_id_tache", referencedColumnName="id",nullable=false)
     */
    private $etape;
    
    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id_tache", referencedColumnName="id",nullable=false)
     */
    private $user;


    /**
     * One Customer has One Cart.
     * @ORM\OneToOne(targetEntity="Materiel", mappedBy="tache",cascade={"persist"})
     */
    private $materiel;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Tache
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set datedebut
     *
     * @param \DateTime $datedebut
     *
     * @return Tache
     */
    public function setDatedebut($datedebut)
    {
        $this->datedebut = $datedebut;

        return $this;
    }

    /**
     * Get datedebut
     *
     * @return \DateTime
     */
    public function getDatedebut()
    {
        return $this->datedebut;
    }

    /**
     * Set datefin
     *
     * @param \DateTime $datefin
     *
     * @return Tache
     */
    public function setDatefin($datefin)
    {
        $this->datefin = $datefin;

        return $this;
    }

    /**
     * Get datefin
     *
     * @return \DateTime
     */
    public function getDatefin()
    {
        return $this->datefin;
    }
    
    /**
     * Set comentaire
     *
     * @param string $comentaire
     *
     * @return Etape
     */
    public function setComentaire($comentaire)
    {
        $this->comentaire = $comentaire;

        return $this;
    }

    /**
     * Get comentaire
     *
     * @return string
     */
    public function getComentaire()
    {
        return $this->comentaire;
    }

    /**
     * Set etape
     *
     * @param \AppBundle\Entity\Etape $etape
     *
     * @return Tache
     */
    public function setEtape(\AppBundle\Entity\Etape $etape)
    {
        $this->etape = $etape;

        return $this;
    }

    /**
     * Get etape
     *
     * @return \AppBundle\Entity\Etape
     */
    public function getEtape()
    {
        return $this->etape;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Tache
     */
    public function setUser(\AppBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set materiel
     *
     * @param \AppBundle\Entity\Materiel $materiel
     *
     * @return Tache
     */
    public function setMateriel(\AppBundle\Entity\Materiel $materiel = null)
    {
        $this->materiel = $materiel;

        return $this;
    }

    /**
     * Get materiel
     *
     * @return \AppBundle\Entity\Materiel
     */
    public function getMateriel()
    {
        return $this->materiel;
    }
}
