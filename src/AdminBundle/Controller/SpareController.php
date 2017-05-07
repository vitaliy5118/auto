<?php

namespace AdminBundle\Controller;

use AdminBundle\Entity\Spare;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Spare controller.
 *
 */
class SpareController extends Controller
{
    /**
     * Lists all spare entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        //$spares = $em->getRepository('AdminBundle:Spare')->getAllData();
        $spares = $em->getRepository('AdminBundle:Spare')->makeDataContainer();
       
        
        return $this->render('AdminBundle:Admin:spare/index.html.twig', array(
            'spares' => $spares,
        ));
    }

    /**
     * Creates a new spare entity.
     *
     */
    public function newAction(Request $request)
    {
        $spare = new Spare();
        $form = $this->createForm('AdminBundle\Form\SpareType', $spare);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($spare);
            $em->flush();

            return $this->redirectToRoute('spare_show', array('id' => $spare->getId()));
        }

        return $this->render('AdminBundle:Admin:spare/new.html.twig', array(
            'spare' => $spare,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a spare entity.
     *
     */
    public function showAction(Spare $spare)
    {
        $em = $this->getDoctrine()->getManager();
        $spare_container = $em->getRepository('AdminBundle:Spare')->getDataById($spare->getId());
        
        $deleteForm = $this->createDeleteForm($spare);

        return $this->render('AdminBundle:Admin:spare/show.html.twig', array(
            'spare' => $spare_container,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing spare entity.
     *
     */
    public function editAction(Request $request, Spare $spare)
    {
        //var_dump($spare); die;
        $deleteForm = $this->createDeleteForm($spare);
        $editForm = $this->createForm('AdminBundle\Form\SpareType', $spare);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('spare_edit', array('id' => $spare->getId()));
        }

        return $this->render('AdminBundle:Admin:spare/edit.html.twig', array(
            'spare' => $spare,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a spare entity.
     *
     */
    public function deleteAction(Request $request, Spare $spare)
    {
        $form = $this->createDeleteForm($spare);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($spare);
            $em->flush();
        }

        return $this->redirectToRoute('spare_index');
    }

    /**
     * Creates a form to delete a spare entity.
     *
     * @param Spare $spare The spare entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Spare $spare)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('spare_delete', array('id' => $spare->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
