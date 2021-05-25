<?php
    class encuestas_respuestas 
    {
        public static function findByIdParticipanteYIdEncuesta($id_participante,$id_encuesta)
        {
            $sentencia_sql="SELECT      * "
                        . " FROM        encuestas_respuestas "
                        . " INNER JOIN  encuestas_preguntas     ON  encuestas_preguntas.id = encuestas_respuestas.id_pregunta "
                        . " WHERE       encuestas_preguntas.id_encuesta=".$id_encuesta." AND id_participante=".$id_participante;
        
//            error_log(__FILE__.__FUNCTION__.__LINE__);
//            error_log($sentencia_sql);
        
            $query = db::singleton()->query($sentencia_sql);
            if($query)
            {   return $query->fetchAll();  }
            else
            {   return false;               }
        }
        
        public static function updateAttribute($id,$nombreAtributo,$valorAtributo,$ponerComillas="no")
        {
            if($ponerComillas==="no")
            {   
                if($valorAtributo==0 )
                {
                    $sentencia_sql="UPDATE encuestas_respuestas SET ".$nombreAtributo."=0   WHERE id=".$id;
                }
                else if($valorAtributo=="null" || is_null($valorAtributo) || empty($valorAtributo))
                {
                    $sentencia_sql="UPDATE encuestas_respuestas SET ".$nombreAtributo."=null WHERE id=".$id;
                }
                else
                {
                    $sentencia_sql="UPDATE encuestas_respuestas SET ".$nombreAtributo."=".$valorAtributo." WHERE id=".$id;
                }
            }
            else
            {   
                if($valorAtributo=="0" )
                {
                    $sentencia_sql="UPDATE encuestas_respuestas SET ".$nombreAtributo."='".$valorAtributo."' WHERE id=".$id;
                }
                else if($valorAtributo=="null" || is_null($valorAtributo) || empty($valorAtributo))
                {
                    $sentencia_sql="UPDATE encuestas_respuestas SET ".$nombreAtributo."=null WHERE id=".$id;
                }
                else{
                    $sentencia_sql="UPDATE encuestas_respuestas SET ".$nombreAtributo."='".$valorAtributo."' WHERE id=".$id;
                }
            }

//error_log(__FILE__.__FUNCTION__.__LINE__);
//error_log($sentencia_sql);

            $query=db::singleton()->prepare($sentencia_sql);

            if(!$query){error_log(print_r( db::singleton()->errorInfo()),1);return false;}

            $datos=array("");

            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));return false;}
            else{return self::findById($id);}
        }
        
        
        
        public static function findAll() {
            $query = db::singleton()->query('select * from encuestas_respuestas');
            if ($query)
                return $query->fetchAll();
            else
                return false;
        }

        
        /*  obsoleto ya que se mueve al modelo "encuestas_preguntas"
        public static function findAllByID($id)
        {
            $sentencia_SQL='SELECT '
                        . ' id, '
                        . ' tipo_pregunta, '
                        . ' convert(pregunta using utf8) as pregunta, '
                        . ' convert(opciones_select using utf8) as opciones_select, '
                        . ' es_multiselect  '
                    . ' FROM encuestas_preguntas '
                    . ' WHERE id_encuesta = '.$id;
            
            $query = db::singleton()->query($sentencia_SQL);

            if($query)
                return $query->fetchAll();
            else
                return false;
        }
        */

        public static function findById($id) {
            $query = db::singleton()->query('select * from encuestas_respuestas where id="' . $id . '"');
            if ($query)
                return $query->fetch();
            else
                return false;
        }

        
        public static function findByIdPregunta($id_pregunta) {
            $query = db::singleton()->query('select * from encuestas_respuestas where id_pregunta="' . $id_pregunta . '"');
            if ($query)
                return $query->fetchAll();
            else
                return false;
        }

        
        /* Método que saca la media de una puntuación cuando el tipo de pregunta tiene respuestas numéricas */
        public static function findAverageByIdPregunta($id_pregunta) {
            $query = db::singleton()->query('select AVG(respuesta_simple) as average from encuestas_respuestas where id_pregunta="' . $id_pregunta . '"');
            if ($query)
                return $query->fetch();
            else
                return false;
        }

        
        public static function find0enPreguntaSiyNoByIdPregunta($id_pregunta) {
            $query = db::singleton()->query('select count(*) from encuestas_respuestas where respuesta_simple=0 AND id_pregunta="' . $id_pregunta . '"');
            if ($query)
                return $query->fetch();
            else
                return false;
        }

        
        public static function find1enPreguntaSiyNoByIdPregunta($id_pregunta) {
            $query = db::singleton()->query('select count(*) from encuestas_respuestas where respuesta_simple=1 AND id_pregunta="' . $id_pregunta . '"');
            if ($query)
                return $query->fetch();
            else
                return false;
        }

        
        public static function findByIdParticipante($id_participante) {
            $query = db::singleton()->query('select * from encuestas_respuestas where id_participante="' . $id_participante . '"');
            if($query)
                return $query->fetchAll();
            else
                return false;
        }

        
        public static function findParticipantesByIdPregunta($id_pregunta) {
            $query = db::singleton()->query('select id_participante from encuestas_respuestas where id_pregunta="' . $id_pregunta . '" group by id_participante');
            if($query)
                return $query->fetchAll();
            else
                return false;
        }

        
        public static function findByIdParticipanteYIdPregunta($id_participante,$id_pregunta) {
            $query = db::singleton()->query('select * from encuestas_respuestas where id_participante=' . $id_participante . ' and id_pregunta=' . $id_pregunta);
            if($query)
                return $query->fetch();
            else
                return false;
        }
        

        public static function insert($id_pregunta,$id_participante,$respuesta_simple,$respuesta_abierta)
        {
            error_log("  INSERT INTO "
            . "         encuestas_respuestas (id_pregunta, id_participante, respuesta_simple, respuesta_abierta) "
            . "     VALUES                   (".$id_pregunta.",".$id_participante.", ".$respuesta_simple.", ".$respuesta_abierta.")");

            $sql="  INSERT INTO "
            . "         encuestas_respuestas (id_pregunta, id_participante, respuesta_simple, respuesta_abierta) "
            . "     VALUES                   (:idpregunta,:idparticipante, :respuestasimple, :respuestaabierta)";
            $query=db::singleton()->prepare($sql);
            
            if(!$query)
            {   error_log(print_r( $query->errorInfo(),1));return false;    }
            
            $datos=array(':idpregunta'=>$id_pregunta,           ':idparticipante'=>$id_participante,
                         ':respuestasimple'=>$respuesta_simple, ':respuestaabierta'=>$respuesta_abierta);
            
            if(!$query->execute($datos))
            {   error_log(print_r( $query->errorInfo(),1));return false;    }
            else
            {   return true;    }
        }


        public static function insertParticipante($email, $idEncuesta, $nombre, $fecha) {
            $sql='INSERT INTO `encuestas_participantes`(`id`, `email`, `id_encuesta`, `fecha_participacion`, `acepta_politica_privacidad`, `nombre`) VALUES (null,"' . $email . '",' . $idEncuesta . ',"' . $fecha . '",1,"' . $nombre . '")';
            $query=db::singleton()->prepare($sql);
            
            if(!$query)
            {
                var_dump( db::singleton()->errorInfo ());
                die;
            }
            
            $datos=array(':email'=>$email,':idEncuesta'=>$idEncuesta,':nombre'=>$nombre);
            
            if(!$query->execute($datos))
            {
                var_dump( $query->errorInfo ());
                die;
            }
            else{
                return self::findLastParticipante();
            }
        }

        
        public static function findLastParticipante() {
            return db::singleton()->query('select * from encuestas_participantes order by id desc limit 1')->fetch();
        }


        public static function findByEmail($email, $idEncuesta) {
            $query = db::singleton()->query('select * from encuestas_participantes where email="'.$email.'" AND id_encuesta='.$idEncuesta);
            if ($query)
                return $query->fetchAll();
            else
                return false;
        }
    }
?>