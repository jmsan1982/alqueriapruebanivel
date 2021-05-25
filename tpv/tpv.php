<?php
session_start();
// Se incluye la librería
include 'apiRedsys.php';
// Se crea Objeto
$miObj = new RedsysAPI;

// Valores de entrada que no hemos cmbiado para ningun ejemplo
$fuc="272085010";  //031100027
$terminal="001";
$moneda="978";
$trans="0"; //0-Autorizacion
$url="http://servicios.alqueriadelbasket.com/tpv/redsysHMAC256_API_PHP_7.0.0/ejemploRecepcionaPet.php";
$urlOK="http://servicios.alqueriadelbasket.com/tpv/redsysHMAC256_API_PHP_7.0.0/ejemploRecepcionaPet.php";
$urlKO="http://servicios.alqueriadelbasket.com/tpv/redsysHMAC256_API_PHP_7.0.0/ejemploRecepcionaPet.php";

//estos dos valores los vamos cambiando en cada ejemplo
//$id='81603491';//Nº de pedido, 4 primeros digitos numericos, el resto del 0 al 9 a-z, A-Z
$id = $_GET['pedido'];
//$titular = 'Pruebas Tessq'; //$_POST['concepto'];  //maximo 60 caracteres
$titular = $_GET['titular'];

if($id==""){$id="102548993";}
if($titular==""){$titular = "Pablo Muñoz Demo";}

//valores fijos
$concepto = 'Evento Adidas Next Generation';   //maximo 125 caracteres
//$amount=5000;//importe a pagar. Las dos ultimas posiciones se consideran decimales

$amount = $_GET['importetpv'];

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

$miObj->setParameter("DS_MERCHANT_PRODUCTDESCRIPTION",$concepto); 
$miObj->setParameter("DS_MERCHANT_TITULAR",$titular); 

//Datos de configuración
$version="HMAC_SHA256_V1";
//clave de comercio sq7HjrUOBfKmC576ILgskD5srU870gJ7  de pruebas
$kc = '6CNlHqacCTwi97kEKMl2rIf5+sjscoTA';//Clave recuperada de CANALES
// Se generan los parámetros de la petición
$request = "";
$params = $miObj->createMerchantParameters();
$signature = $miObj->createMerchantSignature($kc);

//echo phpversion();
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
            
            <!-- Start Page-Content -->
            <section id="page-content" class="margin-top-header">

                <div class="block-Club-Gallery clearfix t-black t-center">
                    <div class="b-wrap-club-gallery">
                        <div class="container">
                            <div class="row">
                                
                                <div class="col-md-12">
                                    <div class="text-wrap">
                                        <!-- <h2 class="section-title"><span class="orange-text"> Confirme la reserva </span></h2> -->
                                        <h2 class="section-title"><span class="orange-text">
                                            <?php switch ($_SESSION['language_adidas']) {
                                                case "es":  echo "Confirme la reserva";   break;
                                                case "en":  echo "Confirm the reservation";    break;
                                            } ?> 
                                        </span></h2>
                                    </div>
                                </div>

                               
                                <div class="col-md-12 alqueria-bg-box">
                                    <h4 class="t-center">
                                        <?php switch ($_SESSION['language_adidas']) {
                                            case "es":  echo "Al pulsar, Realizar reserva le redirigemos a la plataforma de pago seguro mediante tarjeta de credito.";   break;
                                            case "en":  echo "By clicking, Make a reservation we redirect you to the secure payment platform by credit card.";    break;
                                        } ?>
                                    </h4>
                                    
                                    <h4 class="t-center">
                                        <?php switch ($_SESSION['language_adidas']) {
                                            case "es":  echo "En la siguiente pantalla, guarde e imprima el justificante en PDF.";   break;
                                            case "en":  echo "On the next screen, save and print the proof in PDF.";    break;
                                        } ?> 
                                    </h4>
                                      
                                    <form name="frm" action="https://sis.redsys.es/sis/realizarPago" method="POST" target="_blank">

                                        <!-- Ds_Merchant_SignatureVersion -->
                                        <input type="hidden" name="Ds_SignatureVersion" value="<?php echo $version; ?>"/>

                                        <!-- Ds_Merchant_MerchantParameters -->
                                        <input type="hidden" name="Ds_MerchantParameters" value="<?php echo $params; ?>"/>

                                        <!-- Ds_Merchant_Signature -->
                                        <input type="hidden" name="Ds_Signature" value="<?php echo $signature; ?>"/>

                                        <button class="btn btn-link-o" type="submit" id="submit">
                                            <span class="mt-0">
                                                <?php switch ($_SESSION['language_adidas']) {
                                                    case "es":  echo "Realizar reserva";   break;
                                                    case "en":  echo "Make a reservation";    break;
                                                } ?> 
                                            </span>
                                        </button>
                                        </br>

                                    </form>

                                    <div class="col-md-12">
                                        <img class="img-responsive mb-1" src="../img/tpv-demo.png" style="margin:0 auto;border:1px solid gray;">
                                    </div>
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
            <!-- Load Scripts End -->
            <!--[if lt IE 9]>
                    <script src="libs/html5shiv/es5-shim.min.js"></script>
                    <script src="libs/html5shiv/html5shiv.min.js"></script>
                    <script src="libs/html5shiv/html5shiv-printshiv.min.js"></script>
                    <script src="libs/respond/respond.min.js"></script>
            <![endif]-->
        </div> <!-- End Wrapper -->
    </body>
</html>
