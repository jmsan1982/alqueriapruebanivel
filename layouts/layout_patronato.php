<!DOCTYPE html>
<html lang="es"> 
	<?php require('includes/head.php'); ?>
	<link rel="stylesheet" href="css/forms.css">
	<link rel="stylesheet" href="css/parallax.css">
	<link rel="stylesheet" href="css/formus.css">

	<style>
		.error {
			color: red;
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
							<div class="parallax col-12 mt-0" style="background-image: url('img/cabecera-escuela-femenina.jpg');">
							</div>
						</div>
					</div>
				</div>

				<div class="block background-f6">
					<div class="container">
						<div class="row">
							<div class="col-12 col-md-3 col-lg-3 col-xl-3" id="escudo">
								<img class="img-responsive" src="img/escudo-patronato.png" style="margin: 0 auto;" alt="Escudo Patronato L´Alqueria del Basket">
							</div>

							<div class="col-12 col-md-9 col-lg-9 col-xl-9" id="titulo">								
								<h2 class="section-title">
									<span class="orange-text"><?php echo $lang["patronato_titulo"];?></span>
								</h2>
								<h3 class="section-title mb-2"><?php echo $lang["patronato_subtitulo"];?></h3>
								<?php
								/* <h2 class="section-title">
									<span class="orange-text">Las inscripciones a Patronato están cerradas temporalmente.</span>
								</h2> */
								?>
							</div>
						</div>

						<div class="row mt-1">
							<div class="col-12">
								<form id="patronatoForm" class="boxed-form" name="contactform" method="post">
									<input type="hidden" value="patronato" name="categoria">

									<!-- PARTE 1 DATOS -->
									<div class="row">
										<div class="form-group col-12">
											<div class="row">
												<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 redimension">
													<label><?php echo $lang["formulario_cumpleaños"];?>:
														<input type="date" class="form-control" style="color: #5c5c5c !important;" id="fecha" name="fechanacimiento" required>
													</label>
												</div>

												<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 redimension">
													<label><?php echo $lang["formulario_nombre"];?>:
														<input type="text" class="form-control" name="nombre" maxlength="50" required>
													</label>
												</div>

												<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 redimension">
													<label><?php echo $lang["formulario_apellidos"];?>:
														<input type="text" id="apellidos" class="form-control" name="apellidos" maxlength="50" required>
													</label>
												</div>
											</div>
										</div>

										<div class="form-group col-12">
											<div class="row">
												<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 redimension">
													<label><?php echo $lang["formulario_direccion"];?>:
														<input type="text" class="form-control" name="direccion" maxlength="255" required>
													</label>
												</div>

												<div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2 redimension">
													<label><?php echo $lang["formulario_numero"];?>:
														<input type="number" class="form-control" name="numero" maxlength="10">
													</label>
												</div>

												<div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2 redimension">
													<label><?php echo $lang["formulario_piso"];?>:
														<input type="text" class="form-control" name="piso" maxlength="20">
													</label>
												</div>

												<div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2 redimension">
													<label><?php echo $lang["formulario_puerta"];?>:
														<input type="text" class="form-control" name="puerta" maxlength="20">
													</label>
												</div>
											</div>
										</div>

										<div class="form-group col-12">
											<div class="row">
												<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 redimension">
													<label><?php echo $lang["formulario_poblacion"];?>:
														<input type="text" class="form-control" name="poblacion" maxlength="100" required>
													</label>
												</div>

												<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 redimension">
													<label><?php echo $lang["formulario_codigo_postal"];?>:
														<input type="number" class="form-control" name="cp" maxlength="5" required>
													</label>
												</div>

												<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 redimension">
													<label><?php echo $lang["formulario_provincia"];?>:
														<input type="text" class="form-control" name="provincia" maxlength="25" required>
													</label>
												</div>
											</div>
										</div>

										<div class="form-group col-12">
											<div class="row">
												<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 redimension">
													<label>Nombre Padre:
														<input type="text" class="form-control" name="nombrepadre" maxlength="100" required>
													</label>
												</div>
												<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 redimension">
													<label>Nombre Madre:
														<input type="text" class="form-control" name="nombremadre" maxlength="100" required>
													</label>
												</div>
											</div>
										</div>

										<div class="form-group col-12">
											<div class="row">
												<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 redimension">
													<label><?php echo $lang["formulario_nombre_padre"];?>:
														<input type="number" class="form-control" name="tlfpadre" maxlength="20" required>
													</label>
												</div>

												<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 redimension">
													<label><?php echo $lang["formulario_nombre_madre"];?>:
														<input type="number" class="form-control" name="tlfmadre" maxlength="20" required>
													</label>
												</div>
											</div>
										</div>

										<div class="form-group col-12">
											<div class="row">
												<div class="col-12 redimension">
													<label><?php echo $lang["formulario_correo"];?>:
														<input type="email" class="form-control" name="email" maxlength="100" required>
													</label>
												</div>
											</div>
										</div>

										<div class="col-12">
											<p class="t-left mt-0" style="color: red;">
												<strong>*<?php echo $lang["formulario_aviso_email"];?></strong>
											</p>
										</div>

										<div class="form-group col-12 col-md-6 col-lg-6 col-xl-6">
											<div class="row">
												<div class="col-12">
													<h3 class="section-title"><?php echo $lang["patronato_tipo_alumno_titulo"];?></h3>
												</div>

												<div class="col-12 mb-1" style="font-size: 1.2em;">
													<label class="control control--radio">
														<?php echo $lang["patronato_tipo_alumno_centro"];?>
														<input type="radio" name="tipo" value="interno">
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
														<input type="checkbox" name="hermano" value="1">
														<p><?php echo $lang["patronato_tipo_alumno_opcion_hermanos"];?></p>
														<span class="checkmark"></span>
													</label>
												</div>

											</div>
										</div>
									</div>

									<!-- PARTE 2 -->
									<div class="row">
										<div class="form-group col-12 col-md-6 col-lg-6 col-xl-6">
											<div class="row"> 
												<div class="col-12">
													<h3 class="section-title"><?php echo $lang["patronato_equipo_titulo"];?></h3>
												</div>

												<div class="col-12">
													<h4 class="orange-text mt-0 mb-0"><?php echo $lang["patronato_equipo_titulo_prebenjamin"];?></h4>
												</div>

												<div class="col-12 mb-2" style="font-size: 1.2em;">
													<label class="control control--radio">
														<?php echo $lang["patronato_equipo_horario_prebenjamin"];?>
														<input type="radio" name="modalidad" value="prebenjaminmixto">
														<div class="control__indicator"></div>
													</label>
												</div>

												<div class="col-12">
													<h4 class="orange-text mt-0 mb-0"><?php echo $lang["patronato_equipo_titulo_benjamin"];?></h4>
												</div>

												<div class="col-12 mb-2" style="font-size: 1.2em;">
													<label class="control control--radio">
														<?php echo $lang["patronato_equipo_horario_benjamin"];?>
														<input type="radio" name="modalidad" value="benjaminmixto">
														<div class="control__indicator"></div>
													</label>
												</div>

												<div class="col-12">
													<h4 class="orange-text mt-0 mb-0"><?php echo $lang["patronato_equipo_titulo_alevin"];?></h4>
												</div>

												<div class="col-12 mb-2" style="font-size: 1.2em;">
													<label class="control control--radio">
														<?php echo $lang["patronato_equipo_horario_alevin"];?>
														<input type="radio" name="modalidad" value="alevinmixto">
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

												<div class="col-12">
													<h4 class="orange-text mt-0 mb-0"><?php echo $lang["patronato_equipo_titulo_cadete"];?></h4>
												</div>

												<div class="col-12 mb-1" style="font-size: 1.2em;">
													<label class="control control--radio">
														<?php echo $lang["patronato_equipo_horario_cadete_masc"];?>
														<input type="radio" name="modalidad" value="cadetemasculino">
														<div class="control__indicator"></div>
													</label>
												</div>

												<div class="col-12 mb-2" style="font-size: 1.2em;">
													<label class="control control--radio">
														<?php echo $lang["patronato_equipo_horario_cadete_fem"];?>
														<input type="radio" name="modalidad" value="cadetefemenino">
														<div class="control__indicator"></div>
													</label>
												</div>

												<div class="col-12">
													<h4 class="orange-text mt-0 mb-0"><?php echo $lang["patronato_equipo_titulo_junior"];?></h4>
												</div>

												<div class="col-12 mb-1" style="font-size: 1.2em;">
													<label class="control control--radio">
														<?php echo $lang["patronato_equipo_horario_junior_masc"];?>
														<input type="radio" name="modalidad" value="juniormasculino">
														<div class="control__indicator"></div>
													</label>
												</div>

												<div class="col-12" style="font-size: 1.2em;">
													<label class="control control--radio">
														<?php echo $lang["patronato_equipo_horario_junior_fem"];?>
														<input type="radio" name="modalidad" value="juniorfemenino">
														<div class="control__indicator"></div>
													</label>
												</div>
											</div>
										</div>

										<div class="col-12 col-md-6 col-lg-6 col-xl-6">
											<div class="row">
												<div class="col-12">
													<h3 class="section-title t-center"><?php echo $lang["patronato_informacion_titulo"];?></h3>
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

									<!-- PARTE 3 -->
									<div class="row">
										<div class="col-12">
											<h3 class="section-title t-center mb-0">
												<span class="orange-text">Pagos, plazos y método de pago</span>
											</h3>
										</div>

										<div class="col-12">
											<h4 class="section-title t-justify mt-1 mb-0">
												<!-- <strong>Reserva de plaza: 50€<br> -->
												<span style="color:red;"><?php echo $lang["patronato_titulo_pagos_plazos_metodos"];?></span>
											</h4>
											<p class="t-justify"><?php echo $lang["patronato_titulo_pagos_tarjeta_oficina_texto"];?></p>
											<p class="t-justify">- <?php echo $lang["patronato_titulo_pagos_tarjeta_oficina_punto1"];?>
											<br>- <?php echo $lang["patronato_titulo_pagos_tarjeta_oficina_punto2"];?>
											<br>- <?php echo $lang["patronato_titulo_pagos_tarjeta_oficina_punto3"];?></p>
										</div>
									</div>

									<div class="row">
										<div class="col-12 col-md-4 col-lg-4 col-xl-4">
											<h4 class="section-title mt-1 mb-0"><?php echo $lang["patronato_titulo_precio_matricula"];?></h4>
											<p class="t-justify mb-0"><span style="color:red;"><strong>- <?php echo $lang["patronato_punto1_precio_matricula"];?></strong></span></p>
											<p class="t-justify mt-0 mb-0"><span style="color:red;"><strong>- <?php echo $lang["patronato_punto2_precio_matricula"];?></strong></span></p>
										</div>

										<div class="col-12 col-md-4 col-lg-4 col-xl-4">
											<h4 class="section-title mt-1 mb-0"><?php echo $lang["patronato_titulo_trimestres"];?></h4>  
											<p class="t-justify mt-0 mb-0">- <?php echo $lang["patronato_punto1_trimestres"];?></p>
											<p class="t-justify mt-0 mb-0">- <?php echo $lang["patronato_punto2_trimestres"];?></p>
											<p class="t-justify mt-0 mb-0">- <?php echo $lang["patronato_punto3_trimestres"];?></p>
										</div>

										<div class="col-12 col-md-4 col-lg-4 col-xl-4">
											<h4 class="section-title mt-1 mb-0"><?php echo $lang["patronato_titulo_plazos"];?></h4>
											<p class="t-justify mb-0">- <?php echo $lang["patronato_punto1_plazos"];?> </p>
											<p class="t-justify mt-0 mb-0">- <?php echo $lang["patronato_punto2_plazos"];?> </p>
											<p class="t-justify mt-0 mb-0">- <?php echo $lang["patronato_punto3_plazos"];?></p>
										</div>
									</div>

									<div class="row">
										<div class="col-12">
											<hr>
											<p class="t-justify"><?php echo $lang["patronato_punto1_ultimo_texto_pagos"];?></p>
											<p class="t-justify"><?php echo $lang["patronato_punto2_ultimo_texto_pagos"];?></p>
											<p class="t-justify" style="color: red;"><?php echo $lang["patronato_punto3_ultimo_texto_pagos"];?></p>
										</div>
									</div>

									<div class="row">
										<!-- Columna Izquierda (Soporte Técnico) -->
										<div class="col-12 col-md-3 col-lg-3 col-xl-3 mt-2">
											<div class="contact-info-wrap t-center">
												<h3 class="section-title mt-0 mb-0 t-center">
													<span class="orange-text"><?php echo $lang["soporte_tecnico_titulo"];?></span>
												</h3>
												<p class="t-center">
													<strong><?php echo $lang["soporte_tecnico_texto"];?></strong>
												</p>
												<a href="https://wa.me/+34687717491" target="_blank" style="color: black; font-size: 1.3em;">
													<img src="img/wassap3.png" style="max-width: 50px;"><strong> WhatsApp 687717491</strong>
												</a>
											</div>
										</div>

										<!-- Columna Derecha (Domiciliación Bancaria) -->
										<div class="col-12 col-md-9 col-lg-9 col-xl-9 mt-2">
											<div class="row">
												<div class="col-12">
													<h4 class="section-title t-center mt-0 mb-1"><?php echo $lang["domiciliacion_titulo"];?></h4>
												</div>

												<div class="form-group col-12">
													<div class="row">
														<div class="col-12 col-md-6 col-lg-6 col-xl-6 redimension">
															<label><?php echo $lang["domiciliacion_titular"];?>
																<input type="text" class="form-control" name="titular" maxlength="100" required>
															</label>
														</div>

														<div class="col-12 col-md-6 col-lg-6 col-xl-6 redimension">
															<label><?php echo $lang["formulario_dni"];?>
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
															<script type="text/javascript">
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
															</script>
														</div>

														<div class="col-12 mt-1">
															<p class="t-left mt-0">
																<strong>*<?php echo $lang["domiciliacion_texto_domiciliacion"];?></strong>
															</p>
														</div>
													</div>
												</div>

												<div class="form-group col-12">
													<div class="row">
														<div class="col-12 redimension">
															<label class="containerchekbox">
																<input type="checkbox" name="autorizo" value="si" required>
																<p><?php echo $lang["politicas_check_condiciones"];?></p>
																<span class="checkmark"></span>
															</label>
														</div>
													</div>

													<div class="row">
														<div class="col-12 col-md-6 col-lg-6 col-xl-6 mb-1">
															<button class="btn" style="width: 100%; margin-left: 0;" name="oficinas"  type="submit" id="submitOficinas">
																<span><?php echo $lang["boton_oficinas"];?></span>
															</button>
															<input id="oficinas-button" type="hidden" value="0">
														</div>

														<div class="col-12 col-md-6 col-lg-6 col-xl-6 mb-1">
															<button class="btn" style="width: 100%; margin-left: 0;" name="tarjeta" type="submit" id="submitTarjeta">
																<span><?php echo $lang["boton_tarjetas"];?></span>
															</button>
															<input id="tarjeta-button" type="hidden" value="0">
														</div>
													</div>
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

			<?php require ('includes/footer.php'); ?>
			<?php require ('includes/cookies.php'); ?>

		</div>

		<!-- Load Scripts Start -->
		<script src="js/libs.js"></script>
		<script src="js/common.js"></script>
		<script src="js/jquery.validate.min.js"></script> 

		<script type="text/javascript">
			$('#fecha').on('focus', function() {
			  $("#fecha").prop("type", "date");
			}).on('blur', function() {
			  $("#fecha").prop("type", "text");
			});

			$("#submitOficinas").on('click',function(){
				$("#oficinas-button").attr('name','oficinas');
				$("#tarjeta-button").attr('name','');
			});

			$("#submitTarjeta").on('click',function(){
				$("#tarjeta-button").attr('name','tarjeta');
				$("#oficinas-button").attr('name','');
			});

			$('#patronatoForm').validate(
			{
				submitHandler: function()
				{

					$.ajax({
						type: "POST",
						url: "?r=index/PatronatoForm",
						data: $('#patronatoForm').serialize(),
						dataType: "json",
						success: function(data){

							// Nombre Duplicado
							if(data["response"] === "repeat"){
								$("input[name='nombre']").attr('style','border: 3px solid red !important');
								$("input[name='apellidos']").attr('style','border: 3px solid red !important');
								if($("#nombreapellidos-error").length === 0){
									$('#apellidos').after('<p id="nombreapellidos-error" style="color:red;margin-left:10px;font-weight:bold;">* Ya Existe un Usuario Registrado con esos Datos.</p>');
								}
								document.getElementById("apellidos").focus();
							}
							// Dni Error
							if(data["response"] === "DNI_ERROR_"){
								$("input[name='nombre']").attr('style','border: 0px;');
								$("input[name='apellidos']").attr('style','border: 0px;');
								$('#nombreapellidos-error').attr('style','display:none');

								$("input[name='dnititular']").attr('style','border: 3px solid red !important');
								if($("#dni-error").length === 0){
									$('#dnititular').after('<p id="dni-error" style="color:red;margin-left:10px;font-weight:bold;">* El DNI NO es Válido.</p>');
								}
								document.getElementById("dnititular").focus();
							}
							// Error Cuenta Bancaria
							if(data["response"] === "CUENTA_ERROR_"){
								//$("input[name='dnititular']").attr('style','border: 0px;');
								//$('#dni-error').attr('style','display:none');

								//$("input[name='nombre']").attr('style','border: 0px;');
								//$("input[name='apellidos']").attr('style','border: 0px;');
								//$('#nombreapellidos-error').attr('style','display:none');

								$("input[name='iban']").attr('style','border: 3px solid red !important');
								$("input[name='entidad']").attr('style','border: 3px solid red !important');
								$("input[name='oficina']").attr('style','border: 3px solid red !important');
								$("input[name='dc']").attr('style','border: 3px solid red !important');
								$("input[name='cuenta']").attr('style','border: 3px solid red !important');
								if($("#cuenta-error").length === 0){
									$('#cuenta').after('<p id="cuenta-error" style="color:red;margin-left:10px;font-weight:bold;">* La Cuenta Bancaria NO es válida.</p>');
								}
								document.getElementById("cuenta").focus();
							}

							// Tarjeta Ok 
							if(data["response"] === "tarjeta_ok"){
								window.location.href = data["url_redireccion"];
							}
							// Error Tarjeta 
							if(data["response"] === "ERROR_TARJETA"){
								alert('Parece que hubo algún error, por favor, inténtelo de nuevo más tarde');
								window.location.replace('?r=index/principal');
							}
							// Oficinas Ok
							if(data["response"] === "oficina_ok"){
								alert('SU RESERVA SE REALIZÓ CORRECTAMENTE, UNA VEZ COMPROBADOS LOS DATOS, SE RECIBIRÁ UN EMAIL CONFIRMANDO LA INSCRIPCIÓN');
								window.location.replace('?r=index/principal');
							}
							// Error Oficinas
							if(data["response"] === "ERROR_OFICINAS"){
								alert('Parece que hubo algún error, por favor, inténtelo de nuevo más tarde');
								window.location.replace('?r=index/principal');
							}
						}
						,
						error: function() {
							alert("Ha sucedido un error, inténtelo de nuevo más tarde.");
						},
					});
				}
			});

			/* $('#patronatoForm').validate(
			{
				submitHandler: function()
				{
				   //Validar repetidos
					$.ajax({
						type: "POST",
						url: "?r=index/RepetidoPatronato",
						data: $('#patronatoForm').serialize(),
						dataType: "json",
						success: function(data){
							console.log(data.response);

							if( data.response ){
								alert( "Ya hay un registro con ese nombre y ese apellido y no se admiten registros repetidos. Por favor compruebe que ha introducido los datos correctamente." );
							}else{
								console.log("No coincidencia");
							}
							/*$.ajax({
								type: "POST",
								url: "?r=index/patronatoform",
								data: $('#contactform').serialize(),
								dataType: "json",
								success: function(data){

									 Nombre Duplicado 
									if(data["response"] === "repeat"){
										$("input[name='nombre']").attr('style','border: 3px solid red !important');
										$("input[name='apellidos']").attr('style','border: 3px solid red !important');
										if($("#nombreapellidos-error").length === 0){
											$('#apellidos').after('<p id="nombreapellidos-error" style="color:red;margin-left:10px;font-weight:bold;">* Ya Existe un Usuario Registrado con esos Datos.</p>');
										}
										document.getElementById("apellidos").focus();
									}
									Dni Error 
									if(data["response"] === "DNI_ERROR_"){
										$("input[name='nombre']").attr('style','border: 0px;');
										$("input[name='apellidos']").attr('style','border: 0px;');
										$('#nombreapellidos-error').attr('style','display:none');

										$("input[name='dnititular']").attr('style','border: 3px solid red !important');
										if($("#dni-error").length === 0){
											$('#dnititular').after('<p id="dni-error" style="color:red;margin-left:10px;font-weight:bold;">* El DNI NO es Válido.</p>');
										}
										document.getElementById("dnititular").focus();
									}

									if(data["response"] === "CUENTA_ERROR_"){
										//$("input[name='dnititular']").attr('style','border: 0px;');
										//$('#dni-error').attr('style','display:none');

										//$("input[name='nombre']").attr('style','border: 0px;');
										//$("input[name='apellidos']").attr('style','border: 0px;');
										//$('#nombreapellidos-error').attr('style','display:none');

										$("input[name='iban']").attr('style','border: 3px solid red !important');
										$("input[name='entidad']").attr('style','border: 3px solid red !important');
										$("input[name='oficina']").attr('style','border: 3px solid red !important');
										$("input[name='dc']").attr('style','border: 3px solid red !important');
										$("input[name='cuenta']").attr('style','border: 3px solid red !important');
										if($("#cuenta-error").length === 0){
											$('#cuenta').after('<p id="cuenta-error" style="color:red;margin-left:10px;font-weight:bold;">* La Cuenta Bancaria NO es Válida.</p>');
										}
										document.getElementById("cuenta").focus();
									}
									if(data["response"] === "tarjeta_ok"){
										window.location.href = data["header"] + data["numeropedido"] + '&titular=' + data["titular"];
									}
									if(data["response"] === "ERROR_TARJETA"){
										alert('Parece que hubo algún error, por favor, inténtelo de nuevo más tarde');
										window.location.replace('?r=index/principal');
									}
									if(data["response"] === "oficina_ok"){
										alert('SU RESERVA SE REALIZÓ CORRECTAMENTE, UNA VEZ COMPROBADOS LOS DATOS, SE RECIBIRÁ UN EMAIL CONFIRMANDO LA INSCRIPCIÓN');
										window.location.replace('?r=index/principal');
									}
									if(data["response"] === "ERROR_OFICINAS"){
										alert('Parece que hubo algún error, por favor, inténtelo de nuevo más tarde');
										window.location.replace('?r=index/principal');
									}
								}
							});
						}, error: function (err){
							console.log(err);
						}
					}); 

				}
			}); */

		</script>
		<!-- Load Scripts End -->

	</body>
</html>