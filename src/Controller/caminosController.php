<?php

namespace App\Controller;

use App\Services\AuthManager;
use App\Services\CaminosManager;
use App\Services\UserPathManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class caminosController extends AbstractController {

    private $authManager;
    private $pathsManager;
    private $userPathManager;

    function __construct(AuthManager $authManager,CaminosManager $pathsManager, UserPathManager $userPathManager) {
        $this->authManager = $authManager;
        $this->pathsManager = $pathsManager;
        $this->userPathManager = $userPathManager;
    }

    /**
     * @Route("/pri/allPaths", name="allPaths", methods={"GET"})
     */
    public function allPaths(): Response {
        $caminos = $this->pathsManager->getAll();
        return new JsonResponse($caminos);
    }

    /**
     * @Route("/pri/myPaths", name="myPaths", methods={"GET"})
     */
    public function myPaths(Request $request): Response {
        $id = $this->authManager->getIdFromToken($request, $this->getParameter('jwt_secret'));
        $caminos = $this->userPathManager->getHistory($id);
        return new JsonResponse($caminos);
    }

    /**
     * @Route("/pub/csv_download", name="csv_download", methods={"GET"})
     */
    public function descargarCSV(): Response {

        $caminos = $this->pathsManager->getAll();

        $fp = fopen('php://output', 'w');
        foreach ($caminos as $camino) {
            $data = [utf8_decode($camino['name']), utf8_decode($camino['start']), utf8_decode($camino['finish']), $camino['num_etapas'], $camino['km'], utf8_decode($camino['description'])];
            fputcsv($fp, $data);
        }

        $response = new Response();
        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="GoodWayPilgrim_caminos.csv"');

        return $response;
    }

}
