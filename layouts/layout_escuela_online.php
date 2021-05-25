<!DOCTYPE html>
<html lang="es"> 
	<?php require('includes/head.php'); ?>
	<link rel="stylesheet" href="css/forms.css">
	<link rel="stylesheet" href="css/parallax.css">
	<link rel="stylesheet" href="css/formus.css">


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
								<img class="img-responsive" src="img/escudo-escuela.png" style="margin: 0 auto;" alt="Escudo Escuela Online L'Alqueria del Basket">
							</div>

							<div class="col-12 col-md-9 col-lg-9 col-xl-9" id="titulo">
								<h2 class="section-title">
									<?php echo $lang["plataforma_formacion_titulo"];?> <span class="orange-text"><?php echo $lang["plataforma_formacion"];?></span>
								</h2>
								<h3 class="section-title mb-2"><?php echo $lang["patronato_subtitulo"];?></h3>
							</div>
						</div>

						<div class="row mt-1">
							<div class="form-group col-12 mb-1">
								<div class="alert alert-danger redimension" role="alert">
									<h4><i class="fa fa-info-circle" aria-hidden="true"></i> <?php echo $lang["plataforma_formacion_cerrada"];?></h4>
								</div>
							</div>
						</div>

						<?php
						/*<div class="row mt-1">
							<div class="col-12">
								<form  class="boxed-form" method="post" id="EscuelaOnlineForm">
									<!-- INSTRUCCIONES -->
									<div class="row">
										<div class="form-group col-12 mb-1">
											<div class="alert alert-info redimension" role="alert">
												<h4><i class="fa fa-info-circle" aria-hidden="true"></i> <strong><?php echo $lang["plataforma_formacion_instrucciones_titulo"];?>: </strong><br>
													<?php echo $lang["plataforma_formacion_instrucciones_punto1"];?><br>
													<?php echo $lang["plataforma_formacion_instrucciones_punto2"];?><br>
													<?php echo $lang["plataforma_formacion_instrucciones_punto3"];?><br>
													<?php echo $lang["plataforma_formacion_instrucciones_punto4"];?>
												</h4>
												<h4>
													<i class="fa fa-info-circle" aria-hidden="true"></i> 
													<strong><?php echo $lang["plataforma_formacion_instrucciones_texto_wwhatsapp"];?> <a href="https://api.whatsapp.com/send?phone=34687717491&text=Hola!%20%20Necesito%20soporte%20para%20entrar%20a%20la%20plataforma%20de%20online&source=&data=" target="_blank" style="color:#0c5460;text-decoration:underline;">
													<strong> WhatsApp 687717491</strong>
													</a>
												</h4>
											</div>
										</div>
									</div>

									<!-- DNI -->
									<div class="row">
										<div class="form-group col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 redimension">
											<label style="font-weight: bold; font-size: 20px;"><?php echo $lang["formulario_dni_jugador"];?>.</label>
											<input type="text" id="dni" class="form-control" name="dni" maxlength="50" required>
										</div>

										<div class="form-group col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 redimension">
											<button id="buscardni" class="btn" style="width: 100%; margin-left: 0;" type="button">
												<span><?php echo $lang["plataforma_formacion_btn_buscar"];?></span>
											</button>
										</div>
									</div>

									<div class="row">
										<div class="form-group col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 redimension">
											<label style="font-weight: bold; font-size: 20px;"><?php echo $lang["formulario_nombre_apellidos"];?>:</label>
											<input type="text" id="nombreapellidos" class="form-control" name="nombreapellidos" maxlength="50" readonly>
										</div>

										<div class="form-group col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 redimension">
											<label style="font-weight: bold; font-size: 20px;"><?php echo $lang["plataforma_formacion_equipo"];?></label>
											<input type="text" id="equipo" class="form-control" name="equipo" maxlength="50" readonly>
										</div>
									</div>

									<!-- AVISO LEGAL --> 
									<div class="row">
										<div class="col-12 col-md-12 col-lg-12 col-xl-12">
											<h4 class="section-title mt-1 mb-0"><?php echo $lang["plataforma_formacion_aviso_legal_titulo"];?></h4>
										</div>

										<div class="col-12">
											<p class="t-justify"><?php echo $lang["plataforma_formacion_aviso_legal_texto"];?></p>
										</div>
									</div>

									<!-- CONDICIONES Y SUBMIT -->
									<div class="row">
										<div class="col-12 col-md-12 col-lg-12 col-xl-12">
											<h4 class="section-title mt-1 mb-0"><?php echo $lang["politicas_titulo_privacidad"];?></h4>
										</div>

										<div class="col-12">
											<p class="t-justify"><?php echo $lang["politicas_texto_ley_organica"];?></p>
										</div>

										<div class="col-12">
											<label class="containerchekbox">
												<input type="checkbox" name="autorizodatos" value="si" class="input-control-datos" required>
												<p><?php echo $lang["politicas_check_productos"];?></p>
												<span class="checkmark"></span>
											</label>
										</div>

										<div class="col-12">
											<label class="containerchekbox">
												<input type="checkbox" name="autorizopolitica" value="si" required class="input-control-politica">
												<p><?php echo $lang["politicas_check_imagenes"];?></p>
												<span class="checkmark"></span>
											</label>
										</div>

										<div class="col-12">
											<p class="t-justify">
												<?php echo $lang["politicas_texto_cancelacion1"];?><?php echo $lang["enlace_cancelacion"];?><?php echo $lang["politicas_texto_cancelacion2"];?>
											</p>
										</div>

										<div class="col-12 mb-2">
											<button class="btn" style="width: 100%; margin-left: 0;" type="submit">
												<span><?php echo $lang["plataforma_formacion_btn_solicitar_acceso"];?></span>
											</button>
										</div>

										<div id="EscuelaOnlineForm-respuesta" class="col-12 mb-2">
										</div>
										
										<div id="EscuelaOnlineForm-confirmacion" class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-4">
										</div>
									</div>
								</form>
							</div>
						</div>*/
						?>
					</div>
				</div>
			</section>

			<?php require ("includes/footer.php"); ?>
			<?php require ("includes/cookies.php"); ?>

		</div>

		<!-- Load Scripts Start -->
		<script src="js/libs.js"></script>
		<script src="js/common.js"></script>
		<script src="js/jquery.validate.min.js"></script>

		<script type="text/javascript">
			$( "#buscardni" ).on( "click", function() 
			{
				//  Mensaje de confirmacion
				$('#EscuelaOnlineForm-respuesta').html('');

				//  Acceso temporal
				$('#EscuelaOnlineForm-confirmacion').html('');
								
				if( $("#dni").val().trim() !== "" )
				{
					var form_data = {
						dni:        $("#dni").val().trim()
					};

					$.ajax({
						type:       "POST",
						url:        "?r=index/EscuelaOnlineBuscaDNI",
						data:       form_data,
						dataType:   "json",
						success:    function (data) 
						{
							if(data.response==="success")
							{
								$("#nombreapellidos").val(data.nombreapellidos);
								$("#equipo").val(data.equipo);
							}
							else
							{   
								$("#nombreapellidos").val(data.message);
								$("#equipo").val(data.message);
							}
						}
					});
				}
				else{
					alert("Por favor, introduzca su dni con letra");
				}
			});

			$('#EscuelaOnlineForm').validate(
			{
				submitHandler:function()
				{
					$.ajax({
						type:       "POST",
						url:        "?r=index/escuelaonlineform",
						data:       $('#EscuelaOnlineForm').serialize(),
						dataType:   "json",
						success: function(data)
						{
							if(data.response=="success")
							{
								//  Mensaje de confirmacion
								$('#EscuelaOnlineForm-respuesta').html('<div class="alert alert-success redimension" role="alert"><h4><i class="fa fa-check-circle" aria-hidden="true"></i> <strong>'+data.message+'</strong></h4></div>');

								//  Acceso temporal
								$('#EscuelaOnlineForm-confirmacion').html(data.confirmacion);
							}
							else
							{
								$('#EscuelaOnlineForm-respuesta').html('<div class="alert alert-danger redimension" role="alert"><h4><i class="fa fa-close" aria-hidden="true"></i> <strong>'+data.message+'</strong></h4></div>');
							}
						},
						error: function (request, status, error)
						{
							console.log("Entramos al error");
							console.log("****************************************************************");
							console.log(request.responseText);
							console.log("****************************************************************");
							console.log(status);
							console.log("****************************************************************");
							console.log(error);
						}
					});
					//e.preventDefault();
				}
			});
		</script>
		
	</body>
</html>