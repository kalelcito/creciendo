<?php

namespace FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class NoticiasController extends Controller
{
    /**
     * @Route("/noticias", name="noticias")
     */
    public function indexAction()
    {
        return $this->render('FrontendBundle:Noticias:index.html.twig');
    }
}