<?php

namespace App\Controller;

use App\Entity\Usuario;
use App\Services\AuthManager;
use App\Services\UserManager;
use App\Repository\UsuarioRepository;
use App\Repository\LogroRepository;
use App\Repository\UsuarioCaminoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class authenticationController extends AbstractController {

    private $userManager;
    private $authManager;

    function __construct(UserManager $userManager, AuthManager $authManager) {
        $this->userManager = $userManager;
        $this->authManager = $authManager;
    }

    /**
     * @Route("/pub/register", name="register", methods={"POST"})
     */
    public function register(Request $request) {
        $parameters = json_decode($request->getContent(), true);
        $user = $this->userManager->createUser($parameters);

        if (!$this->authManager->validatePassword($parameters['password'])) {
            return new JsonResponse(['message' => 'password not valid'], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        if ($this->userManager->emailExists($parameters['email'])) {
            return new JsonResponse(['message' => 'email is already in database'], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();

        return $this->json([
                    'id' => $user->getId(),
                    'name' => $user->getName(),
                    'surname' => $user->getSurname(),
                    'email' => $user->getEmail(),
                    'picture' => $user->getPicture(),
        ]);
    }

    /**
     * @Route("/pub/login", name="login", methods={"POST"})
     */
    public function login(Request $request) {
        $parameters = json_decode($request->getContent(), true);
        $user = $this->userManager->emailExists($parameters['email']);

        if (!$user || !$this->authManager->checkUserPassword($user, $parameters['password'])) {
            return new JsonResponse(['message' => 'email or password is wrong'], Response::HTTP_UNAUTHORIZED);
        }
        $jwt = $this->authManager->generateToken($user->getEmail());
        return $this->json([
                    'message' => 'success',
                    'token' => $jwt,
        ]);
    }

    /**
     * @Route("/pri/me/showProfile", name="showProfile", methods={"GET"})
     */
    public function showProfile(Request $request, UsuarioRepository $userRepository) {
        $user = $userRepository->getOneById($request->get('id'));

        if (!$user) {
            $data = [
                'message' => 'user not in database'
            ];
            return new JsonResponse($data, Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return $this->json([
                    'id' => $user->getId(),
                    'name' => $user->getName(),
                    'surname' => $user->getSurname(),
                    'email' => $user->getEmail(),
                    'picture' => $user->getPicture(),
        ]);
    }

    /**
     * @Route("/pri/me/deleteProfile", name="deleteProfile", methods={"DELETE"})
     */
    public function deleteProfile(Request $request, UsuarioRepository $userRepository) {
        $parameters = json_decode($request->getContent(), true);
        $user = $this->userManager->userExists($parameters['id']);

        if (!$user) {
            return new JsonResponse(['message' => 'user not in database'], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $this->userManager->deleteUser($parameters['id']);
        return $this->json(['message' => 'success']);
    }

    /**
     * @Route("/editProfile", name="editProfile", methods={"PUT"})
     */
    public function editProfile(Request $request) {
        $parameters = json_decode($request->getContent(), true);
        $user = $this->userManager->userExists($parameters['id']);

        if (!$user) {
            return new JsonResponse(['message' => 'user not in database'], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        if (!$this->authManager->checkPasswordChange($user, $parameters['oldPassword'], $parameters['newPassword'])) {
            return new JsonResponse(['message' => 'Password is wrong'], Response::HTTP_UNAUTHORIZED);
        }

        $user = $this->userManager->createUser($parameters);

        if (isset($_FILES['photo'])) {
            $picture = base64_encode(addslashes(file_get_contents($_FILES['photo']['tmp_name'])));
            $user->setPicture($picture);
        }

        $this->userManager->updateUser($parameters['id'], $user);
        $userEdited = $this->userManager->userExists($parameters['id']);

        return $this->json([
                    'id' => $userEdited->getId(),
                    'name' => $userEdited->getName(),
                    'surname' => $userEdited->getSurname(),
                    'email' => $userEdited->getEmail(),
                    'picture' => $userEdited->getPicture()
        ]);
    }

    /**
     * @Route("/pri/showUsers", name="showUsers", methods={"GET"})
     */
    public function showUsers(Request $request, UsuarioRepository $userRepository) {
        $searchString = $request->get('string');
        $matchUsers = $userRepository->getByString($searchString);

        if (empty($matchUsers)) {
            $data = [
                'message' => 'no results found'
            ];
            return new JsonResponse($data, Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return new JsonResponse($matchUsers);
    }

    /**
     * @Route("/showOtherProfile", name="showOtherProfile", methods={"GET"})
     */
    public function showOtherProfile(Request $request, UsuarioRepository $userRepository, LogroRepository $achievementRepository, UsuarioCaminoRepository $userPathRepository) {
        $user = $userRepository->getOneById($request->get('id'));
        $achievements = $achievementRepository->getThreeById($request->get('id'));
        $paths = $userPathRepository->getAllById($request->get('id'));
        $activePath = $userPathRepository->getActivePath($request->get('id'));

        $data = [
            'id' => $user->getId(),
            'name' => $user->getName(),
            'surname' => $user->getSurname(),
            'email' => $user->getEmail(),
            'picture' => $user->getPicture(),
            'achievements' => $achievements,
            'paths' => $paths,
            'activePath' => $activePath
        ];

        return new JsonResponse($data);
    }

}
