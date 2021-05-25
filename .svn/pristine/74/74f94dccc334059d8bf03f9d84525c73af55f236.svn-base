<?php 
session_start();
// Se incluye la librería
include 'apiRedsys.php';
// Se crea Objeto
$miObj = new RedsysAPI;

//  Cargamos el idioma que recibiremos por GET
$default_lang="cas"; $default_lang_tpv="001";
if(!empty($_GET["lang"]) && ($_GET["lang"]==="cas"))
{   $default_lang="cas";    $default_lang_tpv="001";   }
else if($_GET["lang"]==="val")
{   $default_lang="val";    $default_lang_tpv="010";   }
else if($_GET["lang"]==="eng")
{   $default_lang="eng";    $default_lang_tpv="002";   }

require_once '../lang/publico_'.$default_lang.'.php';

// Valores de entrada que no hemos cmbiado para ningun ejemplo
$fuc        ="272085010";   //031100027
$terminal   ="001";
$moneda     ="978";
$trans      ="0";           //0-Autorizacion

/******************************************************************************************************************************
    ESPECIFICACION URLS DEL BANCO
    Explicación:
    - El banco hace 2 cosas cuando se produce el PAGO.
    - Cosa 1: Por un lado, lanza un robot que ejecuta la petición http a la $url 
              (En este URL es donde debemos actutlizar el campo de la base de datos y enviar email de confirmacion)
    - Cosa 2. Por otro lado, el banco redirije al usuario a una URL o otra según sea OK o KO. 
              Como el envio de email ya se hace en el HILO 1, aquí no se actualiza la base de datos ni se envia ningun email. 
              Solo se muestra la vista con el mensaje
  
    Para probar el pago OK en entorno de desarrollo puede usarse la siguiente tarjeta:
    Número de tarjeta 	4548812049400004
    Caducidad           12/20
    Código CVV2         123
    Código CIP          123456 
 
    Para probar el pago KO en entorno de desarrollo puede usarse la siguiente tarjeta:
    Número de tarjeta 	1111111111111117
    Caducidad           12/20
    Código CVV2         -
    Código CIP          -
*******************************************************************************************************************************/
if($_SERVER['SERVER_NAME']==="servicios.alqueriadelbasket.com")
{   $url_base="https://servicios.alqueriadelbasket.com/";   }
else
{   $url_base="http://localhost/serviciosalqueria/";        }

$url    = $url_base."tpv_academy/ejemploRecepcionaPet.php";             //  HILO 1: URL ejecutada por BOT del banco
$urlOK  = $url_base."index.php?r=inscripciones/InscripcionAcademyOK";   //  HILO 2: URL a la que se envia el usuario si el pago va bien
$urlKO  = $url_base."index.php?r=inscripciones/InscripcionAcademyKO";   //  HILO 2: URL a la que se envia el usuario si el pago va mal

//Nº de pedido, 4 primeros digitos numericos, el resto del 0 al 9 a-z, A-Z
$id         = $_GET['pedido'];
$titular    = $_GET['titular'];

$concepto = 'L’Alqueria Academy';   //maximo 125 caracteres

// Importe a pagar. Las dos ultimas posiciones se consideran decimales
$amount =   $_GET['importe']; //  Recibimos 1000 porque son 1000 euros
$amount =   $amount."00";   //Las dos ultimas posiciones se consideran decimales

// Se Rellenan los campos
$miObj->setParameter("DS_MERCHANT_AMOUNT",$amount);
$miObj->setParameter("DS_MERCHANT_ORDER",$id);
$miObj->setParameter("DS_MERCHANT_MERCHANTCODE",$fuc);
$miObj->setParameter("DS_MERCHANT_CURRENCY",$moneda);
$miObj->setParameter("DS_MERCHANT_TRANSACTIONTYPE",$trans);
$miObj->setParameter("DS_MERCHANT_TERMINAL",$terminal);
$miObj->setParameter("DS_MERCHANT_MERCHANTURL",$url);
$miObj->setParameter("DS_MERCHANT_URLOK",$urlOK);
$miObj->setParameter("DS_MERCHANT_URLKO",$urlKO);

