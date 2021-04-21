<?php

namespace App\Controller;

use App\Entity\Usuario;
use App\Entity\Camino;
use App\Repository\CaminoRepository;
use App\Repository\UsuarioRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Firebase\JWT\JWT;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class authenticationController extends AbstractController
{

    /**
     * @Route("/pub/register", name="register", methods={"POST"})
     */
    public function register(Request $request, UserPasswordEncoderInterface $encoder, UsuarioRepository $userRepository)
    {
        $parameters = json_decode($request->getContent(), true);

        $name = ucwords(strtolower($parameters['name']));
        $surname = ucwords(strtolower($parameters['surname']));
        $email = $parameters['email'];
        $password = $parameters['password'];
        $user = new Usuario();
        $user->setName($name);
        $user->setSurname($surname);
        $user->setPassword($encoder->encodePassword($user, $password));
        $user->setEmail($email);
        $user->setPicture("");

        if (!$this->isPartLowercase($password) || !$this->isPartUppercase($password) || strlen($password) < 8) {
            $data = [
                'message' => 'password not valid'
            ];
            return new JsonResponse($data, Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        if ($this->emailExists($email, $userRepository)) {
            $data = [
                'message' => 'email is already in database'
            ];
            return new JsonResponse($data, Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();

        return $this->json([
            'id' => $user->getId(),
            'name' => $user->getName(),
            'surname' => $user->getSurname(),
            'email' => $user->getEmail(),
        ]);
        //return new Response(json_encode($user));
    }

    /**
     * @Route("/pub/login", name="login", methods={"POST"})
     */
    public function login(Request $request, UsuarioRepository $userRepository, UserPasswordEncoderInterface $encoder)
    {
        $parameters = json_decode($request->getContent(), true);
        $user = $userRepository->getOneByEmail($parameters['email']);

        //Claúsula de guarda
        if (!$user || !$encoder->isPasswordValid($user, $parameters['password'])) {
            $data = [
                'message' => 'email or password is wrong'
            ];
            return new JsonResponse($data, Response::HTTP_UNAUTHORIZED);
        }
        $payload = [
            "email" => $user->getEmail(),
            "exp" => (new \DateTime())->modify("+60 minutes")->getTimestamp(),
        ];

        $jwt = JWT::encode($payload, $this->getParameter('jwt_secret'), 'HS256');
        return $this->json([
            'message' => 'success',
            'token' => $jwt,
        ]);
    }

    /**
     * @Route("/pri/me/showProfile", name="showProfile", methods={"GET"})
     */
    public function showProfile(Request $request, UsuarioRepository $userRepository)
    {
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
    public function deleteProfile(Request $request, UsuarioRepository $userRepository)
    {
        $parameters = json_decode($request->getContent(), true);
        $user = $userRepository->getOneByID($parameters['id']);

        if (!$user) {
            $data = [
                'message' => 'user not in database'
            ];
            return new JsonResponse($data, Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $userRepository->deleteOneById($parameters['id']);
        return $this->json([
            'message' => 'success'
        ]);
    }

    /**
     * @Route("/pri/me/editProfile", name="editProfile", methods={"PUT"})
     */
    public function editProfile(Request $request, UsuarioRepository $userRepository, UserPasswordEncoderInterface $encoder)
    {
        $parameters = json_decode($request->getContent(), true);
        $user = $userRepository->getOneByID($parameters['id']);

        if (!$user) {
            $data = [
                'message' => 'user not in database'
            ];
            return new JsonResponse($data, Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $newPassword = $parameters['newPassword'];
        $passwordChange = false;
        if (strcmp($newPassword, "") != 0) {
            if (!$encoder->isPasswordValid($user, $parameters['oldPassword'])) {
                $data = [
                    'message' => 'password is wrong'
                ];
                return new JsonResponse($data, Response::HTTP_UNAUTHORIZED);
            }
            $passwordChange = true;
        }

        $id = $parameters['id'];

        $user = new Usuario();
        $user->setName(ucwords(strtolower($parameters['name'])));
        $user->setSurname(ucwords(strtolower($parameters['surname'])));
        $user->setEmail($parameters['email']);

        if ($passwordChange) {
            $user->setPassword($encoder->encodePassword($user, $newPassword));
        }

        if (isset($_FILES['photo'])) {
            $picture = base64_encode(addslashes(file_get_contents($_FILES['photo']['tmp_name'])));
            $user->setPicture($picture);
        }

        $userRepository->updateOneById($id, $user);
        $userEdited = $userRepository->getOneByID($parameters['id']);

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
    public function showUsers(Request $request, UsuarioRepository $userRepository)
    {
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



    function isPartUppercase($string)
    {
        return (bool) preg_match('/[A-Z]/', $string);
    }

    function isPartLowercase($string)
    {
        return (bool) preg_match('/[a-z]/', $string);
    }

    function emailExists($email, $userRepository)
    {
        return $userRepository->findOneBy([
            'email' => $email,
        ]);
    }
}
