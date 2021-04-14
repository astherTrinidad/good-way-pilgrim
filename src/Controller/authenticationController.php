<?php

namespace App\Controller;

use App\Entity\Usuario;
use App\Entity\Camino;
use App\Repository\UsuarioRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Firebase\JWT\JWT;
use Symfony\Component\HttpFoundation\Response;

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
        $user->setPass($encoder->encodePassword($user, $password));
        $user->setEmail($email);

        if (!$this->isPartLowercase($password) || !$this->isPartUppercase($password) || strlen($password) < 8) {
            http_response_code(422);
            return $this->json([
                        'code' => http_response_code(),
                        'message' => 'password not valid',
            ]);
        }

        if ($this->emailExists($email, $userRepository)) {
            http_response_code(422);
            return $this->json([
                        'code' => http_response_code(),
                        'message' => 'email is already in database',
            ]);
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
//        $user = $userRepository->findOneBy([
//                'email'=>$request->get('email'),
//        ]);
        if (!$user || !$encoder->isPasswordValid($user, $request->get('password'))) {
            http_response_code(422);
            return $this->json([
                        'code' => http_response_code(),
                        'message' => 'email or password is wrong',
            ]);
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
     * @Route("/pri/showProfile", name="showProfile", methods={"GET"})
     */
    public function showProfile(Request $request, UsuarioRepository $userRepository) {
        $user = $userRepository->getOneById($request->get('id'));
        if ($user) {
            return $this->json([
                        'id' => $user->getId(),
                        'name' => $user->getName(),
                        'surname' => $user->getSurname(),
                        'email' => $user->getEmail(),
                        'password' => $user->getPassword(),
            ]);
        } else {
            http_response_code(422);
            return $this->json([
                        'code' => http_response_code(),
                        'message' => 'user not in database'
            ]);
        }
    }

    /**
     * @Route("/pri/deleteUser", name="deleteUser", methods={"DELTE"})
     */
    public function deleteProfile(Request $request, UsuarioRepository $userRepository) {
        $userRepository->deleteOneById($request->get('id'));
        return $this->json([
                    'message' => 'success']);
    }

    /**
     * @Route("/pub/editProfile", name="editProfile", methods={"PUT"})
     */
    public function editProfile(Request $request, UsuarioRepository $userRepository, UserPasswordEncoderInterface $encoder) {
        //$picture = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
        $id = $request->get('id');
        $name = $request->get('name');
        $surname = $request->get('surname');
        $email = $request->get('email');
        $password = $request->get('password');        
        $user = new Usuario();
        //$user->setPicture($picture);
        $user->setName($name);
        $user->setSurname($surname);
        $user->setPass($encoder->encodePassword($user, $password));
        $user->setEmail($email);       
        $userRepository->updateOneById($id, $user);
        $userEdited = $userRepository->getOneById($id);

        return $this->json([
                    'id' => $userEdited->getId(),
                    'name' => $userEdited->getName(),
                    'surname' => $userEdited->getSurname(),
                    'email' => $userEdited->getEmail(),
        ]);
    }
    

    /**
     * @Route("/pri/showUsers", name="showUsers", methods={"GET"})
     */
    public function showUsers(Request $request, UsuarioRepository $userRepository) {
        
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
     * @Route("/pri/descargar_csv", name="descargar_csv", methods={"GET"})
     */
    public function descargarCSV(): Response {

        $caminos = $this->getDoctrine()
                ->getRepository(Camino::class)
                ->findAll();

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
