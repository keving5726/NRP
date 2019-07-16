<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\PetType;

class PetTypeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $dog = new PetType();
        $dog->setType('Dog');

        $cat = new PetType();
        $cat->setType('Cat');

        $fish = new PetType();
        $fish->setType('Fish');

        $rabbit = new PetType();
        $rabbit->setType('Rabbit');

        $invertebrate = new PetType();
        $invertebrate->setType('Invertebrate');

        $reptile = new PetType();
        $reptile->setType('Reptile');

        $bird = new PetType();
        $bird->setType('Bird');

        $hamster = new PetType();
        $hamster->setType('Hamster');

        $other = new PetType();
        $other->setType('Other');

        $manager->persist($dog);
        $manager->persist($cat);
        $manager->persist($fish);
        $manager->persist($rabbit);
        $manager->persist($invertebrate);
        $manager->persist($reptile);
        $manager->persist($bird);
        $manager->persist($hamster);
        $manager->persist($other);
        $manager->flush();
    }
}
