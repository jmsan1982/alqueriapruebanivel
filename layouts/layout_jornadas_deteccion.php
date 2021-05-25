<!DOCTYPE html>
<html lang="es">
	<?php require('includes/head.php'); ?>
	<link rel="stylesheet" href="css/forms.css">
	<link rel="stylesheet" href="css/parallax.css">
	<link rel="stylesheet" href="css/formus.css">

	<body class="Pages" id="formus">

		<?php require ("includes/header.php"); ?>

		<section id="page-content" class="overflow-x-hidden margin-top-header">
			<div class="block">
				<div class="container-fluid">
					<div class="row">
						<div class="parallax col-12 mt-0" style="background-image: url('img/cabecera-jornadas-deteccion.jpg');">
						</div>
					</div>
				</div>
			</div>

			<div class="block background-f6">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<form id="contactform" action="?r=formularios/JornadasDeteccionForm" class="boxed-form" name="contactform" method="post">
								<!-- DATOS PARTICIPANTE -->
								<div class="form-group">
									<div class="row">
										<div class="col-12">
											<h3 class="section-title mb-0">
												<span class="orange-text">
													<?php echo $lang["jornadas_deteccion_titulo"];?>
												</span>
											</h3>
											<h3 class="section-title mt-0 mb-1" style="font-size: 1.7em;">
												<?php echo $lang["jornadas_deteccion_subtitulo"];?>
											</h3>
										</div>

										<div class="form-group col-12 mb-1">
											<div class="alert alert-danger redimension" role="alert">
												<h4><i class="fa fa-info-circle" aria-hidden="true"></i> <?php echo $lang["jornadas_deteccion_bloqueo"];?></h4>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-12">
											<p><?php echo $lang["jornadas_deteccion_texto"];?></p>
										</div>
									</div>

									<div class="row">
										<div class="col-12 col-md-4 col-lg-4 col-xl-4">
											<div class="row">
												<div class="col-12 mt-0">
													<h4 class="section-title" style="text-align: left; font-size: 17px; font-style: normal;">
														<span class="orange-text">I <?php echo $lang["jornadas_deteccion_jornada_deteccion"];?> (3 <?php echo $lang["jornadas_deteccion_julio"];?> 2020)</span>
													</h4>
												</div>

												<div class="col-12 mb-1 t-left" style="font-size: 15px;">
													<label class="control control--radio">
														<?php echo $lang["jornadas_deteccion_generacion"];?> 2011 - 2012 (17:00h)
														<input type="radio" name="opcion" value="jornada_1_2011_2012" required>
														<div class="control__indicator"></div>
													</label>
												</div>

												<div class="col-12 mb-1 t-left" style="font-size: 15px;">
													<label class="control control--radio">
														<?php echo $lang["jornadas_deteccion_generacion"];?> 2009 - 2010 (18:15h)
														<input type="radio" name="opcion" value="jornada_1_2009_2010">
														<div class="control__indicator"></div>
													</label>
												</div>

												<div class="col-12 mb-1 t-left" style="font-size: 15px;">
													<label class="control control--radio">
														<?php echo $lang["jornadas_deteccion_generacion"];?> 2007 - 2008 (19:30h)
														<input type="radio" name="opcion" value="jornada_1_2007_2008">
														<div class="control__indicator"></div>
													</label>
												</div>
											</div>
										</div>

										<div class="col-12 col-md-4 col-lg-4 col-xl-4">
											<div class="row">
												<div class="col-12 mt-0">
													<h4 class="section-title" style="text-align: left; font-size: 17px; font-style: normal;">
														<span class="orange-text">II <?php echo $lang["jornadas_deteccion_jornada_deteccion"];?> (4 <?php echo $lang["jornadas_deteccion_julio"];?> 2020)</span>
													</h4>
												</div>

												<div class="col-12 mb-1 t-left" style="font-size: 15px;">
													<label class="control control--radio">
														<?php echo $lang["jornadas_deteccion_generacion"];?> 2009 - 2010 (10:00h)
														<input type="radio" name="opcion" value="jornada_2_2009_2010">
														<div class="control__indicator"></div>
													</label>
												</div>

												<div class="col-12 mb-1 t-left" style="font-size: 15px;">
													<label class="control control--radio">
														<?php echo $lang["jornadas_deteccion_generacion"];?> 2007 - 2008 (11:15h)
														<input type="radio" name="opcion" value="jornada_2_2007_2008">
														<div class="control__indicator"></div>
													</label>
												</div>

												<div class="col-12 mb-1 t-left" style="font-size: 15px;">
													<label class="control control--radio">
														<?php echo $lang["jornadas_deteccion_generacion"];?> 2005 - 2006 (12:30h)
														<input type="radio" name="opcion" value="jornada_2_2005_2006">
														<div class="control__indicator"></div>
													</label>
												</div>
											</div>
										</div>

										<div class="col-12 col-md-4 col-lg-4 col-xl-4">
											<div class="row">
												<div class="col-12 mt-0">
													<h4 class="section-title" style="text-align: left; font-size: 17px; font-style: normal;">
														<span class="orange-text">III <?php echo $lang["jornadas_deteccion_jornada_deteccion"];?> (5 <?php echo $lang["jornadas_deteccion_julio"];?> 2020)</span>
													</h4>
												</div>

												<div class="col-12 mb-1 t-left" style="font-size: 15px;">
													<label class="control control--radio">
														<?php echo $lang["jornadas_deteccion_generacion"];?> 2011 - 2012 (10:00h)
														<input type="radio" name="opcion" value="jornada_3_2011_2012">
														<div class="control__indicator"></div>
													</label>
												</div>

												<div class="col-12 mb-1 t-left" style="font-size: 15px;">
													<label class="control control--radio">
														<?php echo $lang["jornadas_deteccion_generacion"];?> 2009 - 2010 (11:15h)
														<input type="radio" name="opcion" value="jornada_3_2009_2010">
														<div class="control__indicator"></div>
													</label>
												</div>

												<div class="col-12 mb-1 t-left" style="font-size: 15px;">
													<label class="control control--radio">
														<?php echo $lang["jornadas_deteccion_generacion"];?> 2007 - 2008 (12:30h)
														<input type="radio" name="opcion" value="jornada_3_2007_2008">
														<div class="control__indicator"></div>
													</label>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="form-group">
									<div class="row">
										<div class="col-12">
											<h4 class="section-title"><?php echo $lang["formulario_datos_niño"];?>:</h4>
										</div>

										<div class="col-12 col-md-3 col-lg-3 col-xl-3 redimension">
											<label><?php echo $lang["formulario_genero"];?>:
												<select class="form-control" style="color: #5c5c5c !important;" name="genero" required>
													<option value=""></option>
													<option value="Masculino"><?php echo $lang["formulario_genero_masculino"];?></option>
													<option value="Femenino"><?php echo $lang["formulario_genero_femenino"];?></option>
												</select>
											</label>
										</div>

										<div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
											<label><?php echo $lang["formulario_nombre"];?>:
												<input type="text" class="form-control" name="nombre" maxlength="45" required>
											</label>
										</div>

										<div class="col-12 col-md-5 col-lg-5 col-xl-5 redimension">
											<label><?php echo $lang["formulario_apellidos"];?>:
												<input type="text" class="form-control" name="apellidos" maxlength="45" required>
											</label>
										</div>
									</div>
								</div>

								<div class="form-group">
									<div class="row">
										<div class="col-12 col-md-4 col-lg-3 col-xl-3 redimension">
											<label><?php echo $lang["formulario_cumpleaños"];?>:
												<input type="date" class="form-control" style="color: #5c5c5c !important;" id="fecha" name="fechanacimiento" required>
											</label>
										</div>

										<div class="col-12 col-md-3 col-lg-4 col-xl-4 redimension">
											<label><?php echo $lang["formulario_baloncesto"];?>
												<input type="text" class="form-control" name="practicabaloncesto" maxlength="100" required>
											</label>
										</div>

										<div class="col-12 col-md-5 col-lg-5 col-xl-5 redimension">
											<label><?php echo $lang["formulario_club"];?>
												<input type="text" class="form-control" name="club" maxlength="45" required>
											</label>
										</div>
									</div>
								</div>

								<!-- DATOS TUTOR -->
								<div class="form-group">
									<div class="row">
										<div class="col-12">
											<h4 class="section-title"><?php echo $lang["formulario_datos_tutor"];?>:</h4>
										</div>

										<div class="col-12 col-md-5 col-lg-5 col-xl-5 redimension">
											<label><?php echo $lang["formulario_telefono"];?>:
												<input type="tel" class="form-control" name="telefonotutor" maxlength="15" required>
											</label>
										</div>

										<div class="col-12 col-md-7 col-lg-7 col-xl-7 redimension">
											<label><?php echo $lang["formulario_correo"];?>:
												<input type="email" class="form-control" name="emailtutor" maxlength="45" required>
											</label>
										</div>

										<div class="col-12">
											<p class="t-left" style="color: red;">
												<strong><?php echo $lang["formulario_aviso_email"];?></strong>
											</p>
										</div>
									</div>
								</div>

								<!-- POLÍTICAS Y TÉRMINOS -->
								<div class="row">
									<div class="col-12">
										<h3 class="section-title mt-1 mb-0">
											<span class="orange-text"><?php echo $lang["politicas_titulo_privacidad"];?></span>
										</h3>
										<h4 class="section-title mb-0"><?php echo $lang["politicas_subtitulo_privacidad"];?></h4>
									</div>

									<div class="col-12">
										<p>
											<?php echo $lang["politicas_texto_ley_organica"];?>
										</p>
										<label class="containerchekbox">
											<p>
												<input type="checkbox" name="autorizodatos" value="si" required>
												<span class="checkmark"></span>
												<?php echo $lang["politicas_check_productos"];?>
											</p>
										</label>
										<label class="containerchekbox">
											<p>
												<input type="checkbox" name="autorizoimagen" value="si" required>
												<span class="checkmark"></span>	
												<?php echo $lang["politicas_check_imagenes"];?>
											</p>
										</label>
										<p>
											<?php echo $lang["politicas_texto_cancelacion1"];?> <a href="https://www.alqueriadelbasket.com/?r=index/politicacancelacion&idioma=<?php echo $_SESSION['idioma'];?>" target="_blank" style="font-weight: bold; color: #eb7c00;"><?php echo $lang["enlace_cancelacion"];?></a> <?php echo $lang["politicas_texto_cancelacion2"];?>
										</p>
										<p>
											<?php echo $lang["politicas_ampliacion_info"];?> <a href="https://www.alqueriadelbasket.com/" target="_blank" style="color: #eb7c00; font-weight: 600;">www.alqueriadelbasket.com</a>
										</p>
									</div>

									<div class="col-12 mt-1 mb-1">
										<label class="containerchekbox">
											<input type="checkbox" name="autorizo" value="si" required>
											<p><?php echo $lang["jornadas_deteccion_politicas_check_condiciones"];?></p>
											<span class="checkmark"></span>
										</label>
									</div>

									<div class="col-12 mb-2">
										<button class="btn btn-link-w w-100" style="width: 100%; margin-left: 0;" type="submit" id="submit" disabled>
											<span><?php echo $lang["boton_enviar_solicitud"];?></span>
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
		<?php require('includes/cookies.php'); ?>

		<!-- Load Scripts Start -->
		<script src="js/libs.js"></script>
		<script src="js/common.js"></script>
		<!-- Load Scripts End -->
	</body>
</html>