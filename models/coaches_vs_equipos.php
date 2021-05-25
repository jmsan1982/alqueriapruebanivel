<?php 
	/************************************************
	Code Generator: 		V2.0 (2020-03-26) 
	Autor: 					Pablo Muñoz Julve
	Fecha de la generación: 2020-04-22 11:02:20
	Base de datos: 			alqueria
	Clase de capa: 			models
	************************************************/

    class coaches_vs_equipos
    {
        /**********************
		****  METODOS FIND  ***
		***********************/
        public static function findAll()
        {   return db_2_utf8::singleton()->query('SELECT * FROM coaches_vs_equipos')->fetchAll();   }

        public static function findLast()
        {   return db_2_utf8::singleton()->query('SELECT * FROM coaches_vs_equipos ORDER BY id_coaches_vs_equipos desc limit 1')->fetch();    }

        public static function getCount()
        {   return db_2_utf8::singleton()->query('SELECT *,count(*) FROM coaches_vs_equipos GROUP BY id_coaches_vs_equipos')->fetch();    }
        
        public static function getAttributeList()
        {
            return db_2_utf8::singleton()->query(
            'SELECT
                COLUMN_NAME, DATA_TYPE
            FROM
                INFORMATION_SCHEMA.COLUMNS
            WHERE
                TABLE_SCHEMA="alqueria" and table_name="coaches_vs_equipos"')->fetchAll();
        }
        
    	public static function findByid_coaches_vs_equipos($id_coaches_vs_equipos)
		{   return db_2_utf8::singleton()->query('SELECT * FROM coaches_vs_equipos WHERE id_coaches_vs_equipos='.$id_coaches_vs_equipos)->fetch();}

		public static function findByid_coach($id_coach)
		{   return db_2_utf8::singleton()->query('SELECT * FROM coaches_vs_equipos WHERE id_coach='.$id_coach)->fetchAll();}

		public static function findByid_equipo($id_equipo)
		{   return db_2_utf8::singleton()->query('SELECT * FROM coaches_vs_equipos WHERE id_equipo='.$id_equipo)->fetchAll();}


		/***********************
		****  METODO INSERT  ***
		***********************/
		public static function insert()
        {        
            $sql='
            INSERT INTO coaches_vs_equipos()
			VALUES()';
   
            $query=db_2_utf8::singleton()->prepare($sql); 
            if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}
            $datos=array();
                
            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));return false;}
            else{return self::findLast();}
        }


		/**********************
		**** METODOS UPDATE ***
		***********************/
		public static function update($id_coaches_vs_equi)
        {        
            $sql='
            UPDATE	coaches_vs_equipos 
			SET 
					 
			WHERE
					id_coaches_vs_equipos=:id_coaches_vs_equipos';

            $query=db_2_utf8::singleton()->prepare($sql);
            
            $datos=array(
				':id_coaches_vs_equipos'=>$id_coaches_vs_equipos,
);
    
            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));return false;}
            else{return self::findByid_coaches_vs_equipos($id);}
        }

		public static function updateAttribute($id,$nombreAtributo,$valorAtributo,$ponerComillas="no")
        {
            if($ponerComillas==="no")
            {   
                if($valorAtributo==0 )
                {
                    $sentencia_sql="UPDATE coaches_vs_equipos SET ".$nombreAtributo."=0 WHERE id_coaches_vs_equipos=".$id;
                }
                else if($valorAtributo=="null" || is_null($valorAtributo) || empty($valorAtributo))
                {
                    $sentencia_sql="UPDATE coaches_vs_equipos SET ".$nombreAtributo."=null WHERE id_coaches_vs_equipos=".$id;
                }
                else
                {
                    $sentencia_sql="UPDATE coaches_vs_equipos SET ".$nombreAtributo."=".$valorAtributo." WHERE id_coaches_vs_equipos=".$id;
                }
            }
            else
            {   
                if($valorAtributo=="0" )
                {
                    $sentencia_sql="UPDATE coaches_vs_equipos SET ".$nombreAtributo."='".$valorAtributo."' WHERE id_coaches_vs_equipos=".$id;
                }
                else if($valorAtributo=="null" || is_null($valorAtributo) || empty($valorAtributo))
                {
                    $sentencia_sql="UPDATE coaches_vs_equipos SET ".$nombreAtributo."=null WHERE id_coaches_vs_equipos=".$id;
                }
                else{
                    $sentencia_sql="UPDATE coaches_vs_equipos SET ".$nombreAtributo."='".$valorAtributo."' WHERE id_coaches_vs_equipos=".$id;
                }
            }

            $query=db_2_utf8::singleton()->prepare($sentencia_sql);

            if(!$query){error_log(print_r( db_2_utf8::singleton()->errorInfo()),1);return false;}

            $datos=array("");

            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));return false;}
            else{return self::findByid_coaches_vs_equipos($id);}
        }


		/**********************
		**** METODOS DELETE ***
		***********************/
		public static function deleteAll()
		{
			$sql='DELETE FROM coaches_vs_equipos';

			$query=db_2_utf8::singleton()->prepare($sql);

			if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

			$datos=array();

			if(!$x=$query->execute($datos)){error_log(print_r( db_2_utf8::singleton()->errorInfo(),1 ));return false;}
			else{return true;}
		}

		public static function deleteByid_coaches_vs_equipos($id_coaches_vs_equipos)
    	{
    		$sql="DELETE FROM coaches_vs_equipos WHERE id_coaches_vs_equipos=:id_coaches_vs_equipos";

    		$query=db_2_utf8::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

    		$datos=array(':id_coaches_vs_equipos'=>$id_coaches_vs_equipos);

    		if(!$x=$query->execute($datos)){error_log(print_1( db_2_utf8::singleton()->errorInfo(), 1));return false;}
    		else{return true;}
    	}

		public static function deleteByid_coach($id_coach)
    	{
    		$sql="DELETE FROM coaches_vs_equipos WHERE id_coach=:id_coach";

    		$query=db_2_utf8::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

    		$datos=array(':id_coach'=>$id_coach);

    		if(!$x=$query->execute($datos)){error_log(print_r( db_2_utf8::singleton()->errorInfo(),1));return false;}
    		else{return true;}
    	}

		public static function deleteByid_equipo($id_equipo)
    	{
    		$sql="DELETE FROM coaches_vs_equipos WHERE id_equipo=:id_equipo";

    		$query=db_2_utf8::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

    		$datos=array(':id_equipo'=>$id_equipo);

    		if(!$x=$query->execute($datos)){error_log(print_r( db_2_utf8::singleton()->errorInfo(),1));return false;}
    		else{return true;}
    	}

   }
?>