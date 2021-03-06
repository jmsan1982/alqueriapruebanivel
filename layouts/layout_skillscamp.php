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
						<div class="parallax col-12" style="background-image: url('img/cabecera-skills-camp.jpg');">
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
										<?php 
											switch ($_SESSION['language_skills']) {
												case "es": echo "Regístrate en SKILLS CAMP 2020";
												break;
												case "en": echo "Register at the SKILLS CAMP 2020";
												break;
											}
										?>
									</span>
								</h3>

								<form enctype="multipart/form-data" id="formulario_regisrto_shooting" class="boxed-form" name="contactform" method="post" action="?r=formularios/ShootingCampForm">
									<!-- DÍAS A ELEGIR -->
									<div class="row">
										<div class="col-12 col-md-12 col-lg-6 col-xl-6">
											<div class="form-group">
												<div class="row">
													<div class="col-12 mb-1 t-left" style="font-size: 15px;">
														<p>
															<?php 
																switch ($_SESSION['language_skills']) {
																	case "es": echo "<strong>Del 29 de Junio al 3 de Julio para chicos y chicas de 13 a 19 años.</strong><br>Elige la opción que te corresponda solo para Skills Camp:"; break;
																	case "en": echo "<strong>From July 29th of June to 3th of July for boys and girls aged 13 to 19.</strong><br>Choose the option that corresponds to you only Skills Camp:"; break;
																} 
															?>
														</p>
													</div>

													<div class="col-12 mb-1 t-left" style="font-size: 15px;">
														<label class="control control--radio">
															<?php 
																switch ($_SESSION['language_skills']) {
																	case "es": echo "Jugadores Internos: <strong>595€</strong> (Pensión completa)"; break;
																	case "en": echo "Internal Players: <strong>595€</strong> (Full board)"; break;
																}
															?>
															<input type="radio" name="opcion" value="jugadores_internos" checked>
															<div class="control__indicator"></div>
														</label>
													</div>

													<div class="col-12 mb-1 t-left" style="font-size: 15px;">
														<label class="control control--radio">
															<?php 
																switch ($_SESSION['language_skills']) {
																	case "es": echo "Jugadores Externos: <strong>360€</strong> (Comida incluida)"; break;
																	case "en": echo "External Players: <strong>360€</strong> (Lunch included)"; break;
																}
															?>
															<input type="radio" name="opcion" value="jugadores_externos">
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
																switch ($_SESSION['language_skills']) {
																	case "es": echo "<strong>Skills Camp del 13 al 17 de Julio.</strong><br>Puedes inscribirte en los dos campus Skills Camp y Shooting Academy:"; break;
																	case "en": echo "<strong>From July 13 to 17.</strong><br>Choose the option for Skills Camp and Shooting Academy:"; break;
																}
															?>
														</p>
													</div>

													<div class="col-12 mb-1 t-left" style="font-size: 15px;">
														<label class="control control--radio">
															<?php 
																//Realizando descuento del 10% en uno de los dos
																switch ($_SESSION['language_skills']) {
																	case "es": echo "Internos en Shooting y Skills: <strong>1.130€</strong> (Pensión completa)"; break;
																	case "en": echo "Internal Players Shooting y Skills: <strong>1.130€</strong> (Full board)"; break;
																}
															?>
															<input type="radio" name="opcion" value="internos_dos_campus">
															<div class="control__indicator"></div>
														</label>
													</div>

													<div class="col-12 mb-1 t-left" style="font-size: 15px;">
														<label class="control control--radio">
															<?php 
																//Realizando descuento del 10% en uno de los dos
																switch ($_SESSION['language_skills']) {
																	case "es": echo "Externos en Shooting y Skills: <strong>684€</strong> (Comida incluida)"; break;
																	case "en": echo "External Players Shooting y Skills: <strong>684€</strong> (Lunch included)"; break;
																}
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
																switch ($_SESSION['language_skills']) {
																	case "es": echo "<strong>Pack 1</strong><br>Precio por separado: 940€<br>Precio seleccionando una opción del pack: <strong>845€</strong>"; break;
																	case "en": echo "<strong>Pack 1</strong><br>Price separately: 940€<br>Price by selecting a pack option: <strong>845€</strong>"; break;
																}
															?>
														</p>
													</div>

													<div class="col-12 mb-1 t-left" style="font-size: 15px;">
														<label class="control control--radio">
															<?php 
																//Realizando descuento del 10% en uno de los dos
																switch ($_SESSION['language_skills']) {
																	case "es": echo "<strong>Opcion A: </strong> Del 21 de junio al 3 de julio. Campus Valencia Basket Calvestra y Skills Camp."; break;
																	case "en": echo "<strong>Option A: </strong> From June 21 to July 3. Valencia Basket Calvestra Campus and Skills Camp."; break;
																}
															?>
															<input type="radio" name="opcion" value="pack_uno_opcion_a">
															<div class="control__indicator"></div>
														</label>
													</div>

													<div class="col-12 mb-1 t-left" style="font-size: 15px;">
														<label class="control control--radio">
															<?php 
																//Realizando descuento del 10% en uno de los dos
																switch ($_SESSION['language_skills']) {
																	case "es": echo "<strong>Opcion B: </strong> Del 29 de junio al 11 de julio. Skills Camp y Campus Valencia Basket Calvestra."; break;
																	case "en": echo "<strong>Opcion B: </strong> From June 29th to July 11th. Skills Camp and Campus Valencia Basket Calvestra."; break;
																}
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
																switch ($_SESSION['language_skills']) {
																	case "es": echo "<strong>Pack 2</strong><br>Precio por separado: 1.020€<br>Precio seleccionando una opción del pack: <strong>920€</strong>"; break;
																	case "en": echo "<strong>Pack 2</strong><br>Price separately: 1.020€<br>Price by selecting a pack option: <strong>920€</strong>"; break;
																}
															?>
														</p>
													</div>

													<div class="col-12 mb-1 t-left" style="font-size: 15px;">
														<label class="control control--radio">
															<?php 
																//Realizando descuento del 10% en uno de los dos
																switch ($_SESSION['language_skills']) {
																	case "es": echo "<strong>Opcion A: </strong> Del 29 de junio al 11 de julio. Skills Camp y Tecnificación Femenina."; break;
																	case "en": echo "<strong>Option A: </strong> From June 29th to July 11th. Skills Camp and Women's Technification."; break;
																}
															?>
															<input type="radio" name="opcion" value="pack_dos_opcion_a">
															<div class="control__indicator"></div>
														</label>
													</div>
												</div>
											</div>
										</div>
									</div>

									<!-- DATOS PARTICIPANTE -->
									<div class="form-group">
										<div class="row">
											<div class="col-12">
												<h4 class="section-title">
													<?php 
														switch ($_SESSION['language_skills']) {
															case "es": echo "Datos del jugador/a:"; break;
															case "en": echo "Player's data"; break;
														}
													?>                                                    
												</h4>
											</div>

											<div class="col-12 col-md-2 col-lg-2 col-xl-2 redimension">
												<label>
													<?php
														switch ($_SESSION['language_skills']) {
															case "es": echo "Nombre"; break;
															case "en": echo "Name"; break;
														}
													?>
													<input type="text" class="form-control" name="nombre" maxlength="45" required>
												</label>
											</div>

											<div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
												<label>
													<?php
														switch ($_SESSION['language_skills']) {
															case "es": echo "Apellidos"; break;
															case "en": echo "Surnames"; break;
														}
													?>
													<input type="text" class="form-control" name="apellidos" maxlength="45" required>
												</label>
											</div>

											<div class="col-12 col-md-3 col-lg-3 col-xl-3 redimension">
												<label>
													<?php
														switch ($_SESSION['language_skills']) {
															case "es": echo "Fecha de nacimiento"; break;
															case "en": echo "Birthdate"; break;
														}
													?>
													<input type="date" class="form-control" id="fecha" name="fechanacimiento" required>
												</label>
											</div>

											<div class="col-12 col-md-3 col-lg-3 col-xl-3">
												<label>
													<?php
														switch ($_SESSION['language_skills']) {
															case "es": echo "DNI"; break;
															case "en": echo "ID Card"; break;
														}
													?>
													<input type="text" class="form-control" name="dni" id="dni" maxlength="20" required>
												</label>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
												<label>
													<?php
														switch ($_SESSION['language_skills']) {
															case "es": echo "¿A qué club perteneces?"; break;
															case "en": echo "Which club do you belong to?"; break;
														}
													?>
													<input type="text" class="form-control" name="club" maxlength="45" required>
												</label>
											</div>

											<div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
												<label>
													<?php
														switch ($_SESSION['language_skills']) {
															case "es": echo "Talla de camiseta"; break;
															case "en": echo "Shirt size"; break;
														}
													?>
													<input type="text" class="form-control" name="tallacamiseta" maxlength="45" required>
												</label>
											</div>
											
											<div class="col-12 col-md-4 col-lg-4 col-xl-4">
												<label>
													<?php
														switch ($_SESSION['language_skills']) {
															case "es": echo "¿Está bajo tratamiento médico?"; break;
															case "en": echo "Are you under medical treatment?"; break;
														}
													?>
													<input type="text" class="form-control" name="tratamientosmedicos" required>
												</label>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
												<label>
													<?php
														switch ($_SESSION['language_skills']) {
															case "es": echo "¿Sufres alguna enfermedad?"; break;
															case "en": echo "Do you suffer from any disease?"; break;
														}
													?>
													<input type="text" class="form-control" name="enfermedad" required>
												</label>
											</div>

											<div class="col-12 col-md-8 col-lg-8 col-xl-8">
												<label>
													<?php
														switch ($_SESSION['language_skills']) {
															case "es": echo "¿Padeces alguna alergia?"; break;
															case "en": echo "Do you have any allergies?"; break;
														}
													?>
													<input type="text" class="form-control" name="alergias" required>
												</label>
											</div>										   
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
												<label>
													<?php
														switch ($_SESSION['language_skills']) {
															case "es": echo "¿Alguna operación reciente?"; break;
															case "en": echo "Any recent operation?"; break;
														}
													?>
													<input type="text" class="form-control" name="operacionreciente" required>
												</label>
											</div>

											<div class="col-12 col-md-8 col-lg-8 col-xl-8">
												<label>
													<?php
														switch ($_SESSION['language_skills']) {
															case "es": echo "¿Alguna observación?"; break;
															case "en": echo "Any observation?"; break;
														}
													?>
													<input type="text" class="form-control" name="observaciones" required>
												</label>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-12">
												<p class="t-left">
													<strong>
														<?php
															switch ($_SESSION['language_skills']) {
																case "es": echo "Autorizo a la dirección del Skills Camp de L'Alqueria del Basket, en caso de máxima urgencia con el consentimiento y prescripción médica a tomar las decisiones médico-quirúrgicas necesarias, si ha sido imposible mi localización.";
																break;
																case "en": echo "I authorize the managers of Skills Camp of L'Alqueria del Basket, in case of maximum urgency with the consent and medical prescription to make the necessary medical-surgical decisions, if my location has been impossible.";
																break;
															}
														?>
													</strong>
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
													<strong>
														<?php 
															switch ($_SESSION['language_skills']) {
																case "es": echo "* Recuerde adjuntar la fotocopia de la Tarjeta Sanitaria o seguro médico.<br>
																(Archivos de imagen admitidos: .JPG, .JPEG, .PNG, .GIF, .BMP y .PDF)"; 
																break;
																case "en": echo "* Remember to attach the photocopy of the health insurance card.<br>
																(Supported image files: .JPG, .JPEG, .PNG, .GIF, .BMP y .PDF)";
																break;
															}
														?>
													</strong>
												</p>
											</div>
										</div>
									</div>

									<!-- DATOS TUTOR -->
									<div class="form-group">
										<div class="row mt-2">
											<div class="col-12">
												<h4 class="section-title">
													<?php switch ($_SESSION['language_skills']) {
															case "es": echo "Datos del padre / madre / tutor:"; break;
															case "en": echo "Parents / tutor's data:"; break;
														}
													?>
												</h4>
											</div>

											<div class="col-12 mt-2 mb-2">
												<div class="alert alert-info">
													<strong>
														<?php switch ($_SESSION['language_skills']) {
															case "es": echo "Si va a registrar a un jugador/a con hermanos/as, por favor recuerde poner el mismo DNI del tutor para beneficiarse del descuento."; break;
															case "en": echo "If you are registering a player with siblings, please remember to put the same tutor's ID to benefit from the discount."; break;
															}
														?>
													</strong>
												</div>
											</div>

											<div class="col-12 col-md-3 col-lg-3 col-xl-3 redimension">
												<label>
													<?php
														switch ($_SESSION['language_skills']) {
															case "es": echo "Nombre"; break;
															case "en": echo "Name"; break;
														}
													?>
													<input type="text" class="form-control" name="nombretutor" maxlength="45" required>
												</label>
											</div>

											<div class="col-12 col-md-5 col-lg-5 col-xl-5 redimension">
												<label>
													<?php
														switch ($_SESSION['language_skills']) {
															case "es": echo "Apellidos"; break;
															case "en": echo "Surnames"; break;
														}
													?>
													<input type="text" class="form-control" name="apellidostutor" maxlength="45" required>
												</label>
											</div>

											<div class="col-12 col-md-4 col-lg-4 col-xl-4">
												<label>
													<?php
														switch ($_SESSION['language_skills']) {
															case "es": echo "DNI"; break;
															case "en": echo "ID Card"; break;
														}
													?>
													<input type="text" class="form-control" name="dnitutor" id="dnitutor" maxlength="20" required>
												</label>
											</div>
										</div>
									</div>
																						
									<div class="form-group">
										<div class="row">
											<div class="col-12 col-md-6 col-lg-6 col-xl-6 redimension">
												<label>
													<?php
														switch ($_SESSION['language_skills']) {
															case "es": echo "Dirección"; break;
															case "en": echo "Address"; break;
														}
													?>
													<input type="text" class="form-control" name="direccion" maxlength="45" required>
												</label>
											</div>

											<div class="col-12 col-md-2 col-lg-2 col-xl-2 redimension">
												<label>
													<?php
														switch ($_SESSION['language_skills']) {
															case "es": echo "Número"; break;
															case "en": echo "Number"; break;
														}
													?>
													<input type="text" class="form-control" name="numero" maxlength="10">
												</label>
											</div>

											<div class="col-12 col-md-2 col-lg-2 col-xl-2 redimension">
												<label>
													<?php
														switch ($_SESSION['language_skills']) {
															case "es": echo "Piso / Escalera"; break;
															case "en": echo "Floor / Stair"; break;
														}
													?>
													<input type="text" class="form-control" name="piso" maxlength="10">
												</label>
											</div>

											<div class="col-12 col-md-2 col-lg-2 col-xl-2">
												<label>
													<?php
														switch ($_SESSION['language_skills']) {
															case "es": echo "Puerta"; break;
															case "en": echo "Door"; break;
														}
													?>
													<input type="text" class="form-control" name="puerta" maxlength="10">
												</label>
											</div>
										</div>
									</div>
																			
									<div class="form-group">
										<div class="row">
											<div class="col-12 col-md-3 col-lg-3 col-xl-3 redimension">
												<label>
													<?php
														switch ($_SESSION['language_skills']) {
															case "es": echo "Código Postal"; break;
															case "en": echo "Postal Code"; break;
														}
													?>
													<input type="text" class="form-control" name="cp" maxlength="10" required>
												</label>
											</div>

											<div class="col-12 col-md-3 col-lg-3 col-xl-3 redimension">
												<label>
													<?php
														switch ($_SESSION['language_skills']) {
															case "es": echo "Provincia"; break;
															case "en": echo "Province"; break;
														}
													?>
													<input type="text" class="form-control" name="provincia" maxlength="25" required>
												</label>
											</div>

											<div class="col-12 col-md-3 col-lg-3 col-xl-3 redimension">
												<label>
													<?php
														switch ($_SESSION['language_skills']) {
															case "es": echo "Población"; break;
															case "en": echo "Town"; break;
														}
													?>
													<input type="text" class="form-control" name="poblacion" maxlength="45" required>
												</label>
											</div>

											<div class="col-12 col-md-3 col-lg-3 col-xl-3">
												<label>
													<?php
														switch ($_SESSION['language_skills']) {
															case "es": echo "País"; break;
															case "en": echo "Country"; break;
														}
													?>
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
												<label>
													<?php
														switch ($_SESSION['language_skills']) {
															case "es": echo "Teléfono"; break;
															case "en": echo "Phone number"; break;
														}
													?>
													<input type="text" class="form-control" name="telefonotutor" maxlength="15" required>
												</label>
											</div>

											<div class="col-12 col-md-7 col-lg-7 col-xl-7 redimension">
												<label>
													<?php
														switch ($_SESSION['language_skills']) {
															case "es": echo "Correo electrónico"; break;
															case "en": echo "Email"; break;
														}
													?>
													<input type="text" class="form-control" name="emailtutor" maxlength="100" required>
												</label>
											</div>

											<div class="col-12">
												<p class="t-left" style="color: red;">
													<strong>
														<?php 
															switch ($_SESSION['language_skills']) {
																case "es": echo "Al terminar la inscripción, recibirá un correo electrónico de confirmación con la información recibida."; break;
																case "en": echo "Upon registration completion, you will receive a confirmation email with the information received."; break;
															}
														?>
													</strong>
												</p>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-12 col-md-2 col-lg-2 col-xl-2">
												<label>
													<?php
														switch ($_SESSION['language_skills']) {
															case "es": echo "Codigo de Descuento"; break;
															case "en": echo "Discount Code"; break;
														}
													?>
													<input type="text" class="form-control" name="codigoDescuento" id="codigoDescuento" maxlength="10">
												</label>
											</div>
											<div class="col-12 col-md-10 col-lg-10 col-xl-10" id="mensajeCodigoDescuento">

											</div>
										</div>
									</div>

									<!-- POLÍTICAS Y TÉRMINOS -->
									<div class="row">
										<?php require('includes/politica_cancelacion.php'); ?>

										<div class="col-12">
											<h3 class="section-title mb-0">
												<span class="orange-text">
													<?php 
														switch ($_SESSION['language_skills']) {
															case "es": echo "Política de privacidad"; break;
															case "en": echo "Privacy policy"; break;
														} 
													?>
												</span>
											</h3>
											<h4 class="section-title mb-0">
												<?php 
													switch ($_SESSION['language_skills']) {
														case "es": echo "Consentimiento expreso e inequívoco:"; break;
														case "en": echo "Express and unequivocal consent:"; break;
													} 
												?>
											</h4>
										</div>

										<div class="col-12">
											<p>
												<?php
													switch ($_SESSION['language_skills']) {
														case "es": echo "En cumplimiento de Ley Orgánica 3/2018, de 5 de diciembre, de Protección de Datos Personales y garantía de los derechos digitales y el reglamento (UE) 2016/679 del parlamento europeo y del consejo de 27 de abril de 2016, se le informa que los datos personales que nos ha facilitado serán (o han sido) incorporados a un registro de actividades titularidad de FUNDACION VALENCIA BASKET 2000 Con CIF G96614474 y cuyas finalidades son; la gestión integral de nuestra escuela de baloncesto y el mantenerle informado de las próximas novedades y actividades de la Fundación.";
														break;
														case "en": echo "In compliance with the Organic Law 3/2018 of December 5 on the Protection of Personal Data and guarantee of digital rights and the regulation (EU) 2016/679 of the European Parliament and the council of April 27, 2016, we advise you that the personal data you have provided will be (or have been) included in an activity log owned by 'FUNDACIÓN VALENCIA BASKET 2000' with CIF G96614474 and whose purposes are: the integral management of our basketball school and keeping you informed of the next news and activities of the foundation.";
														break;
													}
												?>
											</p>

											<label class="containerchekbox">
												<p>
													<input type="checkbox" name="autorizodatos" value="si" required>
													<span class="checkmark"></span>
													<?php
														switch ($_SESSION['language_skills']) {
															case "es": echo "Acepto que FUNDACIÓ VALENCIA BASQUET 2000 comunique los datos facilitados a VALENCIA BASKET CLUB SAD para que me mantenga informado sobre productos, servicios o promociones relacionadas con el sector del baloncesto que pudieran ser de mi interés por cualquier medio, incluido el electrónico.";
															break;
															case "en": echo "I accept that 'FUNDACIÓ VALENCIA BASQUET 2000' communicates my information to 'VALENCIA BASKET CLUB SAD' to keep me informed about products or services related to the basketball sector that could be of my interest by any means, including electronic.";
															break;
														}
													?>
												</p>
											</label>

											<label class="containerchekbox">
												<p>
													<input type="checkbox" name="autorizoimagen" value="si" required>
													<span class="checkmark"></span>
													<?php
														switch ($_SESSION['language_skills']) {
															case "es": echo "Acepto que FUNDACIÓ VALENCIA BASQUET 2000 trate la imagen del participante en la actividad, parcial o total, en cualquier soporte grafico o visual (fotografía, video o similar) para su uso en los medios de difusión presentes y futuros de la FUNDACIÓ VALENCIA BASQUET 2000 y/o el VALENCIA BASKET CLUB SAD (web, folletos, revistas del club, campeonatos, redes sociales, etc.)";
															break;
															case "en": echo "I accept that 'FUNDACIÓ VALENCIA BASQUET 2000' treats the image of the participant in the activity, partial or total, in any graphic or visual support (photography, video or similar) for its use in the present and future media of the 'FUNDACIÓ VALENCIA BASQUET 2000' and / or the 'VALENCIA BASKET CLUB SAD' (web, brochures, club magazines, championships, social networks, etc.)";
															break;
														}
													?>                                                
												</p>
											</label>

											<p>
												<?php
													switch ($_SESSION['language_skills']) {
														case "es": echo "Se le informa también que puede ejercer los derechos de acceso, rectificación, supresión, portabilidad, limitación de tratamiento, <a href=\"https://www.alqueriadelbasket.com/?r=index/politicacancelacion&idioma=cas\" target=\"_blank\" style=\"font-weight: bold; color: #eb7c00;\">cancelación</a> y, en su caso, oposición, enviando una solicitud por escrito acompañada de la fotocopia de su DNI a la siguiente dirección: BOMBER RAMON DUART, S/N, 46013, VALENCIA o a través de  valencia.basket@valenciabasket.com así como reclamar ante la Agencia Española de Protección de Datos (www.agpd.es) cuando el interesado considere que VALENCIA BASKET CLUB SAD ha vulnerado los derechos que le son reconocidos por la normativa aplicable en protección de datos.";
														break;
														case "en": echo "You are also informed that you can exercise the rights of access, rectification, deletion, portability, limitation of treatment, <a href=\"https://www.alqueriadelbasket.com/?r=index/politicacancelacion&idioma=cas\" target=\"_blank\" style=\"font-weight: bold; color: #eb7c00;\">cancellation</a> and, where appropriate, opposition, by sending a written request with a photocopy of your ID to the following address: C/ BOMBER RAMON DUART, S/N, 46013, VALENCIA or through valencia.basket@valenciabasket.com as well as claiming to the Spanish Data Protection Agency (www.agpd.es) when the person concerned considers that 'VALENCIA BASKET CLUB SAD' has violated the rights that are recognized by the applicable regulations on data protection.";
														break;
													}
												?>                                        	
											</p>

											<p>
												<?php
													switch ($_SESSION['language_skills']) {
														case "es": echo "Si desea ampliar más información sobre nuestra política de privacidad entre en nuestra web <a href=\"https://www.alqueriadelbasket.com/\" target=\"_blank\" style=\"color: #eb7c00; font-weight: 600;\">www.alqueriadelbasket.com</a>";
														break;
														case "en": echo "If you want more information about our privacy policy, go to our website <a href=\"https://www.alqueriadelbasket.com/\" target=\"_blank\" style=\"color: #eb7c00; font-weight: 600;\">www.alqueriadelbasket.com</a>";
														break;
													}
												?>
											</p>
										</div>

										<div class="col-12 mt-1 mb-1">
											<label class="containerchekbox">
												<input type="checkbox" name="autorizo" value="si" required>
												<p>
													<?php 
														switch ($_SESSION['language_skills']) {
															case "es": echo "Como madre / padre / tutor, inscribo a mi hij@ en Skills Camp de L'Alqueria del Basket y acepto las condiciones anteriormente expuestas.";
															break;
															case "en": echo "As a parent / tutor, I enroll my child in Skills Camp of L'Alqueria del Basket and I accept the conditions outlined above.";
															break;
														} 
													?>
												</p>
												<span class="checkmark"></span>
											</label>
										</div>

										<div class="col-12 col-md-6 col-lg-6 col-xl-6 mb-2" id="pago-oficinas">
											<button type="submit" class="btn btn-link-w w-100" style="width: 100%; margin-left: 0;" id="oficina" name="enviar" value="oficina">
												<span>
													<?php 
														switch ($_SESSION['language_skills']) {
															case "es": echo "Pago en oficinas"; break;
															case "en": echo "Payment in offices"; break;
														}
													?>
												</span>
											</button>
										</div> 

										<div class="col-12 col-12 col-md-6 col-lg-6 col-xl-6 mb-2">
											<button type="submit" class="btn btn-link-w w-100" style="width: 100%; margin-left: 0;" id="tarjeta" name="enviar" value="tarjeta">
												<span>
													<?php 
														switch ($_SESSION['language_skills']) {
															case "es": echo "Realizar Pago con tarjeta"; break;
															case "en": echo "Card Payment"; break;
														}
													?>
												</span>
											</button>
										</div>
									</div>

									<!-- INFO TRANSACCIONES EXTERIORES -->
									<div class="row">
										<div class="col-12">
											<h3 class="section-title mt-0 mb-0">
												<span class="orange-text">
													<?php 
														switch ($_SESSION['language_skills']) {
															case "es": echo "Transacciones exteriores"; break;
															case "en": echo "External transactions"; break;
														} 
													?>
												</span>
											</h3>
											<h4 class="section-title mb-0">
												<?php 
													switch ($_SESSION['language_skills']) {
														case "es": echo "Datos para su realización:"; break;
														case "en": echo "Data for its realization:"; break;
													} 
												?>
											</h4>
										</div>

										<div class="col-12 mb-2">
											<p>
												<?php
													switch ($_SESSION['language_skills']) {
														case "es": echo "En caso de algún problema con su pago a través de tarjeta de crédito, puede realizar una transferencia bancaria al siguiente número de cuenta.<br>Una vez realizada, enviar el justificante de la transferencia a recepcion@alqueriadelbasket.com"; break;
														case "en": echo "In case of any problem with your credit card payment, you can make a bank transfer to the next account number. <br> Once completed, send the transfer receipt to recepcion@alqueriadelbasket.com"; break;
													}
												?>
											</p>

											<table class="transacciones-exteriores">
												<tr>
													<td>
														<strong>
															IBAN:
														</strong>
													</td>
													<td>
														ES29 3159 0009 9623 3942 4422
													</td>
												</tr>
												<tr>
													<td>
														<strong>
															BIC:
														</strong>
													</td>
													<td>
														 BCOEESMM159
													</td>
												</tr>
											</table>                                        
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
				else {
					<?php 
						switch ($_SESSION['language_skills']) {
							case "es": ?> 
								alert("¡El formulario se ha bloqueado! \nVuelva a intentar subir un archivo de imagen o PDF válido. \n(Archivos de imagen admitidos: .JPG, .JPEG, .PNG, .GIF, .BMP y .PDF)"); <?php ; 
							break;
							case "en": ?> 
								alert("The form has been blocked! \nTry uploading again a valid image or PDF file. \n(Supported image files: .JPG, .JPEG, .PNG, .GIF, .BMP y .PDF)"); <?php ; 
							break;
						}
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
		</script>
		<!-- Load Scripts End -->		
	</body>
</html>