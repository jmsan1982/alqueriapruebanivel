<!DOCTYPE html>
<html lang="es"> 
    <?php require('includes/head.php'); ?>
    <link rel="stylesheet" href="css/forms.css">
    <link rel="stylesheet" href="css/parallax.css">
    <link rel="stylesheet" href="css/formus.css">

    <!-- Código CSS -->
    <style>
        input[type="text"] {text-transform: uppercase;}
        input[type="email"] {text-transform: lowercase;}
        canvas{
            width: 500px !important;
            height: 250px;
            background-color: #ffffff;
            border: 1px solid black;
        }
        .tipoinscripcionseleccionada{text-decoration:underline;}
        #page-content{background-color:#f6f6f6;}
        .error{color:red;}
    </style>
    
    <body class="Pages" id="formus">

        <div class="wrapper overflow-x-hidden">
            <?php require ("includes/header.php"); ?>

            <section id="page-content" class="overflow-x-hidden margin-top-header pb-4">
                <!-- Imagen cabecera -->
                <div class="block">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="parallax col-12 mt-0" style="background-image: url('img/cabecera-cultura-esfuerzo.jpg');">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="block background-f6">
                    <div class="container">
                        <!-- fORMULARIO -->
                        <form id="inscripciones-escuela-form" class="boxed-form"   method="post" enctype="multipart/form-data">
                             
                            <?php 
                            /* $now = date("Y-m-d H:i:s");
                            $date = "2020-06-19 10:00:00";  
                            $ocultamosdiv="";
                            if($now < $date && !isset($_GET["familia"]))
                            {
                                $ocultamosdiv="display:none";  
                            */
                            ?>
                            <!--    <div class="row">
                                    <div class="col-12 col-md-3 col-lg-3 col-xl-3" id="escudo">
                                        <img class="img-responsive" src="img/escudo-cantera.png" style="margin: 0 auto;" alt="Escudo Cantera L´Alqueria del Basket">
                                    </div>
                                    <div class="col-12 col-md-9 col-lg-9 col-xl-9" id="titulo">
                                        <h2 class="section-title">
                                            <?php //echo $lang["ins_cantera_renovacion"];?> <span class="orange-text"><?php //echo $lang["ins_cantera_escuela"];?></span>
                                        </h2>
                                        <h3 class="section-title mb-2"><?php //echo $lang["ins_cantera_ficha"];?></h3>
                                    </div>
                                    <div class="col-12">
                                        <div class="alert alert-info redimension" role="alert">
                                            <h4><i class="fa fa-info-circle" aria-hidden="true"></i> Las inscripciones se abrirán el viernes 19 de junio a las 14:00h. ¡Gracias!</h4>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-1">
                                        <h4><strong>Recuerde las siguientes instrucciones para el momento de la inscripción: </strong></h4>
                                        <p>Debe introducir el Dni del jugador sin espacios ni guiones (Ejemplo: 12345678Z) en caso de que el jugador no tuviera dni la temporada pasada debe introducir el dni de la madre o el padre.</p>
                                        <p>Prepare la siguiente información y los documentos que necesitará obligatoriamente para realizar la inscripción:
                                        <br>1. Cuenta bancaria para los cargos trimestrales
                                        <br>2. Si decide pagar la reserva de 50€ mediante transferencia bancaria en lugar de mediante el pago con tarjeta, prepare la imagen del justificante de pago por transferencia. <bR>
                                        Recuerde que tiene los datos para realizar la transferencia en su correo electrónico.
                                        <br>3. Fotografía del jugador/a
                                        <br>4. Fotografía del SIP
                                        <br>5. Fotografía del DNI por delante y por detrás  
                                        <br>6. Fotografía del pasaporte</p>

                                        <p>Es importante enviar fotos que ocupen toda la fotografía. Vea estos dos ejemplos:<p>
                                    </div>
                                    <div class="col-6">
                                        <p style='color:red;'><b>MAL porque el documento no abarca toda la foto / imagen:</b></p> 
                                        <img width='500' height='300' src='https://servicios.alqueriadelbasket.com/img/inscripciones2020/inscripciones-alqueria-ejemplo-documento-mal-b.jpg'>
                                    </div>
                                    <div class="col-6">
                                        <p style='color:green;'><b>BIEN porque el documento abarca toda la foto / imagen:</b></p> 
                                        <img width='500' height='300' src='https://servicios.alqueriadelbasket.com/img/inscripciones2020/inscripciones-alqueria-demo-documento-bien-b.jpg'>
                                    </div>
                                    <div class="col-12">
                                        <h4><b>DUDAS O INCIDENCIAS</b></h4>
                                        <p>Ante cualquier duda o incidencia, puede ponerse en contacto vía email con <a href='mailto:recepcion@alqueriadelbasket.com' target='_blank' class="orange-text"><b>recepcion@alqueriadelbasket.com</b></a> o al teléfono 961215543. Muchas gracias.</p>
                                    </div>
                                </div>
                            -->
                            <?php 
                            //}
                            ?>
                        
                            <!-- Imagen escudo y titulo -->
                            <div class="row" style="<?php //echo $ocultamosdiv;?>">
                                <div class="col-12 col-md-3 col-lg-3 col-xl-3" id="escudo">
                                    <img class="img-responsive" src="img/escudo-patronato.png" style="margin: 0 auto;" alt="Escudo Patronato L´Alqueria del Basket">
                                </div>

                                <div class="col-12 col-md-9 col-lg-9 col-xl-9" id="titulo">                                
                                    <h2 class="section-title">
                                        <?php echo $lang["ins_cantera_renovacion"];?>  <span class="orange-text">
                                            <?php echo $lang["patronato_titulo"];?></span>
                                    </h2>
                                    <h3 class="section-title mb-2"><?php echo $lang["patronato_subtitulo"];?></h3>
                                </div>
                            </div>

                            
                            <!-- Paso 1: Elegir RENOVACION o NUEVA INSCRIPCION -->
                            <!-- Si marcan "nueva inscripcion" mostramos inscripciones-escuela-mensaje-nueva-inscripcion -->
                            <!-- Si marcan "renovacion" -->
                            <div class="row">
                                <div class="col-12 mb-1" style="font-size: 1.8em;">
                                    <label id="tipo-inscripcion-renovacion" class="control control--radio tipoinscripcionseleccionada"><?php echo $lang["ins_escuela_opcion_renovar"];?>
                                        <input type="radio" name="tipoinscripcion" value="renovacion" checked>
                                        <div class="control__indicator"></div>
                                    </label>
                                </div>

                                <div class="col-6 mb-1" style="font-size: 1.8em; display:none;">
                                    <label id="tipo-inscripcion-nueva" class="control control--radio"><?php echo $lang["ins_escuela_opcion_nuevojugador"];?>
                                        <input type="radio" name="tipoinscripcion" value="nueva">
                                        <div class="control__indicator"></div>
                                    </label>
                                </div>

                                <div id="inscripciones-escuela-mensaje-nueva-inscripcion" class="form-group col-12 mb-1" style="display:none;">
                                    <div class="alert alert-danger redimension" role="alert">
                                        <h4><i class="fa fa-info-circle" aria-hidden="true"></i> <?php echo $lang["ins_cantera_nueva_inscripcion"];?></h4>
                                    </div>
                                </div>
                            </div>
                                    
                            <!-- Paso 2 - PLAN A : Nos dan DNI del jugador/a. -->
                            <div id="paso-2-dni-jugador-container" class="row renovacion-row">
                                <div class="col-12">
                                    <hr style="color:black;border:1px solid #ccc;">
                                </div>

                                <!-- Paso VERIFICACION POR SMS -->
                                <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 redimension">
                                    <label style="font-weight:bold;font-size:20px;"><?php echo $lang["ins_form_mensaje_sms"];?></label>
                                    <input type="number" id="codigo-verificacion" class="form-control" name="codigo-verificacion" max="999999" min="1">                                            
                                </div>
                                 <!-- DNI JUGADOR -->
                                <div class="form-group col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9 redimension">
                                    <label style="font-weight: bold; font-size: 20px;"><?php echo $lang["ins_form_dni_jugador_1"];?> <small><?php echo $lang["ins_form_dni_jugador_2"];?></small></label>
                                    <input type="text" id="dni-jugador" class="form-control" name="validacion-dni" maxlength="50">                                            
                                </div>
                                <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 redimension">
                                    <button id="buscar-jugador-dni-jugador" name="buscar-validacion-dni" 
                                            type="button" class="btn btn-link-w w-100" style="max-height: 59px; margin-top: 28px; margin-left: 0;">
                                        <span><?php echo $lang["ins_form_buscar_jugador"];?></span>  
                                    </button>
                                </div>
                                <div id="paso-2-dni-jugador-respuesta" class="form-group col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 redimension"></div>
                                <div id="paso-2-dni-jugador-error-dni" class="col-12" style="display:none;">
                                    <div class="alert alert-info redimension" role="alert">
                                        <h4 class="mt-0 mb-0"><i class="fa fa-info-circle" aria-hidden="true"></i><?php echo $lang ["ins_form_dni_no_valido_1"];?><br>
                                        <i class="fa fa-info-circle" aria-hidden="true"></i><?php echo $lang ["ins_form_dni_no_valido_2"];?><br>
                                        <i class="fa fa-info-circle" aria-hidden="true"></i><?php echo $lang ["ins_form_dni_no_valido_3"];?></h4>
                                    </div>
                                </div>
                            </div>

                            <!-- Paso 2 - PLAN B: Nos dan DNI del padre o de la madre. -->
                            <!-- <div id="paso-2-dni-tutor-container" class="row renovacion-row" style="display:none;">
                                <div class="col-12">
                                    <hr>
                                </div>

                                <div class="form-group col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9 redimension">
                                    <label style="font-weight:bold;font-size:20px;"><?php echo $lang["ins_form_dni_tutor_1"];?>
                                        <br><small><?php echo $lang["ins_form_dni_tutor_2"];?></small></label>
                                    <input type="text" id="validacion-dni-padremadre" class="form-control" maxlength="50">                                            
                                </div>

                                <div class="form-group col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 redimension">
                                    <button type="button" class="mt-4 btn btn-link-w w-100" id="buscar-jugador-dni-padremadre"
                                            style="max-height: 59px; margin-top: 28px; margin-left: 0;">
                                        <span><?php echo $lang["ins_form_buscar_jugador"];?></span>
                                    </button>
                                </div>

                                <div id="paso-2-dni-tutor-selector-jugador" class="form-group col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 redimension" style="display:none;">
                                    <label style="font-weight: bold; font-size: 20px;"><?php echo $lang["ins_cant_esc_select"];?></label>
                                    <select class="form-control" value="" name="validacion-dni-select" id="validacion-dni-select">
                                        <option value=""><?php echo $lang["ins_cant_esc_select_vacio"];?></option>  
                                    </select>
                                </div>

                                <div id="paso-2-dni-tutor-respuesta" class="form-group col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 redimension"></div>

                                <div id="paso-2-dni-tutor-error-dni" class="col-12" style="display:none;">
                                    <div class="alert alert-info redimension" role="alert">
                                        <h4 class="mt-0 mb-0"><i class="fa fa-info-circle" aria-hidden="true"></i><?php echo $lang ["ins_form_dni_no_valido_1"];?><br>
                                            <i class="fa fa-info-circle" aria-hidden="true"></i><?php echo $lang ["ins_form_dni_no_valido_2"];?><br>
                                            <i class="fa fa-info-circle" aria-hidden="true"></i><?php echo $lang ["ins_form_dni_no_valido_3"];?></h4>
                                    </div>
                                </div>
                            </div>
 -->
                            <div id="mensaje-carga-jugador" class="row mt-1">
                                <div class="col-12">
                                    <div class="alert alert-info redimension" role="alert">
                                        <h4 class="mt-0 mb-0">
                                            <i class="fa fa-info-circle" aria-hidden="true"></i><?php echo $lang["ins_form_cargue_jugador"];?><br>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Paso 3: Cargamos los datos del jugador/a y permitimos editarlos todos excepto el equipo -->
                            <div class="row mt-1 renovacion-row">
                                <div class="col-12">
                                    <hr style="color:black;border:1px solid #ccc;">
                                </div>
                                <div class="col-12">
                                    <h4 class="mt-0 mb-1"><strong><?php echo $lang["ins_form_datosjugador"];?></strong></h4>
                                    <!-- Tipo de documento, nº documento, fecha caducidad documento, nacionalidad -->
                                    <div class="row">
                                        <div class="form-group col-12 col-md-3 col-lg-3 col-xl-3">
                                            <label><?php echo $lang["ins_form_tipodoc"];?>
                                                <select readonly class="form-control campos-required" name="tipodocjugador" id="tipodocjugador-form-escuela" required>
                                                    <option value=""><?php echo $lang["ins_controller_seleccionar"];?></option>
                                                    <option value="DNI">DNI</option>
                                                    <option value="NIE">NIE</option>
                                                    <option value="PASAPORTE"><?php echo $lang["ins_form_tipodoc_pas"];?></option>
                                                </select>
                                            </label>
                                        </div>
                                        <div class="form-group col-12 col-12 col-md-3 col-lg-3 col-xl-3">
                                            <label><?php echo $lang["ins_form_numdoc"];?>
                                                <input readonly type="text" class="form-control input-control-dni"  name="dnijugador" id="dni-jugador-form-escuela" maxlength="50" required>
                                            </label>
                                        </div>
                                        <div class="form-group col-12 col-12 col-md-3 col-lg-3 col-xl-3">
                                            <label><?php echo $lang["ins_form_fechacad"];?>
                                                <input readonly type="date" class="form-control input-control-dni"  id="fechacad-jugador-form-escuela" name="fechacaducidad" required>
                                            </label>
                                        </div>
                                        <div class="form-group col-12 col-md-3 col-lg-3 col-xl-3">
                                            <label><?php echo $lang["ins_form_nacionalidad"];?>
                                                <input readonly type="text" class="form-control input-control-dni" name="nacionalidad" id="nacionalidad-form-escuela" maxlength="25" required>
                                            </label>
                                        </div>
                                    </div>

                                    <!-- Fecha de nacimiento, nombre y apellidos -->
                                    <div class="row">
                                        <div class="form-group col-12 col-md-3 col-lg-3 col-xl-3">
                                            <label><?php echo $lang["ins_form_fechanac"];?>
                                                <input readonly type="date" class="form-control input-control-dni" style="color: #5c5c5c !important;" 
                                                       id="fechanac-form-escuela" name="fechanacimiento" required>
                                            </label>
                                        </div>
                                        <div class="form-group col-12 col-md-3 col-lg-3 col-xl-3">
                                            <label><?php echo $lang["ins_form_nombre"];?>
                                                <input readonly type="text" class="form-control input-control-dni" name="nombre" id="nombre-form-escuela" maxlength="45" required>
                                            </label>
                                        </div>
                                        <div class="form-group col-12 col-md-6 col-lg-6 col-xl-6">
                                            <label><?php echo $lang["ins_form_apel"];?>
                                                <input readonly type="text" class="form-control input-control-dni" name="apellidos" id="apellidos-form-escuela" maxlength="45" required>
                                            </label>
                                        </div>
                                    </div>

                                    <!-- Dirección 1/2 -->
                                    <div class="row">
                                        <div class="form-group col-12 col-md-6 col-lg-6 col-xl-6">
                                            <label><?php echo $lang["ins_form_direcion"];?>
                                                <input readonly type="text" class="form-control input-control-dni" name="direccion" id="direccion-form-escuela" maxlength="100" required>
                                            </label>
                                        </div>
                                        <div class="form-group col-12 col-md-2 col-lg-2 col-xl-2">
                                            <label>Número:
                                                <input readonly type="text" class="form-control input-control-dni" name="numero" id="numero-form-escuela" maxlength="10">
                                            </label>
                                        </div>
                                        <div class="form-group col-12 col-md-2 col-lg-2 col-xl-2">
                                            <label>Piso / Esc:
                                                <input readonly type="text" class="form-control input-control-dni" name="piso" id="piso-form-escuela" maxlength="10">
                                            </label>
                                        </div>
                                        <div class="form-group col-12 col-md-2 col-lg-2 col-xl-2">
                                            <label><?php echo $lang["ins_form_porta"];?>
                                                <input readonly type="text" class="form-control input-control-dni" name="puerta" id="puerta-form-escuela" maxlength="10">
                                            </label>
                                        </div>
                                    </div>

                                    <!-- Dirección 2/2 -->
                                    <div class="row">
                                        <div class="form-group col-12 col-md-3 col-lg-3 col-xl-3">
                                            <label><?php echo $lang["ins_form_cp"];?>
                                                <input readonly type="number" class="form-control input-control-dni" name="cp" id="cp-form-escuela" maxlength="10" required>
                                            </label>
                                        </div>

                                        <div class="form-group col-12 col-md-6 col-lg-6 col-xl-6">
                                            <label><?php echo $lang["ins_form_pob"];?>
                                                <input readonly type="text" class="form-control input-control-dni" name="poblacion" id="poblacion-form-escuela" maxlength="45" required>
                                            </label>
                                        </div>

                                        <div class="form-group col-12 col-md-3 col-lg-3 col-xl-3">
                                            <label><?php echo $lang["ins_form_prov"];?>
                                                <input readonly type="text" class="form-control input-control-dni" name="provincia" id="provincia-form-escuela" maxlength="25" required>
                                            </label>
                                        </div>
                                    </div>

                                    <!-- Sexo, pais de nacimiento, talla de camiseta, años en el club -->
                                    <div class="row">
                                        <div class="form-group col-12 col-md-3 col-lg-3 col-xl-3">
                                            <label><?php echo $lang["ins_form_sexo"];?>
                                                <select readonly class="form-control campos-required" name="sexojugador" id="sexojugador-form-escuela" required>
                                                    <option value=""><?php echo $lang["ins_controller_seleccionar"];?></option>
                                                    <option value="HOMBRE"><?php echo $lang["ins_form_sexo_1"];?></option>
                                                    <option value="MUJER"><?php echo $lang["ins_form_sexo_2"];?></option>
                                                </select>
                                            </label>
                                        </div>
                                        <div class="form-group col-12 col-md-3 col-lg-3 col-xl-3">
                                            <label><?php echo $lang["ins_form_paisnac"];?>
                                                <input readonly type="text" class="form-control input-control-dni" name="paisnac" id="paisnac-form-escuela" maxlength="25" required>
                                            </label>
                                        </div>
                                        <div class="form-group col-12 col-md-3 col-lg-3 col-xl-3">
                                            <label><?php echo $lang["ins_form_anyosclub"];?>
                                                <input readonly type="number" class="form-control input-control-dni" name="anyosclub" id="anyosclub-form-escuela" min="0" step="1">
                                            </label>
                                        </div>
                                        <div class="form-group col-12 col-md-3 col-lg-3 col-xl-3">
                                            <label for="alergias-form-masculino" class="labelForm"><?php echo $lang["ins_form_alergias"];?></label>
                                            <input readonly type="text" class="form-control inputForm valid input-control-dni" value="" id="alergias-form-escuela" name="alergias-form-escuela"  aria-invalid="false">
                                        </div>
                                    </div>

                                    <!-- Alergias, teléfono movil y email -->
                                    <div class="row">
                                        <div class="form-group col-12 col-md-6 col-lg-6 col-xl-6">
                                            <label><?php echo $lang["ins_form_telefono_jugador"];?>
                                                <input readonly type="number" class="form-control input-control-dni" name="tlfjugador" id="tlfjugador-form-escuela" min="600000000" required>
                                            </label>
                                        </div>

                                        <div class="form-group col-12 col-md-6 col-lg-6 col-xl-6">
                                            <label><?php echo $lang["ins_form_email"];?> del jugador
                                                <input readonly type="email" class="form-control input-control-dni" name="email" id="email-form-escuela" maxlength="100" required>
                                            </label>
                                        </div>
                                    </div>

                                    <!-- Colegio y curso -->
                                    <div class="row">
                                        <div class="form-group col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
                                            <label for="colegio-form-escuela" class="labelForm"><?php echo $lang["ins_form_colegio"];?></label>
                                            <input type="text" class="form-control inputForm" value="" id="colegio-form-escuela" maxlength="80"
                                                   readonly name="colegio"  aria-invalid="false">
                                        </div>

                                        <div class="form-group col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                            <label for="curso-form-escuela" class="labelForm"><?php echo $lang["ins_form_curso"];?></label>
                                            <input type="text" class="form-control inputForm" value="" id="curso-form-escuela" 
                                                   readonly name="curso"  aria-invalid="false">
                                        </div>
                                    </div>

                                    <!-- INFO EQUIPO Y HORARIO-->
                                    <div class="row">
                                        <!-- nombre de equipo-->
                                        <div class="form-group col-12 col-md-6 col-lg-6 col-xl-6">
                                            <label><?php echo $lang["ins_form_equipo"];?>
                                                <input type="text" class="form-control" readonly name="modalidad" id="modalidad-form-escuela" >
                                                <input type="hidden" id="id-modalidad-form-escuela" >
                                            </label>
                                        </div>

                                        <div class="form-group col-12 col-md-6 col-lg-6 col-xl-6">
                                            <label><?php echo $lang["ins_form_horario"];?>
                                                <table class="table table-striped form-group" border="1" style="width: 100%;">
                                                    <thead class="thead-dark">
                                                        <tr>
                                                            <th scope="col" style="width: 20%;padding-top: 4px;padding-bottom: 4px;"><?php echo $lang["lunes"];?></th>
                                                            <th scope="col" style="width: 20%;padding-top: 4px;padding-bottom: 4px;"><?php echo $lang["martes"];?></th>
                                                            <th scope="col" style="width: 20%;padding-top: 4px;padding-bottom: 4px;"><?php echo $lang["miercoles"];?></th> 
                                                            <th scope="col" style="width: 20%;padding-top: 4px;padding-bottom: 4px;"><?php echo $lang["jueves"];?></th> 
                                                            <th scope="col" style="width: 20%;padding-top: 4px;padding-bottom: 4px;"><?php echo $lang["viernes"];?></th>    
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="">
                                                            <td id="lunes-form-escuela" style="text-align:center;padding-top: 4px;padding-bottom: 4px;" >-</td>
                                                            <td id="martes-form-escuela" style="text-align:center;padding-top: 4px;padding-bottom: 4px;" >-</td>
                                                            <td id="miercoles-form-escuela" style="text-align:center;padding-top: 4px;padding-bottom: 4px;" >-</td>
                                                            <td id="jueves-form-escuela" style="text-align:center;padding-top: 4px;padding-bottom: 4px;" >-</td>
                                                            <td id="viernes-form-escuela" style="text-align:center;padding-top: 4px;padding-bottom: 4px;" >-</td>
                                                            <input type="hidden" name="texto-horario-escuela" id="texto-horario-escuela" >
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </label>
                                        </div>

                                        <div class="col-12">
                                            <div class="alert alert-info"><h4 class="mt-0 mb-0"><i class="fa fa-info-circle" aria-hidden="true"></i><?php echo $lang["ins_form_horario_aviso"];?></h4> </div>
                                        </div>

                                        <!-- Tipo de Alumno -->
                                        <div class="form-group col-12 col-md-6 col-lg-12 col-xl-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h4 class="mt-0 mb-1"><strong><?php echo $lang["patronato_tipo_alumno_titulo"];?></strong></h4>
                                                   <!--  <h3 class="section-title"><?php //echo $lang["patronato_tipo_alumno_titulo"];?></h3> -->
                                                </div>

                                                <div class="col-12 mb-1" style="font-size: 1.2em;">
                                                    <label class="control control--radio">
                                                        <?php echo $lang["patronato_tipo_alumno_centro"];?>
                                                        <input type="radio" name="tipo" value="interno" >
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>

                                                <div class="col-12 mb-1" style="font-size: 1.2em;">
                                                    <label class="control control--radio">
                                                        <?php echo $lang["patronato_tipo_alumno_externo"];?>
                                                        <input type="radio" name="tipo" value="externo" checked>
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>

                                                <div class="col-12 redimension">
                                                    <label class="containerchekbox">
                                                        <input type="checkbox" name="hermanosinscritos" value="1" id="hermanosinscritos">
                                                        <p><?php echo $lang["patronato_tipo_alumno_opcion_hermanos"];?></p>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>

                                            </div>
                                        </div>


                                        <!-- Seleccion de equipo-->
                                        
                                            <div class="form-group col-12 col-md-6 col-lg-6 col-xl-6">
                                                <div class="row"> 
                                                    <div class="col-12">
                                                        <h4 class="mt-0 mb-1"><strong><?php echo $lang["patronato_equipo_titulo"];?></strong></h4>
                                                    </div>

                                                    <!-- PREBENJAMIN-->
                                                    <div class="col-12">
                                                        <h4 class="orange-text mt-0 mb-0"><?php echo $lang["patronato_equipo_titulo_prebenjamin"];?></h4>
                                                    </div>

                                                    <div class="col-12 mb-2" style="font-size: 1.2em;">
                                                        <label class="control control--radio">
                                                            <?php echo $lang["patronato_equipo_horario_prebenjamin"];?>
                                                            <input type="radio" name="modalidadequipo" value="prebenjaminmixto" checked>
                                                            <div class="control__indicator"></div>
                                                        </label>
                                                    </div>

                                                    <!-- BENJAMIN-->
                                                    <div class="col-12">
                                                        <h4 class="orange-text mt-0 mb-0"><?php echo $lang["patronato_equipo_titulo_benjamin"];?></h4>
                                                    </div>

                                                    <div class="col-12 mb-2" style="font-size: 1.2em;">
                                                        <label class="control control--radio">
                                                            <?php echo $lang["patronato_equipo_horario_benjamin"];?>
                                                            <input type="radio" name="modalidadequipo" value="benjaminmixto">
                                                            <div class="control__indicator"></div>
                                                        </label>
                                                    </div>

                                                    <div class="col-12">
                                                        <h4 class="orange-text mt-0 mb-0"><?php echo $lang["patronato_equipo_titulo_alevin"];?></h4>
                                                    </div>

                                                    <div class="col-12 mb-2" style="font-size: 1.2em;">
                                                        <label class="control control--radio">
                                                            <?php echo $lang["patronato_equipo_horario_alevin"];?>
                                                            <input type="radio" name="modalidadequipo" value="alevinmixto">
                                                            <div class="control__indicator"></div>
                                                        </label>
                                                    </div>

                                                    <!--<div class="col-12">
                                                        <h4 class="orange-text mt-0 mb-0">INFANTIL (nacidos en 2005 y 2006)</h4>
                                                    </div>

                                                    <div class="col-12 mb-1" style="font-size:1.2em;">
                                                        <label class="control control--radio">
                                                            <strong>MASCULINO:</strong> Martes y Jueves de 18:15 a 19:30.
                                                            <input type="radio" name="modalidad" value="infantilmasculino">
                                                            <div class="control__indicator"></div>
                                                        </label>
                                                    </div>

                                                    <div class="col-12 mb-2" style="font-size:1.2em;">
                                                        <label class="control control--radio">
                                                            <strong>FEMENINO:</strong> Lunes y Miércoles de 18:15 a 19:30.
                                                            <input type="radio" name="modalidad" value="infantilfemenino">
                                                            <div class="control__indicator"></div>
                                                        </label>
                                                    </div>-->

                                                    <!-- CADETE-->
                                                    <div class="col-12">
                                                        <h4 class="orange-text mt-0 mb-0"><?php echo $lang["patronato_equipo_titulo_cadete"];?></h4>
                                                    </div>

                                                    <div class="col-12 mb-1" style="font-size: 1.2em;">
                                                        <label class="control control--radio">
                                                            <?php echo $lang["patronato_equipo_horario_cadete_masc"];?>
                                                            <input type="radio" name="modalidadequipo" value="cadetemasculino">
                                                            <div class="control__indicator"></div>
                                                        </label>
                                                    </div>

                                                    <div class="col-12 mb-2" style="font-size: 1.2em;">
                                                        <label class="control control--radio">
                                                            <?php echo $lang["patronato_equipo_horario_cadete_fem"];?>
                                                            <input type="radio" name="modalidadequipo" value="cadetefemenino">
                                                            <div class="control__indicator"></div>
                                                        </label>
                                                    </div>

                                                    <!-- JUNIOR-->
                                                    <div class="col-12">
                                                        <h4 class="orange-text mt-0 mb-0"><?php echo $lang["patronato_equipo_titulo_junior"];?></h4>
                                                    </div>

                                                    <div class="col-12 mb-1" style="font-size: 1.2em;">
                                                        <label class="control control--radio">
                                                            <?php echo $lang["patronato_equipo_horario_junior_masc"];?>
                                                            <input type="radio" name="modalidadequipo" value="juniormasculino">
                                                            <div class="control__indicator"></div>
                                                        </label>
                                                    </div>

                                                    <div class="col-12 mb-2" style="font-size: 1.2em;">
                                                        <label class="control control--radio">
                                                            <?php echo $lang["patronato_equipo_horario_junior_fem"];?>
                                                            <input type="radio" name="modalidadequipo" value="juniorfemenino">
                                                            <div class="control__indicator"></div>
                                                        </label>
                                                    </div>

                                                    <!-- SENIOR-->
                                                    <div class="col-12">
                                                        <h4 class="orange-text mt-0 mb-0"><?php echo $lang["patronato_equipo_titulo_senior"];?></h4>
                                                    </div>

                                                    <div class="col-12 mb-1" style="font-size: 1.2em;">
                                                        <label class="control control--radio">
                                                            <?php echo $lang["patronato_equipo_horario_senior_masc"];?>
                                                            <input type="radio" name="modalidadequipo" value="seniormasculino">
                                                            <div class="control__indicator"></div>
                                                        </label>
                                                    </div>

                                                    <div class="col-12" style="font-size: 1.2em;">
                                                        <label class="control control--radio">
                                                            <?php echo $lang["patronato_equipo_horario_senior_fem"];?>
                                                            <input type="radio" name="modalidadequipo" value="seniorfemenino">
                                                            <div class="control__indicator"></div>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h4 class="mt-0 mb-1 t-center"><strong><?php echo $lang["patronato_informacion_titulo"];?></strong></h4>
                                                        <!-- <h3 class="section-title t-center"><?php echo $lang["patronato_informacion_titulo"];?></h3> -->
                                                    </div>

                                                    <div class="col-12 col-lg-8 offset-lg-2 mb-2">
                                                        <div class="contact-info-wrap">    
                                                            <h4 class="section-title mt-0 mb-0">
                                                                <span class="orange-text"><?php echo $lang["patronato_informacion_titulo_equipacion"];?></span>
                                                            </h4>
                                                            <ul>
                                                                <li><?php echo $lang["patronato_informacion_equipacion_naranja"];?></li>
                                                                <li><?php echo $lang["patronato_informacion_equipacion_entrenamiento"];?></li>
                                                                <li><?php echo $lang["patronato_informacion_chandal"];?></li>
                                                                <li><?php echo $lang["patronato_informacion_bolsa"];?></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-lg-8 offset-lg-2 mb-2">
                                                        <div class="contact-info-wrap">    
                                                            <h4 class="section-title mt-0 mb-0">
                                                                <span class="orange-text"><?php echo $lang["patronato_informacion_titulo_opcional"];?></span>
                                                            </h4>
                                                            <ul>
                                                                <li><?php echo $lang["patronato_informacion_opcional_equipacion"];?></li>
                                                                <li><?php echo $lang["patronato_informacion_opcional_camiseta"];?></li>
                                                                <li><?php echo $lang["patronato_informacion_opcional_sudadera"];?></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-lg-8 offset-lg-2 mb-2">
                                                        <div class="contact-info-wrap">
                                                            <h4 class="section-title mt-0 mb-0">
                                                                <span class="orange-text"><?php echo $lang["patronato_informacion_titulo_contacto"];?></span>
                                                            </h4>
                                                            <p><?php echo $lang["patronato_informacion_texto_contacto"];?></p>
                                                            <a href="tel:+34615557377" target="_blank" style="color: black; font-size: 1.3em;">
                                                                <i class="fa fa-phone" aria-hidden="true"></i> 615557377
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                    </div>
                                </div>
                            </div>

                            <!-- Paso 4: Datos de la familia -->
                            <div class="row mt-1 renovacion-row">
                                <div class="col-12">
                                    <hr style="color:black;border:1px solid #ccc;">
                                </div>
                                <div class="col-12">
                                    <h4 class="mt-0 mb-1"><strong><?php echo $lang["ins_form_familia_titulo"];?></strong></h4>
                                    <!-- Nº DE HERMANOS Y EDADES-->
                                    <div class="row">
                                       <div class="form-group col-12 col-md-2 col-lg-2 col-xl-2">    
                                           <label><?php echo $lang["ins_form_numh"];?>
                                               <select class="form-control campos-required" id="numhermanos-form-escuela" required>
                                                   <option value=""><?php echo $lang["ins_controller_seleccionar"];?></option>
                                                   <option value="0">0</option>
                                                   <option value="1">1</option>
                                                   <option value="2">2</option>
                                                   <option value="3">3</option>
                                                   <option value="4">4</option>
                                                   <option value="5">5</option>
                                                   <option value="6">6</option>
                                                   <option value="7">7</option>
                                                   <option value="8">8</option>
                                                   <option value="9">9</option>
                                                   <option value="10">10</option>
                                               </select>
                                           </label>                                          
                                       </div>
                                       <div id="edades-hermanos-container-completo" class="form-group col-12 col-md-10 col-lg-10 col-xl-10" style="display:none;">
                                           <div class="row">
                                               <div class="form-group mb-0 col-12">
                                                   <label><?php echo $lang["ins_form_edades"];?></label>
                                               </div>
                                               <div class="form-group col-12">
                                                   <div id="edades-hermanos-container" class="row"></div>
                                               </div>
                                           </div>
                                       </div>
                                   </div>

                                    <!-- CONTROL MONOPARENTAL -->
                                    <div class="row mt-1">
                                       <!-- Controlar si es familia monoparental-->
                                       <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">    
                                           <div class="row">       
                                               <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 t-left">
