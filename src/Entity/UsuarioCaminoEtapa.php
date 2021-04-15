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
     * @ORM\Column(type="string", length=30)
     */
    private $status;

    /**
     * Muchos UsuarioCaminoEtapa son realizados por un usuario. 
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="usuarioCaminoEtapas")
     * @ORM\JoinColumn(name="id_usuario", referencedColumnName="id", onDelete="CASCADE")
     */
    private $user;

    /**
     * Muchos UsuarioCaminoEtapa son realizados por un caminoEtapa. 
     * @ORM\ManyToOne(targetEntity="CaminoEtapa", inversedBy="usuarioCaminoEtapas")
     * @ORM\JoinColumn(name="id_caminoEtapa", referencedColumnName="id", onDelete="CASCADE")
     */
    private $caminoEtapa;   


    public function getId(): ?int 
    {
        return $this->id;
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

    public function getUser(): ?int 
    {
        return $this->user;
    } 

    public function getCaminoEtapa(): ?int 
    {
        return $this->caminoEtapa;
    } 


}