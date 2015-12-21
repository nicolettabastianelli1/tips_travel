<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Utente;
use AppBundle\Entity\Viaggio;

class Profilo_utenteController extends Controller

{
  /**
   * @Route("/profilo_utente/{id}", name="profilo_utente")
   * @Template("AppBundle::profilo_utente.html.twig")
   */

   public function profilo_utenteAction(Request $request, $id )
   {
     $utente = $this->getDoctrine()
       ->getRepository('AppBundle:Utente')
       ->find($id);

     if (!$utente) {
       throw $this->createNotFoundException(
         'No user found for id '.$id
       );
     }


     $username = $utente->getFirstname() . '.' . $utente->getLastname();

            $viaggio = new Viaggio();
            $viaggio -> setUtente($utente);


           return [
             'nome' => $utente->getFirstname(),
             'cognome'=> $utente->getLastname(),
             'meta'=> $viaggio->getmeta(),
             'descrizione'=> $viaggio->getdescrizione(),
             'start'=> $viaggio->getstartData(),
             'end'=> $viaggio->getendData(),
           ];



          }
}
