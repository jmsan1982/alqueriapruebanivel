<?php
class encuestas_respuestas
{
    public static function findAll()
    {
        $query = db::singleton()->query('select * from encuestas_respuestas');
        if ($query)
            return $query->fetchAll();
        else
            return false;
    }

    public static function findById($id)
    {
        $query = db::singleton()->query('select * from encuestas_respuestas where id="' . $id . '"');
        if ($query)
            return $query->fetch();
        else
            return false;
    }

    public static function findPreguntasById($id)
    {
        $query = db_utf8::singleton()->query('select pregunta from encuestas_preguntas where id_encuesta="' . $id . '"');
        if ($query)
            return $query->fetchAll();
        else
            return false;
    }

    public static function findIdPreguntasByIdEncuesta($id)
    {
        $query = db_utf8::singleton()->query('select id from encuestas_preguntas where id_encuesta="' . $id . '"');
        if ($query)
            return $query->fetchAll();
        else
            return false;
    }

    public static function findUsuariosByIdPregunta($id)
    {
        $query = db_utf8::singleton()->query('select id_participante from encuestas_respuestas where id_pregunta="' . $id . '"');
        if ($query)
            return $query->fetchAll();
        else
            return false;
    }


    public static function findRespuestasByIdUsuario($id)
    {
        $query = db_utf8::singleton()->query('select * from encuestas_respuestas where id_participante="' . $id . '" ORDER BY id_pregunta ASC');
        if ($query)
            return $query->fetchAll();
        else
            return false;
    }

    public static function findTipoByIdPregunta($id)
    {
        $query = db_utf8::singleton()->query('select tipo_pregunta from encuestas_preguntas where id="' . $id . '"');
        if ($query)
            return $query->fetchAll();
        else
            return false;
    }

    public static function findNumerodePreguntasByIdEncuesta($id)
    {
        $query = db_utf8::singleton()->query('SELECT COUNT(id) from encuestas_preguntas where id_encuesta = "' . $id . '"');
        if ($query)
            return $query->fetchAll();
        else
            return false;
    }




    // SELECT * FROM `encuestas_respuestas` WHERE id_participante = 745 ORDER BY id_pregunta ASC


    
    public static function findByIdPregunta($id_pregunta)
    {
        $query = db::singleton()->query('select * from encuestas_respuestas where id_pregunta="' . $id_pregunta . '"');
        if ($query)
            return $query->fetchAll();
        else
            return false;
    }

    //para mostrar los resultados de las respuestas abierta que tengan datos, hay registros sin nada escrito
    public static function findByIdPreguntaAbierta($id_pregunta)
    {
       // error_log('select * from encuestas_respuestas where respuesta_abierta <>"" and id_pregunta="' . $id_pregunta . '"');
        $query = db::singleton()->query('select * from encuestas_respuestas where respuesta_abierta <>"" and id_pregunta="' . $id_pregunta . '"');
        if ($query)
            return $query->fetchAll();
        else
            return false;
    }


    //para mostrar los resultados de las respuestas tipo select
    public static function findByIdPreguntaSelect($id_pregunta)
    {

       // error_log(print_r('select respuesta_abierta, count(*) as total from encuestas_respuestas where respuesta_abierta <>"" and id_pregunta="' . $id_pregunta . '" group by respuesta_abierta'),1);
        $query = db::singleton()->query('select respuesta_abierta, count(*) as total from encuestas_respuestas where respuesta_abierta <>"" and id_pregunta="' . $id_pregunta . '" group by respuesta_abierta order by total desc');
        if ($query)
            return $query->fetchAll();
        else
            return false;    
    }

