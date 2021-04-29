<?php

namespace App\Services;

use App\Repository\UsuarioRepository;
use App\Entity\Usuario;
use App\Controller\CoverImageController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\ORM\EntityManagerInterface;


class UserManager
{

    private $encoder;
    private $userRepository;
    private $em;

    function __construct(UserPasswordEncoderInterface $encoder, UsuarioRepository $userRepository, EntityManagerInterface $em)
    {
        $this->encoder = $encoder;
        $this->userRepository = $userRepository;
        $this->em = $em;
    }

    public function createUser($parameters)
    {
        $user = new Usuario();
        $user->setName(ucwords(strtolower($parameters['name'])));
        $user->setSurname(ucwords(strtolower($parameters['surname'])));
        if (isset($parameters['password'])) {
            $user->setPassword($this->encoder->encodePassword($user, $parameters['password']));
        }
        if (isset($parameters['newPassword'])) {
            if (strcmp($parameters['newPassword'], "") != 0) {
                $user->setPassword($this->encoder->encodePassword($user, $parameters['newPassword']));
            }
        }

        if (isset($parameters['picture'])) {
            $user->setPicture(CoverImageController::saveImageUser($parameters['picture']));
        } else {
            $user->setPicture("");
        }

        $user->setEmail($parameters['email']);

        return $user;
    }
    
    public function saveUser($user)
    {
        $this->em->persist($user);
        $this->em->flush();
    }

    public function getUser($id)
    {
        return $this->userRepository->findOneBy([
            'id' => $id,
        ]);
    }

    public function emailExists($email)
    {
        return $this->userRepository->findOneBy([
            'email' => $email,
        ]);
    }

    public function deleteUser($id)
    {

        return $this->userRepository->deleteOneById($id);
    }

    public function updateUser($id, $user)
    {
        return $this->userRepository->updateOneById($id, $user);
    }

    public function getUsersByString($searchString)
    {
        return $this->userRepository->getByString($searchString);
    }

    public function getOneByIdUser($userId)
    {
        return $this->userRepository->getOneById($userId);
    }

    public function getPictureUser($userId)
    {
        return $this->userRepository->getPicture($userId);
    }
}
