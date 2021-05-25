<!DOCTYPE html>
<html lang="es">
	<?php require('includes/head.php'); ?>
	<link rel="stylesheet" href="css/forms.css">
	<link rel="stylesheet" href="css/parallax.css">
	<link rel="stylesheet" href="css/formus.css">
	
	<body class="Pages" id="formus">
		<?php require('includes/header.php'); ?>

		<!-- Start Page-Content -->
		<section id="page-content" class="overflow-x-hidden margin-top-header">
			<div class="block">
				<div class="container-fluid">
					<div class="row">
						<div class="parallax col-12" style="background-image: url('img/cabecera-shooting-academy.jpg');">
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
									<span class="orange-text"><?php echo $lang["shooting_titulo1"];?></span>
								</h3>

								<form enctype="multipart/form-data" id="formulario_regisrto_shooting" class="boxed-form" name="contactform" method="post" action="?r=shootingcamp/ShootingCampForm">
									<!-- DÍAS A ELEGIR -->
									<div class="row">
										<div class="col-12 col-md-12 col-lg-6 col-xl-6">
											<div class="form-group">
												<div class="row">
													<div class="col-12 mb-1 t-left" style="font-size: 15px;">
														<p><?php echo $lang["shooting_titulo2"];?></p>
													</div>

													<!--COMPROBACION SI PERTENECE AL CLUB  -->
													<div class="col-12 mb-1 t-left">
														<p><?php echo $lang["shooting_info_dni"];?></p>
														<input type="text" class="form-control fcn" value="" name="dnicomprobacion" id="dnicomprobacion" maxlength="11" required>
													</div>

													<div id="mensaje_dni_campus_pascua" class="col-12 mb-1 t-left" style="font-size: 16px;">
													</div>

													<div class="col-12 mb-1 t-left" style="font-size: 15px;">
														<label class="control control--radio"><?php echo $lang["shooting_opcion1"];?>
															<input type="radio" name="opcion" value="jugadores_internos" id="jugadores_internos" checked>
															<div class="control__indicator"></div>
														</label>
													</div>

													<div class="col-12 mb-1 t-left" style="font-size: 15px;">
														<label class="control control--radio"><?php echo $lang["shooting_opcion2"];?>
															<input type="radio" name="opcion" value="jugadores_externos" id="jugadores_externos">
															<div class="control__indicator"></div>
														</label>
													</div>

													<div class="col-12 mb-1 t-left" style="font-size: 15px;">
														<label class="control control--radio"><?php echo $lang["shooting_opcion3_club"];?>	
															<input type="radio" name="opcion" value="jugadores_internos_club" id="jugadores_internos_club" disabled>
															<div class="control__indicator"></div>
														</label>
													</div>

													<div class="col-12 mb-1 t-left" style="font-size: 15px;">
														<label class="control control--radio"><?php echo $lang["shooting_opcion4_club"];?>
															<input type="radio" name="opcion" value="jugadores_externos_club" id="jugadores_externos_club" disabled>
															<div class="control__indicator"></div>
														</label>
													</div>



												</div>
											</div>
										</div>

										<!-- <div class="col-12 col-md-12 col-lg-6 col-xl-6">
											<div class="form-group">
												<div class="row">
													<div class="col-12 mb-1 t-left" style="font-size: 15px;">
														<p>
															<?php 
															/*	switch ($_SESSION['language_skills']) {
																	case "es": echo "<strong>Shooting Academy del 13 al 17 de Julio.</strong><br>Puedes inscribirte en los dos campus Shooting Academy y Skills Camp:"; break;
																	case "en": echo "<strong>From July 13 to 17.</strong><br>Choose the option for Shooting Academy y Skills Camp:"; break;
																	
																}*/
															?>
														</p>
													</div>

													<div class="col-12 mb-1 t-left" style="font-size: 15px;">
														<label class="control control--radio">
															<?php 
																//Realizando descuento del 10% en uno de los dos
																/*switch ($_SESSION['language_skills']) {
																	case "es": echo "Internos en Shooting y Skills: <strong>1.130€</strong> (Pensión completa)"; break;
																	case "en": echo "Internal Players Shooting y Skills: <strong>1.130€</strong> (Full board)"; break;
																	
																}*/
															?>
															<input type="radio" name="opcion" value="internos_dos_campus">
															<div class="control__indicator"></div>
														</label>
													</div>

													<div class="col-12 mb-1 t-left" style="font-size: 15px;">
														<label class="control control--radio">
															<?php 
																//Realizando descuento del 10% en uno de los dos
															/*	switch ($_SESSION['language_skills']) {
																	case "es": echo "Externos en Shooting y Skills: <strong>684€</strong> (Comida incluida)"; break;
																	case "en": echo "External Players Shooting y Skills: <strong>684€</strong> (Lunch included)"; break;
																	
																}*/
															?>
															<input type="radio" name="opcion" value="externos_dos_campus">
															<div class="control__indicator"></div>
														</label>
													</div>
												</div>
											</div>
										</div>

										<div class="col-12 col-md-12 col-lg-6 col-xl-6">
											<div class="form-group">
												<div class="row">
													<div class="col-12 mb-1 t-left" style="font-size: 15px;">
														<p>
															<?php 
															/*	switch ($_SESSION['language_skills']) {
																	case "es": echo "<strong>Pack 1</strong><br>Precio por separado: 940€<br>Precio seleccionando una opción del pack: <strong>845€</strong>"; break;
																	case "en": echo "<strong>Pack 1</strong><br>Price separately: 940€<br>Price by selecting a pack option: <strong>845€</strong>"; break;
																} */
															?>
														</p>
													</div>

													<div class="col-12 mb-1 t-left" style="font-size: 15px;">
														<label class="control control--radio">
															<?php 
																//Realizando descuento del 10% en uno de los dos
															/*	switch ($_SESSION['language_skills']) {
																	case "es": echo "<strong>Opcion A: </strong> Del 5 al 17 de julio. Campus Valencia Basket Calvestra y Shooting Academy."; break;
																	case "en": echo "<strong>Option A: </strong> From July 5 to July 17. Valencia Basket Calvestra Campus and Shooting Academy."; break;
																} */
															?>
															<input type="radio" name="opcion" value="pack_uno_opcion_a">
															<div class="control__indicator"></div>
														</label>
													</div>

													<div class="col-12 mb-1 t-left" style="font-size: 15px;">
														<label class="control control--radio">
															<?php 
																//Realizando descuento del 10% en uno de los dos
															/*	switch ($_SESSION['language_skills']) {
																	case "es": echo "<strong>Opcion B: </strong> Del 13 al 25 de julio. Shooting Academy y Campus Valencia Basket Calvestra."; break;
																	case "en": echo "<strong>Opcion B: </strong> From July 13 to July 25. Shooting Academy and Campus Valencia Basket Calvestra."; break;
																}*/
															?>
															<input type="radio" name="opcion" value="pack_uno_opcion_b">
															<div class="control__indicator"></div>
														</label>
													</div>
												</div>
											</div>
										</div>

										<div class="col-12 col-md-12 col-lg-6 col-xl-6">
											<div class="form-group">
												<div class="row">
													<div class="col-12 mb-1 t-left" style="font-size: 15px;">
														<p>
															<?php 
															/*	switch ($_SESSION['language_skills']) {
																	case "es": echo "<strong>Pack 2</strong><br>Precio por separado: 1.020€<br>Precio seleccionando una opción del pack: <strong>920€</strong>"; break;
																	case "en": echo "<strong>Pack 2</strong><br>Price separately: 1.020€<br>Price by selecting a pack option: <strong>920€</strong>"; break;
																} */
															?>
														</p>
													</div>

													<div class="col-12 mb-1 t-left" style="font-size: 15px;">
														<label class="control control--radio">
															<?php 
																//Realizando descuento del 10% en uno de los dos
															/*	switch ($_SESSION['language_skills']) {
																	case "es": echo "<strong>Opcion A: </strong> Del 5 al 17 de julio. Shooting Academy y Tecnificación Femenina."; break;
																	case "en": echo "<strong>Option A: </strong> From July 5 to July 17. Shooting Academy and Women's Technification."; break;
																} */
															?>
															<input type="radio" name="opcion" value="pack_dos_opcion_a">
															<div class="control__indicator"></div>
														</label>
													</div>
												</div>
											</div>
										</div> -->

									</div>

									<!-- DATOS PARTICIPANTE -->
									<div class="form-group">
										<div class="row">
											<div class="col-12">
												<h4 class="section-title"><?php echo $lang["formulario_datos_jugador"];?></h4>
											</div>

											<div class="col-12 col-md-3 col-lg-3 col-xl-3 redimension">
												<label><?php echo $lang["formulario_nombre"];?>
													<input type="text" class="form-control" name="nombre" maxlength="45" required>
												</label>
											</div>

											<div class="col-12 col-md-5 col-lg-5 col-xl-5 redimension">
												<label><?php echo $lang["formulario_apellidos"];?>
													<input type="text" class="form-control" name="apellidos" maxlength="45" required>
												</label>
											</div>

											<div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
												<label><?php echo $lang["formulario_cumpleaños"];?>
													<input type="date" class="form-control" id="fecha" name="fechanacimiento" required>
												</label>
											</div>

											
										</div>
									</div>


									<div class="form-group">
										<div class="row">


											<div class="form-group col-12 col-md-3 col-lg-3 col-xl-3">
		                                        <label><?php echo $lang["formulario_genero"];?>
		                                            <select class="form-control campos-required" name="genero" id="genero" required="">
		                                                <option value="">Seleccionar opción</option>
		                                                <option value="FEMENINO"><?php echo $lang["formulario_genero_femenino"];?></option>
		                                                <option value="MASCULINO"><?php echo $lang["formulario_genero_masculino"];?></option>
		                                            </select>
		                                        </label>
		                                    </div>

											<div class="col-12 col-md-3 col-lg-3 col-xl-3">
												<label><?php echo $lang["formulario_dni"];?>
													<input type="text" class="form-control" name="dni" id="dni" maxlength="20" required>
												</label>
											</div>

											<div class="col-12 col-md-6 col-lg-6 col-xl-6 redimension">
												<label><?php echo $lang["formulario_club"];?>
													<input type="text" class="form-control" name="club" id="club" maxlength="45" required>
												</label>
											</div>

										</div>
									</div>

									<div class="form-group">
										<div class="row">
											

											<div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
												<label><?php echo $lang["formulario_talla_camiseta"];?>
													<input type="text" class="form-control" name="tallacamiseta" maxlength="45" required>
												</label>
											</div>
											
											<div class="col-12 col-md-8 col-lg-8 col-xl-8">
												<label><?php echo $lang["formulario_tratam_medico"];?>
													<input type="text" class="form-control" name="tratamientosmedicos" required>
												</label>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-12 col-md-6 col-lg-6 col-xl-6 redimension">
												<label><?php echo $lang["formulario_enfermedad"];?>
													<input type="text" class="form-control" name="enfermedad" required>
												</label>
											</div>

											<div class="col-12 col-md-6 col-lg-6 col-xl-6">
												<label><?php echo $lang["formulario_alergia"];?>
													<input type="text" class="form-control" name="alergias" required>
												</label>
											</div>										   
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-12 col-md-6 col-lg-6 col-xl-6 redimension">
												<label><?php echo $lang["formulario_operacion_recien"];?>
													<input type="text" class="form-control" name="operacionreciente" required>
												</label>
											</div>

											<div class="col-12 col-md-6 col-lg-6 col-xl-6">
												<label><?php echo $lang["formulario_observaciones"];?>
													<input type="text" class="form-control" name="observaciones" required>
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
													<strong><?php echo $lang["shooting_autorizacion_medica"];?></strong>
												</p>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-12 redimension">
												<input type="file" id="fileName" class="form-control" style="border: none !important; padding: 0 !important;" name="fotocopiasip" accept="image/gif,image/jpeg,image/jpg,image/png,image/bmp,application/pdf" aria-describedby="fileHelp" required onchange="validateFileType()">
											</div>

											<div class="col-12 redimension">
												<p class="t-left" style="color: red;">
													<strong> <?php echo $lang["formulario_fotocopia_sip"];?></strong>
												</p>
											</div>
										</div>
									</div>

									<!-- DATOS TUTOR -->
									<div class="form-group">
										<div class="row mt-2">
											<div class="col-12">
												<h4 class="section-title"><?php echo $lang["formulario_datos_tutor"];?></h4>
											</div>

											<!-- <div class="col-12 mt-2 mb-2">
												<div class="alert alert-info">
													<strong>
														<?php /*
														switch ($_SESSION['language_skills']) {
															case "es": echo "Si va a registrar a un jugador/a con hermanos/as, por favor recuerde poner el mismo DNI del tutor para beneficiarse del descuento."; break;
															case "en": echo "If you are registering a player with siblings, please remember to put the same tutor's ID to benefit from the discount."; break;
															} */
														?>
													</strong>
												</div>
											</div> -->

											<div class="col-12 col-md-3 col-lg-3 col-xl-3 redimension">
												<label><?php echo $lang["formulario_nombre"];?>
													<input type="text" class="form-control" name="nombretutor" maxlength="45" required>
												</label>
											</div>

											<div class="col-12 col-md-5 col-lg-5 col-xl-5 redimension">
												<label><?php echo $lang["formulario_apellidos"];?>
													<input type="text" class="form-control" name="apellidostutor" maxlength="45" required>
												</label>
											</div>

											<div class="col-12 col-md-4 col-lg-4 col-xl-4">
												<label><?php echo $lang["formulario_dni_titular"];?>
													<input type="text" class="form-control" name="dnitutor" id="dnitutor" maxlength="20" required>
												</label>
											</div>
										</div>
									</div>
																						
									<div class="form-group">
										<div class="row">
											<div class="col-12 col-md-6 col-lg-6 col-xl-6 redimension">
												<label><?php echo $lang["formulario_direccion"];?>
													<input type="text" class="form-control" name="direccion" maxlength="45" required>
												</label>
											</div>

											<div class="col-12 col-md-2 col-lg-2 col-xl-2 redimension">
												<label><?php echo $lang["formulario_numero"];?>
													<input type="text" class="form-control" name="numero" maxlength="10">
												</label>
											</div>

											<div class="col-12 col-md-2 col-lg-2 col-xl-2 redimension">
												<label><?php echo $lang["formulario_piso"];?>
													<input type="text" class="form-control" name="piso" maxlength="10">
												</label>
											</div>

											<div class="col-12 col-md-2 col-lg-2 col-xl-2">
												<label><?php echo $lang["formulario_puerta"];?>
													<input type="text" class="form-control" name="puerta" maxlength="10">
												</label>
											</div>
										</div>
									</div>
																			
									<div class="form-group">
										<div class="row">
											<div class="col-12 col-md-3 col-lg-3 col-xl-3 redimension">
												<label><?php echo $lang["formulario_codigo_postal"];?>
													<input type="text" class="form-control" name="cp" maxlength="10" required>
												</label>
											</div>

											<div class="col-12 col-md-3 col-lg-3 col-xl-3 redimension">
												<label><?php echo $lang["formulario_provincia"];?>
													<input type="text" class="form-control" name="provincia" maxlength="25" required>
												</label>
											</div>

											<div class="col-12 col-md-3 col-lg-3 col-xl-3 redimension">
												<label><?php echo $lang["formulario_poblacion"];?>
													<input type="text" class="form-control" name="poblacion" maxlength="45" required>
												</label>
											</div>

											<div class="col-12 col-md-3 col-lg-3 col-xl-3">
												<label><?php echo $lang["formulario_pais"];?>
													
													<select id="pais" class="form-control fcn" style="color: #5c5c5c !important;" name="pais" required>
														<option value="España" selected>España</option>
														<option value="Afghanistan">Afghanistan</option>
														<option value="Åland Islands">Åland Islands</option>
														<option value="Albania">Albania</option>
														<option value="Algeria">Algeria</option>
														<option value="American Samoa">American Samoa</option>
														<option value="Andorra">Andorra</option>
														<option value="Angola">Angola</option>
														<option value="Anguilla">Anguilla</option>
														<option value="Antarctica">Antarctica</option>
														<option value="Antigua and Barbuda">Antigua and Barbuda</option>
														<option value="Argentina">Argentina</option>
														<option value="Armenia">Armenia</option>
														<option value="Aruba">Aruba</option>
														<option value="Australia">Australia</option>
														<option value="Austria">Austria</option>
														<option value="Azerbaijan">Azerbaijan</option>
														<option value="Bahamas">Bahamas</option>
														<option value="Bahrain">Bahrain</option>
														<option value="Bangladesh">Bangladesh</option>
														<option value="Barbados">Barbados</option>
														<option value="Belarus">Belarus</option>
														<option value="Belgium">Belgium</option>
														<option value="Belize">Belize</option>
														<option value="Benin">Benin</option>
														<option value="Bermuda">Bermuda</option>
														<option value="Bhutan">Bhutan</option>
														<option value="Bolivia">Bolivia</option>
														<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
														<option value="Botswana">Botswana</option>
														<option value="Bouvet Island">Bouvet Island</option>
														<option value="Brazil">Brazil</option>
														<option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
														<option value="Brunei Darussalam">Brunei Darussalam</option>
														<option value="Bulgaria">Bulgaria</option>
														<option value="Burkina Faso">Burkina Faso</option>
														<option value="Burundi">Burundi</option>
														<option value="Cambodia">Cambodia</option>
														<option value="Cameroon">Cameroon</option>
														<option value="Canada">Canada</option>
														<option value="Cape Verde">Cape Verde</option>
														<option value="Cayman Islands">Cayman Islands</option>
														<option value="Central African Republic">Central African Republic</option>
														<option value="Chad">Chad</option>
														<option value="Chile">Chile</option>
														<option value="China">China</option>
														<option value="Christmas Island">Christmas Island</option>
														<option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
														<option value="Colombia">Colombia</option>
														<option value="Comoros">Comoros</option>
														<option value="Congo">Congo</option>
														<option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
														<option value="Cook Islands">Cook Islands</option>
														<option value="Costa Rica">Costa Rica</option>
														<option value="Cote D'ivoire">Cote D'ivoire</option>
														<option value="Croatia">Croatia</option>
														<option value="Cuba">Cuba</option>
														<option value="Cyprus">Cyprus</option>
														<option value="Czech Republic">Czech Republic</option>
														<option value="Denmark">Denmark</option>
														<option value="Djibouti">Djibouti</option>
														<option value="Dominica">Dominica</option>
														<option value="Dominican Republic">Dominican Republic</option>
														<option value="Ecuador">Ecuador</option>
														<option value="Egypt">Egypt</option>
														<option value="El Salvador">El Salvador</option>
														<option value="Equatorial Guinea">Equatorial Guinea</option>
														<option value="Eritrea">Eritrea</option>
														<option value="España">España</option>
														<option value="Estonia">Estonia</option>
														<option value="Ethiopia">Ethiopia</option>
														<option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
														<option value="Faroe Islands">Faroe Islands</option>
														<option value="Fiji">Fiji</option>
														<option value="Finland">Finland</option>
														<option value="France">France</option>
														<option value="French Guiana">French Guiana</option>
														<option value="French Polynesia">French Polynesia</option>
														<option value="French Southern Territories">French Southern Territories</option>
														<option value="Gabon">Gabon</option>
														<option value="Gambia">Gambia</option>
														<option value="Georgia">Georgia</option>
														<option value="Germany">Germany</option>
														<option value="Ghana">Ghana</option>
														<option value="Gibraltar">Gibraltar</option>
														<option value="Greece">Greece</option>
														<option value="Greenland">Greenland</option>
														<option value="Grenada">Grenada</option>
														<option value="Guadeloupe">Guadeloupe</option>
														<option value="Guam">Guam</option>
														<option value="Guatemala">Guatemala</option>
														<option value="Guernsey">Guernsey</option>
														<option value="Guinea">Guinea</option>
														<option value="Guinea-bissau">Guinea-bissau</option>
														<option value="Guyana">Guyana</option>
														<option value="Haiti">Haiti</option>
														<option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
														<option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
														<option value="Honduras">Honduras</option>
														<option value="Hong Kong">Hong Kong</option>
														<option value="Hungary">Hungary</option>
														<option value="Iceland">Iceland</option>
														<option value="India">India</option>
														<option value="Indonesia">Indonesia</option>
														<option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
														<option value="Iraq">Iraq</option>
														<option value="Ireland">Ireland</option>
														<option value="Isle of Man">Isle of Man</option>
														<option value="Israel">Israel</option>
														<option value="Italy">Italy</option>
														<option value="Jamaica">Jamaica</option>
														<option value="Japan">Japan</option>
														<option value="Jersey">Jersey</option>
														<option value="Jordan">Jordan</option>
														<option value="Kazakhstan">Kazakhstan</option>
														<option value="Kenya">Kenya</option>
														<option value="Kiribati">Kiribati</option>
														<option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
														<option value="Korea, Republic of">Korea, Republic of</option>
														<option value="Kuwait">Kuwait</option>
														<option value="Kyrgyzstan">Kyrgyzstan</option>
														<option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
														<option value="Latvia">Latvia</option>
														<option value="Lebanon">Lebanon</option>
														<option value="Lesotho">Lesotho</option>
														<option value="Liberia">Liberia</option>
														<option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
														<option value="Liechtenstein">Liechtenstein</option>
														<option value="Lithuania">Lithuania</option>
														<option value="Luxembourg">Luxembourg</option>
														<option value="Macao">Macao</option>
														<option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
														<option value="Madagascar">Madagascar</option>
														<option value="Malawi">Malawi</option>
														<option value="Malaysia">Malaysia</option>
														<option value="Maldives">Maldives</option>
														<option value="Mali">Mali</option>
														<option value="Malta">Malta</option>
														<option value="Marshall Islands">Marshall Islands</option>
														<option value="Martinique">Martinique</option>
														<option value="Mauritania">Mauritania</option>
														<option value="Mauritius">Mauritius</option>
														<option value="Mayotte">Mayotte</option>
														<option value="Mexico">Mexico</option>
														<option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
														<option value="Moldova, Republic of">Moldova, Republic of</option>
														<option value="Monaco">Monaco</option>
														<option value="Mongolia">Mongolia</option>
														<option value="Montenegro">Montenegro</option>
														<option value="Montserrat">Montserrat</option>
														<option value="Morocco">Morocco</option>
														<option value="Mozambique">Mozambique</option>
														<option value="Myanmar">Myanmar</option>
														<option value="Namibia">Namibia</option>
														<option value="Nauru">Nauru</option>
														<option value="Nepal">Nepal</option>
														<option value="Netherlands">Netherlands</option>
														<option value="Netherlands Antilles">Netherlands Antilles</option>
														<option value="New Caledonia">New Caledonia</option>
														<option value="New Zealand">New Zealand</option>
														<option value="Nicaragua">Nicaragua</option>
														<option value="Niger">Niger</option>
														<option value="Nigeria">Nigeria</option>
														<option value="Niue">Niue</option>
														<option value="Norfolk Island">Norfolk Island</option>
														<option value="Northern Mariana Islands">Northern Mariana Islands</option>
														<option value="Norway">Norway</option>
														<option value="Oman">Oman</option>
														<option value="Pakistan">Pakistan</option>
														<option value="Palau">Palau</option>
														<option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
														<option value="Panama">Panama</option>
														<option value="Papua New Guinea">Papua New Guinea</option>
														<option value="Paraguay">Paraguay</option>
														<option value="Peru">Peru</option>
														<option value="Philippines">Philippines</option>
														<option value="Pitcairn">Pitcairn</option>
														<option value="Poland">Poland</option>
														<option value="Portugal">Portugal</option>
														<option value="Puerto Rico">Puerto Rico</option>
														<option value="Qatar">Qatar</option>
														<option value="Reunion">Reunion</option>
														<option value="Romania">Romania</option>
														<option value="Russian Federation">Russian Federation</option>
														<option value="Rwanda">Rwanda</option>
														<option value="Saint Helena">Saint Helena</option>
														<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
														<option value="Saint Lucia">Saint Lucia</option>
														<option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
														<option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
														<option value="Samoa">Samoa</option>
														<option value="San Marino">San Marino</option>
														<option value="Sao Tome and Principe">Sao Tome and Principe</option>
														<option value="Saudi Arabia">Saudi Arabia</option>
														<option value="Senegal">Senegal</option>
														<option value="Serbia">Serbia</option>
														<option value="Seychelles">Seychelles</option>
														<option value="Sierra Leone">Sierra Leone</option>
														<option value="Singapore">Singapore</option>
														<option value="Slovakia">Slovakia</option>
														<option value="Slovenia">Slovenia</option>
														<option value="Solomon Islands">Solomon Islands</option>
														<option value="Somalia">Somalia</option>
														<option value="South Africa">South Africa</option>
														<option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
														<option value="España">Spain</option>
														<option value="Sri Lanka">Sri Lanka</option>
														<option value="Sudan">Sudan</option>
														<option value="Suriname">Suriname</option>
														<option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
														<option value="Swaziland">Swaziland</option>
														<option value="Sweden">Sweden</option>
														<option value="Switzerland">Switzerland</option>
														<option value="Syrian Arab Republic">Syrian Arab Republic</option>
														<option value="Taiwan, Province of China">Taiwan, Province of China</option>
														<option value="Tajikistan">Tajikistan</option>
														<option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
														<option value="Thailand">Thailand</option>
														<option value="Timor-leste">Timor-leste</option>
														<option value="Togo">Togo</option>
														<option value="Tokelau">Tokelau</option>
														<option value="Tonga">Tonga</option>
														<option value="Trinidad and Tobago">Trinidad and Tobago</option>
														<option value="Tunisia">Tunisia</option>
														<option value="Turkey">Turkey</option>
														<option value="Turkmenistan">Turkmenistan</option>
														<option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
														<option value="Tuvalu">Tuvalu</option>
														<option value="Uganda">Uganda</option>
														<option value="Ukraine">Ukraine</option>
														<option value="United Arab Emirates">United Arab Emirates</option>
														<option value="United Kingdom">United Kingdom</option>
														<option value="United States">United States</option>
														<option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
														<option value="Uruguay">Uruguay</option>
														<option value="Uzbekistan">Uzbekistan</option>
														<option value="Vanuatu">Vanuatu</option>
														<option value="Venezuela">Venezuela</option>
														<option value="Viet Nam">Viet Nam</option>
														<option value="Virgin Islands, British">Virgin Islands, British</option>
														<option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
														<option value="Wallis and Futuna">Wallis and Futuna</option>
														<option value="Western Sahara">Western Sahara</option>
														<option value="Yemen">Yemen</option>
														<option value="Zambia">Zambia</option>
														<option value="Zimbabwe">Zimbabwe</option>
													</select>
												</label>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-12 col-md-5 col-lg-5 col-xl-5 redimension">
												<label><?php echo $lang["formulario_telefono"];?>
													<input type="text" class="form-control" name="telefonotutor" maxlength="15" required>
												</label>
											</div>

											<div class="col-12 col-md-7 col-lg-7 col-xl-7 redimension">
												<label><?php echo $lang["formulario_correo"];?>
													<input type="text" class="form-control" name="emailtutor" maxlength="100" required>
												</label>
											</div>

											<div class="col-12">
												<p class="t-left" style="color: red;">
													<strong><?php echo $lang["formulario_aviso_email"];?></strong>
												</p>
											</div>
										</div>
									</div>

									<!-- <div class="form-group">
										<div class="row">
											<div class="col-12 col-md-2 col-lg-2 col-xl-2">
												<label>
													<?php
														/* switch ($_SESSION['language_skills']) {
															case "es": echo "Codigo de Descuento"; break;
															case "en": echo "Discount Code"; break;
														} */
													?>
													<input type="text" class="form-control" name="codigoDescuento" id="codigoDescuento" maxlength="10">
												</label>
											</div>
											<div class="col-12 col-md-10 col-lg-10 col-xl-10" id="mensajeCodigoDescuento">

											</div>
										</div>
									</div> -->



									<!-- PARTE 2 -->

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
										<?php require('includes/politica_cancelacion.php'); ?>

										<div class="col-12">
											<h3 class="section-title mb-0">
												<span class="orange-text"> <?php echo $lang["politicas_titulo_privacidad"];?></span>
											</h3>
											<h4 class="section-title mb-0"><?php echo $lang["politicas_subtitulo_privacidad"];?></h4>
										</div>

										<div class="col-12">
											<p><?php echo $lang["politicas_texto_ley_organica"];?></p>

											<label class="containerchekbox">
												<p>
													<input type="checkbox" name="autorizodatos" value="si" required>
													<span class="checkmark"></span><?php echo $lang["politicas_check_productos"];?>
													
												</p>
											</label>

											<label class="containerchekbox">
												<p>
													<input type="checkbox" name="autorizoimagen" value="si" required>
													<span class="checkmark"></span><?php echo $lang["politicas_check_imagenes"];?>
													                                               
												</p>
											</label>

											<p><?php echo $lang["politicas_texto_cancelacion1"];?> <?php echo $lang["enlace_cancelacion"];?> <?php echo $lang["politicas_texto_cancelacion2"];?>
												<?php
													/*switch ($_SESSION['language_skills']) {
														case "es": echo "Se le informa también que puede ejercer los derechos de acceso, rectificación, supresión, portabilidad, limitación de tratamiento, <a href=\"https://www.alqueriadelbasket.com/?r=index/politicacancelacion&idioma=cas\" target=\"_blank\" style=\"font-weight: bold; color: #eb7c00;\">cancelación</a> y, en su caso, oposición, enviando una solicitud por escrito acompañada de la fotocopia de su DNI a la siguiente dirección: BOMBER RAMON DUART, S/N, 46013, VALENCIA o a través de  valencia.basket@valenciabasket.com así como reclamar ante la Agencia Española de Protección de Datos (www.agpd.es) cuando el interesado considere que VALENCIA BASKET CLUB SAD ha vulnerado los derechos que le son reconocidos por la normativa aplicable en protección de datos.";
														break;
														case "en": echo "You are also informed that you can exercise the rights of access, rectification, deletion, portability, limitation of treatment, <a href=\"https://www.alqueriadelbasket.com/?r=index/politicacancelacion&idioma=cas\" target=\"_blank\" style=\"font-weight: bold; color: #eb7c00;\">cancellation</a> and, where appropriate, opposition, by sending a written request with a photocopy of your ID to the following address: C/ BOMBER RAMON DUART, S/N, 46013, VALENCIA or through valencia.basket@valenciabasket.com as well as claiming to the Spanish Data Protection Agency (www.agpd.es) when the person concerned considers that 'VALENCIA BASKET CLUB SAD' has violated the rights that are recognized by the applicable regulations on data protection.";
														break;
													}*/
												?>                                        	
											</p>
											
											<p><?php echo $lang["politicas_ampliacion_info"];?></p>
										</div>

										<div class="col-12 mt-1 mb-1">
											<label class="containerchekbox">
												<input type="checkbox" name="autorizo" value="si" required>
												<p><?php echo $lang["shooting_check_condiciones"];?></p>
												<span class="checkmark"></span>
											</label>
											<input type="hidden" name="CodigoValido" id="CodigoValido" value="0">
										</div>

										<div class="col-12 col-md-6 col-lg-6 col-xl-6 mb-2" id="pago-oficinas">
											<button type="submit" class="btn btn-link-w w-100" style="width: 100%; margin-left: 0;" id="oficina" name="enviar" value="oficina">
												<span><?php echo $lang["boton_transferencia"];?></span>
											</button>
										</div> 

										<div class="col-12 col-12 col-md-6 col-lg-6 col-xl-6 mb-2">
											<button type="submit" class="btn btn-link-w w-100" style="width: 100%; margin-left: 0;" id="tarjeta" name="enviar" value="tarjeta">
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

		<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/additional-methods.min.js"></script>

		<script type="text/javascript">
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
				else { alert("¡El formulario se ha bloqueado! \nVuelva a intentar subir un archivo de imagen o PDF válido. \n(Archivos de imagen admitidos: .JPG, .JPEG, .PNG, .GIF, .BMP y .PDF)");
				//alert(<?php //echo $lang["shooting_aviso_validacion_adjuntos"];?>);
					<?php  
					/*	switch ($_SESSION['language_skills']) {
							case "es": ?> 
								alert("¡El formulario se ha bloqueado! \nVuelva a intentar subir un archivo de imagen o PDF válido. \n(Archivos de imagen admitidos: .JPG, .JPEG, .PNG, .GIF, .BMP y .PDF)"); <?php ; 
							break;
							case "en": ?> 
								alert("The form has been blocked! \nTry uploading again a valid image or PDF file. \n(Supported image files: .JPG, .JPEG, .PNG, .GIF, .BMP y .PDF)"); <?php ; 
							break;
						}*/
					?>
					$("#tarjeta").prop('disabled', true);
					$("#oficina").prop('disabled', true);

					$("#tarjeta").removeClass("btn-link-w");
					$("#tarjeta").removeClass("w-100");

					$("#oficina").removeClass("btn-link-w");
					$("#oficina").removeClass("w-100");
				}
			}
		
			//Si no se ha elegido España en el país, se oculta el botón de pago en oficina
			$(function() {
				$('#pais').change(function() {
				   var opt = $(this).val();
					if (opt == 'España') {
						$('#pago-oficinas').show();
					}
					else {
						$('#pago-oficinas').hide();
					}
				});
			});

			$("#codigoDescuento").on("keyup", function(){
				if ( $("#codigoDescuento").val().length == 5 ) {
					var form_data = {
			          codigo: $("#codigoDescuento").val(),
			          dni_tutor: $("#dnitutor").val(),
			          dni_jugador: $("#dni").val()
			        };

					$.ajax({
			            type: "POST",
			            url: "?r=shootingcamp/ValidarCodigo",
			            data: form_data,
			            dataType: "json",
			            success: function ( data ) {

							if( data.consulta.length == 0 ){
								$("#mensajeCodigoDescuento").append('<div class="alert alert-danger">El Codigo de Descuento No es Valido.</div>');
							} else {
								$("#mensajeCodigoDescuento").append('<div class="alert alert-success">El Codigo de Descuento es Correcto</div>');
								$("#codigoDescuento").attr("disabled", true);
								$("#CodigoValido").val("1");
							}

			            },error: function ( errData ){
			            	console.log( "Entramos en el error de ajax" );
			            }
			        });	

				}else{
					$("#mensajeCodigoDescuento div").remove();
				}

			});

			//Configuración del formulario pasando por Ajax

			//formulario_regisrto_shooting
			/*
			$('#formulario_regisrto_shooting').validate(
			{
	            submitHandler: function()
	            {
	            	//var form_data = {
			        //  debug: "false",
			        //  form_id: "inscripciones_cargar_contenido_inscripcion_original",
			        //  idinscripcion: idinscripcion
			        //};

			        var formData = new FormData(document.getElementById("formulario_regisrto_shooting"));
                    formData.append("fotocopiasip", document.getElementById("fileName"));

			        $.ajax({
			            type: "POST",
			            url: "?r=formularios/ShootingCampForm",
			            data: $("#formulario_regisrto_shooting").serialize(),
			            dataType: "json",
			            success: function ( data ) {

							if ( data.response == "error" ) {
								console.log( data.message );
			             	}else{
			             		console.log( data.message );
			             	}

			            },error: function ( errData ){
			            	console.log( "Entramos en el error de ajax" );
			            }
			        });	
				}
			});
			*/

			$("#dnicomprobacion").on("keyup", function()
            {
				if( $("#dnicomprobacion").val().length == 9 || $("#dnicomprobacion").val().length == 11 ){
					console.log($("#dnicomprobacion").val());
					var form_data = {
						dni:         $("#dnicomprobacion").val()
					};

					$.ajax(
					{
						type:       "POST",
						url:        "?r=shootingcamp/ComprobarAlumno",
						data:       form_data,
						dataType:   "json",
						success: function (data)
						{
							if( data.response == "success" ){
								$("#jugadores_internos").attr("checked", false);
								$("#jugadores_externos").attr("checked", false);
								
								$("#jugadores_internos").attr("disabled", true);
								$("#jugadores_externos").attr("disabled", true);
								

								$("#jugadores_internos_club").attr("disabled", false);
								$("#jugadores_internos_club").attr("checked", true);
								$("#jugadores_externos_club").attr("disabled", false);
								
								$("#dnicomprobacion").attr("disabled", true);
							}
							else{
								$("#mensaje_dni_campus_verano").html("<div class='alert alert-danger'>"+data.message+"</div>");
								$("#mensaje_dni_campus_verano").fadeTo(5000, 1000).slideUp(1000,function() {
									$("#mensaje_dni_campus_verano").slideUp(1000);
									$("#mensaje_dni_campus_verano").html("");
								});
							}
						}, error: function (data)
						{
							console.log("Bruh, estamos en el error.");
						}
					});
				}
			});
		</script>
		<!-- Load Scripts End -->		
	</body>
</html>