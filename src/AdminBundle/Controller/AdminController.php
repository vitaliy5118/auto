<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

//use AdminBundle\Services\UploadHandler;

/**
 * Description of AdminController
 *
 * @author Виталий
 */
class AdminController extends Controller {

    public function indexAction() {

        return $this->render('AdminBundle:Admin:index.html.twig');
    }

    public function SparesCatalogAction() {

        $em = $this->getDoctrine()->getManager();

        $spares = $em->getRepository('AdminBundle:Spare')
                ->getAllData();

//        
//        $spare = $em->getRepository('AdminBundle:Spare')
//                    ->getDataById(3);

        return $this->render('AdminBundle:Admin:spares_catalog.html.twig', ['spares' => $spares]);
    }

    public function TireCatalogAction() {
        
        $file = $this->container->get('admin.uploader_handler');
        
        $helper = $this->container->get('oneup_uploader.templating.uploader_helper');
        $endpoint = $helper->endpoint('gallery');
        
        return $this->render('AdminBundle:Admin:tire_catalog.html.twig',['file'=>$file->loadFile()]);
    }

    public function DiskCatalogAction() {

        return $this->render('AdminBundle:Admin:disk_catalog.html.twig');
    }

}
