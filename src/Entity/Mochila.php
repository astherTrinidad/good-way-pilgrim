<?php

namespace App\Entity;

use App\Repository\MochilaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MochilaRepository::class)
 */
class Mochila
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
    private $object;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantity;

    /**
     * Muchas mochilas tienen un usuario.
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="mochilas")
     * @ORM\JoinColumn(name="id_usuario", referencedColumnName="id", onDelete="cascade")
     */
    private $user;

    /**
     * Muchas mochilas tienen un camino. 
     * @ORM\ManyToOne(targetEntity="Camino", inversedBy="mochilas")
     * @ORM\JoinColumn(name="id_camino", referencedColumnName="id", onDelete="cascade")
     */
    private $camino;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getObject(): ?string
    {
        return $this->object;
    }

    public function setObject(string $object): self
    {
        $this->object = $object;
        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;
        return $this;
    }

    public function getUser(): ?Usuario
    {
        return $this->user;
    }

    public function setUser(Usuario $user): self
    {
        $this->user = $user;
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
}
