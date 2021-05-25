<!DOCTYPE html>
<html lang="es">
	<?php require "includes/head_back.php"; ?>

	<style>
		.inputForm {
			border: #eb7c00 2px solid !important;
			height: 59px;
		}

		.labelForm {
			height: 37px;
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
										<i class="fa fa-home" aria-hidden="true" style="margin-right: 10px;"></i><b>Escuela y Cantera Temporada 18/19</b>
									</h2>
								</div>

								<div class="col-12">
									<h4 class="section-title text-center mt-0 mb-0" style="text-transform: none;">
										Puede ordenar las filas haciendo click en los títulos o buscar por cualquier campo de la tabla.
									</h4>

									<table id="inscripciones-listado-datatable" class="table table-striped table-hover w-100 mb-2 inscripciones-jornadas-deteccion" style="width: 100%;">
										<thead class="table-dark">
											<tr style="cursor: pointer;">
												<th class="text-center">Fecha</th>
												<th class="text-center">Nº Pedido</th>
												<th class="text-center">DNI Tutor</th>
												<th>Nombre</th>
												<th>Email</th>
												<th>Equipo Temporada 18/19</th>
												<th>Equipo Temporada 19/20</th>
												<th class="text-center">Categoría</th>
												<th class="text-center">Teléfono Padre</th>
												<th class="text-center">Teléfono Madre</th>
												<th class="text-center">Inscripción</th>
											</tr>
										</thead>
										<tbody>
											<?php
												foreach ($datos['todasinscripciones'] as $inscripcion) {

													if ($inscripcion['pagado_ok'] == "1" || $inscripcion['pagado_ok'] === 1) {
														$string_pagado = 'Sí';
														$string_importe = 50;
													}
													else {
														$string_importe = 0;
													}

													$date = new DateTime($inscripcion['fecha']);

													echo '<tr id="' . $inscripcion['id_formulario'] . '">
															<td class="text-center">' . $date->format('d/m/Y') . '</td>
															<td class="text-center">' . $inscripcion['numero_pedido'] . '</td>
															<td class="text-center valor_dni_tutor">' . $inscripcion['dni_tutor'] . '</td>
															<td class="text-left">' . $inscripcion['nombre_apellidos'] . '</td>
															<td class="text-left">' . $inscripcion['email'] . '</td>
															<td class="text-left valor_equipoAntiguo">' . $inscripcion['modalidad'] . '</td>
															<td class="text-left valor_equipo">' . $inscripcion['equipo'] . '</td>
															<td class="text-center valor_categoria">' . $inscripcion['categoria'] . '</td>
															<td class="text-center">' . $inscripcion['telefono_padre'] . '</td>
															<td class="text-center">' . $inscripcion['telefono_madre'] . '</td>
															<td class="text-center"><a data-toggle="modal" data-target="#myModalDNI" class="cargar_modal_editar_dni">
																	<i class="fa fa-edit fa-2x" style="font-size: 1.5em;" data-toggle="tooltip" data-placement="bottom" title="Editar Inscripción"></i>
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

		<!-- Modal - Editar Inscripcion -->
		<div id="myModalDNI" class="modal fade in" role="dialog" aria-hidden="false" style="display: none;">
			<div class="modal-dialog" style="width: 90%">
				<div class="modal-content">
					<form id="form_editar_inscripciones_dni" class="boxed-form" name="contactform" method="post" novalidate="novalidate">
						<div class="container-fluid">
							<div class="row mt-1">
								<div class="form-group col-12 alert alert-success" id="mensaje-editar" style="display: none;">
									<p>Inscripción editada correctamente.</p>
								</div>

								<div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<label for="dnititular-editar-dni" class="labelForm">* DNI TUTOR:</label>
									<input type="text" style="-webkit-appearance: none; -moz-appearance: none;" class="form-control inputForm valid" id="dnititular-editar-dni" name="dnititular-editar-dni" aria-invalid="false" required>
								</div>

								<div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<label for="categoria-editar-dni" class="labelForm">Modalidad:</label>
									<select style="-webkit-appearance: none; -moz-appearance: none;" name="categoria-editar-dni" class="form-control w-100 inputForm valid" id="categoria-editar-dni" required>
										<option value="escuela">Escuela</option>
										<option value="cantera">Cantera</option>
									</select>
								</div>
							</div>

							<div class="row mt-1">
								<div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<label for="equipo-editar-dni" class="labelForm">Equipo 19/20:</label>
									<select style="-webkit-appearance: none; -moz-appearance: none;" name="equipo-editar-dni" class="form-control w-100 inputForm valid" id="equipo-editar-dni" required>
										<?php
											foreach ( $datos['equipos'] as $equipo ) {
												echo '<option value="' . $equipo["ID"] . '">' . $equipo["equipo"] . '</option>';
											}
										?>
									</select>
								</div>

								<div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<label for="equipoAntiguo-editar-dni" class="labelForm">Equipo 18/19:</label>
									<select style="-webkit-appearance: none; -moz-appearance: none;" name="equipoAntiguo-editar-dni" class="form-control w-100 inputForm valid" id="equipoAntiguo-editar-dni" required>
										<?php
											foreach ( $datos['equipos_antiguos'] as $equipoA ) {
												echo '<option value="' . $equipoA["modalidad"] . '">' . $equipoA["modalidad"] . '</option>';
											}
										?>
									</select>
								</div>
							</div>

							<div class="row">
								<div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<input type="hidden" id="IDInscripcionEditarDNI" name="IDInscripcionEditarDNI" value="0">
									<button type="submit" class="btn btn-empresas-activo mt-2" name="editar_inspecciones" style="transform: skew(0deg); font-size: 15px; margin: 0 auto; height: 55px;">
										Guardar
									</button>
								</div>

								<div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
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

		<script type="text/javascript">
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
					$('[data-toggle="tooltip"]').tooltip();
				})

				$( ".cargar_modal_editar_dni" ).on( "click", function() {
					$("#mensaje-editar").hide();                       
					$("#IDInscripcionEditarDNI").val( $( this ).parent().parent().attr("id") );
					$("#dnititular-editar-dni").val( $("#" + $("#IDInscripcionEditarDNI").val() + " .valor_dni_tutor").text() );
					if( $("#" + $("#IDInscripcionEditarDNI").val() + " .valor_categoria").text() == "cantera" ){
						$("#categoria-editar-dni").val( "cantera" );
					}
					else{
						$("#categoria-editar-dni").val( "escuela" );
					}
				});

				// IDInscripcionEditarDNI
				$("#form_editar_inscripciones_dni").validate({
					rules: {
						"dnititular-editar-dni": {
							required: true,
							minlength:9,
							maxlength:9
						}
					},
					messages: {
						"dnititular-editar-dni": {
							required: "El campo es obligatorio.",
							minlength: "El campo DNI debe tener una longitud de 9 dígitos.",
							maxlength:"El campo DNI debe tener una longitud de 9 dígitos."
						}
					},
					submitHandler: function(form) {
						var form_data = {
							debug: "false",
							form_id: "inscripciones_editar_dni_tutor",
							idinscripcion: $("#IDInscripcionEditarDNI").val(),
							equipo: $("#equipo-editar-dni option:selected").val(),
							equipoAntiguo: $("#equipoAntiguo-editar-dni option:selected").val(),
							categoria: $("#categoria-editar-dni option:selected").val(),
							dni: $("#dnititular-editar-dni").val()
						};

						$.ajax({
							type: "POST",
							url: "?r=ajax/dispatcher",
							data: form_data,
							//dataType: "json",
							success: function (data) {
								$("#mensaje-editar").show();
								//console.log($("#IDInscripcionEditarDNI").val());
								$("#" + $("#IDInscripcionEditarDNI").val() + " .valor_dni_tutor" ).text( $("#dnititular-editar-dni").val() ); 
								$("#" + $("#IDInscripcionEditarDNI").val() + " .valor_equipo" ).text( $("#equipo-editar-dni option:selected").text() );
								$("#" + $("#IDInscripcionEditarDNI").val() + " .valor_categoria" ).text( $("#categoria-editar-dni option:selected").val() );
								$("#" + $("#IDInscripcionEditarDNI").val() + " .valor_equipoAntiguo" ).text( $("#equipoAntiguo-editar-dni option:selected").val() );

								setTimeout(function(){ $("#myModalDNI").modal('hide') }, 2000); 
							}
						});
					}
				});
			});
		</script>
	</body>
</html>