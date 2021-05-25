<?php
	class campus_navidad {

		public static function dameDatosCampusNavidad($numero) {
			return db::singleton()->query('SELECT * FROM registros_campus_navidad WHERE numeropedido='.$numero)->fetch();
		}



		public static function dameDatosCampusNavidadVB($numero) {
			return dbvbasket2::singleton()->query('SELECT * FROM registros_campus_navidad WHERE numeropedido="'.$numero.'"')->fetch();
		}


		public static function actualizaPagadoCampusNavidad($codigo, $pagado) {
			$sql = "UPDATE registros_campus_navidad SET pagado=:pag WHERE numeropedido=:numero";
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


		// Cuando se paga desde oficinas por el back marcamos el pedido como pagado =1
		public static function ActualizaPagadoCampusNavidadBack($codigo, $pagado) {
			$sql = "UPDATE registros_campus_navidad SET pagado=:pag , tipopago=:tipopag WHERE id=:numero";

			$query = dbvbasket2::singleton()->prepare($sql);

			if (!$query) {
				return false;
			}

			$datos = array(':numero' => $codigo, ':pag' => $pagado, ':tipopag' => "OFICINA");

			if (!$query->execute($datos)) {
				return false;
			} 
			else {
				echo "<script text='javascript'> alert('El pago se grabó correctamente.');
				window.location.replace('?r=campus/BackCampusNavidad'); </script>";
				die;
			}
		}


		public static function comprobarRepetidos() {
			return db::singleton()->query('SELECT * FROM registros_campus_navidad')->fetchAll();
		}


		public static function findLastNumeroPedidoCampusNavidad() {
			return db::singleton()->query('SELECT MAX(numeropedido) FROM registros_campus_navidad')->fetch();
		}
	}
?>