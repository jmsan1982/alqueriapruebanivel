<?php
/**
 * Created by PhpStorm.
 * User: marcos
 * Date: 10/12/2018
 * Time: 9:39
 */

class historico_domiciliaciones_trimestrales_inscripciones
{

    public static function newDomiciliation($myValues)
    {
        return db::singleton()->query('insert into historico_domiciliaciones_trimestrales_inscripciones (id_formularioinscripciones, fecha_domiciliacion, nombre_apellidos, mes_domiciliado, dni_titular, cuenta_bancaria_completa) 
          values '.$myValues);
    }

    public static function newDomiciliation2($myValues)
    {
        $sql = "insert into historico_domiciliaciones_trimestrales_inscripciones (id_formularioinscripciones, fecha_domiciliacion, nombre_apellidos, mes_domiciliado, dni_titular, cuenta_bancaria_completa) 
          values :myValues";
        $query = db::singleton()->prepare($sql);

        if (!$query) {
            var_dump(db::singleton()->errorInfo());
            die;
        }

        $datos = array(':myValues' => $myValues);

        if (!$query->execute($datos)) {
            var_dump($query->errorInfo());
            die;
        } else {
            return true;
        }

        if (!$query) {
            var_dump(db::singleton()->errorInfo());
            die;
        }

        $datos = array(
            ':myValues' => $myValues
        );

        if (!$query->execute($datos)) {
            var_dump($query->errorInfo());
            die;
        } else {
            return true;
        }
    }

    public static function getLastDomiciliation()
    {
        return db::singleton()->query('select MAX(fecha_domiciliacion) from historico_domiciliaciones_trimestrales_inscripciones');
    }

}