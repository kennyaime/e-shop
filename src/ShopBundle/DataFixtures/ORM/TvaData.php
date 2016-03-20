<?php

namespace ShopBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ShopBundle\Entity\Tva;

class TvaData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $tva = new Tva();
        $tva->setMultiplicate('0.833');
        $tva->setNom('TVA 20%');
        $tva->setValeur('20');
        $manager->persist($tva);

        $manager->flush();

        $this->addReference('tva', $tva);
    }

    public function getOrder(){
        return 3;
    }
}