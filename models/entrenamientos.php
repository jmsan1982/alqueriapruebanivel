<?php
	class entrenamientos {


		
	   


		public static function findEquiposPorCoach($id) {
			//error_log("select id_equipo, convert(cast(convert(nombre_equipo_cas using latin1) as binary) using utf8) as nombre_equipo_cas, nombre_coach, id_coach from  equiposporentrenador  where  id_coach=".$id);
			

			/*$sql="select convert(cast(convert(c.nombre_coach using latin1) as binary) using utf8) as Entrenador, c.email_coach as Email, c.telefono_coach as Telefono, c.cargo_coach_cas as Cargo, c.id_coach, group_concat(convert(cast(convert(ep.nombre_equipo_cas using latin1) as binary) using utf8)) as Equipos, c.activo from coaches c left join equiposporentrenador ep on c.id_coach=ep.id_coach group by c.id_coach having c.activo=1 and id_coach=".$id;*/

			$sql="select id_equipo, nombre_equipo_nueva_temporada, nombre_coach, id_coach from  equiposporentrenador  where  id_coach=".$id;
			$query=db_2::singleton()->query($sql);

			if ($query)
	            return $query->fetchAll();
	        else
	        	error_log("error al devolver los datos del coach");
	            return false;
		}

		
		public static function findEntrenoPorEquipo($equipo) {
			
			$hoy = date("Y-m-d");
//error_log("select * from view_listado_horario2 where (equipo_local like '%".$equipo."%' or equipo_visit like '%".$equipo."%') and fecha>=".'"'.$hoy.'"'." order by fecha");
			$sql="select * from view_listado_horario2 where (equipo_local like '%".$equipo."%' or equipo_visit like '%".$equipo."%') and fecha>=".'"'.$hoy.'"'." order by fecha" ;
			$query=db_2::singleton()->query($sql);

			if ($query)
	            return $query->fetchAll();
	        else
	        	//error_log("error al devolver los datos del coach");
	            return false;
		}


		

	   

	}
?>