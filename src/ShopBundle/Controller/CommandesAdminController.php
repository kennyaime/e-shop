<?php
namespace ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use ShopBundle\Entity\UtilisateursAdresses;
use ShopBundle\Entity\Commandes;
use ShopBundle\Entity\Produits;

class CommandesAdminController extends Controller
{
    public function commandesAction()
    {
        $em = $this->getDoctrine()->getManager();
        $commandes = $em->getRepository('ShopBundle:Commandes')->findAll();

        return $this->render('ShopBundle:Administration:commandes/layout/index.html.twig', array('commandes' => $commandes));
    }

    public function showFactureAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $facture = $em->getRepository('ShopBundle:Commandes')->find($id);

        if (!$facture) {
            $this->get('session')->getFlashBag()->add('error', 'Une erreur est survenue');
            return $this->redirect($this->generateUrl('adminCommande'));
        }

        $html = $this->renderView('UtilisateursBundle:Default:layout/facturePDF.html.twig', array('facture' => $facture));

        $html2pdf = new \Html2Pdf_Html2Pdf('P','A4','fr');
        $html2pdf->pdf->SetAuthor('Personashop');
        $html2pdf->pdf->SetTitle('Facture '.$facture->getReference());
        $html2pdf->pdf->SetSubject('Facture Personashop');
        $html2pdf->pdf->SetKeywords('facture,personashop');
        $html2pdf->pdf->SetDisplayMode('real');
        $html2pdf->writeHTML($html);
        $html2pdf->Output('Facture.pdf');

        $response = new Response();
        $response->headers->set('Content-type' , 'application/pdf');

        return $response;
    }
}