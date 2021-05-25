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
					
					$decodec = $miObj->decodeMerchantParameters($datos);	
					$kc = '6CNlHqacCTwi97kEKMl2rIf5+sjscoTA'; //Clave recuperada de CANALES
					$firma = $miObj->createMerchantSignatureNotif($kc,$datos);	

					//nuevo
					$codigo_venta_recibido=$miObj->getParameter("Ds_Order"); 
					$codigoRespuesta=$miObj->getParameter('Ds_Response'); 
					//$codigoRespuesta=intval($codigoRespuesta);
					$transacciontipo=$miObj->getParameter('Ds_TransactionType'); 
					//$pagado=$miObj->getParameter('Ds_Response');
					
					
					
					
					//echo PHP_VERSION."<br/>";
					//echo $firma."<br/>";
					//echo $signatureRecibida."<br/>";
					// if ($firma === $signatureRecibida){
						// //echo "FIRMA OK";
						// header('Location: http://inscripciones.alqueriadelbasket.com/?r=index/ok');
					// } else {
						// //echo "FIRMA KO. Error, firma incorrecta";
						// header('Location: http://inscripciones.alqueriadelbasket.com/?r=index/ko');
					// }
					
					if ($firma === $signatureRecibida) {
						//echo "FIRMA OK";
						
						// Ahora comprobamos el código respuesta para saber qué ha pasado en el pago.
						$dos_char=substr($codigoRespuesta,0,2);
						if($dos_char=="00"){

							header('Location: http://servicios.alqueriadelbasket.com/?r=index/ok&codigo='.$codigo_venta_recibido);
						} 
						else if($codigoRespuesta=="101" ||
								$codigoRespuesta=="102" ||
								$codigoRespuesta=="106" ||
								$codigoRespuesta=="125" ||
								$codigoRespuesta=="129" ||
								$codigoRespuesta=="180" ||
								$codigoRespuesta=="184" ||
								$codigoRespuesta=="190" ||
								$codigoRespuesta=="191" ||
								$codigoRespuesta=="202" ||
								$codigoRespuesta=="904" ||
								$codigoRespuesta=="909" ||
								$codigoRespuesta=="913" ||
								$codigoRespuesta=="944" ||
								$codigoRespuesta=="950" ||
								$codigoRespuesta=="9912/912" ||
								$codigoRespuesta=="9064" ||
								$codigoRespuesta=="9078" ||
								$codigoRespuesta=="9093" ||
								$codigoRespuesta=="9094" ||
								$codigoRespuesta=="9104" ||
								$codigoRespuesta=="9218" ||
								$codigoRespuesta=="9253" ||
								$codigoRespuesta=="9256" ||
								$codigoRespuesta=="9257" ||
								$codigoRespuesta=="9261" ||
								$codigoRespuesta=="9913" ||
								$codigoRespuesta=="9914" ||
								$codigoRespuesta=="9915" ||
								$codigoRespuesta=="9928" ||
								$codigoRespuesta=="9929" ||
								$codigoRespuesta=="9997" ||
								$codigoRespuesta=="9998" ||
								$codigoRespuesta=="9999"){
							     
							      header('Location: http://servicios.alqueriadelbasket.com/?r=index/ko&codigo='.$codigo_venta_recibido);
							     
								}		
								else {
								//echo "FIRMA KO";
									
								header('Location: http://servicios.alqueriadelbasket.com/?r=index/ko&codigo='.$codigo_venta_recibido);
								}       
                  } else {
                      //echo "FIRMA KO";
                  	
                      header('Location: http://servicios.alqueriadelbasket.com/?r=index/ko&codigo='.$codigo_venta_recibido);
                  }
					
					
	}
	else{
		if (!empty( $_GET ) ) {//URL DE RESP. ONLINE
				
			$version = $_GET["Ds_SignatureVersion"];
			$datos = $_GET["Ds_MerchantParameters"];
			$signatureRecibida = $_GET["Ds_Signature"];				
		
			$decodec = $miObj->decodeMerchantParameters($datos);

			$kc = '6CNlHqacCTwi97kEKMl2rIf5+sjscoTA'; //Clave recuperada de CANALES
			$firma = $miObj->createMerchantSignatureNotif($kc,$datos);
			
			//nuevo
			$codigo_venta_recibido=$miObj->getParameter("Ds_Order"); 
            $codigoRespuesta=$miObj->getParameter('Ds_Response'); 
            //  $codigoRespuesta=intval($codigoRespuesta);
		    $transacciontipo=$miObj->getParameter('Ds_TransactionType'); 
            // $pagado=$miObj->getParameter('Ds_Response');
		
			if ($firma === $signatureRecibida) {
                    //echo "FIRMA OK";
                    // Ahora comprobamos el código respuesta para saber qué ha pasado en el pago.
                    $dos_char=substr($codigoRespuesta,0,2);
                    if($dos_char=="00"){
                        header('Location: http://servicios.alqueriadelbasket.com/?r=index/ok&codigo='.$codigo_venta_recibido);
                    } 
                    else if($codigoRespuesta=="101" ||
                            $codigoRespuesta=="102" ||
                            $codigoRespuesta=="106" ||
                            $codigoRespuesta=="125" ||
                            $codigoRespuesta=="129" ||
                            $codigoRespuesta=="180" ||
                            $codigoRespuesta=="184" ||
                            $codigoRespuesta=="190" ||
                            $codigoRespuesta=="191" ||
                            $codigoRespuesta=="202" ||
                            $codigoRespuesta=="904" ||
                            $codigoRespuesta=="909" ||
                            $codigoRespuesta=="913" ||
                            $codigoRespuesta=="944" ||
                            $codigoRespuesta=="950" ||
                            $codigoRespuesta=="9912/912" ||
                            $codigoRespuesta=="9064" ||
                            $codigoRespuesta=="9078" ||
                            $codigoRespuesta=="9093" ||
                            $codigoRespuesta=="9094" ||
                            $codigoRespuesta=="9104" ||
                            $codigoRespuesta=="9218" ||
                            $codigoRespuesta=="9253" ||
                            $codigoRespuesta=="9256" ||
                            $codigoRespuesta=="9257" ||
                            $codigoRespuesta=="9261" ||
                            $codigoRespuesta=="9913" ||
                            $codigoRespuesta=="9914" ||
                            $codigoRespuesta=="9915" ||
                            $codigoRespuesta=="9928" ||
                            $codigoRespuesta=="9929" ||
                            $codigoRespuesta=="9997" ||
                            $codigoRespuesta=="9998" ||
                            $codigoRespuesta=="9999"){
                        header('Location: http://servicios.alqueriadelbasket.com/?r=index/ko&codigo='.$codigo_venta_recibido);
                    }
                    else {
                        //echo "FIRMA KO";
                     
                        header('Location: http://servicios.alqueriadelbasket.com/?r=index/ko&codigo='.$codigo_venta_recibido);
                    }       
                } else {
                    //echo "FIRMA KO";
                   
                    header('Location: http://servicios.alqueriadelbasket.com/?r=index/ko&codigo='.$codigo_venta_recibido);
                }
		}
		else{
			die("No se recibió respuesta");
		}
	}

?>
</body> 
</html> 