<?php

namespace App\Entity;

use App\Repository\LogroUsuarioRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass=LogroUsuarioRepository::class)
 */
class LogroUsuario
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * Muchos LogroUsuario tienen un logro. 
     * @ORM\ManyToOne(targetEntity="Logro", inversedBy="logroUsuarios")
     * @ORM\JoinColumn(name="id_logro", referencedColumnName="id", onDelete="CASCADE", nullable=false)
     */
    private $achievement;

    /**
     * Muchos LogroUsuario estan en un usuario. 
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="logroUsuarios")
     * @ORM\JoinColumn(name="id_usuario", referencedColumnName="id", onDelete="CASCADE", nullable=false)
     */
    private $user;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?DateTime
    {
        return $this->date;
    }

    public function setDate(string $date): self
    {
        $fecha = new \DateTime($date);
        $this->date = $fecha;
        return $this;
    }

    public function getAchievement(): ?Logro
    {
        return $this->achievement;
    }

    public function setAchievement(Logro $achievement): self
    {
        $this->achievement = $achievement;
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
}
