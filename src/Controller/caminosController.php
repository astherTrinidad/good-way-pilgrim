<?php

namespace App\Controller;

use App\Services\AuthManager;
use App\Services\CaminosManager;
use App\Services\UserPathManager;
use App\Services\UserPathEtapaManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Form\UserPathType;
use App\Form\PathEtapaType;
use App\Entity\UsuarioCamino;
use App\Entity\CaminoEtapa;

class caminosController extends AbstractController {

    private $authManager;
    private $pathsManager;
    private $userPathManager;
    private $userPathEtapaManager;

    function __construct(AuthManager $authManager, CaminosManager $pathsManager, UserPathManager $userPathManager, UserPathEtapaManager $userPathEtapaManager) {
        $this->authManager = $authManager;
        $this->pathsManager = $pathsManager;
        $this->userPathManager = $userPathManager;
        $this->userPathEtapaManager = $userPathEtapaManager;
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
        $path = $this->userPathManager->getActivePath($id);
        if (!$path) {
            return new JsonResponse(['message' => 'User hasnt got an active path']);
        }
        $km = $this->pathsManager->getKm($path['id']);
        $path["km"] = round($km['km'], 1);
        $etapas = $this->pathsManager->getEtapas($path['id']);
        $path["etapas"] = $etapas;
        return new JsonResponse($path);
    }

    /**
     * @Route("/pri/getEtapasRealizadas", name="getEtapasRealizadas", methods={"GET"})
     */
    public function getEtapasRealizadas(Request $request): Response {
        $id = $this->authManager->getIdFromToken($request, $this->getParameter('jwt_secret'));
        $etapasRealizadas = $this->userPathEtapaManager->getEtapasRealizadas($id, $request->get('camino'));
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
        if ($this->userPathManager->getActivePath($user->getId())) {
            return new JsonResponse(['message' => 'User already has an active path'], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        if ($this->userPathManager->pathExists($user->getId(), $parameters['camino'])) {
            return new JsonResponse(['message' => 'User already has this path'], Response::HTTP_UNPROCESSABLE_ENTITY);
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
        $this->userPathManager->archivePath($user->getId(), $parameters['camino']);
        return $this->json(['message' => 'success']);
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
        $this->userPathManager->finishPath($user->getId(), $parameters['camino'], $parameters['finish_date']);
        return $this->json(['message' => 'success']);
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
        if ($this->userPathManager->getActivePath($user->getId())) {
            return new JsonResponse(['message' => 'User already has an active path'], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $this->userPathManager->reactivatePath($user->getId(), $parameters['camino']);
        return $this->json(['message' => 'success']);
    }

    /**
     * @Route("/pri/addEtapa", name="addEtapa", methods={"POST"})
     */
    public function addEtapa(Request $request): Response {
        $parameters = json_decode($request->getContent(), true);
        $id = $this->authManager->getIdFromToken($request, $this->getParameter('jwt_secret'));

        $userPathEtapa = new CaminoEtapa();

        $form = $this->createForm(PathEtapaType::class, $userPathEtapa, ['csrf_protection' => false]);
        $form->submit($parameters);

        if (!$form->isSubmitted() || !$form->isValid()) {
            return new JsonResponse(['message' => 'incorrect data recived'], Response::HTTP_BAD_REQUEST);
        }
        $idCaminoEtapa = $this->userPathEtapaManager->checkCaminoEtapa($parameters['camino'], $parameters['etapa']);
        if (count($idCaminoEtapa) == 0) {
            return new JsonResponse(['message' => 'incorrect data recived'], Response::HTTP_BAD_REQUEST);
        }
        $this->userPathEtapaManager->addEtapa($id, $idCaminoEtapa[0]['id']);
        return $this->json(['message' => 'success']);
    }

    /**
     * @Route("/pri/csv_download", name="csv_download", methods={"GET"})
     */
    public function descargarCSV(): Response {

        $caminos = $this->pathsManager->getAll();

        $fp = fopen('php://output', 'w');
        foreach ($caminos as $camino) {
            $data = [$this->eliminar_acentos($camino['name']), $this->eliminar_acentos($camino['start']),
                $this->eliminar_acentos($camino['finish']), $camino['num_etapas'], $camino['km'], $this->eliminar_acentos($camino['description'])];
            fputcsv($fp, $data);
        }

        $response = new Response();
        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="GoodWayPilgrim_caminos.csv"');

        return $response;
    }

    public function eliminar_acentos($cadena) {
        //Reemplazamos la A y a
        $cadena = str_replace(
                array('Á', 'À', 'Â', 'Ä', 'á', 'à', 'ä', 'â', 'ª'),
                array('A', 'A', 'A', 'A', 'a', 'a', 'a', 'a', 'a'),
                $cadena
        );

        //Reemplazamos la E y e
        $cadena = str_replace(
                array('É', 'È', 'Ê', 'Ë', 'é', 'è', 'ë', 'ê'),
                array('E', 'E', 'E', 'E', 'e', 'e', 'e', 'e'),
                $cadena);

        //Reemplazamos la I y i
        $cadena = str_replace(
                array('Í', 'Ì', 'Ï', 'Î', 'í', 'ì', 'ï', 'î'),
                array('I', 'I', 'I', 'I', 'i', 'i', 'i', 'i'),
                $cadena);

        //Reemplazamos la O y o
        $cadena = str_replace(
                array('Ó', 'Ò', 'Ö', 'Ô', 'ó', 'ò', 'ö', 'ô'),
                array('O', 'O', 'O', 'O', 'o', 'o', 'o', 'o'),
                $cadena);

        //Reemplazamos la U y u
        $cadena = str_replace(
                array('Ú', 'Ù', 'Û', 'Ü', 'ú', 'ù', 'ü', 'û'),
                array('U', 'U', 'U', 'U', 'u', 'u', 'u', 'u'),
                $cadena);

        //Reemplazamos la N, n, C y c
        $cadena = str_replace(
                array('Ñ', 'ñ', 'Ç', 'ç'),
                array('N', 'n', 'C', 'c'),
                $cadena
        );

        return $cadena;
    }

}
