<?php

namespace App\DataFixtures;

use App\Entity\Pet;
use Faker\Factory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class PetFixtures extends Fixture implements DependentFixtureInterface
{
    protected $faker;

    public function load(ObjectManager $manager)
    {
        $this->faker = Factory::create();

        for ($i = 0; $i < 100; $i++) {
            $pet = new Pet();
            $pet->setName($this->faker->name);
            $pet->setBirthdate(new \DateTime($this->faker->dateTimeBetween($startDate = '-15 years', $endDate = 'now', $timezone = null)->format('Y-m-d')));
            $pet->setUserIdentification($this->getReference('standard' . "_" . $i));
            $pet->setSex($this->getReference(SexFixtures::MALE_SEX_REFERENCE));
            $pet->setType($this->getReference($this->faker->randomElement($array = array('dog-type', 'cat-type', 'fish-type', 'rabbit-type', 'invertebrate-type', 'reptile-type', 'bird-type', 'other-type'))));
            $pet->setCreatedAt(new \DateTime());
            $pet->setUpdatedAt(new \DateTime());

            $manager->persist($pet);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            UserFixtures::class,
            SexFixtures::class,
            PetTypeFixtures::class,
        );
    }
}
