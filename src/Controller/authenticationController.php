<?php

namespace App\Controller;

use App\Services\AuthManager;
use App\Services\UserManager;
use App\Services\UserPathManager;
use App\Services\AchievementManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Form\NewUsuarioType;
use App\Form\UsuarioType;
use App\Entity\Usuario;

class authenticationController extends AbstractController {

    private $userManager;
    private $authManager;
    private $userPathManager;
    private $achievementManager;

    function __construct(UserManager $userManager, AuthManager $authManager, UserPathManager $userPathManager, AchievementManager $achievementManager) {
        $this->userManager = $userManager;
        $this->authManager = $authManager;
        $this->userPathManager = $userPathManager;
        $this->achievementManager = $achievementManager;
    }

    /**
     * @Route("/pub/register", name="register", methods={"POST"})
     */
    public function register(Request $request) {
        $parameters = json_decode($request->getContent(), true);
        
        $form = $this->createForm(NewUsuarioType::class, new Usuario(), ['csrf_protection' => false]);
        $form->submit($parameters);
 
        if(!$form->isSubmitted() || !$form->isValid()) {               
            return new JsonResponse(['message' => 'incorrect data recived'], Response::HTTP_BAD_REQUEST);
        }
        
        $user = $this->userManager->createUser($parameters);
        if ($this->userManager->emailExists($parameters['email'])) {
            return new JsonResponse(['message' => 'email is already in database'], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        
        $this->userManager->saveUser($user);
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
        
        $form = $this->createForm(UsuarioType::class, new Usuario(), ['csrf_protection' => false]);
        $form->submit($parameters);
 
        if(!$form->isSubmitted() || !$form->isValid()) {               
            return new JsonResponse(['message' => 'incorrect data recived'], Response::HTTP_BAD_REQUEST);
        }      
        
        $user = $this->userManager->emailExists($parameters['email']);
        if (!$user || !$this->authManager->checkUserPassword($user, $parameters['password'])) {
            return new JsonResponse(['message' => 'email or password is wrong'], Response::HTTP_UNAUTHORIZED);
        }

        $jwt = $this->authManager->generateToken($user->getEmail(), $this->getParameter('jwt_secret'));
        return $this->json([
                    'message' => 'success',
                    'token' => $jwt,
        ]);
    }

    /**
     * @Route("/pri/showProfile", name="showProfile", methods={"GET"})
     */
    public function showProfile(Request $request) {
        $id = $this->authManager->getIdFromToken($request, $this->getParameter('jwt_secret'));
        $user = $this->userManager->getUser($id);
        $achievements = $this->achievementManager->getThreeByIdUser($id);
        $paths = $this->userPathManager->getHistory($id);         
        $km = $this->userPathManager->getKm($id);  
        $picture = $user->getPicture();
        if (strcmp($picture, "") !== 0) {
            $picture = CoverImageController::showImageUser($user->getPicture());
        }

        $data = [
            'name' => $user->getName(),
            'surname' => $user->getSurname(),
            'email' => $user->getEmail(),
            'picture' => $picture,
            'achievements' => $achievements,
            'paths' => count($paths),
            'km' => round($km, 1)
        ];

        return new JsonResponse($data);
    }

    /**
     * @Route("/pri/editProfile", name="editProfile", methods={"PUT"})
     */
    public function editProfile(Request $request) {
        $parameters = json_decode($request->getContent(), true);

        $id = $this->authManager->getIdFromToken($request, $this->getParameter('jwt_secret'));

        if (!$this->authManager->checkPasswordChange($this->userManager->getUser($id), $parameters['oldPassword'], $parameters['newPassword']) || !$this->authManager->checkUserPassword($this->userManager->getUser($id), $parameters['oldPassword'])
        ) {
            return new JsonResponse(['message' => 'Password is wrong'], Response::HTTP_UNAUTHORIZED);
        }

        $user = $this->userManager->createUser($parameters);
        $userEdited = $this->userManager->updateUser($id, $user);
        $picture = $userEdited->getPicture();
        if (strcmp($picture, "") !== 0) {
            $picture = CoverImageController::showImageUser($userEdited->getPicture());
        }
        return $this->json([
                    'id' => $userEdited->getId(),
                    'name' => $userEdited->getName(),
                    'surname' => $userEdited->getSurname(),
                    'email' => $userEdited->getEmail(),
                    'picture' => $picture
        ]);
    }

    /**
     * @Route("/pri/deleteProfile", name="deleteProfile", methods={"DELETE"})
     */
    public function deleteProfile(Request $request) {
        $idUser = $this->authManager->getIdFromToken($request, $this->getParameter('jwt_secret'));
        $this->userManager->deleteUser($idUser);
        return $this->json(['message' => 'success']);
    }



}
