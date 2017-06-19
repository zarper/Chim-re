<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Etape;
use AppBundle\Form\EtapeType;

class EtapeController extends Controller
{
    
    /**
     * @Route("/etapes", name="formetapebijou")
     */
    public function formetape(Request $request)
    {
        $etapes = $this->getDoctrine()->getRepository('AppBundle:Etape')->findAll();
              
        return $this->render('default\Etape\Etape.html.twig', [
            'etapes' => $etapes
        ]);
    }
    
    /**
     * @Route("/etapes/ajout/{id}", name="nouveauetape")
     */
    public function newetape(Request $request,$id)
    {
        // créé une étape
        
        $em = $this->getDoctrine()->getManager();
        $bijou = $this->getDoctrine()->getRepository('AppBundle:Bijoux')->find($id);
        
        $etape = new Etape();
        
        $form = $this->createForm(EtapeType::class, $etape);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            
        $em = $this->getDoctrine()->getManager();
        
        $em->persist($etape);
        
        $em->flush();
        
          $this->addFlash(
            'notice',
            'L\'étape '.$etape->getDescription().' à été crée !'
        );
        
        }
        return $this->render('default\etape\ajouter.html.twig', array(
        'form' => $form->createView()
        ));
    }
    
    /**
     * @Route("/etapes/liste", name="etape_liste")
     */
    public function etapeliste(Request $request)
    {
       //liste de toute les étapes 
       
       $etape = $this->getDoctrine()->getRepository('AppBundle:Etape')->findAll();
       
        return $this->render('default\Etape\liste.html.twig', [
            'etape' => $etape
        ]);
    }
    
    /**
     * @Route("/etapes/modifier/{idetape}", name="etape_modify")
     */
    public function modifyetape(Request $request, $idetape)
    {
        // modifier une étape
        $etape = $this->getDoctrine()->getRepository('AppBundle:Etape')->find($idetape);
              
        $form = $this->createForm(EtapeType::class, $etape);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            
        $em = $this->getDoctrine()->getManager();

        $em->flush();
        
          $this->addFlash(
            'notice',
            'Vos changements ont étés sauvegardés !'
        );
        
        }
        
        return $this->render('default\Etape\modifier.html.twig', array(
        'form' => $form->createView(),
        ));
    }
    
    /**
     * @Route("/bijou/{id}/listeetape/{idetape}/affichage", name="affichageetape")
     */
    public function affichagebijoutache(Request $request,$id,$idetape)
    {
        $etape = $this->getDoctrine()->getRepository('AppBundle:Etape')->find($idetape);
        $idbijou = $etape->getBijou();
        $bijou = $this->getDoctrine()->getRepository('AppBundle:Bijoux')->find($idbijou);
        $taches = $this->getDoctrine()->getRepository('AppBundle:Tache')->findBy(["etape" => $idetape]);
        
        
        return $this->render('default\Etape\affichage.html.twig', array(
        "bijou" => $bijou,
        "etape" => $etape,
        "taches" => $taches
        ));
    }
    
    /**
     * @Route("/etapes/liste/{idetape}", name="etape_delete")
     */
    public function deleteetape($idetape)
    {
        // supprimer une étape et ses taches
        
        $em = $this->getDoctrine()->getManager();
        
        $etape = $this->getDoctrine()->getRepository('AppBundle:Etape')->find($idetape);
        $taches = $this->getDoctrine()->getRepository('AppBundle:Tache')->findBy(["etape" => $etape->getId()]);
        foreach($taches as $tache)
        {
            $em->remove($tache);
            $em->flush();
        }
        $em->remove($etape);
        $em->flush();
        
        $this->addFlash(
            'notice',
            'L\'étape  \''.$etape->getDescription().'\' à bien été supprimé ainsi que ses taches !'
        );
        
        return $this->redirectToRoute('etape_liste');
    }  
    
}
