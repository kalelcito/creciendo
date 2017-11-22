<?php

namespace FrontendBundle\Controller;

use CoreBundle\Entity\Climalaboral;
use CoreBundle\Entity\Diagnosticosalud;
use CoreBundle\Entity\Diagnosticoseguridad;
use CoreBundle\Entity\Diagnosticoweb;
use CoreBundle\Entity\Minutas;
use FrontendBundle\Form\ClimalaboralType;
use FrontendBundle\Form\DiagnosticosaludType;
use FrontendBundle\Form\DiagnosticoseguridadType;
use FrontendBundle\Form\DiagnosticowebType;
use FrontendBundle\Form\MinutasType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Swift_Attachment;

class ProgramasController extends Controller
{
    /**
     * @Route("/norma", name="norma")
     */
    public function normaAction()
    {
        return $this->render('@Frontend/Default/Inicio/norma.html.twig');
    }
	/**
	 * @Route("/gestion", name="gestion")
	 */
	public function gestionAction()
	{
		return $this->render('@Frontend/Default/Inicio/gestion.html.twig');
	}
    /**
     * @Route("/servicios", name="membresias")
     */
    public function membresiasAction()
    {
        return $this->render('@Frontend/Default/Inicio/membresias.html.twig');
    }
    /**
     * @Route("/norma/contenido0", name="contenido0")
     */
    public function contenido0Action()
    {
        return $this->render('@Frontend/Programa/contenido0.html.twig');
    }
    
    /**
     * @Route("/norma/contenido1", name="contenido1")
     */
    public function contenido1Action()
    {
        return $this->render('@Frontend/Programa/contenido1.html.twig');
    }

    /**
     * @Route("/norma/contenido2", name="contenido2")
     */
    public function contenido2Action()
    {
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY') || true === $this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            return $this->redirect($this->generateUrl('frontend_sinacceso'));

        }

