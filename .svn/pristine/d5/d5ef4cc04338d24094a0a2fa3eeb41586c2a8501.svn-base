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
    
    public static function findByEmailYIdEncuesta($email, $id_encuesta)
    {
        $query = db::singleton()->query('select * from encuestas_participantes where email="'.$email.'" AND id_encuesta='.$id_encuesta);
        if ($query)
            return $query->fetch();
        else
            return false;
    }

    public static function findById($id)
    {
        $query = db::singleton()->query('select * from encuestas_participantes where id='.$id);
        if ($query)
            return $query->fetch();
        else
            return false;
    }
    
    public static function findByIdEncuesta($id_encuesta)
    {
        $query = db::singleton()->query('select * from encuestas_participantes where id_encuesta="' . $id_encuesta . '"');
        if ($query)
            return $query->fetchAll();
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
        
        $datos=array(':email'=>$email,':idencuesta'=>$id_encuesta,':fechaparti'=>$fecha_participacion,":politica"=>$acepta_politica_privacidad,':nom'=>$nombre, ':anyos'=>$edad, ':gen'=>$genero, ':nac'=>$nacionalidad, ':cp'=>$codigopostal);
        
        if(!$query->execute($datos))
        {
            var_dump( $query->errorInfo ());
            die;
        }
        
        return self::findLast();
    }
    
    public static function insert_anonimo($email,$id_encuesta,$fecha_participacion, $acepta_politica_privacidad)
    {
        $sql="  INSERT INTO encuestas_participantes (email,     id_encuesta,    fecha_participacion,    acepta_politica_privacidad) "
        . "     VALUES                              (:email,    :idencuesta,    :fechaparti,            :politica)";
        $query=db::singleton()->prepare($sql);
        
        if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}
        
        $datos=array(':email'=>$email,':idencuesta'=>$id_encuesta,':fechaparti'=>$fecha_participacion,":politica"=>$acepta_politica_privacidad);
        
        if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));return false;}
        else{return self::findLast();}
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
