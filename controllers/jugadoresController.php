<?php
/************************************************
 * Code Generator:        V2.0 (2020-03-26)
 * Autor:                    Pablo Muñoz Julve
 * Fecha de la generación: 2020-04-22 11:02:20
 * Base de datos:            alqueria
 * Clase de capa:            controllers
 ************************************************/

class jugadoresController
{
    /** actionListar() carga la vista con el listado de jugadores */
    public function actionListar()
    {
        require "includes/Utils.php";

        if (Utils::compruebaLogin()) {
            //  Incluimos modelos
            require "models/inscripciones_escuela_y_cantera.php";
            require "models/equipos.php";

            //  Recuperamos datos
            $instancias = inscripciones_escuela_y_cantera::findInscripciones_Temporada();
            $datos["tabla_html"] = self::genera_html_tabla($instancias);
            //$datos['equipos']     =   equipos::findAll();

            //  Preparamos y cargamos vista
            vistaSinvista(array('datos' => $datos), "layoutsback/layout_back_escuela_cantera_inscripciones_20_21");
        }
    }

    /** actionListarPatronato() carga la vista con el listado de jugadores de patronato*/
    public function actionListarPatronato()
    {
        require "includes/Utils.php";

        if (Utils::compruebaLogin()) {
            //  Incluimos modelos
            require "models/inscripciones_escuela_y_cantera.php";
            require "models/equipos.php";

            //  Recuperamos datos
            $instancias = inscripciones_escuela_y_cantera::findInscripciones_TemporadaPatronato();
            $datos["tabla_html"] = self::genera_html_tablaPatronato($instancias);
            //$datos['equipos']     =   equipos::findAll();

            //  Preparamos y cargamos vista
            vistaSinvista(array('datos' => $datos), "layoutsback/layout_back_patronato_inscripciones_20_21");
        }
    }

    /** actionCargar() recupera una instancia de jugadores a partir de su dni */
    public function actionCargar()
    {
        require "includes/Utils.php";

        //  Comprueba si hay que depurar y lo hace
        Utils::depurar(__FILE__ . "." . __FUNCTION__ . "." . __LINE__, "false");

        //  Incluimos los modelos
        require "models/jugadores.php";
        require "models/horarios.php";
        require "PHPMailer/envios_emails.php";
        require "lang/publico_" . $_SESSION['idioma'] . ".php";

        //  Recibimos la clave primaria de la instancia a cargar537541
        $dni = strtoupper(filter_input(INPUT_POST, 'jugadores_dni_jugador', FILTER_SANITIZE_STRING));
        $searchVal = array(".", "-", " ");
        $replaceVal = array("", "", "");
        $dni = str_replace($searchVal, $replaceVal, $dni);
        $formulario = filter_input(INPUT_POST, 'formulario', FILTER_SANITIZE_STRING);
        $instancia = jugadores::findBydni_jugador(strtoupper($dni));

        if (!empty($instancia)) {
            $instancia["foto"] = "";
            $instancia["dni_delante"] = "";
            $instancia["dni_detras"] = "";
            $instancia["pasaporte"] = "";
            $instancia["sip"] = "";

            if ($instancia["autoriza_modificacion"] === 0 || $instancia["autoriza_modificacion"] === "0" || $instancia["is_active"] === 0 || $instancia["is_active"] === "0") {
                //  Como este caso es un poco extraño, vamos a enviar un email informativo a Pepe cuando ocurra, para que esté atento.
                $asunto = "Intento de modificación de datos en formulario de inscripcion - Temporada 20/21 - " . $instancia["dni_jugador"];
                $body = "<p>Este email automático le informa de que se ha intentado hacer una inscripción 2020 en ESCUELA / CANTERA a un jugador/a que no está autorizado/a a a hacer cambios.</p>
                        <p>Es decir, un jugador/a al que no se le permite editar el formulario. Sugerimos que se revise la incidencia. Estos son los datos del jugador/a:</p>
                        <p>Fecha del intento: " . date("Y-m-d H:i") . "</p>
                        <p>" . $instancia["nombre"] . " " . $instancia["apellidos"] . " - " . strtoupper($instancia["categoria"]) . " - (DNI Jugador: " . $instancia["dni_jugador"] . ", DNI Padre: " . ($instancia["dni_madre"] ? $instancia["dni_madre"] : "-") . ", DNI Madre: " . ($instancia["dni_padre"] ? $instancia["dni_padre"] : "-") . ")</p>";

                envios_emails::enviar_email_revisión_inscripcion_escuela_cantera_2020(
                    $asunto, $body, "pcasares@alqueriadelbasket.com", "José Manuel Casares",
                    "", "", "", "", "", "");

                echo json_encode(
                    array(
                        "response" => "error",
                        "instancia" => $instancia,
                        "mostrar_dni_tutor" => "no",
                        "message" => $lang["ins_controlador_error_autorizacion"]));
                die;
            } else if (strtoupper($instancia["categoria"]) !== strtoupper($formulario)) {
                echo json_encode(
                    array(
                        "response" => "error",
                        "instancia" => $instancia,
                        "message" => $lang["ins_controlador_error_diferente_seccion_1"] . strtoupper($formulario) . $lang["ins_controlador_error_diferente_seccion_2"] . strtoupper($instancia["categoria"]) . $lang["ins_controlador_error_diferente_seccion_3"]));
                die;
            } else {
                // Sacamos los horarios del equipo del jugador
                $horarios = horarios::findByid_equipo($instancia['idequipo_alqueria']);

                if (count($horarios) < 1) {
                    $horarios = "";
                }

                echo json_encode(
                    array(
                        "response" => "success",
                        "instancia" => $instancia,
                        "horarios" => $horarios,
                        "message" => "Los datos de la instancia jugadores se han recuperado."));
                die;
            }
        } else {
            echo json_encode(
                array(
                    "response" => "error",
                    "instancia" => "",
                    "mostrar_dni_tutor" => "si",
                    "message" => $lang["ins_controlador_error_carga"]));
            die;
        }
    }

