<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends Controller
{
    /**
     * @Route("/contact/mail")
     * @Template("AppBundle:Contact:Contact.html.twig")
     */
    public function ContactAction(Request $request)
    {

          $form = $this-> createFormBuilder ()
          -> add ('from' , 'email')
          -> add ('subject' ,'text', ['attr'=>['placeholder'=> 'Quando',],])
          -> add ('message' , "textarea")
          -> add ('send', 'submit' , ['label' =>'Submit'])
          ->getForm();

          $form -> handleRequest($request);

            if($form -> isValid()) {
              $this ->addFlash ('notice', 'Richiesta inviata');

              $mailAdmin = $this -> getParameter('email_amministratore');
              $data = $form->getdata();

              $message = new \Swift_Message();

              $message->setTo($mailAdmin, 'email da Tips &amp travel');
              $message->setFrom($data['from']);
              $message->setSubject($data['subject']);
              $message->setBody($data['message']);

              $this->get('mailer')->send($message);

          }

          return [
            'form_di_contatto' => $form -> CreateView(),
          ];

          }

}
