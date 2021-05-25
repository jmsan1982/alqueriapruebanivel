<?php
/**
 * Created by PhpStorm.
 * User: marcos
 * Date: 10/12/2018
 * Time: 9:39
 */

class historico_domiciliaciones_trimestrales_patronato
{

    public static function getLastDomiciliation()
    {
        return db::singleton()->query('select MAX(fecha_domiciliacion) from historico_domiciliaciones_trimestrales_patronato');
    }

}