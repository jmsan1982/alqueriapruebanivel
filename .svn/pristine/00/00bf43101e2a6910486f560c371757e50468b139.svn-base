<?php
/**
 * Created by PhpStorm.
 * User: marcos
 * Date: 19/11/2018
 * Time: 1:15
 */

class Utils
{
    //  Método que comprueba el login */
    public static function compruebaLogin()
    {
        if(isset($_SESSION['usuario']) && !empty($_SESSION['usuario']))
        {
            return true;
        }
        else
        {
            echo json_encode(array(
                "response"          =>  "error",
                "message"           =>  'La sesión ha caducado. Por favor, vuelva a iniciar sesión.',
            ));
            die;
            //  header("Location:?r=login/loger");
        }
    }
    
    /**  depurar() comprueba si hay que depurar en log de errores y lo hace en caso afirmativo */
    public static function depurar($file_line_origen="",$force_debug="false")
    {
        if($force_debug==="true" || (filter_input(INPUT_POST, 'debug', FILTER_SANITIZE_STRING)==="true")){
            error_log("=============== Depuración que proviene desde: ".$file_line_origen);
            error_log(print_r($_POST,1));
        }
    }
    
    /* URLs creación de ficheros XML para domiciliar. */

    /* Producción */

    /* Local */

    /**
     * Extrae número de cuenta completa de una inscripción.
     * @param $inscripcion
     * @return int|string
     */
    public static function extractAccountFromInscription($inscripcion)
    {
        $solo_cuenta = explode("<br />IBAN", $inscripcion['contenido']);
        $solo_cuenta = $solo_cuenta[1];                         // IBAN: ES20<br />ENTIDAD: 0182<br />OFICINA: 7312<br />DC: 93<br />CUENTA: 0201514893
        $cuenta_troceada = explode("<br />", $solo_cuenta);

        $cuenta_troceada_0_explode = explode(": ", $cuenta_troceada[0]);
        $cuenta_troceada_1_explode = explode(": ", $cuenta_troceada[1]);
        $cuenta_troceada_2_explode = explode(": ", $cuenta_troceada[2]);
        $cuenta_troceada_3_explode = explode(": ", $cuenta_troceada[3]);
        $cuenta_troceada_4_explode = explode(": ", $cuenta_troceada[4]);

        if (isset($cuenta_troceada_0_explode[1])) {
            $datos_iban     = $cuenta_troceada_0_explode[1];
            $datos_entidad  = $cuenta_troceada_1_explode[1];
            $datos_oficina  = $cuenta_troceada_2_explode[1];
            $datos_dc       = $cuenta_troceada_3_explode[1];
            $datos_cuenta   = $cuenta_troceada_4_explode[1];
            $numeroDeCuenta = $datos_iban . $datos_entidad . $datos_oficina . $datos_dc . $datos_cuenta;

            return $numeroDeCuenta;
        } else {
            return 0;
        }

    }

    /**
     * Valida si una cuenta bancaria española es válida.
     * @param $accountNumber
     * @return bool
     */
    public static function validateEntity($accountNumber)
    {
        if (strlen($accountNumber) < 24) {
            return false;
        }

        $valores = [1, 2, 4, 8, 5, 10, 9, 7, 3, 6];
        $controlCS = 0;
        $controlCC = 0;

        for ($i = 0; $i <= 7; $i++) {
            $controlCS += $accountNumber[$i + 4] * $valores[$i + 2];
        }
        $controlCS = 11 - ($controlCS % 11);

        if ($controlCS == 11) {
            $controlCS = 0;
        } else if ($controlCS == 10) {
            $controlCS = 1;
        }

        for ($j = 0; $j <= 9; $j++) {
            $controlCC += $accountNumber[$j + 14] * $valores[$j];
        }
        $controlCC = 11 - ($controlCC % 11);

        if ($controlCC == 11) {
            $controlCC = 0;
        } else if ($controlCC == 10) {
            $controlCC = 1;
        }

        if ($accountNumber[12] == $controlCS && $accountNumber[13] == $controlCC) {
            return true;
        } else {
            return false;
        }

    }

    public static function getCuentaBancariaCompleta($inscripcion)
    {
        $numeroDeCuentaIBAN = explode("IBAN:", $inscripcion['contenido']);
        $solo_cuenta = $numeroDeCuentaIBAN[1];
        $cuenta_troceada = explode("<br />", $solo_cuenta);

        $cuenta_troceada_0_explode = explode(" ", $cuenta_troceada[0]);
        $cuenta_troceada_1_explode = explode(" ", $cuenta_troceada[1]);
        $cuenta_troceada_2_explode = explode(" ", $cuenta_troceada[2]);
        $cuenta_troceada_3_explode = explode(" ", $cuenta_troceada[3]);
        $cuenta_troceada_4_explode = explode(" ", $cuenta_troceada[4]);

        $datos_iban = $cuenta_troceada_0_explode[1];
        $datos_entidad = $cuenta_troceada_1_explode[1];
        $datos_oficina = $cuenta_troceada_2_explode[1];
        $datos_dc = $cuenta_troceada_3_explode[1];
        $datos_cuenta = $cuenta_troceada_4_explode[1];

        return ($datos_iban . $datos_entidad . $datos_oficina . $datos_dc . $datos_cuenta);
    }

