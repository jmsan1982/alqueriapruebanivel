<?php
	class academyController
    {
		/**********************************
		*  PARTE PÚBLICA
		**********************************/

		//  FORMULARIO     /   PROCESA LOS DATOS 
		public function actionInscripcion()
        {
            error_log(__FILE__.__FUNCTION__.__LINE__);
            echo json_encode( array(
                "response"  => "error",
                "message"   => "La programación de este formulario ha cambiado de lugar. Por favor, hable con el equipo informático."
            ));
            die;
            
            /*  ANTIGUO */
            /*
			require "models/academy_inscripciones.php";

			//  Utils.php para validar cuenta bancaria
			require "includes/Utils.php";
			//  envios_emails.php para envios de emails. 
			require "PHPMailer/envios_emails.php";
            //  Idioma para el email o PDF
            require 'lang/publico_'.$_SESSION['idioma'].'.php';     

			// Gestión de errores de fechas
            try{
				$fecha_nacimiento           = filter_input(INPUT_POST, 'fechanacimiento',FILTER_SANITIZE_STRING);
				$fecha_nacimiento_procesada	= date( "Y-m-d", strtotime( $fecha_nacimiento ) );
				$fecha_nacimiento 			= date ( "Y", strtotime( $fecha_nacimiento ) );
			}
			catch(Exception $e)
			{
				error_log(__FILE__.__FUNCTION__.__LINE__);
				error_log("Ha ocurrido un error con la fecha de nacimiento con la inscripción hecha por: ".$_POST['email']);
				error_log(print_r($e,1));
				$fecha_nacimiento_procesada=date("Y-m-d");
			}
            
			try{
				if( $fecha_nacimiento > "2007" || $fecha_nacimiento < "2002" )
                {
					echo json_encode( array(
						"response"  => "error",
						"message"   => "La edad para poder inscribirse es entre 13 y 18 años."
					));
					die;
				}
			}
            catch(Exception $e)
			{
				error_log(__FILE__.__FUNCTION__.__LINE__);
				error_log("Ha ocurrido un error con la fecha de nacimiento con la inscripción hecha por: ".$_POST['email']);
				error_log(print_r($e,1));
				$fecha_nacimiento_procesada=date("Y-m-d");
			}

            
            //  Gestión de errores de cuenta bancaria
			$cuentaBancaria     =   $_POST['iban'] . $_POST['entidad'] . $_POST['oficina'] . $_POST['dc'] . $_POST['cuenta'];
			$cuentaValidada     =   Utils::validateEntity($cuentaBancaria);
			if(!$cuentaValidada)
			{
				echo json_encode(array(
					"response"  => "error",
					"message"   => $lang["ins_controller_cuenta_incorrecta"]
				));
				die;
			}
            
            
            //  INSERCIÓN
			try{
				$inscripcion_academy=academy_inscripciones::insert(
                null,                           strtoupper($_POST['nombre']),       strtoupper($_POST['apellidos']),    $fecha_nacimiento_procesada,    
                $_POST['telefono'],             $_POST['movil'],                    strtolower($_POST['email']),        strtoupper($_POST['tratamientosmedicos']),  
                strtoupper($_POST['alergias']), strtoupper($_POST['club']),         strtoupper($_POST['categoria']),    strtoupper($_POST['altura']),
                strtoupper($_POST['tallaropa']),strtoupper($_POST['trayectoria']),  strtoupper($_POST['titular']),      strtoupper($_POST['dnititular']),
                $_POST['iban'],                 $_POST['entidad'],                  $_POST['oficina'],                  $_POST['dc'], 
                $_POST['cuenta'],               0,                                  null);
			}
			catch(Exception $e)
			{
				error_log( __FILE__.__FUNCTION__.__LINE__ );
				error_log( "Ha ocurrido un error con el insert de la inscripcion" );
				error_log( print_r( $_POST, 1 ) );
				error_log( print_r( $e, 1 ) );
				echo json_encode( array(
					"response"  => "error",
					"message"   => "Ha ocurrido un error inesperado. Contacte con nosotros indicándonos su email ".$_POST['email']." para revisaremos la incidencia."
				));
				die;
			}

            
            //  Hecha la inserción, ahora, generamos el numero de pedido con el ID para ir al TPV
			try{
				if ( $inscripcion_academy["ID"] <= 9 ) {
					$numeropedido = "000" . $inscripcion_academy["ID"] . "academy";
				} else if( $inscripcion_academy["ID"] <= 99 ){
					$numeropedido = "00" . $inscripcion_academy["ID"] . "academy";
				} else if( $inscripcion_academy["ID"] <= 999 ){	
					$numeropedido = "0" . $inscripcion_academy["ID"] . "academy";
				} else if( $inscripcion_academy["ID"] >= 1000 ){
					$numeropedido =  $inscripcion_academy["ID"] . "academy";
				}

                $update_numeropedido_academy=academy_inscripciones::updateAttribute($inscripcion_academy["ID"], "numero_pedido", $numeropedido, "si");
			}
			catch(Exception $e)
			{
				error_log( __FILE__.__FUNCTION__.__LINE__ );
				error_log("Ha ocurrido un error con la insercion.");
				error_log( print_r( $_POST, 1 ) );
				error_log( print_r( $e, 1 ) );
				echo json_encode( array(
					"response"  => "error",
					"message"   => "Ha ocurrido un error inesperado. Contacte con nosotros indicándonos su email ".$_POST['email']." para revisaremos la incidencia."
				));
				die;
			}

            
            //Preparamos los datos para la URL del TPV
			$matricula  =   1000;
            $titular    =   $_POST['nombre']." ".$_POST['apellidos'];

            echo json_encode(array(
                "response"      	=> "sucess",
                "message" 			=> "tarjeta_ok",
                "url_redireccion" 	=> 'https://servicios.alqueriadelbasket.com/tpv_academy/tpv.php?pedido='.$numeropedido.'&titular='.$titular.'&importe='.$matricula.'&lang='.$_SESSION['idioma']
            ));
            die;
            */
		}
        
        /********************************************************
		*  MÉTODOS DEL BACK
		********************************************************/

		//  BACK / LISTADO GENERAL     /   CARGAR LA VISTA 
		public function actionBackListarInscripciones() {
			if (self::isLogged()) {
				require "models/academy_inscripciones.php";    

				$datos['inscripciones'] = academy_inscripciones::findAll();
			  
				vistaSinvista(array('datos' => $datos), "layoutsback/layout_back_alqueria_academy");
			}
		}

		//  BACK / LISTADO GENERAL     /   OPERACIÓN: EXPORTAR EXCEL
		public function actionBackExportarInscripciones() {
			if (self::isLogged()) {
				/*require "models/formularios_liga_alqueria.php";
				require "models/formularios_liga_alqueria_pagos.php";

				$equipos = formularios_liga_alqueria::findAll();

				error_reporting(0);

				$filename = "Inscripciones_LIGA_ALQUERIA_".date('Y_m_d_H_i_s').".csv";
				header('Content-Encoding: UTF-8');
				header('Content-Type: text/html; charset=utf-8');
				header("Content-Type: application/vnd.ms-excel; charset=utf-8");
				header("Content-Disposition: attachment; filename=".$filename."");
				header('Cache-Control: max-age=0');
				$show_column = false;

				$file = fopen('php://output', 'w'); //Archivo de descarga
				fputcsv($file, array(
				'Fecha Registro',   'Equipo',      iconv("UTF-8", "ISO-8859-1//TRANSLIT","División") ,     'Eq.principal', 'Eq.secundaria',  
				'Hora Juego',       'Responsable',      'DNI',          'Email',        'Telefono', 
				'Pago inicial',     'Pago_2',       'Pago_3',       'Pago_4',       'Activo'), ';', chr(0));

				foreach($equipos as $equipo) {
					$fecha_alta     =   new DateTime($equipo['FechaAlta']);
					$pagos          =   formularios_liga_alqueria_pagos::findByIDFormulariosLigaAlqueria($equipo['ID']);
					$array_pagos    =   array();

					for($contador_pagos=1;$contador_pagos<=4;$contador_pagos++) {
						$pago=$pagos[($contador_pagos-1)];
						if($pago['confirmacion_pago']=="1") {
							array_push($array_pagos, $pago['cantidad']);
						}
						else {
							array_push($array_pagos, "0");
						}
					}

					fputcsv($file, array(
						iconv("UTF-8", "ISO-8859-1//TRANSLIT",$fecha_alta->format('d/m/Y H:i')),
						iconv("UTF-8", "ISO-8859-1//TRANSLIT",$equipo['NombreEquipo']),
						iconv("UTF-8", "ISO-8859-1//TRANSLIT",$equipo['Subcategoria']), 
						iconv("UTF-8", "ISO-8859-1//TRANSLIT",$equipo['ColorEquipacionPrincipal']),
						iconv("UTF-8", "ISO-8859-1//TRANSLIT",$equipo['ColorEquipacionSecundaria']), 

						iconv("UTF-8", "ISO-8859-1//TRANSLIT",$equipo['HoraJuego']), 
						iconv("UTF-8", "ISO-8859-1//TRANSLIT",$equipo['ResponsableNombre']), 
						iconv("UTF-8", "ISO-8859-1//TRANSLIT",$equipo['ResponsableDNI']),
						iconv("UTF-8", "ISO-8859-1//TRANSLIT",$equipo['ResponsableEmail']), 
						iconv("UTF-8", "ISO-8859-1//TRANSLIT",$equipo['ResponsableTelefono']),

						$array_pagos[0], 
						$array_pagos[1],
						$array_pagos[2],
						$array_pagos[3],
						$equipo['activo']), ';', chr(0));
				}

			   exit;*/
			}
		}

		//  BACK / LISTADO GENERAL     /   OPERACIÓN: CARGA LOS DATOS DEL FORMULARIO DE INSCRIPCION
		public function actionCargarInscripcion() {
			if (self::isLogged()) {
				require 'models/academy_inscripciones.php';
				$inscripcion = academy_inscripciones::findByID($_POST["id"]);
				echo json_encode(array(
								"response"        	=> "success",
								"inscripcion" 		=> $inscripcion
							));
			}
		}

		//  BACK / LISTADO MODAL     /   OPERACIÓN: MODIFICAR LOS DATOS DE LA INSCRIPCION
		public function actionModificarAltaInscripcion() {
			if( self::isLogged() ){
				require "models/academy_inscripciones.php";

				$id = $_POST["id_para_editar"];

				$updatenombre = academy_inscripciones::updateAttribute($id, "nombre", $_POST["nombre_editar_inscripcion"], "si");

				$updateapellidos = academy_inscripciones::updateAttribute($id, "apellidos", $_POST["apellidos_editar_inscripcion"], "si");

				$updatefecha_nacimiento = academy_inscripciones::updateAttribute($id, "fecha_nacimiento", $_POST["fechanacimiento_editar_inscripcion"], "si");

				$updatetelefono = academy_inscripciones::updateAttribute($id, "telefono", $_POST["telefono_editar_inscripcion"], "no");

				$updatemovil = academy_inscripciones::updateAttribute($id, "movil", $_POST["movil_editar_inscripcion"], "no");

				$updateemail = academy_inscripciones::updateAttribute($id, "email", $_POST["email_editar_inscripcion"], "si");

				$updatetratamiento_medico = academy_inscripciones::updateAttribute($id, "tratamiento_medico", $_POST["tratamientosmedicos_editar_inscripcion"], "si");

				$updatealergia = academy_inscripciones::updateAttribute($id, "alergia", $_POST["alergias_editar_inscripcion"], "si");

				$updateclub = academy_inscripciones::updateAttribute($id, "club", $_POST["club_editar_inscripcion"], "si");

				$updatecategoria = academy_inscripciones::updateAttribute($id, "categoria", $_POST["categoria_editar_inscripcion"], "si");

				$updatealtura = academy_inscripciones::updateAttribute($id, "altura", $_POST["altura_editar_inscripcion"], "si");

				$updatetalla = academy_inscripciones::updateAttribute($id, "talla", $_POST["tallaropa_editar_inscripcion"], "si");
				
				$updatetrayectoria = academy_inscripciones::updateAttribute($id, "trayectoria", $_POST["trayectoria_editar_inscripcion"], "si");

				$updatepagado = academy_inscripciones::updateAttribute($id, "pagado", $_POST["valor_pagado_editar_inscripcion"], "no");

				//error_log( print_r( $InscripcionesPorId, true ) );

				echo json_encode(array(
                    "response"      	=>  "success",
                    "message"       	=>  "Las inscripciones se han encontrado correctamente."
                    ));
			}
		}

		/********************************************************
		*  MÉTODOS SELF
		********************************************************/

		// Metodo para comprobar el Login
		private static function isLogged() {
			if (isset($_SESSION['usuario'])) {
				return true;
			}
			else {
				header('Location: index.php?r=login/loger');
			}
		}
	}
?>