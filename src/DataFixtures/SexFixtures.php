<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Sex;

class SexFixtures extends Fixture
{
    public const MALE_SEX_REFERENCE = 'male-sex';
    public const FEMALE_SEX_REFERENCE = 'female-sex';

    public function load(ObjectManager $manager)
    {
        $male = new Sex();
        $male->setType('Male');
        $manager->persist($male);

        $female = new Sex();
        $female->setType('Female');
        $manager->persist($female);

        $manager->flush();

        $this->addReference(self::MALE_SEX_REFERENCE, $male);
        $this->addReference(self::FEMALE_SEX_REFERENCE, $female);
    }
}
