<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Stock;
use AppBundle\Form\StockType;

class StockController extends Controller
{
    
    /**
     * @Route("/stock", name="stock_liste")
     */
    public function stockliste(Request $request)
    {

       $stocks = $this->getDoctrine()->getRepository('AppBundle:Stock')->findAll();
       
        return $this->render('default\Stock\liste.html.twig', [
            'stocks' => $stocks
        ]);
    }
    
    /**
     * @Route("/stock/ajouter", name="nouveaustock")
     */
    public function newstock(Request $request)
    {
        // créé un bijou
        
        $em = $this->getDoctrine()->getManager();
        
        $stock = new Stock();
        
        $form = $this->createForm(StockType::class, $stock);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            
        $em = $this->getDoctrine()->getManager();
        
        $em->persist($stock);
        
        $em->flush();
        
          $this->addFlash(
            'notice',
            'Le stock '.$stock->getNom().' à été crée !'
        );
        
        }
        return $this->render('default\Stock\ajouter.html.twig', array(
        'form' => $form->createView(),
        'stock' => $stock
        ));
    }
    
    /**
     * @Route("/stock/modifier/{id}", name="modifierstock")
     */
    public function modifystock(Request $request, $id)
    {
        // modifier un bijou
        $stock = $this->getDoctrine()->getRepository('AppBundle:Stock')->find($id);
              
        $form = $this->createForm(StockType::class, $stock);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            
        $em = $this->getDoctrine()->getManager();

        $em->flush();
        
          $this->addFlash(
            'notice',
            'Vos changements ont étés sauvegardés !'
        );
        
        }
        
        return $this->render('default\Stock\modifier.html.twig', array(
        'form' => $form->createView(),
        ));
    }
    
    /**
     * @Route("/stock/{id}", name="stock_delete")
     */
    public function deletestock($id)
    {
        // supprimer un bijou
        
        $em = $this->getDoctrine()->getManager();

        $stock = $this->getDoctrine()->getRepository('AppBundle:Stock')->find($id);

        
        $em->remove($stock);

        $em->flush();
        
        $this->addFlash(
            'notice',
            'Le stock '.$stock->getNom().' à bien été supprimé !'
        );
        
        return $this->redirectToRoute('stock_liste');
    }
    
    /**
     * @Route("/stock/{id}", name="affichagestock")
     */
    public function affichagestock(Request $request, $id)
    {
      	$stock = $this->getDoctrine()->getRepository('AppBundle:Stock')->find($id);
                
        return $this->render('default\Stock\affichage.html.twig', array(
        'stock' => $stock
        ));
    }
    
}
