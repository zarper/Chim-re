<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Tache;
use AppBundle\Entity\Materiel;
use AppBundle\Form\TacheType;
use AppBundle\Form\MaterielType;
use AppBundle\Form\TacheValidationType;

class TacheController extends Controller
{
    /**
     * @Route("/profil/nouvelletache", name="nouvelletache")
     */
    public function newtache(Request $request)
    {
        // créé une tache
        
        $em = $this->getDoctrine()->getManager();
        
        $tache = new Tache();
        
        $form = $this->createForm(TacheType::class, $tache);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            
        $em = $this->getDoctrine()->getManager();
        
        $em->persist($tache);
        
        $em->flush();
        
          $this->addFlash(
            'notice',
            'La tache '.$tache->getdescription().' à bien été crée !'
        );        
        }
        return $this->render('default\tache\ajouter.html.twig', array(
        'form' => $form->createView(),
        ));
    }
    
    
    /**
     * @Route("/bijou/{id}/listeetape/{idetape}/modifier/{idtache}", name="tache_modify")
     */
    public function modifytache(Request $request, $id ,$idetape, $idtache)
    {
        // modifier un client
        $tache = $this->getDoctrine()->getRepository('AppBundle:Tache')->find($idtache);
              
       $form = $this->createForm(TacheType::class, $tache);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            
        $em = $this->getDoctrine()->getManager();
        $tache->setDatedebut(new \DateTime());

        $em->flush();
        
          $this->addFlash(
            'notice',
            'La tache est commencer !'
        );
           return  $this->redirectToRoute("userprofil", ["id" => $user->getId()] ) ;   
        }
        
        return $this->render('default\Tache\modifier.html.twig', array(
        'form' => $form->createView(),
        ));
    }
    
    /**
     * @Route("/bijou/{id}/listeetape/{idetape}/{idtache}", name="tache_delete")
     */
    public function deletetache($idtache)
    {
        // supprimer un bijou
        
        $em = $this->getDoctrine()->getManager();
        
        $tache = $this->getDoctrine()->getRepository('AppBundle:Tache')->find($idtache);

        $em->remove($tache);
        $em->flush();
        
        $this->addFlash(
            'notice',
            'La tache '.$tache->getDescription().' à bien été supprimé !'
        );
        
        return $this->redirectToRoute('bijou_etape_liste_tache');
    }
    
    /**
     * @Route("/profil/validation/{id}/{iduser}", name="validation")
     */
    public function validationtache(Request $request,$id,$iduser)
    {
      	
        $user = $this->getDoctrine()->getRepository('AppBundle:User')->find($iduser);
        $tache = $this->getDoctrine()->getRepository('AppBundle:Tache')->find($id);
        $stock = $this->getDoctrine()->getRepository('AppBundle:Stock')->find(1);
        
        
        $form = $this->createForm(TacheValidationType::class, $tache);
        
    
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
        
        $em = $this->getDoctrine()->getManager();
        $tache->setDatefin(new \DateTime());
        $stock = $tache->getMateriel()->getStock();
        $stock->setPrix(15);
        $stock->setQuantitestock(20);
        $stock->setSeuil(10);
        $tache->getMateriel()->setTache($tache);
        $bijou = $tache->getEtape()->getBijou();
        $bijou->setDatefin(new \DateTime());
        $em->flush();
        
        /*/////Enregistrement du materiel utilisé pour la tâche
        $data = $form->getData();
        $materiel = new Materiel();
        $materiel->setNom('');
        $materiel->setQuantite($form["quantite"]->$data);
        $materiel->setNom($form["stock"]->$data);
        $materiel->setNom($tache->getId());
        $em->persist($materiel);
        $em->flush();
        /////
        
        /////Mise a jour de la quantité du stock et création d'un incident
        $stock = $this->getDoctrine()->getRepository('AppBundle:Stock')->find($form["stock"]->$data);
        $finale = $stock->GetQuantite() - $form["quantite"]->$data;
        if($finale < 0)
        {
            $stock->setQuantite(0);
        }
        else
        {
            $stock->setQuantite($finale);
        }
        if($finale < $stock->GetSeuil())
        {        
        $incident = new Incident();
        $incident->setDescription("Rupture du stock de ".$stock->GetNom()." de ".$finale-$stock->GetSeuil()." grammes !");
        $em->persist($incident);
        $em->flush();
        }        
        /////*/
        
          $this->addFlash(
            'notice',
            'La tache a été valider !'

        );
          return  $this->redirectToRoute("userprofil", ["id" => $user->getId()] ) ;   
        }
        
        return $this->render('default/validation.html.twig', array(
        "form" => $form->createView(),
        "tache" => $tache
        ));
    }
    
    /**
     * @Route("/profil/commencer/{id}/{iduser}", name="commencer")
     */
    public function commencertache(Request $request,$id,$iduser)
    {
        
        $tache = $this->getDoctrine()->getRepository('AppBundle:Tache')->findOneBy(["id" => $id,
                                                                                 "datedebut" => null,
                                                                                 "datefin"=> null]);     
        
        return $this->render('default/profil.html.twig', array(
        "form" => $form->createView(),
         "tache" => $tache
        ));
    }
    
    
    /**
     * @Route("/bijou/{id}/listeetape/{idetape}/{idtache}", name="affichagetache")
     * @Route("/profil/{id}/{idtache}", name="userprofiltache")
     * @Route("/tache/liste/{idtache}{id}", name="affichagelistetache")
     */
    public function affichagebijoutache(Request $request,$id,$idtache)
    {

        $user = $this->getDoctrine()->getRepository('AppBundle:User')->find($id);
        
        $tache = $this->getDoctrine()->getRepository('AppBundle:Tache')->find($idtache);
        $idetape = $tache->getEtape();
        $etape = $this->getDoctrine()->getRepository('AppBundle:Etape')->find($idetape);
        $idbijou = $etape->getBijou();
        $bijou = $this->getDoctrine()->getRepository('AppBundle:Bijoux')->find($idbijou);
        
        $route = $request->get('_route');
        if($route='tache_liste'){
            $route='tache_liste';
            if($route='userprofil'){
                $route='tache_liste';
                if($route='affichagetache')
                    $route='bijou_etape_liste_tache';
            }
        }
        
        return $this->render('default\Tache\affichage.html.twig', array(
        "bijou" => $bijou,
        "etape" => $etape,
        "tache" => $tache,
        "user" => $user,
        "route" => $route
        ));
    }
    
     /**
     * @Route("/tache/liste", name="tache_liste")
     */
    public function liste(Request $request)
    {
        $taches = $this->getDoctrine()->getRepository('AppBundle:Tache')->findAll();
        $route = $request->get('_route');
        return $this->render('default\Tache\liste.html.twig', array(
        "taches" => $taches,
        "route" => $route
        ));
    }
}
