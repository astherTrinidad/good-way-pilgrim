<?php

namespace App\DataFixtures;

use App\Entity\Usuario;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserDataFixtures extends Fixture
//Incluir encoder como atributo
{    
    public function load(ObjectManager $manager)
    {
        
        //, UserPasswordEncoderInterface $encoder
        //meter usuarios        
        $user = new Usuario();       
        $user->setName("Patricia");
        $user->setSurname("Herranz Maeso");
        $user->setEmail("phmaeso2@gmail.com");
        $user->setPass($encoder->encodePassword($user, "passPatricia"));  
        $manager->persist($user);
        $manager->flush();
//
//        $user1 = new Usuario();       
//        $user1->setName("Irene");
//        $user1->setSurname("Sánchez");
//        $user1->setEmail("irene.sanchez@hotmail.com");
//        $user1->setPass("passIrene");  
//        $manager->persist($user1);
//        $manager->flush();
//
//        $user2 = new Usuario();       
//        $user2->setName("Asther");
//        $user2->setSurname("Trinidad Mora");
//        $user2->setEmail("asthercita@gmail.com");
//        $user2->setPass("passAsther");  
//        $manager->persist($user2);
//        $manager->flush();
//
//        $user3 = new Usuario();       
//        $user3->setName("Sara");
//        $user3->setSurname("Ardila");
//        $user3->setEmail("ardila@hotmail.com");
//        $user3->setPass("passSara");  
//        $manager->persist($user3);
//        $manager->flush();
//
//        $user4 = new Usuario();       
//        $user4->setName("Javi");
//        $user4->setSurname("Carrillo");
//        $user4->setEmail("javichu@gmail.com");
//        $user4->setPass("passJavi");  
//        $manager->persist($user4);
//        $manager->flush();  
               
    }
}

