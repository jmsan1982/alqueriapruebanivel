<?php
	class escuelafallasController {

		public function actionOk() {
			require "models/escuela_fallas.php";

			$codigo = $_GET['codigo'];

			$pagado = 1;

			$actualizaestado = escuela_fallas::actualizapagadoEscuelaFallasOnline($codigo, $pagado);

			$contenidocorreo = escuela_fallas::damedatosEscuelaFallas($codigo);


			if($contenidocorreo['opcion']=="Dias sueltos"){

				$opcion=$contenidocorreo['diassueltos'];
			}
			else{

				$opcion=$contenidocorreo['opcion'];
			}
		

			$contenidocorreo['fechanacimiento'] = date("d/m/Y", strtotime($contenidocorreo['fechanacimiento']));

			$contenido =
			"<br><br><b>-Inscripcion en I Escuela de Fallas 2021 nº: </b>".$contenidocorreo['numeropedido'].
			"<br>Nombre y apellidos: ".$contenidocorreo['nombre']." ".$contenidocorreo['apellidos'].
			"<br>Fecha de nacimiento: ".$contenidocorreo['fechanacimiento'].
			"<br>Genero: ".$contenidocorreo['genero'].
			"<br>DNI: ".$contenidocorreo['dni'].
			"<br>Opcion: " . $opcion .
			"<br>Importe: ".$contenidocorreo['importe'].
			"<br>Pago: ".$contenidocorreo['tipopago'].
			"<br>Club: ".$contenidocorreo['club'].
			"<br>Observaciones: ".$contenidocorreo['aspectomedico'].
			"<br>¿Ha tenido fiebre, tos, diarrea, dificultad respiratoria durante los últimos 15 días? ".$contenidocorreo['sintomascovid'].
			"<br>¿Alguno de tus convivientes ha sido diagnosticado de coronavirus este último mes? ".$contenidocorreo['familiarcovid'].
			"<br>Nombre y apellidos tutor/a: ".$contenidocorreo['nombretutor']." ".$contenidocorreo['apellidostutor'].
			"<br>DNI del tutor/a: ". $contenidocorreo['dnitutor'].
			"<br>Dirección: ". $contenidocorreo['direccion']." num: ".$contenidocorreo['numero'].", ".$contenidocorreo['piso'].", ".$contenidocorreo['puerta']." cp: ".$contenidocorreo['cp'].", ".$contenidocorreo['poblacion'].", ".$contenidocorreo['provincia'].
			"<br>Teléfono del tutor/a: ". $contenidocorreo['telefonotutor'].
			"<br>Correo electrónico: ".$contenidocorreo['emailtutor'].
			"<br>Opción de pago: ". $contenidocorreo['tipopago'];


			$enviodecorreo = escuela_fallas::mailsSendEscuelaFallas($contenidocorreo['numeropedido'], $contenido, "Ficha inscripción pago online Escuela de Fallas de L´Alqueria", $contenidocorreo['emailtutor']);

			if ($enviodecorreo) {
				vistaSimple("layout_ok_pdf");
			}
			else {
				vistaSimple("layout_kocorreo");
			}
		}


		public function actionOkpagoOficina() {
			require "models/escuela_fallas.php";

			$codigo = $_GET['pedido'];


			$contenidocorreo = escuela_fallas::damedatosEscuelaFallas($codigo);


			if($contenidocorreo['opcion']=="Dias sueltos"){

				$opcion=$contenidocorreo['diassueltos'];
			}
			else{

				$opcion=$contenidocorreo['opcion'];
			}


			$contenidocorreo['fechanacimiento'] = date("d/m/Y", strtotime($contenidocorreo['fechanacimiento']));

			$contenido =
			"<br><br><b>-Inscripcion en I Escuela de Fallas 2021 nº: </b>".$contenidocorreo['numeropedido'].
			"<br>Nombre y apellidos: ".$contenidocorreo['nombre']." ".$contenidocorreo['apellidos'].
			"<br>Fecha de nacimiento: ".$contenidocorreo['fechanacimiento'].
			"<br>Genero: ".$contenidocorreo['genero'].
			"<br>DNI: ".$contenidocorreo['dni'].
			"<br>Opcion: " . $opcion .
			"<br>Importe: ".$contenidocorreo['importe'].
			"<br>Pago: ".$contenidocorreo['tipopago'].
			"<br>Club: ".$contenidocorreo['club'].
			"<br>Observaciones: ".$contenidocorreo['aspectomedico'].
			"<br>¿Ha tenido fiebre, tos, diarrea, dificultad respiratoria durante los últimos 15 días? ".$contenidocorreo['sintomascovid'].
			"<br>¿Alguno de tus convivientes ha sido diagnosticado de coronavirus este último mes? ".$contenidocorreo['familiarcovid'].
			"<br>Nombre y apellidos tutor/a: ".$contenidocorreo['nombretutor']." ".$contenidocorreo['apellidostutor'].
			"<br>DNI del tutor/a: ". $contenidocorreo['dnitutor'].
			"<br>Dirección: ". $contenidocorreo['direccion']." num: ".$contenidocorreo['numero'].", ".$contenidocorreo['piso'].", ".$contenidocorreo['puerta']." cp: ".$contenidocorreo['cp'].", ".$contenidocorreo['poblacion'].", ".$contenidocorreo['provincia'].
			"<br>Teléfono del tutor/a: ". $contenidocorreo['telefonotutor'].
			"<br>Correo electrónico: ".$contenidocorreo['emailtutor'];
			

			$enviodecorreo = escuela_fallas::mailsSendEscuelaFallas($contenidocorreo['numeropedido'], $contenido, "Ficha inscripción pago transferencia Escuela Fallas 2021 de L´Alqueria", $contenidocorreo['emailtutor']);

			if ($enviodecorreo) {
				 vistaSimple("layout_ok_pago_oficina_pdf");
			}
			else {
				vistaSimple("layout_kocorreo");
			}
		}


		public function actionKo() {
			//require "config.php";

			require "models/escuela_fallas.php";

			$pedido = $_GET['codigo'];
			$error = $_GET['error'];

			$actualizaestado = escuela_fallas::actualizaerrortpvescuelaFallas($pedido, $error);



			vistaSimple("layout_ko");
		}


		public function actionImprimirPdf(){

			require "models/escuela_fallas.php";
			require "fpdf/fpdf_pdf.php";

			$codigo = $_GET['pedido'];


			$contenidocorreo = escuela_fallas::damedatosEscuelaFallas($codigo);


			if($contenidocorreo['opcion']=="Dias sueltos"){

				$opcion=$contenidocorreo['diassueltos'];
			}
			else{

				$opcion=$contenidocorreo['opcion'];
			}

			$contenidocorreo['fechanacimiento'] = date("d/m/Y", strtotime($contenidocorreo['fechanacimiento']));

			$contenido = "<b>Estos son los datos recibidos relacionados con su inscripción. </b>".
                "<br><br><b>-Inscripcion en Escuela de Fallas 2021 nº: </b>".$contenidocorreo['numeropedido'].
			"<br><b>-Nombre y apellidos: </b>".$contenidocorreo['nombre']." ".$contenidocorreo['apellidos'].
			"<br><b>-Fecha de nacimiento: </b>".$contenidocorreo['fechanacimiento'].
			"<br><b>-Genero: </b>".$contenidocorreo['genero'].
			"<br><b>-DNI: </b>".$contenidocorreo['dni'].
			"<br><b>-Opcion: </b>" . $opcion .
			"<br><b>-Importe: </b>".$contenidocorreo['importe'].
			"<br><b>-Pago: </b>".$contenidocorreo['tipopago'].
			"<br><b>-Club: </b>".$contenidocorreo['club'].
			"<br><br><b>-Observaciones: </b>".$contenidocorreo['aspectomedico'].
			"<br><b>-¿Ha tenido fiebre, tos, diarrea, dificultad respiratoria durante los últimos 15 días? </b>".$contenidocorreo['sintomascovid'].
			"<br><b>-¿Alguno de tus convivientes ha sido diagnosticado de coronavirus este último mes? </b>".$contenidocorreo['familiarcovid'].
			"<br><br><b>-Nombre y apellidos tutor/a: </b>".$contenidocorreo['nombretutor']." ".$contenidocorreo['apellidostutor'].
            "<br><b>-DNI tutor: </b>".$contenidocorreo['dnitutor'].
            "<br><b>-Dirección: </b>". $contenidocorreo['direccion']." num: ".$contenidocorreo['numero'].", ".$contenidocorreo['piso'].", ".$contenidocorreo['puerta']." cp: ".$contenidocorreo['cp'].", ".$contenidocorreo['poblacion'].", ".$contenidocorreo['provincia'].
            "<br><b>-Teléfono del tutor/a: </b>". $contenidocorreo['telefonotutor'].
			"<br><b>-Correo electrónico: </b>".$contenidocorreo['emailtutor'].
			
			"<br><br>En cumplimiento de Ley Orgánica 3/2018, de 5 de diciembre, de Protección de Datos Personales y garantía de los derechos digitales y el reglamento (UE) 2016/679 del parlamento europeo y del consejo de 27 de abril de 2016, se le informa que los datos personales que nos ha facilitado serán (o han sido) incorporados a un registro de actividades titularidad de FUNDACION VALENCIA BASKET 2000 Con CIF G96614474 y cuyas finalidades son; la gestión integral de nuestra escuela de baloncesto y el mantenerle informado de las próximas novedades y actividades de la Fundación. <br> Acepto que FUNDACIÓ VALENCIA BASQUET 2000 comunique los datos facilitados a VALENCIA BASKET CLUB SAD para que me mantenga informado sobre productos, servicios o promociones relacionadas con el sector del baloncesto que pudieran ser de mi interés por cualquier medio, incluido el electrónico. <br> Acepto que  el FUNDACIÓ VALENCIA BASQUET 2000 trate la imagen del participante en la actividad, parcial o total, en cualquier soporte grafico o visual (fotografía, video o similar) para su uso en los medios de difusión presentes y futuros de la FUNDACIÓ VALENCIA BASQUET 2000 y/o el VALENCIA BASKET CLUB, SAD (web, folletos, revistas del club, campeonatos, redes sociales, etc.) <br> Se le informa también que puede ejercer los derechos de acceso, rectificación, supresión, portabilidad, limitación de tratamiento, cancelación y, en su caso, oposición, enviando una solicitud por escrito acompañada de la fotocopia de su DNI a la siguiente dirección: BOMBER RAMON DUART, S/N, 46013, VALENCIA o a través de  valencia.basket@valenciabasket.com  así como reclamar ante la Agencia Española de Protección de Datos (www.agpd.es ) cuando el interesado considere que VALENCIA BASKET CLUB SAD ha vulnerado los derechos que le son reconocidos por la normativa aplicable en protección de datos.";

            $pdf = new PDF();
            $pdf->AddPage();
            $pdf->SetFont('Arial','',12);
            $pdf->Header();
            $pdf->WriteHTML($contenido);
            $pdf->Footer();
            $pdf->Output();
		}


		// Hace una nueva inscripción en Escuela de Fallas de L´alqueria
        // Comentado abajo el if ($ficherosubido2!="") y su else, para que puedan registrar los de Alqueria, desde "layout_escuela_fallas_admin.php", sin subir resguardo bancario
		public function actionEscuelaFallasForm() {
 			if (isset($_POST['nombre'])) {

				require "models/escuela_fallas.php";

				 //Guardamos fecha nacimiento y fecha límite
            	$nacio = DateTime::createFromFormat('Y-m-d', $_POST['fechanacimiento']);
            	$fechalimite = DateTime::createFromFormat('Y-m-d', "2021-12-31");

            	//Calculamos usando diff y la fecha límite
            	$calculo = $nacio->diff($fechalimite);

           		 //Obtenemos la edad
            	$edad = $calculo->y;   

            	// Si ha nacido dentro del rango de años permitido, seguimos...
            	if ($edad >= 6 && $edad <= 14) {

					$fecharegistro= date("Y-m-d");

					//validacion Dias sueltos
               		$textoDiasSueltos ="";
                	$opcion ="";
                	$importe=0;

	                if ($_POST['opcion']=="solomanyana")
	                {
	                    $importe=50;
	                    $opcion="Mañanas";
	                }
	                elseif($_POST['opcion']=="diacompleto"){
	                    $importe=80;
	                    $opcion="Dia completo";
	                }
	                elseif($_POST['opcion']=="sueltos"){
	                    $importe=0;
	                    $opcion="Dias sueltos";
	                   
	                    if (isset($_POST['dia1'])) {  
	                        if ($_POST['rdia1']=="dia16-manyana") {
	                            $importe=$importe +18;
	                            $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia1'];
	                        }else{
	                            $importe=$importe +30;
	                            $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia1'];
	                        }
	                    }
	                    
	                    if (isset($_POST['dia2'])) {
	                     	if ($_POST['rdia2']=="dia17-manyana") {
	                            $importe=$importe +18;
	                            $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia2'];
	                        }else{
	                            $importe=$importe +30;
	                            $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia2'];
	                        }
	                     
	                    }
	                    

	                   if (isset($_POST['dia3'])) {
	                     	if ($_POST['rdia3']=="dia18-manyana") {
	                            $importe=$importe +18;
	                            $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia3'];
	                        }else{
	                            $importe=$importe +30;
	                            $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia3'];
	                        }
	                     
	                    }
	                    
	                    /*if (isset($_POST['dia4'])) {
	                     	if ($_POST['rdia4']=="dia29-manyana") {
	                            $importe=$importe +18;
	                            $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia4'];
	                        }else{
	                            $importe=$importe +30;
	                            $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia4'];
	                        }
	                     
	                    }

	                    if (isset($_POST['dia5'])) {
	                     	if ($_POST['rdia5']=="dia30-manyana") {
	                            $importe=$importe +18;
	                            $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia5'];
	                        }else{
	                            $importe=$importe +30;
	                            $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia5'];
	                        }
	                     
	                    }

	                    if (isset($_POST['dia6'])) {
	                     	if ($_POST['rdia6']=="dia31-manyana") {
	                            $importe=$importe +18;
	                            $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia6'];
	                        }else{
	                            $importe=$importe +30;
	                            $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia6'];
	                        }
	                     
	                    }

	                    if (isset($_POST['dia7'])) {
	                     	if ($_POST['rdia7']=="dia4-manyana") {
	                            $importe=$importe +18;
	                            $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia7'];
	                        }else{
	                            $importe=$importe +30;
	                            $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia7'];
	                        }
	                     
	                    }

	                    if (isset($_POST['dia8'])) {
	                     	if ($_POST['rdia8']=="dia5-manyana") {
	                            $importe=$importe +18;
	                            $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia8'];
	                        }else{
	                            $importe=$importe +30;
	                            $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia8'];
	                        }
	                     
	                    }*/


	                }


					$categoria 			= $_POST['categoria'];
					$nombre 			= $_POST['nombre'];
					$apellidos 			= $_POST['apellidos'];
					$fechanacimiento 	= $_POST['fechanacimiento'];
					$genero 			= $_POST['genero'];
					$dni 				= $_POST['dni'];

					// Quitamos los guiones
					$dni = str_replace("-", "", $dni);
					// Quitamos los espacios
					$dni = str_replace(" ", "", $dni);
					// Quitamos los puntos
					$dni = str_replace(".", "", $dni);

					$club 				= $_POST['club'];
					$aspectomedico 		= $_POST['aspectomedico'];

					$sintomasc 			= $_POST['sintomascovid'];
					$familiarc 		    = $_POST['familiarcovid'];

					$nombretutor 		= $_POST['nombretutor'];
					$apellidostutor 	= $_POST['apellidostutor'];
					$dnitutor 			= $_POST['dnitutor'];

					// Quitamos los guiones
					$dnitutor = str_replace("-", "", $dnitutor);
					// Quitamos los espacios
					$dnitutor = str_replace(" ", "", $dnitutor);
					// Quitamos los puntos
					$dnitutor = str_replace(".", "", $dnitutor);

					$direccion 			= $_POST['direccion'];
					$numero 			= $_POST['numero'];
					$piso 				= $_POST['piso'];
					$puerta 			= $_POST['puerta'];
					$cp 				= $_POST['cp'];
					$provincia 			= $_POST['provincia'];
					$poblacion 			= $_POST['poblacion'];
					$telefonotutor 		= $_POST['telefonotutor'];
					$emailtutor 		= $_POST['emailtutor'];

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



	                /* Formateo Nombre Imagen SIP */

	                // explode: parte en trozos el string cada vez que encuentre el signo de puntuación "."

	                $valores = explode(".", $_FILES['fotocopiasip']['name']);

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
	                $nombre_ninyo_y_dnitutor = $nombre_format."-".$dnitutor;


					 /* Comprobamos si el registro ya existe en la BBDD antes de seguir */
                	$todoslosregistros = escuela_fallas::comprobarRepetidos();
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
	                    $nombre_bbdd_y_dnitutor = $nombre_bbdd_format."-".$registro['dnitutor'];
	                    
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
					$dir_subida = 'img/inscripcionesescuelafallas/';

					if ($_FILES['fotocopiasip']['error'] == 0) {
						// Damos formato al nombre de la imagen 1
						$fichero1 		= $nombre_y_apellidos_format."-".date("d-m-Y-H-i-s").".".$extension;
						$ficherosubido1 = $dir_subida . $fichero1;

						// Guardamos la imagen 1 (si corresponde) en la carpeta del servidor
						move_uploaded_file($_FILES['fotocopiasip']['tmp_name'], $ficherosubido1);
					}
					else {
						$ficherosubido1 = "";
					}


					//Formateo Nombre Imagen del resguardo de transferencia
                    //Explode: parte en trozos el string cada vez que encuentre el signo de puntuación "."
                    $valores2        = explode(".", $_FILES['resguardoingreso']['name']);
                    // Guardamos la extensión original del archivo subido
                    $extension_resg      = $valores2[count($valores2)-1];
					if ($_FILES['resguardoingreso']['error'] == 0) {
						// Damos formato al nombre de la imagen 2
						$fichero2       = $dnitutor . "-R-".date("d-m-Y-H-i-s").".".$extension_resg;
						$ficherosubido2 = $dir_subida . $fichero2;

						// Guardamos la imagen 2 (si corresponde) en la carpeta del servidor //
						move_uploaded_file($_FILES['resguardoingreso']['tmp_name'], $ficherosubido2);
					}
					else {
						$ficherosubido2 = "";
					}


					
					$nombreapellidos = $nombre." ".$apellidos;

					$ultimopedido = escuela_fallas::findLastNumeroPedidoEscuelaFallas();

                	$numeropedido = $ultimopedido['MAX(id)'];

                	$numeropedido = $numeropedido + 1;

                	$numeropedido = str_pad($numeropedido, 5, "0", STR_PAD_LEFT);

                	$numeropedido = $numeropedido . "efal21";

                	//echo $numeropedido;
                	//die;

                	$enviar = $_POST['enviar'];
                	$pagado=0;


					 /* Controlamos si se va a pagar con tarjeta o en oficinas  */
	                if ($enviar=="tarjeta") {

	                    $tipopago="ONLINE";
	                    $nuevoformulario = escuela_fallas::newFormEscuelaFallas($fecharegistro, $categoria, $opcion, $textoDiasSueltos, $nombre, $apellidos, $fechanacimiento, $dni, $club, $aspectomedico, $ficherosubido1, $ficherosubido2, $nombretutor, $apellidostutor, $dnitutor, $direccion, $numero, $piso, $puerta, $cp, $provincia, $poblacion, $telefonotutor, $emailtutor, $autorizodatos, $autorizoimagen, $pagado, $tipopago, $numeropedido,$importe, $sintomasc, $familiarc, $genero);
	                    
	                    if ($nuevoformulario) {
	                        header('Location: https://servicios.alqueriadelbasket.com/tpv_escuelafallas/tpv.php?pedido=' . $numeropedido . '&titular=' . $nombreapellidos . '&importe=' . $importe);
	                        //header('Location: http://localhost/serviciosalqueria/tpv_escuelafallas/tpv.php?pedido=' . $numeropedido . '&titular=' . $nombreapellidos . '&importe=' . $importe);
	                    }
	                    else {
	                        echo "<script text='javascript' charset='utf-8'> alert('Parece que hubo un error, inténtelo de nuevo más tarde.');
	                                window.location.replace('?r=index/principal'); </script>";
	                        die;
	                    }
	                }elseif ($enviar=="oficina"){

	                	//if ($ficherosubido2!="") {
		                    $tipopago="TRANSFERENCIA";
		                    $nuevoformulario = escuela_fallas::newFormEscuelaFallas($fecharegistro, $categoria, $opcion, $textoDiasSueltos, $nombre, $apellidos, $fechanacimiento, $dni, $club, $aspectomedico, $ficherosubido1, $ficherosubido2, $nombretutor, $apellidostutor, $dnitutor, $direccion, $numero, $piso, $puerta, $cp, $provincia, $poblacion, $telefonotutor, $emailtutor, $autorizodatos, $autorizoimagen, $pagado, $tipopago, $numeropedido,$importe, $sintomasc, $familiarc, $genero);
		                    
		                    if($nuevoformulario){
		                      // header('Location: http://localhost/serviciosalqueria3/?r=escuelafallas/okpagooficina&pedido=' . $numeropedido);
		                      header('Location: https://servicios.alqueriadelbasket.com/?r=escuelafallas/okpagooficina&pedido=' . $numeropedido);
		                    }
		                    else{
		                        echo "<script text='javascript' charset='utf-8'> alert('Parece que hubo un error, inténtelo de nuevo más tarde.');
		                                window.location.replace('?r=index/principal'); </script>";
		                        die;
		                    }

		                /*}
		                else{
		                        echo "<script text='javascript' charset='utf-8'> alert('Debe adjuntar el justificante del ingreso bancario'); </script>";
		                                
		                    }*/

	                }


					
				

				}            
            // Si ha nacido fuera del rango de años permitido, mostramos mensaje de prohibición
            	else {
                echo "<script text='javascript' charset='utf-8'>
                        alert('Lo sentimos pero el niño/a debe haber nacido entre el 2007 y 2015 para participar en la escuela. ¡Gracias por contar con nosotros!');
                        window.location.replace('?r=index/Principal'); </script>";
                die;
            	}

			}
		}



		public function actionDardeBajaEscuelaFallas()
    	{

	        if (isset($_POST['id'])) {

	            $codigo = $_POST['id'];

	            echo "<div style='width:100%;height:100%;background-color: rgba(0,0,0,.8);padding-top:10%;'>
							<div class='contact-form-wrapper' style='width:50%;margin-left:25%;background-color:white;border:1px solid #000000;border-radius: 10px 10px 10px 10px;padding:25px;'>
								<form action='?r=escuelafallas/DardeBajaEscuelaFallas' method='post'>
									<p style='text-align:center;font-size:150%;'> ¿ESTÁ SEGURO QUE DESEA DAR DE BAJA ESTE REGISTRO? </p>
									<div style='text-align:center;'>
										<input class='btn btn-danger btn-lg' type='submit' name='confirm' value='SI' style='float:left;'>
										<input class='btn btn-info btn-lg' type='submit' name='confirm' value='NO' style='float: right;'>
									</div>
									<input type='hidden' name='id_validado' value='" . $codigo . "'>
								</form>
							</div>
						</div>";
	            die;
	        }

	        if (isset($_POST['confirm'])) {

	            if ($_POST['confirm'] == "SI") {
	                require "models/escuela_fallas.php";

	                $pedido = $_POST['id_validado'];

	                $baja_reg = escuela_fallas::DardeBajaEscuelaFallas($pedido);
	            }
	            if ($_POST['confirm'] == "NO") {
	                echo "<script text='javascript'> window.location.replace('?r=escuelafallas/BackEscuelaFallas'); </script>";
	            }
	        } else {
	            require "error.php";
	        }
    	}



		public function actionImprimirFichaEscuelaFallas() {

			// Comprobamos que el usuario tiene algún rol de administrador para continuar
			if (isset($_SESSION['usuario']) && ($_SESSION['rolusuario'] == "admin" || $_SESSION['rolusuario'] == "superadmin")) {

				require "models/escuela_fallas.php";


				// Recogemos la variable "tipopago" de la URL para incluirla en el cuerpo del HTML
				$tipopago = $_GET['tipopago'];

				
				$seccioninscripcion = "Ficha inscripción I Escuela de Fallas de L´Alqueria";
				

				// Recogemos la variable "numeropedido" de la URL para pasársela al modelo e incluirla en el cuerpo del HTML
				$numero = $_GET['numeropedido'];

				// Recogemos todos los datos del registro pasándole el número de pedido
				$contenidocorreo = escuela_fallas::damedatosEscuelaFallas($numero);


				if($contenidocorreo['opcion']=="Dias sueltos"){

					$opcion=$contenidocorreo['diassueltos'];
				}
				else{

					$opcion=$contenidocorreo['opcion'];
				}


			

				$contenidocorreo['fechanacimiento'] = date("d/m/Y", strtotime($contenidocorreo['fechanacimiento']));

				$contenido =
				"<br><br><b>-Inscripcion en I Escuela de Fallas 2021 nº: </b>".$contenidocorreo['numeropedido'].
				"<br>-Nombre y apellidos: ".$contenidocorreo['nombre']." ".$contenidocorreo['apellidos'].
				"<br>-Fecha de nacimiento: ".$contenidocorreo['fechanacimiento'].
				"<br>-Genero: ".$contenidocorreo['genero'].
				"<br>-DNI: ".$contenidocorreo['dni'].
				"<br>-Opcion: " . $opcion .
				"<br>-Importe: ".$contenidocorreo['importe'].
				"<br>-Pago: ".$contenidocorreo['tipopago'].
				"<br>-Club: ".$contenidocorreo['club'].
				"<br><br>-Observaciones: ".$contenidocorreo['aspectomedico'].
				"<br>-¿Ha tenido fiebre, tos, diarrea, dificultad respiratoria durante los últimos 15 días? ".$contenidocorreo['sintomascovid'].
				"<br>-¿Alguno de tus convivientes ha sido diagnosticado de coronavirus este último mes? ".$contenidocorreo['familiarcovid'].
				"<br><br>-Nombre y apellidos tutor/a: ".$contenidocorreo['nombretutor']." ".$contenidocorreo['apellidostutor'].
				"<br>-DNI tutor: ".$contenidocorreo['dnitutor'].
				"<br>-Dirección: ". $contenidocorreo['direccion']." num: ".$contenidocorreo['numero'].", ".$contenidocorreo['piso'].", ".$contenidocorreo['puerta']." cp: ".$contenidocorreo['cp'].", ".$contenidocorreo['poblacion'].", ".$contenidocorreo['provincia'].
				"<br>-Teléfono del tutor/a: ". $contenidocorreo['telefonotutor'].
				"<br>-Correo electrónico: ".$contenidocorreo['emailtutor'].
				"<br><br>En cumplimiento de Ley Orgánica 3/2018, de 5 de diciembre, de Protección de Datos Personales y garantía de los derechos digitales y el reglamento (UE) 2016/679 del parlamento europeo y del consejo de 27 de abril de 2016, se le informa que los datos personales que nos ha facilitado serán (o han sido) incorporados a un registro de actividades titularidad de FUNDACION VALENCIA BASKET 2000 Con CIF G96614474 y cuyas finalidades son; la gestión integral de nuestra escuela de baloncesto y el mantenerle informado de las próximas novedades y actividades de la Fundación. <br> Acepto que FUNDACIÓ VALENCIA BASQUET 2000 comunique los datos facilitados a VALENCIA BASKET CLUB SAD para que me mantenga informado sobre productos, servicios o promociones relacionadas con el sector del baloncesto que pudieran ser de mi interés por cualquier medio, incluido el electrónico. <br> Acepto que  el FUNDACIÓ VALENCIA BASQUET 2000 trate la imagen del participante en la actividad, parcial o total, en cualquier soporte grafico o visual (fotografía, video o similar) para su uso en los medios de difusión presentes y futuros de la FUNDACIÓ VALENCIA BASQUET 2000 y/o el VALENCIA BASKET CLUB, SAD (web, folletos, revistas del club, campeonatos, redes sociales, etc.) <br> Se le informa también que puede ejercer los derechos de acceso, rectificación, supresión, portabilidad, limitación de tratamiento, cancelación y, en su caso, oposición, enviando una solicitud por escrito acompañada de la fotocopia de su DNI a la siguiente dirección: BOMBER RAMON DUART, S/N, 46013, VALENCIA o a través de  valencia.basket@valenciabasket.com  así como reclamar ante la Agencia Española de Protección de Datos (www.agpd.es ) cuando el interesado considere que VALENCIA BASKET CLUB SAD ha vulnerado los derechos que le son reconocidos por la normativa aplicable en protección de datos.";


				// Creamos todo el cuerpo del PDF en HTML
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
														<img src="https://servicios.alqueriadelbasket.com/img/logos-cabecera-email.png" 
														alt="Alqueria del Basket" width="547" height="81" style="display: block;">
													</a>
												</td>
											</tr>
											<tr>
												<td bgcolor="#ffffff" style="padding: 30px 25px 30px 25px;">
													<h3 style="color: #eb7c00; border-bottom: #eb7c00 2px solid;">'.$seccioninscripcion.'</h3>
													<p><strong>Estos son los datos recibidos relacionados con su inscripción.</strong></p>
													<p><strong>Número de pedido:</strong> '.$numero.'</p>
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
			else {
				require('error.php');
			}
		}


		public function actionMostrarModalEscuelaFallas()
	    {
	        //error_log(__FILE__.__FUNCTION__.__LINE__);
	        //error_log(print_r($_POST,1));

	        $idinscripcion = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

	        //error_log("inscrpcion campus verano vb: ".$idinscripcion);

	        if (!empty($idinscripcion)) {
	            require "models/escuela_fallas.php";
	            require "includes/Utils.php";

	            $datos = escuela_fallas::findDatosEscuelaFallasById($idinscripcion);
	            $alerta_cuenta = "";

	            echo json_encode(array(
	                "response" => "success",
	                "instancia" => $datos,
	                "modal_title" => "Formulario de inscripción en Escuela Fallas",
	                "message" => "Los datos de la inscripción se han cargado correctamente.",
	                "alerta_cuenta" => $alerta_cuenta));
	            die;
	        } else {
	            echo json_encode(array(
	                "response" => "error",
	                "instancia" => "",
	                "modal_title" => "Error",
	                "message" => "Parece que ha habido algún error"));
	            die;
	        }
	    }


	    public function actionUpdateInscripcionModalEscuelaFallas()
    	{
//            error_log(__FILE__.__FUNCTION__.__LINE__);
//            error_log(print_r($_POST,1));
//            error_log(print_r($_FILES,1));
//            die;

        require "models/escuela_fallas.php";

        $idinscripcion = filter_input(INPUT_POST, 'idinscripcion', FILTER_SANITIZE_NUMBER_INT);

        $dnijugador = filter_input(INPUT_POST, 'dnijugador', FILTER_SANITIZE_STRING);
        $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
        $apellidos = filter_input(INPUT_POST, 'apellidos', FILTER_SANITIZE_STRING);
        $fechanac = filter_input(INPUT_POST, 'fechanac', FILTER_SANITIZE_STRING);
        $club = filter_input(INPUT_POST, 'club', FILTER_SANITIZE_STRING);
        $genero = filter_input(INPUT_POST, 'genero', FILTER_SANITIZE_STRING);

        $direccion = filter_input(INPUT_POST, 'direccion', FILTER_SANITIZE_STRING);
        $numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING);
        $piso = filter_input(INPUT_POST, 'piso', FILTER_SANITIZE_STRING);
        $puerta = filter_input(INPUT_POST, 'puerta', FILTER_SANITIZE_STRING);
        $poblacion = filter_input(INPUT_POST, 'poblacion', FILTER_SANITIZE_STRING);
        $cp = filter_input(INPUT_POST, 'cp', FILTER_SANITIZE_STRING);
        $prov = filter_input(INPUT_POST, 'prov', FILTER_SANITIZE_STRING);


        $nombretutor = filter_input(INPUT_POST, 'nombretutor', FILTER_SANITIZE_STRING);
        $apeltutor = filter_input(INPUT_POST, 'apeltutor', FILTER_SANITIZE_STRING);
        $dnitutor = filter_input(INPUT_POST, 'dnitutor', FILTER_SANITIZE_STRING);
        $tlftutor = filter_input(INPUT_POST, 'tlftutor', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);

      //  $alergias = filter_input(INPUT_POST, 'alergias', FILTER_SANITIZE_STRING);
       // $enfermedad = filter_input(INPUT_POST, 'enfermedad', FILTER_SANITIZE_STRING);
       // $tratam = filter_input(INPUT_POST, 'tratam', FILTER_SANITIZE_STRING);
       // $operaciones = filter_input(INPUT_POST, 'operaciones', FILTER_SANITIZE_STRING);
        $observ = filter_input(INPUT_POST, 'observ', FILTER_SANITIZE_STRING);
       // $transporte = filter_input(INPUT_POST, 'transporte', FILTER_SANITIZE_STRING);

        $sintomascovid = filter_input(INPUT_POST, 'sintomasc', FILTER_SANITIZE_STRING);
        $familiarcovid = filter_input(INPUT_POST, 'familiarc', FILTER_SANITIZE_STRING);

        $tipopago = filter_input(INPUT_POST, 'tpago', FILTER_SANITIZE_STRING);
       

        /***********************
         *    FICHERO SIP
         **********************/

        $sip_que_habia = filter_input(INPUT_POST, 'sipanterior', FILTER_SANITIZE_STRING);

        if (!empty($_FILES['sipnuevo']['tmp_name'])) {
            $array_fichero_y_extension = explode(".", $_FILES["sipnuevo"]["name"]);
            $numerodeelementos = count($array_fichero_y_extension);
            $extension = $array_fichero_y_extension[$numerodeelementos - 1];
            $sip = 'img/inscripcionesescuelafallas/' . strtolower(self::sanitize_nombre_para_columna_myslq($_POST['nombre'])) . "-" . strtolower(self::sanitize_nombre_para_columna_myslq($_POST['apellidos'])) . "-S-" . date("d-m-Y-H-i-s") . "." . $extension;
            $archivo_movido = move_uploaded_file($_FILES["sipnuevo"]["tmp_name"], $sip);
        } else {
            $sip = $sip_que_habia;
        }

        
        /******************************************
         *    FICHERO RESGUARDO DE TRANSFERENCIA
         *****************************************/

        $resguardo_que_habia = filter_input(INPUT_POST, 'resguardoanterior', FILTER_SANITIZE_STRING);

        if (!empty($_FILES['resguardonuevo']['tmp_name'])) {
            $array_fichero_y_extension = explode(".", $_FILES["resguardonuevo"]["name"]);
            $numerodeelementos = count($array_fichero_y_extension);
            $extension = $array_fichero_y_extension[$numerodeelementos - 1];
            $resguardo = 'img/inscripcionesescuelafallas/' . strtolower(self::sanitize_nombre_para_columna_myslq($_POST['nombre'])) . "-" . strtolower(self::sanitize_nombre_para_columna_myslq($_POST['apellidos'])) . "-R-" . date("d-m-Y-H-i-s") . "." . $extension;
            $archivo_movido = move_uploaded_file($_FILES["resguardonuevo"]["tmp_name"], $resguardo);
        } else {
            $resguardo = $resguardo_que_habia;
        }

         // error_log(__FILE__.__FUNCTION__.__LINE__);
         //  error_log($sip);

        //validacion Dias sueltos
        $textoDiasSueltos ="";
        $opcion ="";
        $importe=0;

         error_log(__FILE__.__FUNCTION__.__LINE__);
          error_log($_POST['opcion']);

        if ($_POST['opcion']=="solomanyana")
        {
        	$importe=50;
        	$opcion="Mañanas";
        }
        elseif($_POST['opcion']=="diacompleto"){
        	$importe=80;
        	$opcion="Dia completo";
        }
        elseif($_POST['opcion']=="sueltos"){
        	$importe=0;
        	$opcion="Dias sueltos";

        	if (isset($_POST['dia16']) && $_POST['dia16']=='true') {  
        		if ($_POST['tipod16']=="dia16-manyana") {
        			$importe=$importe +18;
        			$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['tipod16'];
        		}else{
        			$importe=$importe +30;
        			$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['tipod16'];
        		}
        	}

        	if (isset($_POST['dia17'])  && $_POST['dia17']=='true') {
        		if ($_POST['tipod17']=="dia17-manyana") {
        			$importe=$importe +18;
        			$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['tipod17'];
        		}else{
        			$importe=$importe +30;
        			$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['tipod17'];
        		}

        	}


        	if (isset($_POST['dia18']) && $_POST['dia18']=='true') {
        		if ($_POST['tipod18']=="dia18-manyana") {
        			$importe=$importe +18;
        			$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['tipod18'];
        		}else{
        			$importe=$importe +30;
        			$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['tipod18'];
        		}

        	}


        }


        

        if (isset($idinscripcion) && !empty($idinscripcion)) {

         //  error_log("inscripcion: " . $idinscripcion);
            $instancia = escuela_fallas::updatefichaescuelafallas(
                $idinscripcion, $dnijugador, $nombre, $apellidos, $fechanac, $club,
                 $direccion, $numero, $piso, $puerta, $poblacion,
                $cp, $prov, $nombretutor, $apeltutor, $dnitutor, $tlftutor,
                $email,  $observ,
                $sip, $sintomascovid, $familiarcovid, $resguardo, $opcion, $importe, $textoDiasSueltos, $genero, $tipopago);

            if (!empty($instancia)) {
                echo json_encode(array("response" => "success",
                    "datos" => $instancia,
                    "modal_title" => "Formulario de inscripción",
                    "message" => "Los datos de la inscripción se han modificado correctamente."));
                die;
            } else {
                echo json_encode(array(
                    "response" => "error",
                    "datos" => "",
                    "modal_title" => "Error",
                    "message" => "Ha habido un error al guardar los datos"));
                die;
            }
        } else {
            echo json_encode(array(
                "response" => "error",
                "datos" => "",
                "modal_title" => "Error",
                "message" => "Parece que ha habido algún error"));
            die;
        }

    	}



    	private static function sanitize_nombre_para_columna_myslq($string)
        {
            $unwanted_array = array(
                ' '=>'_', '.'=>'_', '-'=>'_', '>'=>'_', '/'=>'_', ':'=>'_', '?'=>'_', '!'=>'_',
                'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
                'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'NY', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
                'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
                'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'ny', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
                'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ü'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y' );

            $str    =   strtr( $string, $unwanted_array );

            $regex  =   '/[a-zA-Z_0-9]/';

            if(preg_match($regex, $str))
            {
                return $str;
            }
            else{
                error_log(__FILE__.__LINE__);
                error_log("El string: ".$string." ha generado un error  escuelafallascontroller en sanitize_nombre_para_columna_myslq()");
                return false;
            }
        }



        /********************************************************
	     *  BACK ESCUELA FALLAS 2021 
	     ********************************************************/

	    public function actionBackEscuelaFallas()
	    {
	        if (isset($_SESSION['usuario'])) {

	            require "models/escuela_fallas.php";

	            $datos['inscripciones'] = escuela_fallas::findInscripcionesFallas();
	            $datos['numerototalinscripciones'] = count($datos['inscripciones']);

	            $datos['inscripciones_manyanas'] = escuela_fallas::findInscripcionesFallasByOpcion("Mañanas");
	            $datos['inscripciones_completo'] = escuela_fallas::findInscripcionesFallasByOpcion("Dia completo");
	            $datos['inscripciones_sueltos'] = escuela_fallas::findInscripcionesFallasByOpcion("Dias sueltos");
	            

	            //$filtrado = "0";
	            vistaSinvista(array('datos' => $datos), "layoutsback/layout_back_escuela_fallas");

	        }else {
            header('Location: index.php?r=login/loger');
            }
	    }


		public function actionModificaPagadoEscuelaFallas()
	    {
	        if (isset($_POST['id'])) {

	            require "models/escuela_fallas.php";

	            $codigo = $_POST['id'];
	            $pagado = 1;

	            $slider = escuela_fallas::ActualizaPagadoEscuelaFallas($codigo, $pagado);
	        } else {
	            require "error.php";
	        }
	    }


	    public function actionExportToExcelEscuelaFallasCompleto()
	    {

	        require "models/escuela_fallas.php";

	        $datos['inscripciones'] = escuela_fallas::findAllInscripcionesExcelEscuelaFallas();
	     

	        if (isset($_POST["export_data2"])) {
	            $filename = "escuela_fallas_alqueria_" . date('Ymd') . ".xls";
				header("Content-Type: application/vnd.ms-excel; charset=UTF-16LE");
	            header("Content-Disposition: attachment; filename=" . $filename . "");
	            header('Cache-Control: max-age=0');
	            $show_coloumn = false;

	            if (!empty($datos['inscripciones'])) {
	                foreach ($datos['inscripciones'] as $inscripcion) {
	                    if (!$show_coloumn) {
	                        //display field/column names in first row
	                        echo implode("\t", array_keys($inscripcion)) . "\r\n";
	                        $show_coloumn = true;
	                    }
	                    //echo implode("\t", array_values($inscripcion)) . "\r\n";
	                    echo mb_convert_encoding(implode("\t", array_values($inscripcion)) . "\r\n", 'UTF-16LE', 'UTF-8');
	                }
	            }
	            exit;
	        }
	    }

	    public function actionExportToExcelEscuelaFallas()
	    {

	        require "models/escuela_fallas.php";
	        $where="";
	        $campos="";
	        $campoorder="numeropedido";
	       // error_log("aobserv: " . $_POST["alergias"]);
	        if (isset($_POST["alergias"])) {
	            $where.="";
	            $campos.=" aspectomedico AS ObserMedicas, ";
	        }

	        if (isset($_POST["club"])) {
	            $where.="";
	            $campos.=" club, ";
	        }


	        if (isset($_POST["inscripcion"])) {
	            $where.="";
	            $campoorder="opcion";
	        }


	    

	       // $datos['inscripciones'] = escuela_fallas::findAllInscripcionesExcelEscuelaFallas();

	        $datos['inscripciones'] = escuela_fallas::findAllInscripcionesExcelEscuelaFallasConCampos($where, $campoorder, $campos);

	        if (isset($_POST["export_data"])) {
	            $filename = "escuela_fallas_alqueria_" . date('Ymd') . ".xls";
				header("Content-Type: application/vnd.ms-excel; charset=UTF-16LE");
	            header("Content-Disposition: attachment; filename=" . $filename . "");
	            header('Cache-Control: max-age=0');
	            $show_coloumn = false;

	            if (!empty($datos['inscripciones'])) {
	                foreach ($datos['inscripciones'] as $inscripcion) {
	                    if (!$show_coloumn) {
	                        //display field/column names in first row
	                        echo implode("\t", array_keys($inscripcion)) . "\r\n";
	                        $show_coloumn = true;
	                    }
	                    
	                    //echo implode("\t", array_values($inscripcion)) . "\r\n";
	                    echo mb_convert_encoding(implode("\t", array_values($inscripcion)) . "\r\n", 'UTF-16LE', 'UTF-8');
	                }
	            }
	            exit;
	        }
	    }




		
	}
?>