<?php

namespace UtilisateursBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="UtilisateursBundle\Repository\UtilisateursRepository")
 * @ORM\Table(name="utilisateurs")
 */
class Utilisateurs extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
        $this->commandes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->adresses = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @ORM\OneToMany(targetEntity="ShopBundle\Entity\Commandes", mappedBy="utilisateur", cascade={"remove"})
     * @ORM\JoinColumn{nullable=true}
     */
    private $commandes;

    /**
     * @ORM\OneToMany(targetEntity="ShopBundle\Entity\UtilisateursAdresses", mappedBy="utilisateur", cascade={"remove"})
     * @ORM\JoinColumn{nullable=true}
     */
    private $adresses;

    /**
     * Add commandes
     *
     * @param \ShopBundle\Entity\Commandes $commandes
     * @return Utilisateurs
     */
    public function addCommande(\ShopBundle\Entity\Commandes $commandes)
    {
        $this->commandes[] = $commandes;

        return $this;
    }

    /**
     * Remove commandes
     *
     * @param \ShopBundle\Entity\Commandes $commandes
     */
    public function removeCommande(\ShopBundle\Entity\Commandes $commandes)
    {
        $this->commandes->removeElement($commandes);
    }

    /**
     * Get commandes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCommandes()
    {
        return $this->commandes;
    }

    /**
     * Add adresses
     *
     * @param \ShopBundle\Entity\UtilisateursAdresses $adresses
     * @return Utilisateurs
     */
    public function addAdress(\ShopBundle\Entity\UtilisateursAdresses $adresses)
    {
        $this->adresses[] = $adresses;

        return $this;
    }

    /**
     * Remove adresses
     *
     * @param \ShopBundle\Entity\UtilisateursAdresses $adresses
     */
    public function removeAdress(\ShopBundle\Entity\UtilisateursAdresses $adresses)
    {
        $this->adresses->removeElement($adresses);
    }

    /**
     * Get adresses
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAdresses()
    {
        return $this->adresses;
    }
}
