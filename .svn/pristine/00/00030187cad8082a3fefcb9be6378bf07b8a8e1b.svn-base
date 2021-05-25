<?php
	class formularios_rellenados {

		/*************************
		* FORMULARIOS RELLENADOS *
		*************************/

		// Guardado de un Formulario Rellenado
		public static function newFormularioRellenado($titulo_formulario, $fecha_creacion) {
			$sql = 'INSERT INTO formularios_rellenados (titulo_formulario, fecha_creacion) VALUES (:titulo_formulario, :fecha_creacion)';

			$query = db_utf8::singleton() -> prepare($sql);

			if (!$query) {
				var_dump(db_utf8::singleton() -> errorInfo());
				die;
			}

			$datos = array(':titulo_formulario' => $titulo_formulario, ':fecha_creacion' => $fecha_creacion);

			if (!$query -> execute($datos)) {
				var_dump($query -> errorInfo());
				die;
			}
			else {
				// Devolvemos todos los datos del último formulario_rellenado desde su tabla
				return self::findLast();
			}
		}


		// Selección de todos los Formularios Rellenados
		public static function findFormulariosRellenados() {
			//return db::singleton()->query('SELECT * FROM formularios_rellenados ORDER BY id ASC')->fetchAll();
		}


		// Selección de todos los datos de una ID de registro de Jornadas Formación
		public static function dameDatosFormularioRellenado($id) {
			//return db::singleton()->query('SELECT * FROM formularios_rellenados WHERE id='.$id)->fetch();
		}


		public static function findLast() {
			$query = db_utf8::singleton()->query('SELECT * FROM formularios_rellenados ORDER BY id DESC LIMIT 1');
			if ($query) {
				return $query -> fetch();
			}
			else {
				return false;
			}
		}
	}
?>