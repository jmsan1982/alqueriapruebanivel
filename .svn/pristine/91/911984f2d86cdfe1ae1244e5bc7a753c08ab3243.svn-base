<?php 
    /************************************************
    Model Generator:        V1.03 (2019-02-22) 
    Autor:                  Pablo Muñoz Julve
    Fecha de la generación: 2019-10-03 17:36:36
    ************************************************/

    class formularios_liga_alqueria_jugadores
    {
        public static function findAll(){
            return db::singleton()->query('select * from formularios_liga_alqueria_jugadores')->fetchAll();
        }

        public static function findLast(){
            return db::singleton()->query('select * from formularios_liga_alqueria_jugadores order by ID desc limit 1')->fetch();
        }

        public static function getCount(){
            return db::singleton()->query('select *,count(*) from formularios_liga_alqueria_jugadores group by ID')->fetch();
        }
        
    	public static function insert($IDFormulariosLigaAlqueria, $Nombre, $DNI, $Email, $Telefono, 
		$activo)
        {        
            $sql='INSERT INTO formularios_liga_alqueria_jugadores(IDFormulariosLigaAlqueria, Nombre, DNI, Email, Telefono, 
		activo)
		VALUES(:idformulariosligaalqueria, :nombre, :dni, :email, :telefono, 
		:activo)';

        
            $query=db::singleton()->prepare($sql); 
            if(!$query){error_log(print_r( $query->errorInfo(),1));die;}
            $datos=array(':idformulariosligaalqueria'=>$IDFormulariosLigaAlqueria,':nombre'=>$Nombre,':dni'=>$DNI,':email'=>$Email,':telefono'=>$Telefono,
		':activo'=>$activo);
                
            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));die;}
            else{/*error_log(__FILE__.__FUNCTION__.__LINE__);*/}
            return self::findLast();
        }

	public static function update($ID, $IDFormulariosLigaAlqueria, $Nombre, $DNI, $Email, 
		$Telefono, $activo)
        {        
            $sql='UPDATE formularios_liga_alqueria_jugadores 
		SET 
		id=:id,idformulariosligaalqueria=:idformulariosligaalqueria,nombre=:nombre,dni=:dni,email=:email,
		telefono=:telefono,activo=:activo 
		WHERE
		ID=:id';

            $query=db::singleton()->prepare($sql);
            
            $datos=array(':id'=>$ID,':idformulariosligaalqueria'=>$IDFormulariosLigaAlqueria,':nombre'=>$Nombre,':dni'=>$DNI,':email'=>$Email,
		':telefono'=>$Telefono,':activo'=>$activo);
    
            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));die;}
            else{return true;}
        }
        
        public static function updateAttribute($id,$nombreAtributo,$valorAtributo=null,$ponerComillas="no")
        {
            if($ponerComillas==="no")
            {   $sentencia_sql="UPDATE formularios_liga_alqueria_jugadores SET ".$nombreAtributo."=".$valorAtributo." WHERE ID=".$id;}
            else
            {   $sentencia_sql="UPDATE formularios_liga_alqueria_jugadores SET ".$nombreAtributo."='".$valorAtributo."' WHERE ID=".$id;}

            //error_log(__FILE__.__LINE__);
            //error_log($sentencia_sql);

            $query=db::singleton()->prepare($sentencia_sql);

            if(!$query){error_log(var_dump( db::singleton()->errorInfo()));die;}

            $datos=array("");

            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));die;}
            else{return true;}
        }

	/**********************
	**** METODOS FIND ***
	***********************/
	public static function findByID($ID)
	{
		return db::singleton()->query('select * from formularios_liga_alqueria_jugadores WHERE ID='.$ID)->fetch();
	}

	public static function findByDNI($DNI)
	{
		return db::singleton()->query("select * from formularios_liga_alqueria_jugadores WHERE DNI='".$DNI."'")->fetch();
	}

	public static function findByIDFormulariosLigaAlqueria($IDFormulariosLigaAlqueria)
    	{
    		return db::singleton()->query('select * from formularios_liga_alqueria_jugadores WHERE IDFormulariosLigaAlqueria='.$IDFormulariosLigaAlqueria)->fetchAll();
    	}

        public static function findByactivo($activo)
    	{
    		return db::singleton()->query('select * from formularios_liga_alqueria_jugadores WHERE activo='.$activo)->fetchAll();
    	}
        
        public static function findByEquipoYFechaNuevaAltaJugador($IDFormulariosLigaAlqueria)
    	{
            return db::singleton()->query('select * from formularios_liga_alqueria_jugadores WHERE fecha_nueva_alta_jugador IS NOT NULL AND IDFormulariosLigaAlqueria='.$IDFormulariosLigaAlqueria)->fetchAll();
    	}
        
        public static function findByEquipoYNuevaBajaJugador($IDFormulariosLigaAlqueria)
    	{
            return db::singleton()->query('select * from formularios_liga_alqueria_jugadores WHERE fecha_nueva_baja_jugador IS NOT NULL AND IDFormulariosLigaAlqueria='.$IDFormulariosLigaAlqueria)->fetchAll();
    	}

        /**********************
	**** METODOS DELETE ***
	***********************/
	public static function deleteAll()
	{
		$sql='delete from formularios_liga_alqueria_jugadores';

		$query=db::singleton()->prepare($sql);

		if(!$query){error_log(print_r( $query->errorInfo(),1));die;}

		$datos=array();

		if(!$x=$query->execute($datos)){error_log(var_dump( db::singleton()->errorInfo()));die;}
	
	}

	public static function deleteByID($ID)
    	{
    		$sql="delete from formularios_liga_alqueria_jugadores where ID=:id";

    		$query=db::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));die;}

    		$datos=array(':id'=>$ID);

    		if(!$x=$query->execute($datos)){error_log(var_dump( db::singleton()->errorInfo()));die;}
    	}

	public static function deleteByDNI($DNI)
    	{
    		$sql="delete from formularios_liga_alqueria_jugadores where DNI=:dni";

    		$query=db::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));die;}

    		$datos=array(':dni'=>$DNI);

    		if(!$x=$query->execute($datos)){error_log(var_dump( db::singleton()->errorInfo()));die;}
    	}

	public static function deleteByIDFormulariosLigaAlqueria($IDFormulariosLigaAlqueria){
    		$sql="delete from formularios_liga_alqueria_jugadores where IDFormulariosLigaAlqueria=:idformulariosligaalqueria";

    		$query=db::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));die;}

    		$datos=array(':idformulariosligaalqueria'=>$IDFormulariosLigaAlqueria);

    		if(!$x=$query->execute($datos)){error_log(var_dump( db::singleton()->errorInfo()));die;}
    	}

	public static function deleteByactivo($activo){
    		$sql="delete from formularios_liga_alqueria_jugadores where activo=:activo";

    		$query=db::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));die;}

    		$datos=array(':activo'=>$activo);

    		if(!$x=$query->execute($datos)){error_log(var_dump( db::singleton()->errorInfo()));die;}
    	}

   }
?>