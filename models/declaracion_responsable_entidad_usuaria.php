<?php
/************************************************
Code Generator: 		V2.0 (2020-03-26)
Autor: 					Alex Momplet
Fecha de la generación: 2020-10-26 17:27:50
Base de datos: 			alqueriaforms
Clase de capa: 			models
 ************************************************/

class declaracion_responsable_entidad_usuaria
{
    /**********************
     ****  METODOS FIND  ***
     ***********************/

    public static function findAllEntidadUsuaria()
    {   return db::singleton()->query('SELECT * FROM declaracion_responsable_entidad_usuaria')->fetchAll();   }

    public static function findLast()
    {   return db::singleton()->query('SELECT * FROM declaracion_responsable_entidad_usuaria ORDER BY id desc limit 1')->fetch();    }

    public static function getCount()
    {   return db::singleton()->query('SELECT *,count(*) FROM declaracion_responsable_entidad_usuaria GROUP BY id')->fetch();    }

    public static function getAttributeList()
    {
        return db::singleton()->query(
            'SELECT
                COLUMN_NAME, DATA_TYPE
            FROM
                INFORMATION_SCHEMA.COLUMNS
            WHERE
                TABLE_SCHEMA="alqueriaforms" and table_name="declaracion_responsable_entidad_usuaria"')->fetchAll();
    }

    public static function findBydni($dni)
    {   return db::singleton()->query('SELECT * FROM declaracion_responsable_entidad_usuaria WHERE dni="'.$dni.'"')->fetch();}

    public static function findBynombre_completo($nombre_completo)
    {   return db::singleton()->query('SELECT * FROM declaracion_responsable_entidad_usuaria WHERE nombre_completo="'.$nombre_completo.'"')->fetch();}


    /***********************
     ****  METODO INSERT  ***
     ***********************/

    public static function insert($nombre_completo, $dni, $telefono, $email, $domicilio_completo, $equipo, $firma)
    {
        $sql='
            INSERT INTO declaracion_responsable_entidad_usuaria(nombre_completo, dni, telefono, email, domicilio_completo, equipo, firma)
			VALUES(:nombre_completo, :dni, :telefono, :email, :domicilio_completo, :equipo, :firma)';

        $query=db::singleton()->prepare($sql);
        if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}
        $datos=array(':nombre_completo' => $nombre_completo, ':dni' => $dni, ':telefono' => $telefono, ':email' => $email, ':domicilio_completo' => $domicilio_completo, ':equipo' => $equipo, ':firma' => $firma);

        if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));return false;}
        else{return self::findLast();}
    }


    /**********************
     **** METODOS UPDATE ***
     ***********************/
    public static function update($id, $nombre_completo, $dni, $telefono, $domicilio_completo, $firma)
    {
        $sql='
            UPDATE	declaracion_responsable_entidad_usuaria 
			SET 
					nombre_completo=:nombre_completo,dni=:dni,telefono=:telefono,domicilio_completo=:domicilio_completo,firma=:firma 
			WHERE
					id=:id';

        $query=db::singleton()->prepare($sql);

        $datos=array(
            ':id'=>$id,
            ':nombre_completo'=>$nombre_completo,':dni'=>$dni,':telefono'=>$telefono,':domicilio_completo'=>$domicilio_completo,':firma'=>$firma);

        if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));return false;}
        else{return self::findByid($id);}
    }

    public static function updateAttribute($id,$nombreAtributo,$valorAtributo,$ponerComillas="no")
    {
        if($ponerComillas==="no")
        {
            if($valorAtributo==0 )
            {
                $sentencia_sql="UPDATE declaracion_responsable_entidad_usuaria SET ".$nombreAtributo."=0 WHERE id=".$id;
            }
            else if($valorAtributo=="null" || is_null($valorAtributo) || empty($valorAtributo))
            {
                $sentencia_sql="UPDATE declaracion_responsable_entidad_usuaria SET ".$nombreAtributo."=null WHERE id=".$id;
            }
            else
            {
                $sentencia_sql="UPDATE declaracion_responsable_entidad_usuaria SET ".$nombreAtributo."=".$valorAtributo." WHERE id=".$id;
            }
        }
        else
        {
            if($valorAtributo=="0" )
            {
                $sentencia_sql="UPDATE declaracion_responsable_entidad_usuaria SET ".$nombreAtributo."='".$valorAtributo."' WHERE id=".$id;
            }
            else if($valorAtributo=="null" || is_null($valorAtributo) || empty($valorAtributo))
            {
                $sentencia_sql="UPDATE declaracion_responsable_entidad_usuaria SET ".$nombreAtributo."=null WHERE id=".$id;
            }
            else{
                $sentencia_sql="UPDATE declaracion_responsable_entidad_usuaria SET ".$nombreAtributo."='".$valorAtributo."' WHERE id=".$id;
            }
        }

        $query=db::singleton()->prepare($sentencia_sql);

        if(!$query){error_log(print_r( db::singleton()->errorInfo()),1);return false;}

        $datos=array("");

        if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));return false;}
        else{return self::findByid($id);}
    }


    /**********************
     **** METODOS DELETE ***
     ***********************/
    public static function deleteAll()
    {
        $sql='DELETE FROM declaracion_responsable_entidad_usuaria';

        $query=db::singleton()->prepare($sql);

        if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

        $datos=array();

        if(!$x=$query->execute($datos)){error_log(print_r( db::singleton()->errorInfo(),1 ));return false;}
        else{return true;}
    }

    public static function deleteBydni($dni)
    {
        $sql="DELETE FROM declaracion_responsable_entidad_usuaria WHERE dni=:dni";

        $query=db::singleton()->prepare($sql);

        if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

        $datos=array(':dni'=>$dni);

        if(!$x=$query->execute($datos)){error_log(print_1( db::singleton()->errorInfo(), 1));return false;}
        else{return true;}
    }

    public static function deleteBynombre_completo($nombre_completo)
    {
        $sql="DELETE FROM declaracion_responsable_entidad_usuaria WHERE nombre_completo=:nombre_completo";

        $query=db::singleton()->prepare($sql);

        if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

        $datos=array(':nombre_completo'=>$nombre_completo);

        if(!$x=$query->execute($datos)){error_log(print_1( db::singleton()->errorInfo(), 1));return false;}
        else{return true;}
    }

    // Para la consulta de exportar a Excel
    public static function findAllInscripcionesExcel() {
        $query = db::singleton()->query('select telefono, convert(cast(convert(nombre_completo using latin1) as binary) using utf8) as nombre, convert(cast(convert(dni using latin1) as binary) using utf8) as dni, convert(cast(convert(domicilio_completo using latin1) as binary) using utf8) as domicilio from declaracion_responsable_entidad_usuaria order by id desc');
        if ($query)
            return $query->fetchAll(PDO::FETCH_ASSOC);

        else
            return false;
    }

}
?>