    /** CargarVerificado() recupera una instancia de jugadores a partir de:
     * - Intento 1. DNI jugador + Codigo de verificacion de 6 digitos
     * - Intento 2. DNI tutor + Codigo de verificacion de 6 digitos */
    public function actionCargarVerificado()
    {
        require "includes/Utils.php";

        //  Comprueba si hay que depurar y lo hace
        Utils::depurar(__FILE__ . "." . __FUNCTION__ . "." . __LINE__, "true");

        //  Incluimos los modelos
        require "models/jugadores.php";
        require "models/horarios.php";
        require "PHPMailer/envios_emails.php";
        require "lang/publico_" . $_SESSION['idioma'] . ".php";

        //  Recibimos la clave primaria de la instancia a cargar537541
        $dni = strtoupper(filter_input(INPUT_POST, 'jugadores_dni_jugador', FILTER_SANITIZE_STRING));
        $searchVal = array(".", "-", " ");
        $replaceVal = array("", "", "");
        $dni = str_replace($searchVal, $replaceVal, $dni);

        $dni_tutor = strtoupper(filter_input(INPUT_POST, 'jugadores_dni_tutor', FILTER_SANITIZE_STRING));
        $searchVal2 = array(".", "-", " ");
        $replaceVal2 = array("", "", "");
        $dni_tutor = str_replace($searchVal2, $replaceVal2, $dni_tutor);

        $formulario = filter_input(INPUT_POST, 'formulario', FILTER_SANITIZE_STRING);
        $codigo_verificacion = filter_input(INPUT_POST, 'codigo_verificacion', FILTER_SANITIZE_NUMBER_INT);

        if (!empty($dni)) {
            $instancia = jugadores::findBydni_jugadorYCodigoVerificacion(strtoupper($dni), $codigo_verificacion);
        } else {
            $instancia = null;
        }


        if (!empty($instancia)) {
            $instancia["foto"] = "";
            $instancia["dni_delante"] = "";
            $instancia["dni_detras"] = "";
            $instancia["pasaporte"] = "";
            $instancia["sip"] = "";

            if ($instancia["autoriza_modificacion"] === 0 || $instancia["autoriza_modificacion"] === "0" || $instancia["is_active"] === 0 || $instancia["is_active"] === "0") {
                //  Como este caso es un poco extraño, vamos a enviar un email informativo a Pepe cuando ocurra, para que esté atento.
                $asunto = "Intento de modificación de datos en formulario de inscripcion - Temporada 20/21 - " . $instancia["dni_jugador"];
                $body = "<p>Este email automático le informa de que se ha intentado hacer una inscripción 2020 en ESCUELA / CANTERA a un jugador/a que no está autorizado/a a a hacer cambios.</p>
                        <p>Es decir, un jugador/a al que no se le permite editar el formulario. Sugerimos que se revise la incidencia. Estos son los datos del jugador/a:</p>
                        <p>Fecha del intento: " . date("Y-m-d H:i") . "</p>
                        <p>" . $instancia["nombre"] . " " . $instancia["apellidos"] . " - " . strtoupper($instancia["categoria"]) . " - (DNI Jugador: " . $instancia["dni_jugador"] . ", DNI Padre: " . ($instancia["dni_madre"] ? $instancia["dni_madre"] : "-") . ", DNI Madre: " . ($instancia["dni_padre"] ? $instancia["dni_padre"] : "-") . ")</p>";

                envios_emails::enviar_email_revisión_inscripcion_escuela_cantera_2020(
                    $asunto, $body, "pcasares@alqueriadelbasket.com", "José Manuel Casares",
                    "", "", "", "", "", "");

                echo json_encode(
                    array(
                        "response" => "error",
                        "instancia" => $instancia,
                        "mostrar_dni_tutor" => "no",
                        "message" => $lang["ins_controlador_error_autorizacion"]));
                die;
            } else if (strtoupper($instancia["categoria"]) !== strtoupper($formulario)) {
                echo json_encode(
                    array(
                        "response" => "error",
                        "instancia" => $instancia,
                        "message" => $lang["ins_controlador_error_diferente_seccion_1"] . strtoupper($formulario) . $lang["ins_controlador_error_diferente_seccion_2"] . strtoupper($instancia["categoria"]) . $lang["ins_controlador_error_diferente_seccion_3"]));
                die;
            } else {
                // Sacamos los horarios del equipo del jugador
                $horarios = horarios::findByid_equipo($instancia['idequipo_alqueria']);

                if (count($horarios) < 1) {
                    $horarios = "";
                }

                echo json_encode(
                    array(
                        "response" => "success",
                        "instancia" => $instancia,
                        "horarios" => $horarios,
                        "confirmacion_editar_jugador" => '<div class="alert alert-success redimension" role="alert">
                                                        <h4><i class="fa fa-info-circle" aria-hidden="true"></i>' .
                            $lang["ins_form_confirmacion_jugador_ok"] . '</h4></div>',
                        "message" => "Los datos de la instancia jugadores se han recuperado."));
                die;
            }
        } else {
            //$instancia  =   jugadores::findBydni_jugadorYCodigoVerificacion(strtoupper($dni),$codigo_verificacion);
            if (!empty($dni_tutor)) {
                $instancias = jugadores::findBydniPadreMadreYCategoriaYCodigoVerificado($dni_tutor, $formulario, $codigo_verificacion);

                if (count($instancias) > 0) {
                    $string_select_jugadores = '<option value="">' . $lang["ins_controller_seleccionar"] . '</option>';
                    foreach ($instancias as $instancia) {
                        $string_select_jugadores .= '<option value="' . $instancia['id_jugador'] . '">' . $instancia['nombre'] . " " . $instancia['apellidos'] . '</option>';
                    }

                    echo json_encode(
                        array(
                            "response" => "success",
                            "select_jugadores" => $string_select_jugadores,
                            "count_jugadores" => count($instancias),
                            "message" => "Los datos de los jugadores se han recuperado."));
                    die;
                } else {
                    echo json_encode(
                        array(
                            "response" => "error",
                            "select_jugadores" => "",
                            "instancia" => "",
                            "mostrar_dni_tutor" => "si",
                            "message" => $lang["ins_controlador_error_carga"]));
                    die;
                }
            } else {
                echo json_encode(
                    array(
                        "response" => "error",
                        "instancia" => "",
                        "select_jugadores" => "",
                        "mostrar_dni_tutor" => "si",
                        "message" => $lang["ins_controlador_error_carga"]));
                die;
            }
        }
    }

    /** CargarJugadorInscrito_20_21() recupera una instancia de jugadores a partir de:
     *  DNI jugador o dni tutor + Codigo de verificacion de 6 digitos para actualizar las firmas o las imagenes*/
    public function actionCargarJugadorInscrito_20_21()
    {
        require "includes/Utils.php";

        //  Comprueba si hay que depurar y lo hace
        Utils::depurar(__FILE__ . "." . __FUNCTION__ . "." . __LINE__, "true");

        //  Incluimos los modelos
        require "models/jugadores.php";
        require "lang/publico_" . $_SESSION['idioma'] . ".php";

        //  Recibimos la clave primaria de la instancia a cargar537541
        $dni = strtoupper(filter_input(INPUT_POST, 'jugadores_dni_jugador', FILTER_SANITIZE_STRING));
        $searchVal = array(".", "-", " ");
        $replaceVal = array("", "", "");
        $dni = str_replace($searchVal, $replaceVal, $dni);

        $codigo_verificacion = filter_input(INPUT_POST, 'codigo_verificacion', FILTER_SANITIZE_NUMBER_INT);

        if (!empty($dni)) {
            $instancia = jugadores::findJugadorInscrito_ByDni_CodVerif(strtoupper($dni), $codigo_verificacion);
        } else {
            $instancia = null;
        }

        if (!empty($instancia)) {
            /* Comento esto.
            $instancia["foto"]          ="";
            $instancia["dni_delante"]   ="";
            $instancia["dni_detras"]    ="";
            $instancia["pasaporte"]     ="";
            $instancia["sip"]           ="";
            */

            // error_log(__FILE__ . __FUNCTION__ . __LINE__);
            // error_log(print_r($instancia, 1));

            if ($instancia["autoriza_modificacion"] === 0 || $instancia["autoriza_modificacion"] === "0" ||
                $instancia["is_active"] === 0 || $instancia["is_active"] === "0") {
                //  Como este caso es un poco extraño, vamos a enviar un email informativo a Pepe cuando ocurra, para que esté atento.
                //  $asunto = "Intento de modificación de datos en formulario de inscripcion - Temporada 20/21 - ".$instancia["dni_jugador"];

                echo json_encode(
                    array(
                        "response" => "error",
                        "instancia" => $instancia,
                        "mostrar_dni_tutor" => "no",
                        "message" => $lang["ins_controlador_error_autorizacion"]));
                die;
            } else {
                echo json_encode(
                    array(
                        "response" => "success",
                        "instancia" => $instancia,
                        "confirmacion_editar_jugador" => '<div class="alert alert-success redimension" role="alert">
                                                        <h4><i class="fa fa-info-circle" aria-hidden="true"></i>' .
                            $lang["ins_form_confirmacion_jugador_ok"] . '</h4></div>',
                        "message" => "Los datos de la instancia jugadores se han recuperado."));
                die;
            }
        } else {
            echo json_encode(
                array(
                    "response" => "error",
                    "instancia" => $instancia,
                    "mostrar_dni_tutor" => "no",
                    "message" => $lang["ins_controlador_error_autorizacion"]));
            die;
        }
    }

