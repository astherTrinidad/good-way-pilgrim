<?php

namespace App\Services;

use App\Repository\UsuarioCaminoRepository;


class UserPathManager
{
    private $userPathRepository;

    function __construct(UsuarioCaminoRepository $userPathRepository)
    {
        $this->userPathRepository = $userPathRepository;
    }

    public function getHistory($userId)
    {
        return $this->userPathRepository->getHistory($userId);
    }

    public function getActivePathUser($userId)
    {
        return $this->userPathRepository->getActivePath($userId);
    }
    
    public function getKm($userId)
    {
        return $this->userPathRepository->getKm($userId);
    }
}
