<?php 
	/************************************************
	Code Generator: 		V2.0 (2020-03-26) 
	Autor: 					Pablo Muñoz Julve
	Fecha de la generación: 2020-08-05 10:20:33
	Base de datos: 			alqueria
	Clase de capa: 			models
	************************************************/

    class ropa_entregas
    {
        /**********************
		****  METODOS FIND  ***
		***********************/
        public static function findAll()
        {   return db_2_utf8::singleton()->query('SELECT * FROM ropa_entregas')->fetchAll();   }

        public static function findLast()
        {   return db_2_utf8::singleton()->query('SELECT * FROM ropa_entregas ORDER BY ID desc limit 1')->fetch();    }

        public static function getCount()
        {   return db_2_utf8::singleton()->query('SELECT *,count(*) FROM ropa_entregas GROUP BY ID')->fetch();    }
        
        public static function getAttributeList()
        {
            return db_2_utf8::singleton()->query(
            'SELECT
                COLUMN_NAME, DATA_TYPE
            FROM
                INFORMATION_SCHEMA.COLUMNS
            WHERE
                TABLE_SCHEMA="alqueria" and table_name="ropa_entregas"')->fetchAll();
        }
        
    	public static function findByID($ID)
		{   return db_2_utf8::singleton()->query('SELECT * FROM ropa_entregas WHERE ID='.$ID)->fetch();}

		public static function findByIDJugador($IDJugador)
		{   return db_2_utf8::singleton()->query('SELECT * FROM ropa_entregas WHERE IDJugador='.$IDJugador)->fetchAll();}

		public static function findByFecha($Fecha)
		{   return db_2_utf8::singleton()->query('SELECT * FROM ropa_entregas WHERE Fecha='.$Fecha)->fetchAll();}

		public static function findByEntregada($Entregada)
		{   return db_2_utf8::singleton()->query('SELECT * FROM ropa_entregas WHERE Entregada='.$Entregada)->fetchAll();}

        public static function findIDByIDJugador($IDJugador)
        {   return db_2_utf8::singleton()->query('SELECT max(ID) FROM ropa_entregas WHERE IDJugador='.$IDJugador)->fetch();}


		/***********************
		****  METODO INSERT  ***
		***********************/
		public static function insert($IDJugador, $Fecha, $Entregada, $Firma, $Observaciones)
        {        
            $sql='
            INSERT INTO ropa_entregas(IDJugador, Fecha, Entregada, Firma, Observaciones)
			VALUES(:idjugador, :fecha, :entregada, :firma, :observaciones)';
   
            $query=db_2_utf8::singleton()->prepare($sql); 
            if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}
            $datos=array(':idjugador'=>$IDJugador,':fecha'=>$Fecha,':entregada'=>$Entregada,':firma'=>$Firma,':observaciones'=>$Observaciones);
                
            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));return false;}
            else{return self::findLast();}
        }


		/**********************
		**** METODOS UPDATE ***
		***********************/
		public static function update($ID, $IDJugador, $Fecha, $Entregada, $Firma, $Observaciones)
        {        
            $sql='
            UPDATE	ropa_entregas 
			SET 
					idjugador=:idjugador,fecha=:fecha,entregada=:entregada,firma=:firma,observaciones=:observaciones 
			WHERE
					ID=:id';

            $query=db_2_utf8::singleton()->prepare($sql);
            
            $datos=array(
				':id'=>$ID,
				':idjugador'=>$IDJugador,':fecha'=>$Fecha,':entregada'=>$Entregada,':firma'=>$Firma,':observaciones'=>$Observaciones);
    
            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));return false;}
            else{return self::findByID($id);}
        }

		public static function updateAttribute($id,$nombreAtributo,$valorAtributo,$ponerComillas="no")
        {
            if($ponerComillas==="no")
            {   
                if($valorAtributo==0 )
                {
                    $sentencia_sql="UPDATE ropa_entregas SET ".$nombreAtributo."=0 WHERE ID=".$id;
                }
                else if($valorAtributo=="null" || is_null($valorAtributo) || empty($valorAtributo))
                {
                    $sentencia_sql="UPDATE ropa_entregas SET ".$nombreAtributo."=null WHERE ID=".$id;
                }
                else
                {
                    $sentencia_sql="UPDATE ropa_entregas SET ".$nombreAtributo."=".$valorAtributo." WHERE ID=".$id;
                }
            }
            else
            {   
                if($valorAtributo=="0" )
                {
                    $sentencia_sql="UPDATE ropa_entregas SET ".$nombreAtributo."='".$valorAtributo."' WHERE ID=".$id;
                }
                else if($valorAtributo=="null" || is_null($valorAtributo) || empty($valorAtributo))
                {
                    $sentencia_sql="UPDATE ropa_entregas SET ".$nombreAtributo."=null WHERE ID=".$id;
                }
                else{
                    $sentencia_sql="UPDATE ropa_entregas SET ".$nombreAtributo."='".$valorAtributo."' WHERE ID=".$id;
                }
            }

            $query=db_2_utf8::singleton()->prepare($sentencia_sql);

            if(!$query){error_log(print_r( db_2_utf8::singleton()->errorInfo()),1);return false;}

            $datos=array("");

            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));return false;}
            else{return self::findByID($id);}
        }


		/**********************
		**** METODOS DELETE ***
		***********************/
		public static function deleteAll()
		{
			$sql='DELETE FROM ropa_entregas';

			$query=db_2_utf8::singleton()->prepare($sql);

			if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

			$datos=array();

			if(!$x=$query->execute($datos)){error_log(print_r( db_2_utf8::singleton()->errorInfo(),1 ));return false;}
			else{return true;}
		}

		public static function deleteByID($ID)
    	{
    		$sql="DELETE FROM ropa_entregas WHERE ID=:id";

    		$query=db_2_utf8::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

    		$datos=array(':id'=>$ID);

    		if(!$x=$query->execute($datos)){error_log(print_1( db_2_utf8::singleton()->errorInfo(), 1));return false;}
    		else{return true;}
    	}

		public static function deleteByIDJugador($IDJugador)
    	{
    		$sql="DELETE FROM ropa_entregas WHERE IDJugador=:idjugador";

    		$query=db_2_utf8::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

    		$datos=array(':idjugador'=>$IDJugador);

    		if(!$x=$query->execute($datos)){error_log(print_r( db_2_utf8::singleton()->errorInfo(),1));return false;}
    		else{return true;}
    	}

		public static function deleteByFecha($Fecha)
    	{
    		$sql="DELETE FROM ropa_entregas WHERE Fecha=:fecha";

    		$query=db_2_utf8::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

    		$datos=array(':fecha'=>$Fecha);

    		if(!$x=$query->execute($datos)){error_log(print_r( db_2_utf8::singleton()->errorInfo(),1));return false;}
    		else{return true;}
    	}

		public static function deleteByEntregada($Entregada)
    	{
    		$sql="DELETE FROM ropa_entregas WHERE Entregada=:entregada";

    		$query=db_2_utf8::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

    		$datos=array(':entregada'=>$Entregada);

    		if(!$x=$query->execute($datos)){error_log(print_r( db_2_utf8::singleton()->errorInfo(),1));return false;}
    		else{return true;}
    	}

   }
?>