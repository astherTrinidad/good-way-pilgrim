<?php

namespace App\Entity;

use App\Repository\LogroUsuarioRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LogroUsuarioRepository::class)
 */
class LogroUsuario {    

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
     * @ORM\ManyToOne(targetEntity="Logro", inversedBy="logroUsuario")
     * @ORM\JoinColumn(name="id_logro", referencedColumnName="id")
     */
    private $achievement;

    /**
     * Muchos LogroUsuario estan en un usuario. 
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="logroUsuario")
     * @ORM\JoinColumn(name="id_usuario", referencedColumnName="id")
     */
    private $user;

    public function getId(): ?int {
        return $this->id;
    }

    public function getDate(): ?date {
        return $this->date;
    }

    public function setDate(date $date): self {
        $this->date = $date;
        return $this;
    }


}