<?php

namespace App\DataFixtures;

use App\Entity\Utilisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();

        for ($u=1; $u<=3; $u++)
        {
            $user = new Utilisateur();
            $user->setAdresseN°($faker->numberBetween(50, 500))
                ->setAdresseRue($faker->address)
                ->setBanni($faker->boolean)
                ->setEmail($faker->email)
                ->setIdentifiant($faker->numberBetween(1, 500))
                ->setInscription($faker->dateTime)
                ->setInscriptionConf($faker->sentence)
                ->setMotDePass($faker->password)
                ->setNbEssaisInfr($faker->numberBetween(1, 3))
                ->setTypeUtilisateur($faker->word);

            $manager->persist($user);

        }
        $manager->flush();
    }
}
