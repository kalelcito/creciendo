<?php

namespace FrontendBundle\Controller;

use CoreBundle\Entity\Clientes;
use CoreBundle\Entity\Pagos;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UsuariosController extends Controller
{
    /**
     * @Route("/pagos/membresia/{id}", name="frontend_pagos_membresia")
     * @Method("GET")
     */
    public function indexAction(Request $request, Clientes $cliente)
    {
        if($this->getUser()->getId()!=$cliente->getId()){
            return $this->redirectToRoute('frontend_pagos_membresia',array("id"=>$this->getUser()->getId()));
        }

        $hoy= new \DateTime();
        $live=true;
        if($cliente->getFechaRenovacion()!=null && $hoy<= $cliente->getFechaRenovacion()){
            return $this->redirectToRoute('login');
        }else{
            //$ref=$fechamin->modify('-1 day');
            //"4Vj8eK4rloUd272L48hsrarnUA~508029~TestPayU~3~USD"
            $cantidad=$cliente->getNiveles()->getPrecioAnual();
            $moneda=$cliente->getNiveles()->getMoneda();

            if($live==true){
                $accountid="589837";
                $merchantid="586830";
                $api="q82i6m9lkGo762VC8F9YA59uCk";
                /*$accountid="641440";
                $merchantid="639074";
                $api="5oQMQNY9GdvMG88p9cj4Jj14hu";*/
            }else{
                $accountid="512324";
                $merchantid="508029";
                $api="4Vj8eK4rloUd272L48hsrarnUA";



            }
            $niv=$cliente->getNiveles()->getId();
            $reference="PER_".$niv."_".$cliente->getId();
            $sig=md5($api."~".$merchantid."~".$reference."~".$cantidad."~".$moneda);
            return $this->render('FrontendBundle:Usuarios:pagos.html.twig',array(
                "cliente"=>$cliente,
                "cantidad"=>$cantidad,
                "moneda"=>$moneda,
                "merchantid"=>$merchantid,
                "reference"=>$reference,
                "sig"=>$sig,
                "accountid"=>$accountid,
                'live'=>$live
            ));
        }
    }

    /**
     * @Route("/pagos/paquete/{id}", name="frontend_pagos_paquete")
     * @Method("GET")
     */
    public function indexpAction(Request $request, Clientes $cliente)
    {
        if($this->getUser()->getId()!=$cliente->getId()){
            return $this->redirectToRoute('frontend_pagos_paquete',array("id"=>$this->getUser()->getId()));
        }

        $hoy= new \DateTime();
        $live=true;
        $cantidad=$request->query->get("cantidad",null);
        $paquete=$request->query->get("paq",null);
        if($cantidad!=null && $paquete!=null){
            //$cantidad=number_format($cantidad,2);
            //$ref=$fechamin->modify('-1 day');
            //"4Vj8eK4rloUd272L48hsrarnUA~508029~TestPayU~3~USD"
            $moneda="MXN";

            if($live==true){
                /*$accountid="589837";
                $merchantid="586830";
                $api="Q82i6m9lkGo762VC8F9YA59uCk";*/
                $accountid="589837";
                $merchantid="586830";
                $api="q82i6m9lkGo762VC8F9YA59uCk";
            }else{
                $accountid="512324";
                $merchantid="508029";
                $api="4Vj8eK4rloUd272L48hsrarnUA";
            }

            $reference="PER_Paquete-".$paquete."_".$cliente->getId();
            $sig=md5($api."~".$merchantid."~".$reference."~".$cantidad."~".$moneda);
            return $this->render('FrontendBundle:Usuarios:pagos.html.twig',array(
                "cliente"=>$cliente,
                "cantidad"=>$cantidad,
                "moneda"=>$moneda,
                "merchantid"=>$merchantid,
                "reference"=>$reference,
                "sig"=>$sig,
                "accountid"=>$accountid,
                'live'=>$live
            ));
        }else{
            return $this->redirectToRoute('login');
        }

    }

    /**
     * @Route("/pagos/webhook/{id}", name="frontend_pagos_webhook")
     */
    public function indexrAction(Request $request, Clientes $cliente)
    {
        $em = $this->getDoctrine()->getManager();
        $live=true;
        if($live==true){
            $ApiKey = "q82i6m9lkGo762VC8F9YA59uCk";
        }else{
            $ApiKey = "4Vj8eK4rloUd272L48hsrarnUA";
        }

$merchant_id = $request->query->get("merchantId");
$referenceCode = $request->query->get('referenceCode');
$TX_VALUE = $request->query->get('TX_VALUE');
$New_value = number_format($TX_VALUE, 1, '.', '');
$currency = $request->query->get('currency');
$transactionState = $request->query->get('transactionState');
$firma_cadena = "$ApiKey~$merchant_id~$referenceCode~$New_value~$currency~$transactionState";
$firmacreada = md5($firma_cadena);
$firma = $request->query->get('signature');
$reference_pol = $request->query->get('reference_pol');
$cus = $request->query->get('cus');
$extra1 = $request->query->get('description');
$pseBank = $request->query->get('pseBank');
$lapPaymentMethod = $request->query->get('lapPaymentMethod');
$transactionId = $request->query->get('transactionId');
$acceso=0;
if ($request->query->get('transactionState') == 4 ) {
    $estadoTx = "Transacción aprobada";
    $acceso=1;
}

else if ($request->query->get('transactionState') == 6 ) {
    $estadoTx = "Transacción rechazada";
}

else if ($request->query->get('transactionState') == 104 ) {
    $estadoTx = "Error";
}

else if ($request->query->get('transactionState') == 7 ) {
    $estadoTx = "Transacción pendiente";
}

else {
    $estadoTx=$request->query->get('mensaje');
}

$explode= explode("_", $referenceCode);
if($explode[2]!=null && isset($explode[2])){
    $cliente->setFechaRenovacion(new \DateTime("+ 1 year"));
    $em->persist($cliente);
    $em->flush();

    $pago=new Pagos();
    $pago->setClientes($cliente);
    $pago->setBanco($pseBank);
    $pago->setEntidad($lapPaymentMethod);
    $pago->setIdTransaccion($transactionId);
    $pago->setMoneda($currency);
    $pago->setReferenciaTransaccion($referenceCode);
    $pago->setReferenciaVenta($reference_pol);
    $pago->setMonto($TX_VALUE);
    $em->persist($pago);
    $em->flush();
    if (strtoupper($firma) == strtoupper($firmacreada)) {
        $html="<h2>Resumen Transacción</h2>
    <table>
        <tr>
            <td>Estado de la transaccion</td>
            <td> $estadoTx</td>
        </tr>
        <tr>
        <tr>
            <td>ID de la transaccion</td>
            <td>$transactionId</td>
        </tr>
        <tr>
            <td>Referencia de la venta</td>
            <td>$reference_pol</td>
        </tr>
        <tr>
            <td>Referencia de la transaccion</td>
            <td> $referenceCode</td>
        </tr>
        <tr>";

        if($pseBank != null) {
            $html.='<tr>
            <td>cus </td>
            <td> $cus </td>
        </tr>
        <tr>
            <td>Banco </td>
            <td> $pseBank </td>
        </tr>';
        }
        $html.="
        <tr>
            <td>Valor total</td>
            <td>$ $TX_VALUE</td>
        </tr>
        <tr>
            <td>Moneda</td>
            <td> $currency</td>
        </tr>
        <tr>
            <td>Descripción</td>
            <td>$extra1</td>
        </tr>
        <tr>
            <td>Entidad:</td>
            <td>$lapPaymentMethod</td>
        </tr>
    </table>";

    }
    else
    {
        $html='
    <h1>Error validando firma digital.</h1>
    ';

    }

} else
{
    $html='
    <h1>Error validando firma digital.</h1>
    ';

    }
        return $this->render('FrontendBundle:Usuarios:pagosr.html.twig',array(
            "html"=>$html,
            "acceso"=>$acceso
        ));
    }

    /**
     * @Route("/pagos/paypalipn/{id}", name="frontend_pagos_paypalipn")
     */
    public function paypalipnAction(Request $request, Clientes $cliente){
        // STEP 1: Read POST data

        // reading posted data from directly from $_POST causes serialization
        // issues with array data in POST
        // reading raw POST data from input stream instead.
        $raw_post_data = file_get_contents('php://input');
        $raw_post_array = explode('&', $raw_post_data);
        $myPost = array();
        foreach ($raw_post_array as $keyval) {
            $keyval = explode ('=', $keyval);
            if (count($keyval) == 2)
                $myPost[$keyval[0]] = urldecode($keyval[1]);
        }
        // read the post from PayPal system and add 'cmd'
        $req = 'cmd=_notify-validate';
        if(function_exists('get_magic_quotes_gpc')) {
            $get_magic_quotes_exists = true;
        }
        foreach ($myPost as $key => $value) {
            if($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) {
                $value = urlencode(stripslashes($value));
            } else {
                $value = urlencode($value);
            }
            $req .= "&$key=$value";
        }


        // STEP 2: Post IPN data back to paypal to validate

        $ch = curl_init('https://www.paypal.com/cgi-bin/webscr');
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));

        // In wamp like environments that do not come bundled with root authority certificates,
        // please download 'cacert.pem' from "http://curl.haxx.se/docs/caextract.html" and set the directory path
        // of the certificate as shown below.
        // curl_setopt($ch, CURLOPT_CAINFO, dirname(__FILE__) . '/cacert.pem');
        if( !($res = curl_exec($ch)) ) {
            // error_log("Got " . curl_error($ch) . " when processing IPN data");
            curl_close($ch);
            exit;
        }
        curl_close($ch);


        // STEP 3: Inspect IPN validation result and act accordingly

        if (strcmp ($res, "VERIFIED") == 0) {
            // check whether the payment_status is Completed
            // check that txn_id has not been previously processed
            // check that receiver_email is your Primary PayPal email
            // check that payment_amount/payment_currency are correct
            // process payment

            // assign posted variables to local variables
            $item_name = $_POST['item_name'];
            $item_number = $_POST['item_number'];
            $payment_status = $_POST['payment_status'];
            $payment_amount = $_POST['mc_gross'];
            $payment_currency = $_POST['mc_currency'];
            $txn_id = $_POST['txn_id'];
            $receiver_email = $_POST['receiver_email'];
            $payer_email = $_POST['payer_email'];

            // <---- HERE you can do your INSERT to the database

        } else if (strcmp ($res, "INVALID") == 0) {
            // log for manual investigation
        }
    }
}
