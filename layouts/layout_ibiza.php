<!DOCTYPE html>
<html lang="es">
	<?php require('includes/head.php'); ?>
	<link rel="stylesheet" href="css/forms.css">
	<link rel="stylesheet" href="css/parallax.css">
	<link rel="stylesheet" href="css/formus.css">

	<body class="Pages">
		<?php require('includes/header.php'); ?>

		<!-- Start Page-Content -->
		<section id="page-content" class="overflow-x-hidden margin-top-header">
			<div class="block">
				<div class="container-fluid">
					<div class="row">
						<div class="parallax col-12" style="background-image: url('img/cabecera-escuela-verano.jpg');">
						</div>
					</div>
				</div>
			</div>

			<div class="block background-f6">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="formulariocampusverano">
								<h3 class="section-title">
									<span class="orange-text">
										<?php echo $lang["ibiza_titulo"];?>
									</span>
								</h3>

								<br>

								<form enctype="multipart/form-data" action="?r=formularios/Ibiza" class="boxed-form" name="contactform" id="form_ibiza" method="post">
									<div class="row">
										<!-- SEMANAS-->
										<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
											<div class="form-group">
												<div class="row">
													<div class="col-12 t-left">
														<?php /*?>
														<div class="row">
															<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-7 t-left" style="font-size: 1.2em;" class="selector_semana_1">
																<label class="containerchekbox">
																	<input type="checkbox" name="semana1" id="semana1" value="semana1">
																	<span class="checkmark"></span><?php echo $lang["ibiza_semana1"];?>
																</label>
															</div>

															<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-5 mb-1" id="capa1" style="font-size: 14px; display: none;">
																<label class="radio-inline pr-1">
																	<input type="radio" name="rsem1" value="manyanas" checked> <?php echo $lang["ibiza_dias_sueltos_mañanas"];?>
																</label>
																</br>
																<label class="radio-inline">
																	 <input type="radio" name="rsem1" value="completo"> <?php echo $lang["ibiza_dias_sueltos_completo"];?> 
																</label>
																</br>
																<label class="radio-inline">
																	 <input type="radio" name="rsem1" value="pension"> <?php echo $lang["ibiza_dias_sueltos_pension"];?> 
																</label>
																</br>
																<label class="radio-inline">
																	 <input type="checkbox" name="rsem1_matinal" value="matinal"> <?php echo $lang["ibiza_dias_sueltos_matinal"];?> 
																</label>
															</div>
														</div>
														
														<?php */ ?>

														<div class="row">
															<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-7 t-left" style="font-size: 1.2em;">
																<label class="containerchekbox">
																	<input type="checkbox" name="semana2" id="semana2" value="semana2">
																	<span class="checkmark"></span> <?php echo $lang["ibiza_semana2"];?> 
																</label>
															</div>

															<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-5 mb-1" id="capa2" style="font-size: 14px; display: none;">
																<label class="radio-inline pr-1">
																	<input type="radio" name="rsem2" value="manyanas" checked> <?php echo $lang["ibiza_dias_sueltos_mañanas"];?>
																</label>
																</br>
																<label class="radio-inline">
																	<input type="radio" name="rsem2" value="completo"> <?php echo $lang["ibiza_dias_sueltos_completo"];?>
																</label>
																</br>
																<label class="radio-inline">
																	 <input type="radio" name="rsem2" value="pension"> <?php echo $lang["ibiza_dias_sueltos_pension"];?> 
																</label>
																</br>
																<label class="radio-inline">
																	 <input type="checkbox" name="rsem2_matinal" value="matinal"> <?php echo $lang["ibiza_dias_sueltos_matinal"];?> 
																</label>
															</div>
														</div>

														<div class="row">
															<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-7 t-left" style="font-size: 1.2em;">
																<label class="containerchekbox">
																	<input type="checkbox" name="semana3" id="semana3" value="semana3">
																	<span class="checkmark"></span> <?php echo $lang["ibiza_semana3"];?> 
																</label>
															</div>

															<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-5 mb-1" id="capa3" style="font-size: 14px; display: none;">
																<label class="radio-inline pr-1">
																	<input type="radio" name="rsem3" value="manyanas" checked> <?php echo $lang["ibiza_dias_sueltos_mañanas"];?>
																</label>
																</br>
																<label class="radio-inline">
																	 <input type="radio" name="rsem3" value="completo"> <?php echo $lang["ibiza_dias_sueltos_completo"];?>
																</label>
																</br>
																<label class="radio-inline">
																	 <input type="radio" name="rsem3" value="pension"> <?php echo $lang["ibiza_dias_sueltos_pension"];?> 
																</label>
																</br>
																<label class="radio-inline">
																	 <input type="checkbox" name="rsem3_matinal" value="matinal"> <?php echo $lang["ibiza_dias_sueltos_matinal"];?> 
																</label>
															</div>
														</div>

														<div class="row">
															<div class="col-6 t-left">
																<label class="containerchekbox">
																	<input type="checkbox" name="semana4" id="semana4" value="semana4">
																	<span class="checkmark"></span> <?php echo $lang["ibiza_texto_dias_sueltos"];?>
																</label>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<!-- SCRIPT PARA MOSTRAR LAS OPCIONES AL SELECCIONAR LA SEMANA -->
										<script type="text/javascript">
											$('[name="semana1"]').change(function(){
												$("#capa1").toggle();
											});

											$('[name="semana2"]').change(function(){
												$("#capa2").toggle();
											});

											$('[name="semana3"]').change(function(){
												$("#capa3").toggle();
											});

											$('[name="semana4"]').change(function(){
												$("#diassueltos").toggle();
											});
										</script>

										<!-- TABLA INFORMACIÓN -->
										<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
											<div class="contact-info-wrap t-center" style="background: none; background-color: #fafafa;">
												<div class="row pl-1 pr-1">
													<div class="col-12">
														<p class="t-left mt-0 mb-1" style="font-size: 14px; font-weight: bold;">
															<?php echo $lang["ibiza_titulo_tarjeta"];?>
														</p>
														<p class="t-left mt-0 mb-1" style="font-size: 14px;">
															<?php echo $lang["ibiza_tarjeta1"];?>
														</p>
														<p class="t-left mt-0 mb-1" style="font-size: 14px;">
															<?php echo $lang["ibiza_tarjeta2"];?>
														</p>
														<p class="t-left mt-0 mb-1" style="font-size: 14px;">
															<?php echo $lang["ibiza_tarjeta3"];?>
														</p>
														<p class="t-left mt-0 mb-1" style="font-size: 14px;">
															<?php echo $lang["ibiza_tarjeta4"];?>
														</p>
														<p class="t-left mt-0 mb-1" style="font-size: 14px;">
															<?php echo $lang["ibiza_tarjeta5"];?>
														</p>
														<p class="t-left mt-0 mb-1" style="font-size: 14px;">
															<?php echo $lang["ibiza_tarjeta6"];?>
														</p>
													</div>
												</div>
											</div>
										</div>
									</div>

									<!-- DÍAS SUELTOS-->
									<div class="row">
										<div class="col-12">
											<div class="form-group">
												<div class="row">
													<div class="col-12" style="display: none;" id="diassueltos">
														<div class="row">
															<?php /* ?>
															<div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 mb-1 dias_semana_1">
																
																<div class="row">
																	<div class="col-5 col-sm-4 col-md-4 col-lg-5 col-xl-4 t-left">
																		<label class="containerchekbox">
																			<input type="checkbox" name="dia1" value="dia27jl">
																			<span class="checkmark"></span> 27 <?php echo $lang["ibiza_julio"];?>
																		</label>
																	</div>

																	<div class="col-7 col-sm-8 col-md-8 col-lg-7 col-xl-8" id="capad1" style="font-size: 14px; display: none;">
																		<label class="radio-inline pr-1">
																			<input type="radio" name="rdia1" value="dia27jl-manyana" checked> <?php echo $lang["ibiza_dias_sueltos_mañanas"];?>
																		</label>
																		<label class="radio-inline">
																			<input type="radio" name="rdia1" value="dia27jl-completo"> <?php echo $lang["ibiza_dias_sueltos_completo"];?>
																		</label>
																		</br>
																		<label class="radio-inline">
																			 <input type="checkbox" name="rdia1_matinal" value="dia27jl-matinal"> <?php echo $lang["ibiza_dias_sueltos_matinal"];?> 
																		</label>
																	</div>
																</div>

																</br>

																<div class="row">
																	<div class="col-5 col-sm-4 col-md-4 col-lg-5 col-xl-4 t-left">
																		<label class="containerchekbox">
																			<input type="checkbox" name="dia2" value="dia28jl">
																			<span class="checkmark"></span> 28 <?php echo $lang["ibiza_julio"];?>
																		</label>
																	</div>

																	<div class="col-7 col-sm-8 col-md-8 col-lg-7 col-xl-8" id="capad2" style="font-size: 14px; display: none;">
																		<label class="radio-inline pr-1">
																			<input type="radio" name="rdia2" value="dia28jl-manyana" checked> <?php echo $lang["ibiza_dias_sueltos_mañanas"];?>
																		</label>
																		<label class="radio-inline">
																			<input type="radio" name="rdia2" value="dia28jl-completo"> <?php echo $lang["ibiza_dias_sueltos_completo"];?>
																		</label>
																		</br>
																		<label class="radio-inline">
																			 <input type="checkbox" name="rdia2_matinal" value="dia28jl-matinal"> <?php echo $lang["ibiza_dias_sueltos_matinal"];?> 
																		</label>
																	</div>
																</div>

																</br>

																<div class="row">
																	<div class="col-5 col-sm-4 col-md-4 col-lg-5 col-xl-4 t-left">
																		<label class="containerchekbox">
																			<input type="checkbox" name="dia3" value="dia29jl">
																			<span class="checkmark"></span> 29 <?php echo $lang["ibiza_julio"];?>
																		</label>
																	</div>

																	<div class="col-7 col-sm-8 col-md-8 col-lg-7 col-xl-8" id="capad3" style="font-size: 14px; display: none;">
																		<label class="radio-inline pr-1">
																			<input type="radio" name="rdia3" value="dia29jl-manyana" checked> <?php echo $lang["ibiza_dias_sueltos_mañanas"];?>
																		</label>
																		<label class="radio-inline">
																			<input type="radio" name="rdia3" value="dia29jl-completo"> <?php echo $lang["ibiza_dias_sueltos_completo"];?>
																		</label>
																		</br>
																		<label class="radio-inline">
																			 <input type="checkbox" name="rdia3_matinal" value="dia29jl-matinal"> <?php echo $lang["ibiza_dias_sueltos_matinal"];?> 
																		</label>
																	</div>
																</div>

																</br>

																<div class="row">
																	<div class="col-5 col-sm-4 col-md-4 col-lg-5 col-xl-4 t-left">
																		<label class="containerchekbox">
																			<input type="checkbox" name="dia4" value="dia30jl">
																			<span class="checkmark"></span> 30 <?php echo $lang["ibiza_julio"];?>
																		</label>
																	</div>

																	<div class="col-7 col-sm-8 col-md-8 col-lg-7 col-xl-8" id="capad4" style="font-size: 14px; display: none;">
																		<label class="radio-inline pr-1">
																			<input type="radio" name="rdia4" value="di30jl-manyana" checked> <?php echo $lang["ibiza_dias_sueltos_mañanas"];?>
																		</label>
																		<label class="radio-inline">
																			<input type="radio" name="rdia4" value="dia30jl-completo"> <?php echo $lang["ibiza_dias_sueltos_completo"];?>
																		</label>
																		</br>
																		<label class="radio-inline">
																			 <input type="checkbox" name="rdia4_matinal" value="dia30jl-matinal"> <?php echo $lang["ibiza_dias_sueltos_matinal"];?> 
																		</label>
																	</div>
																</div>

																</br>

																<div class="row">
																	<div class="col-5 col-sm-4 col-md-4 col-lg-5 col-xl-4 t-left">
																		<label class="containerchekbox">
																			<input type="checkbox" name="dia5" value="dia31jl">
																			<span class="checkmark"></span> 31 <?php echo $lang["ibiza_julio"];?>
																		</label>
																	</div>

																	<div class="col-7 col-sm-8 col-md-8 col-lg-7 col-xl-8" id="capad5" style="font-size: 14px; display: none;">
																		<label class="radio-inline pr-1">
																			<input type="radio" name="rdia5" value="dia31jl-manyana" checked> <?php echo $lang["ibiza_dias_sueltos_mañanas"];?>
																		</label>
																		<label class="radio-inline">
																			<input type="radio" name="rdia5" value="dia31jl-completo"> <?php echo $lang["ibiza_dias_sueltos_completo"];?>
																		</label>
																		</br>
																		<label class="radio-inline">
																			 <input type="checkbox" name="rdia5_matinal" value="dia31jl-matinal"> <?php echo $lang["ibiza_dias_sueltos_matinal"];?> 
																		</label>
																	</div>
																</div>

																</br>

																<div class="row">
																	<div class="col-5 col-sm-4 col-md-4 col-lg-5 col-xl-4 t-left">
																		<label class="containerchekbox">
																			<input type="checkbox" name="dia6" value="dia1ag">
																			<span class="checkmark"></span> 1 <?php echo $lang["ibiza_agosto"];?>
																		</label>
																	</div>

																	<div class="col-7 col-sm-8 col-md-8 col-lg-7 col-xl-8" id="capad6" style="font-size: 14px; display: none;">
																		<label class="radio-inline pr-1">
																			<input type="radio" name="rdia6" value="dia1ag-manyana" checked> <?php echo $lang["ibiza_dias_sueltos_mañanas"];?>
																		</label>
																		<label class="radio-inline">
																			<input type="radio" name="rdia6" value="dia1ag-completo"> <?php echo $lang["ibiza_dias_sueltos_completo"];?>
																		</label>
																		</br>
																		<label class="radio-inline">
																			 <input type="checkbox" name="rdia6_matinal" value="dia1ag-matinal"> <?php echo $lang["ibiza_dias_sueltos_matinal"];?> 
																		</label>
																	</div>
																</div>

																</br>
															</div> 
															<?php */?>

															<div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 mb-1 dias_semana_2">
																<div class="row">
																	<div class="col-5 col-sm-4 col-md-4 col-lg-5 col-xl-4 t-left">
																		<label class="containerchekbox">
																			<input type="checkbox" name="dia7" value="dia3ag">
																			<span class="checkmark"></span> 3 <?php echo $lang["ibiza_agosto"];?>
																		</label>
																	</div>

																	<div class="col-7 col-sm-8 col-md-8 col-lg-7 col-xl-8" id="capad7" style="font-size: 14px; display: none;">
																		<label class="radio-inline pr-1">
																			<input type="radio" name="rdia7" value="dia3ag-manyana" checked> <?php echo $lang["ibiza_dias_sueltos_mañanas"];?>
																		</label>
																		<label class="radio-inline">
																			<input type="radio" name="rdia7" value="dia3ag-completo"> <?php echo $lang["ibiza_dias_sueltos_completo"];?>
																		</label>
																		</br>
																		<label class="radio-inline">
																			 <input type="checkbox" name="rdia7_matinal" value="dia3ag-matinal"> <?php echo $lang["ibiza_dias_sueltos_matinal"];?> 
																		</label>
																	</div>
																</div>

																</br>

																<div class="row">
																	<div class="col-5 col-sm-4 col-md-4 col-lg-5 col-xl-4 t-left">
																		<label class="containerchekbox">
																			<input type="checkbox" name="dia8" value="dia4ag">
																			<span class="checkmark"></span> 4 <?php echo $lang["ibiza_agosto"];?>
																		</label>
																	</div>

																	<div class="col-7 col-sm-8 col-md-8 col-lg-7 col-xl-8" id="capad8" style="font-size: 14px; display: none;">
																		<label class="radio-inline pr-1">
																			<input type="radio" name="rdia8" value="dia4ag-manyana" checked> <?php echo $lang["ibiza_dias_sueltos_mañanas"];?>
																		</label>
																		<label class="radio-inline">
																			<input type="radio" name="rdia8" value="dia4ag-completo"> <?php echo $lang["ibiza_dias_sueltos_completo"];?>
																		</label>
																		</br>
																		<label class="radio-inline">
																			 <input type="checkbox" name="rdia8_matinal" value="dia4ag-matinal"> <?php echo $lang["ibiza_dias_sueltos_matinal"];?> 
																		</label>
																	</div>
																</div>

																</br>

																<div class="row">
																	<div class="col-5 col-sm-4 col-md-4 col-lg-5 col-xl-4 t-left">
																		<label class="containerchekbox">
																			<input type="checkbox" name="dia9" value="dia5ag">
																			<span class="checkmark"></span> 5 <?php echo $lang["ibiza_agosto"];?>
																		</label>
																	</div>

																	<div class="col-7 col-sm-8 col-md-8 col-lg-7 col-xl-8" id="capad9" style="font-size: 14px; display: none;">
																		<label class="radio-inline pr-1">
																			<input type="radio" name="rdia9" value="dia5ag-manyana" checked> <?php echo $lang["ibiza_dias_sueltos_mañanas"];?>
																		</label>
																		<label class="radio-inline">
																			<input type="radio" name="rdia9" value="dia5ag-completo"> <?php echo $lang["ibiza_dias_sueltos_completo"];?>
																		</label>
																		</br>
																		<label class="radio-inline">
																			 <input type="checkbox" name="rdia9_matinal" value="dia5ag-matinal"> <?php echo $lang["ibiza_dias_sueltos_matinal"];?> 
																		</label>
																	</div>
																</div>

																</br>

																<div class="row">
																	<div class="col-5 col-sm-4 col-md-4 col-lg-5 col-xl-4 t-left">
																		<label class="containerchekbox">
																			<input type="checkbox" name="dia10" value="dia6ag">
																			<span class="checkmark"></span> 6 <?php echo $lang["ibiza_agosto"];?>
																		</label>
																	</div>

																	<div class="col-7 col-sm-8 col-md-8 col-lg-7 col-xl-8" id="capad10" style="font-size: 14px; display: none;">
																		<label class="radio-inline pr-1">
																			<input type="radio" name="rdia10" value="dia6ag-manyana" checked> <?php echo $lang["ibiza_dias_sueltos_mañanas"];?>
																		</label>
																		<label class="radio-inline">
																			<input type="radio" name="rdia10" value="dia6ag-completo"> <?php echo $lang["ibiza_dias_sueltos_completo"];?>
																		</label>
																		</br>
																		<label class="radio-inline">
																			 <input type="checkbox" name="rdia10_matinal" value="dia10ag-matinal"> <?php echo $lang["ibiza_dias_sueltos_matinal"];?> 
																		</label>
																	</div>
																</div>

																</br>

																<div class="row">
																	<div class="col-5 col-sm-4 col-md-4 col-lg-5 col-xl-4 t-left">
																		<label class="containerchekbox">
																			<input type="checkbox" name="dia11" value="dia7ag">
																			<span class="checkmark"></span> 7 <?php echo $lang["ibiza_agosto"];?>
																		</label>
																	</div>

																	<div class="col-7 col-sm-8 col-md-8 col-lg-7 col-xl-8" id="capad11" style="font-size: 14px; display: none;">
																		<label class="radio-inline pr-1">
																			<input type="radio" name="rdia11" value="dia7ag-manyana" checked> <?php echo $lang["ibiza_dias_sueltos_mañanas"];?>
																		</label>
																		<label class="radio-inline">
																			<input type="radio" name="rdia11" value="dia7ag-completo"> <?php echo $lang["ibiza_dias_sueltos_completo"];?>
																		</label>
																		</br>
																		<label class="radio-inline">
																			 <input type="checkbox" name="rdia11_matinal" value="dia7ag-matinal"> <?php echo $lang["ibiza_dias_sueltos_matinal"];?> 
																		</label>
																	</div>
																</div>

																</br>

																<div class="row">
																	<div class="col-5 col-sm-4 col-md-4 col-lg-5 col-xl-4 t-left">
																		<label class="containerchekbox">
																			<input type="checkbox" name="dia12" value="dia8ag">
																			<span class="checkmark"></span> 8 <?php echo $lang["ibiza_agosto"];?>
																		</label>
																	</div>

																	<div class="col-7 col-sm-8 col-md-8 col-lg-7 col-xl-8" id="capad12" style="font-size: 14px; display: none;">
																		<label class="radio-inline pr-1">
																			<input type="radio" name="rdia12" value="dia8ag-manyana" checked> <?php echo $lang["ibiza_dias_sueltos_mañanas"];?>
																		</label>
																		<label class="radio-inline">
																			<input type="radio" name="rdia12" value="dia8ag-completo"> <?php echo $lang["ibiza_dias_sueltos_completo"];?>
																		</label>
																		</br>
																		<label class="radio-inline">
																			 <input type="checkbox" name="rdia12_matinal" value="dia8ag-matinal"> <?php echo $lang["ibiza_dias_sueltos_matinal"];?> 
																		</label>
																	</div>
																</div>

																</br>
															</div>

															<div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 mb-1 dias_semana_3">
																<div class="row">
																	<div class="col-5 col-sm-4 col-md-4 col-lg-5 col-xl-4 t-left">
																		<label class="containerchekbox">
																			<input type="checkbox" name="dia13" value="dia10ag">
																			<span class="checkmark"></span> 10 <?php echo $lang["ibiza_agosto"];?>
																		</label>
																	</div>

																	<div class="col-7 col-sm-8 col-md-8 col-lg-7 col-xl-8" id="capad13" style="font-size: 14px; display: none;">
																		<label class="radio-inline pr-1">
																			<input type="radio" name="rdia13" value="dia10ag-manyana" checked> <?php echo $lang["ibiza_dias_sueltos_mañanas"];?>
																		</label>
																		<label class="radio-inline">
																			<input type="radio" name="rdia13" value="dia10ag-completo"> <?php echo $lang["ibiza_dias_sueltos_completo"];?>
																		</label>
																		</br>
																		<label class="radio-inline">
																			 <input type="checkbox" name="rdia13_matinal" value="dia10ag-matinal"> <?php echo $lang["ibiza_dias_sueltos_matinal"];?> 
																		</label>
																	</div>
																</div>

																</br>

																<div class="row">
																	<div class="col-5 col-sm-4 col-md-4 col-lg-5 col-xl-4 t-left">
																		<label class="containerchekbox">
																			<input type="checkbox" name="dia14" value="dia11ag">
																			<span class="checkmark"></span> 11 <?php echo $lang["ibiza_agosto"];?>
																		</label>
																	</div>

																	<div class="col-7 col-sm-8 col-md-8 col-lg-7 col-xl-8" id="capad14" style="font-size: 14px; display: none;">
																		<label class="radio-inline pr-1">
																			<input type="radio" name="rdia14" value="dia11ag-manyana" checked> <?php echo $lang["ibiza_dias_sueltos_mañanas"];?>
																		</label>
																		<label class="radio-inline">
																			<input type="radio" name="rdia14" value="dia11ag-completo"> <?php echo $lang["ibiza_dias_sueltos_completo"];?>
																		</label>
																		</br>
																		<label class="radio-inline">
																			 <input type="checkbox" name="rdia14_matinal" value="dia11ag-matinal"> <?php echo $lang["ibiza_dias_sueltos_matinal"];?> 
																		</label>
																	</div>
																</div>

																</br>

																<div class="row">
																	<div class="col-5 col-sm-4 col-md-4 col-lg-5 col-xl-4 t-left">
																		<label class="containerchekbox">
																			<input type="checkbox" name="dia15" value="dia12ag">
																			<span class="checkmark"></span> 12 <?php echo $lang["ibiza_agosto"];?>
																		</label>
																	</div>

																	<div class="col-7 col-sm-8 col-md-8 col-lg-7 col-xl-8" id="capad15" style="font-size: 14px; display: none;">
																		<label class="radio-inline pr-1">
																			<input type="radio" name="rdia15" value="dia12ag-manyana" checked> <?php echo $lang["ibiza_dias_sueltos_mañanas"];?>
																		</label>
																		<label class="radio-inline">
																			<input type="radio" name="rdia15" value="dia12ag-completo"> <?php echo $lang["ibiza_dias_sueltos_completo"];?>
																		</label>
																		</br>
																		<label class="radio-inline">
																			 <input type="checkbox" name="rdia15_matinal" value="dia12ag-matinal"> <?php echo $lang["ibiza_dias_sueltos_matinal"];?> 
																		</label>
																	</div>
																</div>

																</br>

																<div class="row">
																	<div class="col-5 col-sm-4 col-md-4 col-lg-5 col-xl-4 t-left">
																		<label class="containerchekbox">
																			<input type="checkbox" name="dia16" value="dia13ag">
																			<span class="checkmark"></span> 13 <?php echo $lang["ibiza_agosto"];?>
																		</label>
																	</div>

																	<div class="col-7 col-sm-8 col-md-8 col-lg-7 col-xl-8" id="capad16" style="font-size: 14px; display: none;">
																		<label class="radio-inline pr-1">
																			<input type="radio" name="rdia16" value="dia13ag-manyana" checked> <?php echo $lang["ibiza_dias_sueltos_mañanas"];?>
																		</label>
																		<label class="radio-inline">
																			<input type="radio" name="rdia16" value="dia13ag-completo"> <?php echo $lang["ibiza_dias_sueltos_completo"];?>
																		</label>
																		</br>
																		<label class="radio-inline">
																			 <input type="checkbox" name="rdia16_matinal" value="dia13ag-matinal"> <?php echo $lang["ibiza_dias_sueltos_matinal"];?> 
																		</label>
																	</div>
																</div>

																</br>

																<div class="row">
																	<div class="col-5 col-sm-4 col-md-4 col-lg-5 col-xl-4 t-left">
																		<label class="containerchekbox">
																			<input type="checkbox" name="dia17" value="dia14ag">
																			<span class="checkmark"></span> 14 <?php echo $lang["ibiza_agosto"];?>
																		</label>
																	</div>

																	<div class="col-7 col-sm-8 col-md-8 col-lg-7 col-xl-8" id="capad17" style="font-size: 14px; display: none;">
																		<label class="radio-inline pr-1">
																			<input type="radio" name="rdia17" value="dia14ag-manyana" checked> <?php echo $lang["ibiza_dias_sueltos_mañanas"];?>
																		</label>
																		<label class="radio-inline">
																			<input type="radio" name="rdia17" value="dia14ag-completo"> <?php echo $lang["ibiza_dias_sueltos_completo"];?>
																		</label>
																		</br>
																		<label class="radio-inline">
																			 <input type="checkbox" name="rdia17_matinal" value="dia14ag-matinal"> <?php echo $lang["ibiza_dias_sueltos_matinal"];?> 
																		</label>
																	</div>
																</div>

																</br>

																<div class="row">
																	<div class="col-5 col-sm-4 col-md-4 col-lg-5 col-xl-4 t-left">
																		<label class="containerchekbox">
																			<input type="checkbox" name="dia18" value="dia15ag">
																			<span class="checkmark"></span> 15 <?php echo $lang["ibiza_agosto"];?>
																		</label>
																	</div>

																	<div class="col-7 col-sm-8 col-md-8 col-lg-7 col-xl-8" id="capad18" style="font-size: 14px; display: none;">
																		<label class="radio-inline pr-1">
																			<input type="radio" name="rdia18" value="dia15ag-manyana" checked> <?php echo $lang["ibiza_dias_sueltos_mañanas"];?>
																		</label>
																		<label class="radio-inline">
																			<input type="radio" name="rdia18" value="dia15ag-completo"> <?php echo $lang["ibiza_dias_sueltos_completo"];?>
																		</label>
																		</br>
																		<label class="radio-inline">
																			 <input type="checkbox" name="rdia18_matinal" value="dia15ag-matinal"> <?php echo $lang["ibiza_dias_sueltos_matinal"];?> 
																		</label>
																	</div>
																</div>

																</br>
															</div> 
														</div>
													</div>
												</div>
											</div>
										</div>

										<!-- SCRIPT PARA MOSTRAR LAS OPCIONES AL SELECCIONAR LOS DÍAS -->
										<script type="text/javascript">
											$('[name="dia1"]').change(function(){
												$("#capad1").toggle();
											});

											$('[name="dia2"]').change(function(){
												$("#capad2").toggle();
											});

											$('[name="dia3"]').change(function(){
												$("#capad3").toggle();
											});

											$('[name="dia4"]').change(function(){
												$("#capad4").toggle();
											});

											$('[name="dia5"]').change(function(){
												$("#capad5").toggle();
											});

											$('[name="dia6"]').change(function(){
												$("#capad6").toggle();
											});

											$('[name="dia7"]').change(function(){
												$("#capad7").toggle();
											});

											$('[name="dia8"]').change(function(){
												$("#capad8").toggle();
											});

											$('[name="dia9"]').change(function(){
												$("#capad9").toggle();
											});

											$('[name="dia10"]').change(function(){
												$("#capad10").toggle();
											});

											$('[name="dia11"]').change(function(){
												$("#capad11").toggle();
											});

											$('[name="dia12"]').change(function(){
												$("#capad12").toggle();
											});

											$('[name="dia13"]').change(function(){
												$("#capad13").toggle();
											});

											$('[name="dia14"]').change(function(){
												$("#capad14").toggle();
											});

											$('[name="dia15"]').change(function(){
												$("#capad15").toggle();
											});

											$('[name="dia16"]').change(function(){
												$("#capad16").toggle();
											});

											$('[name="dia17"]').change(function(){
												$("#capad17").toggle();
											});

											$('[name="dia18"]').change(function(){
												$("#capad18").toggle();
											});

											$("#radiodiassueltos").click(function(){
												if($("#radiodiassueltos").is(':checked')) {
													 $("#diassueltos").css("display", "block");
												}
												else {
													$("#diassueltos").css("display", "none");
												}
											});
										</script>
									</div>

									<!-- DATOS PARTICIPANTE -->
									<div class="form-group">
										<div class="row">
											<div class="col-12">
												<h4 class="section-title"><?php echo $lang["formulario_datos_niño"];?></h4>
											</div>

											<div class="col-12 col-md-3 col-lg-3 col-xl-3 redimension">
												<label><?php echo $lang["formulario_genero"];?>:
													<select class="form-control" style="color: #5c5c5c !important;" name="genero_ibiza" required="">
														<option value=""></option>
														<option value="Masculino"><?php echo $lang["formulario_genero_masculino"];?></option>
														<option value="Femenino"><?php echo $lang["formulario_genero_femenino"];?></option>
													</select>
												</label>
											</div>

											<div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
												<label><?php echo $lang["formulario_nombre"];?>:
													<input type="text" class="form-control" name="nombre_ibiza" maxlength="45" required>
												</label>
											</div>

											<div class="col-12 col-md-5 col-lg-5 col-xl-5 redimension">
												<label><?php echo $lang["formulario_apellidos"];?>:
													<input type="text" class="form-control" name="apellidos_ibiza" maxlength="45" required>
												</label>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-12 col-md-3 col-lg-3 col-xl-3 redimension">
												<label><?php echo $lang["formulario_cumpleaños"];?>:
													<input type="date" class="form-control" style="color: #5c5c5c !important;" id="fecha" name="fechanacimiento_ibiza" required>
												</label>
											</div>

											<div class="col-12 col-md-3 col-lg-3 col-xl-3 redimension">
												<label><?php echo $lang["formulario_dni"];?>:
													<input type="text" class="form-control" name="dni_ibiza" maxlength="10" required>
												</label>
											</div>

											<div class="col-12 col-md-6 col-lg-6 col-xl-6 redimension">
												<label><?php echo $lang["formulario_club"];?>
													<input type="text" class="form-control" name="club_ibiza" maxlength="45" required>
												</label>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-12 redimension">
												<label><?php echo $lang["formulario_aspecto_medico"];?>
													<textarea class="form-control" style="height: 85px; resize: none;" name="tratamientosmedicos_ibiza"></textarea>
												</label>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-12">
												<p class="t-left">
													<strong><?php echo $lang["formulario_autorizacion_medico"];?></strong>
												</p>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-12 redimension">
												<input type="file" id="fileName_ibiza" class="form-control" style="border: none !important; padding: 0 !important;" name="fotocopiasip_ibiza" aria-describedby="fileHelp" accept="image/gif,image/jpeg,image/jpg,image/png,image/bmp,application/pdf" required onchange="validateFileType()">
											</div>

											<div class="col-12">
												<p class="t-left" style="color: red;">
													<strong>
														<?php echo $lang["formulario_fotocopia_sip"];?>
													</strong>
												</p>
											</div>
										</div>
									</div>

									<!-- DATOS TUTOR -->
									<div class="form-group">
										<div class="row mt-2">
											<div class="col-12">
												<h4 class="section-title"><?php echo $lang["formulario_datos_tutor"];?>:</h4>
											</div>

											<div class="col-12 col-md-3 col-lg-3 col-xl-3 redimension">
												<label><?php echo $lang["formulario_nombre"];?>:
													<input type="text" class="form-control" name="nombretutor_ibiza" maxlength="45" required>
												</label>
											</div>

											<div class="col-12 col-md-5 col-lg-5 col-xl-5 redimension">
												<label><?php echo $lang["formulario_apellidos"];?>:
													<input type="text" class="form-control" name="apellidostutor_ibiza" maxlength="45" required>
												</label>
											</div>

											<div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
												<label><?php echo $lang["formulario_dni"];?>:
													<input type="text" class="form-control" name="dnitutor_ibiza" maxlength="10" required>
												</label>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-12 col-md-6 col-lg-6 col-xl-6 redimension">
												<label><?php echo $lang["formulario_direccion"];?>:
													<input type="text" class="form-control" name="direccion_ibiza" maxlength="45" required>
												</label>
											</div>

											<div class="col-12 col-md-2 col-lg-2 col-xl-2 redimension">
												<label><?php echo $lang["formulario_numero"];?>:
													<input type="text" class="form-control" name="numero_ibiza" maxlength="10">
												</label>
											</div>

											<div class="col-12 col-md-2 col-lg-2 col-xl-2 redimension">
												<label><?php echo $lang["formulario_piso"];?>:
													<input type="text" class="form-control" name="piso_ibiza" maxlength="10">
												</label>
											</div>

											<div class="col-12 col-md-2 col-lg-2 col-xl-2 redimension">
												<label><?php echo $lang["formulario_puerta"];?>:
													<input type="text" class="form-control" name="puerta_ibiza" maxlength="10">
												</label>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
												<label><?php echo $lang["formulario_codigo_postal"];?>:
													<input type="text" class="form-control" name="cp_ibiza" maxlength="10" required>
												</label>
											</div>

											<div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
												<label><?php echo $lang["formulario_provincia"];?>:
													<input type="text" class="form-control" name="provincia_ibiza" maxlength="25" required>
												</label>
											</div>

											<div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
												<label><?php echo $lang["formulario_poblacion"];?>:
													<input type="text" class="form-control" name="poblacion_ibiza" maxlength="45" required>
												</label>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-12 col-md-5 col-lg-5 col-xl-5 redimension">
												<label><?php echo $lang["formulario_telefono"];?>:
													<input type="text" class="form-control" name="telefonotutor_ibiza" maxlength="15" required>
												</label>
											</div>

											<div class="col-12 col-md-7 col-lg-7 col-xl-7 redimension">
												<label><?php echo $lang["formulario_correo"];?>:
													<input type="email" class="form-control" name="emailtutor_ibiza" maxlength="45" required>
												</label>
											</div>

											<div class="col-12">
												<p class="t-left" style="color: red;">
													<strong><?php echo $lang["formulario_aviso_email"];?></strong>
												</p>
											</div>
										</div>
									</div>

									<!-- POLÍTICAS Y TÉRMINOS -->
									<div class="row">
										<?php // require('includes/politica_cancelacion.php'); ?>
										<div class="col-12">
											<h3 class="section-title mb-0">
												<span class="orange-text"><?php echo $lang["politicas_titulo_cancelacion"];?></span>
											</h3>
										</div>

										<div class="col-12">
											<p>
												<?php echo $lang["politicas_texto_enlace"];?> <a href="https://www.alqueriadelbasket.com/?r=index/politicacancelacion&idioma=cas" style="color:orange"><?php echo $lang["enlace"];?></a>
											</p>
										</div>

										<div class="col-12">
											<h3 class="section-title mb-0">
												<span class="orange-text"><?php echo $lang["politicas_titulo_privacidad"];?></span>
											</h3>
											<h4 class="section-title mb-0"><?php echo $lang["politicas_subtitulo_privacidad"];?></h4>
										</div>

										<div class="col-12">
											<p>
												<?php echo $lang["politicas_texto_ley_organica"];?>
											</p>

											<label class="containerchekbox">
												<p>
													<input type="checkbox" name="autorizodatos_ibiza" value="si" required>
													<span class="checkmark"></span> 
													<?php echo $lang["politicas_check_productos"];?>
												</p>
											</label>

											<label class="containerchekbox">
												<p>
													<input type="checkbox" name="	" value="si" required>
													<span class="checkmark"></span> 
													<?php echo $lang["politicas_check_imagenes"];?>
												</p>
											</label>

											<p>
												<?php echo $lang["politicas_texto_cancelacion1"];?> <a href="https://www.alqueriadelbasket.com/?r=index/politicacancelacion&idioma=cas" target="_blank" style="font-weight: bold; color: #eb7c00;"><?php echo $lang["enlace_cancelacion"];?></a> <?php echo $lang["politicas_texto_cancelacion2"];?>
											</p>
										</div>

										<div class="col-12 mt-1 mb-1">
											<label class="containerchekbox">
												<input type="checkbox" name="autorizo_ibiza" value="si" required>
												<p><?php echo $lang["politicas_check_condiciones"];?></p>
												<span class="checkmark"></span>
											</label>
										</div>

										<div class="col-12 col-md-6 col-lg-6 col-xl-6 mb-2">
											<button type="submit" class="btn btn-link-w w-100" style="width: 100%; margin-left: 0;" id="oficina" name="enviar_ibiza" value="oficina">
												<span><?php echo $lang["boton_oficinas"];?></span>
											</button>
										</div>

										<div class="col-12 col-md-6 col-lg-6 col-xl-6 mb-2">
											<button type="submit" class="btn btn-link-w w-100" style="width: 100%; margin-left: 0;" id="tarjeta" name="enviar_ibiza" value="tarjeta">
												<span><?php echo $lang["boton_tarjetas"];?></span>
											</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<?php require('includes/footer.php'); ?>
		<?php require('includes/cookies.php'); ?>

		<!-- Load Scripts Start -->
		<script src="js/libs.js"></script>
		<script src="js/common.js"></script>

		<script>
			// Comprobamos las extensiones de imágenes que permitimos al subir un archivo.
			// Si no están permitidas se deshabilitan los botones de submit.
			function validateFileType() {
				var fileName = document.getElementById("fileName").value;
				var idxDot = fileName.lastIndexOf(".") + 1;
				var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();

				if (extFile=="jpg" || extFile=="jpeg" || extFile=="png" || extFile=="pdf" || extFile=="gif" || extFile=="bmp") {
					$("#tarjeta").prop('disabled', false);
					$("#oficina").prop('disabled', false);

					$("#tarjeta").addClass("btn-link-w");
					$("#tarjeta").addClass("w-100");

					$("#oficina").addClass("btn-link-w");
					$("#oficina").addClass("w-100");
				}
				else {
					alert("¡El formulario se ha bloqueado! \nVuelva a intentar subir un archivo de imagen o PDF válido. \n(Archivos de imagen admitidos: .JPG, .JPEG, .PNG, .GIF, .BMP y .PDF)");
					$("#tarjeta").prop('disabled', true);
					$("#oficina").prop('disabled', true);

					$("#tarjeta").removeClass("btn-link-w");
					$("#tarjeta").removeClass("w-100");

					$("#oficina").removeClass("btn-link-w");
					$("#oficina").removeClass("w-100");
				}
			}
				/*$("#semana1").on( "click", function() {
					if( $("#semana1").prop('checked') ){
						$(".dias_semana_1 input:checkbox").prop("disabled", true);
					}else{
						$(".dias_semana_1 input:checkbox").prop("disabled", false);
					}
				});	*/

				$("#semana2").on( "click", function() {
					if( $("#semana2").prop('checked') ){
						$(".dias_semana_2 input:checkbox").prop("disabled", true);
					}else{
						$(".dias_semana_2 input:checkbox").prop("disabled", false);
					}
				});	
				$("#semana3").on( "click", function() {
					if( $("#semana3").prop('checked') ){
						$(".dias_semana_3 input:checkbox").prop("disabled", true);
					}else{
						$(".dias_semana_3 input:checkbox").prop("disabled", false);
					}
				});			
			
		</script>
		<!-- Load Scripts End -->
	</body>
</html>