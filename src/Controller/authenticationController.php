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

class authenticationController extends AbstractController {

    /**
     * @Route("/pub/register", name="register", methods={"POST"})
     */
    public function register(Request $request, UserPasswordEncoderInterface $encoder, UsuarioRepository $userRepository) {
        $name = ucwords(strtolower($request->get('name')));
        $surname = ucwords(strtolower($request->get('surname')));
        $email = $request->get('email');
        $password = $request->get('password');
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
    public function login(Request $request, UsuarioRepository $userRepository, UserPasswordEncoderInterface $encoder) {

        $user = $userRepository->getOneByEmail($request->get('email'));

        //Claúsula de guarda
        if (!$user || !$encoder->isPasswordValid($user, $request->get('password'))) {
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
                    'token' => sprintf('Bearer %s', $jwt),
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
     * @Route("/pri/me/deleteUser", name="deleteUser", methods={"DELETE"})
     */
    public function deleteProfile(Request $request, UsuarioRepository $userRepository) {

        $user = $userRepository->getOneByID($request->get('id'));

        if (!$user) {
            $data = [
                'message' => 'user not in database'
            ];
            return new JsonResponse($data, Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $userRepository->deleteOneById($request->get('id'));
        return $this->json([
                    'message' => 'success']);
    }

    /**
     * @Route("/pri/me/editProfile", name="editProfile", methods={"PUT"})
     */
    public function editProfile(Request $request, UsuarioRepository $userRepository, UserPasswordEncoderInterface $encoder) {

        $user = $userRepository->getOneByID($request->get('id'));

        if (!$user) {
            $data = [
                'message' => 'user not in database'
            ];
            return new JsonResponse($data, Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $id = $request->get('id');
        $name = ucwords(strtolower($request->get('name')));
        $surname = ucwords(strtolower($request->get('surname')));
        $email = $request->get('email');
        $password = $request->get('password');

        $user = new Usuario();
        $user->setName($name);
        $user->setSurname($surname);
        $user->setPassword($encoder->encodePassword($user, $password));
        $user->setEmail($email);

        if (isset($_FILES['photo'])) {
            $picture = base64_encode(addslashes(file_get_contents($_FILES['photo']['tmp_name'])));
            $user->setPicture($picture);
        }

        $userRepository->updateOneById($id, $user);
        $userEdited = $userRepository->getOneById($id);

        return $this->json([
                    'id' => $userEdited->getId(),
                    'name' => $userEdited->getName(),
                    'surname' => $userEdited->getSurname(),
                    'email' => $userEdited->getEmail(),
                    'picture' => $userEdited->getPicture()
        ]);
    }

    /**
     * @Route("/pub/showUsers", name="showUsers", methods={"GET"})
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
     * @Route("/pri/test", name="testapi")
     */
    public function test() {
        return $this->json([
                    'message' => 'test!',
        ]);
    }

    function isPartUppercase($string) {
        return (bool) preg_match('/[A-Z]/', $string);
    }

    function isPartLowercase($string) {
        return (bool) preg_match('/[a-z]/', $string);
    }

    function emailExists($email, $userRepository) {
        return $userRepository->findOneBy([
                    'email' => $email,
        ]);
    }

    /**
     * @Route("/pub/csv_download", name="csv_download", methods={"GET"})
     */
    public function descargarCSV(CaminoRepository $caminoRepository): Response {

        $caminos = $caminoRepository->getAll();

        $fp = fopen('php://output', 'w');

        foreach ($caminos as $camino) {
            $data = [utf8_decode($camino->getName()), utf8_decode($camino->getStart()), utf8_decode($camino->getFinish()), $camino->getNumEtapas(), $camino->getKm(), utf8_decode($camino->getDescription())];
            fputcsv($fp, $data);
        }

        $response = new Response();
        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="caminos.csv"');

        return $response;
    }

}
