<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Viaggio;

class ProfiloController extends Controller
{

    /**
     * @Route("/profilo/{id}", name="profilo")
     * @Template("AppBundle::profilo.html.twig")
     */
    public function profiloAction(Request $request, $id )
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

      $form = $this-> createFormBuilder ($viaggio)
      ->add  ('meta' , 'text',  ['attr'=>['placeholder'=> 'Dove',],])
      -> add ('startData', 'date',  ['attr'=>['placeholder'=> 'Partenza',],] )
      -> add ('endData', 'date',  ['attr'=>['placeholder'=> 'Ritorno',],] )
      -> add ('descrizione' , "text", ['attr'=>['placeholder'=> 'Descrizione',],] )
      -> add ('send', 'submit' , ['label' =>'CREA'])
      -> setMethod('post')
      ->getForm();

      $form -> handleRequest($request);

        if($form -> isValid()) {
          /*$this ->addFlash ('notice', 'Viaggio Creato');*/

          $em = $this->getDoctrine()->getManager();

          $em -> persist($viaggio);
          $em -> flush();

          return $this->redirectToRoute('profilo', array('id'=> $id));


          /*$mailViaggio = $this -> getParameter('email_amministratore');
          $data = $form->getdata();
          $message = new \Swift_Message();
          $message->setTo($mailAdmin, 'email da Tips &amp travel');
          $message->setFrom($data['from']);
          $message->setSubject($data['subject']);
          $message->setBody($data['message']);

          $this->get('mailer')->send($message);*/

            }
            $repository = $this->getDoctrine()
              ->getRepository('AppBundle:Viaggio');
            $viaggiUtente = $repository -> createQueryBuilder('v')
              -> where('v.utente = :idu')
              -> setParameter('idu', $id)
              -> orderBy('v.id', 'desc')
              -> getQuery()
              -> getResult();

            return [
              'form_creazione_viaggio' => $form -> CreateView(),
              'username'=> $username,
              'nome' => $utente->getFirstname(),
              'cognome'=> $utente->getLastname(),
              'viaggiUtente' => $viaggiUtente,
            ];
    }

}
