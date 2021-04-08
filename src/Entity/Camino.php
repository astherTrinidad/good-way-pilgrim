<?php

namespace App\Entity;

use App\Repository\CaminoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CaminoRepository::class)
 */
class Camino {

    public function __construct() {
        $this->mochilas = new ArrayCollection();
        $this->usuarios = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $origen;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $destino;

    /**
     * @ORM\Column(name="num_total_etapas",type="integer")
     */
    private $numTotalEtapas;

    /**
     * @ORM\Column(type="float")
     */
    private $kilometros;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $descripcion;

    /**
     * Muchos caminos tienen muchos usuarios
     * @ORM\ManyToMany(targetEntity="Usuario", mappedBy="caminos")
     */
    private $usuarios;

    /**
     * Un camino tiene muchas mochilas.
     * @ORM\OneToMany(targetEntity="Mochila", mappedBy="camino")
     */
    private $mochilas;

    public function getId(): ?int {
        return $this->id;
    }

    public function getCaminoId(): ?int {
        return $this->camino_id;
    }

    public function setCaminoId(int $camino_id): self {
        $this->camino_id = $camino_id;

        return $this;
    }

    public function getNombre(): ?string {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self {
        $this->nombre = $nombre;

        return $this;
    }

    public function getOrigen(): ?string {
        return $this->origen;
    }

    public function setOrigen(string $origen): self {
        $this->origen = $origen;

        return $this;
    }

    public function getDestino(): ?string {
        return $this->destino;
    }

    public function setDestino(string $destino): self {
        $this->destino = $destino;

        return $this;
    }

    public function getNumTotalEtapas(): ?int {
        return $this->numTotalEtapas;
    }

    public function setNumTotalEtapas(int $numTotalEtapas): self {
        $this->numTotalEtapas = $numTotalEtapas;

        return $this;
    }

    public function getKilometros(): ?float {
        return $this->kilometros;
    }

    public function setKilometros(float $kilometros): self {
        $this->kilometros = $kilometros;

        return $this;
    }

    public function getDescripcion(): ?string {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self {
        $this->descripcion = $descripcion;

        return $this;
    }

}
