<?php
class encuestas_preguntas
{
    public static function findByIdEncuesta($id_encuesta)
    {
        $sentencia_SQL='SELECT '
                        . ' id, '
                        . ' tipo_pregunta, '
                        . ' pregunta, '
                        . ' opciones_select, '
                        . ' es_multiselect,  '
                        . ' required '
                    . ' FROM encuestas_preguntas '
                    . ' WHERE id_encuesta = '.$id_encuesta;
        
        $query = db::singleton()->query($sentencia_SQL);
        if ($query)
            return $query->fetchAll();
        else
            return false;
    }
    
    
    
    
    
    
    
    public static function findAll()
    {
        $query = db::singleton()->query('select * from encuestas_preguntas');
        if ($query)
            return $query->fetchAll();
        else
            return false;
    }

    public static function findById($id)
    {
        $query = db::singleton()->query('select * from encuestas_preguntas where id="' . $id . '"');
        if ($query)
            return $query->fetch();
        else
            return false;
    }
    
    
    
    public static function insert($nombre,$fecha_creacion,$tipo_encuesta)
    {
        $sql="insert into encuestas_preguntas (id_encuesta,tipo_pregunta,pregunta) values (:idencuesta,:tipopregunta,:pregunt)";
        $query=db::singleton()->prepare($sql);
        
        if(!$query)
        {
            var_dump( db::singleton()->errorInfo ());
            die;
        }
        
        $datos=array(':idencuesta'=>$nombre,':tipopregunta'=>$fecha_creacion,':pregunt'=>$tipo_encuesta);
        
        if(!$query->execute($datos))
        {
            var_dump( $query->errorInfo ());
            die;
        }
    }
}
?>
