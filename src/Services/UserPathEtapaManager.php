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
    
    public function checkCaminoEtapa($caminoId, $etapaId) {
        return $this->userPathEtapaRepository->checkCaminoEtapa($caminoId, $etapaId);
    }
    
    public function addEtapa($userId, $caminoEtapaId) {
        return $this->userPathEtapaRepository->addEtapa($userId, $caminoEtapaId);
    }

    public function getKm($userId) {
        return $this->userPathEtapaRepository->getKm($userId);
    }

}
