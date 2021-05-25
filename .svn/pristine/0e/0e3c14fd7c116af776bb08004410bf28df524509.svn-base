<!DOCTYPE html>
<html lang="es">
	<?php require "includes/head_back.php"; ?>

	<style>
		.trimestres {
			margin-top: 5px !important;
		}

		.inputForm {
			border: #eb7c00 2px solid !important;
			height: 59px;
		}

		.inputInvalidForm {
			border: red 2px solid !important;
			height: 59px;
		}

		input[type=number]::-webkit-inner-spin-button,
		input[type=number]::-webkit-outer-spin-button {
			-webkit-appearance: none; 
			margin: 0; 
		}

		input[type=number]{
			-moz-appearance: textfield;
		}
	</style>

	<body>

		<?php require "includes/topbar_back.php"; ?>

		<div class="canvas">
			<div id="content">
				<div id="page-content">
					<div class="page-contacts-block">
						<div class="container-fluid">
							<div class="row">
								<div class="col-12 text-center">
									<h2 class="section-title mt-0 mb-0" style="color: #406da4;">
										<i class="fa fa-home" aria-hidden="true" style="margin-right: 10px;"></i><b>Escuela y Cantera</b>
									</h2>
								</div>

								<div class="col-12">
									<h4 class="section-title text-center mt-0 mb-0" style="text-transform: none;">
										Puede ordenar las filas haciendo click en los títulos o buscar por cualquier campo de la tabla.
									</h4>
									<form action="?r=campus/ExportToExcelInscripcionesCantera" method="post">
										<button type="submit" id="export_data_inscripciones_cantera" name='export_data_inscripciones_cantera' value="Export to excel" class="btn btn-info mb-1">Exportar a Excel (Cantera)</button>
									</form>
									<form action="?r=campus/ExportToExcelInscripcionesEscuela" method="post">
										<button type="submit" id="export_data_inscripciones_cantera" name='export_data_inscripciones_cantera' value="Export to excel" class="btn btn-info mb-1">Exportar a Excel (Escuela)</button>
									</form>
									<table id="inscripciones-listado-datatable" class="table table-striped table-hover w-100 mb-2 inscripciones-jornadas-deteccion" style="width: 100%;">
										<thead class="table-dark">
											<tr style="cursor: pointer;">
												<th class="text-center">Fecha</th>
												<th class="text-center">Nº Pedido</th>
												<th class="text-center">DNI Titular</th>
												<th>Nombre</th>
												<th>Email</th>
												<th class="text-center">Tipo</th>
												<th>Equipo</th>
												<th class="text-center">Pago</th>
												<th class="text-center">Reserva Pagada</th>
												<th class="text-center" id="pagados">Pagado</th>
												<th class="text-center">Inscripción</th>
											</tr>
										</thead>
										<tbody>
											<?php
												foreach ($datos['todasinscripciones'] as $inscripcion) {
													if ($inscripcion['Falta_Fed']=="OK") {
														$falta_fed=" <span style='color:green;'><strong>Fede. OK</strong></span>";
													}
													else{
														$falta_fed=" <span style='color:red;'><strong>".$inscripcion['Falta_Fed']."</strong></span>";
													}
													
													if ($inscripcion['pagado_ok'] == "1" || $inscripcion['pagado_ok'] === 1) {
														$string_pagado = 'Sí';
														$string_importe = 50;
													}
													else {
														$string_importe = 0;
													}

													$date = new DateTime($inscripcion['fecha']);

													echo '<tr id="' . $inscripcion['id_formulario'] . '" style="cursor:pointer;" class="">
															<td class="text-center">' . $date->format('d/m/Y') . '</td>
															<td class="text-center">' . $inscripcion['numero_pedido'] . '</td>
															<td class="text-center">' . $inscripcion['dni_tutor'] . '</td>
															<td class="text-left">' . $inscripcion['nombre_apellidos'] . '</td>
															<td class="text-left">' . $inscripcion['email'] . '</td>
															<td class="text-center">' . $inscripcion['tipo'] . '</td>
															<td class="text-left equipo">' . $inscripcion['equipo'] . $falta_fed.'</td>
															<td class="text-center">' . $inscripcion['pagado'] . '</td>
															<td class="text-center">' . $string_importe . '</td>
															<td class="text-center">
																<form method="post" action="?r=escuelacantera/ModificaPagadoInscripcion">';
																	if ($inscripcion['pagado_ok'] == "1") {
																		echo '<label class="switch">
																				<input type="checkbox" name="pagado" value="0" checked disabled>
																				<span class="slider" disabled></span>
																			</label>';
																	}
																	else {
																		echo '<label class="switch">
																				<input type="checkbox" name="pagado" value="1">
																				<span class="slider"></span>
																			</label>';
																	}

																	if ($inscripcion['tipo'] == "ESCUELA") {
																		echo '<input type="hidden" name="id" value="'.$inscripcion['numero_pedido'].'">
																		<button class="btn" type="submit">Guardar</button>';
																	}
															echo '</form>
															</td>
															<td class="text-center" id="' . $inscripcion['id_formulario'] . '">
																<a data-toggle="modal" data-target="#myModal" class="cargar_modal_editar_inscripcion">
																	<i class="fa fa-edit" style="font-size: 1.5em;" data-toggle="tooltip" data-placement="bottom" title="Editar Inscripción"></i>
																</a>
																<a data-toggle="modal" data-target="#myModalPagosTrimestrales" onclick="mimodaldepagos(' . $inscripcion['id_formulario'] . ')">
																	<i class="fa fa-credit-card" style="font-size: 1.5em;" data-toggle="tooltip" data-placement="bottom" title="Pagos"></i>
																</a>
																<a data-toggle="modal" data-target="#inscripciones-dar-baja-alta" onclick="mimodaleditarbajayalta(' . $inscripcion['id_formulario'] . ')">
																	<i class="fa fa-toggle-on" style="font-size: 1.5em;" data-toggle="tooltip" data-placement="bottom" title="Dar de baja / alta"></i>
																</a>
																<a href="?r=escuelacantera/ImprimirFicha&id='.$inscripcion['id_formulario'].'" target="_blank">
																	<i class="fa fa-print" style="font-size: 1.5em;" data-toggle="tooltip" data-placement="bottom" title="Generar vista para imprimir"></i>
																</a>
															</td>
														</tr>';
												}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Footer -->
		<?php include 'includes/footer_back.php';?>

		<!-- Modal - Editar Inscripcion -->
		<div id="myModal" class="modal fade in" role="dialog" aria-hidden="false" style="display: none;">
			<div class="modal-dialog" style="width: 93%;">
				<div class="modal-content">
					<form id="form_editar_inscripciones" class="boxed-form" name="contactform" method="post" novalidate="novalidate">
						<div class="container-fluid">
							<div class="row mt-1">
								<div class="form-group col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
									<label for="dnititular-editar-inscripciones" class="labelForm">* DNI TUTOR:</label>
									<input type="text" style="-webkit-appearance: none;-moz-appearance: none;" class="form-control inputForm valid" id="dnititular-editar-inscripciones" name="dnititular-editar-inscripciones" aria-invalid="false">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5">
									<label for="nombre-editar-inscripciones" class="labelForm">* Nombre Completo:</label>
									<input type="text" class="form-control inputForm valid" value="" id="nombre-editar-inscripciones" name="nombre-editar-inscripciones" placeholder="Nombre" aria-invalid="false">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
									<label for="fechaN-editar-inscripciones" class="labelForm">Fecha Nacimiento:</label>
									<input type="date" class="form-control inputForm valid" value="" id="fechaN-editar-inscripciones" name="fechaN-editar-inscripciones" placeholder="Correo Electrónico" aria-invalid="false">
								</div>
							</div>

							<div class="clearfix"></div>

							<div class="row">
								<div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<label for="direccion-editar-inscripciones" class="labelForm">Direccion:</label>
									<input type="text" class="form-control inputForm valid" value="" id="direccion-editar-inscripciones" name="direccion-editar-inscripciones" placeholder="Dirección" aria-invalid="false">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
									<label for="numero-editar-inscripciones" class="labelForm">Número:</label>
									<input type="text" class="form-control inputForm valid" value="" id="numero-editar-inscripciones" name="numero-editar-inscripciones" placeholder="Nº" aria-invalid="false">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
									<label for="piso-editar-inscripciones" class="labelForm">Piso:</label>
									<input type="number" class="form-control inputForm valid" value="" id="piso-editar-inscripciones" name="piso-editar-inscripciones" placeholder="Piso/Esc.">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
									<label for="puerta-editar-inscripciones" class="labelForm">Puerta:</label>
									<input type="text" class="form-control inputForm" value="" id="puerta-editar-inscripciones" name="puerta-editar-inscripciones" placeholder="Pta.">
								</div>
							</div>

							<div class="clearfix"></div>

							<div class="row">
								<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
									<label for="poblacion-editar-inscripciones" class="labelForm">Población:</label>
									<input type="text" class="form-control inputForm valid" value="" id="poblacion-editar-inscripciones" name="poblacion-editar-inscripciones" placeholder="Población" aria-invalid="false">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
									<label for="cp-editar-inscripciones" class="labelForm">CP:</label>
									<input type="number" class="form-control inputForm valid" value="" id="cp-editar-inscripciones" name="cp-editar-inscripciones" placeholder="C.Postal" aria-invalid="false">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
									<label for="provincia-editar-inscripciones" class="labelForm">Provincia:</label>
									<input type="text" class="form-control inputForm" value="" id="provincia-editar-inscripciones" name="provincia-editar-inscripciones" placeholder="Provincia">
								</div>
								<div class="form-group col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
									<label for="dnijugador-editar-inscripciones" class="labelForm">* DNI Jugador:</label>
									<input type="text" style="-webkit-appearance: none;-moz-appearance: none;" class="form-control inputForm valid" id="dnijugador-editar-inscripciones" name="dnijugador-editar-inscripciones" aria-invalid="false">
								</div>
							</div>

							<div class="clearfix"></div>

							<div class="row">
								<div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
									<label for="nombrepadre-editar-inscripciones" class="labelForm">Nombre Padre:</label>
									<input type="text" class="form-control inputForm valid" value="" id="nombrepadre-editar-inscripciones" name="nombrepadre-editar-inscripciones" placeholder="Nombre Padre" aria-invalid="false">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
									<label for="nombremadre-editar-inscripciones" class="labelForm">Nombre Madre:</label>
									<input type="text" class="form-control inputForm valid" value="" id="nombremadre-editar-inscripciones" name="nombremadre-editar-inscripciones" placeholder="Nombre Madre" aria-invalid="false">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-3 col-lg-3 col-xl-2">
									<label for="tlfpadre-editar-inscripciones" class="labelForm">Telef. Padre:</label>
									<input type="number" class="form-control inputForm valid" value="" id="tlfpadre-editar-inscripciones" name="tlfpadre-editar-inscripciones" placeholder="Telef.Padre" aria-invalid="false">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-3 col-lg-3 col-xl-2">
									<label for="tlfmadre-editar-inscripciones" class="labelForm">Telef. Madre:</label>
									<input type="number" class="form-control inputForm valid" value="" id="tlfmadre-editar-inscripciones" name="tlfmadre-editar-inscripciones" placeholder="Telef.Madre">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-3 col-lg-3 col-xl-2">
									<label for="talla-editar-inscripciones" class="labelForm">Talla Camiseta:</label>
									<select class="form-control inputForm valid" value="" id="talla-editar-inscripciones" name="talla-editar-inscripciones" style="/* font-size: 14px; */" aria-invalid="false">
										<option value="xs">XS</option>
										<option value="s">S</option>
										<option value="m" selected>M</option>
										<option value="l">L</option>
										<option value="xl">XL</option>
									</select>
								</div>

								<div class="form-group col-12 col-sm-12 col-md-3 col-lg-3 col-xl-2">
									<label for="numeroCamiseta-editar-inscripciones" class="labelForm">Nº Camiseta:</label>
									<input type="number" class="form-control inputForm valid" value="" id="numeroCamiseta-editar-inscripciones" name="numeroCamiseta-editar-inscripciones" placeholder="Nº" aria-invalid="false">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
									<label for="email-editar-inscripciones" class="labelForm">* Email:</label>
									<input type="email" class="form-control inputForm valid" value="" id="email-editar-inscripciones" name="email-editar-inscripciones" placeholder="Correo Electrónico">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
									<label for="temporada1819-editar-inscripciones" class="labelForm">Temporada 18/19</label>
									<input type="text" class="form-control inputForm valid" value="Sí" id="temporada1819-editar-inscripciones" name="temporada1819-editar-inscripciones" placeholder="Temporada 18/19" aria-invalid="false" disabled>
								</div>
							</div>

							<div class="clearfix"></div>

							<div class="row">
								<div class="form-group col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
									<label for="alergico-editar-inscripciones" class="labelForm">* Alergico:</label>
									<select class="form-control inputForm valid" value="" id="alergico-editar-inscripciones" name="alergico-editar-inscripciones" style="font-size: 14px;" aria-invalid="false">
										<option selected disabled>Selecciona uno por favor</option>
										<option value="1">Sí</option>
										<option value="0" selected>No</option>
									</select>
								</div>

								<div class="form-group col-12 col-sm-12 col-md-10 col-lg-6 col-xl-6">
									<label for="alergias-editar-inscripciones" class="labelForm">Alergias (sólo si tiene):</label>
									<input type="text" class="form-control inputForm valid" value="" id="alergias-editar-inscripciones" name="alergias-editar-inscripciones" placeholder="Alergias" aria-invalid="false">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
									<label for="modalidad-editar-inscripciones" class="labelForm">Equipo:</label>
									<select class="form-control inputForm valid" value="" id="modalidad-editar-inscripciones" name="modalidad-editar-inscripciones">
										<?php
											foreach ($datos['equipos'] as $equipo) {
												echo "<option value='" . $equipo["ID"] . "'>" . $equipo["equipo"] . "</option>";
											}
										?>
									</select>
								</div>
							</div>

							<!-- 
								Introducimos la edición de CLUB / CATEGORIA / CLUB 
								$datos['equipos_1920']      = licenciasfederacion1920_equipos::getEquipos();
								$datos['categorias_1920']   = licenciasfederacion1920_equipos::getCategorias();
								$datos['club_1920']         = licenciasfederacion1920_equipos::getClubs();
							-->
							<div class="row bg-info">
								<div class="form-group col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 pt-1">
									<label for="equipo1920-editar-inscripciones" class="labelForm">Temporada 19/20. Equipo:</label>
									<select class="form-control inputForm valid" value="" id="equipo1920-editar-inscripciones" name="equipo1920-editar-inscripciones">
										<option value="">Seleccionar</option>
										<?php
											foreach ($datos['federacion_equipos'] as $equipo){
											   echo "<option value='". strtolower(str_replace(" ","_",$equipo["ID"]))."'>" . $equipo["Nombre"] . "</option>";
											}
										?>
									</select>
								</div>

								<div class="form-group col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 pt-1">
									<label for="categoria1920-editar-inscripciones" class="labelForm">Temporada 19/20. Categoria:</label>
									<select class="form-control inputForm valid" id="categoria1920-editar-inscripciones" name="categoria1920-editar-inscripciones">
										<option value="">Seleccionar</option>
										
										<?php
											foreach ($datos['federacion_categorias'] as $equipo){
											   echo "<option value='". strtolower(str_replace(" ","_",$equipo["ID"]))."'>" . $equipo["Nombre"] . "</option>";
											}
										?>
									</select>
								</div>

								<div class="form-group col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 pt-1">
									<label for="club1920-editar-inscripciones" class="labelForm">Temporada 19/20. Club:</label>
									<select class="form-control inputForm valid" value="" id="club1920-editar-inscripciones" name="club1920-editar-inscripciones">
										<option value="">Seleccionar</option>
										<?php
											foreach ($datos['federacion_clubs'] as $equipo){
												echo "<option value='". strtolower(str_replace(" ","_",$equipo["ID"]))."'>" . $equipo["Nombre"] . "</option>";
											}
										?>
									</select>
								</div>
							</div>

							<div class="clearfix"></div>

							<div class="row">
								<h4 class="section-title mt-1 mb-1" style="text-align: center;">
									Domiciliación bancaria <button id="validar-cuenta-bancaria" type="button" class="btn btn-primary">Validar cuenta bancaria</button>
								</h4>
							</div>

							<div class="clearfix"></div>

							<div class="row">
								<div class="form-group col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
									<label for="titular-editar-inscripciones">* Titular:</label>
									<input type="text" class="form-control inputForm valid" value="" id="titular-editar-inscripciones" name="titular-editar-inscripciones" placeholder="Titular" aria-invalid="false">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-2 col-lg-2 col-xl-1 bg-info pb-1">
									<label for="iban-editar-inscripciones">* IBAN:</label>
									<input type="text" minlength="4" class="form-control inputForm valid" value="ES" id="iban-editar-inscripciones" name="iban-editar-inscripciones" placeholder="IBAN" maxlength="4">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-2 col-lg-2 col-xl-1 bg-info pb-1">
									<label for="entidad-editar-inscripciones">* Entidad:</label>
									<input type="text" minlength="4" class="form-control inputForm valid" id="entidad-editar-inscripciones" name="entidad-editar-inscripciones" placeholder="Entidad" onkeydown="limit4(this);" onkeyup="limit4(this);">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-2 col-lg-2 col-xl-1 bg-info pb-1">
									<label for="oficina-editar-inscripciones">* Oficina:</label>
									<input type="text" class="form-control inputForm valid" value="" minlength="4" id="oficina-editar-inscripciones" name="oficina-editar-inscripciones" placeholder="Oficina" onkeydown="limit4(this);" onkeyup="limit4(this);">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-2 col-lg-2 col-xl-1 bg-info pb-1">
									<label for="dc-editar-inscripcione">* DC:</label>
									<input type="text" class="form-control inputForm valid" value="" minlength="2" id="dc-editar-inscripciones" name="dc-editar-inscripciones" placeholder="DC" onkeydown="limit2(this);" onkeyup="limit2(this);">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-2 bg-info pb-1">
									<label for="cuenta-editar-inscripcione">* Cuenta:</label>
									<input type="text" class="form-control inputForm valid" id="cuenta-editar-inscripciones" name="cuenta-editar-inscripciones" placeholder="Cuenta" onkeydown="limit10(this);" minlength="10" onkeyup="limit10(this);" aria-invalid="false">

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
							</div>
							<div id="aviso-cuenta-bancaria-incorrecta" class="row hide" style="">
							</div>

							<div class="clearfix"></div>

							<div class="row mt-1">
								<input type="hidden" value="masculino" name="categoria">

								<!-- PARTE 1 FORM - DATOS -->
								<div class="form-group col-12 alert alert-success" id="mensaje-editar" style="display: none;">
									<p>Inscripción editada correctamente.</p>
								</div>
							</div>

							<div class="clearfix"></div>

							<div class="row">
								<div class="form-group col-12 col-sm-12 col-md-5 offset-md-1 col-lg-4 offset-lg-2 col-xl-3 offset-xl-3">
									<input type="hidden" id="IDInscripcion" name="IDInscripcion" value="798">
									<button type="submit" class="btn btn-empresas-activo mt-2" name="editar_inspecciones" style="transform: skew(0deg); font-size: 15px; margin: 0 auto; height: 55px;">
										Guardar
									</button>
								</div>

								<div class="form-group col-12 col-sm-12 col-md-5 col-lg-4 col-xl-3">
									<button type="button" class="btn btn-empresas-activo mt-2" data-dismiss="modal" style="transform: skew(0deg); font-size: 15px; margin: 0 auto; height: 55px;">
										Cerrar
									</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>

		<!-- Modal - Dar de baja / Alta inscripcion-->
		<div id="inscripciones-dar-baja-alta" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title mb-0 pt-0 pb-0">Estado de la inscripcion</h4>
					</div>

					<div class="modal-body">
						<form id="inscripciones-dar-baja-alta-form" method="post">
							<div class="row mt-4">
								<div class="col-12">
									<input type="hidden" name="" id="inscripciones-dar-baja-alta-form-idinscripcion" value="">
									<div class="form-row" style="margin-top: -10px; margin-bottom: 10px;">
										<h3 class="mt-0 mb-0 pb-0">Activo (naranja) o inactivo (gris)</h3>
										<label class="switch mt-0">
											<input type="checkbox" id="estado-inscripcion-alta-baja" value="">
											<span class="slider round" style="margin-top: 10px; margin-bottom: -10px;"></span>
										</label>
										<p class="mb-0" style="margin-top: 5px;"></p>
									</div>
									<div id="inscripciones-dar-baja-alta-form-respuesta"></div>
								</div>
							</div>

							<div class="row mt-4">
								<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-1">
									<button class="btn btn-info btn-block" type="submit">Guardar cambios</button>
								</div>

								<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<button type="button" class="btn btn-empresas-activo btn-block w-100" style="height: 34px; margin: 0px; width: 100%;" data-dismiss="modal">
										Cerrar
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal - Editar cuenta bancaria -->
		<div id="myModalEditarCuenta" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title mb-0 pb-0">Editar cuenta bancaria</h4>
					</div>

					<div class="modal-body">
						<div id="modaleditarcuenta-contenido" class="row">
							<div class="col-12">
								<form id="editar-cuenta-form" method="post">
									<input type="hidden" name="" id="editar-cuenta-idinscripcion" value="">

									<div class="form-row">
										<label>IBAN:</label>
										<input type="text" name="iban" class="form-control" id="editar-cuenta-iban" required>
									</div>

									<div class="form-row">
										<label>ENTIDAD:</label>
										<input type="text" name="entidad" class="form-control" id="editar-cuenta-entidad" required>
									</div>

									<div class="form-row">
										<label>OFICINA:</label>
										<input type="text" name="oficina" class="form-control" id="editar-cuenta-oficina" required>
									</div>

									<div class="form-row">
										<label>DC:</label>
										<input type="text" name="dc" class="form-control" id="editar-cuenta-dc" required>
									</div>

									<div class="form-row">
										<label>CUENTA:</label>
										<input type="text" name="cuenta" class="form-control" id="editar-cuenta-cuenta" required>
									</div>

									<div class="form-row">
										<label></label>
										<button class="btn btn-info btn-block" type="submit">Guardar cambios</button>
									</div>

									<div id="editar-cuenta-form-respuesta"></div>
								</form>
							</div>
						</div>
					</div>

					<div class="modal-footer t-center">
						<button type="button" class="btn btn-empresas-activo" data-dismiss="modal" style="transform: skew(0deg); font-size: 15px; height: 35px; margin: 0 auto auto auto;">
							Cerrar
						</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal - Editar Pagos Trimestrales -->
		<div id="myModalPagosTrimestrales" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title pt-0 pb-0">Editar Pagos Trimestrales</h4>
					</div>

					<div class="modal-body">
						<div id="modalpagostrimestrales-contenido" class="row">
							<div class="col-12">

								<form id="pagos-trimestrales-form" method="post">
									<input type="hidden" name="" id="pagos-trimestrales-idinscripcion" value="">
									<input type="hidden" name="" id="pagos-trimestrales-fip" value="">
									<input type="hidden" name="" id="pagos-trimestrales-categoria-inscripcion" value="">

									<!---->
									<div class="cantera-form-row">

										<!-- RESERVA -->
										<div>
											<label>RESERVA:</label>
											<input type="number" min="0" step="0.01" name="" class="form-control" id="pagos-reserva" required disabled>
										</div>

										<!-- DATOS MATRÍCULA -->
										<div class="mt-1">
											<label>MATRÍCULA:</label>
										</div>

										<div class="row">
											<div class="col-12">
												<input type="number" min="0" step="0.01" name="" class="form-control" id="pagos-matricula" required disabled>
											</div>
										</div>

										<!-- DATOS PENDIENTE MATRÍCULA -->
										<div class="mt-1">
											<label>PENDIENTE MATRÍCULA:</label>
										</div>

										<div class="row">
											<div class="col-12 col-sm-10 col-md-6 col-lg-6 col-xl-6">
												<input type="number" min="0" step="0.01" name="" class="form-control" id="pagos-pendiente-matricula" required disabled>
											</div>

											<div class="col-12 col-sm-2 col-md-3 col-lg-3 col-xl-3 text-right">
												<label style="line-height:34px;">Matrícula pagada:</label>
											</div>

											<div class="col-12 col-sm-2 col-md-3 col-lg-63 col-xl-3">
												<label class="switch" style="margin-top:10px;">
													<input type="checkbox" id="pagos-pagado-pendiente-matricula" >
													<span class="slider round" style="margin-top:-5px;margin-bottom:5px;"></span>
												</label>
											</div>
										</div>
										
										<div class="row">
											<div class="col-12 col-sm-2 col-md-6 col-lg-6 col-xl-6">
												<label style="line-height:34px;">INCLUIR PENDIENTE MATRÍCULA EN XML:</label>
											</div>

											<div class="col-12 col-sm-2 col-md-3 col-lg-3 col-xl-3">
												<label class="switch" style="margin-top:10px;">
													<input type="checkbox" id="incluir-pendiente-matricula-en-xml">
													<span class="slider round" style="margin-top:-5px;margin-bottom:5px;"></span>
												</label>
											</div>
										</div>
									</div>

									<!-- TOTAL INSCRIPCIÓN -->
									<div>
										<label>TOTAL INSCRIPCIÓN:</label>
										<input type="number" min="0" step="0.01" name="" class="form-control" id="pagos-total-inscripcion" required disabled>
									</div>

									<!-- TOTAL PENDIENTE -->
									<div class="mt-1">
										<label>TOTAL PENDIENTE (si procede aplicar gastos de devolución, se sumarán a parte):</label>
										<input type="number" min="0" step="0.01" name="" class="form-control" id="pagos-total-pendiente" required disabled>
									</div>

									<hr class="mt-2">

									<!-- DATOS GASTOS DEVOLUCION -->
									<div class="mt-1">
										<label>GASTOS DEVOLUCION:</label>
									</div>

									<div class="row">
										<div class="col-12 col-sm-10 col-md-10 col-lg-10 col-xl-10">
											<input type="number" min="0" step="0.01" name="" class="form-control" id="pagos-devolucion" value="5.00" required disabled>
										</div>

										<div class="col-12 col-sm-2 col-md-2 col-lg-2 col-xl-2">
											<label class="switch" style="margin-top:10px;">
												<input type="checkbox" id="pagos-gastos-devolucion">
												<span class="slider round" style="margin-top:-5px;margin-bottom:5px;"></span>
											</label>
										</div>
									</div>

									<hr>

									<!-- TRIMESTRES -->
									<div class="trimestres">
										<h3 class="mb-0">
											<strong>PAGO DE TRIMESTRES</strong>
										</h3>
										<p class="mb-0">Cada trimestre indica la cantidad domiciliada o a domiciliar.</p>
										<p class="mb-0">Cada trimestre indica si se ha pagado o si se ha domiciliado su pago en el banco.</p>
										<p class="mb-0">Para registrar el pago de un trimestre, márquelo y guarde los cambios.</p>
									</div>

									<div class="row mt-1">
										<div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
											<label>1-15 Noviembre 2019:</label>
											<input type="number" min="0" step="0.01" name="" class="form-control" id="pagos-trimestre-noviembre" required disabled>
											<label class="switch" style="margin-top: 10px;">
												<input type="checkbox" id="pagos-pagado-noviembre">
												<span class="slider round"></span>
											</label>
										</div>

										<div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
											<label>1-15 Enero 2020:</label>
											<input type="number" min="0" step="0.01" name="" class="form-control" id="pagos-trimestre-enero" required disabled>
											<label class="switch" style="margin-top: 10px;">
												<input type="checkbox" id="pagos-pagado-enero">
												<span class="slider round"></span>
											</label>
										</div>

										<div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
											<label>1-15 Abril 2020:</label>
											<input type="number" min="0" step="0.01" name="" class="form-control" id="pagos-trimestre-abril" required disabled>
											<label class="switch" style="margin-top: 10px;">
												<input type="checkbox" id="pagos-pagado-abril">
												<span class="slider round"></span>
											</label>
										</div>
									</div>

									<hr>

									<!-- INCLUIR PAGOS EN EL XML -->
									<div class="trimestres">
										<h3 class="mb-0">
											<strong>INCLUIR CARGO EN LA GENERACIÓN DE XML</strong>
										</h3>
										<p class="mb-0">Marcando el trimestre, se incluirá en el XML de cargos correspondiente cuando este se genere.</p>
									</div>

									<div class="row mt-1">
										<div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
											<h5 class="mb-0">
												<strong>1-15 Noviembre 2019:</strong>
											</h5>
											<label class="switch" style="margin-top: 10px;">
												<input type="checkbox" id="generar-xml-noviembre">
												<span class="slider round"></span>
											</label>
										</div>

										<div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
											<h5 class="mb-0">
												<strong>1-15 Enero 2020:</strong>
											</h5>
											<label class="switch" style="margin-top: 10px;">
												<input type="checkbox" id="generar-xml-enero">
												<span class="slider round"></span>
											</label>
										</div>

										<div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
											<h5 class="mb-0">
												<strong>1-15 Abril 2020:</strong>
											</h5>
											<label class="switch" style="margin-top: 10px;">
												<input type="checkbox" id="generar-xml-abril">
												<span class="slider round"></span>
											</label>
										</div>

										<input id="dni-titular" type="hidden" value="">
									</div>

									<!-- COMENTARIO GENERAL -->
									<div class="row">
										<div class="col-12">
											<label style="margin-top:10px;">COMENTARIO GENERAL:</label>
											<textarea class="form-control" id="pagos-trimestrales-comentario-general" maxlength="190"></textarea>
										</div>
									</div>

									<div id="pagos-trimestrales-form-respuesta" class="form-row mt-2"></div>

									<div class="row mt-2">
										<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-1">
											<button class="btn btn-info btn-block" type="submit" readonly>Guardar cambios</button>
										</div>

										<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
											<button type="button" class="btn btn-empresas-activo btn-block w-100" style="border: none; height: 34px; margin: 0px; width: 100%;" data-dismiss="modal">
												Cerrar
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

		<!-- Load Scripts Start -->
		<script src="js/libs.js"></script>
		<script src="js/common.js"></script>

		<script src="backmeans/assets/js/bootstrap.js"></script>
		<script src="backmeans/assets/js/escuela-cantera.js"></script>

		<!-- Datatables. https://datatables.net/download/ -->
		<!-- Estos include se generan en la URL indicada donde se seleccionan los componentes / funciones a incluir -->
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.16/af-2.2.2/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/cr-1.4.1/fc-3.2.4/fh-3.1.3/kt-2.3.2/r-2.2.1/rg-1.0.2/rr-1.2.3/sc-1.4.4/sl-1.2.5/datatables.min.js"></script>

		<!-- JQuery Validation. https://jqueryvalidation.org/ -->
		<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/additional-methods.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/additional-methods.min.js"></script>

		
		<script type="text/javascript">
			//  Modal Editar Inscripcion /  Formulario
			$("#form_editar_inscripciones").validate(
			{
				submitHandler: function(form)
				{
					if( ($("#alergico-editar-inscripciones option:selected").val() == "1"  && $("#alergias-editar-inscripciones").val().trim() != "") || $("#alergico-editar-inscripciones option:selected").val() == "0" ){

						$("#alergias-editar-inscripciones").addClass("inputForm");
						$("#alergias-editar-inscripciones").removeClass("inputInvalidForm");

						var data = $('form').serialize()+
								'&federacion_club='+$('#club1920-editar-inscripciones option:selected').val()+
								'&federacion_categoria='+$('#categoria1920-editar-inscripciones option:selected').val()+
								'&federacion_equipo='+$('#equipo1920-editar-inscripciones option:selected').val();

						$.ajax({
							type: "POST",
							url: "?r=ajax/UpdateInscripcion",
							data: data,
							dataType: "json",
							success: function(data){
								$("#mensaje-editar").show();
								$("#" + $("#IDInscripcion").val() + " .dni_titular_editar").text( $("#dnititular-editar-inscripciones").val() );
								$("#" + $("#IDInscripcion").val() + " .equipo").text( $("#modalidad-editar-inscripciones option:selected").text() );
								$("#" + $("#IDInscripcion").val() + " .nombre_editar").text( $("#nombre-editar-inscripciones").val() );
								$("#" + $("#IDInscripcion").val() + " .email_editar").text( $("#email-editar-inscripciones").val() );
								$("#" + $("#IDInscripcion").val() + " .modalidad_editar").text( $("#modalidad-editar-inscripciones option:selected").text() );
								setTimeout(function(){ $("#myModal").modal('hide') }, 2000);
							}
						});
					}
					else{
						$("#alergias-editar-inscripciones").removeClass("inputForm");
						$("#alergias-editar-inscripciones").addClass("inputInvalidForm");
					}
				}
			});

			//  Modal Editar Inscripcion  /  Cargar modal con datos de la inscripcion
			$( ".cargar_modal_editar_inscripcion" ).on( "click",function() 
			{
				$("#IDInscripcion").val( $( this ).parent().attr("id") );
				  console.log( $( this ).parent().parent().attr("id") );
				//  setear todos los valores a 0 al entrar
				$("#dni-editar-inscripciones").val("");
				$("#nombre-editar-inscripciones").val("");
				$("#direccion-editar-inscripciones").val("");
				$("#numero-editar-inscripciones").val("");
				$("#piso-editar-inscripciones").val("");
				$("#puerta-editar-inscripciones").val("");
				$("#poblacion-editar-inscripciones").val("");
				$("#cp-editar-inscripciones").val("");
				$("#provincia-editar-inscripciones").val("");
				$("#nombrepadre-editar-inscripciones").val("");
				$("#nombremadre-editar-inscripciones").val("");
				$("#tlfpadre-editar-inscripciones").val("");
				$("#tlfmadre-editar-inscripciones").val("");
				$("#modalidad-editar-inscripciones").val("");
				$("#fechaN-editar-inscripciones").val("");
				$("#email-editar-inscripciones").val("");
				$("#titular-editar-inscripciones").val("");
				$("#dnititular-editar-inscripciones").val("");
				$("#iban-editar-inscripciones").val("");
				$("#entidad-editar-inscripciones").val("");
				$("#oficina-editar-inscripciones").val("");
				$("#dc-editar-inscripciones").val("");
				$("#talla-editar-inscripciones").val("");
				$("#numeroCamiseta-editar-inscripciones").val("");   
				$("#cuenta-editar-inscripciones").val("");
				$("#alergico-editar-inscripciones").val("0");
				$("#alergias-editar-inscripciones").val("");
				$("#dnijugador-editar-inscripciones").val("");
				$("#temporada1819-editar-inscripciones").val("");
				$("#club1920-editar-inscripciones option[value='']").attr('selected', true);
				$("#categoria1920-editar-inscripciones option[value='']").attr('selected', true);
				$("#equipo1920-editar-inscripciones option[value='']").attr('selected', true);

				var form_data = {
					debug:          "true",
					form_id:        "inscripciones_cargar_contenido_inscripcion_original",
					idinscripcion:  $("#IDInscripcion").val()
				};

				$.ajax({
					type:       "POST",
					url:        "?r=ajax/dispatcher",
					data:       form_data,
					dataType:   "json",
					success:    function(data)
					{
						console.log(data);

						$("#mensaje-editar").hide();
						$("#dnititular-editar-inscripciones").val( data.datos['dni_tutor'] );console.log("a3");
						$("#nombre-editar-inscripciones").val( data.datos['nombre_apellidos'] );console.log("a4");
						$("#direccion-editar-inscripciones").val( data.datos['direccion'] );console.log("a5");
						$("#numero-editar-inscripciones").val( data.datos['numero'] );console.log("a6");
						$("#piso-editar-inscripciones").val( data.datos['piso'] );console.log("a7");
						$("#puerta-editar-inscripciones").val( data.datos['puerta'] );console.log("a8");
						$("#poblacion-editar-inscripciones").val( data.datos['poblacion'] );console.log("a9");
						$("#cp-editar-inscripciones").val( data.datos['codigo_postal'] );console.log("a10");
						$("#provincia-editar-inscripciones").val( data.datos['provincia'] );console.log("a11");
						$("#nombrepadre-editar-inscripciones").val(  data.datos['nombre_padre'] );console.log("a12");
						$("#nombremadre-editar-inscripciones").val( data.datos['nombre_madre'] );console.log("a13");
						$("#tlfpadre-editar-inscripciones").val( data.datos['telefono_padre'] );console.log("a14");
						$("#tlfmadre-editar-inscripciones").val(data.datos['telefono_madre']);console.log("a15");
						$("#modalidad-editar-inscripciones").val( data.datos['id_equipo_horario'] );console.log("a16");

						/** Cargamos Club, Categoria y Equipo */
						var id1 = data.datos['id_federacion_clubs'];

						$("#club1920-editar-inscripciones option[value=" + id1 + "]").attr('selected', true);

						var id2 = data.datos['id_federacion_categoria'];
						$("#categoria1920-editar-inscripciones option[value=" + id2 + "]").attr('selected', true);

						var id3 = data.datos['id_federacion_equipo'];
						$("#equipo1920-editar-inscripciones option[value=" + id3 + "]").attr('selected', true);

						$("#fechaN-editar-inscripciones").val( data.datos['fecha_nacimiento'] );console.log("a20");
						$("#email-editar-inscripciones").val( data.datos['email'] );console.log("a21");
						$("#titular-editar-inscripciones").val( data.datos['titular_banco'] );console.log("a22");

						if( typeof(data.datos['iban']) != "undefined" ){
							$("#iban-editar-inscripciones").val( data.datos['iban']  );
						}

						if( typeof(data.datos['entidad']) != "undefined" ){
							$("#entidad-editar-inscripciones").val( data.datos['entidad'] );
						}

						if( typeof(data.datos['oficina']) != "undefined" ){
							$("#oficina-editar-inscripciones").val( data.datos['oficina'] );
						}

						if( typeof(data.datos['dc']) != "undefined" ){
							$("#dc-editar-inscripciones").val( data.datos['dc'] );
						}

						if( typeof(data.datos['cuenta']) != "undefined" ){
							$("#cuenta-editar-inscripciones").val(data.datos['cuenta']);
						}

						if( data.alerta_cuenta !="" ){
							$("#aviso-cuenta-bancaria-incorrecta").removeClass("hide");
							$("#aviso-cuenta-bancaria-incorrecta").html('<div class="alert alert-danger offset-6 col-md-6 col-lg-6 col-xl-6 bg-danger pt-1 pb-1">'+data.alerta_cuenta+'</div>');
						}
						else{
							$("#aviso-cuenta-bancaria-incorrecta").addClass("hide");
						}

						if( typeof(data.datos['modalidad']) != "undefined" ){
							$("#temporada1819-editar-inscripciones").val( data.datos['modalidad'] );
						}

						if( typeof(data.datos['dni_jugador']) != "undefined" ){
							$("#dnijugador-editar-inscripciones").val( data.datos['dni_jugador'] );
						}

						if( typeof(data.datos['talla_camiseta']) != "undefined" ){
							$("#talla-editar-inscripciones").val( data.datos['talla_camiseta'] );
						}

						if( typeof(data.datos['numero_camiseta']) != "undefined" ){
							$("#numeroCamiseta-editar-inscripciones").val(data.datos['numero_camiseta']);   
						}

						if( typeof(data.datos['alergico']) != "undefined" && data.datos['alergico'] == 1 ){
							$("#alergico-editar-inscripciones").val(data.datos['alergico']);
						}
						else{
							$("#alergico-editar-inscripciones").val("0");
						}

						if( typeof(data.datos['alergias']) != "undefined" ){
							$("#alergias-editar-inscripciones").val(data.datos['alergias']);
						}

						if( data.datos['temporada'] == "19/20" ){
							$("#temporada1920-editar-inscripciones").val( "Sí" );
						}
						else{
							$("#temporada1920-editar-inscripciones").val( "No" );
						}
					}
				});
			});

			//  Validar una cuenta bancaria 
			$( "#validar-cuenta-bancaria" ).on( "click", function() 
			{
				var cuentabancaria=$("#iban-editar-inscripciones").val()+
				$("#entidad-editar-inscripciones").val()+
				$("#oficina-editar-inscripciones").val()+
				$("#dc-editar-inscripciones").val()+
				$("#cuenta-editar-inscripciones").val();

				var form_data = {
					debug:          "false",
					form_id:        "validar_cuenta_bancaria",
					cuentabancaria:  cuentabancaria
				};

				$.ajax({
					type:       "POST",
					url:        "?r=ajax/dispatcher",
					data:       form_data,
					dataType:   "json",
					success:    function(data)
					{
						if( data.alerta_cuenta !="" )
						{
							if(data.response=="error"){
								$("#aviso-cuenta-bancaria-incorrecta").removeClass("hide");
								$("#aviso-cuenta-bancaria-incorrecta").html('<div class="alert alert-danger offset-6 col-md-6 col-lg-6 col-xl-6 bg-danger pt-1 pb-1">'+data.alerta_cuenta+'</div>');
							}
							else{
								$("#aviso-cuenta-bancaria-incorrecta").removeClass("hide");
								$("#aviso-cuenta-bancaria-incorrecta").html('<div class="alert alert-success offset-6 col-md-6 col-lg-6 col-xl-6 bg-danger pt-1 pb-1">'+data.alerta_cuenta+'</div>');
							}
							
							$("#aviso-cuenta-bancaria-incorrecta").fadeTo(2500, 500).slideUp(500,function() {
								$("#aviso-cuenta-bancaria-incorrecta").slideUp(500);
								$("#aviso-cuenta-bancaria-incorrecta").html("");
							});
						}
					}
				});
			});
		</script>
	</body>
</html>