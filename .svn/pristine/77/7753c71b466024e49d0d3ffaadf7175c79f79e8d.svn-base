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
										<i class="fa fa-home" aria-hidden="true" style="margin-right: 10px;"></i><b>ALTA EQUIPOS</b>
									</h2>
								</div>

								<div class="col-12">
									<form id="alta-equipo-form" class="boxed-form" method="post" novalidate="novalidate">
										<div class="container-fluid">
											<div class="row mt-1">
												<div class="form-group col-12 col-sm-12 offset-md-3 col-md-4 col-lg-4 col-xl-4">
													<label for="nombre-alta" class="labelForm">Nombre del nuevo equipo:</label>
													<input type="text" style="-webkit-appearance: none; -moz-appearance: none;" class="form-control inputForm valid" id="nombre-alta" name="nombre-alta" aria-invalid="false" required>
												</div>
												
												<div class="form-group col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
													<label for="id-submit-nuevo-equipo" class="labelForm">&nbsp;</label>
													<input type="hidden" id="IDInscripcionAlta" name="IDInscripcionAlta" value="0">
													<button type="submit" id="id-submit-nuevo-equipo" 
															class="btn btn-empresas-activo" name="editar_inspecciones" style="transform: skew(0deg); font-size: 15px; margin: 0 auto; height: 55px;">
														Crear equipo
													</button>
												</div>
											</div>
										</div>
									</form>
								</div>

								<div class="col-12 col-sm-12 offset-md-2 col-md-8 col-lg-8 col-xl-8">
									<hr>
									<h4>Listado de equipos:</h4>
									<table id="listado-equipos" class="table table-striped table-hover w-100 mb-2" style="width: 100%;">
										<thead class="table-dark">
											<tr style="cursor: pointer;">
												<th class="text-left">Nombre del equipo</th>
												<th class="text-left">Lunes</th>
												<th class="text-left">Martes</th>
												<th class="text-left">Miércoles</th>
												<th class="text-left">Jueves</th>
												<th class="text-center">Viernes</th>
											</tr>
										</thead>
										<tbody>
											<?php
												foreach ($datos['equipos'] as $equipo) {
													error_log($equipo['equipo']);
													echo '<tr id="' . $equipo['ID'] . '">
															<td class="text-left">' . $equipo['equipo'] . '</td>
															<td class="text-left">' . $equipo['lunes'] . '</td>
															<td class="text-left">' . $equipo['martes'] . '</td>
															<td class="text-left">' . $equipo['miercoles'] . '</td>
															<td class="text-left">' . $equipo['jueves'] . '</td>
															<td class="text-left">' . $equipo['viernes'] . '</td>
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

		<?php include 'includes/footer_back.php';?>

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
			$('document').ready(function ()
			{
				// Datatable
				//  Datatable de inscripciones 
				$('#listado-equipos').DataTable({
					"lengthMenu": [[100, -1], [100, "All"]],
					"order": [[0, "asc"]],
					"dom": '<"toolbar">frtip',
					"paging": "false",
					language: {
						"search": "",
						"searchPlaceholder": "Buscar",
						"lengthMenu": "Mostrando _MENU_ equipos por página",
						"zeroRecords": "No hemos encontrado equipos",
						"bPaginate": "false"
					}
				});

				// IDInscripcionEditarDNI
				$("#alta-equipo-form").validate({
					submitHandler: function(form) {
						if($("#nombre-alta").val()!="")
						{
							var form_data = {
								debug: "false",
								equipo: $("#nombre-alta").val()
							};

							$.ajax({
								type: "POST",
								url: "?r=ajax/AltaEquipo",
								data: form_data,
								dataType: "json",
								success: function(data)
								{
									alert(data.message);
									location.reload();
								}
							});
						}
					}
				});
			});
		</script>
	</body>
</html>