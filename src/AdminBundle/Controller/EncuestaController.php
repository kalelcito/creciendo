<?php

namespace AdminBundle\Controller;

use AdminBundle\Form\crearEncuestaType;
use AdminBundle\Form\crearSeccionType;
use CoreBundle\Entity\Encuestas;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

/**
 * Encuesta controller.
 *
 * @Route("/herramientas")
 */
class EncuestaController extends Controller
{
    /** lista de encuestas
     *
     * @Route("/lista", name="backend_lista")
     */
    public function listaAction()
    {
        $em = $this->getDoctrine()->getManager();
        $data = $em->getRepository('CoreBundle:Encuestas')->findAll();

        return $this->render('AdminBundle:Herramientas:lista.html.twig',array('data'=>$data));
    }

    /** mostrar encuesta
     *
     * @Route("/encuestas_show", name="backend_encuestas_show")
     */
    public function encuestaAction(Request $request)
    {
        $id = $request->query->get('id');
        $file = $this->getParameter('json_directory').'/'.$id.'.json';
        $datos = file_get_contents($file);
        $json = json_decode($datos, true);
        return $this->render('AdminBundle:Herramientas:encuestas_show.html.twig',array('data'=>$json));
    }

    /** actualizar encuesta encuesta
     *
     * @Route("/encuestas_update", name="backend_encuestas_update")
     */
    public function encuestaUpdateAction(Request $request)
    {
        $id = $request->query->get('id');
        $file = $this->getParameter('json_directory').'/'.$id.'.json';
        $datos = file_get_contents($file);
        $json = json_decode($datos, true);

        $seccion = $request->request->get('seccion',null);
        $descripcion = $request->request->get('descripcion',null);
        $pregunta = $request->request->get('pregunta',null);
        $opcion = $request->request->get('opcion',null);
        $var = $request->request->get('index',null);
        $tmp = $request->request->get('desc',null);
        if(isset($tmp)){
            $check = true;
        }else{
            $check = false;
        }
        $index = explode(",",$var);

        if(isset($index[0])){
            if(isset($index[1])){
                if(isset($index[2])){
                    $json['secciones'][$index[0]]['preguntas'][$index[1]]['opciones'][$index[2]]['nombre'] = $opcion;
                }else{
                    $json['secciones'][$index[0]]['preguntas'][$index[1]]['pregunta'] = $pregunta;
                    $json['secciones'][$index[0]]['preguntas'][$index[1]]['desc'] = $check;
                }
            }else{
                $json['secciones'][$index[0]]['nombre'] = $seccion;
                $json['secciones'][$index[0]]['descripcion'] = $descripcion;
            }
        }

        $json_string = json_encode($json);
        $file = $this->getParameter('json_directory').'/'.$id.'.json';
        file_put_contents($file, $json_string);
        $this->genRes($id);

        return $this->redirectToRoute('backend_encuestas_show',array('id'=>$id));
    }

    /** generar json respuestas
     *
     * @Route("/encuestas_res", name="backend_encuestas_res")
     */
    public function genRes($id){
        $file = $this->getParameter('json_directory').'/'.$id.'.json';
        $datos = file_get_contents($file);
        $json = json_decode($datos, true);
        $res['nombre']=$json['nombre'];
        $res['secciones']=array();

        $i=0;
        if(isset($json['secciones'])) {
            foreach ($json['secciones'] as $seccione):
                if (isset($seccione['nombre'])) {
                    array_push($res['secciones'], array('nombre' => $seccione['nombre']));
                }
                $j = 0;
                $res['secciones'][$i]['preguntas'] = array();
                if(isset($json['secciones'][$i]['preguntas'])){
                    foreach ($json['secciones'][$i]['preguntas'] as $pregunta):
                        if (isset($pregunta['pregunta'])) {
                            if($pregunta['desc']==true){
                                array_push($res['secciones'][$i]['preguntas'], array('pregunta' => $pregunta['pregunta'], 'respuesta' => null, 'descripcion' => null));
                            }else{
                                array_push($res['secciones'][$i]['preguntas'], array('pregunta' => $pregunta['pregunta'], 'respuesta' => null));
                            }
                        }
                        $j = $j + 1;
                    endforeach;
                }
                $i = $i + 1;
            endforeach;

            $json_string = json_encode($res);
            $file = $this->getParameter('json_directory') . '/res__' . $id . '.json';
            file_put_contents($file, $json_string);
        }

        $em = $this->getDoctrine()->getManager();
        $data = $em->getRepository('CoreBundle:Encuestas')->findAll();
        return $this->render('AdminBundle:Herramientas:lista.html.twig',array('data'=>$data));
    }