    /**
     * Devuelve un array de hermanos agrupados por dni_pagador.
     * @param $setHermanos
     * @return array
     */
    public static function checkearHermanos($setHermanos)
    {
        $juntarHermanos     = [];
        $hermanosSanitize   = [];   //  resultado
        
        foreach ($setHermanos as $nombre => $cuentaBancaria) 
        {
            if (in_array($cuentaBancaria, $juntarHermanos)) 
            {
                $hermanoOriginal = array_search($cuentaBancaria, $juntarHermanos);
                $nuevoHermano = $nombre;

                $unirNombresHermanos = $hermanoOriginal . " -- " . $nuevoHermano;

                unset($juntarHermanos[array_search($cuentaBancaria, $juntarHermanos)]);

                array_push($juntarHermanos, $juntarHermanos[$unirNombresHermanos] = $cuentaBancaria);

                continue;
            }
            $juntarHermanos[$nombre] = $cuentaBancaria;
        }

        foreach ($juntarHermanos as $nombreApellidos => $cuentaBancaria) {
            if (!is_int($nombreApellidos)) {
                $hermanosSanitize[$nombreApellidos] = $cuentaBancaria;
            }
        }

        return $hermanosSanitize;

    }

    /**
     * Calcula el importe agrupado por hermanos.
     * @param $validInscripcionsAccount
     * @param $nombreHermanos
     * @return int
     */
    public static function getImporte($validInscripcionsAccount, $nombreHermanos)
    {
//        error_log("===========================================");
//        error_log("Comenzamos depurando el cálculo del importe");
//        error_log(__FILE__."/".__FUNCTION__."/".__LINE__);
//        error_log("\$validInscripcionsAccount");
//        error_log(print_r($validInscripcionsAccount,1));
//        error_log("\$nombreHermanos");
//        error_log(print_r($nombreHermanos,1));
        
        $totalImporte = 0;

        foreach ($validInscripcionsAccount as $inscripcion)
        {
            foreach($nombreHermanos as $nombreHermano) {
                if ($nombreHermano === $inscripcion['nombre_apellidos']) {
                    $totalImporte += $inscripcion['pendiente_matricula'];
                }
            }
        }
        return $totalImporte;
    }

    public static function getImporteTrimestre($validInscripcionsAccount, $nombreHermanos, $trimestre)
    {
        $totalImporte = 0;

        foreach ($validInscripcionsAccount as $inscripcion)
        {
            foreach ($nombreHermanos as $nombreHermano) {
                if ($nombreHermano === $inscripcion['nombre_apellidos']){
                    $totalImporte += $inscripcion["trimestre_".$trimestre];
                }
            }
        }
        return $totalImporte;
    }

    /**
     * Valida si un dni/nie es correcto.
     * @param $dni
     * @return string
     */
    public static function validateNieDni($dni)
    {
        if (strlen($dni) < 9) {
            return "incorrecto";
        }

        $dni = strtoupper($dni);

        $letra = substr($dni, -1, 1);
        $numero = substr($dni, 0, 8);

        // Si es un NIE hay que cambiar la primera letra por 0, 1 ó 2 dependiendo de si es X, Y o Z.
        $numero = str_replace(array('X', 'Y', 'Z'), array(0, 1, 2), $numero);

        $modulo = $numero % 23;
        $letras_validas = "TRWAGMYFPDXBNJZSQVHLCKE";
        $letra_correcta = substr($letras_validas, $modulo, 1);

        if ($letra_correcta != $letra) {
            return "incorrecto";
        } else {
            return "OK";
        }
    }

    public static function sanitizeNombre($nombre)
    {


    }

    public static function checkNombresUnicos($nombre)
    {
        require "models/inscripciones.php";

        $nombreDb = inscripciones_patronato::findNombreApellidos($nombre);
        $existente = "0";

        if ($nombreDb) {
            $existente = "1";
        }

        return $existente;
    }

    public static function checkNombresUnicosEventos($nombre)
    {
        require_once "models/inscripciones_eventos.php";

        $nombreDb = inscripciones_eventos::findNombreApellidos($nombre);
        $existente = "0";

        if ($nombreDb) {
            $existente = "1";
        }

        return $existente;
    }

