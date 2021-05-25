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
					$kc = 'sq7HjrUOBfKmC576ILgskD5srU870gJ7'; // de pruebas	
					//$kc = '6CNlHqacCTwi97kEKMl2rIf5+sjscoTA'; //Clave recuperada de CANALES
					$firma = $miObj->createMerchantSignatureNotif($kc,$datos);	

					echo PHP_VERSION."<br/>";
					echo $firma."<br/>";
					echo $signatureRecibida."<br/>";
					if ($firma === $signatureRecibida){
						//echo "FIRMA OK";
						
						header('Location: https://servicios.alqueriadelbasket.com/?r=skillscamp/ok');
					} else {
						//echo "FIRMA KO. Error, firma incorrecta";
						
						header('Location: https://servicios.alqueriadelbasket.com/?r=skillscamp/ko');
					}
	}
	else{
		if (!empty( $_GET ) ) {//URL DE RESP. ONLINE
				
			$version = $_GET["Ds_SignatureVersion"];
			$datos = $_GET["Ds_MerchantParameters"];
			$signatureRecibida = $_GET["Ds_Signature"];
				
			print_r($datos);die;	
			
			$decodec = $miObj->decodeMerchantParameters($datos);
			$kc = 'sq7HjrUOBfKmC576ILgskD5srU870gJ7'; // de pruebas
			//$kc = '6CNlHqacCTwi97kEKMl2rIf5+sjscoTA'; //Clave recuperada de CANALES
			$firma = $miObj->createMerchantSignatureNotif($kc,$datos);
			
			//nuevo
			$codigo_venta_recibido=$miObj->getParameter("Ds_Order"); 
			//$codigoRespuesta=intval($codigoRespuesta);
            $codigoRespuesta=$miObj->getParameter('Ds_Response'); 

            $dos_char = substr($codigoRespuesta, 0, 2);
		
			if ($firma === $signatureRecibida){
				//echo "FIRMA OK";
				//header('Location: http://inscripciones.alqueriadelbasket.com/?r=index/ok');
				
				if ($dos_char == "00") {
					
					header('Location: https://servicios.alqueriadelbasket.com/?r=skillscamp/ok&codigo='.$codigo_venta_recibido);
				} else{
					
					header('Location: https://servicios.alqueriadelbasket.com/?r=skillscamp/ko');
				}
			} else {
				//echo "FIRMA KO";
				
				header('Location: https://servicios.alqueriadelbasket.com/?r=skillscamp/ko');
			}
		}
		else{
			die("No se recibió respuesta");
		}
	}

?>
</body> 
</html> 