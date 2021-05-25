<?php 
	/************************************************
	Code Generator: 		V2.0 (2020-03-26) 
	Autor: 					Pablo Muñoz Julve
	Fecha de la generación: 2020-04-22 11:02:20
	Base de datos: 			alqueria
	Clase de capa: 			models
	************************************************/

    class licencias
    {
        /**********************
		****  METODOS FIND  ***
		***********************/
        public static function findAll()
        {   return db_2_utf8::singleton()->query('SELECT * FROM licencias')->fetchAll();   }

        public static function findLast()
        {   return db_2_utf8::singleton()->query('SELECT * FROM licencias ORDER BY idlicencia desc limit 1')->fetch();    }

        public static function getCount()
        {   return db_2_utf8::singleton()->query('SELECT *,count(*) FROM licencias GROUP BY idlicencia')->fetch();    }
        
        public static function getAttributeList()
        {
            return db_2_utf8::singleton()->query(
            'SELECT
                COLUMN_NAME, DATA_TYPE
            FROM
                INFORMATION_SCHEMA.COLUMNS
            WHERE
                TABLE_SCHEMA="alqueria" and table_name="licencias"')->fetchAll();
        }
        
    	public static function findByidlicencia($idlicencia)
		{   return db_2_utf8::singleton()->query('SELECT * FROM licencias WHERE idlicencia='.$idlicencia)->fetch();}

		public static function findByidjugador($idjugador)
		{   return db_2_utf8::singleton()->query('SELECT * FROM licencias WHERE idjugador='.$idjugador)->fetchAll();}

		public static function findByidentrenador($identrenador)
		{   return db_2_utf8::singleton()->query('SELECT * FROM licencias WHERE identrenador='.$identrenador)->fetchAll();}

		public static function findByidequipo($idequipo)
		{   return db_2_utf8::singleton()->query('SELECT * FROM licencias WHERE idequipo='.$idequipo)->fetchAll();}



        public static function findlicenciasByidjugador($idjugador)
        {  // error_log('SELECT * FROM view_licencias WHERE idjugador='.$idjugador.' order by idlicencia desc');
            return db_2_utf8::singleton()->query('SELECT * FROM view_licencias WHERE idjugador='.$idjugador .' order by idlicencia desc')->fetchAll();
        }



		/***********************
		****  METODO INSERT  ***
		***********************/
		public static function insert($idjugador, $identrenador, $idequipo, $fecharegistro, $firma_tutor, 
		$firma_solicitante, $firmado, $asistente, $delegado_campo)
        {        
            $sql='
            INSERT INTO licencias(idjugador, identrenador, idequipo, fecharegistro, firma_tutor, 
		firma_solicitante, firmado, asistente, delegado_campo)
			VALUES(:idjugador, :identrenador, :idequipo, :fecharegistro, :firma_tutor, 
		:firma_solicitante, :firmado, :asistente, :delegado_campo)';
   
            $query=db_2_utf8::singleton()->prepare($sql); 
            if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}
            $datos=array(':idjugador'=>$idjugador,':identrenador'=>$identrenador,':idequipo'=>$idequipo,':fecharegistro'=>$fecharegistro,':firma_tutor'=>$firma_tutor,
		':firma_solicitante'=>$firma_solicitante,':firmado'=>$firmado,':asistente'=>$asistente,':delegado_campo'=>$delegado_campo);
                
            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));return false;}
            else{return self::findLast();}
        }


		/**********************
		**** METODOS UPDATE ***
		***********************/
		public static function update($idlicencia, $idjugador, $identrenador, $idequipo, $fecharegistro, $firma_tutor, 
		$firma_solicitante, $firmado, $asistente, $delegado_campo)
        {        
            $sql='
            UPDATE	licencias 
			SET 
					idjugador=:idjugador,identrenador=:identrenador,idequipo=:idequipo,fecharegistro=:fecharegistro,firma_tutor=:firma_tutor,
		firma_solicitante=:firma_solicitante,firmado=:firmado,asistente=:asistente,delegado_campo=:delegado_campo 
			WHERE
					idlicencia=:idlicencia';

            $query=db_2_utf8::singleton()->prepare($sql);
            
            $datos=array(
				':idlicencia'=>$idlicencia,
				':idjugador'=>$idjugador,':identrenador'=>$identrenador,':idequipo'=>$idequipo,':fecharegistro'=>$fecharegistro,':firma_tutor'=>$firma_tutor,
		':firma_solicitante'=>$firma_solicitante,':firmado'=>$firmado,':asistente'=>$asistente,':delegado_campo'=>$delegado_campo);
    
            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));return false;}
            else{return self::findByidlicencia($id);}
        }

		public static function updateAttribute($id,$nombreAtributo,$valorAtributo,$ponerComillas="no")
        {
            if($ponerComillas==="no")
            {   
                if($valorAtributo==0 )
                {
                    $sentencia_sql="UPDATE licencias SET ".$nombreAtributo."=0 WHERE idlicencia=".$id;
                }
                else if($valorAtributo=="null" || is_null($valorAtributo) || empty($valorAtributo))
                {
                    $sentencia_sql="UPDATE licencias SET ".$nombreAtributo."=null WHERE idlicencia=".$id;
                }
                else
                {
                    $sentencia_sql="UPDATE licencias SET ".$nombreAtributo."=".$valorAtributo." WHERE idlicencia=".$id;
                }
            }
            else
            {   
                if($valorAtributo=="0" )
                {
                    $sentencia_sql="UPDATE licencias SET ".$nombreAtributo."='".$valorAtributo."' WHERE idlicencia=".$id;
                }
                else if($valorAtributo=="null" || is_null($valorAtributo) || empty($valorAtributo))
                {
                    $sentencia_sql="UPDATE licencias SET ".$nombreAtributo."=null WHERE idlicencia=".$id;
                }
                else{
                    $sentencia_sql="UPDATE licencias SET ".$nombreAtributo."='".$valorAtributo."' WHERE idlicencia=".$id;
                }
            }

            $query=db_2_utf8::singleton()->prepare($sentencia_sql);

            if(!$query){error_log(print_r( db_2_utf8::singleton()->errorInfo()),1);return false;}

            $datos=array("");

            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));return false;}
            else{return self::findByidlicencia($id);}
        }


		/**********************
		**** METODOS DELETE ***
		***********************/
		public static function deleteAll()
		{
			$sql='DELETE FROM licencias';

			$query=db_2_utf8::singleton()->prepare($sql);

			if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

			$datos=array();

			if(!$x=$query->execute($datos)){error_log(print_r( db_2_utf8::singleton()->errorInfo(),1 ));return false;}
			else{return true;}
		}

		public static function deleteByidlicencia($idlicencia)
    	{
    		$sql="DELETE FROM licencias WHERE idlicencia=:idlicencia";

    		$query=db_2_utf8::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

    		$datos=array(':idlicencia'=>$idlicencia);

    		if(!$x=$query->execute($datos)){error_log(print_1( db_2_utf8::singleton()->errorInfo(), 1));return false;}
    		else{return true;}
    	}

		public static function deleteByidjugador($idjugador)
    	{
    		$sql="DELETE FROM licencias WHERE idjugador=:idjugador";

    		$query=db_2_utf8::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

    		$datos=array(':idjugador'=>$idjugador);

    		if(!$x=$query->execute($datos)){error_log(print_r( db_2_utf8::singleton()->errorInfo(),1));return false;}
    		else{return true;}
    	}

		public static function deleteByidentrenador($identrenador)
    	{
    		$sql="DELETE FROM licencias WHERE identrenador=:identrenador";

    		$query=db_2_utf8::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

    		$datos=array(':identrenador'=>$identrenador);

    		if(!$x=$query->execute($datos)){error_log(print_r( db_2_utf8::singleton()->errorInfo(),1));return false;}
    		else{return true;}
    	}

		public static function deleteByidequipo($idequipo)
    	{
    		$sql="DELETE FROM licencias WHERE idequipo=:idequipo";

    		$query=db_2_utf8::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

    		$datos=array(':idequipo'=>$idequipo);

    		if(!$x=$query->execute($datos)){error_log(print_r( db_2_utf8::singleton()->errorInfo(),1));return false;}
    		else{return true;}
    	}

   }
?>