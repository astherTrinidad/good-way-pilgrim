<?php

namespace App\Entity;

use App\Repository\CaminoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CaminoRepository::class)
 */
class Camino 
{    

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $start;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $finish;

    /**
     * @ORM\Column(type="integer")
     */
    private $numEtapas;

    /**
     * @ORM\Column(type="float")
     */
    private $km;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $description;

    /**
     * Un camino tiene muchos usuarioCaminos
     * @ORM\OneToMany(targetEntity="UsuarioCamino", mappedBy="camino")
     */
    private $userCaminos;

    /**
     * Un camino tiene muchos caminoEtapas
     * @ORM\OneToMany(targetEntity="CaminoEtapa", mappedBy="camino")
     */
    private $caminoEtapas;

    /**
     * Un camino tiene muchas mochilas
     * @ORM\OneToMany(targetEntity="Mochila", mappedBy="camino")
     */
    private $backpacks;   
    
    
    public function __construct() 
    { 
        $this->backpacks = new ArrayCollection();                     
    }
    

    public function getId(): ?int 
    {
        return $this->id;
    }    

    public function getName(): ?string 
    {
        return $this->name;
    }

    public function setName(string $name): self 
    {
        $this->name = $name;
        return $this;
    }

    public function getStart(): ?string 
    {
        return $this->start;
    }

    public function setStart(string $start): self 
    {
        $this->start = $start;
        return $this;
    }

    public function getFinish(): ?string 
    {
        return $this->finish;
    }

    public function setFinish(string $finish): self 
    {
        $this->finish = $finish;
        return $this;
    }

    public function getNumEtapas(): ?int 
    {
        return $this->numEtapas;
    }

    public function setNumEtapas(int $numEtapas): self 
    {
        $this->numEtapas = $numEtapas;
        return $this;
    }

    public function getKm(): ?float 
    {
        return $this->km;
    }

    public function setKm(float $km): self 
    {
        $this->km = $km;
        return $this;
    }

    public function getDescription(): ?string 
    {
        return $this->description;
    }

    public function setDescription(string $description): self 
    {
        $this->description = $description;
        return $this;
    }

    public function getUserCaminos(): ?int 
    {
        return $this->userCaminos;
    } 

    public function getCaminoEtapas(): ?int 
    {
        return $this->caminoEtapas;
    } 

    public function getBackpacks(): ?int 
    {
        return $this->backpacks;
    } 

}
