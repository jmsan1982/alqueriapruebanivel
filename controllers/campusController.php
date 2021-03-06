<?php

class campusController
{

    /********************************************************
     *  CAMPUS DE TECNIFICACIÓN FEMENINA
     ********************************************************/
    public function actionExportToExcel()
    {

        require "models/inscripciones_escuelas.php";

        $datos['inscripciones'] = inscripciones_escuelas::findAllInscripcionesExcel();

        if (isset($_POST["export_data"])) {
            $filename = "escuela_tecnificacion_fem_" . date('Ymd') . ".xls";
            //header('Content-Encoding: UTF-8');
            //header('Content-Encoding: UTF-8');
            //header('Content-type: text/csv; charset=UTF-8');
            //header('Content-Type: text/html; charset=utf-16');
            header("Content-Type: application/vnd.ms-excel");
            //header("Content-Type: application/vnd.ms-excel; charset=utf-16");
            //header("Content-Type: application/vnd.ms-excel; charset=iso-8859-1");
            header("Content-Disposition: attachment; filename=" . $filename . "");
            header('Cache-Control: max-age=0');
            $show_coloumn = false;

            if (!empty($datos['inscripciones'])) {

                foreach ($datos['inscripciones'] as $inscripcion) {

                    if (!$show_coloumn) {
                        //display field/column names in first row
                        echo implode("\t", array_keys($inscripcion)) . "\r\n";
                        $show_coloumn = true;
                    }
                    //echo implode("\t", array_values($inscripcion)) . "\r\n";
                    echo implode("\t", array_values($inscripcion)) . "\r\n";
                    //chr(255).chr(254).iconv("UTF-8", "UTF-16LE//IGNORE", $inscripcion);
                    //iconv("UTF-8", "ISO-8859-1//TRANSLIT", array_values($inscripcion));
                }
            }
            exit;
        }
    }

    /********************************************************
     *  CONSULTAS ESCUELA Y CANTERA 19/20
     ********************************************************/
    //Exportar a Excel CONSULTAS /
    public function actionExportToExcelConsultasEscuelaCantera()
    {
        require "models/inscripciones.php";
        $datos["inscripciones_cobros_activos_por_confirmar"] = inscripciones::findInscripcionesPagosIncluidasGenerearXMLPorConfirmarPago($_POST["domiciliaciones_form_xml_trimestre"]);


        //if (isset($_POST["export_data_inscripciones_cantera"])) {
        $filename = "Inscripciones_Pendientes_Pago_Patronato_" . date('Ymd') . ".xls";
        header('Content-Encoding: UTF-8');
        header('Content-Type: text/html; charset=utf-16');
        header("Content-Type: application/vnd.ms-excel; charset=utf-16");
        header("Content-Disposition: attachment; filename=" . $filename . "");
        header('Cache-Control: max-age=0');
        $show_column = false;

        if (!empty($datos['inscripciones_cobros_activos_por_confirmar'])) {
            foreach ($datos['inscripciones_cobros_activos_por_confirmar'] as $inscripciones_cobros_activos_por_confirmar) {
                if (!$show_column) {
                    // Display field/column names in first row
                    echo implode("\t", array_keys($inscripciones_cobros_activos_por_confirmar)) . "\r\n";
                    $show_column = true;
                }
                echo implode("\t", array_values($inscripciones_cobros_activos_por_confirmar)) . "\r\n";
            }
        }
        exit;
    }


