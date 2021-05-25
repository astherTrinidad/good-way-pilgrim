<?php

namespace App\Controller;

use App\Services\AuthManager;
use App\Services\MochilaManager;
use App\Services\UserPathManager;
use App\Entity\Mochila;
use App\Entity\UsuarioCamino;
use App\Form\UserPathType;
use App\Form\MochilaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class mochilaController extends AbstractController {

    private $mochilaManager;
    private $authManager;
    private $userPathManager;

    function __construct(MochilaManager $mochilaManager, AuthManager $authManager, UserPathManager $userPathManager) {
        $this->mochilaManager = $mochilaManager;
        $this->authManager = $authManager;
        $this->userPathManager = $userPathManager;
    }

    /**
     * @Route("/pri/MyBackpacks", name="MyBackpacks", methods={"GET"})
     */
    public function MyBackpacks(Request $request): Response {
        $id = $this->authManager->getIdFromToken($request, $this->getParameter('jwt_secret'));
        $backpacks = $this->mochilaManager->getMyBackpacks($id);
        return new JsonResponse($backpacks);
    }

    /**
     * @Route("/pri/InfoBackpack", name="InfoBackpack", methods={"GET"})
     */
    public function InfoBackpack(Request $request): Response {
        $id = $this->authManager->getIdFromToken($request, $this->getParameter('jwt_secret'));
        if (!$request->get('camino')) {
            return new JsonResponse(['message' => 'incorrect data recived'], Response::HTTP_BAD_REQUEST);
        }
        $objects = $this->mochilaManager->getInfoBackpack($id, $request->get('camino'));
        return new JsonResponse($objects);
    }

    /**
     * @Route("/pri/createBackpack", name="createBackpack", methods={"POST"})
     */
    public function createBackpack(Request $request): Response {
        $parameters = json_decode($request->getContent(), true);
        $user = $this->authManager->getUserFromToken($request, $this->getParameter('jwt_secret'));

        $userPath = new UsuarioCamino();
        $userPath->setUser($user);

        $form = $this->createForm(UserPathType::class, $userPath, ['csrf_protection' => false]);
        $form->submit($parameters);

        if (!$form->isSubmitted() || !$form->isValid()) {
            return new JsonResponse(['message' => 'incorrect data recived'], Response::HTTP_BAD_REQUEST);
        }
        if (!$this->userPathManager->pathExists($user->getId(), $parameters['camino'])) {
            return new JsonResponse(['message' => 'User hasnt got this path'], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        if ($this->mochilaManager->mochilaExists($user->getId(), $parameters['camino'])) {
            return new JsonResponse(['message' => 'User already has a backpack for this path'], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        return $this->json(['message' => 'success']);
    }

    /**
     * @Route("/pri/deleteBackpack", name="deleteBackpack", methods={"DELETE"})
     */
    public function deleteBackpack(Request $request): Response {
        $parameters = json_decode($request->getContent(), true);
        $id = $this->authManager->getIdFromToken($request, $this->getParameter('jwt_secret'));
        $this->mochilaManager->deleteBackpack($id, $parameters['camino']);
        return $this->json(['message' => 'success']);
    }

    /**
     * @Route("/pri/addItem", name="addItem", methods={"PUT"})
     */
    public function addItem(Request $request): Response {
        $parameters = json_decode($request->getContent(), true);
        $id = $this->authManager->getIdFromToken($request, $this->getParameter('jwt_secret'));
        $user = $this->authManager->getUserFromToken($request, $this->getParameter('jwt_secret'));

        $backpack = new Mochila();
        $backpack->setUser($user);

        $form = $this->createForm(MochilaType::class, $backpack, ['csrf_protection' => false]);
        $form->submit($parameters);

        if (!$form->isSubmitted() || !$form->isValid()) {
            return new JsonResponse(['message' => 'incorrect data recived'], Response::HTTP_BAD_REQUEST);
        }
        if ($this->mochilaManager->checkMaxItems($id, $parameters['camino'])) {
            return new JsonResponse(['message' => 'Full backpack'], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $this->mochilaManager->addItem($id, $parameters['camino'], ucwords(strtolower($parameters['object'])), $parameters['quantity']);
        return $this->json(['message' => 'success']);
    }

    /**
     * @Route("/pri/editItem", name="editItem", methods={"PUT"})
     */
    public function editItem(Request $request): Response {
        $parameters = json_decode($request->getContent(), true);
        $this->mochilaManager->editItem($parameters['id'], $parameters['object'], $parameters['quantity']);
        return $this->json(['message' => 'success']);
    }

    /**
     * @Route("/pri/deleteItem", name="deleteItem", methods={"DELETE"})
     */
    public function deleteItem(Request $request): Response {
        $parameters = json_decode($request->getContent(), true);
        $this->mochilaManager->deleteItem($parameters['id']);
        return $this->json(['message' => 'success']);
    }

}
