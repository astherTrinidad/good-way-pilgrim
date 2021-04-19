<?php

namespace App\Entity;

use App\Repository\UsuarioRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UsuarioRepository::class)
 */
class Usuario implements UserInterface
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
     * @ORM\Column(type="string", length=30, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="text", nullable=true)
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

    public function __construct()
    {
        $this->userCaminos = new ArrayCollection();
        $this->backpacks = new ArrayCollection();
        $this->userCaminoEtapas = new ArrayCollection();
        $this->achievementUsers = new ArrayCollection();
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

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;
        return $this;
    }

    /**
     * @return UsuarioCamino[]
     */
    public function getUserCaminos()
    {
        return $this->userCaminos;
    }

    public function setUserCaminos(UsuarioCamino $userCaminos): self
    {
        $this->userCaminos->add = $userCaminos;
        return $this;
    }

    /*public function addBrand(Brand $brand): self
    {
        if (!$this->brands->contains($brand)) {
            $this->brands[] = $brand;
            $brand->setBrands($this);
        }

        return $this;
    }*/

    /**
     * @return Mochila[]
     */
    public function getBackpacks()
    {
        return $this->backpacks;
    }

    public function setBackpacks(Mochila $backpacks): self
    {
        $this->backpacks = $backpacks;
        return $this;
    }

    /**
     * @return LogroUsuario[]
     */
    public function getAchievementUsers()
    {
        return $this->achievementUsers;
    }

    public function setAchievementUsers(LogroUsuario $achievementUsers): self
    {
        $this->achievementUsers = $achievementUsers;
        return $this;
    }

    /**
     * @return UsuarioCaminoEtapa[]
     */
    public function getUserCaminoEtapas()
    {
        return $this->userCaminoEtapas;
    }

    public function setUserCaminoEtapas(UsuarioCaminoEtapa $userCaminoEtapas): self
    {
        $this->userCaminoEtapas = $userCaminoEtapas;
        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getRoles()
    {
        return array('ROLE_USER');
    }

    public function getUsername()
    {
        return $this->name;
    }
}
