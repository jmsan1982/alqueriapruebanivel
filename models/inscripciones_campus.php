<?php
	class inscripciones_campus {

		public static function findUser($usuario) {
			$query = db::singleton()->query('select * from usuarios where usuario="' . $usuario . '"');
			if ($query)
				return $query->fetch();
			else
				return false;
		}


		// INSCRIPCIONES CAMPUS WORCESTER (servidor: vbasket = 17)

		public static function findInscripcionesporPedido($id) {
			$query = dbvbasket::singleton()->query('SELECT * FROM registros_campus_worcester WHERE numero_pedido="' . $id . '"');
			if ($query)
				return $query->fetchAll();
			else
				return false;
		}


		public static function findAllInscripciones() {
			$query = dbvbasket::singleton()->query('select * from registros_campus_worcester where eliminado=0 and fecha_registro> "2020-01-01" order by numero_pedido desc');
			if ($query)
				return $query->fetchAll();
			else
				return false;
		}


		public static function findInscripcionesPagadas() {
			$query = dbvbasket::singleton()->query('select * from registros_campus_worcester where pagado=1 order by numero_pedido desc');
			if ($query)
				return $query->fetchAll();
			else
				return false;
		}


		public static function findInscripcionesNoPagadas() {
			$query = dbvbasket::singleton()->query('select * from registros_campus_worcester where pagado=0 order by numero_pedido desc');
			if ($query)
				return $query->fetchAll();
			else
				return false;
		}


		public static function findInscripcionPorEmail($email) {
			return dbvbasket::singleton()->query('select * from registros_campus_worcester where email = "' . $email . '"')->fetchAll();
		}


		public static function findInscripcionPorFecha($fecha) {
			return dbvbasket::singleton()->query('select * from registros_campus_worcester where fecha_registro = "' . $fecha . '"')->fetchAll();
		}


		public static function findInscripcionesPorEstado($estado) {
			return dbvbasket::singleton()->query('select * from registros_campus_worcester where pagado = "' . $estado . '"')->fetchAll();
		}


		// Para la consulta de exportar a Excel
		public static function findAllInscripcionesExcel() {
			$query = dbvbasket::singleton()->query('select fecha_registro, numero_pedido, convert(cast(convert(nombre using latin1) as binary) using utf8) as nombre, convert(cast(convert(apellidos using latin1) as binary) using utf8) as apellidos, telefono, telefono_movil, email, fecha_nacimiento, pasaporte, expedicion_pasaporte, caducidad_pasaporte, ingles_hablado, ingles_escrito, convert(cast(convert(tratamientos_medicos using latin1) as binary) using utf8) as tratamientos_medicos, convert(cast(convert(alergias using latin1) as binary) using utf8) as alergias, convert(cast(convert(equipo using latin1) as binary) using utf8) as equipo, convert(cast(convert(categoria using latin1) as binary) using utf8) as categoria, altura, pagado, talla_ropa, tipo_pago  from registros_campus_worcester where eliminado=0 and fecha_registro> "2020-01-01" order by numero_pedido desc');
			if ($query)
			  return $query->fetchAll(PDO::FETCH_ASSOC);

			else
				return false;
		}


		public static function actualizapagadoworcester($id, $pagado) {
			$sql = "update registros_campus_worcester set pagado=:pag, tipo_pago=:tipopag where id_registro=:numero";
			$query = dbvbasket::singleton()->prepare($sql);

			if (!$query) {
				return false;
			}

			$datos = array(':numero' => $id, ':pag' => $pagado, ':tipopag' => "OFICINA");

			if (!$query->execute($datos)) {
				return false;
			} 
			else {
				echo "<script text='javascript'> alert('El pago se grabó correctamente.');
					window.location.replace('?r=campus/BackCampusWorcester'); </script>";
					die;
			}
		}


		public static function DardeBajacampusworcester($pedido) {
			$sql = "update registros_campus_worcester set eliminado=1  where numero_pedido=:numero";
			$query = dbvbasket::singleton()->prepare($sql);

			if (!$query) {
				return false;
			}

			$datos = array(':numero' => $pedido);

			if (!$query->execute($datos)) {
				return false;
			} 
			else {
				echo "<script text='javascript'> alert('El registro se eliminó correctamente.');
					window.location.replace('?r=campus/BackCampusWorcester'); </script>";
					die;
			}
		}

		// FIN CAMPUS WORCESTER


		//*******************************************************
		// CAMPUS VERANO VB .123 bbdd alqueria
		//*******************************************************

		public static function findAllInscripcionesCampusVerano()
        {            
			$query = dbvbasket2::singleton()->query('SELECT * FROM registros_campus_verano WHERE eliminado = 0 AND fecharegistro >= "2021-01-01" ORDER BY numeropedido DESC');
			if ($query)
				return $query->fetchAll();
			else
				return false;
		}

        public static function dameNuevoNumeroPedidoCampusVerano()
        {  
         return dbvbasket2::singleton()->query('SELECT MAX(numeropedido) FROM registros_campus_verano')->fetch();    
        }
        
		public static function damedatoscampusveranoById($idinscripcion)
        {
			//error_log(print_r('SELECT * FROM registros_campus_verano WHERE id = '.$idinscripcion,1));
			return dbvbasket2::singleton()->query('SELECT * FROM registros_campus_verano WHERE id = '.$idinscripcion)->fetch();
		}


		//Para contar los registros de cada opcion (turno1, turno2...) y mostrarlos en el back
		public static function findInscripcionesCampusVeranoByOpcion($filtro)
        {
			//error_log(print_r('SELECT count(*) as total FROM registros_campus_verano WHERE fecharegistro >= "2021-01-01" and eliminado=0 and '.$filtro.'=1',1));
			return dbvbasket2::singleton()->query('SELECT count(*) as total FROM registros_campus_verano WHERE fecharegistro >= "2021-01-01" and eliminado=0 and '.$filtro.'=1')->fetch();
		}

        public static function updateAttributeCampusVerano($id,$nombreAtributo,$valorAtributo,$ponerComillas="no")
        {
            if($ponerComillas==="no")
            {   
                if($valorAtributo==0 )
                {
                    $sentencia_sql="UPDATE registros_campus_verano SET ".$nombreAtributo."=0 WHERE id=".$id;
                }
                else if($valorAtributo=="null" || is_null($valorAtributo) || empty($valorAtributo))
                {
                    $sentencia_sql="UPDATE registros_campus_verano SET ".$nombreAtributo."=null WHERE id=".$id;
                }
                else
                {
                    $sentencia_sql="UPDATE registros_campus_verano SET ".$nombreAtributo."=".$valorAtributo." WHERE id=".$id;
                }
            }
            else
            {   
                if($valorAtributo=="0" )
                {
                    $sentencia_sql="UPDATE registros_campus_verano SET ".$nombreAtributo."='".$valorAtributo."' WHERE id=".$id;
                }
                else if($valorAtributo=="null" || is_null($valorAtributo) || empty($valorAtributo))
                {
                    $sentencia_sql="UPDATE registros_campus_verano SET ".$nombreAtributo."=null WHERE id=".$id;
                }
                else{
                    $sentencia_sql="UPDATE registros_campus_verano SET ".$nombreAtributo."='".$valorAtributo."' WHERE id=".$id;
                }
            }

            $query=dbvbasket2::singleton()->prepare($sentencia_sql);

            if(!$query){error_log(print_r( dbvbasket::singleton()->errorInfo()),1);return false;}

            $datos=array("");

            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));return false;}
            else{return self::damedatoscampusveranoById($id);}
        }

		public static function damedatoscampusverano($numero) 
		{
			return dbvbasket2::singleton()->query('SELECT * FROM registros_campus_verano WHERE numeropedido =' . '"'.$numero.'"')->fetch();
		}


		// Para la consulta de exportar a Excel con todos los campos
		public static function findAllInscripcionesExcelCampusVerano() {
			$query = dbvbasket2::singleton()->query('SELECT numeropedido as Pedido, genero as Genero, 
				concat (nombre , " ", apellidos) AS Inscrito, fechanacimiento as FechaNacNac, dni as Dni, 
				club as Club, fundamento as Fundamento, tallacamiseta as Talla, 
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
				poblacion as Poblacion, 
				autorizoimagen, autorizodatos, if(pagado=1, "Si", "No") AS Pagado, importe as Importe, tipo_pago as TipoPago,
				if(turno1=0, "No", "Si") as Turno_1, if(turno2=0, "No", "Si") as Turno_2, if(turno3=0, "No", "Si") as Turno_3, if(turno4=0, "No", "Si") as Turno_4 , if(turno5=0, "No", "Si") as Turno_5, 
				if(espera_turno2=0, "No", "Si") as L_Espera_Turno1,
				if(espera_turno3=0, "No", "Si") as L_Espera_Turno2,
				if(espera_turno4=0, "No", "Si") as L_Espera_Turno3,
				if(espera_turno5=0, "No", "Si") as L_Espera_Turno4,
				if(espera_turno6=0, "No", "Si") as L_Espera_Turno6,
				 autorizodatos, autorizoimagen 
				FROM registros_campus_verano WHERE eliminado = 0 AND fecharegistro >= "2021-01-01" ORDER BY numeropedido DESC');

			if ($query) {
			  return $query->fetchAll(PDO::FETCH_ASSOC);
			}
			else {
				return false;
			}
		}


		// Para la consulta de exportar a excel con diferentes campos
		public static function findAllInscripcionesExcelCampusVeranoConCampos($where, $campoorder, $campos)	{


			$query = dbvbasket2::singleton()->query('SELECT  numeropedido as Pedido, genero as Genero, 
				concat (nombre, " ", apellidos) AS Inscrito, 
				if(turno1=0, "No", "Si") as Turno_1, if(turno2=0, "No", "Si") as Turno_2, if(turno3=0, "No", "Si") as Turno_3, if(turno4=0, "No", "Si") as Turno_4 , if(turno5=0, "No", "Si") as Turno_5,
				fechanacimiento as FechaNac, dni as Dni, 
				club as club,
				'. $campos .'
				   concat (nombretutor, " ", apellidostutor) AS Tutor, telefonotutor as Telefono, emailtutor As Email,  if(pagado=1, "Si", "No") AS Pagado, importe as Importe, tipo_pago as TipoPago  FROM registros_campus_verano WHERE eliminado=0 and fecharegistro>"2021-02-01"'. $where .'ORDER BY '. $campoorder .' DESC');

			if ($query) {
				return $query->fetchAll(PDO::FETCH_ASSOC);
			}
			else {
				return false;
			}
		}



		public static function DardeBajacampusverano($pedido) {
			$sql = "UPDATE registros_campus_verano SET eliminado=1 WHERE numeropedido=:numero";
			$query = dbvbasket2::singleton()->prepare($sql);

			if (!$query) {
				return false;
			}

			$datos = array(':numero' => $pedido);

			if (!$query->execute($datos)) {
				return false;
			}
			else {
				echo "<script text='javascript'>
						alert('El registro se eliminó correctamente.');
						window.location.replace('?r=campusveranovb/BackCampusVerano');
					</script>";
				die;
			}
		}


		public static function actualizapagadocampusverano($id, $pagado) {
			$sql = "UPDATE registros_campus_verano SET pagado=:pag WHERE id=:numero";
			$query = dbvbasket2::singleton()->prepare($sql);

			if (!$query) {
				return false;
			}

			$datos = array(':numero' => $id, ':pag' => $pagado);

			if (!$query->execute($datos)) {
				return false;
			}
			else {
				echo "<script text='javascript'>
						alert('El pago se grabó correctamente.');
						window.location.replace('?r=campusveranovb/BackCampusVerano');
					</script>";
				die;
			}
		}


		/*  MODIFICACION DE LA FICHA DEL INSCRITO DESDE EL BACK */
		public static function updatefichacampusverano($idinscripcion,
            $dnijugador,
            $nombre,    $apellidos, $date,  $club, $talla, $direccion, 
            $numero, $piso,         $puerta,        $poblacion, $cp, $prov, 
            $nombretutor, $apeltutor, $dnitutor, $tlftutor, $email, $alergias, 
            $tratam, $transporte,   $enfermedad,    $observ, $operaciones, 
            $turno1, $turno2, $turno3, $turno4, $turno5,  
            $sip, $resguardo, $sintomascovid, $familiarcovid, $tipopago, $genero, $fundamento  )
		{
			//error_log("id_inscrip en update= ".$idinscripcion,1);
            
			$sql = "UPDATE  registros_campus_verano 
                    SET     dni=:dnij, 
                            nombre=:nombre,         apellidos=:apel,            fechanacimiento=:fechan,    club=:club,     tallacamiseta=:talla,   direccion=:direc,   
                            numero=:num,            piso=:piso,                 puerta=:puerta,             poblacion=:pob, cp=:cp,                 provincia=:prov, 
                            nombretutor=:nomtut,    apellidostutor=:apeltut,    dnitutor=:dnitut,           telefonotutor=:telef, emailtutor=:email, alergias=:alerg, 
                            tratamientosmedicos=:tratm, tratamientosmedicos=:tratm, transporte=:transp,   
                            enfermedad=:eferm, observaciones=:observ, operacionreciente=:oper,  
                            turno2=:t2, turno3=:t3, turno4=:t4, turno5=:t5, turno1=:t1, 
                            fotocopiasip=:sip, resguardopago=:resg,  sintomascovid=:sint, familiarcovid=:famili, tipo_pago=:tipop, genero=:gen, fundamento=:fund   
                    WHERE 
                            id=:numero";
			$query = dbvbasket2::singleton()->prepare($sql);

			if (!$query) {
				return false;
			}

			$datos = array(':numero' => $idinscripcion, ':dnij' => $dnijugador, ':nombre' => $nombre, ':apel' => $apellidos, ':fechan' => $date, ':club' => $club, ':talla' => $talla, ':direc' => $direccion, ':num' => $numero, ':piso' => $piso, ':puerta' => $puerta, ':pob' => $poblacion, ':cp' => $cp, ':prov' => $prov, ':nomtut' => $nombretutor, ':apeltut' => $apeltutor, ':dnitut' => $dnitutor, ':telef' => $tlftutor, ':email' => $email, ':alerg' =>$alergias, ':tratm' =>$tratam, ':transp' =>$transporte, ':eferm' =>$enfermedad, ':observ' =>$observ, ':oper' =>$operaciones, ':t2' =>$turno2, ':t3' =>$turno3, ':t4' =>$turno4, ':t5' =>$turno5, ':t1' =>$turno1, ':sip' =>$sip, ':resg' =>$resguardo, ':sint' =>$sintomascovid, ':famili' =>$familiarcovid, ':tipop' =>$tipopago, ':gen' =>$genero, ':fund' =>$fundamento);

			//error_log(print_r($datos,1));
			//die;

			if (!$query->execute($datos)) {
				error_log("error");
				error_log(print_r($query,1));
				return false;
			}
			else {
				//error_log("id_inscrip ok en update campus verano vb= ".$idinscripcion);
				return true;
			}
		}


		

		// FIN CAMPUS VERANO





		// CAMPUS IBIZA
		public static function findAllInscripcionesCampusIbiza()
        {            
			$query = dbvbasket::singleton()->query('SELECT * FROM registros_ibiza ORDER BY id DESC');
            
			if ($query) {
				return $query->fetchAll();
			}
			else {
				return false;
			}
		}

        /*public static function dameNuevoNumeroPedidoCampusIbiza()
        {   return dbvbasket::singleton()->query('SELECT MAX(numeropedido) FROM registros_ibiza')->fetch();     }*/
        
		public static function damedatoscampusIbizaById($idinscripcion)
        {
			//error_log(print_r('SELECT * FROM registros_campus_verano WHERE id = '.$idinscripcion,1));
			return dbvbasket::singleton()->query('SELECT * FROM registros_ibiza WHERE id = '.$idinscripcion)->fetch();
		}

        public static function updateAttributeCampusIbiza($id,$nombreAtributo,$valorAtributo,$ponerComillas="no")
        {
            if($ponerComillas==="no") {   
				if($valorAtributo==0 )
				{
					$sentencia_sql="UPDATE registros_ibiza SET ".$nombreAtributo."=0 WHERE ID=".$id;
				}
				else if($valorAtributo=="null" || is_null($valorAtributo) || empty($valorAtributo))
				{
					$sentencia_sql="UPDATE registros_ibiza SET ".$nombreAtributo."=null WHERE ID=".$id;
				}
				else
				{
					$sentencia_sql="UPDATE registros_ibiza SET ".$nombreAtributo."=".$valorAtributo." WHERE ID=".$id;
				}
			}
			else {   
				if($valorAtributo=="0" )
				{
					$sentencia_sql="UPDATE registros_ibiza SET ".$nombreAtributo."='".$valorAtributo."' WHERE ID=".$id;
				}
				else if($valorAtributo=="null" || is_null($valorAtributo) || empty($valorAtributo))
				{
					$sentencia_sql="UPDATE registros_ibiza SET ".$nombreAtributo."=null WHERE ID=".$id;
				}
				else{
					$sentencia_sql="UPDATE registros_ibiza SET ".$nombreAtributo."='".$valorAtributo."' WHERE ID=".$id;
				}
			}

			//error_log($sentencia_sql);

			$query = dbvbasket::singleton()->prepare($sentencia_sql);

			if (!$query) {
				error_log(print_r(db::singleton() -> errorInfo()),1);
				return false;
			}

			$datos = array("");

			if (!$query->execute($datos)) {
				error_log(print_r($query->errorInfo(),1));
				return false;
			}
			else {
				//return self::findByID($id);
				return true;
			}
        }

		public static function damedatoscampusIbiza($numero) {
			return dbvbasket::singleton()->query('SELECT * FROM registros_ibiza WHERE numeropedido = "'.$numero.'"')->fetch();
		}


		// Para la consulta de exportar a Excel
		public static function findAllInscripcionesExcelCampusIbiza() {
			$query = dbvbasket::singleton()->query('SELECT fecharegistro, numeropedido, 
				convert(cast(convert(nombre using latin1) AS binary) using utf8) AS nombre, 
				convert(cast(convert(apellidos using latin1) AS binary) using utf8) AS apellidos, dni, fechanacimiento, genero,
				convert(cast(convert(club using latin1) AS binary) using utf8) AS club, 
				convert(cast(convert(tallacamiseta using latin1) AS binary) using utf8) AS tallacamiseta, 
				convert(cast(convert(transporte using latin1) AS binary) using utf8) AS transporte, 
				convert(cast(convert(enfermedad using latin1) AS binary) using utf8) AS enfermedad, 
				convert(cast(convert(alergias using latin1) AS binary) using utf8) AS alergias, tratamientosmedicos, operacionreciente,  
				replace(replace(convert(cast(convert(observaciones using latin1) AS binary) using utf8),Char(13),"-"),Char(10),"" )  AS observaciones, telefonotutor, 
				convert(cast(convert(nombretutor using latin1) AS binary) using utf8) AS nombretutor, 
				convert(cast(convert(apellidostutor using latin1) AS binary) using utf8) AS apellidostutor, emailtutor, dnitutor, 
				convert(cast(convert(direccion using latin1) AS binary) using utf8) AS direccion, numero, piso, puerta, cp, provincia, 
				convert(cast(convert(poblacion using latin1) AS binary) using utf8) AS poblacion, pagado, importe, tipo_pago,  if(turno2=0, "No", "Si") as Turno_1, if(turno3=0, "No", "Si") as Turno_2, if(turno4=0, "No", "Si") as Turno_3, if(turno5=0, "No", "Si") as Turno_4 , if(turno6=0, "No", "Si") as Turno_5, 
				if(espera_turno2=0, "No", "Si") as L_Espera_Turno1,
				if(espera_turno3=0, "No", "Si") as L_Espera_Turno2,
				if(espera_turno4=0, "No", "Si") as L_Espera_Turno3,
				if(espera_turno5=0, "No", "Si") as L_Espera_Turno4,
				if(espera_turno6=0, "No", "Si") as L_Espera_Turno6,
				 autorizodatos, autorizoimagen 
				FROM registros_campus_verano WHERE eliminado = 0 AND fecharegistro >= "2020-01-01" ORDER BY numeropedido DESC');

			if ($query) {
			  return $query->fetchAll(PDO::FETCH_ASSOC);
			}
			else {
				return false;
			}
		}


		public static function DardeBajacampusIbiza($pedido) {
			$sql = "UPDATE registros_ibiza SET eliminado=1 WHERE numeropedido=:numero";
			$query = dbvbasket::singleton()->prepare($sql);

			if (!$query) {
				return false;
			}

			$datos = array(':numero' => $pedido);

			if (!$query->execute($datos)) {
				return false;
			}
			else {
				echo "<script text='javascript'>
						alert('El registro se eliminó correctamente.');
						window.location.replace('?r=campus/BackCampusIbiza');
					</script>";
				die;
			}
		}


		public static function actualizapagadocampusIbiza($id, $pagado) {
			$sql = "UPDATE registros_ibiza SET pagado=:pag, tipopago=:tipopag WHERE id=:numero";
			$query = dbvbasket::singleton()->prepare($sql);

			if (!$query) {
				return false;
			}

			$datos = array(':numero' => $id, ':pag' => $pagado, ':tipopag' => "OFICINA");

			if (!$query->execute($datos)) {
				return false;
			}
			else {
				echo "<script text='javascript'>
						alert('El pago se grabó correctamente.');
						window.location.replace('?r=campus/BackCampusVerano');
					</script>";
				die;
			}
		}


		/*  MODIFICACION DE LA FICHA DEL INSCRITO DESDE EL BACK */
		/*public static function updatefichacampusIbiza($idinscripcion,$dnijugador,$nombre,$apellidos,$date, $club, $talla, $direccion, 
            $numero, $piso,         $puerta,        $poblacion, $cp, $prov, $nombretutor, $apeltutor, $dnitutor, $tlftutor, $email, $alergias, 
            $tratam, $transporte,   $enfermedad,    $observ, $operaciones, 
            $turno2, $turno3,       $turno4,        $turno5, $turno6)
		{
			//error_log("id_inscrip en update= ".$idinscripcion,1);
            
			$sql = "UPDATE  registros_campus_verano 
                    SET     nombre=:nombre, apellidos=:apel, 
                            fechanacimiento=:fechan, dni=:dnij, club=:club, tallacamiseta=:talla, transporte=:transp,   
                            enfermedad=:eferm, alergias=:alerg, tratamientosmedicos=:tratm, operacionreciente=:oper, 
                            observaciones=:observ, nombretutor=:nomtut, apellidostutor=:apeltut, dnitutor=:dnitut, 
                            direccion=:direc, numero=:num, piso=:piso, puerta=:puerta, cp=:cp, provincia=:prov, poblacion=:pob,
                            telefonotutor=:telef, emailtutor=:email, turno2=:t2, turno3=:t3, turno4=:t4, turno5=:t5, turno6=:t6  
                    WHERE 
                            id=:numero";
			$query = dbvbasket::singleton()->prepare($sql);

			if (!$query) {
				return false;
			}

			$datos = array(':numero' => $idinscripcion, ':dnij' => $dnijugador, ':nombre' => $nombre, ':apel' => $apellidos, ':fechan' => $date, ':club' => $club, ':talla' => $talla, ':direc' => $direccion, ':num' => $numero, ':piso' => $piso, ':puerta' => $puerta, ':pob' => $poblacion, ':cp' => $cp, ':prov' => $prov, ':nomtut' => $nombretutor, ':apeltut' => $apeltutor, ':dnitut' => $dnitutor, ':telef' => $tlftutor, ':email' => $email, ':alerg' =>$alergias, ':tratm' =>$tratam, ':transp' =>$transporte, ':eferm' =>$enfermedad, ':observ' =>$observ, ':oper' =>$operaciones, ':t2' =>$turno2, ':t3' =>$turno3, ':t4' =>$turno4, ':t5' =>$turno5, ':t6' =>$turno6);

			error_log(print_r($datos,1));
			//die;

			if (!$query->execute($datos)) {
				return false;
			}
			else {
				return true;
			}
		}*/


		

		// FIN CAMPUS IBIZA


		/* *****************************************
		      CAMPUS PASCUA  110.123  bbdd alqueria

		*******************************************/

		public static function findDatosCampusPascuaById($numero) {
			return dbvbasket2::singleton()->query('SELECT * FROM registros_campus_pascua WHERE id=' . $numero)->fetch();
		}

		//Para contar los registros de cada opcion (mañana, dia completo o dias sueltos) y mostrarlos en el back
		public static function findInscripcionesCampusPascuaByOpcion($filtro)
        {
			error_log(print_r('SELECT count(*) as total FROM registros_campus_pascua WHERE pension like '.'"'.$filtro.'%"',1));
			return dbvbasket2::singleton()->query('SELECT count(*) as total FROM registros_campus_pascua WHERE fecharegistro >= "2021-01-01" and eliminado=0 and  pension like '.'"'.$filtro.'%"')->fetch();
		}

		public static function damedatoscampuspascua($numero) {
			return dbvbasket2::singleton()->query('SELECT * FROM registros_campus_pascua WHERE numeropedido=' . '"'.$numero.'"')->fetch();
		}


		public static function findAllInscripcionesCampusPascua() {
			$query = dbvbasket2::singleton()->query('SELECT * FROM registros_campus_pascua WHERE eliminado = 0 AND fecharegistro >= "2021-01-01" ORDER BY numeropedido DESC');
			if ($query)
				return $query->fetchAll();
			else
				return false;
		}


		// Para la consulta de exportar a Excel con todos los campos
		public static function findAllInscripcionesExcelCampusPascua() {
			
			$query = dbvbasket2::singleton()->query('SELECT numeropedido as Pedido, pension as Pension, genero as Genero, 
				concat (nombre , " ", apellidos) AS Inscrito, fechanacimiento as FechaNacNac, dni as Dni, 
				club as Club, tallacamiseta as Talla, 
				transporte as Tranporte, 
				enfermedad, 
				alergias as Alergias,  
				tratamientosmedicos as Tratamientosmedicos, 
				operacionreciente Operaciones, 
				replace(replace(observaciones,Char(13),"-"),Char(10),"" ) as Observaciones, familiarcovid, sintomascovid,  
				concat (nombretutor, " ", apellidostutor) AS Tutor, 
				dnitutor as DniTutor, telefonotutor as Telefono, emailtutor as Email, 
				direccion as Direccion, numero,  
				piso as Piso, puerta, cp, 
				provincia as Provincia, 
				poblacion as Poblacion, 
				autorizoimagen, autorizodatos, if(pagado=1, "Si", "No") AS Pagado, importe as Importe, tipo_pago as TipoPago from registros_campus_pascua where fecharegistro>"2021-01-01" and eliminado=0 order by numeropedido desc');
			if ($query)
			  return $query->fetchAll(PDO::FETCH_ASSOC);

			else
				return false;
		}


		// Para la consulta de exportar a excel con diferentes campos
		public static function findAllInscripcionesExcelCampusPascuaConCampos($where, $campoorder, $campos)	{


			$query = dbvbasket2::singleton()->query('SELECT  numeropedido as Pedido, pension as Pension, genero as Genero, 
				concat (nombre, " ", apellidos) AS Inscrito, fechanacimiento as FechaNac, dni as Dni, 
				club as club,
				'. $campos .'
				   concat (nombretutor, " ", apellidostutor) AS Tutor, telefonotutor as Telefono, emailtutor As Email,  if(pagado=1, "Si", "No") AS Pagado, importe as Importe, tipo_pago as TipoPago  FROM registros_campus_pascua WHERE eliminado=0 and fecharegistro>"2021-02-01"'. $where .'ORDER BY '. $campoorder .' DESC');

			if ($query) {
				return $query->fetchAll(PDO::FETCH_ASSOC);
			}
			else {
				return false;
			}
		}



		public static function DarDeBajaCampusPascua($pedido) {
			$sql = "UPDATE registros_campus_pascua SET eliminado=1  WHERE numeropedido=:numero";
			$query = dbvbasket2::singleton()->prepare($sql);

			if (!$query) {
				return false;
			}

			$datos = array(':numero' => $pedido);

			if (!$query->execute($datos)) {
				return false;
			}
			else {
				echo "<script text='javascript'>
						alert('El registro se eliminó correctamente.');
						window.location.replace('?r=campus/BackCampusPascua');
					</script>";
				die;
			}
		}


		public static function actualizapagadocampuspascua($id, $pagado) {
			$sql = "update registros_campus_pascua set pagado=:pag where id=:numero";
			$query = dbvbasket2::singleton()->prepare($sql);

			if (!$query) {
				return false;
			}

			$datos = array(':numero' => $id, ':pag' => $pagado);

			if (!$query->execute($datos)) {
				return false;
			} 
			else {
				echo "<script text='javascript'> alert('El pago se grabó correctamente.');
					window.location.replace('?r=campus/BackCampusPascua'); </script>";
					die;
			}
		}

		/*  MODIFICACION DE LA FICHA DEL INSCRITO DESDE EL BACK campus pascua vb */
		public static function updatefichacampusPascua($idinscripcion,
            $dnijugador,  $nombre,    $apellidos, $date,  $club,  $direccion, 
            $numero, 	  $piso,      $puerta,    $poblacion, $cp, $prov, 
            $nombretutor, $apeltutor, $dnitutor, $tlftutor, $email,  
            $observ,  $sip, $sintomascovid, $familiarcovid, $resguardo, $opcion, $importe,  $genero,
            $tallacam, $alergias, $enfermedad, $tratam, $operaciones, $transporte, $tipopago)
		{
			error_log("id_inscrip en update campus pascua= ".$idinscripcion);
            
			$sql = "UPDATE  registros_campus_pascua 
                    SET     dni=:dnij,        nombre=:nombre,   apellidos=:apel,   fechanacimiento=:fechan,    club=:club,      
                    		direccion=:direc, numero=:num,      piso=:piso,        puerta=:puerta,             poblacion=:pob, 
                    		cp=:cp,           provincia=:prov,  nombretutor=:nomtut,  apellidostutor=:apeltut, 
                    		dnitutor=:dnitut,      telefonotutor=:telef, 	emailtutor=:email, observaciones=:observ, 
                            sintomascovid=:sint, familiarcovid=:famili, 
                            fotocopiasip=:sip,  resguardopago=:resg,  pension=:opc,  importe=:precio, genero=:gen,
                            tallacamiseta=:talla, alergias=:alergias, enfermedad=:enfermedad,  tratamientosmedicos=:tratm , operacionreciente=:oper, 
                            transporte=:transp, tipo_pago=:pago  
                    WHERE 
                            id=:idinscrip";
			$query = dbvbasket2::singleton()->prepare($sql);

			if (!$query) {
				return false;
			}

			$datos = array(':idinscrip' => $idinscripcion, ':dnij' => $dnijugador, ':nombre' => $nombre, ':apel' => $apellidos, ':fechan' => $date, ':club' => $club,  ':direc' => $direccion, ':num' => $numero, ':piso' => $piso, ':puerta' => $puerta, ':pob' => $poblacion, ':cp' => $cp, ':prov' => $prov, ':nomtut' => $nombretutor, ':apeltut' => $apeltutor, ':dnitut' => $dnitutor, ':telef' => $tlftutor, ':email' => $email,  ':observ' =>$observ,  ':sip' =>$sip, ':sint' =>$sintomascovid, ':famili' =>$familiarcovid,  ':resg' =>$resguardo, ':opc'=>$opcion,  ':precio' =>$importe,  
				':gen' =>$genero, ':talla' =>$tallacam, ':alergias' =>$alergias, ':enfermedad' =>$enfermedad, ':tratm' =>$tratam, ':oper' =>$operaciones, ':transp' =>$transporte, ':pago' =>$tipopago);

			//error_log(print_r($datos,1));
			//die;

			if (!$query->execute($datos)) {
				error_log("error");
				error_log(print_r($query,1));
				return false;
			}
			else {
				//error_log("id_inscrip ok en update campus pascua vb= ".$idinscripcion);
				return true;
			}
		}


		


		/***********************************

		// FIN CAMPUS PASCUA 2021
		
		****************************************/



		// CAMPUS NAVIDAD VB.123

		public static function findInscripcionesCampusNavidad() {
			$query = dbvbasket2::singleton()->query('select * from registros_campus_navidad where fecharegistro> "2020-10-01" and eliminado=0 order by numeropedido desc');
			
			if ($query)
				return $query->fetchAll();
			else
				return false;
		}

		public static function findDatosCampusNavidadById($idinscripcion)
        {
			error_log(print_r('SELECT * FROM registros_campus_navidad WHERE id = '.$idinscripcion,1));
			return dbvbasket2::singleton()->query('SELECT * FROM registros_campus_navidad WHERE id = '.$idinscripcion)->fetch();
		}
		
		
		// Para la consulta de exportar a Excel
		public static function findAllInscripcionesExcelCampusNavidad() {            
			/*$query = dbvbasket2::singleton()->query('select fecharegistro, numeropedido, 
				convert(cast(convert(nombre using latin1) as binary) using utf8) as nombre, 
				convert(cast(convert(apellidos using latin1) as binary) using utf8) as Apellidos, fechanacimiento, dni, pension, transporte, club, 
				convert(cast(convert(tallacamiseta using latin1) as binary) using utf8) as Talla,  
				convert(cast(convert(enfermedades using latin1) as binary) using utf8) as Enfermedades,
				convert(cast(convert(alergias using latin1) as binary) using utf8) as Alergias,
				convert(cast(convert(tratamientosmedicos using latin1) as binary) using utf8) as Tratamientos, 
				convert(cast(convert(intervencionesquirurgicas using latin1) as binary) using utf8) as Intervencionesquirurgicas, 
				convert(cast(convert(observaciones using latin1) as binary) using utf8) as Observaciones, 
				convert(cast(convert(sintomascovid using latin1) as binary) using utf8) as SintomasCovid,
				convert(cast(convert(familiarcovid using latin1) as binary) using utf8) as FamiliarCovid,
				convert(cast(convert(nombretutor using latin1) as binary) using utf8) as nombretutor, 
				convert(cast(convert(apellidostutor using latin1) as binary) using utf8) as apellidostutor, telefonotutor, emailtutor, dnitutor, 
				convert(cast(convert(direccion using latin1) as binary) using utf8) as direccion, numero, piso, puerta, cp, provincia, 
				convert(cast(convert(poblacion using latin1) as binary) using utf8) as poblacion, if(autorizodatos=1, "Si", "No") AS autorizodatos, if(autorizoimagen=1, "Si", "No") AS autorizoimagen, tipopago, 
				if(pagado=1, "Si", "No") AS pagado, importe  
				from registros_campus_navidad where fecharegistro>"2020-10-01" and eliminado=0 order by numeropedido desc'); 
				*/

			 $query = dbvbasket2::singleton()->query('select *  from registros_campus_navidad where fecharegistro>"2020-10-01" and eliminado=0 order by numeropedido desc'); 

			if ($query)          
			  return $query->fetchAll(PDO::FETCH_ASSOC);

			else
				return false;
		}


		public static function actualizapagadocampusnavidad($id, $pagado) {
			$sql = "update registros_campus_navidad set pagado=:pag, tipo_pago=:tipopag where id=:numero";
			$query = dbvbasket2::singleton()->prepare($sql);

			if (!$query) {
				return false;
			}

			$datos = array(':numero' => $id, ':pag' => $pagado, ':tipopag' => "OFICINA");

			if (!$query->execute($datos)) {
				return false;
			} 
			else {
				echo "<script text='javascript'> alert('El pago se grabó correctamente.');
					window.location.replace('?r=campus/BackCampusNavidad'); </script>";
					die;
			}
		}   


		public static function DardeBajacampusnavidad($pedido) {
			$sql = "UPDATE registros_campus_navidad SET eliminado=1 WHERE numeropedido=:numero";
			$query = dbvbasket2::singleton()->prepare($sql);

			if (!$query) {
				return false;
			}

			$datos = array(':numero' => $pedido);

			if (!$query->execute($datos)) {
				return false;
			}
			else {
				echo "<script text='javascript'>
						alert('El registro se eliminó correctamente.');
						window.location.replace('?r=campus/BackCampusNavidad');
					</script>";
				die;
			}
		}


		/*  MODIFICACION DE LA FICHA DEL INSCRITO DESDE EL BACK */
		public static function updatefichacampusnavidad($idinscripcion,
            $dnijugador,
            $nombre,    $apellidos, $date,  $club, $talla, $direccion, 
            $numero, $piso,         $puerta,        $poblacion, $cp, $prov, 
            $nombretutor, $apeltutor, $dnitutor, $tlftutor, $email, $alergias, 
            $tratam, $transporte,   $enfermedad,    $observ, $operaciones, 
             $sip, $sintomascovid, $familiarcovid, $pension, $importe, $espera)
		{
			//error_log("id_inscrip en update campus navidad= ".$idinscripcion);
            
			$sql = "UPDATE  registros_campus_navidad 
                    SET     dni=:dnij, 
                            nombre=:nombre,         apellidos=:apel,            fechanacimiento=:fechan,    club=:club,     tallacamiseta=:talla,   direccion=:direc,   
                            numero=:num,            piso=:piso,                 puerta=:puerta,             poblacion=:pob, cp=:cp,                 provincia=:prov, 
                            nombretutor=:nomtut,    apellidostutor=:apeltut,    dnitutor=:dnitut,           telefonotutor=:telef, 					emailtutor=:email, 
                            alergias=:alerg, 		enfermedades=:eferm, tratamientosmedicos=:tratm,  transporte=:transp,   
                            intervencionesquirurgicas=:oper, observaciones=:observ, 
                             sintomascovid=:sint, familiarcovid=:famili, pension=:pens, importe=:precio, listaespera=:esp, 
                            
                             ficherosubido1=:sip   
                    WHERE 
                            id=:idinscrip";
			$query = dbvbasket2::singleton()->prepare($sql);

			if (!$query) {
				return false;
			}

			$datos = array(':idinscrip' => $idinscripcion, ':dnij' => $dnijugador, ':nombre' => $nombre, ':apel' => $apellidos, ':fechan' => $date, ':club' => $club, ':talla' => $talla, ':direc' => $direccion, ':num' => $numero, ':piso' => $piso, ':puerta' => $puerta, ':pob' => $poblacion, ':cp' => $cp, ':prov' => $prov, ':nomtut' => $nombretutor, ':apeltut' => $apeltutor, ':dnitut' => $dnitutor, ':telef' => $tlftutor, ':email' => $email, ':alerg' =>$alergias, ':tratm' =>$tratam, ':transp' =>$transporte, ':eferm' =>$enfermedad, ':observ' =>$observ, ':oper' =>$operaciones, ':sip' =>$sip, ':sint' =>$sintomascovid, ':famili' =>$familiarcovid, ':pens' =>$pension, ':precio' =>$importe, ':esp' =>$espera);

			error_log(print_r($datos,1));
			//die;

			if (!$query->execute($datos)) {
				error_log(print_r($query,1));
				return false;
			}
			else {
				error_log("id_inscrip ok en update campus navidad= ".$idinscripcion);
				return true;
			}
		}


	}
?>