    //para mostrar los resultados de las respuestas en excel
    public static function ExportRespuestasExcel($between)
    {
       
      
        $query = db::singleton()->query('select p.id as Codigo, p.pregunta, if(r.respuesta_simple=1, "Si", 0) as RespuestaSimple, if(r.respuesta_abierta="" and r.respuesta_simple=0, "Sin contestar",r.respuesta_abierta ) as RespuestaAbierta, count(*) as total 
            from encuestas_respuestas  r  inner join encuestas_preguntas p ON p.id=r.id_pregunta
            where  r.id_pregunta '. $between .'
            group by p.pregunta, r.respuesta_abierta order by p.id, total desc');

        if ($query)
             return $query->fetchAll(PDO::FETCH_ASSOC);
        else
            return false;    
    }



    
    /* M??todo que saca la media de una puntuaci??n cuando el tipo de pregunta tiene respuestas num??ricas, lo redondeamos */
    public static function findAverageByIdPregunta($id_pregunta)
    {
        $query = db::singleton()->query('select round(AVG(respuesta_simple)) as average from encuestas_respuestas where id_pregunta="' . $id_pregunta . '"');
        if ($query)
            return $query->fetch();
        else
            return false;
    }
    
    public static function find0enPreguntaSiyNoByIdPregunta($id_pregunta)
    {
        $query = db::singleton()->query('select count(*) from encuestas_respuestas where respuesta_simple=0 AND id_pregunta="' . $id_pregunta . '"');
        if ($query)
            return $query->fetch();
        else
            return false;
    }
    
    public static function find1enPreguntaSiyNoByIdPregunta($id_pregunta)
    {
        $query = db::singleton()->query('select count(*) from encuestas_respuestas where respuesta_simple=1 AND id_pregunta="' . $id_pregunta . '"');
        if ($query)
            return $query->fetch();
        else
            return false;
    }
    
    public static function findByIdParticipante($id_participante)
    {
        $query = db::singleton()->query('select * from encuestas_respuestas where id_participante="' . $id_participante . '"');
        if($query)
            return $query->fetchAll();
        else
            return false;
    }
    
    public static function findParticipantesByIdPregunta($id_pregunta)
    {
        $query = db::singleton()->query('select id_participante from encuestas_respuestas where id_pregunta="' . $id_pregunta . '" group by id_participante');
        if($query)
            return $query->fetchAll();
        else
            return false;
    }
    
    public static function findByIdParticipanteYIdPregunta($id_participante,$id_pregunta)
    {
        $query = db::singleton()->query('SELECT * FROM encuestas_respuestas WHERE '
        . ' id_participante='.$id_participante.' AND id_pregunta='.$id_pregunta);
        if($query)
            return $query->fetch();
        else
            return false;
    }
    
    public static function findByIdParticipanteYIdEncuesta($id_participante,$id_encuesta)
    {
error_log(__FILE__.__FUNCTION__.__LINE__);

        $sentencia_sql="SELECT      * "
                    . " FROM        encuestas_respuestas "
                    . " INNER JOIN  encuestas_preguntas     ON  encuestas_preguntas.id = encuestas_respuestas.id_pregunta "
                    . " WHERE       encuestas_preguntas.id_encuesta=".$id_encuesta." AND id_participante=".$id_participante;
        
        error_log(__FILE__.__FUNCTION__.__LINE__);
        error_log($sentencia_sql);
        
        $query = db::singleton()->query($sentencia_sql);
        if($query)
        {   return $query->fetchAll();  }
        else
        {   return false;               }
    }
    
    public static function insert($id_pregunta,$id_participante,$respuesta_simple,$respuesta_abierta="")
    {
//        error_log(__FILE__.__LINE__);
//         error_log(__FILE__.__LINE__);
//          error_log(__FILE__.__LINE__);
//           error_log(__FILE__.__LINE__);
//        error_log($id_pregunta.$id_participante.$respuesta_simple.$respuesta_abierta);
        $sql="insert into encuestas_respuestas (id_pregunta,id_participante,respuesta_simple,respuesta_abierta) "
                . "values (:idpregunta,:idparticipante,:respuestasimple,:respuestaabierta)";
        $query=db::singleton()->prepare($sql);
        
        if(!$query)
        {
            var_dump( db::singleton()->errorInfo ());
            die;
        }
        
        $datos=array(':idpregunta'=>$id_pregunta,':idparticipante'=>$id_participante,':respuestasimple'=>$respuesta_simple,':respuestaabierta'=>$respuesta_abierta);
        
        if(!$query->execute($datos))
        {
            var_dump( $query->errorInfo ());
            die;
        }
    }
}
?>
