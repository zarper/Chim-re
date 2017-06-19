<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Stock
 *
 * @ORM\Table(name="stock")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\StockRepository")
 */
class Stock
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
     * @var float
     *
     * @ORM\Column(name="prix", type="float")
     */
    private $prix;

    /**
     * @var int
     *
     * @ORM\Column(name="quantitestock", type="integer")
     */
    private $quantitestock;

    /**
     * @var int
     *
     * @ORM\Column(name="seuil", type="integer")
     */
    private $seuil;


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
     * @return Stock
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
     * Set prix
     *
     * @param integer $prix
     *
     * @return Stock
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return int
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set quantitestock
     *
     * @param integer $quantitestock
     *
     * @return Stock
     */
    public function setQuantitestock($quantitestock)
    {
        $this->quantitestock = $quantitestock;

        return $this;
    }

    /**
     * Get quantitestock
     *
     * @return int
     */
    public function getQuantitestock()
    {
        return $this->quantitestock;
    }

    /**
     * Set seuil
     *
     * @param integer $seuil
     *
     * @return Stock
     */
    public function setSeuil($seuil)
    {
        $this->seuil = $seuil;

        return $this;
    }

    /**
     * Get seuil
     *
     * @return int
     */
    public function getSeuil()
    {
        return $this->seuil;
    }
}
