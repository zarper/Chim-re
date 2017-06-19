<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Bijoux
 *
 * @ORM\Table(name="bijoux")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BijouxRepository")
 */
class Bijoux
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var int
     * @Assert\Range(min =0)
     * @ORM\Column(name="cout", type="integer")
     */
    private $cout;
    
    /**
     * @var datetime
     *
     * @ORM\Column(name="datedebprev", type="datetime")
     */
    private $datedebprev;
    
    /**
     * @var datetime
     *
     * @ORM\Column(name="datefinprev", type="datetime")
     */
    private $datefinprev;
    
    /**
     * @var datetime
     *
     * @ORM\Column(name="datedeb", type="datetime")
     */
    private $datedeb;
    
    /** 
     * @var datetime
     *
     * @ORM\Column(name="datefin", type="datetime")
     */
    private $datefin;
    
    /** 
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id",nullable=false)
     */
    private $client;
    


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
     * Set nom
     *
     * @param string $nom
     *
     * @return Bijoux
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Bijoux
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
     * Set cout
     *
     * @param integer $cout
     *
     * @return Bijoux
     */
    public function setCout($cout)
    {
        $this->cout = $cout;

        return $this;
    }

    /**
     * Set datedebprev
     *
     * @param DateTime $datedebprev
     *
     * @return Bijoux
     */
    public function setdatedebprev($datedebprev)
    {
        $this->datedebprev = $datedebprev;

        return $this;
    }
    
    /**
     * Set datefinprev
     *
     * @param DateTime $datefinprev
     *
     * @return Bijoux
     */
    public function setdatefinprev($datefinprev)
    {
        $this->datefinprev = $datefinprev;

        return $this;
    }
    
    /**
     * Set datedeb
     *
     * @param DateTime $datedeb
     *
     * @return Bijoux
     */
    public function setdatedeb($datedeb)
    {
        $this->datedeb = $datedeb;

        return $this;
    }
    
    /**
     * Set datefin
     *
     * @param DateTime $datefin
     *
     * @return Bijoux
     */
    public function setdatefin($datefin)
    {
        $this->datefin = $datefin;

        return $this;
    }
    
    /**
     * Get cout
     *
     * @return int
     */
    public function getCout()
    {
        return $this->cout;
    }
    
    /**
     * Set client
     *
     * @param \AppBundle\Entity\Client $client
     *
     * @return Client
     */
    public function setClient(Client $client)
    {
      $this->client = $client;

      return $this;
    }

    /**
    * Get client
    *
    * @return \AppBundle\Entity\Clients
    */
  public function getClient()
  {
    return $this->client;
  }

    /**
     * Get datedebprev
     *
     * @return \DateTime
     */
    public function getDatedebprev()
    {
        return $this->datedebprev;
    }

    /**
     * Get datefinprev
     *
     * @return \DateTime
     */
    public function getDatefinprev()
    {
        return $this->datefinprev;
    }

    /**
     * Get datedeb
     *
     * @return \DateTime
     */
    public function getDatedeb()
    {
        return $this->datedeb;
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
}
