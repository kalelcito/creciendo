<?php

namespace AdminBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
/**
 * Banners controller.
 *
 * @Route("/herramientas")
 */
class GenencuestasController extends Controller
{
    /** index test
     * Lists all Banners entities.
     *
     * @Route("/genencuesta", name="backend_genencuestas")
     * @Method("GET")
     */
    public function genencuestasAction()
    {
        return $this->render('AdminBundle:Herramientas:genencuestas.html.twig');
    }
    /** index test
     * Lists all Encuesta entities.
     *
     * @Route("/encuesta_new", name="backend_encuestaNew")
     * @Method("GET")
     */
    public function encuestaNewAction()
    {
        return $this->render('AdminBundle:Herramientas:encuestas_new.html.twig');
    }
    /** index test
     * Lists all Banners entities.
     *
     * @Route("/genid", name="backend_genid")
     * @Method("GET")
     */
    public function genidAction()
    {
        $opciones=array();
        $opciones[]=array(
        'valor'=> 1,
        'nombre'=>"opciones 1"
    );
          $opciones[]=array(
        'valor'=> 2,
        'nombre'=>"opciones 2"
    );
          $opciones[]=array(
        'valor'=> 3,
        'nombre'=>"opciones 3"
    );
        $pregunta0=array(
            "id"=>"id",
            "pregunta"=>"Esta es la pregunta 1",
            "descripcion"=>"Esta es la descripcion",
            "tipo"=>"radio",
            "required"=>true,
            "opciones"=>$opciones
        );
        $pregunta1=array(
            "id"=>"id",
            "pregunta"=>"Esta es la pregunta 1",
            "descripcion"=>"Esta es la descripcion",
            "tipo"=>"checkbox",
            "required"=>true,
            "opciones"=>$opciones
        );
        $pregunta2=array(
            "id"=>"id",
            "pregunta"=>"Esta es la pregunta 1",
            "descripcion"=>"Esta es la descripcion",
            "tipo"=>"text",
            "required"=>true,
        );
        $pregunta3=array(
            "id"=>"id",
            "pregunta"=>"Esta es la pregunta 1",
            "descripcion"=>"Esta es la descripcion",
            "tipo"=>"textarea",
            "required"=>true,
        );
        $pregunta4=array(
            "id"=>"id",
            "pregunta"=>"Esta es la pregunta 1",
            "descripcion"=>"Esta es la descripcion",
            "tipo"=>"select",
            "required"=>true,
            "opciones"=>$opciones
        );
        $preguntas=array();
        $seccion=array();
        $encuesta=array();
        $preguntas[]=$pregunta0;
        $preguntas[]=$pregunta1;
        $preguntas[]=$pregunta2;
        $preguntas[]=$pregunta3;
        $preguntas[]=$pregunta4;
        $seccion[]=array(
            "nombre"=>"El nombre",
            "descripcion"=>"Descripcion",
            "preguntas"=>$preguntas
        );
        $seccion[]=array(
            "nombre"=>"El nombre",
            "descripcion"=>"Descripcion",
            "preguntas"=>$preguntas
        );
        $encuesta["encuesta"]= array(
            "id"=>1,
            "otro dato"=>2,
        );
        $encuesta["secciones"]=$seccion;

        //    print_r($encuesta);
        //exit;
        return $this->render('AdminBundle:Herramientas:genid.html.twig',array(
            'encuesta'=>$encuesta
        ));
    }


}
