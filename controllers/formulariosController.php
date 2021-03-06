<?php
	class formulariosController	{

		// Para poder ver los nombre de los usuarios creados en BBDD
		/*public function actionsacaruser() {
			require "models/users.php";
			require "models/encrypter.php";

			$usuarios=users::findAll();

			foreach ($usuarios as $usuairo ) {
				echo encrypter::decrypt($usuairo['usuario']). "-" .encrypter::decrypt($usuairo['contrasenya'])."<br>";
			}
		}*/


		public function actionWorcesterForm() {

			if (isset($_POST['nombre'])) {

				$_SESSION['actualizar_entidad_pagos'] = "inscripcion_campus_worcester";

				require "models/mailers.php";

				$nombre = $_POST['nombre'];
				$apellidos = $_POST['apellidos'];
				$fechanacimiento = $_POST['fechanacimiento'];
				$telefono = $_POST['telefono'];
				$movil = $_POST['movil'];
				$email = strtolower($_POST['email']);
				$pasaporte = $_POST['pasaporte'];
				$fechaexpedicion = $_POST['fechaexpedicion'];
				$fechacaducidad = $_POST['fechacaducidad'];
				$nivelingleshablado = $_POST['nivelingleshablado'];
				$nivelinglesescrito = $_POST['nivelinglesescrito'];
				$tratamientosmedicos = $_POST['tratamientosmedicos'];
				$alergias = $_POST['alergias'];
				$club = $_POST['club'];
				$categoria = $_POST['categoria'];
				$altura = $_POST['altura'];
				$tallaropa = $_POST['tallaropa'];

				$nombreapellidos = $nombre." ".$apellidos;
				/* Cuenta */
				$titular = "";
				$dnititular = "";

				$iban = "";
				$entidad = "";
				$oficina = "";
				$dc = "";
				$cuenta = "";

				$ultimopedido = mailers::findLastNumeroPedidoCampusWorcester();

				$numeropedido = $ultimopedido['MAX(numero_pedido)'];

				$numeropedido = $numeropedido + 1;

				$nuevoformulario = mailers::newFormCampusWorcester($nombre,$apellidos,$fechanacimiento,$telefono,$movil,$email,$pasaporte,$fechaexpedicion,$fechacaducidad,$nivelingleshablado,$nivelinglesescrito,$tratamientosmedicos,$alergias,$club,$categoria,$altura,$tallaropa,$numeropedido,$titular,$dnititular,$iban,$entidad,$oficina,$dc,$cuenta);
				
				if($nuevoformulario){
				   // header('Location: https://servicios.alqueriadelbasket.com/tpv_worcester/tpv.php?pedido=' . $numeropedido . '&titular=' . $titular . '');
				header('Location: http://localhost/ALQUERIAFORMS/tpv_worcester/tpv.php?pedido=' . $numeropedido . '&titular=' . $titular . '');
				}
				else{
					echo "<script text='javascript' charset='utf-8'> alert('Parece que hubo un error, int??ntelo de nuevo m??s tarde.');
							window.location.replace('?r=index/principal'); </script>";
					die;
				}

			}
		}

		
		// Recibe el formulario de inscripci??n de las Jornadas de Detecci??n
		public function actionJornadasDeteccionForm() {
			echo "<script text='javascript' charset='utf-8'>
					alert('El formulario de inscripci??n a las Jornadas de detecci??n est?? bloqueado.');
					window.location.replace('?r=index/principal');
				</script>";
			die;

			if (isset($_POST['nombre'])) {
				require "models/mailers.php";

				// Sacamos el a??o de nacimiento
				$anyonacimiento = date("Y", strtotime($_POST['fechanacimiento']));

				// Comprobamos si la generaci??n que se ha seleccionado, en una jornada en concreto, concuerda con el a??o de nacimiento
				if ($_POST['opcion'] == "jornada_1_2011_2012" && ($anyonacimiento >= 2011 && $anyonacimiento <= 2012)) {
					$correcto = 1;
				}
				elseif ($_POST['opcion'] == "jornada_1_2009_2010" && ($anyonacimiento >= 2009 && $anyonacimiento <= 2010)) {
					$correcto = 1;
				}
				elseif ($_POST['opcion'] == "jornada_1_2007_2008" && ($anyonacimiento >= 2007 && $anyonacimiento <= 2008)) {
					$correcto = 1;
				}
				elseif ($_POST['opcion'] == "jornada_2_2009_2010" && ($anyonacimiento >= 2009 && $anyonacimiento <= 2010)) {
					$correcto = 1;
				}
				elseif ($_POST['opcion'] == "jornada_2_2007_2008" && ($anyonacimiento >= 2007 && $anyonacimiento <= 2008)) {
					$correcto = 1;
				}
				elseif ($_POST['opcion'] == "jornada_2_2005_2006" && ($anyonacimiento >= 2005 && $anyonacimiento <= 2006)) {
					$correcto = 1;
				}
				elseif ($_POST['opcion'] == "jornada_3_2011_2012" && ($anyonacimiento >= 2011 && $anyonacimiento <= 2012)) {
					$correcto = 1;
				}
				elseif ($_POST['opcion'] == "jornada_3_2009_2010" && ($anyonacimiento >= 2009 && $anyonacimiento <= 2010)) {
					$correcto = 1;
				}
				elseif ($_POST['opcion'] == "jornada_3_2007_2008" && ($anyonacimiento >= 2007 && $anyonacimiento <= 2008)) {
					$correcto = 1;
				}
				else {
					$correcto = 0;
				}

				if ($correcto == 0) {
					echo "<script text='javascript' charset='utf-8'>
							alert('Lo sentimos pero la fecha de nacimiento no corresponde con la generaci??n seleccionada. ??Gracias por contar con nosotros!');
							window.location.replace('?r=index/JornadasDeteccion');
						</script>";
					die;
				}

				$fecharegistro = date("Y-m-d H:i:s");
				$opcion = $_POST['opcion'];
				$genero = $_POST['genero'];

				// Creamos variables para personalizar el g??nero en el email
				if ($genero == "Masculino") {
					$seleccionado_a = "seleccionado";
					$hijo_a = "hijo";
				}
				elseif ($genero == "Femenino") {
					$seleccionado_a = "seleccionada";
					$hijo_a = "hija";
				}

				$nombre = $_POST['nombre'];
				$apellidos = $_POST['apellidos'];
				$fechanacimiento = $_POST['fechanacimiento'];
				$practicabaloncesto = $_POST['practicabaloncesto'];
				$club = $_POST['club'];

				$telefonotutor = $_POST['telefonotutor'];
				$emailtutor = strtolower($_POST['emailtutor']);

				$pagado = "No";

				// Generamos el contenido del email a enviar
				$contenido = "<p><strong>Fecha de registro:</strong> ".date("d/m/Y H:i", strtotime($fecharegistro))."h
					<br><strong>Opci??n:</strong> ".$opcion."
					<br><strong>G??nero:</strong> ".$genero."
					<br><strong>Nombre y apellidos:</strong> ".$nombre." ".$apellidos."
					<br><strong>Fecha de nacimiento:</strong> ".date("d/m/Y", strtotime($fechanacimiento))."
					<br><strong>??Practica el baloncesto?</strong> ".$practicabaloncesto."
					<br><strong>Club/Escuela:</strong> ".$club."
					<br><strong>Tel??fono tutor:</strong> ".$telefonotutor."
					<br><strong>Email tutor:</strong> ".$emailtutor."</p>";

				// Insertamos en la BBDD los datos
				$nuevoformulario = mailers::newFormJornadasDeteccion($fecharegistro, $opcion, $genero, $nombre, $apellidos, $fechanacimiento, $practicabaloncesto, $club, $telefonotutor, $emailtutor, $pagado);

				//error_log(__FILE__.__FUNCTION__.__LINE__);

				// Si se ha guardado en la BBDD enviamos un email, si no error
				if ($nuevoformulario) {
					//error_log(__FILE__.__FUNCTION__.__LINE__);
					$nuevocorreo = mailers::mailsSendJornadasDeteccion($emailtutor, $contenido, $opcion, $seleccionado_a, $hijo_a);
				}
				else {
					//error_log(__FILE__.__FUNCTION__.__LINE__);
					echo "<script text='javascript' charset='utf-8'>
							alert('Parece que hubo alg??n error. Por favor, int??ntalo de nuevo m??s tarde.');
							window.location.replace('?r=index/Principal');
						</script>";
					die;
				}

				//error_log(__FILE__.__FUNCTION__.__LINE__);
				//error_log(print_r($nuevocorreo,1));

				// Si se ha enviado el email enviamos mensaje de agradecimiento, sino error
				if ($nuevocorreo) {
					//error_log(__FILE__.__FUNCTION__.__LINE__);
					echo "<script text='javascript' charset='utf-8'>
							alert('??Gracias, la solicitud de inscripci??n se ha realizado correctamente! En breve recibir??s un correo con los datos introducidos.');
							window.location.replace('?r=index/Principal');
						</script>";
					die;
				}
				else {
					//error_log(__FILE__.__FUNCTION__.__LINE__);
					echo "<script text='javascript' charset='utf-8'>
							alert('Parece que hubo alg??n error. Por favor, int??ntalo de nuevo m??s tarde.');
							window.location.replace('?r=index/Principal');
						</script>";
					die;
				}
			}
		}


		// Recibe el formulario de inscripci??n del Skills Camp 2019
		public function actionSkillsCampForm() {

			if (isset($_POST['nombre'])) {

				//error_log("entramos al shooting");

				$_SESSION['actualizar_entidad_pagos'] = "inscripcion_skills_camp";

				// Sacamos el a??o de nacimiento (PARA NIN@S ENTRE 13 Y 19 A??OS)
				$anyonacimiento = Date( "Y" , strtotime( $_POST['fechanacimiento'] ) );

				if ($anyonacimiento >= 2001 && $anyonacimiento <= 2007) {
					$correcto = 1;
				}
				else {
					$correcto = 0;
				}

				if ($correcto == 0) {
					echo json_encode(array(
                        "response"      =>  "error",
                        "message"       =>  "La edad para poder registrarse es entre 13 y 19 a??os."));
                    die;
				}

				require "models/skillcamp.php";
		 
				//Recogemos todos los datos del formulario
				$fecharegistro  = date("Y-m-d");
				$opcion         = $_POST['opcion'];
				$nombre         = $_POST['nombre'];
				$apellidos      = $_POST['apellidos'];
				$fechanacimiento = $_POST['fechanacimiento'];
				$dni = $_POST['dni'];
				// Quitamos los guiones /
				$dni = str_replace ( "-" , "" , $dni);
				// Quitamos los espacios /
				$dni = str_replace ( " " , "" , $dni);
				// Quitamos los puntos /
				$dni = str_replace ( "." , "" , $dni);
				$club = $_POST['club'];
				$tallaropa = $_POST['tallacamiseta'];
				$transporte ="-";
				$enfermedad = $_POST['enfermedad'];
				$alergias = $_POST['alergias'];
				$tratamientosmedicos = $_POST['tratamientosmedicos'];
				$operaciones = $_POST['operacionreciente'];
				$observ = $_POST['observaciones'];
				$nombretutor = $_POST['nombretutor'];
				$apellidostutor = $_POST['apellidostutor'];
				$dnitutor = $_POST['dnitutor'];
				// Quitamos los guiones /
				$dnitutor = str_replace ( "-" , "" , $dnitutor);
				// Quitamos los espacios /
				$dnitutor = str_replace ( " " , "" , $dnitutor);
				// Quitamos los puntos /
				$dnitutor = str_replace ( "." , "" , $dnitutor);
				//ponemos las letras en mayusculas
				$dnitutor = strtoupper( $dnitutor );
				$direccion = $_POST['direccion'];
				$numero = $_POST['numero'];
				$piso = $_POST['piso'];
				$puerta = $_POST['puerta'];
				$cp = $_POST['cp'];
				$provincia = $_POST['provincia'];
				$poblacion = $_POST['poblacion'];
				$pais = $_POST['pais'];
				$telefono = $_POST['telefonotutor'];
				$email = strtolower( $_POST['emailtutor'] );
				$nombreapellidos = $nombre." ".$apellidos;
				
				//Comprobamos las dos autorizaciones
				if (isset($_POST['autorizodatos'])) {
					$autdatos = "si";
				}
				else {
					$autdatos = "no";
				}

				if (isset($_POST['autorizoimagen'])) {
					$autimg = "si";
				}
				else {
					$autimg = "no";
				}

				//Calculamos el importe segun la opcion que tenga seleccionada

				$importe = 0;

				switch ( $_POST['opcion'] ) {
				    case "jugadores_internos":
				        $importe=595;
				   		$evento="Skills Camp 2020";
				    break;
				    case "jugadores_externos":
				        $importe=360;
				   		$evento="Skills Camp 2020";
				    break;
				    case "internos_dos_campus":
				        $importe=1130;
				   		$evento="Shooting y Skills Camp 2020";
				    break;
				    case "externos_dos_campus":
				        $importe=684;
				   		$evento="Shooting y Skills Camp 2020";
				    break;
				    case "pack_uno_opcion_a":
				        $importe=845;
				   		$evento="Campus Valencia Basket Calvestra y Skills Camp 2020";
				    break;
				    case "pack_uno_opcion_b":
				        $importe=845;
				   		$evento="Skills Camp y Campus Valencia Basket Calvestra 2020";
				    break;
				    case "pack_dos_opcion_a":
				        $importe=920;
				   		$evento="Skills Camp y Tecnificaci??n Femenina 2020";
				    break;
				}

				//PENDIENTE: DESCUENTOS

				$porcentajeDescuento = 0;
					//PENDIENTE: codigo 15%
					if ( $_POST["CodigoValido"] == "1" ) {
						$porcentajeDescuento = $porcentajeDescuento + 15;
					}

					//Inscrito ya en otro campus (Tecnificaci??n Femenina, Campus de Verano, Shooting y Skills) 10%  
						$inscrito = false;
						$comprovacionTecnificacion 	= skillcamp::findByDNIEnTecnificacion( $dni );
						$comprovacionCampusVerano 	= skillcamp::findByDNIEnCampusVerano( $dni );
						$comprovacionSkillsShooting = skillcamp::findByDNIEnSkillsYShooting( $dni );

						if( ( !empty( $comprovacionTecnificacion ) >= 1 ) || ( !empty( $comprovacionCampusVerano ) >= 1 ) || ( !empty( $comprovacionSkillsShooting ) >= 1 ) ){
							//error_log("Entramos a los if del inscrito");
							$inscrito = true;
						}

						if( $inscrito ){
							$porcentajeDescuento = $porcentajeDescuento + 10;
						}
						

					//hermanos
						$busquedaHermanos = skillcamp::findByDNITutor( $dnitutor );

						if( $busquedaHermanos != false && ( count( $busquedaHermanos ) >= 2 ) ){

							$juegaEnVB = false;

							foreach ( $busquedaHermanos as $hermano ) {
								//buscar en la tabla jugadores de alqueria por DNI jugador si juega en VB
								$busquedaHermanoVB = skillcamp::findByDNIJugadorEnAlqueria( $hermano["dni"] );

								if( count( $busquedaHermanoVB ) >= 1 ){
									$juegaEnVB = true;
								}
							}

							if( $juegaEnVB ){
								//si uno de los dos juega en el valencia basket 5%
								$porcentajeDescuento = $porcentajeDescuento + 5;
							}else{
								//Si no juega ninguno en valencia basket 10%
								$porcentajeDescuento = $porcentajeDescuento + 10;
							}		
						}
						 
					if( $porcentajeDescuento != 0 ){
						$cantidadADescontar = ( $importe * $porcentajeDescuento ) / 100;
						$importe = $importe - $cantidadADescontar ;
					}

				//$pagado = $_POST['pagado'];  //ponemos 0 directamente en el insert
				
				//Recogemos el ultimo numero de pedido
				$ultimopedido = skillcamp::findLastNumeroPedidoskillscamp();
				//error_log("pasamos el ultimo numero de pedido");

				$numeropedido = $ultimopedido['MAX(numero_pedido)'];

				$numeropedido = $numeropedido + 1;


				//Formateo Nombre Imagen Tarjeta Sanitaria

				//Explode: parte en trozos el string cada vez que encuentre el signo de puntuaci??n "."

				$valores = explode(".", $_FILES['fotocopiasip']['name']);

				//Formato valores

				/*

				$valores[0] = "imagen";

				$valores[1] = "png";
				Para coger la extensi??n debemos retornar el ultimo elemento del array $valores.

				*/

				$extension = $valores[count($valores)-1];


				$nombre_base = $_POST['nombre'];
				// Sustituimos los espacios por guiones
				$nombre_format = str_replace ( " " , "-" , $nombre_base);
				// Sustituimos los puntos por guiones
				$nombre_format = str_replace ( "." , "-" , $nombre_format);

				$apellidos_base = $_POST['apellidos'];
				// Sustituimos los espacios por guiones
				$apellidos_format = str_replace ( " " , "-" , $apellidos_base);
				// Sustituimos los puntos por guiones
				$apellidos_format = str_replace ( "." , "-" , $apellidos_format);


				// Quitamos todos los acentos, e??es y car??cteres raros
				setlocale(LC_ALL, 'en_US.UTF8');
				$nombre_format = preg_replace("/[^a-zA-Z0-9\_\-]+/", '',iconv('UTF-8', 'ASCII//TRANSLIT', $nombre_format));
				$apellidos_format = preg_replace("/[^a-zA-Z0-9\_\-]+/", '',iconv('UTF-8', 'ASCII//TRANSLIT', $apellidos_format));


				$nombre_y_apellidos_format = $nombre_format."-".$apellidos_format;


				$dir_subida = 'img/shootingcamp/';
				$fichero = $nombre_y_apellidos_format."-".date("d-m-Y-H-i-s").".".$extension;
				$fichero_subido = $dir_subida.$fichero;

				/* UPLOAD */
				move_uploaded_file($_FILES['fotocopiasip']['tmp_name'], $fichero_subido);

				/* Controlamos si se va a pagar con tarjeta o en oficinas  */
				$enviar = $_POST['enviar'];
				if ($enviar == "tarjeta") {   

					$tipopago = "ONLINE";

					switch ( $_POST['opcion'] ) {
					    case "pack_uno_opcion_a":

					        $nuevoformularioCampusVerano = skillcamp::insertCampusVerano(1, 1, 0, 0, 0, $nombre, $apellidos, $fechanacimiento, $dni, $club, $tallaropa, $transporte, $enfermedad, $alergias, $tratamientosmedicos, $operaciones, $observ, $fichero_subido, $nombretutor, $apellidostutor, $dnitutor, $direccion, $numero, $piso, $puerta, $cp, $provincia, $poblacion, $telefono, $email, $autdatos, $autimg, 0, $numeropedido, $importe, $tipopago, 0, null);
					        //error_log("pasamos el insert campus verano");
					    break;
					    case "pack_uno_opcion_b":

					        $nuevoformularioCampusVerano = skillcamp::insertCampusVerano(0, 0, 1, 1, 0, $nombre, $apellidos, $fechanacimiento, $dni, $club, $tallaropa, $transporte, $enfermedad, $alergias, $tratamientosmedicos, $operaciones, $observ, $fichero_subido, $nombretutor, $apellidostutor, $dnitutor, $direccion, $numero, $piso, $puerta, $cp, $provincia, $poblacion, $telefono, $email, $autdatos, $autimg, 0, $numeropedido, $importe, $tipopago, 0, null);
					        //error_log("pasamos el insert campus verano");
					    break;
					    case "pack_dos_opcion_a":

					        $nuevoformularioTecnificacionFemenina = skillcamp::insertTecnificacionFemenina("primerturno", $nombre, $apellidos, $fechanacimiento, $dni, $club, $tallaropa, $transporte, $enfermedad, $alergias, $tratamientosmedicos, $operaciones, $observ, $fichero_subido, null, $nombretutor, $apellidostutor, $dnitutor, $direccion, $numero, $piso, $puerta, $cp, $provincia, $poblacion, $telefono, $email, $autdatos, $autimg, 0, $numeropedido, $importe, null, $tipopago, 0, null);
					        //error_log("pasamos el insert escuela tecnificacion femenina");
					    break;
					}

					$nuevoformulario = skillcamp::newFormSkillsCamp($opcion, $nombre, $apellidos, $fechanacimiento, $dni, $club, $tallaropa, $transporte, $enfermedad, $alergias, $tratamientosmedicos, $operaciones, $observ, $nombretutor, $apellidostutor, $dnitutor, $direccion, $numero, $piso, $puerta, $cp, $provincia, $poblacion, $telefono, $email, $autdatos, $autimg, $numeropedido, $importe, $fichero_subido, $tipopago, $pais, $evento);
					//error_log("pasamos el insert shooting camp");

					if ( $nuevoformulario ) {
						header( 'Location: https://servicios.alqueriadelbasket.com/tpv_skillscamp/tpv.php?pedido=' . $numeropedido . '&titular=' . $nombreapellidos . '&importe=' . $importe );

						//header('Location: http://localhost/alqueriaforms/tpv_shootingcamp/tpv.php?pedido=' . $numeropedido . '&titular=' . $nombreapellidos . '&importe=' . $importe);
					}
					else {
						echo json_encode(array(
	                        "response"      =>  "error",
	                        "message"       =>  "Fallo al realizar el resgistro con pago con tarjeta."));
	                    die;
					}
				}
				elseif ( $enviar == "oficina" ) {

					$tipopago = "OFICINA";

					switch ( $_POST['opcion'] ) {
					    case "pack_uno_opcion_a":

					        $nuevoformularioCampusVerano = skillcamp::insertCampusVerano(1, 1, 0, 0, 0, $nombre, $apellidos, $fechanacimiento, $dni, $club, $tallaropa, $transporte, $enfermedad, $alergias, $tratamientosmedicos, $operaciones, $observ, $fichero_subido, $nombretutor, $apellidostutor, $dnitutor, $direccion, $numero, $piso, $puerta, $cp, $provincia, $poblacion, $telefono, $email, $autdatos, $autimg, 0, $numeropedido, $importe, $tipopago, 0, null);
					        	//error_log("pasamos el insert campus verano");
					    break;
					    case "pack_uno_opcion_b":

					        $nuevoformularioCampusVerano = skillcamp::insertCampusVerano(0, 0, 1, 1, 0, $nombre, $apellidos, $fechanacimiento, $dni, $club, $tallaropa, $transporte, $enfermedad, $alergias, $tratamientosmedicos, $operaciones, $observ, $fichero_subido, $nombretutor, $apellidostutor, $dnitutor, $direccion, $numero, $piso, $puerta, $cp, $provincia, $poblacion, $telefono, $email, $autdatos, $autimg, 0, $numeropedido, $importe, $tipopago, 0, null);
					        	//error_log("pasamos el insert campus verano");
					    break;
					    case "pack_dos_opcion_a":

					        $nuevoformularioTecnificacionFemenina = skillcamp::insertTecnificacionFemenina("primerturno", $nombre, $apellidos, $fechanacimiento, $dni, $club, $tallaropa, $transporte, $enfermedad, $alergias, $tratamientosmedicos, $operaciones, $observ, $fichero_subido, null, $nombretutor, $apellidostutor, $dnitutor, $direccion, $numero, $piso, $puerta, $cp, $provincia, $poblacion, $telefono, $email, $autdatos, $autimg, 0, $numeropedido, $importe, null, $tipopago, 0, null);
					        	//error_log("pasamos el insert tecnificacion femenina");
					    break;
					}

					$nuevoformulario = skillcamp::newFormSkillsCamp($opcion, $nombre, $apellidos, $fechanacimiento, $dni, $club, $tallaropa, $transporte, $enfermedad, $alergias, $tratamientosmedicos, $operaciones, $observ, $nombretutor, $apellidostutor, $dnitutor, $direccion, $numero, $piso, $puerta, $cp, $provincia, $poblacion, $telefono, $email, $autdatos, $autimg, $numeropedido, $importe, $fichero_subido, $tipopago, $pais, $evento);
					//error_log("pasamos el insert shooting camp");

					if ($nuevoformulario) {
						header('Location: ?r=skillcamp/okpagooficina&pedido=' . $numeropedido);
						//header('Location: https://servicios.alqueriadelbasket.com/?r=shootingcamp/okpagooficina&pedido=' . $numeropedido);
						//header('Location: http://localhost/alqueriaforms/?r=shootingcamp/okpagooficina');
					}
					else {
						echo json_encode(array(
	                        "response"      =>  "error",
	                        "message"       =>  "Fallo al realizar el resgistro con pago con tarjeta."));
	                    die;
					}
				}
			//final
			}
		}



		/*******************************

			IMPROVE TALENT
		*********************************/


		// Recibe el formulario de inscripci??n del Campus Improve Basketball Talent 2019
		public function actionCampusImproveTalent() {
			
			if (isset($_POST['nombre'])) {
				require "models/campus_improve.php";

				// Fecha l??mite del registro
				$dia = date("24");
				$mes = date("06");
				$ano = date("2019");

				$fechanacimiento = $_POST['fechanacimiento'];

				$dianaz = date("d",strtotime($fechanacimiento));
				$mesnaz = date("m",strtotime($fechanacimiento));
				$anonaz = date("Y",strtotime($fechanacimiento));

				// Si el mes es el mismo pero el d??a inferior aun no ha cumplido a??os, le quitaremos un a??o al actual
				if (($mesnaz == $mes) && ($dianaz > $dia)) {
					$ano = ($ano - 1);
				}

				// Si el mes es superior al actual tampoco habr?? cumplido a??os, por eso le quitamos un a??o al actual
				if ($mesnaz > $mes) {
					$ano = ($ano - 1);
				}

				// Ya no habr??a mas condiciones. Ahora, simplemente restamos los a??os y mostramos el resultado como su edad
				$edad = ($ano - $anonaz);

				//echo "fecha nac: ". $fechanacimiento .    " edad: " .$edad;   die;


				// Si ha nacido dentro del rango de a??os permitido, seguimos.
				if ($edad >= 16 && $edad <= 20) {

					$evento = "Campus Improve 2019";

					//  Calculamos el precio seg??n las opciones escogidas
					if (isset($_POST['semana1'])) {
						// Inicializamos a 0 para ir sum??ndole el precio de las opciones elegidas de cada semana
						$importe = 0;

						if ($_POST['rdia1'] == "pcompleta") {
							$importe = $importe + 1200;
							$semana1 = "sem1_pcomp";
						}
						else {
							$importe = $importe + 850;
							$semana1 = "sem1_sinaloj";
						}

						$opcion = $semana1;
					}

					if (isset($_POST['semana2'])) {
						if ($_POST['rdia2'] == "pcompleta") {
							$importe = $importe + 1200;
							$semana2 = "sem2_pcomp";
						}
						else {
							$importe = $importe + 850;
							$semana2 = "sem2_sinaloj";
						}

						if (isset($_POST['semana1'])) {
							$opcion = $opcion." + ".$semana2;
						}
						else {
							$opcion = $semana2;
						}                    
					}


					$nombre             = $_POST['nombre'];
					$apellidos          = $_POST['apellidos'];
					$dni                = $_POST['dni'];

					// Quitamos los guiones
					$dni = str_replace ( "-" , "" , $dni );
					// Quitamos los espacios
					$dni = str_replace ( " " , "" , $dni );
					// Quitamos los puntos
					$dni = str_replace ( "." , "" , $dni );

					$club               = $_POST['club'];
					$tallacamiseta      = $_POST['tallacamiseta'];
					$enfermedad         = $_POST['enfermedad'];
					$alergias           = $_POST['alergias'];
					$tratamientosmedicos = $_POST['tratamientosmedicos'];
					$operacionreciente  = $_POST['operacionreciente'];
					$observaciones      = $_POST['observaciones'];
					$nombretutor        = $_POST['nombretutor'];
					$apellidostutor     = $_POST['apellidostutor'];
					$dnitutor           = $_POST['dnitutor'];

					// Quitamos los guiones
					$dnitutor = str_replace ( "-" , "" , $dnitutor );
					// Quitamos los espacios
					$dnitutor = str_replace ( " " , "" , $dnitutor );
					// Quitamos los puntos
					$dnitutor = str_replace ( "." , "" , $dnitutor );

					$direccion          = $_POST['direccion'];
					$numero             = $_POST['numero'];
					$piso               = $_POST['piso'];
					$puerta             = $_POST['puerta'];
					$cp                 = $_POST['cp'];
					$provincia          = $_POST['provincia'];
					$poblacion          = $_POST['poblacion'];
					$telefonotutor      = $_POST['telefonotutor'];
					$emailtutor         = strtolower($_POST['emailtutor']);


					// Formateo Nombre Imagen SIP
					// Explode: parte en trozos el string cada vez que encuentre el signo de puntuaci??n "."
					$valores = explode(".", $_FILES['fotocopiasip']['name']);

					// Guardamos la extensi??n original del archivo subido
					$extension = $valores[count($valores) - 1];

					// Formateamos el nombre del ni??o
					$nombre_base = $_POST['nombre'];
					// Sustituimos los espacios por guiones
					$nombre_format = str_replace ( " " , "-" , $nombre_base);
					// Sustituimos los puntos por guiones
					$nombre_format = str_replace ( "." , "-" , $nombre_format);

					// Formateamos los apellidos del ni??o
					$apellidos_base = $_POST['apellidos'];
					// Sustituimos los espacios por guiones
					$apellidos_format = str_replace ( " " , "-" , $apellidos_base);
					// Sustituimos los puntos por guiones
					$apellidos_format = str_replace ( "." , "-" , $apellidos_format);

					// Quitamos todos los acentos, e??es y car??cteres raros
					setlocale(LC_ALL, 'en_US.UTF8');
					$nombre_format = preg_replace("/[^a-zA-Z0-9\_\-]+/", '',iconv('UTF-8', 'ASCII//TRANSLIT', $nombre_format));
					$apellidos_format = preg_replace("/[^a-zA-Z0-9\_\-]+/", '',iconv('UTF-8', 'ASCII//TRANSLIT', $apellidos_format));

					// Concatenamos y guardamos el nombre y apellidos del ni??o formateados (para el nombre del archivo SIP)
					$nombre_y_apellidos_format = $nombre_format."-".$apellidos_format;

					// Concatenamos y guardamos el nombre del ni??o y DNI del tutor formateados (para comparar con los registros de la BBDD)
					$nombre_ninyo_y_dnitutor = $nombre_format."-".$dnitutor;


					/* Comprobamos si el registro ya existe en la BBDD antes de seguir */
					$todoslosregistros = campus_improve::comprobarRepetidos();
					foreach ($todoslosregistros as $registro) {
						// Formateamos el nombre del ni??o de la BBDD
						$nombre_bbdd = $registro['nombre'];
						// Sustituimos los espacios por guiones
						$nombre_bbdd_format = str_replace ( " " , "-" , $nombre_bbdd);
						// Sustituimos los puntos por guiones
						$nombre_bbdd_format = str_replace ( "." , "-" , $nombre_bbdd_format);

						// Quitamos todos los acentos, e??es y car??cteres raros
						setlocale(LC_ALL, 'en_US.UTF8');
						$nombre_bbdd_format = preg_replace("/[^a-zA-Z0-9\_\-]+/", '',iconv('UTF-8', 'ASCII//TRANSLIT', $nombre_bbdd_format));

						// Concatenamos y guardamos el nombre del ni??o y el DNI del tutor de la BBDD formateados
						$nombre_bbdd_y_dnitutor = $nombre_bbdd_format."-".$registro['dnitutor'];
						
						// Comprobamos si el nuevo registro ya existe en la BBDD para mostrar mensaje
						if (strcasecmp ($nombre_bbdd_y_dnitutor, $nombre_ninyo_y_dnitutor) == 0) {
							//Seg??n strcasecmp (case insensitive) las dos cadenas son iguales
							echo "<script text='javascript' charset='utf-8'>
									alert('Lo sentimos pero ya se hab??a inscrito anteriormente. \\nSi tiene que realizar m??s gestiones, p??ngase en contacto con recepci??n de l??Alqueria en el tel??fono 961 215 543. ??Gracias!');
									window.location.replace('?r=index/principal');
								</script>";
							die;
						}
					}


					// Movemos el SIP a su carpeta
					$dir_subida         = 'img/sipcampusimprove/';
					$fichero            = $nombre_y_apellidos_format."-".date("d-m-Y-H-i-s").".".$extension;
					$fotocopiasipsubida = $dir_subida.$fichero;
					move_uploaded_file($_FILES['fotocopiasip']['tmp_name'],$fotocopiasipsubida);


					//  Preparamos datos para el formulario del TPV
					$nombreapellidos    = $nombre." ".$apellidos;
					$ultimopedido       = campus_improve::findLastNumeroPedidoCampusImprove();
					$numeropedido       = $ultimopedido['MAX(numero_pedido)'];
					$numeropedido       = $numeropedido + 1;

					// Controlamos si se va a pagar con tarjeta o en oficinas  */
					$enviar = $_POST['enviar'];

					if ($enviar == "tarjeta") {
						$tipopago           = "ONLINE";

						$nuevoformulario    = campus_improve::newFormCampusImprove(
							$opcion,            $nombre,            $apellidos,             $fechanacimiento,       $dni,
							$club,              $tallacamiseta,     $enfermedad,            $alergias,              $tratamientosmedicos,
							$operacionreciente, $observaciones,     $fotocopiasipsubida,    $nombretutor,           $apellidostutor,
							$dnitutor,          $direccion,         $numero,                $piso,                  $puerta,
							$cp,                $provincia,         $poblacion,             $telefonotutor,         $emailtutor,
							$numeropedido,      $importe,           $evento,                $tipopago);
						
						if ($nuevoformulario) {
							//header('Location: https://servicios.alqueriadelbasket.com/tpv_improve_talent/tpv.php?pedido=' . $numeropedido . '&titular=' . $nombreapellidos . '&importe=' . $importe);
							header('Location: http://localhost/alqueriaforms/tpv_improve_talent/tpv.php?pedido=' . $numeropedido . '&titular=' . $nombreapellidos . '&importe=' . $importe);
						}
						else {
							echo "<script text='javascript' charset='utf-8'>
									alert('Parece que hubo un error. Int??ntelo de nuevo m??s tarde.');
									window.location.replace('?r=index/ImproveTalent');
								</script>";
							die;
						}
					}
					elseif ($enviar == "oficina") {
						$tipopago           = "OFICINA";

						$nuevoformulario    = campus_improve::newFormCampusImprove(
							$opcion,            $nombre,            $apellidos,             $fechanacimiento,       $dni,
							$club,              $tallacamiseta,     $enfermedad,            $alergias,              $tratamientosmedicos,
							$operacionreciente, $observaciones,     $fotocopiasipsubida,    $nombretutor,           $apellidostutor,
							$dnitutor,          $direccion,         $numero,                $piso,                  $puerta,
							$cp,                $provincia,         $poblacion,             $telefonotutor,         $emailtutor,
							$numeropedido,      $importe,           $evento,                $tipopago);

						if ($nuevoformulario) {
							//header('Location: https://servicios.alqueriadelbasket.com/?r=campusimprove/okpagooficina&pedido=' . $numeropedido);
							header('Location: http://localhost/alqueriaforms/?r=campusimprove/okpagooficina&pedido=' . $numeropedido);
						}
						else {
							echo "<script text='javascript' charset='utf-8'>
									alert('Parece que hubo un error. Int??ntelo de nuevo m??s tarde.');
									window.location.replace('?r=index/ImproveTalent');
								</script>";
							die;
						}
					}
				}
				// Si ha nacido fuera del rango de a??os permitido, mostramos mensaje de prohibici??n
				else {
					echo "<script text='javascript' charset='utf-8'>
							alert('Lo sentimos pero el jugador/a debe tener entre 16 y 20 a??os para participar en el campus. ??Gracias por contar con nosotros!');
							window.location.replace('?r=index/ImproveTalent');
						</script>";
					die;
				}
			}
		}


		
				
				
		/********************************************************
		*  LIGA ALQUERIA
		********************************************************/

		// Recibe el formulario de inscripci??n de la Liga de L??Alqueria del Basket https://servicios.alqueriadelbasket.com/?r=index/ligaalqueria
		public function actionLigaAlqueriaForm() {
			//error_log(print_r($_POST,1));
			//die;
			//error_log(print_r($_FILES,1));

			require "PHPMailer/envios_emails.php";
			require "models/formularios_liga_alqueria.php";
			require "models/formularios_liga_alqueria_jugadores.php";
			require "models/formularios_liga_alqueria_pagos.php";


			/************************************************************
			*   1. Procesamos la informaci??n del equipo + responsable
			***********************************************************/

			$FechaAlta                  =   date("Y-m-d H:i:m");
			$NombreEquipo               =   strtoupper(filter_input(INPUT_POST, 'nombre_equipo',           FILTER_SANITIZE_STRING));
			$NombreCarpeta              =   self::sanitize_nombre_para_columna_myslq(strtolower($NombreEquipo));
			$ResponsableNombre          =   strtoupper(filter_input(INPUT_POST, 'responsable_nombre',      FILTER_SANITIZE_STRING));
			$ResponsableTelefono        =   strtoupper(filter_input(INPUT_POST, 'responsable_telefono',    FILTER_SANITIZE_STRING));
			$ResponsableEmail           =   strtoupper(filter_input(INPUT_POST, 'responsable_email',       FILTER_SANITIZE_STRING));
			$ResponsableDNI             =   self::sanitize_nombre_para_columna_myslq(strtoupper(trim(filter_input(INPUT_POST, 'responsable_dni',    FILTER_SANITIZE_STRING))));
			$Categoria                  =   strtoupper(filter_input(INPUT_POST, 'categoria_equipo',        FILTER_SANITIZE_STRING));
			$Subcategoria               =   "";
			$ColorEquipacionPrincipal   =   strtoupper(filter_input(INPUT_POST, 'color_equip_princ',       FILTER_SANITIZE_STRING));
			$ColorEquipacionSecundaria  =   strtoupper(filter_input(INPUT_POST, 'color_equip_secun',       FILTER_SANITIZE_STRING));
			$metodo_pago                =   strtoupper(filter_input(INPUT_POST, 'oficinasotpv',            FILTER_SANITIZE_STRING));
			$DiaJuego                  	=   strtoupper(filter_input(INPUT_POST, 'dia_partido',             FILTER_SANITIZE_STRING));
			$HoraJuego                  =   filter_input(INPUT_POST, 'hora_juego',              FILTER_SANITIZE_NUMBER_INT);
			//error_log(__FILE__.__LINE__.": ".$DiaJuego);
			//error_log(__FILE__.__LINE__.": ".$HoraJuego);
			//die;
			$activo                     =   1;
			
			$condiciones_uso_autoriza_datos     =   filter_input(INPUT_POST, 'autorizodatos',   FILTER_SANITIZE_STRING);
			$condiciones_uso_autoriza_imagen    =   filter_input(INPUT_POST, 'autorizoimagen',  FILTER_SANITIZE_STRING);

			if ($condiciones_uso_autoriza_datos=="true") {
				$condiciones_uso_autoriza_datos=1;
			}
			else {
				$condiciones_uso_autoriza_datos=0;
			}
			
			if ($condiciones_uso_autoriza_imagen=="true") {
				$condiciones_uso_autoriza_imagen=1;
			}
			else {
				$condiciones_uso_autoriza_imagen=0;
			}
			//error_log(__FILE__.__LINE__.": ".$ResponsableDNI);
			
			$FechaAltaHace5Minutos=new DateTime($FechaAlta);
			$FechaAltaHace5Minutos->modify('-5 minutes');
			$equipoExistente=formularios_liga_alqueria::findByResponsableDNIEnLosUltimos5Minutos($ResponsableDNI,$FechaAltaHace5Minutos->format('Y-m-d H:i:s'));
			
			if (!empty($equipoExistente)) {
				//error_log(__FILE__.__LINE__);
				//error_log(print_r($equipoExistente,1));
				
				echo json_encode(array(
					"response"  =>  "error",
					"message"   =>  "Ya existe una inscripci??n con este DNI del responsable. Espere 5 minutos."));
				die;
			}
			
			$nuevoEquipo = formularios_liga_alqueria::insert(
					$FechaAlta,                 $NombreEquipo,      $NombreCarpeta,     $ResponsableNombre, $ResponsableTelefono, 
					$ResponsableEmail,          $ResponsableDNI,    $Categoria,         $Subcategoria,      $ColorEquipacionPrincipal, 
					$ColorEquipacionSecundaria, $DiaJuego,          $HoraJuego,         $activo,            $condiciones_uso_autoriza_datos, 
					$condiciones_uso_autoriza_imagen);


			/*************************************************************************************
			*   2. Ahora generamos las 4 filas de los 4 pagos que deben hacer seg??n el dossier 
			*************************************************************************************/

			$numero_pedido="";
			$numero_pedido="LIGA".$nuevoEquipo['ID'];
			
			formularios_liga_alqueria_pagos::insert($nuevoEquipo['ID'], "Inscripci??n y fianza", $numero_pedido, 200,    $metodo_pago,               null, null, 1);
			formularios_liga_alqueria_pagos::insert($nuevoEquipo['ID'], "Cuota Noviembre",      "",             665,    "Ingreso o Transferencia",  null, null, 2);
			formularios_liga_alqueria_pagos::insert($nuevoEquipo['ID'], "Cuota Enero",          "",             665,    "Ingreso o Transferencia",  null, null, 3);
			formularios_liga_alqueria_pagos::insert($nuevoEquipo['ID'], "Cuota Marzo",          "",             665,    "Ingreso o Transferencia",  null, null, 4);


			/*************************************************************************************
			*   3. Ahora procesamos los {8 a 16} jugadores
			*************************************************************************************/

			$contenido_email_jugadores="<p>";
			for ($contador_jugadores=1;$contador_jugadores<17;$contador_jugadores++) {
				if (!empty(filter_input(INPUT_POST, ('nombre_jugador'.$contador_jugadores), FILTER_SANITIZE_STRING)) && !empty(filter_input(INPUT_POST, ('dni_jugador'.$contador_jugadores), FILTER_SANITIZE_STRING))) {
					$nombre     =   filter_input(INPUT_POST, 'nombre_jugador'.$contador_jugadores,      FILTER_SANITIZE_STRING);
					$dni        =   self::sanitize_nombre_para_columna_myslq(strtoupper(trim(filter_input(INPUT_POST, 'dni_jugador'.$contador_jugadores,    FILTER_SANITIZE_STRING))));
					$email      =   filter_input(INPUT_POST, 'email_jugador'.$contador_jugadores,       FILTER_SANITIZE_STRING);
					$telefono   =   filter_input(INPUT_POST, 'telefono_jugador'.$contador_jugadores,    FILTER_SANITIZE_STRING);
					
					formularios_liga_alqueria_jugadores::insert(
						$nuevoEquipo['ID'], 
						$nombre, 
						$dni,
						$email,
						$telefono,
						1
					);
					
					$contenido_email_jugadores.=$nombre.", ".$dni;
					if(!empty($email))
					{
						$contenido_email_jugadores.=", ".$email;
						if(!empty($telefono)){$contenido_email_jugadores.=", ".$telefono;}
					}
					else{
						if(!empty($telefono)){$contenido_email_jugadores.=", ".$telefono;}
					}
					
					$contenido_email_jugadores.="<br>";
				}
			}
			$contenido_email_jugadores.="</p>";
			
			
			/****************************************************
			*      4. CREAMOS DIRECTORIO POR SI HAY FICHERO
			****************************************************/

			$dir_subida     =   'liga/'.$NombreCarpeta."/";
	
			// Crear carpeta del equipo
			if (!file_exists($dir_subida)    && !is_dir($dir_subida)) {
				mkdir($dir_subida);
			}

			if (isset($_FILES["justificante_pago"]["tmp_name"])) {
				$url_subida         =       $dir_subida.$_FILES["justificante_pago"]["name"];
				//$url_fichero_subida =   $_FILES["justificante_pago"]["name"];
				
				// Movemos el fichero
				if (move_uploaded_file($_FILES["justificante_pago"]["tmp_name"],$url_subida)) {
					// Adem??s de mover el fichero, ahora comprobamos si hay que renombrarlo.
					if ($_FILES["justificante_pago"]["name"]) {
						$array_fichero_y_extension = explode(".",$_FILES["justificante_pago"]["name"]);
						$numerodeelementos = count($array_fichero_y_extension);
						$extension = $array_fichero_y_extension[$numerodeelementos-1];
						rename($url_subida,$dir_subida."Justificante_".date("Y_m_d_H_i_s").".".$extension);
						//$url_fichero_subida=$nuevo_fichero_nombre.".".$extension;
					}
				}
				else {
					echo json_encode(array(
						"response" => "error",
						"message"  => "Parece que hubo alg??n problema con el archivo"));
				}
			}
									
			/*************************************************
			* Ahora est?? todo insertado. Vamos al TPV 
			*************************************************/

			if ($metodo_pago=="TPV") {
				//echo "<script text='javascript' charset='utf-8'>
				//window.location.replace('https://servicios.alqueriadelbasket.com/tpv_liga/tpv_inscripcion.php?numeropedido=".$numero_pedido. "&titular=".$ResponsableNombre."');</script>";
				//  error_log(__FILE__.__LINE__.$numero_pedido.".".$ResponsableNombre);
				//  header('Location: https://servicios.alqueriadelbasket.com/tpv_liga/tpv_inscripcion.php?numeropedido='.$numero_pedido.'&titular='.$ResponsableNombre);
				//  exit();
				//  header('Location: https://servicios.alqueriadelbasket.com/tpv/tpv_inscripcion.php?numeropedido='.$numeropedido.'&titular='.$titular);
				
				error_log(__FILE__.__LINE__);
				error_log("https://servicios.alqueriadelbasket.com/tpv_liga/tpv_inscripcion.php?numeropedido=".$numero_pedido."&titular=".$ResponsableNombre);
				
				echo json_encode(array(
						"response"          =>  "success",
						"url_redireccion"   =>  "tpv_liga/tpv_inscripcion.php?numeropedido=".$numero_pedido."&titular=".$ResponsableNombre,
						"message"           =>  "La inscripci??n en la Liga Alqueria se ha recibido correctamente"));
			}
			else if ($metodo_pago=="OFICINAS") {
				//  Aqu?? enviamos el email de confirmaci??n OFICINAS
				$contenido_email= "<p>Hemos recibido la inscripci??n a la liga de L??Alqueria del Basket. Estos son los datos recibidos:</p>
					<p>
						<strong>Fecha de alta:</strong> ".$FechaAlta."<br>
						<strong>Nombre del responsable:</strong> ".$ResponsableNombre."<br>
						<strong>Tel??fono del responsable:</strong> " . $ResponsableTelefono."<br>
						<strong>Email del responsable:</strong> ".strtoupper($ResponsableEmail)."<br>
						<strong>DNI del responsable:</strong> ".$ResponsableDNI."<br>
						<strong>Nombre del Equipo:</strong> ".$NombreEquipo."<br>
						<strong>Categor??a:</strong> ".$Categoria."<br>
						<strong>Equipaci??n principal:</strong> ".$ColorEquipacionPrincipal."<br>
						<strong>Equipaci??n secundaria:</strong> ".$ColorEquipacionSecundaria."<br>
						<strong>D??a del partido:</strong> ".$DiaJuego."<br>
						<strong>Hora seleccionada:</strong> ".$HoraJuego."<br>
						<strong>Jugadores:</strong><br>				
					</p>".$contenido_email_jugadores;
				
				//  Envio del email al responsable con copia a ligabasket@
				envios_emails::enviar_email_liga_alqueria($contenido_email, $ResponsableEmail, $ResponsableNombre);
				
				//  Devolvemos OK. La redirecci??n a la p??gina de confirmaci??n se hace en el JavaScript
				echo json_encode(array(
					"response"          => "success",
					"url_redireccion"   => "index.php?r=formularios/LigaAlqueriaFormPagoOficinasOK",
					"message"           => "La inscripci??n en la Liga Alqueria se ha recibido correctamente"));    
			}
		}

	
		// Pantalla de confirmacion OK para ingreso por transferencia
		public function actionLigaAlqueriaFormPagoOficinasOK() {
			require "config.php";

			vistaSimple("layout_liga_alqueria_oficinas_ok");
		}


		// Pantalla de confirmacion OK para ingreso por TPV 
		public function actionLigaAlqueriaFormPagoTPVOK() {
			require "config.php";

			vistaSimple("layout_liga_alqueria_tpv_ok");
		}


		// Pantalla de confirmacion KO para ingreso por TPV 
		public function actionLigaAlqueriaFormPagoTPVKO() {
			require "config.php";

			vistaSimple("layout_liga_alqueria_tpv_ko");
		}


		/************************************************************
			CAMPUS NAVIDAD 2019  esta en VALENCIA BASKET  , ESTO NO VALE
		*************************************************************/

		// Recibe el formulario de inscripci??n al campus de navidad L??Alqueria del Basket https://servicios.alqueriadelbasket.com/?r=index/campusnavidad
		public function actionCampusNavidad2019Form() {
			error_log(print_r($_POST,1));
			error_log(print_r($_FILES,1));
			
			require "models/mailers.php";
			require "PHPMailer/envios_emails.php";

			/************************************************************
			*   1. Procesamos la informaci??n del jugador y tutor
			***********************************************************/
			$FechaAlta                  =   date("Y-m-d H:i:m");
			$pension                    =   strtoupper(filter_input(INPUT_POST, 'pension',              FILTER_SANITIZE_STRING));
			if($pension==="Completa"){$importe=195;}else{$importe=140;}
			$transporte                 =   strtoupper(filter_input(INPUT_POST, 'transporte',           FILTER_SANITIZE_STRING));
			$jugador_nombre             =   strtoupper(filter_input(INPUT_POST, 'jugador_nombre',           FILTER_SANITIZE_STRING));
			$jugador_apellidos          =   strtoupper(filter_input(INPUT_POST, 'jugador_apellidos',        FILTER_SANITIZE_STRING));
			$jugador_fecha_nacimiento   =   strtoupper(filter_input(INPUT_POST, 'jugador_fecha_nacimiento', FILTER_SANITIZE_STRING));

			$jugador_dni                =   strtoupper(filter_input(INPUT_POST, 'jugador_dni',              FILTER_SANITIZE_STRING));
			$jugador_dni                =   self::sanitize_nombre_para_columna_myslq(strtoupper(trim(filter_input(INPUT_POST, 'jugador_dni',    FILTER_SANITIZE_STRING))));

			$jugador_club               =   strtoupper(filter_input(INPUT_POST, 'jugador_club',             FILTER_SANITIZE_STRING));
			$jugador_tallacamiseta      =   strtoupper(filter_input(INPUT_POST, 'jugador_tallacamiseta',    FILTER_SANITIZE_STRING));

			$enfermedad                 =   strtoupper(filter_input(INPUT_POST, 'enfermedad',           FILTER_SANITIZE_STRING));
			$alergias                   =   strtoupper(filter_input(INPUT_POST, 'alergias',             FILTER_SANITIZE_STRING));
			$tratamientosmedicos        =   strtoupper(filter_input(INPUT_POST, 'tratamientosmedicos',  FILTER_SANITIZE_STRING));
			
			$operacionreciente          =   strtoupper(filter_input(INPUT_POST, 'operacionreciente',   FILTER_SANITIZE_STRING));
			$observaciones              =   strtoupper(filter_input(INPUT_POST, 'observaciones',        FILTER_SANITIZE_STRING));
			$fotocopiasip               =   strtoupper(filter_input(INPUT_POST, 'fotocopiasip',         FILTER_SANITIZE_STRING));
			$resguardoingreso           =   strtoupper(filter_input(INPUT_POST, 'resguardoingreso',     FILTER_SANITIZE_STRING));

			$tutor_nombre               =   strtoupper(filter_input(INPUT_POST, 'tutor_nombre',         FILTER_SANITIZE_STRING));
			$tutor_apellidos            =   strtoupper(filter_input(INPUT_POST, 'tutor_apellidos',      FILTER_SANITIZE_STRING));
			$tutor_dni                  =   strtoupper(filter_input(INPUT_POST, 'tutor_dni',            FILTER_SANITIZE_STRING));
			$tutor_dni                  =   self::sanitize_nombre_para_columna_myslq(strtoupper(trim(filter_input(INPUT_POST, 'tutor_dni',  FILTER_SANITIZE_STRING))));

			$tutor_direccion            =   strtoupper(filter_input(INPUT_POST, 'tutor_direccion',      FILTER_SANITIZE_STRING));
			$tutor_numero               =   strtoupper(filter_input(INPUT_POST, 'tutor_numero',         FILTER_SANITIZE_STRING));
			$tutor_piso                 =   strtoupper(filter_input(INPUT_POST, 'tutor_piso',           FILTER_SANITIZE_STRING));
			$tutor_puerta               =   strtoupper(filter_input(INPUT_POST, 'tutor_puerta',         FILTER_SANITIZE_STRING));

			$tutor_cp                   =   strtoupper(filter_input(INPUT_POST, 'tutor_cp',             FILTER_SANITIZE_STRING));
			$tutor_provincia            =   strtoupper(filter_input(INPUT_POST, 'tutor_provincia',      FILTER_SANITIZE_STRING));
			$tutor_poblacion            =   strtoupper(filter_input(INPUT_POST, 'tutor_poblacion',      FILTER_SANITIZE_STRING));
			
			$tutor_telefono             =   strtoupper(filter_input(INPUT_POST, 'tutor_telefono',       FILTER_SANITIZE_STRING));
			$tutor_email                =   strtolower(filter_input(INPUT_POST, 'tutor_email',          FILTER_SANITIZE_STRING));
			
			$tipopago                           =   filter_input(INPUT_POST, 'oficinasotpv',  FILTER_SANITIZE_STRING);
			$condiciones_uso_autoriza_datos     =   filter_input(INPUT_POST, 'autorizodatos',   FILTER_SANITIZE_STRING);
			$condiciones_uso_autoriza_imagen    =   filter_input(INPUT_POST, 'autorizoimagen',  FILTER_SANITIZE_STRING);
			
			if($condiciones_uso_autoriza_datos=="true")
			{   $condiciones_uso_autoriza_datos=1;}
			else
			{   $condiciones_uso_autoriza_datos=0;}
			
			if($condiciones_uso_autoriza_imagen=="true")
			{   $condiciones_uso_autoriza_imagen=1;}
			else
			{   $condiciones_uso_autoriza_imagen=0;}
			
			
			/************************************************************
			 *   2. Validaci??n de EDAD
			 ***********************************************************/
			
			/************************************************************
			 *   3. Validaci??n de duplicado
			 ***********************************************************/

			/************************************************************
			 *   4. Procesamos los ficheros
			 ***********************************************************/
			$dir_subida         =   "img/inscripcionescampusnavidad/";
			$ruta_sip           =   "";
			$ruta_justificante  =   "";

			if(isset($_FILES["fotocopiasip"]["tmp_name"]))
			{
				$url_subida         =       $dir_subida.$_FILES["fotocopiasip"]["name"];
				//  $url_fichero_subida =   $_FILES["justificante_pago"]["name"];
				
				//  Movemos el fichero
				if(move_uploaded_file($_FILES["fotocopiasip"]["tmp_name"],$url_subida))
				{
					// ahora lo renombramos 
					if(!empty($jugador_dni))
					{   $ruta_sip   =   "Jugador-".$jugador_dni."-Tutor-".$tutor_dni."-SIP";   }
					else
					{   $ruta_sip   =   "Tutor-".$tutor_dni."-SIP";   }
					
					$array_fichero_y_extension  = explode(".",$_FILES["fotocopiasip"]["name"]);
					$numerodeelementos          = count($array_fichero_y_extension);
					$extension                  = $array_fichero_y_extension[$numerodeelementos-1];

					rename($url_subida,$dir_subida.$ruta_sip."-".date("Y_m_d_H_i_s").".".$extension);
				}
				else
				{
					error_log(__FILE__.__FUNCTION__.__LINE__);
				}
			}
			
			if(isset($_FILES["resguardoingreso"]["tmp_name"]))
			{
				$url_subida         =       $dir_subida.$_FILES["resguardoingreso"]["name"];
				
				//  Movemos el fichero
				if(move_uploaded_file($_FILES["resguardoingreso"]["tmp_name"],$url_subida))
				{
					// ahora lo renombramos 
					if(!empty($jugador_dni))
					{   $ruta_justificante   =   "Jugador-".$jugador_dni."-Tutor-".$tutor_dni."-Justificante";   }
					else
					{   $ruta_justificante   =   "Tutor-".$tutor_dni."-Justificante";   }
					
					$array_fichero_y_extension  = explode(".",$_FILES["resguardoingreso"]["name"]);
					$numerodeelementos          = count($array_fichero_y_extension);
					$extension                  = $array_fichero_y_extension[$numerodeelementos-1];

					rename($url_subida,$dir_subida.$ruta_justificante."-".date("Y_m_d_H_i_s").".".$extension);
				}
				else
				{
					error_log(__FILE__.__FUNCTION__.__LINE__);
				}
			}
			
			
			/************************************************************
			*   5. Hacemos el insert
			***********************************************************/
			
			$ultimoinsertado=mailers::findLastCampusNavidad();
			$numeropedido="CAM-NAV-".($ultimoinsertado['id']+1);
			
			$nuevoformulario = mailers::newFormCampusNavidad(
				$FechaAlta,         "campusnavidad2019",        $pension,               $transporte,        $jugador_nombre,    
				$jugador_apellidos, $jugador_fecha_nacimiento,  $jugador_dni,           $jugador_club,      $jugador_tallacamiseta,   
				$enfermedad,        $alergias,                  $tratamientosmedicos,   $operacionreciente, $observaciones, 
				$ruta_sip,          $ruta_justificante,         $tutor_nombre,          $tutor_apellidos,   $tutor_dni, 
				$tutor_direccion,   $tutor_numero,              $tutor_piso,            $tutor_puerta,      $tutor_cp, 
				$tutor_provincia,   $tutor_poblacion,           $tutor_telefono,        $tutor_email,       $condiciones_uso_autoriza_datos, 
				$condiciones_uso_autoriza_imagen,   0,          $importe,               $tipopago,          $numeropedido
			);

		   
			/**************************************************************
			 * 6. Redirijimos al TPV o mostramos mensaje de confirmaci??n 
			 **************************************************************/
			if($tipopago=="TPV")
			{
				echo json_encode(array(
					"response"          =>  'success',
					"url_redireccion"   =>  'https://valenciabasket.com/campusnavidad/tpv/tpv.php?pedido='.$numeropedido.'&titular='.$tutor_nombre.' '.$tutor_apellidos.'&importe='.$importe,
					"message"           =>  'La inscripci??n en el campus de navidad se ha recibido.'));
			}
			else if($tipopago=="OFICINAS")
			{
				//  Aqu?? enviamos el email de confirmaci??n OFICINAS. Hay que editar el contenido. 
				/*  $contenido_email= "<p>Hemos recibido la inscripci??n a la liga de L'Alqueria del Basket. Estos son los datos recibidos:</p>
					<p>
						<strong>Fecha de alta:</strong> ".$FechaAlta."<br>
						<strong>Nombre del responsable:</strong> ".$ResponsableNombre."<br>
						<strong>Tel??fono del responsable:</strong> " . $ResponsableTelefono."<br>
						<strong>Email del responsable:</strong> ".strtoupper($ResponsableEmail)."<br>
						<strong>DNI del responsable:</strong> ".$ResponsableDNI."<br>
						<strong>Nombre del Equipo:</strong> ".$NombreEquipo."<br>
						<strong>Categor??a:</strong> ".$Categoria."<br>
						<strong>Equipaci??n principal:</strong> ".$ColorEquipacionPrincipal."<br>
						<strong>Equipaci??n secundaria:</strong> ".$ColorEquipacionSecundaria."<br>
						<strong>D??a del partido:</strong> ".$DiaJuego."<br>
						<strong>Hora seleccionada:</strong> ".$HoraJuego."<br>
						<strong>Jugadores:</strong><br>				
					</p>".$contenido_email_jugadores;
				
				//  Envio del email al responsable con copia a ligabasket@
				//  envios_emails::enviar_email_liga_alqueria($contenido_email, $ResponsableEmail, $ResponsableNombre);*/
				
				//  Devolvemos OK. La redirecci??n a la p??gina de confirmaci??n se hace en el JavaScript
				echo json_encode(array(
					"response"          => "success",
					"url_redireccion"   => "https://servicios.alqueriadelbasket.com/index.php?r=formularios/CampusNavidad2019PagoOficinasOK",
					"message"           => "La inscripci??n en el campus de navidad se ha recibido."));
			}
		}


		// Pantalla de confirmacion OK para ingreso por transferencia
		public function actionCampusNavidad2019PagoOficinasOK() {
			require "config.php";

			vistaSimple("layout_campus_navidad_2019_oficinas_ok");
		}


		// Pantalla de confirmacion OK para ingreso por TPV 
		public function actionCampusNavidad2019PagoTPVOK() {
			require "config.php";

			vistaSimple("layout_campus_navidad_2019_tpv_ok");
		}


		// Pantalla de confirmacion KO para ingreso por TPV 
		public function actionCampusNavidad2019PagoTPVKO() {
			require "config.php";

			vistaSimple("layout_campus_navidad_2019_tpv_ko");
		}


		/*  campus worcester */
		public function actionOk() {

			require "models/skillcamp.php";

			$codigo = $_GET['codigo'];

			$pagado = 1;

			if (isset($_SESSION['actualizar_entidad_pagos'])) {

				$actualizaestado = skillcamp::actualizapagadocampusworcester($codigo, $pagado);

				$contenidocorreo = skillcamp::damedatoscampusworcester($codigo);

				$contenidocorreo['fecha_nacimiento'] = date("d/m/Y", strtotime($contenidocorreo['fecha_nacimiento']));
				$contenidocorreo['expedicion_pasaporte'] = date("d/m/Y", strtotime($contenidocorreo['expedicion_pasaporte']));
				$contenidocorreo['caducidad_pasaporte'] = date("d/m/Y", strtotime($contenidocorreo['caducidad_pasaporte']));

				$contenido = "Nombre y apellidos: " . $contenidocorreo['nombre'] . " " . $contenidocorreo['apellidos'] . 
				"<br>Fecha de nacimiento: " . $contenidocorreo['fecha_nacimiento'] . 
				"<br>Tel??fono: " . $contenidocorreo['telefono'] . 
				"<br>Tel??fono M??vil: " . $contenidocorreo['telefono_movil'] . 
				"<br>Correo electr??nico: " . $contenidocorreo['email'] . 
				"<br>Pasaporte: " . $contenidocorreo['pasaporte'] . 
				"<br>Fecha de expedici??n: " . $contenidocorreo['expedicion_pasaporte'] . 
				"<br>Fecha de caducidad: " . $contenidocorreo['caducidad_pasaporte'] . 
				"<br>Nivel de ingl??s hablado: " . $contenidocorreo['ingles_hablado'] . 
				"<br>Nivel de ingl??s escrito: " . $contenidocorreo['ingles_escrito'] . 
				"<br>Tratamientos m??dicos: " . $contenidocorreo['tratamientos_medicos'] . 
				"<br>Alergias: " . $contenidocorreo['alergias'] . 
				"<br>Club: " . $contenidocorreo['equipo'] . 
				"<br>Categor??a: " . $contenidocorreo['categoria'] . 
				"<br>Altura: " . $contenidocorreo['altura'] . 
				"<br>Talla de ropa: " . $contenidocorreo['talla_ropa'];

				$enviodecorreo = skillcamp::mailssend($contenidocorreo['numero_pedido'], $contenido, "Ficha inscripci??n Campus Worcester", $contenidocorreo['email']);
				$enviodecorreo2 = skillcamp::mailssend($contenidocorreo['numero_pedido'], $contenido, "Ficha inscripci??n Campus Worcester", "campusworcester@valenciabasket.com");

				if ($enviodecorreo) {
					vistaSimple("layout_ok");
				}
				else{
					vistaSimple("layout_ko");
				}
			}
		}


		public function actionokpagooficina() {
			require "config.php";

			vistaSimple("layout_ok_pago_oficina");
		}


		public function actionKo() {
			require "config.php";

			vistaSimple("layout_ko");
		}



                                    //  inscripciones escuela y cantera 20-21
                                    /** OBSOLETO public function actionfindByInscDNI(){
                                        error_log(__FILE__.__LINE__." METODO OBSOLETO. Hacemos die;");die;
                                        require "models/inscripciones_escuela_y_cantera.php";

                                        $datos = inscripciones_escuela_y_cantera::findByDNITutor( $_POST['dni'], $_POST['categoria'] );

                                        echo json_encode(array(
                                                        "response" => "Consulta OK",
                                                        "datos" => $datos));
                                    }
                                    */

                                    /** OBSOLETO 
                                    public function actionfindByIDTutor(){
                                         error_log(__FILE__.__LINE__." METODO OBSOLETO. Hacemos die;");die;
                                        require "models/inscripciones.php";

                                        $datos = inscripciones::findByDNITutor( $_POST['dni'], $_POST['categoria'] );

                                        echo json_encode(array(
                                                        "response" => "Consulta OK",
                                                        "datos" => $datos));
                                    }
                                    */
				
		/*  sanitize_nombre_para_columna_myslq()    indica si el string enviado por par??metro cumple la regex para atributos mysql:
		*  Acepta: 
		*      a-z
		*      A-Z
		*      0-9
		*      _
		*  M??s informaci??n en https://regexr.com/   */

		private static function sanitize_nombre_para_columna_myslq($string)	{
		    $unwanted_array = array(' '=>'_', '.'=>'','-'=>'_', '>'=>'_',
			   '??'=>'S', '??'=>'s', '??'=>'Z', '??'=>'z', '??'=>'A', '??'=>'A', '??'=>'A', '??'=>'A', '??'=>'A', '??'=>'A', '??'=>'A', '??'=>'C', '??'=>'E', '??'=>'E',
			   '??'=>'E', '??'=>'E', '??'=>'I', '??'=>'I', '??'=>'I', '??'=>'I', '??'=>'NY', '??'=>'O', '??'=>'O', '??'=>'O', '??'=>'O', '??'=>'O', '??'=>'O', '??'=>'U',
			   '??'=>'U', '??'=>'U', '??'=>'U', '??'=>'Y', '??'=>'B', '??'=>'Ss', '??'=>'a', '??'=>'a', '??'=>'a', '??'=>'a', '??'=>'a', '??'=>'a', '??'=>'a', '??'=>'c',
			   '??'=>'e', '??'=>'e', '??'=>'e', '??'=>'e', '??'=>'i', '??'=>'i', '??'=>'i', '??'=>'i', '??'=>'o', '??'=>'ny', '??'=>'o', '??'=>'o', '??'=>'o', '??'=>'o',
			   '??'=>'o', '??'=>'o', '??'=>'u', '??'=>'u', '??'=>'u', '??'=>'y', '??'=>'b', '??'=>'y' );

		   $str    =   strtr( $string, $unwanted_array );

		   $regex  =   '/[a-zA-Z_0-9]/';

		   if (preg_match($regex, $str)) {
			   return $str;
		   }
		   else {
			   error_log(__FILE__.__LINE__);
			   error_log("El string: ".$string." ha generado un error en sanitize_nombre_para_columna_myslq()");
			   return false;
		   }
		}


		/************************************************************************
		I jornada de formaci??n de la C??tedra de baloncesto L???Alqueria del Basket
		************************************************************************/
		public function actionJornadasFormacionForm() {
			if (isset($_POST['nombre'])) {
				require "models/inscripciones.php";

				$fecharegistro= date("Y-m-d");
					
				$importe=15;
				$activo=1;

				$nombre 			= $_POST['nombre'];
				$apellidos 			= $_POST['apellidos'];
				$dni 				= $_POST['dni'];
				$email 				= $_POST['email'];

				// Quitamos los guiones
				$dni = str_replace("-", "", $dni);
				// Quitamos los espacios
				$dni = str_replace(" ", "", $dni);
				// Quitamos los puntos
				$dni = str_replace(".", "", $dni);


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

				$universitario 				= $_POST['universitario'];
				$certificado 				= $_POST['certificadoasistencia'];


				/* Formateo Nombre Imagen SIP */

				// explode: parte en trozos el string cada vez que encuentre el signo de puntuaci??n "."

				$valores = explode(".", $_FILES['resguardo']['name']);

				// Guardamos la extensi??n original del archivo subido
				$extension = $valores[count($valores)-1];


				// Formateamos el nombre del ni??o...
				$nombre_base = $_POST['nombre'];
				// Sustituimos los espacios por guiones
				$nombre_format = str_replace ( " " , "-" , $nombre_base);
				// Sustituimos los puntos por guiones
				$nombre_format = str_replace ( "." , "-" , $nombre_format);


				// Formateamos los apellidos del ni??o...
				$apellidos_base = $_POST['apellidos'];
				// Sustituimos los espacios por guiones
				$apellidos_format = str_replace ( " " , "-" , $apellidos_base);
				// Sustituimos los puntos por guiones
				$apellidos_format = str_replace ( "." , "-" , $apellidos_format);


				// Quitamos todos los acentos, e??es y car??cteres raros
				setlocale(LC_ALL, 'en_US.UTF8');
				$nombre_format = preg_replace("/[^a-zA-Z0-9\_\-]+/", '',iconv('UTF-8', 'ASCII//TRANSLIT', $nombre_format));
				$apellidos_format = preg_replace("/[^a-zA-Z0-9\_\-]+/", '',iconv('UTF-8', 'ASCII//TRANSLIT', $apellidos_format));

				// Concatenamos y guardamos el nombre y apellidos del ni??o formateados (para el nombre del archivo SIP)
				$nombre_y_apellidos_format = $nombre_format."-".$apellidos_format;

				// Concatenamos y guardamos el nombre del ni??o y DNI del tutor formateados (para comparar con los registros de la BBDD)
				$nombre_ninyo_y_dnitutor = $nombre_format."-".$dnitutor;


				 /* Comprobamos si el registro ya existe en la BBDD antes de seguir */
				$todoslosregistros = inscripciones::comprobarRepetidosJornadaForm();
				foreach ($todoslosregistros as $registro) {
														
					// Formateamos el nombre del ni??o de la BBDD...
					$nombre_bbdd = $registro['nombre'];
					// Sustituimos los espacios por guiones
					$nombre_bbdd_format = str_replace ( " " , "-" , $nombre_bbdd);
					// Sustituimos los puntos por guiones
					$nombre_bbdd_format = str_replace ( "." , "-" , $nombre_bbdd_format);

					// Quitamos todos los acentos, e??es y car??cteres raros
					setlocale(LC_ALL, 'en_US.UTF8');
					$nombre_bbdd_format = preg_replace("/[^a-zA-Z0-9\_\-]+/", '',iconv('UTF-8', 'ASCII//TRANSLIT', $nombre_bbdd_format));
					
					// Concatenamos y guardamos el nombre del ni??o y el DNI del tutor de la BBDD formateados
					$nombre_bbdd_y_dnitutor = $nombre_bbdd_format."-".$registro['dni'];
					
					// Comprobamos si el nuevo registro ya existe en la BBDD para mostrar mensaje
					if (strcasecmp ($nombre_bbdd_y_dnitutor, $nombre_ninyo_y_dnitutor) == 0) {
						//Seg??n strcasecmp las dos cadenas son iguales

						echo "<script text='javascript' charset='utf-8'>
								alert('Lo sentimos pero ya se hab??a inscrito anteriormente. \\nSi tiene que realizar m??s gestiones, p??ngase en contacto con recepci??n de l??Alqueria en el tel??fono 961 215 543. ??Gracias!');
								window.location.replace('?r=index/principal');
							</script>";
						die;
					}
				}


				// Configuramos carpeta de guardado de im??genes
				$dir_subida = 'img/inscripcionesesjornadaformacion/';

				if ($_FILES['resguardo']['error'] == 0) {
					// Damos formato al nombre de la imagen 1
					$fichero1 		= $nombre_y_apellidos_format."-".date("d-m-Y-H-i-s").".".$extension;
					$ficherosubido1 = $dir_subida . $fichero1;

					// Guardamos la imagen 1 (si corresponde) en la carpeta del servidor
					move_uploaded_file($_FILES['resguardo']['tmp_name'], $ficherosubido1);
				}
				else {
					$ficherosubido1 = "";
				}



				$ultimopedido = escuela_navidad::findLastNumeroPedidoEscuelaNavidad();

				$numeropedido = $ultimopedido['MAX(id)'];

				$numeropedido = $numeropedido + 1;

				$numeropedido = str_pad($numeropedido, 5, "0", STR_PAD_LEFT);

				$numeropedido = $numeropedido . "enav19";

				//echo $numeropedido;
				//die;

				$enviar = $_POST['enviar'];
				$pagado=0;


				// Controlamos si se va a pagar con tarjeta o en oficinas
				if ($enviar == "tarjeta") {
					$tipopago = "ONLINE";
					$nuevoformulario = inscripciones::newFormEJornadaFormacion($fecharegistro,  $nombre, $apellidos,  $dni, $email, $universitario, $certificado, $pagado, $importe, $activo, $evento,$autorizodatos,$autorizoimagen);
					
					if ($nuevoformulario) {
						header('Location: https://servicios.alqueriadelbasket.com/tpv_escuelanavidad/tpv.php?pedido=' . $numeropedido . '&titular=' . $nombreapellidos . '&importe=' . $importe);
					}
					else {
						echo "<script text='javascript' charset='utf-8'>
								alert('Parece que hubo un error, int??ntelo de nuevo m??s tarde.');
								window.location.replace('?r=index/principal');
							</script>";
						die;
					}
				}
				elseif ($enviar == "oficina") {
					$tipopago = "OFICINA";
					$nuevoformulario = escuela_navidad::newFormEscuelaNavidad($fecharegistro, $categoria, $opcion, $textoDiasSueltos, $nombre, $apellidos, $fechanacimiento, $dni, $club, $aspectomedico, $ficherosubido1, $ficherosubido2, $nombretutor, $apellidostutor, $dnitutor, $direccion, $numero, $piso, $puerta, $cp, $provincia, $poblacion, $telefonotutor, $emailtutor, $autorizodatos, $autorizoimagen, $pagado, $tipopago, $numeropedido,$importe);

					if ($nuevoformulario) {
						//eader('Location: http://localhost/serviciosalqueria/?r=escuelanavidad/okpagooficina&pedido=' . $numeropedido);
						header('Location: https://servicios.alqueriadelbasket.com/?r=escuelanavidad/okpagooficina&pedido=' . $numeropedido);
					}
					else {
						echo "<script text='javascript' charset='utf-8'>
								alert('Parece que hubo un error, int??ntelo de nuevo m??s tarde.');
								window.location.replace('?r=index/principal');
							</script>";
						die;
					}
				}
			}
		}

		/********************************************************
			ACCION PARA GENERAR EL CODIGO DE DESCUENTO
		********************************************************/
		public function actionGenerarCodigoDescuento() {

			require "models/shootingcamp.php";

			$jugadores = shootingcamp::findAllJugadores();

			$caracteres = [
					'1', '2', '3', '4', '5', '6', '7', '8', '9', 
					'0', 'Q', 'W', 'E', 'R', 'T', 'Y', 'U', 'I', 
					'O', 'P', 'A', 'S', 'D', 'F', 'G', 'H', 'J', 
					'K', 'L', 'Z', 'X', 'C', 'V', 'B', 'N', 'M' ];

			foreach ( $jugadores as $jugador ) {
				
				$codigo = "";

				for( $r = 1 ; $r <= 5 ; $r++ ){

					$codigo = $codigo . "" . $caracteres[ rand(0, 35) ];

				}	

				$nuevoCodigo = shootingcamp::insertCodigo( $codigo, $jugador["dni_jugador"], $jugador["dni_tutor"] );

				error_log( $codigo . " / " . $jugador["dni_jugador"] . " & " . $jugador["dni_tutor"] );			
			}
		}

		/*Formulario IBIZA*/
		public function actionIbiza() {
			require "models/ibiza.php";

			// Fecha l??mite
			$ano = date("2020");

			$fechanacimiento = $_POST['fechanacimiento_ibiza'];

			$dia_nacimiento = date( "d", strtotime( $fechanacimiento ) );
			$mes_nacimiento = date( "m", strtotime( $fechanacimiento ) );
			$ano_nacimiento = date( "Y", strtotime( $fechanacimiento ) );

			// Ya no habr??a m??s condiciones, ahora simplemente restamos los a??os y mostramos el resultado como su edad
			$edad = ( $ano - $ano_nacimiento );

			// Si ha nacido dentro del rango de a??os permitido, seguimos...
			if ( $edad >= 5 && $edad <= 17 ) {
				/*****************************************VALIDAR REPETIDOS************************************************+*/
				/*COMO IDEA, BUSCAR POR DNI DEL JUGADOR Y DEL TUTOR, EN EL CASO DEL TUTOR, COMPROBAR NOMBRE*/
				//Declaraci??n de variables
				$evento             = "Campus Ibiza 2020";
				$fecharegistro      = date("Y-m-d");
				$genero             = $_POST['genero_ibiza'];
				$nombre             = $_POST['nombre_ibiza'];
				$apellidos          = $_POST['apellidos_ibiza'];
				$dni                = $_POST['dni_ibiza'];
				$club               = $_POST['club_ibiza'];
				$tratamientosmedicos= $_POST['tratamientosmedicos_ibiza'];
				$nombretutor        = $_POST['nombretutor_ibiza'];
				$apellidostutor     = $_POST['apellidostutor_ibiza'];
				$dnitutor           = $_POST['dnitutor_ibiza'];
				$direccion          = $_POST['direccion_ibiza'];
				$numero             = $_POST['numero_ibiza'];
				$piso               = $_POST['piso_ibiza'];
				$puerta             = $_POST['puerta_ibiza'];
				$cp                 = $_POST['cp_ibiza'];
				$provincia          = $_POST['provincia_ibiza'];
				$poblacion          = $_POST['poblacion_ibiza'];
				$telefonotutor      = $_POST['telefonotutor_ibiza'];
				$emailtutor         = strtolower( $_POST['emailtutor_ibiza'] );
				if (isset($_POST['autorizodatos_ibiza'])) {
					$autorizodatos = "si";
				}
				else {
					$autorizodatos = "no";
				}

				if (isset($_POST['autorizoimagen_ibiza'])) {
					$autorizoimagen = "si";
				}
				else {
					$autorizoimagen = "no";
				}

				//Formateo nombre y subida Imagen SIP
					//Explode: parte en trozos el string cada vez que encuentre el signo de puntuaci??n "."
					$valores = explode(".", $_FILES['fotocopiasip_ibiza']['name']);
					// Guardamos la extensi??n original del archivo subido
					$extension = $valores[count($valores)-1];

					// Formateamos el nombre del ni??o...
					$nombre_base    = $_POST['nombre_ibiza'];
					// Sustituimos los espacios por guiones
					$nombre_format = str_replace ( " " , "-" , $nombre_base);
					// Sustituimos los puntos por guiones
					$nombre_format = str_replace ( "." , "-" , $nombre_format);

					// Formateamos los apellidos del ni??o...
					$apellidos_base = $_POST['apellidos_ibiza'];
					// Sustituimos los espacios por guiones
					$apellidos_format = str_replace ( " " , "-" , $apellidos_base);
					// Sustituimos los puntos por guiones
					$apellidos_format = str_replace ( "." , "-" , $apellidos_format);

					// Quitamos todos los acentos, e??es y car??cteres raros
					setlocale(LC_ALL, 'en_US.UTF8');
					$nombre_format      = preg_replace("/[^a-zA-Z0-9\_\-]+/", '',iconv('UTF-8', 'ASCII//TRANSLIT', $nombre_format));
					$apellidos_format   = preg_replace("/[^a-zA-Z0-9\_\-]+/", '',iconv('UTF-8', 'ASCII//TRANSLIT', $apellidos_format));

					// Concatenamos y guardamos el nombre y apellidos del ni??o formateados (para el nombre del archivo SIP)
					$nombre_y_apellidos_format = $nombre_format."-".$apellidos_format;

					// Concatenamos y guardamos el nombre del ni??o y DNI del tutor formateados (para comparar con los registros de la BBDD)
					$nombre_ninyo_y_dnitutor = $nombre_format."-".$dnitutor;

					// Movemos el SIP a su carpeta
					$dir_subida         = 'img/sipibiza/';
					$fichero            = $nombre_y_apellidos_format."-".date("d-m-Y-H-i-s").".".$extension;
					$fotocopiasipsubida = $dir_subida.$fichero;
					move_uploaded_file($_FILES['fotocopiasip_ibiza']['tmp_name'],$fotocopiasipsubida);

				// Preparamos datos para el formulario del TPV
				$nombreapellidos    = $nombre." ".$apellidos;

				// Controlamos si se va a pagar con tarjeta o en oficinas
				$enviar = $_POST['enviar_ibiza'];

				//validacion Dias sueltos
					$textoDiasSueltos="";
					$importe=0;
					//dia 1
						if( isset( $_POST['dia1'] ) ){
							if( $_POST['rdia1'] == "dia27jl-manyana" ){
								$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia1'];
								$importe = $importe + 20; 
							}else if( $_POST['rdia1'] == "dia27jl-completo" ){  
								$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia1'];                        
								$importe = $importe + 35; 
							}
							if( isset( $_POST['rdia1_matinal'] ) ){
								$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia1_matinal']; 
								$importe = $importe + 2; 
							}
						}
					//dia 2
						if( isset( $_POST['dia2'] ) ){
							if( $_POST['rdia2'] == "dia28jl-manyana" ){
								$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia2'];
								$importe = $importe + 20; 
							}else if( $_POST['rdia2'] == "dia28jl-completo" ){  
								$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia2'];                        
								$importe = $importe + 35; 
							}
							if( isset( $_POST['rdia2_matinal'] ) ){
								$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia2_matinal']; 
								$importe = $importe + 2; 
							}
						}
					//dia 3
						if( isset( $_POST['dia3'] ) ){
							if( $_POST['rdia3'] == "dia29jl-manyana" ){
								$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia3'];
								$importe = $importe + 20; 
							}else if( $_POST['rdia3'] == "dia29jl-completo" ){  
								$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia3'];                        
								$importe = $importe + 35; 
							}
							if( isset( $_POST['rdia3_matinal'] ) ){
								$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia3_matinal']; 
								$importe = $importe + 2; 
							}
						}
					//dia 4
						if( isset( $_POST['dia4'] ) ){
							if( $_POST['rdia4'] == "dia30jl-manyana" ){
								$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia4'];
								$importe = $importe + 20; 
							}else if( $_POST['rdia4'] == "dia30jl-completo" ){  
								$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia4'];                        
								$importe = $importe + 35; 
							}
							if( isset( $_POST['rdia4_matinal'] ) ){
								$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia4_matinal']; 
								$importe = $importe + 2; 
							}
						}
					//dia 5
						if( isset( $_POST['dia5'] ) ){
							if( $_POST['rdia5'] == "dia31jl-manyana" ){
								$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia5'];
								$importe = $importe + 20; 
							}else if( $_POST['rdia5'] == "dia31jl-completo" ){  
								$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia5'];                        
								$importe = $importe + 35; 
							}
							if( isset( $_POST['rdia5_matinal'] ) ){
								$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia5_matinal']; 
								$importe = $importe + 2; 
							}
						}
					//dia 6
						if( isset( $_POST['dia6'] ) ){
							if( $_POST['rdia6'] == "dia1ag-manyana" ){
								$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia6'];
								$importe = $importe + 20; 
							}else if( $_POST['rdia6'] == "dia1ag-completo" ){  
								$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia6'];                        
								$importe = $importe + 35; 
							}
							if( isset( $_POST['rdia6_matinal'] ) ){
								$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia6_matinal']; 
								$importe = $importe + 2; 
							}
						}
					
					//dia 7
						if( isset( $_POST['dia7'] ) ){
							if( $_POST['rdia7'] == "dia3ag-manyana" ){
								$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia7'];
								$importe = $importe + 20; 
							}else if( $_POST['rdia7'] == "dia3ag-completo" ){  
								$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia7'];                        
								$importe = $importe + 35; 
							}
							if( isset( $_POST['rdia7_matinal'] ) ){
								$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia7_matinal']; 
								$importe = $importe + 2; 
							}
						}
					//dia 8
						if( isset( $_POST['dia8'] ) ){
							if( $_POST['rdia8'] == "dia4ag-manyana" ){
								$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia8'];
								$importe = $importe + 20; 
							}else if( $_POST['rdia8'] == "dia4ag-completo" ){  
								$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia8'];                        
								$importe = $importe + 35; 
							}
							if( isset( $_POST['rdia8_matinal'] ) ){
								$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia8_matinal']; 
								$importe = $importe + 2; 
							}
						}
					//dia 9
						if( isset( $_POST['dia9'] ) ){
							if( $_POST['rdia9'] == "dia5ag-manyana" ){
								$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia9'];
								$importe = $importe + 20; 
							}else if( $_POST['rdia9'] == "dia5ag-completo" ){  
								$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia9'];                        
								$importe = $importe + 35; 
							}
							if( isset( $_POST['rdia9_matinal'] ) ){
								$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia9_matinal']; 
								$importe = $importe + 2; 
							}
						}
					//dia 10
						if( isset( $_POST['dia10'] ) ){
							if( $_POST['rdia10'] == "dia6ag-manyana" ){
								$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia10'];
								$importe = $importe + 20; 
							}else if( $_POST['rdia10'] == "dia6ag-completo" ){  
								$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia10'];                        
								$importe = $importe + 35; 
							}
							if( isset( $_POST['rdia10_matinal'] ) ){
								$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia10_matinal']; 
								$importe = $importe + 2; 
							}
						}
					//dia 11
						if( isset( $_POST['dia11'] ) ){
							if( $_POST['rdia11'] == "dia7ag-manyana" ){
								$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia11'];
								$importe = $importe + 20; 
							}else if( $_POST['rdia11'] == "dia7ag-completo" ){  
								$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia11'];                        
								$importe = $importe + 35; 
							}
							if( isset( $_POST['rdia11_matinal'] ) ){
								$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia11_matinal']; 
								$importe = $importe + 2; 
							}
						}
					//dia 12
						if( isset( $_POST['dia12'] ) ){
							if( $_POST['rdia12'] == "dia8ag-manyana" ){
								$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia12'];
								$importe = $importe + 20; 
							}else if( $_POST['rdia12'] == "dia8ag-completo" ){  
								$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia12'];                        
								$importe = $importe + 35; 
							}
							if( isset( $_POST['rdia12_matinal'] ) ){
								$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia12_matinal']; 
								$importe = $importe + 2; 
							}
						}
					
					//dia 13
						if( isset( $_POST['dia13'] ) ){
							if( $_POST['rdia13'] == "dia10ag-manyana" ){
								$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia13'];
								$importe = $importe + 20; 
							}else if( $_POST['rdia13'] == "dia10ag-completo" ){  
								$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia13'];                        
								$importe = $importe + 35; 
							}
							if( isset( $_POST['rdia13_matinal'] ) ){
								$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia13_matinal']; 
								$importe = $importe + 2; 
							}
						}
					//dia 14
						if( isset( $_POST['dia14'] ) ){
							if( $_POST['rdia14'] == "dia11ag-manyana" ){
								$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia14'];
								$importe = $importe + 20; 
							}else if( $_POST['rdia14'] == "dia11ag-completo" ){  
								$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia14'];                        
								$importe = $importe + 35; 
							}
							if( isset( $_POST['rdia14_matinal'] ) ){
								$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia14_matinal']; 
								$importe = $importe + 2; 
							}
						}
					//dia 15
						if( isset( $_POST['dia15'] ) ){
							if( $_POST['rdia15'] == "dia12ag-manyana" ){
								$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia15'];
								$importe = $importe + 20; 
							}else if( $_POST['rdia15'] == "dia12ag-completo" ){  
								$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia15'];                        
								$importe = $importe + 35; 
							}
							if( isset( $_POST['rdia15_matinal'] ) ){
								$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia15_matinal']; 
								$importe = $importe + 2; 
							}
						}
					//dia 16
						if( isset( $_POST['dia16'] ) ){
							if( $_POST['rdia16'] == "dia13ag-manyana" ){
								$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia16'];
								$importe = $importe + 20; 
							}else if( $_POST['rdia16'] == "dia13ag-completo" ){  
								$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia16'];                        
								$importe = $importe + 35; 
							}
							if( isset( $_POST['rdia16_matinal'] ) ){
								$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia16_matinal']; 
								$importe = $importe + 2; 
							}
						}
					//dia 17
						if( isset( $_POST['dia17'] ) ){
							if( $_POST['rdia17'] == "dia14ag-manyana" ){
								$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia17'];
								$importe = $importe + 20; 
							}else if( $_POST['rdia17'] == "dia14ag-completo" ){  
								$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia17'];                        
								$importe = $importe + 35; 
							}
							if( isset( $_POST['rdia17_matinal'] ) ){
								$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia17_matinal']; 
								$importe = $importe + 2; 
							}
						}
					//dia 18
						if( isset( $_POST['dia18'] ) ){
							if( $_POST['rdia18'] == "dia15ag-manyana" ){
								$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia18'];
								$importe = $importe + 20; 
							}else if( $_POST['rdia18'] == "dia15ag-completo" ){  
								$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia18'];                        
								$importe = $importe + 35; 
							}
							if( isset( $_POST['rdia18_matinal'] ) ){
								$textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia18_matinal']; 
								$importe = $importe + 2; 
							}
						}

					//  SEMANA 1
						if ( isset( $_POST['semana1'] ) ) {
						   
							if ( $_POST['rsem1'] == "completo" ) {
								$importe = $importe + 175;
								$semana1 = "sem1_comp";
							} else if ( $_POST['rsem1'] == "manyanas" ) {
								$importe = $importe + 80;
								$semana1 = "sem1_manyana";
							} else if ( $_POST['rsem1'] == "pension" ) {
								$importe = $importe + 350;
								$semana1 = "sem1_pension";
							}
							if( isset( $_POST['rsem1_matinal'] ) ){
								$importe = $importe + 10;
								$semana1 .= "/matinal";
							}
						}else{
							$semana1="";
						}
					//  SEMANA 2
						if ( isset( $_POST['semana2'] ) ) {
						   
							if ($_POST['rsem2'] == "completo") {
								$importe = $importe + 175;
								$semana2 = "sem2_comp";
							}else if ( $_POST['rsem2'] == "manyanas" ) {
								$importe = $importe + 80;
								$semana2 = "sem2_manyana";
							} else if ( $_POST['rsem2'] == "pension" ) {
								$importe = $importe + 350;
								$semana2 = "sem2_pension";
							}
							if( isset( $_POST['rsem2_matinal'] ) ){
								$importe = $importe + 10;
								$semana2 .= "/matinal";
							}
						}else{
							$semana2="";
						}
					//  SEMANA 3
						if (isset($_POST['semana3'])) {
						   
							if ($_POST['rsem3'] == "completo") {
								$importe = $importe + 175;
								$semana3 = "sem3_comp";
							}else if ( $_POST['rsem3'] == "manyanas" ) {
								$importe = $importe + 80;
								$semana3 = "sem3_manyana";
							}else if ( $_POST['rsem3'] == "pension" ) {
								$importe = $importe + 350;
								$semana3 = "sem3_pension";
							}
							if( isset( $_POST['rsem3_matinal'] ) ){
								$importe = $importe + 10;
								$semana3 .= "/matinal";
							}
						}else{
							$semana3="";
						}

				if ($enviar == "tarjeta") {
					error_log("Entramos en el pago con tarjeta");
					$tipopago           = "ONLINE";
					$numeropedido = "0";
					$fotocopiasip = "1";
					$nuevoformulario    = ibiza::newFormIbiza($fecharegistro, $semana1 ,$semana2 ,$semana3, $textoDiasSueltos, $genero, $nombre, $apellidos, $fechanacimiento, $dni, $club, $tratamientosmedicos, $fotocopiasipsubida, $nombretutor, $apellidostutor, $dnitutor, $direccion, $numero, $piso, $puerta, $cp, $provincia, $poblacion, $telefonotutor, $emailtutor, $autorizodatos, $autorizoimagen, $numeropedido, $importe, $evento, $tipopago);

					
					if ($nuevoformulario) {
						$ultimo = ibiza::findLast();
						$longitud = strlen( $ultimo["id"] );

						if ( $longitud == "1" ) {
							$numeroPedidoFinal = "000" . $ultimo["id"] . "-IBIZA";
						}else if( $longitud == "2" ){
							$numeroPedidoFinal = "00" . $ultimo["id"] . "-IBIZA";
						}else if( $longitud == "3" ){
							$numeroPedidoFinal = "0" . $ultimo["id"] . "-IBIZA";
						}else if( $longitud == "4" ){
							$numeroPedidoFinal = $ultimo["id"] . "-IBIZA";
						}

						$updateNumeroPedido = ibiza::updateAttribute( $ultimo["id"], "numeropedido", $numeroPedidoFinal,"si" );

						header('Location: tpv_campus_ibiza/tpv.php?pedido='.$numeroPedidoFinal.'&titular='.$nombreapellidos.'&importe='.$importe);
						//https://servicios.alqueriadelbasket.com/
						die;
					}
					else {
						echo "<script text='javascript' charset='utf-8'>
								alert('Parece que hubo un error. Int??ntelo de nuevo m??s tarde.');
								window.location.replace('?r=index/EscuelaVerano');
							</script>";
						die;
					}
				}
				elseif ($enviar == "oficina") {
					$tipopago           = "OFICINA";
					$numeropedido = "0";
					$fotocopiasip = "1";
					$nuevoformulario    = ibiza::newFormIbiza($fecharegistro, $semana1 ,$semana2 ,$semana3, $textoDiasSueltos, $genero, $nombre, $apellidos, $fechanacimiento, $dni, $club, $tratamientosmedicos, $fotocopiasipsubida, $nombretutor, $apellidostutor, $dnitutor, $direccion, $numero, $piso, $puerta, $cp, $provincia, $poblacion, $telefonotutor, $emailtutor, $autorizodatos, $autorizoimagen, $numeropedido, $importe, $evento, $tipopago);

					if ($nuevoformulario) {
						error_log("Lo ingresamos pero de locos");
						$ultimo = ibiza::findLast();
						$longitud = strlen( $ultimo["id"] );

						if ( $longitud == "1" ) {
							$numeroPedidoFinal = "000" . $ultimo["id"] . "-IBIZA";
						}else if( $longitud == "2" ){
							$numeroPedidoFinal = "00" . $ultimo["id"] . "-IBIZA";
						}else if( $longitud == "3" ){
							$numeroPedidoFinal = "0" . $ultimo["id"] . "-IBIZA";
						}else if( $longitud == "4" ){
							$numeroPedidoFinal = $ultimo["id"] . "-IBIZA";
						}

						$updateNumeroPedido = ibiza::updateAttribute( $ultimo["id"], "numeropedido", $numeroPedidoFinal,"si" );
						header('Location: ?r=formularios/okpagooficinaibiza&pedido=' . $numeroPedidoFinal);
						//https://servicios.alqueriadelbasket.com/
						//header('Location: http://localhost/serviciosalqueria2/?r=escuelaverano/okpagooficina&pedido=' . $numeropedido);
						die;
					}
					else {
						echo "<script text='javascript' charset='utf-8'>
								alert('Parece que hubo un error. Int??ntelo de nuevo m??s tarde.');
								window.location.replace('?r=index/EscuelaVeranoAlq');
							</script>";
						die;
					}
				}
			}
			// Si ha nacido fuera del rango de a??os permitido, mostramos mensaje de prohibici??n
			else {
				echo "<script text='javascript' charset='utf-8'>
						alert('Lo sentimos pero el ni??o/a debe tener entre 5 y 17 a??os para participar en la escuela. ??Gracias por contar con nosotros!');
						window.location.replace('?r=index/Ibiza');
					</script>";
				die;
			}
		}

		public function actionOkIbiza() {

            require "models/ibiza.php";

            $codigo = $_GET['codigo'];


            $contenidocorreo = ibiza::damedatosibiza($codigo);

            $updatePagado = ibiza::updateAttribute( $contenidocorreo["id"], "pagado", 1, "no" );


            $semanas = "";

            if ($contenidocorreo['semana1'] == "sem1_comp") {
                $semanas .= "-Semana del 27 de Julio al 1 de Agosto d??a completo";
            }
            else if ($contenidocorreo['semana1'] == "sem1_manyana") {
                $semanas .= "-Semana del 27 de Julio al 1 de Agosto solo ma??anas";
            }
            else if ($contenidocorreo['semana1'] == "sem1_pension") {
                $semanas .= "-Semana del 27 de Julio al 1 de Agosto pensi??n completa";
            }
            elseif ($contenidocorreo['semana1'] == "sem1_comp/matinal") {
                $semanas .= "-Semana del 27 de Julio al 1 de Agosto d??a completo y escuela matinal";
            }
            else if ($contenidocorreo['semana1'] == "sem1_manyana/matinal") {
                $semanas .= "-Semana del 27 de Julio al 1 de Agosto solo ma??anas y escuela matinal";
            }
            else if ($contenidocorreo['semana1'] == "sem1_pension/matinal") {
                $semanas .= "-Semana del 27 de Julio al 1 de Agosto pensi??n completa y escuela matinal";
            } 


            if ($contenidocorreo['semana2'] == "sem2_comp") {
                $semanas .= "-Semana del 3 al 8 de Agosto d??a completo";
            }
            elseif ($contenidocorreo['semana2'] == "sem2_manyana") {
                $semanas .= "-Semana del 3 al 8 de Agosto solo ma??anas";
            }
            else if ($contenidocorreo['semana2'] == "sem2_pension") {
                $semanas .= "-Semana del 3 al 8 de Agosto pensi??n completa";
            }
            else if ($contenidocorreo['semana2'] == "sem2_comp/matinal") {
                $semanas .= "-Semana del 3 al 8 de Agosto d??a completo y escuela matinal";
            }
            elseif ($contenidocorreo['semana2'] == "sem2_manyana/matinal") {
                $semanas .= "-Semana del 3 al 8 de Agosto solo ma??anas y escuela matinal";
            }
            else if ($contenidocorreo['semana2'] == "sem2_pension/matinal") {
                $semanas .= "-Semana del 3 al 8 de Agosto pensi??n completa y escuela matinal";
            }


            if ($contenidocorreo['semana3'] == "sem3_comp") {
                $semanas .= $semanas." -Semana del 10 al 15 de Agosto d??a completo";
            }
            elseif ($contenidocorreo['semana3'] == "sem3_manyana") {
                $semanas .= $semanas." -Semana del 10 al 15 de Agosto solo ma??anas";
            }
            else if ($contenidocorreo['semana3'] == "sem3_pension") {
                $semanas .= "-Semana del 10 al 15 de Agosto pensi??n completa";
            }
            else if ($contenidocorreo['semana3'] == "sem3_comp/matinal") {
                $semanas .= $semanas." -Semana del 10 al 15 de Agosto d??a completo y escuela matinal";
            }
            elseif ($contenidocorreo['semana3'] == "sem3_manyana/matinal") {
                $semanas .= $semanas." -Semana del 10 al 15 de Agosto solo ma??anas y escuela matinal";
            }
            else if ($contenidocorreo['semana3'] == "sem3_pension/matinal") {
                $semanas .= "-Semana del 10 al 15 de Agosto pensi??n completa y escuela matinal";
            }


            $contenidocorreo['fechanacimiento'] = date( "d/m/Y", strtotime( $contenidocorreo['fechanacimiento'] ) );

            $contenido =
            "G??nero: ".$contenidocorreo['genero'].
            "<br>Nombre y apellidos: ".$contenidocorreo['nombre']." ".$contenidocorreo['apellidos'].
            "<br>Fecha de nacimiento: ".$contenidocorreo['fechanacimiento'].
            "<br>DNI: ".$contenidocorreo['dni'].
            "<br>Semanas seleccionadas: ".$semanas.
            "<br>D??as sueltos: ".$contenidocorreo['diassueltos'].
            "<br>Importe: ".$contenidocorreo['importe']."???".
            "<br>Pago: ".$contenidocorreo['tipopago'].
            "<br>Club: ".$contenidocorreo['club'].
            "<br>Observaciones: ".$contenidocorreo['tratamientosmedicos'].
            "<br>Nombre y apellidos tutor/a: ".$contenidocorreo['nombretutor']." ".$contenidocorreo['apellidostutor'].
            "<br>Tel??fono del tutor/a: ". $contenidocorreo['telefonotutor'].
            "<br>Correo electr??nico: ".$contenidocorreo['emailtutor'];

            $enviodecorreo = ibiza::mailssend($contenidocorreo['numeropedido'], $contenido, "Ficha inscripci??n pago online Campus Ibiza", $contenidocorreo['emailtutor']);

            if ($enviodecorreo) {
                vistaSimple("layout_ok");
            }
            else {
                vistaSimple("layout_kocorreo");
            }
        }

		public function actionokpagooficinaibiza() {

            require "models/ibiza.php";

            $codigo = $_GET['pedido'];


            $contenidocorreo = ibiza::damedatosibiza($codigo);


            $semanas = "";

            if ($contenidocorreo['semana1'] == "sem1_comp") {
                $semanas .= "-Semana del 27 de Julio al 1 de Agosto d??a completo";
            }
            else if ($contenidocorreo['semana1'] == "sem1_manyana") {
                $semanas .= "-Semana del 27 de Julio al 1 de Agosto solo ma??anas";
            }
            else if ($contenidocorreo['semana1'] == "sem1_pension") {
                $semanas .= "-Semana del 27 de Julio al 1 de Agosto pensi??n completa";
            }
            elseif ($contenidocorreo['semana1'] == "sem1_comp/matinal") {
                $semanas .= "-Semana del 27 de Julio al 1 de Agosto d??a completo y escuela matinal";
            }
            else if ($contenidocorreo['semana1'] == "sem1_manyana/matinal") {
                $semanas .= "-Semana del 27 de Julio al 1 de Agosto solo ma??anas y escuela matinal";
            }
            else if ($contenidocorreo['semana1'] == "sem1_pension/matinal") {
                $semanas .= "-Semana del 27 de Julio al 1 de Agosto pensi??n completa y escuela matinal";
            } 


            if ($contenidocorreo['semana2'] == "sem2_comp") {
                $semanas .= "-Semana del 3 al 8 de Agosto d??a completo";
            }
            elseif ($contenidocorreo['semana2'] == "sem2_manyana") {
                $semanas .= "-Semana del 3 al 8 de Agosto solo ma??anas";
            }
            else if ($contenidocorreo['semana2'] == "sem2_pension") {
                $semanas .= "-Semana del 3 al 8 de Agosto pensi??n completa";
            }
            else if ($contenidocorreo['semana2'] == "sem2_comp/matinal") {
                $semanas .= "-Semana del 3 al 8 de Agosto d??a completo y escuela matinal";
            }
            elseif ($contenidocorreo['semana2'] == "sem2_manyana/matinal") {
                $semanas .= "-Semana del 3 al 8 de Agosto solo ma??anas y escuela matinal";
            }
            else if ($contenidocorreo['semana2'] == "sem2_pension/matinal") {
                $semanas .= "-Semana del 3 al 8 de Agosto pensi??n completa y escuela matinal";
            }


            if ($contenidocorreo['semana3'] == "sem3_comp") {
                $semanas .= $semanas." -Semana del 10 al 15 de Agosto d??a completo";
            }
            elseif ($contenidocorreo['semana3'] == "sem3_manyana") {
                $semanas .= $semanas." -Semana del 10 al 15 de Agosto solo ma??anas";
            }
            else if ($contenidocorreo['semana3'] == "sem3_pension") {
                $semanas .= "-Semana del 10 al 15 de Agosto pensi??n completa";
            }
            else if ($contenidocorreo['semana3'] == "sem3_comp/matinal") {
                $semanas .= $semanas." -Semana del 10 al 15 de Agosto d??a completo y escuela matinal";
            }
            elseif ($contenidocorreo['semana3'] == "sem3_manyana/matinal") {
                $semanas .= $semanas." -Semana del 10 al 15 de Agosto solo ma??anas y escuela matinal";
            }
            else if ($contenidocorreo['semana3'] == "sem3_pension/matinal") {
                $semanas .= "-Semana del 10 al 15 de Agosto pensi??n completa y escuela matinal";
            }



            $contenidocorreo['fechanacimiento'] = date("d/m/Y", strtotime($contenidocorreo['fechanacimiento']));

            $contenido =
            "G??nero: ".$contenidocorreo['genero'].
            "<br>Nombre y apellidos: ".$contenidocorreo['nombre']." ".$contenidocorreo['apellidos'].
            "<br>Fecha de nacimiento: ".$contenidocorreo['fechanacimiento'].
            "<br>DNI: ".$contenidocorreo['dni'].
            "<br>Semanas seleccionadas: ".$semanas.
            "<br>D??as sueltos: ".$contenidocorreo['diassueltos'].
            "<br>Importe: ".$contenidocorreo['importe']."???".
            "<br>Pago: ".$contenidocorreo['tipopago'].
            "<br>Club: ".$contenidocorreo['club'].
            "<br>Observaciones: ".$contenidocorreo['tratamientosmedicos'].
            "<br>Nombre y apellidos tutor/a: ".$contenidocorreo['nombretutor']." ".$contenidocorreo['apellidostutor'].
            "<br>Tel??fono del tutor/a: ". $contenidocorreo['telefonotutor'].
            "<br>Correo electr??nico: ".$contenidocorreo['emailtutor'];

            $enviodecorreo = ibiza::mailssend($contenidocorreo['numeropedido'], $contenido, "Ficha inscripci??n pago oficina Campus Ibiza", $contenidocorreo['emailtutor']);

            if ($enviodecorreo) {
                 vistaSimple("layout_ok_pago_oficina");
            }
            else {
                vistaSimple("layout_kocorreo");
            }
        }

        public function actionKoIbiza() {

            require "config.php";

            require "models/ibiza.php";

            $codigo = $_GET['pedido'];

            $error = $_GET['codigoerror'];

            $contenidocorreo = ibiza::damedatosibiza($codigo);

            $updatePagado = ibiza::updateAttribute( $contenidocorreo["id"], "error_tpv", $error, "si" );

            vistaSimple("layout_ko");
        }

        public function actionDatosFormEntrenador(){

        }

        // Gestiona el formulario "Datos Entrenador"
        public function actionDatosEntrenadorForm() {

            require "models/coaches.php";

            // Recibimos los datos

            $idEntrenador = filter_input(INPUT_POST, 'id_entrenador', FILTER_SANITIZE_NUMBER_INT);
            $email     =   filter_input(INPUT_POST, 'email',      FILTER_SANITIZE_STRING);
            $dni        =   trim(strtoupper(filter_input(INPUT_POST, 'dni',         FILTER_SANITIZE_STRING)));
            $telefono   =   trim(strtoupper(filter_input(INPUT_POST, 'telefono',    FILTER_SANITIZE_STRING)));
            $outputFile = "";
            $firmaEntrenador      =   $_POST["img_firma_entrenador"];
           // $_POST["img_firma_entrenador"];
            $archivo_foto               =   trim(strtoupper(filter_input(INPUT_POST, 'archivo_foto',         FILTER_SANITIZE_STRING)));
            $archivo_dni_frontal        =   trim(strtoupper(filter_input(INPUT_POST, 'archivo_dni_frontal',  FILTER_SANITIZE_STRING)));
            $archivo_dni_trasero        =   trim(strtoupper(filter_input(INPUT_POST, 'archivo_dni_trasero',  FILTER_SANITIZE_STRING)));

            include("lib/classes/toJpg.php");
            $toJpg = new toJpg('img/coaches/', $firmaEntrenador);
            $firmaEntrenador = $toJpg->getPath();

            $entrenador = coaches::findByid_coach($idEntrenador);

            //IMAGENES
            if(!empty($_FILES['foto']['tmp_name']))
            {
                $array_fichero_y_extension  =   explode(".",$_FILES["foto"]["name"]);
                $numerodeelementos          =   count($array_fichero_y_extension);
                $extension                  =   $array_fichero_y_extension[$numerodeelementos-1];
                $blob_foto                  =   "foto-id-entrenador-".$idEntrenador."-".date("Y-m-d-h-i-s").".".$extension;
                $archivo_movido             =   move_uploaded_file($_FILES["foto"]["tmp_name"], 'img/coaches/'.$blob_foto);
            }
            else
            {
                $blob_foto   =   $entrenador['foto'];
            }


            if(!empty($_FILES['dnifrontal']['tmp_name']))
            {
                $array_fichero_y_extension  =   explode(".",$_FILES["dnifrontal"]["name"]);
                $numerodeelementos          =   count($array_fichero_y_extension);
                $extension                  =   $array_fichero_y_extension[$numerodeelementos-1];
                $blob_dni_frontal           =   "dnifrontal-id-entrenador-".$idEntrenador."-".date("Y-m-d-h-i-s").".".$extension;
                $archivo_movido             =   move_uploaded_file($_FILES["dnifrontal"]["tmp_name"], 'img/coaches/'.$blob_dni_frontal);
            }
            else
            {
                $blob_dni_frontal   =   $entrenador['dni_delante'];
            }

            if(!empty($_FILES['dnitrasero']['tmp_name']))
            {
                $array_fichero_y_extension  =   explode(".",$_FILES["dnitrasero"]["name"]);
                $numerodeelementos          =   count($array_fichero_y_extension);
                $extension                  =   $array_fichero_y_extension[$numerodeelementos-1];
                $blob_dni_trasero           =   "dnitrasero-id-entrenador-".$idEntrenador."-".date("Y-m-d-h-i-s").".".$extension;
                $archivo_movido             =   move_uploaded_file($_FILES["dnitrasero"]["tmp_name"], 'img/coaches/'.$blob_dni_trasero);
            }
            else
            {
                $blob_dni_trasero   =   $entrenador['dni_detras'];
            }


            $emailUpdate = coaches::updateAttribute($idEntrenador, 'email_coach', $email, "si");

            $dniUpdate = coaches::updateAttribute($idEntrenador, 'dni', $dni, "si");

            $telefonoUpdate = coaches::updateAttribute($idEntrenador, 'telefono_coach', $telefono, "si");

            $firmaUpdate = coaches::updateAttribute($idEntrenador, 'firma', $firmaEntrenador, "si");

            $fotoUpdate = coaches::updateAttribute($idEntrenador, 'foto', $blob_foto, "si");

            $dniDelanteUpdate = coaches::updateAttribute($idEntrenador, 'dni_delante ', $blob_dni_frontal, "si");

            $dniDetrasUpdate = coaches::updateAttribute($idEntrenador, 'dni_detras', $blob_dni_trasero, "si");

            echo json_encode(array(
                "response" =>  "success",
                "message"  =>  "Hemos actualizado correctamente sus datos",
                "data" => $toJpg,
                ));
            die;

        }
	}

?>