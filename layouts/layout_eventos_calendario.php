<!DOCTYPE html>
<html lang="es">
	 
	<?php require('includes/head_back.php'); ?> 
	<link rel="stylesheet" href="css/bootstrap.min.css">     
	<link rel="stylesheet" href="css/parallax.css">    
	<link rel="stylesheet" href="css/calendario_eventos.css?v=2.1">  

	

	<body class="Pages">
		<?php require "includes/topbar_back.php"; ?>
		<?php
		//  require('includes/head_back.php');
		require('includes/calendario_eventos.php');
		?>

		<!-- Start Page-Content -->
		<section id="page-content" class="overflow-x-hidden margin-top-header">
            
			<div class="block mt-3">
				<div class="container-fluid">
					<div class="col-12 text-center">
						<h2 class="section-title mt-0 mb-0" style="color: #406da4;">
							<i class="fa fa-search" aria-hidden="true" style="margin-right: 10px;"></i><b>Consulta eventos</b>
						</h2>
					</div>	
				</div>	
			</div>

			<div class="schedule-block mt-3 mb-3">
				<div class="container">
					<div class="row">
						<!-- <div class="col-12 text-justify mt-1">
							<?php //echo $datos['calendario'][0]['nombre_evento'];?>
						</div> -->

						<!-- Calendario -->
						<div class="col-12" id="calendario-grande">
							<?php
								if (isset($_GET['nuevo_mes'])) {
									$mes = $_GET['nuevo_mes'];
									$ano = $_GET['nuevo_ano'];
								}
								else {
									$mes = date('m');
									$ano = date('Y');
								}
								//C:\xampp\htdocs\serviciosalqueria\includes\calendario_eventos.php:
								mostrar_calendario_grande($mes, $ano, date('d'), $datos);
							?>
						</div>

						<!-- Listado eventos para móvil -->
						<div class="col-12 hidden-sm hidden-md hidden-lg mt-1" id="eventos-mes">
							<div class="table-wrap">
								<h4 class="section-title">Eventos del mes seleccionado</h4>  <?php //echo $lang['cal_actividades_1'];?>
								<table class="table-1">
									<tbody>
										<?php
											$fila_class = "p-gray";
											$contador = 0;

											foreach ($datos['actividades_calendario'] as $evento) {
												$fecha = $evento['fecha'];
												$date = DateTime::createFromFormat("Y-m-d", $evento['fecha']);
												$date2 = DateTime::createFromFormat("Y-m-d", $evento['fechahasta']);

												$evento['Evento'] = str_replace("'","\'",$evento['Evento']);
												$evento['observ'] = str_replace("'","\'",$evento['observ']);
										?>
												<tr class="<?php echo $fila_class;($fila_class == "p-gray")?$fila_class = "p-liso":$fila_class = "p-gray";?>">
													<th class="t-left">
														<a style="display: inline;" onclick="miModal2('<?php echo trim($evento['Evento']);?>','<?php echo trim($evento['observ']);?>','<?php echo $datos['actividades_calendario_google_calendar_url'][$contador];?>','<?php echo $fecha;?>');">
															<span>
																<?php
																	if ($evento['fecha'] == $evento['fechahasta']) {
																		echo $date->format("d - ");
																	}
																	else {
																		echo "Del ".$date->format("d")." al ".$date2->format("d - ");
																	}
																?>
															</span>
															<?php
																echo substr(str_replace("\'","'", $evento['Evento']),0,20);
															?>
														</a>

														<button style="background-color: #eb7c00; color: white; border: none; padding: 10px; float: right;" onclick="miModal2('<?php echo trim($evento['Evento']);?>','<?php echo trim($evento['ruta_imagen_calendario_eventos_min']); ?>','<?php echo trim($evento['observ']); ?>','<?php echo $datos['actividades_calendario_google_calendar_url'][$contador];?>','<?php echo $fecha;?>');">
															<?php //echo $lang['cal_actividades_2'];?>
															<!-- <span class='texto_responsive' data-minitext='+ Info' data-text='Más Información'></span> -->
														</button>
													</th>
												</tr>
										<?php
												$contador++;
											}
										?>
									</tbody>
								</table>
							</div>
						</div>


					</div>
				</div>
			</div>
            
		</section>

		<!-- <div id="footer" class="hidden-xs" style="padding: 25px;">
				<div id="copyright">
					<p style="text-align: center;">
						&copy; L'Alqueria del Basket 2019 | <a href="http://tessq.com/" target="_blank" style="text-decoration: none;">Diseño Web por Tess Quality</a>
					</p>
				</div>
			</div> -->
		<!-- <?php //require('includes/footer.php'); ?>
		<?php //require('includes/cookies.php'); ?> -->

        
		<!--OK  Modal con los detalles del evento del calendario desde el calendario -->
		<div id="dialogo-detalles-evento" class="modal fade" role="dialog">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-title">Eventos del mes seleccionado</h3>  
						<button type="button" class="close" data-dismiss="modal"><i class="fa fa-close fa-2x"></i></button>   
					</div>
					<div class="modal-body">
						<div class="row" id="contenidototal">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="close" data-dismiss="modal" style="font-size: 20px; height: 40px;">
							<?php //echo $lang['cal_actividades_dialogo_2'];?>
							<span class='texto_responsive' data-minitext='Cerrar' data-text='Cerrar'></span>
						</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal con los detalles del evento del calendario desde la tabla -->
		<div id="dialogo-detalles-evento2" class="modal fade" role="dialog">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="modaltitle"></h4>
						<button type="button" class="close" data-dismiss="modal">
							<i class="fa fa-close"></i>
						</button>   
					</div>
					<div class="modal-body">
						<div class="row">
							<div id="imagen" class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">  
							</div>
							<div id="contenido" class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 t-justify">                          
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-link-w" data-dismiss="modal" style="font-size: 20px; height: 40px;">
							<?php //echo $lang['cal_actividades_dialogo_2'];?>
							<span class='texto_responsive' data-minitext='+ Info' data-text='Más Informaciónnnnn'></span>
						</button>
					</div>
				</div>
			</div>
		</div>

		
        <script src="js/libs.js"></script>
		<script src="js/common.js"></script>
        <script src="backmeans/assets/js/bootstrap.js"></script>
        
        
        <!-- Load Scripts Start -->
		<script>
			function miModal2(titulo, imagen, contenido, google, fecha){
				$.ajax({
					type: 'GET',
					url: 'includes/script_generarics_calendar.php?start='+fecha+'&end='+fecha+'&summary='+titulo+'&location=L\'Alqueria del Basket: C/. Bomber Ramon Duart s/n. C.P.: 46013 (València)&descripcion='+contenido,
					success:function(data){
						document.getElementById('modaltitle').innerHTML = titulo;
						document.getElementById('imagen').innerHTML = "<img class='img-thumbnail' src='" + imagen + "' width='100%' />";
						document.getElementById('contenido').innerHTML = contenido+"<div class='mt-2'><h4>Eventos del mes seleccionado</h4><a target='_blank' id='google-calendar-link' href='"+google+"' class='btn btn-link-w mb-1 w-100' style='font-size: 20px;height: 40px;'>Google Calendar</a><a id='ics-calendar-link' href='"+data+"' class='btn btn-link-w w-100' target='_blank' style='font-size: 20px;height: 40px;'>Outlook</a></div>";
						jQuery.noConflict();
						$('#dialogo-detalles-evento2').modal('show');
					}
				});
			}

			function miModal(fecha){
				//console.log("Entramos a mi modal");
				//console.log(fecha);
            
				var form_data = {
					fecha: fecha
				};
			
                $.ajax({
					type:       "POST",
					url:        "?r=calendario/CargaModalCalendarioActividades",
					data:       form_data,
					dataType:   "json",
					success:function(data)
                    {
                        //console.log("tenemos datos");

						$("#contenidototal").html(data.contenidototal);
						  //jQuery.noConflict();
						$('#dialogo-detalles-evento').modal('show');
					}, error:function(dataErr){
						console.log(" error");
					}
				});
			}

			/*var ancho = screen.width;
			setTimeout(function(){
				if(ancho >= 992){
					$("html, body").animate({scrollTop: 400}, 1200);
				}
				if(ancho < 992 && ancho > 768){
					$("html, body").animate({scrollTop: 600}, 1200);
				}
			}, 1500);*/
		</script>
        
		<!-- Load Scripts End -->
	</body>
</html>