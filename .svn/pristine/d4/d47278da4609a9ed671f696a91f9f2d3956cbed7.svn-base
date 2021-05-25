<?php 
	/************************************************
	Model Generator: 		V1.2 (2020-01-28) 
	Autor: 					Pablo Muñoz Julve
	Fecha de la generación: 2020-01-28 17:05:50
	************************************************/

	class sportsclub_inscripciones {

		public static function findAll() {
			return db_utf8::singleton() -> query('SELECT * FROM sportsclub_inscripciones') -> fetchAll();
		}


		public static function findLast() {
			return db_utf8::singleton() -> query('SELECT * FROM sportsclub_inscripciones ORDER BY ID desc limit 1') -> fetch();
		}


		public static function getCount() {
			return db_utf8::singleton() -> query('SELECT *, count(*) FROM sportsclub_inscripciones GROUP BY ID') -> fetch();
		}

        
        public static function findAllAmpliadoHorarios()
        {
            return db_utf8::singleton()->query('SELECT
                sportsclub_inscripciones.*,
                sportsclub_horarios_2020.franja_1 			as franja_1_18h_19h,
                sportsclub_horarios_2020.franja_1_lunes		as franja_1_18h_19h_lunes,
                sportsclub_horarios_2020.franja_1_miercoles	as franja_1_18h_19h_miercoles,
                sportsclub_horarios_2020.franja_2			as franja_2_18h_19h,
                sportsclub_horarios_2020.franja_2_martes	as franja_2_18h_19h_martes,
                sportsclub_horarios_2020.franja_2_jueves	as franja_2_18h_19h_jueves,
                sportsclub_horarios_2020.franja_3			as franja_3_1930h_2030h,
                sportsclub_horarios_2020.franja_3_lunes		as franja_3_1930h_2030h_lunes,
                sportsclub_horarios_2020.franja_3_miercoles	as franja_3_1930h_2030h_miercoles,
                sportsclub_horarios_2020.franja_4			as franja_4_1930h_2030h,
                sportsclub_horarios_2020.franja_4_martes	as franja_4_1930h_2030h_martes,
                sportsclub_horarios_2020.franja_4_jueves	as franja_4_1930h_2030h_jueves,
                sportsclub_horarios_2020.franja_5			as franja_5_2100h_2200h,
                sportsclub_horarios_2020.franja_5_martes	as franja_5_2100h_2200h_martes,
                sportsclub_horarios_2020.franja_5_jueves	as franja_5_2100h_2200h_jueves
            FROM
                sportsclub_inscripciones
            INNER JOIN sportsclub_horarios_2020 ON sportsclub_inscripciones.ID = sportsclub_horarios_2020.IDSportClubInscripcion')->fetchall();
        }

		public static function insert($dni, $nombre, $apellidos, $direccion, $numero, $piso_esc, $puerta, $cp, $poblacion, $provincia, $fecha_nacimiento, $email, $telefono, $tipo_inscripcion, $domiciliacion_titular, $domiciliacion_iban, $domiciliacion_entidad, $domiciliacion_oficina, $domiciliacion_dc, $domiciliacion_cuenta, $fecha_alta, $activo, $comentario, $autorizodatos, $autorizoimagen) {
			$sql = 'INSERT INTO sportsclub_inscripciones(dni, nombre, apellidos, direccion, numero, piso_esc, puerta, cp, poblacion, provincia, fecha_nacimiento, email, telefono, tipo_inscripcion, domiciliacion_titular, domiciliacion_iban, domiciliacion_entidad, domiciliacion_oficina, domiciliacion_dc, domiciliacion_cuenta, fecha_alta, activo, comentario, autorizodatos, autorizoimagen) VALUES (:dni, :nombre, :apellidos, :direccion, :numero, :piso_esc, :puerta, :cp, :poblacion, :provincia, :fecha_nacimiento, :email, :telefono, :tipo_inscripcion, :domiciliacion_titular, :domiciliacion_iban, :domiciliacion_entidad, :domiciliacion_oficina, :domiciliacion_dc, :domiciliacion_cuenta, :fecha_alta, :activo, :comentario, :autorizodatos, :autorizoimagen)';

			$query = db_utf8::singleton() -> prepare($sql);

			if (!$query) {
				error_log(print_r($query -> errorInfo(),1));
				return false;
			}

			$datos = array(':dni'=>$dni,':nombre'=>$nombre,':apellidos'=>$apellidos,':direccion'=>$direccion,':numero'=>$numero, ':piso_esc'=>$piso_esc,':puerta'=>$puerta,':cp'=>$cp,':poblacion'=>$poblacion,':provincia'=>$provincia, ':fecha_nacimiento'=>$fecha_nacimiento,':email'=>$email,':telefono'=>$telefono,':tipo_inscripcion'=>$tipo_inscripcion,':domiciliacion_titular'=>$domiciliacion_titular, ':domiciliacion_iban'=>$domiciliacion_iban,':domiciliacion_entidad'=>$domiciliacion_entidad,':domiciliacion_oficina'=>$domiciliacion_oficina,':domiciliacion_dc'=>$domiciliacion_dc,':domiciliacion_cuenta'=>$domiciliacion_cuenta, ':fecha_alta'=>$fecha_alta,':activo'=>$activo,':comentario'=>$comentario,':autorizodatos'=>$autorizodatos,':autorizoimagen'=>$autorizoimagen);
				
			if (!$query -> execute($datos)) {
				error_log(print_r($query -> errorInfo(),1));
				return false;
			}
			else {
				return self::findLast();
			}			
		}


		/*********************
		**** MÉTODOS FIND ****
		*********************/

		public static function findByID($ID) {
			return db_utf8::singleton() -> query('SELECT * FROM sportsclub_inscripciones WHERE ID='.$ID) -> fetch();
		}

        
        public static function findByIDAmpliadoCuestionarioSalud($ID){
            $sentencia_sql='SELECT 
                    sportsclub_inscripciones.*, 
                    sportsclub_cuestionarios.*
                FROM        sportsclub_inscripciones 
                INNER JOIN  sportsclub_cuestionarios ON sportsclub_inscripciones.ID = sportsclub_cuestionarios.IDSportClubInscripcion
                WHERE sportsclub_inscripciones.ID='.$ID;
                error_log( $sentencia_sql );
                error_log(__FILE__.__FUNCTION__.__LINE__);
			return db_utf8::singleton() -> query($sentencia_sql) -> fetch();
		}
        

		public static function findBydni($dni) {
			return db_utf8::singleton() -> query('SELECT * FROM sportsclub_inscripciones WHERE dni="'.$dni.'"') -> fetch();
		}


		public static function findByactivo($activo) {
			return db_utf8::singleton() -> query('SELECT * FROM sportsclub_inscripciones WHERE activo='.$activo) -> fetchAll();
		}


		/*public static function findConPagoByactivo($activo) {
			return db_utf8::singleton() -> query('SELECT sci.*, scp.* FROM sportsclub_inscripciones sci LEFT JOIN sportsclub_pagos scp ON sci.ID = scp.IDSportClubInscripcion WHERE sci.activo = '.$activo) -> fetchAll();
		}*/

       /* public static function findAllAmpliadoHorarios() {
            return db_utf8::singleton()->query('SELECT sportsclub_inscripciones.*, 
                sportsclub_horarios_2020.franja_1           as franja_1_18h_19h,
                sportsclub_horarios_2020.franja_1_lunes     as franja_1_18h_19h_lunes,
                sportsclub_horarios_2020.franja_1_miercoles as franja_1_18h_19h_miercoles,
                sportsclub_horarios_2020.franja_2           as franja_2_18h_19h,
                sportsclub_horarios_2020.franja_2_martes    as franja_2_18h_19h_martes,
                sportsclub_horarios_2020.franja_2_jueves    as franja_2_18h_19h_jueves,
                sportsclub_horarios_2020.franja_3           as franja_3_1930h_2030h,
                sportsclub_horarios_2020.franja_3_lunes     as franja_3_1930h_2030h_lunes,
                sportsclub_horarios_2020.franja_3_miercoles as franja_3_1930h_2030h_miercoles,
                sportsclub_horarios_2020.franja_4           as franja_4_1930h_2030h,
                sportsclub_horarios_2020.franja_4_martes    as franja_4_1930h_2030h_martes,
                sportsclub_horarios_2020.franja_4_jueves    as franja_4_1930h_2030h_jueves,
                sportsclub_horarios_2020.franja_5           as franja_5_2100h_2200h,
                sportsclub_horarios_2020.franja_5_martes    as franja_5_2100h_2200h_martes,
                sportsclub_horarios_2020.franja_5_jueves    as franja_5_2100h_2200h_jueves
            FROM
                sportsclub_inscripciones
            INNER JOIN sportsclub_horarios_2020 ON sportsclub_inscripciones.ID = sportsclub_horarios_2020.IDSportClubInscripcion')->fetchall();
        }*/


		/***********************
		**** MÉTODOS UPDATE ****
		***********************/

		public static function update($ID, $dni, $nombre, $apellidos, $direccion, $numero, $piso_esc, $puerta, $cp, $poblacion, $provincia, $fecha_nacimiento, $email, $telefono, $tipo_inscripcion, 
			$domiciliacion_titular, $domiciliacion_iban, $domiciliacion_entidad, $domiciliacion_oficina, $domiciliacion_dc, $domiciliacion_cuenta, $fecha_alta, $activo, $comentario, $autorizodatos, 
			$autorizoimagen) {        
			$sql = 'UPDATE sportsclub_inscripciones SET id=:id, dni=:dni, nombre=:nombre, apellidos=:apellidos, direccion=:direccion, numero=:numero, piso_esc=:piso_esc, puerta=:puerta, cp=:cp, poblacion=:poblacion, provincia=:provincia, fecha_nacimiento=:fecha_nacimiento, email=:email, telefono=:telefono, tipo_inscripcion=:tipo_inscripcion, domiciliacion_titular=:domiciliacion_titular, domiciliacion_iban=:domiciliacion_iban, domiciliacion_entidad=:domiciliacion_entidad, domiciliacion_oficina=:domiciliacion_oficina, domiciliacion_dc=:domiciliacion_dc, domiciliacion_cuenta=:domiciliacion_cuenta, fecha_alta=:fecha_alta, activo=:activo, comentario=:comentario, autorizodatos=:autorizodatos,	autorizoimagen=:autorizoimagen WHERE ID=:id';

			$query=db_utf8::singleton()->prepare($sql);

			$datos=array(
				':id'=>$ID,':dni'=>$dni,':nombre'=>$nombre,':apellidos'=>$apellidos,':direccion'=>$direccion,
				':numero'=>$numero,':piso_esc'=>$piso_esc,':puerta'=>$puerta,':cp'=>$cp,':poblacion'=>$poblacion,
				':provincia'=>$provincia,':fecha_nacimiento'=>$fecha_nacimiento,':email'=>$email,':telefono'=>$telefono,':tipo_inscripcion'=>$tipo_inscripcion,
				':domiciliacion_titular'=>$domiciliacion_titular,':domiciliacion_iban'=>$domiciliacion_iban,':domiciliacion_entidad'=>$domiciliacion_entidad,':domiciliacion_oficina'=>$domiciliacion_oficina,':domiciliacion_dc'=>$domiciliacion_dc,
				':domiciliacion_cuenta'=>$domiciliacion_cuenta,':fecha_alta'=>$fecha_alta,':activo'=>$activo,':comentario'=>$comentario,':autorizodatos'=>$autorizodatos,
				':autorizoimagen'=>$autorizoimagen);
	
			if (!$query->execute($datos)) {
				error_log(print_r($query -> errorInfo(),1));
				return false;
			}
			else {
				return self::findByID($id);
			}
		}


		public static function DarseBajaSportsClub($ID) {
			$sql = "UPDATE sportsclub_inscripciones SET activo=0 WHERE ID=:id";
			$query = db::singleton()->prepare($sql);

			if (!$query) {
				return false;
			}

			$datos = array(':id' => $ID);

			if (!$query->execute($datos)) {
				return false;
			}
			else {
				echo "<script text='javascript'>
						alert('El registro se eliminó correctamente.');
						window.location.replace('?r=sportsclub/BackListarInscripciones');
					</script>";
				die;
			}
		}


		public static function updateAttribute($id,$nombreAtributo,$valorAtributo,$ponerComillas="no") {
			if($ponerComillas==="no") {   
				if($valorAtributo==0 )
				{
					$sentencia_sql="UPDATE sportsclub_inscripciones SET ".$nombreAtributo."=0 WHERE ID=".$id;
				}
				else if($valorAtributo=="null" || is_null($valorAtributo) || empty($valorAtributo))
				{
					$sentencia_sql="UPDATE sportsclub_inscripciones SET ".$nombreAtributo."=null WHERE ID=".$id;
				}
				else
				{
					$sentencia_sql="UPDATE sportsclub_inscripciones SET ".$nombreAtributo."=".$valorAtributo." WHERE ID=".$id;
				}
			}
			else {   
				if($valorAtributo=="0" )
				{
					$sentencia_sql="UPDATE sportsclub_inscripciones SET ".$nombreAtributo."='".$valorAtributo."' WHERE ID=".$id;
				}
				else if($valorAtributo=="null" || is_null($valorAtributo) || empty($valorAtributo))
				{
					$sentencia_sql="UPDATE sportsclub_inscripciones SET ".$nombreAtributo."=null WHERE ID=".$id;
				}
				else{
					$sentencia_sql="UPDATE sportsclub_inscripciones SET ".$nombreAtributo."='".$valorAtributo."' WHERE ID=".$id;
				}
			}

			$query = db_utf8::singleton()->prepare($sentencia_sql);

			if (!$query) {
				error_log(print_r(db_utf8::singleton() -> errorInfo()),1);
				return false;
			}

			$datos = array("");

			if (!$query->execute($datos)) {
				error_log(print_r($query->errorInfo(),1));
				return false;
			}
			else {
				return self::findByID($id);
			}
		}


		/***********************
		**** MÉTODOS DELETE ****
		***********************/

		public static function deleteAll() {
			$sql='DELETE FROM sportsclub_inscripciones';

			$query=db_utf8::singleton()->prepare($sql);

			if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

			$datos=array();

			if(!$x=$query->execute($datos)){error_log(var_dump( db_utf8::singleton()->errorInfo()));return false;}
		}


		public static function deleteByID($ID) {
			$sql="DELETE FROM sportsclub_inscripciones where ID=:id";

			$query=db_utf8::singleton()->prepare($sql);

			if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

			$datos=array(':id'=>$ID);

			if(!$x=$query->execute($datos)){error_log(var_dump( db_utf8::singleton()->errorInfo()));return false;}
		}


		public static function deleteBydni($dni) {
			$sql="DELETE FROM sportsclub_inscripciones where dni=:dni";

			$query=db_utf8::singleton()->prepare($sql);

			if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

			$datos=array(':dni'=>$dni);

			if(!$x=$query->execute($datos)){error_log(var_dump( db_utf8::singleton()->errorInfo()));return false;}
		}


		public static function deleteByactivo($activo) {
			$sql="DELETE FROM sportsclub_inscripciones where activo=:activo";

			$query=db_utf8::singleton()->prepare($sql);

			if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

			$datos=array(':activo'=>$activo);

			if(!$x=$query->execute($datos)){error_log(var_dump( db_utf8::singleton()->errorInfo()));return false;}
		}
	}
?>