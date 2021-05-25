<!DOCTYPE html>
<html lang="es"> 
	<?php require('includes/head.php'); ?>
	<link rel="stylesheet" href="css/forms.css">
	<link rel="stylesheet" href="css/parallax.css">
	<link rel="stylesheet" href="css/formus.css">

	<body class="Pages" id="formus">
		
		<div class="wrapper overflow-x-hidden">	

			<?php require('includes/header.php'); ?>

			<!-- Start Page-Content -->
			<section id="page-content" class="overflow-x-hidden margin-top-header">

				<div class="block">
					<div class="container-fluid pl-0 pr-0">
						<div class="row pl-0 pr-0">
							<div class="parallax col-12 mt-0" 
								 style="background-image: url('img/cabecera-cultura-esfuerzo.jpg');">
							</div>
						</div>
					</div>
				</div>

				<div class="block background-f6">
					<div class="container">
						<div class="row">
							<div class="col-12">
								<div class="row">
									<div class="col-12 col-md-3 col-lg-3 col-xl-3" id="escudo">
										<img class="img-responsive" src="img/escudo-campus-navidad.png" style="margin: 0 auto;" alt="Escudo Campus de Navidad">
									</div>

									<div class="col-12 col-md-9 col-lg-9 col-xl-9" id="titulo">
										<h2 class="section-title">
											<span class="orange-text">XI Campus de Navidad</span>
										</h2>
										<h3 class="section-title mb-2">26 al 30 de diciembre</h3>
									</div>

									<div class="col-12 t-left mb-1">
										<p>
											En estas Vacaciones de Navidad no te quedes en casa. Participa en el XI Campus del Valencia Basket. Mejora tu baloncesto con entrenamientos específicos, concursos de tiro, liga nocturna y 3x3. También visitarás L´Alqueria del Basket, donde entrenarás y trabajarás con una máquina profesional de tiro.
										</p>
										<p>
											¡Recibirás la visita de jugadores y jugadoras del primer equipo y la camiseta oficial del Valencia Basket!
										</p>
									</div>
								</div>

								<form enctype="multipart/form-data" action="?r=index/campusnavidadform" class="boxed-form" name="contactform" method="post">
									<input type="hidden" name="categoria" value="campusnavidad">

									<!-- PARTE 1 -->
									<div class="form-group">
										<div class="row"> 
											<div class="col-12 col-md-6 col-lg-6 col-xl-6">
												<div class="row">
													<div class="col-12 mt-1 mb-1 t-left" style="font-size: 1.2em;">
														<label class="control control--radio mb-1">
															Pensión Completa (<strong>195€</strong>)
															<input type="radio" name="pension" value="completa" checked required>
															<div class="control__indicator"></div>
														</label>

														 <label class="control control--radio mb-1">
															Media Pensión (de 9:00 a 20:00h) (<strong>140€</strong>)
															<input type="radio" name="pension" value="media">
															<div class="control__indicator"></div>
														</label>
													</div>

													<div class="col-12 mb-2 redimension">
														<input type="text" class="form-control" value="" name="transporte" placeholder="¿Va a necesitar transporte?" maxlength="45" required>
													</div>
												</div>
											</div>

											<div class="col-12 col-md-6 col-lg-6 col-xl-6">
												<div class="contact-info-wrap t-center"> 
													<div class="row">
														<div class="col-12">
															<p class="t-left mt-0 mb-1" style="font-size: 14px; font-weight: bold;">
																CHICOS Y CHICAS DE 6 A 17 AÑOS
															</p>
															<p class="t-left mt-0 mb-1" style="font-size: 14px;">
																Desde el 26 al 30 de diciembre en Iale Sport Center (L´Eliana).
															</p>
															<p class="t-left mt-0 mb-1" style="font-size: 14px;">
																Salimos el jueves 26 de diciembre a las 9 horas desde L’Alqueria del Basket. (C/ Bombero Ramón Duart s/n 46013 Valencia).
															</p>
															<p class="t-left mt-0 mb-1" style="font-size: 14px;">
																Volvemos el lunes 30 de diciembre. Fin del campus a las 19 horas en L´Eliana, llegada a L´Alqueria del Basket a las 19:30 horas.
															</p>
															<p class="t-left mt-0 mb-1" style="font-size: 14px;">
																Llevar ropa, calzado deportivo, toalla y almuerzo.
															</p>
														   
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-12">
												<h4 class="section-title">Datos del niño/a:</h4>
											</div>

											<div class="col-12 col-md-3 col-lg-3 col-xl-3 redimension">
												<label>Nombre:
													<input type="text" class="form-control" name="nombre" maxlength="45" required>
												</label>
											</div>

											<div class="col-12 col-md-5 col-lg-5 col-xl-5 redimension">
												<label>Apellidos:
													<input type="text" class="form-control" name="apellidos" maxlength="45" required>
												</label>
											</div>

											<div class="col-12 col-md-4 col-lg-4 col-xl-4">
												<label>Fecha de nacimiento:
													<input type="date" class="form-control" style="color: #5c5c5c !important;" id="fecha" name="fechanacimiento" required>
												</label>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-12 col-md-3 col-lg-3 col-xl-3 redimension">
												<label>DNI:
													<input type="text" class="form-control" name="dni" maxlength="10" required>
												</label>
											</div>

											<div class="col-12 col-md-6 col-lg-6 col-xl-6 redimension">
												<label>¿A qué club pertenece?
													<input type="text" class="form-control" name="club" maxlength="45" required>
												</label>
											</div>

											<div class="col-12 col-md-3 col-lg-3 col-xl-3">
												<label>Talla de camiseta
													<input type="text" class="form-control" name="tallacamiseta" maxlength="15" required>
												</label>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-12 col-md-6 col-lg-6 col-xl-6 redimension">
												<label>¿Sufres alguna enfermedad?
													<input type="text" class="form-control" name="enfermedad" required>
												</label>
											</div>

											<div class="col-12 col-md-6 col-lg-6 col-xl-6">
												<label>¿Padeces alguna alergia?
													<input type="text" class="form-control" name="alergias" required>
												</label>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-12 col-md-6 col-lg-6 col-xl-6 redimension">
												<label>¿Está bajo algún tratamiento médico?
													<input type="text" class="form-control" name="tratamientosmedicos" required>
												</label>
											</div>

											<div class="col-12 col-md-6 col-lg-6 col-xl-6">
												<label>¿Alguna operación reciente?
													<input type="text" class="form-control" name="operacionreciente" required>
												</label>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-12 redimension">
												<label>Observaciones (dormir con)
													<textarea class="form-control" style="height: 85px; resize: none;" name="observaciones" required></textarea>
												</label>
											</div>

											<div class="col-12">
												<p class="t-left"><strong>Autorizo a la Dirección del XI Campus de Navidad del Valencia Basket 2019, en caso de máxima urgencia con el consentimiento y prescripción médica a tomar las decisiones médico-quirúrgicas necesarias, si ha sido imposible mi localización.</strong></p>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-12 redimension">
												<input type="file" class="form-control" style="border: none !important; padding: 0 !important;" name="fotocopiasip" aria-describedby="fileHelp">
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-12 redimension">
												<input type="file" class="form-control" style="border: none !important; padding: 0 !important;" name="resguardoingreso" aria-describedby="fileHelp">
											</div>

											<div class="col-12">
												<p class="t-left" style="color: red;">
													<strong>* Recuerde adjuntar los 2 archivos: fotocopia del SIP y resguardo del ingreso bancario</strong>
												</p>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row mt-2">
											<div class="col-12">
												<h4 class="section-title">Datos del padre / madre / tutor:</h4>
											</div>

											<div class="col-12 col-md-3 col-lg-3 col-xl-3 redimension">
												<label>Nombre:
													<input type="text" class="form-control" name="nombretutor" maxlength="45" required>
												</label>
											</div>

											<div class="col-12 col-md-5 col-lg-5 col-xl-5 redimension">
												<label>Apellidos:
													<input type="text" class="form-control" name="apellidostutor" maxlength="45" required>
												</label>
											</div>

											<div class="col-12 col-md-4 col-lg-4 col-xl-4">
												<label>DNI:
													<input type="text" class="form-control" name="dnitutor" maxlength="10" required>
												</label>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-12 col-md-6 col-lg-6 col-xl-6 redimension">
												<label>Dirección:
													<input type="text" class="form-control" name="direccion" maxlength="45" required>
												</label>
											</div>

											<div class="col-12 col-md-2 col-lg-2 col-xl-2 redimension">
												<label>Número:
													<input type="text" class="form-control" name="numero" maxlength="10">
												</label>
											</div>

											<div class="col-12 col-md-2 col-lg-2 col-xl-2 redimension">
												<label>Piso / Esc:
													<input type="text" class="form-control" name="piso" maxlength="10">
												</label>
											</div>

											<div class="col-12 col-md-2 col-lg-2 col-xl-2">
												<label>Puerta:
													<input type="text" class="form-control" name="puerta" maxlength="10">
												</label>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
												<label>Código Postal:
													<input type="text" class="form-control" name="cp" maxlength="10" required>
												</label>
											</div>

											<div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
												<label>Provincia:
													<input type="text" class="form-control" name="provincia" maxlength="25" required>
												</label>
											</div>

											<div class="col-12 col-md-4 col-lg-4 col-xl-4">
												<label>Población:
													<input type="text" class="form-control" name="poblacion" maxlength="45" required>
												</label>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-12 col-md-5 col-lg-5 col-xl-5 redimension">
												<label>Teléfono:
													<input type="text" class="form-control" name="telefonotutor" maxlength="15" required>
												</label>
											</div>

											<div class="col-12 col-md-7 col-lg-7 col-xl-7">
												<label>Correo Electrónico:
													<input type="email" class="form-control" name="emailtutor" maxlength="45" required>
												</label>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-12">
												<p class="t-left" style="color: red;">
													<strong>Al terminar la inscripción, recibirá un correo electrónico de confirmación con la información recibida</strong>
												</p>
											</div>
										</div>
									</div>


									<!-- PARTE 2 -->

									<div class="row">
										<div class="col-12">
											<h3 class="section-title mb-0">
												<span class="orange-text">Plazos y otros métodos de pago</span>
											</h3>
										</div>

										<div class="col-12">
											<h4 class="section-title mb-0">Ingreso bancario:</h4>
											<p>
												En la cuenta de Caixa Popular:
												<br>
												Cuenta: ES08-3159-0009-99-2342768922
												<br><br>
												<span style="color: red;">*</span> Al hacer el ingreso se indicará el nombre del niño/a y deberá enviarse el resguardo junto al resto de documentación (fotocopia tarjeta sanitaria/SIP) por fax al número: 96 395 68 01 o al siguiente e-mail: <a href="mailto:campus@valenciabasket.com" style="color: #eb7c00; font-weight: 600;">campus@valenciabasket.com</a>
											</p>
											<h4 class="section-title mb-0">Efectivo y entrega de documentación en mano:</h4>
											<p>Oficinas de L´Alqueria
												<br>
												Lunes a viernes de 9:30 a 14:00 y de 16:00 a 20:00.
											</p>
										</div>
									</div>

									<!-- PARTE 3 -->
									<div class="row">
										<div class="col-12">
											<h3 class="section-title mb-0">
												<span class="orange-text">Política de privacidad</span>
											</h3>
											<h4 class="section-title mb-0">Consentimiento expreso e inequívoco:</h4>
										</div>
										
										<div class="col-12">
											<p>
												En cumplimiento de la Ley Orgánica de Protección de Datos de carácter personal 15/1999 de 13 de Diciembre, el Real Decreto 1720/2007 por el que se regula su reglamento de desarrollo y Reglamento Europeo 2016/679 del parlamento europeo y del consejo de 27 de Abril de 2016, se le comunica que sus datos serán incorporados a una base de datos titularidad de FUNDACIÓ VALENCIA BASKET 2000 con CIF G96614474 y cuyas finalidades son: la gestión integral del CAMPUS DE NADAL 2019 y el mantenerle informado de las proximas novedades y actividades del club. Por lo tanto, Vd. podrá recibir puntual información al respecto de este evento y de los que en un futuro pudiéramos realizar, así como de otras actividades de FUNDACIÓN VALENCIA BASKET 2000.
											</p>
											<label class="containerchekbox">
												<p>
													<input type="checkbox" name="autorizodatos" value="si">
													<span class="checkmark"></span> 
													Acepto que FUNDACIÓN VALENCIA BASKET 2000 comunique mis datos a VALENCIA BASKET CLUB SAD para que me mantenga informado sobre productos o servicios relacionados con el sector del baloncesto que pudieran ser de mi interés por cualquier medio, incluido el electrónico.
												</p>
											</label>
											<label class="containerchekbox">
												<p>
													<input type="checkbox" name="autorizoimagen" value="si">
													<span class="checkmark"></span> 
													Acepto que FUNDACIÓN VALENCIA BASKET 2000 trate mi imagen, parcial o total, en cualquier soporte gráfico o visual (fotografía, video o similar) para su uso en los medios de difusión presentes y futuros del VALENCIA BASKET CLUB SAD (web, folletos, revistas del club, campeonatos, redes sociales, etc.)
												</p>
											</label>
											<p>
												Se le informa también que puede ejercer los derechos de acceso, rectificación, supresión, portabilidad, limitación de tratamiento, cancelación y, en su caso, oposición, enviando una solicitud por escrito acompañada de la fotocopia de su DNI a la siguiente dirección: C/ BOMBERO RAMÓN DUART S/N, 46013, VALENCIA o a través de valencia.basket@valenciabasket.com así como reclamar ante la Agencia Española de Protección de Datos (www.agpd.es) cuando el interesado considere que VALENCIA BASKET CLUB SAD ha vulnerado los derechos que le son reconocidos por la normativa aplicable en protección de datos.
											</p>
											<p>
												Si desea ampliar más información sobre nuestra política de privacidad entre en nuestra web <a href="https://www.valenciabasket.com/" target="_blank" style="color: #eb7c00; font-weight: 600;">www.valenciabasket.com</a>
											</p>
										</div>

										<div class="col-12">
											<label class="containerchekbox">
												<input type="checkbox" name="autorizo" value="si" required>
												<p>Como padre / madre / tutor, inscribo a mi hij@ en el Campus de Navidad 2019 de L´Alqueria del Basket y acepto las condiciones anteriormente expuestas.</p>
												<span class="checkmark"></span>
											</label>
										</div>

										<div class="col-12 col-md-6 col-lg-6 col-xl-6 mb-2">
											<button type="submit" class="btn btn-link-w w-100" style="width: 100%; margin-left: 0;" id="oficina" name="enviar" value="oficina">
												<span>Pago en oficinas</span>
											</button>
										</div>

										<div class="col-12 col-12 col-md-6 col-lg-6 col-xl-6 mb-2">
											<button type="submit" class="btn btn-link-w w-100" style="width: 100%; margin-left: 0;" id="tarjeta" name="enviar" value="tarjeta">
												<span>Realizar Pago con tarjeta</span>
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
		<!-- Load Scripts End -->

	</body>
</html>                  