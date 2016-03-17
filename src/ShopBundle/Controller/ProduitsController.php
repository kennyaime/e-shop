<?php

namespace ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProduitsController extends Controller
{
    public function produitsAction()
    {
        return $this->render('ShopBundle:Default:produits/layout/produits.html.twig');
    }

    public function detailsAction()
    {
        return $this->render('ShopBundle:Default:produits/layout/details.html.twig');
    }
}
