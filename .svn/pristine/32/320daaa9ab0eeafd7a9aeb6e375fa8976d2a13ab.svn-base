<?php


class activarFormularios
{
    /**********************
     ****  METODOS FIND  ***
     ***********************/
    public static function findActivador()
    {   return db::singleton()->query('SELECT * FROM activar_inscripciones')->fetchAll();   }

    /**********************
     **** METODOS UPDATE ***
     ***********************/
    public static function updateLigaSenior($value)
    {
        $sql='
            UPDATE	activar_inscripciones 
			SET 
					liga_senior=:value';

        $query=db::singleton()->prepare($sql);

        $datos=array(
            ':value'=>$value);

        if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));return false;}
        else{return self::findActivador();}
    }
}