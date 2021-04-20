<?php

namespace App\DataFixtures;

use App\Entity\Mochila;
use App\DataFixtures\UserDataFixtures;
use App\DataFixtures\CaminoDataFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class MochilaDataFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        //patricia no tiene camino por lo tanto no mochila
        //Irene mochila frances
        $backpacks = new Mochila();
        $backpacks->setObject("pantalón");
        $backpacks->setQuantity(2);
        $backpacks->setUser($this->getReference(UserDataFixtures::USUARIO . 2));
        $backpacks->setCamino($this->getReference(CaminoDataFixtures::CAMINO . 1));
        $manager->persist($backpacks);
        $manager->flush();

        $backpacks1 = new Mochila();
        $backpacks1->setObject("jersey");
        $backpacks1->setQuantity(1);
        $backpacks1->setUser($this->getReference(UserDataFixtures::USUARIO . 2));
        $backpacks1->setCamino($this->getReference(CaminoDataFixtures::CAMINO . 1));
        $manager->persist($backpacks1);
        $manager->flush();

        $backpacks2 = new Mochila();
        $backpacks2->setObject("camiseta");
        $backpacks2->setQuantity(5);
        $backpacks2->setUser($this->getReference(UserDataFixtures::USUARIO . 2));
        $backpacks2->setCamino($this->getReference(CaminoDataFixtures::CAMINO . 1));
        $manager->persist($backpacks2);
        $manager->flush();

        $backpacks3 = new Mochila();
        $backpacks3->setObject("botas");
        $backpacks3->setQuantity(1);
        $backpacks3->setUser($this->getReference(UserDataFixtures::USUARIO . 2));
        $backpacks3->setCamino($this->getReference(CaminoDataFixtures::CAMINO . 1));
        $manager->persist($backpacks3);
        $manager->flush();

        $backpacks4 = new Mochila();
        $backpacks4->setObject("calcetines");
        $backpacks4->setQuantity(5);
        $backpacks4->setUser($this->getReference(UserDataFixtures::USUARIO . 2));
        $backpacks4->setCamino($this->getReference(CaminoDataFixtures::CAMINO . 1));
        $manager->persist($backpacks4);
        $manager->flush();

        $backpacks5 = new Mochila();
        $backpacks5->setObject("pantalón");
        $backpacks5->setQuantity(2);
        $backpacks5->setUser($this->getReference(UserDataFixtures::USUARIO . 2));
        $backpacks5->setCamino($this->getReference(CaminoDataFixtures::CAMINO . 1));
        $manager->persist($backpacks5);
        $manager->flush();

        //Irene mochila primitivo
        $backpacks6 = new Mochila();
        $backpacks6->setObject("chanclas");
        $backpacks6->setQuantity(1);
        $backpacks6->setUser($this->getReference(UserDataFixtures::USUARIO . 2));
        $backpacks6->setCamino($this->getReference(CaminoDataFixtures::CAMINO . 2));
        $manager->persist($backpacks6);
        $manager->flush();

        $backpacks7 = new Mochila();
        $backpacks7->setObject("patalón");
        $backpacks7->setQuantity(2);
        $backpacks7->setUser($this->getReference(UserDataFixtures::USUARIO . 2));
        $backpacks7->setCamino($this->getReference(CaminoDataFixtures::CAMINO . 2));
        $manager->persist($backpacks7);
        $manager->flush();

        $backpacks8 = new Mochila();
        $backpacks8->setObject("chubasquero");
        $backpacks8->setQuantity(1);
        $backpacks8->setUser($this->getReference(UserDataFixtures::USUARIO . 2));
        $backpacks8->setCamino($this->getReference(CaminoDataFixtures::CAMINO . 2));
        $manager->persist($backpacks8);
        $manager->flush();

        $backpacks9 = new Mochila();
        $backpacks9->setObject("calcetines");
        $backpacks9->setQuantity(5);
        $backpacks9->setUser($this->getReference(UserDataFixtures::USUARIO . 2));
        $backpacks9->setCamino($this->getReference(CaminoDataFixtures::CAMINO . 2));
        $manager->persist($backpacks9);
        $manager->flush();


        //Asther mochila primitivo
        $backpacks10 = new Mochila();
        $backpacks10->setObject("pantalón");
        $backpacks10->setQuantity(2);
        $backpacks10->setUser($this->getReference(UserDataFixtures::USUARIO . 3));
        $backpacks10->setCamino($this->getReference(CaminoDataFixtures::CAMINO . 2));
        $manager->persist($backpacks10);
        $manager->flush();

        $backpacks11 = new Mochila();
        $backpacks11->setObject("jersey");
        $backpacks11->setQuantity(1);
        $backpacks11->setUser($this->getReference(UserDataFixtures::USUARIO . 3));
        $backpacks11->setCamino($this->getReference(CaminoDataFixtures::CAMINO . 2));
        $manager->persist($backpacks11);
        $manager->flush();

        $backpacks12 = new Mochila();
        $backpacks12->setObject("camiseta");
        $backpacks12->setQuantity(5);
        $backpacks12->setUser($this->getReference(UserDataFixtures::USUARIO . 3));
        $backpacks12->setCamino($this->getReference(CaminoDataFixtures::CAMINO . 2));
        $manager->persist($backpacks12);
        $manager->flush();

        $backpacks13 = new Mochila();
        $backpacks13->setObject("botas");
        $backpacks13->setQuantity(1);
        $backpacks13->setUser($this->getReference(UserDataFixtures::USUARIO . 3));
        $backpacks13->setCamino($this->getReference(CaminoDataFixtures::CAMINO . 2));
        $manager->persist($backpacks13);
        $manager->flush();

        $backpacks14 = new Mochila();
        $backpacks14->setObject("calcetines");
        $backpacks14->setQuantity(5);
        $backpacks14->setUser($this->getReference(UserDataFixtures::USUARIO . 3));
        $backpacks14->setCamino($this->getReference(CaminoDataFixtures::CAMINO . 2));
        $manager->persist($backpacks14);
        $manager->flush();

        //Sara mochila frances
        $backpacks15 = new Mochila();
        $backpacks15->setObject("pantalón");
        $backpacks15->setQuantity(2);
        $backpacks15->setUser($this->getReference(UserDataFixtures::USUARIO . 4));
        $backpacks15->setCamino($this->getReference(CaminoDataFixtures::CAMINO . 1));
        $manager->persist($backpacks15);
        $manager->flush();

        $backpacks16 = new Mochila();
        $backpacks16->setObject("jersey");
        $backpacks16->setQuantity(1);
        $backpacks16->setUser($this->getReference(UserDataFixtures::USUARIO . 4));
        $backpacks16->setCamino($this->getReference(CaminoDataFixtures::CAMINO . 1));
        $manager->persist($backpacks16);
        $manager->flush();

        $backpacks17 = new Mochila();
        $backpacks17->setObject("camiseta");
        $backpacks17->setQuantity(5);
        $backpacks17->setUser($this->getReference(UserDataFixtures::USUARIO . 4));
        $backpacks17->setCamino($this->getReference(CaminoDataFixtures::CAMINO . 1));
        $manager->persist($backpacks17);
        $manager->flush();

        //Javi mochila frances
        $backpacks18 = new Mochila();
        $backpacks18->setObject("chanclas");
        $backpacks18->setQuantity(3);
        $backpacks18->setUser($this->getReference(UserDataFixtures::USUARIO . 5));
        $backpacks18->setCamino($this->getReference(CaminoDataFixtures::CAMINO . 1));
        $manager->persist($backpacks18);
        $manager->flush();

        $backpacks19 = new Mochila();
        $backpacks19->setObject("patalón");
        $backpacks19->setQuantity(1);
        $backpacks19->setUser($this->getReference(UserDataFixtures::USUARIO . 5));
        $backpacks19->setCamino($this->getReference(CaminoDataFixtures::CAMINO . 1));
        $manager->persist($backpacks19);
        $manager->flush();

        $backpacks20 = new Mochila();
        $backpacks20->setObject("chubasquero");
        $backpacks20->setQuantity(2);
        $backpacks20->setUser($this->getReference(UserDataFixtures::USUARIO . 5));
        $backpacks20->setCamino($this->getReference(CaminoDataFixtures::CAMINO . 1));
        $manager->persist($backpacks20);
        $manager->flush();

        //Javi mochila primitivo
        $backpacks21 = new Mochila();
        $backpacks21->setObject("chubasquero");
        $backpacks21->setQuantity(2);
        $backpacks21->setUser($this->getReference(UserDataFixtures::USUARIO . 5));
        $backpacks21->setCamino($this->getReference(CaminoDataFixtures::CAMINO . 2));
        $manager->persist($backpacks21);
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CaminoDataFixtures::class,
            UserDataFixtures::class
        ];
    }
}
