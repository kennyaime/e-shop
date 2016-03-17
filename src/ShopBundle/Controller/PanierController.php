<?php

namespace ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PanierController extends Controller
{
    public function panierAction()
    {
        return $this->render('ShopBundle:Default:panier/layout/panier.html.twig');
    }

    public function livraisonAction()
    {
        return $this->render('ShopBundle:Default:panier/layout/livraison.html.twig');
    }

    public function validationAction()
    {
        return $this->render('ShopBundle:Default:panier/layout/validation.html.twig');
    }
}
