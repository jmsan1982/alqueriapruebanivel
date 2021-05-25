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
										<i class="fa fa-home" aria-hidden="true" style="margin-right: 10px;"></i><b>ALTA INSCRIPCIONES</b>
									</h2>
								</div>

								<div class="col-12">
									<form id="form_editar_altas_inscripciones" class="boxed-form" name="contactform" method="post" novalidate="novalidate">
										<div class="container-fluid">
											<div class="row mt-1">
												<div class="form-group col-12 alert alert-success" id="mensaje-editar" style="display: none;">
													<p>Inscripción editada correctamente.</p>
												</div>

												<div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
													<label for="dni-alta" class="labelForm">* DNI Jugador:</label>
													<input type="text" style="-webkit-appearance: none; -moz-appearance: none;" class="form-control inputForm valid" id="dni-alta" name="dni-alta" aria-invalid="false" required>
												</div>

												<div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
													<label for="nombre-alta" class="labelForm">Nombre Y Apellidos:</label>
													<input type="text" style="-webkit-appearance: none; -moz-appearance: none;" class="form-control inputForm valid" id="nombre-alta" name="nombre-alta" aria-invalid="false" required>
												</div>
											</div>

											<div class="row mt-1">
												<div class="form-group col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
													<label for="categoria-alta" class="labelForm">Categoria:</label>
													<select style="-webkit-appearance: none; -moz-appearance: none;" name="categoria-alta" class="form-control w-100 inputForm valid" id="categoria-alta" required>
														<option value="ESCUELA">ESCUELA</option>
														<option value="CANTERA">CANTERA</option>
													</select>
												</div>

												<div class="form-group col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
													<label for="categoria-equipo" class="labelForm">Equipo:</label>
													<select style="-webkit-appearance: none; -moz-appearance: none;" name="equipo-alta" class="form-control w-100 inputForm valid" id="equipo-alta" required>
														<?php
															foreach ( $datos['equipos'] as $equipoA ) {
																echo '<option value="' . $equipoA["ID"] . '">' . $equipoA["equipo"] . '</option>';
															}
														?>
													</select>
												</div>

												<div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
													<label for="mail-alta" class="labelForm">Email:</label>
													<input type="text" style="-webkit-appearance: none; -moz-appearance: none;" class="form-control inputForm valid" id="mail-alta" name="mail-alta" aria-invalid="false" required>
												</div>
											</div>

											<div class="row">
												<div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
													<input type="hidden" id="IDInscripcionAlta" name="IDInscripcionAlta" value="0">
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
					</div>
				</div>
			</div>
		</div>

		<?php include 'includes/footer_back.php';?>

		<!-- Modal - Editar Inscripcion -->
		<div id="myModalDNI" class="modal fade in" role="dialog" aria-hidden="false" style="display: none;">
			<div class="modal-dialog" style="width: 90%">
				<div class="modal-content">
					<form id="form_editar_altas_inscripciones" class="boxed-form" name="contactform" method="post" novalidate="novalidate">
						<div class="container-fluid">
							<div class="row mt-1">
								<div class="form-group col-12 alert alert-success" id="mensaje-editar" style="display: none;">
									<p>Inscripción editada correctamente.</p>
								</div>

								<div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<label for="dni-alta" class="labelForm">* DNI Jugador:</label>
									<input type="text" style="-webkit-appearance: none; -moz-appearance: none;" class="form-control inputForm valid" id="dni-alta" name="dni-alta" aria-invalid="false" required>
								</div>

								<div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<label for="nombre-alta" class="labelForm">Nombre Y Apellidos:</label>
									<input type="text" style="-webkit-appearance: none; -moz-appearance: none;" class="form-control inputForm valid" id="nombre-alta" name="nombre-alta" aria-invalid="false" required>
								</div>
							</div>

							<div class="row mt-1">
								<div class="form-group col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
									<label for="categoria-alta" class="labelForm">Categoria:</label>
									<select style="-webkit-appearance: none; -moz-appearance: none;" name="categoria-alta" class="form-control w-100 inputForm valid" id="categoria-alta" required>
										<option value="ESCUELA">ESCUELA</option>
										<option value="CANTERA">CANTERA</option>
									</select>
								</div>

								<div class="form-group col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
									<label for="categoria-equipo" class="labelForm">Equipo:</label>
									<select style="-webkit-appearance: none; -moz-appearance: none;" name="equipo-alta" class="form-control w-100 inputForm valid" id="equipo-alta" required>
										<?php
											foreach ( $datos['equipos'] as $equipoA ) {
												echo '<option value="' . $equipoA["ID"] . '">' . $equipoA["equipo"] . '</option>';
											}
										?>
									</select>
								</div>
								<div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<label for="nombre-alta" class="labelForm">Email:</label>
									<input type="text" style="-webkit-appearance: none; -moz-appearance: none;" class="form-control inputForm valid" id="nombre-alta" name="nombre-alta" aria-invalid="false" required>
								</div>
							</div>

							<div class="row">
								<div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<input type="hidden" id="IDInscripcionAlta" name="IDInscripcionAlta" value="0">
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
				//  Datatable de inscripciones 
				$('#alta_inscripciones_listado').DataTable({
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
					$("#IDInscripcionAlta").val( $( this ).parent().parent().attr("id") );

					var form_data = {
						debug: "false",
						form_id: "inscripciones_cargar_contenido_inscripcion_original_conEquipoHorario",
						idinscripcion: $("#IDInscripcionAlta").val()
					};

					$.ajax({
							type: "POST",
							url: "?r=ajax/dispatcher",
							data: form_data,
							dataType: "json",
							success: function (data) {

								// console.log($("#IDInscripcionEditarDNI").val());
								$("#nombre-alta" ).val( data.datos.nombre_apellidos ); 
								$("#categoria-alta" ).val( data.datos.tipo ); 
								$("#dni-alta" ).val( data.datos.dni_jugador ); 
								$("#equipo-alta" ).val( data.datos.id_equipo_horario ); 

								//setTimeout(function(){ $("#myModalDNI").modal('hide') }, 2000); 
							}
						});
					
				});

				// IDInscripcionEditarDNI
				$("#form_editar_altas_inscripciones").validate({
					submitHandler: function(form) {
						var form_data = {
							debug: "false",
							form_id: "inscripciones_editar_alta",
							idinscripcion: $("#IDInscripcionAlta").val(),
							nombre_apellidos: $("#nombre-alta" ).val(),
							tipo: $("#categoria-alta option:selected" ).val(),
							dni_jugador: $("#dni-alta" ).val(),
							mail: $("#mail-alta" ).val(),
							id_equipo_horario: $("#equipo-alta option:selected" ).val()
						};

						$.ajax({
							type: "POST",
							url: "?r=ajax/dispatcher",
							data: form_data,
							//dataType: "json",
							success: function (data) {
								$("#mensaje-editar").show();
								//console.log($("#IDInscripcionEditarDNI").val());
								$("#nombre-alta" ).val("");
								$("#dni-alta" ).val("");
								$("#mail-alta" ).val("");

								setTimeout(function(){ $("#mensaje-editar").modal('hide') }, 2000); 
							}
						});
					}
				});
			});
		</script>
	</body>
</html>