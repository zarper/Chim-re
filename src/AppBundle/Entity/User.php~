<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    public $nom;
    
    /**
    * @ORM\Column(type="string", nullable=true)
     */    
    public $prenom;
    
    /** 
     * @ORM\ManyToOne(targetEntity="Metier")
     * @ORM\JoinColumn(name="metier_id", referencedColumnName="id",nullable=true)
     */
    private $metier;
     

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return User
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
     * Set prenom
     *
     * @param string $prenom
     *
     * @return User
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }
    
        public function isGranted($role)
    {
        return in_array($role, $this->getRoles());
    }

    /**
     * Set metier
     *
     * @param \AppBundle\Entity\Metier $metier
     *
     * @return User
     */
    public function setMetier(\AppBundle\Entity\Metier $metier)
    {
        $this->metier = $metier;

        return $this;
    }

    /**
     * Get metier
     *
     * @return \AppBundle\Entity\Metier
     */
    public function getMetier()
    {
        return $this->metier;
    }
}
