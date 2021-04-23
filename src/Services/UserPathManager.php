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

    public function getAllByIdUser($userId)
    {
        return $this->userPathRepository->getAllById($userId);
    }

    public function getActivePathUser($userId)
    {
        return $this->userPathRepository->getActivePath($userId);
    }
}
