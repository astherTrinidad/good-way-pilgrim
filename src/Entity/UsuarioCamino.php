<?php

namespace App\Entity;

use App\Repository\UsuarioCaminoRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UsuarioCaminoRepository::class)
 */
class UsuarioCamino
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
    private $startDate;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $finishDate;

    /**
     * @ORM\Column(type="string")
     */
    private $status;

    /**
     * Muchos UsuarioCamino son realizados por un usuario. 
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="usuarioCaminos")
     * @ORM\JoinColumn(name="id_usuario", referencedColumnName="id", onDelete="CASCADE")
     */
    private $user;

    /**
     * Muchas UsuarioCamino estan en un camino. 
     * @ORM\ManyToOne(targetEntity="Camino", inversedBy="usuarioCaminos")
     * @ORM\JoinColumn(name="id_camino", referencedColumnName="id", onDelete="CASCADE")
     */
    private $camino;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStartDate(): ?DateTime
    {
        return $this->startDate;
    }

    public function setStartDate(string $startDate): self
    {
        $fecha = new \DateTime($startDate);
        $this->startDate = $fecha;
        return $this;
    }

    public function getFinishDate(): ?DateTime
    {
        return $this->finishDate;
    }

    public function setFinishDate(string $finishDate): self
    {
        if (strcmp($finishDate, "") == 0) {
            $this->finishDate = null;
            return $this;
        } else {
            $fecha = new \DateTime($finishDate);
            $this->finishDate = $fecha;
            return $this;
        }
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;
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
