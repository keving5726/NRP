<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\MaritalStatus;

class MaritalStatusFixtures extends Fixture
{
    public const SINGLE_MS_REFERENCE = 'single-ms';
    public const COMMITED_MS_REFERENCE = 'committed-ms';
    public const MARRIED_MS_REFERENCE = 'married-ms';
    public const SEPARATED_MS_REFERENCE = 'separated-ms';
    public const DIVORCED_MS_REFERENCE = 'divorced-ms';
    public const WIDOWED_MS_REFERENCE = 'widowed-ms';

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

        $this->addReference(self::SINGLE_MS_REFERENCE, $single);
        $this->addReference(self::COMMITED_MS_REFERENCE, $committed);
        $this->addReference(self::MARRIED_MS_REFERENCE, $married);
        $this->addReference(self::SEPARATED_MS_REFERENCE, $separated);
        $this->addReference(self::DIVORCED_MS_REFERENCE, $divorced);
        $this->addReference(self::WIDOWED_MS_REFERENCE, $widowed);
    }
}