<!--                                                   <label class="containerchekbox"><?php echo $lang["ins_form_monop"];?>
                                                       <input type="checkbox" name="familia" id="familia-form-escuela" value="familia">
                                                       <span class="checkmark"></span><?php echo $lang["ins_form_monop"];?>
                                                   </label>-->
                                                    <label class="containerchekbox"><?php echo $lang["ins_form_monop"];?> </label>
                                                    <select class="form-control campos-required"  id="familia-form-escuela" required>
                                                        <option value=""><?php echo $lang["ins_controller_seleccionar"];?></option>
                                                        <option value="0"><?php echo $lang["ins_controller_no"];?></option>
                                                        <option value="1"><?php echo $lang["ins_controller_si"];?> </option>
                                                    </select>
                                               </div>
                                               
                                               
                                               
                                               <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-1 mb-1"  id="monoparental-container">
                                                   <select class="form-control campos-required"  id="tipo-familia-monoparental-madre-padre">
                                                        <option value=""><?php echo $lang["ins_controller_seleccionar"];?></option>
                                                        <option value="madre"><?php echo $lang["ins_form_monop_madre"];?></option>
                                                        <option value="padre"><?php echo $lang["ins_form_monop_padre"];?> </option>
                                                   </select>
                                                   
<!--                                                    <div class="form-group col-12 col-md-2 col-lg-2 col-xl-2"> 
                                                        <label id="tipo-familia-monoparental-madre" class="control control--radio" >
                                                            <input type="radio" name="tipofamiliamonoparental" value="madre"> 
                                                            <?php// echo $lang["ins_form_monop_madre"];?>
                                                            <div class="control__indicator"></div>
                                                        </label>
                                                    </div>
                                                    <div class="form-group col-12 col-md-2 col-lg-2 col-xl-2"> 
                                                        <label id="tipo-familia-monoparental-padre" class="control control--radio" >
                                                            <input type="radio" name="tipofamiliamonoparental" value="padre" > 
                                                            <?php //echo $lang["ins_form_monop_padre"];?> 
                                                            <div class="control__indicator"></div>
                                                        </label>
                                                    </div>-->
                                               </div>        
                                           </div>                                               
                                       </div>  
                                    </div>

                                    <!-- DATOS DE LA MADRE -->
                                    <div id="datosmadre" class="row">
                                        <div class="col-12">
                                            <p><strong><?php echo $lang["ins_form_datos_madre"];?></strong></p>
                                        </div>
                                        <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4">
                                            <label><?php echo $lang["ins_form_nombre"];?>
                                                <input type="text" class="form-control input-control-dni" name="nombremadre" id="nombremadre-form-escuela" maxlength="100" >
                                            </label>
                                        </div>
                                        <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4">
                                            <label><?php echo $lang["ins_form_apel"];?> 
                                                <input type="text" class="form-control input-control-dni" name="apellidosmadre" id="apellidosmadre-form-escuela" maxlength="100" >
                                            </label>
                                        </div>
                                        <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4">
                                            <label>DNI:
                                                <input type="text" class="form-control input-control-dni" name="dnimadre" id="dnimadre-form-escuela" maxlength="10" >
                                            </label>
                                        </div>
                                        <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4">
                                            <label><?php echo $lang["ins_form_telef"];?>
                                                <input type="number" class="form-control input-control-dni" name="tlfmadre" id="tlfmadre-form-escuela" maxlength="15" >
                                            </label>
                                        </div>
                                        <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4">
                                            <label><?php echo $lang["ins_form_email"];?>
                                                <input type="email" class="form-control input-control-dni" name="emailmadre" id="emailmadre-form-escuela" maxlength="100" >
                                            </label>
                                        </div>
                                        <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4">
                                            <label><?php echo $lang["ins_form_datos_estudios"];?>
                                                <select class="form-control campos-required" name="estudiosmadre" id="estudiosmadre-form-escuela" >
                                                    <option value=""><?php echo $lang["ins_controller_seleccionar"];?></option>
                                                    <option value="SECUNDARIA"><?php echo $lang["ins_form_datos_estud_op1"];?></option>
                                                    <option value="BACHILLERATO"><?php echo $lang["ins_form_datos_estud_op2"];?></option>
                                                    <option value="FP"><?php echo $lang["ins_form_datos_estud_op3"];?></option>
                                                    <option value="GRADO O LICENCIATURA"><?php echo $lang["ins_form_datos_estud_op4"];?></option>
                                                    <option value="MASTERS Y POSTGRADOS"><?php echo $lang["ins_form_datos_estud_op5"];?></option>
                                                    <option value="DOCTORADO"><?php echo $lang["ins_form_datos_estud_op6"];?></option>
                                                </select>
                                            </label>
                                        </div>
                                    </div>

                                    <!-- DATOS DEL PADRE -->
                                    <div id="datospadre" class="row">
                                        <div class="col-12">
                                            <p><strong><?php echo $lang["ins_form_datos_padre"];?></strong></p>
                                        </div>
                                        <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4">
                                            <label><?php echo $lang["ins_form_nombre"];?>
                                                <input type="text" class="form-control input-control-dni" name="nombrepadre" id="nombrepadre-form-escuela" maxlength="100" >
                                            </label>
                                        </div>
                                        <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4">
                                            <label><?php echo $lang["ins_form_apel"];?> 
                                                <input type="text" class="form-control input-control-dni" name="apellidospadre" id="apellidospadre-form-escuela" maxlength="100" >
                                            </label>
                                        </div>
                                        <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4">
                                            <label>DNI:
                                                <input type="text" class="form-control input-control-dni" name="dnipadre" id="dnipadre-form-escuela" maxlength="10" >
                                            </label>
                                        </div>
                                        <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4">
                                            <label><?php echo $lang["ins_form_telef"];?>
                                                <input type="number" class="form-control input-control-dni" name="tlfpadre" id="tlfpadre-form-escuela"  maxlength="15" >
                                            </label>
                                        </div>
                                        <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4">
                                            <label><?php echo $lang["ins_form_email"];?>
                                                <input type="email" class="form-control input-control-dni" name="emailpadre" id="emailpadre-form-escuela" maxlength="100" >
                                            </label>
                                        </div>
                                        <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4">
                                            <label><?php echo $lang["ins_form_datos_estudios"];?>
                                                <select class="form-control campos-required" name="estudiospadre"  id="estudiospadre-form-escuela" >
                                                    <option value=""><?php echo $lang["ins_controller_seleccionar"];?></option>
                                                    <option value="SECUNDARIA"><?php echo $lang["ins_form_datos_estud_op1"];?></option>
                                                    <option value="BACHILLERATO"><?php echo $lang["ins_form_datos_estud_op2"];?></option>
                                                    <option value="FP"><?php echo $lang["ins_form_datos_estud_op3"];?></option>
                                                    <option value="GRADO O LICENCIATURA"><?php echo $lang["ins_form_datos_estud_op4"];?></option>
                                                    <option value="MASTERS O POSTGRADOS"><?php echo $lang["ins_form_datos_estud_op5"];?></option>
                                                    <option value="DOCTORADO"><?php echo $lang["ins_form_datos_estud_op6"];?></option>
                                                </select>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Paso 5: Subida de ficheros: foto, DNI, pasaporte, SIP -->
                            <div class="row mt-1 renovacion-row">
                                <div class="col-12 t-center">
                                    <hr style="color:black;border:1px solid #ccc;">
                                   <!--  <h2 class="section-title"><?php //echo $lang["licencia_siguiente_paso_titulo"];?></h2> -->
                                </div>  

                                <div class="col-12">
                                    <h4 class="mt-0 mb-1"><strong><?php echo $lang["ins_form_fotos"];?></strong></h4>
                                    <div class="alert alert-info redimension" role="alert">
                                        <h4 class="mt-0 mb-0"><i class="fa fa-info-circle" aria-hidden="true"></i> <?php echo $lang["ins_form_fotos_aviso1"];?></h4>
                                        <h4 class="mt-0 mb-0"><i class="fa fa-info-circle" aria-hidden="true"></i> <?php echo $lang["ins_form_fotos_aviso2"];?></h4>
                                        <h4 class="mt-0 mb-0"><i class="fa fa-info-circle" aria-hidden="true"></i> <?php echo $lang["ins_form_fotos_aviso3"];?></h4>
                                    </div>
                                </div>

                                <!-- IMG DE DEMO -->
                                <div class="col-12 col-md-4 col-lg-4 col-xl-4">
                                    <h4 id="foto-jugador-h4" class="mb-0" style="color:red;"><strong><?php echo $lang["ins_form_ejemplo"];?> <i class="fa fa-times" aria-hidden="true"></i> </strong></h4>
                                    <img class="img-responsive border pb-0" src="img/inscripciones2020/inscripciones-alqueria-ejemplo-documento-mal.jpg" style="margin: 0 auto;border:1px solid #ddd;">
                                    <h4 id="foto-jugador-h4" class="mb-0" style="color:darkgreen;"><strong><?php echo $lang["ins_form_ejemplo"];?> <i class="fa fa-check" aria-hidden="true"></i> </strong></h4>
                                    <img class="img-responsive border" src="img/inscripciones2020/inscripciones-alqueria-demo-documento-bien.png" style="margin: 0 auto;border:1px solid #ddd;">
                                </div>

                                <!-- FOTOS -->
                                <div class="form-group col-12 col-md-8 col-lg-8 col-xl-8">
                                    <div class="row">
                                        <!-- FOTO JUGADOR -->
                                        <div class="col-12 col-lg-6 col-xl-6">
                                            <label>
                                                <h4 id="foto-jugador-h4"><strong><?php echo $lang["licencia_siguiente_paso_foto_jugador"];?></strong></h4>
                                                <input type="file" name="archivo_foto"  id="archivo_foto"  accept="image/png, image/jpeg" style="border: none !important;" required> 
                                            </label>
                                        </div>



                                        <!-- SIP -->
                                        <div class="col-12 col-lg-6 col-xl-6">
                                            <label>
                                                <h4 id="sip-jugador-h4"><strong>SIP</strong></h4>
                                                <input type="file" name="sip" id="archivo_sip" accept="image/png, image/jpeg" style="border: none !important;" required>
                                            </label>
                                        </div>  

                                        <hr style="color:black;border:1px solid #ccc;">
                                    </div>




                                    <div class="row">
                                            <!-- DNI DELANTE -->
                                            <div class="form-group col-12 col-lg-6 col-xl-6">
                                                <label>
                                                    <h4><strong><?php echo $lang["licencia_siguiente_paso_dni_frontal"];?></strong></h4>
                                                    <input type="file" name="dni_jugador_imagen[]" id="archivo_dni_frontal" style="border: none !important;"
                                                           accept="image/png, image/jpeg" required>
                                                </label>
                                            </div>

                                            <!-- DNI DETRAS -->
                                            <div class="form-group col-12 col-lg-6 col-xl-6">
                                                <label>
                                                    <h4><strong><?php echo $lang["licencia_siguiente_paso_dni_detras"];?></strong></h4>
                                                    <input type="file" name="dni_jugadordetras_imagen[]" id="archivo_dni_trasero"  style="border: none !important;"
                                                           accept="image/png, image/jpeg" required>
                                                </label>
                                            </div>


                                            <hr style="color:black;border:1px solid #ccc;">
                                    </div>


                                    <!-- PASAPORTE -->
                                    <div class="row">
                                        <div class="form-group col-12 col-lg-6 col-xl-6">
                                            <label>
                                                <h4><strong><?php echo $lang["ins_form_fotos_pasaporte"];?></strong></h4>  
                                                <input type="file" name="pasaporte_jugador_imagen[]" id="archivo_pasaporte" style="border: none !important;"
                                                        accept="image/png, image/jpeg">
                                            </label>
                                        </div>    
                                    </div>

                                </div>
                            </div>

                            <!-- Paso 6: Información de los pagos -->
                            <div class="row renovacion-row">
                                <!-- Titulo seccion pagos -->
                                <div class="col-12">
                                    <h3 class="section-title t-center mb-0">
                                        <span class="orange-text"><?php echo $lang["patronato_titulo_pagos_plazos_metodos"];?></span>
                                    </h3>
                                </div>

                                <div class="col-12">       
                                    <p class="t-justify"><?php echo $lang["patronato_titulo_pagos_tarjeta_oficina_texto"];?></p>
                                    <p class="t-justify">- <?php echo $lang["patronato_titulo_pagos_tarjeta_oficina_punto1"];?>
                                    <br>- <?php echo $lang["patronato_titulo_pagos_tarjeta_oficina_punto2"];?>
                                    <br>- <?php echo $lang["patronato_titulo_pagos_tarjeta_oficina_punto3"];?></p>
                                </div>

                                <!-- Info importe pagos -->
                                <div class="col-12">
                                        <div class="col-12 col-md-4 col-lg-4 col-xl-4">
                                            <h4 class="section-title mt-1 mb-0"><?php echo $lang["patronato_titulo_precio_matricula"];?></h4>
                                            <p class="t-justify mb-0"><span style="color:red;"><strong>- <?php echo $lang["patronato_punto1_precio_matricula"];?></strong></span></p>
                                            <p class="t-justify mt-0 mb-0"><span style="color:red;"><strong>- <?php echo $lang["patronato_punto2_precio_matricula"];?></strong></span></p>
                                            <p class="t-justify mt-0 mb-0"><span style="color:red;"><strong>- <?php echo $lang["patronato_punto3_precio_matricula"];?></strong></span></p>
                                        </div>

                                        <div class="col-12 col-md-4 col-lg-4 col-xl-4">
                                            <h4 class="section-title mt-1 mb-0"><?php echo $lang["patronato_titulo_trimestres"];?></h4>  
                                            <p class="t-justify mt-0 mb-0">- <?php echo $lang["patronato_punto1_trimestres"];?></p>
                                            <p class="t-justify mt-0 mb-0">- <?php echo $lang["patronato_punto2_trimestres"];?></p>
                                            <p class="t-justify mt-0 mb-0">- <?php echo $lang["patronato_punto4_trimestres"];?></p>
                                            <p class="t-justify mt-0 mb-0">- <?php echo $lang["patronato_punto3_trimestres"];?></p>

                                        </div>

                                        <div class="col-12 col-md-4 col-lg-4 col-xl-4">
                                            <h4 class="section-title mt-1 mb-0"><?php echo $lang["patronato_titulo_plazos"];?></h4>
                                            <p class="t-justify mb-0">- <?php echo $lang["patronato_punto1_plazos"];?> </p>
                                            <p class="t-justify mt-0 mb-0">- <?php echo $lang["patronato_punto2_plazos"];?> </p>
                                            <p class="t-justify mt-0 mb-0">- <?php echo $lang["patronato_punto3_plazos"];?></p>
                                        </div>
                                </div>

                                

                                <!-- Información de texto, soporte técnico, formulario datos del banco -->
                                <div class="col-12">
                                    <hr>
                                    <p class="t-justify">
                                       <?php echo $lang["ins_cantera_info_baja"];?>
                                    </p>

                                    <p class="t-justify">
                                       <strong> <?php echo $lang["ins_cantera_info2"];?> </strong>
                                    </p>

                                    <label class="containerchekbox">
                                        <input type="checkbox" name="autorizo-pago-extra" value="si" required class="input-control-dni" disabled checked>
                                        <p><?php echo $lang["ins_cantera_pagos_aviso"];?></p>
                                        <span class="checkmark"></span>   
                                    </label>

                                    <h4><?php echo $lang["domiciliacion_texto_aviso"];?></h4>

                                    <div class="row">
                                        <div class="col-12 col-md-3 col-lg-3 col-xl-3">
                                            <div class="contact-info-wrap mt-1 mb-1 t-center">	
                                                <h3 class="section-title mt-0 mb-0 t-center">
                                                    <span class="orange-text"><?php echo $lang["soporte_tecnico_titulo"];?></span>
                                                </h3>
                                                <p class="t-center">
                                                    <strong><?php echo $lang["soporte_tecnico_texto"];?></strong>
                                                </p>
                                                <a href="https://api.whatsapp.com/send?phone=34687717491" target="_blank" style="color: black; font-size: 1.3em;">
                                                    <img src="img/wassap3.png" style="max-width: 50px;" alt="Contacta por WhatsApp"><strong> WhatsApp 687717491</strong>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-9 col-lg-9 col-xl-9">
                                            <h4 class="section-title t-center mt-1 mb-1"><?php echo $lang["domiciliacion_titulo"];?></h4>

                                            <div class="row">
                                                <div class="form-group col-12 col-md-6 col-lg-6 col-xl-6">
                                                    <label><?php echo $lang["domiciliacion_titular"];?>
                                                        <input type="text" class="form-control input-control-dni" maxlength="100" id="titular-form-escuela" required>
                                                    </label>
                                                </div>

                                                <div class="form-group col-12 col-md-6 col-lg-6 col-xl-6">
                                                    <label>DNI:
                                                        <input type="text" class="form-control input-control-dni" id="dnititular-form-escuela" maxlength="50" required>
                                                    </label>
                                                </div>                                                  

                                                <div class="form-group col-12 col-md-2 col-lg-2 col-xl-2">
                                                    <label for="iban-input">IBAN</label>
                                                    <input id="iban-input" type="text" class="form-control input-control-dni" value="ES" name="iban" minlength="4" maxlength="4" required>
                                                </div>

                                                <div class="form-group col-12 col-md-2 col-lg-2 col-xl-2">
                                                    <label for="entidad-input"><?php echo $lang["domiciliacion_entidad"];?></label>
                                                    <input id="entidad-input" type="number" class="form-control input-control-dni" value="" minlength="4" name="entidad" onkeydown="limit4(this);" onkeyup="limit4(this);" required>
                                                </div>

                                                <div class="form-group col-12 col-md-2 col-lg-2 col-xl-2">
                                                    <label for="oficina-input">Oficina</label>
                                                    <input id="oficina-input" type="number" class="form-control input-control-dni" value="" minlength="4" name="oficina" onkeydown="limit4(this);" onkeyup="limit4(this);" required>
                                                </div>

                                                <div class="form-group col-12 col-md-2 col-lg-2 col-xl-2">
                                                    <label for="dc-input">DC</label>
                                                    <input id="dc-input" type="number" class="form-control input-control-dni" value="" minlength="2" name="dc" onkeydown="limit2(this);" onkeyup="limit2(this);" required>
                                                </div>

                                                <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4">
                                                    <label for="cuenta"><?php echo $lang["domiciliacion_cuenta"];?></label>
                                                    <input type="number" class="form-control input-control-dni" id="cuenta" minlength="10" name="cuenta" onkeydown="limit10(this);" onkeyup="limit10(this);" minlength="10" required>

                                                </div>

                                                <div class="col-12">
                                                    <p class="t-left mt-0">
                                                        <strong><?php echo $lang["domiciliacion_texto_domiciliacion"];?></strong>
                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row renovacion-row">
                                        <div class="form-group col-12 mb-1">

                                            <div class="col-12 col-lg-12 col-xl-12">
                                                <hr style="color:black;border:1px solid #ccc;">
                                            </div>
                                            <div class="col-12">
                                                <h4 class="mt-0 mb-1"><strong><?php echo $lang["condiciones_legales_2020_titulo"];?></strong></h4>
                                            </div>

                                            <div class="col-12">
                                                <label class="containerchekbox">
                                                    <input type="checkbox" name="autorizo" value="si" required class="input-control-dni" >
                                                    <p><?php echo $lang["condiciones_legales_2020_1"];?></p>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                            <div class="col-12">
                                                <label class="containerchekbox">
                                                    <input type="checkbox" name="autorizo-pago" value="si" required class="input-control-dni" >
                                                    <p><?php echo $lang["condiciones_legales_2020_2"];?></p>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                            <div class="col-12">
                                                <label class="containerchekbox">
                                                    <input type="checkbox" name="autorizo-img" value="si" required class="input-control-dni" >
                                                    <p><?php echo $lang["condiciones_legales_2020_3"];?></p>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                            <div class="col-12">
                                                <label class="containerchekbox">
                                                    <input type="checkbox" name="autorizo-salud" value="si" required class="input-control-dni" >
                                                    <p><?php echo $lang["condiciones_legales_2020_4"];?></p>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                            <div class="col-12 col-lg-12 col-xl-12">
                                                <hr style="color:black;border:1px solid #ccc;">
                                            </div>

                                            

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- COMPONENTES DE FIRMAS  -->
                            <div class="row renovacion-row">
                                <div class="col-12">
                                    <h4 class="mt-0 mb-1"><strong><?php echo $lang["ins_form_firmas_titulo"];?></strong></h4>
                                </div>

                                <div class="col-12 mb-2">
                                    <div class="alert alert-info redimension" role="alert">
                                        <h4 class="mt-0 mb-0"><i class="fa fa-info-circle" aria-hidden="true"></i> <?php echo $lang["ins_form_info_firma"];?></h4>
                                    </div>
                                </div>
                                
                                <div class="form-group col-12 col-lg-6 col-xl-6 t-center">
                                    <label><?php echo $lang["ins_form_firma_solic"];?>
                                        <canvas id="pizarra"></canvas>
                                    </label>
                                    <input id="img_firma_jugador" type="hidden" name="img_firma_jugador">
                                    <button type="button" id="limpiar" class="w-100" 
                                        style="max-width:500px !important;height:3em;"><?php echo $lang["ins_form_firma_limpiar"];?>          
                                    </button>
                                </div>

                                <div class="form-group col-12 col-lg-6 col-xl-6 t-center">
                                    <label><?php echo $lang["ins_form_firma_tutor"];?>
                                        <canvas id="pizarra1"></canvas>
                                    </label>
                                    <input id="img_firma_tutor" type="hidden" name="img_firma_tutor">
                                    <button type="button" class="w-100" id="limpiar1" 
                                    style="max-width:500px !important;height:3em;"><?php echo $lang["ins_form_firma_limpiar1"];?></button>
                                </div>

                                <!-- Botón guardar firmas -->
                                <div class="form-group col-12 t-left mb-2">
                                    <button type="button" class="btn ml-0" id="generar_Firma" 
                                    style="height:50px;width: 100%;-webkit-transform: skew(0deg);
                                    -ms-transform: skew(0deg);transform:skew(0deg);-webkit-border-radius: 0px;
                                    border-radius: 0px;background-color:#eb7c00;"><?php echo $lang["ins_form_firma_guardar"];?>

                                    </button>
                                </div>

                                <!-- ALERT NO OLVIDA PULSAR VALIDAR FIRMAS -->
                                <div id="revisar-firma-container" class="col-12 mt-1 hidden">
                                    <div class="alert alert-danger" role="alert">
                                        <h4><i class="fa fa-info-circle" aria-hidden="true"></i> <?php echo $lang["ins_form_firma_validar"];?></h4>
                                    </div>
                                </div>
                            </div>

                            <!-- Paso 7: Método de pago Y ENVIO -->
                            <div id="submit-container" class="row renovacion-row" style="display:none;">
                                <div class="form-group col-12 col-md-12 col-lg-12 col-xl-12">    
                                    <label><?php echo $lang["ins_patronato_metodo_pago_0"];?>
                                        <select class="form-control campos-required" id="metodo-pago-form" onChange="mostrarrecibo(this.value);" required>
                                            <option value=""><?php echo $lang["ins_controller_seleccionar"];?></option>     
                                            <option value="tarjeta"><?php echo $lang["ins_patronato_metodo_pago_2"];?></option>
                                            <option value="transferencia"><?php echo $lang["ins_patronato_metodo_pago_4"];?></option>
                                            <option value="recepcion"><?php echo $lang["ins_patronato_metodo_pago_1"];?></option>
                                            <option value="senior"><?php echo $lang["ins_patronato_metodo_pago_5"];?></option>
                                        </select>
                                    </label>                                          
                                </div>

                                <!-- adjuntar el recibo de pago por transferencia -->
                                <div id="submit-container-recibo" class="form-group col-12 col-md-12 col-lg-12 col-xl-12" style="display:none;" >    
                                    <label><?php echo $lang["ins_escuela_metodo_info_pago_transferencia"];?> </label> 
                                    <label> 
                                        <h4><strong><?php echo $lang["ins_escuela_adjuntar_recibo"];?> </strong></h4>  
                                        <input type="file" name="archivo_recibo" id="archivo_recibo" style="border: none !important;"
                                            accept="image/png, image/jpeg, application/pdf" required>
                                    </label>                                       
                                </div>

                                <!-- boton enviar -->
                                <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                                    <input type="hidden" value="" name="id_jugador" id="idjugador-form-escuela"> 
                                    <input type="hidden" value="" name="id_equipo"  id="idequipo-form-escuela"> 
                                    <input type="hidden" value="" name="seccion"    id="seccion-form-escuela"> 

                                     <button type="submit" id="submit-formulario-inscripcion-escuela" class="btn input-control-dni" disabled 
                                            style="width:100%;margin-left:0;">
                                        <span><?php echo $lang["ins_escuela_metodo_pago_3"];?></span>
                                    </button>
                                </div>
                            </div>

                            <!-- Mensaje de espera -->
                            <div id="inscripciones-escuela-form-espera" class="row renovacion-row" style="display:none;">
                                <div class="col-12 alert alert-info"><h4><?php echo $lang["ins_controller_inscripcion_cantera_espera"];?></h4></div>
                            </div>

                            <div id="inscripciones-escuela-form-respuesta" class="row renovacion-row" style="display:none;"></div>


                        </form>
                    </div>
                </div>
            </section>

            <?php require("includes/footer.php"); ?>
            <?php require("includes/cookies.php"); ?>
        </div>
            
        <!-- Load Scripts Start -->
        <script src="js/libs.js"></script>
        <script src="js/common.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js" type="text/javascript"></script> 
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/additional-methods.min.js" type="text/javascript"></script> 
        
        
<!--        <script src="js/jquery.validate.min.js"></script>-->
        <!-- <script src="js/canvas-to-blob.min.js"></script> -->

        <script type="text/javascript">
            
            /*CANVAS FIRMA SOLICITANTE*/ 
            //======================================================================
            // VARIABLES
            //======================================================================
            let miCanvas    = document.querySelector('#pizarra');
            let lineas      = [];
            let correccionX = 0;
            let correccionY = 0;
            let pintarLinea = false;

            let posicion = miCanvas.getBoundingClientRect();
            correccionX = posicion.x;
            correccionY = posicion.y;

            miCanvas.width = 500;
            miCanvas.height = 250;

            //500x215

            //======================================================================
            // FUNCIONES
            //======================================================================
            // Funcion que empieza a dibujar la linea
            function empezarDibujo () {
                pintarLinea = true;
                lineas.push([]);
            };

            /**
             * Funcion dibuja la linea
             */
            function dibujarLinea (event) {
                event.preventDefault();
                if (pintarLinea) {
                    let ctx = miCanvas.getContext('2d');
                    // Estilos de linea
                    ctx.lineJoin = ctx.lineCap = 'round';
                    ctx.lineWidth = 2;
                    // Color de la linea
                    ctx.strokeStyle = '#000000';
                    // Marca el nuevo punto
                    let nuevaPosicionX = 0;
                    let nuevaPosicionY = 0;
                    if (event.changedTouches == undefined) {
                        // Versión ratón
                        nuevaPosicionX = event.layerX;
                        nuevaPosicionY = event.layerY;
                    } else {
                        // Versión touch, pantalla tactil
                        nuevaPosicionX = event.changedTouches[0].pageX - correccionX;
                        nuevaPosicionY = event.changedTouches[0].pageY - correccionY;
                    }
                    // Guarda la linea
                    lineas[lineas.length - 1].push({
                        x: nuevaPosicionX,
                        y: nuevaPosicionY
                    });
                    // Redibuja todas las lineas guardadas
                    ctx.beginPath();
                    lineas.forEach(function (segmento) {
                        ctx.moveTo(segmento[0].x, segmento[0].y);
                        segmento.forEach(function (punto, index) {
                            ctx.lineTo(punto.x, punto.y);
                        });
                    });
                    ctx.stroke();
                }
            }

            /**
             * Funcion que deja de dibujar la linea
             */
            function pararDibujar () {
                pintarLinea = false;
            }

            //======================================================================
            // EVENTOS
            //======================================================================

            // Eventos raton
            miCanvas.addEventListener('mousedown', empezarDibujo, false);
            miCanvas.addEventListener('mousemove', dibujarLinea, false);
            miCanvas.addEventListener('mouseup', pararDibujar, false);

            // Eventos pantallas táctiles
            miCanvas.addEventListener('touchstart', empezarDibujo, false);
            miCanvas.addEventListener('touchmove', dibujarLinea, false);

            $( "#limpiar" ).on( "click", function() {
                let ctx = miCanvas.getContext('2d');
                ctx.clearRect(0, 0, miCanvas.width, miCanvas.height);
                lineas.length = 0;
                $( "#img_firma_jugador").val("");
            });
           
            /*CANVAS FIRMA TUTOR*/
            //======================================================================
            // VARIABLES
            //======================================================================
            let miCanvas1 = document.querySelector('#pizarra1');
            let lineas1 = [];
            let correccionX1 = 0;
            let correccionY1 = 0;
            let pintarLinea1 = false;

            let posicion1 = miCanvas1.getBoundingClientRect();
            correccionX1 = posicion1.x;
            correccionY1 = posicion1.y;

            miCanvas1.width = 500;
            miCanvas1.height = 250;

            //======================================================================
            // FUNCIONES
            //======================================================================

            /**
             * Funcion que empieza a dibujar la linea
             */
            function empezarDibujo1 () {
                pintarLinea1 = true;
                lineas1.push([]);
            };

            /**
             * Funcion dibuja la linea
             */
            function dibujarLinea1 (event) {
                event.preventDefault();
                if (pintarLinea1) {
                    let ctx1 = miCanvas1.getContext('2d');
                    // Estilos de linea
                    ctx1.lineJoin = ctx1.lineCap = 'round';
                    ctx1.lineWidth = 2;
                    // Color de la linea
                    ctx1.strokeStyle = '#000000';
                    // Marca el nuevo punto
                    let nuevaPosicionX1 = 0;
                    let nuevaPosicionY1 = 0;
                    if (event.changedTouches == undefined) {
                        // Versión ratón
                        nuevaPosicionX1 = event.layerX;
                        nuevaPosicionY1 = event.layerY;
                    } else {
                        // Versión touch, pantalla tactil
                        nuevaPosicionX1 = event.changedTouches[0].pageX - correccionX1;
                        nuevaPosicionY1 = event.changedTouches[0].pageY - correccionY1;
                    }
                    // Guarda la linea
                    lineas1[lineas1.length - 1].push({
                        x: nuevaPosicionX1,
                        y: nuevaPosicionY1
                    });
                    // Redibuja todas las lineas guardadas
                    ctx1.beginPath();
                    lineas1.forEach(function (segmento) {
                        ctx1.moveTo(segmento[0].x, segmento[0].y);
                        segmento.forEach(function (punto, index) {
                            ctx1.lineTo(punto.x, punto.y);
                        });
                    });
                    ctx1.stroke();
                }
            }

            /**
             * Funcion que deja de dibujar la linea
             */
            function pararDibujar1 () {
                pintarLinea1 = false;
            }

            //======================================================================
            // EVENTOS
            //======================================================================

            // Eventos raton
            miCanvas1.addEventListener('mousedown', empezarDibujo1, false);
            miCanvas1.addEventListener('mousemove', dibujarLinea1, false);
            miCanvas1.addEventListener('mouseup', pararDibujar1, false);

            // Eventos pantallas táctiles
            miCanvas1.addEventListener('touchstart', empezarDibujo1, false);
            miCanvas1.addEventListener('touchmove', dibujarLinea1, false);

            $( "#limpiar1" ).on( "click", function() {
                let ctx1 = miCanvas1.getContext('2d');
                ctx1.clearRect(0, 0, miCanvas1.width, miCanvas1.height);
                lineas1.length = 0;
                $( "#img_firma_tutor").val("");
            });

            // returns true if all color channels in each pixel are 0 (or "blank")
            function isCanvasBlank(canvas) {
                return !canvas.getContext('2d')
                    .getImageData(0, 0, canvas.width, canvas.height).data
                    .some(channel => channel !== 0);
            }
            
            /* PARTE 1. ELEGIR TIPO INSCRIPCIÓN: RENOVACIÓN O NUEVA*/
            $("input[name=tipoinscripcion]").change(function()
            {	
                if($(this).val()==="nueva")
                {   
                    $("#tipo-inscripcion-renovacion").removeClass("tipoinscripcionseleccionada");  
                    $("#tipo-inscripcion-nueva").addClass("tipoinscripcionseleccionada");  
                    $("#inscripciones-escuela-mensaje-nueva-inscripcion").show("250");  
                    $(".renovacion-row").hide("250");
                }
                else
                {
                    $("#tipo-inscripcion-renovacion").addClass("tipoinscripcionseleccionada");  
                    $("#tipo-inscripcion-nueva").removeClass("tipoinscripcionseleccionada");  
                    $("#inscripciones-escuela-mensaje-nueva-inscripcion").hide("250");  
                    $(".renovacion-row").show("250");
                    if($("#paso-2-dni-jugador-respuesta").is(":visible"))
                    {
                        $("#paso-2-dni-tutor-container").show("250");
                    }
                }
			});
            
            /*  PASO 2 - PLAN A: BUSCAMOS JUGADOR A PARTIR DEL DNI JUGADOR. */
            $("#buscar-jugador-dni-jugador").on( "click", function()
            {

                if( 
                    (
                        $("#dni-jugador").val().trim() !== ""                &&  ((parseInt($("#dni-jugador").val().length)) > 7)               && 
                        $("#codigo-verificacion").val().trim() !== ""        &&  ((parseInt($("#codigo-verificacion").val().length)) > 5)   
                    )
                    ||
                    (
                        $("#validacion-dni-padremadre").val().trim() !== ""  &&  ((parseInt($("#validacion-dni-padremadre").val().length)) > 7)  && 
                        $("#codigo-verificacion").val().trim() !== ""        &&  ((parseInt($("#codigo-verificacion").val().length)) > 5)   
                    )
                )
                
                {
                    var form_data = {
                        debug:                  "false",
                        jugadores_dni_jugador:  $("#dni-jugador").val().trim(),
                        codigo_verificacion:    $("#codigo-verificacion").val().trim(),
                        jugadores_dni_tutor:    "-",
                        formulario:             "patronato"
                    };
                    
                    $.ajax({
                        type:       "POST",
                        url:        "?r=jugadores/CargarVerificado",
                        data:       form_data,
                        dataType:   "json",
                        success:    function (data) 
                        {
                            if(data.response==="success")
                            {
                                $(".renovacion-row").show("250");
                                $("#inscripciones-escuela-form-espera").hide();
                                $("#paso-2-dni-tutor-container").hide();
                                $("#paso-2-dni-jugador-respuesta").html("");
                                $("#paso-2-dni-jugador-respuesta").hide();
                                $("#submit-container").hide();
                    
                                /****************************
                                *   PLAN A: PASO 3. DATOS JUGADOR    
                                *****************************/
                                $("#idjugador-form-escuela").val( data.instancia.id_jugador);
                                //  FILA 1
                                if( data.instancia["tipo_documento"] !== "" )     {   $("#tipodocjugador-form-escuela").val(data.instancia.tipo_documento);     }
                                if( data.instancia["dni_jugador"] !== "" )        {   $("#dni-jugador-form-escuela").val(data.instancia.dni_jugador);           }
                                if( data.instancia["fecha_cad_dni"] !== "" )      {   $("#fechacad-jugador-form-escuela").val(data.instancia.fecha_cad_dni);    }
                                if( data.instancia["nacionalidad"] !== "" )       {   $("#nacionalidad-form-escuela").val(data.instancia.nacionalidad);         }  

                                //  FILA 2
                                if( data.instancia.fecha_nacimiento !== "" )   {   $("#fechanac-form-escuela").val(data.instancia.fecha_nacimiento);   }
                                $("#nombre-form-escuela").val( data.instancia.nombre);
                                var valor_nombre_form_escuela = $('#nombre-form-escuela').val().toUpperCase();
                                $('#nombre-form-escuela').val(valor_nombre_form_escuela);
                                $("#apellidos-form-escuela").val( data.instancia.apellidos);
                                var valor_apellidos_form_escuela = $('#apellidos-form-escuela').val().toUpperCase();
                                $('#apellidos-form-escuela').val(valor_apellidos_form_escuela);

                                //  FILA 3 
                                $("#direccion-form-escuela").val( data.instancia.direccion );
                                var valor_direccion_form_escuela = $('#direccion-form-escuela').val().toUpperCase();
                                $('#direccion-form-escuela').val(valor_direccion_form_escuela);
                                $("#numero-form-escuela").val( data.instancia.numero );
                                $("#piso-form-escuela").val( data.instancia.piso );
                                $("#puerta-form-escuela").val( data.instancia.puerta );

                                //  FILA 4
                                $("#cp-form-escuela").val( data.instancia.codigo_postal );
                                $("#poblacion-form-escuela").val( data.instancia.poblacion );
                                var valor_poblacion_form_escuela = $('#poblacion-form-escuela').val().toUpperCase();
                                $('#poblacion-form-escuela').val(valor_poblacion_form_escuela);
                                $("#provincia-form-escuela").val( data.instancia.provincia );
                                var valor_provincia_form_escuela = $('#provincia-form-escuela').val().toUpperCase();
                                $('#provincia-form-escuela').val(valor_provincia_form_escuela);

                                //  FILA 5
                                if( data.instancia.sexo !== "" )               {   $("#sexojugador-form-escuela").val(data.instancia.sexo);            }
                                if( data.instancia.pais_nacimiento !== "" )    {   $("#paisnac-form-escuela").val(data.instancia.pais_nacimiento);     }
                                if( data.instancia.talla_camiseta !== "" )     {   $("#talla-form-escuela").val(data.instancia.talla_camiseta);        }
                                if( data.instancia.en_el_club !== "" )         {   $("#anyosclub-form-escuela").val(data.instancia.en_el_club);        }

                                //  FILA 6
                                if( data.instancia.alergias !=="" ){
                                    $("#alergias-form-escuela").val(data.instancia.alergias);
                                    var valor_alergias_form = $('#alergias-form-escuela').val().toUpperCase();
                                    $('#alergias-form-escuela').val(valor_alergias_form);
                                }
                                if( data.instancia.email !== "" )
                                {
                                    $("#email-form-escuela").val( data.instancia.email );
                                    var valor_email_form = $('#email-form-escuela').val().toUpperCase();
                                    $('#email-form-escuela').val(valor_email_form);
                                }
                                $("#modalidad-form-escuela").val( data.instancia.nombre_equipo_nueva_temporada );


                                 //  FILA 7
                                if( data.instancia.telefono_jugador !== "" )    {   $("#tlfjugador-form-escuela").val(data.instancia.telefono_jugador); }
                                if( data.instancia.colegio !== "" )             {   $("#colegio-form-escuela").val(data.instancia.colegio);             }
                                if( data.instancia.curso !== "" )               {   $("#curso-form-escuela").val(data.instancia.curso);                 }

                                /****************************
                                *   PLAN A: PASO 4. DATOS FAMILIA    
                                *****************************/  
                                if( data.instancia.num_hermanos !== "" )    
                                {
                                    $("#numhermanos-form-escuela").val(data.instancia.num_hermanos);   
                                    
                                    if(parseInt($("#numhermanos-form-escuela").val())>0)
                                    {
                                        $("#edades-hermanos-container-completo").show();
                                        var array_id    =   data.instancia.edades.split("-");
                                        var i;
                                        for(i = 0; i < parseInt($("#numhermanos-form-escuela").val()); i++)
                                        {   $("#edades-hermanos-container").append('<div class="col-2"><div class="form-group mt-0">\n\
                                                <input type="number" min="0" step="1" class="form-control edad-hermano" name="edades" required value="'+array_id[i]+'"></div></div>');   
                                        }
                                    }
                                }
                                if( data.instancia.monoparental === "1" )
                                {   $("#familia-form-escuela").val("1");}
                                else
                                {   
                                    $("#familia-form-escuela").val("0");
                                    //$("#monoparental-container").hide();
                                    //$('[name="tipofamiliamonoparental"][value="madre"]').prop("checked", false);
                                    //$('[name="tipofamiliamonoparental"][value="padre"]').prop("checked", false);
                                }
                                if( data.instancia.monoparental === "1" && data.instancia.nombre_madre!=="")
                                {   
                                    //$("#datospadre").hide("250");   
                                    //$("#monoparental-container").show();   
                                    //$('[name="tipofamiliamonoparental"][value="madre"]').prop("checked", true);
                                    $("#tipo-familia-monoparental-madre-padre").val("madre");
                                }
                                else if( data.instancia.monoparental === "1" && data.instancia.nombre_padre!=="")
                                {   
                                    //$("#datosmadre").hide("250");   
                                    //$("#monoparental-container").show();   
                                    //$('[name="tipofamiliamonoparental"][value="padre"]').prop("checked", true);}
                                    $("#tipo-familia-monoparental-madre-padre").val("padre");
                                }
                                else
                                {   //$("#monoparental-container").hide();
                                }
                                
                                //if( data.instancia.monoparental !== "" )    {   $("#familia-form-escuela").val(data.instancia.monoparental);        }

                                //  Datos de la madre
                                $("#nombremadre-form-escuela").val( data.instancia.nombre_madre );
                                var valor_NombreMadre_form_escuela          = $('#nombremadre-form-escuela').val().toUpperCase();
                                $('#nombremadre-form-escuela').val(valor_NombreMadre_form_escuela);
                                if( data.instancia.apellidos_madre !== "" ) {   $("#apellidosmadre-form-escuela").val( data.instancia.apellidos_madre );      }
                                if( data.instancia.email_madre !== "" )     {   $("#emailmadre-form-escuela").val( data.instancia.email_madre );      }
                                if( data.instancia.telefono_madre !== "" )  {   $("#tlfmadre-form-escuela").val( data.instancia.telefono_madre );       }
                                if( data.instancia.dni_madre !== "" )       {   $("#dnimadre-form-escuela").val( data.instancia.dni_madre );            }
                                if( data.instancia.estudios_madre !== "" )  {   $("#estudiosmadre-form-escuela").val( data.instancia.estudios_madre );  }

                                //  Datos del padre
                                $("#nombrepadre-form-escuela").val( data.instancia.nombre_padre );
                                var valor_NombrePadre_form_escuela =         $('#nombrepadre-form-escuela').val().toUpperCase();
                                $('#nombrepadre-form-escuela').val(valor_NombrePadre_form_escuela);
                                if( data.instancia.apellidos_padre !== "" ) {   $("#apellidospadre-form-escuela").val( data.instancia.apellidos_padre );      }
                                if( data.instancia.email_padre !== "" )     {   $("#emailpadre-form-escuela").val( data.instancia.email_padre );    }
                                if( data.instancia.telefono_padre !== "" )  {   $("#tlfpadre-form-escuela").val( data.instancia.telefono_padre );   }
                                if( data.instancia.dni_padre !== "" )       {   $("#dnipadre-form-escuela").val( data.instancia.dni_padre );        }
                                if( data.instancia.estudios_padre !== "" )  {   $("#estudiospadre-form-escuela").val( data.instancia.estudios_padre );  }


                                /*******************************
                                *   PLAN A: PASO 5. FOTOS, DOCUMENTOS
                                ********************************/  


                                /*******************************
                                *   PLAN A: PASO 6. DATOS BANCO
                                ********************************/  
                                $("#titular-form-escuela").val( data.instancia.titular_banco );
                                var valor_titular_form_escuela = $('#titular-form-escuela').val().toUpperCase();
                                $('#titular-form-escuela').val(valor_titular_form_escuela);
                                $("#dnititular-form-escuela").val( data.instancia.dni_titular );
                                if(data.instancia.iban!=="")    {   $("#iban-input").val( data.instancia.iban );    }
                                if(data.instancia.entidad!=="") {   $("#entidad-input").val( data.instancia.entidad );  }
                                if(data.instancia.oficina!=="") {   $("#oficina-input").val( data.instancia.oficina );  }
                                if(data.instancia.dc!=="")      {   $("#dc-input").val( data.instancia.dc );    }
                                if(data.instancia.cuenta!=="")  {   $("#cuenta").val( data.instancia.cuenta );  }
                               
                                
                                /*******************************
                                *   PLAN A: HORARIOS
                                ********************************/  
                                var i;
                                for (i = 0; i < data.horarios.length; i++)
                                {
                                    if(data.horarios[i]["dia"]==="Lunes")
                                    {   $("#lunes-form-escuela").text( data.horarios[i]["hora_ini"].substr(0, 5));    }
                                    else if(data.horarios[i]["dia"]==="Martes")
                                    {   $("#martes-form-escuela").text( data.horarios[i]["hora_ini"].substr(0, 5));    }
                                    else if(data.horarios[i]["dia"]==="Miercoles")
                                    {   $("#miercoles-form-escuela").text( data.horarios[i]["hora_ini"].substr(0, 5));    }
                                    else if(data.horarios[i]["dia"]==="Jueves")
                                    {   $("#jueves-form-escuela").text( data.horarios[i]["hora_ini"].substr(0, 5));    }
                                    else if(data.horarios[i]["dia"]==="Viernes")
                                    {   $("#viernes-form-escuela").text( data.horarios[i]["hora_ini"].substr(0, 5));    }
                                }    
                                
                                
                                
                                permitirEdicionCamposJugador();
                            }
                            else
                            {   
                                $(".renovacion-row").hide();
                                $("#inscripciones-escuela-form-espera").hide();
                                $("#paso-2-dni-jugador-container").show();
                                $("#paso-2-dni-jugador-respuesta").show();
                                $("#paso-2-dni-jugador-respuesta").html("<div class='alert alert-danger col-12'><h4>"+data.message+"</h4></div>"); 
                               
                                if(data.mostrar_dni_tutor==="si")
                                {   $("#paso-2-dni-tutor-container").show();    }
                            }
                        }
                    });
                }
                else{
                    $("#paso-2-dni-jugador-error-dni").show();
                }
            });
            
           
            
            /*  PASO 2 - PLAN B: SELECCIONAMOS JUGADOR*/
            $('body').on('change','#validacion-dni-select',function()
            {
                if($("#validacion-dni-select").val()!=="")
                {   
                    var form_data = {debug:"true",jugadores_id: $("#validacion-dni-select").val(),formulario:"ESCUELA"};

                    $.ajax({
                        type:       "POST",
                        url:        "?r=jugadores/CargarPorID",
                        data:       form_data,
                        dataType:   "json",
                        success:    function (data) 
                        {    
                            if(data.response==="success")
                            {
                                $("#dni-jugador-form-escuela").prop("disabled", false);
                                $(".renovacion-row").show("250");
                                $("#inscripciones-escuela-form-espera").hide();
                                $("#paso-2-dni-jugador-respuesta").html("");
                                $("#paso-2-dni-jugador-respuesta").hide();
                                $("#submit-container").hide();
                                
                                /****************************
                                *   PLAN B: PASO 3. DATOS JUGADOR    
                                *****************************/
                                $("#idjugador-form-escuela").val( data.instancia.id_jugador);
                                //  FILA 1
                                if( data.instancia["tipo_documento"] !== "" )     {   $("#tipodocjugador-form-escuela").val(data.instancia.tipo_documento);       }
                                if( data.instancia["dni_jugador"] !== "" )        {   $("#dni-jugador-form-escuela").val(data.instancia.dni_jugador);         }
                                if( data.instancia["fecha_cad_dni"] !== "" )      {   $("#fechacad-jugador-form-escuela").val(data.instancia.fecha_cad_dni);  }
                                if( data.instancia["nacionalidad"] !== "" )       {   $("#nacionalidad-form-escuela").val(data.instancia.nacionalidad);       }  

                                //  FILA 2
                                if( data.instancia.fecha_nacimiento !== "" )        {   $("#fechanac-form-escuela").val(data.instancia.fecha_nacimiento);   }
                                $("#nombre-form-escuela").val( data.instancia.nombre);
                                var valor_nombre_form_escuela = $('#nombre-form-escuela').val().toUpperCase();
                                $('#nombre-form-escuela').val(valor_nombre_form_escuela);
                                $("#apellidos-form-escuela").val( data.instancia.apellidos);
                                var valor_apellidos_form_escuela = $('#apellidos-form-escuela').val().toUpperCase();
                                $('#apellidos-form-escuela').val(valor_apellidos_form_escuela);

                                //  FILA 3 
                                $("#direccion-form-escuela").val( data.instancia.direccion );
                                var valor_direccion_form_escuela = $('#direccion-form-escuela').val().toUpperCase();
                                $('#direccion-form-escuela').val(valor_direccion_form_escuela);
                                $("#numero-form-escuela").val( data.instancia.numero );
                                $("#piso-form-escuela").val( data.instancia.piso );
                                $("#puerta-form-escuela").val( data.instancia.puerta );

                                //  FILA 4
                                $("#cp-form-escuela").val( data.instancia.codigo_postal );
                                $("#poblacion-form-escuela").val( data.instancia.poblacion );
                                var valor_poblacion_form_escuela = $('#poblacion-form-escuela').val().toUpperCase();
                                $('#poblacion-form-escuela').val(valor_poblacion_form_escuela);
                                $("#provincia-form-escuela").val( data.instancia.provincia );
                                var valor_provincia_form_escuela = $('#provincia-form-escuela').val().toUpperCase();
                                $('#provincia-form-escuela').val(valor_provincia_form_escuela);

                                //  FILA 5
                                if( data.instancia.sexo !== "" )               {   $("#sexojugador-form-escuela").val(data.instancia.sexo);            }
                                if( data.instancia.pais_nacimiento !== "" )    {   $("#paisnac-form-escuela").val(data.instancia.pais_nacimiento);     }
                                if( data.instancia.talla_camiseta !== "" )     {   $("#talla-form-escuela").val(data.instancia.talla_camiseta);        }
                                if( data.instancia.en_el_club !== "" )         {   $("#anyosclub-form-escuela").val(data.instancia.en_el_club);        }

                                //  FILA 6
                                if( data.instancia.alergias !=="" ){
                                    $("#alergias-form-escuela").val(data.instancia.alergias);
                                    var valor_alergias_form = $('#alergias-form-escuela').val().toUpperCase();
                                    $('#alergias-form-escuela').val(valor_alergias_form);
                                }
                                if( data.instancia.email !== "" )
                                {
                                    $("#email-form-escuela").val( data.instancia.email );
                                    var valor_email_form = $('#email-form-escuela').val().toUpperCase();
                                    $('#email-form-escuela').val(valor_email_form);
                                }
                                $("#modalidad-form-escuela").val( data.instancia.nombre_equipo_nueva_temporada );


                                //  FILA 7
                                if( data.instancia.telefono_jugador !== "" )    {   $("#tlfjugador-form-escuela").val(data.instancia.telefono_jugador); }
                                if( data.instancia.colegio !== "" )             {   $("#colegio-form-escuela").val(data.instancia.colegio);             }
                                if( data.instancia.curso !== "" )               {   $("#curso-form-escuela").val(data.instancia.curso);                 }
                               
                                //  HORARIOS 
                                var i;
                                for (i = 0; i < data.horarios.length; i++)
                                {
                                    if(data.horarios[i]["dia"]==="Lunes")
                                    {   $("#lunes-form-escuela").text( data.horarios[i]["hora_ini"].substr(0, 5));    }
                                    else if(data.horarios[i]["dia"]==="Martes")
                                    {   $("#martes-form-escuela").text( data.horarios[i]["hora_ini"].substr(0, 5));    }
                                    else if(data.horarios[i]["dia"]==="Miercoles")
                                    {   $("#miercoles-form-escuela").text( data.horarios[i]["hora_ini"].substr(0, 5));    }
                                    else if(data.horarios[i]["dia"]==="Jueves")
                                    {   $("#jueves-form-escuela").text( data.horarios[i]["hora_ini"].substr(0, 5));    }
                                    else if(data.horarios[i]["dia"]==="Viernes")
                                    {   $("#viernes-form-escuela").text( data.horarios[i]["hora_ini"].substr(0, 5));    }
                                }


                                /****************************
                                *   PLAN B: PASO 4. DATOS FAMILIA    
                                *****************************/  
                                if( data.instancia.num_hermanos !== "" )    
                                {
                                    $("#numhermanos-form-escuela").val(data.instancia.num_hermanos);   
                                    
                                    if(parseInt($("#numhermanos-form-escuela").val())>0)
                                    {
                                        $("#edades-hermanos-container-completo").show();
                                        var array_id    =   data.instancia.edades.split("-");
                                        var i;
                                        for(i = 0; i < parseInt($("#numhermanos-form-escuela").val()); i++)
                                        {   $("#edades-hermanos-container").append('<div class="col-2"><div class="form-group mt-0">\n\
                                                <input type="number" class="form-control edad-hermano" name="edades" required value="'+array_id[i]+'"></div></div>');   
                                        }
                                    }
                                }
                                if( data.instancia.monoparental === "1" )    
                                {   
                                    //$("#monoparental-container").show();  
                                    $("#familia-form-escuela").val("1");
                                    if($('#nombremadre-form-escuela').val()==="")
                                    {   
                                        $("#tipo-familia-monoparental-madre").val("madre");
                                        //$("input[name='tipofamiliamonoparental'][value='madre']").prop("checked", true);
                                        //$("#datosmadre").show("250");
                                        //$("#datospadre").hide("250");  
                                    }
                                    else
                                    {   
                                        $("#tipo-familia-monoparental-madre").val("padre");
                                        //$("input[name='tipofamiliamonoparental'][value='padre']").prop("checked", true);
                                        //$("#datosmadre").hide("250");
                                        //$("#datospadre").show("250");  
                                    }
                                }
                                else
                                {   $("#familia-form-escuela").val("0");  }

                                //  Datos de la madre
                                $("#nombremadre-form-escuela").val( data.instancia.nombre_madre );
                                var valor_NombreMadre_form_escuela          = $('#nombremadre-form-escuela').val().toUpperCase();
                                $('#nombremadre-form-escuela').val(valor_NombreMadre_form_escuela);
                                $("#apellidosmadre-form-escuela").val( data.instancia.apellidos_madre );
                                if( data.instancia.email_madre !== "" )     {   $("#emailmadre-form-escuela").val( data.instancia.email_madre );      }
                                if( data.instancia.telefono_madre !== "" )  {   $("#tlfmadre-form-escuela").val( data.instancia.telefono_madre );       }
                                if( data.instancia.dni_madre !== "" )       {   $("#dnimadre-form-escuela").val( data.instancia.dni_madre );            }
                                if( data.instancia.estudios_madre !== "" )  {   $("#estudiosmadre-form-escuela").val( data.instancia.estudios_madre );  }

                                //  Datos del padre
                                $("#nombrepadre-form-escuela").val( data.instancia.nombre_padre );
                                var valor_NombrePadre_form_escuela =         $('#nombrepadre-form-escuela').val().toUpperCase();
                                $('#nombrepadre-form-escuela').val(valor_NombrePadre_form_escuela);
                                $('#apellidospadre-form-escuela').val(data.instancia.apellidos_padre);
                                if( data.instancia.email_padre !== "" )     {   $("#emailpadre-form-escuela").val( data.instancia.email_padre );    }
                                if( data.instancia.telefono_padre !== "" )  {   $("#tlfpadre-form-escuela").val( data.instancia.telefono_padre );   }
                                if( data.instancia.dni_padre !== "" )       {   $("#dnipadre-form-escuela").val( data.instancia.dni_padre );        }
                                if( data.instancia.estudios_padre !== "" )  {   $("#estudiospadre-form-escuela").val( data.instancia.estudios_padre );  }


                                /*******************************
                                *   PLAN B: PASO 5. FOTOS, DOCUMENTOS
                                ********************************/  


                                /*******************************
                                *   PLAN B: PASO 6. DATOS BANCO
                                ********************************/  
                                $("#titular-form-escuela").val( data.instancia.titular_banco );
                                var valor_titular_form_escuela = $('#titular-form-escuela').val().toUpperCase();
                                $('#titular-form-escuela').val(valor_titular_form_escuela);
                                $("#dnititular-form-escuela").val( data.instancia.dni_titular );
                                if(data.instancia.iban!=="")    {   $("#iban-input").val( data.instancia.iban );    }
                                if(data.instancia.entidad!=="") {   $("#entidad-input").val( data.instancia.entidad );  }
                                if(data.instancia.oficina!=="") {   $("#oficina-input").val( data.instancia.oficina );  }
                                if(data.instancia.dc!=="")      {   $("#dc-input").val( data.instancia.dc );    }
                                if(data.instancia.cuenta!=="")  {   $("#cuenta").val( data.instancia.cuenta );  }
                                
                                
                                permitirEdicionCamposJugador();
                            }
                            else
                            {
                                $(".renovacion-row").hide();
                                $("#paso-2-dni-tutor-container").show();
                                $("#paso-2-dni-jugador-container").show();
                                $("#inscripciones-escuela-form-respuesta").show();
                                $("#inscripciones-escuela-form-respuesta").html("<div class='col-12'><div class='alert alert-danger col-12'><h4>"+data.message+"</h4></div></div>");
                            }
                        },
                        error:  function(errorData)
                        {
                            alert("Hubo un error al cargar los datos del jugador (1385)");
                            console.log("error "+errorData);
                        }
                    });
                }
                else
                {
                    $(".renovacion-row").hide();
                    $("#paso-2-dni-tutor-container").show();
                    $("#paso-2-dni-jugador-container").show();
                }
            });
            
            function permitirEdicionCamposJugador()
            {
                $("#mensaje-carga-jugador").hide();
                $("#tipodocjugador-form-escuela").attr("readonly", false); 
                $("#dni-jugador-form-escuela").attr("readonly", false); 
                $("#fechacad-jugador-form-escuela").attr("readonly", false); 
                $("#nacionalidad-form-escuela").attr("readonly", false); 
                $("#fechanac-form-escuela").attr("readonly", false); 
                $("#nombre-form-escuela").attr("readonly", false); 
                $("#apellidos-form-escuela").attr("readonly", false); 
                $("#direccion-form-escuela").attr("readonly", false); 
                $("#numero-form-escuela").attr("readonly", false); 
                $("#piso-form-escuela").attr("readonly", false); 
                $("#puerta-form-escuela").attr("readonly", false); 
                $("#cp-form-escuela").attr("readonly", false); 
                $("#poblacion-form-escuela").attr("readonly", false); 
                $("#provincia-form-escuela").attr("readonly", false); 
                $("#sexojugador-form-escuela").attr("readonly", false); 
                $("#paisnac-form-escuela").attr("readonly", false); 
                $("#anyosclub-form-escuela").attr("readonly", false); 
                $("#alergias-form-escuela").attr("readonly", false); 
                $("#tlfjugador-form-escuela").attr("readonly", false); 
                $("#email-form-escuela").attr("readonly", false); 
                $("#colegio-form-escuela").attr("readonly", false); 
                $("#curso-form-escuela").attr("readonly", false); 
            }
            
            /*  DATOS DE LA FAMILIA   ok */
            //  Cambio de tipo de campo muestra un "valor" o otro
            $('body').on('change','#numhermanos-form-escuela',function()
            {
                if($("#numhermanos-form-escuela").val()!=="0")
                {   
                    $("#edades-hermanos-container-completo").show();
                    $("#edades-hermanos-container").html("");
                    var i;
                    for (i = 0; i < $("#numhermanos-form-escuela").val(); i++)
                    {   
                        $("#edades-hermanos-container").append('<div class="form-group col-12 col-md-2 col-lg-2 col-xl-2"><input type="number" min="0" class="form-control edad-hermano" name="edades"></div>');
                    }
                }
                else
                {   
                    $("#edades-hermanos-container").html("");
                    $("#edades-hermanos-container-completo").hide();
                }
            });
         
            //  BLOQUE FAMILIA. Activar CHECKBOX familia monoparental
            $("#familia-form-escuela").change(function(){
//                if($(this).val()==="1")
//                {
//                    $("#monoparental-container").show("250");
//                    $("#tipo-familia-monoparental-madre").val("");
//                    //$('[name="tipofamiliamonoparental"]').prop("checked", false);
//                }
//                else
//                {
//                    $("#monoparental-container").hide("250");
//                    $("#datosmadre").show("250");  
//                    $("#datospadre").show("250");
//                    $("#tipo-familia-monoparental-madre-padre").val("");
//                }
            }); 

            //  BLOQUE FAMILIA. Activar radio button madre o padre
            $("#tipo-familia-monoparental-madre-padre").change(function(){ 
//                if($(this).val()==="madre")
//                {   
//                    $("#datosmadre").show("250");  
//                    $("#datospadre").hide("250");
//                }
//                else if($(this).val()==="padre")
//                {
//                    $("#datosmadre").hide("250");  
//                    $("#datospadre").show("250");
//                }
//                else 
//                {
//                    $("#datosmadre").hide("250");  
//                    $("#datospadre").hide("250");  
//                }
            }); 
            
