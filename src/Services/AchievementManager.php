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

    public function addAchievement($id_logro, $id_user, $date) {
        if (!$this->achievementUserRepository->check($id_logro, $id_user)) {
            $this->achievementUserRepository->addAchievement($id_logro, $id_user, $date);
            return true;
        }
        return false;
    }

    public function deleteAchievements($id_user) {

        return $this->achievementUserRepository->deleteAchievements($id_user);
    }

}
