<?php
	class inscripciones {

		public static function findUser($usuario) {
			$query = db::singleton()->query('SELECT * FROM usuarios WHERE usuario="' . $usuario . '"');
			if ($query) {
				return $query->fetch();
			}
			else {
				return false;
			}
		}

		


		/****************************
		* FORMULARIOS INSCRIPCIONES *
		****************************/

		public static function findFormForId($id) {
			$query = db::singleton()->query('SELECT fi.*, fe.Nombre AS NombreEquipo, fc.Nombre AS NombreClub, fca.Nombre as NombreCategoria FROM formulariosinscripciones fi LEFT JOIN federacion_equipos fe on fi.id_federacion_equipo=fe.ID LEFT JOIN federacion_clubs fc ON fi.id_federacion_clubs=fc.ID LEFT JOIN federacion_categorias fca ON fi.id_federacion_categoria=fca.ID WHERE fi.id_formulario=' . $id);

			if ($query) {
				return $query->fetch();
			}
			else {
				return false;
			}
		}



		//inscripciones 19_20
		public static function findFormForIdConHorarios($id) {
			$sentencia_sql=' SELECT '
							. '     fi.*,'
							. '     he.equipo,he.lunes,he.martes,he.miercoles,he.jueves,he.viernes, he.ID as IDequipo,'
									. '  fe.Nombre AS NombreEquipo, fc.Nombre AS NombreClub, fca.Nombre as NombreCategoria  '
							. ' FROM        formulariosinscripciones    fi '
							. ' LEFT JOIN   horarios_equipos_19_20      he  ON fi.id_equipo_horario=he.ID
							LEFT JOIN federacion_equipos fe ON fi.id_federacion_equipo=fe.ID LEFT JOIN federacion_clubs fc ON fi.id_federacion_clubs=fc.ID LEFT JOIN federacion_categorias fca ON fi.id_federacion_categoria=fca.ID'
							. ' WHERE '
							. '     fi.id_formulario='.$id;
			
			error_log(__FILE__.__LINE__);
			error_log($sentencia_sql);
			
			$query = db::singleton()->query($sentencia_sql);

			/*error_log(''
							. ' SELECT '
							. '     fi.*,'
							. '     he.equipo,he.lunes,he.martes,he.miercoles,he.jueves,he.viernes, he.ID as IDequipo, fe.Nombre AS NombreEquipo, fc.Nombre AS NombreClub, fca.Nombre as NombreCategoria  '
							. ' FROM        formulariosinscripciones    fi '
							. ' LEFT JOIN   horarios_equipos_19_20      he  ON fi.id_equipo_horario=he.ID
							LEFT JOIN federacion_equipos fe on fi.id_federacion_equipo=fe.ID LEFT JOIN federacion_clubs fc on fi.id_federacion_clubs=fc.ID LEFT JOIN federacion_categorias fca ON fi.id_federacion_categoria=fca.ID'
							. ' WHERE '
							. '     fi.id_formulario='.$id);*/

			if ($query) {
					return $query->fetch();
			}
			else {
					return false;
			}
		}


		public static function findFormFornumero_pedido($numeroPedido) {
			//error_log('SELECT * FROM formulariosinscripciones WHERE numero_pedido="' . $numeroPedido . '"');
			$query = db::singleton()->query('SELECT * FROM formulariosinscripciones WHERE numero_pedido="' . $numeroPedido . '"');
			//error_log('SELECT * FROM formulariosinscripciones WHERE numero_pedido="' . $numeroPedido . '"');
			if ($query) {
				return $query->fetch();
			}
			else {
				return false;
			}
		}


		public static function findFormIdFormulariosInscripcionesPagos($IdFormularios) {
			//error_log('SELECT * FROM formulariosinscripciones WHERE numero_pedido="' . $numeroPedido . '"');
			$query = db::singleton()->query('SELECT * FROM formulariosinscripciones_pagos WHERE id_formularioinscripciones="' . $IdFormularios . '" order by id desc');
			//error_log('SELECT * FROM formulariosinscripciones_pagos WHERE id_formularioinscripciones="' . $IdFormularios . '" order by id desc');
			if ($query) {
				return $query->fetch();
			}
			else {
				return false;
			}
		}


		public static function actualizapagoenoficina($id_formulario, $pagado) {

			$sql = "UPDATE formulariosinscripciones SET pagado=:pag WHERE id_formulario=:id";
			$query = db::singleton()->prepare($sql);

			if (!$query) {
				return false;
			}

			$datos = array(':id' => $id_formulario, ':pag' => $pagado);

			if (!$query->execute($datos)) {
				return false;
			}
			else {
				echo "<script text='javascript'> alert('La inscripción se ha actualizado a pagado en oficina');
					window.location.replace('?r=login/backdni'); </script>";
				die;
			}
		}


		//actualizar el pagado al retorno del tpv y desde el back
		public static function actualizapagotpv($codigo, $pagado) {
			$sql = "update formulariosinscripciones set pagado_ok=:pag where numero_pedido=:numero";
			$query = db::singleton()->prepare($sql);

			if (!$query) {
				return false;
			}

			$datos = array(':numero' => $codigo, ':pag' => $pagado);

			if (!$query->execute($datos)) {
				return false;
			} 
			else {
			   /* error_log( print_r( $datos, -1 ) );
				$arr = $query->errorInfo();
				error_log( print_r( $arr, -1) );
				error_log( print_r( $query, -1 ) );*/
				return true;
			}
		}


		public static function actualizacuentabancaria($idinscripcion, $nuevocontenido) {
			$sql = "UPDATE formulariosinscripciones SET contenido=:cont WHERE id_formulario=:id";
			$query = db::singleton()->prepare($sql);

			if (!$query) {
				return false;
			}

			$datos = array(':id' => $idinscripcion, ':cont' => $nuevocontenido);

			if (!$query->execute($datos)) {
				$query->errorInfo();
				return false;
			}

			return true;
		}


		public static function actualizaEstado($idinscripcion,$is_active) {
			$sql = "UPDATE formulariosinscripciones SET is_active=:active WHERE id_formulario=:id_formulario";
			$query = db::singleton()->prepare($sql);

			if (!$query) {
				return false;
			}

			$datos = array(':active' => $is_active, ':id_formulario' => $idinscripcion);

			if (!$query->execute($datos)) {
				$query->errorInfo();
				return false;
			}

			return true;
		}


		public static function actualizaAtributo($nombreAtributo,$valorAtributo,$id_formulario,$ponerComillas="no") {
			if (!empty($valorAtributo))	{
				if ($ponerComillas == "no") {
					$sentencia_sql="UPDATE formulariosinscripciones SET ".$nombreAtributo."=".$valorAtributo." WHERE id_formulario=".$id_formulario;
				}
				else {
					$sentencia_sql="UPDATE formulariosinscripciones SET ".$nombreAtributo."=\"".$valorAtributo."\" WHERE id_formulario=".$id_formulario;
				}
			}
			else {
				$sentencia_sql="UPDATE formulariosinscripciones SET ".$nombreAtributo."=NULL WHERE id_formulario=".$id_formulario;
			}

			if ($nombreAtributo  == "alergico" && $valorAtributo="NULL") {
				$sentencia_sql = "UPDATE formulariosinscripciones SET ".$nombreAtributo."=0 WHERE id_formulario=".$id_formulario;
			}

			//  error_log(__FILE__.__LINE__);
			//  error_log($sentencia_sql);
			/*  if($nombreAtributo  == "id_equipo_horario"){
					error_log($sentencia_sql); 
				}
			*/


			$query = db::singleton()->prepare($sentencia_sql);

			if (!$query) {
				error_log(var_dump( db::singleton()->errorInfo()));
				die;
			}

			$datos = array("");

			if (!$query->execute($datos)) {
				error_log(print_r( $query->errorInfo(),1));
				die;
			}
			else {
				return true;
			}
		}


		public static function actualizaAtributoPagos($nombreAtributo,$valorAtributo,$id_formulario,$ponerComillas="no") {
			if (!empty($valorAtributo))	{
				if ($ponerComillas==="no") {
					$sentencia_sql="UPDATE formulariosinscripciones_pagos SET ".$nombreAtributo."=".$valorAtributo." "
								. " WHERE id_formularioinscripciones=".$id_formulario;
				}
				else {
					$sentencia_sql="UPDATE formulariosinscripciones_pagos SET ".$nombreAtributo."=\"".$valorAtributo."\" "
								. " WHERE id_formularioinscripciones=".$id_formulario;
				}
			}
			else {
				$sentencia_sql    ="UPDATE formulariosinscripciones_pagos SET ".$nombreAtributo."=NULL "
								. " WHERE id_formulario=".$id_formulario;
			}

			$query = db::singleton()->prepare($sentencia_sql);

			if (!$query) {
				error_log(var_dump( db::singleton()->errorInfo()));
				die;
			}

			$datos = array("");

			if (!$query->execute($datos)) {
				error_log(print_r( $query->errorInfo(),1));
				die;
			}
			else {
				return true;
			}
		}


		public static function actualizaAtributoDatos($nombreAtributo,$valorAtributo,$id_formulario,$ponerComillas="no") {
			if (!empty($valorAtributo)) {

				if ($ponerComillas === "no") {
					$sentencia_sql="UPDATE formulariosinscripciones SET ".$nombreAtributo."=".$valorAtributo." WHERE numero_pedido=".$id_formulario;
				}
				else {
					$sentencia_sql="UPDATE formulariosinscripciones SET ".$nombreAtributo."=\"".$valorAtributo."\" WHERE numero_pedido=".$id_formulario;
				}
			}
			else {
				$sentencia_sql="UPDATE formulariosinscripciones SET ".$nombreAtributo."=NULL WHERE numero_pedido=".$id_formulario;
			}
			//error_log($sentencia_sql);

			$query=db::singleton()->prepare($sentencia_sql);

			if (!$query) {
				error_log(var_dump( db::singleton()->errorInfo()));
				die;
			}

			$datos = array("");

			if (!$query->execute($datos)) {
				error_log(print_r( $query->errorInfo(),1));
				die;
			}
			else {
				return true;
			}
		}


		public static function rellenarInscripciones($nombreAtributo,$valorAtributo,$numeroPedido,$ponerComillas="no") {
			if ($ponerComillas === "no") {
				$sentencia_sql="UPDATE formulariosinscripciones SET ".$nombreAtributo."=".$valorAtributo." WHERE numero_pedido=".$numeroPedido;
			}
			else {
				$sentencia_sql="UPDATE formulariosinscripciones SET ".$nombreAtributo."=\"".$valorAtributo."\" WHERE numero_pedido=".$numeroPedido;
			}

			//error_log($sentencia_sql);

			$query = db::singleton()->prepare($sentencia_sql);

			if (!$query) {
				error_log(var_dump( db::singleton()->errorInfo()));
				die;
			}

			$datos = array("");

			if (!$query->execute($datos)) {
				error_log(print_r( $query->errorInfo(),1));
				die;
			}
			else {
				return true;
			}
		}


		/*public static function actualizaAtributo($atributo, $valor, $id_formulario) {
			$sql = "UPDATE formulariosinscripciones SET :atributo=:valor WHERE id_formulario=:id_formulario";
			$query = db::singleton()->prepare($sql);

			error_log( print_r($query) );

			if (!$query) {
				return false;
			}

			$datos = array(':atributo' => $atributo, ':valor' => $valor, ':id_formulario' => $id_formulario);

			if (!$query->execute($datos)) {
				$query->errorInfo();
				return false;
			}

			return true;
		}*/


		public static function findAllByTemporadaNueva() {
			return db::singleton()->query('SELECT * FROM formulariosinscripciones WHERE is_active = 1 AND temporada="19/20"')->fetchAll();
		}


		public static function findAllEquiposGroupByModalidad() {
			return db::singleton()->query('select modalidad , count(*) as equipo from formulariosinscripciones group by modalidad')->fetchAll();
		}


		public static function findAllByIsActive() {
			return db::singleton()->query('SELECT
											  fi.*, he.equipo 
											FROM
											  formulariosinscripciones fi 
											  LEFT JOIN horarios_equipos_19_20 he on fi.id_equipo_horario=he.ID
											WHERE
											   fi.is_active = 1')->fetchAll();
		}


		public static function findAllByIsActiveNuevaTemporada() {
			return db::singleton()->query('SELECT
												fi.*, 
												he.equipo,
												IF(licencia.id                      IS NOT NULL, "OK", "*Falta FED.") as Falta_Fed
											FROM
												formulariosinscripciones fi 
												LEFT JOIN horarios_equipos_19_20    he          on fi.id_equipo_horario=he.ID
												LEFT JOIN licenciasfederacion1920   licencia    on fi.id_formulario=licencia.id_formulariosinscripciones
											WHERE
												fi.is_active = 1 AND fi.temporada= "19/20" 
											GROUP BY 
												fi.id_formulario')->fetchAll();
		}



		public static function findAllByIsActiveUltimaTemporada() {
			return db::singleton()->query('SELECT
											  fi.*, he.equipo 
											FROM
											  formulariosinscripciones fi 
											  LEFT JOIN horarios_equipos_19_20 he on fi.id_equipo_horario=he.ID
											WHERE
											   fi.is_active = 1 AND fi.temporada= "18/19"')->fetchAll();
		}


		public static function findAllHorararios_equipos() {
					return db::singleton()->query('SELECT * FROM `horarios_equipos_19_20`')->fetchAll();
		}
		
				
		/*  findHorariosEquipos20192020() devuelve la lista de equipos + su tipo { ESCUELA O CANTERA }*/
		public static function findHorariosEquipos20192020() {
					$sentencia_sql='SELECT
						ID,
						equipo,
						tipo
					FROM
						horarios_equipos_19_20
					INNER JOIN formulariosinscripciones ON formulariosinscripciones.id_equipo_horario = horarios_equipos_19_20.ID
					INNER JOIN(
						SELECT
							id_equipo_horario,
							MIN(id_formulario) AS minimo_id
						FROM
							formulariosinscripciones
						WHERE tipo IS NOT NULL
						GROUP BY
							id_equipo_horario
					) formulariosinscripciones2
					ON
						formulariosinscripciones.id_equipo_horario = formulariosinscripciones2.id_equipo_horario AND formulariosinscripciones2.minimo_id = formulariosinscripciones.id_formulario';
					
					return db::singleton()->query($sentencia_sql)->fetchAll();
		}


				//  Para extraer las inscripciones vacias de @
				// Para la consulta de exportar a excel todas las inscripcciones Escuela y Cantera
		public static function findAllInscripcionesExcelCantera() {

					$sentencia_sql='SELECT
					fi.numero_pedido AS Pedido,
					he.equipo,
					fi.categoria,
					CONVERT(
						CAST(
							CONVERT(fi.nombre_apellidos USING latin1) AS BINARY
						) USING utf8
					) AS Nombre_Completo,
					fi.email AS Email,
					fi.fecha,
					fi.fecha_nacimiento,
					CONVERT(
						CAST(
							CONVERT(fi.direccion USING latin1) AS BINARY
						) USING utf8
					) AS Direccion,
					fi.numero,
					fi.piso,
					CONVERT(CAST(CONVERT(fi.puerta USING latin1) AS BINARY) USING utf8) AS Puerta,
					CONVERT(
						CAST(
							CONVERT(fi.poblacion USING latin1) AS BINARY
						) USING utf8
					) AS Poblacion,
					fi.codigo_postal,
					CONVERT(CAST(CONVERT(fi.provincia USING latin1) AS BINARY) USING utf8) AS Provincia,
					CONVERT(CAST(CONVERT(fi.nombre_padre USING latin1) AS BINARY) USING utf8) AS Nombre_padre,
					CONVERT(CAST(CONVERT(fi.nombre_madre USING latin1) AS BINARY) USING utf8) AS Nombre_madre,
					fi.telefono_padre,
					fi.telefono_madre,
					CONVERT(CAST(CONVERT(fi.titular_banco USING latin1) AS BINARY) USING utf8) AS Titular_banco,
					fi.dni_tutor,
					fi.dni_jugador,
					fi.iban,
					fi.entidad,
					fi.oficina,
					fi.dc,
					fi.cuenta,
					CONVERT(
						CAST(
							CONVERT(fi.alergias USING latin1) AS BINARY
						) USING utf8
					) AS Alergias,
					fi.temporada,
					CONVERT(
						CAST(
							CONVERT(fi.federacion_equipo USING latin1) AS BINARY
						) USING utf8
					) AS Federacion_equipo,
					CONVERT(
						CAST(
							CONVERT(fi.federacion_categoria USING latin1) AS BINARY
						) USING utf8
					) AS Federacion_categoria,
					CONVERT(
						CAST(
							CONVERT(fi.federacion_club USING latin1) AS BINARY
						) USING utf8
					) AS Federacion_club,
												CONVERT(
														CAST(
																CONVERT(fi.id_federacion_equipo   USING latin1) AS BINARY
														) USING utf8
												) AS ID_Federacion_equipo,
												CONVERT(
														CAST(
																CONVERT(fi.id_federacion_categoria   USING latin1) AS BINARY
														) USING utf8
												) AS ID_Federacion_categoria,
												CONVERT(
														CAST(
																CONVERT(fi.id_federacion_clubs   USING latin1) AS BINARY
														) USING utf8
												) AS ID_Federacion_club,
															CONVERT(
																CAST(
																	CONVERT(fede_equipo.Nombre      USING latin1) AS BINARY
																) USING utf8
															) AS DB_Federacion_equipo,
															CONVERT(
																CAST(
																	CONVERT(fede_categoria.Nombre   USING latin1) AS BINARY
																) USING utf8
															) AS DB_Federacion_categoria,
															CONVERT(
																	CAST(
																	CONVERT(fede_club.Nombre        USING latin1) AS BINARY
																	) USING utf8
															) AS DB_Federacion_club
				   
				FROM
					formulariosinscripciones fi 
					LEFT JOIN horarios_equipos_19_20    he              ON fi.id_equipo_horario=he.ID
										LEFT JOIN federacion_equipos        fede_equipo     ON fi.id_federacion_equipo     =    fede_equipo.ID
										LEFT JOIN federacion_categorias     fede_categoria  ON fi.id_federacion_categoria  =    fede_categoria.ID
										LEFT JOIN federacion_clubs          fede_club       ON fi.id_federacion_clubs      =    fede_club.ID
				WHERE
					fi.tipo = "CANTERA" AND fi.temporada = "19/20"';
					
					//error_log(__FILE__.__LINE__);
					//error_log($sentencia_sql);
					
			$query = db::singleton()->query($sentencia_sql);

			if ($query) {
				return $query->fetchAll(PDO::FETCH_ASSOC);
			}
			else {
				return false;
			}
		}
				
				
		public static function findAllExcelCuentas() {

			$query = db::singleton()->query('
				SELECT
				CONVERT(
					CAST(
						CONVERT(nombre_apellidos USING latin1) AS BINARY
					) USING utf8
				) AS Nombre_Apellidos,
				CONVERT(
					CAST(
						CONVERT(email USING latin1) AS BINARY
					) USING utf8
				) AS Email,
				CONVERT(
					CAST(
						CONVERT(nombre_padre USING latin1) AS BINARY
					) USING utf8
				) AS Nombre_Padre,
				telefono_padre,
				CONVERT(
					CAST(
						CONVERT(nombre_madre USING latin1) AS BINARY
					) USING utf8
				) AS Nombre_Madre,
				telefono_madre,
				iban,
				entidad, 
				oficina,
				dc,
				cuenta
			FROM
				formulariosinscripciones
			WHERE
				temporada = "19/20" AND(
					(LENGTH(iban) != "4") OR(LENGTH(entidad) != "4") OR(LENGTH(oficina) != "4") OR(LENGTH(dc) != "2") OR(LENGTH(cuenta) != "10")
				)'
				);

			if ($query) {
				return $query->fetchAll(PDO::FETCH_ASSOC);
			}
			else {
				return false;
			}
		}


		public static function findAllInscripcionesExcelEscuela()
				{
					$sentencia_sql='
				SELECT
					fi.numero_pedido AS Pedido,
					he.equipo,
					fi.categoria,
					CONVERT(
						CAST(
							CONVERT(
								fi.nombre_apellidos USING latin1
							) AS BINARY
						) USING utf8
					) AS Nombre_Completo,
					fi.email AS Email,
					fi.fecha,
					fi.fecha_nacimiento,
					CONVERT(
						CAST(
							CONVERT(fi.direccion USING latin1) AS BINARY
						) USING utf8
					) AS Direccion,
					fi.numero,
					fi.piso,
					fi.puerta,
					CONVERT(
						CAST(
							CONVERT(fi.poblacion USING latin1) AS BINARY
						) USING utf8
					) AS Poblacion,
					fi.codigo_postal,
					CONVERT(CAST(CONVERT(fi.provincia USING latin1) AS BINARY) USING utf8) AS Provincia,
					CONVERT(CAST(CONVERT(fi.nombre_padre USING latin1) AS BINARY) USING utf8) AS Nombre_padre,
					CONVERT(CAST(CONVERT(fi.nombre_madre USING latin1) AS BINARY) USING utf8) AS Nombre_madre,
					fi.telefono_padre,
					fi.telefono_madre,
					CONVERT(CAST(CONVERT(fi.titular_banco USING latin1) AS BINARY) USING utf8) AS Titular_banco,
					fi.dni_tutor,
					fi.dni_jugador,
					fi.iban,
					fi.entidad,
					fi.oficina,
					fi.dc,
					fi.cuenta,
					CONVERT(
						CAST(
							CONVERT(fi.alergias USING latin1) AS BINARY
						) USING utf8
					) AS Alergias,
					fi.temporada,
					fi.is_active,
					fi.pagado AS TipoPago,
					fi.pagado_ok,
										CONVERT(
						CAST(
							CONVERT(fi.federacion_equipo USING latin1) AS BINARY
						) USING utf8
					) AS Federacion_equipo,
					CONVERT(
						CAST(
							CONVERT(fi.federacion_categoria USING latin1) AS BINARY
						) USING utf8
					) AS Federacion_categoria,
					CONVERT(
						CAST(
							CONVERT(fi.federacion_club USING latin1) AS BINARY
						) USING utf8
					) AS Federacion_club,
												CONVERT(
														CAST(
																CONVERT(fi.id_federacion_equipo   USING latin1) AS BINARY
														) USING utf8
												) AS ID_Federacion_equipo,
												CONVERT(
														CAST(
																CONVERT(fi.id_federacion_categoria   USING latin1) AS BINARY
														) USING utf8
												) AS ID_Federacion_categoria,
												CONVERT(
														CAST(
																CONVERT(fi.id_federacion_clubs   USING latin1) AS BINARY
														) USING utf8
												) AS ID_Federacion_club,
															CONVERT(
																CAST(
																	CONVERT(fede_equipo.Nombre      USING latin1) AS BINARY
																) USING utf8
															) AS DB_Federacion_equipo,
															CONVERT(
																CAST(
																	CONVERT(fede_categoria.Nombre   USING latin1) AS BINARY
																) USING utf8
															) AS DB_Federacion_categoria,
															CONVERT(
																	CAST(
																	CONVERT(fede_club.Nombre        USING latin1) AS BINARY
																	) USING utf8
															) AS DB_Federacion_club
				FROM
					formulariosinscripciones fi
				LEFT JOIN horarios_equipos_19_20    he              ON fi.id_equipo_horario         =   he.ID
								LEFT JOIN federacion_equipos        fede_equipo     ON fi.id_federacion_equipo      =   fede_equipo.ID
								LEFT JOIN federacion_categorias     fede_categoria  ON fi.id_federacion_categoria   =   fede_categoria.ID
								LEFT JOIN federacion_clubs          fede_club       ON fi.id_federacion_clubs       =   fede_club.ID
				WHERE
					fi.tipo = "ESCUELA" AND fi.temporada="19/20"';
					
										
						//error_log(__FILE__.__LINE__);
						//error_log($sentencia_sql);
					
			$query = db::singleton()->query($sentencia_sql);

			if ($query) {
				return $query->fetchAll(PDO::FETCH_ASSOC);
			}
			else {
				return false;
			}
		}


		public static function findAllInscripciones() {
			return db::singleton()->query('SELECT * FROM formulariosinscripciones WHERE numero_pedido >= 10000142')->fetchAll();
			//  return db::singleton()->query('SELECT * FROM formulariosinscripciones WHERE numero_pedido >= 10000142 AND is_active=1')->fetchAll();    
		}


		public static function findInscripcionPorNumeroPedido($numeropedido) {
			return db::singleton()->query('SELECT * FROM formulariosinscripciones WHERE numero_pedido = ' . $numeropedido)->fetchAll();
		}


		public static function findInscripcionPorEmail($email) {
			return db::singleton()->query('SELECT * FROM formulariosinscripciones WHERE email = "' . $email . '"')->fetchAll();
		}


		public static function findInscripcionPorFecha($fecha) {
			return db::singleton()->query('SELECT * FROM formulariosinscripciones WHERE fecha = "' . $fecha . '"')->fetchAll();
		}


		public static function findInscripcionesPorEstado($estado) {
			return db::singleton()->query('SELECT * FROM formulariosinscripciones WHERE pagado = "' . $estado . '"')->fetchAll();
		}


		public static function findInscripcionesPorCategoria($categoria) {
			return db::singleton()->query('SELECT * FROM formulariosinscripciones WHERE contenido LIKE "%' . $categoria . '%" ORDER BY pagado DESC')->fetchAll();
		}


		public static function findInscripcionesPorFechaEquipo($fechainicio, $fechafin, $equipo) {
			return db::singleton()->query('SELECT * FROM formulariosinscripciones WHERE (fecha>="' . $fechainicio . '" AND fecha<="' . $fechafin . '") AND contenido LIKE "%' . $equipo . '%"')->fetchAll();
		}


		public static function findInscripcionesPagos($trimestre) {
			return db::singleton()->query('SELECT fi.numero_pedido, fi.contenido, fi.nombre_apellidos, fi.fecha, fip.' . $trimestre . ' FROM formulariosinscripciones fi 
						JOIN formulariosinscripciones_pagos fip ON(fip.id_formularioinscripciones=fi.id_formulario)')->fetchAll();
		}


		public static function findInscripcionesPagosIncluidasXMLPorConfirmarPago($trimestre) {
			if ($trimestre==="") {
				return false;
			}
			
			return db::singleton()->query('SELECT '
						. 'fi.numero_pedido, fi.nombre_apellidos, fi.email, '
						. 'fip.id AS id_fip,fip.dni_pagador, fip.cobros_activos_'.$trimestre.' AS cobro_activo,fip.pagado_'.$trimestre.' AS pagado '
					. 'FROM '
						. ' `formulariosinscripciones_pagos` fip '
					. 'INNER JOIN '
						. ' `formulariosinscripciones` fi ON fi.id_formulario = fip.id_formularioinscripciones '
					. 'WHERE '
						. ' `trimestre_noviembre` > 0 AND '
						. ' `cobros_activos_'.$trimestre.'` IS NOT NULL '
						. ' AND `pagado_'.$trimestre.'` IS NULL ' 
					. 'ORDER BY cobro_activo')->fetchAll();
		}


		public static function findInscripcionesPagosIncluidasGenerearXMLPorConfirmarPago($trimestre) {
			if ($trimestre==="") {
				return false;
			}
			//$trimestre = substr($trimestre, 1);
			$query = db::singleton()->query ( 'SELECT
				  fi.numero_pedido, 
				  fip.dni_pagador, 
				  CONVERT(CAST(CONVERT(fi.nombre_apellidos USING latin1) AS BINARY ) USING utf8) AS nombre_apellidos, 
				  fi.email, 
				  fip.cobros_activos_'.$trimestre.' AS cobro_activo, 
				  fip.pagado_'.$trimestre.' AS pagado  
				FROM 
				`formulariosinscripciones_pagos` fip  
				INNER JOIN 
				`formulariosinscripciones` fi ON fi.id_formulario = fip.id_formularioinscripciones 
				WHERE 
				  ' . ' `trimestre_noviembre` > 0 AND '. ' `cobros_activos_'.$trimestre.'` IS NOT NULL '. ' AND `pagado_'.$trimestre.'` IS NULL '. '
				ORDER BY 
				  cobro_activo');

			if ($query) {
				return $query->fetchAll(PDO::FETCH_ASSOC);
			}
			else {
				return false;
			}
		}


		public static function findInscripcionesPagosXml($trimestre,$cobros_activos_string="") {
			//  Ejemplo de trimestre recibido: array("trimestre_noviembre",    "Noviembre",    "pagado_noviembre")
			//  Ejemplo de $cobros_activos_string = cobros_activos_noviembre (se indica el nombre del atributo)
			
			//  En el WHERE se filtra:
			//  - Que la cantidad sea mayor a 0
			//  - Que pagado_noviembre sea NULL, es decir, que no tenga pago confirmado
			//  - Que no haya un cobros_activos_noviembre, es decir, que no se generara un cargo que se envió al banco y aun esté pendiente de confirmar.
			$query='SELECT '
						. 'fi.numero_pedido, fi.contenido, fi.nombre_apellidos, fi.fecha, fi.is_active, '
						. 'fip.id, fip.id_formularioinscripciones, fip.dni_pagador, '
						. 'fip.' . $trimestre[0].', fip.' . $trimestre['2']
					.' FROM formulariosinscripciones fi '
					.' JOIN formulariosinscripciones_pagos fip ON(fip.id_formularioinscripciones=fi.id_formulario) '
					.' WHERE '
					. '     fip.' . $trimestre[0] . ' > 0 AND '
					. '     fip.'.$trimestre[2].' IS NULL AND '
					. '     fip.'.$cobros_activos_string.' IS NULL '
					. '     AND fi.is_active = 1 '
					. 'ORDER BY '
					. '     fi.nombre_apellidos ASC';
		   
			
			$findInscripcionesPagosXml = db::singleton()->query($query);

			if ($findInscripcionesPagosXml !== false) {
				$findInscripcionesPagosXml = $findInscripcionesPagosXml->fetchAll();
			}
			else {
				$findInscripcionesPagosXml = NULL;
			}

			return $findInscripcionesPagosXml;
		}


		public static function findInscripcionesPagosMatriculaPendienteXml() {
			$findInscripcionesPagosMatriculaPendienteXml = db::singleton()->query('SELECT fip.id, fip.id_formularioinscripciones, fi.numero_pedido, fi.contenido, fi.nombre_apellidos, fi.fecha, fip.matricula, fip.dni_pagador, fip.pendiente_matricula FROM formulariosinscripciones fi 
						JOIN formulariosinscripciones_pagos fip ON(fip.id_formularioinscripciones=fi.id_formulario) WHERE fip.pendiente_matricula > 0 AND fip.pagado_pendiente_matricula IS NULL AND fi.is_active = 1 ORDER BY fi.nombre_apellidos ASC');
			if ($findInscripcionesPagosMatriculaPendienteXml !== false) {
				$findInscripcionesPagosMatriculaPendienteXml = $findInscripcionesPagosMatriculaPendienteXml->fetchAll();
			}
			else {
				$findInscripcionesPagosMatriculaPendienteXml = NULL;
			}

			return $findInscripcionesPagosMatriculaPendienteXml;
		}


		/* findAllAccounts() obtiene todas las instancias formulariosinscripciones */
		public static function findAllAccounts() {
			return db::singleton()->query('SELECT contenido FROM formulariosinscripciones')->fetchAll();
		}


		public static function findAll() {
			return db::singleton()->query('SELECT * FROM formulariosinscripciones')->fetchAll();
		}


		/* Para la consulta de exportar a excel todas las inscripcciones patronato */
		public static function findAllInscripcionesExcelPatronato() {
			
			$query = db::singleton()->query('
				SELECT
					  fecha AS Fecha_Inscripcion,
					  numero_pedido AS Numero_Pedido,
					  CONVERT(CAST(CONVERT(nombre_apellidos USING latin1) AS BINARY) USING utf8) AS Nombre_Completo,
					  pagado AS Pagado,
					  categoria AS Categoria

					  /*DNI y modalildad por hacer*/
					  
					  
					FROM
					  formulariosinscripciones
					WHERE
					  numero_pedido >= 10000142');

			if ($query) {
				return $query->fetchAll(PDO::FETCH_ASSOC);
			}
			else {
				return false;
			}
		}


		/* Buscar por DNI para realizar la validacion de la renovacion */
		public static function findByDNITutor($dni, $categoria) {
			if ($categoria == "cantera") {
				$sentencia_sql = 'SELECT * FROM formulariosinscripciones WHERE (dni_tutor LIKE "%' . $dni . '%" OR dni_jugador LIKE "%' . $dni . '%")'
						. ' AND is_active = 1 AND categoria = "cantera" ';

						
				//error_log(__FILE__.__LINE__);
				//error_log($sentencia_sql);
				return db::singleton()->query($sentencia_sql)->fetchAll();
			}
			else {
				$sentencia_sql = 'SELECT * FROM formulariosinscripciones WHERE (dni_tutor LIKE "%' . $dni . '%" OR dni_jugador LIKE "%' . $dni . '%" )'
						. ' AND is_active = 1 AND categoria not like "cantera%"' ;
				//error_log(__FILE__.__LINE__);
				//error_log($sentencia_sql);
				return db::singleton()->query($sentencia_sql)->fetchAll();
			}
		}


		public static function findByDNIJugador($dni)
        {
            $sentencia_sql = ''
            . ' SELECT  * '
            . ' FROM    formulariosinscripciones '
            . ' WHERE   dni_jugador     LIKE "%' . $dni . '%" AND '
            . '         is_active = 1';
            
            //error_log(__FILE__.__LINE__);
            //error_log($sentencia_sql);
            return db::singleton()->query($sentencia_sql)->fetchAll();
		}

        
        
		/* Buscar por DNI para realizar la validacion de la renovacion */
		public static function findFormulariosInscripcionesByDNITutorSinCategoria($dni) {
			$sentencia_sql='   SELECT '
							. ' fi.*, '
							. ' he.equipo,fe.Nombre AS NombreEquipo, fc.Nombre AS NombreClub, fca.Nombre as NombreCategoria  '
					. ' FROM        formulariosinscripciones fi '
					. ' LEFT JOIN   horarios_equipos_19_20 he ON fi.id_equipo_horario=he.ID '
					. 'LEFT JOIN federacion_equipos fe on fi.id_federacion_equipo=fe.ID LEFT JOIN federacion_clubs fc on fi.id_federacion_clubs=fc.ID LEFT JOIN federacion_categorias fca ON fi.id_federacion_categoria=fca.ID'
					. ' WHERE '
					. '             (fi.dni_tutor LIKE "%' . $dni . '%" OR fi.dni_jugador LIKE "%' . $dni . '%") AND fi.is_active = 1 AND temporada="19/20"';
			
			//error_log(__FILE__.__LINE__);
			//error_log($sentencia_sql);
			
			return db::singleton()->query($sentencia_sql)->fetchAll();
		}



		/*********************
		* JORNADAS DETECCIÓN *
		*********************/

		// Selección de todos los registros de Jornadas Detección
		public static function findInscripcionesJornadasDeteccion() {
			return db::singleton()->query('SELECT * FROM registros_jornadas_deteccion WHERE eliminado = 0 AND fecharegistro >= "2020-01-01" ORDER BY id ASC')->fetchAll();
		}


		// Selección de todos los datos de una ID de registro de Jornadas Detección
		public static function damedatosjornadas($id) {
			return db::singleton()->query('SELECT * FROM registros_jornadas_deteccion WHERE id = '.$id)->fetch();
		}


		// Para la consulta de exportar a excel todos los los registros de Jornadas Detección
		public static function findAllInscripcionesExcelJornadasDeteccion() {
			$query = db::singleton()->query('SELECT fecharegistro, opcion, convert(cast(convert(nombre using latin1) AS binary) using utf8) AS nombre, convert(cast(convert(apellidos using latin1) AS binary) using utf8) AS apellidos, fechanacimiento, convert(cast(convert(practicabaloncesto using latin1) AS binary) using utf8) AS practicabaloncesto, convert(cast(convert(club using latin1) AS binary) using utf8) AS club, telefonotutor, emailtutor FROM registros_jornadas_deteccion ORDER BY fecharegistro DESC');

			if ($query) {
				return $query->fetchAll(PDO::FETCH_ASSOC);
			}
			else {
				return false;
			}
		}


		// Para eliminar un registro de Jornadas Detección
		public static function DardeBajaJornadasDeteccion($id) {
			$sql = "UPDATE registros_jornadas_deteccion SET eliminado = 1 WHERE id = :id";
			$query = db::singleton()->prepare($sql);

			if (!$query) {
				return false;
			}

			$datos = array(':id' => $id);

			if (!$query->execute($datos)) {
				return false;
			}
			else {
				echo "<script text='javascript'>
						alert('El registro se eliminó correctamente.');
						window.location.replace('?r=jornadas/BackJornadasDeteccionListarInscripciones');
					</script>";
				die;
			}
		}


		// Actualizar pagado en Jornadas Detección
		public static function actualizarPagadoJornadasDeteccion($id, $pagado) {
			$sql = "UPDATE registros_jornadas_deteccion SET pagado=:pg WHERE id=:id";

			$query = db::singleton()->prepare($sql);
			 
			if (!$query) {
				var_dump( db::singleton()->errorInfo ());
				die;
			}

			$datos = array(':pg' => $pagado, ':id' => $id);

			if (!$query->execute($datos)) {
				var_dump( db::singleton()->errorInfo ());
				die;
			}
			else {
				echo "<script text='javascript'> alert('El pago del usuario se actualizó correctamente.');
				window.location.replace('?r=jornadas/BackJornadasDeteccionListarInscripciones'); </script>";
				die;
			}
		}



		/*********************
		* JORNADAS FORMACIÓN *
		*********************/

		// Selección de todos los registros de Jornadas Formación
		public static function findInscripcionesJornadasFormacion() {
			return db_2_utf8::singleton()->query('SELECT * FROM registros_jornadas_formacion ORDER BY id ASC')->fetchAll();
		}


		// Selección de todos los datos de una ID de registro de Jornadas Formación
		public static function dameDatosJornadasFormacion($id) {
			return db_2_utf8::singleton()->query('SELECT * FROM registros_jornadas_formacion WHERE id='.$id)->fetch();
		}


		// Para la consulta de exportar a excel todos los los registros de Jornadas Formación
		public static function findAllInscripcionesExcelJornadasFormacion() {
			return db_2_utf8::singleton()->query('SELECT * FROM registros_jornadas_formacion ORDER BY id DESC')->fetchall();
		}



		/**********
		* MAILERS *
		**********/

		/* Envío de mail al cliente con la info de la reserva*/
		public static function mailssendinscripcion($numeropedido, $contenido, $seccioninscripcion, $email)
        {
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

            // Indicamos aquí el nombre del servidor de correo
            $mail->Host = __phpmailer_host__;           //  "in-v3.mailjet.com";	//$mail->Host = "in-v3.mailjet.com";

            // Asignamos el puerto SMTP que usa nuestro servidor
            $mail->Port = __phpmailer_port__;
            $mail->SMTPSecure = "tls";   

            // Indicamos aquí nuestro nombre de usuario
            $mail->Username = __phpmailer_username__;	//  $mail->Username = "1c96c2909ac708240c4491b5a821fa21";

            // Indicamos la contraseña
            $mail->Password = __phpmailer_password__;   //  $mail->Password ="187201d6b77557358403ccbc07cee13a";

			// Añadimos la dirección del remitente
			$mail->From = "alqueria@alqueriadelbasket.com";

			// Añadimos el nombre del emisor
			$mail->FromName = "L´Alqueria del Basket";

			// En la dirección de responder ponemos la misma del From
			//$mail->AddReplyTo("rlloret@tessq.com","Mensaje automático");

			// Le indicamos que nuestro Email está en Html
			$mail->IsHTML(true);

			// Indicamos la dirección y el nombre del destinatario
			$mail->AddAddress($email, 'Reserva inscripción temporada 19/20');

			// Con copia oculta
			$mail->AddBCC('alqueria@alqueriadelbasket.com', 'Reserva inscripción temporada 19/20');
			$mail->AddBCC('recepcion@alqueriadelbasket.com', 'Reserva inscripción temporada 19/20');

			// Ponemos aquí el asunto
			$mail->Subject = $seccioninscripcion;

			// Creamos todo el cuerpo del Email en Html en la variable $body
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
												<h3 style="color: #eb7c00; border-bottom: #eb7c00 2px solid;">'.$seccioninscripcion.'</h2>
												<p><strong>Estos son los datos recibidos relacionados con su inscripción.</strong></p>
												<p><strong>Número de pedido:</strong> '.$numeropedido.'</p>
												<p>'.$contenido.'</p>
												<p><strong>En caso de cualquier duda o problema con la inscripción, remitan un correo a recepcion@alqueriadelbasket.com</strong></p>
											</td>
										</tr>
										<tr>
											<td bgcolor="#424241" style="padding: 20px 30px 20px 30px">
												<table border="0" cellpadding="0" cellspacing="0" width="100%">
													<tr>
														<td width="75%" style="font-family: Arial, sans-serif; line-height: 18px; font-size: 12px;">
															<span style="color: #eb7c00;">&copy; L´Alqueria del Basket 2019</span><br>
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

			// Añadimos aquí el cuerpo del Email
			$mail->MsgHTML($body);


			// Enviamos y comprobamos si se ha mandado el Email correctamente
			if (!$mail->Send()) {
				// echo "Mailer Error: " . $mail->ErrorInfo . "<br>"; die;
				return false;
			}
			else {
				// $mensaje_a_mostrar = "Tu mensaje ha sido enviado.<br>";
				return true;
			}
		}


		/* Envío de mail al cliente con la info de la reserva*/
		public static function mailssendtest($numeropedido, $contenido, $seccioninscripcion, $email) {
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

            // Indicamos aquí el nombre del servidor de correo
            $mail->Host = __phpmailer_host__;           //  "in-v3.mailjet.com";	//$mail->Host = "in-v3.mailjet.com";

            // Asignamos el puerto SMTP que usa nuestro servidor
            $mail->Port = __phpmailer_port__;
            $mail->SMTPSecure = "tls";   

            // Indicamos aquí nuestro nombre de usuario
            $mail->Username = __phpmailer_username__;	//  $mail->Username = "1c96c2909ac708240c4491b5a821fa21";

            // Indicamos la contraseña
            $mail->Password = __phpmailer_password__;   //  $mail->Password ="187201d6b77557358403ccbc07cee13a";

			// Añadimos la dirección del remitente
			$mail->From = "alqueria@alqueriadelbasket.com";

			// Añadimos el nombre del emisor
			$mail->FromName = "L´Alqueria del Basket";

			// En la dirección de responder ponemos la misma del From
			//$mail->AddReplyTo("rlloret@tessq.com","Mensaje automático");

			// Le indicamos que nuestro Email está en Html
			$mail->IsHTML(true);

			// Indicamos la dirección y el nombre del destinatario
			$mail->AddAddress($email, 'Alqueria');

			// Con copia oculta
			$mail->AddBCC('ap@tessq.com', 'tessq');
		  

			// Ponemos aquí el asunto
			$mail->Subject = $seccioninscripcion;

			// Creamos todo el cuerpo del Email en Html en la variable $body
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
												<h3 style="color: #eb7c00; border-bottom: #eb7c00 2px solid;">'.$seccioninscripcion.'</h2>
												<p><strong>Estos son los datos recibidos relacionados con su inscripción.</strong></p>
												<p><strong>Número de pedido:</strong> '.$numeropedido.'</p>
												<p>'.$contenido.'</p>
												<p><strong>En caso de cualquier duda o problema con la inscripción, remitan un correo a recepcion@alqueriadelbasket.com</strong></p>
											</td>
										</tr>
										<tr>
											<td bgcolor="#424241" style="padding: 20px 30px 20px 30px">
												<table border="0" cellpadding="0" cellspacing="0" width="100%">
													<tr>
														<td width="75%" style="font-family: Arial, sans-serif; line-height: 18px; font-size: 12px;">
															<span style="color: #eb7c00;">&copy; L´Alqueria del Basket 2019</span><br>
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

			// Añadimos aquí el cuerpo del Email
			$mail->MsgHTML($body);

		   

			// Enviamos y comprobamos si se ha mandado el Email correctamente
			if (!$mail->Send()) {
				echo "Mailer Error: " . $mail->ErrorInfo . "<br>"; die;
				return false;
			} 
			else {
				$mensaje_a_mostrar = "Tu mensaje ha sido enviado.<br>";
				return true;
			}
		}


		/* Envío de mail al cliente*/
		public static function mailssendLicenciaFederacion($email, $dni) {
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

            // Indicamos aquí el nombre del servidor de correo
            $mail->Host = __phpmailer_host__;           //  "in-v3.mailjet.com";	//$mail->Host = "in-v3.mailjet.com";

            // Asignamos el puerto SMTP que usa nuestro servidor
            $mail->Port = __phpmailer_port__;
            $mail->SMTPSecure = "tls";   

            // Indicamos aquí nuestro nombre de usuario
            $mail->Username = __phpmailer_username__;	//  $mail->Username = "1c96c2909ac708240c4491b5a821fa21";

            // Indicamos la contraseña
            $mail->Password = __phpmailer_password__;   //  $mail->Password ="187201d6b77557358403ccbc07cee13a";

			// Añadimos la dirección del remitente
			$mail->From = "alqueria@alqueriadelbasket.com";

			// Añadimos el nombre del emisor
			$mail->FromName = "L´Alqueria del Basket";

			// En la dirección de responder ponemos la misma del From
			//$mail->AddReplyTo("rlloret@tessq.com","Mensaje automático");

			// Le indicamos que nuestro Email está en Html
			$mail->IsHTML(true);

			// Indicamos la dirección y el nombre del destinatario
			$mail->AddAddress($email, 'Alqueria');

			// Con copia oculta
			$mail->AddBCC('ap@tessq.com', 'tessq');

			//adjuntamos el pdf
			$mail->AddAttachment('licencias/' . $dni . '/' . $dni . '.pdf', $name = $dni,  $encoding = 'base64', $type = 'application/pdf');

		  

			// Ponemos aquí el asunto
			$mail->Subject = "Licencia federacion 2019/2020";

			// Creamos todo el cuerpo del Email en Html en la variable $body
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
												<h3 style="color: #eb7c00; border-bottom: #eb7c00 2px solid;">Licencia federacion 2019/2020</h2>
												<p><strong>Estos son los datos recibidos relacionados con su inscripción.</strong></p>
												<p>Descargue el PDF adjunto y comprueba que esta todo correcto</p>
												<p><strong>En caso de que los datos no esten rellenados correctamente vuelva a realizar la Licencia</strong></p>
											</td>
										</tr>
										<tr>
											<td bgcolor="#424241" style="padding: 20px 30px 20px 30px">
												<table border="0" cellpadding="0" cellspacing="0" width="100%">
													<tr>
														<td width="75%" style="font-family: Arial, sans-serif; line-height: 18px; font-size: 12px;">
															<span style="color: #eb7c00;">&copy; Valencia Basket Club 2019</span><br>
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

			// Añadimos aquí el cuerpo del Email
			$mail->MsgHTML($body);

		   

			// Enviamos y comprobamos si se ha mandado el Email correctamente
			if (!$mail->Send()) {
				echo "Mailer Error: " . $mail->ErrorInfo . "<br>"; die;
				return false;
			} 
			else {
				$mensaje_a_mostrar = "Tu mensaje ha sido enviado.<br>";
				return true;
			}
		}


		private static function findLastNumeroPedido(){
			$query = db::singleton()->query('SELECT `numero_pedido` FROM `formulariosinscripciones` ORDER BY `numero_pedido` DESC LIMIT 1');
			if ($query)
				return $query->fetch();
			else
				return false;
		}


		public static function insertarInscripcion($nombre_apellidos,$tipo,$dni_jugador,$id_equipo_horario, $mail)
		{
			$numeroPedido = self::findLastNumeroPedido();

			if( $tipo == "ESCUELA" ){
				$tipoCategoria="escuela";
			}else{
				$tipoCategoria="cantera";
			}

			$sql = "INSERT INTO `formulariosinscripciones`(
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
				`dni_jugador`,
				`temporada`,
				`is_active`,
				`id_equipo_horario`,
				`pagado_ok`,
				`tipo`
			)
			VALUES(
				:NumeroPedido,
				:NombreApellidos,
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
				:DNIJugador,
				:Temporada,
				:IsActive,
				:IdEquipoHorario,
				:PagadoOK,
				:Tipo
			)";
		
			$query = db::singleton()->prepare($sql);

			
			if (!$query) {
				return false;
			}

		   $datos = array(
				'NumeroPedido' => $numeroPedido["numero_pedido"],
				'NombreApellidos' => $nombre_apellidos,
				'Email' => $mail,
				'Contenido' => "-",
				'Pagado' => NULL,
				'Fecha' => NULL,
				'Categoria' => $tipoCategoria,
				'FechaNacimiento' => NULL,
				'Direccion' => NULL,
				'Numero' => NULL,
				'Piso' => NULL,
				'Puerta' => NULL,
				'Poblacion' => NULL,
				'CodigoPostal' => NULL,
				'Provincia' => NULL,
				'NombrePadre' => NULL,
				'NombreMadre' => NULL,
				'TelefonoPadre' => NULL,
				'TelefonoMadre' => NULL,
				'Modalidad' => NULL,
				'TallaCamiseta' => NULL,
				'NumeroCamiseta' => NULL,
				'Alergico' => NULL,
				'Alergias' => NULL,
				'TitularBanco' => NULL,
				'DNITitular' => NULL,
				'Iban' => NULL,
				'Entidad' => NULL,
				'Oficina' => NULL,
				'DC' => NULL,
				'Cuenta' => NULL,
				'DNITutor' => NULL,
				'DNIJugador' => $dni_jugador,
				'Temporada' => "19/20",
				'IsActive' => "1",
				'IdEquipoHorario' => $id_equipo_horario,
				'PagadoOK' => 0,
				'Tipo' => $tipo);

		   //error_log(print_r($datos, -1));

			if (!$query->execute($datos)) {
				error_log( print_r( $datos, -1 ) );
				$arr = $query->errorInfo();
				error_log( print_r( $arr, -1) );
				error_log( print_r( $query, -1 ) );
				return false;
			} 
			else
			{
				return true;
			}
		}

		/*************************************************************

		I Jornada de Formación de la Cátedra 
		***************************************************************/
		public static function comprobarRepetidosJornadaForm(){
                    return db::singleton()->query('SELECT * FROM registros_jornada_formacion WHERE fecharegistro>="2019-11-05"')->fetchAll();
		}

		public static function newFormEJornadaFormacion($fecharegistro,  $nombre, $apellidos,  $dni, $email, $universitario, $certificado, $pagado, $importe, $activo, $evento,$autorizodatos,$autorizoimagen) {

			$sql = "INSERT INTO registros_jornada_formacion (fecharegistro,nombre,apellidos,dni,email,universitario,certificado,pagado,importe,activo,evento,autorizodatos,autorizoimagen )
			VALUES (:fecharegistro,:nombre,:apellidos,:dni,:email,:univ,:cert, :pago, :precio,:act,:evento,:datos,:img )";

			$query = db::singleton()->prepare($sql);

			if (!$query) {
				var_dump(db::singleton()->errorInfo());
				die;
			}

			$datos = array(':fecharegistro' => $fecharegistro, ':categoria' => $categoria, ':opcion' => $opcion, ':diassueltos' => $textoDiasSueltos, ':nombre' => $nombre, ':apellidos' => $apellidos, ':fechanacimiento' => $fechanacimiento, ':dni' => $dni, ':club' => $club, ':aspectomedico' => $aspectomedico, ':ficherosubido1' => $ficherosubido1, ':ficherosubido2' => $ficherosubido2, ':nombretutor' => $nombretutor, ':apellidostutor' => $apellidostutor, ':dnitutor' => $dnitutor, ':direccion' => $direccion, ':numero' => $numero, ':piso' => $piso, ':puerta' => $puerta, ':cp' => $cp, ':provincia' => $provincia, ':poblacion' => $poblacion, ':telefonotutor' => $telefonotutor, ':emailtutor' => $emailtutor, ':autorizodatos' => $autorizodatos, ':autorizoimagen' => $autorizoimagen, ':pago' => $pagado,':tipop' => $tipopago,':numped' => $numeropedido,':precio' => $importe );

			if (!$query->execute($datos)) {
				var_dump($query->errorInfo());
				die;
			}
			else {
				return true;
			}
		}
	}
?>