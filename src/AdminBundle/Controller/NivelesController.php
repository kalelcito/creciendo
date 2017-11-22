<?php

namespace AdminBundle\Controller;

use CoreBundle\Entity\NivelesContenidos;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use CoreBundle\Entity\Niveles;

/**
 * Niveles controller.
 *
 * @Route("/niveles")
 */
class NivelesController extends Controller
{
    /** index test
     * Lists all Niveles entities.
     *
     * @Route("/", name="niveles_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $niveles = $em->getRepository('CoreBundle:Niveles')->findAll();

        return $this->render('niveles/index.html.twig', array(
            'niveles' => $niveles,
        ));
    }

    /**
     * Creates a new Niveles entity.
     *
     * @Route("/new", name="niveles_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $nivele = new Niveles();
        $form = $this->createForm('CoreBundle\Form\NivelesType', $nivele);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($nivele);
            $em->flush();

            return $this->redirectToRoute('niveles_show', array('id' => $nivele->getId()));
        }

        return $this->render('niveles/new.html.twig', array(
            'nivele' => $nivele,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Niveles entity.
     *
     * @Route("/{id}", name="niveles_show")
     * @Method("GET")
     */
    public function showAction(Niveles $nivele)
    {
        $deleteForm = $this->createDeleteForm($nivele);

        return $this->render('niveles/show.html.twig', array(
            'nivele' => $nivele,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Niveles entity.
     *
     * @Route("/{id}/edit", name="niveles_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Niveles $nivele)
    {
        $deleteForm = $this->createDeleteForm($nivele);
        $editForm = $this->createForm('CoreBundle\Form\NivelesType', $nivele);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($nivele);
            $em->flush();

            $em = $this->getDoctrine()->getManager();
            $qb = $em->createQueryBuilder();
            $query = $qb->delete('CoreBundle:NivelesContenidos', 'n')
                ->where('n.id_nivel = :id')
                ->setParameter('id', $nivele->getId())
                ->getQuery();
            $query->execute();

            foreach ($nivele->getSeccionContenidos() as $opcion):
                $nivel = new NivelesContenidos();
                $nivel->setIdNivel($nivele->getId());
                $nivel->setIdSeccionContenido($opcion->getId());
                $em->persist($nivel);
            endforeach;
            $em->flush();

            //return $this->redirectToRoute('niveles_edit', array('id' => $nivele->getId()));
            return $this->redirectToRoute('niveles_index');

        }

        return $this->render('niveles/edit.html.twig', array(
            'nivele' => $nivele,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Niveles entity.
     *
     * @Route("/{id}", name="niveles_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Niveles $nivele)
    {
        $form = $this->createDeleteForm($nivele);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $old = $em->getRepository('CoreBundle:NivelesContenidos')->findBy(array('id_nivel'=>$nivele->getId()));
            foreach ($old as $item):
                $em->remove($item);
            endforeach;
            $em->flush();

            $em->remove($nivele);
            $em->flush();
        }

        return $this->redirectToRoute('niveles_index');
    }

    /**
     * Creates a form to delete a Niveles entity.
     *
     * @param Niveles $nivele The Niveles entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Niveles $nivele)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('niveles_delete', array('id' => $nivele->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
