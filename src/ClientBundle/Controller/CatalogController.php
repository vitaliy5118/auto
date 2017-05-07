<?php

namespace ClientBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CatalogController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
 
        $spares = $em->getRepository('AdminBundle:Spare')
                    ->getAllData();
        
        return $this->render('ClientBundle:Catalog:index.html.twig', array(
            'spares'=>$spares,
        ));
    }
    public function contactsAction()
    {
        
        return $this->render('ClientBundle:Catalog:index.html.twig', array(
            // ...
        ));
    }

}
