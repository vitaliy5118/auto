<?php

namespace AdminBundle\Controller;

use AdminBundle\Entity\Disky;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Disky controller.
 *
 */
class DiskyController extends Controller
{
    /**
     * Lists all disky entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $diskies = $em->getRepository('AdminBundle:Disky')->findAll();

        return $this->render('AdminBundle:Admin:disky/index.html.twig', array(
            'diskies' => $diskies,
        ));
    }

    /**
     * Creates a new disky entity.
     *
     */
    public function newAction(Request $request)
    {
        $disky = new Disky();
        $form = $this->createForm('AdminBundle\Form\DiskyType', $disky);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($disky);
            $em->flush();

            return $this->redirectToRoute('disky_show', array('id' => $disky->getId()));
        }

        return $this->render('AdminBundle:Admin:disky/new.html.twig', array(
            'disky' => $disky,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a disky entity.
     *
     */
    public function showAction(Disky $disky)
    {
        $deleteForm = $this->createDeleteForm($disky);

        return $this->render('AdminBundle:Admin:disky/show.html.twig', array(
            'disky' => $disky,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing disky entity.
     *
     */
    public function editAction(Request $request, Disky $disky)
    {
        $deleteForm = $this->createDeleteForm($disky);
        $editForm = $this->createForm('AdminBundle\Form\DiskyType', $disky);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('disky_edit', array('id' => $disky->getId()));
        }

        return $this->render('AdminBundle:Admin:disky/edit.html.twig', array(
            'disky' => $disky,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a disky entity.
     *
     */
    public function deleteAction(Request $request, Disky $disky)
    {
        $form = $this->createDeleteForm($disky);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($disky);
            $em->flush();
        }

        return $this->redirectToRoute('disky_index');
    }

    /**
     * Creates a form to delete a disky entity.
     *
     * @param Disky $disky The disky entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Disky $disky)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('disky_delete', array('id' => $disky->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
