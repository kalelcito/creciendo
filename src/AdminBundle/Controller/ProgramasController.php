<?php

namespace AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use CoreBundle\Entity\Programas;
use CoreBundle\Form\ProgramasType;

/**
 * Programas controller.
 *
 * @Route("/programas")
 */
class ProgramasController extends Controller
{
    /** index test
     * Lists all Programas entities.
     *
     * @Route("/", name="programas_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $programas = $em->getRepository('CoreBundle:Programas')->findAll();

        return $this->render('programas/index.html.twig', array(
            'programas' => $programas,
        ));
    }

    /**
     * Creates a new Programas entity.
     *
     * @Route("/new", name="programas_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $programa = new Programas();
        $form = $this->createForm('CoreBundle\Form\ProgramasType', $programa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($programa);
            $em->flush();

            return $this->redirectToRoute('programas_show', array('id' => $programa->getId()));
        }

        return $this->render('programas/new.html.twig', array(
            'programa' => $programa,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Programas entity.
     *
     * @Route("/{id}", name="programas_show")
     * @Method("GET")
     */
    public function showAction(Programas $programa)
    {
        $deleteForm = $this->createDeleteForm($programa);

        return $this->render('programas/show.html.twig', array(
            'programa' => $programa,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Programas entity.
     *
     * @Route("/{id}/edit", name="programas_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Programas $programa)
    {
        $deleteForm = $this->createDeleteForm($programa);
        $editForm = $this->createForm('CoreBundle\Form\ProgramasType', $programa);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($programa);
            $em->flush();

            //return $this->redirectToRoute('programas_edit', array('id' => $programa->getId()));
            return $this->redirectToRoute('programas_index');

        }

        return $this->render('programas/edit.html.twig', array(
            'programa' => $programa,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Programas entity.
     *
     * @Route("/{id}", name="programas_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Programas $programa)
    {
        $form = $this->createDeleteForm($programa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($programa);
            $em->flush();
        }

        return $this->redirectToRoute('programas_index');
    }

    /**
     * Creates a form to delete a Programas entity.
     *
     * @param Programas $programa The Programas entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Programas $programa)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('programas_delete', array('id' => $programa->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
