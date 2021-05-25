<?php
	class escuela_veranoVB {


		/******************************************************************
		    -ESCUELA DE VERANO VB 110.123

		 ****************************************************************/

		// Escuela de verano de Valencia Basket .123
		public static function damedatosescuelaveranoVB($numero) {
			return dbvbasket::singleton()->query('SELECT * FROM registros_escuela_veranovb WHERE numeropedido = "'.$numero.'"')->fetch();
		}


		public static function damedatosBYIDescuelaveranoVB($numero) {
			return dbvbasket::singleton()->query('SELECT * FROM registros_escuela_veranovb WHERE id = '.$numero)->fetch();
		}


		public static function DardeBajaEscuelaVeranoVB($codigo) {
			$sql = "UPDATE registros_escuela_veranovb SET eliminado = 1 WHERE numeropedido = :numero";

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
						alert('El registro se eliminó correctamente.');
						window.location.replace('?r=campus/BackEscuelaVeranoVB');
					</script>";
				die;
			}
		}


		public static function damedatosescuelaverano($numero) {
			return dbvbasket2::singleton()->query('SELECT * FROM registros_escuela_veranovb WHERE numeropedido = "'.$numero.'"')->fetch();
		}     


		public static function findInscripcionesporPedidoEscuelaveranovb($id) {
			$query = dbvbasket2::singleton()->query('SELECT * FROM registros_escuela_veranovb WHERE numeropedido = "'.$id.'"');

			if ($query) {
				return $query->fetchAll();
			}
			else {
				return false;
			}
		}


		//Para contar los registros de cada opcion (internos o externos) y mostrarlos en el back
		public static function findInscripcionesEscuelaVeranoVBByOpcion($filtro)
        {
			
			return dbvbasket2::singleton()->query('SELECT count(*) as total FROM registros_escuela_veranovb WHERE  eliminado=0 and  fecharegistro>"2021-02-01" and '. $filtro .'<>""')->fetch();
		}


		public static function findAllInscripcionesEscuelaVeranoVB() {		   
			$query = dbvbasket2::singleton()->query('SELECT * FROM registros_escuela_veranovb WHERE eliminado = 0 AND fecharegistro >= "2021-01-01" ORDER BY numeropedido DESC');

			if ($query) {
				return $query->fetchAll();
			}
			else {
				return false;
			}
		}


		//para la consulta de exportar a excel ok
		public static function findAllInscripcionesExcelEscuelaVeranoVBConCampos($where, $campoorder, $campos) {
			$query = dbvbasket2::singleton()->query('SELECT fecharegistro, numeropedido as Pedido,  genero as Genero, concat (nombre, " ", apellidos) AS Inscrito, fechanacimiento,  '. $campos .'    concat (nombretutor, " ", apellidostutor) AS Tutor, telefonotutor as Telefono, emailtutor As Email,  if(pagado=1, "Si", "No") AS Pagado, importe as Importe, tipo_pago as TipoPago  FROM registros_escuela_veranovb WHERE eliminado=0  and fecharegistro>"2021-02-01"'. $where .'ORDER BY '. $campoorder .' DESC');

			if ($query) {
				return $query->fetchAll(PDO::FETCH_ASSOC);
			}
			else {
				return false;
			}
		}

		//para la consulta de exportar a excel, muestra todos los datos
		public static function findAllInscripcionesExcelEscuelaVeranoVb() {
			$query = dbvbasket2::singleton()->query('SELECT fecharegistro, numeropedido, 
				concat (nombre, " ", apellidos) AS Inscrito, genero, fechanacimiento, dni, 
				semana1 , semana2 , semana3 , semana4 , semana5 , diassueltos, club AS Club, enfermedad AS ObservMedicas, 
				concat (nombretutor, " ", apellidostutor) AS Tutor, telefonotutor, emailtutor, dnitutor, direccion, numero, piso, puerta, cp, provincia, poblacion, autorizodatos, autorizoimagen, tipo_pago, if(pagado=1, "Si", "No") AS pagado, importe, sintomascovid, familiarcovid FROM registros_escuela_veranovb WHERE eliminado = 0 AND fecharegistro >= "2021-01-01" ORDER BY numeropedido DESC');

			if ($query) {
				return $query->fetchAll(PDO::FETCH_ASSOC);
			}
			else {
				return false;
			}
		}

		


		//cuando se paga desde oficinas por el back marcamos el pedido como pagado =1 (ok)
		public static function ActualizaPagadoEscuelaVeranoVb($codigo, $pagado) {
			$sql = "UPDATE registros_escuela_veranovb SET pagado=:pag WHERE numeropedido=:numero";
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
						alert('El pago se grabo correctamente');
						window.location.replace('?r=campus/BackEscuelaVeranoVB');
					</script>";
				die;
			}
		}


		/*  MODIFICACION DE LA FICHA DEL INSCRITO DESDE EL BACK */
		public static function updatefichaescuelaveranovb($idinscripcion,$dnijugador,$nombre,$apellidos,$fechanac, $club,  $direccion, $numero, $piso, $puerta, $poblacion, $cp, $prov, $nombretutor, $apeltutor, $dnitutor, $tlftutor, $email,  $tratam, $semana1, $semana2, $semana3, $semana4, $semana5,  $sip, $resguardo, $sintomascovid, $familiarcovid, $tipopago, $genero, $importe, $diassueltos)
		{
			//error_log("id_inscrip en update escuela vb= ".$idinscripcion,1);
			$sql = "UPDATE registros_escuela_veranovb SET nombre=:nombre, apellidos=:apel, fechanacimiento=:fechan, dni=:dnij, club=:club, enfermedad=:tratm,  nombretutor=:nomtut, apellidostutor=:apeltut, dnitutor=:dnitut, direccion=:direc, numero=:num, piso=:piso, puerta=:puerta, cp=:cp, provincia=:prov, poblacion=:pob, telefonotutor=:telef, emailtutor=:email, semana1=:t1, semana2=:t2, semana3=:t3, semana4=:t4, semana5=:t5, fotocopiasip=:sip, resguardopago=:resg, sintomascovid=:sint, familiarcovid=:famili, tipo_pago=:tipop, genero=:gen, importe=:precio, diassueltos=:dias   WHERE id=:numero";
			$query = dbvbasket2::singleton()->prepare($sql);

			if (!$query) {
				return false;
			}

			$datos = array(':numero' => $idinscripcion, ':dnij' => $dnijugador, ':nombre' => $nombre, ':apel' => $apellidos, ':fechan' => $fechanac, ':club' => $club,  ':direc' => $direccion, ':num' => $numero, ':piso' => $piso, ':puerta' => $puerta, ':pob' => $poblacion, ':cp' => $cp, ':prov' => $prov, ':nomtut' => $nombretutor, ':apeltut' => $apeltutor, ':dnitut' => $dnitutor, ':telef' => $tlftutor, ':email' => $email, ':tratm' =>$tratam, ':t1' =>$semana1,  ':t2' =>$semana2, ':t3' =>$semana3, ':t4' =>$semana4, ':t5' =>$semana5,  ':sip' =>$sip, ':resg' =>$resguardo, ':sint' =>$sintomascovid, ':famili' =>$familiarcovid, ':tipop' =>$tipopago, ':gen' =>$genero, ':precio' =>$importe, ':dias' =>$diassueltos);

			//error_log(print_r($datos,1));
			//die;

			if (!$query->execute($datos)) {
				return false;
			}
			else {
				return true;
			}
		}

	}
?>