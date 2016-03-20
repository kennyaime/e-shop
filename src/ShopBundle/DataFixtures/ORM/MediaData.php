<?php

namespace ShopBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ShopBundle\Entity\Media;

class MediaData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $media1 = new Media();
        $media1->setAlt('media1');
        $media1->setPath('http://placehold.it/250x250');
        $manager->persist($media1);

        $media2 = new Media();
        $media2->setAlt('media2');
        $media2->setPath('http://placehold.it/250x250');
        $manager->persist($media2);

        $media3 = new Media();
        $media3->setAlt('media3');
        $media3->setPath('http://placehold.it/250x250');
        $manager->persist($media3);

        $media4 = new Media();
        $media4->setAlt('media4');
        $media4->setPath('http://placehold.it/250x250');
        $manager->persist($media4);

        $manager->flush();

        $this->addReference('media1', $media1);
        $this->addReference('media2', $media2);
        $this->addReference('media3', $media3);
        $this->addReference('media4', $media4);
    }

    public function getOrder(){
        return 1;
    }
}