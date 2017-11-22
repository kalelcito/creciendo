<?php

namespace AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use CoreBundle\Entity\Descargas;
use CoreBundle\Form\DescargasType;
use Symfony\Component\HttpFoundation\Response;

/**
 * Descargas controller.
 *
 * @Route("/descargas")
 */
class DescargasController extends Controller
{
    /** index test
     * Lists all Descargas entities.
     *
     * @Route("/", name="descargas_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $descargas = $em->getRepository('CoreBundle:Descargas')->findAll();

        return $this->render('descargas/index.html.twig', array(
            'descargas' => $descargas,
        ));
    }

    /**
     * Creates a new Descargas entity.
     *
     * @Route("/new", name="descargas_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $seccion =$em->getRepository('CoreBundle:Seccion_Contenidos')->find($request->query->get("id",null));
        $descarga = new Descargas();
        $descarga->setSeccionContenidos($seccion);
        $form = $this->createForm('CoreBundle\Form\DescargasType', $descarga);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            if($descarga->getArchivo()){
                $file = $descarga->getArchivo();

                $fileName = md5(uniqid()).'.'.$file->guessExtension();

                $file->move(
                    $this->getParameter('down_directory').DIRECTORY_SEPARATOR.$request->query->get("id",null).DIRECTORY_SEPARATOR,
                    $fileName
                );

                $descarga->setArchivo($fileName);
            }
            
            $em->persist($descarga);
            $em->flush();

            return $this->redirectToRoute('seccion_contenidos_show', array('id' => $descarga->getSeccionContenidos()->getId()));
        }

        return $this->render('descargas/new.html.twig', array(
            'descarga' => $descarga,
            'sec' => $request->query->get("id",null),
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Descargas entity.
     *
     * @Route("/{id}", name="descargas_show")
     * @Method("GET")
     */
    public function showAction(Descargas $descarga)
    {
        $deleteForm = $this->createDeleteForm($descarga);

        return $this->render('descargas/show.html.twig', array(
            'descarga' => $descarga,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Descargas entity.
     *
     * @Route("/{id}/edit", name="descargas_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Descargas $descarga)
    {
        $deleteForm = $this->createDeleteForm($descarga);
        $editForm = $this->createForm('CoreBundle\Form\DescargasType', $descarga);
        $tmp = $descarga->getArchivo();
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();

            //imagen subir
            if($descarga->getArchivo()){
                $file = $descarga->getArchivo();

                $fileName = md5(uniqid()).'.'.$file->guessExtension();
                $file->move(
                    $this->getParameter('down_directory').DIRECTORY_SEPARATOR.$request->query->get("id",null).DIRECTORY_SEPARATOR,
                    $fileName
                );

                $descarga->setArchivo($fileName);
            }else{
                $descarga->setArchivo($tmp);
            }
            //imagen
            
            $em->persist($descarga);
            $em->flush();

            //return $this->redirectToRoute('descargas_edit', array('id' => $descarga->getId()));
            return $this->redirectToRoute('seccion_contenidos_show',array('id'=>$descarga->getSeccionContenidos()->getId()));

        }

        return $this->render('descargas/edit.html.twig', array(
            'descarga' => $descarga,
            'sec' => $request->query->get("sec",null),
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Descargas entity.
     *
     * @Route("/{id}", name="descargas_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Descargas $descarga)
    {
        $form = $this->createDeleteForm($descarga);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            unlink($this->getParameter('down_directory').'/'.$descarga->getSeccionContenidos()->getId().'/'.$descarga->getArchivo());
            $em->remove($descarga);
            $em->flush();
        }

        return $this->redirectToRoute('seccion_contenidos_show',array('id'=>$descarga->getSeccionContenidos()->getId()));
    }

    /**
     * Creates a form to delete a Descargas entity.
     *
     * @param Descargas $descarga The Descargas entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Descargas $descarga)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('descargas_delete', array('id' => $descarga->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