    /** actionCargarPorID() carga un jugador mediante su id_jugador */
    public function actionCargarPorID()
    {
        require "includes/Utils.php";

        //  Comprueba si hay que depurar y lo hace
        Utils::depurar(__FILE__ . "." . __FUNCTION__ . "." . __LINE__, "false");

        //  Incluimos los modelos
        require "models/jugadores.php";
        require "models/horarios.php";
        require "PHPMailer/envios_emails.php";
        require "lang/publico_" . $_SESSION['idioma'] . ".php";

        //  Recibimos la clave primaria de la instancia a cargar537541
        $id_jugador = filter_input(INPUT_POST, 'jugadores_id', FILTER_SANITIZE_NUMBER_INT);
        $formulario = strtoupper(filter_input(INPUT_POST, 'formulario', FILTER_SANITIZE_STRING));
        $instancia = jugadores::findByid_jugador($id_jugador);

        if (!empty($instancia)) {
            if ($instancia["autoriza_modificacion"] === 0 || $instancia["autoriza_modificacion"] === "0" || $instancia["is_active"] === 0 || $instancia["is_active"] === "0") {
                //  Como este caso es un poco extraño, vamos a enviar un email informativo a Pepe cuando ocurra, para que esté atento.
                $asunto = "Intento de modificación de datos en formulario de inscripcion - Temporada 20/21 - " . $instancia["dni_jugador"];
                $body = "<p>Este email automático le informa de que se ha intentado hacer una inscripción 2020 en ESCUELA / CANTERA a un jugador/a que no está autorizado/a a a hacer cambios.</p>
                        <p>Es decir, un jugador/a al que no se le permite editar el formulario. Sugerimos que se revise la incidencia. Estos son los datos del jugador/a:</p>
                        <p>Fecha del intento: " . date("Y-m-d H:i") . "</p>
                        <p>" . $instancia["nombre"] . " " . $instancia["apellidos"] . " - " . strtoupper($instancia["categoria"]) . " - (DNI Jugador: " . $instancia["dni_jugador"] . ", DNI Padre: " . ($instancia["dni_madre"] ? $instancia["dni_madre"] : "-") . ", DNI Madre: " . ($instancia["dni_padre"] ? $instancia["dni_padre"] : "-") . ")</p>";

                envios_emails::enviar_email_revisión_inscripcion_escuela_cantera_2020(
                    $asunto, $body, "pcasares@alqueriadelbasket.com", "José Manuel Casares",
                    "", "", "", "", "", "");

                echo json_encode(
                    array(
                        "response" => "error",
                        "instancia" => $instancia,
                        "mostrar_dni_tutor" => "si",
                        "message" => $lang["ins_controlador_error_autorizacion"]));
                die;
            } else if (strtoupper($instancia["categoria"]) !== strtoupper($formulario)) {
                echo json_encode(
                    array(
                        "response" => "error",
                        "instancia" => $instancia,
                        "message" => $lang["ins_controlador_error_diferente_seccion_1"] . strtoupper($formulario) . $lang["ins_controlador_error_diferente_seccion_2"] . strtoupper($instancia["categoria"]) . $lang["ins_controlador_error_diferente_seccion_3"]));
                die;
            } else {
                // Sacamos los horarios del equipo del jugador
                $horarios = horarios::findByid_equipo($instancia['idequipo_alqueria']);
                if (count($horarios) < 1) {
                    $horarios = "";
                }

                echo json_encode(
                    array(
                        "response" => "success",
                        "instancia" => $instancia,
                        "horarios" => $horarios,
                        "message" => "Los datos de la instancia jugadores se han recuperado."));
                die;
            }
        } else {
            echo json_encode(
                array(
                    "response" => "error",
                    "instancia" => "",
                    "mostrar_dni_tutor" => "si",
                    "message" => $lang["ins_controlador_error_carga"]));
            die;
        }
    }

    /** actionCargar() recupera las instancias de jugadores a partir del dni del padre, madre o tutor
     * (en 2021 se recomienda usar solo dni_padre y dni_madre) */
    public function actionCargarPorDNIPadreMadre()
    {
        require "includes/Utils.php";

        //  Comprueba si hay que depurar y lo hace
        Utils::depurar(__FILE__ . "." . __FUNCTION__ . "." . __LINE__, "false");

        //  Incluimos los modelos
        require "models/jugadores.php";
        require "PHPMailer/envios_emails.php";
        require "lang/publico_" . $_SESSION['idioma'] . ".php";

        //  Recibimos la clave primaria de la instancia a cargar537541
        $dni = filter_input(INPUT_POST, 'jugadores_dni_padremadre', FILTER_SANITIZE_STRING);
        $searchVal = array(".", "-", " ");
        $replaceVal = array("", "", "");
        $dni = str_replace($searchVal, $replaceVal, $dni);
        $formulario = strtoupper(filter_input(INPUT_POST, 'formulario', FILTER_SANITIZE_STRING));
        $instancias = jugadores::findBydniPadreMadreYCategoria($dni, $formulario);

        if (count($instancias) > 0) {
            $string_select_jugadores = '<option value="">' . $lang["ins_controller_seleccionar"] . '</option>';
            foreach ($instancias as $instancia) {
                $string_select_jugadores .= '<option value="' . $instancia['id_jugador'] . '">' . $instancia['nombre'] . " " . $instancia['apellidos'] . '</option>';
            }

            echo json_encode(
                array(
                    "response" => "success",
                    "select_jugadores" => $string_select_jugadores,
                    "message" => "Los datos de los jugadores se han recuperado."));
            die;
        } else {
            $string_select_jugadores = '<option value="">' . $lang["ins_controller_no_encontrado"] . '</option>';
            echo json_encode(
                array(
                    "response" => "error",
                    "select_jugadores" => $string_select_jugadores,
                    "message" => $lang["ins_controller_no_encontrado_mensaje"]));
            die;
        }
    }

    /** actionCargarJugadorInscrito() recupera las instancias de jugadores a partir de;
     *  - dni jugador, padre, madre o tutor
     *  - codigo */
    public function actionCargarJugadorInscrito()
    {
        //require_once "db.php";
        require "includes/Utils.php";

        //  Comprueba si hay que depurar y lo hace
        Utils::depurar(__FILE__ . "." . __FUNCTION__ . "." . __LINE__, "false");

        //  Incluimos los modelos
        require "models/jugadores.php";
        require "models/jugadores_tallas.php";

        require "models/formulariosinscripciones.php";
        require "lang/publico_" . $_SESSION['idioma'] . ".php";

        //  Recogemos GET
        $codigo_verificacion = filter_input(INPUT_POST, 'codigo_verificacion', FILTER_SANITIZE_NUMBER_INT);
        $dni = strtoupper(filter_input(INPUT_POST, 'jugadores_dni_jugador', FILTER_SANITIZE_STRING));
        $searchVal = array(".", "-", " ");
        $replaceVal = array("", "", "");
        $dni = str_replace($searchVal, $replaceVal, $dni);
        $existe_temp_anterior = "no";

        if (!empty($dni)) {
            //  A 24 agosto nos pidan que un listado de jugadores sin inscripción hecha en 20/21 puedan indicar sus tallas.
            $instancia = jugadores::findByDNIYCodigoVerificacionYActivo(strtoupper($dni), $codigo_verificacion, "20/21");
            //  $instancia  =   jugadores::findByDNIYCodigoVerificacionYActivoYTemporada(strtoupper($dni),$codigo_verificacion, "20/21");

            //  Ahora, comprobamos si el jugador ya tenia una inscripcion el año pasado en tabla "formulariosinscripciones"
            //  Y si existe la instancia, no se permite rellenar talla de chaqueta.
            $instancia_temp_anterior = formulariosinscripciones::findByDNI($dni);
            if (isset($instancia_temp_anterior) && !empty($instancia_temp_anterior)) {
                $existe_temp_anterior = "si";
            }
        } else {
            $instancia = null;
        }

        if (!empty($instancia)) {
            /*  COMPROBACION 1. COMPROBAR FECHAS */
            //  Recuperamos el jugador para saber si está en el rango de fechas permitido
            //  Se quierre enviar el 17 a cantera y cerrar el 19 emviar el 23 a escuela y cerrar el 26.
            //  Si se está fuera de plazo se muestra mensaje para que se ponga en contacto con
            //  tienda@valenciabasket.com
            $ahora = date("Y-m-d H:i:s");
            $test = 0;
            $desde_cantera = "2020-08-17 00:00:00";
            $hasta_cantera = "2021-08-19 23:59:59";
            $desde_escuela = "2020-08-23 00:00:00";
            $hasta_escuela = "2021-08-26 23:59:59";
            if ($instancia["categoria"] === "CANTERA") {
                if ($test || (($ahora > $desde_cantera) && ($ahora < $hasta_cantera))) {
                } else {
                    echo json_encode(
                        array(
                            "response" => "error",
                            "message" => "El plazo de los jugadores/as de CANTERA para rellenar este formulario no está activo. Por favor, contacta a tienda@valenciabasket.com. ¡Gracias!"));
                    die;
                }
            } else if ($instancia["categoria"] === "ESCUELA") {
                if ($test || (($ahora > $desde_escuela) && ($ahora < $hasta_escuela))) {
                } else {
                    echo json_encode(
                        array(
                            "response" => "error",
                            "message" => "El plazo de los jugadores/as de ESCUELA para rellenar este formulario no está activo. Por favor, contacta a tienda@valenciabasket.com. ¡Gracias!"));
                    die;
                }
            } else {
                echo json_encode(
                    array(
                        "response" => "error",
                        "message" => "Ha habido un problema con la categoria del jugador/a"));
                die;
            }

            /*  COMPROBACION 2. COMPROBAR QUE NO LO HA RELLENADO ANTES */
            //  Comprobamos que el jugador no haya rellenado ya las tallas.
            //  Si las ha rellenado que se ponga en contacto con tienda@valenciabasket.com
            $jugadores_tallas = jugadores_tallas::findByIDJugadoresYTemporada($instancia["id_jugador"], "20/21");
            if (count($jugadores_tallas) > 0) {
                echo json_encode(
                    array(
                        "response" => "error",
                        "message" => "El formulario no se ha guardado. Ya se rellenó anteriormente. Si lo deseas puedes contactar a tienda@valenciabasket.com. ¡Gracias!"));
                die;
            }


            echo json_encode(
                array(
                    "response" => "success",
                    "instancia" => $instancia,
                    "existe_temp_anterior" => $existe_temp_anterior,
                    "confirmacion_editar_jugador" => '<div class="alert alert-success redimension" role="alert">
                                                        <h4><i class="fa fa-info-circle" aria-hidden="true"></i>' .
                        $lang["ins_form_confirmacion_jugador_ok"] . '</h4></div>',
                    "message" => "Los datos de la instancia jugadores se han recuperado."));
            die;
        } else {
            echo json_encode(
                array(
                    "response" => "error",
                    "instancia" => "",
                    "mostrar_dni_tutor" => "no",
                    "message" => "No se ha encontrado el jugador"));
            die;
        }
    }


