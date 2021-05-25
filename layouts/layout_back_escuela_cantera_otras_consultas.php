<!DOCTYPE html>
<html lang="es">
	<?php
		require "includes/head_back.php";

		if ($filtrado == "1") {
			$inscripciones = $pagosFecha = 'btn-empresas-desactivo';
			$otrasConsultas = 'btn-empresas-activo';
			$visibleInscripciones = 'none';
			$visiblePagosPorFecha = 'none';
			$visibleConsultarPagos = 'none';
			$displayResultados = 'visible';
		} 
		elseif ($filtrado == "2")
		{
			$inscripciones = $pagosFecha = 'btn-empresas-desactivo';
			$otrasConsultas = 'btn-empresas-activo';
			$visibleInscripciones = 'none';
			$visiblePagosPorFecha = 'none';
			$visibleOtrasConsultas = 'visible';
			$visibleConsultarPagos = 'none';
			$displayResultados = 'visible';
		} 
		elseif ($filtrado == "4") {
			$inscripciones = $pagosFecha = 'btn-empresas-desactivo';
			$otrasConsultas = 'btn-empresas-activo';
			$visibleInscripciones = 'none';
			$visiblePagosPorFecha = 'none';
			$visibleOtrasConsultas = 'visible';
			$visibleConsultarPagos = 'none';
			$displayResultados = 'none';
		} 
		elseif ($filtrado == "5") {
			$pagosFecha = $otrasConsultas = 'btn-empresas-desactivo';
			$inscripciones = 'btn-empresas-activo';
			$visibleInscripciones = 'visible';
			$visiblePagosPorFecha = 'none';
			$visibleOtrasConsultas = 'none';
			$visibleConsultarPagos = 'none';
			$displayResultados = 'none';
		} 
		else {
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
		<?php require "includes/topbar_back.php"; ?>

		<div class="canvas">
			<div id="content">
				<div id="page-content">
					<div class="page-contacts-block">
						<div class="container-fluid">
							<div class="row">
								<div class="col-12 text-center">
									<h2 class="section-title mt-0 mb-0" style="color: #406da4;">
										<i class="fa fa-search" aria-hidden="true" style="margin-right: 10px;"></i><b>Consultas Escuela y Cantera</b>
									</h2>
								</div>

								<div id="div-3" class="col-12 mt-2">
									<!-- DOMICILIACIONES MATRÍCULAS. GENERAR XML 2019 / 2020 -->
									<div class="panel panel-default">
										<a data-toggle="collapse" data-parent="#accordion2matriculas" href="#panelbody12" style="text-decoration: none;">
											<div class="panel-heading">
												<h4 class="panel-title">
													<i class="fa fa-plus-circle"></i>
													DOMICILIACIONES MATRÍCULAS 2019 / 2020: GENERAR XML
													<i class="fa fa-angle-down" style="float: right;"></i>
												</h4>
											</div>
										</a>
										<div id="panelbody12" class="panel-collapse collapse">
											<div class="panel-body">

												<!-- 1. Selección de equipo o equipos y generación de XML  -->
												<form id="domiciliaciones-xml-2019-2020-matricula-form" method="post">
													<div class="row mt-1 pt-1 pb-1 pl-1 pr-1 ml-1 mr-1">
														<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
															<label for="domiciliaciones-xml-2019-2020-matricula-equipo">Elija un equipo en concreto o todos los equipos:</label>
														</div>
														<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
															<select class="form-control inputForm valid" id="domiciliaciones-xml-2019-2020-matricula-equipo" 
																	name="domiciliaciones-xml-2019-2020-matricula-equipo">
																<option value="">Seleccionar</option>
																<option value="todos">Todos los equipos</option>
																<?php
																	foreach ($datos['equipos'] as $equipo)
																	{
																		echo "<option value='" . $equipo["ID"] . "'>" . $equipo["equipo"] ."  (".$equipo["tipo"].")</option>";
																	}
																?>
															</select>
														</div>
														<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
															<button type="submit" class="btn btn-primary btn-block" id="domiciliaciones-xml-2019-2020-matricula-button">
																<span>Generar XML</span>
															</button>
														</div>
														<div id="domiciliaciones-xml-2019-2020-matricula-link-descarga"></div>
													</div>
												</form>

													<!-- 2. Listado de jugadores con el pago en XML generado pero están pendientes de confirmar o de anular
															CONFIRMAR   indica que el XML se envió al banco y se procesó bien.
															ANULAR      indica que el XML se envió al banco y falló (ej. alguna cuenta dió error). 
																		Al anular es posible regenerar un nuevo XML cuando se corrija la información incorrecta -->
													<div class="row pl-1 pr-1 ml-1 mr-1">

														<hr>

														<div class="col-12 mb-2">
															<h4 class="mt-0 pb-0 mb-1"><strong>Listado de cobros incluidos en el XML descargado:</strong></h4>
															<p>- Estos cobros requieren una confirmación para validar que el banco ha procesado el XML sin ningún error.</p>
															<p>- Los cobros también pueden anularse si por ejemplo el XML no se envió al banco o si ocurrió un error al procesarse el fichero. Así, los cobros se incluirán de nuevo en el siguiente XML que se genere.</p>
														</div>

														<div class="col-12 mb-2 w-100">
															<h3><strong>COBROS DE INSCRIPCIONES RECIEN GENERADOS:</strong></h3>
															<table id="inscripciones-cobros-activos-matricula-2019-2020-por-confirmar" class="table w-100" style="min-width:100%;">
																<thead class="table-dark" style="min-width:100%;">
																	<tr style="min-width:100%;">
																		<th class="active">Número pedido</th>
																		<th class="active">DNI Jugador</th>
																		<th class="active">Nombre</th>
																		<th class="active">Equipo</th>
																		<th class="active">DNI_Tutor</th>
																		<th class="active">Email</th>
																		<th class="active">Cobros activo</th>
																		<th class="active">Cantidad</th>
																		<th class="active">Gastos devolución</th>
																		<th class="active">Seleccionar</th>
																	</tr>
																</thead>
																<tbody>
																	<tr><td colspan='10'>No hay cobros activos</td></tr>
																</tbody>
															</table>
														</div>

														<div class="col-12 mb-2 w-100">
															<h3><strong>COBROS GENERADOS ANTERIORMENTE:</strong></h3>
															<table id="inscripciones-cobros-activos-matricula-2019-2020-por-confirmar-anteriores" class="table" style="min-width:100%;width:100% !important;">
																<thead class="table-dark" style="min-width:100%;width:100%;">
																	<tr style="min-width:100%;width:100%;">
																		<th class="active">Número pedido</th>
																		<th class="active">DNI Jugador</th>
																		<th class="active">Nombre</th>
																		<th class="active">Equipo</th>
																		<th class="active">DNI_Tutor</th>
																		<th class="active">Email</th>
																		<th id="thcobroactivo" class="active">Cobros activo</th>
																		<th class="active">Cantidad</th>
																		<th class="active">Gastos devolución</th>
																		<th class="active">Seleccionar</th>
																	</tr>
																</thead>
																<tbody>
																	<?php echo $datos['cobros_activos_matricula'];?>
																</tbody>
															</table>
														</div>
													</div>

													<div class="row pl-1 pr-1 ml-1 mr-1">

														<hr>

														<div class="col-12 mb-2">
															<h4 class="mt-0 pb-0 mb-0"><strong>Anteriormente, se incluyeron cargos en ficheros XML. Estos cargos deben confirmarse si se procesaron correctamente en el banco:</strong></h4>
														</div>

														<div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 pt-1 bg-warning">
															<button type="submit" class="btn btn-warning btn-block" id="domiciliaciones-form-xml-matriculas-2019-2020-seleccionar-cargos">
																<span>SELECCIONAR TODAS LAS INSCRIPCIONES</span>
															</button>
															<p class="mt-1 text-justify">Al pulsar este botón se seleccionarán todas las filas de la tabla superior.</p>
														</div>

														<div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 pt-1 bg-success">
															<button type="submit" class="btn btn-success btn-block" id="domiciliaciones-form-xml-matriculas-2019-2020-confirmar-cargos">
																<span>CONFIRMAR ENVÍO DE CARGOS EN XML</span>
															</button>
															<p class="mt-1 text-justify">Al confirmar el envío del XML, se indica que la subida del XML al banco fue correcta para las inscripciones seleccionadas.</p>
															<p class="mt-1 text-justify">Tras confirmarse las filas seleccionadas, las filas desaparecerán de este listado cuando se refresque la pantalla.</p>
														</div>

														<div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 pt-1 bg-danger">
															<button type="submit" class="btn btn-danger btn-block" id="domiciliaciones-form-xml-matriculas-2019-2020-anular-cargos">
																<span>ANULAR XML GENERADO</span>
															</button>
															<p class="mt-1 text-justify">Al anular el XML generado, se indica que el envío del XML al banco no salió bien para las inscripciones seleccionadas.</p>
															<p class="mt-1 text-justify">Así, se elimina el pago de la mátrícula de la inscripción del XML y esta se incluirá en la futura generación de XML.</p>
															<p class="mt-1 text-justify">Tras anular las filas seleccionadas, las filas desaparecerán de este listado cuando se refresque la pantalla.</p>
														</div>

													</div>

													<div class="card-footer text-muted" id="domiciliaciones-xml-2019-2020-matricula-respuesta"></div>

											</div>
										</div>
									</div>

									<!-- DOMICILIACIONES TRIMESTRE 1    SEPTIEMBRE GENERAR XML 2019 / 2020 -->
									<div class="panel panel-default">
										<a data-toggle="collapse" data-parent="#accordion3trimestre1" href="#panelbody13" style="text-decoration:none;">
											<div class="panel-heading">
												<h4 class="panel-title">
													<i class="fa fa-plus-circle"></i>
													DOMICILIACIONES TRIMESTRE 1 (SEPTIEMBRE - NOVIEMBRE) TEMPORADA 2019 / 2020: GENERAR XML
													<i class="fa fa-angle-down" style="float: right;"></i>
												</h4>
											</div>
										</a>
										<div id="panelbody13" class="panel-collapse collapse">
											<div class="panel-body">

												<!-- 
													1.  Selección de equipo o equipos
													3.  Generación de XML  
												-->
												<form id="domiciliaciones-xml-2019-2020-trimestre1-form" method="post">
													<div class="row mt-1 pt-1 pb-1 pl-1 pr-1 ml-1 mr-1">
														<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
															<label for="domiciliaciones-xml-2019-2020-trimestre1-equipo">
																Elija un equipo en concreto o todos los equipos:
															</label>
														</div>
														<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
															<select class="form-control inputForm valid" id="domiciliaciones-xml-2019-2020-trimestre1-equipo" 
																	name="domiciliaciones-xml-2019-2020-trimestre1-equipo">
																<option value="">Seleccionar</option>
																<option value="todos">Todos los equipos</option>
																<?php
																	foreach ($datos['equipos'] as $equipo)
																	{
																		echo "<option value='" . $equipo["ID"] . "'>" . $equipo["equipo"] ."  (".$equipo["tipo"].")</option>";
																	}
																?>
															</select>
														</div>

														<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
															<button type="submit" class="btn btn-primary btn-block" 
																	id="domiciliaciones-xml-2019-2020-trimestre1-button">
																<span>Generar XML</span>
															</button>
														</div>
														<div id="domiciliaciones-xml-2019-2020-trimestre1-link-descarga"></div>
													</div>
												</form>

													<!-- 2. Listado de jugadores con el pago en XML generado pero están pendientes de confirmar o de anular
															CONFIRMAR   indica que el XML se envió al banco y se procesó bien.
															ANULAR      indica que el XML se envió al banco y falló (ej. alguna cuenta dió error). 
																		Al anular es posible regenerar un nuevo XML cuando se corrija la información incorrecta -->
													<div class="row pl-1 pr-1 ml-1 mr-1">

														<hr>

														<div class="col-12 mb-2">
															<h4 class="mt-0 pb-0 mb-1"><strong>Listado de cobros incluidos en el XML descargado:</strong></h4>
															<p>- Estos cobros requieren una confirmación para validar que el banco ha procesado el XML sin ningún error.</p>
															<p>- Los cobros también pueden anularse si por ejemplo el XML no se envió al banco o si ocurrió un error al procesarse el fichero. Así, los cobros se incluirán de nuevo en el siguiente XML que se genere.</p>
														</div>

														<div class="col-12 mb-2 w-100">
															<h3><strong>COBROS DE INSCRIPCIONES RECIEN GENERADOS:</strong></h3>
															<table id="inscripciones-cobros-activos-trimestre1-2019-2020-por-confirmar" class="table w-100" style="min-width:100%;">
																<thead class="table-dark" style="min-width:100%;">
																	<tr style="min-width:100%;">
																		<th class="active">Número pedido</th>
																		<th class="active">DNI Jugador</th>
																		<th class="active">Nombre</th>
																		<th class="active">Equipo</th>
																		<th class="active">DNI_Tutor</th>
																		<th class="active">Email</th>
																		<th class="active">Cobro activo</th>
																		<th class="active">Cantidad</th>
																		<th class="active">Gastos devolución</th>
																		<th class="active">Seleccionar</th>
																	</tr>
																</thead>
																<tbody>
																	<tr><td colspan='10'>No hay cobros activos</td></tr>
																</tbody>
															</table>
														</div>

														<div class="col-12 mb-2 w-100">
															<h3><strong>COBROS GENERADOS ANTERIORMENTE:</strong></h3>
															<table id="inscripciones-cobros-activos-trimestre1-2019-2020-por-confirmar-anteriores" 
																   class="table" style="min-width:100%;width:100% !important;">
																<thead class="table-dark" style="min-width:100%;width:100%;">
																	<tr style="min-width:100%;width:100%;">
																		<th class="active">Número pedido</th>
																		<th class="active">DNI Jugador</th>
																		<th class="active">Nombre</th>
																		<th class="active">Equipo</th>
																		<th class="active">DNI_Tutor</th>
																		<th class="active">Email</th>
																		<th id="thcobroactivo" class="active">Cobro activo</th>
																		<th class="active">Cantidad</th>
																		<th class="active">Gastos devolución</th>
																		<th class="active">Seleccionar</th>
																	</tr>
																</thead>
																<tbody>
																	<tr><td colspan='10'><?php echo $datos['cobros_activos_trimestre_1'];?></td></tr>
																</tbody>
															</table>
														</div>
													</div>

													<div class="row pl-1 pr-1 ml-1 mr-1">

														<hr>

														<div class="col-12 mb-2">
															<h4 class="mt-0 pb-0 mb-0"><strong>Anteriormente, se incluyeron cargos en ficheros XML. Estos cargos deben confirmarse si se procesaron correctamente en el banco:</strong></h4>
														</div>

														<div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 pt-1 bg-warning">
															<button type="submit" class="btn btn-warning btn-block" id="domiciliaciones-form-xml-trimestre1-2019-2020-seleccionar-cargos">
																<span>SELECCIONAR TODAS LAS INSCRIPCIONES</span>
															</button>
															<p class="mt-1 text-justify">Al pulsar este botón se seleccionarán todas las filas de la tabla superior.</p>
														</div>

														<div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 pt-1 bg-success">
															<button type="submit" class="btn btn-success btn-block" id="domiciliaciones-form-xml-trimestre1-2019-2020-confirmar-cargos">
																<span>CONFIRMAR ENVÍO DE CARGOS EN XML</span>
															</button>
															<p class="mt-1 text-justify">Al confirmar el envío del XML, se indica que la subida del XML al banco fue correcta para las inscripciones seleccionadas.</p>
															<p class="mt-1 text-justify">Tras confirmarse las filas seleccionadas, las filas desaparecerán de este listado cuando se refresque la pantalla.</p>
														</div>

														<div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 pt-1 bg-danger">
															<button type="submit" class="btn btn-danger btn-block" id="domiciliaciones-form-xml-trimestre1-2019-2020-anular-cargos">
																<span>ANULAR XML GENERADO</span>
															</button>
															<p class="mt-1 text-justify">Al anular el XML generado, se indica que el envío del XML al banco no salió bien para las inscripciones seleccionadas.</p>
															<p class="mt-1 text-justify">Así, se elimina el pago de la mátrícula de la inscripción del XML y esta se incluirá en la futura generación de XML.</p>
															<p class="mt-1 text-justify">Tras anular las filas seleccionadas, las filas desaparecerán de este listado cuando se refresque la pantalla.</p>
														</div>

													</div>
													
													<div class="card-footer text-muted" id="domiciliaciones-xml-2019-2020-trimestre1-respuesta"></div>
											</div>
										</div>
									</div>

									<!-- DOMICILIACIONES TRIMESTRE 2    ENERO GENERAR XML 2019 / 2020 -->
									<div class="panel panel-default">
										<a data-toggle="collapse" data-parent="#accordion3trimestre2" href="#panelbody14" style="text-decoration:none;">
											<div class="panel-heading">
												<h4 class="panel-title">
													<i class="fa fa-plus-circle"></i>
													DOMICILIACIONES TRIMESTRE 2 (ENERO) TEMPORADA 2019 / 2020: GENERAR XML
													<i class="fa fa-angle-down" style="float: right;"></i>
												</h4>
											</div>
										</a>
										<div id="panelbody14" class="panel-collapse collapse">
											<div class="panel-body">

												<!-- 
													1.  Selección de equipo o equipos
													3.  Generación de XML  
												-->
												<form id="domiciliaciones-xml-2019-2020-trimestre2-form" method="post">
													<div class="row mt-1 pt-1 pb-1 pl-1 pr-1 ml-1 mr-1">
														<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
															<label for="domiciliaciones-xml-2019-2020-trimestre2-equipo">
																Elija un equipo en concreto o todos los equipos:
															</label>
														</div>
														<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
															<select class="form-control inputForm valid" id="domiciliaciones-xml-2019-2020-trimestre2-equipo" 
																	name="domiciliaciones-xml-2019-2020-trimestre2-equipo">
																<option value="">Seleccionar</option>
																<option value="todos">Todos los equipos</option>
																<?php
																foreach ($datos['equipos'] as $equipo)
																{
																	echo "<option value='" . $equipo["ID"] . "'>" . $equipo["equipo"] ."  (".$equipo["tipo"].")</option>";
																}
																?>
															</select>
														</div>

														<div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
															<button type="submit" class="btn btn-warning btn-block" 
																	id="domiciliaciones-xml-2019-2020-trimestre2-button-vista-previa">
																<span>Vista previa</span>
															</button>
														</div>

														<div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
															<button type="submit" class="btn btn-primary btn-block" id="domiciliaciones-xml-2019-2020-trimestre2-button">
																<span>Generar XML</span>
															</button>
														</div>
														<div id="domiciliaciones-xml-2019-2020-trimestre2-link-descarga"></div>
													</div>
												</form>

													<div id="domiciliaciones-xml-2019-2020-trimestre2-vista-previa-container" class="row pl-1 pr-1 ml-1 mr-1"></div>
													
													<!-- 2. Listado de jugadores con el pago en XML generado pero están pendientes de confirmar o de anular
															CONFIRMAR   indica que el XML se envió al banco y se procesó bien.
															ANULAR      indica que el XML se envió al banco y falló (ej. alguna cuenta dió error). 
																		Al anular es posible regenerar un nuevo XML cuando se corrija la información incorrecta -->
													<div class="row pl-1 pr-1 ml-1 mr-1">

														<hr>

														<div class="col-12 mb-2">
															<h4 class="mt-0 pb-0 mb-1"><strong>Listado de cobros incluidos en el XML descargado:</strong></h4>
															<p>- Estos cobros requieren una confirmación para validar que el banco ha procesado el XML sin ningún error.</p>
															<p>- Los cobros también pueden anularse si por ejemplo el XML no se envió al banco o si ocurrió un error al procesarse el fichero. Así, los cobros se incluirán de nuevo en el siguiente XML que se genere.</p>
														</div>

														<div class="col-12 mb-2 w-100">
															<h3><strong>COBROS DE INSCRIPCIONES RECIEN GENERADOS DEL 2ºTRIMESTRE:</strong></h3>
															<table id="inscripciones-cobros-activos-trimestre2-2019-2020-por-confirmar" class="table w-100" style="min-width:100%;">
																<thead class="table-dark" style="min-width:100%;">
																	<tr style="min-width:100%;">
																		<th class="active">Número pedido</th>
																		<th class="active">DNI Jugador</th>
																		<th class="active">Nombre</th>
																		<th class="active">Equipo</th>
																		<th class="active">DNI_Tutor</th>
																		<th class="active">Email</th>
																		<th class="active">Cobro activo</th>
																		<th class="active">Cantidad</th>
																		<th class="active">Gastos devolución</th>
																		<th class="active">Seleccionar</th>
																	</tr>
																</thead>
																<tbody>
																	<tr><td colspan='10'>No hay cobros activos</td></tr>
																</tbody>
															</table>
														</div>

														<div class="col-12 mb-2 w-100">
															<h3><strong>COBROS GENERADOS ANTERIORMENTE DEL 2ºTRIMESTRE:</strong></h3>
															<table id="inscripciones-cobros-activos-trimestre2-2019-2020-por-confirmar-anteriores" 
																   class="table" style="min-width:100%;width:100% !important;">
																<thead class="table-dark" style="min-width:100%;width:100%;">
																	<tr style="min-width:100%;width:100%;">
																		<th class="active">Número pedido</th>
																		<th class="active">DNI Jugador</th>
																		<th class="active">Nombre</th>
																		<th class="active">Equipo</th>
																		<th class="active">DNI_Tutor</th>
																		<th class="active">Email</th>
																		<th id="thcobroactivo" class="active">Cobro activo</th>
																		<th class="active">Cantidad</th>
																		<th class="active">Gastos devolución</th>
																		<th class="active">Seleccionar</th>
																	</tr>
																</thead>
																<tbody>
																	<tr><td colspan='10'><?php echo $datos['cobros_activos_trimestre_2'];?></td></tr>
																</tbody>
															</table>
														</div>
													</div>

													<div class="row pl-1 pr-1 ml-1 mr-1">

														<hr>

														<div class="col-12 mb-2">
															<h4 class="mt-0 pb-0 mb-0"><strong>Anteriormente, se incluyeron cargos en ficheros XML. Estos cargos deben confirmarse si se procesaron correctamente en el banco:</strong></h4>
														</div>

														<div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 pt-1 bg-warning">
															<button type="submit" class="btn btn-warning btn-block" id="domiciliaciones-form-xml-trimestre2-2019-2020-seleccionar-cargos">
																<span>SELECCIONAR TODAS LAS INSCRIPCIONES</span>
															</button>
															<p class="mt-1 text-justify">Al pulsar este botón se seleccionarán todas las filas de la tabla superior.</p>
														</div>

														<div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 pt-1 bg-success">
															<button type="submit" class="btn btn-success btn-block" id="domiciliaciones-form-xml-trimestre2-2019-2020-confirmar-cargos">
																<span>CONFIRMAR ENVÍO DE CARGOS EN XML</span>
															</button>
															<p class="mt-1 text-justify">Al confirmar el envío del XML, se indica que la subida del XML al banco fue correcta para las inscripciones seleccionadas.</p>
															<p class="mt-1 text-justify">Tras confirmarse las filas seleccionadas, las filas desaparecerán de este listado cuando se refresque la pantalla.</p>
														</div>

														<div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 pt-1 bg-danger">
															<button type="submit" class="btn btn-danger btn-block" id="domiciliaciones-form-xml-trimestre2-2019-2020-anular-cargos">
																<span>ANULAR XML GENERADO</span>
															</button>
															<p class="mt-1 text-justify">Al anular el XML generado, se indica que el envío del XML al banco no salió bien para las inscripciones seleccionadas.</p>
															<p class="mt-1 text-justify">Así, se elimina el pago de la mátrícula de la inscripción del XML y esta se incluirá en la futura generación de XML.</p>
															<p class="mt-1 text-justify">Tras anular las filas seleccionadas, las filas desaparecerán de este listado cuando se refresque la pantalla.</p>
														</div>

													</div>

													<div class="card-footer text-muted" id="domiciliaciones-xml-2019-2020-trimestre2-respuesta"></div>
											</div>
										</div>
									</div>
									
									<!-- DOMICILIACIONES TRIMESTRE 3    ABRIL GENERAR XML 2019 / 2020 -->
									<div class="panel panel-default">
										<a data-toggle="collapse" data-parent="#accordion3trimestre3" href="#panelbody15" style="text-decoration:none;">
											<div class="panel-heading">
												<h4 class="panel-title">
													<i class="fa fa-plus-circle"></i>
													DOMICILIACIONES TRIMESTRE 3 (ABRIL) TEMPORADA 2019 / 2020: GENERAR XML
													<i class="fa fa-angle-down" style="float: right;"></i>
												</h4>
											</div>
										</a>
										<div id="panelbody15" class="panel-collapse collapse">
											<div class="panel-body">

												<!-- 
													1.  Selección de equipo o equipos
													3.  Generación de XML  
												-->
												<form id="domiciliaciones-xml-2019-2020-trimestre3-form" method="post">
													<div class="row mt-1 pt-1 pb-1 pl-1 pr-1 ml-1 mr-1">
														<div class="col-12">
															<div class="alert alert-danger">Opciones disabilitadas hasta que llegue la fecha oportuna y deseen activarse.</div>
															<!-- Para activarlas simplemente quitar los 'disabled' de los <button> con ids: 
																		domiciliaciones-xml-2019-2020-trimestre3-button-vista-previa 
																		domiciliaciones-xml-2019-2020-trimestre3-button
															-->
														</div>

														<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
															<label for="domiciliaciones-xml-2019-2020-trimestre3-equipo">
																Elija un equipo en concreto o todos los equipos:
															</label>
														</div>
														<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
															<select class="form-control inputForm valid" id="domiciliaciones-xml-2019-2020-trimestre3-equipo" 
																	name="domiciliaciones-xml-2019-2020-trimestre3-equipo">
																<option value="">Seleccionar</option>
																<option value="todos">Todos los equipos</option>
																<?php
																foreach ($datos['equipos'] as $equipo)
																{
																	echo "<option value='" . $equipo["ID"] . "'>" . $equipo["equipo"] ."  (".$equipo["tipo"].")</option>";
																}
																?>
															</select>
														</div>

														<div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
															<button type="submit" class="btn btn-warning btn-block" disabled id="domiciliaciones-xml-2019-2020-trimestre3-button-vista-previa">
																<span>Vista previa</span>
															</button>
														</div>

														<div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
															<button type="submit" class="btn btn-primary btn-block" disabled id="domiciliaciones-xml-2019-2020-trimestre3-button">
																<span>Generar XML</span>
															</button>
														</div>
														<div id="domiciliaciones-xml-2019-2020-trimestre3-link-descarga"></div>
													</div>
												</form>

													<div id="domiciliaciones-xml-2019-2020-trimestre3-vista-previa-container" class="row pl-1 pr-1 ml-1 mr-1"></div>
													
													<!-- 2. Listado de jugadores con el pago en XML generado pero están pendientes de confirmar o de anular
															CONFIRMAR   indica que el XML se envió al banco y se procesó bien.
															ANULAR      indica que el XML se envió al banco y falló (ej. alguna cuenta dió error). 
																		Al anular es posible regenerar un nuevo XML cuando se corrija la información incorrecta -->
													<div class="row pl-1 pr-1 ml-1 mr-1">

														<hr>

														<div class="col-12 mb-2">
															<h4 class="mt-0 pb-0 mb-1"><strong>Listado de cobros incluidos en el XML descargado:</strong></h4>
															<p>- Estos cobros requieren una confirmación para validar que el banco ha procesado el XML sin ningún error.</p>
															<p>- Los cobros también pueden anularse si por ejemplo el XML no se envió al banco o si ocurrió un error al procesarse el fichero. Así, los cobros se incluirán de nuevo en el siguiente XML que se genere.</p>
														</div>

														<div class="col-12 mb-2 w-100">
															<h3><strong>COBROS DE INSCRIPCIONES RECIEN GENERADOS DEL TRIMESTRE 3º:</strong></h3>
															<table id="inscripciones-cobros-activos-trimestre3-2019-2020-por-confirmar" class="table w-100" style="min-width:100%;">
																<thead class="table-dark" style="min-width:100%;">
																	<tr style="min-width:100%;">
																		<th class="active">Número pedido</th>
																		<th class="active">DNI Jugador</th>
																		<th class="active">Nombre</th>
																		<th class="active">Equipo</th>
																		<th class="active">DNI_Tutor</th>
																		<th class="active">Email</th>
																		<th class="active">Cobro activo</th>
																		<th class="active">Cantidad</th>
																		<th class="active">Gastos devolución</th>
																		<th class="active">Seleccionar</th>
																	</tr>
																</thead>
																<tbody>
																	<tr><td colspan='10'>No hay cobros activos</td></tr>
																</tbody>
															</table>
														</div>

														<div class="col-12 mb-2 w-100">
															<h3><strong>COBROS GENERADOS ANTERIORMENTE DEL TRIMESTRE 3º:</strong></h3>
															<table id="inscripciones-cobros-activos-trimestre3-2019-2020-por-confirmar-anteriores" 
																   class="table" style="min-width:100%;width:100% !important;">
																<thead class="table-dark" style="min-width:100%;width:100%;">
																	<tr style="min-width:100%;width:100%;">
																		<th class="active">Número pedido</th>
																		<th class="active">DNI Jugador</th>
																		<th class="active">Nombre</th>
																		<th class="active">Equipo</th>
																		<th class="active">DNI_Tutor</th>
																		<th class="active">Email</th>
																		<th id="thcobroactivo" class="active">Cobro activo</th>
																		<th class="active">Cantidad</th>
																		<th class="active">Gastos devolución</th>
																		<th class="active">Seleccionar</th>
																	</tr>
																</thead>
																<tbody>
																	<tr><td colspan='10'><?php echo $datos['cobros_activos_trimestre_3'];?></td></tr>
																</tbody>
															</table>
														</div>
													</div>

													<div class="row pl-1 pr-1 ml-1 mr-1">

														<hr>

														<div class="col-12 mb-2">
															<h4 class="mt-0 pb-0 mb-0"><strong>Anteriormente, se incluyeron cargos en ficheros XML. Estos cargos deben confirmarse si se procesaron correctamente en el banco:</strong></h4>
														</div>

														<div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 pt-1 bg-warning">
															<button type="submit" class="btn btn-warning btn-block" id="domiciliaciones-form-xml-trimestre3-2019-2020-seleccionar-cargos">
																<span>SELECCIONAR TODAS LAS INSCRIPCIONES</span>
															</button>
															<p class="mt-1 text-justify">Al pulsar este botón se seleccionarán todas las filas de la tabla superior.</p>
														</div>

														<div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 pt-1 bg-success">
															<button type="submit" class="btn btn-success btn-block" id="domiciliaciones-form-xml-trimestre3-2019-2020-confirmar-cargos">
																<span>CONFIRMAR ENVÍO DE CARGOS EN XML</span>
															</button>
															<p class="mt-1 text-justify">Al confirmar el envío del XML, se indica que la subida del XML al banco fue correcta para las inscripciones seleccionadas.</p>
															<p class="mt-1 text-justify">Tras confirmarse las filas seleccionadas, las filas desaparecerán de este listado cuando se refresque la pantalla.</p>
														</div>

														<div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 pt-1 bg-danger">
															<button type="submit" class="btn btn-danger btn-block" id="domiciliaciones-form-xml-trimestre3-2019-2020-anular-cargos">
																<span>ANULAR XML GENERADO</span>
															</button>
															<p class="mt-1 text-justify">Al anular el XML generado, se indica que el envío del XML al banco no salió bien para las inscripciones seleccionadas.</p>
															<p class="mt-1 text-justify">Así, se elimina el pago de la mátrícula de la inscripción del XML y esta se incluirá en la futura generación de XML.</p>
															<p class="mt-1 text-justify">Tras anular las filas seleccionadas, las filas desaparecerán de este listado cuando se refresque la pantalla.</p>
														</div>

													</div>
													
													<div class="card-footer text-muted" id="domiciliaciones-xml-2019-2020-trimestre3-respuesta"></div>
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

		<?php include 'includes/footer_back.php';?>

		<!-- Modal - Ver Inscripcion -->
		<div id="myModal" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title mb-0 pb-0" id="modaltitle"></h4>
					</div>

					<div class="modal-body">
						<div class="row">
							<div class="col-12" id="modal-detalleinscripcion-contenido"></div>
						</div>
					</div>

					<div class="modal-footer t-center">
						<button type="button" class="btn btn-empresas-activo" data-dismiss="modal" style="transform: skew(0deg); font-size: 15px; height: 35px; margin: 0 auto;">
							Cerrar
						</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal - Dar de baja / Alta inscripcion-->
		<div id="inscripciones-dar-baja-alta" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title mb-0 pb-0">Estado de la inscripcion</h4>
					</div>

					<div class="modal-body">
						<form id="inscripciones-dar-baja-alta-form" method="post">
							<div class="row mt-4">
								<div class="col-12">
									<input type="hidden" name="" id="inscripciones-dar-baja-alta-form-idinscripcion" value="">
									<div class="form-row" style="margin-top: -10px; margin-bottom: 10px;">
										<h4 class="mt-0 mb-0 pb-0">Activo (naranja) o inactivo (gris)</h4>
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
								<div class="col-12 col-md-6 col-lg-6 col-xl-6">
									<button class="btn btn-info btn-block" type="submit">Guardar cambios</button>
								</div>

								<div class="col-12 col-md-6 col-lg-6 col-xl-6">
								   <button type="button" class="btn btn-empresas-activo btn-block w-100" style="border: none; height: 32px; margin: 0px; width: 100%;" data-dismiss="modal">
										Cerrar
								   </button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal - Ver la lista de pagos 
		<div id="myModalPagos" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title mb-0 pb-0">Pagos realizados</h4>
					</div>

					<div class="modal-body">
						<div class="row">
							<div class="col-12" id="modalpagos-contenido"></div>
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
		</div> -->

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
										<input type="number" name="entidad" class="form-control" id="editar-cuenta-entidad" required>
									</div>

									<div class="form-row">
										<label>OFICINA:</label>
										<input type="number" name="oficina" class="form-control" id="editar-cuenta-oficina" required>
									</div>

									<div class="form-row">
										<label>DC:</label>
										<input type="number" name="dc" class="form-control" id="editar-cuenta-dc" required>
									</div>

									<div class="form-row">
										<label>CUENTA:</label>
										<input type="number" name="cuenta" class="form-control" id="editar-cuenta-cuenta" required>
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

		<!-- Modal - Pagos Trimestrales -->
		<div id="myModalPagosTrimestrales" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title mb-0 pb-0">Editar Pagos Trimestrales</h4>
					</div>

					<div class="modal-body">
						<div id="modalpagostrimestrales-contenido" class="row">
							<div class="col-12">
								<form id="pagos-trimestrales-form" method="post">
									<input type="hidden" name="" id="pagos-trimestrales-idinscripcion" value="">
									<input type="hidden" name="" id="pagos-trimestrales-categoria-inscripcion" value="">

									<!-- RESERVA -->
									<div class="form-row cantera-form-row">
										<label>RESERVA:</label>
										<input type="number" min="0" step="0.01" name="" class="form-control" id="pagos-reserva" required>
									</div>

									<!-- DATOS MATRÍCULA -->
									<div class="form-row cantera-form-row" style="margin-top: 5px;">
										<label>MATRÍCULA:</label>
									</div>

									<div class="form-row cantera-form-row">
										<div class="col-12 col-md-10 col-lg-10 col-xl-10 alinear-izquierda">
											<input type="number" min="0" step="0.01" name="" class="form-control" id="pagos-matricula" required>
										</div>

										<div class="col-12 col-md-2 col-lg-2 col-xl-2">
											<label class="switch" style="margin-top: 10px;">
												<input type="checkbox" id="pagos-pagado-matricula" >
												<span class="slider round" style="margin-top: -5px; margin-bottom: 5px;"></span>
											</label>
										</div>
									</div>

									<!-- DATOS PENDIENTE MATRÍCULA -->
									<div class="form-row cantera-form-row">
										<label>PENDIENTE MATRÍCULA:</label>
									</div>

									<div class="form-row cantera-form-row">
										<div class="col-12 col-md-10 col-lg-10 col-xl-10 alinear-izquierda">
											<input type="number" min="0" step="0.01" name="" class="form-control"
												   id="pagos-pendiente-matricula" required >
										</div>
										<div class="col-12 col-md-2 col-lg-2 col-xl-2">
											<label class="switch" style="margin-top:10px;">
												<input type="checkbox" id="pagos-pagado-pendiente-matricula" >
												<span class="slider round" style="margin-top:-5px;margin-bottom:5px;"></span>
											</label>
										</div>
									</div>

									<!-- TOTAL INSCRIPCIÓN -->
									<div class="form-row">
										<label>TOTAL INSCRIPCIÓN:</label>
										<input type="number" min="0" step="0.01" name="" class="form-control" id="pagos-total-inscripcion" required>
									</div>

									<!-- TOTAL PENDIENTE -->
									<div class="form-row mt-1">
										<label>TOTAL PENDIENTE:</label>
										<input type="number" min="0" step="0.01" name="" class="form-control" id="pagos-total-pendiente" required>
									</div>

									<hr>

									<!-- TRIMESTRES -->
									<div class="form-row trimestres">
										<h4 class="mt-0 mb-0 pb-0">
											<strong>PAGO DE TRIMESTRES</strong>
										</h4>
										<p class="mb-0">Cada trimestre indica la cantidad domiciliada o a domiciliar.</p>
										<p class="mb-0">Cada trimestre indica si se ha pagado o si se ha domiciliado su pago en el banco.</p>
										<p class="mb-0">Para registrar el pago de un trimestre, márquelo y guarde los cambios.</p>
									</div>

									<div class="form-row mt-1">
										<div class="row">
											<div class="col-12 col-md-4 col-lg-4 col-xl-4">
												<label>1-15 Enero:</label>
												<input type="number" min="0" step="0.01" name="" class="form-control" id="pagos-trimestre-enero" required>
												<label class="switch" style="margin-top: 10px;">
													<input type="checkbox" id="pagos-pagado-enero">
													<span class="slider round"></span>
												</label>
											</div>

											<div class="col-12 col-md-4 col-lg-4 col-xl-4">
												<label>1-15 Abril:</label>
												<input type="number" min="0" step="0.01" name="" class="form-control" id="pagos-trimestre-abril" required>
												<label class="switch" style="margin-top: 10px;">
													<input type="checkbox" id="pagos-pagado-abril">
													<span class="slider round"></span>
												</label>
											</div>

											<div class="col-12 col-md-4 col-lg-4 col-xl-4">
												<label>1-15 Noviembre:</label>
												<input type="number" min="0" step="0.01" name="" class="form-control" id="pagos-trimestre-noviembre" required>
												<label class="switch" style="margin-top: 10px;">
													<input type="checkbox" id="pagos-pagado-noviembre">
													<span class="slider round"></span>
												</label>
											</div>
										</div>
									</div>

									<hr>

									<!-- INCLUIR PAGOS EN EL XML -->
									<div class="form-row trimestres">
										<h4 class="mt-0 mb-0 pb-0">
											<strong>INCLUIR CARGO EN LA GENERACIÓN DE XML</strong>
										</h4>
										<p class="mb-0">Marcando el trimestre, se incluirá en el XML de cargos correspondiente cuando este se genere.</p>
									</div>

									<div class="form-row mt-1">
										<div class="row">
											<div class="col-12 col-md-4 col-lg-4 col-xl-4">
												<h5 class="mb-0">
													<strong>1-15 Enero:</strong>
												</h5>
												<label class="switch" style="margin-top: 10px;">
													<input type="checkbox" id="generar-xml-enero">
													<span class="slider round"></span>
												</label>
											</div>

											<div class="col-12 col-md-4 col-lg-4 col-xl-4">
												<h5 class="mb-0">
													<strong>1-15 Abril:</strong>
												</h5>
												<label class="switch" style="margin-top: 10px;">
													<input type="checkbox" id="generar-xml-abril">
													<span class="slider round"></span>
												</label>
											</div>

											<div class="col-12 col-md-4 col-lg-4 col-xl-4">
												<h5 class="mb-0">
													<strong>1-15 Noviembre:</strong>
												</h5>
												<label class="switch" style="margin-top: 10px;">
													<input type="checkbox" id="generar-xml-noviembre">
													<span class="slider round"></span>
												</label>
											</div>
											<input id="dni-titular" type="hidden" value="">
										</div>
									</div>

									<div id="pagos-trimestrales-form-respuesta" class="form-row mt-2"></div>

									<div class="form-row mt-2">
										<div class="row">
											<div class="col-12 col-md-6 col-lg-6 col-xl-6">
												<button class="btn btn-info btn-block" type="submit">Guardar cambios</button>
											</div>

											<div class="col-12 col-md-6 col-lg-6 col-xl-6">
												<button type="button" class="btn btn-empresas-activo btn-block w-100" style="border: none; height: 32px; margin: 0px; width: 100%;" data-dismiss="modal">
													Cerrar
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

		<script src="backmeans/assets/js/escuela-cantera.js"></script>
	</body>
</html>



<!-- POR EL MOMENTO LO COMENTAMOS. DOMICILIACIONES. GENERAR XML 
									<div class="panel panel-default">
										<a data-toggle="collapse" data-parent="#accordion1" href="#10" style="text-decoration: none;">
											<div class="panel-heading">
												<h4 class="panel-title">
													<i class="fa fa-plus-circle"></i>
													DOMICILIACIONES: GENERAR XML TRIMESTRALES Y CONFIRMAR PAGOS TRAS EL ENVÍO AL BANCO
													<i class="fa fa-angle-down" style="float: right;"></i>
												</h4>
											</div>
										</a>
										<div id="10" class="panel-collapse collapse">
											<div class="panel-body" style="padding-top: 0px;">
												<div class="contact-form-wrapper">
													
													<form action="?r=campus/ExportToExcelConsultasEscuelaCantera" method="post">
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
													
													<div class="row">
														<hr>
														<div class="col-12 mb-2">
															<h4 class="mt-0 pb-0 mb-0">Hay cargos que ya se incluyeron en ficheros y aún no se han confirmado:</h4>
														</div>

														<div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
															<button type="submit" class="btn btn-success btn-block" id="domiciliaciones-form-xml-confirmar-cargos">
																<span>CONFIRMAR ENVÍO DE CARGOS EN XML</span>
															</button>
															<p class="mt-1 text-justify">Al confirmar el envío del XML, se indica que la subida del XML al banco fue correcta para las inscripciones seleccionadas.</p>
														</div>

														<div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
															<button type="submit" class="btn btn-danger btn-block" id="domiciliaciones-form-xml-anular-cargos">
																<span>ANULAR XML GENERADO</span>
															</button>
															<p class="mt-1 text-justify">Al anular el XML generado, se indica que el envío del XML al banco no salió bien para las inscripciones seleccionadas.</p>
															<p class="mt-1 text-justify">Así, se eliminamos el pago del trimestre en cada inscripción del XML y se incluirán en la futura generación de XML.</p>
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
															<h4 class="mt-0 pb-0 mb-0">Pagos incluidos en XML, cuyo envío al banco correcto, aún no se ha confirmado:</h4>
														</div>
														
														<div class="col-12 mb-2">
															<table id="inscripciones-cobros-activos-por-confirmar" class="table w-100">
																<thead class="table-dark">
																	<tr>
																		<th>Número pedido</th>
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
									-->
									
									<!-- DOMICILIACIONES MATRÍCULAS. GENERAR XML 18 / 19 
									<div class="panel panel-default">
										<a data-toggle="collapse" data-parent="#accordion1" href="#11" style="text-decoration: none;">
											<div class="panel-heading">
												<h4 class="panel-title">
													<i class="fa fa-plus-circle"></i>
													DOMICILIACIONES MATRÍCULAS: GENERAR XML
													<i class="fa fa-angle-down" style="float: right;"></i>
												</h4>
											</div>
										</a>
										<div id="11" class="panel-collapse collapse">
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
									-->