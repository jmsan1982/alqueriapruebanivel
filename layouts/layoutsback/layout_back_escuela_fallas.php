<!DOCTYPE html>
<html lang="es">
	<?php require "includes/head_back.php"; ?>

	<body>
		<script src="backmeans/assets/js/jquery.js"></script>

		<?php require "includes/topbar_back.php"; ?>

		<?php require "includes/header_back_escuelas.php"; 
		require_once ('lang/errores_tpv.php');
		?>

		<div class="canvas campus-escuelas">
			<div id="content">
				<div id="page-content">
					<div class="page-contacts-block">
						<div class="container-fluid">
							<div class="row">
								<div class="col-12 text-center">
									<h2 class="section-title mt-0 mb-0" style="color: #406da4;">
										<i class="fa fa-fire" aria-hidden="true" style="margin-right: 10px;"></i><b>ESCUELA FALLAS L´ALQUERIA</b>
									</h2>

									<h4 class="section-title text-center mt-0 mb-0" style="text-transform: none;">
										Puede ordenar las filas haciendo click en los títulos o buscar por cualquier campo de la tabla.
									</h4>
								</div>

								<div class="col-12">
									<p>
										<b>Seleccionar datos para exportar a excel</b>
										<br>
									</p>
									<form action="?r=escuelafallas/ExportToExcelEscuelaFallas" method="post">
										
										<label class="containerchekbox">
                                            <input type="checkbox" name="alergias" value="alergias">
                                            <span class="checkmark"></span> Observaciones médicas 
                                        </label> &nbsp;

										<label class="containerchekbox">
                                            <input type="checkbox" name="club" value="club">
                                            <span class="checkmark"></span>  Club
                                        </label>&nbsp;

                                        <label class="containerchekbox">
                                            <input type="checkbox" name="inscripcion" value="inscripcion">
                                            <span class="checkmark"></span>  Opcion 
                                        </label>&nbsp;

                                        <!-- <label class="containerchekbox">
                                            <input type="checkbox" name="direccion" value="direccion">
                                            <span class="checkmark"></span>  Datos dirección 
                                        </label>&nbsp; -->

                                       <!--  <div class="form-group col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
											<label for="fechahasta" class="labelForm">Fecha hasta:</label>
											<input type="date" class="form-control inputForm valid" value="" id="fechahasta" name="fechahasta" placeholder="" aria-invalid="false">
										</div>

										<div class="form-group col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                        	<label for="fechadesde" class="labelForm">Fecha desde:</label>
											<input type="date" class="form-control inputForm valid" value="" id="fechadesde" name="fechadesde" placeholder="" aria-invalid="false">
										</div> -->


										<button type="submit" id="export_data" name="export_data" value="Export to excel" class="btn btn-info mb-1">Exportar a Excel</button>
									</form>
									<form action="?r=escuelafallas/ExportToExcelEscuelaFallasCompleto" method="post">
										
										<button type="submit" id="export_data2" name="export_data2" value="Export to excel" class="btn btn-info mb-1">Exportar todos los datos</button>
									</form>

									
								</div>

								<div class="col-12 text-left">
									<label for="" class="labelForm"></label>
									<p>
										<br>
										<b>Nº de inscritos:  <?php echo $datos['numerototalinscripciones']; ?> (Mañanas: <?php echo $datos['inscripciones_manyanas'][0]; ?> , Completo: <?php echo $datos['inscripciones_completo'][0]; ?> , Dias sueltos: <?php echo $datos['inscripciones_sueltos'][0]; ?>)</b>
										<br>
									</p>
								</div>

								<div class="col-12">
									<table id="inscripciones-listado-datatable" class="table table-striped table-hover w-100 mb-2 inscripciones-jornadas-deteccion" style="width: 100%;">
										<thead class="table-dark">
											<tr style="cursor: pointer;">
												<th class="text-center">Fecha Inscripción</th>
												<th class="text-center">Nº Pedido</th> 
												<th>Nombre</th>
												<th>Apellidos</th>
												<th class="text-center">Teléfono</th>
												<th class="text-center">DNI</th>
												<th>Email</th>
												<th>Opcion</th>
												<th class="text-center">SIP</th>
												<th class="text-center">Recibo pago</th>
												<th class="text-center">Pago</th>
												<th class="text-center">Importe</th>
												<th class="text-center" id="pagados">Pagado (verde)</th>
												<th class="text-center">Inscripción</th>
												<th class="text-center">Dar de baja</th>
												
											</tr>
										</thead>
										<tbody>
											<?php
												foreach ($datos['inscripciones'] as $inscripcion) {

													$date = new DateTime($inscripcion['fecharegistro']);
													
													if ($inscripcion['pagado'] == "1" || $inscripcion['pagado'] === 1) {
														$string_importe = $inscripcion['importe'];
														$tipopago = $inscripcion['tipopago'];
													}
													else {
														$string_importe = 0;
														if ($inscripcion['tipopago'] == "ONLINE") {
														  if($inscripcion['errorcode'] == "" || is_null($inscripcion['errorcode'])){
																$tipopago ="ONLINE"." <span style='color:red;font-size=8;'><strong>"."(error tarjeta)"."</strong></span>";
																
															}else{
																$tipopago ="ONLINE"." <span style='color:red;font-size=8;'><strong>(". $errores[$inscripcion['errorcode']].")</strong></span>";
														  		
															}
														}
														else{$tipopago = $inscripcion['tipopago'];}
													}

													// Saber la extensión para condicionar el tipo de icono a mostrar
													$valores = explode(".", $inscripcion['ficherosubido1']);
													$extension = $valores[count($valores)-1];

													// Saber la extensión del justificante para condicionar el tipo de icono a mostrar
													$valores2 = explode(".", $inscripcion['ficherosubido2']);
													$extension2 = $valores2[count($valores2)-1];

													echo '<tr id="' . $inscripcion['id'] . '">
															<td class="text-center">' . $date->format('d/m/Y') . '</td>
															<td class="text-center">' . $inscripcion['numeropedido'] . '</td>
															<td class="text-left">' . utf8_encode($inscripcion['nombre']) . '</td>
															<td class="text-left">' . utf8_encode($inscripcion['apellidos']).'</td>
															<td class="text-center">' . $inscripcion['telefonotutor']. '</td>
															<td class="text-center">' . $inscripcion['dni'] . '</td>
															<td class="text-left">' . $inscripcion['emailtutor'].'</td>
															<td class="text-left">' . utf8_encode($inscripcion['opcion']). '</td> 
															<td class="text-center"> 
															<a href="https://servicios.alqueriadelbasket.com/'.$inscripcion['ficherosubido1'].'" target="_blank">';
																	if ($extension == "pdf") {
																		echo '<i class="fa fa-file-pdf-o fa-2x" style="font-size: 1.5em;" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Abrir PDF"></i>';
																	}
																	elseif ($extension == "zip") {
																		echo '<i class="fa fa-file-zip-o fa-2x" style="font-size: 1.5em;" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Abrir Zip"></i>';
																	}
																	else {
																		echo '<i class="fa fa-file-image-o fa-2x" style="font-size: 1.5em;" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Abrir Imagen"></i>';
																	}
															echo '</a>
															</td>

															<td class="text-center">';
																//if(false !== strpos($inscripcion['ficherosubido2'], "inscripcionescampusnavidad"))
																if($inscripcion['ficherosubido2']=="")
                                                            	{
                                                                	//echo '<a href="'.$inscripcion['ficherosubido2'].'" target="_blank">';
                                                                }
                                                            	else
                                                            	{
                                                               		 echo '<a href="https://servicios.alqueriadelbasket.com/'.$inscripcion['ficherosubido2'].'" target="_blank">';

                                                               		 if ($extension2 == "pdf") {
																		echo '<i class="fa fa-file-pdf-o fa-2x" style="font-size: 1.5em;" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Abrir PDF"></i>';
																	}
																	elseif ($extension2 == "zip") {
																		echo '<i class="fa fa-file-zip-o fa-2x" style="font-size: 1.5em;" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Abrir Zip"></i>';
																	}
																	else {
																		echo '<i class="fa fa-file-image-o fa-2x" style="font-size: 1.5em;" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Abrir Imagen"></i>';
																	}
                                                               	}

																
																	
															echo '</a>
															</td>
															<td class="text-center">' . $tipopago . '</td>
															<td class="text-center">' . $string_importe . '</td>
															<td class="text-center">
																<form method="post" action="?r=escuelafallas/ModificaPagadoEscuelaFallas">';

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

																	echo '<input type="hidden" name="id" value="'.$inscripcion['numeropedido'].'"> 
																	<button class="btn" type="submit">Guardar</button>
																</form>
															</td>
															<td class="text-center">

																<a id="'.$inscripcion['id'].'-editar-inscripcion" data-toggle="modal" data-target="#myModal" class="cargar_modal_editar_inscripcion">
																	<i class="fa fa-edit" style="font-size: 1.5em;" data-toggle="tooltip" data-placement="bottom" title="Editar Inscripción"></i>
																</a>

																<a href="?r=escuelafallas/ImprimirFichaEscuelaFallas&numeropedido='.$inscripcion['numeropedido'].'&tipopago='.$inscripcion['tipopago'].'" target="_blank">
																	<i class="fa fa-print fa-2x" style="font-size: 1.5em;" data-toggle="tooltip" data-placement="bottom" title="Generar vista para imprimir"></i>
																</a>
															</td>

															<td class="text-center">
																<form method="post" action="?r=escuelafallas/DardeBajaEscuelaFallas">';

																	echo '<input type="hidden" name="id" value="'.$inscripcion['numeropedido'].'">
																	<button class="btn baja" type="submit">Baja</button>
																</form>
															</td>
														</tr>';
												}
											?>
										</tbody>
									</table>
								</div> <!-- fin tabla -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php require "includes/topbar_back.php"; ?>

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

		<!-- Modal - Editar Inscripcion -->
		<div id="myModal" class="modal fade in" role="dialog" aria-hidden="false" style="display: none;">
			<div class="modal-dialog" style="width: 93%;">
				<div class="modal-content">
					<form id="form_editar_inscripciones" class="boxed-form" name="contactform" method="post" novalidate="novalidate" enctype="multipart/form-data">
						<div class="container-fluid">
							<div class="row mt-1">
								<div class="form-group col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
									<label for="dni-editar-inscripciones" class="labelForm">DNI jugador:</label>
									<input type="text" style="-webkit-appearance: none;-moz-appearance: none;" class="form-control inputForm valid" id="dni-editar-inscripciones" name="dni-editar-inscripciones" aria-invalid="false">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
									<label for="nombre-editar-inscripciones" class="labelForm">Nombre:</label>
									<input type="text" class="form-control inputForm valid" value="" id="nombre-editar-inscripciones" name="nombre-editar-inscripciones" placeholder="Nombre" aria-invalid="false">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5">
									<label for="apellidos-editar-inscripciones" class="labelForm">Apellidos:</label>
									<input type="text" class="form-control inputForm valid" value="" id="apellidos-editar-inscripciones" name="apellidos-editar-inscripciones" placeholder="Apellidos" aria-invalid="false">
								</div>
							</div>

							<div class="clearfix"></div>

							<div class="row">
								<div class="form-group col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
									<label for="fechaN-editar-inscripciones" class="labelForm">Fecha Nacimiento:</label>
									<input type="date" class="form-control inputForm valid" value="" id="fechaN-editar-inscripciones" name="fechaN-editar-inscripciones" placeholder="" aria-invalid="false">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
									<label for="club-editar-inscripciones" class="labelForm">Club:</label>
									<input type="text" class="form-control inputForm valid" value="" id="club-editar-inscripciones" name="club-editar-inscripciones" placeholder="Club" aria-invalid="false">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
									<label for="genero-editar-inscripciones" class="labelForm">Genero:
	                                    <select class="form-group" name="genero-editar-inscripciones" id="genero-editar-inscripciones" value="" required>
	                                        <option value="">Seleccionar opción</option>
	                                        <option value="FEMENINO">FEMENINO</option>
	                                        <option value="MASCULINO">MASCULINO</option>
	                                    </select>
                                	</label>
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

								<div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<label for="provincia-editar-inscripciones" class="labelForm">Provincia:</label>
									<input type="text" class="form-control inputForm" value="" id="provincia-editar-inscripciones" name="provincia-editar-inscripciones" placeholder="Provincia">
								</div>
								
							</div>

							<div class="clearfix"></div>


							<div class="row">

								<div class="form-group col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
									<label for="dnitutor-editar-inscripciones" class="labelForm">DNI Tutor/a:</label>
									<input type="text" style="-webkit-appearance: none;-moz-appearance: none;" class="form-control inputForm valid" id="dnitutor-editar-inscripciones" name="dnitutor-editar-inscripciones" aria-invalid="false">
								</div>
								<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
									<label for="nombretutor-editar-inscripciones" class="labelForm">Nombre tutor/a:</label>
									<input type="text" class="form-control inputForm valid" value="" id="nombretutor-editar-inscripciones" name="nombretutor-editar-inscripciones" placeholder="Nombre tutor" aria-invalid="false">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5">
									<label for="apellidostutor-editar-inscripciones" class="labelForm">Apellidos tutor/a:</label>
									<input type="text" class="form-control inputForm valid" value="" id="apellidostutor-editar-inscripciones" name="apellidostutor-editar-inscripciones" placeholder="Nombre" aria-invalid="false">
								</div>
							</div>

							<div class="clearfix"></div>

							<div class="row">


								<div class="form-group col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
									<label for="tlftutor-editar-inscripciones" class="labelForm">Telef. tutor/a:</label>
									<input type="number" class="form-control inputForm valid" value="" id="tlftutor-editar-inscripciones" name="tlftutor-editar-inscripciones" placeholder="Telefono">
								</div>

								
								<div class="form-group col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
									<label for="emailtutor-editar-inscripciones" class="labelForm">Email:</label>
									<input type="email" class="form-control inputForm valid" value="" id="emailtutor-editar-inscripciones" name="emailtutor-editar-inscripciones" placeholder="Correo Electrónico">
								</div>

								
								
							</div>

							<div class="clearfix"></div>

							<!-- <div class="row">
								
								<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
									<label for="alergias-editar-inscripciones" class="labelForm">Alergias (sólo si tiene):</label>
									<input type="text" class="form-control inputForm valid" value="" id="alergias-editar-inscripciones" name="alergias-editar-inscripciones" placeholder="Alergias" aria-invalid="false">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
									<label for="enfermedad-editar-inscripciones" class="labelForm">Enfermedades:</label>
									<input type="text" class="form-control inputForm valid" value="" id="enfermedad-editar-inscripciones" name="enfermedad-editar-inscripciones" placeholder="Enfermedades" aria-invalid="false">
								</div>
								<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
									<label for="tratamientosm-editar-inscripciones" class="labelForm">Tratamientos:</label>
									<input type="text" class="form-control inputForm valid" value="" id="tratamientosm-editar-inscripciones" name="tratamientosm-editar-inscripciones" placeholder="Enfermedades" aria-invalid="false">
								</div>
								
							</div> -->

						
							<div class="clearfix"></div>

							<div class="row">
								
								

								
								<div class="form-group col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
									<label for="observ-editar-inscripciones" class="labelForm">Observaciones medicas:</label>
									<input type="text" class="form-control inputForm valid" value="" id="observ-editar-inscripciones" name="observ-editar-inscripciones" placeholder="" aria-invalid="false">
								</div>
								
							</div>

							<div class="clearfix"></div>

							<div class="row">

								<div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<label for="sintomascovid-editar-inscripciones" class="labelForm">¿Ha tenido fiebre, tos, diarrea, dificultad respiratoria durante los últimos 15 días?</label>
									<input type="text" class="form-control inputForm valid" value="" id="sintomascovid-editar-inscripciones" name="sintomascovid-editar-inscripciones" placeholder="" aria-invalid="false">
								</div>
								<div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<label for="familiarcovid-editar-inscripciones" class="labelForm">¿Alguno de tus convivientes ha sido diagnosticado de coronavirus este último mes?</label>
									<input type="text" class="form-control inputForm valid" value="" id="familiarcovid-editar-inscripciones" name="familiarcovid-editar-inscripciones" placeholder="" aria-invalid="false">
								</div>
								
							</div>

							<div class="clearfix"></div>

							<div class="row">
								
								<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4" id="subepdf">
									<label for="contact-name" class="control-label">Sip</label>
									<div class="input-group">
										<input accept="image/png, image/jpeg, application/pdf" style="width:100%;background-color: #406da4;" type="file" class="upload" name="archivo_sip" id="archivo_sip"/> 

										<input type="text" name="sip-editar-inscripciones" id="sip-editar-inscripciones" class="form-control" value="" readonly>
										<span class="input-group-addon"><i class="fa fa-link"></i></span>


									</div>
								</div>

								<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4" id="subepdftransfer">
									<label for="contact-name" class="control-label">Recibo transferencia</label>
									<div class="input-group">
										<input accept="image/png, image/jpeg, application/pdf" style="width:100%;background-color: #406da4;" type="file" class="upload" name="archivo_transfer" id="archivo_transfer"/> 

										<input type="text" name="transfer-editar-inscripciones" id="transfer-editar-inscripciones" class="form-control" value="" readonly>
										<span class="input-group-addon"><i class="fa fa-link"></i></span>


									</div>
								</div>

								<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
									<label for="tipopago-editar-inscripciones" class="labelForm">Tipo de pago:
	                                    <select class="form-group" name="tipopago-editar-inscripciones" id="tipopago-editar-inscripciones" value="" required>
	                                        <option value="">Seleccionar opción</option>
	                                        <option value="ONLINE">ONLINE</option>
	                                        <option value="TRANSFERENCIA">TRANSFERENCIA</option>
	                                        <option value="OFICINA">OFICINA</option>
	                                    </select>
                                	</label>
                                </div>


							</div>
							
							<div class="clearfix"></div>

							

							<div class="row">
								
								<div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<label for="opcion-editar-inscripciones" class="labelForm">Opción:</label>
									<!-- <input type="text" class="form-control inputForm valid" value="" id="opcion-editar-inscripciones" name="opcion-editar-inscripciones" placeholder="" aria-invalid="false"> -->
									<div class="col-12 mb-1 t-left" style="font-size: 1.2em;">
										<label class="control control--radio mb-1">
											Sólo mañanas (50€)
											<input type="radio" name="opcion" value="solomanyana" checked required>
											<div class="control__indicator"></div>
										</label>
										<br>
										<label class="control control--radio mb-1">
											Días completos (80€)
											<input type="radio" name="opcion" value="diacompleto" >
											<div class="control__indicator"></div>
										</label>
										<br>
										<label class="control control--radio mb-1">
											Días sueltos
											<input type="radio" name="opcion" value="sueltos" id="radiodiassueltos">
											<div class="control__indicator"></div>
										</label>


									</div>


								</div>

								

								<div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<label for="importe-editar-inscripciones" class="labelForm">Importe:</label>
									<input type="number" class="form-control inputForm valid" value="" id="importe-editar-inscripciones" name="importe-editar-inscripciones" placeholder="" aria-invalid="false">

								</div>
								
								
							</div>

							<div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 t-left" style="font-size: 1.2em;">
                                    <label class="containerchekbox">
                                        <input type="checkbox" name="dia16" value="dia16" id="dia16">
                                        <span class="checkmark"></span>Día 16
                                    </label>
                                </div>

                                <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 mb-1" id="capa3" style="font-size: 14px; "> <!-- display: none; -->
                                    <label class="radio-inline pr-1">
                                        <input type="radio" name="rdia16" value="dia16-manyana" > Mañana
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="rdia16" value="dia16-completo"> Completo
                                    </label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 t-left" style="font-size: 1.2em;">
                                    <label class="containerchekbox">
                                        <input type="checkbox" name="dia17" value="dia17" id="dia17">
                                        <span class="checkmark"></span> Día 17
                                    </label>
                                </div>

                                <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-5 mb-1" id="capa4" style="font-size: 14px; "> <!-- display: none; -->
                                    <label class="radio-inline pr-1">
                                        <input type="radio" name="rdia17" value="dia17-manyana" > Mañana
                                    </label>
                                    <label class="radio-inline">
                                       <input type="radio" name="rdia17" value="dia17-completo"> Completo
                                   </label>
                               </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 t-left" style="font-size: 1.2em;">
                                    <label class="containerchekbox">
                                         <input type="checkbox" name="dia18" value="dia18" id="dia18">
                                        <span class="checkmark"></span> Día 18
                                    </label>
                                </div>

                                <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-5 mb-1" id="capa5" style="font-size: 14px; ">
                                    <label class="radio-inline pr-1">
                                        <input type="radio" name="rdia18" value="dia18-manyana" > Mañana
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="rdia18" value="dia18-completo"> Completo
                                    </label>
                                </div>
                            </div>
							

							
							
							<div class="clearfix"></div>


							<div class="row mt-1">
							

								<!-- PARTE 1 FORM - DATOS -->
								<div class="form-group col-12 alert alert-success" id="mensaje-editar" style="display: none;">
									<p>Inscripción editada correctamente.</p>
								</div>
							</div>

							<div class="clearfix"></div>

							<div class="row">
								<div class="form-group col-12 col-sm-12 col-md-5 offset-md-1 col-lg-4 offset-lg-2 col-xl-3 offset-xl-3">
									<input type="hidden" id="idInscripcion-editar-inscripciones" name="idInscripcion-editar-inscripciones" >  <!-- value="798" -->
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

		<script>
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

				//  Modal EDITAR / Cargar datos en el modal    
                $('body').on('click','.cargar_modal_editar_inscripcion',function()
                {
                    //  Borramos lo que podría estar rellenado anteriormente y la respuesta 
                    //  $('#administraciones-editar-form').trigger("reset");
                    //  $('#administraciones-editar-form-respuesta').html("");
                    $("#lista-espera").html(""); 
                    $("#lista-espera-guion").html("-"); 
                    
                    //  Recuperamos el id
                    var id          =   $(this).attr("id");
                    var array_id    =   id.split("-");
                    var form_data   =   {  id: array_id[0] };

                    //  error_log(__FILE__.__FUNCTION__.__LINE__);
           			//  error_log(print_r(array_id[0],1));

                    $.ajax({
                        type:       "POST",
                        url:        "?r=escuelafallas/MostrarModalEscuelaFallas",
                        data:       form_data,
                        dataType:   "json",
                        success:    function(data)
                        {
                            if(data.response==="success")
                            {
                                $("#idInscripcion-editar-inscripciones").val(data.instancia['id']);

                                $("#dni-editar-inscripciones").val(data.instancia['dni']);
                                $("#nombre-editar-inscripciones").val(data.instancia['nombre']);
                                $("#apellidos-editar-inscripciones").val(data.instancia['apellidos']);
                                $("#fechaN-editar-inscripciones").val(data.instancia['fechanacimiento']);
                                $("#club-editar-inscripciones").val(data.instancia['club']);
                                $("#direccion-editar-inscripciones").val(data.instancia['direccion']);
                                $("#numero-editar-inscripciones").val(data.instancia['numero']);
                                $("#piso-editar-inscripciones").val(data.instancia['piso']);
                                $("#puerta-editar-inscripciones").val(data.instancia['puerta']);
                                $("#poblacion-editar-inscripciones").val(data.instancia['poblacion']);
                                $("#cp-editar-inscripciones").val(data.instancia['cp']);
                                $("#provincia-editar-inscripciones").val(data.instancia['provincia']);

                                $("#genero-editar-inscripciones").val(data.instancia['genero']);
                               // $("#transporte-editar-inscripciones").val(data.instancia['transporte']);
                               // $("#alergias-editar-inscripciones").val(data.instancia['alergias']);
                               // $("#enfermedad-editar-inscripciones").val(data.instancia['enfermedades']);
                               // $("#tratamientosm-editar-inscripciones").val(data.instancia['tratamientosmedicos']);
                               // $("#operaciones-editar-inscripciones").val(data.instancia['intervencionesquirurgicas']);
                                $("#observ-editar-inscripciones").val(data.instancia['aspectomedico']);

                                $("#sintomascovid-editar-inscripciones").val(data.instancia['sintomascovid']);
                                $("#familiarcovid-editar-inscripciones").val(data.instancia['familiarcovid']);


                                $("#nombretutor-editar-inscripciones").val(data.instancia['nombretutor']);
                                $("#apellidostutor-editar-inscripciones").val(data.instancia['apellidostutor']);
                                $("#dnitutor-editar-inscripciones").val(data.instancia['dnitutor']);
                                $("#tlftutor-editar-inscripciones").val(data.instancia['telefonotutor']);
                                $("#emailtutor-editar-inscripciones").val(data.instancia['emailtutor']);

                                
								$("#sip-editar-inscripciones").val(data.instancia['ficherosubido1']);
								$("#transfer-editar-inscripciones").val(data.instancia['ficherosubido2']);
								$("#tipopago-editar-inscripciones").val(data.instancia['tipopago']);

								// $("#opcion-editar-inscripciones").val(data.instancia['opcion']);
								$("#importe-editar-inscripciones").val(data.instancia['importe']);

								//recogemos el tipo de inscripcion
								if (data.instancia['opcion']=="Mañanas"){
                                   
                                    $("input[name=opcion][value='solomanyana']").prop("checked",true);

                                } else if (data.instancia['opcion']=="Dia completo") {
                                    
                                    $("input[name=opcion][value='diacompleto']").prop("checked",true);
                                
                                } else if (data.instancia['opcion']=="Dias sueltos") {
                                    
                                    $("input[name=opcion][value='sueltos']").prop("checked",true);
                                }


                                //antes de recuperar los datos de los dias sueltos los desmarcamos todos
                                $("#dia16").prop('checked', false);
								$("#dia17").prop('checked', false);
								$("#dia18").prop('checked', false);
								$("input[name=rdia16][value='dia16-manyana']").prop("checked",false);
								$("input[name=rdia17][value='dia17-manyana']").prop("checked",false);
								$("input[name=rdia18][value='dia18-manyana']").prop("checked",false);
								$("input[name=rdia16][value='dia16-completo']").prop("checked",false);
								$("input[name=rdia17][value='dia17-completo']").prop("checked",false);
								$("input[name=rdia18][value='dia18-completo']").prop("checked",false);


                                //recogemos si hay dias sueltos
                                stringSeparado = data.instancia['diassueltos'].split('/');
                                

                                for (var i=1; i<stringSeparado.length; i++) {
                                	if (stringSeparado[i] == 'dia16-manyana') {
                                		console.log("Dia 16 Mañana");
                                		$("#dia16").prop('checked', true);
                                    	$("input[name=rdia16][value='dia16-manyana']").prop("checked",true);
                                    }
                                    else if (stringSeparado[i] == 'dia16-completo') {
                                		console.log("Dia 16 c");
                                		$("#dia16").prop('checked', true);
                                    	$("input[name=rdia16][value='dia16-completo']").prop("checked",true);

                                	} else if (stringSeparado[i] == 'dia17-manyana') {

                                		//console.log("Dia 17 Mañana");
                                		$("#dia17").prop('checked', true);
                                    	$("input[name=rdia17][value='dia17-manyana']").prop("checked",true);
                                	}
                                    else if (stringSeparado[i] == 'dia17-completo') {
                                		//console.log("Dia 17 campleto");
                                		$("#dia17").prop('checked', true);
                                    	$("input[name=rdia17][value='dia17-completo']").prop("checked",true);

                                	} else if (stringSeparado[i] == 'dia18-manyana') {
                                		$("#dia18").prop('checked', true);
                                    	$("input[name=rdia18][value='dia18-manyana']").prop("checked",true);
                                	}
                                	else if (stringSeparado[i] == 'dia18-completo') {
                                		//console.log("Dia 18 campleto");
                                		$("#dia18").prop('checked', true);
                                    	$("input[name=rdia18][value='dia18-completo']").prop("checked",true);

                                	}
                                }

                             
                            }
                            else
                            {   alert("Ha habido un problema al cargar los datos del formulario.");    }
                        },
                        error: function(errorData)
                        {
                            alert("Ha habido un problema al cargar los datos.");
                            console.log("error: "+errorData);
                        }
                    });
                });


				//  Modal Editar Inscripcion /  Formulario
                $("#form_editar_inscripciones").validate(
				{

					submitHandler: function(form)
					{
                    	
						var formData = new FormData();

						formData.append("idinscripcion",  	$("#idInscripcion-editar-inscripciones").val()); 
						formData.append("dnijugador",		$('#dni-editar-inscripciones').val()); 
				        formData.append("nombre", 			$('#nombre-editar-inscripciones').val()); 
				        formData.append("apellidos", 		$('#apellidos-editar-inscripciones').val()); 
				        	
				        formData.append("fechanac", 		$('#fechaN-editar-inscripciones').val()); 
				        formData.append("club", 			$('#club-editar-inscripciones').val()); 
				        formData.append("genero", 			$('#genero-editar-inscripciones').val()); 

				        formData.append("direccion",		$('#direccion-editar-inscripciones').val()); 
				        formData.append("numero", 			$('#numero-editar-inscripciones').val()); 
				        formData.append("piso",				$('#piso-editar-inscripciones').val()); 
				        formData.append("puerta", 			$('#puerta-editar-inscripciones').val()); 
				       	formData.append("poblacion", 		$('#poblacion-editar-inscripciones').val()); 
				        formData.append("cp", 				$('#cp-editar-inscripciones').val()); 
				       	formData.append("prov", 			$('#provincia-editar-inscripciones').val()); 

				        formData.append("nombretutor", 		$('#nombretutor-editar-inscripciones').val()); 
				        formData.append("apeltutor", 		$('#apellidostutor-editar-inscripciones').val()); 
				        formData.append("dnitutor", 		$('#dnitutor-editar-inscripciones').val()); 
				       	formData.append("tlftutor", 		$('#tlftutor-editar-inscripciones').val()); 
				        formData.append("email", 			$('#emailtutor-editar-inscripciones').val()); 

				      //  formData.append("alergias", 		$('#alergias-editar-inscripciones').val()); 
				      //  formData.append("tratam", 			$('#tratamientosm-editar-inscripciones').val()); 
				      // 	formData.append("transporte", 		$('#transporte-editar-inscripciones').val()); 

				       // formData.append("enfermedad", 		$('#enfermedad-editar-inscripciones').val()); 

				        formData.append("observ", 			$('#observ-editar-inscripciones').val()); 
				       // formData.append("operaciones", 		$('#operaciones-editar-inscripciones').val()); 

				        formData.append("sintomasc", 		$('#sintomascovid-editar-inscripciones').val()); 
				        formData.append("familiarc", 		$('#familiarcovid-editar-inscripciones').val()); 

				        
						formData.append("sipanterior", 		$('#sip-editar-inscripciones').val());   
				        formData.append('sipnuevo',        	$('#archivo_sip')[0].files[0]); 

				        formData.append("resguardoanterior", 		$('#transfer-editar-inscripciones').val());   
				        formData.append('resguardonuevo',        	$('#archivo_transfer')[0].files[0]); 


				        formData.append("opcion", 			$("input[name='opcion']:checked").val()); 
				        formData.append("tpago", 			$('#tipopago-editar-inscripciones').val()); 

				        console.log($("input[name='opcion']:checked").val());
				        console.log($("#dia16").prop('checked') + " -" +$("input[name='rdia16']:checked").val());

				        formData.append("dia16", 			$("#dia16").prop('checked')); 
				        formData.append("tipod16",			$("input[name='rdia16']:checked").val()); 

				        console.log($("#dia17").prop('checked')+ " -" +$("input[name='rdia17']:checked").val());
				        formData.append("dia17", 			$('#dia17').prop('checked'));
				        formData.append("tipod17",          $("input[name='rdia17']:checked").val()); 

				        console.log($("#dia18").prop('checked')+ " -" +$("input[name='rdia18']:checked").val());
                        formData.append("dia18",           $('#dia18').prop('checked'));
                        formData.append("tipod18",         $("input[name='rdia18']:checked").val());  
				       

						$.ajax({
                            type:           "POST",
                            url:            "?r=escuelafallas/UpdateInscripcionModalEscuelaFallas",
                            data:           formData,
                            processData:    false,          // tell jQuery not to process the data
                            contentType:    false,          // tell jQuery not to set contentType
                            dataType:       "json",
                            success: function(data)
                            {
                                if (data["response"] === "success")
                                {
										/*$("input[name='iban']").attr('style', 'border: 1px solid #ccc;');
										$("input[name='entidad']").attr('style', 'border: 1px solid #ccc;');
										$("input[name='oficina']").attr('style', 'border: 1px solid #ccc;');
										$("input[name='dc']").attr('style', 'border: 1px solid #ccc;');
										$("input[name='cuenta']").attr('style', 'border: 1px solid #ccc;');

										$('#cuenta-error').remove();*/

										$("#editar-cuenta-form-respuesta").html("<div class='alert alert-success'>" + data.message + "</div>");
										$("#editar-cuenta-form-respuesta").fadeTo(2000, 500).slideUp(500, function () {
											//$("#pagos-anyadir-respuesta").slideUp(500);
										});

										$("#mensaje-editar").show();
										/* $("#" + $("#IDInscripcion").val() + " .dni_titular_editar").text( $("#dnititular-editar-inscripciones").val() );
										$("#" + $("#IDInscripcion").val() + " .equipo").text( $("#modalidad-editar-inscripciones option:selected").text() );
										$("#" + $("#IDInscripcion").val() + " .nombre_editar").text( $("#nombre-editar-inscripciones").val() );
										$("#" + $("#IDInscripcion").val() + " .email_editar").text( $("#email-editar-inscripciones").val() );
										$("#" + $("#IDInscripcion").val() + " .modalidad_editar").text( $("#modalidad-editar-inscripciones option:selected").text() 
										 );*/
										setTimeout(function(){ $("#myModal").modal('hide') }, 2000);
									}
							}
						});
					}
				});


			});
		</script>
	</body>
</html>