$miObj->setParameter("Ds_Merchant_ConsumerLanguage",$default_lang_tpv);

$miObj->setParameter("DS_MERCHANT_PRODUCTDESCRIPTION",$concepto); 
$miObj->setParameter("DS_MERCHANT_TITULAR",$titular); 

//  Datos de configuración
$version="HMAC_SHA256_V1";
//$kc = 'sq7HjrUOBfKmC576ILgskD5srU870gJ7';   //  Clave de pruebas
$kc = '6CNlHqacCTwi97kEKMl2rIf5+sjscoTA';       //  Clave de producción recuperada de CANALES

//  Se generan los parámetros de la petición
$request    = "";
$params     = $miObj->createMerchantParameters();
$signature  = $miObj->createMerchantSignature($kc);

//  Para el action del <form> según usemos el entorno de pruebas del TPV o el de producción
//  $url_formulario =   "https://sis-t.redsys.es:25443/sis/realizarPago";   //  ENTORNO DE PRUEBAS
$url_formulario     =   "https://sis.redsys.es/sis/realizarPago";           //  ENTORNO DE PRODUCCION
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>L'Alqueria del Basket</title>
        <meta name="description" content="">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
        <link href="favicon.ico" rel="icon" type="image/x-icon" /> 
        <link rel="apple-touch-icon" href="favicon.ico">
        <link rel="apple-touch-icon" sizes="72x72" href="favicon.ico">
        <link rel="apple-touch-icon" sizes="114x114" href="favicon.ico">

        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="../css/bootstrapGrid.min.css">
        <link rel="stylesheet" href="../css/header.min.css">
        <link rel="stylesheet" href="../css/main.min.css">
        <link rel="stylesheet" href="../backmeans/assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
        <link href="../libs/animate/animate.css" rel="stylesheet" type="text/css">
    </head>
    <link rel="stylesheet" href="../css/dossier-pdf.css">
    <body class="Pages gallery-W">
        <div class="wrapper">
            <?php require('../includes/header_simplificado.php'); ?>
            
            <section id="page-content" class="margin-top-header">
                <div class="block-Club-Gallery clearfix t-black t-center">
                    <div class="b-wrap-club-gallery">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text-wrap">
                                         <h2 class="section-title"><span class="orange-text"><?php echo $lang["academy_tpv_1"];?></span></h2> 
                                    </div>
                                </div>

                                <div class="col-md-12 alqueria-bg-box">
                                    <h4 class="t-center"><?php echo $lang["academy_tpv_2"];?></h4>
                                    <h4 class="t-center"><?php echo $lang["academy_tpv_3"];?></h4>
                                      
                                    <!-- URL TEST       : https://sis-t.redsys.es:25443/sis/realizarPago  
                                         URL PRODUCCION : https://sis.redsys.es/sis/realizarPago        -->
                                    <form name="frm" action="<?php echo $url_formulario;?>" method="POST" target="_blank">
                                        
                                        <!-- Ds_Merchant_SignatureVersion -->
                                        <input type="hidden" name="Ds_SignatureVersion"     value="<?php echo $version; ?>"/>

                                        <!-- Ds_Merchant_MerchantParameters -->
                                        <input type="hidden" name="Ds_MerchantParameters"   value="<?php echo $params; ?>"/>

                                        <!-- Ds_Merchant_Signature -->
                                        <input type="hidden" name="Ds_Signature"            value="<?php echo $signature; ?>"/>

                                        <button class="btn btn-link-o" type="submit" id="submit">
                                            <span class="mt-0"><?php echo $lang["academy_tpv_4"];?></span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <?php require('../includes/footer_simplificado.php'); ?>
            
            <!-- Load Scripts Start -->
            <script src="../js/libs.js"></script>
            <script src="../js/common.js"></script>

            <!--[if lt IE 9]>
                <script src="libs/html5shiv/es5-shim.min.js"></script>
                <script src="libs/html5shiv/html5shiv.min.js"></script>
                <script src="libs/html5shiv/html5shiv-printshiv.min.js"></script>
                <script src="libs/respond/respond.min.js"></script>
            <![endif]-->
        </div>
    </body>
</html>