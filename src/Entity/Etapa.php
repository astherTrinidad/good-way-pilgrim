<?php

namespace App\Entity;

use App\Repository\EtapaRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=EtapaRepository::class)
 */
class Etapa
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
    private $start;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $finish;

    /**
     * @ORM\Column(type="float")
     */
    private $km;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $description;

    /**
     * Una Etapa tiene muchos caminoEtapa
     * @ORM\OneToMany(targetEntity="CaminoEtapa", mappedBy="etapa")
     */
    private $caminoEtapas;


    public function __construct()
    {
        $this->caminoEtapas = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return CaminoEtapa[]
     */
    public function getCaminoEtapas()
    {
        return $this->caminoEtapas;
    }

    public function setCaminoEtapas(CaminoEtapa $caminoEtapas): self
    {
        $this->caminoEtapas = $caminoEtapas;
        return $this;
    }
}
