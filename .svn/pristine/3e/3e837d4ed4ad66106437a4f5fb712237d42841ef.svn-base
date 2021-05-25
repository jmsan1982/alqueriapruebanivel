<?php 
    /************************************************
    Model Generator: 		V1.2 (2020-01-28) 
    Autor: 					Pablo Muñoz Julve
    Fecha de la generación: 2020-01-28 17:05:50
    ************************************************/

    class sportsclub_cuestionarios
    {
        public static function findAll(){
            return db_utf8::singleton()->query('SELECT * FROM sportsclub_cuestionarios')->fetchAll();
        }

        public static function findLast(){
            return db_utf8::singleton()->query('SELECT * FROM sportsclub_cuestionarios ORDER BY ID desc limit 1')->fetch();
        }

        public static function getCount(){
            return db_utf8::singleton()->query('SELECT *,count(*) FROM sportsclub_cuestionarios GROUP BY ID')->fetch();
        }
        
    	public static function insert($IDSportClubInscripcion, $profesion, $aficiones_deportivas, $objetivo_entrenamiento, $impresion_diagnostica, 
		$pauta_recuperacion, $trabajo_intenso, $trabajo_intenso_dias, $trabajo_intenso_tiempo, $trabajo_moderado, 
		$trabajo_moderado_tiempo, $despl_bici, $despl_camina, $despl_tiempo, $tlibre_minutos, 
		$tlbre_dias, $tlibre_tiempo, $tlibre_aceleracion, $tlibre_dias_moderado, $tlibre_timpo_moderado, 
		$sedentario_horas)
        {        
            $sql='INSERT INTO sportsclub_cuestionarios(IDSportClubInscripcion, profesion, aficiones_deportivas, objetivo_entrenamiento, impresion_diagnostica, 
                pauta_recuperacion, trabajo_intenso, trabajo_intenso_dias, trabajo_intenso_tiempo, trabajo_moderado, 
                trabajo_moderado_tiempo, despl_bici, despl_camina, despl_tiempo, tlibre_minutos, 
                tlbre_dias, tlibre_tiempo, tlibre_aceleracion, tlibre_dias_moderado, tlibre_timpo_moderado, 
                sedentario_horas)
                VALUES(:idsportclubinscripcion, :profesion, :aficiones_deportivas, :objetivo_entrenamiento, :impresion_diagnostica, 
                :pauta_recuperacion, :trabajo_intenso, :trabajo_intenso_dias, :trabajo_intenso_tiempo, :trabajo_moderado, 
                :trabajo_moderado_tiempo, :despl_bici, :despl_camina, :despl_tiempo, :tlibre_minutos, 
                :tlbre_dias, :tlibre_tiempo, :tlibre_aceleracion, :tlibre_dias_moderado, :tlibre_timpo_moderado, 
                :sedentario_horas)';

        
            $query=db_utf8::singleton()->prepare($sql); 
            if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}
            $datos=array(':idsportclubinscripcion'=>$IDSportClubInscripcion,':profesion'=>$profesion,':aficiones_deportivas'=>$aficiones_deportivas,':objetivo_entrenamiento'=>$objetivo_entrenamiento,':impresion_diagnostica'=>$impresion_diagnostica,
            ':pauta_recuperacion'=>$pauta_recuperacion,':trabajo_intenso'=>$trabajo_intenso,':trabajo_intenso_dias'=>$trabajo_intenso_dias,':trabajo_intenso_tiempo'=>$trabajo_intenso_tiempo,':trabajo_moderado'=>$trabajo_moderado,
            ':trabajo_moderado_tiempo'=>$trabajo_moderado_tiempo,':despl_bici'=>$despl_bici,':despl_camina'=>$despl_camina,':despl_tiempo'=>$despl_tiempo,':tlibre_minutos'=>$tlibre_minutos,
            ':tlbre_dias'=>$tlbre_dias,':tlibre_tiempo'=>$tlibre_tiempo,':tlibre_aceleracion'=>$tlibre_aceleracion,':tlibre_dias_moderado'=>$tlibre_dias_moderado,':tlibre_timpo_moderado'=>$tlibre_timpo_moderado,
            ':sedentario_horas'=>$sedentario_horas);
                
            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));return false;}
            else{return self::findLast();}
            
        }

	/**********************
	**** METODOS FIND ***
	***********************/
	public static function findByID($ID)
	{
		return db_utf8::singleton()->query('SELECT * FROM sportsclub_cuestionarios WHERE ID='.$ID)->fetch();
	}

	public static function findByIDSportClubInscripcion($IDSportClubInscripcion)
	{
		return db_utf8::singleton()->query('SELECT * FROM sportsclub_cuestionarios WHERE IDSportClubInscripcion='.$IDSportClubInscripcion)->fetch();
	}

	/**********************
	**** METODOS UPDATE ***
	***********************/
