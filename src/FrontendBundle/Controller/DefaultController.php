<?php

namespace FrontendBundle\Controller;

use CoreBundle\Entity\Boletin;
use FrontendBundle\Form\BoletinType;
use FrontendBundle\Form\ContactoType;
use FrontendBundle\Form\SolicitudCarpetaType;
use FrontendBundle\Form\SolicitudType;
use FrontendBundle\Form\ValoresType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        $banners=null;
        $repository = $this->getDoctrine()->getRepository('CoreBundle:Banners');
        $query = $repository->createQueryBuilder('b')
            ->where('b.publicar = :act')
            ->orderby('b.orden','ASC')
            ->setParameter('act', '1')
            ->getQuery();
        $banners = $query->getResult();
        return $this->render('FrontendBundle:Default:index.html.twig',array("banners"=>$banners,'enviado'=>0));

        //$this->get("send_mail")->send("hola@hotmail.com","hola@hotmail.com","test","test",null);
    }
    
    /**
     * @Route("/contacto", name="contacto")
     */
    public function contactoAction(Request $request)
    {
        $form = $this->createForm(ContactoType::class,null,array(
            'method' => 'POST',
        ));
        $enviado=0;
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if($form->isValid()){
                $data = $form->getData();
                //Empresa
                $message = \Swift_Message::newInstance()
                    ->setSubject('Plataforma ER - Contacto')
                    ->setFrom(array('info@plataforma-er.com'))
                    ->setTo(array('info@empresaresponsable.org','cricardez@red-erac.com',
                        'luise.omc@gmail.com'))
                    //->setTo(array('cesar@innology.mx'))
                    ->setBody(
                        $this->renderView('@Frontend/Default/mail/contacto.html.twig',array('contacto'=>$data)),
                        'text/html'
                    )
                ;
                $this->get('mailer')->send($message);

                $enviado=1;

            }else{
                $enviado=0;
            }
        }else{
            $enviado=0;
        }

        return $this->render('@Frontend/Default/Inicio/contacto.html.twig', array(
            'form' => $form->createView(),
            'enviado' => $enviado,
        ));
    }
    
    /**
     * @Route("/solicitud", name="solicitud")
     */
    public function solicitudAction(Request $request)
    {
        $form = $this->createForm(SolicitudType::class,null,array(
            'method' => 'POST',
        ));
        $enviado=0;
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if($form->isValid()){
                // data is an array with "name", "email"
                $data = $form->getData();

                //Clientes
                $message = \Swift_Message::newInstance()
                    ->setSubject('Empresa Responsable - Solicitud a Medida')
                    ->setFrom(array('no-reply@plataforma-er.com'))
                    ->setTo($data['email'])
                    ->setBody(
                        $this->renderView('@Frontend/Default/mail/preregistro.html.twig',array('destinatario'=>$data['nombre'])),
                        'text/html'
                    )
                    ->attach(\Swift_Attachment::fromPath('assets/web/Solicitud.docx'))
                ;
                $this->get('mailer')->send($message);

                //Empresa
                $message = \Swift_Message::newInstance()
                    ->setSubject('Plataforma ER - Solicitud a Medida')
                    ->setFrom(array('info@plataforma-er.com'))
                    ->setTo(array('info@empresaresponsable.org','cricardez@red-erac.com',
                    'luise.omc@gmail.com'))
                    //->setTo('cesar@innology.mx')
                    ->setBody(
                        $this->renderView('@Frontend/Default/mail/preregistroempresa.html.twig',array('empresa'=>$data['empresa'],'nombre'=>$data['nombre'],'puesto'=>$data['puesto'],'telefono'=>$data['telefono'],'email'=>$data['email'],'ciudad'=>$data['ciudad'],'comentario'=>$data['comentario'])),
                        'text/html'
                    )
                ;
                $this->get('mailer')->send($message);

                $enviado=1;

                }else{
                    $enviado=0;
                }
                //return $this->redirectToRoute('homepage');
            }else{
            $enviado=0;
            }

        return $this->render('@Frontend/Default/Inicio/solicitud.html.twig', array(
            'form' => $form->createView(),
            'enviado' => $enviado,
        ));
    }

    /**
     * @Route("/valores", name="solicitud_valores")
     */
    public function valoresAction(Request $request)
    {
        $form = $this->createForm(ValoresType::class,null,array('method' => 'POST',));
        $enviado=0;
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if($form->isValid()){
                $data = $form->getData();

                //Empresa
                $message = \Swift_Message::newInstance()
                    ->setSubject('Plataforma ER - Programa de Principios y Valores')
                    ->setFrom(array('info@plataforma-er.com'))
                    ->setTo(array('info@empresaresponsable.org','cricardez@red-erac.com',
                        'luise.omc@gmail.com'))
                    //->setTo(array('cesar@innology.mx'))
                    ->setBody(
                        $this->renderView('@Frontend/Default/mail/solicitud_valores.html.twig',array('empresa'=>$data['empresa'],'nombre'=>$data['nombre'],'puesto'=>$data['puesto'],'telefono'=>$data['telefono'],'email'=>$data['email'],'valores'=>$data['valores'])),
                        'text/html'
                    )
                ;
                $this->get('mailer')->send($message);
                $enviado=1;

            }else{
                $enviado=0;
            }
        }else{
            $enviado=0;
        }

        return $this->render('@Frontend/Default/Inicio/solicitud_valores.html.twig', array('form' => $form->createView(),
            'enviado' => $enviado,));
    }

    /**
     * @Route("/sinacceso", name="frontend_sinacceso")
     */
    public function sinaccesoAction(Request $request)
    {
        return $this->render('@Frontend/Default/Inicio/sinacceso.html.twig');
    }

    /**
     * @Route("/cotizar-programa", name="solicitud_carpeta")
     */
    public function solicitudCarpetaAction(Request $request)
    {
        $form = $this->createForm(SolicitudCarpetaType::class,null,array(
            'method' => 'POST',
        ));
        $enviado=0;
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if($form->isValid()){
                $data = $form->getData();

                //Clientes
                $message = \Swift_Message::newInstance()
                    ->setSubject('Empresa Responsable - Solicitud Revisión Adicional de Programa')
                    ->setFrom(array('no-reply@plataforma-er.com'))
                    ->setTo($data['email'])
                    ->setBody(
                        $this->renderView('@Frontend/Default/mail/solicitud_carpeta.html.twig',array('destinatario'=>$data['nombre'])),
                        'text/html'
                    )
                    ->attach(\Swift_Attachment::fromPath('assets/web/Solicitud_Carpeta.docx'))
                ;
                $this->get('mailer')->send($message);

                //Empresa
                $message = \Swift_Message::newInstance()
                    ->setSubject('Plataforma ER - Solicitud Revisión Adicional de Programa')
                    ->setFrom(array('info@plataforma-er.com'))
                    ->setTo(array('info@empresaresponsable.org','cricardez@red-erac.com',/*'leolivera@empresaresponsable.org',*/
                        'luise.omc@gmail.com'))
                    //->setTo('cesar@innology.mx')
                    ->setBody(
                        $this->renderView('@Frontend/Default/mail/solicitud_carpetaempresa.html.twig',array('empresa'=>$data['empresa'],'nombre'=>$data['nombre'],'email'=>$data['email'])),
                        'text/html'
                    )
                ;
                $this->get('mailer')->send($message);

                $enviado=1;

            }else{
                $enviado=0;
            }
        }else{
            $enviado=0;
        }

        return $this->render('@Frontend/Default/Inicio/solicitud_carpeta.html.twig', array(
            'form' => $form->createView(),
            'enviado' => $enviado,
        ));
    }

    /**
     * @Route("/boletin", name="boletin")
     */
    public function postBoletinAction(Request $request){
        $form = $this->createForm(BoletinType::class,null,array(
            'method' => 'POST',
        ));
        $enviado=0;
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if($form->isValid()){
                $data = $form->getData();
                $em = $this->getDoctrine()->getManager();
                $buscar = $em->getRepository('CoreBundle:Boletin')->findOneByEmail($data['email']);
                if(!$buscar){
                    //Empresa
                    $message = \Swift_Message::newInstance()
                        ->setSubject('Plataforma ER - Boletín')
                        ->setFrom(array('info@plataforma-er.com'))
                        ->setTo(array('info@empresaresponsable.org'))
                        //->setTo(array('cesar@innology.mx'))
                        ->setBody(
                            $this->renderView('@Frontend/Default/mail/boletin.html.twig',array('contacto'=>$data)),
                            'text/html'
                        )
                    ;
                    $this->get('mailer')->send($message);
                    $enviado=1;
                    $boletin = new Boletin();
                    $boletin->setEmail($data['email']);
                    $em->persist($boletin);
                    $em->flush();
                }else{
                    $enviado=2;
                }
            }else{
                $enviado=0;
            }
        }
        $status = array('status'=>$enviado);
        return new JsonResponse($status);
    }

    /**
     * @Route("/codigo", name="frontend_codigo")
     */
    public function codigoAction(Request $request)
    {
        return $this->render('@Frontend/partials/wtf.html.twig');
    }

}
