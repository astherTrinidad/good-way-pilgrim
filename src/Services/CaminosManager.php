<?php

namespace App\Services;

use App\Repository\CaminoRepository;
use App\Repository\CaminoEtapaRepository;
use App\Repository\UsuarioCaminoRepository;
use App\Repository\UsuarioCaminoEtapaRepository;

class CaminosManager {

    private $caminoRepository;
    private $caminoEtapaRepository;
    private $usuarioCaminoRepository;
    private $usuarioCaminoEtapaRepository;

    function __construct(CaminoRepository $caminoRepository, CaminoEtapaRepository $caminoEtapaRepository,
            UsuarioCaminoEtapaRepository $usuarioCaminoEtapaRepository, UsuarioCaminoRepository $usuarioCaminoRepository) {
        $this->caminoRepository = $caminoRepository;
        $this->caminoEtapaRepository = $caminoEtapaRepository;
        $this->usuarioCaminoRepository = $usuarioCaminoEtapaRepository;
        $this->usuarioCaminoEtapaRepository = $usuarioCaminoRepository;
    }

    public function getAll() {
        return $this->caminoRepository->getAll();
    }

    public function getEtapas($idCamino) {
        return $this->caminoRepository->getEtapas($idCamino);
    }

}
