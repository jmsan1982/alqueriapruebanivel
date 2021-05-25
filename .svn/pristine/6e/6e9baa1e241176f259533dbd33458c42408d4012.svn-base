
<meta charset="utf-8">
<?php
 require_once ("db_2.php");
class pantallarecepcion{

   
	public static function findAll(){

		$date = date('Y-m-d H:i:s');
//echo 'select fecha, hora_ini, hora_fin, pista, es_partido, vestuario_local, vestuario_visit, observ, CONVERT(CAST(CONVERT(equipo_visit USING latin1) AS BINARY) USING utf8) as equipo_visit, CONVERT(CAST(CONVERT(equipo_local USING latin1) AS BINARY) USING utf8) as equipo_local from view_listado_horario2 where equipo_local<>"" and hora_fin >= "'.$date.'" order by hora_ini';
		//$query = db::singleton()->query('select * from partidos where hora_fin >= "'.$date.'" order by hora_inicio');
		
		$query = db_2::singleton()->query('select * from view_listado_horario2 where equipo_local<>"" and hora_fin >= "'.$date.'" order by hora_ini');
		if($query) 
			return $query->fetchAll();
		else
			return false;
		
	}


	public static function findToday(){

		$datehour = date('H:i:s');
		$date = date('Y-m-d');
		$date1 = "00:00:00";
		$date2 = "23:59:59";
//echo 'select fecha, hora_ini, hora_fin, pista, es_partido, vestuario_local, vestuario_visit, observ, CONVERT(CAST(CONVERT(equipo_visit USING latin1) AS BINARY) USING utf8) as equipo_visit, CONVERT(CAST(CONVERT(equipo_local USING latin1) AS BINARY) USING utf8) as equipo_local from view_listado_horario2 where equipo_local<>"" and fecha BETWEEN "'.$date.'" AND "'.$date.'" AND hora_fin >= "'.$datehour.'" order by hora_ini';
		//$query = db::singleton()->query('select * from partidos where hora_inicio BETWEEN "'.$date1.'" AND "'.$date2.'" AND hora_fin >= "'.$datehour.'" order by hora_inicio');
		
		$query = db_2::singleton()->query('select * from view_listado_horario2 where equipo_local<>"" and equipo_local<>"1-PISTA LIBRE"  and fecha BETWEEN "'.$date.'" AND "'.$date.'" AND hora_fin >= "'.$datehour.'" order by hora_ini');

		if($query) 
			return $query->fetchAll();
		else
			return false;
		
	}


	public static function findFinalized(){

		$datehour = date('H:i:s');
		$date = date('Y-m-d');
		$date1 = "00:00:00";
		$date2 = "23:59:59";
		
		//$query = db::singleton()->query('select * from partidos where hora_inicio BETWEEN "'.$date1.'" AND "'.$date2.'" AND hora_fin <= "'.$datehour.'" order by hora_inicio');
		$query = db_2::singleton()->query('select * from view_listado_horario2 where equipo_local<>"" and fecha BETWEEN "'.$date.'" AND "'.$date.'" AND hora_fin <= "'.$datehour.'" order by hora_ini');
		if($query) 
			return $query->fetchAll();
		else
			return false;
		
	}


	public static function findFinalizedToFront(){

		$datehour = date('H:i:s');
		$date = date('Y-m-d');
		$date1 = $date."00:00:00";
		$date2 = $date."23:59:59";
		
		//$query = db::singleton()->query('select * from partidos where hora_inicio BETWEEN "'.$date1.'" AND "'.$date2.'" AND hora_fin <= "'.$datehour.'" order by hora_inicio AND puntuado="1"');
		$query = db_2::singleton()->query('select * from view_listado_horario2 where equipo_local<>"" and fecha BETWEEN "'.$date.'" AND "'.$date.'" AND hora_fin <= "'.$datehour.'" order by hora_ini AND puntuado="1"');
		if($query) 
			return $query->fetchAll();
		else
			return false;
		
	}


	

	



  



	


    
}
?>