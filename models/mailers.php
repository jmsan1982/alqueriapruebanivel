<?php
	class mailers {

		public static function findAll() {
			return db::singleton()->query('SELECT * FROM formularios')->fetchAll();
		}


		public static function damedatos($numero) {
			return db::singleton()->query('SELECT * FROM inscripciones_eventos WHERE id_inscripcion="' . $numero . '"')->fetchAll();
		}


		public static function damedatoscampusworcester($numero) {
			return db::singleton()->query('SELECT * FROM registros_campus_worcester WHERE numero_pedido="' . $numero . '"')->fetch();
		}


		public static function dameDatosPatronato($numero) {
			return db::singleton()->query('SELECT * FROM formulariosinscripciones_patronato WHERE numero_pedido="' . $numero . '"')->fetch();
		}


		public static function actualizapagado($codigo, $pagado) {
			$sql = "UPDATE inscripciones_eventos SET pagado=:pag WHERE id_inscripcion=:numero";
			$query = db::singleton()->prepare($sql);

			if (!$query) {
				return false;
			}

			$datos = array(':numero' => $codigo, ':pag' => $pagado);

			if (!$query->execute($datos)) {
				return false;
			} 
			else {
				return true;
			}
		}


		public static function actualizapagadocampusworcester($codigo, $pagado) {
			$sql = "UPDATE registros_campus_worcester SET pagado=:pag WHERE numero_pedido=:numero";
			$query = db::singleton()->prepare($sql);

			if (!$query) {
				return false;
			}

			$datos = array(':numero' => $codigo, ':pag' => $pagado);

			if (!$query->execute($datos)) {
				return false;
			}
			else {
				return true;
			}
		}


		public static function actualizaPagadoPatronato($codigo) {
			$sql = "UPDATE formulariosinscripciones_patronato SET pagado=:pagado WHERE numero_pedido=:numero";
			$query = db::singleton()->prepare($sql);

			if (!$query) {
				return false;
			}

			$datos = array(':numero' => $codigo, ':pagado' => "Tarjeta");
			if (!$query->execute($datos)) {
				return false;
			}
			else {
				return true;
			}
		}


		public static function findLastNumeroPedido() {
			return db::singleton()->query('SELECT MAX(numero_pedido) FROM formulariosinscripciones')->fetch();
		}


		public static function findLastNumeroPedidoCampusWorcester() {
			return db::singleton()->query('SELECT MAX(numero_pedido) FROM registros_campus_worcester')->fetch();
		}


		public static function findLastCampusNavidad() {
			return db::singleton()->query('SELECT MAX(id) AS id FROM registros_campus_navidad')->fetch();
		}


		public static function findId($id) {
			return db::singleton()->query('SELECT * FROM formularios WHERE id_formulario=' . $id)->fetch();
		}


		public static function findLastFormulariosInscripciones() {
			return db::singleton()->query('SELECT * FROM formulariosinscripciones WHERE 1 order by id_formulario desc limit 1')->fetch();
		}


		// Hace la insercion en la tabla "formulariosinscripciones"
		public static function newForm($numeropedido, $nombre, $mail, $contenido, $pagado, $fecha, $categoria, $fechanacimiento, $direccion, $numero, $piso, $puerta, $poblacion, $cp, $provincia, $nombrepadre, $nombremadre, $tlfpadre, $tlfmadre, $modalidad, $titular, $dnititular, $iban, $entidad, $oficina, $dc, $cuenta) {

			//error_log("Entramos a la funcion");
			$sql = "INSERT
					INTO
					  `formulariosinscripciones`(
						`id_formulario`,
						`numero_pedido`,
						`nombre_apellidos`,
						`email`,
						`contenido`,
						`pagado`,
						`fecha`,
						`categoria`,
						`fecha_nacimiento`,
						`direccion`,
						`numero`,
						`piso`,
						`puerta`,
						`poblacion`,
						`codigo_postal`,
						`provincia`,
						`nombre_padre`,
						`nombre_madre`,
						`telefono_padre`,
						`telefono_madre`,
						`modalidad`,
						`talla_camiseta`,
						`numero_camiseta`,
						`alergico`,
						`alergias`,
						`titular_banco`,
						`dni_titular`,
						`iban`,
						`entidad`,
						`oficina`,
						`dc`,
						`cuenta`,
						`dni_tutor`,
						`temporada`,
						`is_active`
					  )
					VALUES(
					  null,
					  :NumeroPedido,
					  :Nombre,
					  :Email,
					  :Contenido,
					  :Pagado,
					  :Fecha,
					  :Categoria,
					  :FechaNacimiento,
					  :Direccion,
					  :Numero,
					  :Piso,
					  :Puerta,
					  :Poblacion,
					  :CodigoPostal,
					  :Provincia,
					  :NombrePadre,
					  :NombreMadre,
					  :TelefonoPadre,
					  :TelefonoMadre,
					  :Modalidad,
					  :TallaCamiseta,
					  :NumeroCamiseta,
					  :Alergico,
					  :Alergias,
					  :TitularBanco,
					  :DNITitular,
					  :Iban,
					  :Entidad,
					  :Oficina,
					  :DC,
					  :Cuenta,
					  :DNITutor,
					  :Temporada,
					  :is_active
					)";
			
			$query = db::singleton()->prepare($sql);

			if (!$query) {
				var_dump(db::singleton()->errorInfo());
				die;
			}

			$datos = array(':NumeroPedido' => $numeropedido,
				':Nombre' => $nombre,
				':Email' => $mail,
				':Contenido' => $contenido,
				':Pagado' => $pagado,
				':Fecha' => $fecha,
				':Categoria' => $categoria,
				':FechaNacimiento' => $fechanacimiento,
				':Direccion' => $direccion,
				':Numero' => $numero,
				':Piso' => $piso,
				':Puerta' => $puerta,
				':Poblacion' => $poblacion,
				':CodigoPostal' => $cp,
				':Provincia' => $provincia,
				':NombrePadre' => $nombrepadre,
				':NombreMadre' => $nombremadre,
				':TelefonoPadre' => $tlfpadre,
				':TelefonoMadre' => $tlfmadre,
				':Modalidad' => $modalidad,
				':TallaCamiseta' => "M",
				':NumeroCamiseta' => "00",
				':Alergico' => 0,
				':Alergias' => "",
				':TitularBanco' => $titular,
				':DNITitular' => $dnititular,
				':Iban' => $iban,
				':Entidad' => $entidad,
				':Oficina' => $oficina,
				':DC' => $dc,
				':Cuenta' => $cuenta,
				':DNITutor' => $dnititular,
				':Temporada' => "19/20",
				':is_active' => 1);

			//error_log( print_r( $datos, -1 ) );


			if (!$query->execute($datos)) {
				/*error_log( print_r( $datos, -1 ) );
				$arr = $query->errorInfo();
				error_log( print_r( $arr, -1) );
				error_log( print_r( $query, -1 ) );*/
				return false;
			}
			else {
				return self::findLastFormulariosInscripciones();
			}
		}


		// Pablo: Creo este m??todo a partir de updateForm porque aquel no actualiza el n??mero de pedido
		public static function updateFormCantera(
			$nombre,        $mail,              $contenido, $pagado,    $fecha, 
			$categoria,     $fechanacimiento,   $direccion, $numero,    $piso, 
			$puerta,        $poblacion,         $cp,        $provincia, $nombrepadre, 
			$nombremadre,   $tlfpadre,          $tlfmadre,  $titular,   $dnititular, 
			$iban,          $entidad,           $oficina,   $dc,        $cuenta, 
			$IDFormulario,  $numeroPedido,      $alergico,  $alergias,  $tipo, 
			$dni_jugador) {

			$sql = "UPDATE
						formulariosinscripciones
					SET
						nombre_apellidos = :Nombre,         numero_pedido = :numeropedido,          email = :Email,                 
						contenido = :Contenido,             pagado = :Pagado,                       fecha = :Fecha,
						categoria = :Categoria,             fecha_nacimiento = :FechaNacimiento,    direccion = :Direccion,         
						numero = :Numero,                   piso = :Piso,                           puerta = :Puerta,
						poblacion = :Poblacion,             codigo_postal = :CodigoPostal,          provincia = :Provincia,
						nombre_padre = :NombrePadre,        nombre_madre = :NombreMadre,            telefono_padre = :TelefonoPadre,
						telefono_madre = :TelefonoMadre,    titular_banco = :TitularBanco,          dni_titular = :DNITitular,
						iban = :Iban,                       entidad = :Entidad,                     oficina = :Oficina,
						dc = :DC,                           cuenta = :Cuenta,                       dni_tutor = :DNITitular,
						alergico = :Alergico,               alergias = :Alergias,                   tipo = :Tipo,
						dni_jugador = :dnijugador,          temporada = :Temporada
					WHERE
						id_formulario = :IDFormulario";

			$query = db::singleton()->prepare($sql);

			if (!$query) {
				return false;
			}

			$datos = array(
				':Nombre' => $nombre,
				':Email' => $mail,
				':Contenido' => $contenido,
				':Pagado' => $pagado,
				':Fecha' => $fecha,
				':Categoria' => $categoria,
				':FechaNacimiento' => $fechanacimiento,
				':Direccion' => $direccion,
				':Numero' => $numero,
				':Piso' => $piso,
				':Puerta' => $puerta,
				':Poblacion' => $poblacion,
				':CodigoPostal' => $cp,
				':Provincia' => $provincia,
				':NombrePadre' => $nombrepadre,
				':NombreMadre' => $nombremadre,
				':TelefonoPadre' => $tlfpadre,
				':TelefonoMadre' => $tlfmadre,
				':TitularBanco' => $titular,
				':DNITitular' => $dnititular,
				':Iban' => $iban,
				':Entidad' => $entidad,
				':Oficina' => $oficina,
				':DC' => $dc,
				':Cuenta' => $cuenta,
				':Temporada' => "19/20",
				':numeropedido' => $numeroPedido,
				':Alergico' => $alergico,
				':Alergias' => $alergias,
				':Tipo' => $tipo,
				':dnijugador' => $dni_jugador,
				':IDFormulario' => $IDFormulario);

			//error_log(__FILE__.__LINE__);
			//error_log(print_r($datos, -1));

			if (!$query->execute($datos)) {
				error_log( print_r( $datos, -1 ) );
				$arr = $query->errorInfo();
				error_log( print_r( $arr, -1) );
				error_log( print_r( $query, -1 ) );
				return false;
			}
			else {
				//error_log(__FILE__.__LINE__." con IDFormulario=".$IDFormulario);
				return $IDFormulario;
			}
		}


		public static function updateForm($nombre, $mail, $contenido, $pagado, $fecha, $categoria, $fechanacimiento, $direccion, $numero, $piso, $puerta, $poblacion, $cp, $provincia, $nombrepadre, $nombremadre, $tlfpadre, $tlfmadre, $titular, $dnititular, $iban, $entidad, $oficina, $dc, $cuenta, $IDFormulario, $alergico, $alergias, $tipo, $dni_jugador, $numeropedido) {

			$sql = "UPDATE
					  `formulariosinscripciones`
					SET
					  `nombre_apellidos` = :Nombre,
					  `email` = :Email,
					  `contenido` = :Contenido,
					  `pagado` = :Pagado,
					  `fecha` = :Fecha,
					  `categoria` = :Categoria,
					  `fecha_nacimiento` = :FechaNacimiento,
					  `direccion` = :Direccion,
					  `numero` = :Numero,
					  `piso` = :Piso,
					  `puerta` = :Puerta,
					  `poblacion` = :Poblacion,
					  `codigo_postal` = :CodigoPostal,
					  `provincia` = :Provincia,
					  `nombre_padre` = :NombrePadre,
					  `nombre_madre` = :NombreMadre,
					  `telefono_padre` = :TelefonoPadre,
					  `telefono_madre` = :TelefonoMadre,
					  `titular_banco` = :TitularBanco,
					  `iban` = :Iban,
					  `entidad` = :Entidad,
					  `oficina` = :Oficina,
					  `dc` = :DC,
					  `cuenta` = :Cuenta,
					  `dni_tutor` = :DNITitular,
					  `alergico` = :Alergico,
					  `alergias` = :Alergias,
					  `tipo` = :Tipo,
					  `dni_jugador` = :dnijugador,
					  `numero_pedido`  = :NumeroPedido,
					  `temporada` = :Temporada
					WHERE
					 `id_formulario` = :IDFormulario";

			$query = db::singleton()->prepare($sql);
			
			if (!$query) {
				return false;
			}

			$datos = array(
				':Nombre' => $nombre,
				':Email' => $mail,
				':Contenido' => $contenido,
				':Pagado' => $pagado,
				':Fecha' => $fecha,
				':Categoria' => $categoria,
				':FechaNacimiento' => $fechanacimiento,
				':Direccion' => $direccion,
				':Numero' => $numero,
				':Piso' => $piso,
				':Puerta' => $puerta,
				':Poblacion' => $poblacion,
				':CodigoPostal' => $cp,
				':Provincia' => $provincia,
				':NombrePadre' => $nombrepadre,
				':NombreMadre' => $nombremadre,
				':TelefonoPadre' => $tlfpadre,
				':TelefonoMadre' => $tlfmadre,
				':TitularBanco' => $titular,
				':DNITitular' => $dnititular,
				':Iban' => $iban,
				':Entidad' => $entidad,
				':Oficina' => $oficina,
				':DC' => $dc,
				':Cuenta' => $cuenta,
				':Alergico' => $alergico,
				':NumeroPedido' => $numeropedido,
				':Alergias' => $alergias,
				':Tipo' => $tipo,
				':Temporada' => "19/20",
				':dnijugador' => $dni_jugador,
				':IDFormulario' => $IDFormulario);

			//error_log(print_r($datos, -1));

			if (!$query->execute($datos)) {
				error_log( print_r( $datos, -1 ) );
				$arr = $query->errorInfo();
				error_log( print_r( $arr, -1) );
				error_log( print_r( $query, -1 ) );
				return false;
			} 
			else {
				return $IDFormulario;
			}
		}


		public static function updateFormTarjeta($nombre, $mail, $contenido, $pagado, $fecha, $categoria, $fechanacimiento, $direccion, $numero, $piso, $puerta, $poblacion, $cp, $provincia, $nombrepadre, $nombremadre, $tlfpadre, $tlfmadre, $titular, $dnititular, $iban, $entidad, $oficina, $dc, $cuenta, $IDFormulario, $numeroPedido, $alergico, $alergias, $tipo, $dni_jugador) {

			$sql = "UPDATE
					  `formulariosinscripciones`
					SET
					  `nombre_apellidos` = :Nombre,
					  `email` = :Email,
					  `contenido` = :Contenido,
					  `pagado` = :Pagado,
					  `fecha` = :Fecha,
					  `categoria` = :Categoria,
					  `fecha_nacimiento` = :FechaNacimiento,
					  `direccion` = :Direccion,
					  `numero` = :Numero,
					  `piso` = :Piso,
					  `puerta` = :Puerta,
					  `poblacion` = :Poblacion,
					  `codigo_postal` = :CodigoPostal,
					  `provincia` = :Provincia,
					  `nombre_padre` = :NombrePadre,
					  `nombre_madre` = :NombreMadre,
					  `telefono_padre` = :TelefonoPadre,
					  `telefono_madre` = :TelefonoMadre,
					  `titular_banco` = :TitularBanco,
					  `dni_titular` = :DNITitular,
					  `iban` = :Iban,
					  `entidad` = :Entidad,
					  `oficina` = :Oficina,
					  `dc` = :DC,
					  `cuenta` = :Cuenta,
					  `dni_tutor` = :DNITitular,
					  `temporada` = :Temporada,
					  `numero_pedido`  = :NumeroPedido,
					  `tipo`  = :Tipo,
					  `dni_jugador` = :dnijugador,
					  `alergico`  = :Alergico,
					  `alergias`  = :Alergias
					WHERE
					 `id_formulario` = :IDFormulario";
			
			$query = db::singleton()->prepare($sql);

			if (!$query) {
				return false;
			}

			$datos = array(
				':Nombre' => $nombre,
				':Email' => $mail,
				':Contenido' => $contenido,
				':Pagado' => $pagado,
				':Fecha' => $fecha,
				':Categoria' => $categoria,
				':FechaNacimiento' => $fechanacimiento,
				':Direccion' => $direccion,
				':Numero' => $numero,
				':Piso' => $piso,
				':Puerta' => $puerta,
				':Poblacion' => $poblacion,
				':CodigoPostal' => $cp,
				':Provincia' => $provincia,
				':NombrePadre' => $nombrepadre,
				':NombreMadre' => $nombremadre,
				':TelefonoPadre' => $tlfpadre,
				':TelefonoMadre' => $tlfmadre,
				':TitularBanco' => $titular,
				':DNITitular' => $dnititular,
				':Iban' => $iban,
				':Entidad' => $entidad,
				':Oficina' => $oficina,
				':DC' => $dc,
				':Cuenta' => $cuenta,
				':Temporada' => "19/20",
				':NumeroPedido' => $numeroPedido,
				':Alergico' => $alergico,
				':Alergias' => $alergias,
				':dnijugador' => $dni_jugador,
				':Tipo' => $tipo,
				':IDFormulario' => $IDFormulario);

			//error_log(print_r($datos, -1));

			if (!$query->execute($datos)) {
				/*error_log( print_r( $datos, -1 ) );
				$arr = $query->errorInfo();
				error_log( print_r( $arr, -1) );
				error_log( print_r( $query, -1 ) );*/
				return false;
			}
			else {
				return $IDFormulario;
			}
		}


		// Hace la inserci??n en la tabla "formulariosinscripciones_pagos". As??, cada inscripci??n tiene 1 fila que sirve para gestionar los pagos de la inscripci??n
		public static function insertFormulariosInscripcionesPagos(
			$id_formularioinscripciones,       $fecha,                $importe,                  $dni_pagador,      
			$reserva,                          $matricula,            $pendiente_matricula,      $pagado_matricula,         
			$pagado_pendiente_matricula,       $total_inscripcion,    $total_pendiente,          $trimestre_noviembre,
			$trimestre_enero,                  $trimestre_abril,      $cobros_activos_noviembre, $cobros_activos_enero,
			$cobros_activos_abril,             $pagado_noviembre,     $pagado_enero,             $pagado_abril)	{
			error_log(__FILE__.__LINE__);
			
			$sentencia_sql = "INSERT INTO formulariosinscripciones_pagos(
									id_formularioinscripciones,       fecha,                importe,                  dni_pagador,      
									reserva,                          matricula,            pendiente_matricula,      pagado_matricula,         
									pagado_pendiente_matricula,       total_inscripcion,    total_pendiente,          trimestre_noviembre,
									trimestre_enero,                  trimestre_abril,      cobros_activos_noviembre, cobros_activos_enero,
									cobros_activos_abril,             pagado_noviembre,     pagado_enero,             pagado_abril
								)
								VALUES(
										:id_formularioinscripciones,       :fecha,                :importe,                  :dni_pagador,      
										:reserva,                          :matricula,            :pendiente_matricula,      :pagado_matricula,         
										:pagado_pendiente_matricula,       :total_inscripcion,    :total_pendiente,          :trimestre_noviembre,
										:trimestre_enero,                  :trimestre_abril,      :cobros_activos_noviembre, :cobros_activos_enero,
										:cobros_activos_abril,             :pagado_noviembre,     :pagado_enero,             :pagado_abril
								)";

			$query = db::singleton()->prepare($sentencia_sql);

			error_log(__FILE__.__LINE__);

			if (!$query) {
				error_log(print_r(db::singleton()->errorInfo(),1));
				die;
			}

			error_log(__FILE__.__LINE__);

			$datos =  array(':id_formularioinscripciones'=>$id_formularioinscripciones,
							':fecha'=>$fecha,
							':importe'=>$importe,
							':dni_pagador'=>$dni_pagador,
							':reserva'=>$reserva,
							':matricula'=>$matricula,
							':pendiente_matricula'=>$pendiente_matricula,
							':pagado_matricula'=>$pagado_matricula,
							':pagado_pendiente_matricula'=>$pagado_pendiente_matricula,
							':total_inscripcion'=>$total_inscripcion,
							':total_pendiente'=>$total_pendiente,
							':trimestre_noviembre'=>$trimestre_noviembre,
							':trimestre_enero'=>$trimestre_enero,
							':trimestre_abril'=>$trimestre_abril, 
							':cobros_activos_noviembre'=>$cobros_activos_noviembre,
							':cobros_activos_enero'=>$cobros_activos_enero,
							':cobros_activos_abril'=>$cobros_activos_abril,
							':pagado_noviembre'=>$pagado_noviembre,
							':pagado_enero'=>$pagado_enero,
							':pagado_abril'=>$pagado_abril);

			error_log(__FILE__.__LINE__);

			if (!$query->execute($datos)) {
				error_log("Entramos al error");
				error_log( print_r( $datos, -1 ) );
				$arr = $query->errorInfo();
				error_log( print_r( $arr, -1) );
				error_log( print_r( $query, -1 ) );
				error_log(print_r(db::singleton()->errorInfo(),1));
				die;
			} 
			else {
				return true;
			}
		}


		public static function newFormCampusWorcester($nombre, $apellidos, $fechanacimiento, $telefono, $movil, $email, $pasaporte, $fechaexpedicion, $fechacaducidad, $nivelingleshablado, $nivelinglesescrito, $tratamientosmedicos, $alergias, $club, $categoria, $altura, $tallaropa, $numeropedido, $titular, $dnititular, $iban, $entidad, $oficina, $dc, $cuenta) {

			$sql = "INSERT INTO registros_campus_worcester(nombre,apellidos,telefono,telefono_movil,email,fecha_nacimiento,pasaporte,expedicion_pasaporte,caducidad_pasaporte,ingles_hablado,ingles_escrito,tratamientos_medicos,alergias,equipo,categoria,altura,talla_ropa,pagado,numero_pedido,fecha_registro,titular_cuenta,dni_titular_cuenta,iban,entidad,oficina,dc,cuenta)
			VALUES (:nom,:ape,:tel,:mov,:mail,:fechanac,:pas,:fechaex,:fechaca,:ingleshabla,:inglesescri,:trata,:aler,:clu,:cate,:alt,:talla,:paga,:numpe,:fechare,:titu,:dnitit,:iba,:enti,:ofi,:dc,:cuent)";
			$query = db::singleton()->prepare($sql);

			if (!$query) {
				var_dump(db::singleton()->errorInfo());
				die;
			}

			$datos = array(':nom' => $nombre, ':ape' => $apellidos,':tel' => $telefono,':mov' => $movil,':mail' => $email, ':fechanac' => $fechanacimiento, ':pas' => $pasaporte, ':fechaex' => $fechaexpedicion, ':fechaca' => $fechacaducidad, ':ingleshabla' => $nivelingleshablado, ':inglesescri' => $nivelinglesescrito, ':trata' => $tratamientosmedicos, ':aler' => $alergias, ':clu' => $club, ':cate' => $categoria, ':alt' => $altura, ':talla' => $tallaropa, ':paga' => 0, ':fechare' => date("Y-m-d"),':numpe' => $numeropedido, ':titu' => $titular, ':dnitit' => $dnititular, ':iba' => $iban, ':enti' => $entidad, ':ofi' => $oficina, ':dc' => $dc, ':cuent' => $cuenta);

			if (!$query->execute($datos)) {
				var_dump($query->errorInfo());
				die;
			} 
			else {
				return true;
			}
		}


		public static function newFormJornadasDeteccion($fecharegistro, $opcion, $genero, $nombre, $apellidos, $fechanacimiento, $practicabaloncesto, $club, $telefonotutor, $emailtutor, $pagado) {
			$sql = "INSERT INTO registros_jornadas_deteccion (fecharegistro, opcion, genero, nombre, apellidos, fechanacimiento, practicabaloncesto, club, telefonotutor, emailtutor, pagado) VALUES (:fecharegistro, :opcion, :genero, :nombre, :apellidos, :fechanacimiento, :practicabaloncesto, :club, :telefonotutor, :emailtutor, :pagado)";

			$query = db::singleton()->prepare($sql);

			if (!$query) {
				var_dump(db::singleton()->errorInfo());
				die;
			}

			$datos = array(':fecharegistro' => $fecharegistro, ':opcion' => $opcion, ':genero' => $genero, ':nombre' => $nombre, ':apellidos' => $apellidos, ':fechanacimiento' => $fechanacimiento, ':practicabaloncesto' => $practicabaloncesto, ':club' => $club, ':telefonotutor' => $telefonotutor, ':emailtutor' => $emailtutor, ':pagado' => $pagado);

			if (!$query->execute($datos)) {
				var_dump($query->errorInfo());
				die;
			}
			else {
				return true;
			}
		}


		/*public static function newFormCampusNavidad(
					$fecharegistro,     $categoria,         $pension,               $transporte,                $nombre, 
					$apellidos,         $fechanacimiento,   $dni,                   $club,                      $tallacamiseta, 
					$enfermedades,      $alergias,          $tratamientosmedicos,   $intervencionesquirurgicas, $observaciones, 
					$ficherosubido1,    $ficherosubido2,    $nombretutor,           $apellidostutor,            $dnitutor, 
					$direccion,         $numero,            $piso,                  $puerta,                    $cp, 
					$provincia,         $poblacion,         $telefonotutor,         $emailtutor,                $autorizodatos, 
					$autorizoimagen,    $pagado=0,          $importe,               $tipopago,                  $numero_pedido) {
					
			$sql = "INSERT INTO registros_campus_navidad (
							fecharegistro,  categoria,          pension,                transporte,                 nombre,
							apellidos,      fechanacimiento,    dni,                    club,                       tallacamiseta,
							enfermedades,   alergias,           tratamientosmedicos,    intervencionesquirurgicas,  observaciones,  
							ficherosubido1, ficherosubido2,     nombretutor,            apellidostutor,             dnitutor,
							direccion,      numero,             piso,                   puerta,                     cp,
							provincia,      poblacion,          telefonotutor,          emailtutor,                 autorizodatos,
							autorizoimagen, pagado,             importe,                tipopago,                   numeropedido)
			VALUES
							(   :fecharegistro,     :categoria,         :pension,               :transporte,                :nombre,
								:apellidos,         :fechanacimiento,   :dni,                   :club,                      :tallacamiseta,
								:enfermedades,      :alergias,          :tratamientosmedicos,   :intervencionesquirurgicas, :observaciones,
								:ficherosubido1,    :ficherosubido2,    :nombretutor,           :apellidostutor,            :dnitutor,
								:direccion,         :numero,            :piso,                  :puerta,                    :cp,
								:provincia,         :poblacion,         :telefonotutor,         :emailtutor,                :autorizodatos,
								:autorizoimagen,    :pagado,            :importe,               :tipopago,                  :numeropedido)";

			$query = db::singleton()->prepare($sql);

			if (!$query) 
						{
							error_log(__FILE__.__FUNCTION__.__LINE__);
							error_log(print_r( db::singleton()->errorInfo(),1));
							return false;
			}

			$datos = array(
							':fecharegistro' => $fecharegistro, 
							':categoria' => $categoria, 
							':pension' => $pension, 
							':transporte' => $transporte, 
							':nombre' => $nombre, 
							
							':apellidos' => $apellidos, 
							':fechanacimiento' => $fechanacimiento, 
							':dni' => $dni, 
							':club' => $club, 
							':tallacamiseta' => $tallacamiseta, 
							
							':enfermedades' => $enfermedades, 
							':alergias' => $alergias, 
							':tratamientosmedicos' => $tratamientosmedicos, 
							':intervencionesquirurgicas' => $intervencionesquirurgicas, 
							':observaciones' => $observaciones, 
							
							':ficherosubido1' => $ficherosubido1, 
							':ficherosubido2' => $ficherosubido2, 
							':nombretutor' => $nombretutor, 
							':apellidostutor' => $apellidostutor, 
							':dnitutor' => $dnitutor, 
							
							':direccion' => $direccion, 
							':numero' => $numero, 
							':piso' => $piso, 
							':puerta' => $puerta, 
							':cp' => $cp, 
							
							':provincia' => $provincia, 
							':poblacion' => $poblacion, 
							':telefonotutor' => $telefonotutor, 
							':emailtutor' => $emailtutor, 
							':autorizodatos' => $autorizodatos, 
							
							':autorizoimagen' => $autorizoimagen,
							':pagado' => $pagado,     
							':importe' => $importe,          
							':tipopago' => $tipopago,            
							':numeropedido' => $numero_pedido
						);

			if (!$query->execute($datos)) 
						{
							error_log(__FILE__.__FUNCTION__.__LINE__);
							error_log(print_r( db::singleton()->errorInfo(),1));
							return false;
			}
			else 
						{
							return self::findLastCampusNavidad();
			}
		}*/


		// Env??o de mail al cliente
		public static function mailssend($numeropedido, $contenido, $seccioninscripcion, $email) {

			//error_log("Entramos al mailer");

			// Cargamos la clase PHPMailer
			require_once("PHPMailer/class.phpmailer.php");
			require_once("PHPMailer/class.smtp.php");
            require_once("config.php");		//	Contiene constantes del envio del email
            
			// Instanciamos un objeto PHPMailer
			$mail = new PHPMailer();

			$mail->CharSet = "UTF-8";

			// Le decimos que usamos el protocolo SMTP
			$mail->IsSMTP();

			// Le decimos que es necesario autenticarse
			$mail->SMTPAuth = true;

            // Indicamos aqu?? el nombre del servidor de correo
            $mail->Host = __phpmailer_host__;           //  "in-v3.mailjet.com";	//$mail->Host = "in-v3.mailjet.com";

            // Asignamos el puerto SMTP que usa nuestro servidor
            $mail->Port = __phpmailer_port__;
         	//$mail->SMTPSecure = "tls";   

            // Indicamos aqu?? nuestro nombre de usuario
            $mail->Username = __phpmailer_username__;	//  $mail->Username = "1c96c2909ac708240c4491b5a821fa21";

            // Indicamos la contrase??a
            $mail->Password = __phpmailer_password__;   //  $mail->Password ="187201d6b77557358403ccbc07cee13a";

			// A??adimos la direcci??n del remitente
			$mail->From = "alqueria@alqueriadelbasket.info";

			// A??adimos el nombre del emisor
			$mail->FromName = "L??Alqueria del Basket";

			// En la direcci??n de responder ponemos la misma del From
			$mail->AddReplyTo("recepcion@alqueriadelbasket.com", "L??Alqueria del Basket");

			// Le indicamos que nuestro Email est?? en Html
			$mail->IsHTML(true);

			// Indicamos la direcci??n y el nombre del destinatario
			$mail->AddAddress($email);

			// Con copia oculta
			$mail->AddBCC('recepcion@alqueriadelbasket.com', 'L??Alqueria del Basket');

			// Ponemos aqu?? el asunto
			$mail->Subject = $seccioninscripcion;

			// Creamos todo el cuerpo del Email en Html en la variable $body
			$body = '
			<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
				<html xmlns="https://www.w3.org/1999/xhtml">
					<head>
						<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
						<title>L??Alqueria del Basket</title>
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
												<a href="https://www.alqueriadelbasket.com/" target="_blank">
													<img src="https://www.alqueriadelbasket.com/img/logos-cabecera-email.png" alt="L??Alqueria del Basket" width="547" height="81" style="display: block;">
												</a>
											</td>
										</tr>
										<tr>
											<td bgcolor="#ffffff" style="padding: 30px 25px 30px 25px;">
												<h3 style="color: #eb7c00; border-bottom: #eb7c00 2px solid;">'.$seccioninscripcion.'</h2>
												<p><strong>Estos son los datos recibidos relacionados con su inscripci??n.</strong></p>
												<p><strong>N??mero de pedido:</strong> '.$numeropedido.'</p>
												<p>'.$contenido.'</p>
												<p><strong>En caso de cualquier duda o problema con la inscripci??n, remitan un correo a recepcion@alqueriadelbasket.com</strong></p>
											</td>
										</tr>
										<tr>
											<td bgcolor="#424241" style="padding: 20px 30px 20px 30px">
												<table border="0" cellpadding="0" cellspacing="0" width="100%">
													<tr>
														<td width="75%" style="font-family: Arial, sans-serif; line-height: 18px; font-size: 12px;">
															<span style="color: #eb7c00;">&copy; L??Alqueria del Basket 2019</span><br>
															<span style="color: #ffffff;">C/ Bomber Ramon Duart S/N 46013, Valencia</span><br>
															<span style="color: #ffffff;">+34 961 215 543</span>
														</td>
														<td width="25%" align="right">
															<table border="0" cellpadding="0" cellspacing="0">
																<tr>
																	<td>
																		<a href="https://www.facebook.com/LAlqueriaVBC" target="_blank">
																			<img src="https://www.alqueriadelbasket.com/img/logo-facebook.png" alt="Facebook L??Alqueria del Basket" width="32" height="32" style="display: block;" border="0">
																		</a>
																	</td>
																	<td style="font-size: 0; line-height: 0;" width="10%">&nbsp;</td>
																	<td>
																		<a href="https://twitter.com/LAlqueriaVBC" target="_blank">
																			<img src="https://www.alqueriadelbasket.com/img/logo-twitter.png" alt="Twitter L??Alqueria del Basket" width="32" height="32" style="display: block;" border="0">
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

			// A??adimos aqu?? el cuerpo del Email
			$mail->MsgHTML($body);

			// Enviamos y comprobamos si se ha mandado el Email correctamente
			if (!$mail->Send()) {
				//$mensaje_a_mostrar = "Mailer Error: " . $mail->ErrorInfo . "<br>";
				error_log( $mail->ErrorInfo );
				error_log("Entramos al fallo");
				return false;
			}
			else {
				//$mensaje_a_mostrar = "Tu mensaje ha sido enviado.<br>";
				return true;
			}
		}


		// Env??o de emails de confirmaci??n Jornadas Detecci??n
		public static function mailsSendJornadasDeteccion($emailtutor, $contenido, $opcion, $seleccionado_a, $hijo_a) {
			// Cargamos la clase PHPMailer
			require_once("PHPMailer/class.phpmailer.php");
			require_once("PHPMailer/class.smtp.php");
            require_once("config.php");		//	Contiene constantes del envio del email

			// Instanciamos un objeto PHPMailer
			$mail = new PHPMailer();

			$mail->CharSet = "UTF-8";

			// Le decimos que usamos el protocolo SMTP
			$mail->IsSMTP();

			// Le decimos que es necesario autenticarse
			$mail->SMTPAuth = true;

            // Indicamos aqu?? el nombre del servidor de correo
            $mail->Host = __phpmailer_host__;           //  "in-v3.mailjet.com";	//$mail->Host = "in-v3.mailjet.com";

            // Asignamos el puerto SMTP que usa nuestro servidor
            $mail->Port = __phpmailer_port__;
          // $mail->SMTPSecure = "tls";   

            // Indicamos aqu?? nuestro nombre de usuario
            $mail->Username = __phpmailer_username__;	//  $mail->Username = "1c96c2909ac708240c4491b5a821fa21";

            // Indicamos la contrase??a
            $mail->Password = __phpmailer_password__;   //  $mail->Password ="187201d6b77557358403ccbc07cee13a";

			// A??adimos la direcci??n del remitente
			$mail->From = "alqueria@alqueriadelbasket.info";

			// A??adimos el nombre del emisor
			$mail->FromName = "L??Alqueria del Basket";

			// En la direcci??n de responder ponemos la misma del From
			$mail->AddReplyTo("recepcion@alqueriadelbasket.com", "L??Alqueria del Basket");

			// Le indicamos que nuestro Email est?? en Html
			$mail->IsHTML(true);

			// Indicamos la direcci??n del destinatario
			$mail->AddAddress($emailtutor);

			// Destinatario con copia oculta
			$mail->AddBCC('vbabic@alqueriadelbasket.com');
			//$mail->AddBCC('amomplet@tessq.com');

			// Ponemos aqu?? el asunto del email
			$mail->Subject = "Ficha inscripci??n Jornadas de Detecci??n 2020";

			// Definimos plantilla HTML con dise??o Alqueria
			$plantilla_superior = '
			<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="https://www.w3.org/1999/xhtml">
				<head>
					<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
					<title>L??Alqueria del Basket</title>
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
											<a href="https://www.alqueriadelbasket.com/" target="_blank">
												<img src="https://www.alqueriadelbasket.com/img/logos-cabecera-email.png" alt="L??Alqueria del Basket" width="547" height="81" style="display: block;">
											</a>
										</td>
									</tr>
									<tr>
										<td bgcolor="#ffffff" style="padding: 30px 25px 30px 25px;">';

			$plantilla_inferior =			'<p style="margin-bottom:0;">
												En caso de cualquier duda o problema con la inscripci??n, remitan un correo a <u><a href="mailto:recepcion@alqueriadelbasket.com" style="color:#201f1e;">recepcion@alqueriadelbasket.com</a></u>
											</p>
										</td>
									</tr>
									<tr>
										<td bgcolor="#3d3d3d" style="padding: 20px 30px 20px 30px;">
											<table border="0" cellpadding="0" cellspacing="0" width="100%">
												<tr>
													<td width="75%" style="font-family: Arial, sans-serif; line-height: 18px; font-size: 12px;">
														<span style="color: #eb7c00;">&copy; L??Alqueria del Basket 2020</span><br>
														<span style="color: #ffffff;">C/ Bomber Ramon Duart S/N 46013, Valencia</span><br>
														<span style="color: #ffffff;">+34 961 215 543</span>
													</td>
													<td width="25%" align="right">
														<table border="0" cellpadding="0" cellspacing="0">
															<tr>
																<td>
																	<a href="https://www.facebook.com/LAlqueriaVBC" target="_blank">
																		<img src="https://www.alqueriadelbasket.com/img/logo-facebook.png" alt="Facebook L??Alqueria del Basket" width="32" height="32" style="display: block;" border="0">
																	</a>
																</td>
																<td style="font-size: 0; line-height: 0;" width="10%">&nbsp;</td>
																<td>
																	<a href="https://twitter.com/LAlqueriaVBC" target="_blank">
																		<img src="https://www.alqueriadelbasket.com/img/logo-twitter.png" alt="Twitter L??Alqueria del Basket" width="32" height="32" style="display: block;" border="0">
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


			if ($opcion == "jornada_1_2011_2012") {
				$num_jornada = "I";
				$fecha_jornada = "3 de julio de 2020 a las 17:00h";
			}
			elseif ($opcion == "jornada_1_2009_2010") {
				$num_jornada = "I";
				$fecha_jornada = "3 de julio de 2020 a las 18:15h";
			}
			elseif ($opcion == "jornada_1_2007_2008") {
				$num_jornada = "I";
				$fecha_jornada = "3 de julio de 2020 a las 19:30h";
			}
			elseif ($opcion == "jornada_2_2009_2010") {
				$num_jornada = "II";
				$fecha_jornada = "4 de julio de 2020 a las 10:00h";
			}
			elseif ($opcion == "jornada_2_2007_2008") {
				$num_jornada = "II";
				$fecha_jornada = "4 de julio de 2020 a las 11:15h";
			}
			elseif ($opcion == "jornada_2_2005_2006") {
				$num_jornada = "II";
				$fecha_jornada = "4 de julio de 2020 a las 12:30h";
			}
			elseif ($opcion == "jornada_3_2011_2012") {
				$num_jornada = "III";
				$fecha_jornada = "5 de julio de 2020 a las 10:00h";
			}
			elseif ($opcion == "jornada_3_2009_2010") {
				$num_jornada = "III";
				$fecha_jornada = "5 de julio de 2020 a las 11:15h";
			}
			elseif ($opcion == "jornada_3_2007_2008") {
				$num_jornada = "III";
				$fecha_jornada = "5 de julio de 2020 a las 12:30h";
			}

			// Definimos el mensaje din??mico para los primeros 20 inscritos de cada selecci??n
			$plantilla_inscrito = '
			<h3 style="color:#eb7c00;border-bottom:#eb7c00 2px solid">Ficha inscripci??n Jornadas de Detecci??n 2020</h3>
			<p>Hola,</p>
			<p>Te confirmamos que has inscrito correctamente a tu '.$hijo_a.' a la <strong>'.$num_jornada.' Jornada de Detecci??n</strong>, la cual se celebrar?? en esta temporada 2019/2020 en la Escuela del Valencia Basket Club el d??a <strong>'.$fecha_jornada.'</strong>.</p>
			<p>Agradecemos vuestro inter??s en realizar los entrenamientos previstos y te informamos que, tras la celebraci??n de la ??ltima Jornada prevista para el 5 de julio de 2020, te comunicaremos en un plazo de 10 d??as si tu '.$hijo_a.' ha sido '.$seleccionado_a.' para formar parte de la Escuela del Valencia Basket Club para la temporada 2020/2021. En el caso de que no haya sido '.$seleccionado_a.' tambi??n recibir??s un email agradeci??ndole su participaci??n en las mismas.</p>
			<p>Para que tu '.$hijo_a.' pueda participar solo tienes que rellenar, firmar y enviarnos a <u><a href="mailto:recepcion@alqueriadelbasket.com" style="color:#201f1e;">recepcion@alqueriadelbasket.com</a></u> esta <a href="https://servicios.alqueriadelbasket.com/pdf/autorizacion-jornada-deteccion-2019-2020.pdf" target="_blank" title="Descargar" style="font-weight:bold;font-style:italic;color:#ed8817;">autorizaci??n de asistencia</a> antes del d??a de la prueba.</p>
			<p>Tu '.$hijo_a.' deber?? acudir con ropa deportiva para poder realizar una sesi??n de entrenamiento dirigida por nuestros entrenadores.</p>
			<p>En el caso de que por cualquier circunstancia no pudiera asistir al entrenamiento, te rogamos que lo avises mandando un em@il a la misma direcci??n, <u><a href="mailto:recepcion@alqueriadelbasket.com" style="color:#201f1e;">recepcion@alqueriadelbasket.com</a></u>, indicando vuestros datos. ??Gracias!</p>
			<p>Estos son los datos que hab??is introducido:</p>';

			// Definimos el mensaje para los que pasan a la lista de espera
			$lista_espera = '
			<h3 style="color:#eb7c00;border-bottom:#eb7c00 2px solid">Ficha inscripci??n Jornadas de Detecci??n 2020</h3>
			<p>Hola,</p>
			<p>Ante todo, ??gracias por contar con nosotros!<br>Te informamos que en este momento no quedan plazas disponibles para la generaci??n de tu '.$hijo_a.' en la '.$num_jornada.' Jornada de Detecci??n. No obstante, <u><strong>qued??is incluidos en una lista de espera</strong></u> para la Jornada indicada y en el caso de que hubiese una vacante por parte de alguno de los participantes, tanto por lesi??n como por cualquier otra circunstancia similar, os avisar??amos para que pudierais asistir.</p>
			<p>En el caso de que dese??is apuntaros a otra Jornada de Detecci??n, deber??is rellenar de nuevo el <a href="https://servicios.alqueriadelbasket.com/?r=index/JornadasDeteccion" target="_blank" title="Descargar" style="font-weight:bold;font-style:italic;color:#ed8817;">formulario de inscripci??n</a>.</p>
			<p>Estos son los datos que hab??is introducido:</p>';

			// D??a a partir del cual se empiezan a contabilizar las inscripciones
			$apertura_inscripciones = "2020-01-01";

			// Contamos los registros totales para una generaci??n de una Jornada concreta
			$inscritos_jornada_seleccionada = db::singleton()->query("SELECT COUNT(*) FROM registros_jornadas_deteccion WHERE opcion = '".$opcion."' AND fecharegistro >= '".$apertura_inscripciones."'")->fetch();

			// Muestra en el log cuantos inscritos hay en la opci??n seleccionada
			error_log(print_r($inscritos_jornada_seleccionada, 1));

			// Si, despu??s de a??adirlo a la BBDD, hay 20 o menos inscritos con la opci??n seleccionada, entonces se env??a email de inscrito
			if ($inscritos_jornada_seleccionada[0] <= 20) {
				$body = $plantilla_superior.$plantilla_inscrito.$contenido.$plantilla_inferior;
			}
			// Si hay m??s de 20 inscritos con la opci??n seleccionada, entonces se env??a email de lista de espera
			else {
				$body = $plantilla_superior.$lista_espera.$contenido.$plantilla_inferior;
			}

			// A??adimos aqu?? el cuerpo del Email
			$mail->MsgHTML($body);

			// Enviamos y comprobamos si se ha mandado el Email correctamente
			if ($mail->Send()) {
				return true;
			}
			else {
				return false;
			}
		}


		// Env??o de emails de confirmaci??n Campus Navidad
		/*public static function mailsSendCampusNavidad($emailtutor, $contenido) {
			// Cargamos la clase PHPMailer
			require_once("PHPMailer/class.phpmailer.php");
			require_once("PHPMailer/class.smtp.php");
            require_once("config.php");		//	Contiene constantes del envio del email

			// Instanciamos un objeto PHPMailer
			$mail = new PHPMailer();

			$mail->CharSet = "UTF-8";

			// Le decimos que usamos el protocolo SMTP
			$mail->IsSMTP();

			// Le decimos que es necesario autenticarse
			$mail->SMTPAuth = true;

			// Indicamos aqu?? el nombre del servidor de correo
            $mail->Host = __phpmailer_host__;           //  "in-v3.mailjet.com";	//$mail->Host = "in-v3.mailjet.com";

            // Asignamos el puerto SMTP que usa nuestro servidor
            $mail->Port = __phpmailer_port__;
            $mail->SMTPSecure = "tls";   

            // Indicamos aqu?? nuestro nombre de usuario
            $mail->Username = __phpmailer_username__;	//  $mail->Username = "1c96c2909ac708240c4491b5a821fa21";

            // Indicamos la contrase??a
            $mail->Password = __phpmailer_password__;   //  $mail->Password ="187201d6b77557358403ccbc07cee13a";

			// A??adimos la direcci??n del remitente
			$mail->From = "alqueria@alqueriadelbasket.com";

			// A??adimos el nombre del emisor
			$mail->FromName = "L??Alqueria del Basket";

			// En la direcci??n de responder ponemos la misma del From
			$mail->AddReplyTo("recepcion@alqueriadelbasket.com","L??Alqueria del Basket");

			// Le indicamos que nuestro Email est?? en Html
			$mail->IsHTML(true);

			// Indicamos la direcci??n y el nombre del destinatario
			$mail->AddAddress($emailtutor, 'Inscripci??n al Campus de Navidad');

			// Con copia oculta
			$mail->AddBCC('campus@valenciabasket.com', 'Inscripci??n al Campus de Navidad');
			$mail->AddBCC('recepcion@alqueriadelbasket.com', 'Inscripci??n al Campus de Navidad');

			// Ponemos aqu?? el asunto
			$mail->Subject = "Confirmaci??n de inscripci??n al Campus de Navidad";

			// Creamos todo el cuerpo del Email en Html en la variable $body
			$body = '
			<html>
			<body style="margin: 0.2em;">
			<div align="center" style="background-color: black;">
				<img src="https://servicios.alqueriadelbasket.com/img/logos-cabecera-email.png" width="100%" style="max-width: 476px;">
			</div>
			<div style="width: 80%;padding: 2em;">
				<p style="font-family: Helvetica LT Condensed; color: black;font-size: 16px;"><b>??Gracias por realizar la solicitud! Estos son los datos recibidos, para cualquier aclaraci??n, p??ngase en contacto con nosotros.</b></p>
				<p style="font-family: Helvetica LT Condensed; color: black;font-size: 16px;">' . $contenido . '</p>
			</div>
			</body>
			</html>';

			// A??adimos aqu?? el cuerpo del Email
			$mail->MsgHTML($body);

			// Enviamos y comprobamos si se ha mandado el Email correctamente
			if (!$mail->Send()) {
				//$mensaje_a_mostrar = "Mailer Error: " . $mail->ErrorInfo . "<br>";
				return false;
			}
			else {
				//$mensaje_a_mostrar = "Tu mensaje ha sido enviado.<br>";
				return true;
			}
		}*/


		// Env??o de correo de confirmaci??n Adidas Next Generation
		public static function mailsSendAdidasNextGeneration($emailtutor, $contenido) {
			// Cargamos la clase PHPMailer
			require_once("PHPMailer/class.phpmailer.php");
			require_once("PHPMailer/class.smtp.php");
            require_once("config.php");		//	Contiene constantes del envio del email

			// Instanciamos un objeto PHPMailer
			$mail = new PHPMailer();

			$mail->CharSet = "UTF-8";

			// Le decimos que usamos el protocolo SMTP
			$mail->IsSMTP();

			// Le decimos que es necesario autenticarse
			$mail->SMTPAuth = true;

            // Indicamos aqu?? el nombre del servidor de correo
            $mail->Host = __phpmailer_host__;           //  "in-v3.mailjet.com";	//$mail->Host = "in-v3.mailjet.com";

            // Asignamos el puerto SMTP que usa nuestro servidor
            $mail->Port = __phpmailer_port__;
        // $mail->SMTPSecure = "tls";   

            // Indicamos aqu?? nuestro nombre de usuario
            $mail->Username = __phpmailer_username__;	//  $mail->Username = "1c96c2909ac708240c4491b5a821fa21";

            // Indicamos la contrase??a
            $mail->Password = __phpmailer_password__;   //  $mail->Password ="187201d6b77557358403ccbc07cee13a";

			// A??adimos la direcci??n del remitente
			$mail->From = "alqueria@alqueriadelbasket.info";

			// A??adimos el nombre del emisor
			$mail->FromName = "L??Alqueria del Basket";

			// En la direcci??n de responder ponemos la misma del From
			$mail->AddReplyTo("recepcion@alqueriadelbasket.com","L??Alqueria del Basket");

			// Le indicamos que nuestro Email est?? en Html
			$mail->IsHTML(true);

			// Indicamos la direcci??n y el nombre del destinatario
			$mail->AddAddress($emailtutor, 'Solicitud de inscripci??n');

			// Con copia oculta
			$mail->AddBCC('imartinez@valenciabasket.com', 'Inscripci??n Adidas Next Generation');
			$mail->AddBCC('recepcion@alqueriadelbasket.com', 'Inscripci??n Adidas Next Generation');

			// Ponemos aqu?? el asunto
			$mail->Subject = "Confirmaci??n de inscripci??n Adidas Next Generation";

			// Creamos todo el cuerpo del Email en Html en la variable $body
			$body = '
			<html>
			<body style="margin: 0.2em;">
			<div align="center" style="background-color: black;">
				<img src="https://servicios.alqueriadelbasket.com/img/logos-cabecera-email.png" width="100%" style="max-width: 476px;">
			</div>
			<div style="width: 80%;padding: 2em;">
				<p style="font-family: Helvetica LT Condensed; color: black;font-size: 16px;"><b>??Gracias por realizar la solicitud! Estos son los datos recibidos, para cualquier aclaraci??n, p??ngase en contacto con nosotros. </b></p>
				<p style="font-family: Helvetica LT Condensed; color: black;font-size: 16px;">' . $contenido . '</p>
			</div>
			</body>
			</html>';

			// A??adimos aqu?? el cuerpo del Email
			$mail->MsgHTML($body);

			// Enviamos y comprobamos si se ha mandado el Email correctamente
			if (!$mail->Send()) {
				//$mensaje_a_mostrar = "Mailer Error: " . $mail->ErrorInfo . "<br>";
				return false;
			}
			else {
				//$mensaje_a_mostrar = "Tu mensaje ha sido enviado.<br>";
				return true;
			}
		}


		// Env??o de emails de prueba
		public static function mailsSendLocalHost($numeroPedido, $nombre, $contenido, $seccionInscripcion, $email) {
			// Cargamos la clase PHPMailer
			require_once("PHPMailer/class.phpmailer.php");
			require_once("PHPMailer/class.smtp.php");
            require_once("config.php");		//	Contiene constantes del envio del email

			// Instanciamos un objeto PHPMailer
			$mail = new PHPMailer();

			$mail->CharSet = "UTF-8";

			// Le decimos que usamos el protocolo SMTP
			$mail->IsSMTP();

			// Le decimos que es necesario autenticarse
			$mail->SMTPAuth = true;

            // Indicamos aqu?? el nombre del servidor de correo
            $mail->Host = __phpmailer_host__;           //  "in-v3.mailjet.com";	//$mail->Host = "in-v3.mailjet.com";

            // Asignamos el puerto SMTP que usa nuestro servidor
            $mail->Port = __phpmailer_port__;
      		$mail->SMTPSecure = "tls";   

            // Indicamos aqu?? nuestro nombre de usuario
            $mail->Username = __phpmailer_username__;	//  $mail->Username = "1c96c2909ac708240c4491b5a821fa21";

            // Indicamos la contrase??a
            $mail->Password = __phpmailer_password__;   //  $mail->Password ="187201d6b77557358403ccbc07cee13a";

			// A??adimos la direcci??n del remitente
			$mail->From = "mlobeira@tessq.com";

			// A??adimos el nombre del emisor
			$mail->FromName = "L??Alqueria del Basket";

			// En la direcci??n de responder ponemos la misma del From
			//$mail->AddReplyTo("rlloret@tessq.com","Mensaje autom??tico");

			// Le indicamos que nuestro Email est?? en Html
			$mail->IsHTML(true);

			// Indicamos la direcci??n y el nombre del destinatario
			$mail->AddAddress($email, 'Solicitud de inscripci??n');

			// Con copia
			//$mail->AddCC('inscripciones@alqueriadelbasket.com', 'Copia Alqueria');

			// Ponemos aqu?? el asunto
			$mail->Subject = $seccionInscripcion;

			// Creamos todo el cuerpo del Email en Html en la variable $body
			$body = '
			<html>
			<body style="margin: 0.2em;">
			<div align="center" style="background-color: black;">
				<img src="https://servicios.alqueriadelbasket.com/img/logos-cabecera-email.png" width="100%" style="max-width: 476px;">
			</div>
			<div style="width: 80%;padding: 2em;">
				<h2 style="text-align: center;color:#eb7c00;border-bottom: #eb7c00 2px solid;">' . $seccionInscripcion . '</h2>
				<p style="font-family: Helvetica LT Condensed; color: black;font-size: 16px;"><b>??Gracias por realizar la solicitud! Estos son los datos recibidos, para cualquier aclaraci??n, p??ngase en contacto con nosotros.</b></p>
				<p style="font-family: Helvetica LT Condensed; color: black;font-size: 16px;"><b>N??mero de pedido:</b> ' . $numeroPedido . '</p>
				<p style="font-family: Helvetica LT Condensed; color: black;font-size: 16px;"><b>Nombre:</b> ' . $nombre . '</p>
				<p style="font-family: Helvetica LT Condensed; color: black;font-size: 16px;">' . $contenido . '</p>
			</div>
			</body>
			</html>';

			// A??adimos aqu?? el cuerpo del Email
			$mail->MsgHTML($body);

			// Enviamos y comprobamos si se ha mandado el Email correctamente
			if (!$mail->Send()) {
				//$mensaje_a_mostrar = "Mailer Error: " . $mail->ErrorInfo . "<br>";
				return false;
			}
			else {
				//$mensaje_a_mostrar = "Tu mensaje ha sido enviado.<br>";
				return true;
			}
		}


		// Env??o de emails a Pepe para una Reserva de Pista desde men?? back "Consulta Pistas"
		public static function enviaCorreoReservaPistaAPepe($entrenador, $email, $contenido) {
			// Cargamos la clase PHPMailer
			require_once("PHPMailer/class.phpmailer.php");
			require_once("PHPMailer/class.smtp.php");
            require_once("config.php");		//	Contiene constantes del envio del email

			// Instanciamos un objeto PHPMailer
			$mail = new PHPMailer();

			$mail->CharSet = "UTF-8";

			// Le decimos que usamos el protocolo SMTP
			$mail->IsSMTP();

			// Le decimos que es necesario autenticarse
			$mail->SMTPAuth = true;

            // Indicamos aqu?? el nombre del servidor de correo
            $mail->Host = __phpmailer_host__;           //  "in-v3.mailjet.com";	//$mail->Host = "in-v3.mailjet.com";

            // Asignamos el puerto SMTP que usa nuestro servidor
            $mail->Port = __phpmailer_port__;
           // $mail->SMTPSecure = __phpmailer_smtpsecure__;   

            // Indicamos aqu?? nuestro nombre de usuario
            $mail->Username = __phpmailer_username__;	//  $mail->Username = "1c96c2909ac708240c4491b5a821fa21";

            // Indicamos la contrase??a
            $mail->Password = __phpmailer_password__;   //  $mail->Password ="187201d6b77557358403ccbc07cee13a";

			// A??adimos la direcci??n del remitente
			$mail->From = "alqueria@alqueriadelbasket.info";

			// A??adimos el nombre del emisor
			$mail->FromName = "L??Alqueria del Basket";

			// En la direcci??n de responder ponemos la misma del From
			$mail->AddReplyTo('pcasares@alqueriadelbasket.com', 'Pepe Casares');

			// Le indicamos que nuestro Email est?? en Html
			$mail->IsHTML(true);

			// Indicamos la direcci??n y el nombre del destinatario
			$mail->AddAddress($email, $entrenador);

			// Con copia oculta
			$mail->AddBCC('pcasares@alqueriadelbasket.com', 'Pepe Casares');
			$mail->AddBCC('recepcion@alqueriadelbasket.com', 'Recepcion Alqueria');

			// Ponemos aqu?? el asunto
			$mail->Subject = 'Solicitud de Pista desde Servicios';

			// Traemos todo el cuerpo del Email Html a la variable $body
			$body = $contenido;

			// A??adimos aqu?? el cuerpo del Email
			$mail->MsgHTML($body);

			// Enviamos y comprobamos si se ha mandado el Email correctamente
			if (!$mail->Send()) {
				error_log(__FILE__.__FUNCTION__.__LINE__." IF ");
				return false;
			}
			else {
				error_log(__FILE__.__FUNCTION__.__LINE__." ELSE ");
				return true;
			}
		}



		// Env??o de emails a Pepe para una ANULACION de Pista desde ?r=reservasusuarios/BackGestionUser
		public static function enviaCorreoAnulacionPistaAPepe($entrenador, $email, $contenido) {
			// Cargamos la clase PHPMailer
			require_once("PHPMailer/class.phpmailer.php");
			require_once("PHPMailer/class.smtp.php");
            require_once("config.php");		//	Contiene constantes del envio del email

			// Instanciamos un objeto PHPMailer
			$mail = new PHPMailer();

			$mail->CharSet = "UTF-8";

			// Le decimos que usamos el protocolo SMTP
			$mail->IsSMTP();

			// Le decimos que es necesario autenticarse
			$mail->SMTPAuth = true;

            // Indicamos aqu?? el nombre del servidor de correo
            $mail->Host = __phpmailer_host__;           //  "in-v3.mailjet.com";	//$mail->Host = "in-v3.mailjet.com";

            // Asignamos el puerto SMTP que usa nuestro servidor
            $mail->Port = __phpmailer_port__;
           // $mail->SMTPSecure = __phpmailer_smtpsecure__;   

            // Indicamos aqu?? nuestro nombre de usuario
            $mail->Username = __phpmailer_username__;	//  $mail->Username = "1c96c2909ac708240c4491b5a821fa21";

            // Indicamos la contrase??a
            $mail->Password = __phpmailer_password__;   //  $mail->Password ="187201d6b77557358403ccbc07cee13a";

			// A??adimos la direcci??n del remitente
			$mail->From = "alqueria@alqueriadelbasket.info";

			// A??adimos el nombre del emisor
			$mail->FromName = "L??Alqueria del Basket";

			// En la direcci??n de responder ponemos la misma del From
			$mail->AddReplyTo('pcasares@alqueriadelbasket.com', 'Pepe Casares');

			// Le indicamos que nuestro Email est?? en Html
			$mail->IsHTML(true);

			// Indicamos la direcci??n y el nombre del destinatario
			$mail->AddAddress($email, $entrenador);

			// Con copia oculta
			$mail->AddBCC('pcasares@alqueriadelbasket.com', 'Pepe Casares');
			$mail->AddBCC('recepcion@alqueriadelbasket.com', 'Recepcion Alqueria');

			// Ponemos aqu?? el asunto
			$mail->Subject = 'Solicitud anulaci??n de pista desde Servicios';

			// Traemos todo el cuerpo del Email Html a la variable $body
			$body = $contenido;

			// A??adimos aqu?? el cuerpo del Email
			$mail->MsgHTML($body);

			// Enviamos y comprobamos si se ha mandado el Email correctamente
			if (!$mail->Send()) {
				error_log(__FILE__.__FUNCTION__.__LINE__." IF ");
				return false;
			}
			else {
				error_log(__FILE__.__FUNCTION__.__LINE__." ELSE ");
				return true;
			}
		}


		// Env??o de emails a Pepe para un Cambio de Partido desde men?? back "Consulta Pistas"
		public static function enviaCorreoCambioPartidoAPepe($nombre_solicitante, $email_solicitante, $contenido) {
			// Cargamos la clase PHPMailer
			require_once("PHPMailer/class.phpmailer.php");
			require_once("PHPMailer/class.smtp.php");
            require_once("config.php");		//	Contiene constantes del envio del email

			// Instanciamos un objeto PHPMailer
			$mail = new PHPMailer();

			$mail->CharSet = "UTF-8";

			// Le decimos que usamos el protocolo SMTP
			$mail->IsSMTP();

			// Le decimos que es necesario autenticarse
			$mail->SMTPAuth = true;

			// Indicamos aqu?? el nombre del servidor de correo
            $mail->Host = __phpmailer_host__;           //  "in-v3.mailjet.com";	//$mail->Host = "in-v3.mailjet.com";

            // Asignamos el puerto SMTP que usa nuestro servidor
            $mail->Port = __phpmailer_port__;
           // $mail->SMTPSecure = "tls";   

            // Indicamos aqu?? nuestro nombre de usuario
            $mail->Username = __phpmailer_username__;	//  $mail->Username = "1c96c2909ac708240c4491b5a821fa21";

            // Indicamos la contrase??a
            $mail->Password = __phpmailer_password__;   //  $mail->Password ="187201d6b77557358403ccbc07cee13a";

			// A??adimos la direcci??n del remitente
			$mail->From = "alqueria@alqueriadelbasket.info";

			// A??adimos el nombre del emisor
			$mail->FromName = "L??Alqueria del Basket";

			// En la direcci??n de responder ponemos la misma del From
			$mail->AddReplyTo('pcasares@alqueriadelbasket.com', 'Pepe Casares');

			// Le indicamos que nuestro Email est?? en Html
			$mail->IsHTML(true);

			// Indicamos la direcci??n y el nombre del destinatario
			$mail->AddAddress($email_solicitante, $nombre_solicitante);

			// Con copia oculta
			$mail->AddBCC('pcasares@alqueriadelbasket.com', 'Pepe Casares');
			//$mail->AddBCC('amomplet@tessq.com', 'Alex Momplet');

			// Ponemos aqu?? el asunto
			$mail->Subject = 'Solicitud de Cambio de Partido desde Servicios';

			// Traemos todo el cuerpo del Email Html a la variable $body
			$body = $contenido;

			// A??adimos aqu?? el cuerpo del Email
			$mail->MsgHTML($body);

			// Enviamos y comprobamos si se ha mandado el Email correctamente
			if (!$mail->Send()) {
							error_log(__FILE__.__FUNCTION__.__LINE__." IF ");
				return false;
			}
			else {
							error_log(__FILE__.__FUNCTION__.__LINE__." ELSE ");
				return true;
			}
		}


		// Env??o de emails a Pepe para una Reserva de C??mara / M??quina de tiro desde men?? back "Consulta Pistas"
		public static function enviaCorreoCamaraMaquinaAPepe($nombre_solicitante, $email_solicitante, $contenido) {
			// Cargamos la clase PHPMailer
			require_once("PHPMailer/class.phpmailer.php");
			require_once("PHPMailer/class.smtp.php");
            require_once("config.php");		//	Contiene constantes del envio del email

			// Instanciamos un objeto PHPMailer
			$mail = new PHPMailer();

			$mail->CharSet = "UTF-8";

			// Le decimos que usamos el protocolo SMTP
			$mail->IsSMTP();

			// Le decimos que es necesario autenticarse
			$mail->SMTPAuth = true;

			// Indicamos aqu?? el nombre del servidor de correo
            $mail->Host = __phpmailer_host__;           //  "in-v3.mailjet.com";	//$mail->Host = "in-v3.mailjet.com";

            // Asignamos el puerto SMTP que usa nuestro servidor
            $mail->Port = __phpmailer_port__;
           // $mail->SMTPSecure = __phpmailer_smtpsecure__;   

            // Indicamos aqu?? nuestro nombre de usuario
            $mail->Username = __phpmailer_username__;	//  $mail->Username = "1c96c2909ac708240c4491b5a821fa21";

            // Indicamos la contrase??a
            $mail->Password = __phpmailer_password__;   //  $mail->Password ="187201d6b77557358403ccbc07cee13a";

			// A??adimos la direcci??n del remitente
			$mail->From = "alqueria@alqueriadelbasket.info";

			// A??adimos el nombre del emisor
			$mail->FromName = "L??Alqueria del Basket";

			// En la direcci??n de responder ponemos la misma del From
			$mail->AddReplyTo('pcasares@alqueriadelbasket.com', 'Pepe Casares');

			// Le indicamos que nuestro Email est?? en Html
			$mail->IsHTML(true);

			// Indicamos la direcci??n y el nombre del destinatario
			$mail->AddAddress($email_solicitante, $nombre_solicitante);

			// Con copia oculta
			$mail->AddBCC('pcasares@alqueriadelbasket.com', 'Pepe Casares');
			$mail->AddBCC('recepcion@alqueriadelbasket.com', 'Recepci??n de L??Alqueria');
			//$mail->AddBCC('amomplet@tessq.com', 'Alex Momplet');

			// Ponemos aqu?? el asunto
			$mail->Subject = 'Solicitud de C??mara / M??quina de tiro desde Servicios';

			// Traemos todo el cuerpo del Email Html a la variable $body
			$body = $contenido;

			// A??adimos aqu?? el cuerpo del Email
			$mail->MsgHTML($body);

			// Enviamos y comprobamos si se ha mandado el Email correctamente
			if (!$mail->Send()) {
				error_log(__FILE__.__FUNCTION__.__LINE__." IF ");
				return false;
			}
			else {
				error_log(__FILE__.__FUNCTION__.__LINE__." ELSE ");
				return true;
			}
		}


		// Env??o de emails a Pepe para una Reserva de Sala desde men?? back "Consulta Salas"
		public static function enviaCorreoReservaSalaaAPepe($nombre_solicitante, $email_solicitante, $contenido) {
			// Cargamos la clase PHPMailer
			require_once("PHPMailer/class.phpmailer.php");
			require_once("PHPMailer/class.smtp.php");
            require_once("config.php");		//	Contiene constantes del envio del email

			// Instanciamos un objeto PHPMailer
			$mail = new PHPMailer();

			$mail->CharSet = "UTF-8";

			// Le decimos que usamos el protocolo SMTP
			$mail->IsSMTP();

			// Le decimos que es necesario autenticarse
			$mail->SMTPAuth = true;

            // Indicamos aqu?? el nombre del servidor de correo
            $mail->Host = __phpmailer_host__;           //  "in-v3.mailjet.com";	//$mail->Host = "in-v3.mailjet.com";

            // Asignamos el puerto SMTP que usa nuestro servidor
            $mail->Port = __phpmailer_port__;
            //$mail->SMTPSecure = __phpmailer_smtpsecure__;   

            // Indicamos aqu?? nuestro nombre de usuario
            $mail->Username = __phpmailer_username__;	//  $mail->Username = "1c96c2909ac708240c4491b5a821fa21";

            // Indicamos la contrase??a
            $mail->Password = __phpmailer_password__;   //  $mail->Password ="187201d6b77557358403ccbc07cee13a";

			// A??adimos la direcci??n del remitente
			$mail->From = "alqueria@alqueriadelbasket.info";

			// A??adimos el nombre del emisor
			$mail->FromName = "L??Alqueria del Basket";

			// En la direcci??n de responder ponemos la misma del From
			$mail->AddReplyTo('pcasares@alqueriadelbasket.com', 'Pepe Casares');

			// Le indicamos que nuestro Email est?? en Html
			$mail->IsHTML(true);

			// Indicamos la direcci??n y el nombre del destinatario
			$mail->AddAddress($email_solicitante, $nombre_solicitante);

			// Con copia oculta
			$mail->AddBCC('pcasares@alqueriadelbasket.com', 'Pepe Casares');
			$mail->AddBCC('recepcion@alqueriadelbasket.com', 'Recepci??n de L??Alqueria');

			// Ponemos aqu?? el asunto
			$mail->Subject = 'Solicitud de Sala desde Servicios';

			// Traemos todo el cuerpo del Email Html a la variable $body
			$body = $contenido;

			// A??adimos aqu?? el cuerpo del Email
			$mail->MsgHTML($body);

			// Enviamos y comprobamos si se ha mandado el Email correctamente
			if (!$mail->Send()) {
				return false;
			}
			else {
				return true;
			}
		}


		// Env??o de emails a solicitantes de Federaci??n por falta de datos
		public static function enviaCorreoAInscripciones($email, $mensaje) {
			// Cargamos la clase PHPMailer
			require_once("PHPMailer/class.phpmailer.php");
			require_once("PHPMailer/class.smtp.php");
            require_once("config.php");		//	Contiene constantes del envio del email

			// Instanciamos un objeto PHPMailer
			$mail = new PHPMailer();

			$mail->CharSet = "UTF-8";

			// Le decimos que usamos el protocolo SMTP
			$mail->IsSMTP();

			// Le decimos que es necesario autenticarse
			$mail->SMTPAuth = true;

            // Indicamos aqu?? el nombre del servidor de correo
            $mail->Host = __phpmailer_host__;           //  "in-v3.mailjet.com";	//$mail->Host = "in-v3.mailjet.com";

            // Asignamos el puerto SMTP que usa nuestro servidor
            $mail->Port = __phpmailer_port__;
          // $mail->SMTPSecure = "tls";   

            // Indicamos aqu?? nuestro nombre de usuario
            $mail->Username = __phpmailer_username__;	//  $mail->Username = "1c96c2909ac708240c4491b5a821fa21";

            // Indicamos la contrase??a
            $mail->Password = __phpmailer_password__;   //  $mail->Password ="187201d6b77557358403ccbc07cee13a";

			// A??adimos la direcci??n del remitente
			$mail->From = "alqueria@alqueriadelbasket.info";
			//$mail->From = "inscripciones@alqueriadelbasket.com";

			// A??adimos el nombre del emisor
			$mail->FromName = "L??Alqueria del Basket";

			// Le indicamos que nuestro Email est?? en Html
			$mail->IsHTML(true);

			// Indicamos la direcci??n y el nombre del destinatario
			$mail->AddAddress($email, "");

			// Con copia
			//$mail->AddCC('imartinez@valenciabaset.com', 'Valencia Basket Inscripci??n Adidas');
			//$mail->AddBCC('recepcion@alqueriadelbasket.com', 'Inscripci??n Adidas Next Generation');

			// Ponemos aqu?? el asunto
			$mail->Subject = 'Datos incompletos en la Licencia Federacion 2019 - 2020';

			// Creamos todo el cuerpo del Email en Html en la variable $body
			$body = '
			<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="https://www.w3.org/1999/xhtml">
				<head>
					<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
					<title>L??Alqueria del Basket</title>
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
											'.$mensaje.'
										</td>
									</tr>
									<tr>
										<td bgcolor="#424241" style="padding: 20px 30px 20px 30px">
											<table border="0" cellpadding="0" cellspacing="0" width="100%">
												<tr>
													<td width="75%" style="font-family: Arial, sans-serif; line-height: 18px; font-size: 12px;">
														<span style="color: #eb7c00;">&copy; L??Alqueria del Basket 2019</span><br>
														<span style="color: #ffffff;">C/ Bomber Ramon Duart S/N 46013, Val??ncia</span><br>
														<span style="color: #ffffff;">+34 96 121 55 43</span>
													</td>
													<td width="25%" align="right">
														<table border="0" cellpadding="0" cellspacing="0">
															<tr>
																<td>
																	<a href="https://www.facebook.com/LAlqueriaVBC" target="_blank">
																		<img src="https://servicios.alqueriadelbasket.com/img/logo-facebook.png" alt="Facebook L??Alqueria del VBC" width="32" height="32" style="display: block;" border="0">
																	</a>
																</td>
																<td style="font-size: 0; line-height: 0;" width="10%">&nbsp;</td>
																<td>
																	<a href="https://twitter.com/LAlqueriaVBC" target="_blank">
																		<img src="https://servicios.alqueriadelbasket.com/img/logo-twitter.png" alt="Twitter L??Alqueria del VBC" width="32" height="32" style="display: block;" border="0">
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

			// A??adimos aqu?? el cuerpo del Email
			$mail->MsgHTML($body);

			// Enviamos y comprobamos si se ha mandado el Email correctamente
			if(!$mail->Send()) {
				error_log("Mailer Error: ".print_r($mail->ErrorInfo,1));
				return false;
			}
			else {
				return true;
			}
		}


		// Env??o de emails a Recepci??n desde Solicitudes de Licencia
		public static function enviaCorreoARecepcion($mensaje){
			// Cargamos la clase PHPMailer
			require_once("PHPMailer/class.phpmailer.php");
			require_once("PHPMailer/class.smtp.php");
            require_once("config.php");		//	Contiene constantes del envio del email


			// Instanciamos un objeto PHPMailer
			$mail = new PHPMailer();

			$mail->CharSet = "UTF-8";

			// Le decimos que usamos el protocolo SMTP
			$mail->IsSMTP();

			// Le decimos que es necesario autenticarse
			$mail->SMTPAuth = true;

            // Indicamos aqu?? el nombre del servidor de correo
            $mail->Host = __phpmailer_host__;           //  "in-v3.mailjet.com";	//$mail->Host = "in-v3.mailjet.com";

            // Asignamos el puerto SMTP que usa nuestro servidor
            $mail->Port = __phpmailer_port__;
           // $mail->SMTPSecure = "tls";   

            // Indicamos aqu?? nuestro nombre de usuario
            $mail->Username = __phpmailer_username__;	//  $mail->Username = "1c96c2909ac708240c4491b5a821fa21";

            // Indicamos la contrase??a
            $mail->Password = __phpmailer_password__;   //  $mail->Password ="187201d6b77557358403ccbc07cee13a";

			// A??adimos la direcci??n del remitente
			$mail->From = "alqueria@alqueriadelbasket.info";

			// A??adimos el nombre del emisor
			$mail->FromName = "L??Alqueria del Basket";

			// En la direcci??n de responder ponemos la misma del From
			//$mail->AddReplyTo("rlloret@tessq.com","Mensaje autom??tico");

			// Le indicamos que nuestro Email est?? en Html
			$mail->IsHTML(true);

			// Indicamos la direcci??n y el nombre del destinatario
			$mail->AddAddress('recepcion@alqueriadelbasket.com', 'L??Alqueria del Basket');
			//$mail->AddAddress('rlloret@tessq.com', 'Consulta de pistas');

			// Con copia
			//$mail->AddCC('imartinez@valenciabaset.com', 'Valencia Basket Inscripci??n Adidas');
			//$mail->AddBCC('recepcion@alqueriadelbasket.com', 'Inscripci??n Adidas Next Generation');

			// Ponemos aqu?? el asunto
			$mail->Subject = 'Nueva Solicitud de Licencia Federacion 2019 - 2020';

			// Creamos todo el cuerpo del Email en Html en la variable $body
			$body = '
			<html>
			<body style="margin: 0.2em;">
			<div align="center" style="background-color: black;">
				<img src="https://servicios.alqueriadelbasket.com/img/logos-cabecera-email.png" width="100%" style="max-width: 476px;">
			</div>
			<div style="width: 80%;padding: 2em;">
				<h2 style="text-align: center;color:#eb7c00;border-bottom: #eb7c00 2px solid;">Nueva solicitud de licencia de federaci??n: </h2>
				<p style="font-family: Helvetica LT Condensed; color: black;font-size: 16px;"><b>Mensaje: </b>' . $mensaje . '</p>
			</div>
			</body>
			</html>';

			// A??adimos aqu?? el cuerpo del Email
			$mail->MsgHTML($body);

			// Enviamos y comprobamos si se ha mandado el Email correctamente
			if (!$mail->Send()) {
				error_log(__FILE__.__LINE__.". El envio de email se ha hecho correctamente");
				return false;
			}
			else {
				return true;
			}
		}
	}
?>