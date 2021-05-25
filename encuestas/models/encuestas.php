<?php
class encuestas
{
    public static function findAll()
    {
        $query = db::singleton()->query('select * from encuestas');
        if ($query)
            return $query->fetchAll();
        else
            return false;
    }

    public static function findAllActivas()
    {
        $query = db::singleton()->query('select * from encuestas where activa=1');
        if ($query)
            return $query->fetchAll();
        else
            return false;
    }

    public static function findById($id)
    {
        $query = db::singleton()->query('select * from encuestas where id="' . $id . '"');
        if ($query)
            return $query->fetch();
        else
            return false;
    }
    
    public static function insert($nombre,$fecha_creacion,$tipo_encuesta,$activa)
    {
        $sql="insert into encuestas (nombre,fecha_creacion,tipo_encuesta,activa) values (:nom,:fech,:tipo,:act)";
        $query=db::singleton()->prepare($sql);
        
        if(!$query)
        {
            var_dump( db::singleton()->errorInfo ());
            die;
        }
        
        $datos=array(':nom'=>$nombre,':fech'=>$fecha_creacion,':tipo'=>$tipo_encuesta,':act'=>$activa);
        
        if(!$query->execute($datos))
        {
            var_dump( $query->errorInfo ());
            die;
        }
    }
}
?>
