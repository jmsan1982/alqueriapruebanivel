<!DOCTYPE html>
<html lang="es">
	<?php require('includes/head_back.php'); ?>
	<link rel="stylesheet" href="css/calendarioalquiler.css">
	<link rel="stylesheet" href="css/calendario.css">

	<body class="Pages" id="alquiler">
		<?php require "includes/topbar_back.php"; ?>

		<div class="canvas">
			<div id="content">
				<div id="page-content">
					<div class="page-contacts-block schedule-block mb-3">
						<div class="container">
							<div class="row">
								<div class="col-12 text-center">
									<h2 class="section-title mt-0 mb-0" style="color: #406da4;">
										<i class="fa fa-search" aria-hidden="true" style="margin-right: 10px;"></i><b>Consulta reserva de pistas</b>
									</h2>
								</div>

								<!-- CALENDARIO JS -->
								<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="calendar-box" id="calendarioconsultapistas">
									</div>

									<div class="boxed-form" style="padding-bottom: 20px;">
										<div class="form-group">
											<button class="btn btn-link-w" id="muestraformulario">
												<span>Solicitar información</span>
											</button>
										</div>
									</div>

									<div class="formulario" id="formulario" style="display: none;">
										<!-- form-block -->
										<form id="contactform" action="?r=pistas/EnvioCorreoConsultaPistas" class="boxed-form" name="contactform" method="post" >
											<div class="form-group">
												<input type="email" class="form-control fc-2-b" style="border: #eb7c00 2px solid !important; height: auto;" value="" name="email" placeholder="Email de notificación" required>
											</div>

											<div class="form-group">
												<textarea name="mensaje" rows="10" placeholder="Escribe tu consulta" class="form-control fc-2-b" style="border: #eb7c00 2px solid !important;"></textarea>
											</div>

											<div class="form-group">
												<input type="hidden" name="usuarioidentificado" value="<?php if(isset($_SESSION['usuario'])){echo $_SESSION['usuario'];} ?>">
												<button class="btn btn-link-w" type="submit" id="submit">
													<span>Enviar</span>
												</button>
											</div>
										</form>
									</div>
								</div>

								<!-- PISTAS -->
								<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-2">
									<div class="table-wrap">
										<?php
											if (isset($_GET['fecha'])) {
												$fecha = $_GET['fecha'];
											}
											else {
												$fecha = date('Y-m-d');
											}

											$date = new DateTime($fecha);

											if(count($datos['horario']) == 0) {
												echo "<h4 style='text-align:center;'>" .$date->format('d/m/Y')."</h4>";
											}
											else {
												echo "<h4 style='text-align:center;'>".$date->format('d/m/Y')."</h4>";
											?>
												<table id="tabla-pistas" class="table table-striped">
													<thead class="thead-dark">
														<tr>
															<th scope="col" style="width: 20%;">Horario</th>
															<th scope="col" style="width: 20%;">Pista</th>
															<th scope="col" style="width: 50%;">Equipo</th>
															<th scope="col" style="width: 10%;">Partido</th>
														</tr>
													</thead>
													<tbody>
														<?php
															foreach ($datos['horario'] as $horario) {

																if($horario['es_partido'] == 0) {
																	$partido="No";
																	$equipo=utf8_encode($horario['equipo_local']);
																}
																else {
																	$partido="Si";
																	$equipo=utf8_encode($horario['equipo_local']) . " / " . utf8_encode($horario['equipo_visit']) ;
																}
																?>

																<tr class="">
																	<td>De: <?php echo $horario['horario']; ?></td>
																	<td> <?php echo $horario['pista']; ?></td>
																	<td><?php echo $equipo; ?></td>
																	<td><?php echo $partido; ?></td>
																</tr>
														<?php
															}
														?>
													</tbody>
												</table>
										<?php
											}
										?>
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

		<script src="js/CAL_JS_comportamiento_consultap.js"></script>

		<!-- PAGINADOR -->
		<script src="js/fancyTable.js"></script>

		<script type="text/javascript">
			$(document).ready(function(){
				$("#muestraformulario").click(function(){
					$("#formulario").slideToggle("slow");
				});

				$("#tabla-pistas").fancyTable({
					sortColumn:0,
					sortable: true,
					pagination: true,
					searchable: true,
					inputPlaceholder: " Buscar en la tabla...",
					globalSearch: true
				});
			});
		</script>
	</body>
</html>