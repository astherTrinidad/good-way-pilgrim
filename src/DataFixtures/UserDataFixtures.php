<?php

namespace App\DataFixtures;

use App\Entity\Usuario;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserDataFixtures extends Fixture
//Incluir encoder como atributo
{
    public const USUARIO = "user-";

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    public function load(ObjectManager $manager)
    {
        //meter usuarios        
        $user = new Usuario();
        $user->setName("Patricia");
        $user->setSurname("Herranz Maeso");
        $user->setEmail("phmaeso10@gmail.com");
        $user->setPassword($this->encoder->encodePassword($user, "passPatricia"));
        $user->setPicture(UserDataFixtures::uploadImage("patri.jpg"));
        $manager->persist($user);
        $manager->flush();
        $this->setReference(self::USUARIO . 1, $user);

        $user1 = new Usuario();
        $user1->setName("Irene");
        $user1->setSurname("Sánchez");
        $user1->setEmail("irene.sanchez@hotmail.com");
        $user1->setPassword($this->encoder->encodePassword($user, "passIrene"));
        $user1->setPicture(UserDataFixtures::uploadImage("irene.jpg"));
        $manager->persist($user1);
        $manager->flush();
        $this->setReference(self::USUARIO . 2, $user1);

        $user2 = new Usuario();
        $user2->setName("Asther");
        $user2->setSurname("Trinidad Mora");
        $user2->setEmail("asthercita@gmail.com");
        $user2->setPassword($this->encoder->encodePassword($user, "passAsther"));
        $user2->setPicture(UserDataFixtures::uploadImage("asther.jpg"));
        $manager->persist($user2);
        $manager->flush();
        $this->setReference(self::USUARIO . 3, $user2);

        $user3 = new Usuario();
        $user3->setName("Sara");
        $user3->setSurname("Ardila");
        $user3->setEmail("ardila@hotmail.com");
        $user3->setPassword($this->encoder->encodePassword($user, "passSara"));
        $user3->setPicture(UserDataFixtures::uploadImage("sara.jpg"));
        $manager->persist($user3);
        $manager->flush();
        $this->setReference(self::USUARIO . 4, $user3);

        $user4 = new Usuario();
        $user4->setName("Javi");
        $user4->setSurname("Carrillo");
        $user4->setEmail("javichu@gmail.com");
        $user4->setPassword($this->encoder->encodePassword($user, "passJavi"));
        $user4->setPicture(UserDataFixtures::uploadImage("javi.jpg"));
        $manager->persist($user4);
        $manager->flush();
        $this->setReference(self::USUARIO . 5, $user4);
    }

    public static function uploadImage($Image)
    {
        $url = 'Image/' . $Image;

        return $url;
    }
}
