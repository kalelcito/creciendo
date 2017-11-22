<?php

namespace FrontendBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RedsocialController extends Controller
{
    /**
     * @Route("/redsocial", name="frontend_redsocial")
     */
    public function normaAction()
    {
        return $this->render('@Frontend/RedSocial/index.html.twig');
    }
}
