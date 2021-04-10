<?php

namespace App\Entity;

use App\Repository\CaminoEtapaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CaminoEtapaRepository::class)
 */
class CaminoEtapa {    

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * Muchas CaminoEtapa estan un camino. 
     * @ORM\ManyToOne(targetEntity="Camino", inversedBy="caminoEtapa")
     * @ORM\JoinColumn(name="id_camino", referencedColumnName="id")
     */
    private $camino;

    /**
     * Muchas CaminoEtapa estan en una etapa. 
     * @ORM\ManyToOne(targetEntity="Etapa", inversedBy="caminoEtapa")
     * @ORM\JoinColumn(name="id_etapa", referencedColumnName="id")
     */
    private $etapa;

    /**
     * @ORM\Column(type="integer")
     */
    private $numEtapa;
    

    public function getId(): ?int {
        return $this->id;
    }   

    public function geNumEtapa(): ?string {
        return $this->numEtapa;
    }

    public function setNumEtapa(string $numEtapa): self {
        $this->numEtapa = $numEtapa;
        return $this;
    }    

}