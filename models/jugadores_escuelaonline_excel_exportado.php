<?php 
    /************************************************
     Model Generator:           V1.03 (2019-02-22) 
     Autor:                     Pablo Muñoz Julve
     Fecha de la generación:    2020-03-22 10:29:37
    ************************************************/

    class jugadores_escuelaonline_excel_exportado
    {
        /**********************
    	**** METODOS FIND   ***
    	***********************/
    	public static function findByid($id)
    	{
    		return db_2_utf8::singleton()->query('SELECT * FROM jugadores_escuelaonline_excel_exportado WHERE id='.$id)->fetch();
    	}
        
        public static function findByDni($dni)
    	{
    		return db_2_utf8::singleton()->query('SELECT * FROM jugadores_escuelaonline_excel_exportado WHERE dni="'.$dni.'"')->fetch();
    	}
        
        public static function findAll(){
            return db_2_utf8::singleton()->query('SELECT * FROM jugadores_escuelaonline_excel_exportado')->fetchAll();
        }

        public static function findLast(){
            return db_2_utf8::singleton()->query('SELECT * FROM jugadores_escuelaonline_excel_exportado ORDER BY id desc limit 1')->fetch();
        }

        public static function getCount(){
            return db_2_utf8::singleton()->query('SELECT *,count(*) FROM jugadores_escuelaonline_excel_exportado GROUP BY id')->fetch();
        }
        
    	public static function insert($dni, $nombreapellidos, $equipo)
        {        
            $sql='INSERT INTO jugadores_escuelaonline_excel_exportado(dni, nombreapellidos, equipo)
		VALUES(:dni, :nombreapellidos, :equipo)';

        
            $query=db_2_utf8::singleton()->prepare($sql); 
            if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}
            $datos=array(':dni'=>$dni,':nombreapellidos'=>$nombreapellidos,':equipo'=>$equipo);
                
            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));return false;}
            else{return self::findLast();}
            
        }

    	
    	/**********************
    	**** METODOS UPDATE ***
    	***********************/
        public static function update($id, $dni, $nombreapellidos, $equipo)
        {        
            $sql='UPDATE jugadores_escuelaonline_excel_exportado 
		SET 
		id=:id,dni=:dni,nombreapellidos=:nombreapellidos,equipo=:equipo 
		WHERE
		id=:id';

            $query=db_2_utf8::singleton()->prepare($sql);
            
            $datos=array(':id'=>$id,':dni'=>$dni,':nombreapellidos'=>$nombreapellidos,':equipo'=>$equipo);
    
            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));return false;}
            else{return self::findByid($id);}
        }

		public static function updateAttribute($id,$nombreAtributo,$valorAtributo,$ponerComillas="no")
        {
            if($ponerComillas==="no")
            {   
                if($valorAtributo==0 )
                {
                    $sentencia_sql="UPDATE jugadores_escuelaonline_excel_exportado SET ".$nombreAtributo."=0 WHERE id=".$id;
                }
                else if($valorAtributo=="null" || is_null($valorAtributo) || empty($valorAtributo))
                {
                    $sentencia_sql="UPDATE jugadores_escuelaonline_excel_exportado SET ".$nombreAtributo."=null WHERE id=".$id;
                }
                else
                {
                    $sentencia_sql="UPDATE jugadores_escuelaonline_excel_exportado SET ".$nombreAtributo."=".$valorAtributo." WHERE id=".$id;
                }
            }
            else
            {   
                if($valorAtributo=="0" )
                {
                    $sentencia_sql="UPDATE jugadores_escuelaonline_excel_exportado SET ".$nombreAtributo."='".$valorAtributo."' WHERE id=".$id;
                }
                else if($valorAtributo=="null" || is_null($valorAtributo) || empty($valorAtributo))
                {
                    $sentencia_sql="UPDATE jugadores_escuelaonline_excel_exportado SET ".$nombreAtributo."=null WHERE id=".$id;
                }
                else{
                    $sentencia_sql="UPDATE jugadores_escuelaonline_excel_exportado SET ".$nombreAtributo."='".$valorAtributo."' WHERE id=".$id;
                }
            }

            $query=db_2_utf8::singleton()->prepare($sentencia_sql);

            if(!$query){error_log(print_r( db_2_utf8::singleton()->errorInfo()),1);return false;}

            $datos=array("");

            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));return false;}
            else{return self::findByid($id);}
        }


        /**********************
        **** METODOS DELETE ***
        ***********************/
        public static function deleteAll()
        {
            $sql='DELETE FROM jugadores_escuelaonline_excel_exportado';

            $query=db_2_utf8::singleton()->prepare($sql);

            if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

            $datos=array();

            if(!$x=$query->execute($datos)){error_log(var_dump( db_2_utf8::singleton()->errorInfo()));return false;}

        }

        public static function deleteByid($id)
    	{
    		$sql="DELETE FROM jugadores_escuelaonline_excel_exportado where id=:id";

    		$query=db_2_utf8::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

    		$datos=array(':id'=>$id);

    		if(!$x=$query->execute($datos)){error_log(var_dump( db_2_utf8::singleton()->errorInfo()));return false;}
    	}
   }
?>