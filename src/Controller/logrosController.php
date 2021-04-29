<?php

namespace App\Controller;

use App\Services\AuthManager;
use App\Services\AchievementManager;
use App\Form\LogroUsuarioType;
use App\Entity\LogroUsuario;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class logrosController extends AbstractController
{

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
        $this->achievementManager->addAchievement($parameters['achievement'], $id_user, $parameters['date']);
        return $this->json(['message' => 'success']);
    }

    /**
     * @Route("/pri/deleteAchievements", name="deleteAchievement", methods={"DELETE"})
     */
<<<<<<< HEAD
    public function logrosSummary(Request $request, LogroRepository $logroRepository): Response
    {

        $logros = $logroRepository->getById($request->get('id'));

        if (!$logros) {
            $data = [
                'message' => 'no results found'
            ];
            return new JsonResponse($data, Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        if (count($logros) < 4) {
            return new JsonResponse($logros);
        } else {
            return new JsonResponse(array_slice($logros, 0, 3));
        }
=======
    public function deleteAchievements(Request $request): Response {
        $id_user = $this->authManager->getIdFromToken($request, $this->getParameter('jwt_secret'));
        $this->achievementManager->deleteAchievements($id_user);
        return $this->json(['message' => 'success']);
>>>>>>> 0760acc6b3c6f755c9e189660ec662f174f43a31
    }
}
