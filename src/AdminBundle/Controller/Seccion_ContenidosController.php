<?php

namespace AdminBundle\Controller;

use CoreBundle\Entity\Descargas;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use CoreBundle\Entity\Seccion_Contenidos;
use CoreBundle\Form\Seccion_ContenidosType;

/**
 * Seccion_Contenidos controller.
 *
 * @Route("/seccion_contenidos")
 */
class Seccion_ContenidosController extends Controller
{
    /** index test
     * Lists all Seccion_Contenidos entities.
     *
     * @Route("/", name="seccion_contenidos_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $seccion_Contenidos = $em->getRepository('CoreBundle:Seccion_Contenidos')->findAll();

        return $this->render('seccion_contenidos/index.html.twig', array(
            'seccion_Contenidos' => $seccion_Contenidos,
        ));
    }

    /**
     * Creates a new Seccion_Contenidos entity.
     *
     * @Route("/new", name="seccion_contenidos_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        /*$em = $this->getDoctrine()->getManager();
        $seccion =$em->getRepository('CoreBundle:Secciones')->find($request->query->get("idseccion",null));
        if($seccion){

        }
        $seccion_Contenido = new Seccion_Contenidos();
        $seccion_Contenido->setSecciones($seccion);
        $form = $this->createForm('CoreBundle\Form\Seccion_ContenidosType', $seccion_Contenido);
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($seccion_Contenido);
            $em->flush();

            return $this->redirectToRoute('seccion_contenidos_show', array('id' => $seccion_Contenido->getId()));
        }

        return $this->render('seccion_contenidos/new.html.twig', array(
            'seccion_Contenido' => $seccion_Contenido,
            'form' => $form->createView(),
        ));*/

        $seccione = new Seccion_Contenidos();
        $form = $this->createForm('CoreBundle\Form\Seccion_ContenidosType', $seccione);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($seccione);
            $em->flush();

            return $this->redirectToRoute('seccion_contenidos_show', array('id' => $seccione->getId()));
        }

        return $this->render(':seccion_contenidos:new.html.twig', array(
            'seccion_Contenido' => $seccione,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Seccion_Contenidos entity.
     *
     * @Route("/{id}", name="seccion_contenidos_show")
     * @Method("GET")
     */
    public function showAction(Seccion_Contenidos $seccion_Contenido)
    {
        $deleteForm = $this->createDeleteForm($seccion_Contenido);

        return $this->render('seccion_contenidos/show.html.twig', array(
            'seccion_Contenido' => $seccion_Contenido,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Seccion_Contenidos entity.
     *
     * @Route("/{id}/edit", name="seccion_contenidos_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Seccion_Contenidos $seccion_Contenido)
    {
        $deleteForm = $this->createDeleteForm($seccion_Contenido);
        $editForm = $this->createForm('CoreBundle\Form\Seccion_ContenidosType', $seccion_Contenido);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($seccion_Contenido);
            $em->flush();

            //return $this->redirectToRoute('seccion_contenidos_edit', array('id' => $seccion_Contenido->getId()));
            return $this->redirectToRoute('seccion_contenidos_index');

        }

        return $this->render('seccion_contenidos/edit.html.twig', array(
            'seccion_Contenido' => $seccion_Contenido,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Seccion_Contenidos entity.
     *
     * @Route("/{id}", name="seccion_contenidos_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Seccion_Contenidos $seccion_Contenido)
    {
        $form = $this->createDeleteForm($seccion_Contenido);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($seccion_Contenido);
            $em->flush();
        }

        return $this->redirectToRoute('seccion_contenidos_index');
    }

    /**
     * Creates a form to delete a Seccion_Contenidos entity.
     *
     * @param Seccion_Contenidos $seccion_Contenido The Seccion_Contenidos entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Seccion_Contenidos $seccion_Contenido)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('seccion_contenidos_delete', array('id' => $seccion_Contenido->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
