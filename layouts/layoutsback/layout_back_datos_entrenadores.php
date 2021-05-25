<!DOCTYPE html>
<?php
require_once('lang/publico_' . $_SESSION['idioma'] . '.php');
?>
<html lang="es">
<?php require('includes/head.php'); ?>
<link rel="stylesheet" href="css/forms.css">
<link rel="stylesheet" href="css/parallax.css">
<link rel="stylesheet" href="css/formus.css">

<!-- Código CSS -->
<style>
	header #menu form input.btn,
	header .menu form input.btn {
		display: inline-block;	
		margin: 0;
		width: auto;
    	padding: 6px 12px;
    	font-weight: 400;
    	text-align: center;
    	white-space: nowrap;
    	vertical-align: middle;
    	cursor: pointer;
    	border: 1px solid transparent !important;
    	border-radius: 4px;
		-webkit-appearance: button;
	    height: 36px;
	    background-color: #eb7c00;
	    border-color: #eb7c00;
	    font-size: 16px;
	    color: #fff;
	}

	header #menu form input.btn:hover,
	header .menu form input.btn:hover {
	    background-color: #c9302c;
    	border-color: #ac2925 !important;
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

	#page-content {
		background-color: #f6f6f6;
	}

	.error {
		color: red;
	}
</style>
<?php if (isset($_SESSION["usuario"])): ?>
<body class="Pages" id="formus">

