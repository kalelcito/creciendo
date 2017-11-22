<?php

namespace FrontendBundle\Controller;

use FrontendBundle\Form\MinutasType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PlantrabajoController extends Controller
{
    /**
     * @Route("/plantrabajo", name="frontend_plantrabajo")
     */
    public function indexAction()
    {
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY') || true === $this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            //return $this->redirect($this->generateUrl('frontend_sinacceso'));

        }
        $form= $this->createForm(MinutasType::class,null,array(
            'method' => 'POST',
        ));
        return $this->render('@Frontend/PlanTrabajo/plan.html.twig', array(
            'form' => $form->createView()
        ));

    }
    /**
     * @Route("/planrequisitio", name="frontend_planrequisito")
     */
    public function requisitoAction($idrequisitio)
    {
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY') || true === $this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
           // return $this->redirect($this->generateUrl('frontend_sinacceso'));

        }
        return $this->render('', array('idrequisito' => $idrequisitio));
    }
}
