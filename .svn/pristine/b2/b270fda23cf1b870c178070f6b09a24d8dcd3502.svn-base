<?php
	class formularios_rellenados_campos {

		/********************************
		* FORMULARIOS RELLENADOS CAMPOS *
		********************************/

		// Guardado de los Campos de un Formulario Rellenado
		public static function newFormularioRellenadoCampos($id_formulario_rellenado, $nombre_campo, $valor_campo) {
			$sql = 'INSERT INTO formularios_rellenados_campos (id_formulario_rellenado, nombre_campo, valor_campo) VALUES (:id_formulario_rellenado, :nombre_campo, :valor_campo)';

			$query = db_utf8::singleton() -> prepare($sql);

			if (!$query) {
				var_dump(db_utf8::singleton() -> errorInfo());
				die;
			}

			$datos = array(':id_formulario_rellenado' => $id_formulario_rellenado, ':nombre_campo' => $nombre_campo, ':valor_campo' => $valor_campo);

			if (!$query -> execute($datos)) {
				var_dump($query -> errorInfo());
				die;
			}
			else {
				return true;
			}
		}
	}
?>