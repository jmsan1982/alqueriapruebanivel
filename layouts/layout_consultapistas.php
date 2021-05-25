<!DOCTYPE html>
<html lang="es">
	<?php require('includes/head_back.php'); ?>
	<link rel="stylesheet" href="css/calendarioalquiler.css">
	<link rel="stylesheet" href="css/calendario.css">
	<link rel="stylesheet" href="css/forms.css">

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

		label.containerchekbox {
			font-size: 17px;
			font-weight: 400;
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
		<?php require "includes/topbar_back.php"; ?>

		<div class="canvas">
			<div id="content">
				<div id="page-content">
					<div class="page-contacts-block schedule-block mb-3">
						<div class="container">
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
										<i class="fa fa-search" aria-hidden="true" style="margin-right: 10px;"></i><b>Consulta reserva de pistas <?php echo $date1->format('d/m/Y'); ?></b>
									</h2>
								</div>

								<!-- CALENDARIO JS -->
								<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="calendar-box" id="calendarioconsultapistas">
									</div>

									<div class="boxed-form" style="padding-bottom: 20px;">
										<div class="form-group">
											<button class="btn btn-link-w ml-0 spoiler-l1">
												<span>SOLICITAR PISTA</span>
											</button>
										</div>

										<div class="form-group">
											<button class="btn btn-link-w ml-0 spoiler-l2">
												<span>SOLICITAR CAMBIO PARTIDO</span>
											</button>
										</div>

										<div class="form-group">
											<button class="btn btn-link-w ml-0 spoiler-l3">
												<span>SOLICITAR CÁMARA - MÁQUINA TIRO</span>
											</button>
										</div>
									</div>

									<div id="info-spol1" class="info-spoiler1" style="display: none;">
										<!-- Formulario Solicitar Pista -->
										<form id="contactform" action="?r=pistas/EnvioCorreoReservaPista" class="boxed-form" name="contactform" method="post">
											<div class="row">
												<div class="col-12">
													<h2 class="section-title t-left">
														<span style="color: #eb7c00;">SOLICITUD DE PISTA:</span>
													</h2>
												</div>

												<div class="form-group col-12">
													<input type="text" class="form-control" style="border: #eb7c00 2px solid !important; height: auto;" value="<?php if(isset($_SESSION['nombreusuario'])){echo utf8_encode($_SESSION['nombreusuario']);}?>" name="entrenador" placeholder="Nombre del solicitante" required>
												</div>

												<div class="form-group col-12">
													<input type="email" class="form-control" style="border: #eb7c00 2px solid !important; height: auto;" value="<?php if(isset($_SESSION['emailusuario'])){echo utf8_encode($_SESSION['emailusuario']);}?>" name="email" placeholder="Email" required>
												</div>

												<div class="form-group col-12">
													<select class="form-control"  name="seccion_departamento" id="seccion-departamento" onchange="mostrarEquipoSolicitarPista();"  required>
														<option disabled selected value>Sección / Departamento</option>
														<option value="Administración">Administración</option>
														<option value="Alqueria LAB">Alqueria LAB</option>
														<option value="Area Desarrollo Personal">Area de Desarrollo Personal</option>
														<option value="Cantera Masculina">Cantera Masculina</option>
														<option value="Cantera Femenina">Cantera Femenina</option>
														<option value="Cátedra">Cátedra</option>
														<option value="Comunicación">Comunicación</option>
														<option value="Dirección">Dirección</option>
														<option value="Escuela">Escuela</option>				
														<option value="Negocio">Negocio</option>
														<option value="Recepción">Recepción</option>
														
													</select>
												</div>

												<div class="form-group col-12"  id="seleccion-equipos">
													<select class="form-control" name="equipo">
														<option disabled selected value="" >Sin Equipo. (Seleccionar equipo en caso de ser necesario)</option>
														
														<?php
															foreach ($datos['equipos'] as $equipo) {
														?>
																<option value="<?php echo $equipo['nombre_equipo_nueva_temporada'];?>"><?php echo utf8_encode($equipo['nombre_equipo_nueva_temporada']);?></option>
														<?php
															}
														?>
													</select>
												</div>
											</div>

											<div class="row">
												<div class="form-group col-12 col-lg-4 col-xl-4 mb-1" style="font-size: 1.2em;">
													<label class="control control--radio" style="font-weight: 400;">
														Entrenamiento <input type="radio" name="opcion" value="Entrenamiento" checked>
														<div class="control__indicator"></div>
													</label>
												</div>

												<div class="form-group col-12 col-lg-4 col-xl-4 mb-1" style="font-size: 1.2em;">
													<label class="control control--radio" style="font-weight: 400;">
														Partido <input type="radio" name="opcion" value="Partido">
														<div class="control__indicator"></div>
													</label>
												</div>

												<div class="form-group col-12 col-lg-4 col-xl-4 mb-1" style="font-size: 1.2em;">
													<label class="control control--radio" style="font-weight: 400;">
														Evento <input type="radio" name="opcion" value="Evento">
														<div class="control__indicator"></div>
													</label>
												</div>

												<div class="form-group col-12 col-lg-4 col-xl-4 mb-1" style="font-size: 1.2em;">
													<label class="control control--radio" style="font-weight: 400;">
														Acción <input type="radio" name="opcion" value="Accion">
														<div class="control__indicator"></div>
													</label>
												</div>

												<div class="form-group col-12 col-lg-4 col-xl-4 mb-1" style="font-size: 1.2em;">
													<label class="control control--radio" style="font-weight: 400;">
														Gimnasio <input type="radio" name="opcion" value="Gimnasio">
														<div class="control__indicator"></div>
													</label>
												</div>
											</div>

											<div class="row clearfix">
												<div class="form-group col-12">
													<input id="fecha" type="date" style="height: auto;" class="form-control" name="fecha" required> 
													<!-- <input type="text" class="form-control" style="border: #eb7c00 2px solid !important; height: auto;" name="fecha" placeholder="Fecha (dd/mm/aaaa)" title="Día/Mes/Año" required> -->
												</div>

												<div class="form-group col-12">
													<!-- <input type="text" class="form-control" style="border: #eb7c00 2px solid !important; height: auto;" name="hora" placeholder="Hora (hh:mm)" title="Hora:Minutos" required> -->
													<h4 class="mt-1">Hora de inicio:</h4>
                                                    <input type="time" id="hora_ini" name="hora_ini" value="09:00:00" max="21:00:00" min="07:00:00" step="1" required>
												</div>

												<div class="form-group col-12">
													<!-- <input type="text" class="form-control" style="border: #eb7c00 2px solid !important; height: auto;" name="hora" placeholder="Hora (hh:mm)" title="Hora:Minutos" required> -->
													<h4 class="mt-1">Hora de fin:</h4>
                                                    <input type="time" id="hora_fin" name="hora_fin" value="09:00:00" max="23:00:00" min="07:00:00" step="1" required>
												</div>

												<div class="form-group col-12">
													<textarea class="form-control" style="border: #eb7c00 2px solid !important; height: 115px;" name="observaciones" placeholder="Observaciones (Duración, Rival, etc.)"></textarea>
												</div>

												<div class="form-group col-12">
													<input type="hidden" name="usuarioidentificado" value="<?php if(isset($_SESSION['usuario'])){echo $_SESSION['usuario'];}?>">
													<button class="btn btn-link-w ml-0" type="submit" id="submit">
														<span>ENVIAR</span>
													</button>
												</div>
											</div>
										</form>
									</div>

									<div id="info-spol2" class="info-spoiler2" style="display: none;">
										<!-- Formulario Solicitar Cambio Partido -->
										<form id="contactform" action="?r=pistas/EnvioCorreoCambioPartido" class="boxed-form" name="contactform" method="post">
											<div class="row">
												<div class="col-12">
													<h2 class="section-title t-left">
														<span style="color: #eb7c00;">SOLICITUD DE CAMBIO DE PARTIDO:</span>
													</h2>
												</div>

												<div class="form-group col-12">
													<select class="form-control" name="categoria_equipo" required>
														<option disabled selected value>Seleccionar categoría</option>
														<?php
															foreach ($datos['categorias'] as $categoria) {
														?>
																<option value="<?php echo $categoria['nombre_categoria_cas'];?>"><?php echo $categoria['nombre_categoria_cas'];?></option>
														<?php
															}
														?>
													</select>
												</div>

												<div class="form-group col-12">
													<select class="form-control" name="seccion" required>
														<option disabled selected value>Seleccionar sección</option>
														<option value="Cantera Masculina">Cantera Masculina</option>
														<option value="Cantera Femenina">Cantera Femenina</option>
														<option value="Escuela">Escuela</option>
													</select>
												</div>

												<div class="form-group col-12" id="seleccion-equipos-cambiopatido">
													<select class="form-control" name="equipo"  required>
														<option disabled selected value>Seleccionar equipo</option>
														<?php
															foreach ($datos['equipos'] as $equipo) {
														?>
																<option value="<?php echo $equipo['nombre_equipo_nueva_temporada'];?>"><?php echo $equipo['nombre_equipo_nueva_temporada'];?></option>
														<?php
															}
														?>
													</select>
												</div>

												<div class="form-group col-12">
													<input type="text" class="form-control" style="height: auto;" name="jornada" placeholder="Jornada" required>
												</div>

												<div class="form-group col-12">
													<input type="text" class="form-control" style="height: auto;" name="equipo_local" placeholder="Equipo local" required>
												</div>

												<div class="form-group col-12">
													<input type="text" class="form-control" style="height: auto;" name="equipo_visitante" placeholder="Equipo visitante" required>
												</div>
											</div>

											<div class="row">
												<div class="form-group col-12 mt-1 mb-1">
													<h4 class="mt-1">Tipo de cambio:</h4>
												</div>

												<div class="form-group col-12 t-left">
													<label class="containerchekbox">
														<input type="checkbox" name="cambio_fecha" value="Sí">
														<span class="checkmark"></span> Fecha
													</label>
													<label class="containerchekbox">
														<input type="checkbox" name="cambio_hora" value="Sí">
														<span class="checkmark"></span> Hora
													</label>
													<label class="containerchekbox">
														<input type="checkbox" name="permuta" value="Sí">
														<span class="checkmark"></span> Permuta
													</label>
												</div>
											</div>

											<div class="row">
												<div class="form-group col-12 mt-1 mb-1">
													<h4 class="mt-1">Solicitante:</h4>
												</div>

												<div class="form-group col-12">
													<select class="form-control" name="solicitante" required>
														<option disabled selected value>Seleccionar solicitante</option>
														<option value="VALENCIA BASKET CLUB">VALENCIA BASKET CLUB</option>
														<option value="FUNDACIÓN VALENCIA BASKET 2000">FUNDACIÓN VALENCIA BASKET 2000</option>
														<option value="CLUB RIVAL">CLUB RIVAL</option>
													</select>
												</div>
											</div>

											<div class="row">
												<div class="form-group col-12 mt-1 mb-1">
													<h4 class="mt-1">Coste:</h4>
												</div>

												<div class="form-group col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 mb-1" style="font-size: 17px;">
													<label class="control control--radio" style="font-weight: 400;">
														Sí <input type="radio" name="coste" value="Sí" onclick="mostrarCantidad();" required>
														<div class="control__indicator"></div>
													</label>
												</div>

												<div class="form-group col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 mb-1" style="font-size: 17px;">
													<label class="control control--radio" style="font-weight: 400;">
														No <input type="radio" name="coste" value="No" onclick="ocultarCantidad();">
														<div class="control__indicator"></div>
													</label>
												</div>

												<div class="clearfix"></div>

												<div class="form-group col-12 mb-1" id="div-cantidad" style="display: none;"">
													<input type="text" class="form-control" style="height: auto;" name="cantidad" placeholder="Cantidad (€)">
												</div>
											</div>

											<div class="row">
												<div class="form-group col-12 mt-1 mb-1">
													<h4 class="mt-1">Motivo:</h4>
												</div>

												<div class="form-group col-12">
													<select class="form-control" name="motivo_cambio" required>
														<option disabled selected value>Seleccionar motivo</option>
														<option value="Por coincidencia con otro equipo">Por coincidencia con otro equipo</option>
														<option value="Por torneo">Por torneo</option>
														<option value="Por tecnificación / selecciones">Por tecnificación / selecciones</option>
														<option value="Otro">Otro (rellenar en observaciones)</option>
													</select>
												</div>
											</div>

											<div class="row">
												<div class="form-group col-12 mt-1 mb-1">
													<h4 class="mt-1">Observaciones:</h4>
												</div>

												<div class="form-group col-12">
													<textarea class="form-control" style="height: 115px;" name="observaciones" placeholder="Observaciones"></textarea>
												</div>
											</div>

											<div class="row">
												<div class="form-group col-12 mt-1 mb-1">
													<h4 class="mt-1">Cambio:</h4>
												</div>

												<div class="form-group col-12 mt-1 mb-1">
													<p style="font-size: 17px;">- Según calendario:</p>
												</div>

												<div class="form-group col-12">
													<input type="text" class="form-control" style="height: auto;" name="fecha_calendario" placeholder="Fecha (dd/mm/aaaa)" title="Día/Mes/Año" required>
												</div>

												<div class="form-group col-12">
													<input type="text" class="form-control" style="height: auto;" name="hora_calendario" placeholder="Hora (hh:mm)" title="Hora:Minutos" required>
												</div>

												<div class="form-group col-12">
													<input type="text" class="form-control" style="height: auto;" name="campo_calendario" placeholder="Campo" required>
												</div>

												<div class="form-group col-12 mt-2 mb-1">
													<p style="font-size: 17px;">- Pasa a:</p>
												</div>

												<div class="form-group col-12">
													<input type="text" class="form-control" style="height: auto;" name="fecha_solicitada" placeholder="Fecha (dd/mm/aaaa)" title="Día/Mes/Año" required>
												</div>

												<div class="form-group col-12">
													<input type="text" class="form-control" style="height: auto;" name="hora_solicitada" placeholder="Hora (hh:mm)" title="Hora:Minutos" required>
												</div>

												<div class="form-group col-12">
													<input type="text" class="form-control" style="height: auto;" name="campo_solicitado" placeholder="Campo" required>
												</div>
											</div>

											<div class="row">
												<div class="form-group col-12 mt-1 mb-1">
													<h4 class="mt-1">Entrega esta hoja:</h4>
												</div>

												<div class="form-group col-12">
													<input type="text" class="form-control" style="height: auto;" name="nombre_solicitante" placeholder="Nombre del solicitante" required>
												</div>

												<div class="form-group col-12">
													<input type="email" class="form-control" style="height: auto;" name="email_solicitante" placeholder="Email del solicitante" required>
												</div>

												<div class="form-group col-12">
													<select class="form-control" name="cargo_solicitante" required>
														<option disabled selected value>Seleccionar cargo</option>
														<option value="Entrenador">Entrenador</option>
														<option value="Coordinador">Coordinador</option>
														<option value="Ayudante">Ayudante</option>
														<option value="Delegado">Delegado</option>
													</select>
												</div>

												<div class="form-group col-12">
													<select class="form-control" name="equipo_solicitante" required>
														<option disabled selected value>Seleccionar equipo</option>
														<?php
															foreach ($datos['equipos'] as $equipo) {
														?>
																<option value="<?php echo $equipo['nombre_equipo_cas'];?>"><?php echo $equipo['nombre_equipo_cas'];?></option>
														<?php
															}
														?>
													</select>
												</div>
											</div>

											<div class="row">
												<div class="form-group col-12">
													<input type="hidden" name="usuarioidentificado" value="<?php if(isset($_SESSION['usuario'])){echo $_SESSION['usuario'];}?>">
													<button class="btn btn-link-w ml-0" type="submit" id="submit">
														<span>ENVIAR</span>
													</button>
												</div>
											</div>
										</form>
									</div>

									<div id="info-spol3" class="info-spoiler3" style="display: none;">
										<!-- Formulario Solicitar Cámara o Máquina de Tiro -->
										<form id="contactform" action="?r=pistas/EnvioCorreoCamaraMaquina" class="boxed-form" name="contactform" method="post">
											<div class="row">
												<div class="col-12">
													<h2 class="section-title t-left">
														<span style="color: #eb7c00;">SOLICITUD DE CÁMARA O MÁQUINA DE TIRO:</span>
													</h2>
												</div>

												<div class="form-group col-12">
													<input type="text" class="form-control" style="height: auto;" name="nombre_solicitante" placeholder="Nombre del solicitante" required>
												</div>

												<div class="form-group col-12">
													<input type="email" class="form-control" style="height: auto;" name="email_solicitante" placeholder="Email del solicitante" required>
												</div>

												<div class="form-group col-12">
													<select class="form-control" name="cargo_solicitante" required>
														<option disabled selected value>Seleccionar cargo</option>
														<option value="Entrenador">Entrenador</option>
														<option value="Coordinador">Coordinador</option>
														<option value="Ayudante">Ayudante</option>
														<option value="Delegado">Delegado</option>
													</select>
												</div>

												<div class="form-group col-12">
													<select class="form-control" name="equipo" required>
														<option disabled selected value>Seleccionar equipo</option>
														<?php
															foreach ($datos['equipos'] as $equipo) {
														?>
																<option value="<?php echo $equipo['nombre_equipo_nueva_temporada'];?>"><?php echo $equipo['nombre_equipo_nueva_temporada'];?></option>
														<?php
															}
														?>
													</select>
												</div>
											</div>

											<div class="row mt-1">
												<div class="form-group col-5 col-sm-5 col-md-5 col-lg-3 col-xl-3 mb-1" style="font-size: 17px;">
													<label class="control control--radio" style="font-weight: 400;">
														Cámara <input type="radio" name="solicitud" value="Cámara" onclick="mostrarInfoCamara();" required>
														<div class="control__indicator"></div>
													</label>
												</div>

												<div class="form-group col-7 col-sm-7 col-md-7 col-lg-5 col-xl-5 mb-1" style="font-size: 17px;">
													<label class="control control--radio" style="font-weight: 400;">
														Máquina de tiro <input type="radio" name="solicitud" value="Máquina de tiro" onclick="mostrarInfoMaquina();">
														<div class="control__indicator"></div>
													</label>
												</div>

												<div class="clearfix"></div>

												<div class="form-group col-12 mb-1" id="info-camara" style="font-size: 17px; color: red; display: none;">
													<ul>
														<li>Recogida de cámara en Oficina Alqueria</li>
														<li>Devolución de cámara en Oficina Alqueria
															<ul>
																<li>Lo más pronto posible</li>
																<li>Conectada al cargador</li>
																<li>Tarjeta formateada</li>
															</ul>
														</li>
													</ul>
												</div>

												<div class="form-group col-12 mb-1" id="info-maquina" style="font-size: 17px; color: red; display: none;">
													<ul>
														<li>Recogida de máquina en Recepción de Alqueria</li>
														<li>Devolución de máquina en Recepción de Alqueria</li>
													</ul>
												</div>
											</div>

											<div class="row">
												<div class="form-group col-12 mt-1 mb-1">
													<h4 class="mt-1">Recogida:</h4>
												</div>

												<div class="form-group col-12">
													<input type="text" class="form-control" style="height: auto;" name="fecha_recogida" placeholder="Fecha (dd/mm/aaaa)" title="Día/Mes/Año" required>
												</div>

												<div class="form-group col-12">
													<input type="text" class="form-control" style="height: auto;" name="hora_recogida" placeholder="Hora (hh:mm)" title="Hora:Minutos" required>
												</div>
											</div>

											<div class="row">
												<div class="form-group col-12 mt-1 mb-1">
													<h4 class="mt-1">Entrega:</h4>
												</div>

												<div class="form-group col-12">
													<input type="text" class="form-control" style="height: auto;" name="fecha_entrega" placeholder="Fecha (dd/mm/aaaa)" title="Día/Mes/Año" required>
												</div>

												<div class="form-group col-12">
													<input type="text" class="form-control" style="height: auto;" name="hora_entrega" placeholder="Hora (hh:mm)" title="Hora:Minutos" required>
												</div>
											</div>

											<div class="row">
												<div class="form-group col-12 mt-1 mb-1">
													<h4 class="mt-1">Observaciones:</h4>
												</div>

												<div class="form-group col-12">
													<textarea class="form-control" style="height: 115px;" name="observaciones" placeholder="Observaciones"></textarea>
												</div>
											</div>

											<div class="row">
												<div class="form-group col-12 mt-1 mb-1" style="font-size: 17px;">
													<p>
														<span style="font-size: 17px; color: red;">
															<strong>IMPORTANTE:</strong>
														</span>
														<br>
														Cualquier incidencia se debe comunicar lo más pronto posible por el buen funcionamiento y convivencia de todos/as. ¡Muchas gracias!
													</p>
												</div>
											</div>


											<div class="row">
												<div class="form-group col-12">
													<input type="hidden" name="usuarioidentificado" value="<?php if(isset($_SESSION['usuario'])){echo $_SESSION['usuario'];}?>">
													<button class="btn btn-link-w ml-0" type="submit" id="submit">
														<span>ENVIAR</span>
													</button>
												</div>
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

											if (count($datos['horario']) == 0) {
												echo "<h4 style='text-align:center;'>" .$date->format('d/m/Y')."</h4>";
											}
											else {
												echo "<h4 style='text-align:center;'>".$date->format('d/m/Y')."</h4>";
										?>
												<table id="tabla-pista" class="table table-striped">
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

																if ($horario['es_partido'] == 0) {
																	$partido = "No";
																	if ($horario['observ'] == "") {
																		$equipo = utf8_encode($horario['equipo_local']);
																	}
																	else {
																		$equipo = utf8_encode($horario['equipo_local']). " - " . utf8_encode($horario['observ']);
																	}
																}
																else {
																	$partido="Si";
																	$equipo=utf8_encode($horario['equipo_local']) . " / " . utf8_encode($horario['equipo_visit']) ;
																	$equipo="<strong>". $equipo. "</strong>";
																}
														?>
																<tr>
																	<td>De: <?php echo $horario['horario']; ?></td>
																	<td><?php echo utf8_encode($horario['pista']); ?></td>
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

						<div class="container-fluid mt-2">
							<div class="row">
								<!-- TABLA CONSULTA DE HORARIOS  -->
								<div class="col-12 text-center">
									<?php
									// Si hay datos...
									if (!empty($datos['pistas'])) {
										$fecha1 = date("Y-m-d");
										$timestamp = strtotime($fecha1.' 07:30:00')-900;  //900 son los 15 minutos en segundos
										$timestamp_limite = strtotime($fecha1.' 22:59:59'); //antes 23:59:59

										echo '<div class="table-responsive">
												<table rules="rows" class="table table-dos" style="border: 1px solid #999;">';
									?>
												<tr>
													<th>Pistas</th>
													<?php
														// Ponemos las columnas con intervalos de media hora desde las 8:00 hasta las 00:00
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
																<?php echo utf8_encode($pistass['pista']); ?>
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

																		//if ($hora_fin_ant >= $hora_ini) {
																		?>
																			<td colspan=<?php echo $intervalos_entreno ; ?> style="font-size: 14px; background-color: <?php echo $color_fondo; ?> text-align: center; border: 1px solid #999;">
																				<?php echo $equipo; ?>
																			</td> <!-- Si la hora de fin del anterior es menor o igual a la de inicio del siguiente se le resta un intervalo para que no se desplace de más-->
																		<?php
																		//}
																		//else {
																		?>
																			<!-- <td colspan=<?php //echo $intervalos_entreno; ?> style="font-size: 14px;background-color: <?php //echo $color_fondo; ?> text-align: center; border: 1px solid #999;">
																				<?php //echo $equipo; ?>
																			</td> -->
																		<?php
																		//}

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
		
		<script src="js/CAL_JS_comportamiento_consultap.js"></script>

		<!-- PAGINADOR -->
		<script src="js/fancyTable.js"></script>

		<script type="text/javascript">
			$(document).ready(function(){
				
				

				$("#tabla-pista").fancyTable({
					sortColumn:0,
					sortable: true,
					pagination: true,
					searchable: true,
					inputPlaceholder: " Buscar en la tabla...",
					globalSearch: true
				});
			});


			function mostrarEquipoSolicitarPista(){
				
				//console.log("entra en onchange");
				if ($("#seccion-departamento option:selected").val() == "Cantera Masculina" ||
					$("#seccion-departamento option:selected").val() == "Cantera Femenina" ||
					$("#seccion-departamento option:selected").val() == "Escuela") {
						//$(".campos-required").attr("required", true);
						document.getElementById('seleccion-equipos').style.display = 'block';
						
					}	
					else {		
						//$(".campos-required").attr("required", false);
						document.getElementById('seleccion-equipos').style.display = 'none';
					}
			}

			function mostrarCantidad(){
				document.getElementById('div-cantidad').style.display = 'block';
			}

			function ocultarCantidad(){
				document.getElementById('div-cantidad').style.display = 'none';
			}

			function mostrarInfoCamara(){
				document.getElementById('info-maquina').style.display = 'none';
				document.getElementById('info-camara').style.display = 'block';
			}

			function mostrarInfoMaquina(){
				document.getElementById('info-camara').style.display = 'none';
				document.getElementById('info-maquina').style.display = 'block';
			}
		</script>
	</body>
</html>