<?php

namespace AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use CoreBundle\Entity\Multimedia;
use CoreBundle\Form\MultimediaType;

/**
 * Multimedia controller.
 *
 * @Route("/multimedia")
 */
class MultimediaController extends Controller
{
    /** index test
     * Lists all Multimedia entities.
     *
     * @Route("/", name="multimedia_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $multimedia = $em->getRepository('CoreBundle:Multimedia')->findAll();

        return $this->render('multimedia/index.html.twig', array(
            'multimedia' => $multimedia,
        ));
    }

    /**
     * Creates a new Multimedia entity.
     *
     * @Route("/new", name="multimedia_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        if($request->query->get("tipo",null)<1 || $request->query->get("tipo",null)>4){
            return $this->redirectToRoute('seccion_contenidos_index');
        }
        $em = $this->getDoctrine()->getManager();
        $seccion =$em->getRepository('CoreBundle:Seccion_Contenidos')->find($request->query->get("id",null));
        $multimedia = new Multimedia();
        $multimedia->setSeccionContenidos($seccion);
        $multimedia->setTipo($request->query->get("tipo",null));
        $form = $this->createForm('CoreBundle\Form\MultimediaType', $multimedia);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            if($multimedia->getImagen()){
                $file = $multimedia->getImagen();

                $fileName = md5(uniqid()).'.'.$file->guessExtension();

                if($request->query->get("tipo",null)==1){
                    $file->move($this->getParameter('pres_directory').DIRECTORY_SEPARATOR.$request->query->get("id",null).DIRECTORY_SEPARATOR,$fileName);
                }elseif ($request->query->get("tipo",null)==2){
                    $file->move($this->getParameter('video_directory').DIRECTORY_SEPARATOR.$request->query->get("id",null).DIRECTORY_SEPARATOR,$fileName);
                }

                $multimedia->setImagen($fileName);
            }

            $em->persist($multimedia);
            $em->flush();

            return $this->redirectToRoute('seccion_contenidos_show', array('id' => $multimedia->getSeccionContenidos()->getId()));
        }

        return $this->render('multimedia/new.html.twig', array(
            'multimedia' => $multimedia,
            'sec' => $request->query->get("id",null),
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Multimedia entity.
     *
     * @Route("/{id}", name="multimedia_show")
     * @Method("GET")
     */
    public function showAction(Multimedia $multimedia)
    {
        $deleteForm = $this->createDeleteForm($multimedia);

        return $this->render('multimedia/show.html.twig', array(
            'multimedia' => $multimedia,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Multimedia entity.
     *
     * @Route("/{id}/edit", name="multimedia_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Multimedia $multimedia)
    {
        $deleteForm = $this->createDeleteForm($multimedia);
        $editForm = $this->createForm('CoreBundle\Form\MultimediaType', $multimedia);
        $tmp = $multimedia->getImagen();
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();

            //imagen subir
            if($multimedia->getImagen()){
                $file = $multimedia->getImagen();

                $fileName = md5(uniqid()).'.'.$file->guessExtension();

                if($request->query->get("tipo",null)==1){
                    $file->move($this->getParameter('pres_directory').DIRECTORY_SEPARATOR.$request->query->get("id",null).DIRECTORY_SEPARATOR,$fileName);
                }elseif ($request->query->get("tipo",null)==2){
                    $file->move($this->getParameter('video_directory').DIRECTORY_SEPARATOR.$request->query->get("id",null).DIRECTORY_SEPARATOR,$fileName);
                }

                $multimedia->setImagen($fileName);
            }else{
                $multimedia->setImagen($tmp);
            }
            //imagen
            
            $em->persist($multimedia);
            $em->flush();

            //return $this->redirectToRoute('multimedia_edit', array('id' => $multimedia->getId()));
            return $this->redirectToRoute('seccion_contenidos_show',array('id'=>$multimedia->getSeccionContenidos()->getId()));

        }

        return $this->render('multimedia/edit.html.twig', array(
            'multimedia' => $multimedia,
            'sec' => $request->query->get("sec",null),
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Multimedia entity.
     *
     * @Route("/{id}", name="multimedia_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Multimedia $multimedia)
    {
        $form = $this->createDeleteForm($multimedia);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            if($multimedia->getImagen()){

                if($multimedia->getTipo()==1){
                    unlink($this->getParameter('pres_directory').'/'.$multimedia->getSeccionContenidos()->getId().'/'.$multimedia->getImagen());
                }elseif ($multimedia->getTipo()==2){
                    unlink($this->getParameter('video_directory').'/'.$multimedia->getSeccionContenidos()->getId().'/'.$multimedia->getImagen());
                }

            }
            $em->remove($multimedia);
            $em->flush();
        }

        return $this->redirectToRoute('seccion_contenidos_show',array('id'=>$multimedia->getSeccionContenidos()->getId()));
    }

    /**
     * Creates a form to delete a Multimedia entity.
     *
     * @param Multimedia $multimedia The Multimedia entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Multimedia $multimedia)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('multimedia_delete', array('id' => $multimedia->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