public static function update($ID, $IDSportClubInscripcion, $profesion, $aficiones_deportivas, $objetivo_entrenamiento, 
		$impresion_diagnostica, $pauta_recuperacion, $trabajo_intenso, $trabajo_intenso_dias, $trabajo_intenso_tiempo, 
		$trabajo_moderado, $trabajo_moderado_tiempo, $despl_bici, $despl_camina, $despl_tiempo, 
		$tlibre_minutos, $tlbre_dias, $tlibre_tiempo, $tlibre_aceleracion, $tlibre_dias_moderado, 
		$tlibre_timpo_moderado, $sedentario_horas)
        {        
            $sql='UPDATE sportsclub_cuestionarios 
		SET 
		id=:id,idsportclubinscripcion=:idsportclubinscripcion,profesion=:profesion,aficiones_deportivas=:aficiones_deportivas,objetivo_entrenamiento=:objetivo_entrenamiento,
		impresion_diagnostica=:impresion_diagnostica,pauta_recuperacion=:pauta_recuperacion,trabajo_intenso=:trabajo_intenso,trabajo_intenso_dias=:trabajo_intenso_dias,trabajo_intenso_tiempo=:trabajo_intenso_tiempo,
		trabajo_moderado=:trabajo_moderado,trabajo_moderado_tiempo=:trabajo_moderado_tiempo,despl_bici=:despl_bici,despl_camina=:despl_camina,despl_tiempo=:despl_tiempo,
		tlibre_minutos=:tlibre_minutos,tlbre_dias=:tlbre_dias,tlibre_tiempo=:tlibre_tiempo,tlibre_aceleracion=:tlibre_aceleracion,tlibre_dias_moderado=:tlibre_dias_moderado,
		tlibre_timpo_moderado=:tlibre_timpo_moderado,sedentario_horas=:sedentario_horas 
		WHERE
		ID=:id';

            $query=db_utf8::singleton()->prepare($sql);
            
            $datos=array(':id'=>$ID,':idsportclubinscripcion'=>$IDSportClubInscripcion,':profesion'=>$profesion,':aficiones_deportivas'=>$aficiones_deportivas,':objetivo_entrenamiento'=>$objetivo_entrenamiento,
		':impresion_diagnostica'=>$impresion_diagnostica,':pauta_recuperacion'=>$pauta_recuperacion,':trabajo_intenso'=>$trabajo_intenso,':trabajo_intenso_dias'=>$trabajo_intenso_dias,':trabajo_intenso_tiempo'=>$trabajo_intenso_tiempo,
		':trabajo_moderado'=>$trabajo_moderado,':trabajo_moderado_tiempo'=>$trabajo_moderado_tiempo,':despl_bici'=>$despl_bici,':despl_camina'=>$despl_camina,':despl_tiempo'=>$despl_tiempo,
		':tlibre_minutos'=>$tlibre_minutos,':tlbre_dias'=>$tlbre_dias,':tlibre_tiempo'=>$tlibre_tiempo,':tlibre_aceleracion'=>$tlibre_aceleracion,':tlibre_dias_moderado'=>$tlibre_dias_moderado,
		':tlibre_timpo_moderado'=>$tlibre_timpo_moderado,':sedentario_horas'=>$sedentario_horas);
    
            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));return false;}
            else{return self::findByID($id);}
        }

		public static function updateAttribute($id,$nombreAtributo,$valorAtributo,$ponerComillas="no")
        {
            if($ponerComillas==="no")
            {   
                if($valorAtributo==0 )
                {
                    $sentencia_sql="UPDATE sportsclub_cuestionarios SET ".$nombreAtributo."=0 WHERE ID=".$id;
                }
                else if($valorAtributo=="null" || is_null($valorAtributo) || empty($valorAtributo))
                {
                    $sentencia_sql="UPDATE sportsclub_cuestionarios SET ".$nombreAtributo."=null WHERE ID=".$id;
                }
                else
                {
                    $sentencia_sql="UPDATE sportsclub_cuestionarios SET ".$nombreAtributo."=".$valorAtributo." WHERE ID=".$id;
                }
            }
            else
            {   
                if($valorAtributo=="0" )
                {
                    $sentencia_sql="UPDATE sportsclub_cuestionarios SET ".$nombreAtributo."='".$valorAtributo."' WHERE ID=".$id;
                }
                else if($valorAtributo=="null" || is_null($valorAtributo) || empty($valorAtributo))
                {
                    $sentencia_sql="UPDATE sportsclub_cuestionarios SET ".$nombreAtributo."=null WHERE ID=".$id;
                }
                else{
                    $sentencia_sql="UPDATE sportsclub_cuestionarios SET ".$nombreAtributo."='".$valorAtributo."' WHERE ID=".$id;
                }
            }

            $query=db_utf8::singleton()->prepare($sentencia_sql);

            if(!$query){error_log(print_r( db_utf8::singleton()->errorInfo()),1);return false;}

            $datos=array("");

            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));return false;}
            else{return self::findByID($id);}
        }


	/**********************
	**** METODOS DELETE ***
	***********************/
	public static function deleteAll()
	{
		$sql='DELETE FROM sportsclub_cuestionarios';

		$query=db_utf8::singleton()->prepare($sql);

		if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

		$datos=array();

		if(!$x=$query->execute($datos)){error_log(var_dump( db_utf8::singleton()->errorInfo()));return false;}
	
	}

	public static function deleteByID($ID)
    	{
    		$sql="DELETE FROM sportsclub_cuestionarios where ID=:id";

    		$query=db_utf8::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

    		$datos=array(':id'=>$ID);

    		if(!$x=$query->execute($datos)){error_log(var_dump( db_utf8::singleton()->errorInfo()));return false;}
    	}

	public static function deleteByIDSportClubInscripcion($IDSportClubInscripcion)
    	{
    		$sql="DELETE FROM sportsclub_cuestionarios where IDSportClubInscripcion=:idsportclubinscripcion";

    		$query=db_utf8::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

    		$datos=array(':idsportclubinscripcion'=>$IDSportClubInscripcion);

    		if(!$x=$query->execute($datos)){error_log(var_dump( db_utf8::singleton()->errorInfo()));return false;}
    	}

   }
?>