<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    
    /**
     * @Route("/utilisateur", name="listeuser")
     */
    public function utilisateur(Request $request)
    {
       $users = $this->getDoctrine()->getRepository('AppBundle:User')->findAll();
       
        return $this->render('default\user.html.twig', [
            'users' => $users
        ]);
    }
    
    /**
     * @Route("/profil/{id}", name="userprofil")
     */
    public function userprofil(Request $request, $id)
    {
        $iduser = $this->getUser()->getId();
        if($id == $iduser)
        {
            $em = $this->getDoctrine()->getManager();
            if($request->isMethod('POST')) {
            $user = $this->getDoctrine()->getRepository('AppBundle:User')->find($iduser);
            // si l'utilisateur n'a pas les droit sur la tache
               if($user->isGranted("ROLE_SUPER_ADMIN") and !$this->container->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {

                return $this->redirectToRoute('fos_user_security_login');
            } 
                      $tache = $this->getDoctrine()->getRepository('AppBundle:Tache')->find($request->get("tache"));
                      $tache->setDatedebut(new \DateTime());

                 $em->flush();

            }
            $user = $em->getRepository('AppBundle:User')->find($id);
            $tachesav = $em->getRepository('AppBundle:Tache')->findTacheVal($id);
            $tachesaf = $em->getRepository('AppBundle:Tache')->findBy(array('user' => $user,
                                                                                             'datedebut' => NULL,
                                                                                             'datefin' => NULL));
            $bijou = $this->getDoctrine()->getRepository('AppBundle:Bijoux')->find($id);
            $user = $this->getDoctrine()->getRepository('AppBundle:User')->find($id);
            $tache = $this->getDoctrine()->getRepository('AppBundle:Tache')->find($id);


            return $this->render('default\profil.html.twig', [
                'user' => $user,
                'tachesaf' => $tachesaf,
                'tachesav' => $tachesav,
                'bijou' => $bijou,
                'tache' => $tache,   
                'user' => $user
            ]);
    }
    $this->addFlash(
            'alert',
            'Ce n\'est pas votre liste de tâche !'
        );
    return $this->render('base.html.twig');
    }
}
