<!DOCTYPE html>
<html lang="es">
	<?php
		require "includes/head_back.php";

		if ($filtrado == "1") {
			echo("1");
			$inscripciones = $pagosFecha = 'btn-empresas-desactivo';
			$otrasConsultas = 'btn-empresas-activo';
			$visibleInscripciones = 'none';
			$visiblePagosPorFecha = 'none';
			$visibleConsultarPagos = 'none';
			$displayResultados = 'visible';
		} elseif ($filtrado == "2") {
			echo("2");
			$inscripciones = $pagosFecha = 'btn-empresas-desactivo';
			$otrasConsultas = 'btn-empresas-activo';
			$visibleInscripciones = 'none';
			$visiblePagosPorFecha = 'none';
			$visibleConsultarPagos = 'none';
			$displayResultados = 'visible';
		} elseif ($filtrado == "4") {
			echo("4");
			$inscripciones = $pagosFecha = 'btn-empresas-desactivo';
			$otrasConsultas = 'btn-empresas-activo';
			$visibleInscripciones = 'none';
			$visiblePagosPorFecha = 'none';
			$visibleOtrasConsultas = 'visible';
			$visibleConsultarPagos = 'visible';
			$displayResultados = 'none';
		} else {
			$inscripciones = $otrasConsultas = 'btn-empresas-desactivo';
			$pagosFecha = 'btn-empresas-activo';
			$visibleInscripciones = 'none';
			$visiblePagosPorFecha = 'visible';
			$visibleOtrasConsultas = 'none';
			$visibleConsultarPagos = 'none';
			$displayResultados = 'visible';
		}
	?>

	<style>
		.table>thead>tr>th,
		.table>tbody>tr>th,
		.table>tfoot>tr>th,
		.table>thead>tr>td,
		.table>tbody>tr>td,
		.table>tfoot>tr>td {
			padding: 6px;
		}

		.switch {
			position: relative;
			display: inline-block;
			width: 60px;
			height: 34px;
		}

		.switch input {
			opacity: 0;
			width: 0;
			height: 0;
		}

		.slider {
			position: absolute;
			cursor: pointer;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			background-color: #ccc;
			-webkit-transition: .4s;
			transition: .4s;
		}

		.slider:before {
			position: absolute;
			content: "";
			height: 26px;
			width: 26px;
			left: 4px;
			bottom: 4px;
			background-color: white;
			-webkit-transition: .4s;
			transition: .4s;
		}

		input:checked + .slider {
			background-color: #eb7c00 !important;
		}

		input:focus + .slider {
			box-shadow: 0 0 1px #eb7c00 !important;
		}

		input:checked + .slider:before {
			-webkit-transform: translateX(26px);
			-ms-transform: translateX(26px);
			transform: translateX(26px);
		}

		/* Rounded sliders */
		.slider.round {
			border-radius: 34px;
		}

		.slider.round:before {
			border-radius: 50%;
		}

		.alinear-izquierda {
			padding-left: 0 !important;
		}

		.trimestres {
			margin-top: 5px !important;
		}
	</style>

	<body>
		<!-- <script src="backmeans/assets/js/jquery.js"></script> -->
		<?php require "includes/topbar_back.php"; ?>

		<div class="canvas">
			<div id="content">
				<div id="page-content">
					<div class="page-contacts-block">
						<div class="container-fluid">
							<div class="row">
								<div class="col-12 text-center">
									<h2 class="section-title mt-0 mb-0" style="color: #406da4;">
										<i class="fa fa-search" aria-hidden="true" style="margin-right: 10px;"></i><b>Consultas Patronato</b>
									</h2>
								</div>

								<div id="div-3" class="col-12 mt-2">
									<!-- DOMICILIACIONES. GENERAR XML -->
									<div class="panel panel-default">
										<a data-toggle="collapse" data-parent="#accordion1" href="#10" style="text-decoration: none;">
											<div class="panel-heading">
												<h4 class="panel-title">
													<i class="fa fa-plus-circle"></i>
													DOMICILIACIONES: GENERAR XML TRIMESTRALES Y CONFIRMAR PAGOS TRAS EL ENV??O AL BANCO
													<i class="fa fa-angle-down" style="float: right;"></i>
												</h4>
											</div>
										</a>
										<div id="10" class="panel-collapse collapse">
											<div class="panel-body" style="padding-top: 0px;">
												<div class="contact-form-wrapper">
													<!-- INICIO FORM GENERAR PDF -->
													<form action="?r=patronato/ExportToExcelConsultasEscuelaCantera" method="post">
														<div class="row mt-2">
															<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
																<h4 class="mt-0 pb-0 mb-0">Selecciona el trimestre que deseas gestionar:</h4>
															</div>

															<div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
																<div class="input-group" style="width: 100%;">
																	<select id="domiciliaciones-form-xml-trimestre" name="domiciliaciones_form_xml_trimestre" class="form-control" style="width: 100%;" required>
																		<option value="">Seleccionar</option>
																		<option value="noviembre">XML de Noviembre 2018</option>
																		<option value="enero">XML de Enero 2019</option>
																		<option value="abril">XML de Abril 2019</option>
																	</select>
																</div>
															</div>
														</div>
														
														<div class="row">
															<hr>
															<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
																<h4 id="domiciliaciones-form-xml-generar-titulo" class="mt-0 pb-0 mb-0">Inscripciones pendientes de pago:</h4>
															</div>

															<div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 mt-0">                                                            
																<button type="submit" id="export_data_inscripciones_cantera_consultas" name='export_data_inscripciones_cantera_consultas' value="Export to excel" class="btn btn-info mb-1">Generar XML</button>
																
															</div>
															
															<div id="download-xml" class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3"></div>
															
															<div class="col-12 mt-1">
																<div class="card-footer text-muted" id="domiciliation-message"></div>
															</div>
														</div>
													</form>
													<!--FINAL FORM GENERAR PDF-->
													
													<div class="row">
														<hr>
														<div class="col-12 mb-2">
															<h4 class="mt-0 pb-0 mb-0">Hay cargos que ya se incluyeron en ficheros y a??n no se han confirmado:</h4>
														</div>

														<div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
															<button type="submit" class="btn btn-success btn-block" id="domiciliaciones-form-xml-confirmar-cargos">
																<span>CONFIRMAR ENV??O DE CARGOS EN XML</span>
															</button>
															<p class="mt-1 text-justify">Al confirmar el env??o del XML, se indica que la subida del XML al banco fue correcta para las inscripciones seleccionadas.</p>
														</div>

														<div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
															<button type="submit" class="btn btn-danger btn-block" id="domiciliaciones-form-xml-anular-cargos">
																<span>ANULAR XML GENERADO</span>
															</button>
															<p class="mt-1 text-justify">Al anular el XML generado, se indica que el env??o del XML al banco no sali?? bien para las inscripciones seleccionadas.</p>
															<p class="mt-1 text-justify">As??, se eliminamos el pago del trimestre en cada inscripci??n del XML y se incluir??n en la futura generaci??n de XML.</p>
														</div>

														<div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
															<button type="submit" class="btn btn-warning btn-block" id="domiciliaciones-form-xml-seleccionar-cargos">
																<span>SELECCIONAR TODAS LAS INSCRIPCIONES</span>
															</button>
														</div>
													</div>
														
													<div class="row">
														<hr>
														<div class="col-12 mb-2">
															<h4 class="mt-0 pb-0 mb-0">Pagos incluidos en XML, cuyo env??o al banco correcto, a??n no se ha confirmado:</h4>
														</div>
														
														<div class="col-12 mb-2">
															<table id="inscripciones-cobros-activos-por-confirmar" class="table w-100">
																<thead class="table-dark">
																	<tr>
																		<th>N??mero pedido</th>
																		<th>DNI</th>
																		<th>Nombre</th>
																		<th>Email</th>
																		<th>Cobro activo</th>
																		<th>Pagado</th>
																		<th>Seleccionar</th>
																	</tr>
																</thead>
																<tbody>
																	<tr>
																		<td class="text-center" colspan="7">No hay pagos por confirmar que hayan sido incluidos en ficheros XML</td>
																	</tr>
																</tbody>
															</table>
														</div>
													</div>
													
													<div class="card-footer text-muted" id="domiciliation-message"></div>
													
												</div>
											</div>
										</div>
									</div>
									
									<!-- DOMICILIACIONES MATR??CULAS. GENERAR XML -->
									<div class="panel panel-default">
										<a data-toggle="collapse" data-parent="#accordion1" href="#9" style="text-decoration: none;">
											<div class="panel-heading">
												<h4 class="panel-title">
													<i class="fa fa-plus-circle"></i>
													DOMICILIACIONES MATR??CULAS. GENERAR XML
													<i class="fa fa-angle-down" style="float: right;"></i>
												</h4>
											</div>
										</a>
										<div id="9" class="panel-collapse collapse">
											<div class="panel-body">
												<div class="contact-form-wrapper">
													<br>
													<div class="form-group">
														<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
															<button type="submit" class="btn btn-primary btn-block" id="domiciliaciones-matricula-form-xml">
																<span>Generar XML</span>
															</button>
														</div>
														<div id="download-matricula-xml"></div>
													</div>
													<div class="card-footer text-muted" id="domiciliation-matricula-message"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php require "includes/topbar_back.php"; ?>

		<!-- Modal Ver Inscripcion completa -->
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

		<!-- Modal Editar Cuenta Bancaria -->
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
									<input id="dni-titular" type="hidden" value=""/>
									
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
									
									<!-- DATOS MATR??CULA -->
									<div class="form-row" style="margin-top: 5px;">
										<label>MATR??CULA:</label>
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
									
									<!-- DATOS PENDIENTE MATR??CULA -->
									<div class="form-row">
										<label>PENDIENTE MATR??CULA:</label>
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
									
									<!-- TOTAL INSCRIPCI??N -->
									<div class="form-row">
										<label>TOTAL INSCRIPCI??N:</label>
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
										<p class="mb-0">Para registrar el pago de un trimestre, m??rquelo y guarde los cambios.</p>
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
										<h4 class="mt-0 mb-0 pb-0"><strong>INCLUIR CARGO EN LA GENERACI??N DE XML</strong></h4>
										<p class="mb-0">Marcando el trimestre, se incluir?? en el XML de cargos correspondiente cuando este se genere.</p>
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
		<script type="text/javascript"
				src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.16/af-2.2.2/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/cr-1.4.1/fc-3.2.4/fh-3.1.3/kt-2.3.2/r-2.2.1/rg-1.0.2/rr-1.2.3/sc-1.4.4/sl-1.2.5/datatables.min.js"></script>

		<!-- JQuery Validation. https://jqueryvalidation.org/ -->
		<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/additional-methods.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/additional-methods.min.js"></script>


		<script>
			function setTwoNumberDecimal(event){
					this.value = parseFloat(this.value).toFixed(2);
				}

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
						$('#dni-titular').val(data.dni_titular);
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
					}
				});
			}

			/*  Carga el modal para dar de baja / alta una inscripci??n */
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
						console.log("Recuperamos la inscripci??n");
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

				/*  Operaci??n del Modal: Editar cuenta bancaria*/
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
										$('#editar-cuenta-cuenta').after('<p id="cuenta-error" style="color:red;margin-left:10px;font-weight:bold;">* La Cuenta Bancaria NO es V??lida.</p>');
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

				/*  Operaci??n del Modal: Editar estado de la inscripcion (alta / baja) */
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
			
				/*  Operaci??n del Modal: pagos-trimestrales-form */
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
			/*XMLS*/
			// Rellenar la tabla al seleccionar en el select
				$('#domiciliaciones-form-xml-trimestre').on('change', function(){
					var form_data = {
						debug:      "false",
						form_id:    "inscripciones_cargar_inscripciones_anyadidas_xml_por_confirmar_envio_banco",
						trimestre:  $("#domiciliaciones-form-xml-trimestre").val()
					};

					$.ajax({
						type: "POST",
						url: "?r=ajax/dispatcher",
						data: form_data,
						dataType: "json",
						success: function(data){
							$('#domiciliaciones-form-xml-generar-titulo').html("Inscripciones pendientes de pago: "+data.numero_cargos_a_generar);
							$('#inscripciones-cobros-activos-por-confirmar tbody').html(data.contenido_tabla);
						}
					});
				});

			//  boton "confirma envio cargos en xml"
				$('#domiciliaciones-form-xml-confirmar-cargos').on('click', function(){
					var selected = [];
					$("#inscripciones-cobros-activos-por-confirmar input:checked").each(function(){
						selected.push($(this).attr('value'));
					});
					
					var form_data = {
						debug:              "true",
						form_id:            "inscripciones_confirmar_pagos_xml",
						trimestre:          $("#domiciliaciones-form-xml-trimestre").val(),
						selected_id_fip:    selected
					};

					$.ajax({
						type: "POST",
						url: "?r=ajax/dispatcher",
						data: form_data,
						dataType: "json",
						success: function(data){
							$('#inscripciones-cobros-activos-por-confirmar tbody').html("<tr><td class=\"t-center\" colspan=\"7\">Seleccione otro trimestre para realizar nuevas actualizaciones</td></tr>");
							$("#domiciliation-message").html("<div class='alert alert-success'>" + data.message + "</div>").fadeTo(3000, 5000).slideUp(500, function(){
								$("#domiciliation-message").slideUp(500);
							});
						}
					});
				});
		
			//  Anular cargos que se incluyeron en XML
				$('#domiciliaciones-form-xml-anular-cargos').on('click', function(){
					var selected = [];
					$("#inscripciones-cobros-activos-por-confirmar input:checked").each(function(){
						selected.push($(this).attr('value'));
					});
					
					var form_data = {
						debug:              "true",
						form_id:            "inscripciones_anular_pagos_xml",
						trimestre:          $("#domiciliaciones-form-xml-trimestre").val(),
						selected_id_fip:    selected
					};

					$.ajax({
						type: "POST",
						url: "?r=ajax/dispatcher",
						data: form_data,
						dataType: "json",
						success: function(data){
							$('#inscripciones-cobros-activos-por-confirmar tbody').html("<tr><td class=\"t-center\" colspan=\"7\">Seleccione otro trimestre para realizar nuevas actualizaciones</td></tr>");
							$("#domiciliation-message").html("<div class='alert alert-success'>" + data.message + "</div>").fadeTo(3000, 5000).slideUp(500, function () {
								$("#domiciliation-message").slideUp(500);
							});
						}
					});
				});
			 
			//  Seleccionar todos los cargos a confirmar o anular
				$('#domiciliaciones-form-xml-seleccionar-cargos').on('click', function(){
					$(".inscripciones-cobro-activo-checkbox").prop('checked', true);
				});   

			//  Confirmar cargos que se incluyeron en XML
				$('#domiciliaciones-form-xml-confirmar-cargos').on('click', function(){
					var selected = [];
					$("#inscripciones-cobros-activos-por-confirmar input:checked").each(function(){
						selected.push($(this).attr('value'));
					});
					
					var form_data = {
						debug:              "true",
						form_id:            "inscripciones_confirmar_pagos_xml",
						trimestre:          $("#domiciliaciones-form-xml-trimestre").val(),
						selected_id_fip:    selected
					};

					$.ajax({
						type: "POST",
						url: "?r=ajax/dispatcher",
						data: form_data,
						dataType: "json",
						success: function(data){
							$('#inscripciones-cobros-activos-por-confirmar tbody').html("<tr><td class=\"t-center\" colspan=\"7\">Seleccione otro trimestre para realizar nuevas actualizaciones</td></tr>");
							$("#domiciliation-message").html("<div class='alert alert-success'>" + data.message + "</div>").fadeTo(3000, 5000).slideUp(500, function(){
								$("#domiciliation-message").slideUp(500);
							});
						}
					});
				});

			/* Domiciliaciones Trimestrales Inscripciones. Generaci??n de XML. */
				$("#domiciliaciones-form-xml").on('click',function() {

					var enlaceDomiciliacionTrimestralInscripciones = "";

					var form_data = {
						debug:              "false",
						form_id:            "domiciliaciones_trimestrales_inscripciones",
						trimestre:          $('#domiciliaciones-form-xml-trimestre :selected').val(),
						idDomiciliacion:    $('#domiciliaciones-form-xml').val()
					};
					
					$.ajax({
						type: "POST",
						url: "?r=ajax/dispatcher",
						data: form_data,
						//dataType: "json",
						success: function (data) {
						   /* if (data["response"] === "ok") {

								enlaceDomiciliacionTrimestralInscripciones = 'public/Domiciliacion Trimestral ' + data.trimestre + ' ' + data.anyo_actual + '.xml';
								$("#domiciliation-message").html("<div class='alert alert-success'>" + data.message + "</div>").fadeTo(3000, 5000).slideUp(500, function () {
									$("#domiciliation-message").slideUp(500);
								});
								$("#download-xml").html('<a id="enlace_domiciliacion" href="" class="btn btn-success" download>Descargar Archivo XML</a>');
								document.getElementById("enlace_domiciliacion").href = enlaceDomiciliacionTrimestralInscripciones;

							} else if (data["response"] === "ok2") {
								$("#domiciliation-message").html("<div class='alert alert-warning' style='margin-top:50px;'>" + data.message + "</div>").fadeTo(3000, 5000).slideUp(500, function () {
									$("#domiciliation-message").slideUp(500);
								});
							} else {
								$("#domiciliation-message").html("<div class='alert alert-warning'>" + data.message + "</div>").fadeTo(3000, 5000).slideUp(500, function () {
									$("#domiciliation-message").slideUp(500);
								});
							}*/
							console.log("entramos en el success");

						}, error:function(e){
							console.log("Error en el ajax");
						}
					});
				});
		</script>
	</body>
</html>