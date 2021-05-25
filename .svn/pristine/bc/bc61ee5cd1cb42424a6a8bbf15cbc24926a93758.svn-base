<!DOCTYPE html>
<html lang="es"> 
	<?php require('includes/head.php'); ?>
	<link rel="stylesheet" href="css/forms.css">
	<link rel="stylesheet" href="css/parallax.css">
	<link rel="stylesheet" href="css/formus.css?v=1.1">

	<style>
		.error {
			color: red;
		}
	</style>

	<body class="Pages" id="formus">

		<div class="wrapper overflow-x-hidden">

			<?php require ("includes/header.php"); ?>

			<!-- Start Page-Content -->
			<section id="page-content" class="overflow-x-hidden margin-top-header">
				<div class="block">
					<div class="container-fluid">
						<div class="row">
<!--        <div class="parallax col-12 mt-0" style="background-image: url('img/banner_SportsClub.jpg');">
							</div>-->
                            <div class="col-12 no-gutters">
                                <img src="img/banner_SportsClub.jpg" class="img-responsive">
                            </div>
						</div>
					</div>
				</div>

				<div class="block background-f6">
					<div class="container">
						<div class="row">
							<div class="col-12 col-md-12 col-lg-12 col-xl-12">								
								<h2 class="section-title t-center"><?php echo $lang["sportsclub_titulo"];?> <span class="orange-text">Sports Club</span></h2>
							</div>
						</div>

						<div class="row">
                            <div class="col-12">
                                <div class="alert alert-info"><?php echo $lang["sportsclub_suspendida"];?></div>
                            </div>
                            
							<div class="col-12">
								<form id="sportsClubForm" class="boxed-form" name="contactform" method="post">
									<input type="hidden" value="sportsClub" name="categoria">

									<!-- PARTE 1: DATOS DE LA INSCRIPCIÓN: -->
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <div class="row">
                                                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 redimension">
                                                    <label><?php echo $lang["formulario_dni"];?>:
                                                        <input type="text" id="dni-sportsClub" class="form-control" name="dni-sportsClub" required readonly>
                                                    </label>
                                                </div>

                                                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 redimension">
                                                    <label><?php echo $lang["formulario_nombre"];?>:
                                                        <input type="text" class="form-control" name="nombre-sportsClub" maxlength="50" required readonly>
                                                    </label>
                                                </div>

                                                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 redimension">
                                                    <label><?php echo $lang["formulario_apellidos"];?>:
                                                        <input type="text" id="apellidos-sportsClub" class="form-control" name="apellidos-sportsClub" maxlength="50" required readonly>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group col-12">
                                            <div class="row">
                                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 redimension">
                                                    <label><?php echo $lang["formulario_direccion"];?>:
                                                        <input type="text" class="form-control" name="direccion-sportsClub" maxlength="255" required readonly>
                                                    </label>
                                                </div>

                                                <div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2 redimension">
                                                    <label><?php echo $lang["formulario_numero"];?>:
                                                        <input type="number" class="form-control" name="numero-sportsClub" maxlength="10" required readonly>
                                                    </label>
                                                </div>

                                                <div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2 redimension">
                                                    <label><?php echo $lang["formulario_piso"];?>:
                                                        <input type="text" class="form-control" name="piso-sportsClub" maxlength="20" readonly>
                                                    </label>
                                                </div>

                                                <div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2 redimension">
                                                    <label><?php echo $lang["formulario_puerta"];?>:
                                                        <input type="text" class="form-control" name="puerta-sportsClub" maxlength="20" readonly>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group col-12">
                                            <div class="row">
                                                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 redimension">
                                                    <label><?php echo $lang["formulario_codigo_postal"];?>:
                                                        <input type="number" class="form-control" name="cp-sportsClub" maxlength="5" required readonly>
                                                    </label>
                                                </div>

                                                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 redimension">
                                                    <label><?php echo $lang["formulario_poblacion"];?>:
                                                        <input type="text" class="form-control" name="poblacion-sportsClub" maxlength="100" required readonly>
                                                    </label>
                                                </div>

                                                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 redimension">
                                                    <label><?php echo $lang["formulario_provincia"];?>:
                                                        <input type="text" class="form-control" name="provincia-sportsClub" maxlength="25" required readonly>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group col-12">
                                            <div class="row">
                                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 redimension">
                                                    <label><?php echo $lang["formulario_cumpleaños"];?>:
                                                        <input type="date" class="form-control" style="color: #5c5c5c !important;" 
                                                               id="fecha-sportsClub" name="fechanacimiento-sportsClub" required readonly>
                                                    </label>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-6 col-xl-6 redimension">
                                                    <label><?php echo $lang["sportsclub_texto_select"];?>:
                                                        <select class="form-control" style="color: #5c5c5c !important;" readonly 
                                                                name="interno-externo-sportsClub" required>
                                                            <option value=""><?php echo $lang["sportsclub_texto_opcion1"];?></option>
                                                            <option value="padre"><?php echo $lang["sportsclub_texto_opcion2"];?></option>
                                                            <option value="abonado"><?php echo $lang["sportsclub_texto_opcion3"];?></option>
                                                            <option value="nada"><?php echo $lang["sportsclub_texto_opcion4"];?></option>
                                                        </select>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group col-12">
                                            <div class="row">
                                                <div class="col-12 col-md-6 col-lg-6 col-xl-6 redimension">
                                                    <label><?php echo $lang["formulario_correo"];?>:
                                                        <input type="email" class="form-control" name="email-SportsClub" maxlength="100" required readonly>
                                                    </label>
                                                </div>

                                                <div class="col-12 col-md-6 col-lg-6 col-xl-6 redimension">
                                                    <label><?php echo $lang["formulario_telefono"];?>:
                                                        <input type="number" class="form-control" name="telefono-SportsClub" maxlength="100" required readonly>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
											
                                    
                                    <!-- PARTE 2: HORARIOS SELECCIONADOS -->
                                    <div class="row">
                                        <div class="col-12">
                                            <h3 class="section-title t-center"><?php echo $lang["sportsclub_titulo_actividades"];?>:</h3>
                                        </div>
                                        
                                        <!-- Bloque informativo -->
                                        <div class="col-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                                            <div class="contact-info-wrap">    
                                                <h4 class="section-title mt-0 mb-0">
                                                    <span class="orange-text"><?php echo $lang["sportsclub_titulo_actividades_precios"];?></span>
                                                </h4>
                                                <ul>
                                                    <li><?php echo $lang["sportsclub_titulo_actividades_precios_punto1"];?></li>
                                                    <li><?php echo $lang["sportsclub_titulo_actividades_precios_punto2"];?></li>
                                                    <li><?php echo $lang["sportsclub_titulo_actividades_precios_punto3"];?></li>
                                                    <li><?php echo $lang["sportsclub_titulo_actividades_precios_punto4"];?></li>
                                                    <li><?php echo $lang["sportsclub_titulo_actividades_precios_punto5"];?></li>
                                                </ul>
                                            </div>
                                        </div>
                                        
                                        
                                        <!-- Bloque para elegir actividades, dias y horarios -->
                                        <div class="col-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                                            <div class="row">
                                                <!-- Franja 1 -->
                                                <div class="col-12 redimension">
                                                    <label class="containerchekbox">
                                                        <input type="checkbox" name="franja1" class="mainFranja"  readonly>
                                                        <p class="mb-0 mt-0"><?php echo $lang["sportsclub_franja1"];?></p>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                
                                                    <!-- Franja 1: detalle -->
                                                    <div class="col-12 redimension">
                                                        <label class="containerchekbox franja1-container">
                                                            <input type="checkbox" name="franja1-lunes" class="franja1"  readonly>
                                                            <p class="mb-0 mt-0"><?php echo $lang["lunes"];?> 18:00h-19:00h</p>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-12 redimension">
                                                        <label class="containerchekbox franja1-container">
                                                            <input type="checkbox" name="franja1-miercoles" class="franja1"  readonly>
                                                            <p class="mb-0 mt-0"><?php echo $lang["miercoles"];?> 18:00h-19:00h</p>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>

                                                <!-- Franja 2 -->
                                                <div class="col-12 redimension">
                                                    <label class="containerchekbox">
                                                        <input type="checkbox" name="franja2" class="mainFranja"  readonly>
                                                        <p class="mb-0 mt-0"><?php echo $lang["sportsclub_franja2"];?></p>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>

                                                    <!-- Franja 2: detalle -->
                                                    <div class="col-12 redimension">
                                                        <label class="containerchekbox franja2-container">
                                                            <input type="checkbox" name="franja2-martes" class="franja2"  readonly>
                                                            <p class="mb-0 mt-0"><?php echo $lang["martes"];?> 18:00h-19:00h</p>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-12 redimension">
                                                        <label class="containerchekbox franja2-container">
                                                            <input type="checkbox" name="franja2-jueves" class="franja2"  readonly>
                                                            <p class="mb-0 mt-0"><?php echo $lang["jueves"];?> 18:00h-19:00h</p>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                
                                                <!-- Franja 3 -->
                                                <div class="col-12 redimension">
                                                    <label class="containerchekbox">
                                                        <input type="checkbox" name="franja3" class="mainFranja"  readonly>
                                                        <p class="mb-0 mt-0"><?php echo $lang["sportsclub_franja3"];?></p>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>

                                                    <!-- Franja 3: detalle -->
                                                    <div class="col-12 redimension">
                                                        <label class="containerchekbox franja3-container">
                                                            <input type="checkbox" name="franja3-lunes" class="franja3"  readonly>
                                                            <p class="mb-0 mt-0"><?php echo $lang["lunes"];?> 19.30h-20:30h</p>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-12 redimension">
                                                        <label class="containerchekbox franja3-container">
                                                            <input type="checkbox" name="franja3-miercoles" class="franja3"  readonly>
                                                            <p class="mb-0 mt-0"><?php echo $lang["miercoles"];?> 19.30h-20:30h</p>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                
                                                <!-- Franja 4 -->
                                                <div class="col-12 redimension">
                                                    <label class="containerchekbox">
                                                        <input type="checkbox" name="franja4" class="mainFranja"  readonly>
                                                        <p class="mb-0 mt-0"><?php echo $lang["sportsclub_franja4"];?></p>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>

                                                    <!-- Franja 4: detalle -->
                                                    <div class="col-12 redimension">
                                                        <label class="containerchekbox franja4-container">
                                                            <input type="checkbox" name="franja4-martes" class="franja4">
                                                            <p class="mb-0 mt-0"><?php echo $lang["martes"];?> 19:30h-20:30h</p>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-12 redimension">
                                                        <label class="containerchekbox franja4-container">
                                                            <input type="checkbox" name="franja4-jueves" class="franja4">
                                                            <p class="mb-0 mt-0"><?php echo $lang["jueves"];?> 19:30h-20:30h</p>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                    
                                                    
                                                <!-- Franja 5 -->
                                                <div class="col-12 redimension">
                                                    <label class="containerchekbox">
                                                        <input type="checkbox" name="franja5" class="mainFranja"  readonly>
                                                        <p class="mb-0 mt-0"><?php echo $lang["sportsclub_franja5"];?></p>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                
                                                    <!-- Franja 5: detalle -->
                                                    <div class="col-12 redimension">
                                                        <label class="containerchekbox franja5-container">
                                                            <input type="checkbox" name="franja5-martes" class="franja5">
                                                            <p class="mb-0 mt-0"><?php echo $lang["martes"];?> 21:00h-22:00h</p>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-12 redimension">
                                                        <label class="containerchekbox franja5-container">
                                                            <input type="checkbox" name="franja5-jueves" class="franja5">
                                                            <p class="mb-0 mt-0"><?php echo $lang["jueves"];?> 21:00h-22:00h</p>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                            </div>
                                        </div>

                                        
                                        <div class="form-group col-12 col-md-6 col-lg-6 col-xl-6" >
                                            <div id="seleccionDias" style="display: none;">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h3 class="section-title">Seleccione los días.</h3>
                                                    </div>

                                                    <!-- Aqui tenia Ricardo todo el pescao --> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    
									<!-- PARTE 2 -> CUESTIONARIO ACTIVIDAD FÍSICA Y SALUD -->
                                    <div class="row">
                                        <div class="col-12">
                                            <h3 class="section-title t-center"><?php echo $lang["actividad_fisica_titulo"];?></h3>
                                        </div>

										<div class="col-12">
											<div class="contact-info-wrap" id="btn-toggle-actividadFisica" style="cursor: pointer;">    
												<h4 class="section-title mt-0 mb-0 t-center">
													<span class="orange-text"><?php echo $lang["actividad_fisica_titulo_cuestionario"];?></span>
												</h4>
											</div>
                                            
                                            <div id="sportsClubFormCuestionarioVer">	
                                                <input type="hidden" value="sportsClub" name="categoria">

                                                <div class="row">
                                                    <div class="form-group col-12">
                                                        <div class="row">
                                                            <div class="col-12 mt-2 redimension">
                                                                <label><?php echo $lang["actividad_fisica_profesion"];?>:
                                                                    <input type="text" id="profesion-sportsClub" name="profesion-sportsClub" class="form-control" name="profesion-sportsClub" required>
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-12 mt-2 redimension">
                                                                <label><?php echo $lang["actividad_fisica_aficiones_deportivas"];?>:
                                                                    <textarea class="form-control" id="aficiones-sportsClub" name="aficiones-sportsClub" 
                                                                              rows="1" required style="max-height:80px;"></textarea>
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-12 mt-2 redimension">
                                                                <label><?php echo $lang["actividad_fisica_objetivo_entrenamiento"];?>:
                                                                    <textarea class="form-control" id="objetivo-sportsClub" name="objetivo-sportsClub" 
                                                                              rows="1" required style="max-height:80px;"></textarea>
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-12 mt-2 redimension">
                                                                <label><?php echo $lang["actividad_fisica_impresion_diagnostica"];?>:
                                                                    <textarea class="form-control" id="impresion-sportsClub" name="impresion-sportsClub" 
                                                                              rows="1" required style="max-height:80px;"></textarea>
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-12 mt-2 redimension">
                                                                <label><?php echo $lang["actividad_fisica_pauta_recuperacion"];?>:
                                                                    <textarea class="form-control" id="pauta-sportsClub" name="pauta-sportsClub" rows="1" required></textarea>
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-12 mt-2">
                                                                <div class="contact-info-wrap">    
                                                                    <h4 class="section-title mt-0 mb-0">
                                                                        <span class="orange-text"><?php echo $lang["actividad_fisica_titulo_actividad_fisica"];?></span>
                                                                    </h4>
                                                                    <p class="t-justify"><?php echo $lang["actividad_fisica_titulo_actividad_fisica_texto"];?>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-2">
                                                            <div class="col-12">
                                                                <h4 class="section-title mt-0 mb-0">
                                                                    <span class="orange-text"><?php echo $lang["actividad_fisica_titulo_trabajo"];?></span>
                                                                </h4>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-2">
                                                            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                                                <p class="t-justify"><?php echo $lang["actividad_fisica_trabajo_1"];?>
                                                                </p>
                                                            </div>

                                                            <div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
                                                                <select class="form-control" style="-webkit-appearance: none;-moz-appearance: none; color: #5c5c5c !important;" name="trabajo-1-sportsClub" required>
                                                                    <option value="" selected disabled><?php echo $lang["actividad_fisica_option1"];?></option>
                                                                    <option value="1"><?php echo $lang["actividad_fisica_option_si"];?></option>
                                                                    <option value="0"><?php echo $lang["actividad_fisica_option_no"];?></option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-2">
                                                            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                                                <p class="t-justify"><?php echo $lang["actividad_fisica_trabajo_2"];?>
                                                                </p>
                                                            </div>

                                                            <div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
                                                                <label><?php echo $lang["actividad_fisica_dias"];?>:
                                                                    <input type="text" id="trabajo-2-sportsClub" name="trabajo-2-sportsClub" class="form-control" name="profesion-sportsClub" required>
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-2">
                                                            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                                                <p class="t-justify"><?php echo $lang["actividad_fisica_trabajo_3"];?>
                                                                </p>
                                                            </div>

                                                            <div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
                                                                <label><?php echo $lang["actividad_fisica_horas"];?>:
                                                                    <input type="text" id="trabajo-3-sportsClub" class="form-control" name="trabajo-3-sportsClub" required>
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-2">
                                                            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                                                <p class="t-justify"><?php echo $lang["actividad_fisica_trabajo_4"];?>
                                                                </p>
                                                            </div>

                                                            <div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
                                                                <select class="form-control" style="-webkit-appearance: none;-moz-appearance: none; color: #5c5c5c !important;" name="trabajo-4-sportsClub" required>
                                                                    <option value="" selected disabled><?php echo $lang["actividad_fisica_option1"];?></option>
                                                                    <option value="1"><?php echo $lang["actividad_fisica_option_si"];?></option>
                                                                    <option value="0"><?php echo $lang["actividad_fisica_option_no"];?></option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-2">
                                                            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                                                <p class="t-justify"><?php echo $lang["actividad_fisica_trabajo_5"];?>
                                                                </p>
                                                            </div>

                                                            <div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
                                                                <label><?php echo $lang["actividad_fisica_dias"];?>:
                                                                    <input type="text" id="trabajo-5-sportsClub" class="form-control" name="trabajo-5-sportsClub" required>
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-2">
                                                            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                                                <p class="t-justify"><?php echo $lang["actividad_fisica_trabajo_6"];?>
                                                                </p>
                                                            </div>

                                                            <div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
                                                                <label><?php echo $lang["actividad_fisica_horas"];?>:
                                                                    <input type="text" id="trabajo-6-sportsClub" class="form-control" name="trabajo-6-sportsClub" required>
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-2">
                                                            <div class="col-12">
                                                                <h4 class="section-title mt-0 mb-0">
                                                                    <span class="orange-text"><?php echo $lang["actividad_fisica_titulo_desplazarse"];?></span>
                                                                </h4>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-2">
                                                            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                                                <p class="t-justify"><?php echo $lang["actividad_fisica_desplazarse1"];?>
                                                                </p>
                                                            </div>

                                                            <div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
                                                                <select class="form-control" style="-webkit-appearance: none;-moz-appearance: none; color: #5c5c5c !important;" name="desplazarse-1-sportsClub"  required>
                                                                    <option value="" selected disabled><?php echo $lang["actividad_fisica_option1"];?></option>
                                                                    <option value="1"><?php echo $lang["actividad_fisica_option_si"];?></option>
                                                                    <option value="0"><?php echo $lang["actividad_fisica_option_no"];?></option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-2">
                                                            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                                                <p class="t-justify"><?php echo $lang["actividad_fisica_desplazarse2"];?>
                                                                </p>
                                                            </div>

                                                            <div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
                                                                <label><?php echo $lang["actividad_fisica_dias"];?>:
                                                                    <input type="text" id="desplazamiento-2-sportsClub" class="form-control" name="desplazamiento-2-sportsClub" required>
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-2">
                                                            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                                                <p class="t-justify"><?php echo $lang["actividad_fisica_desplazarse3"];?>
                                                                </p>
                                                            </div>

                                                            <div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
                                                                <label><?php echo $lang["actividad_fisica_horas"];?>:
                                                                    <input type="text" id="desplazamiento-3-sportsClub" class="form-control" name="desplazamiento-3-sportsClub" required>
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-2">
                                                            <div class="col-12">
                                                                <h4 class="section-title mt-0 mb-0">
                                                                    <span class="orange-text"><?php echo $lang["actividad_fisica_titulo_tiempo_libre"];?></span>
                                                                </h4>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-2">
                                                            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                                                <p class="t-justify"><?php echo $lang["actividad_fisica_tiempo_libre1"];?>
                                                                </p>
                                                            </div>

                                                            <div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
                                                                <select class="form-control" style="-webkit-appearance: none;-moz-appearance: none; color: #5c5c5c !important;" name="libre-1-sportsClub" required>
                                                                    <option value="" selected disabled><?php echo $lang["actividad_fisica_option1"];?></option>
                                                                    <option value="1"><?php echo $lang["actividad_fisica_option_si"];?></option>
                                                                    <option value="0"><?php echo $lang["actividad_fisica_option_no"];?></option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-2">
                                                            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                                                <p class="t-justify"><?php echo $lang["actividad_fisica_tiempo_libre2"];?>
                                                                </p>
                                                            </div>

                                                            <div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
                                                                <label><?php echo $lang["actividad_fisica_dias"];?>:
                                                                    <input type="text" id="libre-2-sportsClub" class="form-control" name="libre-2-sportsClub" required>
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-2">
                                                            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                                                <p class="t-justify"><?php echo $lang["actividad_fisica_tiempo_libre3"];?>
                                                                </p>
                                                            </div>

                                                            <div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
                                                                <label><?php echo $lang["actividad_fisica_horas"];?>:
                                                                    <input type="text" id="libre-3-sportsClub" class="form-control" name="libre-3-sportsClub" required>
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-2">
                                                            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                                                <p class="t-justify"><?php echo $lang["actividad_fisica_tiempo_libre4"];?>
                                                                </p>
                                                            </div>

                                                            <div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
                                                                <select class="form-control" style="-webkit-appearance: none;-moz-appearance: none; color: #5c5c5c !important;" name="libre-4-sportsClub" required>
                                                                    <option value="" selected disabled><?php echo $lang["actividad_fisica_option1"];?></option>
                                                                    <option value="1"><?php echo $lang["actividad_fisica_option_si"];?></option>
                                                                    <option value="0"><?php echo $lang["actividad_fisica_option_no"];?></option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-2">
                                                            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                                                <p class="t-justify"><?php echo $lang["actividad_fisica_tiempo_libre5"];?>
                                                                </p>
                                                            </div>

                                                            <div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
                                                                <label><?php echo $lang["actividad_fisica_dias"];?>:
                                                                    <input type="text" id="libre-5-sportsClub" class="form-control" name="libre-5-sportsClub" required>
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-2">
                                                            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                                                <p class="t-justify"><?php echo $lang["actividad_fisica_tiempo_libre6"];?>
                                                                </p>
                                                            </div>

                                                            <div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
                                                                <label><?php echo $lang["actividad_fisica_horas"];?>:
                                                                    <input type="text" id="libre-6-sportsClub" class="form-control" name="libre-6-sportsClub" required>
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-12 mt-2">
                                                                <div class="contact-info-wrap">    
                                                                    <h4 class="section-title mt-0 mb-0">
                                                                        <span class="orange-text"><?php echo $lang["actividad_fisica_titulo_sedentario"];?></span>
                                                                    </h4>
                                                                    <p class="t-justify"><?php echo $lang["actividad_fisica_texto_sedentario"];?>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-2">
                                                            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                                                <p class="t-justify"><?php echo $lang["actividad_fisica_sedentario1"];?>
                                                                </p>
                                                            </div>

                                                            <div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
                                                                <label><?php echo $lang["actividad_fisica_horas"];?>:
                                                                    <input type="text" id="sedentario-1-sportsClub" class="form-control" name="sedentario-1-sportsClub" required>
                                                                </label>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
										</div>
                                    </div>

                                    
									<!-- PARTE 3 -> PAGO -->
										<div class="row">
											<!-- Columna Izquierda (Soporte Técnico) -->
                                            <div class="col-12 col-md-3 col-lg-3 col-xl-3 mt-2">
                                                
                                                <div class="contact-info-wrap">
                                                    <h3 class="section-title mt-0 mb-0">
                                                        <span class="orange-text"><?php echo $lang["soporte_tecnico_titulo_contacto"];?></span>
                                                    </h3>
                                                    <p><?php echo $lang["soporte_tecnico_texto_contacto"];?></p>
                                                    <a href="tel:+34961215543" target="_blank" style="color: black; font-size: 1.3em;">
                                                        <i class="fa fa-phone" aria-hidden="true"></i> 961215543
                                                    </a>
                                                </div>
                                                
                                                
												<div class="contact-info-wrap t-center mt-2">
													<h3 class="section-title mt-0 mb-0 t-center">
														<span class="orange-text"><?php echo $lang["soporte_tecnico_titulo"];?></span>
													</h3>
													<p class="t-center">
														<strong><?php echo $lang["soporte_tecnico_texto"];?></strong>
													</p>
													<a href="https://wa.me/+34687717491" target="_blank" style="color: black; font-size: 1.3em;">
														<img src="img/wassap3.png" style="max-width: 50px;"><strong> WhatsApp 687717491</strong>
													</a>
												</div>
											</div>

											<!-- Columna Derecha (Domiciliación Bancaria) -->
											<div class="col-12 col-md-9 col-lg-9 col-xl-9 mt-2">
												<div class="row">
													<div class="col-12">
														<h3 class="section-title t-center mt-0 mb-1"><?php echo $lang["domiciliacion_titulo"];?>:</h3>
													</div>
                                                    
                                                    <div class="col-12 col-md-12 col-lg-12 col-xl-12 redimension">
														<div class="form-group">
															<label><?php echo $lang["domiciliacion_titular"];?>:
																<input  readonly type="text" class="form-control" name="titular-sportsClub" maxlength="100" required>
															</label>
														</div>
													</div>
                                                    
                                                    <div class="form-group col-12">
														<div class="row">
															<div class="col-12 col-md-2 col-lg-2 col-xl-2 redimension">
																<label for="iban-input"><?php echo $lang["domiciliacion_iban"];?></label>
																<input  readonly id="iban-input" type="text" class="form-control" value="ES" name="iban-sportsClub" maxlength="4" required>
															</div>

															<div class="col-12 col-md-2 col-lg-2 col-xl-2 redimension">
																<label for="entidad-input"><?php echo $lang["domiciliacion_entidad"];?></label>
																<input  readonly id="entidad-input" type="number" class="form-control" value="" name="entidad-sportsClub" onkeydown="limit4(this);" onkeyup="limit4(this);" required>
															</div>

															<div class="col-12 col-md-2 col-lg-2 col-xl-2 redimension">
																<label for="oficina-input"><?php echo $lang["domiciliacion_oficina"];?></label>
																<input  readonly id="oficina-input" type="number" class="form-control" value="" name="oficina-sportsClub" onkeydown="limit4(this);" onkeyup="limit4(this);" required>
															</div>

															<div class="col-12 col-md-2 col-lg-2 col-xl-2 redimension">
																<label for="dc-input"><?php echo $lang["domiciliacion_dc"];?></label>
																<input  readonly id="dc-input" type="number" class="form-control" value="" name="dc-sportsClub" onkeydown="limit2(this);" onkeyup="limit2(this);" required>
															</div>

															<div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
																<label for="cuenta"><?php echo $lang["domiciliacion_cuenta"];?>:</label>
																<input  readonly type="number" class="form-control" id="cuenta" name="cuenta-sportsClub" onkeydown="limit10(this);" onkeyup="limit10(this);" required>
																<script type="text/javascript">
																	function limit10(element){
																		var max_chars = 10;
																		if(element.value.length > max_chars) {
																			element.value = element.value.substr(0, max_chars);
																		}
																	}
																	function limit4(element){
																		var max_chars = 4;
																		if(element.value.length > max_chars) {
																			element.value = element.value.substr(0, max_chars);
																		}
																	}
																	function limit2(element){
																		var max_chars = 2;
																		if(element.value.length > max_chars) {
																			element.value = element.value.substr(0, max_chars);
																		}
																	}
																</script>
															</div>

															<div class="col-12 mt-1">
																<p class="t-left mt-0 mb-0">
                                                                    <strong><?php echo $lang["domiciliacion_texto_domiciliacion"];?></strong><br>
																</p>
                                                                <p class="t-left mt-0">
                                                                    <strong>** <?php echo $lang["patronato_punto3_ultimo_texto_pagos"];?></strong>
																</p>
															</div>
														</div>
													</div>
                                                    
                                                    <div class="col-12">
                                                        <p class="t-justify"><?php echo $lang["politicas_texto_ley_organica"];?></p>
                                                    </div>
                                                    
                                                    <div class="col-12 redimension">
                                                        
                                                        <label class="containerchekbox">
                                                            <input type="checkbox" name="autorizodatos" value="si" required>
                                                            <p><?php echo $lang["politicas_check_productos"];?></p>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                    
                                                    <div class="col-12 redimension">
                                                        <label class="containerchekbox">
                                                            <input type="checkbox" name="autorizoimagen" value="si" required> 
                                                            <p><?php echo $lang["politicas_check_imagenes"];?></p>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                    
                                                    <div class="col-12">
                                                        <p class="t-justify"><?php echo $lang["politicas_texto_cancelacion1"];?><?php echo $lang["enlace_cancelacion"];?><?php echo $lang["politicas_texto_cancelacion2"];?>
														</p>
                                                    </div>
                                                    
                                                    <div class="col-12 col-md-12 col-lg-12 col-xl-12 mb-1">
                                                        <button class="btn" style="width: 100%; margin-left: 0;" name="oficinas"  type="submit" id="btn-inscribirse-sportsClub">
                                                            <span><?php echo $lang["inscribirse"];?></span>
                                                        </button>
                                                        <input id="oficinas-button" type="hidden" value="0">
                                                    </div>
                                                    
                                                    <div id="sportsClubForm-mensaje-espera" style="display: none;" class="col-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                                        <div class="contact-info-wrap">
                                                            <h4 class="section-title mt-0 mb-0">
                                                                <span class="orange-text">Espere unos segundos mientras se realiza la inscripción</span>
                                                                <img src="img/loading.gif" style="width: 3%">
                                                            </h4>
                                                        </div>
                                                    </div>
                                                    
                                                    <!-- RESPUESTA -->
                                                    <div id="sportsClubForm-respuesta" class="col-12 col-md-12 col-lg-12 col-xl-12">
                                                    </div>
												</div>

											</div>
										</div>
								</form>
                                <!--<div class="col-12 col-md-12 col-lg-12 col-xl-12 mb-1">
                                    <button class="btn" style="width: 100%; margin-left: 0;" type="buttton" id="btn_imprimir_form">
                                        <span>Imprimir Form</span>
                                    </button>
                                </div>-->

							</div>
						</div>
					</div>
				</div>
			</section>

			<?php require ('includes/footer.php'); ?>
			<?php require ('includes/cookies.php'); ?>

		</div>

        
		<!-- Load Scripts Start -->
		<script src="js/libs.js"></script>
		<script src="js/common.js"></script>
		<script src="js/jquery.validate.min.js"></script> 
        <script src="js/html2canvas.min.js"></script> 

        
		<script type="text/javascript">
            
            //  Mostrar / Ocultar el <div> con el cuestionario / PARTE 1 
			$("#sportsClubFormCuestionarioVer").hide();

            //  Mostrar / Ocultar el <div> con el cuestionario / PARTE 2
			$("#btn-toggle-actividadFisica").on('click',function(){
				if( $("#sportsClubFormCuestionarioVer").is(':visible') ){
					$("#sportsClubFormCuestionarioVer").fadeOut("slow");
				}else{
					$("#sportsClubFormCuestionarioVer").fadeIn("slow");
				}	
			});

            //  Oculto por defecto los detalles de las franjas
            $(".franja1-container").hide();
            $(".franja2-container").hide();
            $(".franja3-container").hide();
            $(".franja4-container").hide();
            $(".franja5-container").hide();
            
            //  Muestro los detalles de una franja si se selecciona la franja principal 
            $(".mainFranja").on('click',function()
            {
                //  Cojo el name del franja y con él hago visibles detalles .franja1-container
				var nombre=$(this).attr('name');
                if( $(this).is(":checked") )
                {
                    $("."+nombre+"-container").show();
                }
                else
                {
                    $("."+nombre+"-container").hide();
                }
			});
           

            /*  Enviamos los datos para realizar la inscripción */
			$('#sportsClubForm').validate(
			{
				submitHandler: function()
				{
					$.ajax({
						type:       "POST",
						url:        "?r=sportsclub/inscripcion",
						data:       $('#sportsClubForm').serialize(),
						dataType:   "json",
						beforeSend: function()
                        {
					    	$("#btn-inscribirse-sportsClub").attr("disabled", true);
					    	$("#sportsClubForm-mensaje-espera").show();					    	
					   	},
						success: function(data)
                        {
                            if(data.response==="error")
                            {
                                //  Lo primero, quitamos el mensaje de espera y volvemos a quitar el disabled
                                $("#btn-inscribirse-sportsClub").attr("disabled", false);
                                $("#sportsClubForm-mensaje-espera").hide();	
                            
                                //  Mostramos la respuesta
                                $('#sportsClubForm-respuesta').html("<div class='alert alert-danger'><h4 class='section-title mt-0 mb-0'>" + data.message + "</h4></div>");
                                $("#sportsClubForm-respuesta").fadeTo(5000, 500).slideUp(500, function() {
                                    $("#sportsClubForm-respuesta").slideUp(500);
                                });
                            }
                            else
                            {
                                //  Lo primero, quitamos el mensaje de espera y volvemos a quitar el disabled
                                $("#btn-inscribirse-sportsClub").attr("disabled", false);
                                $("#sportsClubForm-mensaje-espera").hide();
                                
                                //  Mostramos la respuesta
                                $('#sportsClubForm-respuesta').html("<div class='alert alert-success'>" + data.message + "</div>");
                                $("#sportsClubForm-respuesta").fadeTo(4500, 500).slideUp(500, function () {
                                    $("#sportsClubForm-respuesta").slideUp(500);
                                });
                            }
						}
					});
				}
			});

            $("#btn_imprimir_form").on('click',function(){
                html2canvas(document.querySelector("#sportsClubForm")).then(canvas => {
                    document.body.appendChild(canvas)
                });
            });

            /*html2canvas(document.querySelector("#btn_imprimir_form")).then(canvas => {
                document.body.appendChild(canvas)
            });*/
            
		</script>
	</body>
</html>