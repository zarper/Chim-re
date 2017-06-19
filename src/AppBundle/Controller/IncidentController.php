<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class IncidentController extends Controller
{
    
    /**
     * @Route("/incidents/{id}}", name="affichage_incident")
     */
    public function affichageincident(Request $request, $id)
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
     * @Route("/incidents", name="incident_liste")
     */
    public function incidentliste(Request $request)
    {

       $incidents = $this->getDoctrine()->getRepository('AppBundle:Incident')->findBy(array('vu' => 'false'));
       
        return $this->render('default\Incident\liste.html.twig', [
            'incidents' => $incidents
        ]);
    }
    
    /**
     * @Route("/listeincidents", name="all_incident_liste")
     */
    public function incident(Request $request)
    { 
       $incidentsv = $this->getDoctrine()->getRepository('AppBundle:Incident')->findBy(array('vu' => '1'));
       $incidentsnv = $this->getDoctrine()->getRepository('AppBundle:Incident')->findBy(array('vu' => '0'));
       
        return $this->render('default\Incident\incident.html.twig', [
            'incidentsv' => $incidentsv,
            'incidentsnv' => $incidentsnv
        ]);
    }
    
    /**
     * @Route("/incidents/vue/all", name="vuall")
     */
    public function vuall(Request $request)
    {
      $em = $this->getDoctrine()->getManager();
      $incidentsnv = $this->getDoctrine()->getRepository('AppBundle:Incident')->findBy(array('vu' => '0'));
       
      foreach($incidentsnv as $incident) {
            $incident->setVu(true);
        }
        
        $em->flush();
        
             
          $this->addFlash(
            'success',
            'Tous les incidents ont été vus !'

        );
        
        return $this->redirectToRoute("all_incident_liste");
    }
    
    /**
     * @Route("/incidents/{id}", name="vu")
     */
    public function vu(Request $request, $id)
    {
           
        $incident = $this->getDoctrine()->getRepository('AppBundle:Incident')->find($id);
       
        $incident->setVu(true);

        $em->flush();
     
          $this->addFlash(
            'success',
            'L\'incident a été vu !'

        );
        
            return $this->redirectToRoute("all_incident_liste");
    }
}
