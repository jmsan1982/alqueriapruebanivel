<html> 
<body> 
<?php

	include 'apiRedsys.php';

	// Se crea Objeto
	$miObj = new RedsysAPI;


if (!empty( $_POST ) ) {//URL DE RESP. ONLINE
					
					$version = $_POST["Ds_SignatureVersion"];
					$datos = $_POST["Ds_MerchantParameters"];
					$signatureRecibida = $_POST["Ds_Signature"];
			
					print_r($datos);die;					

					$decodec = $miObj->decodeMerchantParameters($datos);	
					$kc = '6CNlHqacCTwi97kEKMl2rIf5+sjscoTA'; //Clave recuperada de CANALES
					$firma = $miObj->createMerchantSignatureNotif($kc,$datos);	

					echo PHP_VERSION."<br/>";
					echo $firma."<br/>";
					echo $signatureRecibida."<br/>";
					if ($firma === $signatureRecibida){
						//echo "FIRMA OK";
						
						header('Location: http://servicios.alqueriadelbasket.com/?r=index/ok');
					} else {
						//echo "FIRMA KO. Error, firma incorrecta";
						
						header('Location: http://servicios.alqueriadelbasket.com/?r=index/ko');
					}
	}
	else{
		if (!empty( $_GET ) ) {//URL DE RESP. ONLINE
				
			$version = $_GET["Ds_SignatureVersion"];
			$datos = $_GET["Ds_MerchantParameters"];
			$signatureRecibida = $_GET["Ds_Signature"];
				
			print_r($datos);die;	
			
			$decodec = $miObj->decodeMerchantParameters($datos);
			$kc = '6CNlHqacCTwi97kEKMl2rIf5+sjscoTA'; //Clave recuperada de CANALES
			$firma = $miObj->createMerchantSignatureNotif($kc,$datos);
			
			//nuevo
			$codigo_venta_recibido=$miObj->getParameter("Ds_Order"); 
			$codigoRespuesta=intval($codigoRespuesta);
            $codigoRespuesta=$miObj->getParameter('Ds_Response'); 
		
			if ($firma === $signatureRecibida){
				//echo "FIRMA OK";
				//header('Location: http://inscripciones.alqueriadelbasket.com/?r=index/ok');
				
				if($codigoRespuesta >=0000 && <=0099 ){
					
					header('Location: http://servicios.alqueriadelbasket.com/?r=index/ok&codigo='.$codigo_venta_recibido);
				} else{
					
					header('Location: http://servicios.alqueriadelbasket.com/?r=index/ko');
				}
			} else {
				//echo "FIRMA KO";
				
				header('Location: http://servicios.alqueriadelbasket.com/?r=index/ko');
			}
		}
		else{
			die("No se recibió respuesta");
		}
	}

?>
</body> 
</html> 