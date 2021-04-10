<?php
namespace App\Controller;
use App\Entity\Usuario;
use App\Repository\UsuarioRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class authenticationController extends AbstractController
{

    /**
     * @Route("/auth/register", name="register", methods={"POST"})
     */
    public function register(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $name = $request->get('name');
        $surname = $request->get('surname');
        $dni = $request->get('dni');
        $email = $request->get('email');
        $password = $request->get('password');
        $user = new Usuario();
        $user->setNombre($name);
        $user->setApellido($surname);
        $user->setDni($dni);
        //$user->setPass($password);
        $user->setPass($encoder->encodePassword($user, $password));
        $user->setEmail($email);
        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();
        return $this->json([
            'user' => $user->getEmail()
        ]);
    }
    
    /**
 * @Route("/auth/login", name="login", methods={"POST"})
 */
public function login(Request $request, UsuarioRepository $userRepository, UserPasswordEncoderInterface $encoder){

        $user = $userRepository->getOneByEmail($request->get('email'));
//        $user = $userRepository->findOneBy([
//                'email'=>$request->get('email'),
//        ]);
        if (!$user || !$encoder->isPasswordValid($user, $request->get('password'))) {
                return $this->json([
                    'message' => 'email or password is wrong.',
                ]);
        }
       $payload = [
           "user" => $user->getUsername(),
           "exp"  => (new \DateTime())->modify("+5 minutes")->getTimestamp(),
       ];


        $jwt = JWT::encode($payload, $this->getParameter('jwt_secret'), 'HS256');
        return $this->json([
            'message' => 'success!',
            'token' => sprintf('Bearer %s', $jwt),
        ]);
}

}