    /** agregar opcion a pregunta
     *
     * @Route("/encuestas_addop", name="backend_encuestas_addop")
     */
    public function encuestaAddopAction(Request $request)
    {
        $id = $request->query->get('id');
        $file = $this->getParameter('json_directory').'/'.$id.'.json';
        $datos = file_get_contents($file);
        $json = json_decode($datos, true);

        $var = $request->request->get('sec_id',null);
        $opcion = $request->request->get('opt',null);
        $pregunta = null;
        $i=0;

        $seccion = explode(",",$var);

        if(isset($seccion[0])) {
            if (isset($seccion[1])) {
                $pregunta=$json['secciones'][$seccion[0]]['preguntas'][$seccion[1]];
                $i=end($pregunta['opciones'])['valor'];
                $temp=array('valor'=>$i+1,'nombre'=>$opcion);
                array_push($pregunta['opciones'],$temp);
                $json['secciones'][$seccion[0]]['preguntas'][$seccion[1]]= $pregunta;
            }
        }

        $json_string = json_encode($json);
        $file = $this->getParameter('json_directory').'/'.$id.'.json';
        file_put_contents($file, $json_string);
        $this->genRes($id);

        return $this->redirectToRoute('backend_encuestas_show',array('id'=>$id));
    }

    /** editar encuestas
     *
     * @Route("/encuestas_edit", name="backend_encuestas_edit")
     */
    public function encuestaEditAction(Request $request)
    {
        $form = $this->createForm(crearSeccionType::class,null,array('method' => 'POST',));
        $form->handleRequest($request);

        $id = $request->query->get('id');

        $em = $this->getDoctrine()->getManager();
        $data = $em->getRepository('CoreBundle:Encuestas')->findOneByArchivojson($id.'.json');

        $file = $this->getParameter('json_directory').'/'.$id.'.json';
        $datos = file_get_contents($file);
        $json = json_decode($datos, true);
        $i=0;
        $secciones=null;
        if($json!=null){
            if (array_key_exists('secciones', $json)) {
                $secciones=$json['secciones'];
                $i=end($secciones)['id'];
            }
        }

        if ($form->isSubmitted()) {
            if($form->isValid()){
                $data = $form->getData();
                if($data['seccion']){
                    $secciones[]=array('id'=>$i+1,'nombre'=>$data['seccion'],'descripcion'=>$data['descripcion']);
                    $json["secciones"]=$secciones;
                    $json_string = json_encode($json);
                    $file = $this->getParameter('json_directory').'/'.$id.'.json';
                    file_put_contents($file, $json_string);
                }
                return $this->redirectToRoute('backend_encuestas_edit',array('id'=>$id));
            }
        }

        $op = $request->request->get('op',null);
        $desc = $request->request->get('descripcion',null);
        $preg = $request->request->get('pregunta',null);
        $res = $request->request->get('fields',null);
        $t = $request->request->get('tipo',null);
        $tmp = $request->request->get('desc',null);
        if(isset($tmp)){
            $check = true;
        }else{
            $check = false;
        }
        $opc = null;
        $seccione = null;
        $i=0;


        if($op!=null){
            foreach ($json['secciones'] as $seccione):
                if($seccione['id']== $op){
                    if (array_key_exists('preguntas', $seccione)) {
                        $preguntas=$seccione['preguntas'];
                        $i=end($preguntas)['id'];
                    }
                    if($t=='checkbox' || $t=='radio' || $t=='select'){
                        if(isset($res[1])){
                            $j=0;
                            foreach ($res as $r):
                                $opc[]=array('valor'=>$j,'nombre'=>$r);
                                $j=$j+1;
                            endforeach;
                            $preguntas[]=array('id'=>$i+1,'pregunta'=>$preg,'desc'=>$check,'descripcion'=>$desc,'tipo'=>$t,'required'=>true,'opciones'=>$opc);
                        }
                    }else{
                        $preguntas[]=array('id'=>$i+1,'pregunta'=>$preg,'desc'=>$check,'descripcion'=>$desc,'tipo'=>$t,'required'=>true);
                    }
                    $seccione['preguntas']=$preguntas;
                    foreach ($json['secciones'] as $key=>$s):
                        if($s['id']== $op){
                            $json['secciones'][$key]=$seccione;
                        }
                    endforeach;
                }
            endforeach;

            $json_string = json_encode($json);
            $file = $this->getParameter('json_directory').'/'.$id.'.json';
            file_put_contents($file, $json_string);
            $this->genRes($id);
            return $this->redirectToRoute('backend_encuestas_edit',array('id'=>$id));
        }

        return $this->render('@Admin/Herramientas/encuestas_edit.html.twig', array(
            'form' => $form->createView(),
            'secciones' => $secciones,
            'data' => $json,
            'encuesta' => $data,
        ));

    }

