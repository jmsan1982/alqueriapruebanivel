<?php 
	/************************************************
	Code Generator: 		V2.0 (2020-03-26) 
	Autor: 					Pablo Muñoz Julve
	Fecha de la generación: 2020-07-29 17:57:15
	Base de datos: 			alqueria
	Clase de capa: 			models
	************************************************/

    class jugadores_tallas
    {
        /**********************
		****  METODOS FIND  ***
		***********************/
        public static function findAll()
        {   return db_2_utf8::singleton()->query('SELECT * FROM jugadores_tallas')->fetchAll();   }

        public static function findLast()
        {   return db_2_utf8::singleton()->query('SELECT * FROM jugadores_tallas ORDER BY ID desc limit 1')->fetch();    }

        public static function getCount()
        {   return db_2_utf8::singleton()->query('SELECT *,count(*) FROM jugadores_tallas GROUP BY ID')->fetch();    }
        
        public static function getAttributeList()
        {
            return db_2_utf8::singleton()->query(
            'SELECT
                COLUMN_NAME, DATA_TYPE
            FROM
                INFORMATION_SCHEMA.COLUMNS
            WHERE
                TABLE_SCHEMA="alqueria" and table_name="jugadores_tallas"')->fetchAll();
        }
        
    	public static function findByID($ID)
		{   return db_2_utf8::singleton()->query('SELECT * FROM jugadores_tallas WHERE ID='.$ID)->fetch();}

		public static function findByIDJugadoresYTemporada($IDJugadores,$Temporada)
		{   
            $sentencia_sql=' SELECT      jugadores_tallas.*,'
            . '             ropa_productos.Nombre as ropa_productos_nombre '
            . ' FROM        jugadores_tallas '
            . ' INNER JOIN  ropa_productos ON ropa_productos.ID = jugadores_tallas.IDRopaProductos '
            . ' WHERE       IDJugadores='.$IDJugadores.' AND Temporada="'.$Temporada.'"'
            . ' ORDER BY    ropa_productos.ID ASC';
            
            //error_log(__FILE__.__LINE__);
            //error_log($sentencia_sql);
            
            return db_2_utf8::singleton()->query($sentencia_sql)->fetchAll();
        }

		public static function findByIDRopaProductos($IDRopaProductos)
		{   return db_2_utf8::singleton()->query('SELECT * FROM jugadores_tallas WHERE IDRopaProductos='.$IDRopaProductos)->fetchAll();}

       public static function findByIDJugadoresYTemporadaYIDRopaProductos($IDJugadores,$Temporada,$IDRopaProductos)
		{   
            $sentencia_sql=' SELECT      jugadores_tallas.*,'
            . '             ropa_productos.Nombre as ropa_productos_nombre '
            . ' FROM        jugadores_tallas '
            . ' INNER JOIN  ropa_productos ON ropa_productos.ID = jugadores_tallas.IDRopaProductos '
            . ' WHERE       IDJugadores='.$IDJugadores.' AND Temporada="'.$Temporada.'" '
            . '         AND IDRopaProductos='.$IDRopaProductos;
            
            //error_log(__FILE__.__LINE__);
            //error_log($sentencia_sql);
            
            return db_2_utf8::singleton()->query($sentencia_sql)->fetch();
        }
        
		public static function findByTemporada($Temporada)
		{   return db_2_utf8::singleton()->query('SELECT * FROM jugadores_tallas WHERE Temporada="'.$Temporada.'"')->fetchAll();}


		/***********************
		****  METODO INSERT  ***
		***********************/
		public static function insert($IDJugadores, $IDRopaProductos, $Talla, $Temporada)
        {        
            $sql='
            INSERT INTO jugadores_tallas(IDJugadores, IDRopaProductos, Talla, Temporada)
			VALUES(:idjugadores, :idropaproductos, :talla, :temporada)';
   
            $query=db_2_utf8::singleton()->prepare($sql); 
            if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}
            $datos=array(':idjugadores'=>$IDJugadores,':idropaproductos'=>$IDRopaProductos,':talla'=>$Talla,':temporada'=>$Temporada);
                
            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));return false;}
            else{return self::findLast();}
        }


		/**********************
		**** METODOS UPDATE ***
		***********************/
		public static function update($ID, $IDJugadores, $IDRopaProductos, $Talla, $Temporada)
        {        
            $sql='
            UPDATE	jugadores_tallas 
			SET 
					idjugadores=:idjugadores,idropaproductos=:idropaproductos,talla=:talla,temporada=:temporada 
			WHERE
					ID=:id';

            $query=db_2_utf8::singleton()->prepare($sql);
            
            $datos=array(
				':id'=>$ID,
				':idjugadores'=>$IDJugadores,':idropaproductos'=>$IDRopaProductos,':talla'=>$Talla,':temporada'=>$Temporada);
    
            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));return false;}
            else{return self::findByID($id);}
        }

		public static function updateAttribute($id,$nombreAtributo,$valorAtributo,$ponerComillas="no")
        {
            if($ponerComillas==="no")
            {   
                if($valorAtributo==0 )
                {
                    $sentencia_sql="UPDATE jugadores_tallas SET ".$nombreAtributo."=0 WHERE ID=".$id;
                }
                else if($valorAtributo=="null" || is_null($valorAtributo) || empty($valorAtributo))
                {
                    $sentencia_sql="UPDATE jugadores_tallas SET ".$nombreAtributo."=null WHERE ID=".$id;
                }
                else
                {
                    $sentencia_sql="UPDATE jugadores_tallas SET ".$nombreAtributo."=".$valorAtributo." WHERE ID=".$id;
                }
            }
            else
            {   
                if($valorAtributo=="0" )
                {
                    $sentencia_sql="UPDATE jugadores_tallas SET ".$nombreAtributo."='".$valorAtributo."' WHERE ID=".$id;
                }
                else if($valorAtributo=="null" || is_null($valorAtributo) || empty($valorAtributo))
                {
                    $sentencia_sql="UPDATE jugadores_tallas SET ".$nombreAtributo."=null WHERE ID=".$id;
                }
                else{
                    $sentencia_sql="UPDATE jugadores_tallas SET ".$nombreAtributo."='".$valorAtributo."' WHERE ID=".$id;
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
			$sql='DELETE FROM jugadores_tallas';

			$query=db_2_utf8::singleton()->prepare($sql);

			if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

			$datos=array();

			if(!$x=$query->execute($datos)){error_log(print_r( db_2_utf8::singleton()->errorInfo(),1 ));return false;}
			else{return true;}
		}

		public static function deleteByID($ID)
    	{
    		$sql="DELETE FROM jugadores_tallas WHERE ID=:id";

    		$query=db_2_utf8::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

    		$datos=array(':id'=>$ID);

    		if(!$x=$query->execute($datos)){error_log(print_1( db_2_utf8::singleton()->errorInfo(), 1));return false;}
    		else{return true;}
    	}

		public static function deleteByIDJugadores($IDJugadores)
    	{
    		$sql="DELETE FROM jugadores_tallas WHERE IDJugadores=:idjugadores";

    		$query=db_2_utf8::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

    		$datos=array(':idjugadores'=>$IDJugadores);

    		if(!$x=$query->execute($datos)){error_log(print_r( db_2_utf8::singleton()->errorInfo(),1));return false;}
    		else{return true;}
    	}

		public static function deleteByIDRopaProductos($IDRopaProductos)
    	{
    		$sql="DELETE FROM jugadores_tallas WHERE IDRopaProductos=:idropaproductos";

    		$query=db_2_utf8::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

    		$datos=array(':idropaproductos'=>$IDRopaProductos);

    		if(!$x=$query->execute($datos)){error_log(print_r( db_2_utf8::singleton()->errorInfo(),1));return false;}
    		else{return true;}
    	}

		public static function deleteByTemporada($Temporada)
    	{
    		$sql="DELETE FROM jugadores_tallas WHERE Temporada=:temporada";

    		$query=db_2_utf8::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

    		$datos=array(':temporada'=>$Temporada);

    		if(!$x=$query->execute($datos)){error_log(print_r( db_2_utf8::singleton()->errorInfo(),1));return false;}
    		else{return true;}
    	}

   }
?>