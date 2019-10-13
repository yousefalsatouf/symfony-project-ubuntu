<?php

namespace App\DataFixtures;

use App\Entity\Promotion;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class PromotionFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();

        for ($p=1; $p<=3; $p++)
        {
            $user = new Promotion();
            $user->setAffichageDe($faker->date)
                ->setAffichageA($faker->dateTime)
                ->setDebut($faker->dateTime)
                ->setDescription($faker->sentence(5))
                ->setDocumentPdf($faker->file)
                ->setFin($faker->dateTime)
                ->setIdentifiant($faker->numberBetween(1, 500))
                ->setInfoComplementaire($faker->sentence(3))
                ->setNom($faker->name);

            $manager->persist($user);

        }
        $manager->flush();
    }
}