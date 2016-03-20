<?php

namespace ShopBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ShopBundle\Entity\Produits;

class ProduitsData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $produit1 = new Produits();
        $produit1->setCategorie($this->getReference('categorie1'));
        $produit1->setDescription('Premiere description');
        $produit1->setDisponible('1');
        $produit1->setImage($this->getReference('media1'));
        $produit1->setNom('Produit 1');
        $produit1->setPrix('99.99');
        $produit1->setTva($this->getReference('tva'));
        $manager->persist($produit1);

        $produit2 = new Produits();
        $produit2->setCategorie($this->getReference('categorie2'));
        $produit2->setDescription('Description du produit 2');
        $produit2->setDisponible('1');
        $produit2->setImage($this->getReference('media2'));
        $produit2->setNom('Produit 2');
        $produit2->setPrix('24.99');
        $produit2->setTva($this->getReference('tva'));
        $manager->persist($produit2);

        $produit3 = new Produits();
        $produit3->setCategorie($this->getReference('categorie1'));
        $produit3->setDescription('Ceci est le troisieme produit');
        $produit3->setDisponible('1');
        $produit3->setImage($this->getReference('media3'));
        $produit3->setNom('Produit 3');
        $produit3->setPrix('75.45');
        $produit3->setTva($this->getReference('tva'));
        $manager->persist($produit3);

        $produit4 = new Produits();
        $produit4->setCategorie($this->getReference('categorie2'));
        $produit4->setDescription('Je suis le quatrieme');
        $produit4->setDisponible('1');
        $produit4->setImage($this->getReference('media4'));
        $produit4->setNom('Produit 4');
        $produit4->setPrix('14.99');
        $produit4->setTva($this->getReference('tva'));
        $manager->persist($produit4);

        $manager->flush();
    }

    public function getOrder(){
        return 4;
    }
}