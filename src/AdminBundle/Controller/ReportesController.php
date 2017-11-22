<?php

namespace AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use CoreBundle\Entity\Reportes;
use CoreBundle\Form\ReportesType;

/**
 * Reportes controller.
 *
 * @Route("/reportes")
 */
class ReportesController extends Controller
{
    /** index test
     * Lists all Reportes entities.
     *
     * @Route("/", name="reportes_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $reportes = $em->getRepository('CoreBundle:Reportes')->findAll();

        return $this->render('reportes/index.html.twig', array(
            'reportes' => $reportes,
        ));
    }

    /**
     * Creates a new Reportes entity.
     *
     * @Route("/new", name="reportes_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $reporte = new Reportes();
        $form = $this->createForm('CoreBundle\Form\ReportesType', $reporte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            if($reporte->getArchivo()){
                $file = $reporte->getArchivo();

                $fileName = md5(uniqid()).'.'.$file->guessExtension();

                $file->move(
                    $this->getParameter('rep_directory'),
                    $fileName
                );

                $reporte->setArchivo($fileName);
            }

            $em->persist($reporte);
            $em->flush();

            return $this->redirectToRoute('reportes_show', array('id' => $reporte->getId()));
        }

        return $this->render('reportes/new.html.twig', array(
            'reporte' => $reporte,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Reportes entity.
     *
     * @Route("/{id}", name="reportes_show")
     * @Method("GET")
     */
    public function showAction(Reportes $reporte)
    {
        $deleteForm = $this->createDeleteForm($reporte);

        return $this->render('reportes/show.html.twig', array(
            'reporte' => $reporte,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Reportes entity.
     *
     * @Route("/{id}/edit", name="reportes_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Reportes $reporte)
    {
        $deleteForm = $this->createDeleteForm($reporte);
        $editForm = $this->createForm('CoreBundle\Form\ReportesType', $reporte);
        $tmp = $reporte->getArchivo();
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();

            if($reporte->getArchivo()){
                $file = $reporte->getArchivo();
                $fileName = md5(uniqid()).'.'.$file->guessExtension();
                $file->move(
                    $this->getParameter('rep_directory'),
                    $fileName
                );
                $reporte->setArchivo($fileName);
            }else{
                $reporte->setArchivo($tmp);
            }

            $em->persist($reporte);
            $em->flush();

            //return $this->redirectToRoute('reportes_edit', array('id' => $reporte->getId()));
            return $this->redirectToRoute('reportes_index');

        }

        return $this->render('reportes/edit.html.twig', array(
            'reporte' => $reporte,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Reportes entity.
     *
     * @Route("/{id}", name="reportes_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Reportes $reporte)
    {
        $form = $this->createDeleteForm($reporte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($reporte);
            $em->flush();
        }

        return $this->redirectToRoute('reportes_index');
    }

    /**
     * Creates a form to delete a Reportes entity.
     *
     * @param Reportes $reporte The Reportes entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Reportes $reporte)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('reportes_delete', array('id' => $reporte->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
