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
									<span class="orange-text">Declaración responsable para abono del Valencia Basket Club</span>
								</h3>
							</div>
						</div>

						<div class="row">
							<div class="col-12">
								<form id="declaracion-responsable-form" class="boxed-form" method="post">
									<!-- Paso 1: Texto a redactar -->
									<div class="row renovacion-row">
										<div class="col-12">
											<p style="font-size: 16px;">En Valencia, a fecha <?php echo $now;?></p>
											<p style="font-size: 16px;">Con la adquisición de esta entrada/abono ME COMPROMETO a no asistir a los partidos a los que da derecho el mismo en las siguientes situaciones:</p>
											<ul style="font-size: 16px;">
												<li>Haber padecido en los 14 días anteriores al partido síntomas compatibles con cuadro COVID-19 (fiebre, tos, vómitos, diarrea, pérdida de olfato o gusto, dolores musculares), o haber sido diagnosticado de dicha enfermedad.</li>
												<li>Haber mantenido contacto estrecho con persona diagnosticada de COVID-19 o que se encuentre aislada preventivamente por sospecha de infección.</li>
											</ul>
											<p style="font-size: 16px;">En caso comenzar a presentar alguno/s de los síntomas anteriormente descritos una vez en la instalación, me comprometo a informar inmediatamente al personal del VALENCIA BASKET CLUB, S.A.D. para que puedan ponerse en marcha de inmediato los protocolos sanitarios adecuados.</p>
											<p style="font-size: 16px;">En caso de que otra persona utilice mi entrada/abono, me comprometo a informarle de los anteriores compromisos y en caso de que se me solicite, a facilitar los datos de dicha persona para asegurar la trazabilidad de la enfermedad.</p>
											<p class="mt-2" style="font-size: 14px;">LOPD/RGPD En cumplimiento de Ley Orgánica 3/2018 de Protección de Datos de carácter personal y garantía de los derechos digitales y el reglamento (UE) 2016/679 del parlamento europeo y del consejo de 27 de abril, VALENCIA BASKET CLUB, S.A.D. le recuerda que los datos personales que nos ha facilitado son tratados con la finalidad de cumplir con las obligaciones legales en relación con salud pública, gestionar las actividades que se realicen y mantenerles informados de estas. Se le informa también que puede ejercer los derechos de acceso, rectificación, supresión, portabilidad, limitación de tratamiento, cancelación y, en su caso, oposición, enviando una solicitud por escrito acompañada de la fotocopia de su DNI a la siguiente dirección AVDA. HERMANOS MARISTAS, 16, 46013, VALENCIA o a través de  valencia.basket@valenciabasket.com  así como reclamar ante la Agencia Española de Protección de Datos (www.agpd.es) cuando el interesado considere que Valencia Basket Club, S.A.D. ha vulnerado los derechos fundamentales que le son reconocidos por la normativa aplicable en protección de datos. Si desea ampliar más información sobre nuestra política de privacidad entre en nuestra web www.valenciabasket.com</p>
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

											<p style="font-size: 16px;">Introduzca sus datos personales en los 2 campos para que rellenemos con ellos, de forma interna y automática, el texto de declaración responsable.<br> Al aceptar y enviar la solicitud se le enviará un correo electrónico a usted y al Valencia Basket Club.</p>

											<div class="row">
												<div class="form-group col-12 col-md-3 col-lg-3 col-xl-3">
													<label>Señor/a (nombre completo)</label>
													<input type="text" class="form-control input-control-dni" name="nombrecompleto" id="nombrecompleto-form" maxlength="50" required>
												</div>

												<div class="form-group col-12 col-md-3 col-lg-3 col-xl-3">
													<label>DNI (mayor de edad))</label>
													<input type="text" class="form-control input-control-dni" name="dni" id="dni-form" maxlength="20" required>
												</div>

												<div class="col-12 mt-1">
													<label class="containerchekbox">
														<input type="checkbox" name="autorizo" value="si" required>
														<p>Como persona mayor de edad, acepto las condiciones anteriormente expuestas.</p>
														<span class="checkmark"></span>
													</label>
												</div>
											</div>
										</div>
									</div>

									<!-- Paso 3: Envío de la declaración -->
									<div class="row mt-1 renovacion-row">
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
                    var formData = new FormData();
                    formData.append("nombre",       $("#nombrecompleto-form").val());
                    formData.append("dni",          $("#dni-form").val());  
                    //formData.append("telefono",     $("#telefono-form").val());  
                    //formData.append("domicilio",    $("#domicilio-form").val());  
                    //formData.append("firma_tutor",  $("#img_firma_tutor").val());

                    $.ajax(
                    {
                        type:           "POST",
                        url:            "?r=index/DeclaracionResponsableAbonosGestionaForm",
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
                                // Redireccionamos después de mostrar mensaje durante 3000ms
                                setTimeout(function(){
                                    window.location.href = "https://www.valenciabasket.com";
                                }, 3000);
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
			});
		</script>
	</body>
</html>