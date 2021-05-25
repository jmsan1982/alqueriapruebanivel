<?php 
	/************************************************
	Code Generator: 		V2.0 (2020-03-26) 
	Autor: 					Pablo Muñoz Julve
	Fecha de la generación: 2020-04-22 11:02:20
	Base de datos: 			alqueria
	Clase de capa: 			models
	************************************************/

    class horarios
    {
        /**********************
		****  METODOS FIND  ***
		***********************/
        public static function findAll()
        {   return db_2_utf8::singleton()->query('SELECT * FROM horarios')->fetchAll();   }

        public static function findLast()
        {   return db_2_utf8::singleton()->query('SELECT * FROM horarios ORDER BY id_horario desc limit 1')->fetch();    }

        public static function getCount()
        {   return db_2_utf8::singleton()->query('SELECT *,count(*) FROM horarios GROUP BY id_horario')->fetch();    }
        
        public static function getAttributeList()
        {
            return db_2_utf8::singleton()->query(
            'SELECT
                COLUMN_NAME, DATA_TYPE
            FROM
                INFORMATION_SCHEMA.COLUMNS
            WHERE
                TABLE_SCHEMA="alqueria" and table_name="horarios"')->fetchAll();
        }
        
    	public static function findByid_horario($id_horario)
		{   return db_2_utf8::singleton()->query('SELECT * FROM horarios WHERE id_horario='.$id_horario)->fetch();}

		public static function findBydia($dia)
		{   return db_2_utf8::singleton()->query('SELECT * FROM horarios WHERE dia='.$dia)->fetchAll();}

		public static function findByid_equipo($id_equipo)
		{   return db_2_utf8::singleton()->query('SELECT * FROM horarios WHERE id_equipo='.$id_equipo)->fetchAll();}


        //sacamos el horario del jugador
        public static function findByid_jugador($id_jugador)
        {
            $sentencia_sql='SELECT GROUP_CONCAT(concat_ws("-", dia,  date_format(hora_ini, "%H:%i"), date_format(hora_fin, "%H:%i"))) as horario FROM horarios h inner join jugadores j on j.idequipo_alqueria=h.id_equipo WHERE j.id_jugador='.$id_jugador;
            
            return db_2_utf8::singleton()->query($sentencia_sql)->fetch();
        }


		/***********************
		****  METODO INSERT  ***
		************************/
		public static function insert($dia, $hora_ini, $hora_fin, $id_equipo)
        {        
            $sql='
            INSERT INTO horarios(dia, hora_ini, hora_fin, id_equipo)
			VALUES(:dia, :hora_ini, :hora_fin, :id_equipo)';
   
            $query=db_2_utf8::singleton()->prepare($sql); 
            if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}
            $datos=array(':dia'=>$dia,':hora_ini'=>$hora_ini,':hora_fin'=>$hora_fin,':id_equipo'=>$id_equipo);
                
            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));return false;}
            else{return self::findLast();}
        }


		/**********************
		**** METODOS UPDATE ***
		***********************/
		public static function update($id_horario, $dia, $hora_ini, $hora_fin, $id_equipo)
        {        
            $sql='
            UPDATE	horarios 
			SET 
					dia=:dia,hora_ini=:hora_ini,hora_fin=:hora_fin,id_equipo=:id_equipo 
			WHERE
					id_horario=:id_horario';

            $query=db_2_utf8::singleton()->prepare($sql);
            
            $datos=array(
				':id_horario'=>$id_horario,
				':dia'=>$dia,':hora_ini'=>$hora_ini,':hora_fin'=>$hora_fin,':id_equipo'=>$id_equipo);
    
            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));return false;}
            else{return self::findByid_horario($id);}
        }

		public static function updateAttribute($id,$nombreAtributo,$valorAtributo,$ponerComillas="no")
        {
            if($ponerComillas==="no")
            {   
                if($valorAtributo==0 )
                {
                    $sentencia_sql="UPDATE horarios SET ".$nombreAtributo."=0 WHERE id_horario=".$id;
                }
                else if($valorAtributo=="null" || is_null($valorAtributo) || empty($valorAtributo))
                {
                    $sentencia_sql="UPDATE horarios SET ".$nombreAtributo."=null WHERE id_horario=".$id;
                }
                else
                {
                    $sentencia_sql="UPDATE horarios SET ".$nombreAtributo."=".$valorAtributo." WHERE id_horario=".$id;
                }
            }
            else
            {   
                if($valorAtributo=="0" )
                {
                    $sentencia_sql="UPDATE horarios SET ".$nombreAtributo."='".$valorAtributo."' WHERE id_horario=".$id;
                }
                else if($valorAtributo=="null" || is_null($valorAtributo) || empty($valorAtributo))
                {
                    $sentencia_sql="UPDATE horarios SET ".$nombreAtributo."=null WHERE id_horario=".$id;
                }
                else{
                    $sentencia_sql="UPDATE horarios SET ".$nombreAtributo."='".$valorAtributo."' WHERE id_horario=".$id;
                }
            }

            $query=db_2_utf8::singleton()->prepare($sentencia_sql);

            if(!$query){error_log(print_r( db_2_utf8::singleton()->errorInfo()),1);return false;}

            $datos=array("");

            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));return false;}
            else{return self::findByid_horario($id);}
        }


		/**********************
		**** METODOS DELETE ***
		***********************/
		public static function deleteAll()
		{
			$sql='DELETE FROM horarios';

			$query=db_2_utf8::singleton()->prepare($sql);

			if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

			$datos=array();

			if(!$x=$query->execute($datos)){error_log(print_r( db_2_utf8::singleton()->errorInfo(),1 ));return false;}
			else{return true;}
		}

		public static function deleteByid_horario($id_horario)
    	{
    		$sql="DELETE FROM horarios WHERE id_horario=:id_horario";

    		$query=db_2_utf8::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

    		$datos=array(':id_horario'=>$id_horario);

    		if(!$x=$query->execute($datos)){error_log(print_1( db_2_utf8::singleton()->errorInfo(), 1));return false;}
    		else{return true;}
    	}

		public static function deleteBydia($dia)
    	{
    		$sql="DELETE FROM horarios WHERE dia=:dia";

    		$query=db_2_utf8::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

    		$datos=array(':dia'=>$dia);

    		if(!$x=$query->execute($datos)){error_log(print_r( db_2_utf8::singleton()->errorInfo(),1));return false;}
    		else{return true;}
    	}

		public static function deleteByid_equipo($id_equipo)
    	{
    		$sql="DELETE FROM horarios WHERE id_equipo=:id_equipo";

    		$query=db_2_utf8::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

    		$datos=array(':id_equipo'=>$id_equipo);

    		if(!$x=$query->execute($datos)){error_log(print_r( db_2_utf8::singleton()->errorInfo(),1));return false;}
    		else{return true;}
    	}

   }
?>