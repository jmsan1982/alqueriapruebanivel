<?php
class inscripciones_eventos
{
    public static function findByEmailYEvento($email,$evento)
    {
        return db_utf8::singleton()->query('select distinct id_inscripcion from inscripciones_eventos where email like "' .$email. '" AND evento like "' .$evento. '"' )->fetch();
    }
    
    public static function findAllByEvento($evento)
    {
        $sentencia_sql=''
        . ' SELECT'
        . '     nombre,apellidos,empresa_club,email,movil,cantidad_packs,comentario,fecha_inscripcion '
        . ' FROM '
        . '     inscripciones_eventos'
        . ' WHERE evento like "'.$evento.'"';
        
        //  error_log(__FILE__.__LINE__);
        //  error_log($sentencia_sql);
        
        return db_utf8::singleton()->query($sentencia_sql)->fetchall();
    }
    
    public static function newFormAdidasNext2019(
        $nombre,            $apellidos,             $empresa_club,      $email,     $movil, 
        $cantidad_packs,    $fecha_inscripcion,     $comentario,        $evento)
    {
        $sentencia_sql= "INSERT INTO inscripciones_eventos(
                            nombre,             apellidos,      empresa_club,       email   ,movil,
                            cantidad_packs,     comentario,     fecha_inscripcion,  evento)
                        VALUES(
                            :nombre,:apellidos,:empresa,:email,:movil,
                            :cantidad_packs,:comentario,:fecha_inscripcion,:evento)";
        $query = db_utf8::singleton()->prepare($sentencia_sql);
        if(!$query)
        {
            error_log(__FILE__.__LINE__);
            error_log(print_r(db_utf8::singleton()->errorInfo(),1));
            return false;
        }
        $datos = array(
            ':nombre'               => $nombre,
            ':apellidos'            => $apellidos,
            ':empresa'              => $empresa_club,
            ':email'                => $email,
            ':movil'                => $movil,
            ':cantidad_packs'       => $cantidad_packs,
            ':fecha_inscripcion'    => $fecha_inscripcion,
            ':comentario'           => $comentario,
            ':evento'               => $evento
        );
        if (!$query->execute($datos)) {
            error_log(__FILE__.__LINE__);
            error_log(print_r(db_utf8::singleton()->errorInfo(),1));
            return false;
        } 
        else{
            return true;
        }       
    }
    
    
    /***************************************
     *      MÉTODOS OBSOLETOS: marcos 2018
     ******************************
    public static function findLastMaxIdInscripcion(){
        return db::singleton()->query('select MAX(id_inscripcion) from inscripciones_eventos')->fetch();
    }

    public static function findNombreApellidos($nombreCompleto){
        return db::singleton()->query('select nombre_apellidos from inscripciones_eventos where nombre_apellidos like "' .$nombreCompleto. '"');
    }
    
    public static function newForm($nombre_apellidos,$empresa_club,$cargo,$profesion,$email,$movil,$cantidad_packs,$precio_pagar,$fecha_inscripcion,$fecha_pago,$evento,$pagado){
        $sqlInsertInInscripcionesPatronato = "INSERT INTO inscripciones_eventos(nombre_apellidos,empresa_club,cargo,profesion,email,movil,cantidad_packs,precio_pagar,
                fecha_inscripcion,fecha_pago,evento,pagado)
                    values(:nombre_apellidos,:empresa_club,:cargo,:profesion,:email,:movil,:cantidad_packs,:precio_pagar,:fecha_inscripcion,:fecha_pago,:evento,:pagado)";

        $query = db::singleton()->prepare($sqlInsertInInscripcionesPatronato);

        if (!$query) {
            var_dump(db::singleton()->errorInfo());
            die;
        }

        $datos = array(
            ':nombre_apellidos' => $nombre_apellidos,
            ':empresa_club' => $empresa_club,
            ':cargo' => $cargo,
            ':profesion' => $profesion,
            ':email' => $email,
            ':movil' => $movil,
            ':cantidad_packs' => $cantidad_packs,
            ':precio_pagar' => $precio_pagar,
            ':fecha_inscripcion' => $fecha_inscripcion,
            ':fecha_pago' => $fecha_pago,
            ':evento' => $evento,
            ':pagado' => $pagado,
        );

        if (!$query->execute($datos)) {
            var_dump($query->errorInfo());
            error_log("error de insert");
            die;
        } else{
            return true;
        }

       
    }
    
    public static function findIdByNombre($nombreCompleto){
        return db::singleton()->query('select distinct id_inscripcion from inscripciones_eventos where nombre_apellidos like "' .$nombreCompleto. '"')->fetch();
    }
    */
}