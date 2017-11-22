<?php

namespace FrontendBundle\Controller;

use CoreBundle\Entity\Programas;
use CoreBundle\Entity\Respuestas;
use CoreBundle\Entity\Minutas;
use CoreBundle\Entity\Seccion_Contenidos;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Swift_Attachment;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use FrontendBundle\Form\MinutasType;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

class ProgramaController extends Controller
{
    /**
     * @Route("/programa/{slug}.{_format}", defaults={"_format": "html"}, requirements={"_format": "html"}, name="frontend_programa")
     */
    public function programaAction(Programas $programa)
    {
        $secciones=null;
        if (empty($programa)) {
            
        }else{
            /*$repository = $this->getDoctrine()->getRepository('CoreBundle:Paginas');
            $paginas = $repository->find(
                array('id_categoria' => $categorias->getId())
            );*/
            $repository = $this->getDoctrine()->getRepository('CoreBundle:Secciones');
            $query = $repository->createQueryBuilder('p')
                    ->innerjoin('p.seccionContenidos','s')
                    ->where('p.activo = :act')
                    ->andWhere('p.programa = :programa')
                    ->orderby('s.secciones','ASC')
                    ->addOrderBy('p.orden','ASC')
                    ->addOrderBy('s.orden','ASC')
                    ->setParameter('act', '1')
                    ->setParameter('programa', $programa)
                    ->getQuery();
            $secciones = $query->getResult();
        }
        return $this->render('FrontendBundle:Programa:programa.html.twig',
            array(
                "programa"=>$programa,
                "secciones"=>$secciones
            ));
    }

    /**
     * @Route("/contenido/{slug}.{_format}", defaults={"_format": "html"}, requirements={"_format": "html"}, name="frontend_contenido")
     */
    public function contenidoAction(Seccion_Contenidos $contenido, Request $request)
    {
        $secciones=null;
        $valido=false;
        if(empty($contenido)){
        }else{
            foreach ($contenido->getNiveles() as $nivel){
                if($nivel->getId()==$this->getUser()->getNiveles()->getId()){
                    $valido=true;
                }
            }
        }
        if(!$valido){
            return $this->redirect($this->generateUrl('frontend_sinacceso'));
        }else{
            if($contenido->getTipo()==1){
                if($contenido->getId()==7 || $contenido->getId()==9 || $contenido->getId()==11 || $contenido->getId()==13 || $contenido->getId()==19){
                    $repository = $this->getDoctrine()->getRepository('CoreBundle:Reportes');
                    $query = $repository->createQueryBuilder('r')
                        ->where('r.seccionContenidos = :id')
                        ->andWhere('r.clientes = :idc')
                        ->orderby('r.id','ASC')
                        ->setParameter('id', $contenido->getId())
                        ->setParameter('idc', $this->getUser()->getId())
                        ->getQuery();
                    $reportes = $query->getResult();
                    return $this->render('@Frontend/Programa/contenidoinfo.html.twig',array("contenido"=>$contenido,"reportes"=>$reportes));
                }else{
                    return $this->render('@Frontend/Programa/contenidoinfo.html.twig',array("contenido"=>$contenido));
                }
            };
            if($contenido->getTipo()==2){
                return $this->render('@Frontend/Programa/contenidoppt.html.twig',
                    array(
                        "contenido"=>$contenido
                    ));
            };
            if($contenido->getTipo()==3){
                return $this->render('@Frontend/Programa/contenidovideo.html.twig',
                    array(
                        "contenido"=>$contenido
                    ));
            };
            if($contenido->getTipo()==4){
                $video=$request->query->get("cont",0);
                return $this->render('@Frontend/Programa/contenidovideointerno.html.twig',
                    array(
                        "contenido"=>$contenido,
                        "video"=>$video
                    ));
            };
            if ($contenido->getTipo()==10){
                $em = $this->getDoctrine()->getManager();
                $enc=$request->query->get("enc",0);
                $auto = 0;
                $diag = array();
                foreach ($contenido->getEncuestas() as $encuesta){
                    $file = $this->getParameter('json_directory').'/'.$encuesta->getArchivojson();
                    $datos = file_get_contents($file);
                    $diag[]= array('id'=>$encuesta->getId(),'encuesta'=>json_decode($datos,true));
                }

                foreach ($diag as $encuesta) {
                    if($encuesta['id']==$enc || $enc==0){
                        $data = $em->getRepository('CoreBundle:Respuestas')->findBy(array('encuestas'=>$encuesta['id'],'clientes'=>$this->getUser()->getId()));
                        $boton = $em->getRepository('CoreBundle:Respuestas')->findBy(array('clientes'=>$this->getUser()->getId()));
                        $btn = array();
                        foreach ($boton as $item){
                            if($item->getEncuestas()!=null){
                                if($item->getEncuestas()->getId()>=4 && $item->getEncuestas()->getId()<=10){
                                    if($item->getCompletado()==1){
                                        $btn[]=array('id'=>$item->getEncuestas()->getId());
                                    }
                                }
                            }
                        }
                        $json = $encuesta['encuesta'];
                        if($data==null){
                            return $this->render('@Frontend/Programa/encuesta.html.twig', array('boton'=>$btn,"encuesta"=>$json,'auto'=>$auto,'titulo'=>$contenido->getTitulo(),'id'=>$encuesta['id'],'data'=>$diag,'slug'=>$contenido->getSlug()));
                        }else{
                            $res = json_decode($data[0]->getRespuestajson(),true);
                            return $this->render('@Frontend/Programa/encuesta.html.twig', array('boton'=>$btn,'respuesta'=>$res,'completado'=>$data[0]->getCompletado(),'check'=>$data[0]->getIniciado(),"encuesta"=>$json,'titulo'=>$contenido->getTitulo(),'id'=>$encuesta['id'],'data'=>$diag,'slug'=>$contenido->getSlug()));
                        }
                    }
                }
            };
            if($contenido->getTipo()==11){
                $em = $this->getDoctrine()->getManager();
                $cod = $request->query->get('cod');
                $num = $em->getRepository('CoreBundle:Clientes_Permisos')->findOneByClientes($this->getUser()->getId());
                if($num==null){
                    return $this->render('@Frontend/Programa/sinencuestas.html.twig');
                }else{
                    $json = json_decode($num->getPermisos(),true);
                    foreach ($contenido->getEncuestas() as $encuesta){
                        $data = $em->getRepository('CoreBundle:Respuestas')->findBy(
                            array('encuestas'=>$encuesta->getId(),'clientes'=>$this->getUser()->getId()));
                        return $this->render('@Frontend/Programa/encuesta_listas.html.twig',
                            array("contenido"=>$contenido,'id'=>$encuesta->getId(),'cod'=>$cod,'data'=>$data,'num'=>$json['herramientas'][11]));
                    }
                }
            };
            if($contenido->getTipo()==12 || $contenido->getTipo()==13){
                $em = $this->getDoctrine()->getManager();

                $ban=1;
                foreach ($contenido->getEncuestas() as $encuesta){
                    $data = $em->getRepository('CoreBundle:Respuestas')->findOneBy(array('clientes'=>$this->getUser()->getId(),'encuestas'=>$encuesta->getId()));
                    if($data!=null && $encuesta->getId()==$data->getEncuestas()->getId()){
                        $file = $this->getParameter('json_directory').'/'.$encuesta->getArchivojson();
                        $datos = file_get_contents($file);
                        $json = json_decode($datos, true);
                        $res = json_decode($data->getRespuestajson(),true);
                        return $this->render('@Frontend/Programa/encuesta.html.twig', array('respuesta'=>$res,"encuesta"=>$json,'titulo'=>$contenido->getTitulo(),'id'=>$encuesta->getId()));
                    }else{
                        $ban=0;
                    }
                }
                if($ban==0){
                    foreach ($contenido->getEncuestas() as $encuesta) {
                        $file = $this->getParameter('json_directory').'/'.$encuesta->getArchivojson();
                        $datos = file_get_contents($file);
                        $json = json_decode($datos, true);
                        return $this->render('@Frontend/Programa/encuesta.html.twig', array("encuesta"=>$json,'titulo'=>$contenido->getTitulo(),'id'=>$encuesta->getId()));
                    }
                }
            }
            if($contenido->getTipo()==14){
                //cambiar render
                $em = $this->getDoctrine()->getManager();
                $data = $em->getRepository('CoreBundle:Respuestas')->findOneBy(array('clientes'=>$this->getUser()->getId(),'codigo'=>'plan'));
                if(count($data)>0){
                    $res = json_decode($data->getRespuestajson(),true);
                    return $this->render('@Frontend/PlanTrabajo/plan.html.twig',array('titulo'=>$contenido->getTitulo(),'data'=>$res));
                }else{
                    return $this->render('@Frontend/PlanTrabajo/plan.html.twig',array('titulo'=>$contenido->getTitulo()));
                }
            };
            if($contenido->getTipo()==16){
                $form = $this->createForm(MinutasType::class,null,array(
                    'method' => 'POST',
                ));
                $form->handleRequest($request);
                if ($form->isSubmitted()){
                    if ($form->isValid()){
                        $data = $form->getData();
                        $em = $this->getDoctrine()->getManager();
                        $user = $this->getUser()->getId();
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
                        }
                        //Mail a Consultor
                        $message = \Swift_Message::newInstance()
                            ->setSubject('Plataforma ER - Minutas')
                            ->setFrom(array('info@plataforma-er.com'))
                            ->setTo(array($data['consultor'],'minutas@rederac.com'))
                            //->setTo('cesar@innology.mx')
                            ->setBody(
                                $this->renderView('@Frontend/Default/mail/minutas_mail.html.twig',array(
                                    'fecha'=>$data['fecha'],
                                    'tema'=>$data['tema'],
                                    'nombre'=>$this->getUser()->getNombre(),
                                    'apellidos'=>$this->getUser()->getApellidos(),
                                    'empresa'=>$data['empresa'],
                                    'duracion'=>$data['duracion'],
                                    'asistentes'=>$data['asistentes'],
                                    'puntos'=>$data['puntos'],
                                    'acuerdos'=>$data['acuerdos'],
                                    'reunion'=>$data['fechasiguiente']
                                )),
                                'text/html'
                            )
                        ;
                        $this->get('mailer')->send($message);
                        return $this->redirect($this->generateUrl('frontend_programa',array('slug'=>'accesos')));
                        //return $this->redirect($this->generateUrl('frontend_contenido',array('slug'=>'16-herramientas-para-hacer-minutas')));
                    }
                }else{
                    return $this->render('@Frontend/Programa/minutas.html.twig',array('titulo'=>$contenido->getTitulo(),'form' => $form->createView(),'slug'=>$contenido->getSlug()));
                }
            }
            if($contenido->getTipo()==20){
                $url = $contenido->getDescripcion();
                return $this->redirect($url);
            }
        }
        
