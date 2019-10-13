<?php

namespace App\DataFixtures;

use App\Entity\Stage;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class StageFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();

        for ($s=1; $s<=3; $s++)
        {
            $user = new Stage();
            $user->setAffichageDe($faker->date)
                ->setAffichageA($faker->dateTime)
                ->setDebut($faker->dateTime)
                ->setDescription($faker->sentence(5))
                ->setFin($faker->dateTime)
                ->setIdentifiant($faker->numberBetween(1, 500))
                ->setInfoComplementaire($faker->sentence(3))
                ->setNom($faker->name)
                ->setTarif($faker->words);

            $manager->persist($user);

        }
        $manager->flush();
    }
}