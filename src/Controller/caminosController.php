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
use App\Form\UserPathType;
use App\Entity\UsuarioCamino;

class caminosController extends AbstractController {

    private $authManager;
    private $pathsManager;
    private $userPathManager;

    function __construct(AuthManager $authManager, CaminosManager $pathsManager, UserPathManager $userPathManager) {
        $this->authManager = $authManager;
        $this->pathsManager = $pathsManager;
        $this->userPathManager = $userPathManager;
    }

    /**
     * @Route("/pri/allPaths", name="allPaths", methods={"GET"})
     */
    public function allPaths(): Response {
        $paths = $this->pathsManager->getAll();
        $caminosConEtapas = array();
        foreach ($paths as $path) {
            $etapas = $this->pathsManager->getEtapas($path['id']);
            $path["etapas"] = $etapas;
            array_push($caminosConEtapas, $path);
        }
        return new JsonResponse($caminosConEtapas);
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
     * @Route("/pri/getActivePath", name="getActivePath", methods={"GET"})
     */
    public function getActivePath(Request $request): Response {
        $id = $this->authManager->getIdFromToken($request, $this->getParameter('jwt_secret'));
        $paths = $this->userPathManager->getActivePath($id);
        $etapas = $this->pathsManager->getEtapas($paths['id']);
        $paths["etapas"] = $etapas;
        return new JsonResponse($paths);
    }
    
    /**
     * @Route("/pri/getEtapasRealizadas", name="getEtapasRealizadas", methods={"GET"})
     */
    public function getEtapasRealizadas(Request $request): Response {
        $parameters = json_decode($request->getContent(), true);
        $user = $this->authManager->getUserFromToken($request, $this->getParameter('jwt_secret'));

        $userPath = new UsuarioCamino();
        $userPath->setUser($user);

        $form = $this->createForm(UserPathType::class, $userPath, ['csrf_protection' => false]);
        $form->submit($parameters);

        if (!$form->isSubmitted() || !$form->isValid()) {
            return new JsonResponse(['message' => 'incorrect data recived'], Response::HTTP_BAD_REQUEST);
        }
        $etapasRealizadas = $this->userPathManager->getEtapasRealizadas($user->getId(), $parameters['camino']);
        return new JsonResponse($etapasRealizadas);
    }

    /**
     * @Route("/pri/addActivePath", name="addActivePath", methods={"POST"})
     */
    public function addActivePath(Request $request): Response {
        $parameters = json_decode($request->getContent(), true);
        $user = $this->authManager->getUserFromToken($request, $this->getParameter('jwt_secret'));

        $userPath = new UsuarioCamino();
        $userPath->setUser($user);

        $form = $this->createForm(UserPathType::class, $userPath, ['csrf_protection' => false]);
        $form->submit($parameters);

        if (!$form->isSubmitted() || !$form->isValid()) {
            return new JsonResponse(['message' => 'incorrect data recived'], Response::HTTP_BAD_REQUEST);
        }
        if($this->userPathManager->getActivePath($user->getId())){
            return new JsonResponse(['message' => 'User already has an active path'], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $this->userPathManager->addActivePath($user->getId(), $parameters['camino'], $parameters['start_date']);        
        return $this->json(['message' => 'success']);
    }

    /**
     * @Route("/pri/archivePath", name="archivePath", methods={"PUT"})
     */
    public function archivePath(Request $request): Response {
        $parameters = json_decode($request->getContent(), true);
        $user = $this->authManager->getUserFromToken($request, $this->getParameter('jwt_secret'));

        $userPath = new UsuarioCamino();
        $userPath->setUser($user);

        $form = $this->createForm(UserPathType::class, $userPath, ['csrf_protection' => false]);
        $form->submit($parameters);

        if (!$form->isSubmitted() || !$form->isValid()) {
            return new JsonResponse(['message' => 'incorrect data recived'], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * @Route("/pri/finishPath", name="finishPath", methods={"PUT"})
     */
    public function finishPath(Request $request): Response {
        $parameters = json_decode($request->getContent(), true);
        $user = $this->authManager->getUserFromToken($request, $this->getParameter('jwt_secret'));

        $userPath = new UsuarioCamino();
        $userPath->setUser($user);

        $form = $this->createForm(UserPathType::class, $userPath, ['csrf_protection' => false]);
        $form->submit($parameters);

        if (!$form->isSubmitted() || !$form->isValid()) {
            return new JsonResponse(['message' => 'incorrect data recived'], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * @Route("/pri/reactivatePath", name="reactivatePath", methods={"PUT"})
     */
    public function reactivatePath(Request $request): Response {
        $parameters = json_decode($request->getContent(), true);
        $user = $this->authManager->getUserFromToken($request, $this->getParameter('jwt_secret'));

        $userPath = new UsuarioCamino();
        $userPath->setUser($user);

        $form = $this->createForm(UserPathType::class, $userPath, ['csrf_protection' => false]);
        $form->submit($parameters);

        if (!$form->isSubmitted() || !$form->isValid()) {
            return new JsonResponse(['message' => 'incorrect data recived'], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * @Route("/pri/addEtapa", name="addEtapa", methods={"POST"})
     */
    public function addEtapa(Request $request): Response {
        
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
