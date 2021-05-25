<?php
	class eventos_calendario{

		public static function findIdEventoCalendario($id){

			//return db::singleton()->query('select * from calendario_eventos where id_calendario_eventos='.$id)->fetch();
			return db_2::singleton()->query('select * from view_reserva_eventos where id_reserva_ev='.$id)->fetch();			
		}



		public static function findEventosCalendario(){

			return db_2::singleton()->query('select * from view_reserva_eventos order by fecha desc')->fetchAll();			
		}


		public static function findEventosCalendarioPorMes($mes,$ano)
                {
                    $sentencia_sql=''
                    . ' SELECT'
                    . '     * '
                    . ' FROM     '
                    . '     view_reserva_eventos '
                    . ' WHERE '
                    . '     (   MONTH(fecha) = '.$mes.' AND '
                    . '         YEAR(fecha)  = '.$ano.' )'
                    . '     OR '
                    . '     (   MONTH(fechahasta) = '.$mes.' AND '
                    . '         YEAR(fechahasta)  = '.$ano.' )'
                    . ' ORDER BY '
                    . '     fecha';
                    return db_2::singleton()->query($sentencia_sql)->fetchAll();			
		}




	    public static function findSiguientesNEventosCalendario($n){

	        return db_2::singleton()->query('select * from view_reserva_eventos WHERE fecha > NOW() order by fecha limit '.$n)->fetchAll();	        
	    }

	    


	    public static function findAllEventosFecha($fecha){
//error_log('select * from view_reserva_eventos where fecha <= "'.$fecha.'" and fechahasta >= "'.$fecha.'"');
	    	return db_2::singleton()->query('select * from view_reserva_eventos where fecha <= "'.$fecha.'" and fechahasta >= "'.$fecha.'"')->fetchAll();
	    }


	    //sacamos las pistas asignadas al cada evento
	    public static function findPistasDelEvento($idevento, $fecha){

			return db_2::singleton()->query('select * from horario_entrenamiento2 where id_evento="'.$idevento.'"  and  fecha = "'.$fecha.'"')->fetchAll();			
		}


		//sacamos las SALAS asignadas al  evento
	    public static function findSalasDelEvento($idevento, $fecha){

			return db_2::singleton()->query('select * from view_reserva_salas where idevento="'.$idevento.'"  and  fecha = "'.$fecha.'"')->fetchAll();			
		}


	}
?>