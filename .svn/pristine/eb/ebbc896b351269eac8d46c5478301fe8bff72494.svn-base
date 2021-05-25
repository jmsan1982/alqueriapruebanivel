<!DOCTYPE html>
<html lang="es">
    <?php require('includes/head.php'); ?>
    <link rel="stylesheet" href="css/forms.css">
    <link rel="stylesheet" href="css/parallax.css">
    <link rel="stylesheet" href="css/formus.css">

    <style>
        input[type="text"] {
            text-transform: uppercase;
        }
        input[type="email"] {
            text-transform: lowercase;
        }
    </style>

    <body class="Pages" id="formus">

        <div class="wrapper overflow-x-hidden">

            <?php require ("includes/header.php"); ?>

            <!-- Start Page-Content -->
            <section id="page-content" class="overflow-x-hidden margin-top-header">
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
                        <div class="row">
                            <div class="col-12 col-md-3 col-lg-3 col-xl-3" id="escudo">
                                <img class="img-responsive" src="img/escudo-cantera.png" style="margin: 0 auto;" alt="Escudo Cantera L´Alqueria del Basket">
                            </div>

                            <div class="col-12 col-md-9 col-lg-9 col-xl-9" id="titulo">
                                <h2 class="section-title">
                                    <?php echo $lang["escuela_titulo"];?> <span class="orange-text"><?php echo $lang["cantera"];?></span>
                                </h2>
                                <h3 class="section-title mb-2"><?php echo $lang["patronato_subtitulo"];?></h3>
                            </div>
                        </div>

                        <div class="row mt-1">
                            <div class="col-12">
                                <!-- 
                                    Este es el action que usa para que funcione el formulario:  action="?r=index/canteraform" 
                                    Como en diciembre 2019, José Luis pide que se bloqueen los formularios de ESCUELA y CANTERA 
                                -->
                                <form class="boxed-form" name="contactform" method="post">
                                    <input type="hidden" value="cantera" name="categoria">
                                    <input type="hidden" value="0" name="existe_inscripcion" id="existe_inscripcion">

                                    <!-- PARTE 0 FORM - validacion DNI -->
                                    <div class="row">
                                        <div class="form-group col-12 mb-1">
                                            <div class="alert alert-danger redimension" role="alert">
                                                <h4><i class="fa fa-info-circle" aria-hidden="true"></i> <?php echo $lang["escuela_mensaje_informacion1"];?></h4>
                                            </div>
                                        </div>

                                        <div class="form-group col-12 mb-1">
                                            <h4><?php echo $lang["escuela_mensaje_informacion_preform"];?></h4>
                                        </div>

                                        <div class="form-group col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 redimension">
                                            <label style="font-weight: bold; font-size: 20px;"><?php echo $lang["formulario_dni_titular_jugador"];?>:</label>
                                            <input readonly type="text" id="validacion-dni" class="form-control" name="validacion-dni" maxlength="50">                                            
                                        </div>

                                        <div class="form-group col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 redimension">
                                            <button type="button" class="btn btn-link-w w-100" name="buscar-validacion-dni" id="buscar-validacion-dni" style="max-height: 59px; margin-top: 28px; margin-left: 0;">
                                              <span><?php echo $lang["buscar"];?></span>  
                                            </button>
                                        </div>

                                        <div class="form-group col-12 col-sm-12 col-md-12 col-lg-4 col-xl-5 redimension">
                                            <label style="font-weight: bold; font-size: 20px;"><?php echo $lang["escuela_texto_select"];?>:</label>
                                            <select class="form-control" value="" name="validacion-dni-select" id="validacion-dni-select"> 
                                                <option value="0" disabled selected><?php echo $lang["escuela_option"];?></option>  
                                            </select>
                                        </div> 
                                    </div>

                                    <!-- PARTE 1 FORM - DATOS -->
                                    <div class="row mt-4">
                                        <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4">
                                            <label><?php echo $lang["formulario_cumpleaños"];?>:
                                                <input type="date" class="form-control input-control-dni" disabled style="color: #5c5c5c !important;" id="fecha" name="fechanacimiento" required>
                                            </label>
                                        </div>

                                        <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4">
                                            <label><?php echo $lang["formulario_dni_jugador"];?>:
                                                <input type="text" class="form-control input-control-dni" disabled name="dnijugador" id="dni-jugador-form-cantera" maxlength="50" required>
                                            </label>
                                        </div>

                                        <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4">
                                            <label><?php echo $lang["formulario_nombre"];?>:
                                                <input type="text" id="nombre-form-cantera" class="form-control input-control-dni" disabled name="nombre" maxlength="45" required>
                                            </label>
                                        </div>

                                        <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4">
                                            <label><?php echo $lang["formulario_apellidos"];?>:
                                                <input type="text" id="apellidos-form-cantera" class="form-control input-control-dni" disabled name="apellidos" maxlength="45" required>
                                            </label>
                                        </div>

                                        <div class="form-group col-12 col-md-6 col-lg-6 col-xl-6">
                                            <label><?php echo $lang["formulario_direccion"];?>:
                                                <input type="text" id="direccion-form-cantera" class="form-control input-control-dni" disabled name="direccion" maxlength="100" required>
                                            </label>
                                        </div>

                                        <div class="form-group col-12 col-md-2 col-lg-2 col-xl-2">
                                            <label><?php echo $lang["formulario_numero"];?>:
                                                <input type="text" id="numero-form-cantera" class="form-control input-control-dni" disabled name="numero" maxlength="10">
                                            </label>
                                        </div>

                                        <div class="form-group col-12 col-md-2 col-lg-2 col-xl-2">
                                            <label><?php echo $lang["formulario_piso"];?>:
                                                <input type="text" id="piso-form-cantera" class="form-control input-control-dni" disabled name="piso" maxlength="10">
                                            </label>
                                        </div>

                                        <div class="form-group col-12 col-md-2 col-lg-2 col-xl-2">
                                            <label><?php echo $lang["formulario_puerta"];?>:
                                                <input type="text" id="puerta-form-cantera" class="form-control input-control-dni" disabled name="puerta" maxlength="10">
                                            </label>
                                        </div>

                                        <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4">
                                            <label><?php echo $lang["formulario_poblacion"];?>:
                                                <input type="text" id="poblacion-form-cantera" class="form-control input-control-dni" disabled name="poblacion" maxlength="45" required>
                                            </label>
                                        </div>

                                        <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4">
                                            <label><?php echo $lang["formulario_codigo_postal"];?>:
                                                <input type="number" id="cp-form-cantera" class="form-control input-control-dni" disabled name="cp" maxlength="10" required>
                                            </label>
                                        </div>

                                        <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4">
                                            <label><?php echo $lang["formulario_provincia"];?>:
                                                <input type="text" id="provincia-form-cantera" class="form-control input-control-dni" disabled name="provincia" maxlength="25" required>
                                            </label>
                                        </div>

                                        <div class="form-group col-12 col-sm-3 col-md-2 col-lg-2 col-xl-2">
                                            <label for="alergico-form-cantera" class="labelForm"><?php echo $lang["formulario_alergia"];?>*:</label>
                                            <select class="form-control inputForm valid input-control-dni" disabled value="" id="alergico-form-cantera" name="alergico-form-cantera" style="font-size: 14px;" aria-invalid="false">
                                                <option value="1"><?php echo $lang["si"];?></option>
                                                <option value="0" selected><?php echo $lang["no"];?></option>
                                            </select>
                                        </div>

                                        <div class="form-group col-12 col-sm-9 col-md-6 col-lg-6 col-xl-6">
                                            <label for="alergias-form-cantera" class="labelForm"><?php echo $lang["formulario_alergias"];?>:</label>
                                            <input type="text" class="form-control inputForm valid input-control-dni" disabled value="" id="alergias-form-cantera" name="alergias-form-cantera" placeholder="Alergias" aria-invalid="false">
                                        </div>

                                        <div class="form-group col-12 col-md-6 col-lg-6 col-xl-6">
                                            <label><?php echo $lang["formulario_nombre_padre"];?>:
                                                <input type="text" id="nombrepadre-form-cantera" class="form-control input-control-dni" disabled name="nombrepadre" maxlength="100" required>
                                            </label>
                                        </div>

                                        <div class="form-group col-12 col-md-6 col-lg-6 col-xl-6">
                                            <label><?php echo $lang["formulario_nombre_madre"];?>:
                                                <input type="text" id="nombremadre-form-cantera" class="form-control input-control-dni" disabled name="nombremadre" maxlength="100" required>
                                            </label>
                                        </div>

                                        <div class="form-group col-12 col-md-6 col-lg-6 col-xl-6">
                                            <label><?php echo $lang["formulario_telefono_padre"];?>:
                                                <input type="number" id="tlfpadre-form-cantera" class="form-control input-control-dni" disabled name="tlfpadre" maxlength="15" required>
                                            </label>
                                        </div>

                                        <div class="form-group col-12 col-md-6 col-lg-6 col-xl-6">
                                            <label><?php echo $lang["formulario_telefono_madre"];?>:
                                                <input type="number" id="tlfmadre-form-cantera" class="form-control input-control-dni" disabled name="tlfmadre" maxlength="15" required>
                                            </label>
                                        </div>

                                        <div class="form-group col-12">
                                            <label><?php echo $lang["formulario_correo"];?>:
                                                <input type="email" id="email-form-cantera" class="form-control input-control-dni" disabled name="email" maxlength="100" required>
                                            </label>
                                        </div>

                                        <div class="col-12">
                                            <p class="t-left mt-0" style="color: red;">
                                                <strong>* <?php echo $lang["formulario_aviso_email"];?></strong>
                                            </p>
                                        </div> 
                                        <div class="form-group col-12">
                                            <label><?php echo $lang["ins_form_equipo"];?>:
                                                <input type="text" class="form-control" disabled name="modalidad" id="modalidad-form-cantera"  maxlength="15">
                                                <input type="hidden" name="id-modalidad-form-cantera" id="id-modalidad-form-cantera" >
                                            </label>
                                        </div>                                       
                                    </div> 

                                    <!-- PARTE 3 PAGOS -->
                                    <div class="row">
                                        <div class="col-12">
                                            <h3 class="section-title t-center mb-0">
                                                <span class="orange-text"><?php echo $lang["ins_cantera_pagos"];?></span>
                                            </h3>
                                        </div>

                                        <!--<div class="form-group col-12 mt-2">
                                            <table class="table table-striped form-group" border="1" style="width: 100%;">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th scope="col" style="width: 20%;padding-top: 4px;padding-bottom: 4px;" colspan="6">CANTERA</th>    
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="">
                                                        <td id="lunes-form-masculino" style="text-align:center;padding-top: 4px;padding-bottom: 4px;" >Inscripcción</td>
                                                        <td id="martes-form-masculino" style="text-align:center;padding-top: 4px;padding-bottom: 4px;" >Matricula de 1-15 de Sep.</td>
                                                        <td id="jueves-form-masculino" style="text-align:center;padding-top: 4px;padding-bottom: 4px;" >1-15 de Enero</td>
                                                        <td id="viernes-form-masculino" style="text-align:center;padding-top: 4px;padding-bottom: 4px;" >1-15 de Abril</td>
                                                        <td id="viernes-form-masculino" style="text-align:center;padding-top: 4px;padding-bottom: 4px;" >Total</td>
                                                    </tr>
                                                    <tr class="">
                                                        <td id="lunes-form-masculino" style="text-align:center;padding-top: 4px;padding-bottom: 4px;" >0€</td>
                                                        <td id="martes-form-masculino" style="text-align:center;padding-top: 4px;padding-bottom: 4px;" >175* </br><strong> (Se descuentan 50€ de la inscripción)</strong></td>
                                                        <td id="miercoles-form-masculino" style="text-align:center;padding-top: 4px;padding-bottom: 4px;" >175€</td>
                                                        <td id="viernes-form-masculino" style="text-align:center;padding-top: 4px;padding-bottom: 4px;" >175€</td>
                                                        <td id="viernes-form-masculino" style="text-align:center;padding-top: 4px;padding-bottom: 4px;" ><strong>525€</strong></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>-->

                                        <div class="col-12 col-md-3 col-lg-3 col-xl-3">
                                            <h4 class="section-title t-center mt-1 mb-0"><?php echo $lang["cantera_informacion_pagos_punto1"];?></h4>
                                            <h4 class="section-title t-center mt-1 mb-0"><?php echo $lang["cantera_informacion_pagos_punto2"];?></h4>  
                                            <h4 class="section-title t-center mt-1 mb-0"><?php echo $lang["cantera_informacion_pagos_punto3"];?></h4>
                                            <p><?php echo $lang["cantera_informacion_pagos_punto4"];?></p>
                                            <p><?php echo $lang["cantera_informacion_pagos_punto5"];?></p>
                                            <p><?php echo $lang["cantera_informacion_pagos_punto6"];?></p>
                                            <div class="contact-info-wrap t-center">	
                                                <h3 class="section-title mt-0 mb-0 t-center"><span class="orange-text"><?php echo $lang["soporte_tecnico_titulo"];?></span></h3>
                                                <p class='t-center'><strong><?php echo $lang["soporte_tecnico_texto"];?></strong></p>
                                                <a href="https://wa.me/+34687717491" target="_blank" style='color:black;font-size:1.3em;'><img src="img/wassap3.png" style='max-width:50px;'><strong> WhatsApp 687717491</strong></a>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-9 col-lg-9 col-xl-9">
                                            <p class="t-justify">
                                                <?php echo $lang["ins_cantera_info_baja"];?>
                                            </p>

                                            <p class="t-justify"><?php echo $lang["escuela_informacion_baja_punto4"];?></p>

                                            <p class="t-justify"><?php echo $lang["escuela_informacion_baja_punto2"];?></p>

                                            <label class="containerchekbox">
                                                <input type="checkbox" name="autorizo-pago-extra" value="si" required class="input-control-dni" disabled checked>
                                                <p><?php echo $lang["patronato_punto3_ultimo_texto_pagos"];?></p>
                                                <span class="checkmark"></span>
                                            </label>

                                            <h4 class="section-title t-center mt-0 mb-0"><?php echo $lang["domiciliacion_titulo"];?></h4>

                                            <div class="row">
                                                <div class="form-group col-12 col-md-6 col-lg-6 col-xl-6">
                                                    <label><?php echo $lang["domiciliacion_titular"];?>:
                                                        <input type="text" id="titular-form-cantera" class="form-control input-control-dni" disabled name="titular" maxlength="100" required>
                                                    </label>
                                                </div>

                                                <div class="form-group col-12 col-md-6 col-lg-6 col-xl-6">
                                                    <label><?php echo $lang["formulario_dni"];?>:
                                                        <input type="text" id="dnititular-form-cantera" class="form-control input-control-dni" disabled name="dnititular" maxlength="50" required>
                                                    </label>
                                                </div>

                                                <div class="form-group col-12 col-md-2 col-lg-2 col-xl-2 redimension">
                                                    <label for="iban-input"><?php echo $lang["domiciliacion_iban"];?></label>
                                                    <input id="iban-input" type="text" class="form-control input-control-dni" disabled value="ES" name="iban" minlength="4" id="iban-form-cantera" maxlength="4" required>
                                                </div>

                                                <div class="form-group col-12 col-md-2 col-lg-2 col-xl-2 redimension">
                                                    <label for="entidad-input"><?php echo $lang["domiciliacion_entidad"];?></label>
                                                    <input id="entidad-input" type="number" class="form-control input-control-dni" disabled name="entidad" minlength="4" id="entidad-form-cantera" onkeydown="limit4(this);" onkeyup="limit4(this);" required>
                                                </div>

                                                <div class="form-group col-12 col-md-2 col-lg-2 col-xl-2 redimension">
                                                    <label for="oficina-input"><?php echo $lang["domiciliacion_oficina"];?></label>
                                                    <input id="oficina-input" type="number" class="form-control input-control-dni" disabled name="oficina" minlength="4" id="oficina-form-cantera" onkeydown="limit4(this);" onkeyup="limit4(this);" required>
                                                </div>

                                                <div class="form-group col-12 col-md-2 col-lg-2 col-xl-2 redimension">
                                                    <label for="dc-input"><?php echo $lang["domiciliacion_dc"];?></label>
                                                    <input id="dc-input" type="number" class="form-control input-control-dni" disabled value="" name="dc" minlength="2" id="dc-form-cantera" onkeydown="limit2(this);" onkeyup="limit2(this);" required>
                                                </div>

                                                <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4 redimension">
                                                    <label for="cuenta"><?php echo $lang["domiciliacion_cuenta"];?></label>
                                                    <input id="cuenta" type="number" class="form-control input-control-dni" disabled name="cuenta" minlength="10" id="cuenta-form-cantera" onkeydown="limit10(this);" onkeyup="limit10(this);" required>
                                                    <script type="text/javascript">
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
                                                    </script>
                                                </div>

                                                <div class="col-12">
                                                    <p class="t-left mt-0">
                                                        <strong><?php echo $lang["domiciliacion_texto_domiciliacion"];?></strong>
                                                    </p>
                                                </div>

                                                <div class="col-12">
                                                    <label class="containerchekbox">
                                                        <input type="checkbox" name="autorizo" value="si" class="input-control-dni" disabled  required>
                                                        <p><?php echo $lang["politicas_check_condiciones"];?></p>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>

                                                <div class="col-12">
                                                    <label class="containerchekbox">
                                                        <input type="checkbox" name="autorizo-pago" value="si" required class="input-control-dni" disabled checked></input>
                                                        <p><?php echo $lang["escuela_check_domiciliacion"];?></p>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>

                                                <div class="col-12 mb-2"> <!-- type="submit"  -->
                                                    <button class="btn btn-link-w w-100 input-control-dni" disabled style="width:100%;margin-left:0px;" id="submit">
                                                        <span><?php echo $lang["inscribirse"];?></span>
                                                    </button>
                                                </div>

                                                <div class="col-12 mb-2">
                                                    <p class="t-justify"><?php echo $lang["politicas_texto_ley_organica"];?></p>
                                                    <p class="t-justify"><?php echo $lang["politicas_check_productos"];?></p>
                                                    <p class="t-justify"><?php echo $lang["politicas_check_imagenes"];?></p>
                                                    <p class="t-justify"><?php echo $lang["politicas_texto_cancelacion1"];?><?php echo $lang["enlace_cancelacion"];?><?php echo $lang["politicas_texto_cancelacion2"];?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div> 
                        </div>
                    </div>
                </div>
            </section>

            <?php require('includes/footer.php'); ?>
            <?php require "includes/cookies.php"; ?>

        </div> <!-- End Wrapper -->

        <!-- Load Scripts Start -->
        <script src="js/libs.js"></script>
        <script src="js/common.js"></script>

        <script>
            //  Bloqueamos el formulario 
            /*$('body').on('click','#submit',function()
            {
                alert("Para nuevas Inscripciones, por favor, envíe un correo a recepcion@alqueriadelbasket.com con sus datos.");
                return false;
            });*/
            
            /*$('body').on('click','#submit span',function()
            {
                alert("Para nuevas Inscripciones, por favor, envíe un correo a recepcion@alqueriadelbasket.com con sus datos.");
                return false;
            });*/
            
            $( "#buscar-validacion-dni" ).on( "click", function()
            {
                //console.log("ENTRAMOS AL ON CLICK");
               /* alert("Para nuevas Inscripciones, por favor, envíe un correo a recepcion@alqueriadelbasket.com con sus datos.");
                return false;*/
                
                if( $("#validacion-dni").val().trim() != "" )
                {
                   // console.log("Todo ok");
                    var form_data = {
                        dni: $("#validacion-dni").val().trim(),
                        categoria: "cantera"
                    };

                    $.ajax({
                        type: "POST",
                        url: "?r=formularios/findByIDTutor",
                        data: form_data,
                        dataType: "json",
                        success: function (data) 
                        {
                            //console.log("entramos al succes");
                            //var datosDevueltos = data.datos;
                            //console.log( data.datos[0].nombre_apellidos ); 
                            $("#validacion-dni-select option").remove();
                            if( data.datos.length > 0  ){   
                                for( var m = 0 ; m < data.datos.length ; m++ ){
                                    //console.log( data.datos[m].nombre_apellidos ); 
                                    //console.log("Entramos al for");
                                    if( m==0 ){
                                        $("#validacion-dni-select").append("<option value='" + data.datos[m].id_formulario + "' selected>" + data.datos[m].nombre_apellidos + "</option>");
                                    }else{
                                        $("#validacion-dni-select").append("<option value='" + data.datos[m].id_formulario + "'>" + data.datos[m].nombre_apellidos + "</option>");
                                    }   
                                }
                                BuscarAlumno();
                                $(".input-control-dni").prop("disabled", false);
                            }
                            else{
                                alert("No hay resultados para el DNI introducido. \nSi tiene algun problema en la busqueda por DNI, por favor, pongase en contacto con nosotros.");
                                $(".input-control-dni").prop("disabled", true);  
                            
                            }
                        }
                    });
                }
                else{
                    alert("Por favor, compruebe que la longitud del DNI es de 9 digitos. Rellene con ceros al principio si es necesario y incluya la letra.");
                    VaciarCampos();
                    $("#existe_inscripcion").val( "0" );  
                    $(".input-control-dni").prop("disabled", true);
                }
            });

            $( "#validacion-dni-select" ).on( "change", function() {
                 BuscarAlumno();  
            });

            /*$( ".input-control-dni" ).keyup( function(){
               //console.log("entramos");  
               var valor_a_cambiar = $(this).val().toUpperCase();
               $(this).val(valor_a_cambiar);
            });*/
            
            function BuscarAlumno(){
                if( $("#validacion-dni-select option:selected").val() != 0 ){
                    var form_data = {
                        form_id: "inscripciones_cargar_contenido_inscripcion_original_conEquipoHorario",
                        idinscripcion: $("#validacion-dni-select option:selected").val()
                    };

                    $.ajax({
                        type: "POST",
                        url: "?r=ajax/Dispatcher",
                        data: form_data,
                        dataType: "json",
                        success: function(data)
                        {
    console.log(data);
    //alert("Revisa la consola y id_formulario");
                            
                            $("#existe_inscripcion").val( data.datos.id_formulario );
                            $("#fecha").val( data.datos.fecha_nacimiento  );
                            //nombre
                                $("#nombre-form-cantera").val( data.datos.nombre_apellidos.slice( 0, data.datos.nombre_apellidos.indexOf(" ", 2) ) );
                                var valor_nombre_form_cantera = $('#nombre-form-cantera').val().toUpperCase();
                                $('#nombre-form-cantera').val(valor_nombre_form_cantera);

                            //apellidos
                                $("#apellidos-form-cantera").val( data.datos.nombre_apellidos.slice( data.datos.nombre_apellidos.indexOf(" ", 2 ) ) );
                                var valor_apellidos_form_cantera = $('#apellidos-form-cantera').val().toUpperCase();
                                $('#apellidos-form-cantera').val(valor_apellidos_form_cantera);
                            //direccion
                                $("#direccion-form-cantera").val( data.datos.direccion );
                                var valor_direccion_form_cantera = $('#direccion-form-cantera').val().toUpperCase();
                                $('#direccion-form-cantera').val(valor_direccion_form_cantera);

                            $("#numero-form-cantera").val( data.datos.numero );

                            $("#piso-form-cantera").val( data.datos.piso );

                            $("#puerta-form-cantera").val( data.datos.puerta );

                            //poblacion
                                $("#poblacion-form-cantera").val( data.datos.poblacion );
                                var valor_poblacion_form_cantera = $('#poblacion-form-cantera').val().toUpperCase();
                                $('#poblacion-form-cantera').val(valor_poblacion_form_cantera);

                            $("#cp-form-cantera").val( data.datos.codigo_postal );

                            //provincia
                                $("#provincia-form-cantera").val( data.datos.provincia );
                                var valor_provincia_form_cantera = $('#provincia-form-cantera').val().toUpperCase();
                                $('#provincia-form-cantera').val(valor_provincia_form_cantera);

                            //  Nombre padre
                                $("#nombrepadre-form-cantera").val( data.datos.nombre_padre );
                                var valor_NombrePadre_form_cantera = $('#nombrepadre-form-cantera').val().toUpperCase();
                                $('#nombrepadre-form-cantera').val(valor_NombrePadre_form_cantera);

                            //  Nombre madre
                                $("#nombremadre-form-cantera").val( data.datos.nombre_madre );
                                var valor_NombreMadre_form_cantera = $('#nombremadre-form-cantera').val().toUpperCase();
                                $('#nombremadre-form-cantera').val(valor_NombreMadre_form_cantera);

                            $("#tlfpadre-form-cantera").val( data.datos.telefono_padre );

                            $("#tlfmadre-form-cantera").val( data.datos.telefono_madre );

                            //Email
                                $("#email-form-cantera").val( data.datos.email );
                                var valor_mail_form_cantera = $('#email-form-cantera').val().toUpperCase();
                                $('#email-form-cantera').val(valor_mail_form_cantera);

                            //Titular
                                $("#titular-form-cantera").val( data.datos.titular_banco );
                                var valor_titular_form_cantera = $('#titular-form-cantera').val().toUpperCase();
                                $('#titular-form-cantera').val(valor_titular_form_cantera);

                            $("#dni-form-cantera").val( data.datos.dni_titular );

                            if(data.datos.iban!=="")
                            {
                                $("#iban-input").val( data.datos.iban );
                            }
                            
                            if(data.datos.entidad!=="")
                            {
                                $("#entidad-input").val( data.datos.entidad );
                            }
                            
                            if(data.datos.oficina!=="")
                            {
                                $("#oficina-input").val( data.datos.oficina );
                            }
                            
                            if(data.datos.dc!=="")
                            {
                                $("#dc-input").val( data.datos.dc );
                            }
                            
                            if(data.datos.cuenta!=="")
                            {
                                $("#cuenta").val( data.datos.cuenta );
                            }
                            //$('input:radio[value=' + data.datos.modalidad.trim() + ']').attr( "checked", "true" );

                            $("#modalidad-form-cantera").val( data.datos.equipo );
                            //console.log(data.datos.equipo);

                            if( data.datos.alergico != "1" ){
                                $("#alergico-form-cantera").val( "0" );
                            }else{
                                $("#alergico-form-cantera").val( "1" );
                            }
                            
                            $("#alergias-form-cantera").val( data.datos.alergias );
                            
                            if( data.datos.lunes != null ){    
                                $("#lunes-form-cantera").text( data.datos.lunes );
                            }else{
                                $("#lunes-form-cantera").text( "-" );
                            }
                            
                            if( data.datos.martes != null ){
                                $("#martes-form-cantera").text( data.datos.martes );
                            }else{
                                $("#-form-cantera").val("-");
                            }
                            
                            if( data.datos.miercoles != null ){    
                                $("#miercoles-form-cantera").text( data.datos.miercoles );
                            }else{
                                $("#-form-cantera").val("-");
                            }
                            
                            if( data.datos.jueves != null ){
                                $("#jueves-form-cantera").text( data.datos.jueves );
                            }else{
                                $("#-form-cantera").val("-");
                            }
                            
                            if( data.datos.viernes != null ){    
                                $("#viernes-form-cantera").text( data.datos.viernes );
                            }else{
                                $("#-form-cantera").val("-");
                            }

                            $("#dni-jugador-form-cantera").val(data.datos.dni_jugador);
                           
                        },error: function (){
                            console.log("error en el ajax");
                        }
                    });
                }
            }

            function VaciarCampos(){   
                $("#existe_inscripcion").val( "" );
                $("#fecha").val( ""  );
                $("#nombre-form-cantera").val( "" );
                $("#apellidos-form-cantera").val( "" );
                $("#direccion-form-cantera").val( "" );
                $("#numero-form-cantera").val( "" );
                $("#piso-form-cantera").val( "" );
                $("#puerta-form-cantera").val( "" );
                $("#poblacion-form-cantera").val( "" );
                $("#cp-form-cantera").val( "" );
                $("#provincia-form-cantera").val( "" );
                $("#nombrepadre-form-cantera").val( "" );
                $("#nombremadre-form-cantera").val( "" );
                $("#tlfpadre-form-cantera").val( "" );
                $("#tlfmadre-form-cantera").val( "" );
                $("#email-form-cantera").val( "" );
                $("#titular-form-cantera").val( "" );
                $("#dni-form-cantera").val( "" );
                $("#iban-input").val( "" );
                $("#entidad-input").val( "" );
                $("#oficina-input").val( "" );
                $("#dc-input").val( "" );
                $("#cuenta").val( "" );
                $("#validacion-dni-select option").remove();
                $("#validacion-dni-select").append("<option value='0' disabled selected>No hay resultados para el DNI introducido</option> ");
                $("#modalidad-form-cantera").val( "" );
                $("#lunes-form-cantera").text( "-" );
                $("#martes-form-cantera").text( "-" );
                $("#miercoles-form-cantera").text( "-" );
                $("#jueves-form-cantera").text( "-" );
                $("#viernes-form-cantera").text( "-" );
                $("#alergico-form-cantera").val( "0" );
                $("#alergias-form-cantera").val( "" );
                $("#dni-jugador-form-cantera").val( "" );
                //$("#modalidad-form-cantera").val( "" );
                
            }
            
            
        </script>
        <!-- Load Scripts End -->

    </body>
</html>