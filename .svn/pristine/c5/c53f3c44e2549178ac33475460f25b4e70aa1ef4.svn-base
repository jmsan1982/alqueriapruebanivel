<?php

	// Se incluye la librería
	include 'apiRedsys.php';
	// Se crea Objeto
	$miObj = new RedsysAPI;

	// Valores de entrada que no hemos cmbiado para ningun ejemplo
	$fuc="272085010";  //031100027
	$terminal="001";
	$moneda="978";
	$trans="0"; //0-Autorizacion
	$url="";
	$urlOK="http://inscripciones.alqueriadelbasket.com/tpv/redsysHMAC256_API_PHP_7.0.0/ejemploRecepcionaPet.php";
	$urlKO="http://inscripciones.alqueriadelbasket.com/tpv/redsysHMAC256_API_PHP_7.0.0/ejemploRecepcionaPet.php";
	
	//estos dos valores los vamos cambiando en cada ejemplo
	$id='81603497';//Nº de pedido, 4 primeros digitos numericos, el resto del 0 al 9 a-z, A-Z
	$titular = 'Pruebas Tessq 20-06-18'; //$_POST['concepto'];  //maximo 60 caracteres
	
	
	//valores fijos
	$concepto = 'Ficha inscripcion 18-19';   //maximo 125 caracteres
	$amount=5000;//importe a pagar. Las dos ultimas posiciones se consideran decimales

	
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
	//clave de comercio sq7HjrUOBfKmC576ILgskD5srU870gJ7
	$kc = 'sq7HjrUOBfKmC576ILgskD5srU870gJ7';//Clave recuperada de CANALES
	// Se generan los parámetros de la petición
	$request = "";
	$params = $miObj->createMerchantParameters();
	$signature = $miObj->createMerchantSignature($kc);

 
	//echo phpversion();
?>
<html lang="es">
<head>
</head>
<body>
<form name="frm" action="https://sis-t.redsys.es:25443/sis/realizarPago" method="POST" target="_blank">
Ds_Merchant_SignatureVersion <input type="text" name="Ds_SignatureVersion" value="<?php echo $version; ?>"/></br>
Ds_Merchant_MerchantParameters <input type="text" name="Ds_MerchantParameters" value="<?php echo $params; ?>"/></br>
Ds_Merchant_Signature <input type="text" name="Ds_Signature" value="<?php echo $signature; ?>"/></br>
<input type="submit" value="Enviar" >
</form>

</body>
</html>
