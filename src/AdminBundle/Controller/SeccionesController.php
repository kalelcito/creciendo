<?php

namespace AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use CoreBundle\Entity\Secciones;
use CoreBundle\Form\SeccionesType;

/**
 * Secciones controller.
 *
 * @Route("/secciones")
 */
class SeccionesController extends Controller
{
    /** index test
     * Lists all Secciones entities.
     *
     * @Route("/", name="secciones_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $secciones = $em->getRepository('CoreBundle:Secciones')->findAll();

        return $this->render('secciones/index.html.twig', array(
            'secciones' => $secciones,
        ));
    }

    /**
     * Creates a new Secciones entity.
     *
     * @Route("/new", name="secciones_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $seccione = new Secciones();
        $form = $this->createForm('CoreBundle\Form\SeccionesType', $seccione);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($seccione);
            $em->flush();

            return $this->redirectToRoute('secciones_show', array('id' => $seccione->getId()));
        }

        return $this->render('secciones/new.html.twig', array(
            'seccione' => $seccione,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Secciones entity.
     *
     * @Route("/{id}", name="secciones_show")
     * @Method("GET")
     */
    public function showAction(Secciones $seccione)
    {
        $deleteForm = $this->createDeleteForm($seccione);

        return $this->render('secciones/show.html.twig', array(
            'seccione' => $seccione,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Secciones entity.
     *
     * @Route("/{id}/edit", name="secciones_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Secciones $seccione)
    {
        $deleteForm = $this->createDeleteForm($seccione);
        $editForm = $this->createForm('CoreBundle\Form\SeccionesType', $seccione);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($seccione);
            $em->flush();

            //return $this->redirectToRoute('secciones_edit', array('id' => $seccione->getId()));
            return $this->redirectToRoute('secciones_index');

        }

        return $this->render('secciones/edit.html.twig', array(
            'seccione' => $seccione,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Secciones entity.
     *
     * @Route("/{id}", name="secciones_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Secciones $seccione)
    {
        $form = $this->createDeleteForm($seccione);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($seccione);
            $em->flush();
        }

        return $this->redirectToRoute('secciones_index');
    }

    /**
     * Creates a form to delete a Secciones entity.
     *
     * @param Secciones $seccione The Secciones entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Secciones $seccione)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('secciones_delete', array('id' => $seccione->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
