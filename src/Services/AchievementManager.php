<?php

namespace App\Services;

use App\Repository\LogroRepository;
use App\Repository\LogroUsuarioRepository;

class AchievementManager {

    private $achievementRepository;
    private $achievementUserRepository;

    function __construct(LogroRepository $achievementRepository, LogroUsuarioRepository $achievementUserRepository) {
        $this->achievementRepository = $achievementRepository;
        $this->achievementUserRepository = $achievementUserRepository;
    }

    public function getAll() {
        return $this->achievementRepository->getAll();
    }

    public function getUserAchievements($userId) {
        return $this->achievementUserRepository->getById($userId);
    }

    public function getThreeByIdUser($userId) {
        return $this->achievementUserRepository->getThreeById($userId);
    }

    public function addAchievement($logroId, $userId, $date) {
        if (!$this->achievementUserRepository->check($logroId, $userId)) {
            $this->achievementUserRepository->addAchievement($logroId, $userId, $date);
            return true;
        }
        return false;
    }

    public function deleteAchievement($userId, $logroId) {
        if ($this->achievementUserRepository->check($logroId, $userId)) {
            return $this->achievementUserRepository->deleteAchievement($userId, $logroId);
        }
        return false;
    }

    public function deleteAchievements($userId) {
        return $this->achievementUserRepository->deleteAchievements($userId);
    }

}
