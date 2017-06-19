<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Bijoux;
use AppBundle\Form\BijouxType;

class BijouxController extends Controller
{
    
    /**
     * @Route("/bijou/ajouter", name="nouveaubijou")
     */
    public function newbijou(Request $request)
    {
        // créé un bijou
        
        $em = $this->getDoctrine()->getManager();
        
        $bijou = new Bijoux();
        
        $form = $this->createForm(BijouxType::class, $bijou);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            
        $em = $this->getDoctrine()->getManager();
        
        $em->persist($bijou);
        
        $em->flush();
        
          $this->addFlash(
            'notice',
            'Le bijou '.$bijou->getNom().' à été crée !'
        );
        
        }
        return $this->render('default\bijoux\ajouter.html.twig', array(
        'form' => $form->createView(),
        'bijou' => $bijou
        ));
    }
   
    
    /**
     * @Route("/bijou", name="bijou_liste")
     */
    public function formbijou(Request $request)
    {
        $bijoux = $this->getDoctrine()->getRepository('AppBundle:Bijoux')->findAll();    
        return $this->render('default\Bijoux\bijoux.html.twig', [
            'bijoux' => $bijoux
        ]);
    }
    
        
    /**
     * @Route("/bijou/modifier/{id}", name="modifierbijou")
     */
    public function modifybijou(Request $request, $id)
    {
        // modifier un bijou
        $bijou = $this->getDoctrine()->getRepository('AppBundle:Bijoux')->find($id);
              
        $form = $this->createForm(BijouxType::class, $bijou);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            
        $em = $this->getDoctrine()->getManager();

        $em->flush();
        
          $this->addFlash(
            'notice',
            'Vos changements ont étés sauvegardés !'
        );
        
        }
        
        return $this->render('default\Bijoux\modifier.html.twig', array(
        'form' => $form->createView(),
        ));
    }
    
    /**
     * @Route("/bijou/supprimer/{id}", name="bijou_delete")
     */
    public function deletebijou($id)
    {
        // supprimer un bijou
        
        $em = $this->getDoctrine()->getManager();

        $bijou = $this->getDoctrine()->getRepository('AppBundle:Bijoux')->find($id);

        
        $em->remove($bijou);

        $em->flush();
        
        $this->addFlash(
            'notice',
            'Le bijoux '.$bijou->getNom().' à bien été supprimé !'
        );
        
        return $this->redirectToRoute('bijou_liste');
    }
    
    /**
     * @Route("/bijou/{id}/listeetape/", name="bijou_liste_etape")
     */
    public function bijouetapeListe(Request $request, $id)
    {        
        $em = $this->getDoctrine()->getManager();
        
        $bijou = $this->getDoctrine()->getRepository('AppBundle:Bijoux')->find($id);
        $etapes = $this->getDoctrine()->getRepository('AppBundle:Etape')->findBy(array('bijou' => $id));
        
       
        
        return $this->render('default\Bijoux\bijouetapes.html.twig', array(
            "bijou" => $bijou,
            "etapes" => $etapes
        ));
    }
    
    /**
     * @Route("/bijou/{id}/listeetape/{idetape}", name="bijou_etape_liste_tache")
     */
    public function bijouetapetacheListe(Request $request, $id,$idetape)
    {        
        $em = $this->getDoctrine()->getManager();
        
        $bijou = $this->getDoctrine()->getRepository('AppBundle:Bijoux')->find($id);
        $etape = $this->getDoctrine()->getRepository('AppBundle:Etape')->find($idetape);
        $taches = $this->getDoctrine()->getRepository('AppBundle:Tache')->findBy(array('etape' => $idetape));
       
        
        return $this->render('default\Etape\etapetache.html.twig', array(
            "bijou" => $bijou,
            "etape" => $etape,
            "taches" => $taches
        ));
    }
}