        return $this->redirect($this->generateUrl('homepage'));

    }

    /**
     * @Route("/encuestas", name="frontend_encuestas")
     */
    public function encuestaAction(Request $request)
    {
        $data = $request->request->all();
        $em = $this->getDoctrine()->getManager();
        $json = $em->getRepository('CoreBundle:Encuestas')->findOneById($data['id']);
        $file = $this->getParameter('json_directory').'/res__'.$json->getArchivojson();
        $datos = file_get_contents($file);
        $tmp = json_decode($datos, true);
        $i = count($tmp['secciones'][0]['preguntas']);
        for ($j=0;$j<$i;$j++){
            $tmp['secciones'][0]['preguntas'][$j]['respuesta'] = $data['preg'.$j];
            if(isset($data['txt'.$j])){
                $tmp['secciones'][0]['preguntas'][$j]['descripcion'] = $data['txt'.$j];
            }
        }

        if(isset($data['codigo'])){
            $db = $em->getRepository('CoreBundle:Respuestas')->findOneByCodigo($data['codigo']);
            $db->setRespuestajson(json_encode($tmp));
            $db->setCompletado(1);
            $em->persist($db);
            $em->flush();
            //limite de encuestas
            $per = $em->getRepository('CoreBundle:Clientes_Permisos')->findOneByClientes($this->getUser()->getId());
            $perj = json_decode($per->getPermisos(),true);
            $lim = $perj['herramientas'][11];
            $com = $em->getRepository('CoreBundle:Respuestas')->findBy(array('encuestas'=>$data['id'],'clientes'=>$this->getUser()->getId()));
            $t=count($com);
            //fin limite

            if($t==$lim){
                //crear excel
                $phpExcelObject = $this->get('phpexcel')->createPHPExcelObject();
                $phpExcelObject->getProperties()
                    ->setCreator("Plataforma ER")
                    ->setLastModifiedBy("Plataforma ER")
                    ->setTitle("Encuesta Clima Laboral")
                    ->setSubject("Empresa")
                    ->setDescription("Encuesta Clima Laboral")
                    ->setKeywords("encuesta clima laboral excel plataforma");
                $phpExcelObject->setActiveSheetIndex(0);
                $phpExcelObject->getActiveSheet()->setTitle('Encuesta Clima Laboral');
                $style = array(
                    'alignment' => array(
                        'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                        'vertical' => \PHPExcel_Style_Alignment::VERTICAL_CENTER
                    )
                );
                $phpExcelObject->setActiveSheetIndex(0)->getDefaultStyle()->applyFromArray($style);
                $phpExcelObject->setActiveSheetIndex(0)->getStyle("1")->getFont()->setBold(true);

                $phpExcelObject->setActiveSheetIndex(0)->getRowDimension('1')->setRowHeight(90);
                $phpExcelObject->setActiveSheetIndex(0)->getColumnDimension('A')->setWidth(20);
                $phpExcelObject->setActiveSheetIndex(0)->getColumnDimension('B')->setWidth(20);
                $phpExcelObject->setActiveSheetIndex(0)->getColumnDimension('C')->setWidth(20);
                $phpExcelObject->setActiveSheetIndex(0)->getColumnDimension('D')->setWidth(20);
                $l='E';
                for ($j=0;$j<$i;$j++){
                    $phpExcelObject->setActiveSheetIndex(0)->getColumnDimension($l)->setWidth(35);
                    $phpExcelObject->setActiveSheetIndex(0)->getStyle($l.'1')->applyFromArray(
                        array('fill'=>array('type'=>\PHPExcel_Style_Fill::FILL_SOLID,'color'=>array('rgb'=>'D4D4D4'))));
                    $phpExcelObject->setActiveSheetIndex(0)->getStyle($l.'1')->getAlignment()->setWrapText(true);
                    $l++;
                    if(isset($tmp['secciones'][0]['preguntas'][$j]['descripcion'])){
                        $phpExcelObject->setActiveSheetIndex(0)->getColumnDimension($l)->setWidth(35);
                        $phpExcelObject->setActiveSheetIndex(0)->getStyle($l.'1')->applyFromArray(
                            array('fill'=>array('type'=>\PHPExcel_Style_Fill::FILL_SOLID,'color'=>array('rgb'=>'D4D4D4'))));
                        $phpExcelObject->setActiveSheetIndex(0)->getStyle($l.'1')->getAlignment()->setWrapText(true);
                        $l++;
                    }
                }

                $phpExcelObject->setActiveSheetIndex(0)->getStyle('A1:D1')->applyFromArray(
                    array('fill'=>array('type'=>\PHPExcel_Style_Fill::FILL_SOLID,'color'=>array('rgb'=>'D4D4D4'))));
                $phpExcelObject->setActiveSheetIndex(0)->getStyle('A1:D1')->getAlignment()->setWrapText(true);

                $phpExcelObject->setActiveSheetIndex(0)->setCellValue('A1', 'Marca Temporal');
                $phpExcelObject->setActiveSheetIndex(0)->setCellValue('B1', 'Nombre de la Empresa');
                $phpExcelObject->setActiveSheetIndex(0)->setCellValue('C1', 'Número de Sucursal');
                $phpExcelObject->setActiveSheetIndex(0)->setCellValue('D1', 'Antigüedad en la Empresa');

                //Llenar Excel con Preguntas
                $l='E';
                for ($j=0;$j<$i;$j++){
                    $phpExcelObject->setActiveSheetIndex(0)->setCellValue($l.'1', $j+1..'. '.$tmp['secciones'][0]['preguntas'][$j]['pregunta']);
                    $l++;
                    if(isset($tmp['secciones'][0]['preguntas'][$j]['descripcion'])){
                        $phpExcelObject->setActiveSheetIndex(0)->setCellValue($l.'1', 'Pro favor amplie su respuesta');
                        $l++;
                    }
                }
                //respuestas
                $res = $em->getRepository('CoreBundle:Respuestas')->findBy(array('encuestas'=>$data['id'],'clientes'=>$this->getUser()->getId()),array('id'=>'ASC'));
                $row = 2;
                foreach ($res as $employee):
                    $phpExcelObject->setActiveSheetIndex(0)->setCellValue('A'.$row, $employee->getUpdatedAt());
                    $phpExcelObject->setActiveSheetIndex(0)->setCellValue('B'.$row, $employee->getEmpresa());
                    $phpExcelObject->setActiveSheetIndex(0)->setCellValue('C'.$row, $employee->getSucursal());
                    $phpExcelObject->setActiveSheetIndex(0)->setCellValue('D'.$row, $employee->getAntiguedad());

                    $tmpo = $this->getParameter('json_directory').'/'.$json->getArchivojson();
                    $tmpd = file_get_contents($tmpo);
                    $tmpr = json_decode($tmpd, true);
                    $tmp = json_decode($employee->getRespuestajson(), true);

                    for ($j=0;$j<$i;$j++){
                        if($tmpr['secciones'][0]['preguntas'][$j]['tipo'] == "radio" || $tmpr['secciones'][0]['preguntas'][$j]['tipo'] == "checkbox" || $tmpr['secciones'][0]['preguntas'][$j]['tipo'] == "select"){
                            $tmp['secciones'][0]['preguntas'][$j]['valor']=$tmpr['secciones'][0]['preguntas'][$j]['opciones'][$tmp['secciones'][0]['preguntas'][$j]['respuesta']]['nombre'];
                        }
                    }

                    $l='E';
                    for ($j=0;$j<$i;$j++){
                        $phpExcelObject->setActiveSheetIndex(0)->setCellValue($l.$row, $tmp['secciones'][0]['preguntas'][$j]['valor']);
                        $l++;
                        if(isset($tmp['secciones'][0]['preguntas'][$j]['descripcion'])){
                            $phpExcelObject->setActiveSheetIndex(0)->setCellValue($l.$row, $tmp['secciones'][0]['preguntas'][$j]['descripcion']);
                            $l++;
                        }
                    }

                    $row++;
                endforeach;

                $writer = $this->get('phpexcel')->createWriter($phpExcelObject, 'Excel5');
                $writer->save($this->getParameter('xls_directory')."/Encuesta-Clima-Laboral-".$this->getUser()->getNomempresa().".xls");

                $message = \Swift_Message::newInstance()
                    ->setSubject('Encuesta Clima Laboral - '.$this->getUser()->getNomempresa())
                    ->setFrom('info@plataforma-er.com')
                    ->setTo(array('monicaortiz@rederac.com','info@empresaresponsable.org','leolivera@empresaresponsable.org','cricardez@red-erac.com'))
                    ->setCc('antonio@innology.mx')
                    //->setTo('cesar@innology.mx')
                    ->attach(Swift_Attachment::fromPath($this->getParameter('xls_directory') ."/Encuesta-Clima-Laboral-".$this->getUser()->getNomempresa().".xls"))
                    ->setBody('Encuesta Clima Laboral: '.$this->getUser()->getNomempresa(),'text/html');
                $this->get('mailer')->send($message);
            }
        }else{
            $check = $em->getRepository('CoreBundle:Respuestas')->findBy(array('encuestas'=>$data['id'],'clientes'=>$this->getUser()->getId()));
            if(count($check)>0){
                $db = $check[0];
            }else{
                $db = new Respuestas();
            }
            $db->setEncuestas($json);
            $db->setClientes($this->getUser());
            $db->setRespuestajson(json_encode($tmp));
            $db->setCompletado(1);
            $em->persist($db);
            $em->flush();

            //Reporte Excel
            $tmpo = $this->getParameter('json_directory').'/'.$json->getArchivojson();
            $tmpd = file_get_contents($tmpo);
            $tmpr = json_decode($tmpd, true);

            for ($j=0;$j<$i;$j++){
                if($tmpr['secciones'][0]['preguntas'][$j]['tipo'] == "radio" || $tmpr['secciones'][0]['preguntas'][$j]['tipo'] == "checkbox" || $tmpr['secciones'][0]['preguntas'][$j]['tipo'] == "select"){
                    $tmp['secciones'][0]['preguntas'][$j]['valor']=$tmpr['secciones'][0]['preguntas'][$j]['opciones'][$tmp['secciones'][0]['preguntas'][$j]['respuesta']]['nombre'];
                }
            }
            //crear excel
            if($json->getId()==1){
                $tmpname='Prevención de Incendios';
            }elseif ($json->getId()==2){
                $tmpname='Diagnóstico de Salud';
            }
            $phpExcelObject = $this->get('phpexcel')->createPHPExcelObject();
            $phpExcelObject->getProperties()
                ->setCreator("Plataforma ER")
                ->setLastModifiedBy("Plataforma ER")
                ->setTitle("Encuesta ".$tmpname)
                ->setSubject("Empresa")
                ->setDescription("Encuesta ".$tmpname)
                ->setKeywords("encuesta excel plataforma ".$tmpname);
            $phpExcelObject->setActiveSheetIndex(0);
            $phpExcelObject->getActiveSheet()->setTitle($tmpname);
            $style = array(
                'alignment' => array(
                    'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical' => \PHPExcel_Style_Alignment::VERTICAL_CENTER
                )
            );
            $phpExcelObject->setActiveSheetIndex(0)->getDefaultStyle()->applyFromArray($style);
            $phpExcelObject->setActiveSheetIndex(0)->getStyle("1")->getFont()->setBold(true);

            $phpExcelObject->setActiveSheetIndex(0)->getRowDimension('1')->setRowHeight(30);
            $phpExcelObject->setActiveSheetIndex(0)->getColumnDimension('A')->setWidth(20);
            if($json->getId()==1){
                $phpExcelObject->setActiveSheetIndex(0)->getColumnDimension('B')->setWidth(175);
            }elseif ($json->getId()==2){
                $phpExcelObject->setActiveSheetIndex(0)->getColumnDimension('B')->setWidth(190);
            }
            $phpExcelObject->setActiveSheetIndex(0)->getColumnDimension('C')->setWidth(20);

            $phpExcelObject->setActiveSheetIndex(0)->getStyle('A1:C1')->applyFromArray(
                array('fill'=>array('type'=>\PHPExcel_Style_Fill::FILL_SOLID,'color'=>array('rgb'=>'D4D4D4'))));

            $phpExcelObject->setActiveSheetIndex(0)->setCellValue('A1', 'Número de Pregunta');
            $phpExcelObject->setActiveSheetIndex(0)->setCellValue('B1', 'Pregunta');
            $phpExcelObject->setActiveSheetIndex(0)->setCellValue('C1', 'Respuesta');

            for ($j=0;$j<$i;$j++){
                $x=$j+1;
                if(isset($tmp['secciones'][0]['preguntas'][$j]['valor'])){
                    $v=$tmp['secciones'][0]['preguntas'][$j]['valor'];
                }else{
                    $v=$tmp['secciones'][0]['preguntas'][$j]['respuesta'];
                }
                $num=$x+1;
                $phpExcelObject->setActiveSheetIndex(0)->setCellValue('A'.$num, $x);
                $phpExcelObject->setActiveSheetIndex(0)->setCellValue('B'.$num, $tmp['secciones'][0]['preguntas'][$j]['pregunta']);
                $phpExcelObject->setActiveSheetIndex(0)->setCellValue('C'.$num, $v);
            }

            $writer = $this->get('phpexcel')->createWriter($phpExcelObject, 'Excel5');
            $tmpnameE=str_replace(" ","-",$tmpname);
            $writer->save($this->getParameter('xls_directory')."/Encuesta-".$tmpnameE."-".$this->getUser()->getNomempresa().".xls");
            $message = \Swift_Message::newInstance()
                ->setSubject('Encuesta '.$this->getUser()->getNomempresa())
                ->setFrom('info@plataforma-er.com')
                ->setTo(array('info@empresaresponsable.org','leolivera@empresaresponsable.org','cricardez@red-erac.com'))
                ->setCc('antonio@innology.mx')
                //->setTo('cesar@innology.mx')
                ->attach(Swift_Attachment::fromPath($this->getParameter('xls_directory') ."/Encuesta-".$tmpnameE."-".$this->getUser()->getNomempresa().".xls"))
                ->setBody('Nueva Encuesta: '.$tmpname.'<br> Nombre: '.$this->getUser()->getNombre().'<br>','text/html');
            $this->get('mailer')->send($message);
        }

        return $this->redirect($this->generateUrl('frontend_contenido',array('slug'=>$data['slug'])));
    }

    /**
     * @Route("/clima", name="frontend_clima")
     */
    public function climaAction(Request $request){
        /*Encriptar y Desencriptar*/
        /*$cod = $this->get('encrypt')->rand_uniqid($contenido->getTipo().time(),false);
        $this->get('encrypt')->rand_uniqid($cod,true);*/
        $data = $request->request->all();
        $em = $this->getDoctrine()->getManager();
        $json = $em->getRepository('CoreBundle:Encuestas')->findOneById($data['id']);
        $com = $em->getRepository('CoreBundle:Respuestas')->findBy(array('clientes'=>$this->getUser()->getId(),'encuestas'=>$json));
        $cod = $this->get('encrypt')->rand_uniqid($this->getUser()->getId().time(),false);
        $t=count($com)+1;

        $db = new Respuestas();
        $db->setEncuestas($json);
        $db->setClientes($this->getUser());
        $db->setCompletado(0);
        $db->setCodigo($cod);
        $db->setNombre('encuestado '.$t);
        $db->setEmpresa($data['empresa']);
        $db->setSucursal($data['sucursal']);
        $db->setAntiguedad($data['anti']);
        $em->persist($db);
        $em->flush();

        return $this->redirect($this->generateUrl('frontend_clima_encuesta',array('slug'=>$data['slug'],'codigo'=>$cod)));
    }

    /**
     * @Route("/Encuesta-Clima-Laboral", name="frontend_clima_encuesta")
     */
    public function indiAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $slug = $request->query->get('slug');
        $codigo = $request->query->get('codigo');
        $data = $em->getRepository('CoreBundle:Respuestas')->findOneByCodigo($codigo);
        $con = $em->getRepository('CoreBundle:Seccion_Contenidos')->findOneBySlug($slug);
        $tit = $con->getTitulo();

        if ($data->getRespuestajson() != null) {
            $file = $this->getParameter('json_directory') . '/' . $data->getEncuestas()->getArchivojson();
            $datos = file_get_contents($file);
            $json = json_decode($datos, true);
            $res = json_decode($data->getRespuestajson(), true);
            return $this->render('@Frontend/Programa/encuesta.html.twig', array('respuesta' => $res, "encuesta" => $json, 'titulo' => $tit, 'id' => $data->getEncuestas()->getId(),'cod'=>$codigo));
        } else {
            $file = $this->getParameter('json_directory') . '/' . $data->getEncuestas()->getArchivojson();
            $datos = file_get_contents($file);
            $json = json_decode($datos, true);
            return $this->render('@Frontend/Programa/encuesta.html.twig', array("encuesta" => $json, 'titulo' => $tit, 'id' => $data->getEncuestas()->getId(),'cod'=>$codigo));
        }
    }

    /**
     * @Route("/save", name="frontend_save")
     */
    public function saveAction(Request $request)
    {
        $data = $request->request->all();
        $em = $this->getDoctrine()->getManager();
        $db = $em->getRepository('CoreBundle:Respuestas')->findOneById($data['pk']);

        $name = strpos($data['name'],'nombre');
        $emp = strpos($data['name'],'empresa');
        $suc = strpos($data['name'],'sucursal');
        $anti = strpos($data['name'],'anti');

        if ($name !== false ) {
            $db->setNombre($data['value']);
        } elseif ($emp !== false) {
            $db->setEmpresa($data['value']);
        } elseif ($suc !== false) {
            $db->setSucursal($data['value']);
        } elseif ($anti !== false) {
            $db->setAntiguedad($data['value']);
        }
        $em->persist($db);
        $em->flush();
        $response = new Response();
        $response->setStatusCode(200);
        return $response;
    }

    /**
     * @Route("/auto", name="frontend_auto")
     */
    public function autoAction(Request $request){
        $data = $request->request->all();
        $em = $this->getDoctrine()->getManager();
        $json = $em->getRepository('CoreBundle:Encuestas')->findOneById($data['id']);
        $check = $em->getRepository('CoreBundle:Respuestas')->findBy(array('encuestas'=>$data['id'],'clientes'=>$this->getUser()->getId()));
        //$check = $em->getRepository('CoreBundle:Respuestas')->findBy(array('encuestas'=>$data['id'],'clientes'=>$data['usuario']));

        if($check==null){
            $file = $this->getParameter('json_directory').'/res__'.$json->getArchivojson();
            $datos = file_get_contents($file);
        }else{
            $datos = $check[0]->getRespuestajson();
        }

        $tmp = json_decode($datos, true);
        $x = count($tmp['secciones']);
        $p = 0;
        $c = 0;
        for($i=0;$i<$x;$i++){
            $y = count($tmp['secciones'][$i]['preguntas']);
            for ($j=0;$j<$y;$j++){
                if(isset($data['preg'.$p])){
                    $tmp['secciones'][$i]['preguntas'][$j]['respuesta'] = $data['preg'.$p];
                    if(isset($data['txt'.$p])){
                        $tmp['secciones'][$i]['preguntas'][$j]['descripcion'] = $data['txt'.$p];
                    }
                }
                if($tmp['secciones'][$i]['preguntas'][$j]['respuesta']!=null){
                    $c=$c+1;
                }
                $p=$p+1;
            }
        }

        $ck = $em->getRepository('CoreBundle:Respuestas')->findBy(array('encuestas'=>$data['id'],'clientes'=>$this->getUser()->getId()));
        //$ck = $em->getRepository('CoreBundle:Respuestas')->findBy(array('encuestas'=>$data['id'],'clientes'=>$data['usuario']));

        if($ck==null){
            //no hay registro
            $db = new Respuestas();
            $db->setEncuestas($json);
            $db->setClientes($this->getUser());
            $db->setRespuestajson(json_encode($tmp));
            $db->setCompletado(0);
            $db->setIniciado(1);
            $em->persist($db);
        }else{
            $db = $em->getRepository('CoreBundle:Respuestas')->findOneBy(array('encuestas'=>$data['id'],'clientes'=>$this->getUser()->getId()));
            //$db = $em->getRepository('CoreBundle:Respuestas')->findOneBy(array('encuestas'=>$data['id'],'clientes'=>$data['usuario']));
            $db->setRespuestajson(json_encode($tmp));

            if($c==$data['preg']){
                //encuesta completa
                $db->setCompletado(1);
                $em->persist($db);
                $em->flush();

                //Reporte Excel
                $tmpo = $this->getParameter('json_directory').'/'.$json->getArchivojson();
                $tmpd = file_get_contents($tmpo);
                $tmpr = json_decode($tmpd, true);

                $x = count($tmpr['secciones']);

                for($i=0;$i<$x;$i++){
                    $y = count($tmpr['secciones'][$i]['preguntas']);
                    for ($j=0;$j<$y;$j++){
                        if($tmpr['secciones'][$i]['preguntas'][$j]['tipo'] == "radio" || $tmpr['secciones'][$i]['preguntas'][$j]['tipo'] == "checkbox" || $tmpr['secciones'][$i]['preguntas'][$j]['tipo'] == "select"){
                            $tmp['secciones'][$i]['preguntas'][$j]['valor']=$tmpr['secciones'][$i]['preguntas'][$j]['opciones'][$tmp['secciones'][$i]['preguntas'][$j]['respuesta']]['nombre'];
                        }
                    }
                }

                //crear excel
                $phpExcelObject = $this->get('phpexcel')->createPHPExcelObject();
                $phpExcelObject->getProperties()
                    ->setCreator("Plataforma ER")
                    ->setLastModifiedBy("Plataforma ER")
                    ->setTitle("Encuesta Auto Diagnóstico - ".$tmpr['nombre'])
                    ->setSubject("Empresa")
                    ->setDescription("Encuesta ".$tmpr['nombre'])
                    ->setKeywords("encuesta excel plataforma ".$tmpr['nombre']);
                $phpExcelObject->setActiveSheetIndex(0);
                $phpExcelObject->getActiveSheet()->setTitle(substr($tmpr['nombre'],0,31));
                $style = array(
                    'alignment' => array(
                        'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                        'vertical' => \PHPExcel_Style_Alignment::VERTICAL_CENTER
                    )
                );
                $phpExcelObject->setActiveSheetIndex(0)->getDefaultStyle()->applyFromArray($style);
                $phpExcelObject->setActiveSheetIndex(0)->getStyle("1")->getFont()->setBold(true);

                $phpExcelObject->setActiveSheetIndex(0)->getRowDimension('1')->setRowHeight(30);
                $phpExcelObject->setActiveSheetIndex(0)->getColumnDimension('A')->setWidth(20);
                $phpExcelObject->setActiveSheetIndex(0)->getColumnDimension('B')->setWidth(125);
                $phpExcelObject->setActiveSheetIndex(0)->getColumnDimension('C')->setWidth(60);
                $phpExcelObject->setActiveSheetIndex(0)->getColumnDimension('D')->setWidth(100);

                $phpExcelObject->setActiveSheetIndex(0)->getStyle('A1:D1')->applyFromArray(
                    array('fill'=>array('type'=>\PHPExcel_Style_Fill::FILL_SOLID,'color'=>array('rgb'=>'D4D4D4'))));

                $phpExcelObject->setActiveSheetIndex(0)->setCellValue('A1', 'Número de Pregunta');
                $phpExcelObject->setActiveSheetIndex(0)->setCellValue('B1', 'Pregunta');
                $phpExcelObject->setActiveSheetIndex(0)->setCellValue('C1', 'Respuesta');
                $phpExcelObject->setActiveSheetIndex(0)->setCellValue('D1', 'Comentario');

                $t=1;
                for($i=0;$i<$x;$i++){
                    $y = count($tmpr['secciones'][$i]['preguntas']);
                    for ($j=0;$j<$y;$j++){
                        if(isset($tmp['secciones'][$i]['preguntas'][$j]['valor'])){
                            $v=$tmp['secciones'][$i]['preguntas'][$j]['valor'];
                        }else{
                            $v=$tmp['secciones'][$i]['preguntas'][$j]['respuesta'];
                        }
                        if(isset($tmp['secciones'][$i]['preguntas'][$j]['descripcion'])){
                            $d= $tmp['secciones'][$i]['preguntas'][$j]['descripcion'];
                        }else{
                            $d ='';
                        }
                        $num=$t+1;
                        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('A'.$num, $t);
                        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('B'.$num, $tmp['secciones'][$i]['preguntas'][$j]['pregunta']);
                        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('C'.$num, $v);
                        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('D'.$num, $d);
                        $t=$t+1;
                    }
                }

                $writer = $this->get('phpexcel')->createWriter($phpExcelObject, 'Excel5');
                $tmpnameE = str_replace(" ","-",$tmpr['nombre']);
                $writer->save($this->getParameter('xls_directory')."/Encuesta-".$tmpnameE."-".$this->getUser()->getNomempresa().".xls");

                $message = \Swift_Message::newInstance()
                    ->setSubject('Encuesta Auto Diágnostico '.$this->getUser()->getNomempresa())
                    ->setFrom('info@plataforma-er.com')
                    ->setTo(array('info@empresaresponsable.org','leolivera@empresaresponsable.org','cricardez@red-erac.com'))
                    ->setCc('antonio@innology.mx')
                    //->setTo('cesar@innology.mx')
                    ->attach(Swift_Attachment::fromPath($this->getParameter('xls_directory')."/Encuesta-".$tmpnameE."-".$this->getUser()->getNomempresa().".xls"))
                    ->setBody('Nueva Encuesta: '.$tmpr['nombre'].'<br> Nombre: '.$this->getUser()->getNombre().'<br>','text/html');
                $this->get('mailer')->send($message);
                return $this->redirect($this->generateUrl('frontend_contenido',array('slug'=>$data['slug'])));
            }else{
                //encuesta incompleta
                $db->setCompletado(0);
                $em->persist($db);
            }
        }

        $em->flush();

        $db = $em->getRepository('CoreBundle:Respuestas')->findBy(array('encuestas'=>$data['id'],'clientes'=>$this->getUser()->getId()));
        //$db = $em->getRepository('CoreBundle:Respuestas')->findBy(array('encuestas'=>$data['id'],'clientes'=>$data['usuario']));

        if($data['next']!=0 && $db[0]->getCompletado()==1){
            return $this->redirect($this->generateUrl('frontend_contenido',array('slug'=>$data['slug'])));
        }else{
            $response = new Response();
            $response->setStatusCode(200);
            return $response;
        }
    }

    /**
     * @Route("/plan", name="frontend_plan")
     */
    public function planAction(Request $request)
    {
        $data = $request->request->all();

        //save on DB
        $em = $this->getDoctrine()->getManager();
        $check = $em->getRepository('CoreBundle:Respuestas')->findBy(array('codigo'=>'plan','clientes'=>$this->getUser()->getId()));
        if(count($check)>0){
            $db = $check[0];
            $db->setRespuestajson(json_encode($data));
            $db->setCodigo('plan');
            $db->setClientes($this->getUser());
            $em->persist($db);
            $em->flush();
        }else{
            $db = new Respuestas();
            $db->setRespuestajson(json_encode($data));
            $db->setCodigo('plan');
            $db->setClientes($this->getUser());
            $em->persist($db);
            $em->flush();
        }

        $phpExcelObject = $this->get('phpexcel')->createPHPExcelObject();
        $phpExcelObject->getProperties()
            ->setCreator("Plataforma ER")
            ->setLastModifiedBy("Plataforma ER")
            ->setTitle("Plan de Trabajo")
            ->setSubject("Empresa")
            ->setDescription("Plan de Trabajo Año 2017.")
            ->setKeywords("plan trabajo excel plataforma");
        $phpExcelObject->setActiveSheetIndex(0);
        $phpExcelObject->getActiveSheet()->setTitle('Plan de Trabajo');
        $style = array(
            'alignment' => array(
                'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => \PHPExcel_Style_Alignment::VERTICAL_CENTER
            )
        );
        $phpExcelObject->setActiveSheetIndex(0)->getDefaultStyle()->applyFromArray($style);
        $phpExcelObject->setActiveSheetIndex(0)->getStyle("1")->getFont()->setBold(true);
        $phpExcelObject->setActiveSheetIndex(0)->getStyle("2")->getFont()->setBold(true);
        $phpExcelObject->setActiveSheetIndex(0)->getStyle("3")->getFont()->setBold(true);
        $phpExcelObject->setActiveSheetIndex(0)->getStyle("4")->getFont()->setBold(true);
        $phpExcelObject->setActiveSheetIndex(0)->getStyle("5")->getFont()->setBold(true);
        $phpExcelObject->setActiveSheetIndex(0)->getStyle("A")->getFont()->setBold(true);
        $phpExcelObject->setActiveSheetIndex(0)->getStyle("B")->getFont()->setBold(true);
        $phpExcelObject->setActiveSheetIndex(0)->getStyle('C6:AB30')->applyFromArray(array(
            'borders' => array(
                'allborders' => array(
                    'style' => \PHPExcel_Style_Border::BORDER_THIN
                )
            )
        ));
        $phpExcelObject->setActiveSheetIndex(0)->getStyle('B1:AB30')->applyFromArray(array(
            'borders' => array(
                'outline' => array(
                    'style' => \PHPExcel_Style_Border::BORDER_THICK
                )
            )
        ));
        $phpExcelObject->setActiveSheetIndex(0)->getStyle('B4:AB5')->applyFromArray(array(
            'borders' => array(
                'inside' => array(
                    'style' => \PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('rgb'=>'ffffff')
                )
            )
        ));
        $phpExcelObject->setActiveSheetIndex(0)->getStyle('B6:B30')->applyFromArray(array(
            'borders' => array(
                'inside' => array(
                    'style' => \PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('rgb'=>'ffffff')
                )
            )
        ));
        $phpExcelObject->setActiveSheetIndex(0)->getRowDimension('1')->setRowHeight(65);
        $phpExcelObject->setActiveSheetIndex(0)->getRowDimension('2')->setRowHeight(1);
        $phpExcelObject->setActiveSheetIndex(0)->getRowDimension('3')->setRowHeight(1);
        $phpExcelObject->setActiveSheetIndex(0)->getRowDimension('4')->setRowHeight(50);
        $phpExcelObject->setActiveSheetIndex(0)->getRowDimension('5')->setRowHeight(35);
        $phpExcelObject->setActiveSheetIndex(0)->getRowDimension('6')->setRowHeight(65);
        $phpExcelObject->setActiveSheetIndex(0)->getRowDimension('7')->setRowHeight(55);
        $phpExcelObject->setActiveSheetIndex(0)->getRowDimension('8')->setRowHeight(70);
        $phpExcelObject->setActiveSheetIndex(0)->getRowDimension('9')->setRowHeight(25);
        $phpExcelObject->setActiveSheetIndex(0)->getRowDimension('10')->setRowHeight(80);
        $phpExcelObject->setActiveSheetIndex(0)->getRowDimension('11')->setRowHeight(60);
        $phpExcelObject->setActiveSheetIndex(0)->getRowDimension('12')->setRowHeight(45);
        $phpExcelObject->setActiveSheetIndex(0)->getRowDimension('13')->setRowHeight(30);
        $phpExcelObject->setActiveSheetIndex(0)->getRowDimension('14')->setRowHeight(30);
        $phpExcelObject->setActiveSheetIndex(0)->getRowDimension('15')->setRowHeight(30);
        $phpExcelObject->setActiveSheetIndex(0)->getRowDimension('16')->setRowHeight(30);
        $phpExcelObject->setActiveSheetIndex(0)->getRowDimension('17')->setRowHeight(30);
        $phpExcelObject->setActiveSheetIndex(0)->getRowDimension('18')->setRowHeight(30);
        $phpExcelObject->setActiveSheetIndex(0)->getRowDimension('19')->setRowHeight(40);
        $phpExcelObject->setActiveSheetIndex(0)->getRowDimension('20')->setRowHeight(70);
        $phpExcelObject->setActiveSheetIndex(0)->getRowDimension('21')->setRowHeight(45);
        $phpExcelObject->setActiveSheetIndex(0)->getRowDimension('22')->setRowHeight(45);
        $phpExcelObject->setActiveSheetIndex(0)->getRowDimension('23')->setRowHeight(45);
        $phpExcelObject->setActiveSheetIndex(0)->getRowDimension('24')->setRowHeight(45);
        $phpExcelObject->setActiveSheetIndex(0)->getRowDimension('25')->setRowHeight(45);
        $phpExcelObject->setActiveSheetIndex(0)->getRowDimension('26')->setRowHeight(70);
        $phpExcelObject->setActiveSheetIndex(0)->getRowDimension('27')->setRowHeight(40);
        $phpExcelObject->setActiveSheetIndex(0)->getRowDimension('28')->setRowHeight(35);
        $phpExcelObject->setActiveSheetIndex(0)->getRowDimension('29')->setRowHeight(75);
        $phpExcelObject->setActiveSheetIndex(0)->getRowDimension('30')->setRowHeight(60);
        $phpExcelObject->setActiveSheetIndex(0)->getColumnDimension('A')->setWidth(1);
        $phpExcelObject->setActiveSheetIndex(0)->getColumnDimension('B')->setWidth(15);
        $phpExcelObject->setActiveSheetIndex(0)->getColumnDimension('C')->setWidth(15);
        $phpExcelObject->setActiveSheetIndex(0)->getColumnDimension('D')->setWidth(15);
        $phpExcelObject->setActiveSheetIndex(0)->getColumnDimension('E')->setWidth(8);
        $phpExcelObject->setActiveSheetIndex(0)->getColumnDimension('F')->setWidth(8);
        $phpExcelObject->setActiveSheetIndex(0)->getColumnDimension('G')->setWidth(8);
        $phpExcelObject->setActiveSheetIndex(0)->getColumnDimension('H')->setWidth(8);
        $phpExcelObject->setActiveSheetIndex(0)->getColumnDimension('I')->setWidth(8);
        $phpExcelObject->setActiveSheetIndex(0)->getColumnDimension('J')->setWidth(50);
        $phpExcelObject->setActiveSheetIndex(0)->getColumnDimension('K')->setWidth(15);
        $phpExcelObject->setActiveSheetIndex(0)->getColumnDimension('L')->setWidth(15);
        $phpExcelObject->setActiveSheetIndex(0)->getColumnDimension('M')->setWidth(15);
        $phpExcelObject->setActiveSheetIndex(0)->getColumnDimension('N')->setWidth(15);
        $phpExcelObject->setActiveSheetIndex(0)->getColumnDimension('O')->setWidth(15);
        $phpExcelObject->setActiveSheetIndex(0)->getColumnDimension('P')->setWidth(3);
        $phpExcelObject->setActiveSheetIndex(0)->getColumnDimension('Q')->setWidth(3);
        $phpExcelObject->setActiveSheetIndex(0)->getColumnDimension('R')->setWidth(3);
        $phpExcelObject->setActiveSheetIndex(0)->getColumnDimension('S')->setWidth(3);
        $phpExcelObject->setActiveSheetIndex(0)->getColumnDimension('T')->setWidth(3);
        $phpExcelObject->setActiveSheetIndex(0)->getColumnDimension('U')->setWidth(3);
        $phpExcelObject->setActiveSheetIndex(0)->getColumnDimension('V')->setWidth(3);
        $phpExcelObject->setActiveSheetIndex(0)->getColumnDimension('W')->setWidth(3);
        $phpExcelObject->setActiveSheetIndex(0)->getColumnDimension('X')->setWidth(3);
        $phpExcelObject->setActiveSheetIndex(0)->getColumnDimension('Y')->setWidth(3);
        $phpExcelObject->setActiveSheetIndex(0)->getColumnDimension('Z')->setWidth(3);
        $phpExcelObject->setActiveSheetIndex(0)->getColumnDimension('AA')->setWidth(3);
        $phpExcelObject->setActiveSheetIndex(0)->getColumnDimension('AB')->setWidth(15);

        $phpExcelObject->setActiveSheetIndex(0)->getStyle('B1:C1')->applyFromArray(
            array('font'=>array('color'=>array('rgb'=>'003C57'))));
        $phpExcelObject->setActiveSheetIndex(0)->getStyle('B4:AB5')->applyFromArray(
            array('font'=>array('color'=>array('rgb'=>'ffffff')),
                'fill'=>array('type'=>\PHPExcel_Style_Fill::FILL_SOLID,'color'=>array('rgb'=>'003C57'))));
        $phpExcelObject->setActiveSheetIndex(0)->getStyle('B6:B30')->applyFromArray(
            array('font'=>array('color'=>array('rgb'=>'ffffff')),
                'fill'=>array('type'=>\PHPExcel_Style_Fill::FILL_SOLID,'color'=>array('rgb'=>'56A3BE'))));
        $phpExcelObject->setActiveSheetIndex(0)->getStyle('C5:I5')->applyFromArray(array('font'=>array('size'=>8)));
        $phpExcelObject->setActiveSheetIndex(0)->getStyle('P5:AA5')->applyFromArray(array('font'=>array('size'=>9)));
        $phpExcelObject->setActiveSheetIndex(0)->getStyle('P5:AA5')->getAlignment()->setTextRotation(90);
        $phpExcelObject->setActiveSheetIndex(0)->getStyle('B4:AB30')->getAlignment()->setWrapText(true);

        $phpExcelObject->setActiveSheetIndex(0)->mergeCells('B1:C1');
        $phpExcelObject->setActiveSheetIndex(0)->mergeCells('B4:B5');
        $phpExcelObject->setActiveSheetIndex(0)->mergeCells('E4:I4');
        $phpExcelObject->setActiveSheetIndex(0)->mergeCells('J4:J5');
        $phpExcelObject->setActiveSheetIndex(0)->mergeCells('K4:K5');
        $phpExcelObject->setActiveSheetIndex(0)->mergeCells('L4:L5');
        $phpExcelObject->setActiveSheetIndex(0)->mergeCells('M4:O4');
        $phpExcelObject->setActiveSheetIndex(0)->mergeCells('P4:AA4');
        $phpExcelObject->setActiveSheetIndex(0)->mergeCells('AB4:AB5');
        $phpExcelObject->setActiveSheetIndex(0)->mergeCells('B6:B10');
        $phpExcelObject->setActiveSheetIndex(0)->mergeCells('B11:B12');
        $phpExcelObject->setActiveSheetIndex(0)->mergeCells('B13:B18');
        $phpExcelObject->setActiveSheetIndex(0)->mergeCells('B19:B21');
        $phpExcelObject->setActiveSheetIndex(0)->mergeCells('B22:B25');
        $phpExcelObject->setActiveSheetIndex(0)->mergeCells('B26:B28');
        $phpExcelObject->setActiveSheetIndex(0)->mergeCells('B29:B30');

        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('B1', 'PLAN DE TRABAJO ANUAL');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('B4', 'TEMA');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('C4', 'REQUISITO');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('C5', '(Nombre abreviado)');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('D4', 'NOMBRE DEL PROGRAMA');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('D5', '(Cuando aplique)');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('E4', 'RESULTADO DE LA AUDITORÍA POR CRITERIO DE EVALUACIÓN. Área de oportunidad (%)');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('E5', 'Existencia');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('F5', 'Difusión y conocimiento');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('G5', 'Participación universal');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('H5', 'Mejora continua');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('I5', 'Vinc. con la dirección estratégica');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('J4', 'ACCIONES ESPECÍFICAS PARA REDUCIR EL ÁREA DE OPORTUNIDAD DE CADA CRITERIO DE EVALUACIÓN');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('K4', 'RESPONSABLE');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('L4', 'FECHA COMPROMISO');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('M4', 'ANOTAR UNA "X" DONDE CORRESPONDA, DE ACUERDO A LA ACCIÓN TOMADA.');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('M5', 'FORTALECER PROGRAMA');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('N5', 'MANTENER PROGRAMA');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('O5', 'NUEVOS PROGRAMAS');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('P4', 'CALENDARIO 2017');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('P5', 'ENE.');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('Q5', 'FEB.');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('R5', 'MAR.');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('S5', 'ABR.');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('T5', 'MAY.');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('U5', 'JUN.');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('V5', 'JUL.');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('W5', 'AGO.');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('X5', 'SEP.');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('Y5', 'OCT.');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('Z5', 'NOV.');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('AA5', 'DIC.');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('AB4', 'ESTATUS');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('B6', 'I. Dirección y Comunicación');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('B11', 'II. Justicia Salarial y Cultura de la Legalidad');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('B13', 'III. Calidad de Vida y Desarrollo del Personal');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('B19', 'IV. Protección y Desarrollo de Familias');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('B22', 'V. Solidaridad y Ayuda a la Comunidad');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('B26', 'VI. Promocion y Cuidado del Medio Ambiente');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('B29', 'VII. Humanización y trascendencia en el trabajo');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('C6', '1. Comité Interno');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('C7', '2. Política');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('C8', '3. Manual de Programas');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('C9', '4. Informe Anual');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('C10', '5. Auditorías internas');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('C11', '6. Justicia Salarial');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('C12', '7. Cultura de la Legalidad');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('C10', '5. Auditorías internas');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('C11', '6. Justicia Salarial');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('C12', '7. Cultura de la Legalidad');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('C13', '8. Salud');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('C14', '9. Seguridad');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('C15', '10. Orden y Limpieza');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('C16', '11. Capacitación en áreas de trabajo');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('C17', '12. Formación Académica');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('C18', '13. Propuestas');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('C19', '14. Desarrollo de familias');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('C20', '15. Estructura Laboral');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('C21', '16. Despido de Personal');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('C22', '17. No discriminación');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('C23', '18. Becarios');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('C24', '19. Proveedores');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('C25', '20. Vinculacion con la comunidad');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('C26', '21. Cuidado del suelo');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('C27', '22. Cuidado del aire y de la atmósfera');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('C28', '23. Cuidado del agua');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('C29', '24. Empresa más ética');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('C30', '25. Trabajo más humano o dignificante');

        foreach ($data as $key=>$valor){
            $pos = explode("-",$key);
            if($pos[0]==1){
                $phpExcelObject->setActiveSheetIndex(0)->setCellValue("D".($pos[1]+5), $valor);
            }elseif ($pos[0]==2){
                $phpExcelObject->setActiveSheetIndex(0)->setCellValue("E".($pos[1]+5), $valor);
            }elseif ($pos[0]==3){
                $phpExcelObject->setActiveSheetIndex(0)->setCellValue("F".($pos[1]+5), $valor);
            }elseif ($pos[0]==4){
                $phpExcelObject->setActiveSheetIndex(0)->setCellValue("G".($pos[1]+5), $valor);
            }elseif ($pos[0]==5){
                $phpExcelObject->setActiveSheetIndex(0)->setCellValue("H".($pos[1]+5), $valor);
            }elseif ($pos[0]==6){
                $phpExcelObject->setActiveSheetIndex(0)->setCellValue("I".($pos[1]+5), $valor);
            }elseif ($pos[0]==7){
                $phpExcelObject->setActiveSheetIndex(0)->setCellValue("J".($pos[1]+5), $valor);
            }elseif ($pos[0]==8){
                $phpExcelObject->setActiveSheetIndex(0)->setCellValue("K".($pos[1]+5), $valor);
            }elseif ($pos[0]==9){
                $phpExcelObject->setActiveSheetIndex(0)->setCellValue("L".($pos[1]+5), $valor);
            }elseif ($pos[0]==10){
                $phpExcelObject->setActiveSheetIndex(0)->setCellValue("M".($pos[1]+5), $valor);
            }elseif ($pos[0]==11){
                $phpExcelObject->setActiveSheetIndex(0)->setCellValue("N".($pos[1]+5), $valor);
            }elseif ($pos[0]==12){
                $phpExcelObject->setActiveSheetIndex(0)->setCellValue("O".($pos[1]+5), $valor);
            }elseif ($pos[0]==13){
                $phpExcelObject->setActiveSheetIndex(0)->setCellValue("P".($pos[1]+5), $valor);
            }elseif ($pos[0]==14){
                $phpExcelObject->setActiveSheetIndex(0)->setCellValue("Q".($pos[1]+5), $valor);
            }elseif ($pos[0]==15){
                $phpExcelObject->setActiveSheetIndex(0)->setCellValue("R".($pos[1]+5), $valor);
            }elseif ($pos[0]==16){
                $phpExcelObject->setActiveSheetIndex(0)->setCellValue("S".($pos[1]+5), $valor);
            }elseif ($pos[0]==17){
                $phpExcelObject->setActiveSheetIndex(0)->setCellValue("T".($pos[1]+5), $valor);
            }elseif ($pos[0]==18){
                $phpExcelObject->setActiveSheetIndex(0)->setCellValue("U".($pos[1]+5), $valor);
            }elseif ($pos[0]==19){
                $phpExcelObject->setActiveSheetIndex(0)->setCellValue("V".($pos[1]+5), $valor);
            }elseif ($pos[0]==20){
                $phpExcelObject->setActiveSheetIndex(0)->setCellValue("W".($pos[1]+5), $valor);
            }elseif ($pos[0]==21){
                $phpExcelObject->setActiveSheetIndex(0)->setCellValue("X".($pos[1]+5), $valor);
            }elseif ($pos[0]==22){
                $phpExcelObject->setActiveSheetIndex(0)->setCellValue("Y".($pos[1]+5), $valor);
            }elseif ($pos[0]==23){
                $phpExcelObject->setActiveSheetIndex(0)->setCellValue("Z".($pos[1]+5), $valor);
            }elseif ($pos[0]==24){
                $phpExcelObject->setActiveSheetIndex(0)->setCellValue("AA".($pos[1]+5), $valor);
            }elseif ($pos[0]==25){
                $phpExcelObject->setActiveSheetIndex(0)->setCellValue("AB".($pos[1]+5), $valor);
            }
        }

        $phpExcelObject->getSecurity()->setLockWindows(true);
        $phpExcelObject->getSecurity()->setLockStructure(true);

        $phpExcelObject->setActiveSheetIndex(0)->getProtection()->setSheet(true);
        $phpExcelObject->setActiveSheetIndex(0)->getProtection()->setSelectLockedCells(true);
        $phpExcelObject->setActiveSheetIndex(0)->getProtection()->setSelectUnlockedCells(true);
        $phpExcelObject->setActiveSheetIndex(0)->getProtection()->setSort(true);
        $phpExcelObject->setActiveSheetIndex(0)->getProtection()->setInsertRows(true);
        $phpExcelObject->setActiveSheetIndex(0)->getProtection()->setFormatCells(true);
        $phpExcelObject->setActiveSheetIndex(0)->getProtection()->setPassword('494797Luiso99');

        $writer = $this->get('phpexcel')->createWriter($phpExcelObject, 'Excel5');
        $writer->save($this->getParameter('xls_directory')."/Plan-".$this->getUser()->getNomempresa().".xls");

        $message = \Swift_Message::newInstance()
            ->setSubject('Plan de Trabajo - '.$this->getUser()->getNomempresa())
            ->setFrom('info@plataforma-er.com')
            ->setTo(array('info@empresaresponsable.org','leolivera@empresaresponsable.org','cricardez@red-erac.com'))
            ->setCc('antonio@innology.mx')
            //->setTo('cesar@innology.mx')
            ->attach(Swift_Attachment::fromPath($this->getParameter('xls_directory') ."/Plan-".$this->getUser()->getNomempresa().".xls"))
            ->setBody('Plan de Trabajo: '.$this->getUser()->getNomempresa(),'text/html');
        $this->get('mailer')->send($message);

        $download = $this->get('phpexcel')->createWriter($phpExcelObject, 'Excel5');
        $response = $this->get('phpexcel')->createStreamedResponse($download);
        $dispositionHeader = $response->headers->makeDisposition(ResponseHeaderBag::DISPOSITION_ATTACHMENT,'Plan de Trabajo - '.$this->getUser()->getNomempresa().'.xls');
        $response->headers->set('Content-Type', 'text/vnd.ms-excel; charset=utf-8');
        $response->headers->set('Pragma', 'public');
        $response->headers->set('Cache-Control', 'maxage=1');
        $response->headers->set('Content-Disposition', $dispositionHeader);

        return $response;
    }
}