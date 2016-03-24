<?php

namespace ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ShopBundle\Form\RechercheType;
use ShopBundle\Entity\Categories;

class ProduitsController extends Controller
{
    public function produitsAction(Categories $categorie = null)
    {
        $session = $this->getRequest()->getSession();
        $em = $this->getDoctrine()->getManager();

        if ($categorie != null)
            $produits = $em->getRepository('ShopBundle:Produits')->byCategorie($categorie);
        else
            $produits = $em->getRepository('ShopBundle:Produits')->findBy(array('disponible' => 1));

        if ($session->has('panier'))
            $panier = $session->get('panier');
        else
            $panier = false;


        return $this->render('ShopBundle:Default:produits/layout/produits.html.twig', array('produits' => $produits,
            'panier' => $panier));
    }

    public function detailsAction($id)
    {
        $session = $this->getRequest()->getSession();
        $em = $this->getDoctrine()->getManager();
        $produit = $em->getRepository('ShopBundle:Produits')->find($id);

        if (!$produit) throw $this->createNotFoundException('La page n\'existe pas.');

        if ($session->has('panier'))
            $panier = $session->get('panier');
        else
            $panier = false;


        return $this->render('ShopBundle:Default:produits/layout/details.html.twig', array('produit' => $produit,
                                                                                            'panier' => $panier));
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
