<?php 
    /************************************************
    Model Generator: 		V1.2 (2020-01-28) 
    Autor: 					Pablo Muñoz Julve
    Fecha de la generación: 2020-01-28 17:05:50
    ************************************************/

    class sportsclub_horarios_2020
    {
        public static function findAll(){
            return db_utf8::singleton()->query('SELECT * FROM sportsclub_horarios_2020')->fetchAll();
        }

        public static function findLast(){
            return db_utf8::singleton()->query('SELECT * FROM sportsclub_horarios_2020 ORDER BY ID desc limit 1')->fetch();
        }

        public static function getCount(){
            return db_utf8::singleton()->query('SELECT *,count(*) FROM sportsclub_horarios_2020 GROUP BY ID')->fetch();
        }
        
    	public static function insert($IDSportClubInscripcion, $franja_1, $franja_1_lunes, $franja_1_miercoles, $franja_2, 
		$franja_2_martes, $franja_2_jueves, $franja_3, $franja_3_lunes, $franja_3_miercoles, 
		$franja_4, $franja_4_martes, $franja_4_jueves, $franja_5, $franja_5_martes, 
		$franja_5_jueves)
        {        
            $sql='INSERT INTO sportsclub_horarios_2020(IDSportClubInscripcion, franja_1, franja_1_lunes, franja_1_miercoles, franja_2, 
		franja_2_martes, franja_2_jueves, franja_3, franja_3_lunes, franja_3_miercoles, 
		franja_4, franja_4_martes, franja_4_jueves, franja_5, franja_5_martes, 
		franja_5_jueves)
		VALUES(:idsportclubinscripcion, :franja_1, :franja_1_lunes, :franja_1_miercoles, :franja_2, 
		:franja_2_martes, :franja_2_jueves, :franja_3, :franja_3_lunes, :franja_3_miercoles, 
		:franja_4, :franja_4_martes, :franja_4_jueves, :franja_5, :franja_5_martes, 
		:franja_5_jueves)';

        
            $query=db_utf8::singleton()->prepare($sql); 
            if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}
            $datos=array(':idsportclubinscripcion'=>$IDSportClubInscripcion,':franja_1'=>$franja_1,':franja_1_lunes'=>$franja_1_lunes,':franja_1_miercoles'=>$franja_1_miercoles,':franja_2'=>$franja_2,
		':franja_2_martes'=>$franja_2_martes,':franja_2_jueves'=>$franja_2_jueves,':franja_3'=>$franja_3,':franja_3_lunes'=>$franja_3_lunes,':franja_3_miercoles'=>$franja_3_miercoles,
		':franja_4'=>$franja_4,':franja_4_martes'=>$franja_4_martes,':franja_4_jueves'=>$franja_4_jueves,':franja_5'=>$franja_5,':franja_5_martes'=>$franja_5_martes,
		':franja_5_jueves'=>$franja_5_jueves);
                
            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));return false;}
            else{return self::findLast();}
            
        }

        /**********************
        **** METODOS FIND ***
        ***********************/
        public static function findByID($ID)
        {
            return db_utf8::singleton()->query('SELECT * FROM sportsclub_horarios_2020 WHERE ID='.$ID)->fetch();
        }

        public static function findByIDSportClubInscripcion($IDSportClubInscripcion)
        {
            return db_utf8::singleton()->query('SELECT * FROM sportsclub_horarios_2020 WHERE IDSportClubInscripcion='.$IDSportClubInscripcion)->fetch();
        }

        /**********************
        **** METODOS UPDATE ***
        ***********************/
        public static function update($ID, $IDSportClubInscripcion, $franja_1, $franja_1_lunes, $franja_1_miercoles, 
		$franja_2, $franja_2_martes, $franja_2_jueves, $franja_3, $franja_3_lunes, 
		$franja_3_miercoles, $franja_4, $franja_4_martes, $franja_4_jueves, $franja_5, 
		$franja_5_martes, $franja_5_jueves)
        {        
            $sql='UPDATE sportsclub_horarios_2020 
		SET 
		id=:id,idsportclubinscripcion=:idsportclubinscripcion,franja_1=:franja_1,franja_1_lunes=:franja_1_lunes,franja_1_miercoles=:franja_1_miercoles,
		franja_2=:franja_2,franja_2_martes=:franja_2_martes,franja_2_jueves=:franja_2_jueves,franja_3=:franja_3,franja_3_lunes=:franja_3_lunes,
		franja_3_miercoles=:franja_3_miercoles,franja_4=:franja_4,franja_4_martes=:franja_4_martes,franja_4_jueves=:franja_4_jueves,franja_5=:franja_5,
		franja_5_martes=:franja_5_martes,franja_5_jueves=:franja_5_jueves 
		WHERE
		ID=:id';

            $query=db_utf8::singleton()->prepare($sql);
            
            $datos=array(':id'=>$ID,':idsportclubinscripcion'=>$IDSportClubInscripcion,':franja_1'=>$franja_1,':franja_1_lunes'=>$franja_1_lunes,':franja_1_miercoles'=>$franja_1_miercoles,
		':franja_2'=>$franja_2,':franja_2_martes'=>$franja_2_martes,':franja_2_jueves'=>$franja_2_jueves,':franja_3'=>$franja_3,':franja_3_lunes'=>$franja_3_lunes,
		':franja_3_miercoles'=>$franja_3_miercoles,':franja_4'=>$franja_4,':franja_4_martes'=>$franja_4_martes,':franja_4_jueves'=>$franja_4_jueves,':franja_5'=>$franja_5,
		':franja_5_martes'=>$franja_5_martes,':franja_5_jueves'=>$franja_5_jueves);
    
            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));return false;}
            else{return self::findByID($id);}
        }

		public static function updateAttribute($id,$nombreAtributo,$valorAtributo,$ponerComillas="no")
        {
            if($ponerComillas==="no")
            {   
                if($valorAtributo==0 )
                {
                    $sentencia_sql="UPDATE sportsclub_horarios_2020 SET ".$nombreAtributo."=0 WHERE ID=".$id;
                }
                else if($valorAtributo=="null" || is_null($valorAtributo) || empty($valorAtributo))
                {
                    $sentencia_sql="UPDATE sportsclub_horarios_2020 SET ".$nombreAtributo."=null WHERE ID=".$id;
                }
                else
                {
                    $sentencia_sql="UPDATE sportsclub_horarios_2020 SET ".$nombreAtributo."=".$valorAtributo." WHERE ID=".$id;
                }
            }
            else
            {   
                if($valorAtributo=="0" )
                {
                    $sentencia_sql="UPDATE sportsclub_horarios_2020 SET ".$nombreAtributo."='".$valorAtributo."' WHERE ID=".$id;
                }
                else if($valorAtributo=="null" || is_null($valorAtributo) || empty($valorAtributo))
                {
                    $sentencia_sql="UPDATE sportsclub_horarios_2020 SET ".$nombreAtributo."=null WHERE ID=".$id;
                }
                else{
                    $sentencia_sql="UPDATE sportsclub_horarios_2020 SET ".$nombreAtributo."='".$valorAtributo."' WHERE ID=".$id;
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
            $sql='DELETE FROM sportsclub_horarios_2020';

            $query=db_utf8::singleton()->prepare($sql);

            if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

            $datos=array();

            if(!$x=$query->execute($datos)){error_log(var_dump( db_utf8::singleton()->errorInfo()));return false;}

        }

        public static function deleteByID($ID)
        {
            $sql="DELETE FROM sportsclub_horarios_2020 where ID=:id";

            $query=db_utf8::singleton()->prepare($sql);

            if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

            $datos=array(':id'=>$ID);

            if(!$x=$query->execute($datos)){error_log(var_dump( db_utf8::singleton()->errorInfo()));return false;}
        }

        public static function deleteByIDSportClubInscripcion($IDSportClubInscripcion)
    	{
    		$sql="DELETE FROM sportsclub_horarios_2020 where IDSportClubInscripcion=:idsportclubinscripcion";

    		$query=db_utf8::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

    		$datos=array(':idsportclubinscripcion'=>$IDSportClubInscripcion);

    		if(!$x=$query->execute($datos)){error_log(var_dump( db_utf8::singleton()->errorInfo()));return false;}
    	}

   }
?>