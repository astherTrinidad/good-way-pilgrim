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
     * @Route("/pub/AllAchievements", name="logrosSummary", methods={"GET"})
     */
    public function AllAchievements(): Response {

        $achievements = $this->achievementManager->getAll();
        $data = ['achievements' => $achievements];
        return new JsonResponse($data);
    }
    
    
    /**
     * @Route("/pri/MyAchievements", name="myAchievements", methods={"GET"})
     */
    public function MyAchievements(Request $request): Response {
        $id = $this->authManager->getIdFromToken($request, $this->getParameter('jwt_secret'));
        $achievements = $this->achievementManager->getUserAchievements($id);
        $data = ['achievements' => $achievements];
        return new JsonResponse($data);
    }
    
    /**
     * @Route("/pri/addAchievement", name="addAchievement", methods={"PUT"})
     */
    public function addAchievement(Request $request): Response {
        $parameters = json_decode($request->getContent(), true);
        $id_user = $this->authManager->getIdFromToken($request, $this->getParameter('jwt_secret'));
        $id_logro = $parameters['id'];
        $this->achievementManager->addAchievement($id_logro, $id_user, "2018-12-30");
        return $this->json(['message' => 'success']);
    }
    
    /**
     * @Route("/pri/deleteAchievement", name="deleteAchievement", methods={"DELETE"})
     */
    public function deleteAchievement(Request $request): Response {
        $id = $this->authManager->getIdFromToken($request, $this->getParameter('jwt_secret'));
        $achievements = $this->achievementManager->getUserAchievements($id);
        $data = ['achievements' => $achievements];
        return new JsonResponse($data);
    }

}
