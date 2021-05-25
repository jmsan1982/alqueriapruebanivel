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
		canvas{
			width: 500px !important;
			height: 250px;
			background-color: #ffffff;
			border: 1px solid black;
		}
	</style>

	<body class="Pages" id="formus">

		<div class="wrapper overflow-x-hidden">

			<?php require ("includes/header.php"); ?>

			<section id="page-content" class="overflow-x-hidden margin-top-header">
				<!-- Imagen de cabecera de la página -->
				<div class="block">
					<div class="container-fluid">
						<div class="row">
							<div class="parallax col-12 mt-0" style="background-image: url('img/culturadelesfuerzo/top-cultura-esfuerzo-cabecera.jpg');">
							</div>
						</div>
					</div>
				</div>

				<div class="block background-f6">
					<div class="container">

						<!-- Titulo y info alert -->
						<div class="row">
							<div class="col-12 col-sm-6 col-md-6 text-center">
								<h3 class="section-title mb-0" style="font-size: 35px;">
									<span class="orange-text"><?php echo $lang["licencia_titulo"];?></span>
								</h3>
								<h4 class="section-title mt-0 mb-1" style="font-size: 28px;">2019 / 2020</h4>
							</div>

							<div class="col-12 col-sm-6 col-md-6 mt-3 mb-2">
								<div class="contact-info-wrap t-center" style="background: none; background-color: #fafafa;">	
									<h4 class="section-title mt-0 mb-0 t-center">
										<span class="orange-text"><?php echo $lang["soporte_tecnico_titulo"];?></span>
									</h4>
									<p class='t-center'>
										<strong><?php echo $lang["soporte_tecnico_texto"];?></strong>
									</p>
									<a href="https://wa.me/+34687717491" target="_blank" style='color:black;font-size:1.3em;'><img src="img/wassap3.png" style='max-width:50px;'>
										<strong> WhatsApp 687717491</strong>
									</a>
								</div>
							</div>

							<div class="form-group col-12 hidden-xs hidden-sm">
								<div class="alert alert-primary redimension" role="alert">
								  <h4><i class="fa fa-info-circle" aria-hidden="true"></i> <?php echo $lang["licencia_informacion"];?></h4>
								</div>
							</div>
						</div>

						<div class="row mt-1">
							<div class="col-12">
								<form id="FormGenerarLicencia" 
									  class="boxed-form" 
									  method="post" 
									  enctype="multipart/form-data" 
									  action="index.php?r=index/GenerarLicencia">

									<!-- PARTE 0 FORM - búsqueda de DNI y carga de jugador -->
									<div class="row">
										<div class="form-group col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 redimension">
											<label style="font-weight: bold; font-size: 20px;"><?php echo $lang["formulario_dni_titular_jugador"];?>:</label>
											<br>
											<input type="text" id="validacion-dni" class="form-control" name="validacion-dni" maxlength="50" style="margin-top: 2%;">
										</div>

										<div class="form-group col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 redimension mt-2">
											<button type="button" class="btn btn-link-w w-100" name="buscar-validacion-dni" id="buscar-validacion-dni" style="max-height: 59px; margin-top: 28px; margin-left: 0;">
											  <span><?php echo $lang["buscar"];?></span>
											</button>
										</div>

										<div class="form-group col-12 col-sm-12 col-md-12 col-lg-4 col-xl-5 redimension mt-2">
											<label style="font-weight: bold; font-size: 20px;"><?php echo $lang["escuela_texto_select"];?></label>
											<select class="form-control" value="" name="validacion-dni-select" id="validacion-dni-select">
												<option value="0" disabled selected><?php echo $lang["escuela_option"];?></option>  
											</select>
										</div> 
									</div>

									<!-- PARTE 1 FORM - Tipo: jugador, entrenador, etcetera. -->
									<div class="row mt-2">
										<div class="form-group col-12">
										   <div class="row pl-1 pr-1">
												<div class="col-xs-12 col-md-12">
													<h4 class="t-left" style="font-weight: bold; font-size: 20px;"><?php echo $lang["licencia_titulo_solicita"];?>:</h4>
													<div class="form-group">
														<div class="col-sm-3 mb-1">
															<label class="control control--radio" style="font-weight: bold;">
																<?php echo $lang["licencia_solicita_jugador"];?>
																<input type="radio" name="optradio" value="Jugador" checked="true">
																<div class="control__indicator"></div>
															</label>
														</div>

														<div class="col-sm-3 mb-1">
															<label class="control control--radio" style="font-weight: bold;">
																<?php echo $lang["licencia_solicita_entrenador"];?>
																<input type="radio" name="optradio" value="Entrenador">
																<div class="control__indicator"></div>
															</label>
														</div>

														<div class="col-sm-3 mb-1">
															<label class="control control--radio" style="font-weight: bold;">
																<?php echo $lang["licencia_asistente"];?>
																<input type="radio" name="optradio" value="Asistente">
																<div class="control__indicator"></div>
															</label>
														</div>
														
														<div class="col-sm-3 mb-1">
															<label class="control control--radio" style="font-weight: bold;">
																<?php echo $lang["licencia_delegado"];?>
																<input type="radio" name="optradio" value="Delegado de campo">
																<div class="control__indicator"></div>
															</label>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									
									<!-- PARTE 2 FORM - Fecha solicitud, DNI, fecha nacimiento -->
									<div class="row">
										<div class="form-group col-12 col-md-4 col-lg-4 col-xl-4">
											<label>Fecha de la solicitud:
												<input type="date" class="form-control" style="color: #5c5c5c !important;" id="fecha_solicitud" name="fecha_solicitud" value="<?php echo date("Y-m-d"); ?>" required>
											</label>
										</div>

										<div class="form-group col-12 col-md-4 col-lg-4 col-xl-4">
											<label><?php echo $lang["formulario_dni_jugador"];?>
												<input type="text" id="dni_licencia" class="form-control input-control-dni" name="dni_licencia" required>
											</label>
										</div>

										<div class="form-group col-12 col-md-4 col-lg-4 col-xl-4">
											<label><?php echo $lang["formulario_cumpleaños"];?>
												<input type="date" id="fecha_nacimiento_licencia" class="form-control input-control-dni" name="fecha_nacimiento_licencia" required>
											</label>
										</div>
									</div>
									
									<!-- PARTE 2 FORM - Nombre, apellidos -->
									<div class="row">
										<div class="form-group col-12 col-md-6 col-lg-6 col-xl-6">
											<label><?php echo $lang["formulario_nombre"];?>
												<input type="text" id="nombre_licencia" class="form-control input-control-dni" name="nombre_licencia" required>
											</label>
										</div>

										<div class="form-group col-12 col-md-6 col-lg-6 col-xl-6">
											<label><?php echo $lang["formulario_apellidos"];?>
												<input type="text" id="apellidos_licencia" class="form-control input-control-dni" name="apellidos_licencia" required>
											</label>
										</div>                                                                          
									</div> 
									
									<!-- PARTE 2 FROM - Club, categoria y equipo --> 
									<div class="row">
										<div class="form-group col-12">
											<label><?php echo $lang["licencia_nombre_equipo"];?>
												<input type="text" class="form-control" name="nombre_equipo_licencia" id="nombre_equipo_licencia" required readonly>
											</label>
										</div>
									</div>

									<div class="row">
										<div class="form-group col-12 col-md-6 col-lg-6 col-xl-6">
											<label><?php echo $lang["licencia_categoria"];?>
												<input type="text" id="categoria_licencia" class="form-control input-control-dni" name="categoria_licencia" required readonly> 
											</label>
										</div>

										<div class="form-group col-12 col-md-6 col-lg-6 col-xl-6">
											<label><?php echo $lang["licencia_club"];?>
												<input type="text" id="club_licencia" class="form-control input-control-dni" name="club_licencia" required readonly>
											</label>
										</div>
									</div>

									<!-- ALERT NO OLVIDA PULSAR VALIDAR FIRMAS 
									<div class="row">
										<div class="form-group col-12 mb-1">
											<div class="alert alert-primary redimension" role="alert">
												<h4>
													<i class="fa fa-info-circle" aria-hidden="true"></i> No olvide pulsar en el boton "<strong>Validar Firma</strong>" una vez compruebe que las firmas estan bien.
												</h4>
											</div>
										</div>
									</div>-->

									<!-- COMPONENTES DE FIRMAS -->
									<div class="row">
										<div class="form-group col-10 col-lg-6 col-xl-6 t-center">
											<label><?php echo $lang["licencia_titulo_firma_solicitante"];?>
												<canvas id="pizarra"></canvas>
											</label>
											<input type="hidden" id="existe_inscripcion" value="0" name="existe_inscripcion">
											<button type="button" id="limpiar" class="w-100" 
													style="max-width:500px !important;height:3em;">?php echo $lang["licencia_btn_limpiar_firma"];?></button>
										</div>
										
										<div class="form-group col-10 col-lg-6 col-xl-6 t-center">
											<label><?php echo $lang["licencia_titulo_firma_solicitante"];?>
												<canvas id="pizarra1"></canvas>
											</label>
											<button type="button" class="w-100" id="limpiar1" 
													style="max-width:500px !important;height:3em;"><?php echo $lang["licencia_btn_limpiar_firma"];?></button>
										</div>
										
										<div class="col-12 t-left">
											<button type="button" class="btn ml-0" id="generar_Firma" 
													style="height:50px;width: 100%;-webkit-transform: skew(0deg);
													-ms-transform: skew(0deg);transform:skew(0deg);-webkit-border-radius: 0px;
													border-radius: 0px;background-color:#eb7c00;"><?php echo $lang["licencia_btn_guardar_firma"];?></button>
										</div>
										
										<!-- ALERT NO OLVIDA PULSAR VALIDAR FIRMAS -->
										<div id="revisar-firma-container" class="col-12 mt-1 hidden">
											<div class="alert alert-danger" role="alert">
												<h4><i class="fa fa-info-circle" aria-hidden="true"></i> Por favor, revise la firma para continuar.</h4>
											</div>
										</div>
									</div>

									<!-- Subida de ficheros: foto y de DNI -->
									<div class="row mt-2 mb-2">
										<div class="col-12 t-center">
											<hr>
											<h2 class="section-title"><?php echo $lang["licencia_siguiente_paso_titulo"];?></h2>
										</div>

										<div class="form-group col-10 col-lg-6 col-xl-6">
											<div class="row">
												<div class="col-12">
													<label>
														<h4 id="foto-jugador-h4"><strong><?php echo $lang["licencia_siguiente_paso_foto_jugador"];?></strong></h4>
														<input type="file" name="foto" accept="image/png, image/jpeg" style="border: none !important;" required>
													</label>
												</div>

												<div class="col-12 mt-1">
													<span style="color: red; font-size: 17px;">
														<?php echo $lang["licencia_siguiente_paso_aviso1"];?>
													</span>
												</div>
											</div>
										</div>

										<div class="form-group col-10 col-lg-6 col-xl-6">
											<div class="row">
												<div class="col-12">
													<label>
														<h4><strong><?php echo $lang["licencia_siguiente_paso_dni_frontal"];?></strong></h4>
														<input type="file" name="dni_jugador_imagen[]" style="border: none !important;"
															   accept="image/png, image/jpeg" required>
													</label>
												</div>

												<div class="col-12 mt-1">
													<span style="color: red; font-size: 17px;">
														<?php echo $lang["licencia_siguiente_paso_aviso2"];?>
													</span>
												</div>
											</div>
										</div>
									</div>

									<input type="hidden" id="img_firma_jugador" name="img_firma_jugador">
									<input type="hidden" id="img_firma_tutor" name="img_firma_tutor">

									<div id="input-control-dni-container" class="row mt-2 mb-4 hidden">
										<div class="col-12">
											<hr>
											<button class="btn btn-link-w w-100 input-control-dni" style="width:100%;margin-left:0px;" type="submit" id="submit">
												<span><?php echo $lang["guardar_licencia"];?></span>
											</button>
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
		<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.12.0/jquery.validate.min.js" type="text/javascript"></script>

		<script>
		$("document").ready(function()
		{
		   /*CANVAS FIRMA SOLICITANTE*/ 

				//======================================================================
				// VARIABLES
				//======================================================================
				let miCanvas = document.querySelector('#pizarra');
				let lineas = [];
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

				/**
				 * Funcion que empieza a dibujar la linea
				 */
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
		   /**/ 

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

			$( "#buscar-validacion-dni" ).on( "click", function()
			{
				if( $("#validacion-dni").val().trim() !== ""  )
				{
					var form_data = {
						dni: $("#validacion-dni").val().trim()
					};

					$.ajax({
						type: "POST",
						url: "?r=index/findByIDTutorSinCategoria",
						data: form_data,
						dataType: "json",
						success: function (data) {
							$("#validacion-dni-select option").remove();
							if( data.datos.length > 0  ){   
								for( var m = 0 ; m < data.datos.length ; m++ ){
									if( m==0 ){
										$("#validacion-dni-select").append("<option value='" + data.datos[m].id_formulario + "' selected>" + data.datos[m].nombre_apellidos + "</option>");
									}else{
										$("#validacion-dni-select").append("<option value='" + data.datos[m].id_formulario + "'>" + data.datos[m].nombre_apellidos + "</option>");
									}   
								}
								BuscarAlumno();
							}else{
								alert("No hay resultados para el DNI introducido. \nSi tiene algun problema en la busqueda por DNI, por favor, pongase en contacto con nosotros.");                            
							}
						}
					});
				}
				else
				{
					alert("El DNI no se ha introducido correctamente, por favor, compruebe que tiene 9 caracteres y incluye la letra.");
					VaciarCampos();
					$("#existe_inscripcion").val( "0" );  
				}
			});

			$( "#validacion-dni-select" ).on( "change", function(){
				BuscarAlumno();  
			});

			function BuscarAlumno()
			{
				if( $("#validacion-dni-select option:selected").val() != 0 )
				{
					var form_data = {
						form_id:            "inscripciones_cargar_contenido_inscripcion_original_conEquipoHorario",
						dni_busqueda:       $("#validacion-dni").val(),
						idinscripcion:      $("#validacion-dni-select option:selected").val(),
						nombre_apellidos:   $("#validacion-dni-select option:selected").text()
					};

					$.ajax({
						type: "POST",
						url: "?r=ajax/Dispatcher",
						data: form_data,
						dataType: "json",
						success: function (data)
						{
							console.log(data);
							
							$("#existe_inscripcion").val( data.datos.id_formulario );
							
							//dni
								if(data.datos.dni_jugador != null ){
									var valor_dni_licencia = data.datos.dni_jugador.toUpperCase();
									$("#dni_licencia").val(valor_dni_licencia);
								}

							//fecha nacimiento
								if(data.datos.fecha_nacimiento != null ){
									$("#fecha_nacimiento_licencia").val(data.datos.fecha_nacimiento);
								}

							//nombre
								if(data.datos.nombre_apellidos != null ){
									$("#nombre_licencia").val( data.datos.nombre_apellidos.slice( 0, data.datos.nombre_apellidos.indexOf(" ", 2) ) );
									var valor_nombre_form_masculino = $('#nombre_licencia').val().toUpperCase();
									$('#nombre_licencia').val(valor_nombre_form_masculino);
								}

							//apellidos
								if(data.datos.nombre_apellidos != null ){
									$("#apellidos_licencia").val( data.datos.nombre_apellidos.slice( data.datos.nombre_apellidos.indexOf(" ", 2 ) ) );
									var valor_apellidos_form_masculino = $('#apellidos_licencia').val().toUpperCase();
									$('#apellidos_licencia').val(valor_apellidos_form_masculino);
								}
								
							//  equipo
							console.log("EQUIPO");
							console.log(data.datos.id_federacion_equipo);
							console.log(data.datos.NombreEquipo);
								if(data.datos.id_federacion_equipo != "" ){
									$("#nombre_equipo_licencia").val(data.datos.NombreEquipo);
									$('#nombre_equipo_licencia').val( $('#nombre_equipo_licencia').val().toUpperCase() )
								}
								else{
									$('#nombre_equipo_licencia').val("");
								}
								
							//  categoria
							console.log("CATEGORIA");
							console.log(data.datos.id_federacion_categoria);
							console.log(data.datos.NombreCategoria);
								if(data.datos.id_federacion_categoria != null ){
									$("#categoria_licencia").val(data.datos.NombreCategoria);
									$('#categoria_licencia').val( $('#categoria_licencia').val().toUpperCase() );
								}
								else{
									$('#categoria_licencia').val("");
								}
								
								/*if(data.datos.id_federacion_clubs != null && data.datos.dni_jugador == "52315123J")
								{
									$("#nombre_equipo_licencia").val("Equipo 1: VALENCIA BASKET A. Equipo 2: VALENCIA BASKET B");
									$("#categoria_licencia").val("Cat 1: JUNIOR FEMENINO NIVEL 1. Cat 2: IR INFANTIL FEMENINO Nivel 1");
								}*/
								
								
							//  club
							console.log("CLUB");
							console.log(data.datos.id_federacion_clubs);
							console.log(data.datos.NombreClub);
								if(data.datos.id_federacion_clubs != null ){
									$("#club_licencia").val(data.datos.NombreClub);
									$('#club_licencia').val( $('#club_licencia').val().toUpperCase());
								}
								else{
									$('#club_licencia').val("");
								}
						   
						},error: function (){
							console.log("error en el ajax");
						}
					});
				}
			}

			function VaciarCampos(){  
				$("#fecha_licencia").val("");
				$("#nombre_equipo_licencia").val("");
				$("#categoria_licencia").val("");
				$("#club_licencia").val("");
				$("#dni_licencia").val("");
				$("#fecha_nacimiento_licencia").val("");
				$("#nombre_licencia").val("");
				$("#apellidos_licencia").val("");
			}

			/*  Enviar el trazado */
			function GuardarTrazado()
			{
				$("#img_firma_jugador").val(document.querySelector('#pizarra').toDataURL('image/png') );
				$("#img_firma_tutor").val(document.querySelector('#pizarra1').toDataURL('image/png') );
			}

			//  Oyente que se dispara al Validar firma 
			$( "#generar_Firma" ).on( "click", function()
			{
				GuardarTrazado();  
				//if(!isCanvasBlank()){
					//$("#input-control-dni-container").removeClass("hidden");
					//$("#revisar-firma-container").removeClass("hidden");
				//}
				
				if($("#nombre_equipo_licencia").val()!=="")
				{
					$("#input-control-dni-container").removeClass("hidden");
					$('html, body').animate({scrollTop: $("#foto-jugador-h4").offset().top},1000);
				}
				else
				{
					alert("Parece que no hay ningún equipo asignado. Escríbanos al WhatsApp indicando DNI del jugador / a para solucionar el error: 687717491");
				}
			});
		});
		</script>
	</body>
</html>