    public static function setCambioAnyo()
    {
        require_once "models/historico_domiciliaciones_trimestrales_inscripciones.php";
        require_once "models/historico_domiciliaciones_matriculas_inscripciones.php";
        require_once "models/historico_domiciliaciones_trimestrales_patronato.php";
        require_once "models/historico_domiciliaciones_matriculas_patronato.php";

        $anyoActual = Date('Y');
        $mensualidadActualParaDomiciliar = self::checkTrimestre();

        $ultimoTrimestreDomiciliadoHistoricoTrimestralesInscripciones = historico_domiciliaciones_trimestrales_inscripciones::getLastDomiciliation();
        $ultimoTrimestreDomiciliadoHistoricoMatriculaInscripciones = historico_domiciliaciones_matriculas_inscripciones::getLastDomiciliation();
        $ultimoTrimestreDomiciliadoHistoricoTrimestralesPatronato = historico_domiciliaciones_trimestrales_patronato::getLastDomiciliation();
        $ultimoTrimestreDomiciliadoHistoricoMatriculaPatronato = historico_domiciliaciones_matriculas_patronato::getLastDomiciliation();

        if ($ultimoTrimestreDomiciliadoHistoricoTrimestralesInscripciones && $ultimoTrimestreDomiciliadoHistoricoTrimestralesInscripciones->fetchColumn()) {
            if($anyoActual > date('Y', strtotime($ultimoTrimestreDomiciliadoHistoricoTrimestralesInscripciones->fetchColumn()))){
                inscripciones_pagos::setDomiciliationTrimestralToNull();
            }else{
                var_dump("uno");
            }
        }

        if ($ultimoTrimestreDomiciliadoHistoricoMatriculaInscripciones && $ultimoTrimestreDomiciliadoHistoricoMatriculaInscripciones->fetchColumn()) {
            if($anyoActual > date('Y', strtotime($ultimoTrimestreDomiciliadoHistoricoMatriculaInscripciones->fetchColumn()))){
                inscripciones_pagos::setPagadoPendienteMatriculaToNull();
            }else{
                var_dump("dos");
            }
        }

        if ($ultimoTrimestreDomiciliadoHistoricoTrimestralesPatronato && $ultimoTrimestreDomiciliadoHistoricoTrimestralesPatronato->fetchColumn()) {
            if($anyoActual > date('Y', strtotime($ultimoTrimestreDomiciliadoHistoricoTrimestralesPatronato->fetchColumn()))){
                inscripciones_patronato_pagos::setDomiciliacionTrimestralToNull();
            }else{
                var_dump("tres");
            }
        }

        if ($ultimoTrimestreDomiciliadoHistoricoMatriculaPatronato && $ultimoTrimestreDomiciliadoHistoricoMatriculaPatronato->fetchColumn()) {
            if($anyoActual > date('Y', strtotime($ultimoTrimestreDomiciliadoHistoricoMatriculaPatronato->fetchColumn()))){
                inscripciones_patronato_pagos::setPagadoPendienteMatriculaToNull();
            }else{
                var_dump("cuatro");
            }
        }

    }

    /**
     * Obtenemos que trimestre debemos domiciliar.
     * @return array
     */
    public static function checkTrimestre()
    {
        $mensualidadActual = Date('m');

        switch ($mensualidadActual) {
            case '01':
                {
                    $trimestre = 'trimestre_enero';
                    $mensualidad = 'Enero';
                    $pagado = 'pagado_enero';
                    break;
                }
            case '02':
                {
                    $trimestre      = 'trimestre_enero';
                    $mensualidad    = 'Enero';
                    $pagado         = 'pagado_enero';
                    break;
                }
            case '03':
                {
                    $trimestre = 'trimestre_enero';
                    $mensualidad = 'Enero';
                    $pagado = 'pagado_enero';
                    break;
                }
            case '04':
                {
                    $trimestre = 'trimestre_abril';
                    $mensualidad = 'Abril';
                    $pagado = 'pagado_abril';
                    break;
                }
            case '05':
                {
                    $trimestre = 'trimestre_abril';
                    $mensualidad = 'Abril';
                    $pagado = 'pagado_abril';
                    break;
                }
            case '06':
                {
                    $trimestre = 'trimestre_abril';
                    $mensualidad = 'Abril';
                    $pagado = 'pagado_abril';
                    break;
                }
            case '07':
                {
                    $trimestre = 'trimestre_abril';
                    $mensualidad = 'Abril';
                    $pagado = 'pagado_abril';
                    break;
                }
            case '08':
                {
                    $trimestre = 'trimestre_abril';
                    $mensualidad = 'Abril';
                    $pagado = 'pagado_abril';
                    break;
                }
            case '09':
                {
                    $trimestre = 'trimestre_abril';
                    $mensualidad = 'Abril';
                    $pagado = 'pagado_abril';
                    break;
                }
            case '10':
                {
                    $trimestre = 'trimestre_abril';
                    $mensualidad = 'Abril';
                    $pagado = 'pagado_abril';
                    break;
                }
            case '11':
                {
                    $trimestre = 'trimestre_noviembre';
                    $mensualidad = 'Noviembre';
                    $pagado = 'pagado_noviembre';
                    break;
                }
            case '12':
                {
                    $trimestre = 'trimestre_noviembre';
                    $mensualidad = 'Noviembre';
                    $pagado = 'pagado_noviembre';
                    break;
                }
            default:
                {
                    $trimestre = 'ERROR';
                    $mensualidad = 'Error';
                    $pagado = 'Error';
                    break;
                }
        }

        return [$trimestre, $mensualidad, $pagado];

    }

}