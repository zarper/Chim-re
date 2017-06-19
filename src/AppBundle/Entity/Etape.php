<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Etape
 *
 * @ORM\Table(name="etape")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EtapeRepository")
 */
class Etape
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
     * @var string
     * 
     * @ORM\Column(name="photo", type="string")
     */
    private $photo;
    
    /**
     * @var int
     * @Assert\Range(min =0)
     * @ORM\Column(name="heuretravail", type="integer")
     */
    private $heuretravail;
    
    /**
     * @ORM\ManyToOne(targetEntity="Bijoux")
     * @ORM\JoinColumn(name="bijou_id_etape", referencedColumnName="id",nullable=false)
     */
    private $bijou;


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
     * Set heuretravail
     *
     * @param integer $heuretravail
     *
     * @return Etape
     */
    public function setHeuretravail($heuretravail)
    {
        $this->heuretravail = $heuretravail;

        return $this;
    }

    /**
     * Get heuretravail
     *
     * @return int
     */
    public function getHeuretravail()
    {
        return $this->heuretravail;
    }


    /**
     * Set bijou
     *
     * @param \AppBundle\Entity\Bijoux $bijou
     *
     * @return Etape
     */
    public function setBijoux(\AppBundle\Entity\Bijoux $bijou)
    {
        $this->bijou = $bijou;

        return $this;
    }

    /**
     * Get bijou
     *
     * @return \AppBundle\Entity\Bijoux
     */
    public function getBijou()
    {
        return $this->bijou;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Etape
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
     * Get photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }
    
    /**
     * Set photo
     *
     * @param string $photo
     *
     * @return Photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

}
