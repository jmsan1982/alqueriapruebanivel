<!DOCTYPE html>
<html lang="es">
	<?php require('includes/head_back.php'); ?>
	<link rel="stylesheet" href="css/calendarioalquiler.css">
	<link rel="stylesheet" href="css/calendario.css">

	<style id="compiled-css" type="text/css">
		.table-responsive {
			display: block;
			width: 100%;
			overflow-x: auto;
			-webkit-overflow-scrolling: touch;
		}

		.table-responsive > .fixed-column {
			position: absolute;
			width: 55px;
			border-right: 1px solid #ddd;
			background-color: lightblue;
		}

		.table-responsive > .table-dos tr:first-child th {
			padding: 10px;
			background-color: lightgray;
			font-weight: 600;
			font-size: 16px;
			border: 1px solid #999;
		}

		.table-responsive > .table-dos tr th:first-child,
		.table-responsive > .table-dos tr td:first-child {
			min-width: 105px;
			font-weight: 600;
			border: 1px solid #999;
		}

		.table-responsive > .table-dos tr {
			border: 1px solid #999;
		}
	</style>

	<script type="text/javascript">
		$(window).load(function(){

			var $table = $('.table.table-dos');
			var $fixedColumn = $table.clone().insertBefore($table).addClass('fixed-column');

			$fixedColumn.find('th:not(:first-child),td:not(:first-child)').remove();

			$fixedColumn.find('tr').each(function (i, elem) {
				$(this).height($table.find('tr:eq(' + i + ')').height());
			});

		});
	</script>
	<body class="Pages" id="alquiler">
		<?php //require "includes/topbar_back.php"; ?>

		<div class="canvas">
			<div id="content">
				<div id="page-content">
					<div class="page-contacts-block schedule-block ">

						<div class="container-fluid mt-2">
							<div class="row">
								<?php
									if (isset($_GET['fecha'])) {  //  recogemos la fecha por get
										$fecha = $_GET['fecha']; 
									}
									else {
										$fecha = date('Y-m-d'); 
									}
									$date1 = new DateTime($fecha);
								?>

								<div class="col-12 text-center">
									<h2 class="section-title mt-0 mb-0" style="color: #406da4;">
										<i class="fa fa-search" aria-hidden="true" style="margin-right: 10px;"></i><b>Consulta reserva de pistas <?php echo $date1->format('d/m/Y');?></b>
									</h2>
								</div>

								<!-- TABLA CONSULTA DE HORARIOS  -->
								<div class="col-12 text-center">
									<?php
									// Si hay datos...
									if (!empty($datos['pistas'])) {
										$fecha1 = date("Y-m-d");
										$timestamp = strtotime($fecha1.' 07:30:00')-900;  //intervalo en segundos de 15 minutos
										$timestamp_limite = strtotime($fecha1.' 22:59:59');

										echo '<div class="table-responsive">
												<table rules="rows" class="table table-dos" style="border: 1px solid #999;">';
									?>
												<tr>
													<th>Pistas</th>
													<?php
														// Ponemos las columnas con intervalos de cuarto de hora desde las 8:00 hasta las 00:00
														do {
															$timestamp += 900;  
															$hora = date("H:i", $timestamp);
															echo "<th>".$hora."</th>";        
														}
														while ($timestamp < $timestamp_limite);
													?>
												</tr>
												<?php
													foreach ($datos['pistas'] as $pistass) {
												?>
														<tr>
															<td>
																<?php echo $pistass['pista']; ?> 
															</td> 

															<?php

															$datos['horariopista'] = servicios::findHorarioParaTabla($fecha, $pistass['pista']);

															$primerregistropista = 1;
															$intervalo_inicio_ant = 0;
															$intervalos_entreno_ant = 0;
															$hora_fin_ant = 0;

															foreach ($datos['horariopista'] as $horario) { // Tenemos los registros de cada pista

																if ($horario['pista'] == $pistass['pista']) {

																	$hora_ini = $horario['hora_ini'];
																	$hora_fin = $horario['hora_fin'];

																	$intervalo_inicio = count((servicios::intervaloHora("07:30:00", $hora_ini)));  // Intervalo hasta la hora de inicio, desde las 8:00
																	$intervalos_entreno = count((servicios::intervaloHora($hora_ini, $hora_fin)))-1;  // Intervalo del entrenamiento

																	if ($horario['es_partido'] == 0) {  // Montamos la cadena a mostrar para cada entrenamiento
																			// $partido = "No";
																			if ($horario['observ'] == "") {
																				$equipo = utf8_encode($horario['equipo_local']." (".$horario['horario'].")");
																			}
																			else {
																				$equipo = utf8_encode($horario['equipo_local'])." - ".utf8_encode($horario['observ']." (".$horario['horario'].")");
																			}
																	}
																	else {
																		// $partido = "Si";
																		$equipo = utf8_encode($horario['equipo_local'])." / ".utf8_encode($horario['equipo_visit']);
																		$equipo = '<strong style="color: #428bca;">'. $equipo. "</strong>" . " (" . $horario['horario'] . ")" ;
																	}

																	$color_fondo = "#c9eb0078;";

																	if (strpos($equipo, 'EBA') !== false) {
																		$color_fondo = "#eb7c0078;";
																	}

																	else if (strpos($equipo, 'INFANTIL') !== false) {
																		 $color_fondo = "#230ac558;";
																	}

																	else if (strpos($equipo, 'CADETE') !== false) {
																		 $color_fondo = "#f79f0d8f;";
																	}
																	else if (strpos($equipo, 'VETERANOS') !== false) {
																		 $color_fondo = "#95dee480;";
																	}
																	else if (strpos($equipo, 'ALEVIN') !== false) {
																		 $color_fondo = "#f18ceb80;";
																	}
																	else if (strpos($equipo, 'TECNIFICACIÓN') !== false) {
																		 $color_fondo = "#8cf1b780;";
																	}
																	else if (strpos($equipo, 'BENJAMIN') !== false) {
																		 $color_fondo = "#e4e48f80;";
																	}
																	else if (strpos($equipo, 'JUNIOR') !== false) {
																		 $color_fondo = "#fd131380;";
																	}
																	else if (strpos($equipo, 'PATRONATO') !== false) {
																		 $color_fondo = "#d7f910;";
																	}
																	else if (strpos($equipo, 'BABY') !== false) {
																		 $color_fondo = "#428bca;";
																	}

																	/* if (($encontrado=strpos($equipo, "LF")) === true) {
																			$color_fondo = "#00d8eb78;";
																		}
																	else {
																		$color_fondo = "#eb7c0078;";
																	} */

																	$i = 1; 
																	if ($primerregistropista == 1) {
																		// Ponemos td vacios hasta que empieza el 1er entrenamiento
																		while ($i < $intervalo_inicio && $primerregistropista = 1) {
																		?>
																			<td>
																				<?php echo ""; ?>
																			</td>
																		<?php
																			$i++;
																		}
																		?>
																		<td colspan=<?php echo $intervalos_entreno; ?> style="font-size: 14px; background-color: <?php echo $color_fondo; ?> text-align: center; border: 1px solid #999;">
																			<?php echo $equipo; ?>
																		</td> <!-- Este es el primer entrenamiento de cada pista #eb7c0078 --> 
																		<?php

																		$intervalo_inicio_ant = $intervalo_inicio; // Para calcular el inicio del siguiente
																		$intervalos_entreno_ant = $intervalos_entreno;  // Para poder pintar la duracion de cada entrenamiento
																		$hora_fin_ant = $hora_fin;
																	}

																	$intervalos_entreno_nuevo = count((servicios::intervaloHora("07:30:00", $hora_ini))) - $intervalo_inicio_ant; // Para posicionar el siguiente entrenamiento


																	// 2º entrenamiento, 3º, ...
																	if ($primerregistropista == 0) {

																		$s = 1;
																		while ($s < $intervalos_entreno_nuevo ) { // Rellenamos con td 

																			if ($s < $intervalos_entreno_ant ) {
																		?>
																				<!--  <td style="font-size: 9px; background-color: #eb7c0078;"><?php //echo ""; ?></td>    -->

																			<?php
																			}
																			else {
																			?>
																				<td>
																					<?php echo ""; ?>
																				</td>
																			<?php 
																			}

																			$s++;
																		}

																		?>
																			<td colspan=<?php echo $intervalos_entreno ; ?> style="font-size: 14px; background-color: <?php echo $color_fondo; ?> text-align: center; border: 1px solid #999;">
																				<?php echo $equipo; ?>
																			</td> <!-- Si la hora de fin del anterior es menor o igual a la de inicio del siguiente se le resta un intervalo para que no se desplace de más-->

																		<?php

																		$intervalo_inicio_ant = $intervalo_inicio;  // Para calcular el inicio del siguiente
																		$intervalos_entreno_ant = $intervalos_entreno;  // Para poder pintar la duracion de cada entrenamiento
																		$hora_fin_ant = $hora_fin;
																	}

																	$primerregistropista = 0;

																}
																else { // Aquí ya no entra porque sacamos los valores de cada pista por separado

																	$primerregistropista = 1;
																}
															} // Foreach horario
														?>

														</tr>

												<?php
													} // Foreach pistass
													echo "</table>
														</div>";
									}
								?>
								</div>
								<!-- FIN TABLA horarios -->
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

	</body>
</html>