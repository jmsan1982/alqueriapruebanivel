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
                        
                        <!-- Título y soporte técnico -->
                        <div class="row" >
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6" id="titulo">
                                <h2 class="section-title">
                                     <span class="orange-text"><?php echo $lang["menu_inicio_matriculas_acualizar_imagenes"];?></span>
                                </h2>
                                <h3 class="section-title mb-2"><?php echo $lang["ins_cantera_ficha"];?></h3>
                            </div>
                            
                            <!-- Soporte tecnico -->
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

                        <div class="row mt-1">
                            <div class="col-12">
                                <form id="inscripciones-actualizar-imagenes-form" class="boxed-form" method="post">
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
                                    
                                    <div class="row renovacion-row">
                                        
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
                                    
                                    <!-- Datos de texto del jugador/a -->
                                    <div class="row mt-1 renovacion-row">
                                        <div class="col-12">
                                            <hr style="color:black;border:1px solid #ccc;">
                                        </div>

                                        <div class="col-12">
                                            <h4 class="mt-0 mb-1"><strong><?php echo $lang["ins_form_datosjugador"];?></strong></h4>
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
                                        
                                        <div id="imagenes-guardadas" class="col-12" style="display:none;">
                                            <div class="row">
                                                <div class="col-6">
                                                    <h4 class="mt-0 mb-0"><?php echo $lang["licencia_siguiente_paso_foto_jugador"];?></h4>
                                                    <img id="img-foto" class="img-responsive border pb-0" style="margin: 0 auto;border:1px solid #ddd;">
                                                </div>
                                                <div class="col-6">
                                                    <h4 class="mt-0 mb-0"><?php echo $lang["licencia_siguiente_paso_dni_frontal"];?></h4>
                                                    <img id="img-dni-delante" class="img-responsive border pb-0" style="margin: 0 auto;border:1px solid #ddd;">
                                                </div>
                                                <div class="col-6">
                                                    <h4 class="mt-0 mb-0"><?php echo $lang["licencia_siguiente_paso_dni_detras"];?></h4>
                                                    <img id="img-dni-detras" class="img-responsive border pb-0" style="margin: 0 auto;border:1px solid #ddd;">
                                                </div>
                                                <div class="col-6">
                                                    <h4 class="mt-0 mb-0">SIP</h4>
                                                    <img id="img-sip" class="img-responsive border pb-0" style="margin: 0 auto;border:1px solid #ddd;">
                                                </div>
                                                <div class="col-6">
                                                    <h4 class="mt-0 mb-0"><?php echo $lang["ins_form_fotos_pasaporte"];?></h4>
                                                    <img id="img-pasaporte" class="img-responsive border pb-0" style="margin: 0 auto;border:1px solid #ddd;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                     
                                    <!-- Subida de ficheros: foto, DNI, pasaporte, SIP -->
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

                                        <!-- IMÁGENES DEMO -->
                                        <div class="col-12 col-md-6">
                                            <h4 id="foto-jugador-h4" class="mb-0" style="color:red;"><strong><?php echo $lang["ins_form_fotos_ejemplo"];?><i class="fa fa-times" aria-hidden="true"></i> </strong></h4>
                                            <img class="img-responsive border pb-0" src="img/inscripciones2020/inscripciones-alqueria-ejemplo-documento-mal.jpg" style="margin: 0 auto;border:1px solid #ddd;">
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <h4 id="foto-jugador-h4" class="mb-0" style="color:darkgreen;"><strong><?php echo $lang["ins_form_fotos_ejemplo"];?><i class="fa fa-check" aria-hidden="true"></i> </strong></h4>
                                            <img class="img-responsive border" src="img/inscripciones2020/inscripciones-alqueria-demo-documento-bien.png" style="margin: 0 auto;border:1px solid #ddd;">
                                        </div>

                                        <!-- SUBIR DOCUMENTOS -->
                                        <div class="col-12">
                                            <div class="row">
                                                <!-- FOTO JUGADOR -->
                                                <div class="col-12 col-md-6">
                                                    <label>
                                                        <h4 id="foto-jugador-h4"><strong><?php echo $lang["licencia_siguiente_paso_foto_jugador"];?></strong></h4>
                                                        <input id="archivo_foto" 
                                                               type="file"  name="foto" accept="image/png, image/jpeg" data-max-size="2048" 
                                                               style="border: none !important;" class="limite2mb">
                                                    </label>
                                                </div>

                                                <!-- DNI FRONTAL -->
                                                <div class="col-12 col-md-6">
                                                    <label>
                                                    <h4><strong><?php echo $lang["licencia_siguiente_paso_dni_frontal"];?></strong></h4>
                                                        <input id="archivo_dni_frontal"
                                                               type="file" name="dni_jugador_imagen[]" accept="image/png, image/jpeg" data-max-size="2048" 
                                                               style="border: none !important;" class="limite2mb">
                                                    </label>
                                                </div>

                                                <!-- DNI DETRAS -->
                                                <div class="col-12 col-md-6">
                                                    <label>
                                                        <h4><strong><?php echo $lang["licencia_siguiente_paso_dni_detras"];?></strong></h4>
                                                        <input id="archivo_dni_trasero" 
                                                               type="file" name="dni_jugadordetras_imagen[]" accept="image/png,image/jpeg" data-max-size="2048" 
                                                               style="border: none !important;" class="limite2mb">
                                                    </label>
                                                </div>

                                                <!-- SIP -->
                                                <div class="col-12 col-md-6">
                                                    <label>
                                                        <h4 id="sip-jugador-h4"><strong>SIP</strong></h4>
                                                        <input id="archivo_sip"
                                                               type="file" name="sip" accept="image/png, image/jpeg" data-max-size="2048" 
                                                               style="border: none !important;" class="limite2mb">
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

                                  
                                    <!-- Envío de la solicitud -->
                                    <div class="row renovacion-row">
                                        <div class="col-12 col-lg-12 col-xl-12">
                                            <hr style="color:black;border:1px solid #ccc;">
                                        </div>
                                        
                                        <div id="submit-container" class="col-12 mt-2 mb-4" > 
                                            <!-- <input type="hidden" id="existe_inscripcion" value="0" name="existe_inscripcion"> -->
                                            <input type="hidden" id="jugador_id" value="">
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
            /*  PASO 2 - PLAN A: BUSCAMOS JUGADOR A PARTIR DEL DNI JUGADOR. */
            $( "#buscar-jugador-dni-jugador").on( "click", function()
            {
                if(($("#dni-jugador").val().trim() !== ""                &&  ((parseInt($("#dni-jugador").val().length)) > 7)           && 
                    $("#codigo-verificacion").val().trim() !== ""        &&  ((parseInt($("#codigo-verificacion").val().length)) > 5)   
                ))
                {
                    var form_data = {
                        debug:                  "false",
                        jugadores_dni_jugador:  $("#dni-jugador").val().trim(),
                        codigo_verificacion:    $("#codigo-verificacion").val().trim()
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
                                $("#imagenes-guardadas").show();
                                
                                if(data.instancia["foto"]!=="")
                                {    $("#img-foto").attr("src","inscripciones/"+data.instancia["foto"]);    }
                                else
                                {   }
                                
                                if(data.instancia["dni_delante"]!=="")
                                {    $("#img-dni-delante").attr("src","inscripciones/"+data.instancia["dni_delante"]);    }
                                else
                                {   }
                                
                                if(data.instancia["dni_detras"]!=="")
                                {    $("#img-dni-detras").attr("src","inscripciones/"+data.instancia["dni_detras"]);    }
                                else
                                {   }
                                
                                if(data.instancia["sip"]!=="")
                                {    $("#img-sip").attr("src","inscripciones/"+data.instancia["sip"]);    }
                                else
                                {   }
                                
                                if(data.instancia["pasaporte"]!=="")
                                {    $("#img-pasaporte").attr("src","inscripciones/"+data.instancia["pasaporte"]);    }
                                else
                                {   }

                                //  Cambiamos mensaje
                                $("#confirmacion-puede-editarse-jugador").html(data.confirmacion_editar_jugador);

                                $('html, body').animate({scrollTop: $("#confirmacion-puede-editarse-jugador").offset().top},250);

                                $("#jugador_id").val( data.instancia.id_jugador);

                                if( data.instancia["tipo_documento"] !== "" )     {   $("#tipodocjugador-form-cantera").val(data.instancia.tipo_documento);     }
                                if( data.instancia["dni_jugador"] !== "" )        {   $("#dni-jugador-form-cantera").val(data.instancia.dni_jugador);           }

                                $("#nombre-form-cantera").val( data.instancia.nombre);
                                var valor_nombre_form_cantera = $('#nombre-form-cantera').val().toUpperCase();
                                $('#nombre-form-cantera').val(valor_nombre_form_cantera);
                                $("#apellidos-form-cantera").val( data.instancia.apellidos);
                                var valor_apellidos_form_cantera = $('#apellidos-form-cantera').val().toUpperCase();
                                $('#apellidos-form-cantera').val(valor_apellidos_form_cantera);
                            }
                            else
                            {   
                                $('#error-codigo-verificacion-dni-modal').modal('show');
                                
                                //  $(".renovacion-row").hide();
                                //  $("#inscripciones-cantera-form-espera").hide();
                                //  $("#paso-2-dni-jugador-container").show();
                                
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

            
            //  Envio del formulario
            $('#inscripciones-actualizar-imagenes-form').validate(
            {
                submitHandler:function()
                {
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
                        formData.append("id_inscripcion",           $("#id_inscripcion").val());   

                        //  ARCHIVOS
                        formData.append("archivo_foto",             $("#archivo_foto").val());
                        formData.append("archivo_dni_frontal",      $("#archivo_dni_frontal").val());
                        formData.append("archivo_dni_trasero",      $("#archivo_dni_trasero").val());
                        formData.append("archivo_dni_sip",          $("#archivo_sip").val());
                        formData.append("archivo_dni_pasaporte",    $("#archivo_pasaporte").val());

                        formData.append('foto',       $('#archivo_foto')[0].files[0]); 
                        formData.append('dnifrontal', $('#archivo_dni_frontal')[0].files[0]); 
                        formData.append('dnitrasero', $('#archivo_dni_trasero')[0].files[0]); 
                        formData.append('sip',        $('#archivo_sip')[0].files[0]); 
                        formData.append('pasaporte',  $('#archivo_pasaporte')[0].files[0]); 

                        $.ajax(
                        {
                            type:           "POST",
                            url:            "?r=inscripciones/InscripcionActualizarImagenes2020",
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
                                    alert("success");
                                    $("#inscripciones-cantera-form-espera").hide();
                                    $("#inscripciones-cantera-form-respuesta").show();
                                    $("#inscripciones-cantera-form-respuesta").html("<div class='alert alert-success'><h4>" + data.message + "</h4></div>");
                                    $("#imagenes-guardadas").hide();
                                    //$("#inscripciones-actualizar-imagenes-form").trigger("reset");
                                }
                                else
                                {
                                    alert("error");
                                    $("#inscripciones-cantera-form-espera").hide();
                                    //  Permito volver a enviar
                                    $("#submit-formulario-inscripcion-cantera").prop("disabled", false);
                                    $("submit-formulario-inscripcion-cantera").css("background-color", "#000");

                                    $("#inscripciones-cantera-form-respuesta").html("<div class='col-12'><div class='alert alert-danger'>" + data.message + "</div></div>");
//                                    $("#inscripciones-cantera-form-respuesta").fadeTo(5000, 500).slideUp(500, function(){
//                                        $("#inscripciones-cantera-form-respuesta").slideUp(500);
//                                        $("#inscripciones-cantera-form-respuesta").html("");
//                                    });
                                }
                            },
                            error:  function(errorData)
                            {
                                $("#submit-formulario-inscripcion-cantera").prop("disabled", false);
                                console.log("error ");
                            }
                        });
                    }
                }
            });
        </script>
    </body>
</html>