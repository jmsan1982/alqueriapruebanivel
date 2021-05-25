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
									<span class="orange-text">Declaración responsable de consentimiento individual de los/as deportistas y staff técnico de una entidad usuaria para realizar entrenamientos en L'Alqueria del Basket</span>
								</h3>
							</div>
						</div>

						<div class="row">
							<div class="col-12">
								<form id="declaracion-responsable-form" class="boxed-form" method="post">
									<!-- Paso 1: Texto a redactar -->
									<div class="row">
										<div class="col-12">
											<p style="font-size: 16px;">En fecha <?php echo $now;?></p>
											<p style="font-size: 16px;">Mediante este documento declaro:</p>
											<ul style="font-size: 16px;">
												<li>Que la finalidad del acceso a la instalación es la realización de un entrenamiento o una actividad Deportiva organizada.</li>
												<li>Que <u>todos los miembros de la entidad usuaria a la que represento</u>, incluidos los del Staff Técnico (entrenadores, ayudantes, etc.), han podido valorar y ponderar conscientemente los beneficios y efectos del entrenamiento y de la actividad, junto a los riesgos para la salud que comporta la actual situación de pandemia.</li>
												<li>Que, de forma individual, <u>cada uno de los miembros de la entidad usuaria a la que represento</u>, incluidos los del Staff Técnico (entrenadores, ayudantes, etc.), ha sido informado por el Representante de todos los términos de esta declaración y los riesgos que conlleva el uso de la instalación.</li>
											</ul>
											<p style="font-size: 16px;">Manifiesto que los miembros de la entidad usuaria (incluidos los del Staff Técnico):</p>
											<ul style="font-size: 16px;">
												<li>No han estado en contacto con personas infectadas en los últimos 14 días.</li>
												<li>No tienen en el momento de acceder a la instalación, ni han tenido en los últimos 14 días sintomatologías tales como tos, fiebre, alteraciones del sabor ni olfato, ni es persona perteneciente a los colectivos de riesgo.</li>
												<li>Han sido adecuadamente informados de las medidas que deben tener en cuenta para reducir los riesgos, y saben que los responsables de las instalaciones no pueden garantizar la plena seguridad en las instalaciones en este contexto</li>
												<li>Que han sido informados y advertidos sobre los riesgos que podrían sufrir si se contrae la enfermedad COVID-19, así como las consecuencias y posibles secuelas que podría comportar no solo para mi salud, sino también para la de los demás.</li>
											</ul>
											<p style="font-size: 16px;">Y de acuerdo a las manifestaciones anteriores, todos los miembros de la entidad usuaria (incluidos los del Staff Técnico):</p>
											<ul style="font-size: 16px;">
												<li>Conocen debidamente las directrices, indicaciones y recomendaciones de las autoridades sanitarias y de la Entidad deportiva donde desarrollan la actividad, y se comprometen a seguirlas debidamente así como a las detalladas por L’Alqueria del Basket.</li>
												<li>Comunicarán cualquier indicación establecida por la Instalación a sus acompañantes sobre las normas y recomendaciones que deben respetar mientras se encuentren en la Instalación.</li>
												<li>Se comprometen a comunicar cualquier síntoma compatible con COVID-19 durante el uso de la instalación.</li>
												<li>Se comprometen a comunicar la aparición de positivos en COVID-19 de los participantes en los 14 días siguientes al uso de la instalación, sin proporcionar datos personales de los afectados, para que en la misma se puedan tomar las medidas de seguridad e higiene necesarias.</li>
												<li>Entienden los riesgos y la posibilidad de infección por COVID-19, y son conscientes de las medidas que deben adoptar para reducir la probabilidad de contagio: distancia física, mascarilla respiratoria, lavado de manos frecuente y permanecer en casa de manera prioritaria.</li>
												<li>Declaran, haciendo uso de los derechos garantizados por la ley, su intención de usar las instalaciones deportivas, asumiendo personal e individualmente todas las consecuencias y responsabilidades.</li>
												<li>Eximen de responsabilidad a la entidad propietaria de la Instalación ante cualquier contagio que pudiera estar relacionado con la utilización de la misma.</li>
											</ul>
                                            <p style="font-size: 16px;">Le recordamos que el incumplimiento o contravención de lo previsto en esta declaración responsable podrá ser notificado a la autoridad competente y podría acarrear la imposición de sanciones, según lo previsto en el DECRETO LEY 11/2020, de 24 de julio, del Consell, de régimen sancionador específico contra los incumplimientos de las disposiciones reguladoras de les medidas de prevención ante la Covid-19.</p>
                                        </div>
                                    </div>

                                    <div class="row mt-1">
                                        <div class="col-12 mb-1">
                                            <hr style="color: black; border: 1px solid #ccc;">
                                        </div>

                                        <div class="col-12">
                                            <h4 class="mt-0 mb-1">
                                                <strong>AUTORIZACIÓN TRATAMIENTO IMÁGENES:</strong>
                                            </h4>
                                            <p>Dada la imposibilidad de acceso a la instalación para los acompañantes de los equipos, L’Alqueria del Basket pone a su disposición un servicio de streaming de los partidos a través de un enlace que podrán encontrar en el banner “partidos de la jornada” de nuestra web www.alqueriadelbasket.com al que podrán acceder de manera gratuita. Se le informa que las imágenes de los partidos podrán ser utilizadas en las redes sociales y medios de difusión de Valencia Basket Club, S.A.D. y/o Fundació Valencia Basquet 2000. En caso de no recabarse la autorización de todos los participantes en el encuentro, éste NO será retransmitido.</p>
                                            <p>Como responsable del equipo, declaro haber recabado el consentimiento al tratamiento y uso de las imágenes <u>de todos los participantes en el encuentro</u> que figuran en la relación adjunta o de sus tutores o representantes legales y autorizo el uso de las mismas conforme a lo anteriormente descrito.</p>
                                        </div>
									</div>
									
									<!-- Paso 2: Datos personales solicitados -->
									<div class="row mt-1">
										<div class="col-12 mb-1">
											<hr style="color: black; border: 1px solid #ccc;">
										</div>

										<div class="col-12">
											<h4 class="mt-0 mb-1">
												<strong>DATOS SOLICITADOS EN LA DECLARACIÓN:</strong>
											</h4>

											<p style="font-size: 16px;">Introduzca sus datos personales en los 4 campos para que rellenemos con ellos, de forma interna y automática, el texto de declaración responsable.<br> Al firmar y aceptar se enviará un correo electrónico a ValenciaBasket.</p>

											<div class="row">
												<div class="form-group col-12 col-md-6 col-lg-6 col-xl-4">
													<label>Señor/a (nombre completo)</label>
													<input type="text" class="form-control" name="nombrecompleto" id="nombrecompleto-form" maxlength="50" required>
												</div>

												<div class="form-group col-12 col-md-6 col-lg-3 col-xl-4">
													<label>DNI (mayor de edad))</label>
													<input type="text" class="form-control" name="dni" id="dni-form" maxlength="20" required>
												</div>

												<div class="form-group col-12 col-md-6 col-lg-3 col-xl-4">
													<label>Teléfono</label>
													<input type="number" class="form-control" name="telefono" id="telefono-form" maxlength="15" required>
												</div>

                                                <div class="form-group col-12 col-md-6 col-lg-6 col-xl-4">
                                                    <label>Correo electrónico</label>
                                                    <input type="text" class="form-control" name="email" id="email-form" maxlength="200" required>
                                                </div>

												<div class="form-group col-12 col-md-6 col-lg-6 col-xl-4">
													<label>Domicilio completo</label>
													<input type="text" class="form-control" name="domicilio" id="domicilio-form" maxlength="200" required>
												</div>

                                                <div class="form-group col-12 col-md-6 col-lg-6 col-xl-4">
                                                    <label>Equipo</label>
                                                    <input type="text" class="form-control" name="equipo" id="equipo-form" maxlength="200" required>
                                                </div>
											</div>
										</div>
									</div>

									<!-- Paso 3: Firma y envío de la declaración -->
									<div class="row mt-1">
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

                                        <div class="col-12 col-lg-6 col-xl-6 mt-4 t-left">
                                            <div class="alert alert-danger" role="alert">
                                                <h4><i class="fa fa-info-circle" aria-hidden="true"></i> Se debe imprimir el email que se reciba al enviar la declaración y presentarlo en el momento de acceder a las instalaciones del L´Alqueria.</h4>
                                            </div>
                                        </div>

										<!-- ALERT NO OLVIDA PULSAR VALIDAR FIRMAS -->
										<div id="revisar-firma-container" class="col-12 mt-1 hidden">
											<div class="alert alert-danger" role="alert">
												<h4><i class="fa fa-info-circle" aria-hidden="true"></i> <?php echo $lang["ins_form_firma_validar"];?></h4>
											</div>
										</div>

										<!-- Envío de la solicitud -->
										<div id="submit-container" class="col-12 mt-2 mb-4">
											<button id="submit-declaracion-responsable-form" class="btn btn-link-w w-100" type="submit" style="width: 100%; margin-left: 0;" id="submit">
												<span><?php echo $lang["ins_form_enviar_solicitud"];?></span>
											</button>
										</div>
									</div>

									<div id="declaracion-responsable-form-espera" class="row" style="display: none;">
										<div class="col-12 alert alert-info">
											<h4>Por favor, espere mientras se procesa la solicitud.</h4>
										</div>
									</div>

									<div id="declaracion-responsable-form-respuesta" class="row" style="display: none;"></div>
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
                        formData.append("email",    		    $("#email-form").val());
                        formData.append("domicilio",    		$("#domicilio-form").val());
                        formData.append("equipo",    		    $("#equipo-form").val());
                        formData.append("firma_tutor", 			$("#img_firma_tutor").val());


                        $.ajax(
                        {
                            type:           "POST",
                            url:            "?r=index/DeclaracionResponsableGestionaFormEntidadUsuaria",
                            data:           formData,
                            processData:    false,          // tell jQuery not to process the data
                            contentType:    false,          // tell jQuery not to set contentType
                            dataType:       "json",
                            beforeSend:     function()
                            {
                                $("#declaracion-responsable-form-espera").show(300);
                                $("#submit-declaracion-responsable-form").prop("disabled", true);
                            },
                            success:        function(data)
                            {
                                if(data.response==="success")
                                {
                                    $("#declaracion-responsable-form-espera").hide();
                                    $("#declaracion-responsable-form-respuesta").show(300);
                                    $("#declaracion-responsable-form-respuesta").html("<div class='alert alert-success col-12'><h4>" + data.message + "</h4></div>");
                                    // Redireccionamos después de mostrar mensaje durante 300ms
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
                        alert("Por favor, no olvide firmar la declaración responsable.");
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
		</script>
	</body>
</html>