<?php

namespace App\Services;

use App\Repository\UsuarioCaminoEtapaRepository;

class UserPathEtapaManager {

    private $userPathEtapaRepository;

    function __construct(UsuarioCaminoEtapaRepository $userPathRepository) {
        $this->userPathEtapaRepository = $userPathRepository;
    }

    public function getEtapasRealizadas($userId, $caminoId) {
        return $this->userPathEtapaRepository->getEtapasRealizadas($userId, $caminoId);
    }
    
    public function addEtapa($userId, $caminoId, $etapaId) {
        echo "todo ok";
        //return $this->userPathEtapaRepository->getEtapasRealizadas($userId, $caminoId);
    }

    public function getKm($userId) {
        return $this->userPathEtapaRepository->getKm($userId);
    }

}
