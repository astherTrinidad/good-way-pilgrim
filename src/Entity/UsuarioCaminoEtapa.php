<?php

namespace App\Entity;

use App\Repository\UsuarioCaminoEtapaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UsuarioCaminoEtapaRepository::class)
 */
class UsuarioCaminoEtapa {    

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $status;

    /**
     * Muchos UsuarioCaminoEtapa son realizados por un usuario. 
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="usuarioCaminoEtapa")
     * @ORM\JoinColumn(name="id_usuario", referencedColumnName="id")
     */
    private $user;

    /**
     * Muchos UsuarioCaminoEtapa son realizados por un camino. 
     * @ORM\ManyToOne(targetEntity="Camino", inversedBy="usuarioCaminoEtapa")
     * @ORM\JoinColumn(name="id_camino", referencedColumnName="id")
     */
    private $camino;

    /**
     * Muchos UsuarioCaminoEtapa son realizados por una etapa. 
     * @ORM\ManyToOne(targetEntity="Etapa", inversedBy="usuarioCaminoEtapa")
     * @ORM\JoinColumn(name="id_etapa", referencedColumnName="id")
     */
    private $etapa;


    public function getId(): ?int {
        return $this->id;
    } 

    public function getStatus(): ?string {
        return $this->status;
    }

    public function setStatus(string $status): self {
        $this->status = $status;
        return $this;
    }

}