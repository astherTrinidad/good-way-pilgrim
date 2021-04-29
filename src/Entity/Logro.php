<?php

namespace App\Entity;

use App\Repository\LogroRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LogroRepository::class)
 */
class Logro
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
    private $name;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $description;
    
    /**
     * @ORM\Column(type="string", length=30)
     */
    private $slug;

    /**
     * Un logro tiene muchos logroUsuarios
     * @ORM\OneToMany(targetEntity="LogroUsuario", mappedBy="logro")
     */
    private $achievementUsers;


    public function __construct()
    {
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }
    
    function getSlug() : ?string{
        return $this->slug;
    }
    
    public function setSlug(string $slug): self
    {
        $this->name = $slug;
        return $this;
    }

            /**
     * @return LogroUsuario[]
     */
    public function getAchievementUsers()
    {
        return $this->achievementUsers;
    }

    public function addAchievementUsers(LogroUsuario $achievementUsers): self
    {
        $this->achievementUsers->add($achievementUsers);
        return $this;
    }
}
