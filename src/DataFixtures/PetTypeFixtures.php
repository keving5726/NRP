<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\PetType;

class PetTypeFixtures extends Fixture
{
    public const DOG_TYPE_REFERENCE = 'dog-type';
    public const CAT_TYPE_REFERENCE = 'cat-type';
    public const FISH_TYPE_REFERENCE = 'fish-type';
    public const RABBIT_TYPE_REFERENCE = 'rabbit-type';
    public const INVERTEBRATE_TYPE_REFERENCE = 'invertebrate-type';
    public const REPTILE_TYPE_REFERENCE = 'reptile-type';
    public const BIRD_TYPE_REFERENCE = 'bird-type';
    public const OTHER_TYPE_REFERENCE = 'other-type';

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

        $this->addReference(self::DOG_TYPE_REFERENCE, $dog);
        $this->addReference(self::CAT_TYPE_REFERENCE, $cat);
        $this->addReference(self::FISH_TYPE_REFERENCE, $fish);
        $this->addReference(self::RABBIT_TYPE_REFERENCE, $rabbit);
        $this->addReference(self::INVERTEBRATE_TYPE_REFERENCE, $invertebrate);
        $this->addReference(self::REPTILE_TYPE_REFERENCE, $reptile);
        $this->addReference(self::BIRD_TYPE_REFERENCE, $bird);
        $this->addReference(self::OTHER_TYPE_REFERENCE, $other);
    }
}
