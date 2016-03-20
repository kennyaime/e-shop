<?php

namespace ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProduitsController extends Controller
{
    public function categorieAction($categorie)
    {
        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository('ShopBundle:Produits')->byCategorie($categorie);

        return $this->render('ShopBundle:Default:produits/layout/produits.html.twig', array('produits' => $produits));
    }

    public function produitsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository('ShopBundle:Produits')->findAll();

        return $this->render('ShopBundle:Default:produits/layout/produits.html.twig', array('produits' => $produits));
    }

    public function detailsAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $produit = $em->getRepository('ShopBundle:Produits')->find($id);

        return $this->render('ShopBundle:Default:produits/layout/details.html.twig', array('produit' => $produit));
    }
}
