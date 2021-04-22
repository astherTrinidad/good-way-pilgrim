<?php

namespace App\Services;

use App\Repository\UsuarioRepository;
use App\Entity\Usuario;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserManager {
    private $encoder;
    private $userRepository;
    function __construct(UserPasswordEncoderInterface $encoder, UsuarioRepository $userRepository) {
        $this->encoder = $encoder;
        $this->userRepository = $userRepository;
    }

    function createUser($parameters) {
        $user = new Usuario();
        $user->setName(ucwords(strtolower($parameters['name'])));
        $user->setSurname(ucwords(strtolower($parameters['surname'])));
        $user->setPassword($this->encoder->encodePassword($user, $parameters['password']));
        $user->setEmail($parameters['email']);
        $user->setPicture("");
        return $user;
    }

    function emailExists($email) {
        return $this->userRepository->findOneBy([
                    'email' => $email,
        ]);
    }

}
