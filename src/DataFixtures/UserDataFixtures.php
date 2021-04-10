<?php

namespace App\DataFixtures;

use App\Entity\Usuario;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    $id=1;

    public function load(ObjectManager $user)
    {
        //meter usuarios
        $user = new $Usuario();
        $user->$id++;
        $user->setDni(70073677Z);
        $user->setNombre('Patricia');
        $user->setApellido('Herranz Maeso');
        $user->setEmail('phmaeso@gmail.com');
        $user->setPass('pass');


        //subir usuarios
        $user->flush();
    }
}

