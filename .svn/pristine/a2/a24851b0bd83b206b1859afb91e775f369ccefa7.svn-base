<!DOCTYPE html>
<html lang="es">
	<?php require('includes/head_back.php'); ?>
	<link rel="stylesheet" href="css/calendarioalquiler.css">
	<link rel="stylesheet" href="css/calendario.css">
	<link rel="stylesheet" href="css/forms.css">

	<style>
		.containerchekbox {
			font-weight: 400;
			font-size: 16px;
		}
	</style>

	<body class="Pages" id="alquiler">
		<?php require "includes/topbar_back.php"; ?>

		<div class="canvas">
			<div id="content">
				<div id="page-content">
					<div class="page-contacts-block schedule-block mb-3">
						<div class="container">
							<div class="row">
								<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
									<div class="formulario" id="formulario" >
										<!-- form-block -->
										<form id="contactform" enctype="multipart/form-data" action="?r=incidencias/IncidenciasForm" class="boxed-form" name="contactform" method="post">
											<div class="row">
												<div class="col-12">
													<h2 class="section-title t-left">
														<span style="color: #eb7c00;">REGISTRO DE INCIDENCIA:</span>
													</h2>
												</div>

												<div class="form-group col-12 col-md-6 col-lg-6 col-xl-6 redimension">
													<input type="text" class="form-control" style="height: auto;" value="<?php if(isset($_SESSION['nombreusuario'])){echo utf8_encode($_SESSION['nombreusuario']);}?>" name="nombre" placeholder="Nombre del solicitante" required>
												</div>

												<div class="form-group col-12 col-md-6 col-lg-6 col-xl-6 redimension">
													<input type="email" class="form-control" style="height: auto;" value="<?php if(isset($_SESSION['emailusuario'])){echo utf8_encode($_SESSION['emailusuario']);}?>" name="email" placeholder="Email del solicitante" required>
												</div>
											</div>

											<div class="row">
												<div class="form-group col-12 col-md-4 col-lg-4 col-xl-4 redimension">
													<textarea class="form-control" style="height: 100px;" name="tipo_incidencia" placeholder="Tipo incidencia" required></textarea>
												</div>

												<div class="form-group col-12 col-md-8 col-lg-8 col-xl-8 redimension">
													<textarea class="form-control" style="height: 100px;" name="observaciones" placeholder="Observaciones"></textarea>
												</div>
											</div>

											<!-- <div class="row">
												<div class="form-group col-12 mt-1 mb-1" style="font-size: 17px;">
													<p>
														<span style="font-size: 17px; color: red;">
															<strong>IMPORTANTE:</strong>
														</span>
														<br>
														Cualquier incidencia se debe comunicar lo más pronto posible por el buen funcionamiento y convivencia de todos/as. ¡Muchas gracias!
													</p>
												</div>
											</div> -->

											<div class="form-group">
												<div class="row">
													<div class="form-group col-12 redimension">
														<h4 class="section-title">Añadir imagen de la incidencia</h4>
													</div>

													<div class=" form-group col-12 redimension">
														<input type="file" class="form-control" style="border: none !important; padding: 0 !important;" id="imagen" name="imagen" aria-describedby="fileHelp">
													</div>
												</div>
											</div>

											<div class="row">
												<div class="form-group col-12 col-md-12 col-lg-12 col-xl-12 mb-2">
													<!-- <input type="hidden" name="usuario_identificado" value="<?php //if(isset($_SESSION['usuario'])){echo $_SESSION['usuario'];}?>"> -->
													<button class="btn btn-link-w w-100" type="submit" id="submit">
														<span>REGISTRAR INCIDENCIA</span>
													</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php include 'includes/footer_back.php';?>

		<!-- Load Scripts Start -->
		<script src="js/libs.js"></script>
		<script src="js/common.js"></script>
		
		<script src="js/CAL_JS_comportamiento_consultasalas.js"></script>

		<!-- PAGINADOR -->
		<script src="js/fancyTable.js"></script>

		<script type="text/javascript">
			$(document).ready(function(){
				$("#muestraformulario").click(function(){
					$("#formulario").slideToggle("slow");
				});

		</script>
	</body>
</html>