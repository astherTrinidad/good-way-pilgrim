<?php

namespace App\Security;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Guard\AbstractGuardAuthenticator;
use Firebase\JWT\JWT;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Repository\UsuarioRepository;

class IdentityAuthenticator extends AbstractGuardAuthenticator {

    private $em;
    private $params;
    private $userRepository;

    public function __construct(EntityManagerInterface $em, ContainerBagInterface $params, UsuarioRepository $userRepository) {
        $this->em = $em;
        $this->params = $params;
        $this->userRepository = $userRepository;
    }

    public function start(Request $request, AuthenticationException $authException = null) {
        $data = [
            'message' => 'Authentication Required'
        ];
        return new JsonResponse($data, Response::HTTP_UNAUTHORIZED);
    }

    public function supports(Request $request) {
        return $request->headers->has('Authorization');
    }

    public function getCredentials(Request $request) {
        $data = [
            'Authorization' => $request->headers->get('Authorization'),
            'id' => $request->get('id')
        ];
        return $data;
        //return $request->headers->get('Authorization');
    }

    public function getUser($credentials, UserProviderInterface $userProvider) {

        $id = $credentials['id'];
        $credentials = $credentials['Authorization'];

        $credentials = str_replace('Bearer ', '', $credentials);
        $jwt = (array) JWT::decode(
                        $credentials,
                        $this->params->get('jwt_secret'),
                        ['HS256']
        );
        $user = $this->userRepository->findOneBy([
            'email' => $jwt['email'],
        ]);

        if ($id == $user->getId()) {
            return $this->userRepository->findOneBy([
                        'email' => $jwt['email'],
            ]);
        } else {
            throw new AuthenticationException('Unauthorized');
        }
    }

    public function checkCredentials($credentials, UserInterface $user) {
        return true;
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception) {
        return new JsonResponse([
            'message' => $exception->getMessage()
                ], Response::HTTP_UNAUTHORIZED);
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $providerKey) {
        return;
    }

    public function supportsRememberMe() {
        return false;
    }

}
