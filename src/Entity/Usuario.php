<?php

namespace App\Entity;

use App\Repository\UsuarioRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UsuarioRepository::class)
 */
class Usuario 
{    

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
     * Un usuario tiene muchos UsuarioCaminos
     * @ORM\OneToMany(targetEntity="UsuarioCamino", mappedBy="usuario")
     */
    private $userCaminos;

    /**
     * Un usuario tiene muchas mochilas
     * @ORM\OneToMany(targetEntity="Mochila", mappedBy="usuario")
     */
    private $backpacks;
    
    /**
     * Un usuario tiene muchos LogroUsuarios
     * @ORM\OneToMany(targetEntity="LogroUsuario", mappedBy="usuario")
     */
    private $achievementUsers;

    /**
     * Un usuario tiene muchos UsuarioCaminoEtapas
     * @ORM\OneToMany(targetEntity="UsuarioCaminoEtapa", mappedBy="usuario")
     */
    private $userCaminoEtapas;


    public function __construct() 
    {      
        $this->userCaminos = new ArrayCollection();
        $this->backpacks = new ArrayCollection();
        $this->userCaminoEtapas = new ArrayCollection(); 
    }

    
    public function getId(): ?int 
    {
        return $this->id;
    }   

    public function getName(): ?string 
    {
        return $this->name;
    }

    public function setName(string $name): self 
    {
        $this->name = $name;
        return $this;
    }

    public function getSurname(): ?string 
    {
        return $this->surname;
    }

    public function setSurname(string $surname): self 
    {
        $this->surname = $surname;
        return $this;
    }

    public function getEmail(): ?string 
    {
        return $this->email;
    }

    public function setEmail(string $email): self 
    {
        $this->email = $email;
        return $this;
    }

    public function getPass(): ?string 
    {
        return $this->pass;
    }

    public function setPass(string $pass): self 
    {
        $this->pass = $pass;
        return $this;
    } 

    public function getUserCaminos(): ?int 
    {
        return $this->userCaminos;
    }

    public function getBackpacks(): ?int 
    {
        return $this->backpacks;
    }

    public function getAchievementUsers(): ?int 
    {
        return $this->achievementUsers;
    }

    public function getUserCaminoEtapas(): ?int 
    {
        return $this->userCaminoEtapas;
    }

}
