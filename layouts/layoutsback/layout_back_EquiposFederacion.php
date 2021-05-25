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

		input[type=number] {
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
										<i class="fa fa-home" aria-hidden="true" style="margin-right: 10px;"></i><b>EQUIPOS FEDERACIÓN</b>
									</h2>
								</div>

								<!--<div class="col-12">
									<h4 class="section-title text-center mt-0 mb-0" style="text-transform: none;">
										Puede ordenar las filas haciendo click en los títulos o buscar por cualquier campo de la tabla.
									</h4>
								</div>-->

								<div class="col-md-4">
									<table id="tabla-back-equipo-equiposfederacion" class="table table-striped table-hover w-100 mb-2" style="width: 100%;">
										<thead class="table-dark">
											<tr style="cursor: pointer;">
												<th class="text-center">
													Nombre Equipo <button type="button" class="btn add_back_equipos_federacion" id="btn_back-Equipo"> Añadir </button>
												</th>
											</tr>
										</thead>
										<tbody>
											<?php
												foreach ($datos['federacion_equipos'] as $equipo) {
													echo '<tr>
															<td>' . $equipo["Nombre"] . '</td>
														</tr>';
												}
											?>
										</tbody>
									</table>
								</div>

								<div class="col-md-4">
									<table id="tabla-back-categoria-equiposfederacion" class="table table-striped table-hover w-100 mb-2" style="width: 100%;">
										<thead class="table-dark">
											<tr style="cursor: pointer;">
												<th class="text-center">
													Nombre Categoria <button type="button" class="btn add_back_equipos_federacion"  id="btn_back-Categoria"> Añadir </button>
												</th>
											</tr>
										</thead>
										<tbody>
											<?php
												foreach ($datos['federacion_categorias'] as $categoria) {
													echo '<tr><td>' . $categoria["Nombre"] . '</td></tr>';
												}
											?>
										</tbody>
									</table>
								</div>

								<div class="col-md-4">
									<table id="tabla-back-club-equiposfederacion" class="table table-striped table-hover w-100 mb-2" style="width: 100%;">
										<thead class="table-dark">
											<tr>
												<th class="text-center">Nombre Club
													<button type="button" class="btn add_back_equipos_federacion" id="btn_back-Club"> Añadir </button>
												</th>
											</tr>
										</thead>
										<tbody>
											<?php
												foreach ($datos['federacion_clubs'] as $club) {
													echo '<tr>
															<td>' . $club["Nombre"] . '</td>
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

		<!-- Modal -->
		<div class="modal fade" id="add_back_equipos_federacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" class="nombreModal" id="tituloModal">Modal title</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

					<form id="add-campo" method="post">
						<div class="modal-body">
							<div class="alert alert-success" id="mensajeSucess">Campo ingresado correctamente</div>
							<div class="alert alert-danger" id="mensajeError">Ha habido un problema</div>
							<label>
								Escriba el nombre para añadir en <label class="nombreModal"></label>
								<br>
								<input type="text" name="valor_nuevo_campo">
							</label>
							<input type="hidden" name="valor_tabla" id="valor_tabla">
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
							<button type="submit" class="btn btn-primary">Añadir</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<?php include 'includes/footer_back.php';?>

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

		<script>
			$("document").ready(function()
			{

				$("#mensajeSucess").hide();
				$("#mensajeError").hide();
				
				$( ".add_back_equipos_federacion" ).on( "click", function()
				{
					var tabla = $( this ).attr( "id" ).slice( $( this ).attr( "id" ).indexOf("-") + 1 );
					$(".nombreModal").text(tabla);
					$("#tituloModal").text(tabla);

					switch(tabla) {
						case "Equipo":
							$("#valor_tabla").val("federacion_equipos");
						break;

						case "Categoria":
							$("#valor_tabla").val("federacion_categorias");
						break;

						case "Club":
							$("#valor_tabla").val("federacion_clubs");
						break;
					}

					$("#add_back_equipos_federacion").modal('show'); 
				});

				$('#add-campo').validate({
					submitHandler:function(){
						$.ajax({
							type: "POST",
							url:  "?r=index/addCampoFederacion",
							data: $('#add-campo').serialize(),
							success: function(data){
								$("#mensajeSucess").show();
								setTimeout(function(){ location.reload(); }, 2000);
							},error: function(msn){
								$("#mensajeError").show();
							}
						});

						return false;
					}
				});

			});
		</script>
	</body>
</html>