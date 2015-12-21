<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Utente;
use AppBundle\Entity\Viaggio;

class ViaggioController extends Controller
{

  /**
   * @Route("/viaggio/{id}", name="viaggio")
   */

  public function viaggioAction($id)
  {
    $viaggio = $this->getDoctrine()
      ->getRepository('AppBundle:Viaggio')
      ->find($id);

    $idUtente = $viaggio->getUtente();

    $utente = $this->getDoctrine()
      ->getRepository('AppBundle:Utente')
      ->find($idUtente);

    if (!$utente) {
      throw $this->createNotFoundException(
        'No user found for id '.$id
      );
    }



    $username = $utente->getFirstname() . '.' . $utente->getLastname();

      return $this->render('AppBundle::viaggio.html.twig',
    [
      'nome' => $utente->getFirstname(),
      'cognome'=> $utente->getLastname(),
      'meta'=> $viaggio->getmeta(),
      'descrizione'=> $viaggio->getdescrizione(),
      'start'=> $viaggio->getstartData(),
      'end'=> $viaggio->getendData(),
    ]);
  }

}
