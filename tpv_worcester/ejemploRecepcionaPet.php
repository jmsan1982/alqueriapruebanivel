<html> 
<body> 
<?php

	include 'apiRedsys.php';

	// Se crea Objeto
	$miObj = new RedsysAPI;


if (!empty( $_POST ) ) {//URL DE RESP
					
					$version = $_POST["Ds_SignatureVersion"];
					$datos = $_POST["Ds_MerchantParameters"];
					$signatureRecibida = $_POST["Ds_Signature"];
			
					print_r($datos);die;					

					$decodec = $miObj->decodeMerchantParameters($datos);	
					//$kc = '6CNlHqacCTwi97kEKMl2rIf5+sjscoTA'; //Clave  DE PRODUCCION recuperada de CANALES
					$kc = 'sq7HjrUOBfKmC576ILgskD5srU870gJ7'; //clave entorno de pruebas 
					$firma = $miObj->createMerchantSignatureNotif($kc,$datos);	

					echo PHP_VERSION."<br/>";
					echo $firma."<br/>";
					echo $signatureRecibida."<br/>";
					if ($firma === $signatureRecibida){
						//echo "FIRMA OK";
						
						header('Location: http://localhost/ALQUERIAFORMS/?r=formularios/ok');
						//header('Location: https://servicios.alqueriadelbasket.com/?r=formularios/ok');
					} else {
						//echo "FIRMA KO. Error, firma incorrecta";

						header('Location: http://localhost/ALQUERIAFORMS/?r=formularios/ko');
						//header('Location: https://servicios.alqueriadelbasket.com/?r=formularios/ko');
					}
	}
	else{
		if (!empty( $_GET ) ) {//URL DE RESP. ONLINE   (LOS DATOS VIENEN POR GET)
				
			$version = $_GET["Ds_SignatureVersion"];
			$datos = $_GET["Ds_MerchantParameters"];
			$signatureRecibida = $_GET["Ds_Signature"];
				
			//print_r($datos);die;

			$decodec = $miObj->decodeMerchantParameters($datos);
			//$kc = 'sq7HjrUOBfKmC576ILgskD5srU870gJ7'; //Clave recuperada de CANALES
			$kc = '6CNlHqacCTwi97kEKMl2rIf5+sjscoTA'; //Clave recuperada de CANALES  
			$firma = $miObj->createMerchantSignatureNotif($kc,$datos);	
			
			
			//nuevo
			$codigo_venta_recibido=$miObj->getParameter("Ds_Order"); 
			//$codigoRespuesta=intval($codigoRespuesta);
            $codigoRespuesta=$miObj->getParameter('Ds_Response'); 

            $dos_char = substr($codigoRespuesta, 0, 2);

		
			if ($firma === $signatureRecibida){
				//echo "FIRMA OK";
				//header('Location: http://inscripciones.alqueriadelbasket.com/?r=formularios/ok');
			
				//if($codigoRespuesta >=0000 && <=0099 ){
				if ($dos_char == "00") {
					//header('Location: http://localhost/ALQUERIAFORMS/?r=formularios/ok&codigo='.$codigo_venta_recibido);
					header('Location: https://servicios.alqueriadelbasket.com/?r=formularios/ok&codigo='.$codigo_venta_recibido);
				} else{
					//header('Location: http://localhost/ALQUERIAFORMS/?r=formularios/ko');
					header('Location: https://servicios.alqueriadelbasket.com/?r=formularios/ko');
				}
			} else {
				//echo "FIRMA KO";
				//header('Location: http://localhost/ALQUERIAFORMS/?r=formularios/ko');
				header('Location: https://servicios.alqueriadelbasket.com/?r=formularios/ko');
			}
		}
		else{
			die("No se recibió respuesta");
		}
	}

?>
</body> 
</html> 