        return $this->render('@Frontend/Programa/contenido2.html.twig');
    }

    /**
     * @Route("/norma/contenido3", name="contenido3")
     */
    public function contenido3Action()
    {
        return $this->render('@Frontend/Programa/contenido3.html.twig');
    }

    /**
     * @Route("/norma/contenido4", name="contenido4")
     */
    public function contenido4Action(Request $request)
    {
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY') || true === $this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            return $this->redirect($this->generateUrl('frontend_sinacceso'));

        }
        $id=$request->query->get('cont',0);

        $videos = array(
            'Contenido',
            'Objetivo',
            'Historia de la estandarización',
            'Norma ISO 19011',
            'Objetivo de la auditoria',
            'Principios de la Auditoria',
            'Comportamiento personal',
            'Marco Contextual CRESE',
            'RSE centrada en la persona',
            'Norma CRESE',
            'Gestión Auditable',
            'Estructura CRESE',
            'Principio 1 Respeto a la dignidad',
            'Principio 2 Solidaridad',
            'Principio 3 Subsidiaridad',
            'Principio 4 Bien Común',
            'Prerequisitos',
            'Prerequisitos Tema 1',
            'Prerequisitos Tema 2',
            'Prerequisitos Tema 3',
            'Prerequisitos Tema 4',
            'Prerequisitos Tema 5',
            'Prerequisitos Tema 6',
            'Prerequisitos Tema 7',
            'Ser estrictos',
            'Pegar y sobar',
            'Comprobar que suceda',
            'Criterios de existencia y difusión',
            'Criterios de participacion y mejora',
            'Criterio de vinculación con estrategia',
            'Auditores internos',
            'Método Auditoria 1',
            'Método Auditoria 2',
            'Plan de Auditoria',
            'Formato 1',
            'Formato 2',
            'Formato 3',
            'Caso 1',
            'Exámen',
        );
        $url=array(
           'Contenido',
           'Objetivo',
           'Historia de la estandarización',
           'Norma ISO 19011',
           'Objetivo de la auditoria',
           'Principios de la auditoria',
           'Comportamiento personal',
           'Marco contextual CRESE',
           'RSE centrada en las personas',
           'Norma CRESE',
           'Gestión auditable',
           'Estructura CRESE',
           'Principio 1 Respeto a la dignidad',
           'Principio 2 Solidaridad',
           'Principio 3 Subsidiaridad',
           'Principio 4 Bien Común',
           'Prerequisitos',
           'Prerequisito Tema  1',
           'Prerequisito Tema  2',
           'Prerequisito Tema  3',
           'Prerequisito Tema  4',
           'Prerequisito Tema  5',
           'Prerequisito Tema  6',
           'Prerequisito Tema  7',
           'Ser estrictos',
           'Pegar y sobar',
           'Comprobar que suceda',
           'Criterios de existencia y difusión',
           'Criterios de participación y mejora',
           'Criterios de vinculación con estrategia',
           'Auditores internos',
           'Metodo auditoria 1',
           'Metodo auditoria 2',
           'Plan de auditoria',
           'Formato 1',
           'Formato 2',
           'Formato 3',
           'Caso 1', 
           'Exámen',

        );


        return $this->render('@Frontend/Programa/contenido4.html.twig',array(
            'secciones' => $videos,'url'=>$url[$id],'titulo'=>($id+1).".- ". $videos[$id]));
    }

    /**
     * @Route("/norma/contenido5", name="contenido5")
     */
    public function contenido5Action()
    {
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY') || true === $this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            //return $this->redirect($this->generateUrl('frontend_sinacceso'));

        }
        $form= $this->createForm(DiagnosticowebType::class,null,array(
           'method' => 'POST',
        ));


        $preguntas =
            array(
                array('¿Existe un Comité Interno de Calidad Humana y Responsabilidad Social?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de participación a través de la asistencia a las reuniones mensuales y la generación de propuestas a la Dirección General de la empresa?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de mejora continua?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe vinculación o referencia de la existencia del Comité Interno con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe una política de Calidad Humana y Responsabilidad Social.?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de la participación del Comité, del personal o de otros grupos de interés en la propuesta, diseño, aplicación y/o revisión de la política?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de mejora continua?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe vinculación de la política con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe un Manual de Calidad Humana y Responsabilidad Social?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de la participación del Comité, del personal o de otros grupos de interés en la propuesta, diseño, aplicación y/o revisión del Manual?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de mejora continua?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe vinculación de la existencia del Manual con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe un informe anual de Calidad Humana y Responsabilidad Social?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de la participación del Comité, del personal o de otros grupos de interés en la propuesta, diseño, aplicación y/o revisión del Informe?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de mejora continua?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe vinculación de la existencia del Informe Anual con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe un programa anual de auditorías internas aplicables a un Sistema de Gestión de Calidad Humana y Responsabilidad Social?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de la participación del Comité, del personal o de otros grupos de interés en la propuesta, diseño, aplicación y/o revisión de las auditorías internas?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de mejora continua?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe vinculación del programa de auditorías internas con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe un Comité Interno de Calidad Humana y Responsabilidad Social?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de participación a través de la asistencia a las reuniones mensuales y la generación de propuestas a la Dirección General de la empresa?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de mejora continua?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe vinculación o referencia de la existencia del Comité Interno con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe una política de Calidad Humana y Responsabilidad Social.?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de la participación del Comité, del personal o de otros grupos de interés en la propuesta, diseño, aplicación y/o revisión de la política?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de mejora continua?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe vinculación de la política con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe un Comité Interno de Calidad Humana y Responsabilidad Social?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de participación a través de la asistencia a las reuniones mensuales y la generación de propuestas a la Dirección General de la empresa?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de mejora continua?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe vinculación o referencia de la existencia del Comité Interno con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe una política de Calidad Humana y Responsabilidad Social.?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de la participación del Comité, del personal o de otros grupos de interés en la propuesta, diseño, aplicación y/o revisión de la política?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de mejora continua?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe vinculación de la política con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe un Manual de Calidad Humana y Responsabilidad Social?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe un Comité Interno de Calidad Humana y Responsabilidad Social?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de participación a través de la asistencia a las reuniones mensuales y la generación de propuestas a la Dirección General de la empresa?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de mejora continua?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe vinculación o referencia de la existencia del Comité Interno con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe una política de Calidad Humana y Responsabilidad Social.?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de la participación del Comité, del personal o de otros grupos de interés en la propuesta, diseño, aplicación y/o revisión de la política?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de mejora continua?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe vinculación de la política con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe un Manual de Calidad Humana y Responsabilidad Social?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe un Comité Interno de Calidad Humana y Responsabilidad Social?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de participación a través de la asistencia a las reuniones mensuales y la generación de propuestas a la Dirección General de la empresa?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de mejora continua?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe vinculación o referencia de la existencia del Comité Interno con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe una política de Calidad Humana y Responsabilidad Social.?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de la participación del Comité, del personal o de otros grupos de interés en la propuesta, diseño, aplicación y/o revisión de la política?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe un Comité Interno de Calidad Humana y Responsabilidad Social?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de participación a través de la asistencia a las reuniones mensuales y la generación de propuestas a la Dirección General de la empresa?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de mejora continua?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe vinculación o referencia de la existencia del Comité Interno con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe una política de Calidad Humana y Responsabilidad Social.?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de la participación del Comité, del personal o de otros grupos de interés en la propuesta, diseño, aplicación y/o revisión de la política?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de mejora continua?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe vinculación de la política con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe un Manual de Calidad Humana y Responsabilidad Social?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe un Comité Interno de Calidad Humana y Responsabilidad Social?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de participación a través de la asistencia a las reuniones mensuales y la generación de propuestas a la Dirección General de la empresa?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de mejora continua?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe un Comité Interno de Calidad Humana y Responsabilidad Social?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de participación a través de la asistencia a las reuniones mensuales y la generación de propuestas a la Dirección General de la empresa?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de mejora continua?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe vinculación o referencia de la existencia del Comité Interno con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe una política de Calidad Humana y Responsabilidad Social.?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de la participación del Comité, del personal o de otros grupos de interés en la propuesta, diseño, aplicación y/o revisión de la política?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de mejora continua?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe vinculación de la política con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe un Manual de Calidad Humana y Responsabilidad Social?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe un Comité Interno de Calidad Humana y Responsabilidad Social?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de participación a través de la asistencia a las reuniones mensuales y la generación de propuestas a la Dirección General de la empresa?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de mejora continua?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe vinculación o referencia de la existencia del Comité Interno con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe una política de Calidad Humana y Responsabilidad Social.?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de la participación del Comité, del personal o de otros grupos de interés en la propuesta, diseño, aplicación y/o revisión de la política?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de mejora continua?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe un Comité Interno de Calidad Humana y Responsabilidad Social?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de participación a través de la asistencia a las reuniones mensuales y la generación de propuestas a la Dirección General de la empresa?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de mejora continua?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe vinculación o referencia de la existencia del Comité Interno con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe una política de Calidad Humana y Responsabilidad Social.?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de la participación del Comité, del personal o de otros grupos de interés en la propuesta, diseño, aplicación y/o revisión de la política?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de mejora continua?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe vinculación de la política con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe un Manual de Calidad Humana y Responsabilidad Social?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe un Comité Interno de Calidad Humana y Responsabilidad Social?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de participación a través de la asistencia a las reuniones mensuales y la generación de propuestas a la Dirección General de la empresa?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de mejora continua?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe un Comité Interno de Calidad Humana y Responsabilidad Social?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de participación a través de la asistencia a las reuniones mensuales y la generación de propuestas a la Dirección General de la empresa?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de mejora continua?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe vinculación o referencia de la existencia del Comité Interno con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe una política de Calidad Humana y Responsabilidad Social.?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de la participación del Comité, del personal o de otros grupos de interés en la propuesta, diseño, aplicación y/o revisión de la política?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de mejora continua?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe vinculación de la política con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                );
        return $this->render('@Frontend/Programa/contenido5.html.twig',array(
            'preguntas' => $preguntas,
            'form' => $form->createView(),)
        );
    }

    /**
     * @Route("/enviar", name="enviar")
     */
    public function enviarAction(Request $request){
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY') || true === $this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            return $this->redirect($this->generateUrl('frontend_sinacceso'));

        }
        $form = $this->createForm(DiagnosticowebType::class,null,array(
            'method' => 'POST',
        ));

        $form->handleRequest($request);
        if ($form->isSubmitted()){
            if ($form->isValid()){
                $data = $form->getData();
                $em = $this->getDoctrine()->getManager();

                $user = $this->getUser()->getId();
                /*$cliente = $em->getRepository('CoreBundle:Diagnosticoweb')->findOneByIdCliente($user);*/
                $repository = $this->getDoctrine()->getRepository('CoreBundle:Diagnosticoweb');
                $query = $repository->createQueryBuilder('b')
                    ->where('b.id_cliente = :id_cliente')
                    ->setParameter('id_cliente', $user)
                    ->getQuery();
                $clientes = $query->getResult();

                if (!$clientes){
                    $encuesta = new Diagnosticoweb();
                    $encuesta->setIdCliente($this->getUser()->getId());
                    $encuesta->setA01($data['a01']);
                    $encuesta->setB01($data['b01']);
                    $encuesta->setA02($data['a02']);
                    $encuesta->setB02($data['b02']);
                    $encuesta->setA03($data['a03']);
                    $encuesta->setB03($data['b03']);
                    $encuesta->setA04($data['a04']);
                    $encuesta->setB04($data['b04']);
                    $encuesta->setA05($data['a05']);
                    $encuesta->setB05($data['b05']);
                    $encuesta->setA06($data['a06']);
                    $encuesta->setB06($data['b06']);
                    $encuesta->setA07($data['a07']);
                    $encuesta->setB07($data['b07']);
                    $encuesta->setA08($data['a08']);
                    $encuesta->setB08($data['b08']);
                    $encuesta->setA09($data['a09']);
                    $encuesta->setB09($data['b09']);
                    $encuesta->setA10($data['a10']);
                    $encuesta->setB10($data['b10']);
                    $encuesta->setA11($data['a11']);
                    $encuesta->setB11($data['b11']);
                    $encuesta->setA12($data['a12']);
                    $encuesta->setB12($data['b12']);
                    $encuesta->setA13($data['a13']);
                    $encuesta->setB13($data['b13']);
                    $encuesta->setA14($data['a14']);
                    $encuesta->setB14($data['b14']);
                    $encuesta->setA15($data['a15']);
                    $encuesta->setB15($data['b15']);
                    $encuesta->setA16($data['a16']);
                    $encuesta->setB16($data['b16']);
                    $encuesta->setA17($data['a17']);
                    $encuesta->setB17($data['b17']);
                    $encuesta->setA18($data['a18']);
                    $encuesta->setB18($data['b18']);
                    $encuesta->setA19($data['a19']);
                    $encuesta->setB19($data['b19']);
                    $encuesta->setA20($data['a20']);
                    $encuesta->setB20($data['b20']);
                    $encuesta->setA21($data['a21']);
                    $encuesta->setB21($data['b21']);
                    $encuesta->setA22($data['a22']);
                    $encuesta->setB22($data['b22']);
                    $encuesta->setA23($data['a23']);
                    $encuesta->setB23($data['b23']);
                    $encuesta->setA24($data['a24']);
                    $encuesta->setB24($data['b24']);
                    $encuesta->setA25($data['a25']);
                    $encuesta->setB25($data['b25']);
                    $encuesta->setA26($data['a26']);
                    $encuesta->setB26($data['b26']);
                    $encuesta->setA27($data['a27']);
                    $encuesta->setB27($data['b27']);
                    $encuesta->setA28($data['a28']);
                    $encuesta->setB28($data['b28']);
                    $encuesta->setA29($data['a29']);
                    $encuesta->setB29($data['b29']);
                    $encuesta->setA30($data['a30']);
                    $encuesta->setB30($data['b30']);
                    $encuesta->setA31($data['a31']);
                    $encuesta->setB31($data['b31']);
                    $encuesta->setA32($data['a32']);
                    $encuesta->setB32($data['b32']);
                    $encuesta->setA33($data['a33']);
                    $encuesta->setB33($data['b33']);
                    $encuesta->setA34($data['a34']);
                    $encuesta->setB34($data['b34']);
                    $encuesta->setA35($data['a35']);
                    $encuesta->setB35($data['b35']);
                    $encuesta->setA36($data['a36']);
                    $encuesta->setB36($data['b36']);
                    $encuesta->setA37($data['a37']);
                    $encuesta->setB37($data['b37']);
                    $encuesta->setA38($data['a38']);
                    $encuesta->setB38($data['b38']);
                    $encuesta->setA39($data['a39']);
                    $encuesta->setB39($data['b39']);
                    $encuesta->setA40($data['a40']);
                    $encuesta->setB40($data['b40']);
                    $encuesta->setA41($data['a41']);
                    $encuesta->setB41($data['b41']);
                    $encuesta->setA42($data['a42']);
                    $encuesta->setB42($data['b42']);
                    $encuesta->setA43($data['a43']);
                    $encuesta->setB43($data['b43']);
                    $encuesta->setA44($data['a44']);
                    $encuesta->setB44($data['b44']);
                    $encuesta->setA45($data['a45']);
                    $encuesta->setB45($data['b45']);
                    $encuesta->setA46($data['a46']);
                    $encuesta->setB46($data['b46']);
                    $encuesta->setA47($data['a47']);
                    $encuesta->setB47($data['b47']);
                    $encuesta->setA48($data['a48']);
                    $encuesta->setB48($data['b48']);
                    $encuesta->setA49($data['a49']);
                    $encuesta->setB49($data['b49']);
                    $encuesta->setA50($data['a50']);
                    $encuesta->setB50($data['b50']);
                    $encuesta->setA51($data['a51']);
                    $encuesta->setB51($data['b51']);
                    $encuesta->setA52($data['a52']);
                    $encuesta->setB52($data['b52']);
                    $encuesta->setA53($data['a53']);
                    $encuesta->setB53($data['b53']);
                    $encuesta->setA54($data['a54']);
                    $encuesta->setB54($data['b54']);
                    $encuesta->setA55($data['a55']);
                    $encuesta->setB55($data['b55']);
                    $encuesta->setA56($data['a56']);
                    $encuesta->setB56($data['b56']);
                    $encuesta->setA57($data['a57']);
                    $encuesta->setB57($data['b57']);
                    $encuesta->setA58($data['a58']);
                    $encuesta->setB58($data['b58']);
                    $encuesta->setA59($data['a59']);
                    $encuesta->setB59($data['b59']);
                    $encuesta->setA60($data['a60']);
                    $encuesta->setB60($data['b60']);
                    $encuesta->setA61($data['a61']);
                    $encuesta->setB61($data['b61']);
                    $encuesta->setA62($data['a62']);
                    $encuesta->setB62($data['b62']);
                    $encuesta->setA63($data['a63']);
                    $encuesta->setB63($data['b63']);
                    $encuesta->setA64($data['a64']);
                    $encuesta->setB64($data['b64']);
                    $encuesta->setA65($data['a65']);
                    $encuesta->setB65($data['b65']);
                    $encuesta->setA66($data['a66']);
                    $encuesta->setB66($data['b66']);
                    $encuesta->setA67($data['a67']);
                    $encuesta->setB67($data['b67']);
                    $encuesta->setA68($data['a68']);
                    $encuesta->setB68($data['b68']);
                    $encuesta->setA69($data['a69']);
                    $encuesta->setB69($data['b69']);
                    $encuesta->setA70($data['a70']);
                    $encuesta->setB70($data['b70']);
                    $encuesta->setA71($data['a71']);
                    $encuesta->setB71($data['b71']);
                    $encuesta->setA72($data['a72']);
                    $encuesta->setB72($data['b72']);
                    $encuesta->setA73($data['a73']);
                    $encuesta->setB73($data['b73']);
                    $encuesta->setA74($data['a74']);
                    $encuesta->setB74($data['b74']);
                    $encuesta->setA75($data['a75']);
                    $encuesta->setB75($data['b75']);
                    $encuesta->setA76($data['a76']);
                    $encuesta->setB76($data['b76']);
                    $encuesta->setA77($data['a77']);
                    $encuesta->setB77($data['b77']);
                    $encuesta->setA78($data['a78']);
                    $encuesta->setB78($data['b78']);
                    $encuesta->setA79($data['a79']);
                    $encuesta->setB79($data['b79']);
                    $encuesta->setA80($data['a80']);
                    $encuesta->setB80($data['b80']);
                    $encuesta->setA81($data['a81']);
                    $encuesta->setB81($data['b81']);
                    $encuesta->setA82($data['a82']);
                    $encuesta->setB82($data['b82']);
                    $encuesta->setA83($data['a83']);
                    $encuesta->setB83($data['b83']);
                    $encuesta->setA84($data['a84']);
                    $encuesta->setB84($data['b84']);
                    $encuesta->setA85($data['a85']);
                    $encuesta->setB85($data['b85']);
                    $encuesta->setA86($data['a86']);
                    $encuesta->setB86($data['b86']);
                    $encuesta->setA87($data['a87']);
                    $encuesta->setB87($data['b87']);
                    $encuesta->setA88($data['a88']);
                    $encuesta->setB88($data['b88']);
                    $encuesta->setA89($data['a89']);
                    $encuesta->setB89($data['b89']);
                    $encuesta->setA90($data['a90']);
                    $encuesta->setB90($data['b90']);
                    $encuesta->setA91($data['a91']);
                    $encuesta->setB91($data['b91']);
                    $encuesta->setA92($data['a92']);
                    $encuesta->setB92($data['b92']);
                    $encuesta->setA93($data['a93']);
                    $encuesta->setB93($data['b93']);
                    $encuesta->setA94($data['a94']);
                    $encuesta->setB94($data['b94']);
                    $encuesta->setA95($data['a95']);
                    $encuesta->setB95($data['b95']);
                    $encuesta->setA96($data['a96']);
                    $encuesta->setB96($data['b96']);
                    $encuesta->setA97($data['a97']);
                    $encuesta->setB97($data['b97']);
                    $encuesta->setA98($data['a98']);
                    $encuesta->setB98($data['b98']);
                    $encuesta->setA99($data['a99']);
                    $encuesta->setB99($data['b99']);
                    $encuesta->setA100($data['a100']);
                    $encuesta->setB100($data['b100']);
                    $encuesta->setA101($data['a101']);
                    $encuesta->setB101($data['b101']);
                    $encuesta->setA102($data['a102']);
                    $encuesta->setB102($data['b102']);
                    $encuesta->setA103($data['a103']);
                    $encuesta->setB103($data['b103']);
                    $encuesta->setA104($data['a104']);
                    $encuesta->setB104($data['b104']);
                    $encuesta->setA105($data['a105']);
                    $encuesta->setB105($data['b105']);
                    $encuesta->setA106($data['a106']);
                    $encuesta->setB106($data['b106']);
                    $encuesta->setA107($data['a107']);
                    $encuesta->setB107($data['b107']);
                    $encuesta->setA108($data['a108']);
                    $encuesta->setB108($data['b108']);
                    $encuesta->setA109($data['a109']);
                    $encuesta->setB109($data['b109']);
                    $encuesta->setA110($data['a110']);
                    $encuesta->setB110($data['b110']);
                    $encuesta->setA111($data['a111']);
                    $encuesta->setB111($data['b111']);
                    $encuesta->setA112($data['a112']);
                    $encuesta->setB112($data['b112']);
                    $encuesta->setA113($data['a113']);
                    $encuesta->setB113($data['b113']);
                    $encuesta->setA114($data['a114']);
                    $encuesta->setB114($data['b114']);
                    $encuesta->setA115($data['a115']);
                    $encuesta->setB115($data['b115']);
                    $encuesta->setA116($data['a116']);
                    $encuesta->setB116($data['b116']);
                    $encuesta->setA117($data['a117']);
                    $encuesta->setB117($data['b117']);
                    $encuesta->setA118($data['a118']);
                    $encuesta->setB118($data['b118']);
                    $encuesta->setA119($data['a119']);
                    $encuesta->setB119($data['b119']);
                    $encuesta->setA120($data['a120']);
                    $encuesta->setB120($data['b120']);
                    $encuesta->setA121($data['a121']);
                    $encuesta->setB121($data['b121']);
                    $encuesta->setA122($data['a122']);
                    $encuesta->setB122($data['b122']);
                    $encuesta->setA123($data['a123']);
                    $encuesta->setB123($data['b123']);
                    $encuesta->setA124($data['a124']);
                    $encuesta->setB124($data['b124']);
                    $encuesta->setA125($data['a125']);
                    $encuesta->setB125($data['b125']);
                    $em->persist($encuesta);
                    $em->flush();


                    $preguntas =
                        array(
                            array('¿Existe un Comité Interno de Calidad Humana y Responsabilidad Social?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe evidencia de participación a través de la asistencia a las reuniones mensuales y la generación de propuestas a la Dirección General de la empresa?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe evidencia de mejora continua?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe vinculación o referencia de la existencia del Comité Interno con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe una política de Calidad Humana y Responsabilidad Social.?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe evidencia de la participación del Comité, del personal o de otros grupos de interés en la propuesta, diseño, aplicación y/o revisión de la política?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe evidencia de mejora continua?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe vinculación de la política con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe un Manual de Calidad Humana y Responsabilidad Social?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe evidencia de la participación del Comité, del personal o de otros grupos de interés en la propuesta, diseño, aplicación y/o revisión del Manual?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe evidencia de mejora continua?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe vinculación de la existencia del Manual con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe un informe anual de Calidad Humana y Responsabilidad Social?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe evidencia de la participación del Comité, del personal o de otros grupos de interés en la propuesta, diseño, aplicación y/o revisión del Informe?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe evidencia de mejora continua?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe vinculación de la existencia del Informe Anual con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe un programa anual de auditorías internas aplicables a un Sistema de Gestión de Calidad Humana y Responsabilidad Social?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe evidencia de la participación del Comité, del personal o de otros grupos de interés en la propuesta, diseño, aplicación y/o revisión de las auditorías internas?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe evidencia de mejora continua?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe vinculación del programa de auditorías internas con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe un Comité Interno de Calidad Humana y Responsabilidad Social?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe evidencia de participación a través de la asistencia a las reuniones mensuales y la generación de propuestas a la Dirección General de la empresa?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe evidencia de mejora continua?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe vinculación o referencia de la existencia del Comité Interno con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe una política de Calidad Humana y Responsabilidad Social.?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe evidencia de la participación del Comité, del personal o de otros grupos de interés en la propuesta, diseño, aplicación y/o revisión de la política?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe evidencia de mejora continua?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe vinculación de la política con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe un Comité Interno de Calidad Humana y Responsabilidad Social?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe evidencia de participación a través de la asistencia a las reuniones mensuales y la generación de propuestas a la Dirección General de la empresa?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe evidencia de mejora continua?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe vinculación o referencia de la existencia del Comité Interno con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe una política de Calidad Humana y Responsabilidad Social.?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe evidencia de la participación del Comité, del personal o de otros grupos de interés en la propuesta, diseño, aplicación y/o revisión de la política?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe evidencia de mejora continua?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe vinculación de la política con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe un Manual de Calidad Humana y Responsabilidad Social?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe un Comité Interno de Calidad Humana y Responsabilidad Social?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe evidencia de participación a través de la asistencia a las reuniones mensuales y la generación de propuestas a la Dirección General de la empresa?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe evidencia de mejora continua?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe vinculación o referencia de la existencia del Comité Interno con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe una política de Calidad Humana y Responsabilidad Social.?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe evidencia de la participación del Comité, del personal o de otros grupos de interés en la propuesta, diseño, aplicación y/o revisión de la política?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe evidencia de mejora continua?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe vinculación de la política con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe un Manual de Calidad Humana y Responsabilidad Social?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe un Comité Interno de Calidad Humana y Responsabilidad Social?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe evidencia de participación a través de la asistencia a las reuniones mensuales y la generación de propuestas a la Dirección General de la empresa?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe evidencia de mejora continua?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe vinculación o referencia de la existencia del Comité Interno con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe una política de Calidad Humana y Responsabilidad Social.?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe evidencia de la participación del Comité, del personal o de otros grupos de interés en la propuesta, diseño, aplicación y/o revisión de la política?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe un Comité Interno de Calidad Humana y Responsabilidad Social?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe evidencia de participación a través de la asistencia a las reuniones mensuales y la generación de propuestas a la Dirección General de la empresa?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe evidencia de mejora continua?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe vinculación o referencia de la existencia del Comité Interno con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe una política de Calidad Humana y Responsabilidad Social.?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe evidencia de la participación del Comité, del personal o de otros grupos de interés en la propuesta, diseño, aplicación y/o revisión de la política?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe evidencia de mejora continua?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe vinculación de la política con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe un Manual de Calidad Humana y Responsabilidad Social?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe un Comité Interno de Calidad Humana y Responsabilidad Social?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe evidencia de participación a través de la asistencia a las reuniones mensuales y la generación de propuestas a la Dirección General de la empresa?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe evidencia de mejora continua?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe un Comité Interno de Calidad Humana y Responsabilidad Social?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe evidencia de participación a través de la asistencia a las reuniones mensuales y la generación de propuestas a la Dirección General de la empresa?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe evidencia de mejora continua?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe vinculación o referencia de la existencia del Comité Interno con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe una política de Calidad Humana y Responsabilidad Social.?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe evidencia de la participación del Comité, del personal o de otros grupos de interés en la propuesta, diseño, aplicación y/o revisión de la política?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe evidencia de mejora continua?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe vinculación de la política con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe un Manual de Calidad Humana y Responsabilidad Social?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe un Comité Interno de Calidad Humana y Responsabilidad Social?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe evidencia de participación a través de la asistencia a las reuniones mensuales y la generación de propuestas a la Dirección General de la empresa?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe evidencia de mejora continua?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe vinculación o referencia de la existencia del Comité Interno con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe una política de Calidad Humana y Responsabilidad Social.?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe evidencia de la participación del Comité, del personal o de otros grupos de interés en la propuesta, diseño, aplicación y/o revisión de la política?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe evidencia de mejora continua?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe un Comité Interno de Calidad Humana y Responsabilidad Social?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe evidencia de participación a través de la asistencia a las reuniones mensuales y la generación de propuestas a la Dirección General de la empresa?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe evidencia de mejora continua?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe vinculación o referencia de la existencia del Comité Interno con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe una política de Calidad Humana y Responsabilidad Social.?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe evidencia de la participación del Comité, del personal o de otros grupos de interés en la propuesta, diseño, aplicación y/o revisión de la política?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe evidencia de mejora continua?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe vinculación de la política con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe un Manual de Calidad Humana y Responsabilidad Social?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe un Comité Interno de Calidad Humana y Responsabilidad Social?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe evidencia de participación a través de la asistencia a las reuniones mensuales y la generación de propuestas a la Dirección General de la empresa?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe evidencia de mejora continua?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe un Comité Interno de Calidad Humana y Responsabilidad Social?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe evidencia de participación a través de la asistencia a las reuniones mensuales y la generación de propuestas a la Dirección General de la empresa?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe evidencia de mejora continua?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe vinculación o referencia de la existencia del Comité Interno con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe una política de Calidad Humana y Responsabilidad Social.?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe evidencia de la participación del Comité, del personal o de otros grupos de interés en la propuesta, diseño, aplicación y/o revisión de la política?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe evidencia de mejora continua?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                            array('¿Existe vinculación de la política con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                                'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                                '50%',
                                'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                        );

                    $user = $this->getUser()->getId();
                    $repository = $this->getDoctrine()->getRepository('CoreBundle:Diagnosticoweb');
                    $query = $repository->createQueryBuilder('b')
                        ->where('b.id_cliente = :id_cliente')
                        ->setParameter('id_cliente', $user)
                        ->getQuery();
                    $clientes = $query->getArrayResult();

                    /*$repository = $this->getDoctrine()->getRepository('CoreBundle:Clientes');
                    $query = $repository->createQueryBuilder('c')
                        ->where('c.id = :id')
                        ->setParameter('id', $user)
                        ->getQuery();
                    $usuario = $query->getResult();


                    $correo = $usuario->getCorreo();*/

                    $puntos = $repository = $this->getDoctrine()->getRepository('CoreBundle:Clientes')->findOneById($user);
                    $correo = $puntos->getEmail();

                    $body = '<table>
                            <thead>
                            <tr>
                                <th>Num	</th>
                               <th>Reactivo	</th>
                               <th>Respuesta</th>	
                               <th>Comentario</th>	
                               <th>SI	</th>
                                <th>En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro</th>
                               <th>50%	</th>
                                <th>En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro	</th>
                                <th>NO</th>
                            </tr>
                            </thead>
                            <tbody>';
                    $i = 1;
                    $j=1;
                    foreach ($preguntas as $pregunta){
                        if ($j>=10){$ja=$j;}else{$ja="0".$j;};
                        $valor="";$valor2="";
                        $text= "";
                        $a="";
                        $b="";
                        $c="";
                        $d="";
                        $e="";
                        if(!is_null($clientes[0]["a".$ja])){
                            $valor=intval($clientes[0]["a".$ja]);

                            if ($valor===1 && $valor!=""){
                                $text = "Si";
                                $a = 1;
                                $b = 0;
                                $c = 0;
                                $d = 0;
                                $e = 0;
                            }
                            if ($valor===2 && $valor!=""){
                                $text = "En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro";
                                $a = 0;
                                $b = 1;
                                $c = 0;
                                $d = 0;
                                $e = 0;
                            }
                            if ($valor===3 && $valor!=""){
                                $text = "50%";
                                $a = 0;
                                $b = 0;
                                $c = 1;
                                $d = 0;
                                $e = 0;
                            }
                            if ($valor===4 && $valor!=""){
                                $text = "En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro";
                                $a = 0;
                                $b = 0;
                                $c = 0;
                                $d = 1;
                                $e = 0;
                            }
                            if ($valor===5 && $valor!=""){
                                $text = "No";
                                $a = 0;
                                $b = 0;
                                $c = 0;
                                $d = 0;
                                $e = 1;
                            }
                        }

                        if(trim($clientes[0]["b".$ja])!=""){
                            $valor2=$clientes[0]["b".$ja];
                        }

                        $body.='<tr><td>'.$i.'</td><td>'.$pregunta[0].'</td><td>'.$text.'</td><td>'.$valor2.'</td><td>'.$a.'</td><td>'.$b.'</td><td>'.$c.'</td><td>'.$d.'</td><td>'.$e.'</td>';
                        $i++;
                        $j++;

                    }

                    $body.=' </tbody>
                        </table>';

                    /*file_put_contents( $this->getParameter('web_dir')."xls/".$user.".xls",utf8_decode($body));*/
                    file_put_contents( $this->getParameter('web_dir')."xls/".$user.".xls",mb_convert_encoding($body, "ISO-8859-1", mb_detect_encoding($body, "UTF-8, ISO-8859-1, ISO-8859-15", true)));
                    $uno = "cesar@innology.mx";
                    $dos = "cricardez@crese.org";

                    $message = \Swift_Message::newInstance()
                        ->setSubject('Nuevo Cuestionario')
                        ->setFrom($correo)
                        ->setTo($uno)
                        ->attach(Swift_Attachment::fromPath( $this->getParameter('web_dir')."xls/".$user.".xls"))
                        ->setBody('Nuevo Cuestionario',
                            'text/html'
                        );
                    $this->get('mailer')->send($message);

                    $request->getSession()->getFlashBag()->add('success', 'Encuesta Terminada!');

                    /*$this->get('session')->setFlash('notice', 'Your changes were saved!');*/

                    return $this->redirect($this->generateUrl('gestion'));

                }

            }
        }

        return $this->render('@Frontend/Default/Inicio/gestion.html.twig', array(
            'form' => $form->createView(),));
    }


    /**
     * @Route("/correo", name="correo")
     */
    public function correoAction(Request $request)
    {
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY') || true === $this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            return $this->redirect($this->generateUrl('frontend_sinacceso'));

        }
        $preguntas =
            array(
                array('¿Existe un Comité Interno de Calidad Humana y Responsabilidad Social?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de participación a través de la asistencia a las reuniones mensuales y la generación de propuestas a la Dirección General de la empresa?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de mejora continua?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe vinculación o referencia de la existencia del Comité Interno con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe una política de Calidad Humana y Responsabilidad Social.?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de la participación del Comité, del personal o de otros grupos de interés en la propuesta, diseño, aplicación y/o revisión de la política?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de mejora continua?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe vinculación de la política con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe un Manual de Calidad Humana y Responsabilidad Social?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de la participación del Comité, del personal o de otros grupos de interés en la propuesta, diseño, aplicación y/o revisión del Manual?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de mejora continua?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe vinculación de la existencia del Manual con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe un informe anual de Calidad Humana y Responsabilidad Social?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de la participación del Comité, del personal o de otros grupos de interés en la propuesta, diseño, aplicación y/o revisión del Informe?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de mejora continua?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe vinculación de la existencia del Informe Anual con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe un programa anual de auditorías internas aplicables a un Sistema de Gestión de Calidad Humana y Responsabilidad Social?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de la participación del Comité, del personal o de otros grupos de interés en la propuesta, diseño, aplicación y/o revisión de las auditorías internas?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de mejora continua?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe vinculación del programa de auditorías internas con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe un Comité Interno de Calidad Humana y Responsabilidad Social?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de participación a través de la asistencia a las reuniones mensuales y la generación de propuestas a la Dirección General de la empresa?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de mejora continua?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe vinculación o referencia de la existencia del Comité Interno con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe una política de Calidad Humana y Responsabilidad Social.?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de la participación del Comité, del personal o de otros grupos de interés en la propuesta, diseño, aplicación y/o revisión de la política?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de mejora continua?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe vinculación de la política con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe un Comité Interno de Calidad Humana y Responsabilidad Social?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de participación a través de la asistencia a las reuniones mensuales y la generación de propuestas a la Dirección General de la empresa?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de mejora continua?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe vinculación o referencia de la existencia del Comité Interno con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe una política de Calidad Humana y Responsabilidad Social.?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de la participación del Comité, del personal o de otros grupos de interés en la propuesta, diseño, aplicación y/o revisión de la política?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de mejora continua?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe vinculación de la política con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe un Manual de Calidad Humana y Responsabilidad Social?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe un Comité Interno de Calidad Humana y Responsabilidad Social?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de participación a través de la asistencia a las reuniones mensuales y la generación de propuestas a la Dirección General de la empresa?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de mejora continua?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe vinculación o referencia de la existencia del Comité Interno con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe una política de Calidad Humana y Responsabilidad Social.?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de la participación del Comité, del personal o de otros grupos de interés en la propuesta, diseño, aplicación y/o revisión de la política?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de mejora continua?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe vinculación de la política con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe un Manual de Calidad Humana y Responsabilidad Social?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe un Comité Interno de Calidad Humana y Responsabilidad Social?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de participación a través de la asistencia a las reuniones mensuales y la generación de propuestas a la Dirección General de la empresa?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de mejora continua?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe vinculación o referencia de la existencia del Comité Interno con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe una política de Calidad Humana y Responsabilidad Social.?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de la participación del Comité, del personal o de otros grupos de interés en la propuesta, diseño, aplicación y/o revisión de la política?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe un Comité Interno de Calidad Humana y Responsabilidad Social?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de participación a través de la asistencia a las reuniones mensuales y la generación de propuestas a la Dirección General de la empresa?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de mejora continua?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe vinculación o referencia de la existencia del Comité Interno con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe una política de Calidad Humana y Responsabilidad Social.?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de la participación del Comité, del personal o de otros grupos de interés en la propuesta, diseño, aplicación y/o revisión de la política?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de mejora continua?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe vinculación de la política con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe un Manual de Calidad Humana y Responsabilidad Social?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe un Comité Interno de Calidad Humana y Responsabilidad Social?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de participación a través de la asistencia a las reuniones mensuales y la generación de propuestas a la Dirección General de la empresa?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de mejora continua?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe un Comité Interno de Calidad Humana y Responsabilidad Social?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de participación a través de la asistencia a las reuniones mensuales y la generación de propuestas a la Dirección General de la empresa?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de mejora continua?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe vinculación o referencia de la existencia del Comité Interno con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe una política de Calidad Humana y Responsabilidad Social.?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de la participación del Comité, del personal o de otros grupos de interés en la propuesta, diseño, aplicación y/o revisión de la política?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de mejora continua?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe vinculación de la política con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe un Manual de Calidad Humana y Responsabilidad Social?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe un Comité Interno de Calidad Humana y Responsabilidad Social?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de participación a través de la asistencia a las reuniones mensuales y la generación de propuestas a la Dirección General de la empresa?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de mejora continua?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe vinculación o referencia de la existencia del Comité Interno con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe una política de Calidad Humana y Responsabilidad Social.?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de la participación del Comité, del personal o de otros grupos de interés en la propuesta, diseño, aplicación y/o revisión de la política?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de mejora continua?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe un Comité Interno de Calidad Humana y Responsabilidad Social?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de participación a través de la asistencia a las reuniones mensuales y la generación de propuestas a la Dirección General de la empresa?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de mejora continua?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe vinculación o referencia de la existencia del Comité Interno con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe una política de Calidad Humana y Responsabilidad Social.?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de la participación del Comité, del personal o de otros grupos de interés en la propuesta, diseño, aplicación y/o revisión de la política?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de mejora continua?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe vinculación de la política con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe un Manual de Calidad Humana y Responsabilidad Social?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe un Comité Interno de Calidad Humana y Responsabilidad Social?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de participación a través de la asistencia a las reuniones mensuales y la generación de propuestas a la Dirección General de la empresa?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de mejora continua?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe un Comité Interno de Calidad Humana y Responsabilidad Social?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de participación a través de la asistencia a las reuniones mensuales y la generación de propuestas a la Dirección General de la empresa?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de mejora continua?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe vinculación o referencia de la existencia del Comité Interno con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe una política de Calidad Humana y Responsabilidad Social.?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Se difunde y conoce su existencia de acuerdo al alcance establecido?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de la participación del Comité, del personal o de otros grupos de interés en la propuesta, diseño, aplicación y/o revisión de la política?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe evidencia de mejora continua?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
                array('¿Existe vinculación de la política con los elementos que conforman la estrategia de la empresa como son la Visión, Misión o Valores?', array('Si',
                    'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro',
                    '50%',
                    'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro',)),
            );

        $user = $this->getUser()->getId();
        $repository = $this->getDoctrine()->getRepository('CoreBundle:Diagnosticoweb');
        $query = $repository->createQueryBuilder('b')
            ->where('b.id_cliente = :id_cliente')
            ->setParameter('id_cliente', $user)
            ->getQuery();
        $clientes = $query->getArrayResult();


        $body = '<table>
        <thead>
        <tr>
            <th>Num	</th>
           <th>Reactivo	</th>
           <th>Respuesta</th>	
           <th>Comentario</th>	
           <th>SI	</th>
            <th>En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro</th>
           <th>50%	</th>
            <th>En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro	</th>
            <th>NO</th>
        </tr>
        </thead>
        <tbody>
        
       ';
        $i = 1;
        $j=1;
        foreach ($preguntas as $pregunta){
            if ($j>=10){$ja=$j;}else{$ja="0".$j;};
            $valor="";$valor2="";
            $text= "";
            $a="";
            $b="";
            $c="";
            $d="";
            if(!is_null($clientes[0]["a".$ja])){
                $valor=intval($clientes[0]["a".$ja]);

                if ($valor===1 && $valor!=""){
                    $text = "Si";
                    $a = 1;
                    $b = 0;
                    $c = 0;
                    $d = 0;
                }
                if ($valor===2 && $valor!=""){
                    $text = "En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro";
                    $a = 0;
                    $b = 1;
                    $c = 0;
                    $d = 0;
                }
                if ($valor===3 && $valor!=""){
                    $text = "50%";
                    $a = 0;
                    $b = 0;
                    $c = 1;
                    $d = 0;
                }
                if ($valor===4 && $valor!=""){
                    $text = "En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro";
                    $a = 0;
                    $b = 0;
                    $c = 0;
                    $d = 1;
                }
            }

            if(trim($clientes[0]["b".$ja])!=""){
                $valor2=$clientes[0]["b".$ja];
            }

            $body.='<tr><td>'.$i.'</td><td>'.$pregunta[0].'</td><td>'.$text.'</td><td>'.$valor2.'</td><td>'.$a.'</td><td>'.$b.'</td><td>'.$c.'</td><td>'.$d.'</td>';
            $i++;
            $j++;

        }

        $body.=' </tbody>
    </table>';
        file_put_contents( $this->getParameter('web_dir')."xls/".$user.".xls",$body);
        $message = \Swift_Message::newInstance()
            ->setSubject('Nuevo Cuestionario')
            ->setFrom('marcoalvarez@innology.mx')
            ->setTo('cesar@innology.mx')
            ->attach(Swift_Attachment::fromPath( $this->getParameter('web_dir')."xls/".$user.".xls"))
            ->setBody('Nuevo Cuestionario',
                'text/html'
            );
        $this->get('mailer')->send($message);

        return $this->render('@Frontend/Default/index.html.twig', array());
    }

    /**
     * @Route("/norma/contenido6", name="contenido6")
     */
    public function contenido6Action()
    {
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY') || true === $this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            //return $this->redirect($this->generateUrl('frontend_sinacceso'));

        }
        $form= $this->createForm(ClimalaboralType::class,null,array(
            'method' => 'POST',
        ));
        $preguntas =
            array(
                array('En su trabajo, en el último año ¿ha recibido en contra de su voluntad, comentarios, propuestas, agresiones o bromas relacionadas con el sexo?',array('Si',
                    'No',)),
                array('En su trabajo, en el último año ¿ha recibido amenazasa de daños o castigos en caso de no acceder a proporcionar favores sexuales?',array('Si',
                    'No',)),
                array('En caso de haber contestado sí en alguna de las preguntas anteriores, ¿Se resolvio satisfactoriamente su caso?',array('Si',
                    'No',
                    'No aplica',)),
                array('En su trabajo, en el último año, ¿su jefe(a) o algún(a) superior le ha aislado de sus compañros(as), mediante prohibiciones o cambios de lugar repentinos y poco razonables?',array('Nunca',
                    'Casi nunca ',
                    'Ocasionalmente',
                    'Casi siempre',
                    'Siempre',)),
                array('En su trabajo, en el último año ¿su jefe(a) o algún(a) superior a menospreciado ofensivamente su esfuerzo laboral o sus propuesas de trabajo?',array('Nunca',
                    'Casi nunca ',
                    'Ocasionalmente',
                    'Casi siempre',
                    'Siempre',)),
                array('En su trabajo, en el último año ¿su jefe(a) o algún(a) superior le ha girado instrucciones de manera altanera y poco educada?',array('Nunca',
                    'Casi nunca ',
                    'Ocasionalmente',
                    'Casi siempre',
                    'Siempre',)),
                array('En su trabajo, en el último año ¿su jefe(a) o algún(a) superior je ha impuesto tareas sin los medios necesarios para cumplirlas?',array('Nunca',
                    'Casi nunca ',
                    'Ocasionalmente',
                    'Casi siempre',
                    'Siempre',)),
                array('En su trabajo, en el último año, ¿su jefe(a) o superiores toman en cuenta su opinión?',array('Nunca',
                    'Casi nunca ',
                    'Ocasionalmente',
                    'Casi siempre',
                    'Siempre',)),
                array('En su trabajo, en el último año, ¿su jefe(a) o sus superiores valoran su trabajo y capacidades?',array('Nunca',
                    'Casi nunca ',
                    'Ocasionalmente',
                    'Casi siempre',
                    'Siempre',)),
                array('En su trabajo, en el último año, ¿Es consciente de sus responsabilidades y de lo que su jefe(a) inmediato(a) espera de usted?',array('Si',
                    'No',)),
                array('En su trabajo, en el último año, que clasificación le pondría a la empresa en igualdad de oportunidades y no discriminación por motivos de sexo, raza, religión, edad, discapacidad, etc. (0 es la calificación más baja y 10 es la más alta o mejor): ',array('0',
                    '1',
                    '2',
                    '3',
                    '4',
                    '5',
                    '6',
                    '7',
                    '8',
                    '9',
                    '10',)),
                array('En su trabajo, en el último año, ¿Las funciones y tareas estan definidas con claridad?',array('Nunca',
                    'Casi nunca ',
                    'Ocasionalmente',
                    'Casi siempre',
                    'Siempre',)),
                array('En su trabajo, en el último año ¿Las cargas de trabajo son justas y equitativas para todas y todos los que laboran en la organización?',array('Nunca',
                    'Casi nunca ',
                    'Ocasionalmente',
                    'Casi siempre',
                    'Siempre',)),
                array('En su trabajo, en el último año ¿Los sueldos y salarios para hombres y mujeres son de cáracter igualitario, cuando se realizan las mismas funciones, tareas y responsabilidades?',array('Nunca',
                    'Casi nunca ',
                    'Ocasionalmente',
                    'Casi siempre',
                    'Siempre',)),
                array('En su trabajo, en el último año, ¿Hay conciencia en los empleados (colaboadores, trabajadores, etc.) de su dignidad y que trabajan para su propio desarrollo? (0 es no hay nada de conciencia, 10 si hay mucha conciencia): ',array('0',
                    '1',
                    '2',
                    '3',
                    '4',
                    '5',
                    '6',
                    '7',
                    '8',
                    '9',
                    '10',)),
                array('En su trabajo, en el último año ¿Siente que esta haciendo algo útil?',array('Nunca',
                    'Casi nunca ',
                    'Ocasionalmente',
                    'Casi siempre',
                    'Siempre',)),
                array('¿Le gusta su trabajo?',array('Mucho',
                    'Poco',
                    'Nada',)),
                array('En su trabajo, en el último año ¿ha apendido cosas nuevas?',array('Si',
                    'No',)),
                array('En su trabajo, en el último año ¿Ha podido ver a su familia antes o despues de ir a trabajar?',array('Nunca',
                    'Casi nunca ',
                    'Ocasionalmente',
                    'Casi siempre',
                    'Siempre',)),
                array('¿Se siente orgullosos de pertenecer a la empresa donde trabaja?',array('Si',
                    'No',)),
                array('En su trabajo, en el último año ¿Se levanta con ánimo de  ir a trabajar?',array('Nunca',
                    'Casi nunca ',
                    'Ocasionalmente',
                    'Casi siempre',
                    'Siempre',)),
                array('En su trabajo, en el último año, ¿hay actitud y espíritu de servicio? (0 es n hay actitud de servicio, 10 si hay mucha actitud y espíritu de servicio)',array('0',
                    '1',
                    '2',
                    '3',
                    '4',
                    '5',
                    '6',
                    '7',
                    '8',
                    '9',
                    '10',)),
                array('En su trabajo, en el último año, ¿Se practican los valores establecidos por la empresa?',array('Nunca',
                    'Casi nunca ',
                    'Ocasionalmente',
                    'Casi siempre',
                    'Siempre',)),
                array('En su trabajo, en el último año ¿Hay mas labor de convencimiento o más órdenes? (0 es que siempres se dan órdenes, 10 es que siempre hay labor de convencimiento)',array('0',
                    '1',
                    '2',
                    '3',
                    '4',
                    '5',
                    '6',
                    '7',
                    '8',
                    '9',
                    '10',)),
                array('En su trabajo, en el último año ¿Se respeta mi libertad de pensar, expresarme y actuar? (0 es no hay nada de libertad, 10 si hay mucha libertad)',array('0',
                    '1',
                    '2',
                    '3',
                    '4',
                    '5',
                    '6',
                    '7',
                    '8',
                    '9',
                    '10',)),
                array('En su trabajo, en el último año ¿sus compañeros por lo general toman en cuneta su opinión?',array('Si ',
                    'No',
                    'No sabe',)),
                array('En su trabajo, en el último año ¿Sus compañeros valoran su trabajo y sus capacidades?',array('Si',
                    'No',
                    'No sabe',)),
                array('En su trabajo, en el último año ¿Cómo es la comunicación con sus compañeros?',array('Muy cordial',
                    'Cordial',
                    'Regular',
                    'Hostil',
                    'Muy hostil',)),
                array('En su trabajo, en el último año, ¿Se ha sentido amenazado o ha sido atacado por algún compañero?',array('Nunca',
                    'Casi nunca ',
                    'Ocasionalmente',
                    'Casi siempre',
                    'Siempre',)),
                array('En su trabajo, en el último año ¿Cómo es lenguaje entre los compañeros?',array('Muy cordial',
                    'Cordial',
                    'Regular',
                    'Hostil',
                    'Muy hostil',)),
                array('En su trabajo, en el último año ¿Los conflictos entre compañeros se resuelven satisfactoriamente?',array('Nunca',
                    'Casi nunca ',
                    'Ocasionalmente',
                    'Casi siempre',
                    'Siempre',)),
            );
        return $this->render('@Frontend/Programa/contenido6.html.twig',array(
                'preguntas' => $preguntas,
                'form' => $form->createView())
        );
    }

    /**
     * @Route("/climalaboral", name="climalaboral")
     */
    public function climalaboralAction(Request $request){
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY') || true === $this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            return $this->redirect($this->generateUrl('frontend_sinacceso'));

        }
        $form = $this->createForm(ClimalaboralType::class,null,array(
            'method' => 'POST',
        ));

        $form->handleRequest($request);
        if ($form->isSubmitted()){
            if ($form->isValid()) {
                $data = $form->getData();
                $em = $this->getDoctrine()->getManager();
                $user = $this->getUser()->getId();
                /*$cliente = $em->getRepository('CoreBundle:Diagnosticoweb')->findOneByIdCliente($user);*/
                $repository = $this->getDoctrine()->getRepository('CoreBundle:Climalaboral');
                $query = $repository->createQueryBuilder('b')
                    ->where('b.id_cliente = :id_cliente')
                    ->setParameter('id_cliente', $user)
                    ->getQuery();
                $clientes = $query->getResult();

                if (!$clientes) {
                    $encuesta = new Climalaboral();
                    $encuesta->setIdCliente($this->getUser()->getId());
                    $encuesta->setFecha($data['fecha']);
                    $encuesta->setEmpresa($data['empresa']);
                    $encuesta->setNumero($data['numero']);
                    $encuesta->setAntiguedad($data['antiguedad']);
                    $encuesta->setA01($data['a01']);
                    $encuesta->setA02($data['a02']);
                    $encuesta->setA03($data['a03']);
                    $encuesta->setA04($data['a04']);
                    $encuesta->setA05($data['a05']);
                    $encuesta->setA06($data['a06']);
                    $encuesta->setA07($data['a07']);
                    $encuesta->setA08($data['a08']);
                    $encuesta->setA09($data['a09']);
                    $encuesta->setA10($data['a10']);
                    $encuesta->setA11($data['a11']);
                    $encuesta->setB11($data['b11']);
                    $encuesta->setA12($data['a12']);
                    $encuesta->setA13($data['a13']);
                    $encuesta->setA14($data['a14']);
                    $encuesta->setA15($data['a15']);
                    $encuesta->setA16($data['a16']);
                    $encuesta->setA17($data['a17']);
                    $encuesta->setA18($data['a18']);
                    $encuesta->setA19($data['a19']);
                    $encuesta->setA20($data['a20']);
                    $encuesta->setA21($data['a21']);
                    $encuesta->setA22($data['a22']);
                    $encuesta->setA23($data['a23']);
                    $encuesta->setA24($data['a24']);
                    $encuesta->setA25($data['a25']);
                    $encuesta->setA26($data['a26']);
                    $encuesta->setA27($data['a27']);
                    $encuesta->setA28($data['a28']);
                    $encuesta->setA29($data['a29']);
                    $encuesta->setA30($data['a30']);
                    $encuesta->setA31($data['a31']);

                    $em->persist($encuesta);
                    $em->flush();


                    $preguntas =
                        array(
                            array('En su trabajo, en el último año ¿ha recibido en contra de su voluntad, comentarios, propuestas, agresiones o bromas relacionadas con el sexo?', array('Si',
                                'No',)),
                            array('En su trabajo, en el último año ¿ha recibido amenazasa de daños o castigos en caso de no acceder a proporcionar favores sexuales?', array('Si',
                                'No',)),
                            array('En caso de haber contestado sí en alguna de las preguntas anteriores, ¿Se resolvio satisfactoriamente su caso?', array('Si',
                                'No',
                                'No aplica',)),
                            array('En su trabajo, en el último año, ¿su jefe(a) o algún(a) superior le ha aislado de sus compañros(as), mediante prohibiciones o cambios de lugar repentinos y poco razonables?', array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                            array('En su trabajo, en el último año ¿su jefe(a) o algún(a) superior a menospreciado ofensivamente su esfuerzo laboral o sus propuesas de trabajo?', array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                            array('En su trabajo, en el último año ¿su jefe(a) o algún(a) superior le ha girado instrucciones de manera altanera y poco educada?', array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                            array('En su trabajo, en el último año ¿su jefe(a) o algún(a) superior je ha impuesto tareas sin los medios necesarios para cumplirlas?', array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                            array('En su trabajo, en el último año, ¿su jefe(a) o superiores toman en cuenta su opinión?', array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                            array('En su trabajo, en el último año, ¿su jefe(a) o sus superiores valoran su trabajo y capacidades?', array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                            array('En su trabajo, en el último año, ¿Es consciente de sus responsabilidades y de lo que su jefe(a) inmediato(a) espera de usted?', array('Si',
                                'No',)),
                            array('En su trabajo, en el último año, que clasificación le pondría a la empresa en igualdad de oportunidades y no discriminación por motivos de sexo, raza, religión, edad, discapacidad, etc. (0 es la calificación más baja y 10 es la más alta o mejor): ', array('0',
                                '1',
                                '2',
                                '3',
                                '4',
                                '5',
                                '6',
                                '7',
                                '8',
                                '9',
                                '10',)),
                            array('En su trabajo, en el último año, ¿Las funciones y tareas estan definidas con claridad?', array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                            array('En su trabajo, en el último año ¿Las cargas de trabajo son justas y equitativas para todas y todos los que laboran en la organización?', array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                            array('En su trabajo, en el último año ¿Los sueldos y salarios para hombres y mujeres son de cáracter igualitario, cuando se realizan las mismas funciones, tareas y responsabilidades?', array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                            array('En su trabajo, en el último año, ¿Hay conciencia en los empleados (colaboadores, trabajadores, etc.) de su dignidad y que trabajan para su propio desarrollo? (0 es no hay nada de conciencia, 10 si hay mucha conciencia): ', array('0',
                                '1',
                                '2',
                                '3',
                                '4',
                                '5',
                                '6',
                                '7',
                                '8',
                                '9',
                                '10',)),
                            array('En su trabajo, en el último año ¿Siente que esta haciendo algo útil?', array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                            array('¿Le gusta su trabajo?', array('Mucho',
                                'Poco',
                                'Nada',)),
                            array('En su trabajo, en el último año ¿ha apendido cosas nuevas?', array('Si',
                                'No',)),
                            array('En su trabajo, en el último año ¿Ha podido ver a su familia antes o despues de ir a trabajar?', array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                            array('¿Se siente orgullosos de pertenecer a la empresa donde trabaja?', array('Si',
                                'No',)),
                            array('En su trabajo, en el último año ¿Se levanta con ánimo de  ir a trabajar?', array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                            array('En su trabajo, en el último año, ¿hay actitud y espíritu de servicio? (0 es n hay actitud de servicio, 10 si hay mucha actitud y espíritu de servicio)', array('0',
                                '1',
                                '2',
                                '3',
                                '4',
                                '5',
                                '6',
                                '7',
                                '8',
                                '9',
                                '10',)),
                            array('En su trabajo, en el último año, ¿Se practican los valores establecidos por la empresa?', array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                            array('En su trabajo, en el último año ¿Hay mas labor de convencimiento o más órdenes? (0 es que siempres se dan órdenes, 10 es que siempre hay labor de convencimiento)', array('0',
                                '1',
                                '2',
                                '3',
                                '4',
                                '5',
                                '6',
                                '7',
                                '8',
                                '9',
                                '10',)),
                            array('En su trabajo, en el último año ¿Se respeta mi libertad de pensar, expresarme y actuar? (0 es no hay nada de libertad, 10 si hay mucha libertad)', array('0',
                                '1',
                                '2',
                                '3',
                                '4',
                                '5',
                                '6',
                                '7',
                                '8',
                                '9',
                                '10',)),
                            array('En su trabajo, en el último año ¿sus compañeros por lo general toman en cuneta su opinión?', array('Si ',
                                'No',
                                'No sabe',)),
                            array('En su trabajo, en el último año ¿Sus compañeros valoran su trabajo y sus capacidades?', array('Si',
                                'No',
                                'No sabe',)),
                            array('En su trabajo, en el último año ¿Cómo es la comunicación con sus compañeros?', array('Muy cordial',
                                'Cordial',
                                'Regular',
                                'Hostil',
                                'Muy hostil',)),
                            array('En su trabajo, en el último año, ¿Se ha sentido amenazado o ha sido atacado por algún compañero?', array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                            array('En su trabajo, en el último año ¿Cómo es lenguaje entre los compañeros?', array('Muy cordial',
                                'Cordial',
                                'Regular',
                                'Hostil',
                                'Muy hostil',)),
                            array('En su trabajo, en el último año ¿Los conflictos entre compañeros se resuelven satisfactoriamente?', array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                        );

                    $user = $this->getUser()->getId();
                    $repository = $this->getDoctrine()->getRepository('CoreBundle:Climalaboral');
                    $query = $repository->createQueryBuilder('b')
                        ->where('b.id_cliente = :id_cliente')
                        ->setParameter('id_cliente', $user)
                        ->getQuery();
                    $clientes = $query->getArrayResult();

                    /*$repository = $this->getDoctrine()->getRepository('CoreBundle:Clientes');
                    $query = $repository->createQueryBuilder('c')
                        ->where('c.id = :id')
                        ->setParameter('id', $user)
                        ->getQuery();
                    $usuario = $query->getResult();


                    $correo = $usuario->getCorreo();*/

                    $puntos = $repository = $this->getDoctrine()->getRepository('CoreBundle:Clientes')->findOneById($user);
                    $correo = $puntos->getEmail();

                    $body = '<table>
                                <thead>
                                <tr>
                                    <th>Num	</th>
                                   <th>Reactivo	</th>
                                   <th>Respuesta</th>	
                                   <th>Comentario</th>	
                                </tr>
                                </thead>
                                <tbody>';


                    $date= "";
                    $empresa= "";
                    $numero= "";
                    $antiguedad= "";
                    $text1=""; $text2="";$text3=""; $text4="";$text5=""; $text6="";$text7=""; $text8="";$text9=""; $text10="";
                    $text11=""; $b11=""; $text12="";$text13=""; $text14="";$text15=""; $text16="";$text17=""; $text18="";$text19=""; $text20="";
                    $text21=""; $text22="";$text23=""; $text24="";$text25=""; $text26="";$text27=""; $text28="";$text29=""; $text30=""; $text31="";
                    if ($clientes[0]["fecha"]!= "") {
                        $date = $clientes[0]["fecha"];
                        $date = $date->format('Y-m-d');
                    }
                    if (trim($clientes[0]["empresa"])!= "") {
                        $empresa = $clientes[0]["empresa"];
                    }
                    if (trim($clientes[0]["numero"])!= "") {
                        $numero = $clientes[0]["numero"];
                    }
                    if (trim($clientes[0]["antiguedad"])!= "") {
                        $antiguedad = $clientes[0]["antiguedad"];
                    }
                    if (!is_null($clientes[0]["a01"])) {
                        $a1 = intval($clientes[0]["a01"]);
                        if ($a1 == 1){
                            $text1='Si';
                        }
                        if ($a1 == 2){
                            $text1='No';
                        }
                    }
                    if (!is_null($clientes[0]["a02"])) {
                        $a2 = intval($clientes[0]["a02"]);
                        if ($a2 == 1){
                            $text2='Si';
                        }
                        if ($a2 == 2){
                            $text2='No';
                        }
                    }
                    if (!is_null($clientes[0]["a03"])) {
                        $a3 = intval($clientes[0]["a03"]);
                        if ($a3 == 1){
                            $text3='Si';
                        }
                        if ($a3 == 2){
                            $text3='No';
                        }
                        if ($a3 == 3){
                            $text3='No Aplica';
                        }
                    }
                    if (!is_null($clientes[0]["a04"])) {
                        $a4 = intval($clientes[0]["a04"]);
                        if ($a4 == 1){
                            $text4='Nunca';
                        }
                        if ($a4 == 2){
                            $text4='Casi Nunca';
                        }
                        if ($a4 == 3){
                            $text4='Ocasionalmente';
                        }
                        if ($a4 == 4){
                            $text4='Casi Siempre';
                        }
                        if ($a4 == 5){
                            $text4='Siempre';
                        }
                    }
                    if (!is_null($clientes[0]["a05"])) {
                        $a5 = intval($clientes[0]["a05"]);
                        if ($a5 == 1){
                            $text5='Nunca';
                        }
                        if ($a5 == 2){
                            $text5='Casi Nunca';
                        }
                        if ($a5 == 3){
                            $text5='Ocasionalmente';
                        }
                        if ($a5 == 4){
                            $text5='Casi Siempre';
                        }
                        if ($a5 == 5){
                            $text5='Siempre';
                        }
                    }
                    if (!is_null($clientes[0]["a06"])) {
                        $a6 = intval($clientes[0]["a06"]);
                        if ($a6 == 1){
                            $text6='Nunca';
                        }
                        if ($a6 == 2){
                            $text6='Casi Nunca';
                        }
                        if ($a6 == 3){
                            $text6='Ocasionalmente';
                        }
                        if ($a6 == 4){
                            $text6='Casi Siempre';
                        }
                        if ($a6 == 5){
                            $text6='Siempre';
                        }
                    }
                    if (!is_null($clientes[0]["a07"])) {
                        $a7 = intval($clientes[0]["a07"]);
                        if ($a7 == 1){
                            $text7='Nunca';
                        }
                        if ($a7 == 2){
                            $text7='Casi Nunca';
                        }
                        if ($a7 == 3){
                            $text7='Ocasionalmente';
                        }
                        if ($a7 == 4){
                            $text7='Casi Siempre';
                        }
                        if ($a7 == 5){
                            $text7='Siempre';
                        }
                    }
                    if (!is_null($clientes[0]["a08"])) {
                        $a8 = intval($clientes[0]["a08"]);
                        if ($a8 == 1){
                            $text8='Nunca';
                        }
                        if ($a8 == 2){
                            $text8='Casi Nunca';
                        }
                        if ($a8 == 3){
                            $text8='Ocasionalmente';
                        }
                        if ($a8 == 4){
                            $text8='Casi Siempre';
                        }
                        if ($a8 == 5){
                            $text8='Siempre';
                        }
                    }
                    if (!is_null($clientes[0]["a09"])) {
                        $a9 = intval($clientes[0]["a09"]);
                        if ($a9 == 1){
                            $text9='Nunca';
                        }
                        if ($a9 == 2){
                            $text9='Casi Nunca';
                        }
                        if ($a9 == 3){
                            $text9='Ocasionalmente';
                        }
                        if ($a9 == 4){
                            $text9='Casi Siempre';
                        }
                        if ($a9 == 5){
                            $text9='Siempre';
                        }
                    }
                    if (!is_null($clientes[0]["a10"])) {
                        $a10 = intval($clientes[0]["a10"]);
                        if ($a10 == 1){
                            $text10='Si';
                        }
                        if ($a10 == 2){
                            $text10='No';
                        }
                    }
                    if (!is_null($clientes[0]["a11"])) {
                        $a11 = intval($clientes[0]["a11"]);
                        if ($a11 == 1){
                            $text11='0';
                        }
                        if ($a11 == 2){
                            $text11='1';
                        }
                        if ($a11 == 3){
                            $text11='2';
                        }
                        if ($a11 == 4){
                            $text11='3';
                        }
                        if ($a11 == 5){
                            $text11='4';
                        }
                        if ($a11 == 6){
                            $text11='5';
                        }
                        if ($a11 == 7){
                            $text11='6';
                        }
                        if ($a11 == 8){
                            $text11='7';
                        }
                        if ($a11 == 9){
                            $text11='8';
                        }
                        if ($a11 == 10){
                            $text11='9';
                        }
                        if ($a11 == 11){
                            $text11='10';
                        }
                    }
                    if (trim($clientes[0]["b11"]) != "") {
                        $b11 = $clientes[0]["b11"];
                    }
                    if (!is_null($clientes[0]["a12"])) {
                        $a12 = intval($clientes[0]["a12"]);
                        if ($a12 == 1){
                            $text12='Nunca';
                        }
                        if ($a12 == 2){
                            $text12='Casi Nunca';
                        }
                        if ($a12 == 3){
                            $text12='Ocasionalmente';
                        }
                        if ($a12 == 4){
                            $text12='Casi Siempre';
                        }
                        if ($a12 == 5){
                            $text12='Siempre';
                        }
                    }
                    if (!is_null($clientes[0]["a13"])) {
                        $a13 = intval($clientes[0]["a13"]);
                        if ($a13 == 1){
                            $text13='Nunca';
                        }
                        if ($a13 == 2){
                            $text13='Casi Nunca';
                        }
                        if ($a13 == 3){
                            $text13='Ocasionalmente';
                        }
                        if ($a13 == 4){
                            $text13='Casi Siempre';
                        }
                        if ($a13 == 5){
                            $text13='Siempre';
                        }
                    }
                    if (!is_null($clientes[0]["a14"])) {
                        $a14 = intval($clientes[0]["a14"]);
                        if ($a14 == 1){
                            $text14='Nunca';
                        }
                        if ($a14 == 2){
                            $text14='Casi Nunca';
                        }
                        if ($a14 == 3){
                            $text14='Ocasionalmente';
                        }
                        if ($a14 == 4){
                            $text14='Casi Siempre';
                        }
                        if ($a14 == 5){
                            $text14='Siempre';
                        }
                    }
                    if (!is_null($clientes[0]["a15"])) {
                        $a15 = intval($clientes[0]["a15"]);
                        if ($a15 == 1){
                            $text15='0';
                        }
                        if ($a15 == 2){
                            $text15='1';
                        }
                        if ($a15 == 3){
                            $text15='2';
                        }
                        if ($a15 == 4){
                            $text15='3';
                        }
                        if ($a15 == 5){
                            $text15='4';
                        }
                        if ($a15 == 6){
                            $text15='5';
                        }
                        if ($a15 == 7){
                            $text15='6';
                        }
                        if ($a15 == 8){
                            $text15='7';
                        }
                        if ($a15 == 9){
                            $text15='8';
                        }
                        if ($a15 == 10){
                            $text15='9';
                        }
                        if ($a15 == 11){
                            $text15='10';
                        }
                    }
                    if (!is_null($clientes[0]["a16"])) {
                        $a16 = intval($clientes[0]["a16"]);
                        if ($a16 == 1){
                            $text16='Nunca';
                        }
                        if ($a16 == 2){
                            $text16='Casi Nunca';
                        }
                        if ($a16 == 3){
                            $text16='Ocasionalmente';
                        }
                        if ($a16 == 4){
                            $text16='Casi Siempre';
                        }
                        if ($a16 == 5){
                            $text16='Siempre';
                        }
                    }
                    if (!is_null($clientes[0]["a17"])) {
                        $a17 = intval($clientes[0]["a17"]);
                        if ($a17 == 1){
                            $text17='Mucho';
                        }
                        if ($a17 == 2){
                            $text17='Poco';
                        }
                        if ($a17 == 3){
                            $text17='Nada';
                        }
                    }
                    if (!is_null($clientes[0]["a18"])) {
                        $a18 = intval($clientes[0]["a18"]);
                        if ($a18 == 1){
                            $text18='Si';
                        }
                        if ($a18 == 2){
                            $text18='No';
                        }
                    }
                    if (!is_null($clientes[0]["a19"])) {
                        $a19 = intval($clientes[0]["a19"]);
                        if ($a19 == 1){
                            $text19='Nunca';
                        }
                        if ($a19 == 2){
                            $text19='Casi Nunca';
                        }
                        if ($a19 == 3){
                            $text19='Ocasionalmente';
                        }
                        if ($a19 == 4){
                            $text19='Casi Siempre';
                        }
                        if ($a19 == 5){
                            $text19='Siempre';
                        }
                    }
                    if (!is_null($clientes[0]["a20"])) {
                        $a20 = intval($clientes[0]["a20"]);
                        if ($a20 == 1){
                            $text20='Si';
                        }
                        if ($a20 == 2){
                            $text20='No';
                        }
                    }
                    if (!is_null($clientes[0]["a21"])) {
                        $a21 = intval($clientes[0]["a21"]);
                        if ($a21 == 1){
                            $text21='Nunca';
                        }
                        if ($a21 == 2){
                            $text21='Casi Nunca';
                        }
                        if ($a21 == 3){
                            $text21='Ocasionalmente';
                        }
                        if ($a21 == 4){
                            $text21='Casi Siempre';
                        }
                        if ($a21 == 5){
                            $text21='Siempre';
                        }
                    }
                    if (!is_null($clientes[0]["a22"])) {
                        $a22 = intval($clientes[0]["a22"]);
                        if ($a22 == 1){
                            $text22='0';
                        }
                        if ($a22 == 2){
                            $text22='1';
                        }
                        if ($a22 == 3){
                            $text22='2';
                        }
                        if ($a22 == 4){
                            $text22='3';
                        }
                        if ($a22 == 5){
                            $text22='4';
                        }
                        if ($a22 == 6){
                            $text22='5';
                        }
                        if ($a22 == 7){
                            $text22='6';
                        }
                        if ($a22 == 8){
                            $text22='7';
                        }
                        if ($a22 == 9){
                            $text22='8';
                        }
                        if ($a22 == 10){
                            $text22='9';
                        }
                        if ($a22 == 11){
                            $text22='10';
                        }
                    }
                    if (!is_null($clientes[0]["a23"])) {
                        $a23 = intval($clientes[0]["a23"]);
                        if ($a23 == 1){
                            $text23='Nunca';
                        }
                        if ($a23 == 2){
                            $text23='Casi Nunca';
                        }
                        if ($a23 == 3){
                            $text23='Ocasionalmente';
                        }
                        if ($a23 == 4){
                            $text23='Casi Siempre';
                        }
                        if ($a23 == 5){
                            $text23='Siempre';
                        }
                    }
                    if (!is_null($clientes[0]["a24"])) {
                        $a24 = intval($clientes[0]["a24"]);
                        if ($a24 == 1){
                            $text24='0';
                        }
                        if ($a24 == 2){
                            $text24='1';
                        }
                        if ($a24 == 3){
                            $text24='2';
                        }
                        if ($a24 == 4){
                            $text24='3';
                        }
                        if ($a24 == 5){
                            $text24='4';
                        }
                        if ($a24 == 6){
                            $text24='5';
                        }
                        if ($a24 == 7){
                            $text24='6';
                        }
                        if ($a24 == 8){
                            $text24='7';
                        }
                        if ($a24 == 9){
                            $text24='8';
                        }
                        if ($a24 == 10){
                            $text24='9';
                        }
                        if ($a24 == 11){
                            $text24='10';
                        }
                    }
                    if (!is_null($clientes[0]["a25"])) {
                        $a25 = intval($clientes[0]["a25"]);
                        if ($a25 == 1){
                            $text25='0';
                        }
                        if ($a25 == 2){
                            $text25='1';
                        }
                        if ($a25 == 3){
                            $text25='2';
                        }
                        if ($a25 == 4){
                            $text25='3';
                        }
                        if ($a25 == 5){
                            $text25='4';
                        }
                        if ($a25 == 6){
                            $text25='5';
                        }
                        if ($a25 == 7){
                            $text25='6';
                        }
                        if ($a25 == 8){
                            $text25='7';
                        }
                        if ($a25 == 9){
                            $text25='8';
                        }
                        if ($a25 == 10){
                            $text25='9';
                        }
                        if ($a25 == 11){
                            $text25='10';
                        }
                    }
                    if (!is_null($clientes[0]["a26"])) {
                        $a26 = intval($clientes[0]["a26"]);
                        if ($a26 == 1){
                            $text26='Si';
                        }
                        if ($a26 == 2){
                            $text26='No';
                        }
                        if ($a26 == 3){
                            $text26='No Sabe';
                        }
                    }
                    if (!is_null($clientes[0]["a27"])) {
                        $a27 = intval($clientes[0]["a27"]);
                        if ($a27 == 1){
                            $text27='Si';
                        }
                        if ($a27 == 2){
                            $text27='No';
                        }
                        if ($a27 == 3){
                            $text27='No Sabe';
                        }
                    }
                    if (!is_null($clientes[0]["a28"])) {
                        $a28 = intval($clientes[0]["a28"]);
                        if ($a28 == 1){
                            $text28='Muy cordial';
                        }
                        if ($a28 == 2){
                            $text28='Cordial';
                        }
                        if ($a28 == 3){
                            $text28='Regular';
                        }
                        if ($a28 == 4){
                            $text28='Hostil';
                        }
                        if ($a28 == 5){
                            $text28='Muy hostil';
                        }
                    }
                    if (!is_null($clientes[0]["a29"])) {
                        $a29 = intval($clientes[0]["a29"]);
                        if ($a29 == 1){
                            $text29='Nunca';
                        }
                        if ($a29 == 2){
                            $text29='Casi Nunca';
                        }
                        if ($a29 == 3){
                            $text29='Ocasionalmente';
                        }
                        if ($a29 == 4){
                            $text29='Casi Siempre';
                        }
                        if ($a29 == 5){
                            $text29='Siempre';
                        }
                    }
                    if (!is_null($clientes[0]["a30"])) {
                        $a30 = intval($clientes[0]["a30"]);
                        if ($a30 == 1){
                            $text30='Muy cordial';
                        }
                        if ($a30 == 2){
                            $text30='Cordial';
                        }
                        if ($a30 == 3){
                            $text30='Regular';
                        }
                        if ($a30 == 4){
                            $text30='Hostil';
                        }
                        if ($a30 == 5){
                            $text30='Muy hostil';
                        }
                    }
                    if (!is_null($clientes[0]["a31"])) {
                        $a31 = intval($clientes[0]["a31"]);
                        if ($a31 == 1){
                            $text31='Nunca';
                        }
                        if ($a31 == 2){
                            $text31='Casi Nunca';
                        }
                        if ($a31 == 3){
                            $text31='Ocasionalmente';
                        }
                        if ($a31 == 4){
                            $text31='Casi Siempre';
                        }
                        if ($a31 == 5){
                            $text31='Siempre';
                        }
                    }

                    $body .= '<tr><td></td><td>Fecha: </td><td>' . $date . '</td><td></td>';
                    $body .= '<tr><td></td><td>Escriba el Nombre de la Empresa: </td><td>' . $empresa . '</td><td></td>';
                    $body .= '<tr><td></td><td>Escriba el número de la Sucursal (en su caso): </td><td>' . $numero . '</td><td></td>';
                    $body .= '<tr><td></td><td>Antigüedad en la Organización (años): </td><td>' . $antiguedad . '</td><td></td>';
                    $body .= '<tr><td>1</td><td>En su trabajo, en el último año ¿ha recibido en contra de su voluntad, comentarios, propuestas, agresiones o bromas relacionadas con el sexo?</td><td>' . $text1 . '</td><td></td>';
                    $body .= '<tr><td>2</td><td>En su trabajo, en el último año ¿ha recibido amenazasa de daños o castigos en caso de no acceder a proporcionar favores sexuales?</td><td>' . $text2 . '</td><td></td>';
                    $body .= '<tr><td>3</td><td>En caso de haber contestado sí en alguna de las preguntas anteriores, ¿Se resolvio satisfactoriamente su caso?</td><td>' . $text3 . '</td><td></td>';
                    $body .= '<tr><td>4</td><td>En su trabajo, en el último año, ¿su jefe(a) o algún(a) superior le ha aislado de sus compañros(as), mediante prohibiciones o cambios de lugar repentinos y poco razonables?</td><td>' . $text4 . '</td><td></td>';
                    $body .= '<tr><td>5</td><td>En su trabajo, en el último año ¿su jefe(a) o algún(a) superior a menospreciado ofensivamente su esfuerzo laboral o sus propuesas de trabajo?</td><td>' . $text5 . '</td><td></td>';
                    $body .= '<tr><td>6</td><td>En su trabajo, en el último año ¿su jefe(a) o algún(a) superior le ha girado instrucciones de manera altanera y poco educada?</td><td>' . $text6 . '</td><td></td>';
                    $body .= '<tr><td>7</td><td>En su trabajo, en el último año ¿su jefe(a) o algún(a) superior je ha impuesto tareas sin los medios necesarios para cumplirlas?</td><td>' . $text7 . '</td><td></td>';
                    $body .= '<tr><td>8</td><td>En su trabajo, en el último año, ¿su jefe(a) o superiores toman en cuenta su opinión?</td><td>' . $text8 . '</td><td></td>';
                    $body .= '<tr><td>9</td><td>En su trabajo, en el último año, ¿su jefe(a) o sus superiores valoran su trabajo y capacidades?</td><td>' . $text9 . '</td><td></td>';
                    $body .= '<tr><td>10</td><td>En su trabajo, en el último año, ¿Es consciente de sus responsabilidades y de lo que su jefe(a) inmediato(a) espera de usted?</td><td>' . $text10 . '</td><td></td>';
                    $body .= '<tr><td>11</td><td>En su trabajo, en el último año, que clasificación le pondría a la empresa en igualdad de oportunidades y no discriminación por motivos de sexo, raza, religión, edad, discapacidad, etc. (0 es la calificación más baja y 10 es la más alta o mejor):</td><td>' . $text11 . '</td><td>' . $b11 . '</td>';
                    $body .= '<tr><td>12</td><td>En su trabajo, en el último año, ¿Las funciones y tareas estan definidas con claridad?</td><td>' . $text12 . '</td><td></td>';
                    $body .= '<tr><td>17</td><td>En su trabajo, en el último año ¿Las cargas de trabajo son justas y equitativas para todas y todos los que laboran en la organización?</td><td>' . $text13 . '</td><td></td>';
                    $body .= '<tr><td>14</td><td>En su trabajo, en el último año ¿Los sueldos y salarios para hombres y mujeres son de cáracter igualitario, cuando se realizan las mismas funciones, tareas y responsabilidades?</td><td>' . $text14 . '</td><td></td>';
                    $body .= '<tr><td>15</td><td>En su trabajo, en el último año, ¿Hay conciencia en los empleados (colaboadores, trabajadores, etc.) de su dignidad y que trabajan para su propio desarrollo? (0 es no hay nada de conciencia, 10 si hay mucha conciencia):</td><td>' . $text15 . '</td><td></td>';
                    $body .= '<tr><td>16</td><td>En su trabajo, en el último año ¿Siente que esta haciendo algo útil?</td><td>' . $text16 . '</td><td></td>';
                    $body .= '<tr><td>17</td><td>¿Le gusta su trabajo?</td><td>' . $text17 . '</td><td></td>';
                    $body .= '<tr><td>18</td><td>En su trabajo, en el último año ¿ha apendido cosas nuevas?</td><td>' . $text18 . '</td><td></td>';
                    $body .= '<tr><td>19</td><td>En su trabajo, en el último año ¿Ha podido ver a su familia antes o despues de ir a trabajar?</td><td>' . $text19 . '</td><td></td>';
                    $body .= '<tr><td>20</td><td>¿Se siente orgullosos de pertenecer a la empresa donde trabaja?</td><td>' . $text20 . '</td><td></td>';
                    $body .= '<tr><td>21</td><td>En su trabajo, en el último año ¿Se levanta con ánimo de ir a trabajar?</td><td>' . $text21 . '</td><td></td>';
                    $body .= '<tr><td>22</td><td>En su trabajo, en el último año, ¿hay actitud y espíritu de servicio? (0 es n hay actitud de servicio, 10 si hay mucha actitud y espíritu de servicio)</td><td>' . $text22 . '</td><td></td>';
                    $body .= '<tr><td>23</td><td>En su trabajo, en el último año, ¿Se practican los valores establecidos por la empresa?</td><td>' . $text23 . '</td><td></td>';
                    $body .= '<tr><td>24</td><td>En su trabajo, en el último año ¿Hay mas labor de convencimiento o más órdenes? (0 es que siempres se dan órdenes, 10 es que siempre hay labor de convencimiento)</td><td>' . $text24 . '</td><td></td>';
                    $body .= '<tr><td>25</td><td>En su trabajo, en el último año ¿Se respeta mi libertad de pensar, expresarme y actuar? (0 es no hay nada de libertad, 10 si hay mucha libertad)</td><td>' . $text25 . '</td><td></td>';
                    $body .= '<tr><td>26</td><td>En su trabajo, en el último año ¿sus compañeros por lo general toman en cuneta su opinión?</td><td>' . $text26 . '</td><td></td>';
                    $body .= '<tr><td>27</td><td>En su trabajo, en el último año ¿Sus compañeros valoran su trabajo y sus capacidades?</td><td>' . $text27 . '</td><td></td>';
                    $body .= '<tr><td>28</td><td>En su trabajo, en el último año ¿Cómo es la comunicación con sus compañeros?</td><td>' . $text28 . '</td><td></td>';
                    $body .= '<tr><td>29</td><td>En su trabajo, en el último año, ¿Se ha sentido amenazado o ha sido atacado por algún compañero?</td><td>' . $text29 . '</td><td></td>';
                    $body .= '<tr><td>30</td><td>En su trabajo, en el último año ¿Cómo es lenguaje entre los compañeros?</td><td>' . $text30 . '</td><td></td>';
                    $body .= '<tr><td>31</td><td>En su trabajo, en el último año ¿Los conflictos entre compañeros se resuelven satisfactoriamente?</td><td>' . $text31 . '</td><td></td>';


                    $body .= ' </tbody>
                            </table>';
                    file_put_contents($this->getParameter('web_dir') . "xls/" . $user . ".xls", mb_convert_encoding($body, "ISO-8859-1", mb_detect_encoding($body, "UTF-8, ISO-8859-1, ISO-8859-15", true)));
                    $uno = "cesar@innology.mx";
                    $dos = "cricardez@crese.org";
                    $message = \Swift_Message::newInstance()
                        ->setSubject('Nuevo Cuestionario')
                        ->setFrom($correo)
                        ->setTo($uno)
                        ->attach(Swift_Attachment::fromPath($this->getParameter('web_dir') . "xls/" . $user . ".xls"))
                        ->setBody('Nuevo Cuestionario',
                            'text/html'
                        );
                    $this->get('mailer')->send($message);

                    $request->getSession()->getFlashBag()->add('success', 'Encuesta Terminada!');
                    /*return $this->render('@Frontend/Default/Inicio/gestion.html.twig');*/
                    return $this->redirect($this->generateUrl('gestion'));

                }

            }
        }

        return $this->render('@Frontend/Default/Inicio/gestion.html.twig', array(
            'form' => $form->createView(),));

    }

    /**
     * @Route("/norma/contenido7", name="contenido7")
     */
    public function contenido7Action()
    {
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY') || true === $this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            return $this->redirect($this->generateUrl('frontend_sinacceso'));

        }
        return $this->render('@Frontend/Programa/contenido7.html.twig');
    }

    /**
     * @Route("/norma/contenido8", name="contenido8")
     */
    public function contenido8Action()
    {
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY') || true === $this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            //return $this->redirect($this->generateUrl('frontend_sinacceso'));

        }
        $form= $this->createForm(MinutasType::class,null,array(
            'method' => 'POST',
        ));
        return $this->render('@Frontend/Programa/contenido8.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/minutas", name="minutas")
     */
    public function minutasAction(Request $request){
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY') || true === $this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
           // return $this->redirect($this->generateUrl('frontend_sinacceso'));

        }
        $form = $this->createForm(MinutasType::class,null,array(
            'method' => 'POST',
        ));

        $form->handleRequest($request);
        if ($form->isSubmitted()){
            if ($form->isValid()){
                $data = $form->getData();
                $em = $this->getDoctrine()->getManager();
                $user = $this->getUser()->getId();
                /*$cliente = $em->getRepository('CoreBundle:Diagnosticoweb')->findOneByIdCliente($user);*/
                $repository = $this->getDoctrine()->getRepository('CoreBundle:Minutas');
                $query = $repository->createQueryBuilder('b')
                    ->where('b.id_cliente = :id_cliente')
                    ->setParameter('id_cliente', $user)
                    ->getQuery();
                $clientes = $query->getResult();

                if (!$clientes){
                    $encuesta = new Minutas();
                    $encuesta->setIdCliente($this->getUser()->getId());
                    $encuesta->setFecha($data['fecha']);
                    $encuesta->setTema($data['tema']);
                    $encuesta->setEmpresa($data['empresa']);
                    $encuesta->setDuracion($data['duracion']);
                    $encuesta->setAsistentes($data['asistentes']);
                    $encuesta->setPuntos($data['puntos']);
                    $encuesta->setAcuerdos($data['acuerdos']);
                    $encuesta->setFechasiguiente($data['fechasiguiente']);

                    $em->persist($encuesta);
                    $em->flush();


                    /*$preguntas =
                        array(
                            array('En su trabajo, en el último año ¿ha recibido en contra de su voluntad, comentarios, propuestas, agresiones o bromas relacionadas con el sexo?',array('Si',
                                'No',)),
                            array('En su trabajo, en el último año ¿ha recibido amenazasa de daños o castigos en caso de no acceder a proporcionar favores sexuales?',array('Si',
                                'No',)),
                            array('En caso de haber contestado sí en alguna de las preguntas anteriores, ¿Se resolvio satisfactoriamente su caso?',array('Si',
                                'No',
                                'No aplica',)),
                            array('En su trabajo, en el último año, ¿su jefe(a) o algún(a) superior le ha aislado de sus compañros(as), mediante prohibiciones o cambios de lugar repentinos y poco razonables?',array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                            array('En su trabajo, en el último año ¿su jefe(a) o algún(a) superior a menospreciado ofensivamente su esfuerzo laboral o sus propuesas de trabajo?',array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                            array('En su trabajo, en el último año ¿su jefe(a) o algún(a) superior le ha girado instrucciones de manera altanera y poco educada?',array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                            array('En su trabajo, en el último año ¿su jefe(a) o algún(a) superior je ha impuesto tareas sin los medios necesarios para cumplirlas?',array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                            array('En su trabajo, en el último año, ¿su jefe(a) o superiores toman en cuenta su opinión?',array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                            array('En su trabajo, en el último año, ¿su jefe(a) o sus superiores valoran su trabajo y capacidades?',array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                            array('En su trabajo, en el último año, ¿Es consciente de sus responsabilidades y de lo que su jefe(a) inmediato(a) espera de usted?',array('Si',
                                'No',)),
                            array('En su trabajo, en el último año, que clasificación le pondría a la empresa en igualdad de oportunidades y no discriminación por motivos de sexo, raza, religión, edad, discapacidad, etc. (0 es la calificación más baja y 10 es la más alta o mejor): ',array('0',
                                '1',
                                '2',
                                '3',
                                '4',
                                '5',
                                '6',
                                '7',
                                '8',
                                '9',
                                '10',)),
                            array('En su trabajo, en el último año, ¿Las funciones y tareas estan definidas con claridad?',array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                            array('En su trabajo, en el último año ¿Las cargas de trabajo son justas y equitativas para todas y todos los que laboran en la organización?',array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                            array('En su trabajo, en el último año ¿Los sueldos y salarios para hombres y mujeres son de cáracter igualitario, cuando se realizan las mismas funciones, tareas y responsabilidades?',array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                            array('En su trabajo, en el último año, ¿Hay conciencia en los empleados (colaboadores, trabajadores, etc.) de su dignidad y que trabajan para su propio desarrollo? (0 es no hay nada de conciencia, 10 si hay mucha conciencia): ',array('0',
                                '1',
                                '2',
                                '3',
                                '4',
                                '5',
                                '6',
                                '7',
                                '8',
                                '9',
                                '10',)),
                            array('En su trabajo, en el último año ¿Siente que esta haciendo algo útil?',array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                            array('¿Le gusta su trabajo?',array('Mucho',
                                'Poco',
                                'Nada',)),
                            array('En su trabajo, en el último año ¿ha apendido cosas nuevas?',array('Si',
                                'No',)),
                            array('En su trabajo, en el último año ¿Ha podido ver a su familia antes o despues de ir a trabajar?',array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                            array('¿Se siente orgullosos de pertenecer a la empresa donde trabaja?',array('Si',
                                'No',)),
                            array('En su trabajo, en el último año ¿Se levanta con ánimo de  ir a trabajar?',array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                            array('En su trabajo, en el último año, ¿hay actitud y espíritu de servicio? (0 es n hay actitud de servicio, 10 si hay mucha actitud y espíritu de servicio)',array('0',
                                '1',
                                '2',
                                '3',
                                '4',
                                '5',
                                '6',
                                '7',
                                '8',
                                '9',
                                '10',)),
                            array('En su trabajo, en el último año, ¿Se practican los valores establecidos por la empresa?',array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                            array('En su trabajo, en el último año ¿Hay mas labor de convencimiento o más órdenes? (0 es que siempres se dan órdenes, 10 es que siempre hay labor de convencimiento)',array('0',
                                '1',
                                '2',
                                '3',
                                '4',
                                '5',
                                '6',
                                '7',
                                '8',
                                '9',
                                '10',)),
                            array('En su trabajo, en el último año ¿Se respeta mi libertad de pensar, expresarme y actuar? (0 es no hay nada de libertad, 10 si hay mucha libertad)',array('0',
                                '1',
                                '2',
                                '3',
                                '4',
                                '5',
                                '6',
                                '7',
                                '8',
                                '9',
                                '10',)),
                            array('En su trabajo, en el último año ¿sus compañeros por lo general toman en cuneta su opinión?',array('Si ',
                                'No',
                                'No sabe',)),
                            array('En su trabajo, en el último año ¿Sus compañeros valoran su trabajo y sus capacidades?',array('Si',
                                'No',
                                'No sabe',)),
                            array('En su trabajo, en el último año ¿Cómo es la comunicación con sus compañeros?',array('Muy cordial',
                                'Cordial',
                                'Regular',
                                'Hostil',
                                'Muy hostil',)),
                            array('En su trabajo, en el último año, ¿Se ha sentido amenazado o ha sido atacado por algún compañero?',array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                            array('En su trabajo, en el último año ¿Cómo es lenguaje entre los compañeros?',array('Muy cordial',
                                'Cordial',
                                'Regular',
                                'Hostil',
                                'Muy hostil',)),
                            array('En su trabajo, en el último año ¿Los conflictos entre compañeros se resuelven satisfactoriamente?',array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                        );

                    $user = $this->getUser()->getId();
                    $repository = $this->getDoctrine()->getRepository('CoreBundle:Climalaboral');
                    $query = $repository->createQueryBuilder('b')
                        ->where('b.id_cliente = :id_cliente')
                        ->setParameter('id_cliente', $user)
                        ->getQuery();
                    $clientes = $query->getArrayResult();


                    $body = '<table>
                                <thead>
                                <tr>
                                    <th>Num	</th>
                                   <th>Reactivo	</th>
                                   <th>Respuesta</th>
                                   <th>Comentario</th>
                                   <th>SI	</th>
                                    <th>En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro</th>
                                   <th>50%	</th>
                                    <th>En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro	</th>
                                    <th>NO</th>
                                </tr>
                                </thead>
                                <tbody>';
                    $i = 1;
                    $j=1;
                    foreach ($preguntas as $pregunta){
                        if ($j>=10){$ja=$j;}else{$ja="0".$j;};
                        $valor="";$valor2="";
                        $text= "";
                        $a="";
                        $b="";
                        $c="";
                        $d="";
                        $e="";
                        if(!is_null($clientes[0]["a".$ja])){
                            $valor=intval($clientes[0]["a".$ja]);

                            if ($valor===1 && $valor!=""){
                                $text = "Si";
                                $a = 1;
                                $b = 0;
                                $c = 0;
                                $d = 0;
                                $e = 0;
                            }
                            if ($valor===2 && $valor!=""){
                                $text = "En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro";
                                $a = 0;
                                $b = 1;
                                $c = 0;
                                $d = 0;
                                $e = 0;
                            }
                            if ($valor===3 && $valor!=""){
                                $text = "50%";
                                $a = 0;
                                $b = 0;
                                $c = 1;
                                $d = 0;
                                $e = 0;
                            }
                            if ($valor===4 && $valor!=""){
                                $text = "En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro";
                                $a = 0;
                                $b = 0;
                                $c = 0;
                                $d = 1;
                                $e = 0;
                            }
                            if ($valor===5 && $valor!=""){
                                $text = "No";
                                $a = 0;
                                $b = 0;
                                $c = 0;
                                $d = 0;
                                $e = 1;
                            }
                        }

                        if(trim($clientes[0]["b".$ja])!=""){
                            $valor2=$clientes[0]["b".$ja];
                        }

                        $body.='<tr><td>'.$i.'</td><td>'.$pregunta[0].'</td><td>'.$text.'</td><td>'.$valor2.'</td><td>'.$a.'</td><td>'.$b.'</td><td>'.$c.'</td><td>'.$d.'</td><td>'.$e.'</td>';
                        $i++;
                        $j++;

                    }

                    $body.=' </tbody>
                            </table>';
                    file_put_contents( $this->getParameter('web_dir')."xls/".$user.".xls",utf8_decode($body));
                    $message = \Swift_Message::newInstance()
                        ->setSubject('Nuevo Cuestionario')
                        ->setFrom('marcoalvarez@innology.mx')
                        ->setTo('marcoalvarez@innology.mx')
                        ->attach(Swift_Attachment::fromPath( $this->getParameter('web_dir')."xls/".$user.".xls"))
                        ->setBody('Nuevo Cuestionario',
                            'text/html'
                        );
                    $this->get('mailer')->send($message);*/
                    return $this->render('@Frontend/Default/Inicio/gestion.html.twig');
                }


            }
        }

        return $this->render('@Frontend/Default/Inicio/gestion.html.twig', array(
            'form' => $form->createView(),));

    }

    /**
     * @Route("/norma/contenido9", name="contenido9")
     */
    public function contenido9Action()
    {
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY') || true === $this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            return $this->redirect($this->generateUrl('frontend_sinacceso'));

        }
        return $this->render('@Frontend/Programa/contenido9.html.twig');
    }

    /**
     * @Route("/norma/contenido10", name="contenido10")
     */
    public function contenido10Action()
    {
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY') || true === $this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            return $this->redirect($this->generateUrl('frontend_sinacceso'));

        }
        return $this->render('@Frontend/Programa/contenido10.html.twig');
    }

    /**
     * @Route("/norma/contenido11", name="contenido11")
     */
    public function contenido11Action()
    {
        return $this->render('@Frontend/Programa/contenido11.html.twig');
    }

    /**
     * @Route("/norma/contenido12", name="contenido12")
     */
    public function contenido12Action()
    {
        return $this->render('@Frontend/Programa/contenido12.html.twig');
    }

    /**
     * @Route("/norma/contenido13", name="contenido13")
     */
    public function contenido13Action()
    {
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY') || true === $this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            //return $this->redirect($this->generateUrl('frontend_sinacceso'));

        }
        $form= $this->createForm(DiagnosticoseguridadType::class,null,array(
            'method' => 'POST',
        ));
        $preguntas =
            array(
                array('¿Existe un estudio de riesgo de incendio?',array('Si', 'No',)),
                array('¿Se cuenta con medios de detección y equipos contra incendio?',array('Si', 'No',)),
                array('¿Se cuenta con un programa de revisión a extintores?',array('Si', 'No',)),
                array('¿Se cuenta con un programa de revisión a los medios de detección y equipos contra incendio?',array('Si', 'No',)),
                array('¿Se cuenta con un programa de revisión a las instalaciones eléctricas y de gas LP y natural?',array('Si', 'No',)),
                array('¿Se cuenta con señalización adecuada en las áreas donde se producen, almacenan o manejan sustancias inflamables o explosivas?',array('Si', 'No',)),
                array('¿Se cuenta con instrucciones de seguridad para la prevención y protección de incendios al alcance de los trabajadores?',array('Si', 'No',)),
                array('¿Se cuenta con un croquis, plano o mapa que identifique las áreas o zonas con riesgo de incendio, la ubicación de los medios de detección de incendio y de los equipos y sistemas contra incendio, así como las rutas de evacuación?',array('Si', 'No',)),
                array('¿Esta prohibido el bloqueo, daño, inutilización o uso inadecuado de los equipos y sistemas contra incendio y demás elementos relacionados?',array('Si', 'No',)),
                array('¿Existen medidas de seguridad para prevenir la generación y acumulación de electricidad estática en las áreas donde se manejen sustancias inflamables o explosivas?',array('Si', 'No',)),
                array('¿Se cuenta con un plan de atención a emergencias de incendio?',array('Si', 'No',)),
                array('¿Se cuenta con rutas de evacuación adecuadas?',array('Si', 'No',)),
                array('¿Se cuenta con brigadas contra incendio?',array('Si', 'No',)),
                array('¿Se han desarrollado simulacros de emergencias de incendio?',array('Si', 'No')),
                array('¿Se cuenta con Equipo de Protección Personal para las brigadas contra incendio?',array('Si', 'No',)),
                array('¿Están capacitados y adiestrados los trabajadores y, en su caso, a los integrantes de las brigadas contra incendio?',array('Si', 'No',)),
                array('¿Se llevan registros de resultados de los programas de revisión y pruebas, así como de los simulacros de emergencias de incendio?',array('Si', 'No',)),
            );
        return $this->render('@Frontend/Programa/contenido13.html.twig',array(
                'preguntas' => $preguntas,
                'form' => $form->createView())
        );
    }

    /**
     * @Route("/seguridad", name="seguridad")
     */
    public function seguridadAction(Request $request){
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY') || true === $this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            return $this->redirect($this->generateUrl('frontend_sinacceso'));

        }
        $form = $this->createForm(DiagnosticoseguridadType::class,null,array(
            'method' => 'POST',
        ));

        $form->handleRequest($request);
        if ($form->isSubmitted()){
            if ($form->isValid()){
                $data = $form->getData();
                $em = $this->getDoctrine()->getManager();
                $user = $this->getUser()->getId();
                /*$cliente = $em->getRepository('CoreBundle:Diagnosticoweb')->findOneByIdCliente($user);*/
                $repository = $this->getDoctrine()->getRepository('CoreBundle:Diagnosticoseguridad');
                $query = $repository->createQueryBuilder('b')
                    ->where('b.id_cliente = :id_cliente')
                    ->setParameter('id_cliente', $user)
                    ->getQuery();
                $clientes = $query->getResult();

                if (!$clientes){
                    $encuesta = new Diagnosticoseguridad();
                    $encuesta->setIdCliente($this->getUser()->getId());
                    $encuesta->setA01($data['a01']);
                    $encuesta->setA02($data['a02']);
                    $encuesta->setA03($data['a03']);
                    $encuesta->setA04($data['a04']);
                    $encuesta->setA05($data['a05']);
                    $encuesta->setA06($data['a06']);
                    $encuesta->setA07($data['a07']);
                    $encuesta->setA08($data['a08']);
                    $encuesta->setA09($data['a09']);
                    $encuesta->setA10($data['a10']);
                    $encuesta->setA11($data['a11']);
                    $encuesta->setA12($data['a12']);
                    $encuesta->setA13($data['a13']);
                    $encuesta->setA14($data['a14']);
                    $encuesta->setA15($data['a15']);
                    $encuesta->setA16($data['a16']);
                    $encuesta->setA17($data['a17']);
                    $encuesta->setUsuario($data['usuario']);
                    $encuesta->setPuesto($data['puesto']);
                    $encuesta->setEmpresa($data['empresa']);
                    $encuesta->setNumero($data['numero']);

                    $em->persist($encuesta);
                    $em->flush();


                    $preguntas =
                        array(
                            array('En su trabajo, en el último año ¿ha recibido en contra de su voluntad, comentarios, propuestas, agresiones o bromas relacionadas con el sexo?',array('Si',
                                'No',)),
                            array('En su trabajo, en el último año ¿ha recibido amenazasa de daños o castigos en caso de no acceder a proporcionar favores sexuales?',array('Si',
                                'No',)),
                            array('En caso de haber contestado sí en alguna de las preguntas anteriores, ¿Se resolvio satisfactoriamente su caso?',array('Si',
                                'No',
                                'No aplica',)),
                            array('En su trabajo, en el último año, ¿su jefe(a) o algún(a) superior le ha aislado de sus compañros(as), mediante prohibiciones o cambios de lugar repentinos y poco razonables?',array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                            array('En su trabajo, en el último año ¿su jefe(a) o algún(a) superior a menospreciado ofensivamente su esfuerzo laboral o sus propuesas de trabajo?',array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                            array('En su trabajo, en el último año ¿su jefe(a) o algún(a) superior le ha girado instrucciones de manera altanera y poco educada?',array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                            array('En su trabajo, en el último año ¿su jefe(a) o algún(a) superior je ha impuesto tareas sin los medios necesarios para cumplirlas?',array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                            array('En su trabajo, en el último año, ¿su jefe(a) o superiores toman en cuenta su opinión?',array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                            array('En su trabajo, en el último año, ¿su jefe(a) o sus superiores valoran su trabajo y capacidades?',array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                            array('En su trabajo, en el último año, ¿Es consciente de sus responsabilidades y de lo que su jefe(a) inmediato(a) espera de usted?',array('Si',
                                'No',)),
                            array('En su trabajo, en el último año, que clasificación le pondría a la empresa en igualdad de oportunidades y no discriminación por motivos de sexo, raza, religión, edad, discapacidad, etc. (0 es la calificación más baja y 10 es la más alta o mejor): ',array('0',
                                '1',
                                '2',
                                '3',
                                '4',
                                '5',
                                '6',
                                '7',
                                '8',
                                '9',
                                '10',)),
                            array('En su trabajo, en el último año, ¿Las funciones y tareas estan definidas con claridad?',array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                            array('En su trabajo, en el último año ¿Las cargas de trabajo son justas y equitativas para todas y todos los que laboran en la organización?',array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                            array('En su trabajo, en el último año ¿Los sueldos y salarios para hombres y mujeres son de cáracter igualitario, cuando se realizan las mismas funciones, tareas y responsabilidades?',array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                            array('En su trabajo, en el último año, ¿Hay conciencia en los empleados (colaboadores, trabajadores, etc.) de su dignidad y que trabajan para su propio desarrollo? (0 es no hay nada de conciencia, 10 si hay mucha conciencia): ',array('0',
                                '1',
                                '2',
                                '3',
                                '4',
                                '5',
                                '6',
                                '7',
                                '8',
                                '9',
                                '10',)),
                            array('En su trabajo, en el último año ¿Siente que esta haciendo algo útil?',array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                            array('¿Le gusta su trabajo?',array('Mucho',
                                'Poco',
                                'Nada',)),
                            array('En su trabajo, en el último año ¿ha apendido cosas nuevas?',array('Si',
                                'No',)),
                            array('En su trabajo, en el último año ¿Ha podido ver a su familia antes o despues de ir a trabajar?',array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                            array('¿Se siente orgullosos de pertenecer a la empresa donde trabaja?',array('Si',
                                'No',)),
                            array('En su trabajo, en el último año ¿Se levanta con ánimo de  ir a trabajar?',array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                            array('En su trabajo, en el último año, ¿hay actitud y espíritu de servicio? (0 es n hay actitud de servicio, 10 si hay mucha actitud y espíritu de servicio)',array('0',
                                '1',
                                '2',
                                '3',
                                '4',
                                '5',
                                '6',
                                '7',
                                '8',
                                '9',
                                '10',)),
                            array('En su trabajo, en el último año, ¿Se practican los valores establecidos por la empresa?',array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                            array('En su trabajo, en el último año ¿Hay mas labor de convencimiento o más órdenes? (0 es que siempres se dan órdenes, 10 es que siempre hay labor de convencimiento)',array('0',
                                '1',
                                '2',
                                '3',
                                '4',
                                '5',
                                '6',
                                '7',
                                '8',
                                '9',
                                '10',)),
                            array('En su trabajo, en el último año ¿Se respeta mi libertad de pensar, expresarme y actuar? (0 es no hay nada de libertad, 10 si hay mucha libertad)',array('0',
                                '1',
                                '2',
                                '3',
                                '4',
                                '5',
                                '6',
                                '7',
                                '8',
                                '9',
                                '10',)),
                            array('En su trabajo, en el último año ¿sus compañeros por lo general toman en cuneta su opinión?',array('Si ',
                                'No',
                                'No sabe',)),
                            array('En su trabajo, en el último año ¿Sus compañeros valoran su trabajo y sus capacidades?',array('Si',
                                'No',
                                'No sabe',)),
                            array('En su trabajo, en el último año ¿Cómo es la comunicación con sus compañeros?',array('Muy cordial',
                                'Cordial',
                                'Regular',
                                'Hostil',
                                'Muy hostil',)),
                            array('En su trabajo, en el último año, ¿Se ha sentido amenazado o ha sido atacado por algún compañero?',array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                            array('En su trabajo, en el último año ¿Cómo es lenguaje entre los compañeros?',array('Muy cordial',
                                'Cordial',
                                'Regular',
                                'Hostil',
                                'Muy hostil',)),
                            array('En su trabajo, en el último año ¿Los conflictos entre compañeros se resuelven satisfactoriamente?',array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                        );

                    $user = $this->getUser()->getId();
                    $repository = $this->getDoctrine()->getRepository('CoreBundle:Diagnosticoseguridad');
                    $query = $repository->createQueryBuilder('b')
                        ->where('b.id_cliente = :id_cliente')
                        ->setParameter('id_cliente', $user)
                        ->getQuery();
                    $clientes = $query->getArrayResult();

                    /*$repository = $this->getDoctrine()->getRepository('CoreBundle:Clientes');
                    $query = $repository->createQueryBuilder('c')
                        ->where('c.id = :id')
                        ->setParameter('id', $user)
                        ->getQuery();
                    $usuario = $query->getResult();


                    $correo = $usuario->getCorreo();*/

                    $puntos = $repository = $this->getDoctrine()->getRepository('CoreBundle:Clientes')->findOneById($user);
                    $correo = $puntos->getEmail();

                    $body = '<table>
                                <thead>
                                <tr>
                                    <th>Num	</th>
                                   <th>Reactivo	</th>
                                   <th>Respuesta</th>
                                </tr>
                                </thead>
                                <tbody>';


                    $text1=""; $text2="";$text3=""; $text4="";$text5=""; $text6="";$text7=""; $text8="";$text9=""; $text10="";
                    $text11=""; $text12="";$text13=""; $text14="";$text15=""; $text16="";$text17="";
                    $usuario= "";
                    $puesto= "";
                    $empresa= "";
                    $numero= "";
                    if (!is_null($clientes[0]["a01"])) {
                        $a1 = intval($clientes[0]["a01"]);
                        if ($a1 == 1){
                            $text1='Si';
                        }
                        if ($a1 == 2){
                            $text1='No';
                        }
                    }
                    if (!is_null($clientes[0]["a02"])) {
                        $a2 = intval($clientes[0]["a02"]);
                        if ($a2 == 1){
                            $text2='Si';
                        }
                        if ($a2 == 2){
                            $text2='No';
                        }
                    }
                    if (!is_null($clientes[0]["a03"])) {
                        $a3 = intval($clientes[0]["a03"]);
                        if ($a3 == 1){
                            $text3='Si';
                        }
                        if ($a3 == 2){
                            $text3='No';
                        }
                    }
                    if (!is_null($clientes[0]["a04"])) {
                        $a4 = intval($clientes[0]["a04"]);
                        if ($a4 == 1){
                            $text4='Si';
                        }
                        if ($a4 == 2){
                            $text4='No';
                        }
                    }
                    if (!is_null($clientes[0]["a05"])) {
                        $a5 = intval($clientes[0]["a05"]);
                        if ($a5 == 1){
                            $text5='Si';
                        }
                        if ($a5 == 2){
                            $text5='No';
                        }
                    }
                    if (!is_null($clientes[0]["a06"])) {
                        $a6 = intval($clientes[0]["a06"]);
                        if ($a6 == 1){
                            $text6='Si';
                        }
                        if ($a6 == 2){
                            $text6='No';
                        }
                    }
                    if (!is_null($clientes[0]["a07"])) {
                        $a7 = intval($clientes[0]["a07"]);
                        if ($a7 == 1){
                            $text7='Si';
                        }
                        if ($a7 == 2){
                            $text7='No';
                        }
                    }
                    if (!is_null($clientes[0]["a08"])) {
                        $a8 = intval($clientes[0]["a08"]);
                        if ($a8 == 1){
                            $text8='Si';
                        }
                        if ($a8 == 2){
                            $text8='No';
                        }
                    }
                    if (!is_null($clientes[0]["a09"])) {
                        $a9 = intval($clientes[0]["a09"]);
                        if ($a9 == 1){
                            $text9='Si';
                        }
                        if ($a9 == 2){
                            $text9='No';
                        }
                    }
                    if (!is_null($clientes[0]["a10"])) {
                        $a10 = intval($clientes[0]["a10"]);
                        if ($a10 == 1){
                            $text10='Si';
                        }
                        if ($a10 == 2){
                            $text10='No';
                        }
                    }
                    if (!is_null($clientes[0]["a11"])) {
                        $a11 = intval($clientes[0]["a11"]);
                        if ($a11 == 1){
                            $text11='Si';
                        }
                        if ($a11 == 2){
                            $text11='No';
                        }
                    }
                    if (!is_null($clientes[0]["a12"])) {
                        $a12 = intval($clientes[0]["a12"]);
                        if ($a12 == 1){
                            $text12='Si';
                        }
                        if ($a12 == 2){
                            $text12='No';
                        }
                    }
                    if (!is_null($clientes[0]["a13"])) {
                        $a13 = intval($clientes[0]["a13"]);
                        if ($a13 == 1){
                            $text13='Si';
                        }
                        if ($a13 == 2){
                            $text13='No';
                        }
                    }
                    if (!is_null($clientes[0]["a14"])) {
                        $a14 = intval($clientes[0]["a14"]);
                        if ($a14 == 1){
                            $text14='Si';
                        }
                        if ($a14 == 2){
                            $text14='No';
                        }
                    }
                    if (!is_null($clientes[0]["a15"])) {
                        $a15 = intval($clientes[0]["a15"]);
                        if ($a15 == 1){
                            $text15='Si';
                        }
                        if ($a15 == 2){
                            $text15='No';
                        }
                    }
                    if (!is_null($clientes[0]["a16"])) {
                        $a16 = intval($clientes[0]["a16"]);
                        if ($a16 == 1){
                            $text16='Si';
                        }
                        if ($a16 == 2){
                            $text16='No';
                        }
                    }
                    if (!is_null($clientes[0]["a17"])) {
                        $a17 = intval($clientes[0]["a17"]);
                        if ($a17 == 1){
                            $text17='Si';
                        }
                        if ($a17 == 2){
                            $text17='No';
                        }
                    }
                    if (trim($clientes[0]["usuario"])!= "") {
                        $usuario = $clientes[0]["usuario"];
                    }
                    if (trim($clientes[0]["puesto"])!= "") {
                        $puesto = $clientes[0]["puesto"];
                    }
                    if (trim($clientes[0]["empresa"])!= "") {
                        $empresa = $clientes[0]["empresa"];
                    }
                    if (trim($clientes[0]["numero"])!= "") {
                        $numero = $clientes[0]["numero"];
                    }


                    $body .= '<tr><td>1</td><td>¿Existe un estudio de riesgo de incendio?</td><td>' . $text1 . '</td>';
                    $body .= '<tr><td>2</td><td>¿Se cuenta con medios de detección y equipos contra incendio?</td><td>' . $text2 . '</td>';
                    $body .= '<tr><td>3</td><td>¿Se cuenta con un programa de revisión a extintores?</td><td>' . $text3 . '</td>';
                    $body .= '<tr><td>4</td><td>¿Se cuenta con un programa de revisión a los medios de detección y equipos contra incendio?</td><td>' . $text4 . '</td>';
                    $body .= '<tr><td>5</td><td>¿Se cuenta con un programa de revisión a las instalaciones eléctricas y de gas LP y natural?</td><td>' . $text5 . '</td>';
                    $body .= '<tr><td>6</td><td>¿Se cuenta con señalización adecuada en las áreas donde se producen, almacenan o manejan sustancias inflamables o explosivas?</td><td>' . $text6 . '</td>';
                    $body .= '<tr><td>7</td><td>¿Se cuenta con instrucciones de seguridad para la prevención y protección de incendios al alcance de los trabajadores?</td><td>' . $text7 . '</td>';
                    $body .= '<tr><td>8</td><td>¿Se cuenta con un croquis, plano o mapa que identifique las áreas o zonas con riesgo de incendio, la ubicación de los medios de detección de incendio y de los equipos y sistemas contra incendio, así como las rutas de evacuación?</td><td>' . $text8 . '</td>';
                    $body .= '<tr><td>9</td><td>¿Esta prohibido el bloqueo, daño, inutilización o uso inadecuado de los equipos y sistemas contra incendio y demás elementos relacionados?</td><td>' . $text9 . '</td>';
                    $body .= '<tr><td>10</td><td>¿Existen medidas de seguridad para prevenir la generación y acumulación de electricidad estática en las áreas donde se manejen sustancias inflamables o explosivas?</td><td>' . $text10 . '</td>';
                    $body .= '<tr><td>11</td><td>¿Se cuenta con un plan de atención a emergencias de incendio?</td><td>' . $text11 . '</td>';
                    $body .= '<tr><td>12</td><td>¿Se cuenta con rutas de evacuación adecuadas?</td><td>' . $text12 . '</td>';
                    $body .= '<tr><td>17</td><td>¿Se cuenta con brigadas contra incendio?</td><td>' . $text13 . '</td>';
                    $body .= '<tr><td>14</td><td>¿Se han desarrollado simulacros de emergencias de incendio?</td><td>' . $text14 . '</td>';
                    $body .= '<tr><td>15</td><td>¿Se cuenta con Equipo de Protección Personal para las brigadas contra incendio?</td><td>' . $text15 . '</td>';
                    $body .= '<tr><td>16</td><td>¿Están capacitados y adiestrados los trabajadores y, en su caso, a los integrantes de las brigadas contra incendio?</td><td>' . $text16 . '</td>';
                    $body .= '<tr><td>17</td><td>¿Se llevan registros de resultados de los programas de revisión y pruebas, así como de los simulacros de emergencias de incendio?</td><td>' . $text17 . '</td>';
                    $body .= '<tr><td>18</td><td>Nombre de quien contesta la encuesta: </td><td>' . $usuario . '</td>';
                    $body .= '<tr><td>19</td><td>Puesto de quien contesta la encuesta: </td><td>' . $puesto . '</td>';
                    $body .= '<tr><td>20</td><td>Nombre de la empresa y sucursal: </td><td>' . $empresa . '</td>';
                    $body .= '<tr><td>21</td><td>Numero de la sucursal: </td><td>' . $numero . '</td>';

                    $body.=' </tbody>
                            </table>';
                    file_put_contents( $this->getParameter('web_dir')."xls/".$user.".xls", mb_convert_encoding($body, "ISO-8859-1", mb_detect_encoding($body, "UTF-8, ISO-8859-1, ISO-8859-15", true)));
                    $uno = "cesar@innology.mx";
                    $dos = "cricardez@crese.org";

                    $message = \Swift_Message::newInstance()
                        ->setSubject('Nuevo Cuestionario')
                        ->setFrom($correo)
                        ->setTo($uno)
                        ->attach(Swift_Attachment::fromPath( $this->getParameter('web_dir')."xls/".$user.".xls"))
                        ->setBody('Nuevo Cuestionario',
                            'text/html'
                        );
                    $this->get('mailer')->send($message);

                    $request->getSession()->getFlashBag()->add('success', 'Encuesta Terminada!');
                    /*return $this->render('@Frontend/Default/Inicio/gestion.html.twig');*/
                    return $this->redirect($this->generateUrl('gestion'));
                }
            }
        }

        return $this->render('@Frontend/Default/Inicio/gestion.html.twig', array(
            'form' => $form->createView(),));

    }

    /**
     * @Route("/norma/contenido14", name="contenido14")
     */
    public function contenido14Action()
    {
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY') || true === $this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            //return $this->redirect($this->generateUrl('frontend_sinacceso'));

        }
        $form= $this->createForm(DiagnosticosaludType::class,null,array(
            'method' => 'POST',
        ));
        $preguntas =
            array(
                array('¿Se cuenta con algún médico o personal capacitado, para proporcionar atención en caso de un accidente en el trabajo (PreR II de la Norma CRESE 2014)?',array('Si', 'No',)),
                array('¿Qué acciones se tienen en la empresa para promover la salud de los trabajadores (Art. 49, II, Reglamento) (PreR II-11 de la Norma CRESE 2014, mínimo auditable "a" del R9 y R10)?'),
                array('¿Qué acciones se tienen en la empresa para prevenir las adicciones en los trabajadores (Art. 49, II, Reglamento) (PreR II-11 de la Norma CRESE 2014, mínimo auditable "a" del R9 y R10)?'),
                array('¿Se cuenta con un botiquín de primeros auxilios debidamente equipado; (Pre-requisito II-16, Botiquín, mínimo auditable "a" del R8)?',array('Si', 'No',)),
                array('¿Cómo se da seguimiento a las acciones de los incisos II y III de este diagnóstico? (PreR II-11 de la Norma CRESE 2014, mínimo auditable "a" del R9 y R10)?'),
                array('¿Cómo se apoya la actualización (capacitación y adiestramiento) de los responsables de los servicios preventivos de medicina del trabajo de carácter interno, en su caso (PreR II-11 de la Norma CRESE 2014, mínimo auditable "b" del R8 y "d" del R10)?'),
            );
        return $this->render('@Frontend/Programa/contenido14.html.twig',array(
                'preguntas' => $preguntas,
                'form' => $form->createView())
        );
    }

    /**
     * @Route("/norma/contenido15", name="contenido15")
     */
    public function contenido15Action()
    {
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY') || true === $this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            return $this->redirect($this->generateUrl('frontend_sinacceso'));

        }
        return $this->render('@Frontend/Programa/contenido15.html.twig');
    }

    /**
     * @Route("/norma/contenido16", name="contenido16")
     */
    public function contenido16Action()
    {
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY') || true === $this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            return $this->redirect($this->generateUrl('frontend_sinacceso'));

        }
        return $this->render('@Frontend/Programa/contenido16.html.twig');
    }

    /**
     * @Route("/norma/contenido17", name="contenido17")
     */
    public function contenido17Action()
    {
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY') || true === $this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            return $this->redirect($this->generateUrl('frontend_sinacceso'));

        }
        return $this->render('@Frontend/Programa/contenido17.html.twig');
    }

    /**
     * @Route("/norma/contenido18", name="contenido18")
     */
    public function contenido18Action()
    {
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY') || true === $this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            return $this->redirect($this->generateUrl('frontend_sinacceso'));

        }
        return $this->render('@Frontend/Programa/contenido18.html.twig');
    }

    /**
     * @Route("/salud", name="salud")
     */
    public function saludAction(Request $request){
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY') || true === $this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            return $this->redirect($this->generateUrl('frontend_sinacceso'));

        }
        $form = $this->createForm(DiagnosticosaludType::class,null,array(
            'method' => 'POST',
        ));

        $form->handleRequest($request);
        if ($form->isSubmitted()){
            if ($form->isValid()){
                $data = $form->getData();
                $em = $this->getDoctrine()->getManager();
                $user = $this->getUser()->getId();
                /*$cliente = $em->getRepository('CoreBundle:Diagnosticoweb')->findOneByIdCliente($user);*/
                $repository = $this->getDoctrine()->getRepository('CoreBundle:Diagnosticosalud');
                $query = $repository->createQueryBuilder('b')
                    ->where('b.id_cliente = :id_cliente')
                    ->setParameter('id_cliente', $user)
                    ->getQuery();
                $clientes = $query->getResult();

                if (!$clientes){
                    $encuesta = new Diagnosticosalud();
                    $encuesta->setIdCliente($this->getUser()->getId());
                    $encuesta->setA01($data['a01']);
                    $encuesta->setA02($data['a02']);
                    $encuesta->setA03($data['a03']);
                    $encuesta->setA04($data['a04']);
                    $encuesta->setA05($data['a05']);
                    $encuesta->setA06($data['a06']);
                    $encuesta->setEmpresa($data['empresa']);
                    $encuesta->setSucursal($data['sucursal']);
                    $encuesta->setNombre($data['nombre']);
                    $encuesta->setDepartamento($data['departamento']);
                    $encuesta->setAsesor($data['asesor']);
                    $encuesta->setFecha($data['fecha']);

                    $em->persist($encuesta);
                    $em->flush();


                    $preguntas =
                        array(
                            array('En su trabajo, en el último año ¿ha recibido en contra de su voluntad, comentarios, propuestas, agresiones o bromas relacionadas con el sexo?',array('Si',
                                'No',)),
                            array('En su trabajo, en el último año ¿ha recibido amenazasa de daños o castigos en caso de no acceder a proporcionar favores sexuales?',array('Si',
                                'No',)),
                            array('En caso de haber contestado sí en alguna de las preguntas anteriores, ¿Se resolvio satisfactoriamente su caso?',array('Si',
                                'No',
                                'No aplica',)),
                            array('En su trabajo, en el último año, ¿su jefe(a) o algún(a) superior le ha aislado de sus compañros(as), mediante prohibiciones o cambios de lugar repentinos y poco razonables?',array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                            array('En su trabajo, en el último año ¿su jefe(a) o algún(a) superior a menospreciado ofensivamente su esfuerzo laboral o sus propuesas de trabajo?',array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                            array('En su trabajo, en el último año ¿su jefe(a) o algún(a) superior le ha girado instrucciones de manera altanera y poco educada?',array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                            array('En su trabajo, en el último año ¿su jefe(a) o algún(a) superior je ha impuesto tareas sin los medios necesarios para cumplirlas?',array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                            array('En su trabajo, en el último año, ¿su jefe(a) o superiores toman en cuenta su opinión?',array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                            array('En su trabajo, en el último año, ¿su jefe(a) o sus superiores valoran su trabajo y capacidades?',array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                            array('En su trabajo, en el último año, ¿Es consciente de sus responsabilidades y de lo que su jefe(a) inmediato(a) espera de usted?',array('Si',
                                'No',)),
                            array('En su trabajo, en el último año, que clasificación le pondría a la empresa en igualdad de oportunidades y no discriminación por motivos de sexo, raza, religión, edad, discapacidad, etc. (0 es la calificación más baja y 10 es la más alta o mejor): ',array('0',
                                '1',
                                '2',
                                '3',
                                '4',
                                '5',
                                '6',
                                '7',
                                '8',
                                '9',
                                '10',)),
                            array('En su trabajo, en el último año, ¿Las funciones y tareas estan definidas con claridad?',array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                            array('En su trabajo, en el último año ¿Las cargas de trabajo son justas y equitativas para todas y todos los que laboran en la organización?',array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                            array('En su trabajo, en el último año ¿Los sueldos y salarios para hombres y mujeres son de cáracter igualitario, cuando se realizan las mismas funciones, tareas y responsabilidades?',array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                            array('En su trabajo, en el último año, ¿Hay conciencia en los empleados (colaboadores, trabajadores, etc.) de su dignidad y que trabajan para su propio desarrollo? (0 es no hay nada de conciencia, 10 si hay mucha conciencia): ',array('0',
                                '1',
                                '2',
                                '3',
                                '4',
                                '5',
                                '6',
                                '7',
                                '8',
                                '9',
                                '10',)),
                            array('En su trabajo, en el último año ¿Siente que esta haciendo algo útil?',array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                            array('¿Le gusta su trabajo?',array('Mucho',
                                'Poco',
                                'Nada',)),
                            array('En su trabajo, en el último año ¿ha apendido cosas nuevas?',array('Si',
                                'No',)),
                            array('En su trabajo, en el último año ¿Ha podido ver a su familia antes o despues de ir a trabajar?',array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                            array('¿Se siente orgullosos de pertenecer a la empresa donde trabaja?',array('Si',
                                'No',)),
                            array('En su trabajo, en el último año ¿Se levanta con ánimo de  ir a trabajar?',array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                            array('En su trabajo, en el último año, ¿hay actitud y espíritu de servicio? (0 es n hay actitud de servicio, 10 si hay mucha actitud y espíritu de servicio)',array('0',
                                '1',
                                '2',
                                '3',
                                '4',
                                '5',
                                '6',
                                '7',
                                '8',
                                '9',
                                '10',)),
                            array('En su trabajo, en el último año, ¿Se practican los valores establecidos por la empresa?',array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                            array('En su trabajo, en el último año ¿Hay mas labor de convencimiento o más órdenes? (0 es que siempres se dan órdenes, 10 es que siempre hay labor de convencimiento)',array('0',
                                '1',
                                '2',
                                '3',
                                '4',
                                '5',
                                '6',
                                '7',
                                '8',
                                '9',
                                '10',)),
                            array('En su trabajo, en el último año ¿Se respeta mi libertad de pensar, expresarme y actuar? (0 es no hay nada de libertad, 10 si hay mucha libertad)',array('0',
                                '1',
                                '2',
                                '3',
                                '4',
                                '5',
                                '6',
                                '7',
                                '8',
                                '9',
                                '10',)),
                            array('En su trabajo, en el último año ¿sus compañeros por lo general toman en cuneta su opinión?',array('Si ',
                                'No',
                                'No sabe',)),
                            array('En su trabajo, en el último año ¿Sus compañeros valoran su trabajo y sus capacidades?',array('Si',
                                'No',
                                'No sabe',)),
                            array('En su trabajo, en el último año ¿Cómo es la comunicación con sus compañeros?',array('Muy cordial',
                                'Cordial',
                                'Regular',
                                'Hostil',
                                'Muy hostil',)),
                            array('En su trabajo, en el último año, ¿Se ha sentido amenazado o ha sido atacado por algún compañero?',array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                            array('En su trabajo, en el último año ¿Cómo es lenguaje entre los compañeros?',array('Muy cordial',
                                'Cordial',
                                'Regular',
                                'Hostil',
                                'Muy hostil',)),
                            array('En su trabajo, en el último año ¿Los conflictos entre compañeros se resuelven satisfactoriamente?',array('Nunca',
                                'Casi nunca ',
                                'Ocasionalmente',
                                'Casi siempre',
                                'Siempre',)),
                        );

                    $user = $this->getUser()->getId();
                    $repository = $this->getDoctrine()->getRepository('CoreBundle:Diagnosticosalud');
                    $query = $repository->createQueryBuilder('b')
                        ->where('b.id_cliente = :id_cliente')
                        ->setParameter('id_cliente', $user)
                        ->getQuery();
                    $clientes = $query->getArrayResult();

                    /*$repository = $this->getDoctrine()->getRepository('CoreBundle:Clientes');
                    $query = $repository->createQueryBuilder('c')
                        ->where('c.id = :id')
                        ->setParameter('id', $user)
                        ->getQuery();
                    $usuario = $query->getResult();


                    $correo = $usuario->getCorreo();*/

                    $puntos = $repository = $this->getDoctrine()->getRepository('CoreBundle:Clientes')->findOneById($user);
                    $correo = $puntos->getEmail();


                    $body = '<table>
                                <thead>
                                <tr>
                                    <th>Num	</th>
                                   <th>Reactivo	</th>
                                   <th>Respuesta</th>
                                </tr>
                                </thead>
                                <tbody>';

                    $text1=""; $a2="";$a3=""; $text4="";$a5=""; $a6="";
                    $empresa= "";
                    $sucursal= "";
                    $nombre= "";
                    $departamento= "";
                    $asesor= "";
                    $date= "";
                    if (!is_null($clientes[0]["a01"])) {
                        $a1 = intval($clientes[0]["a01"]);
                        if ($a1 == 1){
                            $text1='Si';
                        }
                        if ($a1 == 2){
                            $text1='No';
                        }
                    }
                    if (trim($clientes[0]["a02"]) != "") {
                        $a2 = $clientes[0]["a02"];
                    }
                    if (trim($clientes[0]["a03"]) != "") {
                        $a3 = $clientes[0]["a03"];
                    }
                    if (!is_null($clientes[0]["a04"])) {
                        $a4 = intval($clientes[0]["a04"]);
                        if ($a4 == 1){
                            $text4='Si';
                        }
                        if ($a4 == 2){
                            $text4='No';
                        }
                    }
                    if (trim($clientes[0]["a05"]) != "") {
                        $a5 = $clientes[0]["a05"];
                    }
                    if (trim($clientes[0]["a06"]) != "") {
                        $a6 = $clientes[0]["a06"];
                    }
                    if (trim($clientes[0]["empresa"])!= "") {
                        $empresa = $clientes[0]["empresa"];
                    }
                    if (trim($clientes[0]["sucursal"])!= "") {
                        $sucursal = $clientes[0]["sucursal"];
                    }
                    if (trim($clientes[0]["nombre"])!= "") {
                        $nombre = $clientes[0]["nombre"];
                    }
                    if (trim($clientes[0]["departamento"])!= "") {
                        $departamento = $clientes[0]["departamento"];
                    }
                    if (trim($clientes[0]["asesor"])!= "") {
                        $asesor = $clientes[0]["asesor"];
                    }
                    if ($clientes[0]["fecha"]!= "") {
                        $date = $clientes[0]["fecha"];
                        $date = $date->format('Y-m-d');
                    }

                    $body .= '<tr><td>1</td><td>¿Se cuenta con algún médico o personal capacitado, para proporcionar atención en caso de un accidente en el trabajo (PreR II de la Norma CRESE 2014)?</td><td>' . $text1 . '</td>';
                    $body .= '<tr><td>2</td><td>¿Qué acciones se tienen en la empresa para promover la salud de los trabajadores (Art. 49, II, Reglamento) (PreR II-11 de la Norma CRESE 2014, mínimo auditable "a" del R9 y R10)?</td><td>' . $a2 . '</td>';
                    $body .= '<tr><td>3</td><td>¿Qué acciones se tienen en la empresa para prevenir las adicciones en los trabajadores (Art. 49, II, Reglamento) (PreR II-11 de la Norma CRESE 2014, mínimo auditable "a" del R9 y R10)?</td><td>' . $a3 . '</td>';
                    $body .= '<tr><td>4</td><td>¿Se cuenta con un botiquín de primeros auxilios debidamente equipado; (Pre-requisito II-16, Botiquín, mínimo auditable "a" del R8)?</td><td>' . $text4 . '</td>';
                    $body .= '<tr><td>5</td><td>¿Cómo se da seguimiento a las acciones de los incisos II y III de este diagnóstico? (PreR II-11 de la Norma CRESE 2014, mínimo auditable "a" del R9 y R10)?</td><td>' . $a5 . '</td>';
                    $body .= '<tr><td>6</td><td>¿Cómo se apoya la actualización (capacitación y adiestramiento) de los responsables de los servicios preventivos de medicina del trabajo de carácter interno, en su caso (PreR II-11 de la Norma CRESE 2014, mínimo auditable "b" del R8 y "d" del R10)?</td><td>' . $a6 . '</td>';
                    $body .= '<tr><td></td><td>Nombre de la Empresa u Organización: </td><td>' . $empresa . '</td><td></td>';
                    $body .= '<tr><td></td><td>Sucursal: </td><td>' . $sucursal . '</td><td></td>';
                    $body .= '<tr><td></td><td>Nombre de Quien Contesto el Diagnóstico: </td><td>' . $nombre . '</td><td></td>';
                    $body .= '<tr><td></td><td>Departamento/Area: </td><td>' . $departamento . '</td><td></td>';
                    $body .= '<tr><td></td><td>Asesor de Empresa Responsable: </td><td>' . $asesor . '</td><td></td>';
                    $body .= '<tr><td></td><td>Fecha: </td><td>' . $date . '</td><td></td>';

                    $body.=' </tbody>
                            </table>';
                    file_put_contents( $this->getParameter('web_dir')."xls/".$user.".xls", mb_convert_encoding($body, "ISO-8859-1", mb_detect_encoding($body, "UTF-8, ISO-8859-1, ISO-8859-15", true)));

                    $uno = "cesar@innology.mx";
                    $dos = "cricardez@crese.org";

                    $message = \Swift_Message::newInstance()
                        ->setSubject('Nuevo Cuestionario')
                        ->setFrom($correo)
                        ->setTo($uno)
                        ->attach(Swift_Attachment::fromPath( $this->getParameter('web_dir')."xls/".$user.".xls"))
                        ->setBody('Nuevo Cuestionario',
                            'text/html'
                        );
                    $this->get('mailer')->send($message);

                    $request->getSession()->getFlashBag()->add('success', 'Encuesta Terminada!');
                    /*return $this->render('@Frontend/Default/Inicio/gestion.html.twig');*/
                    return $this->redirect($this->generateUrl('gestion'));
                }


            }
        }

        return $this->render('@Frontend/Default/Inicio/gestion.html.twig', array(
            'form' => $form->createView(),));

    }

}
