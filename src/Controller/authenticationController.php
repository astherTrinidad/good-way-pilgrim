<?php

namespace App\Controller;

use App\Entity\Usuario;
use App\Repository\UsuarioRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Firebase\JWT\JWT;
//use Symfony\Component\HttpFoundation\Response;

class authenticationController extends AbstractController {

    /**
     * @Route("/auth/register", name="register", methods={"POST"})
     */
    public function register(Request $request, UserPasswordEncoderInterface $encoder) {
        $name = $request->get('name');
        $surname = $request->get('surname');
        $email = $request->get('email');
        $password = $request->get('password');
        $user = new Usuario();
        $user->setName($name);
        $user->setSurname($surname);
        $user->setPass($encoder->encodePassword($user, $password));
        $user->setEmail($email);
        $em = $this->getDoctrine()->getManager();
        try {
            $em->persist($user);
            $em->flush();
        } catch (Exception $ex) {
            return 'error';
        }
        return $this->json([
                    'id' => $user->getId(),
                    'name' => $user->getName(),
                    'surname' => $user->getSurname(),
                    'email' => $user->getEmail(),
                    'password' => $user->getPassword(),
        ]);
        //return new Response(json_encode($user));
    }

    /**
     * @Route("/auth/login", name="login", methods={"POST"})
     */
    public function login(Request $request, UsuarioRepository $userRepository, UserPasswordEncoderInterface $encoder) {

        $user = $userRepository->getOneByEmail($request->get('email'));
//        $user = $userRepository->findOneBy([
//                'email'=>$request->get('email'),
//        ]);
        if (!$user || !$encoder->isPasswordValid($user, $request->get('password'))) {
            return $this->json([
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
     * @Route("/auth/showProfile", name="showProfile", methods={"GET"})
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
        }else{
            return $this->json([
                    'message' => 'error'
        ]);
        }
    }

    /**
     * @Route("/auth/deleteUser", name="deleteUser", methods={"DELTE"})
     */
    public function deleteProfile(Request $request, UsuarioRepository $userRepository) {
        $userRepository->deleteOneById($request->get('id'));
        return $this->json([
                    'message' => 'success']);
    }

    /**
     * @Route("/auth/editProfile", name="editProfile", methods={"PUT"})
     */
    public function editProfile(Request $request, UsuarioRepository $userRepository)  {
        $id = $request->get('id');
        $name = $request->get('name');
        $surname = $request->get('surname');
        $email = $request->get('email');
        $password = $request->get('password');
        $user = new Usuario();
        $user->setName($name);
        $user->setSurname($surname);
        $user->setPass($encoder->encodePassword($user, $password));
        $user->setEmail($email);
        
        
        return $this->json([
                    'id' => $user->getId(),
                    'name' => $user->getName(),
                    'surname' => $user->getSurname(),
                    'email' => $user->getEmail(),
                    'password' => $user->getPassword(),
        ]); 
    }

    /**
     * @Route("/auth/showUsers", name="showUsers", methods={"GET"})
     */
    public function showUsers(Request $request, UsuarioRepository $userRepository) {
       
    }
    
    /**
     * @Route("/api/test", name="testapi")
     */
    public function test() {
        return $this->json([
                    'message' => 'test!',
        ]);
    }

}
