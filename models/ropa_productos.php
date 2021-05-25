<?php 
	/************************************************
	Code Generator: 		V2.0 (2020-03-26) 
	Autor: 					Pablo Muñoz Julve
	Fecha de la generación: 2020-08-05 10:31:31
	Base de datos: 			alqueria
	Clase de capa: 			models
	************************************************/

    class ropa_productos
    {
        /**********************
		****  METODOS FIND  ***
		***********************/
        public static function findAll()
        {   return db_2_utf8::singleton()->query('SELECT * FROM ropa_productos')->fetchAll();   }
        
        public static function findAllExtendedRopaProductosCantidadesEquipos($IDEquipo,$Temporada)
        {   
            $sentencia_sql=' 
                SELECT      ropa_productos.*,	
                            ropa_productos_cantidades_equipos.*
                FROM        ropa_productos 
                INNER JOIN  ropa_productos_cantidades_equipos 				ON ropa_productos_cantidades_equipos.IDProducto=ropa_productos.ID  
                WHERE       ropa_productos_cantidades_equipos.IDEquipo='.$IDEquipo.' 	
                        AND ropa_productos_cantidades_equipos.Temporada="'.$Temporada.'"';
               
//            error_log(__FILE__.__FUNCTION__.__LINE__);
//            error_log($sentencia_sql);
            
            return db_2_utf8::singleton()->query($sentencia_sql)->fetchAll();  
        }

        public static function findLast()
        {   return db_2_utf8::singleton()->query('SELECT * FROM ropa_productos ORDER BY ID desc limit 1')->fetch();    }

        public static function getCount()
        {   return db_2_utf8::singleton()->query('SELECT *,count(*) FROM ropa_productos GROUP BY ID')->fetch();    }
        
        public static function getAttributeList()
        {
            return db_2_utf8::singleton()->query(
            'SELECT
                COLUMN_NAME, DATA_TYPE
            FROM
                INFORMATION_SCHEMA.COLUMNS
            WHERE
                TABLE_SCHEMA="alqueria" and table_name="ropa_productos"')->fetchAll();
        }
        
    	public static function findByID($ID)
		{   return db_2_utf8::singleton()->query('SELECT * FROM ropa_productos WHERE ID='.$ID)->fetch();}


		/***********************
		****  METODO INSERT  ***
		***********************/
		public static function insert($Nombre)
        {        
            $sql='
            INSERT INTO ropa_productos(Nombre)
			VALUES(:nombre)';
   
            $query=db_2_utf8::singleton()->prepare($sql); 
            if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}
            $datos=array(':nombre'=>$Nombre);
                
            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));return false;}
            else{return self::findLast();}
        }


		/**********************
		**** METODOS UPDATE ***
		***********************/
		public static function update($ID, $Nombre)
        {        
            $sql='
            UPDATE	ropa_productos 
			SET 
					nombre=:nombre 
			WHERE
					ID=:id';

            $query=db_2_utf8::singleton()->prepare($sql);
            
            $datos=array(
				':id'=>$ID,
				':nombre'=>$Nombre);
    
            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));return false;}
            else{return self::findByID($id);}
        }

		public static function updateAttribute($id,$nombreAtributo,$valorAtributo,$ponerComillas="no")
        {
            if($ponerComillas==="no")
            {   
                if($valorAtributo==0 )
                {
                    $sentencia_sql="UPDATE ropa_productos SET ".$nombreAtributo."=0 WHERE ID=".$id;
                }
                else if($valorAtributo=="null" || is_null($valorAtributo) || empty($valorAtributo))
                {
                    $sentencia_sql="UPDATE ropa_productos SET ".$nombreAtributo."=null WHERE ID=".$id;
                }
                else
                {
                    $sentencia_sql="UPDATE ropa_productos SET ".$nombreAtributo."=".$valorAtributo." WHERE ID=".$id;
                }
            }
            else
            {   
                if($valorAtributo=="0" )
                {
                    $sentencia_sql="UPDATE ropa_productos SET ".$nombreAtributo."='".$valorAtributo."' WHERE ID=".$id;
                }
                else if($valorAtributo=="null" || is_null($valorAtributo) || empty($valorAtributo))
                {
                    $sentencia_sql="UPDATE ropa_productos SET ".$nombreAtributo."=null WHERE ID=".$id;
                }
                else{
                    $sentencia_sql="UPDATE ropa_productos SET ".$nombreAtributo."='".$valorAtributo."' WHERE ID=".$id;
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
			$sql='DELETE FROM ropa_productos';

			$query=db_2_utf8::singleton()->prepare($sql);

			if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

			$datos=array();

			if(!$x=$query->execute($datos)){error_log(print_r( db_2_utf8::singleton()->errorInfo(),1 ));return false;}
			else{return true;}
		}

		public static function deleteByID($ID)
    	{
    		$sql="DELETE FROM ropa_productos WHERE ID=:id";

    		$query=db_2_utf8::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

    		$datos=array(':id'=>$ID);

    		if(!$x=$query->execute($datos)){error_log(print_1( db_2_utf8::singleton()->errorInfo(), 1));return false;}
    		else{return true;}
    	}

   }
?>