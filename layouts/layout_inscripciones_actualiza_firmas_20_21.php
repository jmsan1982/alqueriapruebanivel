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
                        
                        
                        <!-- Imagen escudo y titulo -->
                        <div class="row" >
                            <!-- <div class="col-12 col-md-3 col-lg-3 col-xl-3" id="escudo">
                                <img class="img-responsive" src="img/escudo-cantera.png" style="margin: 0 auto;" alt="Escudo Cantera L´Alqueria del Basket">
                            </div> -->

                            <div class="col-12 col-md-6 col-lg-6 col-xl-6" id="titulo">
                                <h2 class="section-title">
                                     <span class="orange-text"><?php echo $lang["menu_inicio_matriculas_acualizar_firmas"];?></span>
                                </h2>
                                <h3 class="section-title mb-2"><?php echo $lang["ins_cantera_ficha"];?></h3>
                            </div>
                            
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
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

                        <div class="row mt-1" >
                            <div class="col-12">
                                <form id="inscripciones-modif-firmas-form" class="boxed-form" method="post">

                                    <!-- Paso 1: Elegir RENOVACION o NUEVA INSCRIPCION -->
                                    <!-- Si marcan "nueva inscripcion" mostramos inscripciones-cantera-mensaje-nueva-inscripcion -->
                                    <!-- Si marcan "renovacion" mostramos el resto de <div> que tienen la class="renovacion-row" -->
                                    <div class="row">
                                        <div class="col-6 mb-1" style="font-size: 1.8em; display:none;">
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

                                       <!--  <div class="form-group col-12 mb-1">
                                            <div id="inscripciones-cantera-mensaje-nueva-inscripcion" class="alert alert-danger redimension" role="alert" style="display:none;">
                                                <h4><i class="fa fa-info-circle" aria-hidden="true"></i><?php //echo $lang["ins_cantera_nueva_inscripcion"];?></h4>
                                            </div>
                                        
                                            <div id="inscripciones-cantera-mensaje-renovacion-inscripcion" class="alert alert-info redimension" role="alert">
                                                <h4><i class="fa fa-info-circle" aria-hidden="true"></i><?php //echo $lang["ins_cantera_renovacion_inscripcion"];?></h4>
                                            </div>
                                        </div> -->
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
                                       <!--  <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 redimension">
                                            <label style="font-weight:bold;font-size:20px;"><?php echo $lang["ins_form_dni_tutor_1"];?><small><?php echo $lang["ins_form_dni_tutor_2"];?></small></label>
                                            <input type="text" id="validacion-dni-padremadre" class="form-control" name="validacion-dni-padremadre" 
                                                   maxlength="50" disabled>                                            
                                        </div> -->
                                        
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
                                                
                                                <div class="form-group col-12 col-md-3 col-lg-3 col-xl-3">
                                                    <label><?php echo $lang["ins_form_numdoc"];?></label>
                                                    <input type="text" class="form-control input-control-dni" name="dnijugador" id="dni-jugador-form-cantera" maxlength="50" required disabled>
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


                                            
                                            <div class="col-4 mb-1" style="font-size: 16px;">
                                                <label id="tipo-inscripcion-renovacion" class="control control--radio tipoinscripcionseleccionada" class="control control--radio">
                                                    <?php echo $lang["ins_inscrip_act_firmas_opcion1"]; ?>
                                                    <input id="dosFirmas" type="radio" name="tipoinscripcion" value="3" checked>
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>

                                            <div class="col-4 mb-1" style="font-size: 16px;">
                                                <label id="tipo-inscripcion-nueva" class="control control--radio">
                                                    <?php echo $lang["ins_inscrip_act_firmas_opcion2"];?>
                                                    <input id="firmaSoli" type="radio" name="tipoinscripcion" value="2">
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>

                                            <div class="col-4" style="font-size: 16px;">
                                                <label id="tipo-inscripcion-nueva" class="control control--radio">
                                                    <?php echo $lang["ins_inscrip_act_firmas_opcion3"];?>
                                                    <input id="firmaTut" type="radio" name="tipoinscripcion" value="1">
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                            <br>
                                            

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
                                            <input type="hidden" id="id_inscripcion" value="">
                                            <button id="submit-formulario-inscripcion-cantera" class="btn btn-link-w w-100 input-control-dni" type="submit" style="width:100%;margin-left:0px;" id="submit">
                                                <span><?php echo $lang["inscripcion_actualizar_firmas_botonenvio"];?></span>
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
                    /*$("#tipo-inscripcion-renovacion").removeClass("tipoinscripcionseleccionada");  
                    $("#tipo-inscripcion-nueva").addClass("tipoinscripcionseleccionada");  
                    
                    $("#inscripciones-cantera-mensaje-renovacion-inscripcion").hide("250");  
                    $("#inscripciones-cantera-mensaje-nueva-inscripcion").show("250"); 
                    
                    $("#dni-jugador").prop("disabled", true);
                    $("#validacion-dni-padremadre").prop("disabled", true);
                    $("#codigo-verificacion").prop("disabled", true);*/
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
                        //jugadores_dni_tutor:    $("#validacion-dni-padremadre").val().trim(),
                        formulario:             "cantera"
                    };
                    
                    $.ajax({
                        type:       "POST",
                        url:        "?r=jugadores/CargarJugadorInscrito_20_21",
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
                                   // EliminaDisabled();

                                    /****************************************************************
                                    *   PLAN A (cargar desde DNI jugador): PASO 3. DATOS JUGADOR    
                                    ****************************************************************/
                                    $("#jugador_id").val( data.instancia.id_jugador);

                                    $("#id_inscripcion").val( data.instancia.id_inscripcion);

                                    //  FILA 1
                                    
                                    if( data.instancia["dni_jugador"] !== "" )        {   $("#dni-jugador-form-cantera").val(data.instancia.dni_jugador);           }
                                   
                                   

                                    //  FILA 2
                                    $("#nombre-form-cantera").val( data.instancia.nombre);
                                    var valor_nombre_form_cantera = $('#nombre-form-cantera').val().toUpperCase();
                                    $('#nombre-form-cantera').val(valor_nombre_form_cantera);
                                    $("#apellidos-form-cantera").val( data.instancia.apellidos);
                                    var valor_apellidos_form_cantera = $('#apellidos-form-cantera').val().toUpperCase();
                                    $('#apellidos-form-cantera').val(valor_apellidos_form_cantera);

                                    
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
               // $("#tipodocjugador-form-cantera").prop("disabled", false);
                $("#dni-jugador-form-cantera").prop("disabled", false);
              //  $("#fechacad-jugador-form-cantera").prop("disabled", false);
              //  $("#nacionalidad-form-cantera").prop("disabled", false);

              //  $("#fechanac-form-cantera").prop("disabled", false);
                $("#nombre-form-cantera").prop("disabled", false);
                $("#apellidos-form-cantera").prop("disabled", false);

               /* $("#direccion-form-cantera").prop("disabled", false);
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
                $("#cuenta").prop("disabled", false);*/
            }
            
            
            
            //  Guardar submit-formulario-inscripcion-cantera

            var actFirma = "dos";

            $(document).on('change',function () {
                if($('#dosFirmas').is(':checked'))  actFirma = "dos";
                else if($('#firmaTut').is(':checked'))  actFirma = "tut";
                else if($('#firmaSoli').is(':checked')) actFirma = "sol";
            });
            
            $('#inscripciones-modif-firmas-form').validate(
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
                        formData.append("jugador_id",               $("#jugador_id").val());        
                       
                        
                        formData.append("id_inscripcion",           $("#id_inscripcion").val());   

                        


                        //  Las 2 imágenes de las firmas en "BLOB"
                        formData.append("firma_jugador",    $("#img_firma_jugador").val());
                        formData.append("firma_tutor",      $("#img_firma_tutor").val());
                        formData.append("actFirma",         actFirma);

                        $.ajax(
                        {
                            type:           "POST",
                            url:            "?r=inscripciones/InscripcionActualizarFirmas2021",
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

                                    $("#inscripciones-cantera-form-respuesta").show(150);
                                    $("#inscripciones-cantera-form-respuesta").html("<div class='alert alert-success'><h4>" + data.message + "</h4></div>");
                                    //window.location.href = "index.php?r=inscripciones/InscripcionCantera2020OK&ruta_pdf="+data.ruta_pdf;
                                }
                                else
                                {
                                    $("#inscripciones-cantera-form-espera").hide();
                                    //  Permito volver a enviar
                                    $("#submit-formulario-inscripcion-cantera").prop("disabled", false);
                                    $("submit-formulario-inscripcion-cantera").css("background-color", "#000000");

                                     $("#inscripciones-cantera-form-respuesta").show(150);

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