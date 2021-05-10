<?php

namespace App\Entity;

use App\Repository\CaminoEtapaRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

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
     * @ORM\JoinColumn(name="id_camino", referencedColumnName="id", onDelete="CASCADE", nullable=false)
     */
    private $camino;

    /**
     * Muchas CaminoEtapa estan en una etapa. 
     * @ORM\ManyToOne(targetEntity="Etapa", inversedBy="caminoEtapas")
     * @ORM\JoinColumn(name="id_etapa", referencedColumnName="id", onDelete="CASCADE", nullable=false)
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

    public function getNumEtapa(): ?int
    {
        return $this->numEtapa;
    }

    public function setNumEtapa(int $numEtapa): self
    {
        $this->numEtapa = $numEtapa;
        return $this;
    }

    public function getCamino(): ?Camino
    {
        return $this->camino;
    }

    public function setCamino(Camino $camino): self
    {
        $this->camino = $camino;
        return $this;
    }

    public function getEtapa(): ?Etapa
    {
        return $this->etapa;
    }

    public function setEtapa(Etapa $etapa): self
    {
        $this->etapa = $etapa;
        return $this;
    }

    /**
     * @return UsuarioCaminoEtapa[]
     */
    public function getUserCaminoEtapas()
    {
        return $this->userCaminoEtapas;
    }

    public function addUserCaminoEtapas(UsuarioCaminoEtapa $userCaminoEtapas): self
    {
        $this->userCaminoEtapas->add($userCaminoEtapas);
        return $this;
    }
}
