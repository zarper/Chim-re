<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Incident
 *
 * @ORM\Table(name="incident")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\IncidentRepository")
 */
class Incident
{
    const STATUS_DISABLED = 0;
    
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
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var boolean
     *
     * @ORM\Column(name="vu", type="boolean", nullable=false)
     */
    private $vu = false;
    
    /**
     * @ORM\ManyToOne(targetEntity="Tache")
     * @ORM\JoinColumn(name="tache_id_incident", referencedColumnName="id",nullable=false)
     */
    private $tache;


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
     * @return Incident
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
     * Set vu
     *
     * @param binary $vu
     *
     * @return Incident
     */
    public function setVu($vu)
    {
        $this->vu = $vu;

        return $this;
    }

    /**
     * Get vu
     *
     * @return binary
     */
    public function getVu()
    {
        return $this->vu;
    }

    /**
     * Set tache
     *
     * @param \AppBundle\Entity\Tache $tache
     *
     * @return Incident
     */
    public function setTache(\AppBundle\Entity\Tache $tache)
    {
        $this->tache = $tache;

        return $this;
    }

    /**
     * Get tache
     *
     * @return \AppBundle\Entity\Tache
     */
    public function getTache()
    {
        return $this->tache;
    }
}