    /** genera_html_tabla() genera el HTML de la tabla con instancias de jugadores de patronato*/
    private static function genera_html_tablaPatronato($jugadores)
    {
        require_once "lang/errores_tpv.php";

        $contenido_html = "
            <thead class='thead-dark'>
                <tr rol='row'>
                    <th scope='col'>F.Inscripción</th>
                    <th scope='col'>ID</th>
                    <th scope='col'>Jugador/a</th>
                    <th scope='col'>DNI</th>
                    <th scope='col'>Equipo</th>
                        
                        <th scope='col'>NºPedido</th>
                        <th scope='col'>Reserva</th>
                        <th scope='col'>Recibo</th>
                        <th scope='col'>€_Reserva</th>
                        <th scope='col'>Pagado</th>
                        
                    <th scope='col' class='text-right'>Operaciones</th>
                </tr>
            </thead>
            <tbody>";

        /********************************************************************************
         * CAMBIO TEMPORAL
         * Como el listado carga lento en la tablet que usan para la entrega de ropa
         * oculto toda la información de los pagos en el listado de SERVICIOS / PANEL ADMINISTRACION / LISTADO GENERAL de jugadores.
         * ******************************************************************************/
        /*
        */
        if (count($jugadores) > 0) {
            //  Recorro las instancias
            foreach ($jugadores as $instancia) {
                //  Creamos lo de dentro del <tr> recorriendo los atributos
                $contenido_tr = "";
                $date = new DateTime($instancia['fecha_registro']);

                $contenido_tr .= "<td>" . $date->format('d/m/Y') . "</td>";
                $contenido_tr .= "<td>" . $instancia["id_jugador"] . "</td>";
                $contenido_tr .= "<td>" . $instancia["nombre"] . " " . $instancia["apellidos"] . "</td>";
                $contenido_tr .= "<td>" . $instancia["dni_jugador"] . "</td>";

                //$contenido_tr.="<td>".$instancia["email"]. "  " .$instancia["email_padre"]. "  " .$instancia["email_madre"]."</td>";

                $contenido_tr .= "<td>Tipo:" . $instancia["seccion"] . "<br>" . $instancia["equipo"] . "</td>";


                /********************************************************************************
                 * CAMBIO TEMPORAL
                 * Como el listado carga lento en la tablet que usan para la entrega de ropa
                 * vamos a ocultar toda la información de los pagos hasta nueva orden
                 * ******************************************************************************/

                if ($instancia['confirmacion_pago'] == "1" || $instancia['confirmacion_pago'] === 1) {
                    $string_pagado = 'Sí';
                    $string_importe = $instancia['cantidad'];
                } else {
                    $string_importe = 0;
                }

                $contenido_tr .= "<td class='text-center'>" . $instancia["numero_pedido"] . "</td>";

                if ($instancia['metodo_pago'] == "TPV" && ($instancia['confirmacion_pago'] == "0" || $instancia['confirmacion_pago'] === 0)) {
                    if ($instancia['Ds_Response'] === NULL || $instancia['Ds_Response'] == "") {
                        $tipopago = $instancia['metodo_pago'];
                    } else {
                        $tipopago = "TPV" . " <span style='color:red;font-size=7;'><strong>" . $errores[$instancia['Ds_Response']] . "</strong></span>";
                    }
                } else {
                    $tipopago = $instancia['metodo_pago'];
                }

                $contenido_tr .= "<td class='text-center'>" . $tipopago . "</td>";

                //mostramos el recibo si se ha pagado por transferencia
                // Saber la extensión para condicionar el tipo de icono a mostrar
                $valores = explode(".", $instancia['url_recibo']);
                $extension = $valores[count($valores) - 1];

                if ($instancia["url_recibo"] == "" || $instancia['url_recibo'] === NULL) {
                    $contenido_tr .= "<td class='text-center'>" . $instancia['url_recibo'] . "</td>";
                } else {
                    $contenido_tr .= "<td class='text-center'>
                                        <a href='https://servicios.alqueriadelbasket.com/inscripciones/" . $instancia['url_recibo'] . "' target='_blank'>

                                        <i class='fa fa-file-image-o fa-2x' style='font-size: 1.5em;' data-toggle='tooltip' data-placement='bottom' title='' data-original-title='Abrir Imagen'></i></a></td>";
                }

                $contenido_tr .= "<td class='text-center'>" . $string_importe . "€</td>";

                $contenido_tr .= "<td class='text-center'>
                                                    <form method='post' action='?r=inscripciones/ModificaPagadoInscripcionMatricula'>";
                if ($instancia["confirmacion_pago"] == "1" || $instancia['confirmacion_pago'] === 1) {
                    $contenido_tr .= '<label class="switch">
                                                        <input type="checkbox" name="pagado" value="0" checked disabled>
                                                        <span class="slider" disabled></span>
                                                        </label>';
                } else {
                    $contenido_tr .= '<label class="switch">
                                                        <input type="checkbox" name="pagado" value="1">
                                                        <span class="slider"></span>
                                                        </label>';
                }


                $contenido_tr .= '<input type="hidden" name="id" value="' . $instancia["id_pago"] . '">
                    <button class="btn" type="submit">Guardar</button>';

                $contenido_tr .= '</form>
                                                    </td>';

                /********************************************************************************
                 * FIN DEL CAMBIO TEMPORAL
                 * ******************************************************************************/


                /* $contenido_tr.='<td class="textext-center">
            <a href="https://servicios.alqueriadelbasket.com/inscripciones/'.$instancia['url_recibo'].'" target="_blank">';
            if ($extension == "pdf") {
                echo '<i class="fa fa-file-pdf-o fa-2x" style="font-size: 1.5em;" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Abrir PDF"></i>';
            }
            elseif ($extension == "zip") {
                echo '<i class="fa fa-file-zip-o fa-2x" style="font-size: 1.5em;" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Abrir Zip"></i>';
            }
            else {
                echo '<i class="fa fa-file-image-o fa-2x" style="font-size: 1.5em;" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Abrir Imagen"></i>';
            }
            echo '</a>
            </td>';*/

                /*$contenido_tr.="<td class='text-center'>
                                <a href='https://servicios.alqueriadelbasket.com/inscripciones/".$instancia['url_recibo']."' target='_blank'>

                                <i class='fa fa-file-image-o fa-2x' style='font-size: 1.5em;' data-toggle='tooltip' data-placement='bottom' title='' data-original-title='Abrir Imagen'></i></a></td>";*/


                /*<td class="text-right">
                    <button
                        id="'.$instancia["id_jugador"].'-jugadores-editar"
                        class="btn btn-success btn-sm jugadores-editar-lanza-modal"
                        data-toggle="modal" data-target="#jugadores-editar-modal">
                            Editar
                        <i class="fas fa-pencil-alt" style="cursor:pointer;color:white;"></i>
                    </button>

                    <button
                        id="'.$instancia["id_jugador"].'-jugadores-eliminar"
                        class="btn btn-danger btn-sm jugadores-eliminar-lanza-modal"
                        data-toggle="modal" data-target="#jugadores-eliminar-modal">
                            Eliminar
                        <i class="fas fa-trash-alt" style="cursor:pointer;color:white;"></i>
                    </button>
                </td>*/

                //  Despues de crear todo el <tr>, lo concatenamos al string completo
                $contenido_html .= '
                    <tr id="' . $instancia["id_jugador"] . '-tr-jugadores">
                        ' . $contenido_tr . '
                        

                        <td class="text-center" id="' . $instancia['id_jugador'] . '">
                            <a id="' . $instancia['id_inscripcion'] . '-editar-inscripcionpat" data-toggle="modal" data-target="#jugadores-editar-modal" class="cargar_modal_editar_inscripcion_patronato">
                                <i class="fa fa-edit" style="font-size: 1.5em;" data-toggle="tooltip" data-placement="bottom" title="Editar Inscripción"></i>
                            </a>
                            
                          <!--  <a data-toggle="modal" data-target="#myModalPagosTrimestrales" onclick="mimodaldepagos(' . $instancia['id_jugador'] . ')">
                                <i class="fa fa-credit-card" style="font-size: 1.5em;" data-toggle="tooltip" data-placement="bottom" title="Pagos"></i>
                            </a> 
                            <a data-toggle="modal" data-target="#inscripciones-dar-baja-alta" onclick="mimodaleditarbajayalta(' . $instancia['id_jugador'] . ')">
                                <i class="fa fa-toggle-on" style="font-size: 1.5em;" data-toggle="tooltip" data-placement="bottom" title="Dar de baja / alta"></i>
                            </a> -->
                            
                            <a href="?r=inscripciones/ImprimirFicha&id=' . $instancia['id_jugador'] . '" target="_blank">
                                <i class="fa fa-print" style="font-size: 1.5em;" data-toggle="tooltip" data-placement="bottom" title="Generar vista para imprimir"></i>
                            </a>
                           
                            <a id="' . $instancia['id_jugador'] . '-ver-tallas" data-toggle="modal" data-target="#jugadores-tallas-modal" class="cargar_modal_tallas">
                                <i class="fa fa-street-view" style="font-size: 1.5em;" data-toggle="tooltip" data-placement="bottom" title="Ver tallas"></i>
                            </a>
                            
                            <a  id="' . $instancia['id_jugador'] . '-hacer-entregas" 
                                href="index.php?r=ropa/entregaRopa&id=' . $instancia['id_jugador'] . '" 
                                class="cargar_hacer_entregas">
                                <i class="fa fa-tshirt" style="font-size: 1.5em;" data-toggle="tooltip" data-placement="bottom" title="Nueva entrega de ropa"></i>
                            </a>
                            <a data-toggle="modal" data-target="#jugadores-PagosTrimestrales" onclick="modalDomiciliaciones(' . $instancia['id_jugador'] . ')">
                                <i class="fa fa-credit-card" style="font-size: 1.5em;" data-toggle="tooltip" data-placement="bottom" title="Pagos"></i>
                            </a>
                            <a id="' . $instancia['id_jugador'] . '-ver-licencias" data-toggle="modal" data-target="#jugadores-licencias-modal" class="cargar_modal_licencias">
                                <i class="fa fa-calendar-check" style="font-size: 1.5em;" data-toggle="tooltip" data-placement="bottom" title="Ver licencias"></i>
                            </a>
                        </td>
                    </tr>';
            }//data-toggle="modal" data-target="#hacer-entregas-modal"

            $contenido_html .= "
            
            ";

            //  Devolvemos resultado
            return $contenido_html . "</tbody>";
        }
    }


