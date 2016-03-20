<?php
namespace Utilisateurs\UtilisateursBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ShopBundle\Entity\UtilisateursAdresses;

class UtilisateursAdressesData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $adresse1 = new UtilisateursAdresses();
        $adresse1->setUtilisateur($this->getReference('utilisateur1'));
        $adresse1->setNom('Aime');
        $adresse1->setPrenom('Kenny');
        $adresse1->setTelephone('0610253888');
        $adresse1->setAdresse('4 rue de l\'Esplanade');
        $adresse1->setCp('13090');
        $adresse1->setPays('France');
        $adresse1->setVille('Aix-en-Provence');
        $adresse1->setComplement('Logement 9');
        $manager->persist($adresse1);

        $adresse2 = new UtilisateursAdresses();
        $adresse2->setUtilisateur($this->getReference('utilisateur3'));
        $adresse2->setNom('premier');
        $adresse2->setPrenom('albert');
        $adresse2->setTelephone('0600000000');
        $adresse2->setAdresse('5 rue rubosca');
        $adresse2->setCp('76600');
        $adresse2->setPays('France');
        $adresse2->setVille('Le Havre');
        $adresse2->setComplement('face à la plage');
        $manager->persist($adresse2);

        $manager->flush();
    }

    public function getOrder()
    {
        return 6;
    }
}