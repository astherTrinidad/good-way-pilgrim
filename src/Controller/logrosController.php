<?php

namespace App\Controller;

use App\Services\AuthManager;
use App\Services\AchievementManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class logrosController extends AbstractController {

    private $achievementManager;
    private $authManager;

    function __construct(AchievementManager $achievementManager, AuthManager $authManager) {
        $this->achievementManager = $achievementManager;        
        $this->authManager = $authManager;
    }

    /**
     * @Route("/pri/AllAchievements", name="logrosSummary", methods={"GET"})
     */
    public function AllAchievements(): Response {
        $achievements = $this->achievementManager->getAll();
        return new JsonResponse($achievements);
    }
    
    
    /**
     * @Route("/pri/MyAchievements", name="myAchievements", methods={"GET"})
     */
    public function MyAchievements(Request $request): Response {
        $id = $this->authManager->getIdFromToken($request, $this->getParameter('jwt_secret'));
        $achievements = $this->achievementManager->getUserAchievements($id);
        return new JsonResponse($achievements);
    }
    
    /**
     * @Route("/pri/addAchievement", name="addAchievement", methods={"PUT"})
     */
    public function addAchievement(Request $request): Response {
        $parameters = json_decode($request->getContent(), true);
        $id_user = $this->authManager->getIdFromToken($request, $this->getParameter('jwt_secret'));
        $this->achievementManager->addAchievement($parameters['id'], $id_user, $parameters['date']);
        return $this->json(['message' => 'success']);
    }
    
    /**
     * @Route("/pri/deleteAchievement", name="deleteAchievement", methods={"DELETE"})
     */
    public function deleteAchievement(Request $request): Response {
        $parameters = json_decode($request->getContent(), true);
        $id_user = $this->authManager->getIdFromToken($request, $this->getParameter('jwt_secret'));
        $this->achievementManager->deleteAchievement($parameters['id'], $id_user);
        return $this->json(['message' => 'success']);
    }

}
