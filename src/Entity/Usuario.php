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
        $this->caminos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->mochilas = new ArrayCollection();
        $this->logros = new ArrayCollection();
    }

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string",unique=true, length=9)
     */
    private $dni;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $apellido;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=8)
     */
    private $pass;

    /**
     * Muchos usuarios tienen muchos caminos
     * @ORM\ManyToMany(targetEntity="Camino", inversedBy="usuarios")
     * @ORM\JoinTable(name="usuarios_caminos")
     */
    private $caminos;

    /**
     * Un usuario tiene muchas mochilas
     * @ORM\OneToMany(targetEntity="Mochila", mappedBy="usuario")
     */
    private $mochilas;

    /**
     * Muchos usuarios tienen muchos logros
     * @ORM\ManyToMany(targetEntity="Logro", inversedBy="usuarios")
     * @ORM\JoinTable(name="usuarios_logros")
     */
    private $logros;

    public function getId(): ?int {
        return $this->id;
    }

    public function getDni(): ?string {
        return $this->dni;
    }

    public function setDni(string $dni): self {
        $this->dni = $dni;

        return $this;
    }

    public function getNombre(): ?string {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self {
        $this->nombre = $nombre;

        return $this;
    }

    public function getApellido(): ?string {
        return $this->apellido;
    }

    public function setApellido(string $apellido): self {
        $this->apellido = $apellido;

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

    function getMochilas() {
        return $this->mochilas;
    }

    function setMochilas($mochilas): void {
        $this->mochilas = $mochilas;
    }

    public function getLogros() {
        return $this->logros;
    }

    public function setLogros($logros) {
        $this->logros = $logros;
        return $this;
    }

}
