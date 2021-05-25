<!DOCTYPE html>
<html lang="es">
	<?php require('includes/head.php'); ?>
	<link rel="stylesheet" href="css/forms.css">
	<link rel="stylesheet" href="css/parallax.css">
	<link rel="stylesheet" href="css/formus.css?v=1.01">

	<!-- Código CSS -->
	<style>
		input[type="text"]{ text-transform: uppercase;}
		input[type="email"]{text-transform: lowercase;}
		canvas{
			width: 500px !important;
			height: 250px;
			background-color: #ffffff;
			border: 1px solid black;
		}
		.tipoinscripcionseleccionada{text-decoration:underline;}
		#page-content{background-color:#f6f6f6;}
		.error{color:red;}
	</style>

	<body id="ropa" class="Pages">
		<div class="wrapper overflow-x-hidden">
			<?php require ("includes/header.php"); ?>

			<section id="page-content" class="overflow-x-hidden margin-top-header pb-4">
				<!-- Imagen cabecera -->
				<div class="block">
					<div class="container-fluid">
						<div class="row">
							<div class="parallax col-12 mt-0" style="background-image: url('img/cabecera-cultura-esfuerzo.jpg');">
							</div>
						</div>
					</div>
				</div>

				<div class="block background-f6">
					<div class="container">
						<!-- Imagen escudo y titulo -->
						<div class="row">
							<div class="col-12">
								<h3 class="section-title">
									<!-- <span class="orange-text"><?php //echo $lang["form_ropa_titulo_cantera"];?></span> -->
									<span class="orange-text"><?php echo $lang["form_ropa_titulo_escuela"];?></span>
								</h3>
								<p><?php echo $lang["form_ropa_titulo_text1"];?></p>
								<p><?php echo $lang["form_ropa_titulo_text2"];?></p>
							</div>
						</div>

						<div class="row">
							<div class="col-12">
								<form id="rellenar-tallas-form" class="boxed-form" method="post">
									<!-- Nos dan DNI del jugador/a -->
									<div class="row renovacion-row">
										<div class="col-12 mb-2">
											<h4 class="section-title"><?php echo $lang["ins_form_titulo_verificacion"];?></h4>
											<p><?php echo $lang["ins_form_titulo_verificacion_p"];?></p>
										</div>

										<!-- Paso VERIFICACION POR SMS -->
										<div class="form-group col-12 redimension">
											<label style="font-weight:bold; font-size:20px;">
												<?php echo $lang["ins_form_mensaje_sms"];?>
											</label>
											<input type="number" id="codigo-verificacion" class="form-control" name="codigo-verificacion" max="999999" min="1">
										</div>

										<!-- DNI JUGADOR -->
										<div class="form-group col-12 redimension">
											<label style="font-weight: bold; font-size: 20px;">
												<?php echo $lang["ins_form_dni_jugador_1"];?> <small><?php echo $lang["ins_form_dni_jugador_2"];?></small>
											</label>
											<input type="text" id="dni-jugador" class="form-control" name="validacion-dni" maxlength="50">
										</div>

										<!-- DNI PADRE / madre / tutor -->
										<div class="form-group col-12 redimension">
											<label style="font-weight:bold;font-size:20px;">
												<?php echo $lang["ins_form_dni_tutor_1"];?><small><?php echo $lang["ins_form_dni_tutor_2"];?></small>
											</label>
											<input type="text" id="validacion-dni-padremadre" class="form-control" name="validacion-dni-padremadre" maxlength="50" disabled>
										</div>

										<div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 redimension">
											<button id="buscar-jugador-dni-jugador" name="buscar-validacion-dni" type="button" class="btn btn-link-w w-100" style="max-height: 59px; margin-top: 28px; margin-left: 0;">
												<span><?php echo $lang["ins_form_buscar_jugador"];?></span>  
											</button>
										</div>

										<!-- <div id="paso-2-dni-jugador-error-dni" class="col-12" style="display:none;">
											<div class="alert alert-info redimension" role="alert">
												<h4 class="mt-0 mb-0"><i class="fa fa-info-circle" aria-hidden="true"></i><?php //echo $lang ["ins_form_dni_no_valido_1"];?><br>
													<i class="fa fa-info-circle" aria-hidden="true"></i><?php //echo $lang ["ins_form_dni_no_valido_2"];?><br>
													<i class="fa fa-info-circle" aria-hidden="true"></i><?php //echo $lang ["ins_form_dni_no_valido_3"];?></h4>
											</div>
										</div> -->
									</div>

									<!-- Paso 2 - PLAN B: Nos dan DNI del padre o de la madre. 
									<div id="paso-2-dni-tutor-container" class="row renovacion-row">

										<div class="col-12">
											<hr>
										</div>

										<div class="form-group col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9 redimension">
											<label style="font-weight:bold;font-size:20px;"><?php //echo $lang["ins_form_dni_tutor_1"];?><br><small>
												<?php //echo $lang["ins_form_dni_tutor_2"];?></small></label>
											<input type="text" id="validacion-dni-padremadre" class="form-control" name="validacion-dni-padremadre" 
												   maxlength="50" disabled>                                            
										</div>

										<div class="form-group col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 redimension">
											<button type="button" class="mt-4 btn btn-link-w w-100" id="buscar-jugador-dni-padremadre" name="buscar-validacion-dni" 
													style="max-height: 59px; margin-top: 28px; margin-left: 0;">
												<span><?php //echo $lang["ins_form_buscar_jugador"];?></span>
											</button>
										</div> 

										<div id="paso-2-dni-tutor-selector-jugador" class="form-group col-12 redimension" style="display:none;">
											<label style="font-weight: bold; font-size: 20px;"><?php //echo $lang["ins_cant_esc_select"];?></label>
											<select class="form-control" value="" name="validacion-dni-select" id="validacion-dni-select">
												<option value=""><?php //echo $lang["ins_cant_esc_select_vacio"];?></option>  
											</select>
										</div>

										<div id="paso-2-dni-tutor-respuesta" class="form-group col-12 redimension"></div>

										<div id="paso-2-dni-tutor-error-dni" class="col-12" style="display:none;">
											<div class="alert alert-info redimension" role="alert">
												<h4 class="mt-0 mb-0"><i class="fa fa-info-circle" aria-hidden="true"></i><?php //echo $lang ["ins_form_dni_no_valido_1"];?><br>
													<i class="fa fa-info-circle" aria-hidden="true"></i><?php //echo $lang ["ins_form_dni_no_valido_2"];?><br>
													<i class="fa fa-info-circle" aria-hidden="true"></i><?php //echo $lang ["ins_form_dni_no_valido_3"];?></h4>
											</div>
										</div>
									</div>
									-->

									<!-- Confirmación de que se puede pasar a editar el jugador -->
									<div class="row mt-1">
										<div id="confirmacion-puede-editarse-jugador" class="col-12">
											<div class="alert alert-danger redimension" role="alert">
												<h4><i class="fa fa-info-circle" aria-hidden="true"></i>
													<?php echo $lang["ins_form_confirmacion_jugador_pendiente"];?>
												</h4>
											</div>
										</div>
									</div>

									<!-- Paso 3: Cargamos los datos del jugador/a y permitimos editarlos todos excepto el equipo -->
									<div class="row renovacion-row">
										<div class="col-12 mt-2 mb-2">
											<hr style="color: black; border: 1px solid #ccc;">
										</div>

										<div class="col-12">
											<h4 class="mt-0 mb-1">
												<strong><?php echo $lang["ins_form_datosjugador"];?></strong>
											</h4>

											<div class="row">
												<div class="form-group col-12 col-md-3 col-lg-3 col-xl-3">
                                                    <label><?php echo $lang["ins_form_nombre"];?></label>
                                                    <input type="text" id="nombre-form-cantera" class="form-control input-control-dni" name="nombre" maxlength="45" required disabled>
                                                </div>

                                                <div class="form-group col-12 col-md-3 col-lg-3 col-xl-3">
                                                    <label><?php echo $lang["ins_form_apel"];?></label>
                                                    <input type="text" id="apellidos-form-cantera" class="form-control input-control-dni" name="apellidos" maxlength="45" required disabled>
                                                </div>

                                                <div class="form-group col-12 col-md-6 col-lg-6 col-xl-6">
                                                    <label><?php echo $lang["ins_form_equipo"];?></label>
                                                    <input type="text" class="form-control" id="equipo-form-cantera" readonly disabled>
                                                    <input type="hidden" id="id-equipo-form-cantera">
                                                </div>
											</div>
										</div>
									</div>

									<div id="rellenar-tallas-form-espera" class="row renovacion-row" style="display: none;">
										<div class="col-12 alert alert-info">
											<h4><?php echo $lang["ins_controller_inscripcion_cantera_espera"];?></h4>
										</div>
									</div>

									<!-- Camiseta reversible -->
									<div class="row">
										<div class="col-12 col-lg-12 col-xl-12 mt-2 mb-4">
											<hr style="color: black; border: 1px solid #ccc;">
										</div>

										<div class="col-12 t-center">
											<span class="titulo-prenda"><?php echo $lang["form_ropa_camiseta_reversible"];?></span>
										</div>

										<div class="col-12 mt-3">
											<span class="subtitulo-prenda"><?php echo $lang["form_ropa_paso1"];?> <span style="color: #5a6670;"><?php echo $lang["form_ropa_midete"];?></span></span>
										</div>

										<div class="col-12 hidden-sm hidden-md hidden-lg hidden-xl mt-2">
											<img width="384" height="381" class="img-responsive" src="img/ropa-medida/camiseta-reversible-mini.jpg" alt="Camiseta reversible">
										</div>

										<div class="hidden-xs col-md-12 mt-2">
											<img width="1110" height="460" class="img-responsive" src="img/ropa-medida/camiseta-reversible.jpg" alt="Camiseta reversible">
										</div>

										<div class="col-12 mt-1">
											<p><?php echo $lang["form_ropa_indicacion_medicion"];?></p>
											<ul class="ropa-medida">
												<li><strong><?php echo $lang["form_ropa_busto"];?></strong> <?php echo $lang["form_ropa_cam_medir_busto"];?></li>
												<li><strong><?php echo $lang["form_ropa_largo"];?></strong> <?php echo $lang["form_ropa_cam_medir_largo"];?></li>
											</ul>
										</div>

										<div class="col-12 mt-4">
											<span class="subtitulo-prenda"><?php echo $lang["form_ropa_paso2"];?> <span style="color: #5a6670;"><?php echo $lang["form_ropa_enc_talla"];?></span></span>
										</div>

										<div class="col-12 mt-2">
											<div class="resultados-reducido">
												<table class="equipos-alqueria-resultados-tabla">
													<thead>
														<tr>
															<th class="t-left">
																<strong><?php echo $lang["form_ropa_talla"];?></strong>
															</th>
															<th class="t-center">
																<strong><?php echo $lang["form_ropa_largo_espalda_cm"];?></strong>
															</th>
															<th class="t-center">
																<strong><?php echo $lang["form_ropa_pecho_cm"];?></strong>
															</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td class="t-left">4XS</td>
															<td class="t-center">47</td>
															<td class="t-center">37</td>
														</tr>
														<tr>
															<td class="t-left">3XS</td>
															<td class="t-center">53</td>
															<td class="t-center">40</td>
														</tr>
														<tr>
															<td class="t-left">2XS</td>
															<td class="t-center">61</td>
															<td class="t-center">43</td>
														</tr>
														<tr>
															<td class="t-left">XS</td>
															<td class="t-center">71</td>
															<td class="t-center">46</td>
														</tr>
														<tr>
															<td class="t-left">S</td>
															<td class="t-center">75</td>
															<td class="t-center">50</td>
														</tr>
														<tr>
															<td class="t-left">M</td>
															<td class="t-center">78</td>
															<td class="t-center">53</td>
														</tr>
														<tr>
															<td class="t-left">L</td>
															<td class="t-center">81</td>
															<td class="t-center">56</td>
														</tr>
														<tr>
															<td class="t-left">XL</td>
															<td class="t-center">84</td>
															<td class="t-center">59</td>
														</tr>
														<tr>
															<td class="t-left">XXL</td>
															<td class="t-center">86</td>
															<td class="t-center">62</td>
														</tr>
														<tr>
															<td class="t-left">3XL</td>
															<td class="t-center">88</td>
															<td class="t-center">65</td>
														</tr>
													</tbody>
												</table>
											</div>

											<div class="resultados-completo">
												<table class="equipos-alqueria-resultados-tabla">
													<thead>
														<tr>
															<th class="t-left">
																<strong><?php echo $lang["form_ropa_especificaciones"];?></strong>
															</th>
															<th class="t-center">
																<strong>4XS</strong>
															</th>
															<th class="t-center">
																<strong>3XS</strong>
															</th>
															<th class="t-center">
																<strong>2XS</strong>
															</th>
															<th class="t-center">
																<strong>XS</strong>
															</th>
															<th class="t-center">
																<strong>S</strong>
															</th>
															<th class="t-center">
																<strong>M</strong>
															</th>
															<th class="t-center">
																<strong>L</strong>
															</th>
															<th class="t-center">
																<strong>XL</strong>
															</th>
															<th class="t-center">
																<strong>XXL</strong>
															</th>
															<th class="t-center">
																<strong>3XL</strong>
															</th>
														</tr>
													</thead>
													<tbody>
														<tr class="equipos-resultados-impar">
															<td class="t-left"><?php echo $lang["form_ropa_largo_espalda_cm"];?></td>
															<td class="t-center">47</td>
															<td class="t-center">53</td>
															<td class="t-center">61</td>
															<td class="t-center">71</td>
															<td class="t-center">75</td>
															<td class="t-center">78</td>
															<td class="t-center">81</td>
															<td class="t-center">84</td>
															<td class="t-center">86</td>
															<td class="t-center">88</td>
														</tr>
														<tr class="equipos-resultados-par">
															<td class="t-left"><?php echo $lang["form_ropa_pecho_cm"];?></td>
															<td class="t-center">37</td>
															<td class="t-center">40</td>
															<td class="t-center">43</td>
															<td class="t-center">46</td>
															<td class="t-center">50</td>
															<td class="t-center">53</td>
															<td class="t-center">56</td>
															<td class="t-center">59</td>
															<td class="t-center">62</td>
															<td class="t-center">65</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>

										<div class="col-12 mt-4">
											<span class="subtitulo-prenda"><?php echo $lang["form_ropa_paso3"];?> <span style="color: #5a6670;"><?php echo $lang["form_ropa_select_talla"];?></span></span>
										</div>

										<div class="col-12 col-md-3 col-lg-3 col-xl-3 mt-2 redimension">
											<div class="form-group">
												<label><?php echo $lang["form_ropa_camiseta_reversible"];?>
													<select id="talla-camiseta-reversible" class="form-control" style="color: #5c5c5c !important;" name="talla_camiseta_reversible" required>
														<option value=""></option>
														<option value="4XS">4XS</option>
														<option value="3XS">3XS</option>
														<option value="2XS">2XS</option>
														<option value="XS">XS</option>
														<option value="S">S</option>
														<option value="M">M</option>
														<option value="L">L</option>
														<option value="XL">XL</option>
														<option value="XXL">XXL</option>
														<option value="3XL">3XL</option>
													</select>
												</label>
											</div>
										</div>

										<div class="col-12 col-lg-12 col-xl-12 mt-4 mb-4">
											<hr style="color: black; border: 1px solid #ccc;">
										</div>
									</div>

									<!-- Pantalón reversible -->
									<div class="row">
										<div class="col-12 t-center">
											<span class="titulo-prenda"><?php echo $lang["form_ropa_pantalon_reversible"];?></span>
										</div>

										<div class="col-12 mt-3">
											<span class="subtitulo-prenda"><?php echo $lang["form_ropa_paso1"];?> <span style="color: #5a6670;"><?php echo $lang["form_ropa_midete"];?></span></span>
										</div>

										<div class="col-12 hidden-sm hidden-md hidden-lg hidden-xl mt-2">
											<img width="384" height="381" class="img-responsive" src="img/ropa-medida/pantalon-reversible-mini.jpg" alt="Pantalón reversible">
										</div>

										<div class="hidden-xs col-md-12 mt-2">
											<img width="1110" height="460" class="img-responsive" src="img/ropa-medida/pantalon-reversible.jpg" alt="Pantalón reversible">
										</div>

										<div class="col-12 mt-1">
											<p><?php echo $lang["form_ropa_indicacion_medicion"];?></p>
											<ul class="ropa-medida">
												<li><strong><?php echo $lang["form_ropa_cintura"];?></strong> <?php echo $lang["form_ropa_pant_medir_cint"];?></li>
												<li><strong><?php echo $lang["form_ropa_largo"];?></strong> <?php echo $lang["form_ropa_pant_medir_largo"];?></li>
											</ul>
										</div>

										<div class="col-12 mt-4">
											<span class="subtitulo-prenda"><?php echo $lang["form_ropa_paso2"];?> <span style="color: #5a6670;"><?php echo $lang["form_ropa_enc_talla"];?></span></span>
										</div>

										<div class="col-12 mt-2">
											<div class="resultados-reducido">
												<table class="equipos-alqueria-resultados-tabla">
													<thead>
														<tr>
															<th class="t-left">
																<strong><?php echo $lang["form_ropa_talla"];?></strong>
															</th>
															<th class="t-center">
																<strong><?php echo $lang["form_ropa_largo_espalda_cm"];?></strong>
															</th>
															<th class="t-center">
																<strong><?php echo $lang["form_ropa_pecho_cm"];?></strong>
															</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td class="t-left">4XS</td>
															<td class="t-center">47</td>
															<td class="t-center">37</td>
														</tr>
														<tr>
															<td class="t-left">3XS</td>
															<td class="t-center">53</td>
															<td class="t-center">40</td>
														</tr>
														<tr>
															<td class="t-left">2XS</td>
															<td class="t-center">61</td>
															<td class="t-center">43</td>
														</tr>
														<tr>
															<td class="t-left">XS</td>
															<td class="t-center">71</td>
															<td class="t-center">46</td>
														</tr>
														<tr>
															<td class="t-left">S</td>
															<td class="t-center">75</td>
															<td class="t-center">50</td>
														</tr>
														<tr>
															<td class="t-left">M</td>
															<td class="t-center">78</td>
															<td class="t-center">53</td>
														</tr>
														<tr>
															<td class="t-left">L</td>
															<td class="t-center">81</td>
															<td class="t-center">56</td>
														</tr>
														<tr>
															<td class="t-left">XL</td>
															<td class="t-center">84</td>
															<td class="t-center">59</td>
														</tr>
														<tr>
															<td class="t-left">XXL</td>
															<td class="t-center">86</td>
															<td class="t-center">62</td>
														</tr>
														<tr>
															<td class="t-left">3XL</td>
															<td class="t-center">88</td>
															<td class="t-center">65</td>
														</tr>
													</tbody>
												</table>
											</div>

											<div class="resultados-completo">
												<table class="equipos-alqueria-resultados-tabla">
													<thead>
														<tr>
															<th class="t-left">
																<strong><?php echo $lang["form_ropa_especificaciones"];?></strong>
															</th>
															<th class="t-center">
																<strong>4XS</strong>
															</th>
															<th class="t-center">
																<strong>3XS</strong>
															</th>
															<th class="t-center">
																<strong>2XS</strong>
															</th>
															<th class="t-center">
																<strong>XS</strong>
															</th>
															<th class="t-center">
																<strong>S</strong>
															</th>
															<th class="t-center">
																<strong>M</strong>
															</th>
															<th class="t-center">
																<strong>L</strong>
															</th>
															<th class="t-center">
																<strong>XL</strong>
															</th>
															<th class="t-center">
																<strong>XXL</strong>
															</th>
															<th class="t-center">
																<strong>3XL</strong>
															</th>
														</tr>
													</thead>
													<tbody>
														<tr class="equipos-resultados-impar">
															<td class="t-left"><?php echo $lang["form_ropa_cintura_cm"];?></td>
															<td class="t-center">26</td>
															<td class="t-center">28</td>
															<td class="t-center">30</td>
															<td class="t-center">33</td>
															<td class="t-center">36</td>
															<td class="t-center">38</td>
															<td class="t-center">40</td>
															<td class="t-center">42</td>
															<td class="t-center">44</td>
															<td class="t-center">46</td>
														</tr>
														<tr class="equipos-resultados-par">
															<td class="t-left"><?php echo $lang["form_ropa_largo_costado_cm"];?></td>
															<td class="t-center">37</td>
															<td class="t-center">40</td>
															<td class="t-center">43</td>
															<td class="t-center">47</td>
															<td class="t-center">49</td>
															<td class="t-center">51</td>
															<td class="t-center">53</td>
															<td class="t-center">55</td>
															<td class="t-center">57</td>
															<td class="t-center">61</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>

										<div class="col-12 mt-4">
											<span class="subtitulo-prenda"><?php echo $lang["form_ropa_paso3"];?> <span style="color: #5a6670;"><?php echo $lang["form_ropa_select_talla"];?></span></span>
										</div>

										<div class="col-12 col-md-3 col-lg-3 col-xl-3 mt-2 redimension">
											<div class="form-group">
												<label><?php echo $lang["form_ropa_pantalon_reversible"];?>:
													<select id="talla-pantalon-reversible" class="form-control" style="color: #5c5c5c !important;" name="talla_pantalon_reversible" required>
														<option value=""></option>
														<option value="4XS">4XS</option>
														<option value="3XS">3XS</option>
														<option value="2XS">2XS</option>
														<option value="XS">XS</option>
														<option value="S">S</option>
														<option value="M">M</option>
														<option value="L">L</option>
														<option value="XL">XL</option>
														<option value="XXL">XXL</option>
														<option value="3XL">3XL</option>
													</select>
												</label>
											</div>
										</div>

										<div class="col-12 col-lg-12 col-xl-12 mt-4 mb-4">
											<hr style="color: black; border: 1px solid #ccc;">
										</div>
									</div>

									<!-- Camiseta de juego -->
									<div class="row">
										<div class="col-12 t-center">
											<span class="titulo-prenda"><?php echo $lang["form_ropa_camiseta_juego"];?></span>
										</div>

										<div class="col-12 mt-3">
											<span class="subtitulo-prenda"><?php echo $lang["form_ropa_paso1"];?> <span style="color: #5a6670;"><?php echo $lang["form_ropa_midete"];?></span></span>
										</div>

										<div class="col-12 hidden-sm hidden-md hidden-lg hidden-xl mt-2">
											<img width="384" height="381" class="img-responsive" src="img/ropa-medida/camiseta-de-juego-mini.jpg" alt="Camiseta de juego">
										</div>

										<div class="hidden-xs col-md-12 mt-2">
											<img width="1110" height="460" class="img-responsive" src="img/ropa-medida/camiseta-de-juego.jpg" alt="Camiseta de juego">
										</div>

										<div class="col-12 mt-1">
											<p><?php echo $lang["form_ropa_indicacion_medicion"];?></p>
											<ul class="ropa-medida">
												<li><strong><?php echo $lang["form_ropa_busto"];?></strong> <?php echo $lang["form_ropa_cam_medir_busto"];?></li>
												<li><strong><?php echo $lang["form_ropa_largo"];?></strong> <?php echo $lang["form_ropa_cam_medir_largo"];?></li>
											</ul>
										</div>

										<div class="col-12 mt-4">
											<span class="subtitulo-prenda"><?php echo $lang["form_ropa_paso2"];?> <span style="color: #5a6670;"><?php echo $lang["form_ropa_enc_talla"];?></span></span>
										</div>

										<div class="col-12 mt-2">
											<div class="resultados-reducido">
												<table class="equipos-alqueria-resultados-tabla">
													<thead>
														<tr>
															<th class="t-left">
																<strong><?php echo $lang["form_ropa_talla"];?></strong>
															</th>
															<th class="t-center">
																<strong><?php echo $lang["form_ropa_largo_espalda_cm"];?></strong>
															</th>
															<th class="t-center">
																<strong><?php echo $lang["form_ropa_pecho_cm"];?></strong>
															</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td class="t-left">4XS</td>
															<td class="t-center">47</td>
															<td class="t-center">37</td>
														</tr>
														<tr>
															<td class="t-left">3XS</td>
															<td class="t-center">53</td>
															<td class="t-center">40</td>
														</tr>
														<tr>
															<td class="t-left">2XS</td>
															<td class="t-center">61</td>
															<td class="t-center">43</td>
														</tr>
														<tr>
															<td class="t-left">XS</td>
															<td class="t-center">71</td>
															<td class="t-center">46</td>
														</tr>
														<tr>
															<td class="t-left">S</td>
															<td class="t-center">75</td>
															<td class="t-center">50</td>
														</tr>
														<tr>
															<td class="t-left">M</td>
															<td class="t-center">78</td>
															<td class="t-center">53</td>
														</tr>
														<tr>
															<td class="t-left">L</td>
															<td class="t-center">81</td>
															<td class="t-center">56</td>
														</tr>
														<tr>
															<td class="t-left">XL</td>
															<td class="t-center">84</td>
															<td class="t-center">59</td>
														</tr>
														<tr>
															<td class="t-left">XXL</td>
															<td class="t-center">86</td>
															<td class="t-center">62</td>
														</tr>
														<tr>
															<td class="t-left">3XL</td>
															<td class="t-center">88</td>
															<td class="t-center">65</td>
														</tr>
													</tbody>
												</table>
											</div>

											<div class="resultados-completo">
												<table class="equipos-alqueria-resultados-tabla">
													<thead>
														<tr>
															<th class="t-left">
																<strong><?php echo $lang["form_ropa_especificaciones"];?></strong>
															</th>
															<th class="t-center">
																<strong>4XS</strong>
															</th>
															<th class="t-center">
																<strong>3XS</strong>
															</th>
															<th class="t-center">
																<strong>2XS</strong>
															</th>
															<th class="t-center">
																<strong>XS</strong>
															</th>
															<th class="t-center">
																<strong>S</strong>
															</th>
															<th class="t-center">
																<strong>M</strong>
															</th>
															<th class="t-center">
																<strong>L</strong>
															</th>
															<th class="t-center">
																<strong>XL</strong>
															</th>
															<th class="t-center">
																<strong>XXL</strong>
															</th>
															<th class="t-center">
																<strong>3XL</strong>
															</th>
														</tr>
													</thead>
													<tbody>
														<tr class="equipos-resultados-impar">
															<td class="t-left"><?php echo $lang["form_ropa_largo_espalda_cm"];?></td>
															<td class="t-center">58</td>
															<td class="t-center">60</td>
															<td class="t-center">66</td>
															<td class="t-center">76</td>
															<td class="t-center">80</td>
															<td class="t-center">83</td>
															<td class="t-center">86</td>
															<td class="t-center">89</td>
															<td class="t-center">91</td>
															<td class="t-center">93</td>
														</tr>
														<tr class="equipos-resultados-par">
															<td class="t-left"><?php echo $lang["form_ropa_pecho_cm"];?></td>
															<td class="t-center">37</td>
															<td class="t-center">40</td>
															<td class="t-center">43</td>
															<td class="t-center">46</td>
															<td class="t-center">50</td>
															<td class="t-center">53</td>
															<td class="t-center">56</td>
															<td class="t-center">59</td>
															<td class="t-center">62</td>
															<td class="t-center">65</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>

										<div class="col-12 mt-4">
											<span class="subtitulo-prenda"><?php echo $lang["form_ropa_paso3"];?> <span style="color: #5a6670;"><?php echo $lang["form_ropa_select_talla"];?></span></span>
										</div>

										<div class="col-12 col-md-3 col-lg-3 col-xl-3 mt-2 redimension">
											<div class="form-group">
												<label><?php echo $lang["form_ropa_camiseta_juego"];?>:
													<select id="talla-camiseta-de-juego" class="form-control" style="color: #5c5c5c !important;" name="talla_camiseta_de_juego" required>
														<option value=""></option>
														<option value="4XS">4XS</option>
														<option value="3XS">3XS</option>
														<option value="2XS">2XS</option>
														<option value="XS">XS</option>
														<option value="S">S</option>
														<option value="M">M</option>
														<option value="L">L</option>
														<option value="XL">XL</option>
														<option value="XXL">XXL</option>
														<option value="3XL">3XL</option>
													</select>
												</label>
											</div>
										</div>

										<div class="col-12 col-lg-12 col-xl-12 mt-4 mb-4">
											<hr style="color: black; border: 1px solid #ccc;">
										</div>
									</div>

									<!-- Camiseta m/c básica algodón -->
									<div class="row">
										<div class="col-12 t-center">
											<span class="titulo-prenda"><?php echo $lang["form_ropa_camiseta_basica"];?></span>
										</div>

										<div class="col-12 mt-3">
											<span class="subtitulo-prenda"><?php echo $lang["form_ropa_paso1"];?> <span style="color: #5a6670;"><?php echo $lang["form_ropa_midete"];?></span></span>
										</div>

										<div class="col-12 hidden-sm hidden-md hidden-lg hidden-xl mt-2">
											<img width="384" height="381" class="img-responsive" src="img/ropa-medida/camiseta-mc-basica-algodon-mini.jpg" alt="Camiseta m/c básica algodón">
										</div>

										<div class="hidden-xs col-md-12 mt-2">
											<img width="1110" height="460" class="img-responsive" src="img/ropa-medida/camiseta-mc-basica-algodon.jpg" alt="Camiseta m/c básica algodón">
										</div>

										<div class="col-12 mt-1">
											<p><?php echo $lang["form_ropa_indicacion_medicion"];?></p>
											<ul class="ropa-medida">
												<li><strong><?php echo $lang["form_ropa_busto"];?></strong> <?php echo $lang["form_ropa_cam_medir_busto"];?></li>
												<li><strong><?php echo $lang["form_ropa_largo"];?></strong> <?php echo $lang["form_ropa_cam_medir_largo"];?></li>
											</ul>
										</div>

										<div class="col-12 mt-4">
											<span class="subtitulo-prenda"><?php echo $lang["form_ropa_paso2"];?> <span style="color: #5a6670;"><?php echo $lang["form_ropa_enc_talla"];?></span></span>
										</div>

										<div class="col-12 mt-2">
											<div class="resultados-reducido">
												<table class="equipos-alqueria-resultados-tabla">
													<thead>
														<tr>
															<th class="t-left">
																<strong><?php echo $lang["form_ropa_talla"];?></strong>
															</th>
															<th class="t-center">
																<strong><?php echo $lang["form_ropa_largo_espalda_cm"];?></strong>
															</th>
															<th class="t-center">
																<strong><?php echo $lang["form_ropa_pecho_cm"];?></strong>
															</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td class="t-left">4XS</td>
															<td class="t-center">47</td>
															<td class="t-center">37</td>
														</tr>
														<tr>
															<td class="t-left">3XS</td>
															<td class="t-center">53</td>
															<td class="t-center">40</td>
														</tr>
														<tr>
															<td class="t-left">2XS</td>
															<td class="t-center">61</td>
															<td class="t-center">43</td>
														</tr>
														<tr>
															<td class="t-left">XS</td>
															<td class="t-center">71</td>
															<td class="t-center">46</td>
														</tr>
														<tr>
															<td class="t-left">S</td>
															<td class="t-center">75</td>
															<td class="t-center">50</td>
														</tr>
														<tr>
															<td class="t-left">M</td>
															<td class="t-center">78</td>
															<td class="t-center">53</td>
														</tr>
														<tr>
															<td class="t-left">L</td>
															<td class="t-center">81</td>
															<td class="t-center">56</td>
														</tr>
														<tr>
															<td class="t-left">XL</td>
															<td class="t-center">84</td>
															<td class="t-center">59</td>
														</tr>
														<tr>
															<td class="t-left">XXL</td>
															<td class="t-center">86</td>
															<td class="t-center">62</td>
														</tr>
														<tr>
															<td class="t-left">3XL</td>
															<td class="t-center">88</td>
															<td class="t-center">65</td>
														</tr>
													</tbody>
												</table>
											</div>

											<div class="resultados-completo">
												<table class="equipos-alqueria-resultados-tabla">
													<thead>
														<tr>
															<th class="t-left">
																<strong><?php echo $lang["form_ropa_especificaciones"];?></strong>
															</th>
															<th class="t-center">
																<strong>4XS</strong>
															</th>
															<th class="t-center">
																<strong>3XS</strong>
															</th>
															<th class="t-center">
																<strong>2XS</strong>
															</th>
															<th class="t-center">
																<strong>XS</strong>
															</th>
															<th class="t-center">
																<strong>S</strong>
															</th>
															<th class="t-center">
																<strong>M</strong>
															</th>
															<th class="t-center">
																<strong>L</strong>
															</th>
															<th class="t-center">
																<strong>XL</strong>
															</th>
															<th class="t-center">
																<strong>XXL</strong>
															</th>
															<th class="t-center">
																<strong>3XL</strong>
															</th>
														</tr>
													</thead>
													<tbody>
														<tr class="equipos-resultados-impar">
															<td class="t-left"><?php echo $lang["form_ropa_largo_espalda_cm"];?></td>
															<td class="t-center">42</td>
															<td class="t-center">48</td>
															<td class="t-center">56</td>
															<td class="t-center">66</td>
															<td class="t-center">70</td>
															<td class="t-center">73</td>
															<td class="t-center">76</td>
															<td class="t-center">79</td>
															<td class="t-center">85</td>
															<td class="t-center">87</td>
														</tr>
														<tr class="equipos-resultados-par">
															<td class="t-left"><?php echo $lang["form_ropa_pecho_cm"];?></td>
															<td class="t-center">37</td>
															<td class="t-center">40</td>
															<td class="t-center">43</td>
															<td class="t-center">46</td>
															<td class="t-center">50</td>
															<td class="t-center">53</td>
															<td class="t-center">56</td>
															<td class="t-center">59</td>
															<td class="t-center">62</td>
															<td class="t-center">65</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>

										<div class="col-12 mt-4">
											<span class="subtitulo-prenda"><?php echo $lang["form_ropa_paso3"];?> <span style="color: #5a6670;"><?php echo $lang["form_ropa_select_talla"];?></span></span>
										</div>

										<div class="col-12 col-md-3 col-lg-3 col-xl-3 mt-2 redimension">
											<div class="form-group">
												<label><?php echo $lang["form_ropa_camiseta_basica"];?>:
													<select id="talla-camiseta-basica-algodon" class="form-control" style="color: #5c5c5c !important;" name="talla_camiseta_basica_algodon" required>
														<option value=""></option>
														<option value="4XS">4XS</option>
														<option value="3XS">3XS</option>
														<option value="2XS">2XS</option>
														<option value="XS">XS</option>
														<option value="S">S</option>
														<option value="M">M</option>
														<option value="L">L</option>
														<option value="XL">XL</option>
														<option value="XXL">XXL</option>
														<option value="3XL">3XL</option>
													</select>
												</label>
											</div>
										</div>

										<div class="col-12 col-lg-12 col-xl-12 mt-4 mb-4">
											<hr style="color: black; border: 1px solid #ccc;">
										</div>
									</div>

									<!-- Sudadera entreno VBC -->
									<div class="row">
										<div class="col-12 t-center">
											<span class="titulo-prenda"><?php echo $lang["form_ropa_sudadera"];?></span>
										</div>

										<div class="col-12 mt-3">
											<span class="subtitulo-prenda"><?php echo $lang["form_ropa_paso1"];?> <span style="color: #5a6670;"><?php echo $lang["form_ropa_midete"];?></span></span>
										</div>

										<div class="col-12 hidden-sm hidden-md hidden-lg hidden-xl mt-2">
											<img width="384" height="381" class="img-responsive" src="img/ropa-medida/sudadera-entreno-vbc-mini.jpg" alt="Sudadera entreno VBC">
										</div>

										<div class="hidden-xs col-md-12 mt-2">
											<img width="1110" height="460" class="img-responsive" src="img/ropa-medida/sudadera-entreno-vbc.jpg" alt="Sudadera entreno VBC">
										</div>

										<div class="col-12 mt-1">
											<p><?php echo $lang["form_ropa_indicacion_medicion"];?></p>
											<ul class="ropa-medida">
												<li><strong><?php echo $lang["form_ropa_busto"];?></strong> <?php echo $lang["form_ropa_cam_medir_busto"];?></li>
												<li><strong><?php echo $lang["form_ropa_largo"];?></strong> <?php echo $lang["form_ropa_cam_medir_largo"];?></li>
											</ul>
										</div>

										<div class="col-12 mt-4">
											<span class="subtitulo-prenda"><?php echo $lang["form_ropa_paso2"];?> <span style="color: #5a6670;"><?php echo $lang["form_ropa_enc_talla"];?></span></span>
										</div>

										<div class="col-12 mt-2">
											<div class="resultados-reducido">
												<table class="equipos-alqueria-resultados-tabla">
													<thead>
														<tr>
															<th class="t-left">
																<strong><?php echo $lang["form_ropa_talla"];?></strong>
															</th>
															<th class="t-center">
																<strong><?php echo $lang["form_ropa_largo_espalda_cm"];?></strong>
															</th>
															<th class="t-center">
																<strong><?php echo $lang["form_ropa_pecho_cm"];?></strong>
															</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td class="t-left">4XS</td>
															<td class="t-center">47</td>
															<td class="t-center">37</td>
														</tr>
														<tr>
															<td class="t-left">3XS</td>
															<td class="t-center">53</td>
															<td class="t-center">40</td>
														</tr>
														<tr>
															<td class="t-left">2XS</td>
															<td class="t-center">61</td>
															<td class="t-center">43</td>
														</tr>
														<tr>
															<td class="t-left">XS</td>
															<td class="t-center">71</td>
															<td class="t-center">46</td>
														</tr>
														<tr>
															<td class="t-left">S</td>
															<td class="t-center">75</td>
															<td class="t-center">50</td>
														</tr>
														<tr>
															<td class="t-left">M</td>
															<td class="t-center">78</td>
															<td class="t-center">53</td>
														</tr>
														<tr>
															<td class="t-left">L</td>
															<td class="t-center">81</td>
															<td class="t-center">56</td>
														</tr>
														<tr>
															<td class="t-left">XL</td>
															<td class="t-center">84</td>
															<td class="t-center">59</td>
														</tr>
														<tr>
															<td class="t-left">XXL</td>
															<td class="t-center">86</td>
															<td class="t-center">62</td>
														</tr>
														<tr>
															<td class="t-left">3XL</td>
															<td class="t-center">88</td>
															<td class="t-center">65</td>
														</tr>
													</tbody>
												</table>
											</div>

											<div class="resultados-completo">
												<table class="equipos-alqueria-resultados-tabla">
													<thead>
														<tr>
															<th class="t-left">
																<strong><?php echo $lang["form_ropa_especificaciones"];?></strong>
															</th>
															<th class="t-center">
																<strong>4XS</strong>
															</th>
															<th class="t-center">
																<strong>3XS</strong>
															</th>
															<th class="t-center">
																<strong>2XS</strong>
															</th>
															<th class="t-center">
																<strong>XS</strong>
															</th>
															<th class="t-center">
																<strong>S</strong>
															</th>
															<th class="t-center">
																<strong>M</strong>
															</th>
															<th class="t-center">
																<strong>L</strong>
															</th>
															<th class="t-center">
																<strong>XL</strong>
															</th>
															<th class="t-center">
																<strong>XXL</strong>
															</th>
															<th class="t-center">
																<strong>3XL</strong>
															</th>
														</tr>
													</thead>
													<tbody>
														<tr class="equipos-resultados-impar">
															<td class="t-left"><?php echo $lang["form_ropa_largo_espalda_cm"];?></td>
															<td class="t-center">50</td>
															<td class="t-center">54</td>
															<td class="t-center">60</td>
															<td class="t-center">68</td>
															<td class="t-center">70</td>
															<td class="t-center">72</td>
															<td class="t-center">74</td>
															<td class="t-center">76</td>
															<td class="t-center">78</td>
															<td class="t-center">83</td>
														</tr>
														<tr class="equipos-resultados-par">
															<td class="t-left"><?php echo $lang["form_ropa_pecho_cm"];?></td>
															<td class="t-center">39</td>
															<td class="t-center">42</td>
															<td class="t-center">45</td>
															<td class="t-center">48</td>
															<td class="t-center">52</td>
															<td class="t-center">55</td>
															<td class="t-center">58</td>
															<td class="t-center">61</td>
															<td class="t-center">64</td>
															<td class="t-center">67</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>

										<div class="col-12 mt-4">
											<span class="subtitulo-prenda"><?php echo $lang["form_ropa_paso3"];?> <span style="color: #5a6670;"><?php echo $lang["form_ropa_select_talla"];?></span></span>
										</div>

										<div class="col-12 col-md-3 col-lg-3 col-xl-3 mt-2 redimension">
											<div class="form-group">
												<label><?php echo $lang["form_ropa_sudadera"];?>:
													<select id="talla-sudadera-entreno-vbc" class="form-control" style="color: #5c5c5c !important;" name="talla_sudadera_entreno_vbc" required>
														<option value=""></option>
														<option value="4XS">4XS</option>
														<option value="3XS">3XS</option>
														<option value="2XS">2XS</option>
														<option value="XS">XS</option>
														<option value="S">S</option>
														<option value="M">M</option>
														<option value="L">L</option>
														<option value="XL">XL</option>
														<option value="XXL">XXL</option>
														<option value="3XL">3XL</option>
													</select>
												</label>
											</div>
										</div>

										<div class="col-12 col-lg-12 col-xl-12 mt-4 mb-4">
											<hr style="color: black; border: 1px solid #ccc;">
										</div>
									</div>

									<!-- Pantalón de juego -->
									<div class="row">
										<div class="col-12 t-center">
											<span class="titulo-prenda"><?php echo $lang["form_ropa_pantalon_juego"];?></span>
										</div>

										<div class="col-12 mt-3">
											<span class="subtitulo-prenda"><?php echo $lang["form_ropa_paso1"];?> <span style="color: #5a6670;"><?php echo $lang["form_ropa_midete"];?></span></span>
										</div>

										<div class="col-12 hidden-sm hidden-md hidden-lg hidden-xl mt-2">
											<img width="384" height="381" class="img-responsive" src="img/ropa-medida/pantalon-de-juego-mini.jpg" alt="Pantalón de juego">
										</div>

										<div class="hidden-xs col-md-12 mt-2">
											<img width="1110" height="460" class="img-responsive" src="img/ropa-medida/pantalon-de-juego.jpg" alt="Pantalón de juego">
										</div>

										<div class="col-12 mt-1">
											<p><?php echo $lang["form_ropa_indicacion_medicion"];?></p>
											<ul class="ropa-medida">
												<li><strong><?php echo $lang["form_ropa_cintura"];?></strong> <?php echo $lang["form_ropa_pant_medir_cint"];?></li>
												<li><strong><?php echo $lang["form_ropa_largo"];?></strong> <?php echo $lang["form_ropa_pant_medir_largo"];?></li>
											</ul>
										</div>

										<div class="col-12 mt-4">
											<span class="subtitulo-prenda"><?php echo $lang["form_ropa_paso2"];?> <span style="color: #5a6670;"><?php echo $lang["form_ropa_enc_talla"];?></span></span>
										</div>

										<div class="col-12 mt-2">
											<div class="resultados-reducido">
												<table class="equipos-alqueria-resultados-tabla">
													<thead>
														<tr>
															<th class="t-left">
																<strong><?php echo $lang["form_ropa_talla"];?>/strong>
															</th>
															<th class="t-center">
																<strong><?php echo $lang["form_ropa_largo_espalda_cm"];?></strong>
															</th>
															<th class="t-center">
																<strong><?php echo $lang["form_ropa_pecho_cm"];?></strong>
															</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td class="t-left">4XS</td>
															<td class="t-center">47</td>
															<td class="t-center">37</td>
														</tr>
														<tr>
															<td class="t-left">3XS</td>
															<td class="t-center">53</td>
															<td class="t-center">40</td>
														</tr>
														<tr>
															<td class="t-left">2XS</td>
															<td class="t-center">61</td>
															<td class="t-center">43</td>
														</tr>
														<tr>
															<td class="t-left">XS</td>
															<td class="t-center">71</td>
															<td class="t-center">46</td>
														</tr>
														<tr>
															<td class="t-left">S</td>
															<td class="t-center">75</td>
															<td class="t-center">50</td>
														</tr>
														<tr>
															<td class="t-left">M</td>
															<td class="t-center">78</td>
															<td class="t-center">53</td>
														</tr>
														<tr>
															<td class="t-left">L</td>
															<td class="t-center">81</td>
															<td class="t-center">56</td>
														</tr>
														<tr>
															<td class="t-left">XL</td>
															<td class="t-center">84</td>
															<td class="t-center">59</td>
														</tr>
														<tr>
															<td class="t-left">XXL</td>
															<td class="t-center">86</td>
															<td class="t-center">62</td>
														</tr>
														<tr>
															<td class="t-left">3XL</td>
															<td class="t-center">88</td>
															<td class="t-center">65</td>
														</tr>
													</tbody>
												</table>
											</div>

											<div class="resultados-completo">
												<table class="equipos-alqueria-resultados-tabla">
													<thead>
														<tr>
															<th class="t-left">
																<strong><?php echo $lang["form_ropa_especificaciones"];?></strong>
															</th>
															<th class="t-center">
																<strong>4XS</strong>
															</th>
															<th class="t-center">
																<strong>3XS</strong>
															</th>
															<th class="t-center">
																<strong>2XS</strong>
															</th>
															<th class="t-center">
																<strong>XS</strong>
															</th>
															<th class="t-center">
																<strong>S</strong>
															</th>
															<th class="t-center">
																<strong>M</strong>
															</th>
															<th class="t-center">
																<strong>L</strong>
															</th>
															<th class="t-center">
																<strong>XL</strong>
															</th>
															<th class="t-center">
																<strong>XXL</strong>
															</th>
															<th class="t-center">
																<strong>3XL</strong>
															</th>
														</tr>
													</thead>
													<tbody>
														<tr class="equipos-resultados-impar">
															<td class="t-left"><?php echo $lang["form_ropa_cintura_cm"];?></td>
															<td class="t-center">26</td>
															<td class="t-center">28</td>
															<td class="t-center">30</td>
															<td class="t-center">33</td>
															<td class="t-center">36</td>
															<td class="t-center">38</td>
															<td class="t-center">40</td>
															<td class="t-center">42</td>
															<td class="t-center">44</td>
															<td class="t-center">46</td>
														</tr>
														<tr class="equipos-resultados-par">
															<td class="t-left"><?php echo $lang["form_ropa_largo_costado_cm"];?></td>
															<td class="t-center">37</td>
															<td class="t-center">40</td>
															<td class="t-center">43</td>
															<td class="t-center">47</td>
															<td class="t-center">49</td>
															<td class="t-center">51</td>
															<td class="t-center">53</td>
															<td class="t-center">55</td>
															<td class="t-center">57</td>
															<td class="t-center">57</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>

										<div class="col-12 mt-4">
											<span class="subtitulo-prenda"><?php echo $lang["form_ropa_paso3"];?> <span style="color: #5a6670;"><?php echo $lang["form_ropa_select_talla"];?></span></span>
										</div>

										<div class="col-12 col-md-3 col-lg-3 col-xl-3 mt-2 redimension">
											<div class="form-group">
												<label><?php echo $lang["form_ropa_pantalon_juego"];?>:
													<select id="talla-pantalon-de-juego" class="form-control" style="color: #5c5c5c !important;" name="talla_pantalon_de_juego" required>
														<option value=""></option>
														<option value="4XS">4XS</option>
														<option value="3XS">3XS</option>
														<option value="2XS">2XS</option>
														<option value="XS">XS</option>
														<option value="S">S</option>
														<option value="M">M</option>
														<option value="L">L</option>
														<option value="XL">XL</option>
														<option value="XXL">XXL</option>
														<option value="3XL">3XL</option>
													</select>
												</label>
											</div>
										</div>

										<div class="col-12 col-lg-12 col-xl-12 mt-4 mb-4">
											<hr style="color: black; border: 1px solid #ccc;">
										</div>
									</div>

									<!-- Chaqueta chándal paseo -->
									<div class="row">
										<div class="col-12 t-center">
											<span class="titulo-prenda"><?php echo $lang["form_ropa_chaqueta"];?></span>
										</div>

										<div class="col-12 mt-3">
											<span class="subtitulo-prenda"><?php echo $lang["form_ropa_paso1"];?> <span style="color: #5a6670;"><?php echo $lang["form_ropa_midete"];?></span></span>
										</div>

										<div class="col-12 hidden-sm hidden-md hidden-lg hidden-xl mt-2">
											<img width="384" height="381" class="img-responsive" src="img/ropa-medida/chaqueta-chandal-paseo-mini.jpg" alt="Chaqueta chándal paseo">
										</div>

										<div class="hidden-xs col-md-12 mt-2">
											<img width="1110" height="460" class="img-responsive" src="img/ropa-medida/chaqueta-chandal-paseo.jpg" alt="Chaqueta chándal paseo">
										</div>

										<div class="col-12 mt-1">
											<p><?php echo $lang["form_ropa_indicacion_medicion"];?></p>
											<ul class="ropa-medida">
												<li><strong><?php echo $lang["form_ropa_busto"];?></strong> <?php echo $lang["form_ropa_cam_medir_busto"];?></li>
												<li><strong><?php echo $lang["form_ropa_largo"];?></strong> <?php echo $lang["form_ropa_cam_medir_largo"];?></li>
											</ul>
										</div>

										<div class="col-12 mt-4">
											<span class="subtitulo-prenda"><?php echo $lang["form_ropa_paso2"];?> <span style="color: #5a6670;"><?php echo $lang["form_ropa_enc_talla"];?></span></span>
										</div>

										<div class="col-12 mt-2">
											<div class="resultados-reducido">
												<table class="equipos-alqueria-resultados-tabla">
													<thead>
														<tr>
															<th class="t-left">
																<strong><?php echo $lang["form_ropa_talla"];?></strong>
															</th>
															<th class="t-center">
																<strong><?php echo $lang["form_ropa_largo_espalda_cm"];?></strong>
															</th>
															<th class="t-center">
																<strong><?php echo $lang["form_ropa_pecho_cm"];?></strong>
															</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td class="t-left">4XS</td>
															<td class="t-center">47</td>
															<td class="t-center">37</td>
														</tr>
														<tr>
															<td class="t-left">3XS</td>
															<td class="t-center">53</td>
															<td class="t-center">40</td>
														</tr>
														<tr>
															<td class="t-left">2XS</td>
															<td class="t-center">61</td>
															<td class="t-center">43</td>
														</tr>
														<tr>
															<td class="t-left">XS</td>
															<td class="t-center">71</td>
															<td class="t-center">46</td>
														</tr>
														<tr>
															<td class="t-left">S</td>
															<td class="t-center">75</td>
															<td class="t-center">50</td>
														</tr>
														<tr>
															<td class="t-left">M</td>
															<td class="t-center">78</td>
															<td class="t-center">53</td>
														</tr>
														<tr>
															<td class="t-left">L</td>
															<td class="t-center">81</td>
															<td class="t-center">56</td>
														</tr>
														<tr>
															<td class="t-left">XL</td>
															<td class="t-center">84</td>
															<td class="t-center">59</td>
														</tr>
														<tr>
															<td class="t-left">XXL</td>
															<td class="t-center">86</td>
															<td class="t-center">62</td>
														</tr>
														<tr>
															<td class="t-left">3XL</td>
															<td class="t-center">88</td>
															<td class="t-center">65</td>
														</tr>
													</tbody>
												</table>
											</div>

											<div class="resultados-completo">
												<table class="equipos-alqueria-resultados-tabla">
													<thead>
														<tr>
															<th class="t-left">
																<strong><?php echo $lang["form_ropa_especificaciones"];?></strong>
															</th>
															<th class="t-center">
																<strong>4XS</strong>
															</th>
															<th class="t-center">
																<strong>3XS</strong>
															</th>
															<th class="t-center">
																<strong>2XS</strong>
															</th>
															<th class="t-center">
																<strong>XS</strong>
															</th>
															<th class="t-center">
																<strong>S</strong>
															</th>
															<th class="t-center">
																<strong>M</strong>
															</th>
															<th class="t-center">
																<strong>L</strong>
															</th>
															<th class="t-center">
																<strong>XL</strong>
															</th>
															<th class="t-center">
																<strong>XXL</strong>
															</th>
															<th class="t-center">
																<strong>3XL</strong>
															</th>
														</tr>
													</thead>
													<tbody>
														<tr class="equipos-resultados-impar">
															<td class="t-left"><?php echo $lang["form_ropa_largo_espalda_cm"];?></td>
															<td class="t-center">49</td>
															<td class="t-center">55</td>
															<td class="t-center">61</td>
															<td class="t-center">67</td>
															<td class="t-center">71</td>
															<td class="t-center">73</td>
															<td class="t-center">75</td>
															<td class="t-center">77</td>
															<td class="t-center">79</td>
															<td class="t-center">85</td>
														</tr>
														<tr class="equipos-resultados-par">
															<td class="t-left"><?php echo $lang["form_ropa_pecho_cm"];?></td>
															<td class="t-center">39</td>
															<td class="t-center">42</td>
															<td class="t-center">45</td>
															<td class="t-center">48</td>
															<td class="t-center">51</td>
															<td class="t-center">55</td>
															<td class="t-center">59</td>
															<td class="t-center">63</td>
															<td class="t-center">66</td>
															<td class="t-center">69</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>

										<div class="col-12 mt-4">
											<span class="subtitulo-prenda"><?php echo $lang["form_ropa_paso3"];?> <span style="color: #5a6670;"><?php echo $lang["form_ropa_select_talla"];?></span></span>
										</div>

										<div class="col-12 col-md-3 col-lg-3 col-xl-3 mt-2 redimension">
											<div class="form-group">
												<label><?php echo $lang["form_ropa_chaqueta"];?>:
													<select id="talla-chaqueta-chandal-paseo" class="form-control" style="color: #5c5c5c !important;" name="talla_chaqueta_chandal_paseo" required>
														<option value=""></option>
														<option value="4XS">4XS</option>
														<option value="3XS">3XS</option>
														<option value="2XS">2XS</option>
														<option value="XS">XS</option>
														<option value="S">S</option>
														<option value="M">M</option>
														<option value="L">L</option>
														<option value="XL">XL</option>
														<option value="XXL">XXL</option>
														<option value="3XL">3XL</option>
													</select>
												</label>
											</div>
										</div>

										<div class="col-12 col-lg-12 col-xl-12 mt-4 mb-4">
											<hr style="color: black; border: 1px solid #ccc;">
										</div>
									</div>

									<!-- Chaqueta polar -->
									<div id="chaqueta-polar-container" class="row">
										<div class="col-12 t-center">
											<span class="titulo-prenda"><?php echo $lang["form_ropa_chaqueta_polar"];?></span>
										</div>

										<div class="col-12 mt-3">
											<span class="subtitulo-prenda">Paso 1: <span style="color: #5a6670;">Mídete</span></span>
										</div>

										<div class="col-12 hidden-sm hidden-md hidden-lg hidden-xl mt-2">
											<img width="384" height="381" class="img-responsive" src="img/ropa-medida/chaqueta-polar-mini.jpg" alt="Chaqueta polar">
										</div>

										<div class="hidden-xs col-md-12 mt-2">
											<img width="1110" height="460" class="img-responsive" src="img/ropa-medida/chaqueta-polar.jpg" alt="Chaqueta polar">
										</div>

										<div class="col-12 mt-1">
											<p><?php echo $lang["form_ropa_indicacion_medicion"];?></p>
											<ul class="ropa-medida">
												<li><strong><?php echo $lang["form_ropa_busto"];?></strong> <?php echo $lang["form_ropa_cam_medir_busto"];?></li>
												<li><strong><?php echo $lang["form_ropa_largo"];?></strong> <?php echo $lang["form_ropa_cam_medir_largo"];?></li>
											</ul>
										</div>

										<div class="col-12 mt-4">
											<span class="subtitulo-prenda"><?php echo $lang["form_ropa_paso2"];?> <span style="color: #5a6670;"><?php echo $lang["form_ropa_enc_talla"];?></span></span>
										</div>

										<div class="col-12 mt-2">
											<div class="resultados-reducido">
												<table class="equipos-alqueria-resultados-tabla">
													<thead>
														<tr>
															<th class="t-left">
																<strong><?php echo $lang["form_ropa_talla"];?></strong>
															</th>
															<th class="t-center">
																<strong><?php echo $lang["form_ropa_largo_espalda_cm"];?></strong>
															</th>
															<th class="t-center">
																<strong><?php echo $lang["form_ropa_pecho_cm"];?></strong>
															</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td class="t-left">4XS</td>
															<td class="t-center">47</td>
															<td class="t-center">37</td>
														</tr>
														<tr>
															<td class="t-left">3XS</td>
															<td class="t-center">53</td>
															<td class="t-center">40</td>
														</tr>
														<tr>
															<td class="t-left">2XS</td>
															<td class="t-center">61</td>
															<td class="t-center">43</td>
														</tr>
														<tr>
															<td class="t-left">XS</td>
															<td class="t-center">71</td>
															<td class="t-center">46</td>
														</tr>
														<tr>
															<td class="t-left">S</td>
															<td class="t-center">75</td>
															<td class="t-center">50</td>
														</tr>
														<tr>
															<td class="t-left">M</td>
															<td class="t-center">78</td>
															<td class="t-center">53</td>
														</tr>
														<tr>
															<td class="t-left">L</td>
															<td class="t-center">81</td>
															<td class="t-center">56</td>
														</tr>
														<tr>
															<td class="t-left">XL</td>
															<td class="t-center">84</td>
															<td class="t-center">59</td>
														</tr>
														<tr>
															<td class="t-left">XXL</td>
															<td class="t-center">86</td>
															<td class="t-center">62</td>
														</tr>
														<tr>
															<td class="t-left">3XL</td>
															<td class="t-center">88</td>
															<td class="t-center">65</td>
														</tr>
													</tbody>
												</table>
											</div>

											<div class="resultados-completo">
												<table class="equipos-alqueria-resultados-tabla">
													<thead>
														<tr>
															<th class="t-left">
																<strong><?php echo $lang["form_ropa_especificaciones"];?></strong>
															</th>
															<th class="t-center">
																<strong>4XS</strong>
															</th>
															<th class="t-center">
																<strong>3XS</strong>
															</th>
															<th class="t-center">
																<strong>2XS</strong>
															</th>
															<th class="t-center">
																<strong>XS</strong>
															</th>
															<th class="t-center">
																<strong>S</strong>
															</th>
															<th class="t-center">
																<strong>M</strong>
															</th>
															<th class="t-center">
																<strong>L</strong>
															</th>
															<th class="t-center">
																<strong>XL</strong>
															</th>
															<th class="t-center">
																<strong>XXL</strong>
															</th>
															<th class="t-center">
																<strong>3XL</strong>
															</th>
														</tr>
													</thead>
													<tbody>
														<tr class="equipos-resultados-impar">
															<td class="t-left"><?php echo $lang["form_ropa_largo_espalda_cm"];?></td>
															<td class="t-center">50</td>
															<td class="t-center">54</td>
															<td class="t-center">60</td>
															<td class="t-center">68</td>
															<td class="t-center">70</td>
															<td class="t-center">72</td>
															<td class="t-center">74</td>
															<td class="t-center">76</td>
															<td class="t-center">78</td>
															<td class="t-center">83</td>
														</tr>
														<tr class="equipos-resultados-par">
															<td class="t-left"><?php echo $lang["form_ropa_pecho_cm"];?></td>
															<td class="t-center">42</td>
															<td class="t-center">45</td>
															<td class="t-center">48</td>
															<td class="t-center">51</td>
															<td class="t-center">54</td>
															<td class="t-center">58</td>
															<td class="t-center">62</td>
															<td class="t-center">66</td>
															<td class="t-center">70</td>
															<td class="t-center">74</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>

										<div class="col-12 mt-4">
											<span class="subtitulo-prenda"><?php echo $lang["form_ropa_paso3"];?> <span style="color: #5a6670;"><?php echo $lang["form_ropa_select_talla"];?></span></span>
										</div>

										<div class="col-12 col-md-3 col-lg-3 col-xl-3 mt-2 redimension">
											<div class="form-group">
												<label><?php echo $lang["form_ropa_chaqueta_polar"];?>:
													<select id="talla-chaqueta-polar" class="form-control" style="color: #5c5c5c !important;" name="talla_chaqueta_polar" required>
														<option value=""></option>
														<option value="4XS">4XS</option>
														<option value="3XS">3XS</option>
														<option value="2XS">2XS</option>
														<option value="XS">XS</option>
														<option value="S">S</option>
														<option value="M">M</option>
														<option value="L">L</option>
														<option value="XL">XL</option>
														<option value="XXL">XXL</option>
														<option value="3XL">3XL</option>
													</select>
												</label>
                                                <input id="talla-chaqueta-polar-obligatoria" type="hidden" value="si">
											</div>
										</div>

										<div class="col-12 col-lg-12 col-xl-12 mt-4 mb-4">
											<hr style="color: black; border: 1px solid #ccc;">
										</div>
									</div>

									<!-- Polo manga corta -->
									<div class="row">
										<div class="col-12 t-center">
											<span class="titulo-prenda"><?php echo $lang["form_ropa_polo_mc"];?></span>
										</div>

										<div class="col-12 mt-3">
											<span class="subtitulo-prenda"><?php echo $lang["form_ropa_paso1"];?> <span style="color: #5a6670;"><?php echo $lang["form_ropa_midete"];?></span></span>
										</div>

										<div class="col-12 hidden-sm hidden-md hidden-lg hidden-xl mt-2">
											<img width="384" height="381" class="img-responsive" src="img/ropa-medida/polo-manga-corta-mini.jpg" alt="Polo manga corta">
										</div>

										<div class="hidden-xs col-md-12 mt-2">
											<img width="1110" height="460" class="img-responsive" src="img/ropa-medida/polo-manga-corta.jpg" alt="Polo manga corta">
										</div>

										<div class="col-12 mt-1">
											<p><?php echo $lang["form_ropa_indicacion_medicion"];?></p>
											<ul class="ropa-medida">
												<li><strong><?php echo $lang["form_ropa_busto"];?></strong> <?php echo $lang["form_ropa_cam_medir_busto"];?></li>
												<li><strong><?php echo $lang["form_ropa_largo"];?></strong> <?php echo $lang["form_ropa_cam_medir_largo"];?></li>
											</ul>
										</div>

										<div class="col-12 mt-4">
											<span class="subtitulo-prenda"><?php echo $lang["form_ropa_paso2"];?> <span style="color: #5a6670;"><?php echo $lang["form_ropa_enc_talla"];?></span></span>
										</div>

										<div class="col-12 mt-2">
											<div class="resultados-reducido">
												<table class="equipos-alqueria-resultados-tabla">
													<thead>
														<tr>
															<th class="t-left">
																<strong><?php echo $lang["form_ropa_talla"];?></strong>
															</th>
															<th class="t-center">
																<strong><?php echo $lang["form_ropa_largo_espalda_cm"];?></strong>
															</th>
															<th class="t-center">
																<strong><?php echo $lang["form_ropa_pecho_cm"];?></strong>
															</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td class="t-left">4XS</td>
															<td class="t-center">47</td>
															<td class="t-center">37</td>
														</tr>
														<tr>
															<td class="t-left">3XS</td>
															<td class="t-center">53</td>
															<td class="t-center">40</td>
														</tr>
														<tr>
															<td class="t-left">2XS</td>
															<td class="t-center">61</td>
															<td class="t-center">43</td>
														</tr>
														<tr>
															<td class="t-left">XS</td>
															<td class="t-center">71</td>
															<td class="t-center">46</td>
														</tr>
														<tr>
															<td class="t-left">S</td>
															<td class="t-center">75</td>
															<td class="t-center">50</td>
														</tr>
														<tr>
															<td class="t-left">M</td>
															<td class="t-center">78</td>
															<td class="t-center">53</td>
														</tr>
														<tr>
															<td class="t-left">L</td>
															<td class="t-center">81</td>
															<td class="t-center">56</td>
														</tr>
														<tr>
															<td class="t-left">XL</td>
															<td class="t-center">84</td>
															<td class="t-center">59</td>
														</tr>
														<tr>
															<td class="t-left">XXL</td>
															<td class="t-center">86</td>
															<td class="t-center">62</td>
														</tr>
														<tr>
															<td class="t-left">3XL</td>
															<td class="t-center">88</td>
															<td class="t-center">65</td>
														</tr>
													</tbody>
												</table>
											</div>

											<div class="resultados-completo">
												<table class="equipos-alqueria-resultados-tabla">
													<thead>
														<tr>
															<th class="t-left">
																<strong><?php echo $lang["form_ropa_especificaciones"];?></strong>
															</th>
															<th class="t-center">
																<strong>4XS</strong>
															</th>
															<th class="t-center">
																<strong>3XS</strong>
															</th>
															<th class="t-center">
																<strong>2XS</strong>
															</th>
															<th class="t-center">
																<strong>XS</strong>
															</th>
															<th class="t-center">
																<strong>S</strong>
															</th>
															<th class="t-center">
																<strong>M</strong>
															</th>
															<th class="t-center">
																<strong>L</strong>
															</th>
															<th class="t-center">
																<strong>XL</strong>
															</th>
															<th class="t-center">
																<strong>XXL</strong>
															</th>
															<th class="t-center">
																<strong>3XL</strong>
															</th>
														</tr>
													</thead>
													<tbody>
														<tr class="equipos-resultados-impar">
															<td class="t-left"><?php echo $lang["form_ropa_largo_espalda_cm"];?></td>
															<td class="t-center">42</td>
															<td class="t-center">48</td>
															<td class="t-center">56</td>
															<td class="t-center">66</td>
															<td class="t-center">70</td>
															<td class="t-center">73</td>
															<td class="t-center">76</td>
															<td class="t-center">79</td>
															<td class="t-center">85</td>
															<td class="t-center">87</td>
														</tr>
														<tr class="equipos-resultados-par">
															<td class="t-left"><?php echo $lang["form_ropa_pecho_cm"];?></td>
															<td class="t-center">37</td>
															<td class="t-center">40</td>
															<td class="t-center">43</td>
															<td class="t-center">46</td>
															<td class="t-center">50</td>
															<td class="t-center">53</td>
															<td class="t-center">56</td>
															<td class="t-center">59</td>
															<td class="t-center">62</td>
															<td class="t-center">65</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>

										<div class="col-12 mt-4">
											<span class="subtitulo-prenda"><?php echo $lang["form_ropa_paso3"];?> <span style="color: #5a6670;"><?php echo $lang["form_ropa_select_talla"];?></span></span>
										</div>

										<div class="col-12 col-md-3 col-lg-3 col-xl-3 mt-2 redimension">
											<div class="form-group">
												<label><?php echo $lang["form_ropa_polo_mc"];?>:
													<select id="talla-polo-manga-corta" class="form-control" style="color: #5c5c5c !important;" name="talla_polo_manga_corta" required>
														<option value=""></option>
														<option value="4XS">4XS</option>
														<option value="3XS">3XS</option>
														<option value="2XS">2XS</option>
														<option value="XS">XS</option>
														<option value="S">S</option>
														<option value="M">M</option>
														<option value="L">L</option>
														<option value="XL">XL</option>
														<option value="XXL">XXL</option>
														<option value="3XL">3XL</option>
													</select>
												</label>
											</div>
										</div>
									</div>
                                    
                                    <!-- Paso 7: Firmas y envío de la inscripción -->
									<div class="row renovacion-row mt-2">
										<!-- Envío de la solicitud -->
										<div id="submit-container" class="col-12 mt-2 mb-4"> 
											<!-- <input type="hidden" id="existe_inscripcion" value="0" name="existe_inscripcion"> -->
											<input type="hidden" id="jugador-id" value="">
											<button id="submit-formulario-rellenar-tallas" class="btn btn-link-w w-100 input-control-dni" 
                                                    type="submit" style="width:100%;margin-left:0px;" id="submit">
												<span><?php echo $lang["ins_form_enviar_solicitud"];?></span>
											</button>
										</div>
									</div>
                                    
                                    <div id="rellenar-tallas-form-respuesta" class="row renovacion-row">
                                        <div class="col-12">
                                            
                                        </div>
                                    </div>
								</form>
							</div> 
						</div>
					</div>
				</div>
			</section>

			<!-- Modal - CODIGO VERIFICACION 6 CARACTERES --> 
			<div class="modal fade" id="error-codigo-verificacion-dni-modal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
				<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-body">
							<div class="row">
								<div id="paso-2-dni-jugador-respuesta" class="form-group col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" style="display:none;">
										
								</div>
													   
								<div id="errores-previos-codigo-dni" class="col-12" style="display:none;">
									<div class="alert alert-info redimension" role="alert">
										<p class="mt-0 mb-0"><i class="fa fa-info-circle" aria-hidden="true"></i><?php echo $lang ["ins_form_dni_no_valido_1"];?><br>
											<i class="fa fa-info-circle" aria-hidden="true"></i><?php echo $lang["ins_form_dni_no_valido_2"];?><br>
											<i class="fa fa-info-circle" aria-hidden="true"></i><?php echo $lang["ins_form_dni_no_valido_3"];?><br>
											<i class="fa fa-info-circle" aria-hidden="true"></i><?php echo $lang["ins_form_dni_no_valido_4"];?>
										</p>
									</div>
								</div>
								
								<hr>
								<div class="col-12 mt-2">    
									<button type="button" data-dismiss="modal" class="btn btn-link-w input-control-dni" style="padding:10px;">
										<h4 class="mt-0 mb-0"><?php echo $lang["ins_modal_ayuda_tallas_cerrar"];?></h4>
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<!-- COPY-PASTE INSCRIPCIONES -->
            <!-- Modal - PADRE / MADRE tiene varios hijos 
			<div class="modal fade" id="varios-hijos-modal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
				<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-body">
							<div class="row">
								<div class="form-group col-12 redimension">
									<label style="font-weight: bold; font-size: 20px;"><?php //echo $lang["ins_cant_esc_select"];?></label>
									<select class="form-control w-100" value="" name="validacion-dni-select" id="validacion-dni-select">
										<option value=""><?php //echo $lang["ins_cant_esc_select_vacio"];?></option>  
									</select>
								</div>
								
								<hr>
								
								<div class="col-12 mt-2">    
									<button type="button" data-dismiss="modal" class="btn btn-link-w input-control-dni" style="padding:10px;">
										<h4 class="mt-0 mb-0"><?php //echo $lang["ins_modal_ayuda_tallas_cerrar"];?></h4>
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
            -->
		</div>
		
		<?php require('includes/footer.php'); ?>
		<?php require "includes/cookies.php"; ?>
		
		<!-- Load Scripts Start -->
		<script src="js/libs.js"></script>
		<script src="js/common.js"></script>
		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.validate.min.js"></script> 
		
		<script>
			$( "#buscar-jugador-dni-jugador").on( "click", function()
			{
				if( 
					(
						$("#dni-jugador").val().trim() !== ""                &&  ((parseInt($("#dni-jugador").val().length)) > 7)               && 
						$("#codigo-verificacion").val().trim() !== ""        &&  ((parseInt($("#codigo-verificacion").val().length)) > 5)   
					)
					||
					(
						$("#validacion-dni-padremadre").val().trim() !== ""  &&  ((parseInt($("#validacion-dni-padremadre").val().length)) > 7)  && 
						$("#codigo-verificacion").val().trim() !== ""        &&  ((parseInt($("#codigo-verificacion").val().length)) > 5)   
					)
				)
				{
					var form_data = {
						debug:                  "false",
						jugadores_dni_jugador:  $("#dni-jugador").val().trim(),
						codigo_verificacion:    $("#codigo-verificacion").val().trim(),
						jugadores_dni_tutor:    $("#validacion-dni-padremadre").val().trim()
					};
					
					$.ajax({
						type:       "POST",
						url:        "?r=jugadores/CargarJugadorInscrito",
						data:       form_data,
						dataType:   "json",
						success:    function (data) 
						{
							if(data.response==="success")
							{
								if(data.select_jugadores!==undefined)
								{
									$('#varios-hijos-modal').modal('show');
									$('#validacion-dni-select').html(data.select_jugadores);
								}
								else
								{
									//  Cambiamos mensaje para informar de que puede continuar
									$("#confirmacion-puede-editarse-jugador").html(data.confirmacion_editar_jugador);

									$('html, body').animate({scrollTop: $("#confirmacion-puede-editarse-jugador").offset().top},250);

									/* Cargamos datos del jugador */
									$("#jugador-id").val( data.instancia.id_jugador);
									$("#nombre-form-cantera").val( data.instancia.nombre);
									var valor_nombre_form_cantera = $('#nombre-form-cantera').val().toUpperCase();
									$('#nombre-form-cantera').val(valor_nombre_form_cantera);
									$("#apellidos-form-cantera").val( data.instancia.apellidos);
									var valor_apellidos_form_cantera = $('#apellidos-form-cantera').val().toUpperCase();
									$('#apellidos-form-cantera').val(valor_apellidos_form_cantera);
                                    $("#equipo-form-cantera").val( data.instancia.equipo);
                                    
                                    /*  A los inscritos el año pasado no se les muestra la chaqueta polar  */
                                    if(data.existe_temp_anterior==="no")
                                    {   $("#chaqueta-polar-container").show();  
                                        $("#talla-chaqueta-polar-obligatoria").val("si");
                                    }
                                    else
                                    {   
                                        $("#chaqueta-polar-container").hide();  
                                        $("#talla-chaqueta-polar-obligatoria").val("no");
                                    }
                                }   
							}
							else
							{   
								$('#error-codigo-verificacion-dni-modal').modal('show');
								
								//  $(".renovacion-row").hide();
								//$("#rellenar-tallas-form-espera").hide();
								//$("#paso-2-dni-jugador-container").show();
								
								$("#paso-2-dni-jugador-respuesta").show();
								$("#paso-2-dni-jugador-respuesta").html("<div class='alert alert-danger col-12'><h4>"+data.message+"</h4></div>"); 
								$("#validacion-dni-padremadre").prop("disabled", false);
								
								if(data.mostrar_dni_tutor==="si")
								{   $("#paso-2-dni-tutor-container").show();    }
							}
						}
					});
				}
				else
				{
					$('#error-codigo-verificacion-dni-modal').modal('show');
					$("#errores-previos-codigo-dni").show();
					//$("#paso-2-dni-jugador-error-dni").show();
				}
			});

			
			$('#rellenar-tallas-form').validate(
			{
				submitHandler:function()
				{
                    if($("#jugador-id").val()==="")
					{   
                        $("#rellenar-tallas-form-respuesta").html("<div class='col-12'><div class='alert alert-danger'><h4>No se ha cargado ningún jugador/a</h4></div></div>");
                        return false; 
                    }
					else
					{
                        $("#rellenar-tallas-form-respuesta").html("");

                        var form_data = {   
                            jugador_id:                     $("#jugador-id").val(),
                            talla_camiseta_reversible:      $("#talla-camiseta-reversible option:selected").val(),
                            talla_pantalon_reversible:      $("#talla-pantalon-reversible option:selected").val(),
                            talla_camiseta_de_juego:        $("#talla-camiseta-de-juego option:selected").val(),
                            
                            talla_camiseta_basica_algodon:  $("#talla-camiseta-basica-algodon option:selected").val(),
                            talla_sudadera_entreno_vbc:     $("#talla-sudadera-entreno-vbc option:selected").val(),
                            talla_pantalon_de_juego:        $("#talla-pantalon-de-juego option:selected").val(),
                            
                            talla_chaqueta_chandal_paseo:   $("#talla-chaqueta-chandal-paseo option:selected").val(),
                            talla_chaqueta_polar:           $("#talla-chaqueta-polar option:selected").val(),
                            talla_chaqueta_polar_obligatoria:   $("#talla-chaqueta-polar-obligatoria").val(),
                            talla_polo_manga_corta:             $("#talla-polo-manga-corta option:selected").val()
                        };
                        
						$.ajax(
						{
							type:       "POST",
							url:        "?r=ropa/RellenarTallas",
							data:       form_data,
                            dataType:   "json",
							beforeSend: function()
							{
								$("#rellenar-tallas-form-espera").show(150);
								$("#submit-formulario-rellenar-tallas").prop("disabled", true);
								//$("submit-formulario-inscripcion-cantera").css("background-color", "#777");
							},
							success:    function(data)
							{
								if(data.response==="success")
								{   
									$("#rellenar-tallas-form-espera").hide();
									$("#rellenar-tallas-form-respuesta").html("<div class='col-12'><div class='alert alert-success'><h4>" + data.message + "</h4></div></div>");
								}
								else
								{
									$("#rellenar-tallas-form-espera").hide();
									//  Permito volver a enviar
									$("#submit-formulario-rellenar-tallas").prop("disabled", false);
									$("submit-formulario-rellenar-tallas").css("background-color", "#000");

									$("#rellenar-tallas-form-respuesta").html("<div class='col-12'><div class='alert alert-danger'>" + data.message + "</div></div>");
									$("#rellenar-tallas-form-respuesta").fadeTo(5000, 500).slideUp(500, function(){
										$("#rellenar-tallas-form-respuesta").slideUp(500);
										$("#rellenar-tallas-form-respuesta").html("");
									});
								}
							},
							error: function(errorData)
							{   $("#submit-formulario-rellenar-tallas").prop("disabled", false);    }
						});
					}
				}
			});
            
            
            
            /*  COPY - PASTE DE INSCRIPCIONES 2020 */
            /*    PASO 2 - PLAN B: SELECCIONAMOS JUGADOR
			$('body').on('change','#validacion-dni-select',function()
			{
				if($("#validacion-dni-select").val()!=="")
				{   
					$("#lunes-form-escuela").text("-");    
					$("#martes-form-escuela").text("-");    
					$("#miercoles-form-escuela").text("-");    ;    
					$("#jueves-form-escuela").text("-");       
					$("#viernes-form-escuela").text("-");     
				
					var form_data = {debug:"true",jugadores_id: $("#validacion-dni-select").val(),formulario:"cantera"};

					$.ajax({
						type:       "POST",
						url:        "?r=jugadores/CargarPorID",
						data:       form_data,
						dataType:   "json",
						success:    function (data) 
						{            
							if(data.response==="success")
							{
								$("#dni-jugador-form-cantera").prop("disabled", false);
								$(".renovacion-row").show("250");
								$("#rellenar-tallas-form-espera").hide();
								$("#paso-2-dni-jugador-respuesta").html("");
								$("#paso-2-dni-jugador-respuesta").hide();
								$("#rellenar-tallas-form-respuesta").hide();
								
								//PLAN B: PASO 3. DATOS JUGADOR  
								$("#jugador-id").val( data.instancia.id_jugador);
								//  FILA 1
								if( data.instancia["tipo_documento"] !== "" )     {   $("#tipodocjugador-form-cantera").val(data.instancia.tipo_documento);       }
								if( data.instancia["dni_jugador"] !== "" )        {   $("#dni-jugador-form-cantera").val(data.instancia.dni_jugador);         }
								if( data.instancia["fecha_cad_dni"] !== "" )      {   $("#fechacad-jugador-form-cantera").val(data.instancia.fecha_cad_dni);  }
								if( data.instancia["nacionalidad"] !== "" )       {   $("#nacionalidad-form-cantera").val(data.instancia.nacionalidad);       }  

								//  FILA 2
								if( data.instancia.fecha_nacimiento !== "" )        {   $("#fechanac-form-cantera").val(data.instancia.fecha_nacimiento);   }
								$("#nombre-form-cantera").val( data.instancia.nombre);
								var valor_nombre_form_cantera = $('#nombre-form-cantera').val().toUpperCase();
								$('#nombre-form-cantera').val(valor_nombre_form_cantera);
								$("#apellidos-form-cantera").val( data.instancia.apellidos);
								var valor_apellidos_form_cantera = $('#apellidos-form-cantera').val().toUpperCase();
								$('#apellidos-form-cantera').val(valor_apellidos_form_cantera);

								//  FILA 3 
								$("#direccion-form-cantera").val( data.instancia.direccion );
								var valor_direccion_form_cantera = $('#direccion-form-cantera').val().toUpperCase();
								$('#direccion-form-cantera').val(valor_direccion_form_cantera);
								$("#numero-form-cantera").val( data.instancia.numero );
								$("#piso-form-cantera").val( data.instancia.piso );
								$("#puerta-form-cantera").val( data.instancia.puerta );

								//  FILA 4
								$("#cp-form-cantera").val( data.instancia.codigo_postal );
								$("#poblacion-form-cantera").val( data.instancia.poblacion );
								var valor_poblacion_form_cantera = $('#poblacion-form-cantera').val().toUpperCase();
								$('#poblacion-form-cantera').val(valor_poblacion_form_cantera);
								$("#provincia-form-cantera").val( data.instancia.provincia );
								var valor_provincia_form_cantera = $('#provincia-form-cantera').val().toUpperCase();
								$('#provincia-form-cantera').val(valor_provincia_form_cantera);

								//  FILA 5
								if( data.instancia.sexo !== "" )               {   $("#sexojugador-form-cantera").val(data.instancia.sexo);            }
								if( data.instancia.pais_nacimiento !== "" )    {   $("#paisnac-form-cantera").val(data.instancia.pais_nacimiento);     }
								if( data.instancia.en_el_club !== "" )         {   $("#anyosclub-form-cantera").val(data.instancia.en_el_club);        }

								//  FILA 6
								if( data.instancia.alergias !=="" ){
									$("#alergias-form-cantera").val(data.instancia.alergias);
									var valor_alergias_form = $('#alergias-form-cantera').val().toUpperCase();
									$('#alergias-form-cantera').val(valor_alergias_form);
								}
								if( data.instancia.email !== "" )
								{
									$("#email-form-cantera").val( data.instancia.email );
									var valor_email_form = $('#email-form-cantera').val().toUpperCase();
									$('#email-form-cantera').val(valor_email_form);
								}
								
								
								//  FILA 7
								if( data.instancia.telefono_jugador !== "" )    {   $("#tlfjugador-form-cantera").val(data.instancia.telefono_jugador); }
								if( data.instancia.colegio !== "" )             {   $("#colegio-form-cantera").val(data.instancia.colegio);             }
								if( data.instancia.curso !== "" )               {   $("#curso-form-cantera").val(data.instancia.curso);                 }
								
								//  HORARIOS 
								var i;
								for (i = 0; i < data.horarios.length; i++)
								{
									if(data.horarios[i]["dia"]==="Lunes")
									{   $("#lunes-form-escuela").text( data.horarios[i]["hora_ini"].substr(0, 5));    }
									else if(data.horarios[i]["dia"]==="Martes")
									{   $("#martes-form-escuela").text( data.horarios[i]["hora_ini"].substr(0, 5));    }
									else if(data.horarios[i]["dia"]==="Miercoles")
									{   $("#miercoles-form-escuela").text( data.horarios[i]["hora_ini"].substr(0, 5));    }
									else if(data.horarios[i]["dia"]==="Jueves")
									{   $("#jueves-form-escuela").text( data.horarios[i]["hora_ini"].substr(0, 5));    }
									else if(data.horarios[i]["dia"]==="Viernes")
									{   $("#viernes-form-escuela").text( data.horarios[i]["hora_ini"].substr(0, 5));    }
								}
								
								//PLAN B: PASO 4. DATOS FAMILIA    
								if( data.instancia.num_hermanos !== "" )    
								{
									$("#numhermanos-form-cantera").val(data.instancia.num_hermanos);   
									if(parseInt($("#numhermanos-form-cantera").val())>0)
									{
										$("#edades-hermanos-container-completo").show();
										var array_id    =   data.instancia.edades.split("-");
										var i;
										for(i = 0; i < parseInt($("#numhermanos-form-cantera").val()); i++)
										{   $("#edades-hermanos-container").append('<div class="col-4 col-sm-4 col-md-2"><div class="form-group mt-0">\n\
												<input type="number" class="form-control edad-hermano" name="edades" min="0" step="1" required value="'+array_id[i]+'"></div></div>');   
										}
									}
								}
								
								//  Datos de la madre
								$("#nombremadre-form-cantera").val( data.instancia.nombre_madre );
								var valor_NombreMadre_form_cantera          = $('#nombremadre-form-cantera').val().toUpperCase();
								$('#nombremadre-form-cantera').val(valor_NombreMadre_form_cantera);
								if( data.instancia.apellidos_madre !== "" ) {   $("#apellidosmadre-form-cantera").val( data.instancia.apellidos_madre );      }
								if( data.instancia.email_madre !== "" )     {   $("#emailmadre-form-cantera").val( data.instancia.email_madre );      }
								if( data.instancia.telefono_madre !== "" )  {   $("#tlfmadre-form-cantera").val( data.instancia.telefono_madre );       }
								if( data.instancia.dni_madre !== "" )       {   $("#dnimadre-form-cantera").val( data.instancia.dni_madre );            }
								if( data.instancia.estudios_madre !== "" )  {   $("#estudiosmadre-form-cantera").val( data.instancia.estudios_madre );  }

								//  Datos del padre
								$("#nombrepadre-form-cantera").val( data.instancia.nombre_padre );
								var valor_NombrePadre_form_cantera =         $('#nombrepadre-form-cantera').val().toUpperCase();
								$('#nombrepadre-form-cantera').val(valor_NombrePadre_form_cantera);
								if( data.instancia.apellidos_padre !== "" ) {   $("#apellidospadre-form-cantera").val( data.instancia.apellidos_padre );      }
								if( data.instancia.email_padre !== "" )     {   $("#emailpadre-form-cantera").val( data.instancia.email_padre );    }
								if( data.instancia.telefono_padre !== "" )  {   $("#tlfpadre-form-cantera").val( data.instancia.telefono_padre );   }
								if( data.instancia.dni_padre !== "" )       {   $("#dnipadre-form-cantera").val( data.instancia.dni_padre );        }
								if( data.instancia.estudios_padre !== "" )  {   $("#estudiospadre-form-cantera").val( data.instancia.estudios_padre );  }

								if( data.instancia.monoparental === "1" )
								{   $("#familia-form-cantera").val("1");    }
								else
								{   $("#familia-form-cantera").val("0");    }

								if( data.instancia.monoparental === "1" && data.instancia.nombre_madre!=="" && data.instancia.nombre_padre!=="")
								{}
								else if( data.instancia.monoparental === "1" && data.instancia.nombre_madre!=="")
								{   
									$("#tipo-familia-monoparental-madre-padre").val("madre");   

									$("#nombrepadre-form-cantera").prop("disabled", true);     $("#nombrepadre-form-cantera").val("");
									$("#apellidospadre-form-cantera").prop("disabled", true);  $("#apellidospadre-form-cantera").val("");
									$("#dnipadre-form-cantera").prop("disabled", true);        $("#dnipadre-form-cantera").val("");
									$("#tlfpadre-form-cantera").prop("disabled", true);        $("#tlfpadre-form-cantera").val("");
									$("#emailpadre-form-cantera").prop("disabled", true);      $("#emailpadre-form-cantera").val("");
									$("#estudiospadre-form-cantera").prop("disabled", true);   $("#estudiospadre-form-cantera").val("");
								}
								else if( data.instancia.monoparental === "1" && data.instancia.nombre_padre!=="")
								{   
									$("#tipo-familia-monoparental-madre-padre").val("padre");   

									$("#nombremadre-form-cantera").prop("disabled", true);     $("#nombremadre-form-cantera").val("");
									$("#apellidosmadre-form-cantera").prop("disabled", true);  $("#apellidosmadre-form-cantera").val("");
									$("#dnimadre-form-cantera").prop("disabled", true);        $("#dnimadre-form-cantera").val("");
									$("#tlfmadre-form-cantera").prop("disabled", true);        $("#tlfmadre-form-cantera").val("");
									$("#emailmadre-form-cantera").prop("disabled", true);      $("#emailmadre-form-cantera").val("");
									$("#estudiosmadre-form-cantera").prop("disabled", true);   $("#estudiosmadre-form-cantera").val("");
								}
								else
								{}


								//PLAN B: PASO 5. FOTOS, DOCUMENTOS


								//PLAN B: PASO 6. DATOS BANCO
								$("#titular-form-cantera").val( data.instancia.titular_banco );
								var valor_titular_form_cantera = $('#titular-form-cantera').val().toUpperCase();
								$('#titular-form-cantera').val(valor_titular_form_cantera);
								$("#dnititular-form-cantera").val( data.instancia.dni_titular );
								if(data.instancia.iban!=="")    {   $("#iban-input").val( data.instancia.iban );    }
								if(data.instancia.entidad!=="") {   $("#entidad-input").val( data.instancia.entidad );  }
								if(data.instancia.oficina!=="") {   $("#oficina-input").val( data.instancia.oficina );  }
								if(data.instancia.dc!=="")      {   $("#dc-input").val( data.instancia.dc );    }
								if(data.instancia.cuenta!=="")  {   $("#cuenta").val( data.instancia.cuenta );  }

								
								//PLAN B: HORARIOS 
								if( data.instancia.lunes !== "" )       {   $("#lunes-form-cantera").text( data.instancia.lunes);}         else{   $("#lunes-form-cantera").text( "-" );   }
								if( data.instancia.martes !== "" )      {   $("#martes-form-cantera").text( data.instancia.martes);}       else{   $("#-form-cantera").val("-");   }
								if( data.instancia.miercoles !== "" )   {   $("#miercoles-form-cantera").text( data.instancia.miercoles);} else{   $("#-form-cantera").val("-");   }
								if( data.instancia.jueves !=="" )       {   $("#jueves-form-cantera").text( data.instancia.jueves);}       else{   $("#-form-cantera").val("-");   }
								if( data.instancia.viernes !=="" )      {   $("#viernes-form-cantera").text( data.instancia.viernes);}     else{   $("#-form-cantera").val("-");   }
							
								//  Cerramos el modal
								$('#varios-hijos-modal').modal('hide');
								
								//  Scroll hacia la edición del formulario
								$('html, body').animate({scrollTop: $("#confirmacion-puede-editarse-jugador").offset().top},250);
								
								//  Eliminar Disabled
								//EliminaDisabled();
							}
							else
							{
								$(".renovacion-row").hide();
								$("#paso-2-dni-tutor-container").show();
								//$("#paso-2-dni-jugador-container").show();
								$("#rellenar-tallas-form-respuesta").show();
								$("#rellenar-tallas-form-respuesta").html("<div class='col-12'><div class='alert alert-danger col-12'><h4>"+data.message+"</h4></div></div>");
							}
						},
						error:  function(errorData)
						{
							alert("Hubo un error al cargar los datos del jugador (1237)");
							console.log("error "+errorData);
						}
					});
				}
			});
            */
		</script>
	</body>
</html>