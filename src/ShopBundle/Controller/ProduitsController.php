<?php

namespace ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ShopBundle\Form\RechercheType;

class ProduitsController extends Controller
{
    public function categorieAction($categorie)
    {
        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository('ShopBundle:Produits')->byCategorie($categorie);

        $categorie = $em->getRepository('ShopBundle:Categories')->find($categorie);
        if (!$categorie) throw $this->createNotFoundException('La page n\'existe pas.');

        return $this->render('ShopBundle:Default:produits/layout/produits.html.twig', array('produits' => $produits));
    }

    public function produitsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository('ShopBundle:Produits')->findBy(array( 'disponible' => 1 ));

        return $this->render('ShopBundle:Default:produits/layout/produits.html.twig', array('produits' => $produits));
    }

    public function detailsAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $produit = $em->getRepository('ShopBundle:Produits')->find($id);

        if (!$produit) throw $this->createNotFoundException('La page n\'existe pas.');

        return $this->render('ShopBundle:Default:produits/layout/details.html.twig', array('produit' => $produit));
    }

    public function rechercheAction()
    {
        $form = $this->createForm(new RechercheType());
        return $this->render('ShopBundle:Default:recherche/modulesUsed/recherche.html.twig', array('form' => $form->createView()));
    }

    public function rechercheTraitementAction()
    {
        $form = $this->createForm(new RechercheType());

        if ($this->get('request')->getMethod() == 'POST')
        {
            $form->bind($this->get('request'));
            $em = $this->getDoctrine()->getManager();
            $produits = $em->getRepository('ShopBundle:Produits')->recherche($form['recherche']->getData());
        } else {
            throw $this->createNotFoundException('La page n\'existe pas.');
        }

        return $this->render('ShopBundle:Default:produits/layout/produits.html.twig', array('produits' => $produits));
    }
}
