<?php
	/**********************************************
	Model Generator:			V1.03 (2019-02-22) 
	Autor:						Pablo Muñoz Julve
	Fecha de la generación:		2019-10-23 11:15:44
	***********************************************/

	class equipos {
		public static function findAll() {
			return db_2::singleton()->query('SELECT * FROM equipos')->fetchAll();
		}


		public static function findAllEquipos() {
			return db_2::singleton()->query('SELECT nombre_equipo_nueva_temporada FROM equipos WHERE id_equipo NOT IN (71,61,69,23,24,70) ORDER BY nombre_equipo_nueva_temporada ASC')->fetchAll();
		}


		public static function findAllCategorias() {
			return db_2::singleton()->query('SELECT nombre_categoria_cas FROM categorias_equipo ORDER BY nombre_categoria_cas ASC')->fetchAll();
		}


		public static function findLast() {
			return db_2::singleton()->query('SELECT * FROM equipos ORDER BY id_equipo DESC LIMIT 1')->fetch();
		}


		public static function getCount() {
			return db_2::singleton()->query('SELECT *, count(*) FROM equipos GROUP BY id_equipo')->fetch();
		}


		public static function insert($id_categoria, $nombre_equipo_cas, $nombre_equipo_val, $nombre_equipo_eng, $nombre_equipo_rus,
			$texto_equipo_cas, $texto_equipo_val, $texto_equipo_eng, $texto_equipo_rus, $ruta_imagen_equipo, 
			$ruta_imagen_min_equipo, $seccion, $posicion) {

			$sql = 'INSERT INTO equipos(id_categoria, nombre_equipo_cas, nombre_equipo_val, nombre_equipo_eng, nombre_equipo_rus, 
			texto_equipo_cas, texto_equipo_val, texto_equipo_eng, texto_equipo_rus, ruta_imagen_equipo, 
			ruta_imagen_min_equipo, seccion, posicion)
			VALUES(:id_categoria, :nombre_equipo_cas, :nombre_equipo_val, :nombre_equipo_eng, :nombre_equipo_rus, 
			:texto_equipo_cas, :texto_equipo_val, :texto_equipo_eng, :texto_equipo_rus, :ruta_imagen_equipo, 
			:ruta_imagen_min_equipo, :seccion, :posicion)';


			$query = db_2::singleton()->prepare($sql);

			if (!$query) {
				error_log(print_r($query->errorInfo(),1));
				die;
			}

			$datos = array(':id_categoria'=>$id_categoria, ':nombre_equipo_cas'=>$nombre_equipo_cas, ':nombre_equipo_val'=>$nombre_equipo_val, ':nombre_equipo_eng'=>$nombre_equipo_eng, ':nombre_equipo_rus'=>$nombre_equipo_rus, ':texto_equipo_cas'=>$texto_equipo_cas, ':texto_equipo_val'=>$texto_equipo_val, ':texto_equipo_eng'=>$texto_equipo_eng, ':texto_equipo_rus'=>$texto_equipo_rus,':ruta_imagen_equipo'=>$ruta_imagen_equipo, ':ruta_imagen_min_equipo'=>$ruta_imagen_min_equipo, ':seccion'=>$seccion, ':posicion'=>$posicion);

			if (!$query->execute($datos)) {
				error_log(print_r( $query->errorInfo(),1));
				die;
			}
			else {
				/*error_log(__FILE__.__FUNCTION__.__LINE__);*/
			}
			return self::findLast();
		}


		public static function update($id_equipo, $id_categoria, $nombre_equipo_cas, $nombre_equipo_val, $nombre_equipo_eng, 
			$nombre_equipo_rus, $texto_equipo_cas, $texto_equipo_val, $texto_equipo_eng, $texto_equipo_rus, 
			$ruta_imagen_equipo, $ruta_imagen_min_equipo, $seccion, $posicion) {

			$sql='UPDATE equipos
			SET id_equipo=:id_equipo, id_categoria=:id_categoria, nombre_equipo_cas=:nombre_equipo_cas, nombre_equipo_val=:nombre_equipo_val, nombre_equipo_eng=:nombre_equipo_eng, nombre_equipo_rus=:nombre_equipo_rus, texto_equipo_cas=:texto_equipo_cas, texto_equipo_val=:texto_equipo_val, texto_equipo_eng=:texto_equipo_eng, texto_equipo_rus=:texto_equipo_rus, ruta_imagen_equipo=:ruta_imagen_equipo, ruta_imagen_min_equipo=:ruta_imagen_min_equipo, seccion=:seccion, posicion=:posicion
			WHERE id_equipo=:id_equipo';

			$query = db_2::singleton()->prepare($sql);

			$datos = array(':id_equipo'=>$id_equipo, ':id_categoria'=>$id_categoria, ':nombre_equipo_cas'=>$nombre_equipo_cas, ':nombre_equipo_val'=>$nombre_equipo_val, ':nombre_equipo_eng'=>$nombre_equipo_eng, ':nombre_equipo_rus'=>$nombre_equipo_rus, ':texto_equipo_cas'=>$texto_equipo_cas, ':texto_equipo_val'=>$texto_equipo_val, ':texto_equipo_eng'=>$texto_equipo_eng, ':texto_equipo_rus'=>$texto_equipo_rus, ':ruta_imagen_equipo'=>$ruta_imagen_equipo, ':ruta_imagen_min_equipo'=>$ruta_imagen_min_equipo, ':seccion'=>$seccion, ':posicion'=>$posicion);

			if (!$query->execute($datos)) {
				error_log(print_r( $query->errorInfo(),1));
				die;
			}
			else {
				return true;
			}
		}



		/*********************
		**** METODOS FIND ****
		*********************/

		public static function findBy_id_equipo($id_equipo) {
			return db_2::singleton()->query('SELECT * FROM equipos WHERE id_equipo='.$id_equipo)->fetch();
		}

        public static function findEquipoById($id_equipo) {
			return db_2_utf8::singleton()->query('SELECT * FROM equipos WHERE id_equipo='.$id_equipo)->fetch();
		}

		/***********************
		**** METODOS DELETE ****
		***********************/

		public static function deleteAll() {
			$sql = 'DELETE FROM equipos';

			$query = db_2::singleton()->prepare($sql);

			if (!$query) {
				error_log(print_r($query->errorInfo(),1));
				die;
			}

			$datos = array();

			if (!$x = $query->execute($datos)) {
				error_log(var_dump(db_2::singleton()->errorInfo()));
				die;
			}
		}


		public static function deleteBy_id_equipo($id_equipo) {
			$sql = "DELETE FROM equipos WHERE id_equipo=:id_equipo";

			$query = db_2::singleton()->prepare($sql);

			if (!$query) {
				error_log(print_r($query->errorInfo(),1));
				die;
			}

			$datos = array(':id_equipo'=>$id_equipo);

			if (!$x = $query->execute($datos)) {
				error_log(var_dump(db_2::singleton()->errorInfo()));
				die;
			}
		}
	}
?>