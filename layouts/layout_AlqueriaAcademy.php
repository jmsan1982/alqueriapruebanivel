<!DOCTYPE html>
<html lang="es"> 
	<?php require('includes/head.php'); ?>
	<link rel="stylesheet" href="css/forms.css">
	<link rel="stylesheet" href="css/parallax.css">
	<link rel="stylesheet" href="css/formus.css?v=1.1">

	<style>
    .error{color: red;}
    input[type="text"],textarea{ text-transform: uppercase;}
    input[type="email"]{text-transform: lowercase;}
    </style>

	<body class="Pages" id="formus">
		<div class="wrapper overflow-x-hidden">

			<?php require ("includes/header.php"); ?>

			<section id="page-content" class="overflow-x-hidden margin-top-header">
				<!-- Imagen superior -->
                <div class="block">
					<div class="container-fluid">
						<div class="row">
                            <div class="col-12 no-gutters">
                                <img src="img/top-alqueria-academy.jpg" class="img-responsive">
                            </div>
						</div>
					</div>
				</div>

				<div class="block background-f6">
					<div class="container">
                        <!-- Titulo -->
						<div class="row">
							<div class="col-12 col-md-12 col-lg-12 col-xl-12">								
								<h2 class="section-title t-center"><?php echo $lang["sportsclub_titulo"];?> <span class="orange-text">L'Alqueria Academy</span></h2>
							</div>
						</div>

                        <!-- Formulario -->
						<div class="row">
							<div class="col-12">
								<form id="AlqueriaAcademyForm" class="boxed-form" method="post">
                                    
                                    <!-- PARTE 1 DATOS -->
                                    <!-- Nombre, apellidos, fecha nacimiento -->
                                    <div class="form-group">
                                        <div class="row pl-1 pr-1">
                                            <div class="col-12 col-md-3 col-lg-3 col-xl-3 redimension">
                                                <label><?php echo $lang["formulario_nombre"];?>*:
                                                    <input type="text" class="form-control" name="nombre" maxlength="45" required>
                                                </label>
                                            </div>

                                            <div class="col-12 col-md-5 col-lg-5 col-xl-5 redimension">
                                                <label><?php echo $lang["formulario_apellidos"];?>*:
                                                    <input type="text" class="form-control" name="apellidos" maxlength="45" required>
                                                </label>
                                            </div>

                                            <div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
                                                <label><?php echo $lang["formulario_cumpleaños"];?>*:
                                                    <input type="date" class="form-control" style="color: #5c5c5c !important;" name="fechanacimiento" required>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Teléfono, Movil, Email -->
                                    <div class="form-group">
                                        <div class="row pl-1 pr-1">
                                            <div class="col-12 col-md-3 col-lg-3 col-xl-3 redimension">
                                                <label><?php echo $lang["formulario_telefono"];?>:
                                                    <input type="number" class="form-control" name="telefono" min="100000000">
                                                </label>
                                            </div>

                                            <div class="col-12 col-md-3 col-lg-3 col-xl-3 redimension">
                                                <label>Teléfono móvil*:
                                                    <input type="number" class="form-control" name="movil" required min="100000000">
                                                </label>
                                            </div>

                                            <div class="col-12 col-md-6 col-lg-6 col-xl-6 redimension">
                                                <label><?php echo $lang["formulario_correo"];?>*:
                                                    <input type="email" class="form-control" name="email" maxlength="50" required>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Aspecto médico, alergias -->
                                    <div class="form-group">
                                        <div class="row pl-1 pr-1">
                                            <div class="col-12 col-md-6 col-lg-6 col-xl-6 redimension">
                                                <label><?php echo $lang["formulario_aspecto_medico"];?>
                                                    <input type="text" class="form-control" name="tratamientosmedicos">
                                                </label>
                                            </div>

                                            <div class="col-12 col-md-6 col-lg-6 col-xl-6 redimension">
                                                <label><?php echo $lang["formulario_alergia"];?>
                                                    <input type="text" class="form-control" name="alergias">
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Club, categoria, altura, talla -->
                                    <div class="form-group">
                                        <div class="row pl-1 pr-1">
                                            <div class="col-12 col-md-5 col-lg-5 col-xl-5 redimension">
                                                <label><?php echo $lang["formulario_club"];?>*
                                                    <input type="text" class="form-control" name="club" maxlength="45" required>
                                                </label>
                                            </div>

                                            <div class="col-12 col-md-3 col-lg-3 col-xl-3 redimension">
                                                <label><?php echo $lang["formulario_categoria"];?>*:
                                                    <input type="text" class="form-control" name="categoria" maxlength="20" required>
                                                </label>
                                            </div>

                                            <div class="col-12 col-md-2 col-lg-2 col-xl-2 redimension">
                                                <label><?php echo $lang["formulario_altura"];?>*:
                                                    <input type="text" class="form-control" name="altura" maxlength="15" required>
                                                </label>
                                            </div>

                                            <div class="col-12 col-md-2 col-lg-2 col-xl-2 redimension">
                                                <label><?php echo $lang["formulario_talla_ropa"];?>*:
                                                    <input type="text" class="form-control" name="tallaropa" maxlength="15" required>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Trayectoria -->
                                    <div class="form-group">
                                        <div class="row pl-1 pr-1">
                                            <div class="col-12 col-md-12 col-lg-12 col-xl-12 redimension">
                                                <label><?php echo $lang["formulario_trayectoria"];?>*:
                                                    <textarea name="trayectoria" rows="5" cols="15" class="form-control" required></textarea>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Texto aviso email -->
                                    <div class="col-12">
                                        <div class="row pl-1 pr-1">
                                            <p class="t-justify mt-0" style="color: red;">
                                                <strong>* <?php echo $lang["formulario_aviso_email"];?></strong>
                                            </p>
                                        </div>
                                    </div>


                                    <!-- PARTE 2 PAGO : INFORMACION -->
                                    <div class="col-12">
                                        <h3 class="section-title t-center mb-0">
                                            <span class="orange-text"><?php echo $lang["academy_pagos_titulo"];?></span>
                                        </h3>
                                    </div>

                                    <div class="col-12">
                                        <h4 class="t-justify mt-1 mb-0">
                                            <strong>
                                                <?php echo $lang["academy_pagos_total"];?><br>
                                                <span style="color:red;"><?php echo $lang["academy_pagos_aviso_tarjeta"];?></span>
                                            </strong>
                                        </h4>
                                        <p class="t-justify">
                                            <?php echo $lang["academy_pagos_pago_punto1"];?>
                                        </p>
                                        <p class="t-justify">
                                            <?php echo $lang["academy_pagos_pago_punto2"];?><br>
                                            <?php echo $lang["academy_pagos_pago_punto3"];?><br>
                                            <?php echo $lang["academy_pagos_pago_punto4"];?><br>
                                            <?php echo $lang["academy_pagos_pago_punto5"];?><br>
                                        </p>
                                    </div>

                                    <div class="col-12">
                                        <hr>

                                        <p class="t-justify">
                                            <?php echo $lang["academy_pagos_pago_punto6"];?>
                                        </p>

                                        <div class="row">
                                            <div class="col-12 mt-2">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <h4 class="mt-0 mb-0">
                                                                <?php echo $lang["academy_pagos_precio_incluye_titulo"];?>
                                                            </h4>
                                                            <ul style="padding-left: 15px;">
                                                                <li>
                                                                    <?php echo $lang["academy_pagos_precio_incluye_punto1"];?>
                                                                </li>
                                                                <li>
                                                                    <?php echo $lang["academy_pagos_precio_incluye_punto2"];?>
                                                                </li>
                                                                <li>
                                                                    <?php echo $lang["academy_pagos_precio_incluye_punto3"];?>    
                                                                </li>
                                                                <li>
                                                                    <?php echo $lang["academy_pagos_precio_incluye_punto4"];?> 
                                                                </li>
                                                                <li>
                                                                    <?php echo $lang["academy_pagos_precio_incluye_punto5"];?> 
                                                                </li>
                                                                <li>
                                                                    <?php echo $lang["academy_pagos_precio_incluye_punto6"];?> 
                                                                </li>
                                                                <li>
                                                                    <?php echo $lang["academy_pagos_precio_incluye_punto7"];?> 
                                                                </li>
                                                                <li>
                                                                    <?php echo $lang["academy_pagos_precio_incluye_punto8"];?> 
                                                                </li>
                                                            </ul>
                                                        </div>

                                                        <div class="col-12">
                                                            <h4 class="mb-0">
                                                                <?php echo $lang["academy_politica_cancelacion_titulo"];?>
                                                            </h4>

                                                            <p class="t-justify"><?php echo $lang["academy_politica_cancelacion_texto"];?></p>

                                                            <ol style="padding-left: 15px;">
                                                                <li><?php echo $lang["academy_politica_cancelacion_punto1"];?></li>
                                                                <li><?php echo $lang["academy_politica_cancelacion_punto2"];?></li>
                                                                <li><?php echo $lang["academy_politica_cancelacion_punto3"];?></li>
                                                                <li><?php echo $lang["academy_politica_cancelacion_punto4"];?></li>
                                                            </ol>
                                                        </div>

                                                        <div class="col-12 mb-2">
                                                            <h4 class="mb-0">
                                                                <?php echo $lang["politicas_titulo_privacidad"];?>
                                                            </h4>
                                                            <p class="t-justify">
                                                                <?php echo $lang["politicas_texto_ley_organica"];?>
                                                            </p>
                                                            <p class="t-justify">
                                                                <?php echo $lang["politicas_check_productos"];?>
                                                            </p>
                                                            <p class="t-justify">
                                                                <?php echo $lang["politicas_check_imagenes"];?>
                                                            </p>
                                                            <p class="t-justify">
                                                                <?php echo $lang["politicas_texto_cancelacion1"];?><?php echo $lang["enlace_cancelacion"];?><?php echo $lang["politicas_texto_cancelacion2"];?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- PARTE 3 PAGO -->
                                    <div class="col-12">
                                        <h4 class="section-title t-center mt-0 mb-1"><?php echo $lang["domiciliacion_titulo"];?></h4>
                                    </div>

                                    <div class="form-group col-12">
                                        <div class="row">
                                            <div class="col-12 col-md-6 col-lg-6 col-xl-6 redimension">
                                                <label><?php echo $lang["domiciliacion_titular"];?>:
                                                    <input type="text" class="form-control" name="titular" maxlength="100" required>
                                                </label>
                                            </div>

                                            <div class="col-12 col-md-6 col-lg-6 col-xl-6 redimension">
                                                <label><?php echo $lang["formulario_dni"];?>:
                                                    <input type="text" id="dnititular" class="form-control" name="dnititular" maxlength="15" required>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-12">
                                        <div class="row">
                                            <div class="col-12 col-md-2 col-lg-2 col-xl-2 redimension">
                                                <label for="iban-input"><?php echo $lang["domiciliacion_iban"];?></label>
                                                <input id="iban-input" type="text" class="form-control" value="ES" name="iban" maxlength="4" required>
                                            </div>

                                            <div class="col-12 col-md-2 col-lg-2 col-xl-2 redimension">
                                                <label for="entidad-input"><?php echo $lang["domiciliacion_entidad"];?></label>
                                                <input id="entidad-input" type="number" class="form-control" value="" name="entidad" onkeydown="limit4(this);" onkeyup="limit4(this);" required>
                                            </div>

                                            <div class="col-12 col-md-2 col-lg-2 col-xl-2 redimension">
                                                <label for="oficina-input"><?php echo $lang["domiciliacion_oficina"];?></label>
                                                <input id="oficina-input" type="number" class="form-control" value="" name="oficina" onkeydown="limit4(this);" onkeyup="limit4(this);" required>
                                            </div>

                                            <div class="col-12 col-md-2 col-lg-2 col-xl-2 redimension">
                                                <label for="dc-input"><?php echo $lang["domiciliacion_dc"];?></label>
                                                <input id="dc-input" type="number" class="form-control" value="" name="dc" onkeydown="limit2(this);" onkeyup="limit2(this);" required>
                                            </div>

                                            <div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
                                                <label for="cuenta"><?php echo $lang["domiciliacion_cuenta"];?></label>
                                                <input type="number" class="form-control" id="cuenta" name="cuenta" onkeydown="limit10(this);" onkeyup="limit10(this);" required>
                                            </div>

                                            <div class="col-12 mt-1">
                                                <p class="t-left mt-0">
                                                    <strong><?php echo $lang["domiciliacion_texto_domiciliacion"];?></strong>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 redimension">
                                        <label class="containerchekbox">
                                            <input type="checkbox" name="autorizo" value="si" required="">
                                            <p><?php echo $lang["ins_academy_acepto_condiciones"];?></p>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>

                                    <div id="AlqueriaAcademyForm-mensaje-espera" style="display: none;" class="col-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                        <div class="contact-info-wrap">
                                            <h4 class="section-title mt-0 mb-0">
                                                <span class="orange-text"><?php echo $lang["ins_academy_mensaje_espera"];?></span>
                                                <img src="img/loading.gif" style="width: 3%">
                                            </h4>
                                        </div>
                                    </div>


                                    <!-- SUBMIT -->
                                    <div class="col-12 col-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                        <!-- <input type="hidden" value="campusworcester" name="categoria">-->
                                        <button class="btn btn-link-w w-100" style="width: 100%; margin-left: 0px;" 
                                                type="submit" name="enviar" value="tarjeta" id="btn_reserva_academy">
                                            <span><?php echo $lang["boton_tarjetas"];?></span>
                                        </button>
                                    </div>
                                    
                                    <!-- RESPUESTA -->
                                    <div id="AlqueriaAcademyForm-respuesta" class="col-12 col-md-12 col-lg-12 col-xl-12"></div>

                                </form>
							</div>
						</div>
                    </div>
                </div>
            </section>

			<?php require ('includes/footer.php'); ?>
			<?php require ('includes/cookies.php'); ?>
		</div>

        <!-- Load Scripts Start -->
		<script src="js/libs.js"></script>
		<script src="js/common.js"></script>
		<script src="js/jquery.validate.min.js"></script> 
        <script src="js/html2canvas.min.js"></script> 
		<script type="text/javascript">
            
            /*  Limite de caracteres para la cuenta bancaria */
            function limit10(element){
                                                    var max_chars = 10;
                                                    if(element.value.length > max_chars) {
                                                        element.value = element.value.substr(0, max_chars);
                                                    }
                                                }
            function limit4(element){
                var max_chars = 4;
                if(element.value.length > max_chars) {
                    element.value = element.value.substr(0, max_chars);
                }
            }
            function limit2(element){
                var max_chars = 2;
                if(element.value.length > max_chars) {
                    element.value = element.value.substr(0, max_chars);
                }
            }

            /*  Enviamos los datos para realizar la inscripción */
			$('#AlqueriaAcademyForm').validate(
			{
				submitHandler: function()
				{
					$.ajax({
						type:       "POST",
						url:        "?r=inscripciones/InscripcionAcademy",
						data:       $('#AlqueriaAcademyForm').serialize(),
						dataType:   "json",
						beforeSend: function()
                        {
					    	$("#btn_reserva_academy").attr("disabled", true);
					    	$("#AlqueriaAcademyForm-mensaje-espera").show();					    	
					   	},
						success: function(data)
                        {
                            if(data.response==="success")
                            {
                                //  Lo primero, quitamos el mensaje de espera y volvemos a quitar el disabled
                                $("#btn_reserva_academy").attr("disabled", true);
                                $("#AlqueriaAcademyForm-mensaje-espera").hide();
                                //  Redirección a la URL del TPV 
                                window.location.href = encodeURI(data["url_redireccion"]);
                            }
                            else if(data.response==="error")
                            {
                                //  Quitamos el mensaje de espera y volvemos a quitamos el disabled para permitir el reenvio
                                $("#btn_reserva_academy").attr("disabled",false);
                                $("#AlqueriaAcademyForm-mensaje-espera").hide();	
                            
                                //  Mostramos el error en la respuesta
                                $('#AlqueriaAcademyForm-respuesta').html("<div class='alert alert-danger'><h4 class='section-title mt-0 mb-0'>" + data.message + "</h4></div>");
                                $("#AlqueriaAcademyForm-respuesta").fadeTo(5000, 500).slideUp(500, function(){
                                    $("#AlqueriaAcademyForm-respuesta").slideUp(500);
                                });
                            }
                            else
                            {}
						}, 
                        error: function( jqXHR, textStatus, errorThrown )
                        {
                            console.log('jqXHR:');
                            console.log(jqXHR);
                            console.log('textStatus:');
                            console.log(textStatus);
                            console.log('errorThrown:');
                            console.log(errorThrown);
                        }
					});
				}
			});
            
		</script>
	</body>
</html>