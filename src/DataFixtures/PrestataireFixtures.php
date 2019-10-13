<?php

namespace App\DataFixtures;

use App\Entity\Prestataire;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class PrestataireFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();

        for ($p=1; $p<=3; $p++)
        {
            $user = new Prestataire();
            $user->setEmailContact($faker->email)
                ->setIdentifiant($faker->numberBetween(1, 500))
                ->setNom($faker->name)
                ->setNumTel($faker->phoneNumber)
                ->setNumTva($faker->numberBetween(100, 1000))
                ->setSiteInternet($faker->company);

            $manager->persist($user);

        }
        $manager->flush();
    }
}