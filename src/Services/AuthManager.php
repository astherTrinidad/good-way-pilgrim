<?php

namespace App\Services;

use App\Repository\UsuarioRepository;
use Symfony\Component\HttpFoundation\Request;
use Firebase\JWT\JWT;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AuthManager {

    private $encoder;
    private $userRepository;

    function __construct(UserPasswordEncoderInterface $encoder, UsuarioRepository $userRepository) {
        $this->encoder = $encoder;
        $this->userRepository = $userRepository;
    }

    public function validatePassword($password) {
        if (!$this->isPartLowercase($password) || !$this->isPartUppercase($password) || strlen($password) < 8) {
            return false;
        }
        return true;
    }

    public function checkUserPassword($user, $password) {
        if (!$this->encoder->isPasswordValid($user, $password)) {
            return false;
        }
        return true;
    }

    public function generateToken($email, $key) {
        $payload = [
            "email" => $email,
            "exp" => (new \DateTime())->modify("+60 minutes")->getTimestamp(),
        ];
        return JWT::encode($payload, $key, 'HS256');
    }

    public function checkPasswordChange($user, $password, $newPassword) {
        if (strcmp($newPassword, "") != 0) {
            if (!$this->encoder->isPasswordValid($user, $password)) {
                return false;
            }
            return true;
        }
        return true;
    }

    public function getIdFromToken(Request $request, $key) {
        $token = $request->headers->get('Authorization');
        $credentials = str_replace('Bearer ', '', $token);
        $jwt = (array) JWT::decode($credentials,$key,['HS256']);
        $user = $this->userRepository->findOneBy([
            'email' => $jwt['email'],
        ]);
        return $user->getId();
    }

    public function getUserFromToken(Request $request, $key) {
        $token = $request->headers->get('Authorization');
        $credentials = str_replace('Bearer ', '', $token);
        $jwt = (array) JWT::decode($credentials,$key,['HS256']);
        $user = $this->userRepository->findOneBy([
            'email' => $jwt['email'],
        ]);
        return $user;
    }
    
    function isPartUppercase($string) {
        return (bool) preg_match('/[A-Z]/', $string);
    }

    function isPartLowercase($string) {
        return (bool) preg_match('/[a-z]/', $string);
    }

}