    //Exportar a Excel Inscripciones Cantera
    public function actionExportToExcelInscripcionesCantera()
    {

        require "models/inscripciones.php";
        $datos['datosPagos'] = inscripciones::findAllInscripcionesExcelCantera();

        if (isset($_POST["export_data_inscripciones_cantera"])) {
            $filename = "Inscripciones_Cantera_" . date('Ymd') . ".xls";
            header('Content-Encoding: UTF-8');
            header('Content-Type: text/html; charset=utf-16');
            header("Content-Type: application/vnd.ms-excel; charset=utf-16");
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
                    echo implode("\t", array_values($inscripcion)) . "\r\n";
                }
            }
            exit;
        }
    }


    //Exportar a Excel Inscripciones Escuela
    public function actionExportToExcelInscripcionesEscuela()
    {

        require "models/inscripciones.php";
        $datos['datosPagos'] = inscripciones::findAllInscripcionesExcelEscuela();

        if (isset($_POST["export_data_inscripciones_cantera"])) {
            $filename = "Inscripciones_Escuela_" . date('Ymd') . ".xls";
            header('Content-Encoding: UTF-8');
            header('Content-Type: text/html; charset=utf-16');
            header("Content-Type: application/vnd.ms-excel; charset=utf-16");
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
                    echo implode("\t", array_values($inscripcion)) . "\r\n";
                }
            }
            exit;
        }
    }


    /********************************************************
     *  SKILLS CAMP
     ********************************************************/

    public function actionBackCampusSkillsCamp()
    {
        if (self::isLogged()) {

            require "models/skillcamp.php";

            $datos['inscripciones'] = skillcamp::findInscripciones("Skills");
            $datos['numerototalinscripciones'] = count($datos['inscripciones']);

            vistaSinvista(array('datos' => $datos), "layoutsback/layout_back_skillscamp");
        }
    }


    /********************************************************
     *  SHOOTING CAMP
     ********************************************************/

    public function actionBackCampusShootingCamp()
    {
        if (self::isLogged()) {

            require "models/shootingcamp.php";

            $datos['inscripciones'] = shootingcamp::findInscripciones("Shooting");
            $datos['numerototalinscripciones'] = count($datos['inscripciones']);

            $datos['inscripciones_solocomida'] = shootingcamp::findInscripcionesShootingByOpcion("externos");
            $datos['inscripciones_pcompleta'] = shootingcamp::findInscripcionesShootingByOpcion("internos");

            vistaSinvista(array('datos' => $datos), "layoutsback/layout_back_shootingcamp");
        }
    }


    /********************************************************
     *  IMPROVE TALENT
     ********************************************************/

    public function actionBackCampusImproveTalent()
    {
        if (self::isLogged()) {

            require "models/shootingcamp.php";

            $datos['inscripciones'] = shootingcamp::findInscripciones("Improve");
            $datos['numerototalinscripciones'] = count($datos['inscripciones']);

            vistaSinvista(array('datos' => $datos), "layoutsback/layout_back_improvetalent");
        }
    }


    /********************************************************
     *  CAMPUS WORCESTER @ 110.121
     ********************************************************/

    public function actionBackCampusWorcester()
    {
        if (self::isLogged()) {

            require "models/inscripciones_campus.php";

            $datos['inscripciones'] = inscripciones_campus::findAllInscripciones();
            $datos['numerototalinscripciones'] = count($datos['inscripciones']);


            $filtrado = "0";
            vistaSinvista(array('datos' => $datos, 'filtrado' => $filtrado), "layoutsback/layout_back_campus_worcester");
        }
    }


    public function actionModificaPagadoWorcester()
    {
        if (isset($_POST['id'])) {
            require "models/inscripciones_campus.php";

            if (isset($_POST['pagado'])) {
                $pagado = 1;
            } else {
                $pagado = 0;
            }

            $id = $_POST['id'];

            $slider = inscripciones_campus::actualizapagadoworcester($id, $pagado);
        } else {
            require "error.php";
        }
    }


    public function actionDarDeBajaCampusWorcester()
    {
        if (isset($_POST['id'])) {

            $codigo = $_POST['id'];

            echo "<div style='width:100%;height:100%;background-color: rgba(0,0,0,.8);padding-top:10%;'>
						<div class='contact-form-wrapper' style='width:50%;margin-left:25%;background-color:white;border:1px solid #000000;border-radius: 10px 10px 10px 10px;padding:25px;'>
							<form action='?r=campus/DardeBajaCampusWorcester' method='post'>
								<p style='text-align:center;font-size:150%;'>¿ESTÁ SEGURO DE QUE DESEA DAR DE BAJA ESTE REGISTRO?</p>
								<div style='text-align:center;'>
									<input class='btn btn-danger btn-lg' type='submit' name='confirm' value='SI' style='float: left;'>
									<input class='btn btn-info btn-lg' type='submit' name='confirm' value='NO' style='float: right;'>
								</div>
								<input type='hidden' name='id_validado' value='" . $codigo . "'>
							</form>
						</div>
					</div>";
            die;
        }


        if (isset($_POST['confirm'])) {
            if ($_POST['confirm'] == "SI") {
                require "models/inscripciones_campus.php";

                $pedido = $_POST['id_validado'];

                $baja_reg = inscripciones_campus::DardeBajacampusworcester($pedido);
            }

            if ($_POST['confirm'] == "NO") {
                echo "<script text='javascript'>
							window.location.replace('?r=campus/BackCampusWorcester');
						</script>";
            }
        } else {
            require "error.php";
        }
    }


    public function actionExportToExcelWorcester()
    {

        require "models/inscripciones_campus.php";

        $datos['inscripciones'] = inscripciones_campus::findAllInscripcionesExcel();

        if (isset($_POST["export_data"])) {
            $filename = "Worcester" . date('Ymd') . ".xls";
            header('Content-Encoding: UTF-8');
            header('Content-Type: text/html; charset=utf-16');
            //header("Content-Type: application/vnd.ms-excel");
            header("Content-Type: application/vnd.ms-excel; charset=utf-16");
            header("Content-Disposition: attachment; filename=" . $filename . "");
            header('Cache-Control: max-age=0');
            $show_coloumn = false;

            if (!empty($datos['inscripciones'])) {

                foreach ($datos['inscripciones'] as $inscripcion) {

                    if (!$show_coloumn) {
                        //display field/column names in first row
                        echo implode("\t", array_keys($inscripcion)) . "\r\n";
                        $show_coloumn = true;
                    }
                    //echo implode("\t", array_values($inscripcion)) . "\r\n";
                    echo implode("\t", array_values($inscripcion)) . "\r\n";
                    //iconv("UTF-8", "ISO-8859-1//TRANSLIT", $alumno['nombre']),
                }
            }
            exit;
        }
    }


    public function actionImprimirFichaCampusWorcester()
    {
        // Comprobamos que el usuario tiene algún rol de administrador para continuar...
        if (isset($_SESSION['usuario']) && ($_SESSION['rolusuario'] == "admin" || $_SESSION['rolusuario'] == "superadmin")) {

            require "models/inscripciones_campus.php";

            // Recogemos la variable "tipopago" de la URL para incluirla en el cuerpo del HTML
            $tipopago = $_GET['tipopago'];

            // Dependiendo del tipo de pago, asignamos un título al cuerpo del HTML
            if ($tipopago == "OFICINA") {
                $seccioninscripcion = "Ficha inscripción pago oficina Campus Worcester";
            } elseif ($tipopago == "ONLINE") {
                $seccioninscripcion = "Ficha inscripción pago online Campus Worcester";
            }


            // Recogemos la variable "numeropedido" de la URL para pasársela al modelo e incluirla en el cuerpo del HTML
            $numero = $_GET['numeropedido'];

            // Recogemos todos los datos del registro pasándole el número de pedido
            $contenidocorreo = inscripciones_campus::findInscripcionesporPedido($numero);


            // Generamos el contenido de los datos a mostrar en el cuerpo del HTML
            $contenidocorreo[0]['fecha_nacimiento'] = date("d/m/Y", strtotime($contenidocorreo[0]['fecha_nacimiento']));
            $contenidocorreo[0]['expedicion_pasaporte'] = date("d/m/Y", strtotime($contenidocorreo[0]['expedicion_pasaporte']));
            $contenidocorreo[0]['caducidad_pasaporte'] = date("d/m/Y", strtotime($contenidocorreo[0]['caducidad_pasaporte']));

            $contenido = "Nombre y apellidos: " . $contenidocorreo[0]['nombre'] . " " . $contenidocorreo[0]['apellidos'] .
                "<br>Fecha de nacimiento: " . $contenidocorreo[0]['fecha_nacimiento'] .
                "<br>Teléfono: " . $contenidocorreo[0]['telefono'] .
                "<br>Teléfono Móvil: " . $contenidocorreo[0]['telefono_movil'] .
                "<br>Correo electrónico: " . $contenidocorreo[0]['email'] .
                "<br>Pasaporte: " . $contenidocorreo[0]['pasaporte'] .
                "<br>Fecha de expedición: " . $contenidocorreo[0]['expedicion_pasaporte'] .
                "<br>Fecha de caducidad: " . $contenidocorreo[0]['caducidad_pasaporte'] .
                "<br>Nivel de inglés hablado: " . $contenidocorreo[0]['ingles_hablado'] .
                "<br>Nivel de inglés escrito: " . $contenidocorreo[0]['ingles_escrito'] .
                "<br>Tratamientos médicos: " . $contenidocorreo[0]['tratamientos_medicos'] .
                "<br>Alergias: " . $contenidocorreo[0]['alergias'] .
                "<br>Club: " . $contenidocorreo[0]['equipo'] .
                "<br>Categoría: " . $contenidocorreo[0]['categoria'] .
                "<br>Altura: " . $contenidocorreo[0]['altura'] .
                "<br>Talla de ropa: " . $contenidocorreo[0]['talla_ropa'];

            // Creamos todo el cuerpo de la vista en HTML
            $body = '
				<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
					<html xmlns="https://www.w3.org/1999/xhtml">
						<head>
							<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
							<title>L´Alqueria del Basket</title>
							<meta name="viewport" content="width=device-width, initial-scale=1.0">
						</head>
						<body style="margin: 0; padding: 0;">
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tr>
									<td style="padding: 20px 0 30px 0;">
										<!--[if (gte mso 9)|(IE)]>
										<table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
											<tr>
												<td>
										<![endif]-->

										<table width="600" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
											<tr>
												<td align="center" bgcolor="#000000" style="padding: 15px 0 15px 0;">
													<a href="https://servicios.alqueriadelbasket.com" target="_blank">
														<img src="https://servicios.alqueriadelbasket.com/img/logos-cabecera-email.png" 
														alt="Alqueria del Basket" width="547" height="81" style="display: block;">
													</a>
												</td>
											</tr>
											<tr>
												<td bgcolor="#ffffff" style="padding: 30px 25px 30px 25px;">
													<h3 style="color: #eb7c00; border-bottom: #eb7c00 2px solid;">' . $seccioninscripcion . '</h3>
													<p><strong>Estos son los datos recibidos relacionados con su inscripción.</strong></p>
													<p><strong>Número de pedido:</strong> ' . $numero . '</p>
													<p>' . $contenido . '</p>
												</td>
											</tr>
											<tr>
												<td bgcolor="#424241" style="padding: 20px 30px 20px 30px">
													<table border="0" cellpadding="0" cellspacing="0" width="100%">
														<tr>
															<td width="75%" style="font-family: Arial, sans-serif; line-height: 18px; font-size: 12px;">
																<span style="color: #eb7c00;">&copy; L´Alqueria del Basket 2020</span><br>
																<span style="color: #ffffff;">C/ Bomber Ramon Duart S/N 46013, València</span><br>
																<span style="color: #ffffff;">+34 96 121 55 43</span>
															</td>
															<td width="25%" align="right">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td>
																			<a href="https://www.facebook.com/LAlqueriaVBC" target="_blank">
																				<img src="https://servicios.alqueriadelbasket.com/img/logo-facebook.png" alt="Facebook L´Alqueria del VBC" width="32" height="32" style="display: block;" border="0">
																			</a>
																		</td>
																		<td style="font-size: 0; line-height: 0;" width="10%">&nbsp;</td>
																		<td>
																			<a href="https://twitter.com/LAlqueriaVBC" target="_blank">
																				<img src="https://servicios.alqueriadelbasket.com/img/logo-twitter.png" alt="Twitter L´Alqueria del VBC" width="32" height="32" style="display: block;" border="0">
																			</a>
																		</td>
																	</tr>
																</table>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
										<!--[if (gte mso 9)|(IE)]>
												</td>
											</tr>
										</table>
										<![endif]-->
									</td>
								</tr>
							</table>
						</body>
					</html>';

            echo "<pre>";
            echo $body;
            echo "</pre>";
        } else {
            require('error.php');
        }
    }


 


    /********************************************************
     *  CAMPUS IBIZA
     ********************************************************/

    public function actionBackCampusIbiza()
    {
        if (self::isLogged()) {
            require "models/inscripciones_campus.php";

            $datos['inscripciones'] = inscripciones_campus::findAllInscripcionesCampusIbiza();
            $datos['numerototalinscripciones'] = count($datos['inscripciones']);

            $filtrado = "0";
            vistaSinvista(array('datos' => $datos, 'filtrado' => $filtrado), "layoutsback/layout_back_campus_ibiza");
        }
    }


    public function actionDardeBajaCampusIbiza()
    {
        if (isset($_POST['id'])) {

            $codigo = $_POST['id'];

            echo "<div style='width: 100%; height: 100%; background-color: rgba(0,0,0,.8); padding-top: 10%;'>
						<div class='contact-form-wrapper' style='width: 50%; margin-left: 25%; background-color: white; border: 1px solid #000000; border-radius: 10px; padding: 25px;'>
							<form action='?r=campus/DardeBajaCampusIbiza' method='post'>
								<p style='text-align: center; font-size: 150%;'>¿ESTÁ SEGURO QUE DESEA DAR DE BAJA ESTE REGISTRO?</p>
								<div style='text-align: center;'>
									<input class='btn btn-danger btn-lg' type='submit' name='confirm' value='SI' style='float: left;'>
									<input class='btn btn-info btn-lg' type='submit' name='confirm' value='NO' style='float: right;'>
								</div>
								<input type='hidden' name='id_validado' value='" . $codigo . "'>
							</form>
						</div>
					</div>";
            die;
        }

        if (isset($_POST['confirm'])) {

            if ($_POST['confirm'] == "SI") {
                require "models/ibiza.php";

                $pedido = $_POST['id_validado'];

                $baja_reg = ibiza::DardeBajacampusibiza($pedido);
            }

            if ($_POST['confirm'] == "NO") {
                echo "<script text='javascript'> window.location.replace('?r=campus/BackCampusVerano'); </script>";
            }
        } else {
            require "error.php";
        }
    }


    public function actionModificaPagadoCampusIbiza()
    {
        if (isset($_POST['id'])) {

            require "models/ibiza.php";

            if (isset($_POST['pagado'])) {
                $pagado = 1;
            } else {
                $pagado = 0;
            }

            $id = $_POST['id'];

            $slider = ibiza::updateAttribute($id, "pagado", $pagado, "no");

            header('Location: ?r=campus/BackCampusIbiza');

        } else {
            require "error.php";
        }
    }


    public function actionExportToExcelCampusIbiza()
    {

        require "models/ibiza.php";

        $datos['inscripciones'] = ibiza::findAllInscripcionesExcel();

        if (isset($_POST["export_data"])) {
            $filename = "Campus_ibiza" . date('Ymd') . ".xls";
            header('Content-Encoding: UTF-8');
            header('Content-Type: text/html; charset=utf-16');
            //header("Content-Type: application/vnd.ms-excel");
            header("Content-Type: application/vnd.ms-excel; charset=utf-16");
            header("Content-Disposition: attachment; filename=" . $filename . "");
            header('Cache-Control: max-age=0');
            $show_coloumn = false;

            if (!empty($datos['inscripciones'])) {

                foreach ($datos['inscripciones'] as $inscripcion) {

                    if (!$show_coloumn) {
                        // display field/column names in first row
                        echo implode("\t", array_keys($inscripcion)) . "\r\n";
                        $show_coloumn = true;
                    }
                    //echo implode("\t", array_values($inscripcion)) . "\r\n";
                    echo implode("\t", array_values($inscripcion)) . "\r\n";
                    //iconv("UTF-8", "ISO-8859-1//TRANSLIT", $alumno['nombre']),
                }
            }
            exit;
        }
    }


    public function actionImprimirFichaCampusIbiza()
    {

        // Comprobamos que el usuario tiene algún rol de administrador para continuar...
        if (isset($_SESSION['usuario']) && ($_SESSION['rolusuario'] == "admin" || $_SESSION['rolusuario'] == "superadmin")) {

            require "models/inscripciones_campus.php";

            // Recogemos la variable "tipopago" de la URL para incluirla en el cuerpo del HTML
            $tipopago = $_GET['tipopago'];

            // Dependiendo del tipo de pago, asignamos un título al cuerpo del HTML
            if ($tipopago == "OFICINA") {
                $seccioninscripcion = "Ficha inscripción pago oficina Campus Ibiza";
            } elseif ($tipopago == "ONLINE") {
                $seccioninscripcion = "Ficha inscripción pago online Campus Ibiza";
            }


            // Recogemos la variable "numeropedido" de la URL para pasársela al modelo e incluirla en el cuerpo del HTML
            $numero = $_GET['numeropedido'];

            // Recogemos todos los datos del registro pasándole el número de pedido
            $contenidocorreo = inscripciones_campus::damedatoscampusibiza($numero);


            // Generamos el contenido de los datos a mostrar en el cuerpo del HTML
            $contenidocorreo['fechanacimiento'] = date("d/m/Y", strtotime($contenidocorreo['fechanacimiento']));

            $turnos = "";

            $turnos .= $contenidocorreo['semana1'] . "   ";
            $turnos .= $contenidocorreo['semana2'] . "   ";
            $turnos .= $contenidocorreo['semana3'] . "   ";

            $contenido = "Género: " . $contenidocorreo['genero'] .
                "<br>Nombre y apellidos: " . $contenidocorreo['nombre'] . " " . $contenidocorreo['apellidos'] .
                "<br>Fecha de nacimiento: " . $contenidocorreo['fechanacimiento'] .
                "<br>DNI: " . $contenidocorreo['dni'] .
                "<br>Turnos: " . $turnos .
                "<br>Dias Sueltos: " . $contenidocorreo["diassueltos"] .
                "<br>Club: " . $contenidocorreo['club'] .
                //"<br>Tratamientos médicos: ".$contenidocorreo['tratamientosmedicos'].
                "<br>Importe: " . $contenidocorreo['importe'] . "€" .
                "<br>Nombre y apellidos tutor/a: " . $contenidocorreo['nombretutor'] . " " . $contenidocorreo['apellidostutor'] .
                "<br>Dni tutor/a: " . $contenidocorreo['dnitutor'] .
                "<br>Teléfono del tutor/a: " . $contenidocorreo['telefonotutor'] .
                "<br>Correo electrónico: " . $contenidocorreo['emailtutor'];


            // Creamos todo el cuerpo de la vista en HTML
            $body = '
				<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
					<html xmlns="https://www.w3.org/1999/xhtml">
						<head>
							<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
							<title>L´Alqueria del Basket</title>
							<meta name="viewport" content="width=device-width, initial-scale=1.0">
						</head>
						<body style="margin: 0; padding: 0;">
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tr>
									<td style="padding: 20px 0 30px 0;">
										<!--[if (gte mso 9)|(IE)]>
										<table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
											<tr>
												<td>
										<![endif]-->

										<table width="600" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
											<tr>
												<td align="center" bgcolor="#000000" style="padding: 15px 0 15px 0;">
													<a href="https://servicios.alqueriadelbasket.com" target="_blank">
														<img src="https://servicios.alqueriadelbasket.com/img/logos-cabecera-email.png" 
														alt="Alqueria del Basket" width="547" height="81" style="display: block;">
													</a>
												</td>
											</tr>
											<tr>
												<td bgcolor="#ffffff" style="padding: 30px 25px 30px 25px;">
													<h3 style="color: #eb7c00; border-bottom: #eb7c00 2px solid;">' . $seccioninscripcion . '</h3>
													<p><strong>Estos son los datos recibidos relacionados con su inscripción.</strong></p>
													<p><strong>Número de pedido:</strong> ' . $numero . '</p>
													<p>' . $contenido . '</p>
												</td>
											</tr>
											<tr>
												<td bgcolor="#424241" style="padding: 20px 30px 20px 30px">
													<table border="0" cellpadding="0" cellspacing="0" width="100%">
														<tr>
															<td width="75%" style="font-family: Arial, sans-serif; line-height: 18px; font-size: 12px;">
																<span style="color: #eb7c00;">&copy; L´Alqueria del Basket 2020</span><br>
																<span style="color: #ffffff;">C/ Bomber Ramon Duart S/N 46013, València</span><br>
																<span style="color: #ffffff;">+34 96 121 55 43</span>
															</td>
															<td width="25%" align="right">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td>
																			<a href="https://www.facebook.com/LAlqueriaVBC" target="_blank">
																				<img src="https://servicios.alqueriadelbasket.com/img/logo-facebook.png" alt="Facebook L´Alqueria del VBC" width="32" height="32" style="display: block;" border="0">
																			</a>
																		</td>
																		<td style="font-size: 0; line-height: 0;" width="10%">&nbsp;</td>
																		<td>
																			<a href="https://twitter.com/LAlqueriaVBC" target="_blank">
																				<img src="https://servicios.alqueriadelbasket.com/img/logo-twitter.png" alt="Twitter L´Alqueria del VBC" width="32" height="32" style="display: block;" border="0">
																			</a>
																		</td>
																	</tr>
																</table>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
										<!--[if (gte mso 9)|(IE)]>
												</td>
											</tr>
										</table>
										<![endif]-->
									</td>
								</tr>
							</table>
						</body>
					</html>';

            echo "<pre>";
            echo $body;
            echo "</pre>";
        } else {
            require('error.php');
        }
    }


    public function actionUpdateInscripcionModalCampusIbiza()
    {
        error_log(print_r($_POST, 1));

        require "models/inscripciones_campus.php";

        $idinscripcion = filter_input(INPUT_POST, 'idinscripcion', FILTER_SANITIZE_NUMBER_INT);
        if (isset($idinscripcion) && !empty($idinscripcion)) {

            $dnijugador = filter_input(INPUT_POST, 'dnijugador', FILTER_SANITIZE_STRING);
            $instancia_dni = inscripciones_campus::updateAttributeCampusIbiza($idinscripcion, "dni", $dnijugador, "si");

            $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
            $instancia_nombre = inscripciones_campus::updateAttributeCampusIbiza($idinscripcion, "nombre", $nombre, "si");

            $apellidos = filter_input(INPUT_POST, 'apellidos', FILTER_SANITIZE_STRING);
            $instancia_apellidos = inscripciones_campus::updateAttributeCampusIbiza($idinscripcion, "apellidos", $apellidos, "si");

            //$date = new DateTime($_POST["fechanac"]);
            $fechanac = filter_input(INPUT_POST, 'fechanac', FILTER_SANITIZE_STRING);
            $instancia_nacimiento = inscripciones_campus::updateAttributeCampusIbiza($idinscripcion, "fechanacimiento", $fechanac, "si");

            $club = filter_input(INPUT_POST, 'club', FILTER_SANITIZE_STRING);
            $instancia_club = inscripciones_campus::updateAttributeCampusIbiza($idinscripcion, "club", $club, "si");

            $direccion = filter_input(INPUT_POST, 'direccion', FILTER_SANITIZE_STRING);
            $instancia_direccion = inscripciones_campus::updateAttributeCampusIbiza($idinscripcion, "direccion", $direccion, "si");

            $numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING);
            $instancia_numero = inscripciones_campus::updateAttributeCampusIbiza($idinscripcion, "numero", $numero, "si");

            $piso = filter_input(INPUT_POST, 'piso', FILTER_SANITIZE_STRING);
            $instancia_piso = inscripciones_campus::updateAttributeCampusIbiza($idinscripcion, "piso", $piso, "si");

            $puerta = filter_input(INPUT_POST, 'puerta', FILTER_SANITIZE_STRING);
            $instancia_puerta = inscripciones_campus::updateAttributeCampusIbiza($idinscripcion, "puerta", $puerta, "si");

            $poblacion = filter_input(INPUT_POST, 'poblacion', FILTER_SANITIZE_STRING);
            $instancia_poblacion = inscripciones_campus::updateAttributeCampusIbiza($idinscripcion, "poblacion", $poblacion, "si");

            $cp = filter_input(INPUT_POST, 'cp', FILTER_SANITIZE_STRING);
            $instancia_cp = inscripciones_campus::updateAttributeCampusIbiza($idinscripcion, "cp", $cp, "si");

            $prov = filter_input(INPUT_POST, 'prov', FILTER_SANITIZE_STRING);
            $instancia_provincia = inscripciones_campus::updateAttributeCampusIbiza($idinscripcion, "provincia", $prov, "si");

            $nombretutor = filter_input(INPUT_POST, 'nombretutor', FILTER_SANITIZE_STRING);
            $instancia_nombretutor = inscripciones_campus::updateAttributeCampusIbiza($idinscripcion, "nombretutor", $nombretutor, "si");

            $apeltutor = filter_input(INPUT_POST, 'apeltutor', FILTER_SANITIZE_STRING);
            $instancia_apeltutor = inscripciones_campus::updateAttributeCampusIbiza($idinscripcion, "apellidostutor", $apeltutor, "si");

            $dnitutor = filter_input(INPUT_POST, 'dnitutor', FILTER_SANITIZE_STRING);
            $instancia_dnitutor = inscripciones_campus::updateAttributeCampusIbiza($idinscripcion, "dnitutor", $dnitutor, "si");

            $tlftutor = filter_input(INPUT_POST, 'tlftutor', FILTER_SANITIZE_STRING);
            $instancia_tlftutor = inscripciones_campus::updateAttributeCampusIbiza($idinscripcion, "telefonotutor", $tlftutor, "si");

            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
            $instancia_email = inscripciones_campus::updateAttributeCampusIbiza($idinscripcion, "emailtutor", $email, "si");

            $tratam = filter_input(INPUT_POST, 'tratam', FILTER_SANITIZE_STRING);
            $instancia_tratam = inscripciones_campus::updateAttributeCampusIbiza($idinscripcion, "tratamientosmedicos", $tratam, "si");

            $sip_que_habia = filter_input(INPUT_POST, 'sipanterior', FILTER_SANITIZE_STRING);

            /***********************
             *    FICHERO SIP
             **********************/
            if (!empty($_FILES['sipnuevo']['tmp_name'])) {
                $array_fichero_y_extension = explode(".", $_FILES["sipnuevo"]["name"]);
                $numerodeelementos = count($array_fichero_y_extension);
                $extension = $array_fichero_y_extension[$numerodeelementos - 1];
                $sip = 'img/sipcampusibiza_vb/' . strtolower(self::sanitize_nombre_para_columna_myslq($_POST['nombre'])) . "-" . strtolower(self::sanitize_nombre_para_columna_myslq($_POST['apellidos'])) . "-" . date("d-m-Y-H-i-s") . "." . $extension;
                $archivo_movido = move_uploaded_file($_FILES["sipnuevo"]["tmp_name"], $sip);
            } else {
                $sip = $sip_que_habia;
            }

            $instancia_sip = inscripciones_campus::updateAttributeCampusIbiza($idinscripcion, "fotocopiasip", $sip, "si");


            $turno2 = $_POST["turno2"];
            //$turno21 = $_POST["turno2"];
            $turno2_valor = filter_input(INPUT_POST, 'turno2', FILTER_SANITIZE_STRING);
            $turno2_valor_matinal = filter_input(INPUT_POST, 'turno2_matinal', FILTER_SANITIZE_STRING);
            //error_log( " Turnito -> " . $_POST["turno2_manyana"] );
            if ($turno2_valor == 'turno2_manyana') {
                $turno2 = "sem2_manyana";
            }

            //$turno2_completo =  filter_input(INPUT_POST, 'turno2_completo', FILTER_SANITIZE_STRING);
            if ($turno2_valor == 'turno2_completo') {
                $turno2 = "sem2_comp";
            }

            //$turno2_pension =  filter_input(INPUT_POST, 'turno2_pension', FILTER_SANITIZE_STRING);
            if ($turno2_valor == 'turno2_pension') {
                $turno2 = "sem2_pension";
            }

            //$turno2_matinal =  filter_input(INPUT_POST, 'turno2_matinal', FILTER_SANITIZE_STRING);
            if ($turno2_valor_matinal == 'turno2_matinal') {
                $turno2 .= "/matinal";
            }

            $instancia_semana2 = inscripciones_campus::updateAttributeCampusIbiza($idinscripcion, "semana2", $turno2, "si");

            $turno3 = "";

            $turno3_valor = filter_input(INPUT_POST, 'turno3', FILTER_SANITIZE_STRING);
            $turno3_valor_matinal = filter_input(INPUT_POST, 'turno3_matinal', FILTER_SANITIZE_STRING);
            //turno3_manyana
            if ($turno3_valor == 'turno3_manyana') {
                $turno3 = "sem3_manyana";
            }

            //$turno3_completo =  filter_input(INPUT_POST, 'turno3_completo', FILTER_SANITIZE_STRING);
            if ($turno3_valor == 'turno3_completo') {
                $turno3 = "sem3_comp";
            }

            //$turno3_pension =  filter_input(INPUT_POST, 'turno3_pension', FILTER_SANITIZE_STRING);
            if ($turno3_valor == 'turno3_pension') {
                $turno3 = "sem3_pension";
            }

            //$turno3_matinal =  filter_input(INPUT_POST, 'turno3_matinal', FILTER_SANITIZE_STRING);
            if ($turno3_valor_matinal == 'turno3_matinal') {
                $turno3 .= "/matinal";
            }

            //error_log( $turno2 );
            //error_log( $turno3 );
            $instancia_semana3 = inscripciones_campus::updateAttributeCampusIbiza($idinscripcion, "semana3", $turno3, "si");

            echo json_encode(array("response" => "success",
                //"datos" => $instancia,
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

    public function actionMostrarModalUrlPagoIbiza()
    {
        //  Recibimos el ID de la inscripción
        $idinscripcion = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

        if (!empty($idinscripcion)) {
            require "models/inscripciones_campus.php";
            require "includes/Utils.php";

            //  Recuperamos la inscripción
            $registros_campus_verano = inscripciones_campus::damedatoscampusveranoById($idinscripcion);
            //  Si no tiene código de error o si lo tiene pero efectivamente es erroneo, no es 0000, le generamos uno nuevo
            if (!isset($registros_campus_verano["error_tpv"]) || $registros_campus_verano["error_tpv"] == "") {
                //  Calculamos nuevo numero pedido
                $nuevo_numero_pedido = inscripciones_campus::dameNuevoNumeroPedidoCampusVerano();
                $nuevo_numero_pedido = intval($nuevo_numero_pedido['MAX(numeropedido)']) + 1;

                //  Guardamos el nuevo número de pedido
                $registros_campus_verano = inscripciones_campus::updateAttributeCampusVerano(
                    $registros_campus_verano['id'], "numeropedido", $nuevo_numero_pedido, "si");
            }

            $url = 'https://valenciabasket.com/campusverano/tpv_campusverano/tpv.php?pedido=' . $registros_campus_verano["numeropedido"] . '&titular=' . $registros_campus_verano['nombretutor'] . " " . $registros_campus_verano['apellidostutor'] . '&importe=' . $registros_campus_verano["importe"];

            echo json_encode(array(
                "response" => "success",
                "instancia" => $registros_campus_verano,
                "modal_title" => "Formulario de inscripción en Campus Verano VB",
                "url" => $url,
                "message" => "Los datos de la inscripción se han cargado correctamente."));
            die;
        } else {
            echo json_encode(array(
                "response" => "error",
                "instancia" => "",
                "modal_title" => "Error",
                "message" => "Parece que ha habido algún error"));
        }
    }


    public function actionMostrarModalCampusIbiza()
    {
        //error_log(__FILE__.__LINE__);
        // error_log(print_r($_POST,1));

        $idinscripcion = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

        //error_log( $idinscripcion );

        //error_log("inscrpcion campus verano vb: ".$idinscripcion);

        if (!empty($idinscripcion)) {
            require "models/inscripciones_campus.php";
            require "includes/Utils.php";

            $datos = inscripciones_campus::damedatoscampusIbizaById($idinscripcion);

            // error_log(__FILE__.__LINE__);

            //error_log(print_r($datos,1));
            $alerta_cuenta = "";

            echo json_encode(array(
                "response" => "success",
                "instancia" => $datos,
                "modal_title" => "Formulario de inscripción en Campus Ibiza",
                "message" => "Los datos de la inscripción se han cargado correctamente.",
                "alerta_cuenta" => $alerta_cuenta));
            die;
        } else {
            echo json_encode(array(
                "response" => "error",
                "instancia" => "",
                "modal_title" => "Error",
                "message" => "Parece que ha habido algún error"));
        }
    }


    /********************************************************
     *  CAMPUS PASCUA VBC @ 110.123
     ********************************************************/

    public function actionBackCampusPascua()
    {
        if (self::isLogged()) {

            require "models/inscripciones_campus.php";

            $datos['inscripciones'] = inscripciones_campus::findAllInscripcionesCampusPascua();
            $datos['numerototalinscripciones'] = count($datos['inscripciones']);

            $datos['inscripciones_media'] = inscripciones_campus::findInscripcionesCampusPascuaByOpcion("media");
            $datos['inscripciones_completo'] = inscripciones_campus::findInscripcionesCampusPascuaByOpcion("completa");


            $filtrado = "0";
            vistaSinvista(array('datos' => $datos, 'filtrado' => $filtrado), "layoutsback/layout_back_campus_pascua");
        }
    }


    public function actionDardeBajaCampusPascua()
    {
        if (isset($_POST['id'])) {

            $codigo = $_POST['id'];

            echo "<div style='width:100%;height:100%;background-color: rgba(0,0,0,.8);padding-top:10%;'>
						<div class='contact-form-wrapper' style='width:50%;margin-left:25%;background-color:white;border:1px solid #000000;border-radius: 10px 10px 10px 10px;padding:25px;'>
							<form action='?r=campus/DardeBajaCampusPascua' method='post'>
								<p style='text-align:center;font-size:150%;'> ¿ESTÁ SEGURO QUE DESEA DAR DE BAJA ESTE REGISTRO? </p>
								<div style='text-align:center;'>
									<input class='btn btn-danger btn-lg' type='submit' name='confirm' value='SI' style='float: left;'>
									<input class='btn btn-info btn-lg' type='submit' name='confirm' value='NO' style='float: right;'>
								</div>
								<input type='hidden' name='id_validado' value='" . $codigo . "'>
							</form>
						</div>
					</div>";
            die;
        }

        if (isset($_POST['confirm'])) {

            if ($_POST['confirm'] == "SI") {
                require "models/inscripciones_campus.php";

                $pedido = $_POST['id_validado'];

                $baja_reg = inscripciones_campus::DarDeBajaCampusPascua($pedido);
            }

            if ($_POST['confirm'] == "NO") {
                echo "<script text='javascript'>
							window.location.replace('?r=campus/BackCampusPascua');
						</script>";
            }
        } else {
            require "error.php";
        }
    }


    public function actionModificaPagadoCampusPascua()
    {
        if (isset($_POST['id'])) {

            require "models/inscripciones_campus.php";

            if (isset($_POST['pagado'])) {
                $pagado = 1;
            } else {
                $pagado = 0;
            }

            $id = $_POST['id'];

            $slider = inscripciones_campus::actualizapagadocampuspascua($id, $pagado);
        } else {
            require "error.php";
        }
    }


    //para conexiones con utf-8 en el 110.123 (tabla con cotejamiento utf8mb4_spanish_ci)
    public function actionExportToExcelCampusPascua()
    {

    	require "models/inscripciones_campus.php";
    	$where="";
    	$campos="";
    	$campoorder="numeropedido";
	       // error_log("aobserv: " . $_POST["alergias"]);
    	if (isset($_POST["alergias"])) {
    		$where.=" ";
	            //mostramos todos los campos de alergias, operaciones.....
    		$campos=' enfermedad as Enfermedades, 
    		alergias as Alergias,  
    		tratamientosmedicos as TratamientosMedicos, 
    		operacionreciente as OperacionReciente, 
    		replace(replace(observaciones,Char(13),"-"),Char(10),"" ) as observaciones, familiarcovid, sintomascovid, ';
    	}

    	if (isset($_POST["club"])) {
    		$where.=" ";
	            //mostramos el club
    		$campos.=" tallacamiseta as Talla, transporte as Transporte, ";
    	}


    	if (isset($_POST["inscripcion"])) {
    		$where.=" ";
    		$campos.=" tallacamiseta as Talla, transporte as Transporte, ";
    		$campoorder="pension";
    	}

    	$datos['inscripciones'] = inscripciones_campus::findAllInscripcionesExcelCampusPascuaConCampos($where, $campoorder, $campos);

    	if (isset($_POST["export_data"])) {
    		$filename = "campus_pascua_vb_" . date('Ymd') . ".xls";

    		header("Content-Type: application/vnd.ms-excel; charset=UTF-16LE");
            header("Content-Disposition: attachment; filename=" . $filename . "");
            header('Cache-Control: max-age=0');

            $show_coloumn = false;

            if (!empty($datos['inscripciones'])) {

                foreach ($datos['inscripciones'] as $inscripcion) {
                    if (!$show_coloumn) {
                        //display field/column names in first row
                        echo implode("\t", array_keys($inscripcion)) . "\r\n";
                        $show_coloumn = true;
                    }
                    //echo implode("\t", array_values($inscripcion)) . "\r\n";
                    echo mb_convert_encoding(implode("\t", array_values($inscripcion)) . "\r\n", 'UTF-16LE', 'UTF-8');
                }
            }
    		exit;
    	}
    }



    public function actionExportToExcelCampusPascuaCompleto()
    {

        require "models/inscripciones_campus.php";

        $datos['inscripciones'] = inscripciones_campus::findAllInscripcionesExcelCampusPascua();

        if (isset($_POST["export_data2"])) {
            $filename = "Campus_pascua_vb" . date('Ymd') . ".xls";
            header("Content-Type: application/vnd.ms-excel; charset=UTF-16LE");
            header("Content-Disposition: attachment; filename=" . $filename . "");
            header('Cache-Control: max-age=0');

            $show_coloumn = false;

            if (!empty($datos['inscripciones'])) {

                foreach ($datos['inscripciones'] as $inscripcion) {
                    if (!$show_coloumn) {
                        //display field/column names in first row
                        echo implode("\t", array_keys($inscripcion)) . "\r\n";
                        $show_coloumn = true;
                    }
                    //echo implode("\t", array_values($inscripcion)) . "\r\n";
                    echo mb_convert_encoding(implode("\t", array_values($inscripcion)) . "\r\n", 'UTF-16LE', 'UTF-8');
                }
            }
            exit;
        }
    }


    public function actionMostrarModalCampusPascua()
    {
            //error_log(__FILE__.__FUNCTION__.__LINE__);
            //error_log(print_r($_POST,1));

            $idinscripcion = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

            //error_log("inscrpcion campus verano vb: ".$idinscripcion);

            if (!empty($idinscripcion)) {
                require "models/inscripciones_campus.php";
                require "includes/Utils.php";

                $datos = inscripciones_campus::findDatosCampusPascuaById($idinscripcion);
                $alerta_cuenta = "";

                echo json_encode(array(
                    "response" => "success",
                    "instancia" => $datos,
                    "modal_title" => "Formulario de inscripción en Campus Pascua",
                    "message" => "Los datos de la inscripción se han cargado correctamente.",
                    "alerta_cuenta" => $alerta_cuenta));
                die;
            } else {
                echo json_encode(array(
                    "response" => "error",
                    "instancia" => "",
                    "modal_title" => "Error",
                    "message" => "Parece que ha habido algún error"));
                die;
            }
    }


    public function actionUpdateInscripcionModalCampusPascua()
    {
        require "models/inscripciones_campus.php";

        $idinscripcion = filter_input(INPUT_POST, 'idinscripcion', FILTER_SANITIZE_NUMBER_INT);

        $dnijugador = filter_input(INPUT_POST, 'dnijugador', FILTER_SANITIZE_STRING);
        $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
        $apellidos = filter_input(INPUT_POST, 'apellidos', FILTER_SANITIZE_STRING);
        $fechanac = filter_input(INPUT_POST, 'fechanac', FILTER_SANITIZE_STRING);
        $club = filter_input(INPUT_POST, 'club', FILTER_SANITIZE_STRING);
        $genero = filter_input(INPUT_POST, 'genero', FILTER_SANITIZE_STRING);
        $tallacam = filter_input(INPUT_POST, 'tallacamiseta', FILTER_SANITIZE_STRING);

        $direccion = filter_input(INPUT_POST, 'direccion', FILTER_SANITIZE_STRING);
        $numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING);
        $piso = filter_input(INPUT_POST, 'piso', FILTER_SANITIZE_STRING);
        $puerta = filter_input(INPUT_POST, 'puerta', FILTER_SANITIZE_STRING);
        $poblacion = filter_input(INPUT_POST, 'poblacion', FILTER_SANITIZE_STRING);
        $cp = filter_input(INPUT_POST, 'cp', FILTER_SANITIZE_STRING);
        $prov = filter_input(INPUT_POST, 'prov', FILTER_SANITIZE_STRING);


        $nombretutor = filter_input(INPUT_POST, 'nombretutor', FILTER_SANITIZE_STRING);
        $apeltutor = filter_input(INPUT_POST, 'apeltutor', FILTER_SANITIZE_STRING);
        $dnitutor = filter_input(INPUT_POST, 'dnitutor', FILTER_SANITIZE_STRING);
        $tlftutor = filter_input(INPUT_POST, 'tlftutor', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);

        $alergias = filter_input(INPUT_POST, 'alergias', FILTER_SANITIZE_STRING);
        $enfermedad = filter_input(INPUT_POST, 'enfermedad', FILTER_SANITIZE_STRING);
        $tratam = filter_input(INPUT_POST, 'tratam', FILTER_SANITIZE_STRING);
        $operaciones = filter_input(INPUT_POST, 'operaciones', FILTER_SANITIZE_STRING);
        $observ = filter_input(INPUT_POST, 'observ', FILTER_SANITIZE_STRING);
        $transporte = filter_input(INPUT_POST, 'transporte', FILTER_SANITIZE_STRING);

        $sintomascovid = filter_input(INPUT_POST, 'sintomasc', FILTER_SANITIZE_STRING);
        $familiarcovid = filter_input(INPUT_POST, 'familiarc', FILTER_SANITIZE_STRING);
        $tipopago = filter_input(INPUT_POST, 'tpago', FILTER_SANITIZE_STRING);

       

        /***********************
         *    FICHERO SIP
         **********************/

        $sip_que_habia = filter_input(INPUT_POST, 'sipanterior', FILTER_SANITIZE_STRING);

        if (!empty($_FILES['sipnuevo']['tmp_name'])) {
            $array_fichero_y_extension = explode(".", $_FILES["sipnuevo"]["name"]);
            $numerodeelementos = count($array_fichero_y_extension);
            $extension = $array_fichero_y_extension[$numerodeelementos - 1];
            $sip = 'img/sipcampuspascua_vb/' . strtolower(self::sanitize_nombre_para_columna_myslq($_POST['nombre'])) . "-" . strtolower(self::sanitize_nombre_para_columna_myslq($_POST['apellidos'])) . "-S-" . date("d-m-Y-H-i-s") . "." . $extension;
            $archivo_movido = move_uploaded_file($_FILES["sipnuevo"]["tmp_name"], $sip);
        } else {
            $sip = $sip_que_habia;
        }

        
        /******************************************
         *    FICHERO RESGUARDO DE TRANSFERENCIA
         *****************************************/

        $resguardo_que_habia = filter_input(INPUT_POST, 'resguardoanterior', FILTER_SANITIZE_STRING);

        if (!empty($_FILES['resguardonuevo']['tmp_name'])) {
            $array_fichero_y_extension = explode(".", $_FILES["resguardonuevo"]["name"]);
            $numerodeelementos = count($array_fichero_y_extension);
            $extension = $array_fichero_y_extension[$numerodeelementos - 1];
            $resguardo = 'img/sipcampuspascua_vb/' . strtolower(self::sanitize_nombre_para_columna_myslq($_POST['nombre'])) . "-" . strtolower(self::sanitize_nombre_para_columna_myslq($_POST['apellidos'])) . "-R-" . date("d-m-Y-H-i-s") . "." . $extension;
            $archivo_movido = move_uploaded_file($_FILES["resguardonuevo"]["tmp_name"], $resguardo);
        } else {
            $resguardo = $resguardo_que_habia;
        }

         // error_log(__FILE__.__FUNCTION__.__LINE__);
         //  error_log($sip);

        //validacion Dias sueltos
        $textoDiasSueltos ="";
        $opcion =$_POST['opcion'];
        $importe=0;

         //error_log(__FILE__.__FUNCTION__.__LINE__);
          //error_log($_POST['opcion']);

        if ($_POST['opcion']=="media")
        {
            $importe=140;
            
        } elseif($_POST['opcion']=="completa"){ 
            $importe=165;
           
        } elseif($_POST['opcion']=="mediaclub"){ 
            $importe=115;
           
        } elseif($_POST['opcion']=="completaclub"){ 
            $importe=140;
           
        }
        

        if (isset($idinscripcion) && !empty($idinscripcion)) {

         //  error_log("inscripcion: " . $idinscripcion);
            $instancia = inscripciones_campus::updatefichacampusPascua(
                $idinscripcion, $dnijugador, $nombre, $apellidos, $fechanac, $club,
                 $direccion, $numero, $piso, $puerta, $poblacion,
                $cp, $prov, $nombretutor, $apeltutor, $dnitutor, $tlftutor,
                $email,  $observ,
                $sip, $sintomascovid, $familiarcovid, $resguardo, $opcion, $importe,  $genero,
                $tallacam, $alergias, $enfermedad, $tratam, $operaciones, $transporte, $tipopago );
        
            if (!empty($instancia)) {
                echo json_encode(array("response" => "success",
                    "datos" => $instancia,
                    "modal_title" => "Formulario de inscripción",
                    "message" => "Los datos de la inscripción se han modificado correctamente."));
                die;
            } else {
                echo json_encode(array(
                    "response" => "error",
                    "datos" => "",
                    "modal_title" => "Error",
                    "message" => "Ha habido un error al guardar los datos"));
                die;
            }
        } else {
            echo json_encode(array(
                "response" => "error",
                "datos" => "",
                "modal_title" => "Error",
                "message" => "Parece que ha habido algún error"));
            die;
        }

    }


    public function actionImprimirFichaCampusPascua()
    {
        // Comprobamos que el usuario tiene algún rol de administrador para continuar...
        if (isset($_SESSION['usuario']) && ($_SESSION['rolusuario'] == "admin" || $_SESSION['rolusuario'] == "superadmin")) {

            require "models/inscripciones_campus.php";

            // Recogemos la variable "tipopago" de la URL para incluirla en el cuerpo del HTML
            $tipopago = $_GET['tipopago'];

            // Dependiendo del tipo de pago, asignamos un título al cuerpo del HTML
            if ($tipopago == "TRANSFERENCIA") {
                $seccioninscripcion = "Ficha inscripción pago transferencia Campus Pascua 2021";
            } elseif ($tipopago == "ONLINE") {
                $seccioninscripcion = "Ficha inscripción pago online Campus Pascua 2021";
            }


            // Recogemos la variable "numeropedido" de la URL para pasársela al modelo e incluirla en el cuerpo del HTML
            $numero = $_GET['numeropedido'];

            // Recogemos todos los datos del registro pasándole el número de pedido
            $contenidocorreo = inscripciones_campus::damedatoscampuspascua($numero);


            // Generamos el contenido de los datos a mostrar en el cuerpo del HTML
            $contenidocorreo['fechanacimiento'] = date("d/m/Y", strtotime($contenidocorreo['fechanacimiento']));

            $contenido = "<br><br><b>-Inscripcion en Campus Pascua nº: </b>".$contenidocorreo['numeropedido'].
                "<br>-Nombre y apellidos: ".$contenidocorreo['nombre']." ".$contenidocorreo['apellidos'].
                "<br>-Fecha de nacimiento: ".$contenidocorreo['fechanacimiento'].
                "<br>-Genero: ".$contenidocorreo['genero'].
                "<br>-DNI: ".$contenidocorreo['dni'].
                "<br>-Opcion de pensión: " . $contenidocorreo['pension'] .
                "<br>-Pago: " . $contenidocorreo['tipo_pago'] .
                "<br>-Club: " . $contenidocorreo['club'] .
                "<br>-Talla de camiseta: " . $contenidocorreo['tallacamiseta'] .
                "<br>-Transporte: " . $contenidocorreo['transporte'] .
                "<br>-Enfermedad: " . $contenidocorreo['enfermedad'] .
                "<br>-Alergias: " . $contenidocorreo['alergias'] .
                "<br>-Tratamientos médicos: " . $contenidocorreo['tratamientosmedicos'] .
                "<br>-Operación reciente: " . $contenidocorreo['operacionreciente'] .
                "<br>-¿Ha tenido fiebre, tos, diarrea, dificultad respiratoria durante los últimos 15 días? ".$contenidocorreo['sintomascovid'].
                "<br>-¿Alguno de tus convivientes ha sido diagnosticado de coronavirus este último mes? ".$contenidocorreo['familiarcovid'].
                "<br>-Observaciones: " . $contenidocorreo['observaciones'] .
                "<br>-Nombre y apellidos tutor/a: " . $contenidocorreo['nombretutor'] . " " . $contenidocorreo['apellidostutor'] .
                "<br>-DNI tutor: ".$contenidocorreo['dnitutor'].
                "<br>-Dirección: ". $contenidocorreo['direccion']." num: ".$contenidocorreo['numero'].", ".$contenidocorreo['piso'].", ".$contenidocorreo['puerta']." cp: ".$contenidocorreo['cp'].", ".$contenidocorreo['poblacion'].", ".$contenidocorreo['provincia'].
                "<br>-Teléfono del tutor/a: " . $contenidocorreo['telefonotutor'] .
                "<br>-Correo electrónico: " . $contenidocorreo['emailtutor'].
                "<br><br>En cumplimiento de Ley Orgánica 3/2018, de 5 de diciembre, de Protección de Datos Personales y garantía de los derechos digitales y el reglamento (UE) 2016/679 del parlamento europeo y del consejo de 27 de abril de 2016, se le informa que los datos personales que nos ha facilitado serán (o han sido) incorporados a un registro de actividades titularidad de FUNDACION VALENCIA BASKET 2000 Con CIF G96614474 y cuyas finalidades son; la gestión integral de nuestra escuela de baloncesto y el mantenerle informado de las próximas novedades y actividades de la Fundación. <br> Acepto que FUNDACIÓ VALENCIA BASQUET 2000 comunique los datos facilitados a VALENCIA BASKET CLUB SAD para que me mantenga informado sobre productos, servicios o promociones relacionadas con el sector del baloncesto que pudieran ser de mi interés por cualquier medio, incluido el electrónico. <br> Acepto que  el FUNDACIÓ VALENCIA BASQUET 2000 trate la imagen del participante en la actividad, parcial o total, en cualquier soporte grafico o visual (fotografía, video o similar) para su uso en los medios de difusión presentes y futuros de la FUNDACIÓ VALENCIA BASQUET 2000 y/o el VALENCIA BASKET CLUB, SAD (web, folletos, revistas del club, campeonatos, redes sociales, etc.) <br> Se le informa también que puede ejercer los derechos de acceso, rectificación, supresión, portabilidad, limitación de tratamiento, cancelación y, en su caso, oposición, enviando una solicitud por escrito acompañada de la fotocopia de su DNI a la siguiente dirección: BOMBER RAMON DUART, S/N, 46013, VALENCIA o a través de  valencia.basket@valenciabasket.com  así como reclamar ante la Agencia Española de Protección de Datos (www.agpd.es ) cuando el interesado considere que VALENCIA BASKET CLUB SAD ha vulnerado los derechos que le son reconocidos por la normativa aplicable en protección de datos.";



            // Creamos todo el cuerpo de la vista en HTML
            $body = '
				<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
					<html xmlns="https://www.w3.org/1999/xhtml">
						<head>
							<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
							<title>L´Alqueria del Basket</title>
							<meta name="viewport" content="width=device-width, initial-scale=1.0">
						</head>
						<body style="margin: 0; padding: 0;">
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tr>
									<td style="padding: 20px 0 30px 0;">
										<!--[if (gte mso 9)|(IE)]>
										<table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
											<tr>
												<td>
										<![endif]-->

										<table width="600" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
											<tr>
												<td align="center" bgcolor="#000000" style="padding: 15px 0 15px 0;">
													<a href="https://servicios.alqueriadelbasket.com" target="_blank">
														<img src="https://servicios.alqueriadelbasket.com/img/logos-cabecera-email.png" 
														alt="Alqueria del Basket" width="547" height="81" style="display: block;">
													</a>
												</td>
											</tr>
											<tr>
												<td bgcolor="#ffffff" style="padding: 30px 25px 30px 25px;">
													<h3 style="color: #eb7c00; border-bottom: #eb7c00 2px solid;">' . $seccioninscripcion . '</h3>
													<p><strong>Estos son los datos recibidos relacionados con su inscripción.</strong></p>
													<p><strong>Número de pedido:</strong> ' . $numero . '</p>
													<p>' . $contenido . '</p>
												</td>
											</tr>
											<tr>
												<td bgcolor="#424241" style="padding: 20px 30px 20px 30px">
													<table border="0" cellpadding="0" cellspacing="0" width="100%">
														<tr>
															<td width="75%" style="font-family: Arial, sans-serif; line-height: 18px; font-size: 12px;">
																<span style="color: #eb7c00;">&copy; L´Alqueria del Basket 2020</span><br>
																<span style="color: #ffffff;">C/ Bomber Ramon Duart S/N 46013, València</span><br>
																<span style="color: #ffffff;">+34 96 121 55 43</span>
															</td>
															<td width="25%" align="right">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td>
																			<a href="https://www.facebook.com/LAlqueriaVBC" target="_blank">
																				<img src="https://servicios.alqueriadelbasket.com/img/logo-facebook.png" alt="Facebook L´Alqueria del VBC" width="32" height="32" style="display: block;" border="0">
																			</a>
																		</td>
																		<td style="font-size: 0; line-height: 0;" width="10%">&nbsp;</td>
																		<td>
																			<a href="https://twitter.com/LAlqueriaVBC" target="_blank">
																				<img src="https://servicios.alqueriadelbasket.com/img/logo-twitter.png" alt="Twitter L´Alqueria del VBC" width="32" height="32" style="display: block;" border="0">
																			</a>
																		</td>
																	</tr>
																</table>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
										<!--[if (gte mso 9)|(IE)]>
												</td>
											</tr>
										</table>
										<![endif]-->
									</td>
								</tr>
							</table>
						</body>
					</html>';

            echo "<pre>";
            echo $body;
            echo "</pre>";
        } else {
            require('error.php');
        }
    }


    /********************************************************
     *  CAMPUS NAVIDAD VBC @ 110.123
     ********************************************************/

    public function actionBackCampusNavidad()
    {
        if (self::isLogged()) {

            require "models/inscripciones_campus.php";

            $datos['inscripciones'] = inscripciones_campus::findInscripcionesCampusNavidad();
            $datos['numerototalinscripciones'] = count($datos['inscripciones']);

            $filtrado = "0";
            vistaSinvista(array('datos' => $datos, 'filtrado' => $filtrado), "layoutsback/layout_back_campus_navidad");
        }
    }


    public function actionModificaPagadoCampusNavidad()
    {
        if (isset($_POST['id'])) {

            require "models/campus_navidad.php";

            if (isset($_POST['pagado'])) {
                $pagado = 1;
            } else {
                $pagado = 0;
            }

            $id = $_POST['id'];

            $slider = campus_navidad::ActualizaPagadoCampusNavidadBack($id, $pagado);
        } else {
            require "error.php";
        }
    }


    public function actionImprimirFichaCampusNavidadVB()
    {
        // Comprobamos que el usuario tiene algún rol de administrador para continuar
        if (isset($_SESSION['usuario']) && ($_SESSION['rolusuario'] == "admin" || $_SESSION['rolusuario'] == "superadmin")) {

            require "models/campus_navidad.php";

            // Recogemos la variable "tipopago" de la URL para incluirla en el cuerpo del HTML
            $tipopago = $_GET['tipopago'];

            // Dependiendo del tipo de pago, asignamos un título al cuerpo del HTML
            if ($tipopago == "OFICINA" || $tipopago == "OFICINAS") {
                $seccioninscripcion = "Ficha inscripción pago oficina Campus de Navidad de L´Alqueria";
            } elseif ($tipopago == "ONLINE") {
                $seccioninscripcion = "Ficha inscripción pago online Campus de Navidad de L´Alqueria";
            }


            // Recogemos la variable "numeropedido" de la URL para pasársela al modelo e incluirla en el cuerpo del HTML
            $numero = $_GET['numeropedido'];

            // Recogemos todos los datos del registro pasándole el número de pedido
            $contenidocorreo = campus_navidad::dameDatosCampusNavidadVB($numero);


            $contenidocorreo['fechanacimiento'] = date("d/m/Y", strtotime($contenidocorreo['fechanacimiento']));

            $contenido =
                "Nombre y apellidos: " . $contenidocorreo['nombre'] . " " . $contenidocorreo['apellidos'] .
                "<br>Fecha de nacimiento: " . $contenidocorreo['fechanacimiento'] .
                "<br>DNI: " . $contenidocorreo['dni'] .
                "<br>Pensión: " . $contenidocorreo['pension'] .
                "<br>Importe: " . $contenidocorreo['importe'] .
                "<br>Pago: " . $contenidocorreo['tipopago'] .
                "<br>Club: " . $contenidocorreo['club'] .
                "<br>Talla camiseta: " . utf8_encode($contenidocorreo['tallacamiseta']) .
                "<br>Enfermedad: " . utf8_encode($contenidocorreo['enfermedades']) .
                "<br>Alergias: " . utf8_encode($contenidocorreo['alergias']) .
                "<br>Tratamiento médico: " . utf8_encode($contenidocorreo['tratamientosmedicos']) .
                "<br>Operaciones recientes: " . utf8_encode($contenidocorreo['intervencionesquirurgicas']) .
               "<br>¿Ha tenido fiebre, tos, diarrea, dificultad respiratoria durante los últimos 15 días?: " . utf8_encode($contenidocorreo['sintomascovid']) .
               "<br>¿Alguno de tus convivientes ha sido diagnosticado de coronavirus este último mes?: " . utf8_encode($contenidocorreo['familiarcovid']) .
                "<br>Observaciones: " . utf8_encode($contenidocorreo['observaciones']) .
                "<br>Nombre y apellidos tutor/a: " . $contenidocorreo['nombretutor'] . " " . $contenidocorreo['apellidostutor'] .
                "<br>Teléfono del tutor/a: " . $contenidocorreo['telefonotutor'] .
                "<br>Correo electrónico: " . $contenidocorreo['emailtutor'] .
                "<br>Opción de pago: " . $contenidocorreo['tipopago'];


            // Creamos todo el cuerpo del PDF en HTML
            $body = '
				<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
					<html xmlns="https://www.w3.org/1999/xhtml">
						<head>
							<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
							<title>L´Alqueria del Basket</title>
							<meta name="viewport" content="width=device-width, initial-scale=1.0">
						</head>
						<body style="margin: 0; padding: 0;">
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tr>
									<td style="padding: 20px 0 30px 0;">
										<!--[if (gte mso 9)|(IE)]>
										<table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
											<tr>
												<td>
										<![endif]-->

										<table width="600" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
											<tr>
												<td align="center" bgcolor="#000000" style="padding: 15px 0 15px 0;">
													<a href="https://servicios.alqueriadelbasket.com" target="_blank">
														<img src="https://servicios.alqueriadelbasket.com/img/logos-cabecera-email.png" 
														alt="Alqueria del Basket" width="547" height="81" style="display: block;">
													</a>
												</td>
											</tr>
											<tr>
												<td bgcolor="#ffffff" style="padding: 30px 25px 30px 25px;">
													<h3 style="color: #eb7c00; border-bottom: #eb7c00 2px solid;">' . $seccioninscripcion . '</h3>
													<p><strong>Estos son los datos recibidos relacionados con su inscripción.</strong></p>
													<p><strong>Número de pedido:</strong> ' . $numero . '</p>
													<p>' . $contenido . '</p>
												</td>
											</tr>
											<tr>
												<td bgcolor="#424241" style="padding: 20px 30px 20px 30px">
													<table border="0" cellpadding="0" cellspacing="0" width="100%">
														<tr>
															<td width="75%" style="font-family: Arial, sans-serif; line-height: 18px; font-size: 12px;">
																<span style="color: #eb7c00;">&copy; L´Alqueria del Basket 2020</span><br>
																<span style="color: #ffffff;">C/ Bomber Ramon Duart S/N 46013, València</span><br>
																<span style="color: #ffffff;">+34 96 121 55 43</span>
															</td>
															<td width="25%" align="right">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td>
																			<a href="https://www.facebook.com/LAlqueriaVBC" target="_blank">
																				<img src="https://servicios.alqueriadelbasket.com/img/logo-facebook.png" alt="Facebook L´Alqueria del VBC" width="32" height="32" style="display: block;" border="0">
																			</a>
																		</td>
																		<td style="font-size: 0; line-height: 0;" width="10%">&nbsp;</td>
																		<td>
																			<a href="https://twitter.com/LAlqueriaVBC" target="_blank">
																				<img src="https://servicios.alqueriadelbasket.com/img/logo-twitter.png" alt="Twitter L´Alqueria del VBC" width="32" height="32" style="display: block;" border="0">
																			</a>
																		</td>
																	</tr>
																</table>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
										<!--[if (gte mso 9)|(IE)]>
												</td>
											</tr>
										</table>
										<![endif]-->
									</td>
								</tr>
							</table>
						</body>
					</html>';

            echo "<pre>";
            echo $body;
            echo "</pre>";
        } else {
            require('error.php');
        }
    }


    //para conexiones con utf8 (tabla con cotejamiento utf8_spanish_ci) , datos en el 192.168.110.123
    public function actionExportToExcelCampusNavidad()
    {

        require "models/inscripciones_campus.php";

        $datos['inscripciones'] = inscripciones_campus::findAllInscripcionesExcelCampusNavidad();

        if (isset($_POST["export_data"])) {
            $filename = "Campus_navidad" . date('Ymd') . ".xls";
           
            header("Content-Type: application/vnd.ms-excel; charset=UTF-16LE");
            header("Content-Disposition: attachment; filename=" . $filename . "");
            header('Cache-Control: max-age=0');

            $show_coloumn = false;

            if (!empty($datos['inscripciones'])) {

                foreach ($datos['inscripciones'] as $inscripcion) {
                    if (!$show_coloumn) {
                        //display field/column names in first row
                        echo implode("\t", array_keys($inscripcion)) . "\r\n";
                        $show_coloumn = true;
                    }
                    //echo implode("\t", array_values($inscripcion)) . "\r\n";
                    echo mb_convert_encoding(implode("\t", array_values($inscripcion)) . "\r\n", 'UTF-16LE', 'UTF-8');
                }
            }
            exit;
        }
    }



    public function actionDardeBajaCampusNavidad()
    {
        if (isset($_POST['id'])) {

            $codigo = $_POST['id'];

            echo "<div style='width: 100%; height: 100%; background-color: rgba(0,0,0,.8); padding-top: 10%;'>
                        <div class='contact-form-wrapper' style='width: 50%; margin-left: 25%; background-color: white; border: 1px solid #000000; border-radius: 10px; padding: 25px;'>
                            <form action='?r=campus/DardeBajaCampusNavidad' method='post'>
                                <p style='text-align: center; font-size: 150%;'>¿ESTÁ SEGURO QUE DESEA DAR DE BAJA ESTE REGISTRO?</p>
                                <div style='text-align: center;'>
                                    <input class='btn btn-danger btn-lg' type='submit' name='confirm' value='SI' style='float: left;'>
                                    <input class='btn btn-info btn-lg' type='submit' name='confirm' value='NO' style='float: right;'>
                                </div>
                                <input type='hidden' name='id_validado' value='" . $codigo . "'>
                            </form>
                        </div>
                    </div>";
            die;
        }

        if (isset($_POST['confirm'])) {

            if ($_POST['confirm'] == "SI") {
                require "models/inscripciones_campus.php";

                $pedido = $_POST['id_validado'];

                $baja_reg = inscripciones_campus::DardeBajacampusnavidad($pedido);
            }

            if ($_POST['confirm'] == "NO") {
                echo "<script text='javascript'> window.location.replace('?r=campus/BackCampusNavidad'); </script>";
            }
        } else {
            require "error.php";
        }
    }


    public function actionMostrarModalCampusNavidad()
    {
        //error_log(__FILE__.__FUNCTION__.__LINE__);
        //error_log(print_r($_POST,1));

        $idinscripcion = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

        error_log("inscrpcion campus navidad vb: ".$idinscripcion);

        if (!empty($idinscripcion)) {
            require "models/inscripciones_campus.php";
            require "includes/Utils.php";

            $datos = inscripciones_campus::findDatosCampusNavidadById($idinscripcion);
            $alerta_cuenta = "";

            echo json_encode(array(
                "response" => "success",
                "instancia" => $datos,
                "modal_title" => "Formulario de inscripción en Campus Navidad VB",
                "message" => "Los datos de la inscripción se han cargado correctamente.",
                "alerta_cuenta" => $alerta_cuenta));
            die;
        } else {
            echo json_encode(array(
                "response" => "error",
                "instancia" => "",
                "modal_title" => "Error",
                "message" => "Parece que ha habido algún error"));
            die;
        }
    }



    public function actionUpdateInscripcionModalCampusNavidad()
    {
//            error_log(__FILE__.__FUNCTION__.__LINE__);
//            error_log(print_r($_POST,1));
//            error_log(print_r($_FILES,1));
//            die;

        require "models/inscripciones_campus.php";

        $idinscripcion = filter_input(INPUT_POST, 'idinscripcion', FILTER_SANITIZE_NUMBER_INT);

        $dnijugador = filter_input(INPUT_POST, 'dnijugador', FILTER_SANITIZE_STRING);
        $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
        $apellidos = filter_input(INPUT_POST, 'apellidos', FILTER_SANITIZE_STRING);
        $fechanac = filter_input(INPUT_POST, 'fechanac', FILTER_SANITIZE_STRING);
        $club = filter_input(INPUT_POST, 'club', FILTER_SANITIZE_STRING);
        $talla = filter_input(INPUT_POST, 'talla', FILTER_SANITIZE_STRING);

        $direccion = filter_input(INPUT_POST, 'direccion', FILTER_SANITIZE_STRING);
        $numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING);
        $piso = filter_input(INPUT_POST, 'piso', FILTER_SANITIZE_STRING);
        $puerta = filter_input(INPUT_POST, 'puerta', FILTER_SANITIZE_STRING);
        $poblacion = filter_input(INPUT_POST, 'poblacion', FILTER_SANITIZE_STRING);
        $cp = filter_input(INPUT_POST, 'cp', FILTER_SANITIZE_STRING);
        $prov = filter_input(INPUT_POST, 'prov', FILTER_SANITIZE_STRING);


        $nombretutor = filter_input(INPUT_POST, 'nombretutor', FILTER_SANITIZE_STRING);
        $apeltutor = filter_input(INPUT_POST, 'apeltutor', FILTER_SANITIZE_STRING);
        $dnitutor = filter_input(INPUT_POST, 'dnitutor', FILTER_SANITIZE_STRING);
        $tlftutor = filter_input(INPUT_POST, 'tlftutor', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);

        $alergias = filter_input(INPUT_POST, 'alergias', FILTER_SANITIZE_STRING);
        $enfermedad = filter_input(INPUT_POST, 'enfermedad', FILTER_SANITIZE_STRING);
        $tratam = filter_input(INPUT_POST, 'tratam', FILTER_SANITIZE_STRING);
        $operaciones = filter_input(INPUT_POST, 'operaciones', FILTER_SANITIZE_STRING);
        $observ = filter_input(INPUT_POST, 'observ', FILTER_SANITIZE_STRING);
        $transporte = filter_input(INPUT_POST, 'transporte', FILTER_SANITIZE_STRING);

        $sintomascovid = filter_input(INPUT_POST, 'sintomasc', FILTER_SANITIZE_STRING);
        $familiarcovid = filter_input(INPUT_POST, 'familiarc', FILTER_SANITIZE_STRING);

        $pension = filter_input(INPUT_POST, 'pension', FILTER_SANITIZE_STRING);
        $importe = filter_input(INPUT_POST, 'importe', FILTER_SANITIZE_NUMBER_INT);
        $espera = filter_input(INPUT_POST, 'espera', FILTER_SANITIZE_NUMBER_INT);

        $sip_que_habia = filter_input(INPUT_POST, 'sipanterior', FILTER_SANITIZE_STRING);

        /***********************
         *    FICHERO SIP
         **********************/
        if (!empty($_FILES['sipnuevo']['tmp_name'])) {
            $array_fichero_y_extension = explode(".", $_FILES["sipnuevo"]["name"]);
            $numerodeelementos = count($array_fichero_y_extension);
            $extension = $array_fichero_y_extension[$numerodeelementos - 1];
            $sip = 'img/inscripcionescampusnavidad/' . strtolower(self::sanitize_nombre_para_columna_myslq($_POST['nombre'])) . "-" . strtolower(self::sanitize_nombre_para_columna_myslq($_POST['apellidos'])) . "-" . date("d-m-Y-H-i-s") . "." . $extension;
            $archivo_movido = move_uploaded_file($_FILES["sipnuevo"]["tmp_name"], $sip);
        } else {
            $sip = $sip_que_habia;
        }

         // error_log(__FILE__.__FUNCTION__.__LINE__);
         //  error_log($sip);

        

        if (isset($idinscripcion) && !empty($idinscripcion)) {

         //  error_log("inscripcion: " . $idinscripcion);
            $instancia = inscripciones_campus::updatefichacampusnavidad(
                $idinscripcion, $dnijugador, $nombre, $apellidos, $fechanac, $club,
                $talla, $direccion, $numero, $piso, $puerta, $poblacion,
                $cp, $prov, $nombretutor, $apeltutor, $dnitutor, $tlftutor,
                $email, $alergias, $tratam, $transporte, $enfermedad, $observ,
                $operaciones, $sip, $sintomascovid, $familiarcovid, $pension, $importe, $espera);

            if (!empty($instancia)) {
                echo json_encode(array("response" => "success",
                    "datos" => $instancia,
                    "modal_title" => "Formulario de inscripción",
                    "message" => "Los datos de la inscripción se han modificado correctamente."));
                die;
            } else {
                echo json_encode(array(
                    "response" => "error",
                    "datos" => "",
                    "modal_title" => "Error",
                    "message" => "Ha habido un error al guardar los datos"));
                die;
            }
        } else {
            echo json_encode(array(
                "response" => "error",
                "datos" => "",
                "modal_title" => "Error",
                "message" => "Parece que ha habido algún error"));
            die;
        }

    }

    /********************************************************
     *  CAMPUS TECNIFICACIÓN FEMENINA VBC @ 110.123
     ********************************************************/

    public function actionBackEscuelas()
    {
        if (self::isLogged()) {

            require "models/inscripciones_escuelas.php";

            $datos['inscripciones'] = inscripciones_escuelas::findAllInscripciones();
            $datos['numerototalinscripciones'] = count($datos['inscripciones']);

            $datos['inscripciones_turno1'] = inscripciones_escuelas::findInscripcionesCTecFemByOpcion("primerturno");
            $datos['inscripciones_turno2'] = inscripciones_escuelas::findInscripcionesCTecFemByOpcion("segundoturno");


            vistaSinvista(array('datos' => $datos), "layoutsback/layout_back_escuela_tec_fem");
        }
    }


  


    /********************************************************
     *  ESCUELA NAVIDAD
     ********************************************************/

    public function actionBackEscuelaNavidadAlq()
    {
        if (self::isLogged()) {

            require "models/escuela_navidad.php";

            $datos['inscripciones'] = escuela_navidad::findInscripcionesNavidad();
            $datos['numerototalinscripciones'] = count($datos['inscripciones']);

            //$filtrado = "0";
            vistaSinvista(array('datos' => $datos), "layoutsback/layout_back_escuela_navidadalq");

        }
    }


    public function actionModificaPagadoEscuelaNavidadAlq()
    {
        if (isset($_POST['id'])) {

            require "models/escuela_navidad.php";

            $codigo = $_POST['id'];
            $pagado = 1;

            $slider = escuela_navidad::ActualizaPagadoEscuelaNavidadAlq($codigo, $pagado);
        } else {
            require "error.php";
        }
    }


    public function actionExportToExcelEscuelaNavidadAlq()
    {

        require "models/escuela_navidad.php";

        $datos['inscripciones'] = escuela_navidad::findAllInscripcionesExcelEscuelaNavidadAlq();

        if (isset($_POST["export_data"])) {
            $filename = "escuela_navidad_alqueria_" . date('Ymd') . ".xls";

            header("Content-Type: application/vnd.ms-excel");
            header("Content-Disposition: attachment; filename=" . $filename . "");
            header('Cache-Control: max-age=0');
            $show_coloumn = false;

            if (!empty($datos['inscripciones'])) {
                foreach ($datos['inscripciones'] as $inscripcion) {
                    if (!$show_coloumn) {
                        //display field/column names in first row
                        echo implode("\t", array_keys($inscripcion)) . "\r\n";
                        $show_coloumn = true;
                    }
                    //echo implode("\t", array_values($inscripcion)) . "\r\n";
                    echo implode("\t", array_values($inscripcion)) . "\r\n";
                    //chr(255).chr(254).iconv("UTF-8", "UTF-16LE//IGNORE", $inscripcion);
                    // iconv("UTF-8", "ISO-8859-1//TRANSLIT", array_values($inscripcion));
                }
            }
            exit;
        }
    }



    


    

    /********************************************************
     *  ESCUELA Y CANTERA: INSCRIPCIONES
     ********************************************************/

    public function actionBackEscuelaCanteraInscripciones()
    {
        if (self::isLogged()) {
            require "models/inscripciones.php";
            require "models/formulariosinscripciones.php";
            require "models/horarios_equipos_19_20.php";
            require "models/inscripciones_pagos.php";
            require "models/historico_domiciliaciones_trimestrales_inscripciones.php";
            require "includes/Utils.php";
            require "models/licenciasfederacion1920_equipos.php";
            require "models/federacion_categorias.php";
            require "models/federacion_clubs.php";
            require "models/federacion_equipos.php";

            $datos['todasinscripciones'] = inscripciones::findAllByIsActiveNuevaTemporada();       // TAB 1. INSCRIPCIONES
            $datos['inscripcionesportemporada'] = inscripciones::findAllByTemporadaNueva();
            $datos['inscripciones'] = inscripciones::findAllByIsActive();

            $datos['numerototalinscripciones'] = count($datos['inscripciones']);
            $datos['todospagos'] = inscripciones_pagos::findAll();
            $datos['pagosagrupadosporfecha'] = inscripciones_pagos::findAllGroupedByDate();

            $datos['equipos'] = horarios_equipos_19_20::findAll();                //  Desde el punto de vista de la temporada 18/19
            $datos['equipos_1920'] = formulariosinscripciones::getEquipos();
            $datos['categorias_1920'] = formulariosinscripciones::getCategorias();
            $datos['club_1920'] = formulariosinscripciones::getClubs();
            $datos['datosPagos'] = inscripciones_pagos::findAllDatosPagos();

            $datos['federacion_categorias'] = federacion_categorias::findAll();
            $datos['federacion_clubs'] = federacion_clubs::findAll();
            $datos['federacion_equipos'] = federacion_equipos::findAll();

            //  OBSOLETO.   $filtrado = "5";    // El 5, creado por Pablo, muestra la tab 1 por defecto.

            //vistaSinvista(array('datos' => $datos, 'filtrado' => $filtrado), "layoutsback/layout_back_escuela_cantera_inscripciones");
            vistaSinvista(array('datos' => $datos), "layoutsback/layout_back_escuela_cantera_inscripciones");
        }
    }


    public function actionBackEscuelaCanteraInscripcionesTemporada1819()
    {
        if (self::isLogged()) {

            require "models/inscripciones.php";
            require "models/inscripciones_pagos.php";
            require "models/historico_domiciliaciones_trimestrales_inscripciones.php";
            require "includes/Utils.php";

            $datos['todasinscripciones'] = inscripciones::findAllByIsActiveUltimaTemporada();       // TAB 1. INSCRIPCIONES
            //findAllByIsActive
            $datos['inscripcionesportemporada'] = inscripciones::findAllByTemporadaNueva();
            $datos['inscripciones'] = inscripciones::findAllByIsActive();

            $datos["equipos_antiguos"] = inscripciones::findAllEquiposGroupByModalidad();

            $datos['numerototalinscripciones'] = count($datos['inscripciones']);
            $datos['todospagos'] = inscripciones_pagos::findAll();
            $datos['pagosagrupadosporfecha'] = inscripciones_pagos::findAllGroupedByDate();
            $datos['equipos'] = inscripciones::findAllHorararios_equipos();

            $datos['datosPagos'] = inscripciones_pagos::findAllDatosPagos();

            $filtrado = "5";    // El 5, creado por Pablo, muestra la tab 1 por defecto.

            //vistaSinvista(array('datos' => $datos, 'filtrado' => $filtrado), "layoutsback/layout_back_escuela_cantera_inscripciones");
            vistaSinvista(array('datos' => $datos), "layoutsback/layout_back_escuela_cantera_inscripciones_18_19");
        }
    }


    public function actionBackEscuelaCanteraAltaInscripciones()
    {
        if (self::isLogged()) {

            require "models/inscripciones.php";
            /*require "models/inscripciones_pagos.php";
				require "models/historico_domiciliaciones_trimestrales_inscripciones.php";
				require "includes/Utils.php";*/

            /*$datos['todasinscripciones']    = inscripciones::findAllByIsActiveUltimaTemporada();       // TAB 1. INSCRIPCIONES
				//findAllByIsActive
				$datos['inscripcionesportemporada']   = inscripciones::findAllByTemporadaNueva(); */
            $datos['inscripciones'] = inscripciones::findAllByIsActiveNuevaTemporada();
            $datos['equipos'] = inscripciones::findAllHorararios_equipos();
            /*$datos["equipos_antiguos"] = inscripciones::findAllEquiposGroupByModalidad();

				$datos['numerototalinscripciones']  = count($datos['inscripciones']);
				$datos['todospagos']                = inscripciones_pagos::findAll();
				$datos['pagosagrupadosporfecha']    = inscripciones_pagos::findAllGroupedByDate();
				$datos['equipos'] = inscripciones::findAllHorararios_equipos();

				$datos['datosPagos'] = inscripciones_pagos::findAllDatosPagos();

				$filtrado = "5";    // El 5, creado por Pablo, muestra la tab 1 por defecto.*/

            //vistaSinvista(array('datos' => $datos, 'filtrado' => $filtrado), "layoutsback/layout_back_escuela_cantera_inscripciones");
            vistaSinvista(array('datos' => $datos), "layoutsback/layout_back_escuela_cantera_alta_inscripciones");
        }
    }


    /*  Este página carga la vista que lista los equipos y permite añadir o eliminarlos */
    public function actionBackEscuelaCanteraAltaEquipos()
    {
        if (self::isLogged()) {
            require "models/horarios_equipos_19_20.php";

            $datos['equipos'] = horarios_equipos_19_20::findAll();

            vistaSinvista(array('datos' => $datos), "layoutsback/layout_back_escuela_cantera_alta_equipos");
        }
    }


    public function actionBackEscuelaCanteraOtrasConsultas()
    {
        if (self::isLogged()) {
            require "models/inscripciones.php";
            require "models/inscripciones_pagos.php";
            require "models/historico_domiciliaciones_trimestrales_inscripciones.php";
            require "includes/Utils.php";
            require "models/formulariosinscripciones_pagos.php";

            $datos['todasinscripciones'] = inscripciones::findAllByIsActive();       // TAB 1. INSCRIPCIONES
            $datos['inscripciones'] = inscripciones::findAllByIsActive();

            $datos['numerototalinscripciones'] = count($datos['inscripciones']);
            $datos['todospagos'] = inscripciones_pagos::findAll();
            $datos['pagosagrupadosporfecha'] = inscripciones_pagos::findAllGroupedByDate();

            $datos['datosPagos'] = inscripciones_pagos::findAllDatosPagos();

            $filtrado = "4";    // El 5, creado por Pablo, muestra la tab 1 por defecto. Quizá hoy sea innecesario.

            /*  Se usan los equipos en varios acordeon  */
            $datos['equipos'] = inscripciones::findHorariosEquipos20192020();

            /*  ACORDEON. GENERACION XML MATRICULA.     */
            $cobros_activos_matricula = formulariosinscripciones_pagos::findCobrosActivosMatricula();
            $datos['cobros_activos_matricula'] = self::generaHTML_Tabla_cobros_activos_matricula($cobros_activos_matricula);

            /*  ACORDEON. GENERACION XML TRIMESTRE 1.   */
            $cobros_activos_trimestre_1 = formulariosinscripciones_pagos::findCobrosActivosTrimestre("noviembre");
            $datos['cobros_activos_trimestre_1'] = self::generaHTML_Tabla_cobros_activos_trimestre($cobros_activos_trimestre_1, "noviembre");

            /*  ACORDEON. GENERACION XML TRIMESTRE 2.   */
            $cobros_activos_trimestre_2 = formulariosinscripciones_pagos::findCobrosActivosTrimestre("enero");
            $datos['cobros_activos_trimestre_2'] = self::generaHTML_Tabla_cobros_activos_trimestre($cobros_activos_trimestre_2, "enero");

            /*  ACORDEON. GENERACION XML TRIMESTRE 3.   */
            $cobros_activos_trimestre_3 = formulariosinscripciones_pagos::findCobrosActivosTrimestre("abril");
            $datos['cobros_activos_trimestre_3'] = self::generaHTML_Tabla_cobros_activos_trimestre($cobros_activos_trimestre_3, "abril");

            vistaSinvista(array(
                'datos' => $datos,
                'filtrado' => $filtrado),
                "layout_back_escuela_cantera_otras_consultas");
        }
    }


    /********************************************************
     *  ESCUELA VERANO VBC @ 110.123
     ********************************************************/

    public function actionBackEscuelaVeranoVB()
    {
        if (self::isLogged()) {

            require "models/escuela_veranoVB.php";

            $datos['inscripciones'] = escuela_veranoVB::findAllInscripcionesEscuelaVeranoVB();
            $datos['numerototalinscripciones'] = count($datos['inscripciones']);

            $datos['inscripciones_sem1'] = escuela_veranoVB::findInscripcionesEscuelaVeranoVBByOpcion("semana1");
            $datos['inscripciones_sem2'] = escuela_veranoVB::findInscripcionesEscuelaVeranoVBByOpcion("semana2");
            $datos['inscripciones_sem3'] = escuela_veranoVB::findInscripcionesEscuelaVeranoVBByOpcion("semana3");
            $datos['inscripciones_sem4'] = escuela_veranoVB::findInscripcionesEscuelaVeranoVBByOpcion("semana4");
            $datos['inscripciones_sem5'] = escuela_veranoVB::findInscripcionesEscuelaVeranoVBByOpcion("semana5");

            vistaSinvista(array('datos' => $datos), "layoutsback/layout_back_escuela_veranovb");
        }
    }


    


    /********************************************************
     *  ESCUELA VERANO L'ALQUERIA
     ********************************************************/

    public function actionBackEscuelaVeranoAlq()
    {
        if (self::isLogged()) {

            require "models/escuela_verano.php";

            $datos['inscripciones'] = escuela_verano::findAllInscripcionesEscuelaVeranoAlq();
            $datos['numerototalinscripciones'] = count($datos['inscripciones']);

            $datos['inscripciones_sem1'] = escuela_verano::findInscripcionesEscuelaVeranoAlqByOpcion("semana1");
            $datos['inscripciones_sem2'] = escuela_verano::findInscripcionesEscuelaVeranoAlqByOpcion("semana2");
            $datos['inscripciones_sem3'] = escuela_verano::findInscripcionesEscuelaVeranoAlqByOpcion("semana3");
            $datos['inscripciones_sem4'] = escuela_verano::findInscripcionesEscuelaVeranoAlqByOpcion("semana4");
            $datos['inscripciones_sem5'] = escuela_verano::findInscripcionesEscuelaVeranoAlqByOpcion("semana5");

            vistaSinvista(array('datos' => $datos), "layoutsback/layout_back_escuela_veranoalq");
        }
    }



    /*******************************/
    
    public function actionExportToExcelCuentasMal()
    {

        require "models/inscripciones.php";

        $datos['inscripciones'] = inscripciones::findAllExcelCuentas();

        $filename = "Contacto_Cuentas_" . date('Ymd') . ".xls";

        header("Content-Type: application/vnd.ms-excel");

        header("Content-Disposition: attachment; filename=" . $filename . "");
        header('Cache-Control: max-age=0');
        $show_coloumn = false;

        if (!empty($datos['inscripciones'])) {

            foreach ($datos['inscripciones'] as $inscripcion) {

                if (!$show_coloumn) {
                    // display field/column names in first row
                    echo implode("\t", array_keys($inscripcion)) . "\r\n";
                    $show_coloumn = true;
                }
                //echo implode("\t", array_values($inscripcion)) . "\r\n";
                echo implode("\t", array_values($inscripcion)) . "\r\n";
                //chr(255).chr(254).iconv("UTF-8", "UTF-16LE//IGNORE", $inscripcion);
                //iconv("UTF-8", "ISO-8859-1//TRANSLIT", array_values($inscripcion));
            }
        }
        exit;
    }


   

    


    


   

    // generaHTML_Tabla_cobros_activos_matricula() genera los <tr> de la tabla de cobros de matricula 2019 2020 pendientes de confirmar
    private static function generaHTML_Tabla_cobros_activos_matricula($cobros_activos_matricula)
    {
        $tr_resultado = "";

        if (count($cobros_activos_matricula) > 0) {
            foreach ($cobros_activos_matricula as $cobros_activos) {
                $tr_resultado .= '<tr id="inscripciones-cobro-activo-matricula-2019-2020-' . $cobros_activos['id'] . '">
						<td>' . $cobros_activos['numero_pedido'] . '</td>
						<td>' . $cobros_activos['dni_tutor'] . '</td>
						<td>' . $cobros_activos['nombre_apellidos'] . '</td>
						<td>' . $cobros_activos['nombre_equipo'] . '</td>
						<td>' . $cobros_activos['dni_tutor'] . '</td>
						<td>' . $cobros_activos['email'] . '</td>
						<td>' . $cobros_activos['cobros_activos_matricula'] . '</td>
						<td>' . ($cobros_activos['matricula'] - $cobros_activos['reserva']) . '€</td>
						<td>' . $cobros_activos['aplicar_gastos_devolucion'] . '€</td>
						<td>
							<input  type="checkbox" 
									id="inscripciones-cobro-activo-matricula-2019-2020-checkbox-' . $cobros_activos['id'] . '" 
									class="inscripciones-cobro-activo-matricula-2019-2020-checkbox" value="' . $cobros_activos['id'] . '">' . '</td>
					</tr>';
            }
        } else {
            $tr_resultado .= "<tr><td colspan='10'>No hay cobros activos</td></tr>";
        }
        return $tr_resultado;
    }


    // generaHTML_Tabla_cobros_activos_trimestre() genera los <tr> de la tabla de cobros de un trimestre de 2019 2020 pendientes de confirmar
    private static function generaHTML_Tabla_cobros_activos_trimestre($cobros_activos_trimestre, $trimestre)
    {
        $tr_resultado = "";

        if (count($cobros_activos_trimestre) > 0) {
            foreach ($cobros_activos_trimestre as $cobros_activos) {
                $tr_resultado .= '<tr id="inscripciones-cobro-activo-trimestre-' . $trimestre . '-2019-2020-' . $cobros_activos['id'] . '">
						<td>' . $cobros_activos['dni_tutor'] . '</td>
						<td>' . $cobros_activos['nombre_apellidos'] . '</td>
						<td>' . $cobros_activos['nombre_equipo'] . '</td>
						<td>' . $cobros_activos['dni_tutor'] . '</td>
						<td>' . $cobros_activos['email'] . '</td>
						<td>' . $cobros_activos['cobros_activos_' . $trimestre] . '</td>
						<td>' . $cobros_activos['trimestre_' . $trimestre] . '</td>
						<td>' . $cobros_activos['aplicar_gastos_devolucion'] . '</td>
					</tr>';
            }
        } else {
            $tr_resultado .= "<tr><td colspan='10'>No hay cobros activos</td></tr>";
        }
        return $tr_resultado;
    }


    // Método para comprobar login
    private static function isLogged()
    {
        if (isset($_SESSION['usuario'])) {
            return true;
        } else {
            header('Location: index.php?r=login/loger');
        }
    }


    private static function sanitize_nombre_para_columna_myslq($string)
    {
        $unwanted_array = array(
            ' ' => '_', '.' => '_', '-' => '_', '>' => '_', '/' => '_', ':' => '_', '?' => '_', '!' => '_',
            'Š' => 'S', 'š' => 's', 'Ž' => 'Z', 'ž' => 'z', 'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'A', 'Ç' => 'C', 'È' => 'E', 'É' => 'E',
            'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I', 'Ñ' => 'NY', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ø' => 'O', 'Ù' => 'U',
            'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ý' => 'Y', 'Þ' => 'B', 'ß' => 'Ss', 'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'a', 'ç' => 'c',
            'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 'ð' => 'o', 'ñ' => 'ny', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o',
            'ö' => 'o', 'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ý' => 'y', 'þ' => 'b', 'ÿ' => 'y');

        $str = strtr($string, $unwanted_array);

        $regex = '/[a-zA-Z_0-9]/';

        if (preg_match($regex, $str)) {
            return $str;
        } else {
            error_log(__FILE__ . __LINE__);
            error_log("El string: " . $string . " ha generado un error en sanitize_nombre_para_columna_myslq()");
            return false;
        }
    }

    public function actionBackEscuelaCanteraOtrasConsultas_20_21()
    {
        if (self::isLogged()) {
            require 'models/inscripciones_escuela_y_cantera.php';


            $datos = inscripciones_escuela_y_cantera::findInscripciones_Temporada();
            $datosTemporadaDos = inscripciones_escuela_y_cantera::findInscripciones_TemporadaDos();
            $datosTemporadaTres = inscripciones_escuela_y_cantera::findInscripciones_TemporadaTrimestreTres();

            /*$datos['numerototalinscripciones']  = count($datos['inscripciones']);
                $datos['todospagos']                = inscripciones_pagos::findAll();
                $datos['pagosagrupadosporfecha']    = inscripciones_pagos::findAllGroupedByDate();

                $datos['datosPagos'] = inscripciones_pagos::findAllDatosPagos();*/

            $filtrado = "4";    // El 5, creado por Pablo, muestra la tab 1 por defecto. Quizá hoy sea innecesario.

            /*  Se usan los equipos en varios acordeon
                $datos['equipos']                   =   inscripciones::findHorariosEquipos20192020();*/

            /*  ACORDEON. GENERACION XML MATRICULA.     */
            //$cobros_activos_matricula           =   formulariosinscripciones_pagos::findCobrosActivosMatricula();
            $datos['cobrosMatricula'] = self::generaHTML_Tabla_cobros_activos_matricula_20_21($datos);

            /*  ACORDEON. GENERACION XML TRIMESTRE 1.
                $cobros_activos_trimestre_1             =   formulariosinscripciones_pagos::findCobrosActivosTrimestre("noviembre");*/
            $datos['cobros_activos_trimestre_1'] = self::generaHTML_Tabla_cobros_activos_trimestre_20_21($datos);

            /*  ACORDEON. GENERACION XML TRIMESTRE 2.
                $cobros_activos_trimestre_2           =   formulariosinscripciones_pagos::findCobrosActivosTrimestre("enero");*/
            $datosTemporadaDos['cobros_activos_trimestre_2']  =   self::generaHTML_Tabla_cobros_activos_trimestre2_20_21($datosTemporadaDos);

                /*  ACORDEON. GENERACION XML TRIMESTRE 3.
                $cobros_activos_trimestre_3           =   formulariosinscripciones_pagos::findCobrosActivosTrimestre("abril");*/
                $datosTemporadaTres['cobros_activos_trimestre_3']  =   self::generaHTML_Tabla_cobros_activos_trimestre3_20_21($datosTemporadaTres);

            vistaSinvista(array(
                'datos' => $datos,
                'datosTemporadaDos' => $datosTemporadaDos,
                'datosTemporadaTres' => $datosTemporadaTres,
                'filtrado' => $filtrado),
                "layoutsback/layout_back_escuela_cantera_otras_consultas_20_21");
        }
    }

    // insert de los pagos de la matricula servira para el de los trimestres
    public function actionInsertPagoMatricula()
    {

        require 'models/inscripciones_escuela_y_cantera.php';
        require 'models/jugadores_pagos.php';

        $cobros = inscripciones_escuela_y_cantera::findInscripciones_Temporada();
        $prebenjaminOInferior = 150;
        $benjaminOSuperior = 175;
        $cantera = 175;

        foreach ($cobros as $cobro) {
            $restoMatricula = 0;

            //miro si el jugador pertenece a cantera o escuela
            if ($cobro["seccion"] == "ESCUELA") {
                //comprobamos si tiene o no reserva tenga reserva
                if (!is_null($cobro["cantidad"])) {
                    //comprobamos si es prebenjamin o menos
                    if (strpos($cobro["equipo"], "BABY") !== false || strpos($cobro["equipo"], "PREBENJAMIN") !== false) {
                        //resto la cantidad pagada
                        $restoMatricula = $prebenjaminOInferior - $cobro["cantidad"];
                    } else {
                        //resto la cantidad pagada
                        $restoMatricula = $benjaminOSuperior - $cobro["cantidad"];
                    }
                } else {
                    if (strpos($cobro["equipo"], "BABY") !== false || strpos($cobro["equipo"], "PREBENJAMIN") !== false) {

                        $restoMatricula = $prebenjaminOInferior;
                    } else {
                        $restoMatricula = $benjaminOSuperior;
                    }
                }

                //insert de  los pagos en la tabla de jugadores pagos
                $insertPagoJugador = jugadores_pagos::insert($cobro["id_jugador"], date("Y-m-d"), 'Matricula', 0, $restoMatricula,
                    'Interno', 0, NULL, NULL, NULL, $cobro["id_inscripcion"], NULL, NULL);
            } else {
                $restoMatricula = $cantera;
                //insert de  los pagos en la tabla de jugadores pagos
                $insertPagoJugador = jugadores_pagos::insert($cobro["id_jugador"], date("Y-m-d"), 'primer pago', 0, $restoMatricula,
                    'Interno', 0, NULL, NULL, NULL, $cobro["id_inscripcion"], NULL, NULL);
            }

        }
    }

    // generaHTML_Tabla_cobros_activos_matricula() genera los <tr> de la tabla de cobros de matricula 2010 2021 pendientes de confirmar
    private static function generaHTML_Tabla_cobros_activos_matricula_20_21($cobros)
    {
        $tr_resultado = "";

        if (count($cobros) > 0) {
            foreach ($cobros as $cobro) {
                if ($cobro['nombre_pago'] == 'MATRICULA') {
                    $tr_resultado .= '<tr id="inscripciones-cobro-activo-matricula-2020-2021-' . $cobro['id_jugador'] . '">
						<td>' . $cobro['numero_pedido'] . '</td>
						<td>' . $cobro['dni_tutor'] . '</td>
						<td>' . $cobro['nombre'] . " " . $cobro['apellidos'] . '</td>
						<td>' . $cobro['equipo'] . '</td>
						<td>' . $cobro['dni_tutor'] . '</td>
						<td>' . $cobro['email'] . '</td>
						<td>' . $cobro['nombre_pago'] . '</td>
						<td>' . $cobro['cantidad'] . '€</td>
						<td>' . $cobro['aplicar_gastos_devolucion'] . '€</td>
						<td>
							<input  type="checkbox" 
									id="inscripciones-cobro-activo-matricula-2020-2021-checkbox-' . $cobro['id_jugador'] . '" 
									class="inscripciones-cobro-activo-matricula-2020-2021-checkbox" value="' . $cobro['id_jugador'] . '">' . '</td>
					</tr>';
                }

            }
        } else {
            $tr_resultado .= "<tr><td colspan='10'>No hay cobros activos</td></tr>";
        }
        return $tr_resultado;
    }

    // insert de los pagos del primer trimestre escuela servira para el de los  demas trimestres
    public function actionInsertPagoTrimestreUno()
    {

        require 'models/inscripciones_escuela_y_cantera.php';
        require 'models/jugadores_pagos.php';

        $cobros = inscripciones_escuela_y_cantera::findInscripciones_Temporada();
        $prebenjaminOInferior = 150;
        $benjaminOSuperior = 175;

        foreach ($cobros as $cobro) {

            $pagoNoviembre = 0;
            //no se hacen cobros en el equipo EBA segun me ha dicho jose luis
            if ($cobro["idequipo_alqueria"] != 22 && $cobro["seccion"] == "ESCUELA" && $cobro["is_active"]) {
                if (strpos($cobro["equipo"], "BABY") !== false || strpos($cobro["equipo"], "PREBENJAMIN") !== false) {

                    $pagoNoviembre = $prebenjaminOInferior;
                } else {
                    $pagoNoviembre = $benjaminOSuperior;
                }

                //insert de  los pagos en la tabla de jugadores pagos
                $insertPagoJugador = jugadores_pagos::insert($cobro["id_jugador"], date("Y-m-d"), 'Trimestre1', 0, $pagoNoviembre,
                    'Interno', 0, NULL, NULL, NULL, $cobro["id_inscripcion"], NULL, NULL);
            }
        }
    }

    // generaHTML_Tabla_cobros_activos_trimestre1() genera los <tr> de la tabla de cobros de trimestre1 2010 2021
    private static function generaHTML_Tabla_cobros_activos_trimestre_20_21($cobros)
    {
        $tr_resultado = "";

        if (count($cobros) > 0) {
            foreach ($cobros as $cobro) {

                if ($cobro['nombre_pago'] == 'TRIMESTRE1') {
                    //var_dump($cobro['nombre_pago']);
                    $tr_resultado .= '<tr id="inscripciones-cobro-activo-trimestre1-2020-2021-' . $cobro['id_jugador'] . '">
						<td>' . $cobro['numero_pedido'] . '</td>
						<td>' . $cobro['dni_tutor'] . '</td>
						<td>' . $cobro['nombre'] . " " . $cobro['apellidos'] . '</td>
						<td>' . $cobro['equipo'] . '</td>
						<td>' . $cobro['dni_tutor'] . '</td>
						<td>' . $cobro['email'] . '</td>
						<td>' . $cobro['nombre_pago'] . '</td>
						<td>' . $cobro['cantidad'] . '€</td>
						<td>' . $cobro['aplicar_gastos_devolucion'] . '€</td>
						<td>
							<input  type="checkbox" 
									id="inscripciones-cobro-activo-trimestre1-2020-2021-checkbox-' . $cobro['id_jugador'] . '" 
									class="inscripciones-cobro-activo-trimestre1-2020-2021-checkbox" value="' . $cobro['id_jugador'] . '">' . '</td>
					</tr>';
                }

            }
        } else {
            $tr_resultado .= "<tr><td colspan='10'>No hay cobros activos</td></tr>";
        }
        return $tr_resultado;
    }

    // insert de los pagos de segundo trimestre servira para el de los trimestres
    public function actionInsertPagoSegundoTrimestre()
    {

        require 'models/inscripciones_escuela_y_cantera.php';
        require 'models/jugadores_pagos.php';

        $cobros = inscripciones_escuela_y_cantera::findInscripciones_Temporada();
        $prebenjaminOInferior = 150;
        $benjaminOSuperior = 175;
        $cantera = 175;

        foreach ($cobros as $cobro) {

            $pagoNoviembre = 0;
            //no se hacen cobros en el equipo EBA segun me ha dicho jose luis
            if ($cobro["idequipo_alqueria"] != 22 && $cobro["is_active"]) {
                if ($cobro["seccion"] == "ESCUELA") {
                    if (strpos($cobro["equipo"], "BABY") !== false || strpos($cobro["equipo"], "PREBENJAMIN") !== false) {

                        $pagoNoviembre = $prebenjaminOInferior;
                    } else {
                        $pagoNoviembre = $benjaminOSuperior;
                    }

                    //insert de  los pagos en la tabla de jugadores pagos
                    $insertPagoJugador = jugadores_pagos::insert($cobro["id_jugador"], date("Y-m-d"), 'Trimestre2', 0, $pagoNoviembre,
                        'Interno', 0, NULL, NULL, NULL, $cobro["id_inscripcion"], NULL, NULL);
                } else {
                    $restoMatricula = $cantera;
                    //insert de  los pagos en la tabla de jugadores pagos
                    $insertPagoJugador = jugadores_pagos::insert($cobro["id_jugador"], date("Y-m-d"), 'Trimestre2', 0, $pagoNoviembre,
                        'Interno', 0, NULL, NULL, NULL, $cobro["id_inscripcion"], NULL, NULL);

                }


            }
        }

    }

    // generaHTML_Tabla_cobros_activos_trimestre2() genera los <tr> de la tabla de cobros de trimestre2 2020 2021
    private static function generaHTML_Tabla_cobros_activos_trimestre2_20_21($cobros)
    {
        $tr_resultado = "";

        if (count($cobros) > 0) {
            foreach ($cobros as $cobro) {

                if ($cobro['nombre_pago'] == 'TRIMESTRE2') {
                    //var_dump($cobro['nombre_pago']);
                    $tr_resultado .= '<tr id="inscripciones-cobro-activo-trimestre2-2020-2021-' . $cobro['id_jugador'] . '">
						<td>' . $cobro['numero_pedido'] . '</td>
						<td>' . $cobro['dni_tutor'] . '</td>
						<td>' . $cobro['nombre'] . " " . $cobro['apellidos'] . '</td>
						<td>' . $cobro['equipo'] . '</td>
						<td>' . $cobro['dni_tutor'] . '</td>
						<td>' . $cobro['email'] . '</td>
						<td>' . $cobro['nombre_pago'] . '</td>
						<td>' . $cobro['cantidad'] . '€</td>
						<td>' . $cobro['aplicar_gastos_devolucion'] . '€</td>
						<td>
							<input  type="checkbox" 
									id="inscripciones-cobro-activo-trimestre2-2020-2021-checkbox-' . $cobro['id_jugador'] . '" 
									class="inscripciones-cobro-activo-trimestre2-2020-2021-checkbox" value="' . $cobro['id_jugador'] . '">' . '</td>
					</tr>';
                }

            }
        } else {
            $tr_resultado .= "<tr><td colspan='10'>No hay cobros activos</td></tr>";
        }
        return $tr_resultado;
    }

    // generaHTML_Tabla_cobros_activos_trimestre3() genera los <tr> de la tabla de cobros de trimestre2 2020 2021
    private static function generaHTML_Tabla_cobros_activos_trimestre3_20_21($cobros)
    {
        $tr_resultado = "";

        if (count($cobros) > 0) {
            foreach ($cobros as $cobro) {

                if ($cobro['nombre_pago'] == 'TRIMESTRE3') {
                    //var_dump($cobro['nombre_pago']);
                    $tr_resultado .= '<tr id="inscripciones-cobro-activo-trimestre3-2020-2021-' . $cobro['id_jugador'] . '">
						<td>' . $cobro['dni_tutor'] . '</td>
						<td>' . $cobro['nombre'] . " " . $cobro['apellidos'] . '</td>
						<td>' . $cobro['equipo'] . '</td>
						<td>' . $cobro['dni_tutor'] . '</td>
						<td>' . $cobro['email'] . '</td>
						<td>' . $cobro['nombre_pago'] . '</td>
						<td class="text-center">' . $cobro['cantidad'] . '€</td>
						<td class="text-center">' . $cobro['aplicar_gastos_devolucion'] . '€</td>
					</tr>';
                }

            }
        } else {
            $tr_resultado .= "<tr><td colspan='10'>No hay cobros activos</td></tr>";
        }
        return $tr_resultado;
    }
}

?>