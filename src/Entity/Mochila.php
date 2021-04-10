<?php

namespace App\Entity;

use App\Repository\MochilaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MochilaRepository::class)
 */
class Mochila {

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $camino_id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $objeto;

    /**
     * @ORM\Column(type="integer")
     */
    private $cantidad;

    /**
     * Muchas mochilas tienen un usuario.
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="mochilas")
     * @ORM\JoinColumn(name="usuario_id", referencedColumnName="id")
     */
    private $usuario;

    /**
     * Muchas mochilas tienen un camino. 
     * @ORM\ManyToOne(targetEntity="Camino", inversedBy="mochilas")
     * @ORM\JoinColumn(name="camino_id", referencedColumnName="id")
     */
    private $camino;
    
    
    public function getId(): ?int {
        return $this->id;
    }

    public function getDni(): ?string {
        return $this->dni;
    }

    public function setDni(string $dni): self {
        $this->dni = $dni;

        return $this;
    }

    public function getCaminoId(): ?int {
        return $this->camino_id;
    }

    public function setCaminoId(int $camino_id): self {
        $this->camino_id = $camino_id;

        return $this;
    }

    public function getObjeto(): ?string {
        return $this->objeto;
    }

    public function setObjeto(string $objeto): self {
        $this->objeto = $objeto;

        return $this;
    }

    public function getCantidad(): ?int {
        return $this->cantidad;
    }

    public function setCantidad(int $cantidad): self {
        $this->cantidad = $cantidad;

        return $this;
    }
    
    function getUsuario() {
        return $this->usuario;
    }

    function setUsuario($usuario): void {
        $this->usuario = $usuario;
    }

}