    /** genera_html_tabla() genera el HTML de la tabla con instancias de jugadores de escuela y cantera */
    private static function genera_html_tabla($jugadores)
    {
        require_once "lang/errores_tpv.php";

        $contenido_html = "
    		<thead class='thead-dark'>
                <tr rol='row'>
                    <th scope='col'>F.Inscripción</th>
                    <th scope='col'>ID</th>
                    <th scope='col'>Jugador/a</th>
                    <th scope='col'>DNI</th>
                    <th scope='col'>Equipo</th>
                        <!--
                        <th scope='col'>NºPedido</th>
                        <th scope='col'>Reserva</th>
                        <th scope='col'>Recibo</th>
                        <th scope='col'>€_Reserva</th>
                        <th scope='col'>Pagado</th>
                        -->
                    <th scope='col' class='text-right'>Operaciones</th>
                </tr>
            </thead>
            <tbody>";

        /********************************************************************************
         * CAMBIO TEMPORAL
         * Como el listado carga lento en la tablet que usan para la entrega de ropa
         * oculto toda la información de los pagos en el listado de SERVICIOS / PANEL ADMINISTRACION / LISTADO GENERAL de jugadores.
         * ******************************************************************************/
        if (count($jugadores) > 0) {
            //  Recorro las instancias
            foreach ($jugadores as $instancia) {
                //  Creamos lo de dentro del <tr> recorriendo los atributos
                $contenido_tr = "";
                $date = new DateTime($instancia['fecha_registro']);

                $contenido_tr .= "<td>" . $date->format('d/m/Y') . "</td>";
                $contenido_tr .= "<td>" . $instancia["id_jugador"] . "</td>";
                $contenido_tr .= "<td>" . $instancia["nombre"] . " " . $instancia["apellidos"] . "</td>";
                $contenido_tr .= "<td>" . $instancia["dni_jugador"] . "</td>";

                $contenido_tr .= "<td>Tipo:" . $instancia["seccion"] . "<br>" . $instancia["equipo"] . "</td>";

                $contenido_html .= '
                    <tr id="' . $instancia["id_jugador"] . '-tr-jugadores">
                        ' . $contenido_tr . '
                        <td class="text-center" id="' . $instancia['id_jugador'] . '">
                            <a id="editar-inscripcion" data-toggle="modal" data-target="#jugadores-editar-modal-20-21" class="cargar_modal_editar_inscripcion_20_21" onclick="editarJugador('. $instancia['id_inscripcion'] .')">
                                <i class="fa fa-edit" style="font-size: 1.5em;" data-toggle="tooltip" data-placement="bottom" title="Editar Inscripción"></i>
                            </a>
                            
                            <a href="?r=inscripciones/ImprimirFicha&id=' . $instancia['id_jugador'] . '" target="_blank">
                                <i class="fa fa-print" style="font-size: 1.5em;" data-toggle="tooltip" data-placement="bottom" title="Generar vista para imprimir"></i>
                            </a>
                           
                            <a id="' . $instancia['id_jugador'] . '-ver-tallas" data-toggle="modal" data-target="#jugadores-tallas-modal" class="cargar_modal_tallas">
                                <i class="fa fa-street-view" style="font-size: 1.5em;" data-toggle="tooltip" data-placement="bottom" title="Ver tallas"></i>
                            </a>
                            
                            <a  id="' . $instancia['id_jugador'] . '-hacer-entregas" 
                                href="index.php?r=ropa/entregaRopa&id=' . $instancia['id_jugador'] . '" 
                                class="cargar_hacer_entregas">
                                <i class="fa fa-tshirt" style="font-size: 1.5em;" data-toggle="tooltip" data-placement="bottom" title="Nueva entrega de ropa"></i>
                            </a>
                            <a data-toggle="modal" data-target="#jugadores-PagosTrimestrales" onclick="modalDomiciliaciones(' . $instancia['id_jugador'] . ')">
							    <i class="fa fa-credit-card" style="font-size: 1.5em;" data-toggle="tooltip" data-placement="bottom" title="Pagos"></i>
							</a>
                            <a id="' . $instancia['id_jugador'] . '-ver-licencias" data-toggle="modal" data-target="#jugadores-licencias-modal" class="cargar_modal_licencias">
                                <i class="fa fa-calendar-check" style="font-size: 1.5em;" data-toggle="tooltip" data-placement="bottom" title="Ver licencias"></i>
                            </a>
                            <a data-toggle="modal" data-target="#jugadores-convertirEba" onclick="aceptarBecado(' . $instancia['id_jugador'] . ')">
							    <i class="fa fa-graduation-cap" style="font-size: 1.5em;" data-toggle="tooltip" data-placement="bottom" title="Convertir a EBA"></i>
							</a>
                        </td>
                    </tr>';
            }

            $contenido_html .= "
            
            ";

            //  Devolvemos resultado
            return $contenido_html . "</tbody>";
        }
    }

