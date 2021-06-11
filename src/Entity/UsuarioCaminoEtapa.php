<?php

namespace App\Entity;

use App\Repository\UsuarioCaminoEtapaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UsuarioCaminoEtapaRepository::class)
 */
class UsuarioCaminoEtapa
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * Muchos UsuarioCaminoEtapa son realizados por un usuario. 
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="usuarioCaminoEtapas")
     * @ORM\JoinColumn(name="id_usuario", referencedColumnName="id", onDelete="CASCADE", nullable=false)
     */
    private $user;

    /**
     * Muchos UsuarioCaminoEtapa son realizados por un caminoEtapa. 
     * @ORM\ManyToOne(targetEntity="CaminoEtapa", inversedBy="usuarioCaminoEtapas")
     * @ORM\JoinColumn(name="id_caminoEtapa", referencedColumnName="id", onDelete="CASCADE", nullable=false)
     */
    private $caminoEtapa;


    public function getId(): ?int
    {
        return $this->id;
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

    public function getCaminoEtapa(): ?CaminoEtapa
    {
        return $this->caminoEtapa;
    }

    public function setCaminoEtapa(CaminoEtapa $caminoEtapa): self
    {
        $this->caminoEtapa = $caminoEtapa;
        return $this;
    }
}
