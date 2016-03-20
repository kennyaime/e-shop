<?php
namespace ShopBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CategoriesController extends Controller
{
    public function menuAction()
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('ShopBundle:Categories')->findAll();

        return $this->render('ShopBundle:Default:categories/modulesUsed/menu.html.twig', array('categories' => $categories));
    }
}