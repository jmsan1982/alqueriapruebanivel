<?php
	session_start();
	// Se incluye la librería
	include 'apiRedsys.php';
	// Se crea Objeto
	$miObj = new RedsysAPI;

	// Valores de entrada que no hemos cambiado para ningún ejemplo
	$fuc        =   "272085010";   //   031100027
	$terminal   =   "001";
	$moneda     =   "978";
	$trans      =   "0";           //   0-Autorizacion
	// Este procesa el update en database
	$url        =   "http://servicios.alqueriadelbasket.com/tpv_liga/redsysHMAC256_API_PHP_7.0.0/respuesta_inscripcion.php";
	// Esto muestra confirmacion OK al usuario            
	$urlOK      =   "http://servicios.alqueriadelbasket.com/index.php?r=formularios/LigaAlqueriaFormPagoTPVOK";
	// Esto muestra confirmacion KO al usuario                    
	$urlKO      =   "http://servicios.alqueriadelbasket.com/index.php?r=formularios/LigaAlqueriaFormPagoTPVKO";         

	//  Estos dos valores los vamos cambiando en cada ejemplo
	//  $id='81603491'; //Nº de pedido, 4 primeros digitos numericos, el resto del 0 al 9 a-z, A-Z
	$id         =   $_GET['numeropedido'];
	//  $titular = 'Pruebas Tessq'; //$_POST['concepto'];  //maximo 60 caracteres
	$titular    =   $_GET['titular'];

	//  Valores fijos
	$concepto   =   'Inscripcion y Fianza Liga Alqueria';   //  maximo 125 caracteres
	$amount     =   20000;                                  //  importe a pagar. Las dos ultimas posiciones se consideran decimales

	//$amount   =   $_GET['importetpv'];  //aqui no se le pasa el importe por GET

	// Se Rellenan los campos
	$miObj->setParameter("DS_MERCHANT_AMOUNT",          $amount);
	$miObj->setParameter("DS_MERCHANT_ORDER",           $id);
	$miObj->setParameter("DS_MERCHANT_MERCHANTCODE",    $fuc);
	$miObj->setParameter("DS_MERCHANT_CURRENCY",        $moneda);
	$miObj->setParameter("DS_MERCHANT_TRANSACTIONTYPE", $trans);
	$miObj->setParameter("DS_MERCHANT_TERMINAL",        $terminal);
	$miObj->setParameter("DS_MERCHANT_MERCHANTURL",     $url);
	$miObj->setParameter("DS_MERCHANT_URLOK",           $urlOK);
	$miObj->setParameter("DS_MERCHANT_URLKO",           $urlKO);
	$miObj->setParameter("DS_MERCHANT_PRODUCTDESCRIPTION",$concepto); 
	$miObj->setParameter("DS_MERCHANT_TITULAR",$titular); 

	//  Datos de configuración
	$version    =   "HMAC_SHA256_V1";
	//  Clave de comercio sq7HjrUOBfKmC576ILgskD5srU870gJ7 de pruebas
	$kc         =   '6CNlHqacCTwi97kEKMl2rIf5+sjscoTA'; //Clave recuperada de CANALES


	//
	// Se generan los parámetros de la petición
	$request    =   "";
	$params     =   $miObj->createMerchantParameters();
	$signature  =   $miObj->createMerchantSignature($kc);

	// echo phpversion();

	// error_log(__FILE__.__LINE__);

	/* DATOS DE TARJETAS DE PRUEBA
	1.- Realice al menos una operación Autorizada. Utilice esta tarjeta de prueba: 
	Número de tarjeta 	4548812049400004
	Caducidad 	12/20
	Código CVV2 	123
	Código CIP 	123456 
	2.- Realice al menos una operación Denegada. Utilice esta tarjeta de prueba: 
	Número de tarjeta 	1111111111111117
	Caducidad 	12/20
	*/
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

		<script src="../js/jquery-3.3.1.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>

		<link rel="stylesheet" href="../css/bootstrapGrid.min.css">
		<link rel="stylesheet" href="../css/header.min.css">
		<link rel="stylesheet" href="../css/main.min.css">
		<link rel="stylesheet" href="../css/footermodal.css">
		<link rel="stylesheet" href="../backmeans/assets/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Condensed">
		<style>
			.alqueria-bg-box {
				margin: 0 15px;
				padding: 15px;
				border: 1px solid #ccc;
				background-color: #fafafa;
				background-repeat: repeat-y;
				background-position: center top;
				background-size: 100% auto;
				border-radius: 5px;
				min-height: 25vh;
			}
			@media (min-width: 768px) {
				.alqueria-bg-box {
					margin: auto;
				}
			}
		</style>
	</head>

	<body class="Pages gallery-W">
		<div class="wrapper">
			<?php require('../includes/header_simplificado.php'); ?>

			<!-- Start Page-Content -->
			<section id="page-content" class="margin-top-header" style="min-height: calc(100vh - 173px) !important;">
				<div class="block-Club-Gallery clearfix t-black t-center">
					<div class="b-wrap-club-gallery">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<div class="text-wrap">
										<h2 class="section-title">
											<span class="orange-text">Confirme la reserva</span>
										</h2>
									</div>
								</div>

								<div class="col-md-12 alqueria-bg-box">

									<h4 class="t-center">Al pulsar, <strong>"Realizar reserva"</strong> le redirigemos a la plataforma de pago seguro mediante tarjeta de credito.</h4>

									<h4 class="t-center">En la siguiente pantalla, guarde e imprima el justificante en PDF.</h4>

                                    <!-- URL de llamada del entorno de test es: 
                                        https://sis-t.redsys.es:25443/sis/realizarPago  
                                        Url  real: https://sis.redsys.es/sis/realizarPago   -->
                                    <form name="frm" action="https://sis.redsys.es/sis/realizarPago" method="POST" target="_blank">

										<!-- Ds_Merchant_SignatureVersion -->
										<input type="hidden" name="Ds_SignatureVersion" value="<?php echo $version; ?>">

										<!-- Ds_Merchant_MerchantParameters -->
										<input type="hidden" name="Ds_MerchantParameters" value="<?php echo $params; ?>">

										<!-- Ds_Merchant_Signature -->
										<input type="hidden" name="Ds_Signature" value="<?php echo $signature; ?>">

										<button class="btn btn-link-o" type="submit" id="submit">
											<span class="mt-0">Realizar reserva</span>
										</button>

										<br>
									</form>

									<!-- <div class="col-md-12">
										<img class="img-responsive mb-1" src="../img/tpv_shootingcamp.jpg" style="margin:0 auto;border:1px solid gray;">
									</div> -->
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
			<!-- Load Scripts End -->

		</div> <!-- End Wrapper -->
	</body>
</html>