    /** genera_html_tr_instancia() genera el HTML del <tr> de una instancia jugadores  */
    private static function genera_html_tr_instancia($instancia_jugadores)
    {
        //  Creamos lo de dentro del <tr> recorriendo los atributos
        $contenido_tr = "";
        $contenido_tr .= "<td>" . $instancia_jugadores["nombre"] . "</td>";
        $contenido_tr .= "<td>" . $instancia_jugadores["apellidos"] . "</td>";
        $contenido_tr .= "<td>" . $instancia_jugadores["email"] . "</td>";
        $contenido_tr .= "<td>" . $instancia_jugadores["fecha"] . "</td>";
        $contenido_tr .= "<td>" . $instancia_jugadores["categoria"] . "</td>";
        $contenido_tr .= "<td>" . $instancia_jugadores["fecha_nacimiento"] . "</td>";
        $contenido_tr .= "<td>" . $instancia_jugadores["direccion"] . "</td>";
        $contenido_tr .= "<td>" . $instancia_jugadores["numero"] . "</td>";
        $contenido_tr .= "<td>" . $instancia_jugadores["piso"] . "</td>";
        $contenido_tr .= "<td>" . $instancia_jugadores["puerta"] . "</td>";
        $contenido_tr .= "<td>" . $instancia_jugadores["poblacion"] . "</td>";
        $contenido_tr .= "<td>" . $instancia_jugadores["codigo_postal"] . "</td>";
        $contenido_tr .= "<td>" . $instancia_jugadores["provincia"] . "</td>";
        $contenido_tr .= "<td>" . $instancia_jugadores["nombre_padre"] . "</td>";
        $contenido_tr .= "<td>" . $instancia_jugadores["nombre_madre"] . "</td>";
        $contenido_tr .= "<td>" . $instancia_jugadores["telefono_padre"] . "</td>";
        $contenido_tr .= "<td>" . $instancia_jugadores["telefono_madre"] . "</td>";
        $contenido_tr .= "<td>" . $instancia_jugadores["talla_camiseta"] . "</td>";
        $contenido_tr .= "<td>" . $instancia_jugadores["numero_camiseta"] . "</td>";
        $contenido_tr .= "<td>" . $instancia_jugadores["alergias"] . "</td>";
        $contenido_tr .= "<td>" . $instancia_jugadores["titular_banco"] . "</td>";
        $contenido_tr .= "<td>" . $instancia_jugadores["dni_titular"] . "</td>";
        $contenido_tr .= "<td>" . $instancia_jugadores["iban"] . "</td>";
        $contenido_tr .= "<td>" . $instancia_jugadores["entidad"] . "</td>";
        $contenido_tr .= "<td>" . $instancia_jugadores["oficina"] . "</td>";
        $contenido_tr .= "<td>" . $instancia_jugadores["dc"] . "</td>";
        $contenido_tr .= "<td>" . $instancia_jugadores["cuenta"] . "</td>";
        $contenido_tr .= "<td>" . $instancia_jugadores["dni_tutor"] . "</td>";
        $contenido_tr .= "<td>" . $instancia_jugadores["dni_jugador"] . "</td>";
        $contenido_tr .= "<td>" . $instancia_jugadores["temporada"] . "</td>";
        if ($instancia_jugadores["is_active"]) {
            $contenido_tr .= "<td>Sí</td>";
        } else {
            $contenido_tr .= "<td>No</td>";
        }
        $contenido_tr .= "<td>" . $instancia_jugadores["id_equipo_horario"] . "</td>";
        $contenido_tr .= "<td>" . $instancia_jugadores["observaciones"] . "</td>";
        $contenido_tr .= "<td>" . $instancia_jugadores["idequipo_alqueria"] . "</td>";
        $contenido_tr .= "<td>" . $instancia_jugadores["foto"] . "</td>";
        $contenido_tr .= "<td>" . $instancia_jugadores["dni_delante"] . "</td>";
        $contenido_tr .= "<td>" . $instancia_jugadores["dni_detras"] . "</td>";
        if ($instancia_jugadores["autoriza_modificacion"]) {
            $contenido_tr .= "<td>Sí</td>";
        } else {
            $contenido_tr .= "<td>No</td>";
        }
        $contenido_tr .= "<td>" . $instancia_jugadores["dni_padre"] . "</td>";
        $contenido_tr .= "<td>" . $instancia_jugadores["dni_madre"] . "</td>";
        $contenido_tr .= "<td>" . $instancia_jugadores["pasaporte"] . "</td>";
        $contenido_tr .= "<td>" . $instancia_jugadores["sip"] . "</td>";
        $contenido_tr .= "<td>" . $instancia_jugadores["sexo"] . "</td>";
        $contenido_tr .= "<td>" . $instancia_jugadores["nacionalidad"] . "</td>";
        $contenido_tr .= "<td>" . $instancia_jugadores["tipo_documento"] . "</td>";
        $contenido_tr .= "<td>" . $instancia_jugadores["fecha_cad_dni"] . "</td>";
        $contenido_tr .= "<td>" . $instancia_jugadores["pais_nacimiento"] . "</td>";
        $contenido_tr .= "<td>" . $instancia_jugadores["num_hermanos"] . "</td>";
        $contenido_tr .= "<td>" . $instancia_jugadores["edades"] . "</td>";
        $contenido_tr .= "<td>" . $instancia_jugadores["en_el_club"] . "</td>";
        $contenido_tr .= "<td>" . $instancia_jugadores["cuota"] . "</td>";
        $contenido_tr .= "<td>" . $instancia_jugadores["email_madre"] . "</td>";
        $contenido_tr .= "<td>" . $instancia_jugadores["email_padre"] . "</td>";
        $contenido_tr .= "<td>" . $instancia_jugadores["estudios_madre"] . "</td>";
        $contenido_tr .= "<td>" . $instancia_jugadores["estudios_padre"] . "</td>";
        if ($instancia_jugadores["monoparental"]) {
            $contenido_tr .= "<td>Sí</td>";
        } else {
            $contenido_tr .= "<td>No</td>";
        }
        $contenido_tr .= "<td>" . $instancia_jugadores["apellidos_madre"] . "</td>";
        $contenido_tr .= "<td>" . $instancia_jugadores["apellidos_padre"] . "</td>";

        //  Despues de crear todo el <tr>, lo concatenamos al string completo
        $contenido_tr .= '
                <td class="text-right">
                    <button 
                        id="' . $instancia_jugadores["id"] . '-jugadores-editar" 
                        class="btn btn-success btn-sm jugadores-editar-lanza-modal"     
                        data-toggle="modal" data-target="#jugadores-editar-modal">
                            Editar
                        <i class="fas fa-pencil-alt" style="cursor:pointer;color:white;"></i>
                    </button>

                    <button 
                        id="' . $instancia_jugadores["id"] . '-jugadores-eliminar" 
                        class="btn btn-danger btn-sm jugadores-eliminar-lanza-modal " 
                        data-toggle="modal" data-target="#jugadores-eliminar-modal">
                            Eliminar
                        <i class="fas fa-trash-alt" style="cursor:pointer;color:white;"></i>
                    </button>
                </td>';

        return $contenido_tr;
    }

