<?php

namespace App\Entity;

use App\Repository\UsuarioRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UsuarioRepository::class)
 */
class Usuario implements UserInterface {

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
     * @ORM\Column(type="string", length=30, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string")
     */
    private $pass;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $picture;
    
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

    public function __construct() {
        $this->userCaminos = new ArrayCollection();
        $this->backpacks = new ArrayCollection();
        $this->userCaminoEtapas = new ArrayCollection();
    }

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
    
    function getPicture() {
        return $this->picture;
    }

    function setPicture($picture): void {
        $this->picture = $picture;
    }

        public function getUserCaminos(): ?int {
        return $this->userCaminos;
    }

    public function getBackpacks(): ?int {
        return $this->backpacks;
    }

    public function getAchievementUsers(): ?int {
        return $this->achievementUsers;
    }

    public function getUserCaminoEtapas(): ?int {
        return $this->userCaminoEtapas;
    }

    /**
     * @see UserInterface
     */
    public function getSalt() {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials() {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getPassword(): ?string {
        return $this->pass;
    }

    public function getRoles() {
        return array('ROLE_USER');
    }

    public function getUsername() {
        return $this->name;
    }

}
