<?php
session_start();
//require('../lang/publico_' . $_SESSION['idioma'] . '.php');

// Se incluye la librería
    include 'apiRedsys.php';
// Se crea Objeto
    $miObj = new RedsysAPI;

// Valores de entrada que no hemos cmbiado para ningun ejemplo
    $fuc="272085010";  
    $terminal="001";
    $moneda="978";
    $trans="0";         // 0-Autorizacion
    
    //$url="http://inscripciones.alqueriadelbasket.com/tpv/redsysHMAC256_API_PHP_7.0.0/ejemploRecepcionaPet.php";
    //$urlOK="http://inscripciones.alqueriadelbasket.com/tpv/redsysHMAC256_API_PHP_7.0.0/ejemploRecepcionaPet.php";
    //$urlKO="http://inscripciones.alqueriadelbasket.com/tpv/redsysHMAC256_API_PHP_7.0.0/ejemploRecepcionaPet.php";

    // Pablo: aquí dejo lo que debo decomentar si no me funcionan mis 3 URL 
    // $url  ="http://alqueriadelbasket.com/tpv/redsysHMAC256_API_PHP_7.0.0/ejemploRecepcionaPet.php";
    // $urlOK="http://alqueriadelbasket.com/tpv/redsysHMAC256_API_PHP_7.0.0/ejemploRecepcionaPet.php";
    // $urlKO="http://alqueriadelbasket.com/tpv/redsysHMAC256_API_PHP_7.0.0/ejemploRecepcionaPet.php";
    $url    = "https://servicios.alqueriadelbasket.com/tpv_worcester/reservas-respuesta-tpv.php";
    $urlOK  = "https://servicios.alqueriadelbasket.com/?r=formularios/Ok";
    $urlKO  = "https://servicios.alqueriadelbasket.com/?r=formularios/Ko";
    
    // Estos dos valores los vamos cambiando en cada ejemplo
    // $id='8160fde';//Nº de pedido, 4 primeros digitos numericos, el resto del 0 al 9 a-z, A-Z
    $id = $_GET['pedido'];
    // $titular = 'Pruebas Tessq'; //$_POST['concepto'];  //maximo 60 caracteres
    $titular = $_GET['titular'];

    if($id==""){$id="102548993";}
    if($titular==""){$titular = "Alqueria";}

    //valores fijos
    $concepto = 'Campus Worcester';   //maximo 125 caracteres
    $amount = $_GET['importe'];
    // $amount=5000;//importe a pagar. Las dos ultimas posiciones se consideran decimales

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
    // Pruebas $kc = 'sq7HjrUOBfKmC576ILgskD5srU870gJ7';//Clave recuperada de CANALES
    $kc = '6CNlHqacCTwi97kEKMl2rIf5+sjscoTA';//Clave recuperada de CANALES
    // Se generan los parámetros de la petición

    $request = "";
    $params = $miObj->createMerchantParameters();
    $signature = $miObj->createMerchantSignature($kc);
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>L'Alqueria del Basket</title>
        <meta name="description" content="">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <link rel="shortcut icon" href="../favicon.png" type="image/x-icon">
        <link rel="icon" href="../favicon.ico" type="image/x-icon" /> 
        <link rel="apple-touch-icon" href="../favicon.ico">
        <link rel="apple-touch-icon" sizes="72x72" href="../favicon.ico">
        <link rel="apple-touch-icon" sizes="114x114" href="../favicon.ico">

        <script src="../js/jquery-3.3.1.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="../css/bootstrapGrid.min.css">
        <link rel="stylesheet" href="../css/header.min.css">
        <link rel="stylesheet" href="../css/main.min.css">

        <!--    <link rel="stylesheet" href="css/footermodal.css">-->
        <link rel="stylesheet" href="../backmeans/assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
        <link href="../libs/animate/animate.css" rel="stylesheet" type="text/css">
    </head>

    <body class="Pages gallery-W">
        
        <div class="wrapper">
            <?php require('../includes/header_tpv.php'); ?>
            
            <section id="page-content" class="margin-top-header overflow-x-hidden overflow-y-hidden">
                
                <div class="block">
                    <div class="container">
                        
                            <div class="row">
                                <div class="col-12">
                                    <div class="text-wrap">
                                        <h2 class="section-title t-center mb-0"><span class="orange-text t-center">CAMPUS WORCESTER</span></h2>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <h4 class="t-center"></h4>
                                </div>
                                   
                                <div class="col-12">
                                    <form name="frm" action="https://sis.redsys.es/sis/realizarPago" method="POST" target="_blank">

                                        <!-- Ds_Merchant_SignatureVersion -->
                                        <input type="hidden" name="Ds_SignatureVersion" value="<?php echo $version; ?>"/>

                                        <!-- Ds_Merchant_MerchantParameters -->
                                        <input type="hidden" name="Ds_MerchantParameters" value="<?php echo $params; ?>"/>

                                        <!-- Ds_Merchant_Signature -->
                                        <input type="hidden" name="Ds_Signature" value="<?php echo $signature; ?>"/>

                                        <button class="btn btn-link-o" type="submit" id="submit">
                                            <span class="mt-0">Pagar reserva</span>
                                        </button>
                                        
                                    </form>
                                </div>    
                                
                                <div class="col-12">
                                    <img class="img-responsive mt-2" src="../img/tpv-demo.png" style="margin:0 auto;border:1px solid gray;">
                                </div>
                            </div>
                        
                    </div>
                </div>
            </section>
        </div>
            
        <?php // require('../includes/footer_tpv.php'); ?>

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
    </body>
</html>
