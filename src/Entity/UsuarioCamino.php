<?php

namespace App\Entity;

use App\Repository\UsuarioCaminoRepository;
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
     * @ORM\Column(type="date")
     */
    private $finishDate;

    /**
     * Muchos UsuarioCamino son realizados por un usuario. 
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="usuarioCaminos")
     * @ORM\JoinColumn(name="id_usuario", referencedColumnName="id")
     */
    private $user;

    /**
     * Muchas UsuarioCamino estan en un camino. 
     * @ORM\ManyToOne(targetEntity="Camino", inversedBy="usuarioCaminos")
     * @ORM\JoinColumn(name="id_camino", referencedColumnName="id")
     */
    private $camino;


    public function getId(): ?int 
    {
        return $this->id;
    }       

    public function getStartDate(): ?date 
    {
        return $this->startDate;
    }

    public function setStartDate(date $startDate): self 
    {
        $this->startDate = $startDate;
        return $this;
    }

    public function getFinishDate(): ?date 
    {
        return $this->finishDate;
    }

    public function setFinishDate(date $finishDate): self 
    {
        $this->finishDate = $finishDate;
        return $this;
    }

    public function getUser(): ?int 
    {
        return $this->user;
    }

    public function getCamino(): ?int 
    {
        return $this->camino;
    }

}