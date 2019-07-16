<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\MaritalStatus;

class MaritalStatusFixtures extends Fixture
{
     public function load(ObjectManager $manager)
    {
        $single = new MaritalStatus();
        $single->setStatus('Single');

        $committed = new MaritalStatus();
        $committed->setStatus('Committed');

        $married = new MaritalStatus();
        $married->setStatus('Married');

        $separated = new MaritalStatus();
        $separated->setStatus('Separated');

        $divorced = new MaritalStatus();
        $divorced->setStatus('Divorced');

        $widowed = new MaritalStatus();
        $widowed->setStatus('Widowed');

        $manager->persist($single);
        $manager->persist($committed);
        $manager->persist($married);
        $manager->persist($separated);
        $manager->persist($divorced);
        $manager->persist($widowed);
        $manager->flush();
    }
}
