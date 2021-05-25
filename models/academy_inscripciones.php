<?php 
    /************************************************
    Model Generator:        V1.03 (2019-02-22) 
    Autor:                  Ricardo Alemany
    Fecha de la generación: 2020-03-26 11:26:18
    ************************************************/

    class academy_inscripciones
    {
        /**********************
        **** METODOS FIND ***
        ***********************/
        public static function findByID($ID)
        {   return db_utf8::singleton()->query('select * from academy_inscripciones WHERE ID='.$ID)->fetch();   }

        public static function findBynumero_pedido($numero_pedido)
        {   return db_utf8::singleton()->query('select * from academy_inscripciones WHERE numero_pedido='.'"'.$numero_pedido.'"')->fetch(); }
        
        public static function findAll()
        {   return db_utf8::singleton()->query('select * from academy_inscripciones')->fetchAll();  }

        public static function findLast()
        {   return db_utf8::singleton()->query('select * from academy_inscripciones order by ID desc limit 1')->fetch();    }

        public static function getCount()
        {   return db_utf8::singleton()->query('select *,count(*) from academy_inscripciones group by ID')->fetch();    }
        
    	public static function insert($numero_pedido, $nombre, $apellidos, $fecha_nacimiento, $telefono, 
            $movil, $email, $tratamiento_medico, $alergia, $club, 
            $categoria, $altura, $talla, $trayectoria, $titular, $dnititular, $iban, $entidad, $oficina, $dc, $cuenta, $pagado, 
            $errorcode)
        {        
            $sql='INSERT INTO academy_inscripciones(
                    numero_pedido, nombre, apellidos, fecha_nacimiento, telefono, 
                    movil,  email, tratamiento_medico, alergia, club, 
                    categoria, altura, talla, trayectoria, titular, dni_titular, iban, entidad, oficina, dc, cuenta, pagado, 
                    errorcode)
                VALUES( :numero_pedido, :nombre, :apellidos, :fecha_nacimiento, :telefono, 
                        :movil, :email, :tratamiento_medico, :alergia, :club, 
                        :categoria, :altura, :talla, :trayectoria, :titular, :dnititular, :iban, :entidad, :oficina, :dc, :cuenta, :pagado, 
                        :errorcode)';

            $query=db_utf8::singleton()->prepare($sql); 
            if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}
            $datos=array(':numero_pedido'=>$numero_pedido,':nombre'=>$nombre,':apellidos'=>$apellidos,':fecha_nacimiento'=>$fecha_nacimiento,
                        ':telefono'=>$telefono, ':movil'=>$movil,':email'=>$email,':tratamiento_medico'=>$tratamiento_medico,':alergia'=>$alergia,
                        ':club'=>$club,':categoria'=>$categoria,':altura'=>$altura,':talla'=>$talla,':trayectoria'=>$trayectoria,':pagado'=>$pagado,
                        ':errorcode'=>$errorcode,':titular'=>$titular,':dnititular'=>$dnititular,':iban'=>$iban,':entidad'=>$entidad,':oficina'=>$oficina,
                        ':dc'=>$dc,':cuenta'=>$cuenta);
                
            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));return false;}
            else{return self::findLast();}
        }

        public static function update($ID, $numero_pedido, $nombre, $apellidos, $fecha_nacimiento, 
            $telefono, $movil, $email, $tratamiento_medico, $alergia, 
            $club, $categoria, $altura, $talla, $trayectoria, 
            $pagado, $errorcode)
        {        
            $sql='UPDATE academy_inscripciones 
                    SET 
                        id=:id,numero_pedido=:numero_pedido,nombre=:nombre,apellidos=:apellidos,fecha_nacimiento=:fecha_nacimiento,
                        telefono=:telefono,movil=:movil,email=:email,tratamiento_medico=:tratamiento_medico,alergia=:alergia,
                        club=:club,categoria=:categoria,altura=:altura,talla=:talla,trayectoria=:trayectoria,
                        pagado=:pagado,errorcode=:errorcode 
                    WHERE
                        ID=:id';

            $query=db_utf8::singleton()->prepare($sql);
            
            $datos=array(':id'=>$ID,':numero_pedido'=>$numero_pedido,':nombre'=>$nombre,':apellidos'=>$apellidos,':fecha_nacimiento'=>$fecha_nacimiento,
                ':telefono'=>$telefono,':movil'=>$movil,':email'=>$email,':tratamiento_medico'=>$tratamiento_medico,':alergia'=>$alergia,
                ':club'=>$club,':categoria'=>$categoria,':altura'=>$altura,':talla'=>$talla,':trayectoria'=>$trayectoria,
                ':pagado'=>$pagado,':errorcode'=>$errorcode);
    
            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));return false;}
            else{return self::findByID($ID);}
        }

        public static function updateAttribute($id,$nombreAtributo,$valorAtributo,$ponerComillas="no")
        {
            if($ponerComillas==="no")
            {   
                if($valorAtributo==0 )
                {
                    $sentencia_sql="UPDATE academy_inscripciones SET ".$nombreAtributo."=0 WHERE ID=".$id;
                }
                else if($valorAtributo=="null" || is_null($valorAtributo) || empty($valorAtributo))
                {
                    $sentencia_sql="UPDATE academy_inscripciones SET ".$nombreAtributo."=null WHERE ID=".$id;
                }
                else
                {
                    $sentencia_sql="UPDATE academy_inscripciones SET ".$nombreAtributo."=".$valorAtributo." WHERE ID=".$id;
                }
            }
            else
            {   
                if($valorAtributo=="0" )
                {
                    $sentencia_sql="UPDATE academy_inscripciones SET ".$nombreAtributo."='".$valorAtributo."' WHERE ID=".$id;
                }
                else if($valorAtributo=="null" || is_null($valorAtributo) || empty($valorAtributo))
                {
                    $sentencia_sql="UPDATE academy_inscripciones SET ".$nombreAtributo."=null WHERE ID=".$id;
                }
                else{
                    $sentencia_sql="UPDATE academy_inscripciones SET ".$nombreAtributo."='".$valorAtributo."' WHERE ID=".$id;
                }
            }

            //error_log( $sentencia_sql );
            $query=db_utf8::singleton()->prepare($sentencia_sql);

            if(!$query){error_log(print_r( db_utf8::singleton()->errorInfo()),1);return false;}

            $datos=array("");

            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));return false;}
            else{return self::findByID($id);}
        }

        //  Si el tpv da error grabamos el error en el registro
        public static function actualizacodigoerror($pedido, $codigo_error)
        {
            $sql = "UPDATE academy_inscripciones SET errorcode=:error  WHERE numero_pedido=:numero";
            $query = db_utf8::singleton()->prepare($sql);

            if (!$query) {
                return false;
            }

            $datos = array(':numero' => $pedido, ':error' => $codigo_error);

            if (!$query->execute($datos)) {
                return false;
            } 
            else {
                return true;
            }
        }


        /**********************
        **** METODOS DELETE ***
        ***********************/
        public static function deleteAll()
        {
            $sql='delete from academy_inscripciones';

            $query=db_utf8::singleton()->prepare($sql);

            if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

            $datos=array();

            if(!$x=$query->execute($datos)){error_log(print_r( db_utf8::singleton()->errorInfo(),1));return false;}
        }

        public static function deleteByID($ID)
    	{
    		$sql="delete from academy_inscripciones where ID=:id";

    		$query=db_utf8::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

    		$datos=array(':id'=>$ID);

    		if(!$x=$query->execute($datos)){error_log(print_r( db_utf8::singleton()->errorInfo(),1));return false;}
    	}

        public static function deleteBynumero_pedido($numero_pedido)
    	{
    		$sql="delete from academy_inscripciones where numero_pedido=:numero_pedido";

    		$query=db_utf8::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

    		$datos=array(':numero_pedido'=>$numero_pedido);

    		if(!$x=$query->execute($datos)){error_log(print_r( db_utf8::singleton()->errorInfo()));return false;}
    	}
   }
?>