<div class="wrapper overflow-x-hidden">
	<!--importo el header -->
	<?php require "includes/topbar_back.php"; ?>
	<section id="page-content" class="overflow-x-hidden margin-top-header pb-4">
		<div class="block background-f6">
			<div class="container">
				<?php $now = date("d-m-Y"); ?>
				<div class="row">
					<div class="col-12">
						<h3 class="section-title">
							<span class="orange-text">Datos de Entrenador</span>
						</h3>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<form id="datos-entrenador-form" class="boxed-form" method="POST">

							<!-- Datos personales solicitados -->
							<div class="row mt-1 renovacion-row">
								<div class="col-12 mb-1">
									<hr style="color: black; border: 1px solid #ccc;">
								</div>

								<div class="col-12">

									<div class="row">
										<div class="form-group col-12 col-md-4 col-lg-4 col-xl-4">
											<label>Correo Electrónico</label>
											<input type="email" class="form-control input-control-dni" name="email"
												   id="email-form" maxlength="50" required>
										</div>

										<div class="form-group col-12 col-md-4 col-lg-4 col-xl-4">
											<label>DNI</label>
											<input type="text" class="form-control input-control-dni" name="dni"
												   id="dni-form" maxlength="20" required>
										</div>

										<div class="form-group col-12 col-md-4 col-lg-4 col-xl-4">
											<label>Teléfono</label>
											<input type="text" class="form-control input-control-dni" name="telefono"
												   id="telefono-form" maxlength="15" required>
										</div>
										<div class="col-12">
											<hr style="color: black; border: 1px solid #ccc;">
										</div>
										<!-- Subida de ficheros: foto, DNI, pasaporte, SIP -->
										<div class="row renovacion-row">
											<div class="col-12">
												<h4 class="mt-0 mb-1"><strong>Imagenes y Documentos</strong></h4>
												<div class="alert alert-info redimension" role="alert">
													<h4 class="mt-0 mb-0"><i class="fa fa-info-circle"
																			 aria-hidden="true"></i> Por favor, añada
														imágenes a color, nítidas y con texto legible.</h4>
													<h4 class="mt-0 mb-0"><i class="fa fa-info-circle"
																			 aria-hidden="true"></i> Por favor, envíe
														imágenes que se vean completas y ocupen el documento completo.
													</h4>
													<h4 class="mt-0 mb-0"><i class="fa fa-info-circle"
																			 aria-hidden="true"></i> Por favor, incluya
														imágenes de peso menor a 2 MB.</h4>
												</div>
											</div>

											<!-- IMÁGENES DEMO -->
											<div class="col-12 col-md-6">
												<h4 id="foto-jugador-h4" class="mb-0" style="color:red;">
													<strong><?php echo $lang["ins_form_fotos_ejemplo"]; ?><i
																class="fa fa-times" aria-hidden="true"></i> </strong>
												</h4>
												<img class="img-responsive border pb-0"
													 src="img/inscripciones2020/inscripciones-alqueria-ejemplo-documento-mal.jpg"
													 style="margin: 0 auto;border:1px solid #ddd;">
											</div>
											<div class="col-12 col-md-6">
												<h4 id="foto-jugador-h4" class="mb-0" style="color:darkgreen;">
													<strong><?php echo $lang["ins_form_fotos_ejemplo"]; ?><i
																class="fa fa-check" aria-hidden="true"></i> </strong>
												</h4>
												<img class="img-responsive border"
													 src="img/inscripciones2020/inscripciones-alqueria-demo-documento-bien.png"
													 style="margin: 0 auto;border:1px solid #ddd;">
											</div>
										</div>
										<div class="col-12 mb-1">
											<hr style="color: black; border: 1px solid #ccc;">
										</div>
										<div id="imagenes-guardadas" class="col-12" style="display:none;">
											<div class="row">
												<div class="col-4">
													<h4 class="mt-0 mb-1"><?php echo $lang["licencia_siguiente_paso_foto_jugador"]; ?></h4>
													<img id="img-foto" class="img-responsive border pb-0"
														 style="margin: 0 auto;border:1px solid #ddd;" width="160" req>
												</div>
												<div class="col-4">
													<h4 class="mt-0 mb-1"><?php echo $lang["licencia_siguiente_paso_dni_frontal"]; ?></h4>
													<img id="img-dni-delante" class="img-responsive border pb-0"
														 style="margin: 0 auto;border:1px solid #ddd;">
												</div>
												<div class="col-4">
													<h4 class="mt-0 mb-1"><?php echo $lang["licencia_siguiente_paso_dni_detras"]; ?></h4>
													<img id="img-dni-detras" class="img-responsive border pb-0"
														 style="margin: 0 auto;border:1px solid #ddd;">
												</div>
											</div>
										</div>
										<div class="col-12 mb-1">
											<hr style="color: black; border: 1px solid #ccc;">
										</div>
										<div class="form-group col-12 col-md-4 col-lg-4 col-xl-4">
											<label>Subir foto</label>
											<input id="archivo_foto"
												   type="file" name="foto" accept="image/png, image/jpeg"
												   data-max-size="2048"
												   style="border: none !important;" class="limite2mb">
										</div>
										<div class="form-group col-12 col-md-4 col-lg-4 col-xl-4">
											<label>Parte delantera DNI</label>
											<input id="archivo_dni_frontal"
												   type="file" name="dni_jugador_imagen[]"
												   accept="image/png, image/jpeg" data-max-size="2048"
												   style="border: none !important;" class="limite2mb">
										</div>
										<div class="form-group col-12 col-md-4 col-lg-4 col-xl-4">
											<label>Parte trasera DNI</label>
											<input id="archivo_dni_trasero"
												   type="file" name="dni_jugadordetras_imagen[]"
												   accept="image/png,image/jpeg" data-max-size="2048"
												   style="border: none !important;" class="limite2mb">
										</div>
									</div>
								</div>
							</div>

							<!-- Firma -->
							<div class="row mt-1 renovacion-row ">
								<div class="col-12">
									<hr style="color: black; border: 1px solid #ccc;">
								</div>

								<!-- Firma -->
								<div class="col-12 col-lg-6 col-xl-6 mt-1 t-left">
									<h4 class="mt-0 mb-1">
										<strong>FIRMA:</strong>
									</h4>

									<canvas id="pizarra1"></canvas>

									<input id="img_firma_entrenador" type="hidden" name="img_firma_entrenador">
									<button id="limpiar1" type="button" class="w-100"
											style="max-width: 500px !important; height: 3em;">
										Limpiar firma
									</button>
								</div>

								<!-- ALERT NO OLVIDA PULSAR VALIDAR FIRMAS -->
								<div id="revisar-firma-container" class="col-12 mt-1 hidden">
									<div class="alert alert-danger" role="alert">
										<h4><i class="fa fa-info-circle"
											   aria-hidden="true"></i> <?php echo $lang["ins_form_firma_validar"]; ?>
										</h4>
									</div>
								</div>
								<input type="hidden" name="usuario_entrenador" id="usuario_entrenador"
									   value="<?php echo $_SESSION["idcoach"] ?>">
								<!-- Envío de la solicitud -->
								<div id="submit-container" class="col-12 mt-2 mb-4">
									<button id="submit-datos-entrenador-form"
											class="btn btn-link-w w-100 input-control-dni" type="submit"
											style="width: 100%; margin-left: 0;" id="submit">
										<span>Enviar</span>
									</button>
								</div>
							</div>

							<div id="datos-entrenador-form-espera" class="row renovacion-row"
								 style="display: none;">
								<div class="col-12 alert alert-info">
									<h4>Por favor, espere mientras se procesa la solicitud.</h4>
								</div>
							</div>

							<div id="datos-entrenador-form-respuesta" class="row renovacion-row"
								 style="display: none;"></div>
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

	window.onload = cargarEntrenador;

	function cargarEntrenador() {
		let idEntrenador = $("#usuario_entrenador").val();
		idEntrenador = parseInt(idEntrenador);
		let formData = {
			id_entrenador: idEntrenador,
		};
		$.ajax({
			type: "POST",
			url: "?r=index/EntrenadorSession",
			data: formData,
			dataType: "json",
			success: function (data) {
				if (data.response === "success") {
					let datosEntrenador = data.entrenador;
					if (datosEntrenador.dni !== null || datosEntrenador.email_coach !== null || datosEntrenador.telefono_coach !== null) {
						$("#email-form").val(datosEntrenador.email_coach);
						$("#dni-form").val(datosEntrenador.dni);
						$("#telefono-form").val(datosEntrenador.telefono_coach);

						$("#imagenes-guardadas").show();

						if (datosEntrenador.foto !== null) {
							$("#img-foto").attr("src", "img/coaches/" + datosEntrenador.foto);
						} else {
						}

						if (datosEntrenador.dni_delante !== null) {
							$("#img-dni-delante").attr("src", "img/coaches/" + datosEntrenador.dni_delante);
						} else {
						}

						if (datosEntrenador.dni_detras !== null) {
							$("#img-dni-detras").attr("src", "img/coaches/" + datosEntrenador.dni_detras);
						} else {
						}
					}
				} else {
					console.log("sin datos")
				}
			},
			error: function (errorData) {
				$("#entrenador-mensaje").html("<div class='alert alert-danger'>Ha habido un problema al cargar los datos. Por favor, avise a TESSQ</div>");
			}
		})
	}


	// Gestiona el formulario
	$('#datos-entrenador-form').validate(
		{
			submitHandler: function () {
				// Transformamos el garabato en blob
				$("#img_firma_entrenador").val(document.querySelector('#pizarra1').toDataURL('image/png'));
				var canvasvaciochrome = "data:image/png;base64,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";

				var canvasvaciofirefox = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAfQAAAD6CAYAAABXq7VOAAAB+0lEQVR4nO3BAQEAAACCIP+vbkhAAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAMCjAaKDAAG6Z58dAAAAAElFTkSuQmCC";

				var canvasvaciosafari = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAfQAAAD6CAYAAABXq7VOAAAAAXNSR0IArs4c6QAACJtJREFUeAHt0IEAAAAAw6D5Ux/khVBhwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBgwIABAwYMGDBg4HFgooMAAROxyEAAAAAASUVORK5CYII=";


				if (
					($("#img_firma_entrenador").val() !== canvasvaciochrome) &&
					($("#img_firma_entrenador").val() !== canvasvaciofirefox) &&
					($("#img_firma_entrenador").val() !== canvasvaciosafari)
				) {
					if (validarDni($("#dni-form").val())) {
						var formData = new FormData();
						formData.append("email", $("#email-form").val());
						formData.append("dni", $("#dni-form").val());
						formData.append("telefono", $("#telefono-form").val());
						formData.append("img_firma_entrenador", $("#img_firma_entrenador").val());
						formData.append("id_entrenador", parseInt($("#usuario_entrenador").val()));

						//  ARCHIVOS
						formData.append("archivo_foto", $("#archivo_foto").val());
						formData.append("archivo_dni_frontal", $("#archivo_dni_frontal").val());
						formData.append("archivo_dni_trasero", $("#archivo_dni_trasero").val());

						formData.append('foto', $('#archivo_foto')[0].files[0]);
						formData.append('dnifrontal', $('#archivo_dni_frontal')[0].files[0]);
						formData.append('dnitrasero', $('#archivo_dni_trasero')[0].files[0]);

						$.ajax(
							{
								type: "POST",
								url: "?r=formularios/DatosEntrenadorForm",
								data: formData,
								processData: false,          // tell jQuery not to process the data
								contentType: false,          // tell jQuery not to set contentType
								dataType: "json",
								success: function (data) {
									if (data.response === "success") {
										$("#datos-entrenador-form-espera").hide();
										$("#datos-entrenador-form-respuesta").show(300);
										$("#datos-entrenador-form-respuesta").html("<div class='alert alert-success col-12'><h4>" + data.message + "</h4></div>");
										// Redireccionamos después de mostrar mensaje durante 3000ms
										setTimeout(function () {
											window.location.href = "https://servicios.alqueriadelbasket.com/?r=entrenamientos/BackEntrenamientos";
										}, 3000);
									} else {
										$("#datos-entrenador-form-espera").hide();
										$("#datos-entrenadore-form-respuesta").show(300);
										// Permito volver a enviar
										$("#datos-entrenador-responsable-form").prop("disabled", false);

										$("#datos-entrenador-form-respuesta").html("<div class='alert alert-danger col-12'><h4>" + data.message + "</h4></div>");
										$("#datos-entrenador-form-respuesta").fadeTo(5000, 500).slideUp(500, function () {
											$("#datos-entrenador-form-respuesta").slideUp(500);
											$("#datos-entrenador-form-respuesta").html("");
										});
									}
								},
								error: function (errorData) {
									$("#submitdatos-entrenador-form").prop("disabled", false);
									console.log("error ");
								}
							});
					} else {
						$("#datos-entrenador-form-respuesta").html("<div class='alert alert-danger col-12'><h4> El dni Introducido no es correcto</h4></div>");
						$("#datos-entrenador-form-respuesta").fadeTo(5000, 500).slideUp(500, function () {
							$("#datos-entrenador-form-respuesta").slideUp(500);
							$("#datos-entrenador-form-respuesta").html("");
						});
					}

				} else {
					alert("Por favor, no olvide firmar");
				}
			}
		});

	/*************************************
	 *   valodar dni
	 **************************************/
	function validarDni(dni) {
		//variables
		var numero;
		var letr;
		var letra;
		//expresion regular valida letra en mayusculas o minusculas
		var expresion_regular_dni = /^\d{8}[a-zA-Z]$/;

		if (expresion_regular_dni.test(dni) == true) {
			//se separa los numeros de las letras
			numero = dni.substr(0, dni.length - 1);
			letr = dni.substr(dni.length - 1, 1);
			//divido entre 23 para saber que posicion corresponde
			numero = numero % 23;
			//string con letras del dni
			letra = 'TRWAGMYFPDXBNJZSQVHLCKET';
			letra = letra.substring(numero, numero + 1);
			//comprobamos que la letra es igual a la del dni y devolvemos si es true o false
			if (letra != letr.toUpperCase()) {
				return false;
			} else {
				return true;
			}
		} else {
			return false;
		}
	}


	/*************************************
	 *   CANVAS FIRMA ENTRENADOR
	 **************************************/
		// VARIABLES
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

	// FUNCIONES
	/** Funcion que empieza a dibujar la linea  */
	function empezarDibujo1() {
		pintarLinea1 = true;
		lineas1.push([]);
	};

	/** Funcion dibuja la linea */
	function dibujarLinea1(event) {
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
	function pararDibujar1() {
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

	$("#limpiar1").on("click", function () {
		let ctx1 = miCanvas1.getContext('2d');
		ctx1.clearRect(0, 0, miCanvas1.width, miCanvas1.height);
		lineas1.length = 0;
		$("#img_firma_entrenador").val("");
		//console.log(document.querySelector('#pizarra1').toDataURL('image/png'));
	});

	// returns true if all color channels in each pixel are 0 (or "blank")
	function isCanvasBlank(canvas) {
		return !canvas.getContext('2d')
			.getImageData(0, 0, canvas.width, canvas.height).data
			.some(channel => channel !== 0);
	}
</script>
</body>
<?php else: header("Location: https://servicios.alqueriadelbasket.com/index.php?r=login/loger") ?>
<?php endif ?>
</html>