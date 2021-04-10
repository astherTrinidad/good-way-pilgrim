<?php

namespace App\Entity;

use App\Repository\UsuarioRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UsuarioRepository::class)
 */
class Usuario {

    public function __construct() {      
        $this->userCamino = new ArrayCollection();
        $this->backpack = new ArrayCollection(); 
    }

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $surname;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=8)
     */
    private $pass;

    /**
     * Un usuario tiene muchos UsuarioCamino
     * @ORM\OneToMany(targetEntity="UsuarioCamino", mappedBy="usuario")
     */
    private $userCamino;

     /**
     * Un usuario tiene muchas mochilas
     * @ORM\OneToMany(targetEntity="Mochila", mappedBy="usuario")
     */
    private $backpack;

    
    public function getId(): ?int {
        return $this->id;
    }   

    public function getName(): ?string {
        return $this->name;
    }

    public function setName(string $name): self {
        $this->name = $name;

        return $this;
    }

    public function getSurname(): ?string {
        return $this->surname;
    }

    public function setSurname(string $surname): self {
        $this->surname = $surname;

        return $this;
    }

    public function getEmail(): ?string {
        return $this->email;
    }

    public function setEmail(string $email): self {
        $this->email = $email;

        return $this;
    }

    public function getPass(): ?string {
        return $this->pass;
    }

    public function setPass(string $pass): self {
        $this->pass = $pass;
        return $this;
    }   
}
