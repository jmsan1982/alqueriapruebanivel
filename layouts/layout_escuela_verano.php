<!DOCTYPE html>
<html lang="es">
	<?php require('includes/head.php'); ?>
	<link rel="stylesheet" href="css/forms.css">
	<link rel="stylesheet" href="css/parallax.css">
	<link rel="stylesheet" href="css/formus.css">

	<body class="Pages">
		<?php require('includes/header.php'); ?>
        <?php 
            //  Por si queremos programar el cierre de alguna turno a partir de una fecha y hora
            //$now    = date("Y-m-d H:i:s");
            //$date   = "2020-07-01 20:00:00";  
            //$ocultamosdiv="";
            //if($now < $date)
            //{}
            //else
            //{}
        ?>
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
										<?php echo $lang["escuela_verano_alqueria_titulo"];?>
									</span>
								</h3>

                                <?php
                                    // Descomentar el siguiente <div> para mostrar mensaje de inscripciones cerradas
                                    /*<div class="form-group mb-1">
                                        <div class="alert alert-danger redimension" role="alert">
                                            <h4><i class="fa fa-info-circle" aria-hidden="true"></i> <?php echo $lang["inscripciones_cerradas"];?></h4>
                                        </div>
                                    </div>*/
                                ?>

								<br>

								<form enctype="multipart/form-data" action="?r=escuelaverano/EscuelaVeranoForm" class="boxed-form" name="contactform" method="post">
									<div class="row">
										<!-- SEMANAS-->
										<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
											<div class="form-group">
												<div class="row">
													<div class="col-12 t-left">
                                            
                                                        <!-- Semana 1 -->
														<div class="row">
															<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-7 t-left">
																<label class="containerchekbox">
																	<input type="checkbox" name="semana1" id="semana1" value="semana1">
																	<span class="checkmark"></span> <?php echo $lang["escuela_verano_alqueria_semana1"];?>
																</label>
															</div>

															<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-5 mb-1" id="capa1" style="font-size: 14px; display: none;">
																<label class="radio-inline pr-1">
																	<input type="radio" name="rsem1" value="manyanas" checked> <?php echo $lang["escuela_verano_alqueria_dias_sueltos_mañanas"];?>
																</label>
																<label class="radio-inline">
																	 <input type="radio" name="rsem1" value="completo"><?php echo $lang["escuela_verano_alqueria_dias_sueltos_completo"];?> 
																</label>
															</div>
														</div>

                                                        <!-- Semana 2 -->
														<div class="row">
                                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-7 t-left" style="font-size: 1.2em;">
																<label class="containerchekbox">
																	<input type="checkbox" name="semana2" id="semana2" value="semana2">
																	<span class="checkmark"></span> <?php echo $lang["escuela_verano_alqueria_semana2"];?>
																</label>
															</div>

															<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-5 mb-1" id="capa2" style="font-size: 14px; display: none;">
																<label class="radio-inline pr-1">
																	<input type="radio" name="rsem2" value="manyanas" checked> <?php echo $lang["escuela_verano_alqueria_dias_sueltos_mañanas"];?>
																</label>
																<label class="radio-inline">
																	 <input type="radio" name="rsem2" value="completo"> <?php echo $lang["escuela_verano_alqueria_dias_sueltos_completo"];?> 
																</label>
															</div>
														</div>

                                                        <!-- Semana 3 -->
                                                        <div class="row">
                                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-7 t-left" style="font-size: 1.2em;">
                                                                <label class="containerchekbox">
                                                                    <input type="checkbox" name="semana3" id="semana3" value="semana3">
                                                                    <span class="checkmark"></span> <?php echo $lang["escuela_verano_alqueria_semana3"]."";?>
                                                                </label>
                                                            </div>

                                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-5 mb-1" id="capa3" style="font-size: 14px; display: none;">
                                                                <label class="radio-inline pr-1">
                                                                    <input type="radio" name="rsem3" value="manyanas" checked> <?php echo $lang["escuela_verano_alqueria_dias_sueltos_mañanas"];?>
                                                                </label>
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="rsem3" value="completo"> <?php echo $lang["escuela_verano_alqueria_dias_sueltos_completo"];?>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        
                                                        <!-- Semana 4 - Cerrado desde 9 de julio -->
														<div class="row">
															<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-7 t-left" style="font-size: 1.2em;">
																<label class="containerchekbox">
																	<input type="checkbox" name="semana4" id="semana4" value="semana4">
																	<span class="checkmark"></span> <?php echo $lang["escuela_verano_alqueria_semana4"]."";?> 
																</label>
															</div>

															<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-5 mb-1" id="capa4" style="font-size: 14px; display: none;">
																<label class="radio-inline pr-1">
																	<input type="radio" name="rsem4" value="manyanas" checked> <?php echo $lang["escuela_verano_alqueria_dias_sueltos_mañanas"];?>
																</label>
																<label class="radio-inline">
																	 <input type="radio" name="rsem4" value="completo"> <?php echo $lang["escuela_verano_alqueria_dias_sueltos_completo"];?>
																</label>
															</div>
														</div>

                                                        <!-- Semana 5 Cerrado 18 julio -->
														<div class="row">
															<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-7 t-left" style="font-size: 1.2em;">
																<label class="containerchekbox">
																	<input type="checkbox" name="semana5" id="semana5" value="semana5">
																	<span class="checkmark"></span> <?php echo $lang["escuela_verano_alqueria_semana5"]."";?> 
																</label>
															</div>

															<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-5 mb-1" id="capa5" style="font-size: 14px; display: none;">
																<label class="radio-inline pr-1">
																	<input type="radio" name="rsem5" value="manyanas" checked> <?php echo $lang["escuela_verano_alqueria_dias_sueltos_mañanas"];?>
																</label>
																<label class="radio-inline">
																	<input type="radio" name="rsem5" value="completo"> <?php echo $lang["escuela_verano_alqueria_dias_sueltos_completo"];?>
																</label>
															</div>
														</div>

                                                        <!-- Semana 6 Cerrado 27 julio -->
														<!-- <div class="row">
															<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-7 t-left" style="font-size: 1.2em;">
																<label class="containerchekbox">
																	<input type="checkbox" name="semana6" id="semana6" value="semana6">
																	<span class="checkmark"></span> <?php //echo $lang["escuela_verano_alqueria_semana6"];?> 
																</label>
															</div>

															<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-5 mb-1" id="capa6" style="font-size: 14px; display: none;">
																<label class="radio-inline pr-1">
																	<input type="radio" name="rsem6" value="manyanas" checked> <?php //echo $lang["escuela_verano_alqueria_dias_sueltos_mañanas"];?>
																</label>
																<label class="radio-inline">
																	<input type="radio" name="rsem6" value="completo"> <?php //echo $lang["escuela_verano_alqueria_dias_sueltos_completo"];?>
																</label>
															</div>
														</div> -->

														<div class="row">
															<div class="col-6 t-left">
																<label class="containerchekbox">
																	<input type="checkbox" name="semana7" id="semana7" value="semana7">
																	<span class="checkmark"></span> <?php echo $lang["escuela_verano_alqueria_dias_sueltos"];?>
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
												$("#capa4").toggle();
											});

											$('[name="semana5"]').change(function(){
												$("#capa5").toggle();
											});

											/*$('[name="semana6"]').change(function(){
												$("#capa6").toggle();
											}); */

											$('[name="semana7"]').change(function(){
												$("#diassueltos").toggle();
											});
										</script>

										<!-- TABLA INFORMACIÓN -->
										<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
											<div class="contact-info-wrap t-center" style="background: none; background-color: #fafafa;">
												<div class="row pl-1 pr-1">
													<div class="col-12">
														<p class="t-left mt-0 mb-1" style="font-size: 14px; font-weight: bold;">
															<?php echo $lang["escuela_verano_alqueria_titulo_tarjeta"];?>
														</p>
														<p class="t-left mt-0 mb-1" style="font-size: 14px;">
															<?php echo $lang["escuela_verano_alqueria_tarjeta_fechas"];?>
														</p>
														<p class="t-left mt-0 mb-1" style="font-size: 14px;">
															<?php echo $lang["escuela_verano_alqueria_tarjeta_horario_mañanas"];?>
														</p>
														<p class="t-left mt-0 mb-1" style="font-size: 14px;">
															<?php echo $lang["escuela_verano_alqueria_tarjeta_horario_completo"];?>
														</p>
														<p class="t-left mt-0 mb-1" style="font-size: 14px;">
															<?php echo $lang["escuela_verano_alqueria_tarjeta_que_llevar"];?>
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
															<div class="col-12">
																<p><?php echo $lang["escuela_verano_alqueria_titulo_dias_sueltos"];?></p>
															</div>

															<!-- 28 junio  hasta 2 julio-->
															<div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 mb-1">
																<div class="row">
																	<div class="col-5 col-sm-4 col-md-4 col-lg-5 col-xl-4 t-left">
																		<label class="containerchekbox">
																			<input type="checkbox" name="dia1" value="dia28jn">
																			<span class="checkmark"></span> 28 <?php echo $lang["escuela_verano_alqueria_dias_sueltos_mes_junio"];?>
																		</label>
																	</div>

																	<div class="col-7 col-sm-8 col-md-8 col-lg-7 col-xl-8" id="capad1" style="font-size: 14px; display: none;">
																		<label class="radio-inline pr-1">
																			<input type="radio" name="rdia1" value="dia28jn-manyana" checked> <?php echo $lang["escuela_verano_alqueria_dias_sueltos_mañanas"];?>
																		</label>
																		<label class="radio-inline">
																			<input type="radio" name="rdia1" value="dia28jn-completo"> <?php echo $lang["escuela_verano_alqueria_dias_sueltos_completo"];?>
																		</label>
																	</div>
																</div>

																<div class="row">
																	<div class="col-5 col-sm-4 col-md-4 col-lg-5 col-xl-4 t-left">
																		<label class="containerchekbox">
																			<input type="checkbox" name="dia2" value="dia29jn">
																			<span class="checkmark"></span> 29 <?php echo $lang["escuela_verano_alqueria_dias_sueltos_mes_junio"];?>
																		</label>
																	</div>

																	<div class="col-7 col-sm-8 col-md-8 col-lg-7 col-xl-8" id="capad2" style="font-size: 14px; display: none;">
																		<label class="radio-inline pr-1">
																			<input type="radio" name="rdia2" value="dia29jn-manyana" checked> <?php echo $lang["escuela_verano_alqueria_dias_sueltos_mañanas"];?>
																		</label>
																		<label class="radio-inline">
																			<input type="radio" name="rdia2" value="dia29jn-completo"> <?php echo $lang["escuela_verano_alqueria_dias_sueltos_completo"];?>
																		</label>
																	</div>
																</div>

																<div class="row">
																	<div class="col-5 col-sm-4 col-md-4 col-lg-5 col-xl-4 t-left">
																		<label class="containerchekbox">
																			<input type="checkbox" name="dia3" value="dia30jn">
																			<span class="checkmark"></span> 30 <?php echo $lang["escuela_verano_alqueria_dias_sueltos_mes_junio"];?>
																		</label>
																	</div>

																	<div class="col-7 col-sm-8 col-md-8 col-lg-7 col-xl-8" id="capad3" style="font-size: 14px; display: none;">
																		<label class="radio-inline pr-1">
																			<input type="radio" name="rdia3" value="dia30jn-manyana" checked> <?php echo $lang["escuela_verano_alqueria_dias_sueltos_mañanas"];?>
																		</label>
																		<label class="radio-inline">
																			<input type="radio" name="rdia3" value="dia30jn-completo"> <?php echo $lang["escuela_verano_alqueria_dias_sueltos_completo"];?>
																		</label>
																	</div>
																</div>

																<div class="row">
																	<div class="col-5 col-sm-4 col-md-4 col-lg-5 col-xl-4 t-left">
																		<label class="containerchekbox">
																			<input type="checkbox" name="dia4" value="dia1jl">
																			<span class="checkmark"></span> 1 <?php echo $lang["escuela_verano_alqueria_dias_sueltos_mes_julio"];?>
																		</label>
																	</div>

																	<div class="col-7 col-sm-8 col-md-8 col-lg-7 col-xl-8" id="capad4" style="font-size: 14px; display: none;">
																		<label class="radio-inline pr-1">
																			<input type="radio" name="rdia4" value="dia1jl-manyana" checked> <?php echo $lang["escuela_verano_alqueria_dias_sueltos_mañanas"];?>
																		</label>
																		<label class="radio-inline">
																			<input type="radio" name="rdia4" value="dia1jl-completo"> <?php echo $lang["escuela_verano_alqueria_dias_sueltos_completo"];?>
																		</label>
																	</div>
																</div>

																<div class="row">
																	<div class="col-5 col-sm-4 col-md-4 col-lg-5 col-xl-4 t-left">
																		<label class="containerchekbox">
																			<input type="checkbox" name="dia5" value="dia2jl">
																			<span class="checkmark"></span> 2 <?php echo $lang["escuela_verano_alqueria_dias_sueltos_mes_julio"];?>
																		</label>
																	</div>

																	<div class="col-7 col-sm-8 col-md-8 col-lg-7 col-xl-8" id="capad5" style="font-size: 14px; display: none;">
																		<label class="radio-inline pr-1">
																			<input type="radio" name="rdia5" value="dia2jl-manyana" checked> <?php echo $lang["escuela_verano_alqueria_dias_sueltos_mañanas"];?>
																		</label>
																		<label class="radio-inline">
																			<input type="radio" name="rdia5" value="dia2jl-completo"> <?php echo $lang["escuela_verano_alqueria_dias_sueltos_completo"];?>
																		</label>
																	</div>
																</div>
															</div>

															<!-- del 5 al 9  julio-->
                                                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 mb-1">
																<div class="row">
																	<div class="col-5 col-sm-4 col-md-4 col-lg-5 col-xl-4 t-left">
																		<label class="containerchekbox">
																			<input type="checkbox" name="dia6" value="dia5jl">
																			<span class="checkmark"></span> 5 <?php echo $lang["escuela_verano_alqueria_dias_sueltos_mes_julio"];?>
																		</label>
																	</div>

																	<div class="col-7 col-sm-8 col-md-8 col-lg-7 col-xl-8" id="capad6" style="font-size: 14px; display: none;">
																		<label class="radio-inline pr-1">
																			<input type="radio" name="rdia6" value="dia5jl-manyana" checked> <?php echo $lang["escuela_verano_alqueria_dias_sueltos_mañanas"];?>
																		</label>
																		<label class="radio-inline">
																			<input type="radio" name="rdia6" value="dia5jl-completo"> <?php echo $lang["escuela_verano_alqueria_dias_sueltos_completo"];?>
																		</label>
																	</div>
																</div>

																<!-- 6 jul -->
																<div class="row">
																	<div class="col-5 col-sm-4 col-md-4 col-lg-5 col-xl-4 t-left">
																		<label class="containerchekbox">
																			<input type="checkbox" name="dia7" value="dia6jl">
																			<span class="checkmark"></span> 6 <?php echo $lang["escuela_verano_alqueria_dias_sueltos_mes_julio"];?>
																		</label>
																	</div>

																	<div class="col-7 col-sm-8 col-md-8 col-lg-7 col-xl-8" id="capad7" style="font-size: 14px; display: none;">
																		<label class="radio-inline pr-1">
																			<input type="radio" name="rdia7" value="dia6jl-manyana" checked> <?php echo $lang["escuela_verano_alqueria_dias_sueltos_mañanas"];?>
																		</label>
																		<label class="radio-inline">
																			<input type="radio" name="rdia7" value="dia6jl-completo"> <?php echo $lang["escuela_verano_alqueria_dias_sueltos_completo"];?>
																		</label>
																	</div>
																</div>

                                                                <!-- 7 jul -->
																<div class="row">
																	<div class="col-5 col-sm-4 col-md-4 col-lg-5 col-xl-4 t-left">
																		<label class="containerchekbox">
																			<input type="checkbox" name="dia8" value="dia7jl">
																			<span class="checkmark"></span> 7 <?php echo $lang["escuela_verano_alqueria_dias_sueltos_mes_julio"];?>
																		</label>
																	</div>

																	<div class="col-7 col-sm-8 col-md-8 col-lg-7 col-xl-8" id="capad8" style="font-size: 14px; display: none;">
																		<label class="radio-inline pr-1">
																			<input type="radio" name="rdia8" value="dia7jl-manyana" checked> <?php echo $lang["escuela_verano_alqueria_dias_sueltos_mañanas"];?>
																		</label>
																		<label class="radio-inline">
																			<input type="radio" name="rdia8" value="dia7jl-completo"> <?php echo $lang["escuela_verano_alqueria_dias_sueltos_completo"];?>
																		</label>
																	</div>
																</div>

                                                                <!-- 8 jul -->
																<div class="row">
																	<div class="col-5 col-sm-4 col-md-4 col-lg-5 col-xl-4 t-left">
																		<label class="containerchekbox">
																			<input type="checkbox" name="dia9" value="dia8jl">
																			<span class="checkmark"></span> 8 <?php echo $lang["escuela_verano_alqueria_dias_sueltos_mes_julio"];?>
																		</label>
																	</div>

																	<div class="col-7 col-sm-8 col-md-8 col-lg-7 col-xl-8" id="capad9" style="font-size: 14px; display: none;">
																		<label class="radio-inline pr-1">
																			<input type="radio" name="rdia9" value="dia8jl-manyana" checked> <?php echo $lang["escuela_verano_alqueria_dias_sueltos_mañanas"];?>
																		</label>
																		<label class="radio-inline">
																			<input type="radio" name="rdia9" value="dia8jl-completo"> <?php echo $lang["escuela_verano_alqueria_dias_sueltos_completo"];?>
																		</label>
																	</div>
																</div>

                                                                <!-- 9 jul -->
																<div class="row">
																	<div class="col-5 col-sm-4 col-md-4 col-lg-5 col-xl-4 t-left">
																		<label class="containerchekbox">
																			<input type="checkbox" name="dia10" value="dia9jl">
																			<span class="checkmark"></span> 9 <?php echo $lang["escuela_verano_alqueria_dias_sueltos_mes_julio"];?>
																		</label>
																	</div>

																	<div class="col-7 col-sm-8 col-md-8 col-lg-7 col-xl-8" id="capad10" style="font-size: 14px; display: none;">
																		<label class="radio-inline pr-1">
																			<input type="radio" name="rdia10" value="dia9jl-manyana" checked> <?php echo $lang["escuela_verano_alqueria_dias_sueltos_mañanas"];?>
																		</label>
																		<label class="radio-inline">
																			<input type="radio" name="rdia10" value="dia9jl-completo"> <?php echo $lang["escuela_verano_alqueria_dias_sueltos_completo"];?>
																		</label>
																	</div>
																</div>
															</div>

                                                            <!-- Dias sueltos: del 12 al 16 de julio -->
															<div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 mb-1">
                                                                <!-- 12 jul -->
																<div class="row">
																	<div class="col-5 col-sm-4 col-md-4 col-lg-5 col-xl-4 t-left">
																		<label class="containerchekbox">
																			<input type="checkbox" name="dia11" value="dia12jl">
																			<span class="checkmark"></span> 12 <?php echo $lang["escuela_verano_alqueria_dias_sueltos_mes_julio"];?>
																		</label>
																	</div>

																	<div class="col-7 col-sm-8 col-md-8 col-lg-7 col-xl-8" id="capad11" style="font-size: 14px; display: none;">
																		<label class="radio-inline pr-1">
																			<input type="radio" name="rdia11" value="dia12jl-manyana" checked> <?php echo $lang["escuela_verano_alqueria_dias_sueltos_mañanas"];?>
																		</label>
																		<label class="radio-inline">
																			<input type="radio" name="rdia11" value="dia12jl-completo"> <?php echo $lang["escuela_verano_alqueria_dias_sueltos_completo"];?>
																		</label>
																	</div>
																</div>

																<div class="row">
																	<div class="col-5 col-sm-4 col-md-4 col-lg-5 col-xl-4 t-left">
																		<label class="containerchekbox">
																			<input type="checkbox" name="dia12" value="dia13jl">
																			<span class="checkmark"></span> 13 <?php echo $lang["escuela_verano_alqueria_dias_sueltos_mes_julio"];?>
																		</label>
																	</div>

																	<div class="col-7 col-sm-8 col-md-8 col-lg-7 col-xl-8" id="capad12" style="font-size: 14px; display: none;">
																		<label class="radio-inline pr-1">
																			<input type="radio" name="rdia12" value="dia13jl-manyana" checked> <?php echo $lang["escuela_verano_alqueria_dias_sueltos_mañanas"];?>
																		</label>
																		<label class="radio-inline">
																			<input type="radio" name="rdia12" value="dia13jl-completo"> <?php echo $lang["escuela_verano_alqueria_dias_sueltos_completo"];?>
																		</label>
																	</div>
																</div>

																<div class="row">
																	<div class="col-5 col-sm-4 col-md-4 col-lg-5 col-xl-4 t-left">
																		<label class="containerchekbox">
																			<input type="checkbox" name="dia13" value="dia14jl">
																			<span class="checkmark"></span> 14 <?php echo $lang["escuela_verano_alqueria_dias_sueltos_mes_julio"];?>
																		</label>
																	</div>

																	<div class="col-7 col-sm-8 col-md-8 col-lg-7 col-xl-8" id="capad13" style="font-size: 14px; display: none;">
																		<label class="radio-inline pr-1">
																			<input type="radio" name="rdia13" value="dia14jl-manyana" checked> <?php echo $lang["escuela_verano_alqueria_dias_sueltos_mañanas"];?>
																		</label>
																		<label class="radio-inline">
																			<input type="radio" name="rdia13" value="dia14jl-completo"> <?php echo $lang["escuela_verano_alqueria_dias_sueltos_completo"];?>
																		</label>
																	</div>
																</div>

																<div class="row">
																	<div class="col-5 col-sm-4 col-md-4 col-lg-5 col-xl-4 t-left">
																		<label class="containerchekbox">
																			<input type="checkbox" name="dia14" value="dia15jl">
																			<span class="checkmark"></span> 15 <?php echo $lang["escuela_verano_alqueria_dias_sueltos_mes_julio"];?>
																		</label>
																	</div>

																	<div class="col-7 col-sm-8 col-md-8 col-lg-7 col-xl-8" id="capad14" style="font-size: 14px; display: none;">
																		<label class="radio-inline pr-1">
																			<input type="radio" name="rdia14" value="dia15jl-manyana" checked> <?php echo $lang["escuela_verano_alqueria_dias_sueltos_mañanas"];?>
																		</label>
																		<label class="radio-inline">
																			<input type="radio" name="rdia14" value="dia15jl-completo"> <?php echo $lang["escuela_verano_alqueria_dias_sueltos_completo"];?>
																		</label>
																	</div>
																</div>

																<div class="row">
																	<div class="col-5 col-sm-4 col-md-4 col-lg-5 col-xl-4 t-left">
																		<label class="containerchekbox">
																			<input type="checkbox" name="dia15" value="dia16jl">
																			<span class="checkmark"></span> 16 <?php echo $lang["escuela_verano_alqueria_dias_sueltos_mes_julio"];?>
																		</label>
																	</div>

																	<div class="col-7 col-sm-8 col-md-8 col-lg-7 col-xl-8" id="capad15" style="font-size: 14px; display: none;">
																		<label class="radio-inline pr-1">
																			<input type="radio" name="rdia15" value="dia16jl-manyana" checked> <?php echo $lang["escuela_verano_alqueria_dias_sueltos_mañanas"];?>
																		</label>
																		<label class="radio-inline">
																			<input type="radio" name="rdia15" value="dia16jl-completo"> <?php echo $lang["escuela_verano_alqueria_dias_sueltos_completo"];?>
																		</label>
																	</div>
																</div>

															</div>

															<!-- Dias sueltos: del 19 al 23 de julio -->					
															<div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 mb-1">
																<div class="row">
																	<div class="col-5 col-sm-4 col-md-4 col-lg-5 col-xl-4 t-left">
																		<label class="containerchekbox">
																			<input type="checkbox" name="dia16" value="dia19jl">
																			<span class="checkmark"></span> 19 <?php echo $lang["escuela_verano_alqueria_dias_sueltos_mes_julio"];?>
																		</label>
																	</div>

																	<div class="col-7 col-sm-8 col-md-8 col-lg-7 col-xl-8" id="capad16" style="font-size: 14px; display: none;">
																		<label class="radio-inline pr-1">
																			<input type="radio" name="rdia16" value="dia19jl-manyana" checked> <?php echo $lang["escuela_verano_alqueria_dias_sueltos_mañanas"];?>
																		</label>
																		<label class="radio-inline">
																			<input type="radio" name="rdia16" value="dia19jl-completo"> <?php echo $lang["escuela_verano_alqueria_dias_sueltos_completo"];?>
																		</label>
																	</div>
																</div>
																<div class="row">
																	<div class="col-5 col-sm-4 col-md-4 col-lg-5 col-xl-4 t-left">
																		<label class="containerchekbox">
																			<input type="checkbox" name="dia17" value="dia20jl">
																			<span class="checkmark"></span> 20 <?php echo $lang["escuela_verano_alqueria_dias_sueltos_mes_julio"];?>
																		</label>
																	</div>

																	<div class="col-7 col-sm-8 col-md-8 col-lg-7 col-xl-8" id="capad17" style="font-size: 14px; display: none;">
																		<label class="radio-inline pr-1">
																			<input type="radio" name="rdia17" value="dia20jl-manyana"  checked> <?php echo $lang["escuela_verano_alqueria_dias_sueltos_mañanas"];?>
																		</label>
																		<label class="radio-inline">
																			<input type="radio" name="rdia17" value="dia20jl-completo"> <?php echo $lang["escuela_verano_alqueria_dias_sueltos_completo"];?>
																		</label>
																	</div>
																</div>

																<div class="row">
																	<div class="col-5 col-sm-4 col-md-4 col-lg-5 col-xl-4 t-left">
																		<label class="containerchekbox">
																			<input type="checkbox" name="dia18" value="dia21jl">
																			<span class="checkmark"></span> 21 <?php echo $lang["escuela_verano_alqueria_dias_sueltos_mes_julio"];?>
																		</label>
																	</div>

																	<div class="col-7 col-sm-8 col-md-8 col-lg-7 col-xl-8" id="capad18" style="font-size: 14px; display: none;">
																		<label class="radio-inline pr-1">
																			<input type="radio" name="rdia18" value="dia21jl-manyana" checked> <?php echo $lang["escuela_verano_alqueria_dias_sueltos_mañanas"];?>
																		</label>
																		<label class="radio-inline">
																			<input type="radio" name="rdia18" value="dia21jl-completo"> <?php echo $lang["escuela_verano_alqueria_dias_sueltos_completo"];?>
																		</label>
																	</div>
																</div>

																<div class="row">
																	<div class="col-5 col-sm-4 col-md-4 col-lg-5 col-xl-4 t-left">
																		<label class="containerchekbox">
																			<input type="checkbox" name="dia19" value="dia22jl">
																			<span class="checkmark"></span> 22 <?php echo $lang["escuela_verano_alqueria_dias_sueltos_mes_julio"];?>
																		</label>
																	</div>

																	<div class="col-7 col-sm-8 col-md-8 col-lg-7 col-xl-8" id="capad19" style="font-size: 14px; display: none;">
																		<label class="radio-inline pr-1">
																			<input type="radio" name="rdia19" value="dia22jl-manyana" checked> <?php echo $lang["escuela_verano_alqueria_dias_sueltos_mañanas"];?>
																		</label>
																		<label class="radio-inline">
																			<input type="radio" name="rdia19" value="dia22jl-completo"> <?php echo $lang["escuela_verano_alqueria_dias_sueltos_completo"];?>
																		</label>
																	</div>
																</div>

																<div class="row">
																	<div class="col-5 col-sm-4 col-md-4 col-lg-5 col-xl-4 t-left">
																		<label class="containerchekbox">
																			<input type="checkbox" name="dia20" value="dia23jl">
																			<span class="checkmark"></span> 23 <?php echo $lang["escuela_verano_alqueria_dias_sueltos_mes_julio"];?>
																		</label>
																	</div>

																	<div class="col-7 col-sm-8 col-md-8 col-lg-7 col-xl-8" id="capad20" style="font-size: 14px; display: none;">
																		<label class="radio-inline pr-1">
																			<input type="radio" name="rdia20" value="dia23jl-manyana" checked> <?php echo $lang["escuela_verano_alqueria_dias_sueltos_mañanas"];?>
																		</label>
																		<label class="radio-inline">
																			<input type="radio" name="rdia20" value="dia23jl-completo"> <?php echo $lang["escuela_verano_alqueria_dias_sueltos_completo"];?>
																		</label>
																	</div>
																</div>

															</div>
                                                            
                                                            <!-- Dias sueltos: del 26 al 30 de julio -->
															<div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 mb-1">
																<div class="row">
																	<div class="col-5 col-sm-4 col-md-4 col-lg-5 col-xl-4 t-left">
																		<label class="containerchekbox">
																			<input type="checkbox" name="dia21" value="dia26jl">
																			<span class="checkmark"></span> 26 <?php echo $lang["escuela_verano_alqueria_dias_sueltos_mes_julio"];?>
																		</label>
																	</div>

																	<div class="col-7 col-sm-8 col-md-8 col-lg-7 col-xl-8" id="capad21" style="font-size: 14px; display: none;">
																		<label class="radio-inline pr-1">
																			<input type="radio" name="rdia21" value="dia26jl-manyana" checked> <?php echo $lang["escuela_verano_alqueria_dias_sueltos_mañanas"];?>
																		</label>
																		<label class="radio-inline">
																			<input type="radio" name="rdia21" value="dia26jl-completo"> <?php echo $lang["escuela_verano_alqueria_dias_sueltos_completo"];?>
																		</label>
																	</div>
																</div>
																<div class="row">
																	<div class="col-5 col-sm-4 col-md-4 col-lg-5 col-xl-4 t-left">
																		<label class="containerchekbox">
																			<input type="checkbox" name="dia22" value="dia27jl">
																			<span class="checkmark"></span> 27 <?php echo $lang["escuela_verano_alqueria_dias_sueltos_mes_julio"];?>
																		</label>
																	</div>

																	<div class="col-7 col-sm-8 col-md-8 col-lg-7 col-xl-8" id="capad22" style="font-size: 14px; display: none;">
																		<label class="radio-inline pr-1">
																			<input type="radio" name="rdia22" value="dia27jl-manyana"  checked> <?php echo $lang["escuela_verano_alqueria_dias_sueltos_mañanas"];?>
																		</label>
																		<label class="radio-inline">
																			<input type="radio" name="rdia22" value="dia27jl-completo"> <?php echo $lang["escuela_verano_alqueria_dias_sueltos_completo"];?>
																		</label>
																	</div>
																</div>

																<div class="row">
																	<div class="col-5 col-sm-4 col-md-4 col-lg-5 col-xl-4 t-left">
																		<label class="containerchekbox">
																			<input type="checkbox" name="dia23" value="dia28jl">
																			<span class="checkmark"></span> 28 <?php echo $lang["escuela_verano_alqueria_dias_sueltos_mes_julio"];?>
																		</label>
																	</div>

																	<div class="col-7 col-sm-8 col-md-8 col-lg-7 col-xl-8" id="capad23" style="font-size: 14px; display: none;">
																		<label class="radio-inline pr-1">
																			<input type="radio" name="rdia23" value="dia28jl-manyana" checked> <?php echo $lang["escuela_verano_alqueria_dias_sueltos_mañanas"];?>
																		</label>
																		<label class="radio-inline">
																			<input type="radio" name="rdia23" value="dia28jl-completo"> <?php echo $lang["escuela_verano_alqueria_dias_sueltos_completo"];?>
																		</label>
																	</div>
																</div>

																<div class="row">
																	<div class="col-5 col-sm-4 col-md-4 col-lg-5 col-xl-4 t-left">
																		<label class="containerchekbox">
																			<input type="checkbox" name="dia24" value="dia29jl">
																			<span class="checkmark"></span> 29 <?php echo $lang["escuela_verano_alqueria_dias_sueltos_mes_julio"];?>
																		</label>
																	</div>

																	<div class="col-7 col-sm-8 col-md-8 col-lg-7 col-xl-8" id="capad24" style="font-size: 14px; display: none;">
																		<label class="radio-inline pr-1">
																			<input type="radio" name="rdia24" value="dia29jl-manyana" checked> <?php echo $lang["escuela_verano_alqueria_dias_sueltos_mañanas"];?>
																		</label>
																		<label class="radio-inline">
																			<input type="radio" name="rdia24" value="dia29jl-completo"> <?php echo $lang["escuela_verano_alqueria_dias_sueltos_completo"];?>
																		</label>
																	</div>
																</div>

																<div class="row">
																	<div class="col-5 col-sm-4 col-md-4 col-lg-5 col-xl-4 t-left">
																		<label class="containerchekbox">
																			<input type="checkbox" name="dia25" value="dia30jl">
																			<span class="checkmark"></span> 30 <?php echo $lang["escuela_verano_alqueria_dias_sueltos_mes_julio"];?>
																		</label>
																	</div>

																	<div class="col-7 col-sm-8 col-md-8 col-lg-7 col-xl-8" id="capad25" style="font-size: 14px; display: none;">
																		<label class="radio-inline pr-1">
																			<input type="radio" name="rdia25" value="dia30jl-manyana" checked> <?php echo $lang["escuela_verano_alqueria_dias_sueltos_mañanas"];?>
																		</label>
																		<label class="radio-inline">
																			<input type="radio" name="rdia25" value="dia30jl-completo"> <?php echo $lang["escuela_verano_alqueria_dias_sueltos_completo"];?>
																		</label>
																	</div>
																</div>

																
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

											$('[name="dia19"]').change(function(){
												$("#capad19").toggle();
											});

											$('[name="dia20"]').change(function(){
												$("#capad20").toggle();
											});

											$('[name="dia21"]').change(function(){
												$("#capad21").toggle();
											});

											$('[name="dia22"]').change(function(){
												$("#capad22").toggle();
											});

											$('[name="dia23"]').change(function(){
												$("#capad23").toggle();
											});

											$('[name="dia24"]').change(function(){
												$("#capad24").toggle();
											});

											$('[name="dia25"]').change(function(){
												$("#capad25").toggle();
											});

									/*		$('[name="dia26"]').change(function(){
												$("#capad26").toggle();
											});

											$('[name="dia27"]').change(function(){
												$("#capad27").toggle();
											});

											$('[name="dia28"]').change(function(){
												$("#capad28").toggle();
											});

											$('[name="dia29"]').change(function(){
												$("#capad29").toggle();
											});

											$('[name="dia30"]').change(function(){
												$("#capad30").toggle();
											});
									*/

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
													<select class="form-control" style="color: #5c5c5c !important;" name="genero" required="">
														<option value=""></option>
														<option value="MASCULINO"><?php echo $lang["formulario_genero_masculino"];?></option>
														<option value="FEMENINO"><?php echo $lang["formulario_genero_femenino"];?></option>
													</select>
												</label>
											</div>

											<div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
												<label><?php echo $lang["formulario_nombre"];?>:
													<input type="text" class="form-control" name="nombre" maxlength="45" required>
												</label>
											</div>

											<div class="col-12 col-md-5 col-lg-5 col-xl-5 redimension">
												<label><?php echo $lang["formulario_apellidos"];?>:
													<input type="text" class="form-control" name="apellidos" maxlength="45" required>
												</label>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-12 col-md-3 col-lg-3 col-xl-3 redimension">
												<label><?php echo $lang["formulario_cumpleaños"];?>:
													<input type="date" class="form-control" style="color: #5c5c5c !important;" id="fecha" name="fechanacimiento" required>
												</label>
											</div>

											<div class="col-12 col-md-3 col-lg-3 col-xl-3 redimension">
												<label><?php echo $lang["formulario_dni"];?>:
													<input type="text" class="form-control" name="dni" maxlength="10" required>
												</label>
											</div>

											<div class="col-12 col-md-6 col-lg-6 col-xl-6 redimension">
												<label><?php echo $lang["formulario_club"];?>
													<input type="text" class="form-control" name="club" maxlength="45" required>
												</label>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-12 redimension">
												<label><?php echo $lang["formulario_aspecto_medico"];?>
													<textarea class="form-control" style="height: 85px; resize: none;" name="tratamientosmedicos"></textarea>
												</label>
											</div>
										</div>
									</div>

									<div class="form-group">
	                                    <div class="row">
	                                        <div class="col-12 col-md-6 col-lg-6 col-xl-6 redimension">
	                                            <label><?php echo $lang["formulario_sintomas_covid"];?>
	                                            	<input type="text" class="form-control" name="sintomascovid" maxlength="45" required>
	                                            </label>
	                                        </div>

	                                        <div class="col-12 col-md-6 col-lg-6 col-xl-6 redimension">
	                                            <label><?php echo $lang["formulario_familiar_covid"];?>
	                                            	<input type="text" class="form-control" name="familiarcovid" maxlength="45" required>
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
												<input type="file" id="fileName" class="form-control" style="border: none !important; padding: 0 !important;" name="fotocopiasip" aria-describedby="fileHelp" accept="image/gif,image/jpeg,image/jpg,image/png,image/bmp,application/pdf" required onchange="validateFileType()">
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
													<input type="text" class="form-control" name="nombretutor" maxlength="45" required>
												</label>
											</div>

											<div class="col-12 col-md-5 col-lg-5 col-xl-5 redimension">
												<label><?php echo $lang["formulario_apellidos"];?>:
													<input type="text" class="form-control" name="apellidostutor" maxlength="45" required>
												</label>
											</div>

											<div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
												<label><?php echo $lang["formulario_dni"];?>:
													<input type="text" class="form-control" name="dnitutor" maxlength="10" required>
												</label>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-12 col-md-6 col-lg-6 col-xl-6 redimension">
												<label><?php echo $lang["formulario_direccion"];?>:
													<input type="text" class="form-control" name="direccion" maxlength="45" required>
												</label>
											</div>

											<div class="col-12 col-md-2 col-lg-2 col-xl-2 redimension">
												<label><?php echo $lang["formulario_numero"];?>:
													<input type="text" class="form-control" name="numero" maxlength="10">
												</label>
											</div>

											<div class="col-12 col-md-2 col-lg-2 col-xl-2 redimension">
												<label><?php echo $lang["formulario_piso"];?>:
													<input type="text" class="form-control" name="piso" maxlength="10">
												</label>
											</div>

											<div class="col-12 col-md-2 col-lg-2 col-xl-2 redimension">
												<label><?php echo $lang["formulario_puerta"];?>:
													<input type="text" class="form-control" name="puerta" maxlength="10">
												</label>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
												<label><?php echo $lang["formulario_codigo_postal"];?>:
													<input type="text" class="form-control" name="cp" maxlength="10" required>
												</label>
											</div>

											<div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
												<label><?php echo $lang["formulario_provincia"];?>:
													<input type="text" class="form-control" name="provincia" maxlength="25" required>
												</label>
											</div>

											<div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
												<label><?php echo $lang["formulario_poblacion"];?>:
													<input type="text" class="form-control" name="poblacion" maxlength="45" required>
												</label>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-12 col-md-5 col-lg-5 col-xl-5 redimension">
												<label><?php echo $lang["formulario_telefono"];?>:
													<input type="text" class="form-control" name="telefonotutor" maxlength="15" required>
												</label>
											</div>

											<div class="col-12 col-md-7 col-lg-7 col-xl-7 redimension">
												<label><?php echo $lang["formulario_correo"];?>:
													<input type="email" class="form-control" name="emailtutor" maxlength="45" required>
												</label>
											</div>

											<div class="col-12">
												<p class="t-left" style="color: red;">
													<strong><?php echo $lang["formulario_aviso_email"];?></strong>
												</p>
											</div>
										</div>
									</div>


									<!-- info de pagos -->
									<div class="row">
	                                    <div class="col-12">
	                                        <h3 class="section-title mb-0">
	                                            <span class="orange-text"><?php echo $lang["formulario_pagos_plazos_metodos"];?></span>
	                                        </h3>
	                                    </div>

	                                    <div class="col-12">
	                                        <h4 class="section-title mb-0"><?php echo $lang["formulario_pagos_tarjeta"];?></h4>
	                                        <p><?php echo $lang["formulario_pagos_tarjeta_info"];?>
	                                            <br>
	                                        </p>
	                                       <!--  <h4 class="section-title mb-0">Efectivo y entrega de documentación en mano:</h4>
	                                        <p>Inscripción en oficinas de L´Alqueria
	                                            <br>
	                                            Lunes a viernes de 9:30 a 14:00 y de 16:00 a 20:00.
	                                        </p> -->
	                                        <h4 class="section-title mb-0"><?php echo $lang["formulario_ingreso_bancario"];?></h4>
	                                        <p>
	                                            En la cuenta de Caixa Popular:
	                                            <br>
	                                            IBAN: ES29 3159 0009 9623 3942 4422
	                                            <br><br>
	                                            <!-- <span style="color: red;">*</span> Al hacer el ingreso se indicará el nombre del niño/a y deberá enviarse el resguardo junto al resto de documentación (fotocopia tarjeta sanitaria/SIP) por fax al número: 96 395 68 01 o al siguiente e-mail: <a href="mailto:campus@valenciabasket.com" style="color: #eb7c00; font-weight: 600;">campus@valenciabasket.com</a> -->
	                                        </p>

	                                    </div>
	                                </div>

	                                <div class="form-group">
	                                    <div class="row">
	                                        <div class="col-12 redimension">
	                                            <h4 class="section-title"><?php echo $lang["formulario_ingreso_bancario_info"];?></h4>
	                                        </div>
	                                        <div class="col-12 redimension">
	                                            <input type="file" class="form-control" style="border: none !important; padding: 0 !important;" name="resguardoingreso" aria-describedby="fileHelp">
	                                        </div>
	                                        <div class="col-12">
	                                            <p class="t-left" style="color: red;">
	                                                <strong><?php echo $lang["formulario_archivos_permitidos"];?></strong>
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
													<input type="checkbox" name="autorizodatos" value="si" required>
													<span class="checkmark"></span> 
													<?php echo $lang["politicas_check_productos"];?>
												</p>
											</label>

											<label class="containerchekbox">
												<p>
													<input type="checkbox" name="autorizoimagen" value="si" required>
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
												<input type="checkbox" name="autorizo" value="si" required>
												<p><?php echo $lang["politicas_check_condiciones"];?></p>
												<span class="checkmark"></span>
											</label>
										</div>

										<div class="col-12 col-md-6 col-lg-6 col-xl-6 mb-2">
											<button type="submit" class="btn btn-link-w w-100" style="width: 100%; margin-left: 0;" id="oficina" name="enviar" value="oficina" >
												<span><?php echo $lang["boton_transferencia"];?></span>
											</button>
										</div>

										<div class="col-12 col-md-6 col-lg-6 col-xl-6 mb-2">
											<button type="submit" class="btn btn-link-w w-100" style="width: 100%; margin-left: 0;" id="tarjeta" name="enviar" value="tarjeta" >
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
        <script src="js/jquery.validate.min.js"></script> 
        
		<script>
			// Comprobamos las extensiones de imágenes que permitimos al subir un archivo.
			// Si no están permitidas se deshabilitan los botones de submit.
			function validateFileType()
            {
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
            
            $('#AlqueriaAcademyForm').validate(
			{
				submitHandler: function()
				{
                    /*
					$.ajax({
						type:       "POST",
						url:        "?r=inscripciones/InscripcionAcademy",
						data:       $('#AlqueriaAcademyForm').serialize(),
						dataType:   "json",
						beforeSend: function()
                        {
					    	$("#btn_reserva_academy").attr("disabled", true);
					    	$("#AlqueriaAcademyForm-mensaje-espera").show();					    	
					   	},
						success: function(data)
                        {
                            if(data.response==="success")
                            {
                                //  Lo primero, quitamos el mensaje de espera y volvemos a quitar el disabled
                                $("#btn_reserva_academy").attr("disabled", true);
                                $("#AlqueriaAcademyForm-mensaje-espera").hide();
                                //  Redirección a la URL del TPV 
                                window.location.href = encodeURI(data["url_redireccion"]);
                            }
                            else if(data.response==="error")
                            {
                                //  Quitamos el mensaje de espera y volvemos a quitamos el disabled para permitir el reenvio
                                $("#btn_reserva_academy").attr("disabled",false);
                                $("#AlqueriaAcademyForm-mensaje-espera").hide();	
                            
                                //  Mostramos el error en la respuesta
                                $('#AlqueriaAcademyForm-respuesta').html("<div class='alert alert-danger'><h4 class='section-title mt-0 mb-0'>" + data.message + "</h4></div>");
                                $("#AlqueriaAcademyForm-respuesta").fadeTo(5000, 500).slideUp(500, function(){
                                    $("#AlqueriaAcademyForm-respuesta").slideUp(500);
                                });
                            }
                            else
                            {}
						}, 
                        error: function( jqXHR, textStatus, errorThrown )
                        {
                            console.log('jqXHR:');
                            console.log(jqXHR);
                            console.log('textStatus:');
                            console.log(textStatus);
                            console.log('errorThrown:');
                            console.log(errorThrown);
                        }
					});
                    */
				}
			});
		</script>
	</body>
</html>