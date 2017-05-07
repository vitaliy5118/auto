<?php

namespace AdminBundle\Controller;

use AdminBundle\Entity\Brand;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Brand controller.
 *
 */
class BrandController extends Controller
{
    /**
     * Lists all brand entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $brands = $em->getRepository('AdminBundle:Brand')->findAll();

        return $this->render('AdminBundle:Admin:brand/index.html.twig', array(
            'brands' => $brands,
        ));
    }

    /**
     * Creates a new brand entity.
     *
     */
    public function newAction(Request $request)
    {
        $brand = new Brand();
        $form = $this->createForm('AdminBundle\Form\BrandType', $brand);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($brand);
            $em->flush();

            return $this->redirectToRoute('brand_show', array('id' => $brand->getId()));
        }

        return $this->render('AdminBundle:Admin:brand/new.html.twig', array(
            'brand' => $brand,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a brand entity.
     *
     */
    public function showAction(brand $brand)
    {
        $deleteForm = $this->createDeleteForm($brand);

        return $this->render('AdminBundle:Admin:brand/show.html.twig', array(
            'brand' => $brand,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing brand entity.
     *
     */
    public function editAction(Request $request, brand $brand)
    {
        $deleteForm = $this->createDeleteForm($brand);
        $editForm = $this->createForm('AdminBundle\Form\BrandType', $brand);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('brand_edit', array('id' => $brand->getId()));
        }

        return $this->render('AdminBundle:Admin:brand/edit.html.twig', array(
            'brand' => $brand,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a brand entity.
     *
     */
    public function deleteAction(Request $request, brand $brand)
    {
        $form = $this->createDeleteForm($brand);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($brand);
            $em->flush();
        }

        return $this->redirectToRoute('brand_index');
    }

    /**
     * Creates a form to delete a brand entity.
     *
     * @param brand $brand The brand entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(brand $brand)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('brand_delete', array('id' => $brand->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
