<?php

namespace App\DataFixtures;

use App\Entity\User;
use Faker\Factory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    protected $faker;
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $this->faker = Factory::create('es_VE');

        for ($i = 0; $i < 100; $i++) {
            $standard = new User();
            $standard->setIdentificationCard($this->faker->unique()->nationalId('-'));
            $standard->setPassword($this->passwordEncoder->encodePassword($standard, '12345678'));
            $standard->setCreatedAt(new \DateTime());
            $standard->setUpdatedAt(new \DateTime());
            
            $manager->persist($standard);

            $this->addReference('standard' . '_' . $i, $standard);
        }

        for ($i = 0; $i < 10; $i++) {
            $admin = new User();
            $admin->setIdentificationCard($this->faker->unique()->nationalId('-'));
            $admin->setPassword($this->passwordEncoder->encodePassword($admin, '12345678'));
            $admin->setRoles(['ROLE_ADMIN']);
            $admin->setCreatedAt(new \DateTime());
            $admin->setUpdatedAt(new \DateTime());
            
            $manager->persist($admin);

            $this->addReference('admin' . '_' . $i, $admin);
        }

        $manager->flush();
    }
}
