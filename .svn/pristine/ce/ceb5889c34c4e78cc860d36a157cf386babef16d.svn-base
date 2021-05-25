<?php 
	/************************************************
	Code Generator: 		V2.0 (2020-03-26) 
	Autor: 					Alex Alonso Momplet
	Fecha de la generación: 2020-09-11 18:00:00
	Base de datos: 			alqueriaforms
	Clase de capa: 			models
	************************************************/

    class declaracion_responsable_abonos {

        /***********************
		****  METODOS FIND  ****
		***********************/

        public static function findAll() {
            return db::singleton()->query('SELECT * FROM declaracion_responsable_abonos')->fetchAll();
        }


        public static function findLast() {
            return db::singleton()->query('SELECT * FROM declaracion_responsable_abonos ORDER BY id desc limit 1')->fetch();
        }


        public static function getCount() {
            return db::singleton()->query('SELECT *,count(*) FROM declaracion_responsable_abonos GROUP BY id')->fetch();
        }


    	public static function findBydni($dni) {
            return db::singleton()->query('SELECT * FROM declaracion_responsable_abonos WHERE dni="'.$dni.'"')->fetch();
        }


        public static function findBynombre_completo($nombre_completo) {
            return db::singleton()->query('SELECT * FROM declaracion_responsable_abonos WHERE nombre_completo="'.$nombre_completo.'"')->fetch();
        }


		/***********************
		****  METODO INSERT  ***
		***********************/

		public static function insert($nombre_completo, $dni) {
            $sql = 'INSERT INTO declaracion_responsable_abonos(nombre_completo, dni) VALUES(:nombre_completo, :dni)';

            $query = db::singleton()->prepare($sql);

            if (!$query) {
                error_log(print_r( $query->errorInfo(),1));
                return false;
            }

            $datos = array(':nombre_completo'=>$nombre_completo,':dni'=>$dni);

            if (!$query->execute($datos)) {
                error_log(print_r( $query->errorInfo(),1));
                return false;
            }
            else {
                return self::findLast();
            }
        }


		/***********************
		**** METODOS UPDATE ****
		***********************/

		public static function update($id, $nombre_completo, $dni) {        
            $sql = 'UPDATE declaracion_responsable_abonos SET nombre_completo=:nombre_completo,dni=:dni WHERE id=:id';

            $query = db::singleton()->prepare($sql);

            $datos = array(
				':id'=>$id,
				':nombre_completo'=>$nombre_completo,
                ':dni'=>$dni
            );
    
            if (!$query->execute($datos)) {
                error_log(print_r( $query->errorInfo(),1));
                return false;
            }
            else {
                return self::findByid($id);
            }
        }


		/***********************
		**** METODOS DELETE ****
		***********************/

		public static function deleteAll() {
			$sql = 'DELETE FROM declaracion_responsable_abonos';

			$query = db::singleton()->prepare($sql);

			if (!$query) {
                error_log(print_r( $query->errorInfo(),1));
                return false;
            }

			$datos = array();

			if (!$x = $query->execute($datos)) {
                error_log(print_r( db::singleton()->errorInfo(),1 ));
                return false;
            }
			else {
                return true;
            }
		}


		public static function deleteBydni($dni) {
    		$sql = "DELETE FROM declaracion_responsable_abonos WHERE dni=:dni";

    		$query = db::singleton()->prepare($sql);

    		if (!$query) {
                error_log(print_r( $query->errorInfo(),1));
                return false;
            }

    		$datos = array(':dni'=>$dni);

    		if (!$x=$query->execute($datos)) {
                error_log(print_1( db::singleton()->errorInfo(), 1));
                return false;
            }
    		else {
                return true;
            }
    	}


		public static function deleteBynombre_completo($nombre_completo) {
    		$sql = "DELETE FROM declaracion_responsable_abonos WHERE nombre_completo=:nombre_completo";

    		$query = db::singleton()->prepare($sql);

    		if (!$query) {
                error_log(print_r( $query->errorInfo(),1));
                return false;
            }

    		$datos = array(':nombre_completo'=>$nombre_completo);

    		if (!$x = $query->execute($datos)) {
                error_log(print_1( db::singleton()->errorInfo(), 1));
                return false;
            }
    		else {
                return true;
            }
    	}
    }
?>