    //Exportar a Excel Inscripciones Cantera
    public function actionExportToExcelInscripcionesCantera()
    {

        require "models/jugadores.php";
        $datos['datosPagos'] = jugadores::findAllInscripcionesExportExcelCantera_Escuela("like");

        if (isset($_POST["export_data_inscripciones_cantera"])) {
            $filename = "Inscripciones_Cantera_" . date('Ymd') . ".xls";
            // header('Content-Encoding: UTF-8');
            // header('Content-Type: text/html; charset=utf-16');
            header("Content-Type: application/vnd.ms-excel; charset=UTF-16LE");
            header("Content-Disposition: attachment; filename=" . $filename . "");
            header('Cache-Control: max-age=0');
            $show_column = false;

            if (!empty($datos['datosPagos'])) {
                foreach ($datos['datosPagos'] as $inscripcion) {
                    if (!$show_column) {
                        // Display field/column names in first row
                        echo implode("\t", array_keys($inscripcion)) . "\r\n";
                        $show_column = true;
                    }
                    echo mb_convert_encoding(implode("\t", array_values($inscripcion)) . "\r\n", 'UTF-16LE', 'UTF-8');
                    //para que se muestren bien los acentos
                    //  echo mb_convert_encoding($result, 'UTF-16LE', 'UTF-8');
                }
            }
            exit;
        }
    }

    //Exportar a Excel Inscripciones Escuela
    public function actionExportToExcelInscripcionesEscuela()
    {

        require "models/jugadores.php";
        $datos['datosPagos'] = jugadores::findAllInscripcionesExportExcelCantera_Escuela("not like");

        if (isset($_POST["export_data_inscripciones_cantera"])) {
            $filename = "Inscripciones_Escuela_" . date('Ymd') . ".xls";
            // header('Content-Encoding: UTF-8');
            //header('Content-Type: text/html; charset=utf-16');
            header("Content-Type: application/vnd.ms-excel; charset=UTF-16LE");
            header("Content-Disposition: attachment; filename=" . $filename . "");
            header('Cache-Control: max-age=0');
            $show_column = false;

            if (!empty($datos['datosPagos'])) {
                foreach ($datos['datosPagos'] as $inscripcion) {
                    if (!$show_column) {
                        // Display field/column names in first row
                        echo implode("\t", array_keys($inscripcion)) . "\r\n";
                        $show_column = true;
                    }
                    //echo implode("\t", array_values($inscripcion)) . "\r\n";
                    //para que se muestren bien los acentos
                    echo mb_convert_encoding(implode("\t", array_values($inscripcion)) . "\r\n", 'UTF-16LE', 'UTF-8');
                }
            }
            exit;
        }
    }


    //Exportar a Excel Inscripciones Patronato
    public function actionExportToExcelInscripcionesPatronato()
    {

        require "models/jugadores.php";
        $datos['datosPagos'] = jugadores::findAllInscripcionesExportExcelPatronato();

        if (isset($_POST["export_data_inscripciones_patronato"])) {
            $filename = "Inscripciones_Patronato_" . date('Ymd') . ".xls";
            // header('Content-Encoding: UTF-8');
            // header('Content-Type: text/html; charset=utf-16');
            header("Content-Type: application/vnd.ms-excel; charset=UTF-16LE");
            header("Content-Disposition: attachment; filename=" . $filename . "");
            header('Cache-Control: max-age=0');
            $show_column = false;

            if (!empty($datos['datosPagos'])) {
                foreach ($datos['datosPagos'] as $inscripcion) {
                    if (!$show_column) {
                        // Display field/column names in first row
                        echo implode("\t", array_keys($inscripcion)) . "\r\n";
                        $show_column = true;
                    }
                    echo mb_convert_encoding(implode("\t", array_values($inscripcion)) . "\r\n", 'UTF-16LE', 'UTF-8');
                    //para que se muestren bien los acentos
                    //  echo mb_convert_encoding($result, 'UTF-16LE', 'UTF-8');
                }
            }
            exit;
        }
    }

    public function actionUpdateInscripcionModalJugador()
    {
        require "models/jugadores.php";


        $idjugador = filter_input(INPUT_POST, 'idjugador', FILTER_SANITIZE_NUMBER_INT);
        //error_log(print_r("id del jugador: " .$idjugador, 1));
        $tipodoc = filter_input(INPUT_POST, 'tipodoc', FILTER_SANITIZE_STRING);
        $dnijugador = filter_input(INPUT_POST, 'dnijugador', FILTER_SANITIZE_STRING);
        $fechacaddni = filter_input(INPUT_POST, 'fechacaddni', FILTER_SANITIZE_STRING);
        $nacionalidad = filter_input(INPUT_POST, 'nacionalidad', FILTER_SANITIZE_STRING);

        $genero = filter_input(INPUT_POST, 'genero', FILTER_SANITIZE_STRING);
        $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
        $apellidos = filter_input(INPUT_POST, 'apellidos', FILTER_SANITIZE_STRING);
        $fechanac = filter_input(INPUT_POST, 'fechanac', FILTER_SANITIZE_STRING);

        $telefjugador = filter_input(INPUT_POST, 'telefjugador', FILTER_SANITIZE_STRING);
        $emailjugador = filter_input(INPUT_POST, 'emailjugador', FILTER_SANITIZE_STRING);


        $direccion = filter_input(INPUT_POST, 'direccion', FILTER_SANITIZE_STRING);
        $numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING);
        $piso = filter_input(INPUT_POST, 'piso', FILTER_SANITIZE_STRING);
        $puerta = filter_input(INPUT_POST, 'puerta', FILTER_SANITIZE_STRING);
        $poblacion = filter_input(INPUT_POST, 'poblacion', FILTER_SANITIZE_STRING);
        $cp = filter_input(INPUT_POST, 'cp', FILTER_SANITIZE_STRING);
        $prov = filter_input(INPUT_POST, 'prov', FILTER_SANITIZE_STRING);
        $pais = filter_input(INPUT_POST, 'pais', FILTER_SANITIZE_STRING);


        $nombremadre = filter_input(INPUT_POST, 'nombremadre', FILTER_SANITIZE_STRING);
        $apelmadre = filter_input(INPUT_POST, 'apelmadre', FILTER_SANITIZE_STRING);
        $dnimadre = filter_input(INPUT_POST, 'dnimadre', FILTER_SANITIZE_STRING);
        $tlfmadre = filter_input(INPUT_POST, 'tlfmadre', FILTER_SANITIZE_STRING);
        $emailmadre = filter_input(INPUT_POST, 'emailmadre', FILTER_SANITIZE_STRING);


        $nombrepadre = filter_input(INPUT_POST, 'nombrepadre', FILTER_SANITIZE_STRING);
        $apelpadre = filter_input(INPUT_POST, 'apelpadre', FILTER_SANITIZE_STRING);
        $dnipadre = filter_input(INPUT_POST, 'dnipadre', FILTER_SANITIZE_STRING);
        $tlfpadre = filter_input(INPUT_POST, 'tlfpadre', FILTER_SANITIZE_STRING);
        $emailpadre = filter_input(INPUT_POST, 'emailpadre', FILTER_SANITIZE_STRING);

