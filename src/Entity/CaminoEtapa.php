<?php

namespace App\Entity;

use App\Repository\CaminoEtapaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CaminoEtapaRepository::class)
 */
class CaminoEtapa 
{     

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;   

    /**
     * @ORM\Column(type="integer")
     */
    private $numEtapa;

    /**
     * Muchas CaminoEtapa estan un camino. 
     * @ORM\ManyToOne(targetEntity="Camino", inversedBy="caminoEtapas")
     * @ORM\JoinColumn(name="id_camino", referencedColumnName="id")
     */
    private $camino;

    /**
     * Muchas CaminoEtapa estan en una etapa. 
     * @ORM\ManyToOne(targetEntity="Etapa", inversedBy="caminoEtapas")
     * @ORM\JoinColumn(name="id_etapa", referencedColumnName="id")
     */
    private $etapa;

    /**
     * Un caminoEtapa tiene muchos UsuarioCaminoEtapa
     * @ORM\OneToMany(targetEntity="UsuarioCaminoEtapa", mappedBy="caminoEtapa")
     */
    private $userCaminoEtapas;


    public function __construct() 
    {         
        $this->userCaminoEtapas = new ArrayCollection();             
    } 


    public function getId(): ?int 
    {
        return $this->id;
    }   

    public function getNumEtapa(): ?string 
    {
        return $this->numEtapa;
    }

    public function setNumEtapa(string $numEtapa): self 
    {
        $this->numEtapa = $numEtapa;
        return $this;
    }    

    public function getCamino(): ?int 
    {
        return $this->camino;
    } 

    public function getEtapa(): ?int 
    {
        return $this->etapa;
    } 

    public function getUserCaminoEtapas(): ?int 
    {
        return $this->userCaminoEtapas;
    } 

}