//            $("input[name=tipofamiliamonoparental]").change(function()
//            {   
//                if($(this).val()==="madre")
//                {   
//                    $("#datosmadre").show("250");  
//                    $("#datospadre").hide("250");
//                }
//                else
//                {
//                    $("#datosmadre").hide("250");  
//                    $("#datospadre").show("250");
//                }
//            });
    
            /*  PASO 6 - PAGOS */
            function limit10(element) {
                var max_chars = 10;
                if (element.value.length > max_chars) {
                    element.value = element.value.substr(0, max_chars);
                }
            }
            function limit4(element) {
                var max_chars = 4;
                if (element.value.length > max_chars) {
                    element.value = element.value.substr(0, max_chars);
                }
            }
            function limit2(element) {
                                                            var max_chars = 2;
                                                            if (element.value.length > max_chars) {
                                                                element.value = element.value.substr(0, max_chars);
                                                            }
                                                        }
            function mostrarrecibo(id) {
                if (id == "transferencia") {
                    $("#submit-container-recibo").show();
                } 
                else{
                    $("#submit-container-recibo").hide(); 
                }
            }        
            

            /*  PASO 7 - FIRMAS */
            //  Oyente que se dispara al Validar firma 
			$( "#generar_Firma" ).on( "click", function()
			{   GuardarTrazado();   });
            
            /*  Enviar el trazado */
			function GuardarTrazado()
			{
				$("#img_firma_jugador").val(document.querySelector('#pizarra').toDataURL('image/png') );
				$("#img_firma_tutor").val(document.querySelector('#pizarra1').toDataURL('image/png') );
                $("#submit-container").show();
                $("#submit-formulario-inscripcion-escuela").prop("disabled", false);
                $("#submit-container-recibo").hide();
			}

            //  Guardar 
            $('#inscripciones-escuela-form').validate(
            {
                submitHandler:function()
                {
                    /****************************
                    * VALIDACIÓN PREVIA
                    * 
                    * Todos los campos <input> de esta página están dentro del mismo formulario.
                    * Como hay una operación para buscar un jugador por su DNI o por el del padre/madre/tutor
                    * 
                    * Como hay personas que trabajan habitualmente con ordenadores, al rellenar algo, pulsan ENTER tras poner el DNI
                    * y eso lanza este SUBMIT HANDLER. 
                    * 
                    * Así, debemos controlar que no estamos en uno de esos pasos iniciales, y si lo estamos no continuar el submit handler si no sacar 
                    * un mensaje apropiado o no hacer nada para hagan click en el botón como queremos que hagan. 
                    * 
                    * Esto es lo que controlan la siguiente instruccione.
                    ****************************/
                    if($("#dni-jugador-form-escuela").val()==="")
                    {   return false;   }
                    
                    var formData = new FormData();
                    /*******************
                     * DATOS JUGADOR 
                     *******************/
                    formData.append("jugador_id",          $("#idjugador-form-escuela").val());          
                    
                    //  Fila 1
                    //  formData.append("tipoinscripcion",          $("input[name='tipoinscripcion']:checked").val());          //  RADIO BUTTON
                    formData.append("jugador_tipo_documento",   $("#tipodocjugador-form-escuela option:selected").val());   //  <select>
                    formData.append("jugador_dni",              $("#dni-jugador-form-escuela").val());  
                    formData.append("jugador_fecha_caducidad",  $("#fechacad-jugador-form-escuela").val());  
                    formData.append("jugador_nacionalidad",     $("#nacionalidad-form-escuela").val());  
                    //  Fila 2
                    formData.append("jugador_fecha_nacimiento", $("#fechanac-form-escuela").val());  
                    formData.append("jugador_nombre",           $("#nombre-form-escuela").val());  
                    formData.append("jugador_apellidos",        $("#apellidos-form-escuela").val());  
                    //  Fila 3
                    formData.append("jugador_direccion",        $("#direccion-form-escuela").val());  
                    formData.append("jugador_numero",           $("#numero-form-escuela").val());  
                    formData.append("jugador_piso",             $("#piso-form-escuela").val());  
                    formData.append("jugador_puerta",           $("#puerta-form-escuela").val());  
                    //  Fila 4
                    formData.append("jugador_cp",               $("#cp-form-escuela").val());  
                    formData.append("jugador_poblacion",        $("#poblacion-form-escuela").val());  
                    formData.append("jugador_provincia",        $("#provincia-form-escuela").val());  
                    //  Fila 5
                    formData.append("jugador_sexo",             $("#sexojugador-form-escuela option:selected").val());  
                    formData.append("jugador_pais_nacimiento",  $("#paisnac-form-escuela").val());  
                    formData.append("jugador_talla_camiseta",   $("#talla-form-escuela option:selected").val());  
                    formData.append("jugador_anyos_club",       $("#anyosclub-form-escuela").val());  
                    //  Fila 6
                    formData.append("jugador_alergias",         $("#alergias-form-escuela").val());  
                    formData.append("jugador_email_jugador",    $("#email-form-escuela").val());  
                    //  Datos del equipo
                    formData.append("jugador_equipo",           $("#modalidad-form-escuela").val());  
                    formData.append("jugador_seccion",          $("#seccion-form-escuela").val()); 
                    formData.append("id_equipo",                $("#idequipo-form-escuela").val()); 


                     /*******************
                    * DATOS matricula 
                    *******************/
                    formData.append("modalidad",                 $("input[name='modalidadequipo']:checked").val()); 
                    formData.append("tipoalumno",                $("input[name='tipo']:checked").val());  //para saber si el alumno es interno o externo
                    formData.append("hermanos_inscritos",        $("input[name='hermanosinscritos']:checked").val());  



                    /*******************
                    * DATOS FAMILIA 
                    *******************/
                    formData.append("familia_num_hermanos",                 $("#numhermanos-form-escuela").val());                                  //  NUMERO HERMANOS
                    var array_edades = "";                                  $(".edad-hermano").each(function(){   array_edades  =   array_edades+"-"+$(this).val();});
                    formData.append("familia_edades_hermanos",              array_edades);  //  EDADES HERMANOS
                    formData.append("familia_monoparental",                 $("#familia-form-escuela option:selected").val());                        //  MONOPARENTAL
                    formData.append("familia_monoparental_padre_madre",     $("#tipo-familia-monoparental-madre-padre option:selected").val());      //  PADRE O MADRE
                    
                    //  Madre
                    formData.append("madre_nombre",     $("#nombremadre-form-escuela").val());  
                    formData.append("madre_apellidos",  $("#apellidosmadre-form-escuela").val());  
                    formData.append("madre_dni",        $("#dnimadre-form-escuela").val());  
                    formData.append("madre_telefono",   $("#tlfmadre-form-escuela").val());  
                    formData.append("madre_email",      $("#emailmadre-form-escuela").val());  
                    formData.append("madre_estudios",   $("#estudiosmadre-form-escuela option:selected").val());  
                    
                    //  Padre
                    formData.append("padre_nombre",     $("#nombrepadre-form-escuela").val());  
                    formData.append("padre_apellidos",  $("#apellidospadre-form-escuela").val());  
                    formData.append("padre_dni",        $("#dnipadre-form-escuela").val());  
                    formData.append("padre_telefono",   $("#tlfpadre-form-escuela").val());  
                    formData.append("padre_email",      $("#emailpadre-form-escuela").val());  
                    formData.append("padre_estudios",   $("#estudiospadre-form-escuela option:selected").val());  
                    
                    //  Cuenta bancaria
                    formData.append("banco_devoluciones",           $("input[name='autorizo-pago-extra']:checked").val());                      
                    formData.append("banco_titular",                $("#titular-form-escuela").val());  
                    formData.append("banco_dni",                    $("#dnititular-form-escuela").val());  
                    formData.append("banco_iban",                   $("#iban-input").val());  
                    formData.append("banco_entidad",                $("#entidad-input").val());  
                    formData.append("banco_oficina",                $("#oficina-input").val());  
                    formData.append("banco_dc",                     $("#dc-input").val());  
                    formData.append("banco_cuenta",                 $("#cuenta").val());  
                    formData.append("banco_acepto_condiciones",     $("input[name='autorizo']:checked").val());      
                    formData.append("banco_acepto_pago",            $("input[name='autorizo-pago']:checked").val());      
                    
                    //  Las 2 imágenes de las firmas en "BLOB"
                    formData.append("firma_jugador",    $("#img_firma_jugador").val());
                    formData.append("firma_tutor",      $("#img_firma_tutor").val());

                 
                 // RECUPERAMOS LAS IMAGENES --> OK
                    formData.append('foto',       $('#archivo_foto')[0].files[0]); 
                    formData.append('dnifrontal', $('#archivo_dni_frontal')[0].files[0]); 
                    formData.append('dnitrasero', $('#archivo_dni_trasero')[0].files[0]); 
                    formData.append('sip',        $('#archivo_sip')[0].files[0]); 
                    formData.append('pasaporte',  $('#archivo_pasaporte')[0].files[0]); 

                  //img del recibo de pago por transferencia
                    formData.append('recibo',  $('#archivo_recibo')[0].files[0]); 
                    formData.append("metodopago", $("#metodo-pago-form option:selected").val());  
                    formData.append("jugador_telefono",          $("#tlfjugador-form-escuela").val()); 
                    formData.append("jugador_colegio",           $("#colegio-form-escuela").val()); 
                    formData.append("jugador_curso",             $("#curso-form-escuela").val());   

//alert("Ahora haríamos la llamada AJAX. Pero está comentada ");   
                    
                    $.ajax(
                    {
                        type:           "POST",
                        url:            "?r=inscripciones/InscripcionPatronato2020",
                        data:           formData,
                        processData:    false,          // tell jQuery not to process the data
                        contentType:    false,          // tell jQuery not to set contentType
                        dataType:       "json",
                        beforeSend:     function()
                        {
                            $("#inscripciones-escuela-form-espera").show(150);
                            $("#submit-formulario-inscripcion-escuela").prop("disabled", true);
                            $("#submit-formulario-inscripcion-escuela").css("background-color", "#777");
                        },
                        success:        function(data)
                        {
                            console.log(data);
                            console.log(data.url);
                            console.log(data.ruta_pdf);
                            
                            if(data.response==="success")
                            {   
                                $("#inscripciones-escuela-form-espera").hide();
                                $("#inscripciones-escuela-form-respuesta").html("<div class='alert alert-success'><h4>" + data.message + "</h4></div>");
                                
                                //  Redirigimos al formulario de reservas o a la página ok
                                if(data["url"]!=="" && (typeof data["url"]!=="undefined"))
                                {
                                    //alert("url");
                                    console.log(data["url"]);
                                    window.location.href = encodeURI(data["url"]);
                                }
                                else if(data["ruta_pdf"]!=="" && (typeof data["ruta_pdf"]!=="undefined"))
                                {
                                    //alert("ruta");
                                    console.log(data["ruta_pdf"]);
                                    window.location.href = "index.php?r=inscripciones/InscripcionEscuela2020OKRecepcionYTransferencia&ruta_pdf="+data.ruta_pdf;
                                }
                                else 
                                {
                                    //alert("else");
                                    console.log("else");
                                }
                            }
                            else
                            {
                                $("#inscripciones-escuela-form-espera").hide();
                                //  Permito volver a enviar
                                $("#submit-formulario-inscripcion-escuela").prop("disabled", false);
                                $("#submit-formulario-inscripcion-escuela").css("background-color", "#000");
                                
                                $("#inscripciones-escuela-form-respuesta").html("<div class='col-12'><div class='alert alert-danger'>" + data.message + "</div></div>");
                                $("#inscripciones-escuela-form-respuesta").fadeTo(5000, 500).slideUp(500, function(){
                                    $("#inscripciones-escuela-form-respuesta").slideUp(500);
                                    $("#inscripciones-escuela-form-respuesta").html("");
                                });
                            }
                        },
                        error:          function(errorData)
                        {
                            alert("Ha habido un error al guardar el formulario (1689)");
                            console.log("error ");
                        }
                    });
                    
                }
            });
        </script>
    </body>
</html>                 