        $alergias = filter_input(INPUT_POST, 'alergias', FILTER_SANITIZE_STRING);
        $colegio = filter_input(INPUT_POST, 'colegio', FILTER_SANITIZE_STRING);
        $curso = filter_input(INPUT_POST, 'curso', FILTER_SANITIZE_STRING);

        $hermanos = filter_input(INPUT_POST, 'hermanos', FILTER_SANITIZE_STRING);
        $camiseta = filter_input(INPUT_POST, 'camiseta', FILTER_SANITIZE_STRING);

        $anyosclub = filter_input(INPUT_POST, 'anyosclub', FILTER_SANITIZE_STRING);
        $talla = filter_input(INPUT_POST, 'talla', FILTER_SANITIZE_STRING);

        $titular = filter_input(INPUT_POST, 'titularcc', FILTER_SANITIZE_STRING);
        $iban = filter_input(INPUT_POST, 'iban', FILTER_SANITIZE_STRING);
        $entidad = filter_input(INPUT_POST, 'entidad', FILTER_SANITIZE_STRING);
        $dc = filter_input(INPUT_POST, 'dc', FILTER_SANITIZE_STRING);
        $oficina = filter_input(INPUT_POST, 'oficina', FILTER_SANITIZE_STRING);
        $cuenta = filter_input(INPUT_POST, 'cuenta', FILTER_SANITIZE_STRING);


        if (isset($idjugador) && !empty($idjugador)) {


            $instancia = jugadores::updateJugadorDesdeModalBack($idjugador, $tipodoc, $dnijugador, $fechacaddni, $nacionalidad,
                $fechanac, $nombre, $apellidos,
                $direccion, $numero, $piso, $puerta, $cp, $poblacion, $prov,
                $genero, $pais, $talla, $anyosclub, $alergias, $telefjugador, $emailjugador,
                $colegio, $curso, $hermanos,
                $nombrepadre, $apelpadre, $tlfpadre, $emailpadre, $tlfpadre,
                $nombremadre, $apelmadre, $tlfmadre, $emailmadre, $tlfmadre,

                $titular, $iban, $entidad, $oficina, $dc, $cuenta);

            echo json_encode(array("response" => "success",
                "datos" => $instancia,
                "modal_title" => "Formulario de inscripción",
                "message" => "Los datos de la inscripción se han modificado correctamente."));
        } else {
            echo json_encode(array(
                "response" => "error",
                "datos" => "",
                "modal_title" => "Error",
                "message" => "Parece que ha habido algún error"));
        }
        die;
    }

    //isnertacion pagos eba
    public function actionInsertarPagosJugadoresEbaByIdJugador()
    {
        require 'models/inscripciones_escuela_y_cantera.php';
        require 'models/jugadores_pagos.php';

        $cobros = inscripciones_escuela_y_cantera::findInscripciones_Temporada();

        //cantidades de pagos de escuela
        $prebenjaminOInferior = 150;
        $benjaminOSuperior = 175;
        //cantidad pagos cantera
        $cantera = 175;

        foreach ($cobros as $cobro) {

            //comprobamos si esta activo el jugador
            if ($cobro["is_active"]) {
                //comprobamos que sea de escuela
                if ($cobro["seccion"] == "ESCUELA") {
                    if (strpos($cobro["equipo"], "BABY") !== false || strpos($cobro["equipo"], "PREBENJAMIN") !== false) {
                        //insert de  los pagos en la tabla de jugadores pagos para equipos prebenjamin o inferior
                        $insertPagoNoviembre = jugadores_pagos::insert($cobro["id_jugador"], date("Y-m-d"), 'Trimestre1', 0, $prebenjaminOInferior,
                            'Interno', 0, NULL, NULL, NULL, $cobro["id_inscripcion"], NULL, NULL);

                        $insertPagoEnero = jugadores_pagos::insert($cobro["id_jugador"], date("Y-m-d"), 'Trimestre2', 0, $prebenjaminOInferior,
                            'Interno', 0, NULL, NULL, NULL, $cobro["id_inscripcion"], NULL, NULL);

                        $insertPagoAbril = jugadores_pagos::insert($cobro["id_jugador"], date("Y-m-d"), 'Trimestre3', 0, $prebenjaminOInferior,
                            'Interno', 0, NULL, NULL, NULL, $cobro["id_inscripcion"], NULL, NULL);
                    } else {
                        //insert de  los pagos en la tabla de jugadores pagos para equipos restantes
                        $insertPagoNoviembre = jugadores_pagos::insert($cobro["id_jugador"], date("Y-m-d"), 'Trimestre1', 0, $benjaminOSuperior,
                            'Interno', 0, NULL, NULL, NULL, $cobro["id_inscripcion"], NULL, NULL);

                        $insertPagoEnero = jugadores_pagos::insert($cobro["id_jugador"], date("Y-m-d"), 'Trimestre2', 0, $benjaminOSuperior,
                            'Interno', 0, NULL, NULL, NULL, $cobro["id_inscripcion"], NULL, NULL);

                        $insertPagoAbril = jugadores_pagos::insert($cobro["id_jugador"], date("Y-m-d"), 'Trimestre3', 0, $benjaminOSuperior,
                            'Interno', 0, NULL, NULL, NULL, $cobro["id_inscripcion"], NULL, NULL);
                    }
                } else {
                    //insert de  los pagos en la tabla de jugadores pagos para equipos cantera solo se hace enero y abril por que ya se hizo el primer pago en septiembre llamado primer pago

                    $insertPagoEnero = jugadores_pagos::insert($cobro["id_jugador"], date("Y-m-d"), 'Trimestre2', 0, $cantera,
                        'Interno', 0, NULL, NULL, NULL, $cobro["id_inscripcion"], NULL, NULL);

                    $insertPagoAbril = jugadores_pagos::insert($cobro["id_jugador"], date("Y-m-d"), 'Trimestre3', 0, $cantera,
                        'Interno', 0, NULL, NULL, NULL, $cobro["id_inscripcion"], NULL, NULL);
                }
            }


        }
    }


    //actualizacion pagos equipo EBA

    public function actionActualizarPagosJugadoresByIdJugador()
    {
        require "includes/Utils.php";

        //  Comprueba si hay que depurar y lo hace
        Utils::depurar(__FILE__ . "." . __FUNCTION__ . "." . __LINE__, "false");

        require "models/jugadores_pagos.php";
        $pagosJugador = jugadores_pagos::findByid_jugador($idJugador);


        echo json_encode(
            array(
                "response" => "success",
                "message" => "Se ha guardado la información",
            ));
        die;

    }

    //pagos de jugadores por id de jugador

    public function actionPagosJugadoresByIdJugador()
    {
        require "includes/Utils.php";

        //  Comprueba si hay que depurar y lo hace
        Utils::depurar(__FILE__ . "." . __FUNCTION__ . "." . __LINE__, "false");

        //require del modelo
        require "models/inscripciones_escuela_y_cantera.php";

        //saco los datos de la inscripcion por id
        $pagosJugador = inscripciones_escuela_y_cantera::findInscripciones_TemporadaByIdJugador($idJugador);


        //saco el pago de matricula
        $matriculasJugador = inscripciones_escuela_y_cantera::findInscripciones_TemporadaMatriculaByIdJugador($idJugador);


        echo json_encode(
            array(
                "response" => "success",
                "message" => "Se ha cargado la información",
            ));
        die;

    }

    //funcion cambiar jugador a equipo eba
    public function actionCambiarJugadorBecado()
    {

        require "includes/Utils.php";

        //  Comprueba si hay que depurar y lo hace
        Utils::depurar(__FILE__ . "." . __FUNCTION__ . "." . __LINE__, "false");

        $idJugador = filter_input(INPUT_POST, 'jugador_id', FILTER_SANITIZE_NUMBER_INT);

        //require del modelo
        require "models/jugadores.php";
        require 'models/jugadores_pagos.php';
        require "models/inscripciones_escuela_y_cantera.php";

        $jugadorBecado = jugadores::updateAttribute($idJugador, "becado", 1);

        echo json_encode(
            array(
                "response" => "success",
                "message" => "Se ha cargado la información",
            ));
        die;
    }
}

?>