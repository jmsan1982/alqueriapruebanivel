<!DOCTYPE html>
<html lang="es">
	<?php require('includes/head.php'); ?>
	<link rel="stylesheet" href="css/forms.css">
	<link rel="stylesheet" href="css/parallax.css">
	<link rel="stylesheet" href="css/formus.css">

	<!-- Código CSS -->
	<style>
		input[type="text"] {
			text-transform: uppercase;
		}
		input[type="email"] {
			text-transform: lowercase;
		}
		canvas {
			width: 500px !important;
			height: 250px;
			background-color: #ffffff;
			border: 1px solid black;
		}
		.tipoinscripcionseleccionada {
			text-decoration: underline;
		}
		#page-content {
			background-color: #f6f6f6;
		}
		.error {
			color: red;
		}
	</style>

	<body class="Pages" id="formus">

		<div class="wrapper overflow-x-hidden">

			<?php require ("includes/header.php"); ?>

			<section id="page-content" class="overflow-x-hidden margin-top-header pb-4">
				<div class="block background-f6">
					<div class="container">
						<?php $now = date("d-m-Y");?>
						<div class="row">
							<div class="col-12">
								<h3 class="section-title">
									<span class="orange-text">Declaración responsable para la asistencia a eventos y actividades organizadas por Valencia Basket Club</span>
								</h3>
							</div>
						</div>

						<div class="row">
							<div class="col-12">
								<form id="declaracion-responsable-form" class="boxed-form" method="post">
									<!-- Paso 1: Texto a redactar -->
									<div class="row renovacion-row">
										<div class="col-12">
											<p style="font-size: 16px;">En fecha <?php echo $now;?></p>
											<p style="font-size: 16px;">DECLARO RESPONSABLEMENTE</p>
											<ul style="font-size: 16px;">
												<li>Que no he padecido en los últimos 14 días síntomas compatibles con cuadro COVID-19 (fiebre, tos, vómitos, diarrea, pérdida de olfato o gusto, dolores musculares), ni se me ha diagnosticado dicha enfermedad.</li>
												<li>Que tampoco he mantenido en dicho periodo contacto estrecho con persona alguna diagnosticada de COVID-19 o que se encuentre aislada preventivamente por dicha circunstancia.</li>
												<li>Que, en todo caso me comprometo, en caso de producirse alguna de las anteriores circunstancias entre la fecha de la firma de la presente declaración y el comienzo del evento, a no acudir a la instalación.</li>
												<li>Igualmente me comprometo, en caso de comenzar a presentar alguno de los síntomas referenciados anteriormente una vez en la instalación, a comunicarlo al personal del Club para que pueda establecerse el protocolo correspondiente.</li>
												<li>Me comprometo a cumplir, durante mi estancia en la instalación, con todas las normas de seguridad e higiene que sean indicadas por la organización o que sean de obligado cumplimiento en base a la legislación vigente.</li>
												<li>En caso de asistir en el futuro a nuevos eventos o actividades organizados por VALENCIA BASKET CLUB, S.A..D, me comprometo a cumplir igualmente con todo lo anteriormente descrito.</li>
											</ul>
											<p style="font-size: 16px;">Le recordamos que el incumplimiento o contravención de lo previsto en esta declaración responsable podrá ser notificado a la autoridad competente y podría acarrear la imposición de sanciones, según lo previsto en el DECRETO LEY 11/2020, de 24 de julio, del Consell, de régimen sancionador específico contra los incumplimientos de las disposiciones reguladoras de las medidas de prevención ante la Covid-19.</p>
										</div>
									</div>
									
									<!-- Paso 2: Datos personales solicitados -->
									<div class="row mt-1 renovacion-row">
										<div class="col-12 mb-1">
											<hr style="color: black; border: 1px solid #ccc;">
										</div>

										<div class="col-12">
											<h4 class="mt-0 mb-1">
												<strong>DATOS SOLICITADOS EN LA DECLARACIÓN:</strong>
											</h4>

											<p style="font-size: 16px;">Introduzca sus datos personales en los 4 campos para que rellenemos con ellos, de forma interna y automática, el texto de declaración responsable.<br> Al firmar y aceptar se enviará un correo electrónico a ValenciaBasket.</p>

											<div class="row">
												<div class="form-group col-12 col-md-3 col-lg-3 col-xl-3">
													<label>Señor/a (nombre completo)</label>
													<input type="text" class="form-control input-control-dni" name="nombrecompleto" id="nombrecompleto-form" maxlength="50" required>
												</div>

												<div class="form-group col-12 col-md-3 col-lg-3 col-xl-3">
													<label>DNI (mayor de edad))</label>
													<input type="text" class="form-control input-control-dni" name="dni" id="dni-form" maxlength="20" required>
												</div>

												<div class="form-group col-12 col-md-3 col-lg-3 col-xl-3">
													<label>Teléfono</label>
													<input type="number" class="form-control input-control-dni" name="telefono" id="telefono-form" maxlength="15" required>
												</div>

												<div class="form-group col-12 col-md-3 col-lg-3 col-xl-3">
													<label>Domicilio completo</label>
													<input type="text" class="form-control input-control-dni" name="domicilio" id="domicilio-form" maxlength="200" required>
												</div>

												<div class="col-12 col-md-12 col-lg-7 col-xl-6 mt-1">
													<label class="containerchekbox">
														<input type="checkbox" name="mediocomunicacion" value="1" id="mediocomunicacion-form">
														<p>Si pertenece a algún medio de comunicación, marque esta casilla.</p>
														<span class="checkmark"></span>
													</label>
												</div>

												<div class="form-group col-12 col-md-12 col-lg-5 col-xl-6" style="display: none;" id="nombremediocomunicacion">
													<label>Medio de comunicación</label>
													<input type="text" class="form-control input-control-dni" name="nombremediocomunicacion" id="nombremediocomunicacion-form" maxlength="200">
												</div>
											</div>
										</div>
									</div>

									<!-- Paso 3: Firma y envío de la declaración -->
									<div class="row mt-1 renovacion-row">
										<div class="col-12">
											<hr style="color: black; border: 1px solid #ccc;">
										</div>

										<!-- Firma -->
										<div class="col-12 col-lg-6 col-xl-6 mt-1 t-left">										
											<h4 class="mt-0 mb-1">
												<strong>FIRMA:</strong>
											</h4>

											<canvas id="pizarra1"></canvas>

											<input id="img_firma_tutor" type="hidden" name="img_firma_tutor">
											<button id="limpiar1" type="button" class="w-100" style="max-width: 500px !important; height: 3em;">
												Limpiar firma
											</button>
										</div>

										<!-- ALERT NO OLVIDA PULSAR VALIDAR FIRMAS -->
										<div id="revisar-firma-container" class="col-12 mt-1 hidden">
											<div class="alert alert-danger" role="alert">
												<h4><i class="fa fa-info-circle" aria-hidden="true"></i> <?php echo $lang["ins_form_firma_validar"];?></h4>
											</div>
										</div>

										<!-- Envío de la solicitud -->
										<div id="submit-container" class="col-12 mt-2 mb-4">
											<button id="submit-declaracion-responsable-form" class="btn btn-link-w w-100 input-control-dni" type="submit" style="width: 100%; margin-left: 0;" id="submit">
												<span><?php echo $lang["ins_form_enviar_solicitud"];?></span>
											</button>
										</div>
									</div>

									<div id="declaracion-responsable-form-espera" class="row renovacion-row" style="display: none;">
										<div class="col-12 alert alert-info">
											<h4>Por favor, espere mientras se procesa la solicitud.</h4>
										</div>
									</div>

									<div id="declaracion-responsable-form-respuesta" class="row renovacion-row" style="display: none;"></div>
								</form>
							</div> 
						</div>
					</div>
				</div>
			</section>
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
			// Gestiona el formulario 
			$('#declaracion-responsable-form').validate(
			{
				submitHandler:function()
				{
					// Transformamos el garabato en blob
					$("#img_firma_tutor").val(document.querySelector('#pizarra1').toDataURL('image/png'));

					var canvasvaciochrome="data:image/png;base64,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";

					var canvasvaciofirefox="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAfQAAAD6CAYAAABXq7VOAAAB+0lEQVR4nO3BAQEAAACCIP+vbkhAAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAMCjAaKDAAG6Z58dAAAAAElFTkSuQmCC";

					var canvasvaciosafari="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAfQAAAD6CAYAAABXq7VOAAAAAXNSR0IArs4c6QAACJtJREFUeAHt0IEAAAAAw6D5Ux/khVBhwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBg4HFgooMAAROxyEAAAAAASUVORK5CYII=";

                    if(
                    	($("#img_firma_tutor").val() !== canvasvaciochrome) &&
                    	($("#img_firma_tutor").val() !== canvasvaciofirefox) &&
                    	($("#img_firma_tutor").val() !== canvasvaciosafari)
                      )
                    {
                        var formData = new FormData();
                        formData.append("nombre",       		$("#nombrecompleto-form").val());
                        formData.append("dni",          		$("#dni-form").val());
                        formData.append("telefono",     		$("#telefono-form").val());
                        formData.append("domicilio",    		$("#domicilio-form").val());
                        formData.append("mediocomunicacion",	$('#mediocomunicacion-form').prop('checked'));
                        formData.append("nombremediocomunicacion", 	$("#nombremediocomunicacion-form").val());
                        formData.append("firma_tutor", 			$("#img_firma_tutor").val());


                        $.ajax(
                        {
                            type:           "POST",
                            url:            "?r=index/DeclaracionResponsableGestionaForm",
                            data:           formData,
                            processData:    false,          // tell jQuery not to process the data
                            contentType:    false,          // tell jQuery not to set contentType
                            dataType:       "json",
                            beforeSend:     function()
                            {
                                $("#declaracion-responsable-form-espera").show(300);
                                $("#submit-declaracion-responsable-form").prop("disabled", true);
                                //$("submit-formulario-inscripcion-cantera").css("background-color", "#777");
                            },
                            success:        function(data)
                            {
                                if(data.response==="success")
                                {
                                    $("#declaracion-responsable-form-espera").hide();
                                    $("#declaracion-responsable-form-respuesta").show(300);
                                    $("#declaracion-responsable-form-respuesta").html("<div class='alert alert-success col-12'><h4>" + data.message + "</h4></div>");
                                    // Redireccionamos después de mostrar mensaje durante 3000ms
                                    setTimeout(function(){
                                        window.location.href = "https://www.alqueriadelbasket.com";
                                    }, 2000);
                                }
                                else
                                {
                                    $("#declaracion-responsable-form-espera").hide();
                                    $("#declaracion-responsable-form-respuesta").show(300);
                                    // Permito volver a enviar
                                    $("#submit-declaracion-responsable-form").prop("disabled", false);

                                    $("#declaracion-responsable-form-respuesta").html("<div class='alert alert-danger col-12'><h4>" + data.message + "</h4></div>");
                                    $("#declaracion-responsable-form-respuesta").fadeTo(5000, 500).slideUp(500, function(){
                                        $("#declaracion-responsable-form-respuesta").slideUp(500);
                                        $("#declaracion-responsable-form-respuesta").html("");
                                    });
                                }
                            },
                            error: function(errorData)
                            {
                                $("#submit-declaracion-responsable-form").prop("disabled", false);
                                console.log("error");
                            }
                        });
                    }
                    else
                    {
                        alert("Por favor, no olvide firmar la declaración responsable");
                    }
				}
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
			function pararDibujar1(){
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
                //console.log(document.querySelector('#pizarra1').toDataURL('image/png'));
			});

			// returns true if all color channels in each pixel are 0 (or "blank")
			function isCanvasBlank(canvas)
			{
				return !canvas.getContext('2d')
				.getImageData(0, 0, canvas.width, canvas.height).data
				.some(channel => channel !== 0);
			}

			var isOn = false;
			$('#mediocomunicacion-form').on('change', function(){
				if (!isOn) {
					$('#nombremediocomunicacion').fadeIn(150);
					isOn = true;
				}
				else {
				 	$('#nombremediocomunicacion').fadeOut(150);
				 	isOn = false;
				}
			});
		</script>
	</body>
</html>