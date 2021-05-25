<?php
class encuestas_participantes
{
    public static function findAll()
    {
        $query = db::singleton()->query('select * from encuestas_participantes');
        if ($query)
            return $query->fetchAll();
        else
            return false;
    }

    public static function findByEmail($email, $id_encuesta)
    {
        $query = db::singleton()->query('select * from encuestas_participantes where email="'.$email.'" AND id_encuesta='.$id_encuesta);
        if ($query)
            return $query->fetchAll();
        else
            return false;
    }

    public static function findById($id)
    {
        $query = db::singleton()->query('select * from encuestas_participantes where id="' . $id . '"');
        if ($query)
            return $query->fetch();
        else
            return false;
    }
    
    public static function findByIdEncuesta($id_encuesta)
    { //error_log('select * from encuestas_participantes where id_encuesta="' . $id_encuesta . '"');
        $query = db::singleton()->query('select * from encuestas_participantes where id_encuesta="' . $id_encuesta . '"');
        if ($query)
            return $query->fetchAll();
        else
            return false;
    }


    /*consulta para exportar los datos de los participantes */
    public static function ExportByIdEncuesta($id_encuesta)
    {
        $query = db::singleton()->query('select email as Email, fecha_participacion as FechaParticipacion, nombre as Nombre, edad as Edad, genero as Genero, nacionalidad as Nacionalidad, codigopostal as C_Postal, acepta_politica_privacidad from encuestas_participantes where id_encuesta="' . $id_encuesta . '"');
        if ($query)
            return $query->fetchAll();
        else
            return false;
    }


    public static function CountParticipantesById($id)
    {
        //error_log(print_r('SELECT count(*) FROM encuestas_participantes WHERE id_encuesta="' . $id . '"'), 1);
        $query = db::singleton()->query('SELECT count(*) FROM encuestas_participantes WHERE id_encuesta="' . $id . '"');
        if ($query)
            return $query->fetch();
        else
            return false;
    }

    
    
    public static function insert($email,$id_encuesta,$fecha_participacion, $acepta_politica_privacidad, $nombre, $edad, $genero, $nacionalidad, $codigopostal)
    {
        $sql="insert into encuestas_participantes (email,id_encuesta,fecha_participacion,acepta_politica_privacidad, nombre, edad, genero, nacionalidad, codigopostal) values (:email,:idencuesta,:fechaparti,:politica, :nom, :anyos,:gen, :nac, :cp)";
        $query=db::singleton()->prepare($sql);
        
        if(!$query)
        {
            var_dump( db::singleton()->errorInfo ());
            die;
        }
        
        $datos=array(':email'=>$email,':idencuesta'=>$id_encuesta,':fechaparti'=>$fecha_participacion,":politica"=>$acepta_politica_privacidad,':nom'=>$nombre, ':anyos'=>$edad, ':gen'=>$genero ,':nac'=>$nacionalidad, ':cp'=>$codigopostal);
        
        if(!$query->execute($datos))
        {
            var_dump( $query->errorInfo ());
            die;
        }
        
        return self::findLast();
    }
    
    public static function findLast(){
        $query = db::singleton()->query('select * from encuestas_participantes order by id desc limit 1');
        if ($query)
            return $query->fetch();
        else
            return false;
    }
}
?>
