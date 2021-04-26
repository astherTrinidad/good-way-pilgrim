<?php

namespace App\Services;

use App\Repository\LogroRepository;


class AchievementManager
{
    private $achievementRepository;

    function __construct(LogroRepository $achievementRepository)
    {
        $this->achievementRepository = $achievementRepository;
    }

    public function getThreeByIdUser($userId)
    {
        return $this->achievementRepository->getThreeById($userId);
    }
}
