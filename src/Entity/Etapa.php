<?php

namespace App\Entity;

use App\Repository\EtapaRepository;
use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(type="string", length=50)
     */
    private $origen;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $destino;

    /**
     * @ORM\Column(type="float")
     */
    private $kilometros;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $descripcion;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrigen(): ?string
    {
        return $this->origen;
    }

    public function setOrigen(string $origen): self
    {
        $this->origen = $origen;

        return $this;
    }

    public function getDestino(): ?string
    {
        return $this->destino;
    }

    public function setDestino(string $destino): self
    {
        $this->destino = $destino;

        return $this;
    }

    public function getKilometros(): ?float
    {
        return $this->kilometros;
    }

    public function setKilometros(float $kilometros): self
    {
        $this->kilometros = $kilometros;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }
}
