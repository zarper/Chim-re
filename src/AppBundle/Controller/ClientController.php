<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Client;
use AppBundle\Form\ClientType;

class ClientController extends Controller
{
    
    /**
     * @Route("/client/ajout", name="ajoutclient")
     */
    public function formajoutclient(Request $request)
    {
        // crée un client
        $client = new Client();
        $client->setNom('');
        $client->setPrenom('');
        $client->setTelephone('');
        
        $form = $this->createForm(ClientType::class, $client);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            
        $em = $this->getDoctrine()->getManager();
        
        $em->persist($client);
        
        $em->flush();
        
          $this->addFlash(
            'notice',
            'Le client '.$client->getNom().' à été crée !'
        );
        
        }
        return $this->render('default\client\ajouter.html.twig', array(
        'form' => $form->createView(),
        ));
    }
    
    /**
     * @Route("/client/modifier/{id}", name="client_modify")
     */
    public function modifyclient(Request $request, $id)
    {
        // modifier un client
        $client = $this->getDoctrine()->getRepository('AppBundle:Client')->find($id);
              
        $form = $this->createForm(ClientType::class, $client);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            
        $em = $this->getDoctrine()->getManager();

        $em->flush();
        
          $this->addFlash(
            'notice',
            'Vos changements ont étés sauvegardés !'
        );
        
        }
        
        return $this->render('default\Client\modifier.html.twig', array(
        'form' => $form->createView(),
        ));
    }
    
    /**
     * @Route("/client/liste", name="client_liste")
     */
    public function client(Request $request)
    {

       
       $users = $this->getDoctrine()->getRepository('AppBundle:Client')->findAll();
       
        return $this->render('default\Client\liste.html.twig', [
            'clients' => $users
        ]);
    }
    
    /**
     * @Route("/Client/supprimer/{id}", name="client_delete")
     */
    public function deleteclient($id)
    {
        // supprimer un client
        
        $em = $this->getDoctrine()->getManager();
        
        $bijou = $this->getDoctrine()->getRepository('AppBundle:Client')->find($id);
        
        
        $em->remove($bijou);

        $em->flush();
        
        $this->addFlash(
            'notice',
            'Le bijoux '.$bijou->getNom().' à bien été supprimé !'
        );
        
        return $this->redirectToRoute('client_liste');
    }
    
}
