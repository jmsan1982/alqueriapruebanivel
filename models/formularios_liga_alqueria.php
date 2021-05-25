<?php 
    /************************************************
    Model Generator:            V1.03 (2019-02-22) 
    Autor: 			Pablo Muñoz Julve
    Fecha de la generación:     2019-10-04 17:37:52
    ************************************************/

    class formularios_liga_alqueria
    {
        public static function findAll(){
            return db::singleton()->query('select * from formularios_liga_alqueria where activo=1 and FechaAlta>"2020-01-01"')->fetchAll(PDO::FETCH_ASSOC);
        }
        
        public static function findLast(){
            return db::singleton()->query('select * from formularios_liga_alqueria order by ID desc limit 1')->fetch();
        }

        public static function getCount(){
            return db::singleton()->query('select *,count(*) from formularios_liga_alqueria group by ID')->fetch();
        }
        
    	public static function insert(
                $FechaAlta,                 $NombreEquipo,      $NombreCarpeta, $ResponsableNombre, $ResponsableTelefono, 
		$ResponsableEmail,          $ResponsableDNI,    $Categoria,     $Subcategoria,      $ColorEquipacionPrincipal, 
		$ColorEquipacionSecundaria, $DiaJuego,          $HoraJuego,     $activo,            $condiciones_uso_autoriza_datos, 
		$condiciones_uso_autoriza_imagen)
        {        
            $sql='INSERT INTO formularios_liga_alqueria(
                    FechaAlta,                  NombreEquipo,   NombreCarpeta,  ResponsableNombre,  ResponsableTelefono, 
                    ResponsableEmail,           ResponsableDNI, Categoria,      Subcategoria,       ColorEquipacionPrincipal, 
                    ColorEquipacionSecundaria,  DiaJuego,       HoraJuego,      activo,             condiciones_uso_autoriza_datos, 
                    condiciones_uso_autoriza_imagen)
		VALUES(:fechaalta, :nombreequipo, :nombrecarpeta, :responsablenombre, :responsabletelefono, 
		:responsableemail, :responsabledni, :categoria, :subcategoria, :colorequipacionprincipal, 
		:colorequipacionsecundaria, :diajuego, :horajuego, :activo, :condiciones_uso_autoriza_datos, 
		:condiciones_uso_autoriza_imagen)';

        
            $query=db::singleton()->prepare($sql); 
            if(!$query){error_log(print_r( $query->errorInfo(),1));die;}
            $datos=array(':fechaalta'=>$FechaAlta,':nombreequipo'=>$NombreEquipo,':nombrecarpeta'=>$NombreCarpeta,':responsablenombre'=>$ResponsableNombre,':responsabletelefono'=>$ResponsableTelefono,
		':responsableemail'=>$ResponsableEmail,':responsabledni'=>$ResponsableDNI,':categoria'=>$Categoria,':subcategoria'=>$Subcategoria,':colorequipacionprincipal'=>$ColorEquipacionPrincipal,
		':colorequipacionsecundaria'=>$ColorEquipacionSecundaria,':diajuego'=>$DiaJuego,':horajuego'=>$HoraJuego,':activo'=>$activo,':condiciones_uso_autoriza_datos'=>$condiciones_uso_autoriza_datos,
		':condiciones_uso_autoriza_imagen'=>$condiciones_uso_autoriza_imagen);
                
            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));die;}
            else{/*error_log(__FILE__.__FUNCTION__.__LINE__);*/}
            return self::findLast();
        }

	public static function update($ID, $FechaAlta, $NombreEquipo, $NombreCarpeta, $ResponsableNombre, 
		$ResponsableTelefono, $ResponsableEmail, $ResponsableDNI, $Categoria, $Subcategoria, 
		$ColorEquipacionPrincipal, $ColorEquipacionSecundaria, $DiaJuego, $HoraJuego, $activo, 
		$condiciones_uso_autoriza_datos, $condiciones_uso_autoriza_imagen)
        {        
            $sql='UPDATE formularios_liga_alqueria 
		SET 
		id=:id,fechaalta=:fechaalta,nombreequipo=:nombreequipo,nombrecarpeta=:nombrecarpeta,responsablenombre=:responsablenombre,
		responsabletelefono=:responsabletelefono,responsableemail=:responsableemail,responsabledni=:responsabledni,categoria=:categoria,subcategoria=:subcategoria,
		colorequipacionprincipal=:colorequipacionprincipal,colorequipacionsecundaria=:colorequipacionsecundaria,diajuego=:diajuego,horajuego=:horajuego,activo=:activo,
		condiciones_uso_autoriza_datos=:condiciones_uso_autoriza_datos,condiciones_uso_autoriza_imagen=:condiciones_uso_autoriza_imagen 
		WHERE
		ID=:id';

            $query=db::singleton()->prepare($sql);
            
            $datos=array(':id'=>$ID,':fechaalta'=>$FechaAlta,':nombreequipo'=>$NombreEquipo,':nombrecarpeta'=>$NombreCarpeta,':responsablenombre'=>$ResponsableNombre,
		':responsabletelefono'=>$ResponsableTelefono,':responsableemail'=>$ResponsableEmail,':responsabledni'=>$ResponsableDNI,':categoria'=>$Categoria,':subcategoria'=>$Subcategoria,
		':colorequipacionprincipal'=>$ColorEquipacionPrincipal,':colorequipacionsecundaria'=>$ColorEquipacionSecundaria,':diajuego'=>$DiaJuego,':horajuego'=>$HoraJuego,':activo'=>$activo,
		':condiciones_uso_autoriza_datos'=>$condiciones_uso_autoriza_datos,':condiciones_uso_autoriza_imagen'=>$condiciones_uso_autoriza_imagen);
    
            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));die;}
            else{return true;}
        }

        public static function updateAttribute($id,$nombreAtributo,$valorAtributo=null,$ponerComillas="no")
        {
            if($ponerComillas==="no")
            {   $sentencia_sql="UPDATE formularios_liga_alqueria SET ".$nombreAtributo."=".$valorAtributo." WHERE ID=".$id;}
            else
            {   $sentencia_sql="UPDATE formularios_liga_alqueria SET ".$nombreAtributo."='".$valorAtributo."' WHERE ID=".$id;}

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
		return db::singleton()->query('select * from formularios_liga_alqueria WHERE ID='.$ID)->fetch();
	}

	public static function findByNombre_Equipo($Nombre_Equipo)
	{
            return db::singleton()->query('select * from formularios_liga_alqueria WHERE Nombre_Equipo='.$Nombre_Equipo)->fetch();
	}

	public static function findByResponsableDNIEnLosUltimos5Minutos($ResponsableDNI,$Hace5minutos)
	{
            $sentencia_sql='select * from formularios_liga_alqueria WHERE ResponsableDNI="'.$ResponsableDNI.'" AND FechaAlta>"'.$Hace5minutos.'"';
            //error_log(__FILE__.__LINE__);
            //error_log($sentencia_sql);
            return db::singleton()->query($sentencia_sql)->fetch();
	}

	public static function findByCategoria($Categoria)
    	{
    		return db::singleton()->query('select * from formularios_liga_alqueria WHERE Categoria='.$Categoria)->fetchAll();
    	}

        public static function findBySubcategoria($Subcategoria)
    	{
    		return db::singleton()->query('select * from formularios_liga_alqueria WHERE Subcategoria='.$Subcategoria)->fetchAll();
    	}

        public static function findByactivo($activo)
    	{
    		return db::singleton()->query('select * from formularios_liga_alqueria WHERE activo='.$activo)->fetchAll();
    	}

        public static function findByactivoClasificacion($activo)
        {
            return db_servicios_utf8::singleton()->query('select * from formularios_liga_alqueria WHERE activo_clasificacion='.$activo.' order by NombreEquipo')->fetchAll();
        }
        
        /**********************
	**** METODOS DELETE ***
	***********************/
	public static function deleteAll()
	{
		$sql='delete from formularios_liga_alqueria';

		$query=db::singleton()->prepare($sql);

		if(!$query){error_log(print_r( $query->errorInfo(),1));die;}

		$datos=array();

		if(!$x=$query->execute($datos)){error_log(var_dump( db::singleton()->errorInfo()));die;}
	
	}

	public static function deleteByID($ID)
    	{
    		$sql="delete from formularios_liga_alqueria where ID=:id";

    		$query=db::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));die;}

    		$datos=array(':id'=>$ID);

    		if(!$x=$query->execute($datos)){error_log(var_dump( db::singleton()->errorInfo()));die;}
    	}

	public static function deleteByNombre_Equipo($Nombre_Equipo)
    	{
    		$sql="delete from formularios_liga_alqueria where Nombre_Equipo=:nombre_equipo";

    		$query=db::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));die;}

    		$datos=array(':nombre_equipo'=>$Nombre_Equipo);

    		if(!$x=$query->execute($datos)){error_log(var_dump( db::singleton()->errorInfo()));die;}
    	}

	public static function deleteByResponsableDNI($ResponsableDNI)
    	{
    		$sql="delete from formularios_liga_alqueria where ResponsableDNI=:responsabledni";

    		$query=db::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));die;}

    		$datos=array(':responsabledni'=>$ResponsableDNI);

    		if(!$x=$query->execute($datos)){error_log(var_dump( db::singleton()->errorInfo()));die;}
    	}

	public static function deleteByCategoria($Categoria){
    		$sql="delete from formularios_liga_alqueria where Categoria=:categoria";

    		$query=db::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));die;}

    		$datos=array(':categoria'=>$Categoria);

    		if(!$x=$query->execute($datos)){error_log(var_dump( db::singleton()->errorInfo()));die;}
    	}

	public static function deleteBySubcategoria($Subcategoria){
    		$sql="delete from formularios_liga_alqueria where Subcategoria=:subcategoria";

    		$query=db::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));die;}

    		$datos=array(':subcategoria'=>$Subcategoria);

    		if(!$x=$query->execute($datos)){error_log(var_dump( db::singleton()->errorInfo()));die;}
    	}

	public static function deleteByactivo($activo){
    		$sql="delete from formularios_liga_alqueria where activo=:activo";

    		$query=db::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));die;}

    		$datos=array(':activo'=>$activo);

    		if(!$x=$query->execute($datos)){error_log(var_dump( db::singleton()->errorInfo()));die;}
    	}

   }
?>
