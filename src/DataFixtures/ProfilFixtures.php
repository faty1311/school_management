<?php

namespace App\DataFixtures;

use App\Entity\Profil;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Faker;


class ProfilFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker =\Faker\Factory::create('fr_FR');
       
        for($i=0; $i<= 10; $i++)

        {
            $profil = new Profil();
            $profil->setFirstname('toto'. $i);
            $profil->setLastname('cre'. $i);
            $profil->setBirthdate(dateTime());
            $profil->setFunction('élèves'.$i);
            $manager->persist($profil);
        }

        $manager->flush();
    }
}
