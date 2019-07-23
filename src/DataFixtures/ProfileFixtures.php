<?php

namespace App\DataFixtures;

use App\Entity\Profile;
use Faker\Factory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ProfileFixtures extends Fixture implements DependentFixtureInterface
{
    protected $faker;

    public function load(ObjectManager $manager)
    {
        $this->faker = Factory::create();

        for ($i = 0; $i < 50; $i++) {
            $maleProfile = new Profile();
            $maleProfile->setFirstName($this->faker->firstNameMale);
            $maleProfile->setLastName($this->faker->lastName);
            $maleProfile->setBirthdate(new \DateTime($this->faker->dateTimeBetween($startDate = '-60 years', $endDate = '-18 years', $timezone = null)->format('Y-m-d')));
            $maleProfile->setUserIdentification($this->getReference('standard' . "_" . $i));
            $maleProfile->setSex($this->getReference(SexFixtures::MALE_SEX_REFERENCE));
            $maleProfile->setMaritalStatus($this->getReference($this->faker->randomElement($array = array('single-ms', 'committed-ms', 'married-ms', 'separated-ms', 'divorced-ms', 'widowed-ms'))));
            $maleProfile->setCreatedAt(new \DateTime());
            $maleProfile->setUpdatedAt(new \DateTime());

            $manager->persist($maleProfile);
        }

        for ($i = 50; $i < 100; $i++) {
            $femaleProfile = new Profile();
            $femaleProfile->setFirstName($this->faker->firstNameFemale);
            $femaleProfile->setLastName($this->faker->lastName);
            $femaleProfile->setBirthdate(new \DateTime($this->faker->dateTimeBetween($startDate = '-60 years', $endDate = '-18 years', $timezone = null)->format('Y-m-d')));
            $femaleProfile->setUserIdentification($this->getReference('standard' . "_" . $i));
            $femaleProfile->setSex($this->getReference(SexFixtures::FEMALE_SEX_REFERENCE));
            $femaleProfile->setMaritalStatus($this->getReference($this->faker->randomElement($array = array ('single-ms', 'committed-ms', 'married-ms', 'separated-ms', 'divorced-ms', 'widowed-ms'))));
            $femaleProfile->setCreatedAt(new \DateTime());
            $femaleProfile->setUpdatedAt(new \DateTime());

            $manager->persist($femaleProfile);
        }

        for ($i = 0; $i < 5; $i++) {
            $maleAdmin = new Profile();
            $maleAdmin->setFirstName($this->faker->firstNameMale);
            $maleAdmin->setLastName($this->faker->lastName);
            $maleAdmin->setBirthdate(new \DateTime($this->faker->dateTimeBetween($startDate = '-60 years', $endDate = '-18 years', $timezone = null)->format('Y-m-d')));
            $maleAdmin->setUserIdentification($this->getReference('admin' . "_" . $i));
            $maleAdmin->setSex($this->getReference(SexFixtures::MALE_SEX_REFERENCE));
            $maleAdmin->setMaritalStatus($this->getReference($this->faker->randomElement($array = array ('single-ms', 'committed-ms', 'married-ms', 'separated-ms', 'divorced-ms', 'widowed-ms'))));
            $maleAdmin->setCreatedAt(new \DateTime());
            $maleAdmin->setUpdatedAt(new \DateTime());

            $manager->persist($maleAdmin);
        }

        for ($i = 5; $i < 10; $i++) {
            $femaleAdmin = new Profile();
            $femaleAdmin->setFirstName($this->faker->firstNameFemale);
            $femaleAdmin->setLastName($this->faker->lastName);
            $femaleAdmin->setBirthdate(new \DateTime($this->faker->dateTimeBetween($startDate = '-60 years', $endDate = '-18 years', $timezone = null)->format('Y-m-d')));
            $femaleAdmin->setUserIdentification($this->getReference('admin' . "_" . $i));
            $femaleAdmin->setSex($this->getReference(SexFixtures::FEMALE_SEX_REFERENCE));
            $femaleAdmin->setMaritalStatus($this->getReference($this->faker->randomElement($array = array ('single-ms', 'committed-ms', 'married-ms', 'separated-ms', 'divorced-ms', 'widowed-ms'))));
            $femaleAdmin->setCreatedAt(new \DateTime());
            $femaleAdmin->setUpdatedAt(new \DateTime());

            $manager->persist($femaleAdmin);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            UserFixtures::class,
            SexFixtures::class,
            MaritalStatusFixtures::class,
        );
    }
}
