<?php 
	/************************************************
	Code Generator: 		V2.0 (2020-03-26) 
	Autor: 					Pablo Muñoz Julve
	Fecha de la generación: 2020-04-22 11:02:20
	Base de datos: 			alqueria
	Clase de capa: 			models
	************************************************/

    class coaches
    {
        /**********************
		****  METODOS FIND  ***
		***********************/
        public static function findAll()
        {   return db_2_utf8::singleton()->query('SELECT * FROM coaches')->fetchAll();   }

        public static function findLast()
        {   return db_2_utf8::singleton()->query('SELECT * FROM coaches ORDER BY id_coach desc limit 1')->fetch();    }

        public static function getCount()
        {   return db_2_utf8::singleton()->query('SELECT *,count(*) FROM coaches GROUP BY id_coach')->fetch();    }
        
        public static function getAttributeList()
        {
            return db_2_utf8::singleton()->query(
            'SELECT
                COLUMN_NAME, DATA_TYPE
            FROM
                INFORMATION_SCHEMA.COLUMNS
            WHERE
                TABLE_SCHEMA="alqueria" and table_name="coaches"')->fetchAll();
        }
        
    	public static function findByid_coach($id_coach)
		{   return db_2_utf8::singleton()->query('SELECT * FROM coaches WHERE id_coach='.$id_coach)->fetch();}

        public static function findByemail_coach($email_coach)
		{   return db_2_utf8::singleton()->query('SELECT * FROM coaches WHERE email_coach='.$email_coach)->fetch();}

        public static function findByusuario($usuario)
		{
		    return db_2_utf8::singleton()->query("SELECT * FROM coaches WHERE usuario= '$usuario'")->fetch();
		}

        public static function findBydni($dni)
		{   return db_2_utf8::singleton()->query('SELECT * FROM coaches WHERE dni='.$dni)->fetch();}

		public static function findByactivo($activo)
		{   return db_2_utf8::singleton()->query('SELECT * FROM coaches WHERE activo='.$activo)->fetchAll();}


		/***********************
		****  METODO INSERT  ***
		***********************/
		public static function insert($nombre_coach, $telefono_coach, $email_coach, $cargo_coach_cas, $cargo_coach_val, 
		$cargo_coach_eng, $cargo_coach_rus, $texto_coach_cas, $texto_coach_val, $texto_coach_eng, 
		$texto_coach_rus, $ruta_imagen_coach, $activo, $usuario, $contrasenya, 
		$dni, $fecharegistro, $apellidos, $foto, $dni_delante, 
		$dni_detras, $pasaporte, $fecha_nacimiento, $img_pasaporte)
        {        
            $sql='
            INSERT INTO coaches(nombre_coach, telefono_coach, email_coach, cargo_coach_cas, cargo_coach_val, 
		cargo_coach_eng, cargo_coach_rus, texto_coach_cas, texto_coach_val, texto_coach_eng, 
		texto_coach_rus, ruta_imagen_coach, activo, usuario, contrasenya, 
		dni, fecharegistro, apellidos, foto, dni_delante, 
		dni_detras, pasaporte, fecha_nacimiento, img_pasaporte)
			VALUES(:nombre_coach, :telefono_coach, :email_coach, :cargo_coach_cas, :cargo_coach_val, 
		:cargo_coach_eng, :cargo_coach_rus, :texto_coach_cas, :texto_coach_val, :texto_coach_eng, 
		:texto_coach_rus, :ruta_imagen_coach, :activo, :usuario, :contrasenya, 
		:dni, :fecharegistro, :apellidos, :foto, :dni_delante, 
		:dni_detras, :pasaporte, :fecha_nacimiento, :img_pasaporte)';
   
            $query=db_2_utf8::singleton()->prepare($sql); 
            if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}
            $datos=array(':nombre_coach'=>$nombre_coach,':telefono_coach'=>$telefono_coach,':email_coach'=>$email_coach,':cargo_coach_cas'=>$cargo_coach_cas,':cargo_coach_val'=>$cargo_coach_val,
		':cargo_coach_eng'=>$cargo_coach_eng,':cargo_coach_rus'=>$cargo_coach_rus,':texto_coach_cas'=>$texto_coach_cas,':texto_coach_val'=>$texto_coach_val,':texto_coach_eng'=>$texto_coach_eng,
		':texto_coach_rus'=>$texto_coach_rus,':ruta_imagen_coach'=>$ruta_imagen_coach,':activo'=>$activo,':usuario'=>$usuario,':contrasenya'=>$contrasenya,
		':dni'=>$dni,':fecharegistro'=>$fecharegistro,':apellidos'=>$apellidos,':foto'=>$foto,':dni_delante'=>$dni_delante,
		':dni_detras'=>$dni_detras,':pasaporte'=>$pasaporte,':fecha_nacimiento'=>$fecha_nacimiento,':img_pasaporte'=>$img_pasaporte);
                
            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));return false;}
            else{return self::findLast();}
        }


		/**********************
		**** METODOS UPDATE ***
		***********************/
		public static function update($id_coach, $nombre_coach, $telefono_coach, $email_coach, $cargo_coach_cas, $cargo_coach_val, 
		$cargo_coach_eng, $cargo_coach_rus, $texto_coach_cas, $texto_coach_val, $texto_coach_eng, 
		$texto_coach_rus, $ruta_imagen_coach, $activo, $usuario, $contrasenya, 
		$dni, $fecharegistro, $apellidos, $foto, $dni_delante, 
		$dni_detras, $pasaporte, $fecha_nacimiento, $img_pasaporte)
        {        
            $sql='
            UPDATE	coaches 
			SET 
					nombre_coach=:nombre_coach,telefono_coach=:telefono_coach,email_coach=:email_coach,cargo_coach_cas=:cargo_coach_cas,cargo_coach_val=:cargo_coach_val,
		cargo_coach_eng=:cargo_coach_eng,cargo_coach_rus=:cargo_coach_rus,texto_coach_cas=:texto_coach_cas,texto_coach_val=:texto_coach_val,texto_coach_eng=:texto_coach_eng,
		texto_coach_rus=:texto_coach_rus,ruta_imagen_coach=:ruta_imagen_coach,activo=:activo,usuario=:usuario,contrasenya=:contrasenya,
		dni=:dni,fecharegistro=:fecharegistro,apellidos=:apellidos,foto=:foto,dni_delante=:dni_delante,
		dni_detras=:dni_detras,pasaporte=:pasaporte,fecha_nacimiento=:fecha_nacimiento,img_pasaporte=:img_pasaporte 
			WHERE
					id_coach=:id_coach';

            $query=db_2_utf8::singleton()->prepare($sql);
            
            $datos=array(
				':id_coach'=>$id_coach,
				':nombre_coach'=>$nombre_coach,':telefono_coach'=>$telefono_coach,':email_coach'=>$email_coach,':cargo_coach_cas'=>$cargo_coach_cas,':cargo_coach_val'=>$cargo_coach_val,
		':cargo_coach_eng'=>$cargo_coach_eng,':cargo_coach_rus'=>$cargo_coach_rus,':texto_coach_cas'=>$texto_coach_cas,':texto_coach_val'=>$texto_coach_val,':texto_coach_eng'=>$texto_coach_eng,
		':texto_coach_rus'=>$texto_coach_rus,':ruta_imagen_coach'=>$ruta_imagen_coach,':activo'=>$activo,':usuario'=>$usuario,':contrasenya'=>$contrasenya,
		':dni'=>$dni,':fecharegistro'=>$fecharegistro,':apellidos'=>$apellidos,':foto'=>$foto,':dni_delante'=>$dni_delante,
		':dni_detras'=>$dni_detras,':pasaporte'=>$pasaporte,':fecha_nacimiento'=>$fecha_nacimiento,':img_pasaporte'=>$img_pasaporte);
    
            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));return false;}
            else{return self::findByid_coach($id);}
        }

		public static function updateAttribute($id,$nombreAtributo,$valorAtributo,$ponerComillas="no")
        {
            if($ponerComillas==="no")
            {   
                if($valorAtributo==0 )
                {
                    $sentencia_sql="UPDATE coaches SET ".$nombreAtributo."=0 WHERE id_coach=".$id;
                }
                else if($valorAtributo=="null" || is_null($valorAtributo) || empty($valorAtributo))
                {
                    $sentencia_sql="UPDATE coaches SET ".$nombreAtributo."=null WHERE id_coach=".$id;
                }
                else
                {
                    $sentencia_sql="UPDATE coaches SET ".$nombreAtributo."=".$valorAtributo." WHERE id_coach=".$id;
                }
            }
            else
            {   
                if($valorAtributo=="0" )
                {
                    $sentencia_sql="UPDATE coaches SET ".$nombreAtributo."='".$valorAtributo."' WHERE id_coach=".$id;
                }
                else if($valorAtributo=="null" || is_null($valorAtributo) || empty($valorAtributo))
                {  //error_log("UPDATE coaches SET ".$nombreAtributo."='".$valorAtributo."' WHERE id_coach=".$id);
                    $sentencia_sql="UPDATE coaches SET ".$nombreAtributo."=null WHERE id_coach=".$id;
                }
                else{ //error_log("UPDATE coaches SET ".$nombreAtributo."='".$valorAtributo."' WHERE id_coach=".$id);
                    $sentencia_sql="UPDATE coaches SET ".$nombreAtributo."='".$valorAtributo."' WHERE id_coach=".$id;
                }
            }

            $query=db_2_utf8::singleton()->prepare($sentencia_sql);

            if(!$query){error_log(print_r( db_2_utf8::singleton()->errorInfo()),1);return false;}

            $datos=array("");

            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));return false;}
            else{return self::findByid_coach($id);}
        }


		/**********************
		**** METODOS DELETE ***
		***********************/
		public static function deleteAll()
		{
			$sql='DELETE FROM coaches';

			$query=db_2_utf8::singleton()->prepare($sql);

			if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

			$datos=array();

			if(!$x=$query->execute($datos)){error_log(print_r( db_2_utf8::singleton()->errorInfo(),1 ));return false;}
			else{return true;}
		}

		public static function deleteByid_coach($id_coach)
    	{
    		$sql="DELETE FROM coaches WHERE id_coach=:id_coach";

    		$query=db_2_utf8::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

    		$datos=array(':id_coach'=>$id_coach);

    		if(!$x=$query->execute($datos)){error_log(print_1( db_2_utf8::singleton()->errorInfo(), 1));return false;}
    		else{return true;}
    	}

		public static function deleteByemail_coach($email_coach)
    	{
    		$sql="DELETE FROM coaches WHERE email_coach=:email_coach";

    		$query=db_2_utf8::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

    		$datos=array(':email_coach'=>$email_coach);

    		if(!$x=$query->execute($datos)){error_log(print_1( db_2_utf8::singleton()->errorInfo(), 1));return false;}
    		else{return true;}
    	}

		public static function deleteByusuario($usuario)
    	{
    		$sql="DELETE FROM coaches WHERE usuario=:usuario";

    		$query=db_2_utf8::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

    		$datos=array(':usuario'=>$usuario);

    		if(!$x=$query->execute($datos)){error_log(print_1( db_2_utf8::singleton()->errorInfo(), 1));return false;}
    		else{return true;}
    	}

		public static function deleteBydni($dni)
    	{
    		$sql="DELETE FROM coaches WHERE dni=:dni";

    		$query=db_2_utf8::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

    		$datos=array(':dni'=>$dni);

    		if(!$x=$query->execute($datos)){error_log(print_1( db_2_utf8::singleton()->errorInfo(), 1));return false;}
    		else{return true;}
    	}

		public static function deleteByactivo($activo)
    	{
    		$sql="DELETE FROM coaches WHERE activo=:activo";

    		$query=db_2_utf8::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

    		$datos=array(':activo'=>$activo);

    		if(!$x=$query->execute($datos)){error_log(print_r( db_2_utf8::singleton()->errorInfo(),1));return false;}
    		else{return true;}
    	}

   }
?>