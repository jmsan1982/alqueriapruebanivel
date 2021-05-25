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
										<i class="fa fa-home" aria-hidden="true" style="margin-right: 10px;"></i><b>SOLICITUDES DE LICENCIAS A LA FEDERACIÓN 2019 / 2020</b>
									</h2>
								</div>

								<div class="col-12">
									<h4 class="section-title text-center mt-0 mb-0" style="text-transform: none;">
										Puede ordenar las filas haciendo click en los títulos o buscar por cualquier campo de la tabla.
									</h4>
								</div>

								<div class="col-12 pl-0 pr-0">

									<?php 
										/* $div_warning="";
										if($datos['count_fotos_revisar']!=="0" || $datos['count_dnis_revisar']!=="0")
										{   $div_warning.='<div class="alert alert-danger" role="alert">';  }
										if($datos['count_fotos_revisar']!=="0")
										{   $div_warning.='<p class=""><i class="fa fa-info-circle" aria-hidden="true"></i> Fotos con tamaño a revisar: '.$datos['count_fotos_revisar'].'</p>';  }
										if($datos['count_dnis_revisar']!=="0")
										{   $div_warning.='<p class=""><i class="fa fa-info-circle" aria-hidden="true"></i> D.N.I. con tamaño a revisar: '.$datos['count_dnis_revisar'].'</p>';  }
										if($datos['count_fotos_revisar']!=="0" || $datos['count_dnis_revisar']!=="0")
										{   $div_warning.='</div>'; }
										echo $div_warning;
										*/
									?>

									<!-- 
									<form action="?r=campus/ExportToExcelInscripcionesCantera" method="post">
										<button type="submit" id="export_data_inscripciones_cantera" name='export_data_inscripciones_cantera' value="Export to excel" class="btn btn-info mb-1">Exportar a Excel (Cantera)</button>
									</form>
									-->

									<table id="solicitudeslicencia1920-listado-datatable" class="table table-striped table-hover w-100 mb-2" style="width: 100%;">
										<thead class="table-dark">
											<tr style="cursor: pointer;">
												<th class="text-center">Fecha</th>
												<th class="text-left">Solicitante</th>
												<th style="">Imágenes</th>
												<th style="">PDF</th>
											</tr>
										</thead>
										<tbody>
											<?php
												echo $datos['solicitudes_licencias'];
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

		<!-- Modal - Dar de baja / Alta inscripcion-->
		<div id="modal-eliminar-solicitud-licencia" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<label class="modal-title mb-0 pt-0 pb-0">Confirme la eliminación de la solicitud::</label>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

					<div class="modal-body">
						<form id="eliminar-solicitud-licencia-form" method="post">
							<div class="row mt-2">
								<div class="col-12">
									<h3 class="mt-0 mb-0 pb-0">¿Seguro que quiere eliminar esta solicitud de licencia?</h3>
								</div>
								<input type="hidden" id="eliminar-solicitud-licencia-id" value="">
							</div>

							<div class="row mt-2">
								<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-1">
									<button class="btn btn-info btn-block" type="submit">Sí, eliminar</button>
								</div>

								<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								   <button type="button" class="btn btn-empresas-activo btn-block w-100" style="height: 34px; margin: 0px; width: 100%;" data-dismiss="modal">
										No, cerrar
								   </button>
								</div>
							</div>
						</form>
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

		<script>
		$("document").ready(function()
		{
			function editar_imagen_licencias_federacion(id_licencia_federacion,ruta_archivo,operacion)
			{
				var form_data = {
					id_licenciafederacion:  id_licencia_federacion,
					ruta_archivo:           ruta_archivo,
					operacion:              operacion
				};

				$.ajax({
					type:       "POST",
					url:        "?r=index/EditarImagenLicenciaFederacion1920",
					data:       form_data,
					dataType:   "json",
					success: function (data)
					{
						$('#'+data.nombre_archivo).attr("src",data.nueva_ruta+"?timestamp="+new Date().getTime());
						$('#'+data.nombre_archivo+'-size').text(data.imagen_size);
					}
				});
			}

			$('body').on('click','.rotateleft',function(){
				var id_button               =   $(this).attr('id');
				var id_licenciafederacion   =   $(this).closest(".licenciafederacion").attr('id');
				editar_imagen_licencias_federacion(id_licenciafederacion,id_button,'rotateleft');
			});

			$('body').on('click','.rotateright',function(){
				var id_button               =   $(this).attr('id');
				var id_licenciafederacion   =   $(this).closest(".licenciafederacion").attr('id');
				editar_imagen_licencias_federacion(id_licenciafederacion,id_button,'rotateright');
			});

			$('body').on('click','.reducirimagen25',function(){
				var id_button               =   $(this).attr('id');
				var id_licenciafederacion   =   $(this).closest(".licenciafederacion").attr('id');
				editar_imagen_licencias_federacion(id_licenciafederacion,id_button,'reducirimagen25');
			});

			$('body').on('click','.reducirimagen50',function(){
				var id_button               =   $(this).attr('id');
				var id_licenciafederacion   =   $(this).closest(".licenciafederacion").attr('id');
				editar_imagen_licencias_federacion(id_licenciafederacion,id_button,'reducirimagen50');
			});

			$('body').on('click','.reducirimagen75',function(){
				var id_button               =   $(this).attr('id');
				var id_licenciafederacion   =   $(this).closest(".licenciafederacion").attr('id');
				editar_imagen_licencias_federacion(id_licenciafederacion,id_button,'reducirimagen75');
			});

			$('body').on('click','.reducirancho50',function(){
				var id_button               =   $(this).attr('id');
				var id_licenciafederacion   =   $(this).closest(".licenciafederacion").attr('id');
				editar_imagen_licencias_federacion(id_licenciafederacion,id_button,'reducirancho50');
			});

			$('body').on('click','.reset',function(){
				var id_button               =   $(this).attr('id');
				var id_licenciafederacion   =   $(this).closest(".licenciafederacion").attr('id');
				editar_imagen_licencias_federacion(id_licenciafederacion,id_button,'reset');
			});

			// Cargamos id de la solicitud de licencia de la federacion en el formulario eliminar 
			$('body').on('click','.cargar_modal_eliminar_solicitud_licencia',function(){
				alert("ola"+$(this).attr('id'));
				$("#eliminar-solicitud-licencia-id").val("");
				var id_via      =   $(this).attr('id');
				var array_id_via=   id_via.split("-");
				$("#eliminar-solicitud-licencia-id").val(array_id_via[4]);
			});

			// Formulario para eliminar una fila de solicitud de licencia de federacion. Esto es para los duplicados.
			$("#eliminar-solicitud-licencia-form").validate(
			{
				submitHandler: function(form)
				{
					var form_data = {
						debug:                  "true",
						id_licenciafederacion:  $("#eliminar-solicitud-licencia-id").val()
					};

					$.ajax({
						type:   "POST",
						url:    "?r=index/EliminarSolicitudLicenciaFederacion",
						data:   form_data,
						dataType: "json",
						success: function(data){
							$("#licenciafederacion-"+data['licenciasfederacion_id']).remove();
							$("#modal-eliminar-solicitud-licencia .close").click();
						}
					});
				}
			});
		});
		</script>
	</body>
</html>