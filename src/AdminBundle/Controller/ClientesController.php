<?php

namespace AdminBundle\Controller;

use CoreBundle\Entity\Clientes_Permisos;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use CoreBundle\Entity\Clientes;
use CoreBundle\Form\ClientesType;

/**
 * Clientes controller.
 *
 * @Route("/clientes")
 */
class ClientesController extends Controller
{
    /** index test
     * Lists all Clientes entities.
     *
     * @Route("/", name="clientes_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $clientes = $em->getRepository('CoreBundle:Clientes')->findAll();

        $permisos = array();
        foreach ($clientes as $c):
            $d = $c->getClientesPermisos();
            foreach ($d as $p):
                if($c->getId()==$p->getClientes()->getId()){
                    array_push($permisos,array('id'=>$c->getId(),'permisos'=>json_decode($p->getPermisos(),true)));
                }else{
                    //revisar agregar sin elementos
                    array_push($permisos,array('id'=>$c->getId()));
                }
            endforeach;
        endforeach;

        return $this->render('clientes/index.html.twig', array(
            'clientes' => $clientes,
            'permisos' => $permisos
        ));
    }

    /**
     * Creates a new Clientes entity.
     *
     * @Route("/new", name="clientes_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $cliente = new Clientes();
        $form = $this->createForm('CoreBundle\Form\ClientesType', $cliente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cliente);
            $em->flush();

            return $this->redirectToRoute('clientes_show', array('id' => $cliente->getId()));
        }

        return $this->render('clientes/new.html.twig', array(
            'cliente' => $cliente,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Clientes entity.
     *
     * @Route("/{id}", name="clientes_show")
     * @Method("GET")
     */
    public function showAction(Clientes $cliente)
    {
        $deleteForm = $this->createDeleteForm($cliente);

        return $this->render('clientes/show.html.twig', array(
            'cliente' => $cliente,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Clientes entity.
     *
     * @Route("/{id}/edit", name="clientes_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Clientes $cliente)
    {
        $deleteForm = $this->createDeleteForm($cliente);
        $editForm = $this->createForm('CoreBundle\Form\ClientesType', $cliente);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cliente);
            $em->flush();

            //return $this->redirectToRoute('clientes_edit', array('id' => $cliente->getId()));
            return $this->redirectToRoute('clientes_index');

        }

        return $this->render('clientes/edit.html.twig', array(
            'cliente' => $cliente,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Clientes entity.
     *
     * @Route("/{id}", name="clientes_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Clientes $cliente)
    {
        $form = $this->createDeleteForm($cliente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cliente);
            $em->flush();
        }

        return $this->redirectToRoute('clientes_index');
    }

    /**
     * Creates a form to delete a Clientes entity.
     *
     * @param Clientes $cliente The Clientes entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Clientes $cliente)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('clientes_delete', array('id' => $cliente->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /** actualizar numero de encuestas disponibles
     *
     * @Route("/disponibles_update", name="backend_disponibles_update")
     */
    public function disponiblesUpdateAction(Request $request)
    {
        $id = $request->request->get('id',null);
        $numero = $request->request->get('numero',null);

        $em = $this->getDoctrine()->getManager();
        $encuesta = $em->getRepository('CoreBundle:Clientes_Permisos')->findOneByClientes($id);
        if($encuesta==null){
            $encuesta = new Clientes_Permisos();
            $cliente = $em->getRepository('CoreBundle:Clientes')->findOneById($id);
            $encuesta->setClientes($cliente);
            $json['herramientas'][11]=$numero;
            $encuesta->setPermisos(json_encode($json));
        }else{
            $json = json_decode($encuesta->getPermisos(),true);
            $json['herramientas'][11]=$numero;
            $encuesta->setPermisos(json_encode($json));
        }

        $em->persist($encuesta);
        $em->flush();
        return $this->redirect($this->generateUrl('clientes_index'));
    }
}
