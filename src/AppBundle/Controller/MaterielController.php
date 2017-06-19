<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class MaterielController extends Controller
{
    /**
     * @Route("/materiaux/{id}}", name="affichage_materiel")
     */
    public function affichagemateriel(Request $request, $id)
    {
      	$incident = $this->getDoctrine()->getRepository('AppBundle:Incident')->find($id);
        $tache = $incident->getTache();
        $user = $tache->getUser();
        return $this->render('default\Incident\affichage.html.twig', array(
        "incident" => $incident,
        "user" => $user
        ));
    }
    
    /**
     * @Route("/materiaux", name="materiaux_liste")
     */
    public function materiauxliste(Request $request)
    {

       $materiaux = $this->getDoctrine()->getRepository('AppBundle:Materiel')->findAll();
       
        return $this->render('default\Materiaux\liste.html.twig', [
            'materiaux' => $materiaux
        ]);
    }
}
