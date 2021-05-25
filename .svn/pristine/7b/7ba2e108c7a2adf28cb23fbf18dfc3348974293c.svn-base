<?php 
	/************************************************
	Code Generator: 		V2.0 (2020-03-26) 
	Autor: 					Pablo Muñoz Julve
	Fecha de la generación: 2020-08-05 10:20:33
	Base de datos: 			alqueria
	Clase de capa: 			models
	************************************************/

    class ropa_productos_cantidades_equipos
    {
        /**********************
		****  METODOS FIND  ***
		***********************/
        public static function findAll()
        {   return db_2_utf8::singleton()->query('SELECT * FROM ropa_productos_cantidades_equipos')->fetchAll();   }

        public static function findLast()
        {   return db_2_utf8::singleton()->query('SELECT * FROM ropa_productos_cantidades_equipos ORDER BY ID desc limit 1')->fetch();    }

        public static function getCount()
        {   return db_2_utf8::singleton()->query('SELECT *,count(*) FROM ropa_productos_cantidades_equipos GROUP BY ID')->fetch();    }
        
        public static function getAttributeList()
        {
            return db_2_utf8::singleton()->query(
            'SELECT
                COLUMN_NAME, DATA_TYPE
            FROM
                INFORMATION_SCHEMA.COLUMNS
            WHERE
                TABLE_SCHEMA="alqueria" and table_name="ropa_productos_cantidades_equipos"')->fetchAll();
        }
        
    	public static function findByID($ID)
		{   return db_2_utf8::singleton()->query('SELECT * FROM ropa_productos_cantidades_equipos WHERE ID='.$ID)->fetch();}

		public static function findByIDEquipo($IDEquipo)
		{   return db_2_utf8::singleton()->query('SELECT * FROM ropa_productos_cantidades_equipos WHERE IDEquipo='.$IDEquipo)->fetchAll();}

		public static function findByTemporada($Temporada)
		{   return db_2_utf8::singleton()->query('SELECT * FROM ropa_productos_cantidades_equipos WHERE Temporada='.$Temporada)->fetchAll();}


		/***********************
		****  METODO INSERT  ***
		***********************/
		public static function insert($IDProducto, $IDEquipo, $Temporada, $Cantidad)
        {        
            $sql='
            INSERT INTO ropa_productos_cantidades_equipos(IDProducto, IDEquipo, Temporada, Cantidad)
			VALUES(:idproducto, :idequipo, :temporada, :cantidad)';
   
            $query=db_2_utf8::singleton()->prepare($sql); 
            if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}
            $datos=array(':idproducto'=>$IDProducto,':idequipo'=>$IDEquipo,':temporada'=>$Temporada,':cantidad'=>$Cantidad);
                
            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));return false;}
            else{return self::findLast();}
        }


		/**********************
		**** METODOS UPDATE ***
		***********************/
		public static function update($ID, $IDProducto, $IDEquipo, $Temporada, $Cantidad)
        {        
            $sql='
            UPDATE	ropa_productos_cantidades_equipos 
			SET 
					idproducto=:idproducto,idequipo=:idequipo,temporada=:temporada,cantidad=:cantidad 
			WHERE
					ID=:id';

            $query=db_2_utf8::singleton()->prepare($sql);
            
            $datos=array(
				':id'=>$ID,
				':idproducto'=>$IDProducto,':idequipo'=>$IDEquipo,':temporada'=>$Temporada,':cantidad'=>$Cantidad);
    
            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));return false;}
            else{return self::findByID($id);}
        }

		public static function updateAttribute($id,$nombreAtributo,$valorAtributo,$ponerComillas="no")
        {
            if($ponerComillas==="no")
            {   
                if($valorAtributo==0 )
                {
                    $sentencia_sql="UPDATE ropa_productos_cantidades_equipos SET ".$nombreAtributo."=0 WHERE ID=".$id;
                }
                else if($valorAtributo=="null" || is_null($valorAtributo) || empty($valorAtributo))
                {
                    $sentencia_sql="UPDATE ropa_productos_cantidades_equipos SET ".$nombreAtributo."=null WHERE ID=".$id;
                }
                else
                {
                    $sentencia_sql="UPDATE ropa_productos_cantidades_equipos SET ".$nombreAtributo."=".$valorAtributo." WHERE ID=".$id;
                }
            }
            else
            {   
                if($valorAtributo=="0" )
                {
                    $sentencia_sql="UPDATE ropa_productos_cantidades_equipos SET ".$nombreAtributo."='".$valorAtributo."' WHERE ID=".$id;
                }
                else if($valorAtributo=="null" || is_null($valorAtributo) || empty($valorAtributo))
                {
                    $sentencia_sql="UPDATE ropa_productos_cantidades_equipos SET ".$nombreAtributo."=null WHERE ID=".$id;
                }
                else{
                    $sentencia_sql="UPDATE ropa_productos_cantidades_equipos SET ".$nombreAtributo."='".$valorAtributo."' WHERE ID=".$id;
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
			$sql='DELETE FROM ropa_productos_cantidades_equipos';

			$query=db_2_utf8::singleton()->prepare($sql);

			if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

			$datos=array();

			if(!$x=$query->execute($datos)){error_log(print_r( db_2_utf8::singleton()->errorInfo(),1 ));return false;}
			else{return true;}
		}

		public static function deleteByID($ID)
    	{
    		$sql="DELETE FROM ropa_productos_cantidades_equipos WHERE ID=:id";

    		$query=db_2_utf8::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

    		$datos=array(':id'=>$ID);

    		if(!$x=$query->execute($datos)){error_log(print_1( db_2_utf8::singleton()->errorInfo(), 1));return false;}
    		else{return true;}
    	}

		public static function deleteByIDEquipo($IDEquipo)
    	{
    		$sql="DELETE FROM ropa_productos_cantidades_equipos WHERE IDEquipo=:idequipo";

    		$query=db_2_utf8::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

    		$datos=array(':idequipo'=>$IDEquipo);

    		if(!$x=$query->execute($datos)){error_log(print_r( db_2_utf8::singleton()->errorInfo(),1));return false;}
    		else{return true;}
    	}

		public static function deleteByTemporada($Temporada)
    	{
    		$sql="DELETE FROM ropa_productos_cantidades_equipos WHERE Temporada=:temporada";

    		$query=db_2_utf8::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

    		$datos=array(':temporada'=>$Temporada);

    		if(!$x=$query->execute($datos)){error_log(print_r( db_2_utf8::singleton()->errorInfo(),1));return false;}
    		else{return true;}
    	}

   }
?>