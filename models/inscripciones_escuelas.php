<?php
	class inscripciones_escuelas {

		public static function findUser($usuario) {
			$query = db::singleton()->query('SELECT * FROM usuarios WHERE usuario = "'.$usuario.'"');

			if ($query) {
				return $query->fetch();
			}
			else {
				return false;
			}
		}


		/* INSCRIPCIONES a Campus tecnificacion femenina que estan en vbasket*/
		public static function findInscripcionesporPedido($id) {
			$query = dbvbasket2::singleton()->query('SELECT * FROM registros_escuela_tecnificacion_femenina WHERE numero_pedido = "'.$id.'"');

			if ($query) {
				return $query->fetch();
			}
			else {
				return false;
			}
		}


		//Para contar los registros de cada opcion (primerturno o segundoturno) y mostrarlos en el back
		public static function findInscripcionesCTecFemByOpcion($filtro)
        {
			//error_log(print_r('SELECT count(*) as total FROM inscripciones_eventos_extras WHERE evento="Shooting 2021" and eliminado=0 and  fecharegistro>"2021-02-01" and opcion like'.'"%'.$filtro.'%"',1));
			return dbvbasket2::singleton()->query('SELECT count(*) as total FROM registros_escuela_tecnificacion_femenina WHERE  eliminado=0 and  fecharegistro>"2021-02-01" and opcion like'.'"%'.$filtro.'%"')->fetch();
		}



		public static function findAllInscripciones() {
			$query = dbvbasket2::singleton()->query('SELECT * FROM registros_escuela_tecnificacion_femenina WHERE eliminado = 0 AND fecharegistro > "2021-01-01" ORDER BY numero_pedido DESC');

			if ($query) {
				return $query->fetchAll();
			}
			else {
				return false;
			}
		}



		// Para la consulta de exportar a excel con diferentes campos
		public static function findAllInscripcionesExcelCampusTecFemConCampos($where, $campoorder, $campos)	{


			$query = dbvbasket2::singleton()->query('SELECT  numero_pedido as Pedido,  
				concat (nombre, " ", apellidos) AS Inscrito, 
				fechanacimiento as FechaNac, dni as Dni, 
				'. $campos .'
				   concat (nombretutor, " ", apellidostutor) AS Tutor, telefonotutor as Telefono, emailtutor As Email,  if(pagado=1, "Si", "No") AS Pagado, importe as Importe, tipo_pago as TipoPago  FROM registros_escuela_tecnificacion_femenina WHERE eliminado=0 and fecharegistro>"2021-02-01"'. $where .'ORDER BY '. $campoorder .' DESC');

			if ($query) {
				return $query->fetchAll(PDO::FETCH_ASSOC);
			}
			else {
				return false;
			}
		}


		//para la consulta de exportar a excel
		public static function findAllInscripcionesExcelCampusTecFem() {
			$query = dbvbasket2::singleton()->query('SELECT fecharegistro, numero_pedido, opcion as Opcion, concat (nombre , " ", apellidos) AS Inscrito, fechanacimiento as FechaNac, dni as Dni, 
				club as Club,  tallacamiseta as Talla, 
				transporte as Tranporte, 
				enfermedad as Enfermedad, 
				alergias as Alergias,  
				tratamientosmedicos as Tratamientosmedicos, 
				operacionreciente Operaciones, 
				replace(replace(observaciones,Char(13),"-"),Char(10),"" ) as Observaciones, familiarcovid, sintomascovid,  
				concat (nombretutor, " ", apellidostutor) AS Tutor, 
				dnitutor as DniTutor, telefonotutor as Telefono, emailtutor as Email, 
				direccion as Direccion, numero,  
				piso as Piso, puerta, cp, 
				provincia as Provincia, 
				poblacion as Poblacion, autorizodatos, autorizoimagen, tipo_pago, if(pagado=1, "Si", "No") AS pagado, importe  FROM registros_escuela_tecnificacion_femenina WHERE eliminado = 0 AND fecharegistro > "2021-01-01" ORDER BY numero_pedido DESC');

			if ($query) {
				return $query->fetchAll(PDO::FETCH_ASSOC);
			}
			else {
				return false;
			}
		}


		//cuando se paga desde oficinas por el back marcamos el pedido como pagado =1
		public static function actualizapagadoescuelafem($codigo, $pagado) {
			$sql = "UPDATE registros_escuela_tecnificacion_femenina SET pagado = :pag WHERE numero_pedido = :numero";

			$query = dbvbasket2::singleton()->prepare($sql);

			if (!$query) {
				return false;
			}

			$datos = array(':numero' => $codigo, ':pag' => $pagado);

			if (!$query->execute($datos)) {
				return false;
			} 
			else {
				echo "<script text='javascript'>
						alert('El pago se grabó correctamente');
						window.location.replace('?r=campus/BackEscuelas');
					</script>";
				die;
			}
		}


		/*  MODIFICACION DE LA FICHA DEL INSCRITO DESDE EL BACK */
		public static function updatefichaescuelafem($idinscripcion,$dnijugador,$nombre,$apellidos,$date, $club, $talla, $direccion, $numero, $piso, $puerta, $poblacion, $cp, $prov, $nombretutor, $apeltutor, $dnitutor, $tlftutor, $email, $alergias, $tratam, $transporte, $enfermedad, $observ, $operaciones, $turno, $sip, $resguardo, $sintomascovid, $familiarcovid, $tipopago, $importe)
		{
			error_log("id_inscrip en update escuela tec fem= ".$idinscripcion);
			$sql = "UPDATE registros_escuela_tecnificacion_femenina SET nombre=:nombre, apellidos=:apel, fechanacimiento=:fechan, dni=:dnij, club=:club, tallacamiseta=:talla, transporte=:transp, enfermedad=:eferm, alergias=:alerg, tratamientosmedicos=:tratm, operacionreciente=:oper, observaciones=:observ, nombretutor=:nomtut, apellidostutor=:apeltut, dnitutor=:dnitut, direccion=:direc, numero=:num, piso=:piso, puerta=:puerta, cp=:cp, provincia=:prov, poblacion=:pob, telefonotutor=:telef, emailtutor=:email, opcion=:t2, ficherosubido1=:sip, ficherosubido2=:resg,  sintomascovid=:sint, familiarcovid=:famili, tipo_pago=:tipop, importe=:precio   
				WHERE id=:numero";
			$query = dbvbasket2::singleton()->prepare($sql);

			if (!$query) {
				return false;
			}

			$datos = array(':numero' => $idinscripcion, ':dnij' => $dnijugador, ':nombre' => $nombre, ':apel' => $apellidos, ':fechan' => $date, ':club' => $club, ':talla' => $talla, ':direc' => $direccion, ':num' => $numero, ':piso' => $piso, ':puerta' => $puerta, ':pob' => $poblacion, ':cp' => $cp, ':prov' => $prov, ':nomtut' => $nombretutor, ':apeltut' => $apeltutor, ':dnitut' => $dnitutor, ':telef' => $tlftutor, ':email' => $email, ':alerg' =>$alergias, ':tratm' =>$tratam, ':transp' =>$transporte, ':eferm' =>$enfermedad, ':observ' =>$observ, ':oper' =>$operaciones, ':t2' =>$turno, ':sip' =>$sip, ':resg' =>$resguardo, ':sint' =>$sintomascovid, ':famili' =>$familiarcovid, ':tipop' =>$tipopago, ':precio' =>$importe);

			//error_log(print_r($datos,1));
			//die;

			if (!$query->execute($datos)) {
				return false;
			}
			else {
				return true;
			}
		}

		/* desde el back */
		public static function DardebajaEscuelaTecFemenina($codigo) {
			$sql = "UPDATE registros_escuela_tecnificacion_femenina SET eliminado = 1  WHERE numero_pedido = :numero";
			$query = dbvbasket2::singleton()->prepare($sql);

			if (!$query) {
				return false;
			}

			$datos = array(':numero' => $codigo);

			if (!$query->execute($datos)) {
				return false;
			} 
			else {
				echo "<script text='javascript'>
						alert('El registro se eliminó correctamente');
						window.location.replace('?r=campus/BackEscuelas');
					</script>";
				die;
			}
		}


		public static function findInscripcionesPagadas() {
			$query = dbvbasket::singleton()->query('SELECT * FROM registros_escuela_tecnificacion_femenina WHERE pagado=1 AND eliminado=0 AND fecharegistro>"2020-01-01" ORDER BY numero_pedido DESC');

			if ($query) {
				return $query->fetchAll();
			}
			else {
				return false;
			}
		}


		public static function findInscripcionesNoPagadas() {
			$query = dbvbasket2::singleton()->query('SELECT * FROM registros_escuela_tecnificacion_femenina WHERE pagado=0 AND eliminado=0 AND fecharegistro>"2021-01-01" ORDER BY numero_pedido DESC');

			if ($query) {
				return $query->fetchAll();
			}
			else {
				return false;
			}
		}

		public static function findInscripcionPorById($idinscripcion)
        {
			
			return dbvbasket2::singleton()->query('SELECT * FROM registros_escuela_tecnificacion_femenina WHERE id = '.$idinscripcion)->fetch();
		}


		public static function findInscripcionPorEmail($email) {
			return dbvbasket2::singleton()->query('SELECT * FROM registros_escuela_tecnificacion_femenina WHERE email = "' . $email . '"')->fetchAll();
		}


		public static function findInscripcionPorFecha($fecha) {
			return dbvbasket2::singleton()->query('SELECT * FROM registros_escuela_tecnificacion_femenina WHERE fecharegistro = "' . $fecha . '"')->fetchAll();
		}


		public static function findInscripcionesPorEstado($estado) {
			return dbvbasket::singleton()->query('SELECT * FROM registros_escuela_tecnificacion_femenina WHERE fecharegistro>"2021-01-01" AND pagado = "' . $estado . '"')->fetchAll();
		}




		

		



		


		
		

		

		
	}
?>