<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Utente;

class HomeController extends Controller
{


    /**
     * @Route("/home/{id}", name="home")
     */

    public function homeAction($id)
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

        return $this->render('AppBundle::home.html.twig',
      [
        'nome' => $utente->getFirstname(),
        'cognome'=> $utente->getLastname(),
      ]);
    }
  }
