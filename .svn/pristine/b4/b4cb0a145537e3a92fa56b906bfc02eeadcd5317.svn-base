<?php
	class voluntariosController {

		


		public function actionOk() {
			require "models/voluntarios.php";

			$dni = $_GET['codigo'];


			$contenidocorreo = voluntarios::damedatosvoluntario($dni);


			$contenidocorreo['fechanacimiento'] = date("d/m/Y", strtotime($contenidocorreo['fechanacimiento']));

			$contenido =
			"Nombre y apellidos: ".$contenidocorreo['nombre']." ".$contenidocorreo['apellidos'].
			"<br>Fecha de nacimiento: ".$contenidocorreo['fechanacimiento'].
			"<br>DNI: ".$contenidocorreo['dni'].
			"<br>Telefono: ".$contenidocorreo['telefono'].
			"<br>Correo electrónico: ".$contenidocorreo['email'].
			"<br>Evento: ".$contenidocorreo['evento'].
			"<br>Lugar: ".$contenidocorreo['lugar'].
			"<br>Ambito: ".$contenidocorreo['ambito'].
			"<br>Fechas: ".$contenidocorreo['fecahev_desde']." ".$contenidocorreo['fechaev_hasta'].
			"<br>Horario: ". $contenidocorreo['horario'];
			

			$enviodecorreo = voluntarios::mailsSendVoluntario($contenidocorreo['id'], $contenido, "Solicitud de inscripcion voluntarios Adidas Next Generation 2019 de L´Alqueria", $contenidocorreo['email']);

			if ($enviodecorreo) {
				 vistaSimple("layout_ok");
			}
			else {
				vistaSimple("layout_kocorreo");
			}
		}


		public function actionKo() {
			require "config.php";

			vistaSimple("layout_ko");
		}


		// Hace una nueva inscripción en Escuela de Navidad de L´alqueria
		public function actionVoluntariosForm() {
			if (isset($_POST['nombre'])) {

				require "models/voluntarios.php";

				 //Guardamos fecha nacimiento y fecha límite
            	$nacio = DateTime::createFromFormat('Y-m-d', $_POST['fechanacimiento']);
            	$fechalimite = DateTime::createFromFormat('Y-m-d', "2019-12-06");

            	//Calculamos usando diff y la fecha límite
            	$calculo = $nacio->diff($fechalimite);

           		 //Obtenemos la edad
            	$edad = $calculo->y;   

            	// Si ha nacido dentro del rango de años permitido, seguimos...
            	if ($edad >= 18) {

					$fecharegistro= date("Y-m-d");

					
					$nombre 			= $_POST['nombre'];
					$apellidos 			= $_POST['apellidos'];
					$fechanacimiento 	= $_POST['fechanacimiento'];
					$dni 				= $_POST['dni'];

					// Quitamos los guiones
					$dni = str_replace("-", "", $dni);
					// Quitamos los espacios
					$dni = str_replace(" ", "", $dni);
					// Quitamos los puntos
					$dni = str_replace(".", "", $dni);

					
					$direccion 			= $_POST['direccion'];
					
					$cp 				= $_POST['cp'];
					$provincia 			= $_POST['provincia'];
					$poblacion 			= $_POST['poblacion'];
					$telefono 			= $_POST['telefono'];
					$email  	 		= $_POST['email'];

					$evento 			= $_POST['evento'];
					$horario 			= $_POST['horario'];
					$ambito 			= $_POST['ambito'];
					$lugar	 			= $_POST['lugar'];

					$fechadesde= date("2019-12-06");
					$fechahasta= date("2019-12-08");


					if (isset($_POST['autorizodatos'])) {
						$autorizodatos 	= "si";
					}
					else {
						$autorizodatos 	= "no";
					}

					if (isset($_POST['autorizoimagen'])) {
						$autorizoimagen = "si";
					}
					else {
						$autorizoimagen = "no";
					}



	                /* Formateo Nombre Imagen  */

	                // explode: parte en trozos el string cada vez que encuentre el signo de puntuación "."

	                $valores = explode(".", $_FILES['certificado']['name']);

	                // Guardamos la extensión original del archivo subido
	                $extension = $valores[count($valores)-1];


	                // Formateamos el nombre del niño...
	                $nombre_base = $_POST['nombre'];
	                // Sustituimos los espacios por guiones
	                $nombre_format = str_replace ( " " , "-" , $nombre_base);
	                // Sustituimos los puntos por guiones
	                $nombre_format = str_replace ( "." , "-" , $nombre_format);


	                // Formateamos los apellidos del niño...
	                $apellidos_base = $_POST['apellidos'];
	                // Sustituimos los espacios por guiones
	                $apellidos_format = str_replace ( " " , "-" , $apellidos_base);
	                // Sustituimos los puntos por guiones
	                $apellidos_format = str_replace ( "." , "-" , $apellidos_format);


	                // Quitamos todos los acentos, eñes y carácteres raros
	                setlocale(LC_ALL, 'en_US.UTF8');
	                $nombre_format = preg_replace("/[^a-zA-Z0-9\_\-]+/", '',iconv('UTF-8', 'ASCII//TRANSLIT', $nombre_format));
	                $apellidos_format = preg_replace("/[^a-zA-Z0-9\_\-]+/", '',iconv('UTF-8', 'ASCII//TRANSLIT', $apellidos_format));

	                // Concatenamos y guardamos el nombre y apellidos del niño formateados (para el nombre del archivo SIP)
	                $nombre_y_apellidos_format = $nombre_format."-".$apellidos_format;

	                // Concatenamos y guardamos el nombre del niño y DNI del tutor formateados (para comparar con los registros de la BBDD)
	                $nombre_ninyo_y_dnitutor = $nombre_format."-".$dni;


					 /* Comprobamos si el registro ya existe en la BBDD antes de seguir */
                	$todoslosregistros = voluntarios::comprobarRepetidos($evento);
               		foreach ($todoslosregistros as $registro) {
                                                            
	                    // Formateamos el nombre del niño de la BBDD...
	                    $nombre_bbdd = $registro['nombre'];
	                    // Sustituimos los espacios por guiones
	                    $nombre_bbdd_format = str_replace ( " " , "-" , $nombre_bbdd);
	                    // Sustituimos los puntos por guiones
	                    $nombre_bbdd_format = str_replace ( "." , "-" , $nombre_bbdd_format);

	                    // Quitamos todos los acentos, eñes y carácteres raros
	                    setlocale(LC_ALL, 'en_US.UTF8');
	                    $nombre_bbdd_format = preg_replace("/[^a-zA-Z0-9\_\-]+/", '',iconv('UTF-8', 'ASCII//TRANSLIT', $nombre_bbdd_format));
	                    
	                    // Concatenamos y guardamos el nombre del niño y el DNI del tutor de la BBDD formateados
	                    $nombre_bbdd_y_dnitutor = $nombre_bbdd_format."-".$registro['dni'];
	                    
	                    // Comprobamos si el nuevo registro ya existe en la BBDD para mostrar mensaje
	                    if (strcasecmp ($nombre_bbdd_y_dnitutor, $nombre_ninyo_y_dnitutor) == 0) {
	                        //Según strcasecmp las dos cadenas son iguales

	                        echo "<script text='javascript' charset='utf-8'>
	                                alert('Lo sentimos pero ya se había inscrito anteriormente. \\nSi tiene que realizar más gestiones, póngase en contacto con recepción de l´Alqueria en el teléfono 961 215 543. ¡Gracias!');
	                                window.location.replace('?r=index/principal');
	                            </script>";
	                        die;
	                    }
                	}



					// Configuramos carpeta de guardado de imágenes
					$dir_subida = 'img/voluntarios/';

					if ($_FILES['certificado']['error'] == 0) {
						// Damos formato al nombre de la imagen 1
						$fichero1 		= $nombre_y_apellidos_format."-".date("d-m-Y-H-i-s").".".$extension;
						$ficherosubido1 = $dir_subida . $fichero1;

						// Guardamos la imagen 1 (si corresponde) en la carpeta del servidor
						move_uploaded_file($_FILES['certificado']['tmp_name'], $ficherosubido1);
					}
					else {
						$ficherosubido1 = "";
					}

					

					
                	$enviar = $_POST['enviar'];
                	
	                if ($enviar=="oficina") {

	                  
	                    $nuevoformulario = voluntarios::newFormVoluntario($fecharegistro,  $nombre, $apellidos, $fechanacimiento, $dni,  $ficherosubido1,  $direccion,  $cp, $provincia, $poblacion, $telefono, $email, $autorizodatos, $autorizoimagen, $evento, $horario, $ambito, $lugar, $fechadesde, $fechahasta );
	                    
	                    if($nuevoformulario){
	                      // header('Location: http://localhost/serviciosalqueria/?r=voluntarios/Ok&codigo=' . $dni);
	                       header('Location: https://servicios.alqueriadelbasket.com/?r=voluntarios/Ok&codigo=' . $dni);
	                    }
	                    else{
	                        echo "<script text='javascript' charset='utf-8'> alert('Parece que hubo un error, inténtelo de nuevo más tarde.');
	                                window.location.replace('?r=index/principal'); </script>";
	                        die;
	                    }
	                }


					
				

				}            
            // Si ha nacido fuera del rango de años permitido, mostramos mensaje de prohibición
            	else {
                echo "<script text='javascript' charset='utf-8'>
                        alert('Lo sentimos pero el solicitante debe tener más de 18 años para ser voluntario. ¡Gracias por contar con nosotros!');
                        window.location.replace('?r=index/Principal'); </script>";
                die;
            	}

			}
		}






		public function actionImprimirFichaVoluntario() {

			 require "models/voluntarios.php";
           
            // Recogemos la variable "numeropedido" de la URL para pasársela al modelo e incluirla en el cuerpo del HTML
            $id = $_GET['numeropedido'];

            $seccioninscripcion = "Solicitud de inscripción como voluntario para la Minicopa 19/20";

            // Recogemos todos los datos del registro pasándole el número de pedido
            $contenidocorreo = voluntarios::damedatosvoluntarioporid($id);

            $contenidocorreo['fechanacimiento'] = date("d/m/Y", strtotime($contenidocorreo['fechanacimiento']));

			$contenido =
			"Nombre y apellidos: ".$contenidocorreo['nombre']." ".$contenidocorreo['apellidos'].
			"<br>Fecha de nacimiento: ".$contenidocorreo['fechanacimiento'].
			"<br>DNI: ".$contenidocorreo['dni'].
			"<br>Telefono: ".$contenidocorreo['telefono'].
			"<br>Correo electrónico: ".$contenidocorreo['email'].
			"<br>Evento: ".$contenidocorreo['evento'].
			"<br>Lugar: ".$contenidocorreo['lugar'].
			"<br>Ambito: ".$contenidocorreo['ambito'].
			"<br>Fechas: ".$contenidocorreo['fecahev_desde']." / ".$contenidocorreo['fechaev_hasta'].
			"<br>Horario: ". $contenidocorreo['horario'];
			

            // Creamos todo el cuerpo de la vista en HTML
            $body = '
            <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                <html xmlns="https://www.w3.org/1999/xhtml">
                    <head>
                        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                        <title>L´Alqueria del Basket</title>
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    </head>
                    <body style="margin: 0; padding: 0;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td style="padding: 20px 0 30px 0;">
                                    <!--[if (gte mso 9)|(IE)]>
                                    <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <td>
                                    <![endif]-->

                                    <table width="600" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                        <tr>
                                            <td align="center" bgcolor="#000000" style="padding: 15px 0 15px 0;">
                                                <a href="https://servicios.alqueriadelbasket.com" target="_blank">
                                                    <img src="https://servicios.alqueriadelbasket.com/img/logos-cabecera-email.png" alt="Alqueria del Basket" width="547" height="81" style="display: block;">
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td bgcolor="#ffffff" style="padding: 30px 25px 30px 25px;">
                                                <h3 style="color: #eb7c00; border-bottom: #eb7c00 2px solid;">'.$seccioninscripcion.'</h3>
                                                <p><strong>Estos son los datos recibidos relacionados con su solicitud.</strong></p>
                                                <p><strong>Número de solicitud:</strong> '.$id.'</p>
                                                <p>'.$contenido.'</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td bgcolor="#424241" style="padding: 20px 30px 20px 30px">
                                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                    <tr>
                                                        <td width="75%" style="font-family: Arial, sans-serif; line-height: 18px; font-size: 12px;">
                                                            <span style="color: #eb7c00;">&copy; L´Alqueria del Basket 2020</span><br>
                                                            <span style="color: #ffffff;">C/ Bomber Ramon Duart S/N 46013, València</span><br>
                                                            <span style="color: #ffffff;">+34 96 121 55 43</span>
                                                        </td>
                                                        <td width="25%" align="right">
                                                            <table border="0" cellpadding="0" cellspacing="0">
                                                                <tr>
                                                                    <td>
                                                                        <a href="https://www.facebook.com/LAlqueriaVBC" target="_blank">
                                                                            <img src="https://servicios.alqueriadelbasket.com/img/logo-facebook.png" alt="Facebook L´Alqueria del VBC" width="32" height="32" style="display: block;" border="0">
                                                                        </a>
                                                                    </td>
                                                                    <td style="font-size: 0; line-height: 0;" width="10%">&nbsp;</td>
                                                                    <td>
                                                                        <a href="https://twitter.com/LAlqueriaVBC" target="_blank">
                                                                            <img src="https://servicios.alqueriadelbasket.com/img/logo-twitter.png" alt="Twitter L´Alqueria del VBC" width="32" height="32" style="display: block;" border="0">
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <!--[if (gte mso 9)|(IE)]>
                                            </td>
                                        </tr>
                                    </table>
                                    <![endif]-->
                                </td>
                            </tr>
                        </table>
                    </body>
                </html>';

            echo "<pre>";
            echo $body;
            echo "</pre>";
		}	


		public function actionExportToExcelVoluntarios()
		{

			require "models/voluntarios.php";

			$datos['inscripciones'] = voluntarios::findAllInscripcionesExcelvoluntarios();


			if(isset($_POST["export_data"])) {
				$filename = "Voluntarios".date('Ymd') . ".xls";
				header('Content-Encoding: UTF-8');
				header('Content-Type: text/html; charset=utf-16');
           // header("Content-Type: application/vnd.ms-excel");
				header("Content-Type: application/vnd.ms-excel; charset=utf-16");
				header("Content-Disposition: attachment; filename=".$filename."");
				header('Cache-Control: max-age=0');
				$show_coloumn = false;
				if(!empty($datos['inscripciones'])) {

					foreach($datos['inscripciones'] as $inscripcion) {

						if(!$show_coloumn) {
                          // display field/column names in first row
							echo implode("\t", array_keys($inscripcion)) . "\r\n";
							$show_coloumn = true;
						}
                   // echo implode("\t", array_values($inscripcion)) . "\r\n";
						echo implode("\t", array_values($inscripcion)) . "\r\n";
                       // iconv("UTF-8", "ISO-8859-1//TRANSLIT", $alumno['nombre']),
					}
				}
				exit;
			}
		}




	}
?>