<?php

namespace FrontendBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class EncuestasController extends Controller
{
    /**
     * @Route("/encuesta/{id}", name="frontend_encuesta")
     */
    public function encuestaAction($id=null)
    {
        return $this->render('@Frontend/Encuestas/encuesta.html.twig',array('encuesta'=>$encuesta));
    }

    /**
     * @Route("/encuesta/{id}", name="frontend_encuesta_post")
     * @Method("POST")
     */
    public function encuestapostAction(Request $request, $id=null)
    {
        if($request->isXmlHttpRequest())
        {
            $encoders = array(new JsonEncoder());
            $normalizers = array(new ObjectNormalizer());
            $status="success";
            $msg="";
            
            $respuesta=array(
                'estatus' => $status,
                'msg'=>$msg
            );
            
            $response = new JsonResponse();
            $response->setStatusCode(200);
            $response->setData($respuesta);
            return $response;
        }
    }
}
