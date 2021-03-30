<?php

namespace App\Entity;

use App\Repository\LogroRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LogroRepository::class)
 */
class Logro {

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
    private $descripcion;

    /**
     * Muchos logros tienen muchos usuarios
     * @ORM\ManyToMany(targetEntity="Usuario", mappedBy="logros")
     */
    private $usuarios;

    public function getId(): ?int {
        return $this->id;
    }

    public function getNombre(): ?string {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self {
        $this->nombre = $nombre;

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