    /** borrar elemento de la encuesta
     *
     * @Route("/encuestas_delete", name="backend_encuestas_delete")
     */
    public function encuestaDeleteAction(Request $request)
    {
        $id = $request->query->get('id');
        $file = $this->getParameter('json_directory').'/'.$id.'.json';
        $datos = file_get_contents($file);
        $json = json_decode($datos, true);

        $index = $request->request->get('index',null);

        if(isset($index[0])){
            if(isset($index[2])){
                if(isset($index[4])){
                    unset($json['secciones'][$index[0]]['preguntas'][$index[2]]['opciones'][$index[4]]);
                }else{
                    unset($json['secciones'][$index[0]]['preguntas'][$index[2]]);
                }
            }else{
                unset($json['secciones'][$index[0]]);
            }
        }

        $json_string = json_encode($json);
        $file = $this->getParameter('json_directory').'/'.$id.'.json';
        file_put_contents($file, $json_string);
        $this->genRes($id);

        return $this->redirectToRoute('backend_encuestas_show',array('id'=>$id));
    }

    /** Crear json de cada encuesta
     *
     * @Route("/encuesta_new", name="backend_crearencuesta")
     */
    public function encuestaNewAction(Request $request)
    {
        $form = $this->createForm(crearEncuestaType::class,null,array(
            'method' => 'POST',
        ));
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if($form->isValid()){
                $data = $form->getData();
                if($data['encuesta']){
                    $encuesta["nombre"] = $data['encuesta'];
                    $encuesta["descripcion"]=$data['descripcion'];
                    $json_string = json_encode($encuesta);
                    $fileName = md5(uniqid()).'.json';
                    $file = $this->getParameter('json_directory').'/'.$fileName;
                    file_put_contents($file, $json_string);

                    $encuesta = new Encuestas();
                    $em = $this->getDoctrine()->getManager();
                    $encuesta->setNombre($data['encuesta']);
                    $encuesta->setArchivojson($fileName);
                    $em->persist($encuesta);
                    $em->flush();

                }
                return $this->redirectToRoute('backend_lista');
            }
        }
        return $this->render('AdminBundle:Herramientas:encuestas_new.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /** cambiar nombre a encuesta
     *
     * @Route("/encuestas_name", name="backend_encuestas_name")
     */
    public function encuestaNameAction(Request $request)
    {
        $id = $request->query->get('id');
        $em = $this->getDoctrine()->getManager();
        $data = $em->getRepository('CoreBundle:Encuestas')->findOneByArchivojson($id.'.json');
        $file = $this->getParameter('json_directory').'/'.$id.'.json';
        $datos = file_get_contents($file);
        $json = json_decode($datos, true);
        $name = $request->request->get('nombre',null);
        $desc = $request->request->get('descripcion',null);

        if($name!=null){
            $json['nombre']=$name;
            $json['descripcion']=$desc;
            $json_string = json_encode($json);
            $file = $this->getParameter('json_directory').'/'.$id.'.json';
            file_put_contents($file, $json_string);
            $this->genRes($id);
            $data->setNombre($name);
            $em->persist($data);
            $em->flush();
            return $this->redirectToRoute('backend_encuestas_edit',array('id'=>$id));
        }

        return $this->render('@Admin/Herramientas/encuestas_edit.html.twig', array(
            'data' => $json,
            'encuesta' => $data,
        ));
    }

    /**
     * Borrar Encuesta
     *
     * @Route("/encuestas_bye", name="backend_encuestas_bye")
     */
    public function encuestaByeAction(Request $request)
    {
        $id = $request->query->get('id');
        $em = $this->getDoctrine()->getManager();
        $f = $this->getDoctrine()->getManager();
        $data = $em->getRepository('CoreBundle:Encuestas')->findOneByArchivojson($id.'.json');
        $tmp = $f->getRepository('CoreBundle:Seccion_Contenidos')->findOneByEncuestas($data->getId());
        $tmp->setEncuestas(null);
        $f->persist($tmp);
        $f->flush();

        unlink($this->getParameter('json_directory').'/'.$id.'.json');
        if(file_exists($this->getParameter('json_directory').'/res__'.$id.'.json')){
            unlink($this->getParameter('json_directory').'/res__'.$id.'.json');
        }
        $em->remove($data);
        $em->flush();
        return $this->redirectToRoute('backend_lista');
    }

    /** input numero de encuestas
     *
     * @Route("/permisos", name="clientes_permisos")
     */
    public function permisoUpdateAction(Request $request)
    {
        $id = $request->query->get('id');
        $numero = $request->query->get('numero');
        return $this->render('clientes/permisos.html.twig',array('id'=>$id,'numero'=>$numero));
    }

    /** generar reporte clientes en excel
     *
     * @Route("/clientes_reporte", name="backend_clientes_reporte")
     */
    public function ReporteAction()
    {
        $em = $this->getDoctrine()->getManager();
        $clientes = $em->getRepository('CoreBundle:Clientes')->findAll();

        $phpExcelObject = $this->get('phpexcel')->createPHPExcelObject();
        $phpExcelObject->getProperties()
            ->setCreator("Plataforma ER")
            ->setLastModifiedBy("Plataforma ER")
            ->setTitle("Reporte de Clientes Registrados - ".date("d-m-Y"))
            ->setSubject("Plataforma ER")
            ->setDescription("Reporte de Clientes Registrados en la Plataforma ER - ".date("d-m-Y"))
            ->setKeywords("reporte clientes registrados excel plataforma");
        $phpExcelObject->setActiveSheetIndex(0);
        $phpExcelObject->getActiveSheet()->setTitle('Clientes Registrados');
        $style = array(
            'alignment' => array(
                'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => \PHPExcel_Style_Alignment::VERTICAL_CENTER
            )
        );
        $phpExcelObject->setActiveSheetIndex(0)->getDefaultStyle()->applyFromArray($style);
        $phpExcelObject->setActiveSheetIndex(0)->getStyle("2")->getFont()->setBold(true);
        $phpExcelObject->setActiveSheetIndex(0)->getStyle('B2:H2')->applyFromArray(array(
            'borders' => array(
                'allborders' => array(
                    'style' => \PHPExcel_Style_Border::BORDER_THICK
                )
            )
        ));
        $phpExcelObject->setActiveSheetIndex(0)->getStyle('B2:H2')->applyFromArray(
            array('font'=>array('color'=>array('rgb'=>'ffffff')),
                'fill'=>array('type'=>\PHPExcel_Style_Fill::FILL_SOLID,'color'=>array('rgb'=>'56A3BE'))));
        $phpExcelObject->setActiveSheetIndex(0)->getStyle('B2:H2')->applyFromArray(array('font'=>array('size'=>14)));
        $phpExcelObject->setActiveSheetIndex(0)->getRowDimension('1')->setRowHeight(15);
        $phpExcelObject->setActiveSheetIndex(0)->getRowDimension('2')->setRowHeight(30);
        $phpExcelObject->setActiveSheetIndex(0)->getColumnDimension('A')->setWidth(5);
        $phpExcelObject->setActiveSheetIndex(0)->getColumnDimension('B')->setWidth(35);
        $phpExcelObject->setActiveSheetIndex(0)->getColumnDimension('C')->setWidth(35);
        $phpExcelObject->setActiveSheetIndex(0)->getColumnDimension('D')->setWidth(40);
        $phpExcelObject->setActiveSheetIndex(0)->getColumnDimension('E')->setWidth(25);
        $phpExcelObject->setActiveSheetIndex(0)->getColumnDimension('F')->setWidth(50);
        $phpExcelObject->setActiveSheetIndex(0)->getColumnDimension('G')->setWidth(25);
        $phpExcelObject->setActiveSheetIndex(0)->getColumnDimension('H')->setWidth(25);

        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('B2', 'NOMBRE');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('C2', 'APELLIDOS');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('D2', 'NOMBRE DE LA EMPRESA');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('E2', 'PUESTO');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('F2', 'EMAIL');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('G2', 'PAQUETE');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('H2', 'FECHA DE REGISTRO');

        $i=3;
        foreach ($clientes as $cliente):
            $phpExcelObject->setActiveSheetIndex(0)->setCellValue('B'.$i, $cliente->getNombre());
            $phpExcelObject->setActiveSheetIndex(0)->setCellValue('C'.$i, $cliente->getApellidos());
            $phpExcelObject->setActiveSheetIndex(0)->setCellValue('D'.$i, $cliente->getNomEmpresa());
            $phpExcelObject->setActiveSheetIndex(0)->setCellValue('E'.$i, $cliente->getPuesto());
            $phpExcelObject->setActiveSheetIndex(0)->setCellValue('F'.$i, $cliente->getEmail())->getHyperlink('F'.$i)->setUrl('mailto:'.$cliente->getEmail());
            $phpExcelObject->setActiveSheetIndex(0)->setCellValue('G'.$i, $cliente->getNiveles()->getNombre());
            $phpExcelObject->setActiveSheetIndex(0)->setCellValue('H'.$i, date_format($cliente->getCreado(),'d-m-Y'));
            $i++;
        endforeach;
        $i--;
        $phpExcelObject->setActiveSheetIndex(0)->getStyle('B3:H'.$i)->applyFromArray(array('font'=>array('size'=>12)));
        $phpExcelObject->setActiveSheetIndex(0)->getStyle('B3:H'.$i)->applyFromArray(array(
            'borders' => array(
                'allborders' => array(
                    'style' => \PHPExcel_Style_Border::BORDER_THIN
                )
            )
        ));
        $phpExcelObject->setActiveSheetIndex(0)->getStyle('F3:F'.$i)->applyFromArray(array('font'=>array('color'=>array('rgb'=>'0000FF'),'underline'=>'single')));

        /*$writer = $this->get('phpexcel')->createWriter($phpExcelObject, 'Excel5');
        $writer->save($this->getParameter('xls_directory')."Reporte de Clientes Registrados - ".date("d-m-Y").".xls");*/

        $download = $this->get('phpexcel')->createWriter($phpExcelObject, 'Excel5');
        $response = $this->get('phpexcel')->createStreamedResponse($download);
        $dispositionHeader = $response->headers->makeDisposition(ResponseHeaderBag::DISPOSITION_ATTACHMENT,"Reporte de Clientes Registrados - ".date("d-m-Y").'.xls');
        $response->headers->set('Content-Type', 'text/vnd.ms-excel; charset=utf-8');
        $response->headers->set('Pragma', 'public');
        $response->headers->set('Cache-Control', 'maxage=1');
        $response->headers->set('Content-Disposition', $dispositionHeader);

        return $response;
    }
}