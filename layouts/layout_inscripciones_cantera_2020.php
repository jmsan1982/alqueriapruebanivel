<!DOCTYPE html>
<html lang="es">
    <?php require('includes/head.php'); ?>
    <link rel="stylesheet" href="css/forms.css">
    <link rel="stylesheet" href="css/parallax.css">
    <link rel="stylesheet" href="css/formus.css">

    <!-- Código CSS -->
    <style>
        input[type="text"]{ text-transform: uppercase;}
        input[type="email"]{text-transform: lowercase;}
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
                        <?php 
                        $now = date("Y-m-d H:i:s");
                        $date = "2020-07-06 09:00:00";  
                        $ocultamosdiv="";
                        if ($now < $date && !isset($_GET["familia"]))
                        {
                            $ocultamosdiv="display:none";
                        ?>
                            <div class="row">
                                <div class="col-12 col-md-3 col-lg-3 col-xl-3" id="escudo">
                                    <img class="img-responsive" src="img/escudo-cantera.png" style="margin: 0 auto;" alt="Escudo Cantera L´Alqueria del Basket">
                                </div>

                                <div class="col-12 col-md-9 col-lg-9 col-xl-9" id="titulo">
                                    <h2 class="section-title">
                                        <?php echo $lang["ins_cantera_renovacion"];?> <span class="orange-text"><?php echo $lang["ins_cantera_cantera"];?></span>
                                    </h2>
                                    <h3 class="section-title mb-2"><?php echo $lang["ins_cantera_ficha"];?></h3>
                                </div>
                                
                                <div class="col-12">
                                    <div class="alert alert-info redimension" role="alert">
                                        <h4><i class="fa fa-info-circle" aria-hidden="true"></i> Las inscripciones se abrirán el viernes 6 de julio a las 9:00h. ¡Gracias!</h4>
                                    </div>
                                </div>
                                
                                <div class="col-12 mb-1">
                                    <h4><strong>Recuerde las siguientes instrucciones para el momento de la inscripción: </strong></h4>
                                    <p>Prepare la siguiente información y los documentos que necesitará obligatoriamente para realizar la inscripción:
                                    <br>- Cuenta bancaria para los cargos trimestrales

                                    <br>- Fotografía del jugador/a
                                    <br>- Fotografía del SIP
                                    <br>- Fotografía por delante y por detrás 
                                    <br>- Fotografía del pasaporte</p>

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
                        <?php 
                        }
                        ?>
                        
                        <!-- Imagen escudo y titulo -->
                        <div class="row" style="<?php echo $ocultamosdiv;?>">
                            <div class="col-12 col-md-3 col-lg-3 col-xl-3" id="escudo">
                                <img class="img-responsive" src="img/escudo-cantera.png" style="margin: 0 auto;" alt="Escudo Cantera L´Alqueria del Basket">
                            </div>

                            <div class="col-12 col-md-4 col-lg-4 col-xl-4" id="titulo">
                                <h2 class="section-title">
                                    <?php echo $lang["ins_cantera_renovacion"];?> <span class="orange-text"><?php echo $lang["ins_cantera_cantera"];?></span>
                                </h2>
                                <h3 class="section-title mb-2"><?php echo $lang["ins_cantera_ficha"];?></h3>
                            </div>
                            
                            <div class="col-12 col-md-5 col-lg-5 col-xl-5">
                                <div class="contact-info-wrap mt-1 mb-1 t-center">	
                                    <h4 class="section-title mt-0 mb-0 t-center">
                                        <span class="orange-text"><?php echo $lang["soporte_tecnico_titulo"];?></span>
                                    </h4>
                                    <p class="t-center">
                                        <strong><?php echo $lang["soporte_tecnico_texto"];?></strong>
                                    </p>
                                    <a href="https://api.whatsapp.com/send?phone=34687717491" target="_blank" style="color: black; font-size: 1.3em;">
                                        <img src="img/wassap3.png" style="max-width: 50px;" alt="Contacta por WhatsApp"><strong> WhatsApp 687717491</strong>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-1" style="<?php echo $ocultamosdiv;?>">
                            <div class="col-12">
                                <form id="inscripciones-cantera-form" class="boxed-form" method="post">

                                    <!-- Paso 1: Elegir RENOVACION o NUEVA INSCRIPCION -->
                                    <!-- Si marcan "nueva inscripcion" mostramos inscripciones-cantera-mensaje-nueva-inscripcion -->
                                    <!-- Si marcan "renovacion" mostramos el resto de <div> que tienen la class="renovacion-row" -->
                                    <div class="row">
                                        <div class="col-12 mb-1" style="font-size: 1.8em;">
                                            <label id="tipo-inscripcion-renovacion" class="control control--radio tipoinscripcionseleccionada" class="control control--radio">
                                                <?php echo $lang["ins_escuela_opcion_renovar"]; ?>
                                                <input type="radio" name="tipoinscripcion" value="renovacion" checked>
                                                <div class="control__indicator"></div>
                                            </label>
                                        </div>

                                        <div class="col-6" style="font-size: 1.8em; display:none;">
                                            <label id="tipo-inscripcion-nueva" class="control control--radio">
                                                <?php echo $lang["ins_escuela_opcion_nuevojugador"];?>
                                                <input type="radio" name="tipoinscripcion" value="nueva">
                                                <div class="control__indicator"></div>
                                            </label>
                                        </div>

                                        <div class="form-group col-12 mb-1">
                                            <div id="inscripciones-cantera-mensaje-nueva-inscripcion" class="alert alert-danger redimension" role="alert" style="display:none;">
                                                <h4><i class="fa fa-info-circle" aria-hidden="true"></i><?php echo $lang["ins_cantera_nueva_inscripcion"];?></h4>
                                            </div>
                                        
                                            <div id="inscripciones-cantera-mensaje-renovacion-inscripcion" class="alert alert-info redimension" role="alert">
                                                <h4><i class="fa fa-info-circle" aria-hidden="true"></i><?php echo $lang["ins_cantera_renovacion_inscripcion"];?></h4>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Paso 2 - PLAN A : Nos dan DNI del jugador/a. -->
                                    <div class="row renovacion-row">
                                        <div class="col-12">
                                            <hr style="color:black;border:1px solid #ccc;">
                                            <h2><?php echo $lang["ins_form_titulo_verificacion"];?></h2>
                                            <p style="font-weight:bold;font-size:20px;text-align:justify;"><?php echo $lang["ins_form_titulo_verificacion_p"];?></p>
                                        </div>
                                    
                                        <!-- Paso VERIFICACION POR SMS -->
                                        <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 redimension">
                                            <label style="font-weight:bold;font-size:20px;"><?php echo $lang["ins_form_mensaje_sms"];?></label>
                                            <input type="number" id="codigo-verificacion" class="form-control" name="codigo-verificacion" max="999999" min="1">                                            
                                        </div>
                                        
                                        <!-- DNI JUGADOR -->
                                        <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 redimension">
                                            <label style="font-weight: bold; font-size: 20px;"><?php echo $lang["ins_form_dni_jugador_1"];?> <small><?php echo $lang["ins_form_dni_jugador_2"];?></small></label>
                                            <input type="text" id="dni-jugador" class="form-control" name="validacion-dni" maxlength="50">                                            
                                        </div>
                                        
                                        <!-- DNI PADRE / madre / tutor -->
                                        <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 redimension">
                                            <label style="font-weight:bold;font-size:20px;"><?php echo $lang["ins_form_dni_tutor_1"];?><small><?php echo $lang["ins_form_dni_tutor_2"];?></small></label>
                                            <input type="text" id="validacion-dni-padremadre" class="form-control" name="validacion-dni-padremadre" 
                                                   maxlength="50" disabled>                                            
                                        </div>
                                        
                                        <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 redimension">
                                            <button id="buscar-jugador-dni-jugador" name="buscar-validacion-dni" 
                                                    type="button" class="btn btn-link-w w-100" 
                                                    style="max-height: 59px; margin-top: 28px; margin-left: 0;">
                                                <span><?php echo $lang["ins_form_buscar_jugador"];?></span>  
                                            </button>
                                        </div>
                                        
                                        <!--                                        
                                        <div id="paso-2-dni-jugador-error-dni" class="col-12" style="display:none;">
                                            <div class="alert alert-info redimension" role="alert">
                                                <h4 class="mt-0 mb-0"><i class="fa fa-info-circle" aria-hidden="true"></i><?php //echo $lang ["ins_form_dni_no_valido_1"];?><br>
                                                    <i class="fa fa-info-circle" aria-hidden="true"></i><?php //echo $lang ["ins_form_dni_no_valido_2"];?><br>
                                                    <i class="fa fa-info-circle" aria-hidden="true"></i><?php //echo $lang ["ins_form_dni_no_valido_3"];?></h4>
                                            </div>
                                        </div>
                                        -->
                                    </div>

                                    <!-- Paso 2 - PLAN B: Nos dan DNI del padre o de la madre. 
                                    <div id="paso-2-dni-tutor-container" class="row renovacion-row">

                                        <!-- <div class="col-12">
                                            <hr>
                                        </div>

                                        <div class="form-group col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9 redimension">
                                            <label style="font-weight:bold;font-size:20px;"><?php //echo $lang["ins_form_dni_tutor_1"];?><br><small>
                                                <?php //echo $lang["ins_form_dni_tutor_2"];?></small></label>
                                            <input type="text" id="validacion-dni-padremadre" class="form-control" name="validacion-dni-padremadre" 
                                                   maxlength="50" disabled>                                            
                                        </div>

                                        <div class="form-group col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 redimension">
                                            <button type="button" class="mt-4 btn btn-link-w w-100" id="buscar-jugador-dni-padremadre" name="buscar-validacion-dni" 
                                                    style="max-height: 59px; margin-top: 28px; margin-left: 0;">
                                                <span><?php //echo $lang["ins_form_buscar_jugador"];?></span>
                                            </button>
                                        </div> 

                                        <div id="paso-2-dni-tutor-selector-jugador" class="form-group col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 redimension" style="display:none;">
                                            <label style="font-weight: bold; font-size: 20px;"><?php //echo $lang["ins_cant_esc_select"];?></label>
                                            <select class="form-control" value="" name="validacion-dni-select" id="validacion-dni-select">
                                                <option value=""><?php //echo $lang["ins_cant_esc_select_vacio"];?></option>  
                                            </select>
                                        </div>

                                        <div id="paso-2-dni-tutor-respuesta" class="form-group col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 redimension"></div>

                                        <div id="paso-2-dni-tutor-error-dni" class="col-12" style="display:none;">
                                            <div class="alert alert-info redimension" role="alert">
                                                <h4 class="mt-0 mb-0"><i class="fa fa-info-circle" aria-hidden="true"></i><?php //echo $lang ["ins_form_dni_no_valido_1"];?><br>
                                                    <i class="fa fa-info-circle" aria-hidden="true"></i><?php //echo $lang ["ins_form_dni_no_valido_2"];?><br>
                                                    <i class="fa fa-info-circle" aria-hidden="true"></i><?php //echo $lang ["ins_form_dni_no_valido_3"];?></h4>
                                            </div>
                                        </div>
                                    </div>
                                    -->

                                    <!-- Confirmación de que se puede pasar a editar el jugador -->
                                    <div class="row mt-1">
                                        <div id="confirmacion-puede-editarse-jugador" class="col-12">
                                            <div class="alert alert-danger redimension" role="alert">
                                                <h4><i class="fa fa-info-circle" aria-hidden="true"></i>
                                                    <?php echo $lang["ins_form_confirmacion_jugador_pendiente"];?>
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
                                                <div class="form-group col-md-3 col-lg-3 col-xl-3">
                                                    <label><?php echo $lang["ins_form_tipodoc"];?></label>
                                                    <select class="form-control" name="tipodocjugador" id="tipodocjugador-form-cantera" required disabled>
                                                        <option value=""><?php echo $lang["ins_controller_seleccionar"];?></option>
                                                        <option value="DNI">DNI</option>
                                                        <option value="NIE">NIE</option>
                                                        <option value="PASAPORTE"><?php echo $lang["ins_form_tipodoc_pas"];?></option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-12 col-md-3 col-lg-3 col-xl-3">
                                                    <label><?php echo $lang["ins_form_numdoc"];?></label>
                                                    <input type="text" class="form-control input-control-dni" name="dnijugador" id="dni-jugador-form-cantera" maxlength="50" required disabled>
                                                </div>
                                                <div class="form-group col-12 col-md-3 col-lg-3 col-xl-3">
                                                    <label><?php echo $lang["ins_form_fechacad"];?></label>
                                                    <input type="date" class="form-control input-control-dni" style="color: #5c5c5c !important;" id="fechacad-jugador-form-cantera" name="fechacaducidad" required disabled>
                                                </div>
                                                <div class="form-group col-12 col-md-3 col-lg-3 col-xl-3">
                                                    <label><?php echo $lang["ins_form_nacionalidad"];?></label>
                                                    <input type="text" class="form-control input-control-dni" name="nacionalidad" id="nacionalidad-form-cantera" maxlength="25" required disabled>
                                                </div>
                                            </div>

                                            <!-- Fecha de nacimiento, nombre y apellidos -->
                                            <div class="row">
                                                <div class="form-group col-12 col-md-3 col-lg-3 col-xl-3">
                                                    <label><?php echo $lang["ins_form_fechanac"];?></label>
                                                    <input type="date" class="form-control input-control-dni" style="color: #5c5c5c !important;" id="fechanac-form-cantera" name="fechanacimiento" required disabled> 
                                                </div>
                                                <div class="form-group col-12 col-md-3 col-lg-3 col-xl-3">
                                                    <label><?php echo $lang["ins_form_nombre"];?></label>
                                                    <input type="text" id="nombre-form-cantera" class="form-control input-control-dni" name="nombre" maxlength="45" required disabled>
                                                </div>
                                                <div class="form-group col-12 col-md-6 col-lg-6 col-xl-6">
                                                    <label><?php echo $lang["ins_form_apel"];?></label>
                                                    <input type="text" id="apellidos-form-cantera" class="form-control input-control-dni" name="apellidos" maxlength="45" required disabled>
                                                </div>
                                            </div>

                                            <!-- Dirección 1/2 -->
                                            <div class="row">
                                                <div class="form-group col-12 col-md-6 col-lg-6 col-xl-6">
                                                    <label><?php echo $lang["ins_form_direcion"];?></label>
                                                    <input type="text" id="direccion-form-cantera" class="form-control input-control-dni" name="direccion" maxlength="100" required disabled>
                                                </div>
                                                <div class="form-group col-12 col-md-2 col-lg-2 col-xl-2">
                                                    <label><?php echo $lang["ins_form_numero"];?></label>
                                                    <input type="text" id="numero-form-cantera" class="form-control input-control-dni" name="numero" maxlength="10" disabled>
                                                </div>
                                                <div class="form-group col-12 col-md-2 col-lg-2 col-xl-2">
                                                    <label><?php echo $lang["ins_form_piso"];?></label>
                                                    <input type="text" id="piso-form-cantera" class="form-control input-control-dni" name="piso" maxlength="10" disabled>
                                                </div>
                                                <div class="form-group col-12 col-md-2 col-lg-2 col-xl-2">
                                                    <label><?php echo $lang["ins_form_porta"];?></label>
                                                    <input type="text" id="puerta-form-cantera" class="form-control input-control-dni" name="puerta" maxlength="10" disabled>
                                                </div>
                                            </div>

                                            <!-- Dirección 2/2 -->
                                            <div class="row">
                                                <div class="form-group col-12 col-md-3 col-lg-3 col-xl-3">
                                                    <label><?php echo $lang["ins_form_cp"];?>
                                                        <input type="number" id="cp-form-cantera" class="form-control input-control-dni" name="cp" min="1" step="1" required disabled>
                                                    </label>
                                                </div>
                                                <div class="form-group col-12 col-md-6 col-lg-6 col-xl-6">
                                                    <label><?php echo $lang["ins_form_pob"];?>
                                                        <input type="text" id="poblacion-form-cantera" class="form-control input-control-dni" name="poblacion" maxlength="45" required disabled>
                                                    </label>
                                                </div>
                                                <div class="form-group col-12 col-md-3 col-lg-3 col-xl-3">
                                                    <label><?php echo $lang["ins_form_prov"];?>
                                                        <input type="text" id="provincia-form-cantera" class="form-control input-control-dni" name="provincia" maxlength="25" required disabled>
                                                    </label>
                                                </div>
                                            </div>

                                            <!-- Sexo, pais de nacimiento, años en el club -->
                                            <div class="row">
                                                <div class="form-group col-12 col-md-3 col-lg-3 col-xl-3">
                                                    <label><?php echo $lang["ins_form_sexo"];?>
                                                        <select class="form-control" name="sexojugador" id="sexojugador-form-cantera" required disabled>
                                                            <option value=""><?php echo $lang["ins_controller_seleccionar"];?></option>
                                                            <option value="HOMBRE"><?php echo $lang["ins_form_sexo_1"];?></option>
                                                            <option value="MUJER"><?php echo $lang["ins_form_sexo_2"];?></option>
                                                        </select>
                                                    </label>
                                                </div>
                                                <div class="form-group col-12 col-md-3 col-lg-3 col-xl-3">
                                                    <label><?php echo $lang["ins_form_paisnac"];?>
                                                        <input type="text" class="form-control input-control-dni" name="paisnac" id="paisnac-form-cantera" maxlength="25" required disabled>
                                                    </label>
                                                </div>

                                                <div class="form-group col-12 col-md-3 col-lg-3 col-xl-3">
                                                    <label><?php echo $lang["ins_form_anyosclub"];?>
                                                        <input type="number" class="form-control input-control-dni" name="anyosclub" id="anyosclub-form-cantera" min="0" step="1" required disabled>
                                                    </label>
                                                </div>    

                                                <div class="form-group col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                    <label for="alergias-form-cantera" class="labelForm"><?php echo $lang["ins_form_alergias"];?></label>
                                                    <input type="text" class="form-control inputForm valid input-control-dni" value="" id="alergias-form-cantera" disabled
                                                           name="alergias-form-cantera"  aria-invalid="false">
                                                </div>
                                            </div>   

                                            <!-- teléfono movil y email del jugador -->
                                            <div class="row">
                                                <div class="form-group col-12 col-md-6 col-lg-6 col-xl-6">
                                                    <label><?php echo $lang["ins_form_telefono_jugador"];?></label>
                                                        <input type="number" class="form-control input-control-dni" 
                                                               id="tlfjugador-form-cantera" 
                                                               min="600000000" required disabled>
                                                </div>

                                                <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <label><?php echo $lang["ins_form_email_jugador"];?></label>
                                                    <input type="email" id="email-form-cantera" class="form-control input-control-dni" 
                                                           name="email" maxlength="100" required disabled>
                                                </div> 
                                            </div>

                                            <!-- Colegio y curso -->
                                            <div class="row">
                                                <div class="form-group col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
                                                    <label for="colegio-form-cantera" class="labelForm"><?php echo $lang["ins_form_colegio"];?></label>
                                                    <input type="text" class="form-control inputForm" value="" id="colegio-form-cantera" maxlength="80" disabled
                                                           name="colegio-form-cantera"  aria-invalid="false">
                                                </div>

                                                <div class="form-group col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                    <label for="curso-form-cantera" class="labelForm"><?php echo $lang["ins_form_curso"];?></label>
                                                    <input type="text" class="form-control inputForm" value="" id="curso-form-cantera" disabled
                                                           name="curso-form-cantera"  aria-invalid="false" maxlength="30">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-12 col-md-6 col-lg-6 col-xl-6">
                                                    <label><?php echo $lang["ins_form_equipo"];?></label>
                                                    <input type="text" class="form-control" id="equipo-form-cantera" readonly disabled>
                                                    <input type="hidden" id="id-equipo-form-cantera">
                                                </div>

                                                <div class="form-group col-12 col-md-6 col-lg-6 col-xl-6">
                                                    <label><?php echo $lang["ins_form_horario"];?></label>
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
                                                </div>

                                                <div class="col-12">
                                                    <div class="alert alert-info"><h4 class="mt-0 mb-0"><i class="fa fa-info-circle" aria-hidden="true"></i><?php echo $lang["ins_form_horario_aviso"];?></h4> </div>
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

                                            <!-- Número de hermanos y edades -->
                                            <div class="row">
                                                <div class="col-12 col-md-2 col-lg-2 col-xl-2">
                                                    <div class="form-group">
                                                        <label><?php echo $lang["ins_form_numh"];?></label>
                                                        <select class="form-control" name="numhermanos"
                                                                id="numhermanos-form-cantera" required disabled>
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
                                                    </div>
                                                </div>
                                                <div id="edades-hermanos-container-completo" class="col-12 col-md-10 col-lg-10 col-xl-10" style="display:none;">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group mb-0">
                                                                <label><?php echo $lang["ins_form_edades"];?></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div id="edades-hermanos-container" class="row"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Monoparental -->
                                            <div class="row mt-1">
                                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-1 mb-1">
                                                    <label><?php echo $lang["ins_form_monop"];?></label>
                                                    <select class="form-control w-100"  id="familia-form-cantera" required disabled>
                                                        <option value=""><?php echo $lang["ins_controller_seleccionar"];?></option>
                                                        <option value="0"><?php echo $lang["ins_controller_no"];?></option>
                                                        <option value="1"><?php echo $lang["ins_controller_si"];?> </option>
                                                    </select>
                                                </div>
                                                
                                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-1 mb-1">
                                                    <label><?php echo $lang["ins_form_progenitor"];?></label>
                                                    <select class="form-control w-100"  id="tipo-familia-monoparental-madre-padre" disabled>
                                                         <option value=""><?php echo $lang["ins_controller_seleccionar"];?></option>
                                                         <option value="madre"><?php echo $lang["ins_form_monop_madre"];?></option>
                                                         <option value="padre"><?php echo $lang["ins_form_monop_padre"];?> </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Datos de la madre -->
                                            <div id="datosmadre" class="row">
                                                <div class="col-12">
                                                    <p><strong><?php echo $lang["ins_form_datos_madre"];?></strong></p>
                                                </div>
                                                <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4">
                                                    <label><?php echo $lang["ins_form_nombre"];?></label>
                                                    <input type="text" class="form-control input-control-dni" name="nombremadre" id="nombremadre-form-cantera" maxlength="100" disabled>
                                                </div> 
                                                <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4">    
                                                    <label><?php echo $lang["ins_form_apel"];?></label>
                                                    <input type="text" class="form-control input-control-dni" name="apellidosmadre" id="apellidosmadre-form-cantera" maxlength="100" disabled>
                                                </div> 
                                                <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4">
                                                    <label>DNI:</label>
                                                    <input type="text" class="form-control input-control-dni" name="dnimadre" id="dnimadre-form-cantera" maxlength="10" disabled>
                                                </div>
                                                <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4">
                                                    <label><?php echo $lang["ins_form_telef"];?></label>
                                                    <input type="number" class="form-control input-control-dni" name="tlfmadre" id="tlfmadre-form-cantera" min="600000000" disabled>
                                                </div>
                                                <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4">
                                                    <label><?php echo $lang["ins_form_email"];?></label>
                                                    <input type="email" class="form-control input-control-dni" name="emailmadre" id="emailmadre-form-cantera" maxlength="100" disabled>
                                                </div>
                                                <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4">
                                                <label><?php echo $lang["ins_form_datos_estudios"];?></label>
                                                <select class="form-control" name="estudiosmadre" id="estudiosmadre-form-cantera" disabled>
                                                    <option value=""><?php echo $lang["ins_controller_seleccionar"];?></option>
                                                    <option value="Secundaria"><?php echo $lang["ins_form_datos_estud_op1"];?></option>
                                                    <option value="Bachillerato"><?php echo $lang["ins_form_datos_estud_op2"];?></option>
                                                    <option value="FP"><?php echo $lang["ins_form_datos_estud_op3"];?></option>
                                                    <option value="Grado o licenciatura"><?php echo $lang["ins_form_datos_estud_op4"];?></option>
                                                    <option value="Masters y Postgrados"><?php echo $lang["ins_form_datos_estud_op5"];?></option>
                                                    <option value="Doctorado"><?php echo $lang["ins_form_datos_estud_op6"];?></option>
                                                </select>
                                            </div>
                                            </div>

                                            <!-- Datos del padre -->
                                            <div id="datospadre" class="row">
                                                <div class="col-12">
                                                    <p><strong><?php echo $lang["ins_form_datos_padre"];?></strong></p>
                                                </div>
                                                <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4">
                                                    <label><?php echo $lang["ins_form_nombre"];?></label>
                                                    <input type="text" class="form-control input-control-dni" name="nombrepadre" id="nombrepadre-form-cantera" maxlength="100" disabled>
                                                </div>
                                                <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4">
                                                    <label><?php echo $lang["ins_form_apel"];?></label>
                                                    <input type="text" class="form-control input-control-dni" name="apellidospadre" id="apellidospadre-form-cantera" maxlength="100" disabled>
                                                </div>
                                                <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4">
                                                    <label>DNI:</label>
                                                    <input type="text" class="form-control input-control-dni" name="dnipadre" id="dnipadre-form-cantera" maxlength="10" disabled>
                                                </div>
                                                <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4">
                                                    <label><?php echo $lang["ins_form_telef"];?></label>
                                                    <input type="number" class="form-control input-control-dni" name="tlfpadre" id="tlfpadre-form-cantera"  min="600000000" maxlength="15" disabled>
                                                </div>
                                                <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4">
                                                    <label><?php echo $lang["ins_form_email"];?></label>
                                                    <input type="email" class="form-control input-control-dni" name="emailpadre" id="emailpadre-form-cantera" maxlength="100" disabled>
                                                </div>
                                                <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4">
                                                    <label><?php echo $lang["ins_form_datos_estudios"];?></label>
                                                    <select class="form-control" name="estudiospadre" id="estudiospadre-form-cantera" disabled>
                                                        <option value=""><?php echo $lang["ins_controller_seleccionar"];?></option>
                                                        <option value="Secundaria"><?php echo $lang["ins_form_datos_estud_op1"];?></option>
                                                        <option value="Bachillerato"><?php echo $lang["ins_form_datos_estud_op2"];?></option>
                                                        <option value="FP"><?php echo $lang["ins_form_datos_estud_op3"];?></option>
                                                        <option value="Grado o licenciatura"><?php echo $lang["ins_form_datos_estud_op4"];?></option>
                                                        <option value="Masters y Postgrados"><?php echo $lang["ins_form_datos_estud_op5"];?></option>
                                                        <option value="Doctorado"><?php echo $lang["ins_form_datos_estud_op6"];?></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Paso 5: Subida de ficheros: foto, DNI, pasaporte, SIP -->
                                    <div class="row renovacion-row">
                                        <div class="col-12">
                                            <hr style="color:black;border:1px solid #ccc;">
                                        </div>

                                        <div class="col-12">
                                            <h4 class="mt-0 mb-1"><strong><?php echo $lang["ins_form_fotos_titulo"];?></strong></h4>
                                            <div class="alert alert-info redimension" role="alert">
                                                <h4 class="mt-0 mb-0"><i class="fa fa-info-circle" aria-hidden="true"></i><?php echo $lang["ins_form_fotos_instrucciones_1"];?></h4>
                                                <h4 class="mt-0 mb-0"><i class="fa fa-info-circle" aria-hidden="true"></i><?php echo $lang["ins_form_fotos_instrucciones_2"];?></h4>
                                                <h4 class="mt-0 mb-0"><i class="fa fa-info-circle" aria-hidden="true"></i><?php echo $lang["ins_form_fotos_instrucciones_3"];?></h4>
                                            </div>
                                        </div>

                                        <!-- DEMO -->
                                        <div class="col-12 col-md-4 col-lg-4 col-xl-4">
                                            <h4 id="foto-jugador-h4" class="mb-0" style="color:red;"><strong><?php echo $lang["ins_form_fotos_ejemplo"];?><i class="fa fa-times" aria-hidden="true"></i> </strong></h4>
                                            <img class="img-responsive border pb-0" src="img/inscripciones2020/inscripciones-alqueria-ejemplo-documento-mal.jpg" style="margin: 0 auto;border:1px solid #ddd;">
                                            <h4 id="foto-jugador-h4" class="mb-0" style="color:darkgreen;"><strong><?php echo $lang["ins_form_fotos_ejemplo"];?><i class="fa fa-check" aria-hidden="true"></i> </strong></h4>
                                            <img class="img-responsive border" src="img/inscripciones2020/inscripciones-alqueria-demo-documento-bien.png" style="margin: 0 auto;border:1px solid #ddd;">
                                        </div>

                                        <!-- SUBIR DOCUMENTOS -->
                                        <div class="col-12 col-md-8 col-lg-8 col-xl-8">
                                            <div class="row">
                                                <!-- FOTO JUGADOR -->
                                                <div class="col-12 col-md-6">
                                                    <label>
                                                        <h4 id="foto-jugador-h4"><strong><?php echo $lang["licencia_siguiente_paso_foto_jugador"];?></strong></h4>
                                                        <input id="archivo_foto" 
                                                               type="file"  name="foto" accept="image/png, image/jpeg" data-max-size="2048" 
                                                               style="border: none !important;" required class="limite2mb">
                                                    </label>
                                                </div>

                                                <!-- DNI FRONTAL -->
                                                <div class="col-12 col-md-6">
                                                    <label>
                                                    <h4><strong><?php echo $lang["licencia_siguiente_paso_dni_frontal"];?></strong></h4>
                                                        <input id="archivo_dni_frontal"
                                                               type="file" name="dni_jugador_imagen[]" accept="image/png, image/jpeg" data-max-size="2048" 
                                                               style="border: none !important;" required class="limite2mb">
                                                    </label>
                                                </div>

                                                <!-- DNI DETRAS -->
                                                <div class="col-12 col-md-6">
                                                    <label>
                                                        <h4><strong><?php echo $lang["licencia_siguiente_paso_dni_detras"];?></strong></h4>
                                                        <input id="archivo_dni_trasero" 
                                                               type="file" name="dni_jugadordetras_imagen[]" accept="image/png,image/jpeg" data-max-size="2048" 
                                                               style="border: none !important;" required class="limite2mb">
                                                    </label>
                                                </div>

                                                <!-- SIP -->
                                                <div class="col-12 col-md-6">
                                                    <label>
                                                        <h4 id="sip-jugador-h4"><strong>SIP</strong></h4>
                                                        <input id="archivo_sip"
                                                               type="file" name="sip" accept="image/png, image/jpeg" data-max-size="2048" 
                                                               style="border: none !important;" required class="limite2mb">
                                                    </label>
                                                </div>

                                                <!-- PASAPORTE -->
                                                <div class="col-12 col-md-6">
                                                    <label>
                                                        <h4><strong><?php echo $lang["ins_form_fotos_pasaporte"];?></strong></h4>
                                                        <input id="archivo_pasaporte" type="file" name="pasaporte_jugador_imagen[]" style="border: none !important;" 
                                                               data-max-size="2048"  accept="image/png, image/jpeg" class="limite2mb">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 

                                    <!-- Paso 6: Información de los pagos -->
                                    <div class="row renovacion-row">
                                        <div class="col-12">
                                            <hr style="color:black;border:1px solid #ccc;">
                                        </div>

                                        <!-- Información -->
                                        <div class="col-12">
                                            <h4 class="mt-0 mb-1"><strong><?php echo $lang["ins_form_pago_titulo"];?></strong></h4>
                                            <div class="alert alert-info redimension" role="alert">
                                                <h4 class="mt-0 mb-0"><i class="fa fa-info-circle" aria-hidden="true"></i><?php echo $lang["ins_form_pago_1"];?></h4>
                                                <h4 class="mt-0 mb-0"><i class="fa fa-info-circle" aria-hidden="true"></i><?php echo $lang["ins_form_pago_2"];?></h4>
                                                <h4 class="mt-0 mb-0"><i class="fa fa-info-circle" aria-hidden="true"></i><?php echo $lang["ins_form_pago_3"];?></h4>
                                            </div>

                                            <p class="t-justify"><?php echo $lang["ins_form_pago_condiciones_1"];?></p>
                                            <p class="t-justify"><?php echo $lang["ins_form_pago_condiciones_2"];?></p>
                                            <p class="t-justify"><?php echo $lang["ins_form_pago_condiciones_3"];?></p>

                                            <label class="containerchekbox">
                                                <input type="checkbox" name="autorizo-pago-extra" value="si" required class="input-control-dni" disabled checked>
                                                <p><?php echo $lang["ins_form_pago_reserva"];?></p>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>

                                        <!-- Datos para la domiciliación -->
                                        <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                                            <h4 class="mt-1 mb-1"><strong><?php echo $lang["domiciliacion_titulo"];?></strong></h4>

                                            <div class="row">
                                                <div class="form-group col-12 col-md-6 col-lg-6 col-xl-6">
                                                    <label><?php echo $lang["domiciliacion_titular"];?>
                                                        <input type="text" id="titular-form-cantera" class="form-control input-control-dni" name="titular" maxlength="100" required disabled>
                                                    </label>
                                                </div>

                                                <div class="form-group col-12 col-md-6 col-lg-6 col-xl-6">
                                                    <label>DNI:
                                                        <input type="text" id="dnititular-form-cantera" class="form-control input-control-dni" name="dnititular" maxlength="50" required disabled>
                                                    </label>
                                                </div>

                                                <div class="form-group col-12 col-md-2 col-lg-2 col-xl-2 redimension">
                                                    <label for="iban-input">IBAN</label>
                                                    <input id="iban-input" type="text" class="form-control input-control-dni" value="ES" name="iban" minlength="4" id="iban-form-cantera" maxlength="4" required disabled>
                                                </div>

                                                <div class="form-group col-12 col-md-2 col-lg-2 col-xl-2 redimension">
                                                    <label for="entidad-input"><?php echo $lang["domiciliacion_entidad"];?></label>
                                                    <input id="entidad-input" type="number" class="form-control input-control-dni" name="entidad" minlength="4" id="entidad-form-cantera" onkeydown="limit4(this);" onkeyup="limit4(this);" required disabled>
                                                </div>

                                                <div class="form-group col-12 col-md-2 col-lg-2 col-xl-2 redimension">
                                                    <label for="oficina-input">Oficina</label>
                                                    <input id="oficina-input" type="number" class="form-control input-control-dni" name="oficina" minlength="4" id="oficina-form-cantera" onkeydown="limit4(this);" onkeyup="limit4(this);" required disabled>
                                                </div>

                                                <div class="form-group col-12 col-md-2 col-lg-2 col-xl-2 redimension">
                                                    <label for="dc-input">DC</label>
                                                    <input id="dc-input" type="number" class="form-control input-control-dni" value="" name="dc" minlength="2" id="dc-form-cantera" onkeydown="limit2(this);" onkeyup="limit2(this);" required disabled>
                                                </div>

                                                <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4 redimension">
                                                    <label for="cuenta"><?php echo $lang["domiciliacion_cuenta"];?></label>
                                                    <input id="cuenta" type="number" class="form-control input-control-dni" name="cuenta" minlength="10" id="cuenta-form-cantera" onkeydown="limit10(this);" onkeyup="limit10(this);" required disabled>

                                                </div>

                                                <div class="col-12">
                                                    <p class="t-left mt-0">
                                                        <strong><?php echo $lang["domiciliacion_texto_domiciliacion"];?></strong>
                                                    </p>
                                                </div>

                                                <div class="col-12">
                                                    <label class="containerchekbox">
                                                        <input type="checkbox" name="autorizo" value="si" class="input-control-dni" checked disabled required>
                                                        <p><?php echo $lang["ins_form_check_condiciones"];?></p>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>

                                                <div class="col-12">
                                                    <label class="containerchekbox">
                                                        <input type="checkbox" name="autorizo-pago" value="si" required class="input-control-dni" disabled checked></input>
                                                        <p><?php echo $lang["ins_form_pago_acepto_175"];?></p>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Paso 7: Firmas y envío de la inscripción -->
                                    <div class="row renovacion-row">
                                        <div class="col-12 col-lg-12 col-xl-12">
                                            <hr style="color:black;border:1px solid #ccc;">
                                        </div>

                                        <!-- Información legal con enlaces -->
                                        <div class="col-12 col-lg-12 col-xl-12 mb-2">
                                            <div class="col-12">
                                                <h4 class="mt-0 mb-1"><strong><?php echo $lang["condiciones_legales_2020_titulo"];?></strong></h4>
                                            </div>

                                            <div class="col-12">
                                                <label class="containerchekbox">
                                                    <input type="checkbox" name="autorizo_condiciones_legales_2020_1" value="si" 
                                                           required class="input-control-dni"></input>
                                                    <p><?php echo $lang["condiciones_legales_2020_1"];?></p>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                            <div class="col-12">
                                                <label class="containerchekbox">
                                                    <input type="checkbox" name="autorizo_condiciones_legales_2020_2" value="si" 
                                                           required class="input-control-dni"></input>
                                                    <p><?php echo $lang["condiciones_legales_2020_2"];?></p>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                            <div class="col-12">
                                                <label class="containerchekbox">
                                                    <input type="checkbox" name="autorizo_condiciones_legales_2020_3" value="si" 
                                                           required class="input-control-dni"></input>
                                                    <p><?php echo $lang["condiciones_legales_2020_3"];?></p>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                            <div class="col-12">
                                                <label class="containerchekbox">
                                                    <input type="checkbox" name="autorizo_condiciones_legales_2020_4" value="si" 
                                                           required class="input-control-dni"></input>
                                                    <p><?php echo $lang["condiciones_legales_2020_4"];?></p>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                            <div class="col-12 col-lg-12 col-xl-12">
                                                <hr style="color:black;border:1px solid #ccc;">
                                            </div>

                                            <div class="col-12">
                                                <h4 class="mt-0 mb-1"><strong><?php echo $lang["ins_form_firmas_titulo"];?></strong></h4>
                                            </div>

                                            <div class="col-12">
                                                <div class="alert alert-info redimension" role="alert">
                                                    <h4 class="mt-0 mb-0"><i class="fa fa-info-circle" aria-hidden="true"></i><?php echo $lang['ins_form_info_firma'];?></h4>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Firma Jugador -->
                                        <div class="col-12 col-lg-6 col-xl-6 t-center">
                                            <label>
                                                <?php echo $lang["ins_form_firma_solic"];?>
                                                <canvas id="pizarra"></canvas>
                                            </label>
                                            <input id="img_firma_jugador" type="hidden" name="img_firma_jugador">
                                            <button type="button" id="limpiar" class="w-100" 
                                                    style="max-width:500px !important;height:3em;"><?php echo $lang["ins_form_firma_limpiar"];?>            
                                            </button>
                                        </div>

                                        <!-- Firma Padre -->
                                        <div class="col-12 col-lg-6 col-xl-6 t-center">
                                            <label>
                                                <?php echo $lang["ins_form_firma_tutor"];?>
                                                <canvas id="pizarra1"></canvas>
                                            </label>
                                            <input id="img_firma_tutor"   type="hidden" name="img_firma_tutor">
                                            <button id="limpiar1" type="button" class="w-100" 
                                                    style="max-width:500px !important;height:3em;">
                                                        <?php echo $lang["ins_form_firma_limpiar1"];?>
                                            </button>
                                        </div>

                                        <!-- Guardar Firmas (convierte las imagenes en el churro) -->
                                        <div class="mt-2 col-12">
                                            <button type="button" class="btn ml-0" id="generar_Firma" 
                                                    style="height:50px;width: 100%;-webkit-transform: skew(0deg);
                                                    -ms-transform: skew(0deg);transform:skew(0deg);-webkit-border-radius: 0px;
                                                    border-radius: 0px;background-color:#eb7c00;"><?php echo $lang["ins_form_firma_guardar"];?></button>
                                        </div>

                                        <!-- ALERT NO OLVIDA PULSAR VALIDAR FIRMAS -->
                                        <div id="revisar-firma-container" class="col-12 mt-1 hidden">
                                            <div class="alert alert-danger" role="alert">
                                                <h4><i class="fa fa-info-circle" aria-hidden="true"></i> <?php echo $lang["ins_form_firma_validar"];?></h4>
                                            </div>
                                        </div>

                                        <!-- Envío de la solicitud -->
                                        <div id="submit-container" class="col-12 mt-2 mb-4" style="display:none;"> 
                                            <!-- <input type="hidden" id="existe_inscripcion" value="0" name="existe_inscripcion"> -->
                                            <input type="hidden" id="jugador_id" value="">
                                            <button id="submit-formulario-inscripcion-cantera" class="btn btn-link-w w-100 input-control-dni" type="submit" style="width:100%;margin-left:0px;" id="submit">
                                                <span><?php echo $lang["ins_form_enviar_solicitud"];?></span>
                                            </button>
                                        </div>
                                    </div>

                                    <div id="inscripciones-cantera-form-espera" class="row renovacion-row" style="display:none;">
                                        <div class="col-12 alert alert-info"><h4><?php echo $lang["ins_controller_inscripcion_cantera_espera"];?></h4></div>
                                    </div>

                                    <div id="inscripciones-cantera-form-respuesta" class="row renovacion-row" style="display:none;"></div>
                                </form>
                            </div> 
                        </div>
                    </div>
                </div>
            </section>

            <!-- Modal - CODIGO VERIFICACION 6 CARACTERES --> 
            <div class="modal fade" id="error-codigo-verificacion-dni-modal" tabindex="-1" role="dialog" 
                 aria-labelledby="" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row">
                                <div id="paso-2-dni-jugador-respuesta" class="form-group col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" style="display:none;">
                                        
                                </div>
                                                       
                                <div id="errores-previos-codigo-dni" class="col-12" style="display:none;">
                                    <div class="alert alert-info redimension" role="alert">
                                        <p class="mt-0 mb-0"><i class="fa fa-info-circle" aria-hidden="true"></i><?php echo $lang ["ins_form_dni_no_valido_1"];?><br>
                                            <i class="fa fa-info-circle" aria-hidden="true"></i><?php echo $lang["ins_form_dni_no_valido_2"];?><br>
                                            <i class="fa fa-info-circle" aria-hidden="true"></i><?php echo $lang["ins_form_dni_no_valido_3"];?><br>
                                            <i class="fa fa-info-circle" aria-hidden="true"></i><?php echo $lang["ins_form_dni_no_valido_4"];?>
                                        </p>
                                    </div>
                                </div>
                                
                                <hr>
                                <div class="col-12 mt-2">    
                                    <button type="button" data-dismiss="modal" class="btn btn-link-w input-control-dni" style="padding:10px;">
                                        <h4 class="mt-0 mb-0"><?php echo $lang["ins_modal_ayuda_tallas_cerrar"];?></h4>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Modal - PADRE / MADRE tiene varios hijos  --> 
            <div class="modal fade" id="varios-hijos-modal" tabindex="-1" role="dialog" 
                 aria-labelledby="" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 redimension">
                                    <label style="font-weight: bold; font-size: 20px;"><?php echo $lang["ins_cant_esc_select"];?></label>
                                    <select class="form-control w-100" value="" name="validacion-dni-select" id="validacion-dni-select">
                                        <option value=""><?php echo $lang["ins_cant_esc_select_vacio"];?></option>  
                                    </select>
                                </div>
                                
                                <hr>
                                
                                <div class="col-12 mt-2">    
                                    <button type="button" data-dismiss="modal" class="btn btn-link-w input-control-dni" style="padding:10px;">
                                        <h4 class="mt-0 mb-0"><?php echo $lang["ins_modal_ayuda_tallas_cerrar"];?></h4>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <?php require('includes/footer.php'); ?>
        <?php require "includes/cookies.php"; ?>
        
    
        <!-- Load Scripts Start -->
        <script src="js/libs.js"></script>
        <script src="js/common.js"></script>
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.validate.min.js"></script> 
        
        <script>
            /*  PASO 1. ELEGIR TIPO INSCRIPCIÓN: RENOVACIÓN O NUEVA */
            //  MOSTRAMOS <div> de NUEVA INSCRIPCION o RENOVACION INSCRIPCIÓN según radio button
            $("input[name=tipoinscripcion]").change(function()
            {	
                if($(this).val()==="nueva")
                {   
                    $("#tipo-inscripcion-renovacion").removeClass("tipoinscripcionseleccionada");  
                    $("#tipo-inscripcion-nueva").addClass("tipoinscripcionseleccionada");  
                    
                    $("#inscripciones-cantera-mensaje-renovacion-inscripcion").hide("250");  
                    $("#inscripciones-cantera-mensaje-nueva-inscripcion").show("250"); 
                    
                    $("#dni-jugador").prop("disabled", true);
                    $("#validacion-dni-padremadre").prop("disabled", true);
                    $("#codigo-verificacion").prop("disabled", true);
                }
                else
                {
                    $("#tipo-inscripcion-renovacion").addClass("tipoinscripcionseleccionada");  
                    $("#tipo-inscripcion-nueva").removeClass("tipoinscripcionseleccionada");  
                    
                    $("#inscripciones-cantera-mensaje-nueva-inscripcion").hide("250");  
                    $("#inscripciones-cantera-mensaje-renovacion-inscripcion").show("250");  
                    
                    $("#dni-jugador").prop("disabled", false);
                    if($("#dni-jugador").val()!==""){
                        $("#validacion-dni-padremadre").prop("disabled", false);
                    }
                    $("#codigo-verificacion").prop("disabled", false);
                }
			});
            
            /*  PASO 2 - PLAN A: BUSCAMOS JUGADOR A PARTIR DEL DNI JUGADOR. */
            $( "#buscar-jugador-dni-jugador").on( "click", function()
            {
                $("#lunes-form-escuela").text("-");    
                $("#martes-form-escuela").text("-");    
                $("#miercoles-form-escuela").text("-");    ;    
                $("#jueves-form-escuela").text("-");       
                $("#viernes-form-escuela").text("-");     
                                        
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
                        jugadores_dni_tutor:    $("#validacion-dni-padremadre").val().trim(),
                        formulario:             "cantera"
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
                                
                                if(data.select_jugadores!==undefined)
                                {
                                    $('#varios-hijos-modal').modal('show');
                                    $('#validacion-dni-select').html(data.select_jugadores);
                                }
                                else
                                {
                                    //  Cambiamos mensaje
                                    $("#confirmacion-puede-editarse-jugador").html(data.confirmacion_editar_jugador);

                                    $('html, body').animate({scrollTop: $("#confirmacion-puede-editarse-jugador").offset().top},250);

                                    //  Quitamos disabled
                                    EliminaDisabled();

                                    /****************************************************************
                                    *   PLAN A (cargar desde DNI jugador): PASO 3. DATOS JUGADOR    
                                    ****************************************************************/
                                    $("#jugador_id").val( data.instancia.id_jugador);

                                    //  FILA 1
                                    if( data.instancia["tipo_documento"] !== "" )     {   $("#tipodocjugador-form-cantera").val(data.instancia.tipo_documento);     }
                                    if( data.instancia["dni_jugador"] !== "" )        {   $("#dni-jugador-form-cantera").val(data.instancia.dni_jugador);           }
                                    if( data.instancia["fecha_cad_dni"] !== "" )      {   $("#fechacad-jugador-form-cantera").val(data.instancia.fecha_cad_dni);    }
                                    if( data.instancia["nacionalidad"] !== "" )       {   $("#nacionalidad-form-cantera").val(data.instancia.nacionalidad);         }  

                                    //  FILA 2
                                    if( data.instancia.fecha_nacimiento !== "" )   {   $("#fechanac-form-cantera").val(data.instancia.fecha_nacimiento);   }
                                    $("#nombre-form-cantera").val( data.instancia.nombre);
                                    var valor_nombre_form_cantera = $('#nombre-form-cantera').val().toUpperCase();
                                    $('#nombre-form-cantera').val(valor_nombre_form_cantera);
                                    $("#apellidos-form-cantera").val( data.instancia.apellidos);
                                    var valor_apellidos_form_cantera = $('#apellidos-form-cantera').val().toUpperCase();
                                    $('#apellidos-form-cantera').val(valor_apellidos_form_cantera);

                                    //  FILA 3 
                                    $("#direccion-form-cantera").val( data.instancia.direccion );
                                    var valor_direccion_form_cantera = $('#direccion-form-cantera').val().toUpperCase();
                                    $('#direccion-form-cantera').val(valor_direccion_form_cantera);
                                    $("#numero-form-cantera").val( data.instancia.numero );
                                    $("#piso-form-cantera").val( data.instancia.piso );
                                    $("#puerta-form-cantera").val( data.instancia.puerta );

                                    //  FILA 4
                                    $("#cp-form-cantera").val( data.instancia.codigo_postal );
                                    $("#poblacion-form-cantera").val( data.instancia.poblacion );
                                    var valor_poblacion_form_cantera = $('#poblacion-form-cantera').val().toUpperCase();
                                    $('#poblacion-form-cantera').val(valor_poblacion_form_cantera);
                                    $("#provincia-form-cantera").val( data.instancia.provincia );
                                    var valor_provincia_form_cantera = $('#provincia-form-cantera').val().toUpperCase();
                                    $('#provincia-form-cantera').val(valor_provincia_form_cantera);

                                    //  FILA 5
                                    if( data.instancia.sexo !== "" )               {   $("#sexojugador-form-cantera").val(data.instancia.sexo);            }
                                    if( data.instancia.pais_nacimiento !== "" )    {   $("#paisnac-form-cantera").val(data.instancia.pais_nacimiento);     }
                                    /*if( data.instancia.talla_camiseta !== "" )     {   $("#talla-form-cantera").val(data.instancia.talla_camiseta);        }*/
                                    if( data.instancia.en_el_club !== "" )         {   $("#anyosclub-form-cantera").val(data.instancia.en_el_club);        }

                                    //  FILA 6
                                    if( data.instancia.alergias !=="" ){
                                        $("#alergias-form-cantera").val(data.instancia.alergias);
                                        var valor_alergias_form = $('#alergias-form-cantera').val().toUpperCase();
                                        $('#alergias-form-cantera').val(valor_alergias_form);
                                    }
                                    if( data.instancia.email !== "" )
                                    {
                                        $("#email-form-cantera").val( data.instancia.email );
                                        var valor_email_form = $('#email-form-cantera').val().toUpperCase();
                                        $('#email-form-cantera').val(valor_email_form);
                                    }

                                    //  FILA 7
                                    if( data.instancia.telefono_jugador !== "" )    {   $("#tlfjugador-form-cantera").val(data.instancia.telefono_jugador); }
                                    if( data.instancia.colegio !== "" )             {   $("#colegio-form-cantera").val(data.instancia.colegio);             }
                                    if( data.instancia.curso !== "" )               {   $("#curso-form-cantera").val(data.instancia.curso);                 }

                                    //  FILA 8
                                    $("#equipo-form-cantera").val( data.instancia.nombre_equipo_nueva_temporada );
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


                                    /****************************************************************
                                    *   PLAN A (cargar desde DNI jugador): PASO 4. DATOS FAMILIA    
                                    *****************************************************************/  
                                    if( data.instancia.num_hermanos !== "" )    
                                    {
                                        $("#numhermanos-form-cantera").val(data.instancia.num_hermanos);   
                                        if(parseInt($("#numhermanos-form-cantera").val())>0)
                                        {
                                            $("#edades-hermanos-container-completo").show();
                                            var array_id    =   data.instancia.edades.split("-");
                                            var i;
                                            for(i = 0; i < parseInt($("#numhermanos-form-cantera").val()); i++)
                                            {   $("#edades-hermanos-container").append('<div class="col-4 col-sm-4 col-md-2"><div class="form-group mt-0">\n\
                                                    <input type="number" min="0" step="1" class="form-control edad-hermano" name="edades" required value="'+array_id[i]+'"></div></div>');   
                                            }
                                        }
                                    }

                                    //  Datos de la madre
                                    $("#nombremadre-form-cantera").val( data.instancia.nombre_madre );
                                    var valor_NombreMadre_form_cantera          = $('#nombremadre-form-cantera').val().toUpperCase();
                                    $('#nombremadre-form-cantera').val(valor_NombreMadre_form_cantera);
                                    if( data.instancia.apellidos_madre !== "" ) {   $("#apellidosmadre-form-cantera").val( data.instancia.apellidos_madre );      }
                                    if( data.instancia.email_madre !== "" )     {   $("#emailmadre-form-cantera").val( data.instancia.email_madre );      }
                                    if( data.instancia.telefono_madre !== "" )  {   $("#tlfmadre-form-cantera").val( data.instancia.telefono_madre );       }
                                    if( data.instancia.dni_madre !== "" )       {   $("#dnimadre-form-cantera").val( data.instancia.dni_madre );            }
                                    if( data.instancia.estudios_madre !== "" )  {   $("#estudiosmadre-form-cantera").val( data.instancia.estudios_madre );  }

                                    //  Datos del padre
                                    $("#nombrepadre-form-cantera").val( data.instancia.nombre_padre );
                                    var valor_NombrePadre_form_cantera =         $('#nombrepadre-form-cantera').val().toUpperCase();
                                    $('#nombrepadre-form-cantera').val(valor_NombrePadre_form_cantera);
                                    if( data.instancia.apellidos_padre !== "" ) {   $("#apellidospadre-form-cantera").val( data.instancia.apellidos_padre );      }
                                    if( data.instancia.email_padre !== "" )     {   $("#emailpadre-form-cantera").val( data.instancia.email_padre );    }
                                    if( data.instancia.telefono_padre !== "" )  {   $("#tlfpadre-form-cantera").val( data.instancia.telefono_padre );   }
                                    if( data.instancia.dni_padre !== "" )       {   $("#dnipadre-form-cantera").val( data.instancia.dni_padre );        }
                                    if( data.instancia.estudios_padre !== "" )  {   $("#estudiospadre-form-cantera").val( data.instancia.estudios_padre );  }

                                    if( data.instancia.monoparental === "1" )
                                    {   $("#familia-form-cantera").val("1");    }
                                    else
                                    {   $("#familia-form-cantera").val("0");    }

                                    if( data.instancia.monoparental === "1" && data.instancia.nombre_madre!=="" && data.instancia.nombre_padre!=="")
                                    {}
                                    else if( data.instancia.monoparental === "1" && data.instancia.nombre_madre!=="")
                                    {   
                                        $("#tipo-familia-monoparental-madre-padre").val("madre");   

                                        $("#nombrepadre-form-cantera").prop("disabled", true);     $("#nombrepadre-form-cantera").val("");
                                        $("#apellidospadre-form-cantera").prop("disabled", true);  $("#apellidospadre-form-cantera").val("");
                                        $("#dnipadre-form-cantera").prop("disabled", true);        $("#dnipadre-form-cantera").val("");
                                        $("#tlfpadre-form-cantera").prop("disabled", true);        $("#tlfpadre-form-cantera").val("");
                                        $("#emailpadre-form-cantera").prop("disabled", true);      $("#emailpadre-form-cantera").val("");
                                        $("#estudiospadre-form-cantera").prop("disabled", true);   $("#estudiospadre-form-cantera").val("");
                                    }
                                    else if( data.instancia.monoparental === "1" && data.instancia.nombre_padre!=="")
                                    {   
                                        $("#tipo-familia-monoparental-madre-padre").val("padre");   

                                        $("#nombremadre-form-cantera").prop("disabled", true);     $("#nombremadre-form-cantera").val("");
                                        $("#apellidosmadre-form-cantera").prop("disabled", true);  $("#apellidosmadre-form-cantera").val("");
                                        $("#dnimadre-form-cantera").prop("disabled", true);        $("#dnimadre-form-cantera").val("");
                                        $("#tlfmadre-form-cantera").prop("disabled", true);        $("#tlfmadre-form-cantera").val("");
                                        $("#emailmadre-form-cantera").prop("disabled", true);      $("#emailmadre-form-cantera").val("");
                                        $("#estudiosmadre-form-cantera").prop("disabled", true);   $("#estudiosmadre-form-cantera").val("");
                                    }
                                    else
                                    {}

                                    /*******************************
                                    *   PLAN A: PASO 5. FOTOS, DOCUMENTOS
                                    ********************************/  


                                    /*******************************
                                    *   PLAN A: PASO 6. DATOS BANCO
                                    ********************************/  
                                    $("#titular-form-cantera").val( data.instancia.titular_banco );
                                    var valor_titular_form_cantera = $('#titular-form-cantera').val().toUpperCase();
                                    $('#titular-form-cantera').val(valor_titular_form_cantera);
                                    $("#dnititular-form-cantera").val( data.instancia.dni_titular );
                                    if(data.instancia.iban!=="")    {   $("#iban-input").val( data.instancia.iban );    }
                                    if(data.instancia.entidad!=="") {   $("#entidad-input").val( data.instancia.entidad );  }
                                    if(data.instancia.oficina!=="") {   $("#oficina-input").val( data.instancia.oficina );  }
                                    if(data.instancia.dc!=="")      {   $("#dc-input").val( data.instancia.dc );    }
                                    if(data.instancia.cuenta!=="")  {   $("#cuenta").val( data.instancia.cuenta );  }


                                    /*******************************
                                    *   PLAN A: HORARIOS
                                    ********************************/  
                                    if( data.instancia.lunes !== "" )       {   $("#lunes-form-cantera").text( data.instancia.lunes);}         else{   $("#lunes-form-cantera").text( "-" );   }
                                    if( data.instancia.martes !== "" )      {   $("#martes-form-cantera").text( data.instancia.martes);}       else{   $("#-form-cantera").val("-");   }
                                    if( data.instancia.miercoles !== "" )   {   $("#miercoles-form-cantera").text( data.instancia.miercoles);} else{   $("#-form-cantera").val("-");   }
                                    if( data.instancia.jueves !=="" )       {   $("#jueves-form-cantera").text( data.instancia.jueves);}       else{   $("#-form-cantera").val("-");   }
                                    if( data.instancia.viernes !=="" )      {   $("#viernes-form-cantera").text( data.instancia.viernes);}     else{   $("#-form-cantera").val("-");   }
                                } 
                            }
                            else
                            {   
                                $('#error-codigo-verificacion-dni-modal').modal('show');
                                
                                //  $(".renovacion-row").hide();
                                //$("#inscripciones-cantera-form-espera").hide();
                                //$("#paso-2-dni-jugador-container").show();
                                
                                $("#paso-2-dni-jugador-respuesta").show();
                                $("#paso-2-dni-jugador-respuesta").html("<div class='alert alert-danger col-12'><h4>"+data.message+"</h4></div>"); 
                                $("#validacion-dni-padremadre").prop("disabled", false);
                                
                                if(data.mostrar_dni_tutor==="si")
                                {   $("#paso-2-dni-tutor-container").show();    }
                            }
                        }
                    });
                }
                else
                {
                    $('#error-codigo-verificacion-dni-modal').modal('show');
                    $("#errores-previos-codigo-dni").show();
                    //$("#paso-2-dni-jugador-error-dni").show();
                }
            });

            /*  PASO 2 - PLAN B: SELECCIONAMOS JUGADOR*/
            $('body').on('change','#validacion-dni-select',function()
            {
                if($("#validacion-dni-select").val()!=="")
                {   
                    $("#lunes-form-escuela").text("-");    
                    $("#martes-form-escuela").text("-");    
                    $("#miercoles-form-escuela").text("-");    ;    
                    $("#jueves-form-escuela").text("-");       
                    $("#viernes-form-escuela").text("-");     
                
                    var form_data = {debug:"true",jugadores_id: $("#validacion-dni-select").val(),formulario:"cantera"};

                    $.ajax({
                        type:       "POST",
                        url:        "?r=jugadores/CargarPorID",
                        data:       form_data,
                        dataType:   "json",
                        success:    function (data) 
                        {            
                            if(data.response==="success")
                            {
                                $("#dni-jugador-form-cantera").prop("disabled", false);
                                $(".renovacion-row").show("250");
                                $("#inscripciones-cantera-form-espera").hide();
                                $("#paso-2-dni-jugador-respuesta").html("");
                                $("#paso-2-dni-jugador-respuesta").hide();
                                $("#inscripciones-cantera-form-respuesta").hide();
                                
                                /****************************
                                *   PLAN B: PASO 3. DATOS JUGADOR    
                                *****************************/
                                $("#jugador_id").val( data.instancia.id_jugador);
                                //  FILA 1
                                if( data.instancia["tipo_documento"] !== "" )     {   $("#tipodocjugador-form-cantera").val(data.instancia.tipo_documento);       }
                                if( data.instancia["dni_jugador"] !== "" )        {   $("#dni-jugador-form-cantera").val(data.instancia.dni_jugador);         }
                                if( data.instancia["fecha_cad_dni"] !== "" )      {   $("#fechacad-jugador-form-cantera").val(data.instancia.fecha_cad_dni);  }
                                if( data.instancia["nacionalidad"] !== "" )       {   $("#nacionalidad-form-cantera").val(data.instancia.nacionalidad);       }  

                                //  FILA 2
                                if( data.instancia.fecha_nacimiento !== "" )        {   $("#fechanac-form-cantera").val(data.instancia.fecha_nacimiento);   }
                                $("#nombre-form-cantera").val( data.instancia.nombre);
                                var valor_nombre_form_cantera = $('#nombre-form-cantera').val().toUpperCase();
                                $('#nombre-form-cantera').val(valor_nombre_form_cantera);
                                $("#apellidos-form-cantera").val( data.instancia.apellidos);
                                var valor_apellidos_form_cantera = $('#apellidos-form-cantera').val().toUpperCase();
                                $('#apellidos-form-cantera').val(valor_apellidos_form_cantera);

                                //  FILA 3 
                                $("#direccion-form-cantera").val( data.instancia.direccion );
                                var valor_direccion_form_cantera = $('#direccion-form-cantera').val().toUpperCase();
                                $('#direccion-form-cantera').val(valor_direccion_form_cantera);
                                $("#numero-form-cantera").val( data.instancia.numero );
                                $("#piso-form-cantera").val( data.instancia.piso );
                                $("#puerta-form-cantera").val( data.instancia.puerta );

                                //  FILA 4
                                $("#cp-form-cantera").val( data.instancia.codigo_postal );
                                $("#poblacion-form-cantera").val( data.instancia.poblacion );
                                var valor_poblacion_form_cantera = $('#poblacion-form-cantera').val().toUpperCase();
                                $('#poblacion-form-cantera').val(valor_poblacion_form_cantera);
                                $("#provincia-form-cantera").val( data.instancia.provincia );
                                var valor_provincia_form_cantera = $('#provincia-form-cantera').val().toUpperCase();
                                $('#provincia-form-cantera').val(valor_provincia_form_cantera);

                                //  FILA 5
                                if( data.instancia.sexo !== "" )               {   $("#sexojugador-form-cantera").val(data.instancia.sexo);            }
                                if( data.instancia.pais_nacimiento !== "" )    {   $("#paisnac-form-cantera").val(data.instancia.pais_nacimiento);     }
                                /*if( data.instancia.talla_camiseta !== "" )     {   $("#talla-form-cantera").val(data.instancia.talla_camiseta);        }*/
                                if( data.instancia.en_el_club !== "" )         {   $("#anyosclub-form-cantera").val(data.instancia.en_el_club);        }

                                //  FILA 6
                                if( data.instancia.alergias !=="" ){
                                    $("#alergias-form-cantera").val(data.instancia.alergias);
                                    var valor_alergias_form = $('#alergias-form-cantera').val().toUpperCase();
                                    $('#alergias-form-cantera').val(valor_alergias_form);
                                }
                                if( data.instancia.email !== "" )
                                {
                                    $("#email-form-cantera").val( data.instancia.email );
                                    var valor_email_form = $('#email-form-cantera').val().toUpperCase();
                                    $('#email-form-cantera').val(valor_email_form);
                                }
                                $("#equipo-form-cantera").val( data.instancia.nombre_equipo_nueva_temporada );
                                
                                //  FILA 7
                                if( data.instancia.telefono_jugador !== "" )    {   $("#tlfjugador-form-cantera").val(data.instancia.telefono_jugador); }
                                if( data.instancia.colegio !== "" )             {   $("#colegio-form-cantera").val(data.instancia.colegio);             }
                                if( data.instancia.curso !== "" )               {   $("#curso-form-cantera").val(data.instancia.curso);                 }
                                
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
                                    $("#numhermanos-form-cantera").val(data.instancia.num_hermanos);   
                                    if(parseInt($("#numhermanos-form-cantera").val())>0)
                                    {
                                        $("#edades-hermanos-container-completo").show();
                                        var array_id    =   data.instancia.edades.split("-");
                                        var i;
                                        for(i = 0; i < parseInt($("#numhermanos-form-cantera").val()); i++)
                                        {   $("#edades-hermanos-container").append('<div class="col-4 col-sm-4 col-md-2"><div class="form-group mt-0">\n\
                                                <input type="number" class="form-control edad-hermano" name="edades" min="0" step="1" required value="'+array_id[i]+'"></div></div>');   
                                        }
                                    }
                                }
                                
                                //  Datos de la madre
                                $("#nombremadre-form-cantera").val( data.instancia.nombre_madre );
                                var valor_NombreMadre_form_cantera          = $('#nombremadre-form-cantera').val().toUpperCase();
                                $('#nombremadre-form-cantera').val(valor_NombreMadre_form_cantera);
                                if( data.instancia.apellidos_madre !== "" ) {   $("#apellidosmadre-form-cantera").val( data.instancia.apellidos_madre );      }
                                if( data.instancia.email_madre !== "" )     {   $("#emailmadre-form-cantera").val( data.instancia.email_madre );      }
                                if( data.instancia.telefono_madre !== "" )  {   $("#tlfmadre-form-cantera").val( data.instancia.telefono_madre );       }
                                if( data.instancia.dni_madre !== "" )       {   $("#dnimadre-form-cantera").val( data.instancia.dni_madre );            }
                                if( data.instancia.estudios_madre !== "" )  {   $("#estudiosmadre-form-cantera").val( data.instancia.estudios_madre );  }

                                //  Datos del padre
                                $("#nombrepadre-form-cantera").val( data.instancia.nombre_padre );
                                var valor_NombrePadre_form_cantera =         $('#nombrepadre-form-cantera').val().toUpperCase();
                                $('#nombrepadre-form-cantera').val(valor_NombrePadre_form_cantera);
                                if( data.instancia.apellidos_padre !== "" ) {   $("#apellidospadre-form-cantera").val( data.instancia.apellidos_padre );      }
                                if( data.instancia.email_padre !== "" )     {   $("#emailpadre-form-cantera").val( data.instancia.email_padre );    }
                                if( data.instancia.telefono_padre !== "" )  {   $("#tlfpadre-form-cantera").val( data.instancia.telefono_padre );   }
                                if( data.instancia.dni_padre !== "" )       {   $("#dnipadre-form-cantera").val( data.instancia.dni_padre );        }
                                if( data.instancia.estudios_padre !== "" )  {   $("#estudiospadre-form-cantera").val( data.instancia.estudios_padre );  }

                                if( data.instancia.monoparental === "1" )
                                {   $("#familia-form-cantera").val("1");    }
                                else
                                {   $("#familia-form-cantera").val("0");    }

                                if( data.instancia.monoparental === "1" && data.instancia.nombre_madre!=="" && data.instancia.nombre_padre!=="")
                                {}
                                else if( data.instancia.monoparental === "1" && data.instancia.nombre_madre!=="")
                                {   
                                    $("#tipo-familia-monoparental-madre-padre").val("madre");   

                                    $("#nombrepadre-form-cantera").prop("disabled", true);     $("#nombrepadre-form-cantera").val("");
                                    $("#apellidospadre-form-cantera").prop("disabled", true);  $("#apellidospadre-form-cantera").val("");
                                    $("#dnipadre-form-cantera").prop("disabled", true);        $("#dnipadre-form-cantera").val("");
                                    $("#tlfpadre-form-cantera").prop("disabled", true);        $("#tlfpadre-form-cantera").val("");
                                    $("#emailpadre-form-cantera").prop("disabled", true);      $("#emailpadre-form-cantera").val("");
                                    $("#estudiospadre-form-cantera").prop("disabled", true);   $("#estudiospadre-form-cantera").val("");
                                }
                                else if( data.instancia.monoparental === "1" && data.instancia.nombre_padre!=="")
                                {   
                                    $("#tipo-familia-monoparental-madre-padre").val("padre");   

                                    $("#nombremadre-form-cantera").prop("disabled", true);     $("#nombremadre-form-cantera").val("");
                                    $("#apellidosmadre-form-cantera").prop("disabled", true);  $("#apellidosmadre-form-cantera").val("");
                                    $("#dnimadre-form-cantera").prop("disabled", true);        $("#dnimadre-form-cantera").val("");
                                    $("#tlfmadre-form-cantera").prop("disabled", true);        $("#tlfmadre-form-cantera").val("");
                                    $("#emailmadre-form-cantera").prop("disabled", true);      $("#emailmadre-form-cantera").val("");
                                    $("#estudiosmadre-form-cantera").prop("disabled", true);   $("#estudiosmadre-form-cantera").val("");
                                }
                                else
                                {}


                                /*******************************
                                *   PLAN B: PASO 5. FOTOS, DOCUMENTOS
                                ********************************/  


                                /*******************************
                                *   PLAN B: PASO 6. DATOS BANCO
                                ********************************/  
                                $("#titular-form-cantera").val( data.instancia.titular_banco );
                                var valor_titular_form_cantera = $('#titular-form-cantera').val().toUpperCase();
                                $('#titular-form-cantera').val(valor_titular_form_cantera);
                                $("#dnititular-form-cantera").val( data.instancia.dni_titular );
                                if(data.instancia.iban!=="")    {   $("#iban-input").val( data.instancia.iban );    }
                                if(data.instancia.entidad!=="") {   $("#entidad-input").val( data.instancia.entidad );  }
                                if(data.instancia.oficina!=="") {   $("#oficina-input").val( data.instancia.oficina );  }
                                if(data.instancia.dc!=="")      {   $("#dc-input").val( data.instancia.dc );    }
                                if(data.instancia.cuenta!=="")  {   $("#cuenta").val( data.instancia.cuenta );  }

                                
                                /*******************************
                                *   PLAN B: HORARIOS
                                ********************************/  
                                if( data.instancia.lunes !== "" )       {   $("#lunes-form-cantera").text( data.instancia.lunes);}         else{   $("#lunes-form-cantera").text( "-" );   }
                                if( data.instancia.martes !== "" )      {   $("#martes-form-cantera").text( data.instancia.martes);}       else{   $("#-form-cantera").val("-");   }
                                if( data.instancia.miercoles !== "" )   {   $("#miercoles-form-cantera").text( data.instancia.miercoles);} else{   $("#-form-cantera").val("-");   }
                                if( data.instancia.jueves !=="" )       {   $("#jueves-form-cantera").text( data.instancia.jueves);}       else{   $("#-form-cantera").val("-");   }
                                if( data.instancia.viernes !=="" )      {   $("#viernes-form-cantera").text( data.instancia.viernes);}     else{   $("#-form-cantera").val("-");   }
                            
                                //  Cerramos el modal
                                $('#varios-hijos-modal').modal('hide');
                                
                                //  Scroll hacia la edición del formulario
                                $('html, body').animate({scrollTop: $("#confirmacion-puede-editarse-jugador").offset().top},250);
                                
                                //  Eliminar Disabled
                                EliminaDisabled();
                            }
                            else
                            {
                                $(".renovacion-row").hide();
                                $("#paso-2-dni-tutor-container").show();
                                //$("#paso-2-dni-jugador-container").show();
                                $("#inscripciones-cantera-form-respuesta").show();
                                $("#inscripciones-cantera-form-respuesta").html("<div class='col-12'><div class='alert alert-danger col-12'><h4>"+data.message+"</h4></div></div>");
                            }
                        },
                        error:  function(errorData)
                        {
                            alert("Hubo un error al cargar los datos del jugador (1237)");
                            console.log("error "+errorData);
                        }
                    });
                }
            });
            
            /*  PASO 4 - DATOS DE LA FAMILIA    */
            //  Cambio de tipo de campo muestra un "valor" o otro
            $('body').on('change','#numhermanos-form-cantera',function()
            {
                if($("#numhermanos-form-cantera").val()!=="0")
                {   
                    $("#edades-hermanos-container-completo").show();
                    $("#edades-hermanos-container").html("");
                    var i;
                    for (i = 0; i < $("#numhermanos-form-cantera").val(); i++)
                    {   
                        $("#edades-hermanos-container").append('<div class="col-4 col-sm-4 col-md-2"><div class="form-group mt-0"><input type="number" class="form-control edad-hermano" min="0" step="1" name="edades" required></div></div>');   
                    }
                } 
                else
                {   
                    $("#edades-hermanos-container").html("");
                    $("#edades-hermanos-container-completo").hide();
                }
            });



            //  BLOQUE FAMILIA. Activar radio button madre o padre
            $("#tipo-familia-monoparental-madre-padre").change(function(){ 
                if($(this).val()==="madre")
                {   
                    $("#nombremadre-form-cantera").prop("disabled", false);     
                    $("#apellidosmadre-form-cantera").prop("disabled", false);  
                    $("#dnimadre-form-cantera").prop("disabled", false);        
                    $("#tlfmadre-form-cantera").prop("disabled", false);        
                    $("#emailmadre-form-cantera").prop("disabled", false);      
                    $("#estudiosmadre-form-cantera").prop("disabled", false);   
                                    
                    $("#nombrepadre-form-cantera").prop("disabled", true);     $("#nombrepadre-form-cantera").val("");
                    $("#apellidospadre-form-cantera").prop("disabled", true);  $("#apellidospadre-form-cantera").val("");
                    $("#dnipadre-form-cantera").prop("disabled", true);        $("#dnipadre-form-cantera").val("");
                    $("#tlfpadre-form-cantera").prop("disabled", true);        $("#tlfpadre-form-cantera").val("");
                    $("#emailpadre-form-cantera").prop("disabled", true);      $("#emailpadre-form-cantera").val("");
                    $("#estudiospadre-form-cantera").prop("disabled", true);   $("#estudiospadre-form-cantera").val("");
                }
                else if($(this).val()==="padre")
                {
                    $("#nombrepadre-form-cantera").prop("disabled", false);     
                    $("#apellidospadre-form-cantera").prop("disabled", false);  
                    $("#dnipadre-form-cantera").prop("disabled", false);       
                    $("#tlfpadre-form-cantera").prop("disabled", false);        
                    $("#emailpadre-form-cantera").prop("disabled", false);      
                    $("#estudiospadre-form-cantera").prop("disabled", false);   
                    
                    $("#nombremadre-form-cantera").prop("disabled", true);     $("#nombremadre-form-cantera").val("");
                    $("#apellidosmadre-form-cantera").prop("disabled", true);  $("#apellidosmadre-form-cantera").val("");
                    $("#dnimadre-form-cantera").prop("disabled", true);        $("#dnimadre-form-cantera").val("");
                    $("#tlfmadre-form-cantera").prop("disabled", true);        $("#tlfmadre-form-cantera").val("");
                    $("#emailmadre-form-cantera").prop("disabled", true);      $("#emailmadre-form-cantera").val("");
                    $("#estudiosmadre-form-cantera").prop("disabled", true);   $("#estudiosmadre-form-cantera").val("");
                }
                else 
                {
                    $("#nombremadre-form-cantera").prop("disabled", false);     
                    $("#apellidosmadre-form-cantera").prop("disabled", false); 
                    $("#dnimadre-form-cantera").prop("disabled", false);        
                    $("#tlfmadre-form-cantera").prop("disabled", false);        
                    $("#emailmadre-form-cantera").prop("disabled", false);     
                    $("#estudiosmadre-form-cantera").prop("disabled", false);   
                    
                    $("#nombrepadre-form-cantera").prop("disabled", false);     
                    $("#apellidospadre-form-cantera").prop("disabled", false); 
                    $("#dnipadre-form-cantera").prop("disabled", false);       
                    $("#tlfpadre-form-cantera").prop("disabled", false);      
                    $("#emailpadre-form-cantera").prop("disabled", false);    
                    $("#estudiospadre-form-cantera").prop("disabled", false);
                }
            }); 
            
            
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
			}
            
            function EliminaDisabled()
            {               
                $("#tipodocjugador-form-cantera").prop("disabled", false);
                $("#dni-jugador-form-cantera").prop("disabled", false);
                $("#fechacad-jugador-form-cantera").prop("disabled", false);
                $("#nacionalidad-form-cantera").prop("disabled", false);

                $("#fechanac-form-cantera").prop("disabled", false);
                $("#nombre-form-cantera").prop("disabled", false);
                $("#apellidos-form-cantera").prop("disabled", false);

                $("#direccion-form-cantera").prop("disabled", false);
                $("#numero-form-cantera").prop("disabled", false);
                $("#piso-form-cantera").prop("disabled", false);
                $("#puerta-form-cantera").prop("disabled", false);

                $("#cp-form-cantera").prop("disabled", false);
                $("#poblacion-form-cantera").prop("disabled", false);
                $("#provincia-form-cantera").prop("disabled", false);

                $("#sexojugador-form-cantera").prop("disabled", false);
                $("#paisnac-form-cantera").prop("disabled", false);
                $("#anyosclub-form-cantera").prop("disabled", false);
                $("#alergias-form-cantera").prop("disabled", false);

                $("#tlfjugador-form-cantera").prop("disabled", false);
                $("#email-form-cantera").prop("disabled", false);

                $("#colegio-form-cantera").prop("disabled", false);
                $("#curso-form-cantera").prop("disabled", false);

                $("#numhermanos-form-cantera").prop("disabled", false);
                $("#familia-form-cantera").prop("disabled", false);
                $("#tipo-familia-monoparental-madre-padre").prop("disabled", false);
                
                $("#nombremadre-form-cantera").prop("disabled", false);
                $("#apellidosmadre-form-cantera").prop("disabled", false);
                $("#dnimadre-form-cantera").prop("disabled", false);
                $("#tlfmadre-form-cantera").prop("disabled", false);
                $("#emailmadre-form-cantera").prop("disabled", false);
                $("#estudiosmadre-form-cantera").prop("disabled", false);

                $("#nombrepadre-form-cantera").prop("disabled", false);
                $("#apellidospadre-form-cantera").prop("disabled", false);
                $("#dnipadre-form-cantera").prop("disabled", false);
                $("#tlfpadre-form-cantera").prop("disabled", false);
                $("#emailpadre-form-cantera").prop("disabled", false);
                $("#estudiospadre-form-cantera").prop("disabled", false);

                $("#titular-form-cantera").prop("disabled", false);
                $("#dnititular-form-cantera").prop("disabled", false);
                $("#iban-input").prop("disabled", false);
                $("#entidad-input").prop("disabled", false);
                $("#oficina-input").prop("disabled", false);
                $("#dc-input").prop("disabled", false);
                $("#cuenta").prop("disabled", false);
            }
            
            $(".edad-hermano").rules("add", { 
                required:true,  
                min:0
            });
            
            //  Guardar submit-formulario-inscripcion-cantera
            
            $('#inscripciones-cantera-form').validate(
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
                       
                    if($("#dni-jugador-form-cantera").val()==="")
                    {   
                        return false;   
                    }
                    else
                    {
                        var formData = new FormData();

                        /*******************
                         * DATOS JUGADOR 
                         *******************/
                        formData.append("jugador_id",               $("#jugador_id").val());          //  RADIO BUTTON
                        //  Fila 1
                        formData.append("tipoinscripcion",          $("input[name='tipoinscripcion']:checked").val());          //  RADIO BUTTON
                        formData.append("jugador_tipo_documento",   $("#tipodocjugador-form-cantera option:selected").val());   //  <select>
                        formData.append("jugador_dni",              $("#dni-jugador-form-cantera").val());  
                        formData.append("jugador_fecha_caducidad",  $("#fechacad-jugador-form-cantera").val());  
                        formData.append("jugador_nacionalidad",     $("#nacionalidad-form-cantera").val());  
                        //  Fila 2
                        formData.append("jugador_fecha_nacimiento", $("#fechanac-form-cantera").val());  
                        formData.append("jugador_nombre",           $("#nombre-form-cantera").val());  
                        formData.append("jugador_apellidos",        $("#apellidos-form-cantera").val());  
                        //  Fila 3
                        formData.append("jugador_direccion",        $("#direccion-form-cantera").val());  
                        formData.append("jugador_numero",           $("#numero-form-cantera").val());  
                        formData.append("jugador_piso",             $("#piso-form-cantera").val());  
                        formData.append("jugador_puerta",           $("#puerta-form-cantera").val());  
                        //  Fila 4
                        formData.append("jugador_cp",               $("#cp-form-cantera").val());  
                        formData.append("jugador_poblacion",        $("#poblacion-form-cantera").val());  
                        formData.append("jugador_provincia",        $("#provincia-form-cantera").val());  
                        //  Fila 5
                        formData.append("jugador_sexo",             $("#sexojugador-form-cantera option:selected").val());  
                        formData.append("jugador_pais_nacimiento",  $("#paisnac-form-cantera").val());  
                        //formData.append("jugador_talla_camiseta",   $("#talla-form-cantera option:selected").val());  
                        formData.append("jugador_anyos_club",       $("#anyosclub-form-cantera").val());  
                        //  Fila 6
                        formData.append("jugador_alergias",         $("#alergias-form-cantera").val());  
                        formData.append("jugador_email_jugador",    $("#email-form-cantera").val());  
                        formData.append("jugador_equipo",           $("#equipo-form-cantera").val());  
                        formData.append("jugador_telefono",         $("#tlfjugador-form-cantera").val()); 
                        formData.append("jugador_colegio",          $("#colegio-form-cantera").val()); 
                        formData.append("jugador_curso",            $("#curso-form-cantera").val());  

                        /*******************
                        * DATOS FAMILIA 
                        *******************/
                        formData.append("familia_num_hermanos",                 $("#numhermanos-form-cantera").val());                          //  NUMERO HERMANOS
                        var  array_edades =  "";                                $(".edad-hermano").each(function(){   array_edades  =   array_edades+"-"+$(this).val();});
                        formData.append("familia_edades_hermanos",              array_edades);  //  EDADES HERMANOS
                        formData.append("familia_monoparental",                 $("#familia-form-cantera option:selected").val());                    //  MONOPARENTAL
                        formData.append("familia_monoparental_padre_madre",     $("#tipo-familia-monoparental-madre-padre option:selected").val());       //  PADRE O MADRE

                        //  Madre
                        formData.append("madre_nombre",     $("#nombremadre-form-cantera").val());  
                        formData.append("madre_apellidos",  $("#apellidosmadre-form-cantera").val());  
                        formData.append("madre_dni",        $("#dnimadre-form-cantera").val());  
                        formData.append("madre_telefono",   $("#tlfmadre-form-cantera").val());  
                        formData.append("madre_email",      $("#emailmadre-form-cantera").val());  
                        formData.append("madre_estudios",   $("#estudiosmadre-form-cantera option:selected").val());  

                        //  Padre
                        formData.append("padre_nombre",     $("#nombrepadre-form-cantera").val());  
                        formData.append("padre_apellidos",  $("#apellidospadre-form-cantera").val());  
                        formData.append("padre_dni",        $("#dnipadre-form-cantera").val());  
                        formData.append("padre_telefono",   $("#tlfpadre-form-cantera").val());  
                        formData.append("padre_email",      $("#emailpadre-form-cantera").val());  
                        formData.append("padre_estudios",   $("#estudiospadre-form-cantera option:selected").val());  

                        //  Cuenta bancaria
                        formData.append("banco_devoluciones",           $("input[name='autorizo-pago-extra']:checked").val());                      
                        formData.append("banco_titular",                $("#titular-form-cantera").val());  
                        formData.append("banco_dni",                    $("#dnititular-form-cantera").val());  
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

                        //  ARCHIVOS
                        formData.append("archivo_foto",             $("#archivo_foto").val());
                        formData.append("archivo_dni_frontal",      $("#archivo_dni_frontal").val());
                        formData.append("archivo_dni_trasero",      $("#archivo_dni_trasero").val());
                        formData.append("archivo_dni_sip",          $("#archivo_sip").val());
                        formData.append("archivo_dni_pasaporte",    $("#archivo_pasaporte").val());

    //                    formData.append("files[]", $("#archivo_foto")[0].files[0]);
    //                    formData.append("files[]", $("#archivo_dni_frontal")[0].files[0]);
    //                    formData.append("files[]", $("#archivo_dni_trasero")[0].files[0]);
    //                    formData.append("files[]", $("#archivo_sip")[0].files[0]);
    //                    formData.append("files[]", $("#archivo_pasaporte")[0].files[0]);

                        formData.append('foto',       $('#archivo_foto')[0].files[0]); 
                        formData.append('dnifrontal', $('#archivo_dni_frontal')[0].files[0]); 
                        formData.append('dnitrasero', $('#archivo_dni_trasero')[0].files[0]); 
                        formData.append('sip',        $('#archivo_sip')[0].files[0]); 
                        formData.append('pasaporte',  $('#archivo_pasaporte')[0].files[0]); 

                        $.ajax(
                        {
                            type:           "POST",
                            url:            "?r=inscripciones/InscripcionCantera2020",
                            data:           formData,
                            processData:    false,          // tell jQuery not to process the data
                            contentType:    false,          // tell jQuery not to set contentType
                            dataType:       "json",
                            beforeSend:     function()
                            {
                                $("#inscripciones-cantera-form-espera").show(150);
                                $("#submit-formulario-inscripcion-cantera").prop("disabled", true);
                                //$("submit-formulario-inscripcion-cantera").css("background-color", "#777");
                            },
                            success:        function(data)
                            {
                                if(data.response==="success")
                                {   
                                    $("#inscripciones-cantera-form-espera").hide();
                                    $("#inscripciones-cantera-form-respuesta").html("<div class='alert alert-success'><h4>" + data.message + "</h4></div>");
                                    window.location.href = "index.php?r=inscripciones/InscripcionCantera2020OK&ruta_pdf="+data.ruta_pdf;
                                }
                                else
                                {
                                    $("#inscripciones-cantera-form-espera").hide();
                                    //  Permito volver a enviar
                                    $("#submit-formulario-inscripcion-cantera").prop("disabled", false);
                                    $("submit-formulario-inscripcion-cantera").css("background-color", "#000");

                                    $("#inscripciones-cantera-form-respuesta").html("<div class='col-12'><div class='alert alert-danger'>" + data.message + "</div></div>");
                                    $("#inscripciones-cantera-form-respuesta").fadeTo(5000, 500).slideUp(500, function(){
                                        $("#inscripciones-cantera-form-respuesta").slideUp(500);
                                        $("#inscripciones-cantera-form-respuesta").html("");
                                    });
                                }
                            },
                            error:          function(errorData)
                            {
                                $("#submit-formulario-inscripcion-cantera").prop("disabled", false);
                                console.log("error ");
                            }
                        });
                    }
                }
            });

            /*************************************
            *   CANVAS FIRMA SOLICITANTE        
            **************************************/ 
            // VARIABLES
            let miCanvas    = document.querySelector('#pizarra');
            let lineas      = [];
            let correccionX = 0;
            let correccionY = 0;
            let pintarLinea = false;
            let posicion    = miCanvas.getBoundingClientRect();
            correccionX     = posicion.x;
            correccionY     = posicion.y;
            miCanvas.width  = 500;
            miCanvas.height = 250;
            //  500x215

            // FUNCIONES
            /** Funcion que empieza a dibujar la linea */
            function empezarDibujo () {
                pintarLinea = true;
                lineas.push([]);
            };

            /** Funcion dibuja la linea */
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

            /** Funcion que deja de dibujar la linea */
            function pararDibujar(){
                pintarLinea = false;
            }

            // EVENTOS
            // Eventos raton
            miCanvas.addEventListener('mousedown', empezarDibujo, false);
            miCanvas.addEventListener('mousemove', dibujarLinea, false);
            miCanvas.addEventListener('mouseup', pararDibujar, false);

            // Eventos pantallas táctiles
            miCanvas.addEventListener('touchstart', empezarDibujo, false);
            miCanvas.addEventListener('touchmove', dibujarLinea, false);
            
            $( "#limpiar" ).on( "click", function(){
                let ctx = miCanvas.getContext('2d');
                ctx.clearRect(0, 0, miCanvas.width, miCanvas.height);
                lineas.length = 0;
                $( "#img_firma_jugador").val("");
            });


            /*************************************
            *   CANVAS FIRMA TUTOR        
            **************************************/ 
            // VARIABLES
            let miCanvas1       = document.querySelector('#pizarra1');
            let lineas1         = [];
            let correccionX1    = 0;
            let correccionY1    = 0;
            let pintarLinea1    = false;
            let posicion1       = miCanvas1.getBoundingClientRect();
            correccionX1        = posicion1.x;
            correccionY1        = posicion1.y;
            miCanvas1.width     = 500;
            miCanvas1.height    = 250;

            // FUNCIONES
            /** Funcion que empieza a dibujar la linea  */
            function empezarDibujo1 () {
                pintarLinea1 = true;
                lineas1.push([]);
            };

            /** Funcion dibuja la linea */
            function dibujarLinea1 (event)
            {
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

            /** Funcion que deja de dibujar la linea */
            function pararDibujar1 () {
                    pintarLinea1 = false;
                }

            // EVENTOS
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
            function isCanvasBlank(canvas)
            {
                return !canvas.getContext('2d')
                .getImageData(0, 0, canvas.width, canvas.height).data
                .some(channel => channel !== 0);
            }
            
                        /*  PASO 2 - PLAN B: BUSCAMOS JUGADORES A PARTIR DEL DNI DEL PADRE / MADRE / TUTOR  
            $( "#buscar-jugador-dni-padremadre").on( "click", function()
            {            
                if( $("#validacion-dni-padremadre").val().trim() !== "" &&  ((parseInt($("#validacion-dni-padremadre").val().length)) > 7))
                {
                    var form_data = {debug:"true",jugadores_dni_padremadre: $("#validacion-dni-padremadre").val().trim(),formulario:"cantera"};

                    $.ajax({
                        type:       "POST",
                        url:        "?r=jugadores/CargarPorDNIPadreMadre",
                        data:       form_data,
                        dataType:   "json",
                        success:    function (data) 
                        {
                            
                            $("#inscripciones-cantera-form-espera").hide();
                            $("#paso-2-dni-tutor-error-dni").hide();
                            $("#paso-2-dni-tutor-respuesta").html("").hide(); 
                            
                            if(data.response==="success")
                            {
                                $('#varios-hijos-modal').modal('show');
                                $("#validacion-dni-select").html(data.select_jugadores);
                                
                                //$("#paso-2-dni-tutor-selector-jugador").show("250");
                                
                            }   
                            else{
                                $("#paso-2-dni-tutor-selector-jugador").show("250");
                                $("#validacion-dni-select").html(data.select_jugadores);
                                $("#paso-2-dni-tutor-respuesta").show(); 
                                $("#paso-2-dni-tutor-respuesta").html("<div class='alert alert-danger col-12'><h4>"+data.message+"</h4></div>"); 
                            }
                        }
                    });
                }
                else{
                    $("#paso-2-dni-tutor-selector-jugador").hide("250");
                    $("#paso-2-dni-tutor-error-dni").show();
                    $(".renovacion-row").hide();
                }
            });
            */
        </script>
    </body>
</html>