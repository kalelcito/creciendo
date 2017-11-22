<?php

namespace AdminBundle\Controller;

use FrontendBundle\Form\BoletinType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /** index test
     * Lists all Administradores entities.
     *
     * @Route("/", name="admin_home")
     */
    public function indexAction()
    {
        return $this->render('AdminBundle:Default:index.html.twig');
    }

    public function boletinAction()
    {
        $form = $this->createForm(BoletinType::class,null,array(
            'method' => 'POST',
        ));
        return $this->render('@Frontend/partials/boletin.html.twig', array(
            'form' => $form->createView()));
    }
}
