<!DOCTYPE html>
<html lang="es">

	<?php require "includes/head_back.php"; ?>

	<style>
		.alinear-izquierda {
			padding-left: 0 !important;
		}

		.trimestres {
			margin-top: 5px !important;
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
										<i class="fa fa-users" aria-hidden="true" style="margin-right: 10px;"></i><b>Patronato</b>
									</h2>
								</div>

								<div class="col-12">
									<h4 class="section-title text-center mt-0 mb-0" style="text-transform: none;">
										Puede ordenar las filas haciendo click en los títulos o buscar por cualquier campo de la tabla.
									</h4>
									<form action="?r=patronato/ExportToExcelInscripcionesPatronato" method="post">
										<button type="submit" id="export_data_inspecciones_patronato" name='export_data_inspecciones_patronato' value="Export to excel" class="btn btn-info mb-1">Exportar a Excel</button>
									</form>
									<table id="inscripciones-listado-datatable" class="table table-striped table-hover w-100 mb-2 inscripciones-jornadas-deteccion" style="width: 100%;">
										<thead class="table-dark">
											<tr style="cursor: pointer;">
												<th class="text-center">Fecha Inscripción</th>
												<th class="text-center">Nº Pedido</th>
												<th class="text-center">DNI Titular</th>
												<th>Nombre</th>
												<th>Apellidos</th>
												<th>Modalidad</th>
												<th>Matricula</th>
												<th class="text-center">Tipo pago</th>
												 <th class="text-center" id="pagados">Pago matricula (verde)</th>

												<th class="text-center">Inscripción completa</th>
											</tr>
										</thead>
										<tbody>
											<?php
												foreach ($datos['inscripciones'] as $inscripcion) {

													$date = new DateTime($inscripcion['fecha_inscripcion']);
													$array_contenido = preg_split('/<br[^>]*>/i', $inscripcion['contenido']);

													if ($inscripcion['pagado'] == "1" || $inscripcion['pagado'] === 1) {
														$string_importe = $inscripcion['matricula'];
													}
													else {
														$string_importe = 0;
													}


													echo '<tr id="' . $inscripcion['id_formulario'] . '">
															<td class="text-center">' . $date->format('d/m/Y') . '</td>
															<td class="text-center">' . $inscripcion['numero_pedido'] . '</td>
															<td class="text-center">' . $inscripcion['dni_titular'].'</td>
															<td class="text-left">' . $inscripcion['nombre'] . '</td>
															<td class="text-left">' . $inscripcion['apellidos'].'</td>
															<td class="text-left">' . strtoupper($inscripcion['tipo']).'</td>
															<td class="text-center">' . $string_importe. '</td>
															<td class="text-center">' . $inscripcion['tipo_pago'] . '</td>
															<td class="text-center">
																<form method="post" action="?r=patronato/ModificaPagadoMatriculaPatronato">';

																	if ($inscripcion['pagado'] == "1") {
																		echo '<label class="switch">
																			<input type="checkbox" name="pagado" value="1" checked>
																			<span class="slider"></span>
																		</label>';
																	}
																	else {
																		echo '<label class="switch">
																			<input type="checkbox" name="pagado" value="1">
																			<span class="slider"></span>
																		</label>';
																	}

																	echo '<input type="hidden" name="id" value="'.$inscripcion['id_formulario'].'"> 
																	<button class="btn" type="submit">Guardar</button>
																</form>
															</td>

															
															<td class="text-center">  
																<a data-toggle="modal" data-target="#myModal" onclick="mimodal(' . $inscripcion['id_formulario'] . ')">
																	<i class="fa fa-child" style="font-size: 1.5em;" data-toggle="tooltip" data-placement="bottom" title="Ver Inscripción"></i>
																</a>
																<a data-toggle="modal" data-target="#myModalEditarCuenta" onclick="mimodaleditarcuenta(' . $inscripcion['id_formulario'] . ')">
																	<i class="fa fa-edit" style="font-size: 1.5em;" data-toggle="tooltip" data-placement="bottom" title="Editar Cuenta"></i>
																</a>
																<a data-toggle="modal" data-target="#myModalPagosTrimestrales" onclick="mimodaldepagos(' . $inscripcion['id_formulario'] . ')">
																	<i class="fa fa-credit-card" style="font-size: 1.5em;" data-toggle="tooltip" data-placement="bottom" title="Pagos"></i>
																</a>
																<a data-toggle="modal" data-target="#inscripciones-dar-baja-alta" onclick="mimodaleditarbajayalta(' . $inscripcion['id_formulario'] . ')">
																	<i class="fa fa-toggle-on" style="font-size: 1.5em;" data-toggle="tooltip" data-placement="bottom" title="Dar de baja / alta"></i>
																</a>
																<a href="?r=patronato/ImprimirFicha&numeropedido='.$inscripcion['numero_pedido'].'" target="_blank">
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

		<?php require "includes/topbar_back.php"; ?>

		<!-- Modal - Ver Inscripción completa  (correcto)-->
		<div id="myModal" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body">
						<div class="row">
							<div class="col-sm-12"><h4 class="modal-title" id="modaltitle" style="float:left;"></h4></div>
							<div class="col-sm-12" id="modal-detalleinscripcion-contenido"></div>
						</div>
					</div>
					<div class="modal-footer t-center">
						<button type="button" class="btn btn-empresas-activo"
								data-dismiss="modal"
								style="transform: skew(0deg);font-size: 15px;height: 35px;margin: 0 auto;">Cerrar
						</button>
						
					</div>
				</div>
			</div>
		</div>

		<!-- Modal Editar Cuenta Bancaria (correcto)-->
		<div id="myModalEditarCuenta" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title mb-0 pb-0">Editar cuenta bancaria</h4>
					</div>

					<div class="modal-body">
						<div id="modaleditarcuenta-contenido" class="row">
							<div class="col-sm-12">
								<form id="editar-cuenta-form" method="post">
									<input type="hidden" name="" id="editar-cuenta-idinscripcion" value="">

									<div class="form-row">
										<label>IBAN:</label>
										<input type="text" name="iban" class="form-control" id="editar-cuenta-iban" required>
									</div>

									<div class="form-row">
										<label>ENTIDAD:</label>
										<input type="text" name="entidad" class="form-control" id="editar-cuenta-entidad"
											   required>
									</div>

									<div class="form-row">
										<label>OFICINA:</label>
										<input type="text" name="oficina" class="form-control" id="editar-cuenta-oficina"
											   required>
									</div>

									<div class="form-row">
										<label>DC:</label>
										<input type="text" name="dc" class="form-control" id="editar-cuenta-dc" required>
									</div>

									<div class="form-row">
										<label>CUENTA:</label>
										<input type="text" name="cuenta" class="form-control" id="editar-cuenta-cuenta"
											   required>
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
						<button type="button" class="btn btn-empresas-activo"
								data-dismiss="modal"
								style="transform: skew(0deg);font-size: 15px;height: 35px;margin: 0 auto auto auto;">Cerrar
						</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal - Dar de baja / Alta inscripcion-->
		<div id="inscripciones-dar-baja-alta" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body">
						<div class="row">
							<div class="col-sm-12">
								<h4 class="modal-title" style="float:left;"><strong>Estado de la inscripcion</strong></h4>
							</div>
						</div>
						<form id="inscripciones-dar-baja-alta-form" method="post">
							<div class="row mt-4">
								<div class="col-sm-12">
									<input type="hidden" name="" id="inscripciones-dar-baja-alta-form-idinscripcion" value="">
									<div class="form-row" style="margin-top:-10px;margin-bottom:10px;">
										<h4 class="mt-0 mb-0 pb-0">Activo (naranja) o inactivo (gris)</h4>
										<label class="switch mt-0">
											<input type="checkbox" id="estado-inscripcion-alta-baja" value="">
											<span class="slider round" style="margin-top:10px;margin-bottom:-10px;"></span>
										</label>
										<p class="mb-0" style="margin-top:5px;"></p>
									</div>
									<div id="inscripciones-dar-baja-alta-form-respuesta"></div>
								</div>
							</div>
							<div class="row mt-4">
								<div class="col-md-6">
									<button class="btn btn-info btn-block" type="submit">Guardar cambios</button>
								</div>
								<div class="col-md-6">
								   <button type="button" class="btn btn-empresas-activo btn-block w-100"
										   style="border:none;height:32px;margin:0px;width:100%;" 
										   data-dismiss="modal">Cerrar
								   </button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
			
		<!-- Modal Pagos Trimestrales -->
		<div id="myModalPagosTrimestrales" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title mb-0 pb-0">Editar Pagos Trimestrales</h4>
					</div>

					<div class="modal-body">
						<div id="modalpagostrimestrales-contenido" class="row">
							<div class="col-sm-12">
								<form id="pagos-trimestrales-form" method="post">
									<input type="hidden" name="" id="pagos-trimestrales-idinscripcion" value="">
									<input id="dni-titular-modal" type="hidden" value=""/>
									
									<!-- 
									<div class="form-row" style="margin-top:-10px;margin-bottom:10px;">
										<label>ACTIVO:</label>
										<label class="switch" style="margin-top:10px;">
											<input type="checkbox" id="pagos-cobros-activos">
											<span class="slider round" style="margin-top:10px;margin-bottom:-10px;"></span>
										</label>
									</div>
									--> 

									<!-- RESERVA -->
									<div class="form-row">
										<label>RESERVA:</label>
										<input type="number" min="0" step="0.01" name="" class="form-control"
											   id="pagos-reserva" required>
									</div>
									
									<!-- DATOS MATRÍCULA -->
									<div class="form-row" style="margin-top: 5px;">
										<label>MATRÍCULA:</label>
									</div>
									
									<div class="form-row">
										<div class="col-md-10 alinear-izquierda">
											<input type="number" min="0" step="0.01" name="" class="form-control"
												   id="pagos-matricula" required>
										</div>
										<div class="col-md-2">
											<label class="switch" style="margin-top:10px;">
												<input type="checkbox" id="pagos-pagado-matricula">
												<span class="slider round" style="margin-top:-5px;margin-bottom:5px;"></span>
											</label>
										</div>
									</div>
									
									<!-- DATOS PENDIENTE MATRÍCULA -->
									<div class="form-row">
										<label>PENDIENTE MATRÍCULA:</label>
									</div>
									
									<div class="form-row">
										<div class="col-md-10 alinear-izquierda">
											<input type="number" min="0" step="0.01" name="" class="form-control"
												   id="pagos-pendiente-matricula" required>
										</div>
										<div class="col-md-2">
											<label class="switch" style="margin-top:10px;">
												<input type="checkbox" id="pagos-pagado-pendiente-matricula">
												<span class="slider round" style="margin-top:-5px;margin-bottom:5px;"></span>
											</label>
										</div>
									</div>
									
									<!-- TOTAL INSCRIPCIÓN -->
									<div class="form-row">
										<label>TOTAL INSCRIPCIÓN:</label>
										<input type="number" min="0" step="0.01" name="" class="form-control"
											   id="pagos-total-inscripcion" required>
									</div>
									
									<!-- TOTAL PENDIENTE -->
									<div class="form-row mt-1">
										<label>TOTAL PENDIENTE:</label>
										<input type="number" min="0" step="0.01" name="" class="form-control"
											   id="pagos-total-pendiente" required>
									</div>
									
									<hr> 
									
									<!-- TRIMESTRES -->
									<div class="form-row trimestres">
										<h4 class="mt-0 mb-0 pb-0"><strong>PAGO DE TRIMESTRES</strong></h4>
										<p class="mb-0">Cada trimestre indica la cantidad domiciliada o a domiciliar.</p>
										<p class="mb-0">Cada trimestre indica si se ha pagado o si se ha domiciliado su pago en el banco.</p>
										<p class="mb-0">Para registrar el pago de un trimestre, márquelo y guarde los cambios.</p>
									</div>

									<div class="form-row mt-1">
										<div class="row">
											<div class="col-md-4">
												<label>1-15 Enero:</label>
												<input type="number" min="0" step="0.01" name="" class="form-control"
													   id="pagos-trimestre-enero" required>
												<label class="switch" style="margin-top:10px;">
													<input type="checkbox" id="pagos-pagado-enero">
													<span class="slider round"></span>
												</label>
											</div>
											<div class="col-md-4">
												<label>1-15 Abril:</label>
												<input type="number" min="0" step="0.01" name="" class="form-control"
													   id="pagos-trimestre-abril" required>
												<label class="switch" style="margin-top:10px;">
													<input type="checkbox" id="pagos-pagado-abril">
													<span class="slider round"></span>
												</label>
											</div>
											<div class="col-md-4">
												<label>1-15 Noviembre:</label>
												<input type="number" min="0" step="0.01" name="" class="form-control"
													   id="pagos-trimestre-noviembre" required>
												<label class="switch" style="margin-top:10px;">
													<input type="checkbox" id="pagos-pagado-noviembre">
													<span class="slider round"></span>
												</label>
											</div>
										</div>
									</div>

									<hr>
									
									<!-- INCLUIR PAGOS EN EL XML -->
									<div class="form-row trimestres">
										<h4 class="mt-0 mb-0 pb-0"><strong>INCLUIR CARGO EN LA GENERACIÓN DE XML</strong></h4>
										<p class="mb-0">Marcando el trimestre, se incluirá en el XML de cargos correspondiente cuando este se genere.</p>
									</div>
									
									<div class="form-row mt-1">
										<div class="row">
											<div class="col-md-4">
												<h5 class="mb-0"><strong>1-15 Enero:</strong></h5>
												<label class="switch" style="margin-top:10px;">
													<input type="checkbox" id="generar-xml-enero">
													<span class="slider round"></span>
												</label>
											</div>
											<div class="col-md-4">
												<h5 class="mb-0"><strong>1-15 Abril:</strong></h5>
												<label class="switch" style="margin-top:10px;">
													<input type="checkbox" id="generar-xml-abril">
													<span class="slider round"></span>
												</label>
											</div>
											<div class="col-md-4">
												<h5 class="mb-0"><strong>1-15 Noviembre:</strong></h5>
												<label class="switch" style="margin-top:10px;">
													<input type="checkbox" id="generar-xml-noviembre">
													<span class="slider round"></span>
												</label>
											</div>
											<input id="dni-titular" type="hidden" value=""/>
										</div>
									</div>

									<div id="pagos-trimestrales-form-respuesta" class="form-row mt-2"></div>
									
									<div class="form-row mt-2">
										<div class="row">
											<div class="col-md-6">
												<button class="btn btn-info btn-block" type="submit">Guardar cambios</button>
											</div>
											 <div class="col-md-6">
												<button type="button" class="btn btn-empresas-activo btn-block w-100"
														style="border:none;height:32px;margin:0px;width:100%;" 
														data-dismiss="modal">Cerrar
												</button>
											</div>
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

		<script>
			function mimodal(idinscripcion){
				var form_data = {
					debug: "false",
					form_id: "inscripciones_cargar_contenido_inscripcion_original_patronato",
					idinscripcion: idinscripcion
				};

				$.ajax({
					type: "POST",
					url: "?r=ajax/dispatcherPatronato",
					data: form_data,
					dataType: "json",
					success: function (data) {
						document.getElementById('modaltitle').innerHTML = data.modal_title;
						document.getElementById('modal-detalleinscripcion-contenido').innerHTML = data.datos['contenido'];
					}
				});
			}

			/*  Carga el contenido del formulario editar cuenta */
			function mimodaleditarcuenta(idinscripcion){

				$("input[name='iban']").attr('style', 'border: 1px solid #ccc;');
				$("input[name='entidad']").attr('style', 'border: 1px solid #ccc;');
				$("input[name='oficina']").attr('style', 'border: 1px solid #ccc;');
				$("input[name='dc']").attr('style', 'border: 1px solid #ccc;');
				$("input[name='cuenta']").attr('style', 'border: 1px solid #ccc;');

				$('#cuenta-error').remove();

				var form_data = {
					debug: "true",
					form_id: "inscripciones_cargar_contenido_editar_cuenta_patronato",
					idinscripcion: idinscripcion
				};

				$.ajax({
					type: "POST",
					url: "?r=ajax/dispatcherPatronato",
					data: form_data,
					dataType: "json",
					success: function (data) {
						$('#editar-cuenta-idinscripcion').val(data.idinscripcion);
						$('#editar-cuenta-iban').val(data.datos_iban);
						$('#editar-cuenta-entidad').val(data.datos_entidad);
						$('#editar-cuenta-oficina').val(data.datos_oficina);
						$('#editar-cuenta-dc').val(data.datos_dc);
						$('#editar-cuenta-cuenta').val(data.datos_cuenta);

						document.getElementById('modaltitle').innerHTML = data.modal_title;
					}
				});
			}

			function mimodaldepagos(idinscripcion) {
				var form_data = {
					debug: "false",
					form_id: "inscripciones_cargar_pagos_trimestral_patronato",
					idinscripcion: idinscripcion
				};

				$.ajax({
					type: "POST",
					url: "?r=ajax/dispatcherPatronato",
					data: form_data,
					dataType: "json",
					success: function (data) {
						
						console.log(data);
						
						
						$('#pagos-trimestrales-idinscripcion').val(data.idinscripcion);
						$('#pagos-reserva').val(data.reserva);
						$('#pagos-matricula').val(data.matricula);
						$('#pagos-pendiente-matricula').val(data.pendiente_matricula);
						$('#pagos-total-inscripcion').val(data.total_inscripcion);
						$('#pagos-total-pendiente').val(data.total_pendiente);
						$('#pagos-trimestre-enero').val(data.trimestre_enero);
						$('#pagos-trimestre-abril').val(data.trimestre_abril);
						$('#pagos-trimestre-noviembre').val(data.trimestre_noviembre);
						$('#dni-titular-modal').val(data.dni_titular);
						$pagado_trimestre_enero_check = data.pagado_enero;
						$pagado_trimestre_abril_check = data.pagado_abril;
						$pagado_trimestre_noviembre_check = data.pagado_noviembre;
						$pagado_matricula_check = data.pagado_matricula;
						$pagado_pendiente_matricula_check = data.pagado_pendiente_matricula;
						$cobros_activos_noviembre = data.cobros_activos_noviembre;
						$cobros_activos_enero = data.cobros_activos_enero;
						$cobros_activos_abril = data.cobros_activos_abril;

						if ($pagado_trimestre_enero_check !== false) {
							// $('#pagos-trimestralefootes-pagado').attr("checked","checked");
							document.getElementById("pagos-pagado-enero").checked = true;

						} else {
							// $('#pagos-trimestrales-pagado').attr("checked","");
							document.getElementById("pagos-pagado-enero").checked = false;
						}
						if ($pagado_trimestre_abril_check !== false) {
							// $('#pagos-trimestralefootes-pagado').attr("checked","checked");
							document.getElementById("pagos-pagado-abril").checked = true;

						} else {
							// $('#pagos-trimestrales-pagado').attr("checked","");
							document.getElementById("pagos-pagado-abril").checked = false;
						}
						if ($pagado_trimestre_noviembre_check !== false) {
							// $('#pagos-trimestralefootes-pagado').attr("checked","checked");
							document.getElementById("pagos-pagado-noviembre").checked = true;

						} else {
							// $('#pagos-trimestrales-pagado').attr("checked","");
							document.getElementById("pagos-pagado-noviembre").checked = false;
						}
						if ($pagado_matricula_check !== false) {
							document.getElementById("pagos-pagado-matricula").checked = true;
						} else {
							document.getElementById("pagos-pagado-matricula").checked = false;
						}
						if ($pagado_pendiente_matricula_check !== false) {
							document.getElementById("pagos-pagado-pendiente-matricula").checked = true;
						} else {
							document.getElementById("pagos-pagado-pendiente-matricula").checked = false;
						}

						if($cobros_activos_noviembre !== false && $cobros_activos_noviembre !== null){
							document.getElementById("generar-xml-noviembre").checked = true;
						} else {
							document.getElementById("generar-xml-noviembre").checked = false;
						}
						if($cobros_activos_enero !== false && $cobros_activos_enero !== null){
							document.getElementById("generar-xml-enero").checked = true;
						}else {
							document.getElementById("generar-xml-enero").checked = false;
						}
						if($cobros_activos_abril !== false && $cobros_activos_abril !== null) {
							document.getElementById("generar-xml-abril").checked = true;
						}else {
							document.getElementById("generar-xml-abril").checked = false;
						}


						/* 
						if ($cobros_activos !== false && $cobros_activos !== null) {
							document.getElementById("pagos-cobros-activos").checked = true;
						} else {
							document.getElementById("pagos-cobros-activos").checked = false;
						}
						*/
					},error:function (errrorData){
						console.log("Error en la consula");
					}
				});
			}

			/*  Carga el modal para dar de baja / alta una inscripción */
			function mimodaleditarbajayalta(idinscripcion) {
				var form_data = {
					debug: "true",
					form_id: "inscripciones_cargar_estado_inscripcion",
					idinscripcion: idinscripcion
				};

				$('#inscripciones-dar-baja-alta-form-idinscripcion').val(idinscripcion);

				$.ajax({
					type: "POST",
					url: "?r=ajax/dispatcher",
					data: form_data,
					dataType: "json",
					success: function (data)
					{
						console.log("Recuperamos la inscripción");
						console.log(data);
						$estado_inscripcion = data.estado_inscripcion;
						if( $estado_inscripcion === "1" ) {

							document.getElementById("estado-inscripcion-alta-baja").checked = true;
						}
						else{
							document.getElementById("estado-inscripcion-alta-baja").checked = false;
						}
					}
				});
			}

			$('document').ready(function () {

				// Datatable
				$('#inscripciones-listado-datatable').DataTable({
					"lengthMenu": [[50, 100, -1], [50, 100, "All"]],
					"order": [[1, "desc"]],
					"dom": '<"toolbar">frtip',
					"scrollX" : true,
					"paging": false,
					language: {
						"search": "",
						"searchPlaceholder": "Buscar",
						"lengthMenu": "Mostrando _MENU_ inscripciones por página",
						"zeroRecords": "No hemos encontrado inscripciones",
						"info": false,
						"bPaginate": false
					}
				});

				// Activar tooltips
				$(function () {
					$('[data-toggle="tooltip"]').tooltip()
				})

				/*  Operación del Modal: Editar cuenta bancaria*/
				$('#editar-cuenta-form').validate({
					submitHandler: function () {
						var form_data = {
							debug: "true",
							form_id: "inscripciones_editar_cuenta_patronato",
							idinscripcion: $('#editar-cuenta-idinscripcion').val(),
							datos_iban: $('#editar-cuenta-iban').val(),
							datos_entidad: $('#editar-cuenta-entidad').val(),
							datos_oficina: $('#editar-cuenta-oficina').val(),
							datos_dc: $('#editar-cuenta-dc').val(),
							datos_cuenta: $('#editar-cuenta-cuenta').val()
						};

						$.ajax({
							type: "POST",
							url: "?r=ajax/dispatcherPatronato",
							data: form_data,
							dataType: "json",
							success: function (data) {

								if (data["response"] === "error_cuenta") {
									$("input[name='iban']").attr('style', 'border: 3px solid red !important');
									$("input[name='entidad']").attr('style', 'border: 3px solid red !important');
									$("input[name='oficina']").attr('style', 'border: 3px solid red !important');
									$("input[name='dc']").attr('style', 'border: 3px solid red !important');
									$("input[name='cuenta']").attr('style', 'border: 3px solid red !important');
									if ($("#cuenta-error").length === 0) {
										$('#editar-cuenta-cuenta').after('<p id="cuenta-error" style="color:red;margin-left:10px;font-weight:bold;">* La Cuenta Bancaria NO es Válida.</p>');
									}
									document.getElementById("editar-cuenta-cuenta").focus();
								}
								if (data["response"] === "success") {

									$("input[name='iban']").attr('style', 'border: 1px solid #ccc;');
									$("input[name='entidad']").attr('style', 'border: 1px solid #ccc;');
									$("input[name='oficina']").attr('style', 'border: 1px solid #ccc;');
									$("input[name='dc']").attr('style', 'border: 1px solid #ccc;');
									$("input[name='cuenta']").attr('style', 'border: 1px solid #ccc;');

									$('#cuenta-error').remove();

									$("#editar-cuenta-form-respuesta").html("<div class='alert alert-success'>" + data.message + "</div>");
									$("#editar-cuenta-form-respuesta").fadeTo(2000, 500).slideUp(500, function () {
										$("#pagos-anyadir-respuesta").slideUp(500);
									});
								}

							}
						});

						return false;
					}
				});

				/*  Operación del Modal: Editar estado de la inscripcion (alta / baja) */
				$('#inscripciones-dar-baja-alta-form').validate({
					submitHandler: function(){
						var form_data = {
							debug:                      "true",
							form_id:                    "inscripciones_patronato_estado_inscripcion",
							idinscripcion:              $('#inscripciones-dar-baja-alta-form-idinscripcion').val(),
							nuevo_estado_inscripcion:   $('#estado-inscripcion-alta-baja').is(":checked")
						};

						$.ajax({
							type: "POST",
							url: "?r=ajax/dispatcherPatronato",
							data: form_data,
							dataType: "json",
							success: function(data){
								if(data["response"] === "success"){
									$("#inscripciones-dar-baja-alta-form-respuesta").html("<div class='alert alert-success'>" + data.message + "</div>");
									$("#inscripciones-dar-baja-alta-form-respuesta").fadeTo(2000, 500).slideUp(500, function () {
										$("#inscripciones-dar-baja-alta-form-respuesta").slideUp(500);
									});
								} 
								else{
									$("#inscripciones-dar-baja-alta-form-respuesta").html("<div class='alert alert-danger'>" + data.message + "</div>");
									$("#inscripciones-dar-baja-alta-form-respuesta").fadeTo(2000, 500).slideUp(500, function () {
										$("#inscripciones-dar-baja-alta-form-respuesta").slideUp(500);
									});
								}
							}
						});

						return false;
					}
				});
			
				/*  Operación del Modal: pagos-trimestrales-form */
				$('#pagos-trimestrales-form').validate({
					submitHandler: function() {
						
						
						var form_data = {
							debug: "true",
							form_id: "inscripciones_pagos_trimestrales_patronato",
							idinscripcion: $('#pagos-trimestrales-idinscripcion').val(),
							reserva: $('#pagos-reserva').val(),
							matricula: $('#pagos-matricula').val(),
							pendiente_matricula: $('#pagos-pendiente-matricula').val(),
							total_inscripcion: $('#pagos-total-inscripcion').val(),
							total_pendiente: $('#pagos-total-pendiente').val(),
							trimestre_enero: $('#pagos-trimestre-enero').val(),
							trimestre_abril: $('#pagos-trimestre-abril').val(),
							trimestre_noviembre: $('#pagos-trimestre-noviembre').val(),
							dni_titular: $('#dni-titular').val(),
							pagado_enero: document.getElementById('pagos-pagado-enero').checked,
							pagado_abril: document.getElementById('pagos-pagado-abril').checked,
							pagado_noviembre: document.getElementById('pagos-pagado-noviembre').checked,
							pagado_matricula: document.getElementById('pagos-pagado-matricula').checked,
							pagado_pendiente_matricula: document.getElementById('pagos-pagado-pendiente-matricula').checked,
							generar_xml_noviembre:      $('#generar-xml-noviembre').is(":checked"),
							generar_xml_enero:          $('#generar-xml-enero').is(":checked"),
							generar_xml_abril:          $('#generar-xml-abril').is(":checked")
						};

						$.ajax({
							type: "POST",
							url: "?r=ajax/dispatcherPatronato",
							data: form_data,
							dataType: "json",
							success: function (data) {
								if (data["response"] === "success") {
									$("#pagos-trimestrales-form-respuesta").html("<div class='alert alert-success'>" + data.message + "</div>");
									$("#pagos-trimestrales-form-respuesta").fadeTo(2000, 500).slideUp(500, function () {
										$("#pagos-anyadir-respuesta").slideUp(500);
									});
								} else {
									$("#pagos-trimestrales-form-respuesta").html("<div class='alert alert-danger'>" + data.message + "</div>");
									$("#pagos-trimestrales-form-respuesta").fadeTo(2000, 500).slideUp(500, function () {
										$("#pagos-anyadir-respuesta").slideUp(500);
									});
								}

							}
						});

						return false;
					}
				});

				/*  pagos-trimestrales-form. Al asignar un pago de un trimestre, se desactiva la casilla para que este se incluya en el XML*/
				$('#pagos-pagado-noviembre').on('click', function(){
					if(document.getElementById("pagos-pagado-noviembre").checked){
						document.getElementById("generar-xml-noviembre").checked = false;
					}
					else{
						document.getElementById("generar-xml-noviembre").checked = true;
					}
				});


				$('#pagos-pagado-enero').on('click', function(){
					if(document.getElementById("pagos-pagado-enero").checked){
						document.getElementById("generar-xml-enero").checked = false;
					}
					else{
						document.getElementById("generar-xml-enero").checked = true;
					}
				});
				$('#pagos-pagado-abril').on('click', function(){
					if(document.getElementById("pagos-pagado-abril").checked){
						document.getElementById("generar-xml-abril").checked = false;
					}
					else{
						document.getElementById("generar-xml-abril").checked = true;
					}
					});
				/*  pagos-trimestrales-form. Al marcar un trimestre para que se genere el cargo en el XML, se desactiva el pago */
				$('#generar-xml-noviembre').on('click', function(){
					if(document.getElementById("generar-xml-noviembre").checked){
						document.getElementById("pagos-pagado-noviembre").checked = false;
					}
					else{
						document.getElementById("pagos-pagado-noviembre").checked = true;
					}
				});
				$('#generar-xml-enero').on('click', function(){
					if(document.getElementById("generar-xml-enero").checked){
						document.getElementById("pagos-pagado-enero").checked = false;
					}
					else{
						document.getElementById("pagos-pagado-enero").checked = true;
					}
				});
				$('#generar-xml-abril').on('click', function(){
					if(document.getElementById("generar-xml-abril").checked){
						document.getElementById("pagos-pagado-abril").checked = false;
					}
					else{
						document.getElementById("pagos-pagado-abril").checked = true;
					}
				});
			});

			/*  Domiciliaciones. Obtener cuentas bancarias incorrectas */
			$("#cargar-cuentas-bancarias-incorrectas-launcher").on('click',function(){
				var form_data = {
					debug:    "true",
					form_id:  "domiciliaciones_patronato_cargar_cuentas_bancarias_incorrectas"
				};

				$.ajax({
					type: "POST",
					url: "?r=ajax/dispatcherPatronato",
					data: form_data,
					dataType: "json",
					success: function(data){
						$('#cargar-cuentas-bancarias-incorrectas-contenido').html(data.contenido_tabla_patronato_cuenta_bancaria);
					}
				});
			});

			/* Domiciliaciones Trimestrales Patronato. */
			$("#domiciliaciones-form-patronato-xml").on('click',function () {
				var enlaceDomiciliacionTrimestralPatronato = "";

				var form_data = {
					debug: "true",
					form_id:            "domiciliaciones_trimestrales_patronato",
					trimestre:          $('#domiciliaciones-form-patronato-xml-trimestre :selected').val(),
					idDomiciliacion:    $('#domiciliaciones-form-patronato-xml').val()
				};
				
				$.ajax({
					type: "POST",
					url: "?r=ajax/dispatcherPatronato",
					data: form_data,
					dataType: "json",
					success: function (data) {
						if (data["response"] === "ok") {

							enlaceDomiciliacionTrimestralPatronato = 'public/Domiciliacion Trimestral Patronato ' + data.trimestre + ' ' + data.anyo_actual + '.xml';

							$("#domiciliation-message").html("<div class='alert alert-success'>" + data.message + "</div>").fadeTo(3000, 5000).slideUp(500, function () {
								$("#domiciliation-message").slideUp(500);
							});

							$("#download-xml").html('<a id="enlace_domiciliacion" href="" class="btn btn-success" download>Descargar Archivo XML</a>');
							document.getElementById("enlace_domiciliacion").href = enlaceDomiciliacionTrimestralPatronato;
						} else if (data["response"] === "ok2") {
							$("#domiciliation-message").html("<div class='alert alert-warning' style='margin-top:50px;'>" + data.message + "</div>").fadeTo(3000, 5000).slideUp(500, function () {
								$("#domiciliation-message").slideUp(500);
							});
						} else {
							$("#domiciliation-message").html("<div class='alert alert-warning'>" + data.message + "</div>").fadeTo(3000, 5000).slideUp(500, function () {
								$("#domiciliation-message").slideUp(500);
							});
						}
					}
				});
			});

			$("#domiciliaciones-matricula-form-xml").on('click', function () {

				var enlaceDomiciliacionMatriculaPatronato = "";

				var form_data = {
					debug: "true",
					form_id: "domiciliaciones_matricula_patronato",
					idDomiciliacion: $('#domiciliaciones-matricula-form-xml').val()
				};
				$.ajax({
					type: "POST",
					url: "?r=ajax/dispatcherPatronato",
					data: form_data,
					dataType: "json",
					success: function (data) {
						if (data["response"] === "ok") {

							enlaceDomiciliacionMatriculaPatronato = 'public/Domiciliacion Matriculas Patronato ' + data.anyo_actual + '.xml';

							$("#domiciliation-matricula-message").html("<div class='alert alert-success'>" + data.message + "</div>").fadeTo(3000, 5000).slideUp(500, function () {
								$("#domiciliation-matricula-message").slideUp(500);
							});

							$("#download-matricula-xml").html('<a id="enlace_domiciliacion_matricula_patronato" href="" class="btn btn-success" download>Descargar Archivo XML</a>');
							document.getElementById("enlace_domiciliacion_matricula_patronato").href = enlaceDomiciliacionMatriculaPatronato;
						} else if (data["response"] === "ok2") {
							$("#domiciliation-matricula-message").html("<div class='alert alert-warning' style='margin-top:50px;'>" + data.message + "</div>").fadeTo(3000, 5000).slideUp(500, function () {
								$("#domiciliation-matricula-message").slideUp(500);
							});
						} else {
							$("#domiciliation-matricula-message").html("<div class='alert alert-warning'>" + data.message + "</div>").fadeTo(3000, 5000).slideUp(500, function () {
								$("#domiciliation-matricula-message").slideUp(500);
							});
						}

					}
				});
			});

			$("#consultar-pagos").on('click',function () {
				alert("dfg");
				var form_data = {
					debug: "true",
					form_id: "consultar_pagos_form",
					idDomiciliacion: $('#domiciliaciones-matricula-form-xml').val()
				};
				$.ajax({
					type: "POST",
					url: "?r=login/consultarpagos",
					data: form_data,
					dataType: "json",
					success: function (data) {
						if (data["response"] === "ok") {
							// $("#domiciliation-matricula-message").html("<div class='alert alert-success'>" + data.message + "</div>").fadeTo(3000, 5000).slideUp(500,function(){
							//     $("#domiciliation-matricula-message").slideUp(500);
							// });
							// $("#download-matricula-xml").html("<a href='DomiciliacionMatriculas.xml' class='btn btn-success' download>Descargar Archivo XML</a>");
							var error_input_dni = document.querySelector("#passcode");
						}
					}
				});
			});
		</script>
	</body>
</html>