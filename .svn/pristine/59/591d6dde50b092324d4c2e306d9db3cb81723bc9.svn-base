<!DOCTYPE html>
<html lang="es">
	<?php require('includes/head.php'); ?>
	<link rel="stylesheet" href="css/forms.css">
	<link rel="stylesheet" href="css/parallax.css">
	<link rel="stylesheet" href="css/formus.css">

	<style>
		#capa1, #capa2 {
			display: none;
		}

		.add-player {
			display: inline-block;
			padding: 12px 15px;
			font-size: 19px;
			cursor: pointer;
			text-align: center;
			text-decoration: none;
			outline: none;
			color: #fff;
			background-color: #eb7c00;
			border: none;
			border-radius: 4px;
			box-shadow: 0 9px #bababa;
			-webkit-transition-duration: 0.3s;
			transition-duration: 0.3s;
			width: 100%;
		}

		.add-player:hover {
			background-color: #f9b719;
		}

		.add-player:active {
			background-color: #f9b719;
			box-shadow: 0 5px #999;
			transform: translateY(4px);
		}

		input {
			text-transform: uppercase;
		}
	</style>

	<body class="Pages" id="formus">
		<?php require('includes/header.php'); ?>

		<!-- Start Page-Content -->
		<section id="page-content" class="overflow-x-hidden margin-top-header">

			<div class="block">
				<div class="container-fluid">
					<div class="row">
						<div class="parallax col-12" style="background-image: url('img/cabecera-liga-alqueria.jpg');">
						</div>
					</div>
				</div>
			</div>

			<div class="block background-f6">
				<div class="container">
					<div class="row">
                        <div class="col-12 col-md-5 col-lg-5 col-xl-5 t-left" id="escudo">
                        	<div class="row">
                        		<div class="col-12 mt-1">
	                            	<img class="img-responsive" src="img/liga-baloncesto-alqueria-del-basket.png" alt="Logo Liga de L´Alqueria del Basket">
	                            </div>

                                <?php if ($datos['datosFormularios'][0]['liga_senior'] == 1) {?>
                                    <div class="col-12">
                                        <h2 class="section-title mt-1 mb-0 t-left" style="font-size: 2em;">
                                            <span class="orange-text"><?php echo $lang["liga_titulo"];?></span>
                                        </h2>
                                    </div>
                                <?php } else { ?>

                                    <div class="alert alert-danger col-12" role="alert">
                                        Las inscripciones estan desactivadas.
                                    </div>
                                <?php }?>

	                        </div>
                        </div>
                        <?php if ($datos['datosFormularios'][0]['liga_senior'] == 1) {?>
                            <div class="col-12 col-md-7 col-lg-7 col-xl-7 mt-2">
                            <div class="contact-info-wrap t-center" style="background: none; background-color: #f1f2f5;"> 
                                <div class="row pl-1 pr-1">
                                    <div class="col-12 mt-1">
                                        <table width="100%" class="table">
                                            <tbody><tr class="t-left">
                                                <td>
                                                	<strong><?php echo $lang["liga_comienzo_titulo"];?></strong>
                                                </td>
                                                <td>
                                                    <?php echo $lang["liga_comienzo_texto"];?>
                                                </td>
                                            </tr>
                                            <tr class="t-left">
                                                <td>
                                                	<strong><?php echo $lang["liga_dias_partidos_titulo"];?></strong>
                                                </td>
                                                <td>
                                                    <?php echo $lang["liga_dias_partidos_texto"];?>
                                                </td>
                                            </tr>
                                            <tr class="t-left">
                                                <td>
                                                	<strong><?php echo $lang["liga_inscripcion_fianza_titulo"];?></strong>
                                                </td>
                                                <td>
                                                    100€ + 100€
                                                </td>
                                            </tr>
                                            <tr class="t-left">
                                                <td>
                                                	<strong><?php echo $lang["liga_cuotas_titulo"];?></strong>
                                                </td>
                                                <td>
                                                    <?php echo $lang["liga_cuotas_texto"];?>
                                                </td>
                                            </tr>                                                
                                        </tbody></table>
                                    </div>

                                    <div class="col-12">
										<p class="t-justify">
											<?php echo $lang["liga_descripcion_1"];?>
										</p>
                                    	<p class="t-justify" style="font-size: 15px;">
											<?php echo $lang["liga_descripcion_2"];?>
										</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                    </div>

                    <?php if ($datos['datosFormularios'][0]['liga_senior'] == 1) {?>
                        <div class="row">
                            <!-- COL -->
                            <div class="col-12">
                                <div class="formulario_liga_alqueria">
                                    <form id="liga-alqueria-form" class="boxed-form" method="post">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h4 class="section-title"><?php echo $lang["liga_responsable_titulo"];?></h4>
                                                </div>

                                                <div class="col-12 col-md-8 col-lg-8 col-xl-8 redimension">
                                                    <label><?php echo $lang["formulario_nombre_apellidos"];?>
                                                        <input type="text" class="form-control" id="responsable_nombre" name="responsable_nombre" maxlength="90" required>
                                                    </label>
                                                </div>

                                                <div class="col-12 col-md-4 col-lg-4 col-xl-4">
                                                    <label><?php echo $lang["formulario_telefono"];?>
                                                        <input type="number" class="form-control" id="responsable_telefono" name="responsable_telefono" min="100000000" max="999999999" required>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-12 col-md-6 col-lg-6 col-xl-6 redimension">
                                                    <label><?php echo $lang["formulario_correo"];?>
                                                        <input type="email" class="form-control" id="responsable_email" name="responsable_email" maxlength="100" required>
                                                    </label>
                                                </div>

                                                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                                    <label><?php echo $lang["formulario_dni"];?>
                                                        <input type="text" class="form-control" id="responsable_dni" name="responsable_dni" maxlength="10" required>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h4 class="section-title"><?php echo $lang["liga_equipo_titulo"];?></h4>
                                                </div>

                                                <div class="col-12 col-md-6 col-lg-6 col-xl-6 redimension">
                                                    <label><?php echo $lang["licencia_nombre_equipo"];?>
                                                        <input type="text" class="form-control" id="nombre_equipo"
                                                               name="nombre_equipo" maxlength="20" required>
                                                    </label>
                                                </div>

                                                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                                    <label><?php echo $lang["formulario_categoria"];?>
                                                        <select class="form-control" id="categoria_equipo" name="categoria_equipo" maxlength="20" required>
                                                            <option value=""><?php echo $lang["liga_equipo_categoria_seleccionar"];?></option>
                                                            <option value="MASCULINO"><?php echo $lang["formulario_genero_masculino"];?></option>
                                                            <option value="FEMENINO"><?php echo $lang["formulario_genero_femenino"];?></option>
                                                        </select>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-12 col-md-6 col-lg-6 col-xl-6 redimension">
                                                    <label><?php echo $lang["liga_equipo_color_1"];?>
                                                        <input type="text" class="form-control" id="color_equip_princ" name="color_equip_princ" maxlength="20" required>
                                                    </label>
                                                </div>

                                                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                                    <label><?php echo $lang["liga_equipo_color_2"];?>
                                                        <input type="text" class="form-control" id="color_equip_secun" name="color_equip_secun" maxlength="20" required>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h4 class="section-title"><?php echo $lang["liga_hora_partido_titulo"];?></h4>
                                                </div>

                                                <?php
                                                /*<div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 redimension">
                                                    <label>Día del partido:
                                                        <input type="text" class="form-control" id="dia_partido" name="dia_partido" maxlength="90" value="Domingo" disabled>
                                                    </label>
                                                </div>*/
                                                ?>

                                                <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 redimension">
                                                    <label><?php echo $lang["liga_dia_partido"];?>
                                                        <select class="form-control" id="dia_partido" name="dia_partido" maxlength="20" required>
                                                            <option value=""><?php echo $lang["liga_dia_partido_seleccionar"];?></option>
                                                            <option value="Sabado"><?php echo $lang["sabado"];?></option>
                                                            <option value="Domingo"><?php echo $lang["domingo"];?></option>
                                                        </select>
                                                    </label>
                                                </div>

                                                <div class="col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9 mt-3 mb-1" id="capa1" style="font-size: 14px;">
                                                    <label class="radio-inline pr-1">
                                                        <input type="radio" id="hora_juego_18" name="hora_juego" value="18" required> 18:00h
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" id="hora_juego_20" name="hora_juego" value="20"> 20:00h
                                                    </label>
                                                </div>

                                                <div class="col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9 mt-3 mb-1" id="capa2" style="font-size: 14px;">
                                                    <label class="radio-inline pr-1">
                                                        <input type="radio" id="hora_juego_12" name="hora_juego" value="12" required> 12:00h
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" id="hora_juego_16" name="hora_juego" value="16"> 16:00h
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" id="hora_juego_17" name="hora_juego" value="17"> 17:00h
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" id="hora_juego_18" name="hora_juego" value="18"> 18:00h
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" id="hora_juego_19" name="hora_juego" value="19"> 19:00h
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" id="hora_juego_20" name="hora_juego" value="20"> 20:00h
                                                    </label>
                                                </div>

                                                <script>
                                                    $('#dia_partido').on("change", function() {
                                                        console.log(this.value);
                                                        if (this.value === "Sabado") {
                                                            $('#capa1').fadeIn(150);
                                                            $('#capa2').hide();
                                                        } else if(this.value === "Domingo") {
                                                            $('#capa2').fadeIn(150);
                                                            $('#capa1').hide();
                                                        } else {
                                                            $('#capa2').hide();
                                                            $('#capa1').hide();
                                                        }

                                                    });
                                                </script>

                                                <?php
                                                /*<div class="col-3 col-sm-3 col-md-2 col-lg-2 col-xl-1 mt-2 mb-1 t-left" style="font-size: 1.1em;">
                                                    <label class="control control--radio">
                                                        <strong>16:00h</strong>
                                                        <input type="radio" id="hora_juego_16" name="hora_juego" value="16" checked>
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>

                                                <div class="col-3 col-sm-3 col-md-2 col-lg-2 col-xl-1 mt-2 mb-1 t-left" style="font-size: 1.1em;">
                                                    <label class="control control--radio">
                                                        <strong>18:00h</strong>
                                                        <input type="radio" id="hora_juego_18" name="hora_juego" value="18">
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>

                                                <div class="col-3 col-sm-3 col-md-2 col-lg-2 col-xl-1 mt-2 mb-1 t-left" style="font-size: 1.1em;">
                                                    <label class="control control--radio">
                                                        <strong>20:00h</strong>
                                                        <input type="radio" id="hora_juego_20" name="hora_juego" value="20">
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>*/
                                                ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h4 class="section-title"><?php echo $lang["liga_jugadores_titulo"];?></h4>
                                                </div>
                                            </div>

                                            <?php
                                            $default_display = "";
                                            $required = " required";
                                            for ($contador_jugadores = 1; $contador_jugadores < 17; $contador_jugadores++) {
                                                ?>
                                                <div id="jugador<?php echo $contador_jugadores; ?>" class="row jugador mb-3" style="<?php echo $default_display; ?>">
                                                    <div class="col-12 col-md-3 col-lg-3 col-xl-3 redimension">
                                                        <label><?php echo $lang["liga_jugador_nombre_completo"];?> <input type="text" class="form-control" id="nombre_jugador<?php echo $contador_jugadores; ?>" name="nombre_jugador<?php echo $contador_jugadores; ?>" maxlength="90" <?php echo $required; ?>></label>
                                                    </div>
                                                    <div class="col-12 col-md-3 col-lg-3 col-xl-3 redimension">
                                                        <label><?php echo $lang["liga_jugador_dni"];?> <input type="text" class="form-control" id="dni_jugador<?php echo $contador_jugadores; ?>" name="dni_jugador<?php echo $contador_jugadores; ?>" maxlength="10" <?php echo $required; ?>></label>
                                                    </div>
                                                    <div class="col-12 col-md-3 col-lg-3 col-xl-3 redimension">
                                                        <label><?php echo $lang["liga_jugador_telefono"];?> <input type="number" class="form-control" id="telefono_jugador<?php echo $contador_jugadores; ?>" name="telefono_jugador<?php echo $contador_jugadores; ?>" min="100000000" max="999999999"></label>
                                                    </div>
                                                    <div class="col-12 col-md-3 col-lg-3 col-xl-3 redimension">
                                                        <label><?php echo $lang["liga_jugador_email"];?> <input type="email" class="form-control" id="email_jugador<?php echo $contador_jugadores; ?>" name="email_jugador<?php echo $contador_jugadores; ?>" maxlength="100"></label>
                                                    </div>
                                                </div>
                                                <?php
                                                if ($contador_jugadores == 8) {
                                                    $default_display = "display:none;";
                                                }
                                                if ($contador_jugadores == 8) {
                                                    $required = "";
                                                }
                                            }
                                            ?>

                                            <div class="row">
                                                <div class="col-12 col-md-3 col-lg-3 col-xl-3 mt-1 mb-1">
                                                    <button class="add-player" style="vertical-align:middle" type="button">
                                                        <span><?php echo $lang["liga_jugador_nuevo"];?> </span>
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <p class="t-left" style="color: red;">
                                                        <strong><?php echo $lang["formulario_aviso_email"];?></strong>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- PARTE 3 -->
                                        <div class="row">
                                            <div class="col-12">
                                                <h3 class="section-title t-left mb-0">
                                                    <span class="orange-text"><?php echo $lang["liga_pago_inscripcion_titulo"];?></span>
                                                </h3>
                                            </div>

                                            <div class="col-12">
                                                <h4><?php echo $lang["liga_pago_inscripcion_texto_1"];?></h4>
                                                <h4 class="mt-1 mb-0">
                                                    <?php echo $lang["liga_pago_inscripcion_texto_2"];?>
                                                </h4>
                                            </div>

                                            <div class="col-12">
                                                <p class="t-left" style="color: red;">
                                                    <strong>
                                                        <?php echo $lang["liga_pago_inscripcion_texto_3"];?>
                                                    </strong>
                                                </p>
                                            </div>

                                            <div class="col-12 mt-1 mb-2 form-group">
                                                <input type="file" id="justificante_pago" class="form-control" style="border: none !important; padding: 0 !important;" aria-describedby="fileHelp" accept="image/jpeg,image/jpg,image/png,application/pdf">
                                            </div>

                                            <div class="col-12">
                                                <h3 class="section-title t-left mb-0">
                                                    <span class="orange-text"><?php echo $lang["liga_pago_cuotas_titulo"];?></span>
                                                </h3>
                                            </div>

                                            <div class="col-12">
                                                <h4><?php echo $lang["liga_pago_cuotas_texto"];?>
                                                </h4>
                                            </div>
                                        </div>


                                        <!-- PARTE 3 -->
                                        <div class="row">
                                            <div class="col-12">
                                                <h3 class="section-title mb-0">
                                                    <span class="orange-text"><?php echo $lang["politicas_titulo_privacidad"];?></span>
                                                </h3>
                                                <h4 class="section-title mb-0"><?php echo $lang["politicas_subtitulo_privacidad"];?></h4>
                                            </div>

                                            <div class="col-12">
                                                <p>
                                                    <?php echo $lang["liga_politicas_texto_ley_organica"];?>
                                                </p>
                                                <label class="containerchekbox">
                                                    <p>
                                                        <input id="autorizodatos" type="checkbox" name="autorizodatos" value="si" required>
                                                        <span class="checkmark"></span>
                                                        <?php echo $lang["liga_politicas_check_datos"];?>
                                                    </p>
                                                </label>
                                                <label class="containerchekbox">
                                                    <p>
                                                        <input id="autorizoimagen" type="checkbox" name="autorizoimagen" value="si" required>
                                                        <span class="checkmark"></span>
                                                        <?php echo $lang["liga_politicas_check_imagen"];?>
                                                    </p>
                                                </label>

                                                <p>
                                                    <?php echo $lang["politicas_texto_cancelacion1"];?> <a href="https://www.alqueriadelbasket.com/?r=index/politicacancelacion&idioma=<?php echo $_SESSION['idioma'];?>" target="_blank" style="font-weight: bold; color: #eb7c00;"><?php echo $lang["enlace_cancelacion"];?></a> <?php echo $lang["politicas_texto_cancelacion2"];?>
                                                </p>

                                                <p>
                                                    <?php echo $lang["politicas_ampliacion_info"];?> <a href="https://www.valenciabasket.com/" target="_blank" style="color: #eb7c00; font-weight: 600;">www.valenciabasket.com</a>
                                                </p>
                                            </div>

                                            <div class="col-12 mt-1">
                                                <label class="containerchekbox">
                                                    <input type="checkbox" name="autorizo" value="si" required>
                                                    <p><?php echo $lang["liga_politicas_check_condiciones"];?></p>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                            <input type="hidden" id="oficinasotpv" name="oficinasotpv" value="">

                                            <div class="col-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                                                <button type="submit" class="btn btn-link-w w-100" style="width: 100%; margin-left: 0;"
                                                        id="oficina" name="enviar" value="oficina">
                                                    <span><?php echo $lang["boton_oficinas"];?></span>
                                                </button>
                                            </div>

                                            <div class="col-12 col-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                                                <button type="submit" class="btn btn-link-w w-100" style="width: 100%; margin-left: 0;"
                                                        id="tarjeta" name="enviar" value="tarjeta">
                                                    <span><?php echo $lang["boton_tarjetas"];?></span>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div id="liga-alqueria-form-respuesta" class="col-12 col-md-12 col-lg-12 col-xl-12 mb-2"></div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- /COL -->
                        </div>
                    <?php }?>
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
			//  Mostamos componente para un nuevo jugador 
			$('body').on('click', '.add-player', function ()
			{
				var contadorjugadores = 9;

				if ($("#jugador" + (contadorjugadores)).css('display') === 'none')                    //  9   
				{
					$("#jugador" + (contadorjugadores)).show();
				} else if ($("#jugador" + (contadorjugadores + 1)).css('display') === 'none')             //  10  
				{
					$("#jugador" + (contadorjugadores + 1)).show();
				} else if ($("#jugador" + (contadorjugadores + 2)).css('display') === 'none')             //  11  
				{
					$("#jugador" + (contadorjugadores + 2)).show();
				} else if ($("#jugador" + (contadorjugadores + 3)).css('display') === 'none')             //  12  
				{
					$("#jugador" + (contadorjugadores + 3)).show();
				} else if ($("#jugador" + (contadorjugadores + 4)).css('display') === 'none')             //  13  
				{
					$("#jugador" + (contadorjugadores + 4)).show();
				} else if ($("#jugador" + (contadorjugadores + 5)).css('display') === 'none')             //  14  
				{
					$("#jugador" + (contadorjugadores + 5)).show();
				} else if ($("#jugador" + (contadorjugadores + 6)).css('display') === 'none')             //  15  
				{
					$("#jugador" + (contadorjugadores + 6)).show();
				} else if ($("#jugador" + (contadorjugadores + 7)).css('display') === 'none')             //  16  
				{
					$("#jugador" + (contadorjugadores + 7)).show();
					$(".add-player").hide();
				}
			});

			$("#oficina").on('click', function () {
				$("#oficinasotpv").attr('value', 'OFICINAS');
			});

			$("#tarjeta").on('click', function () {
				$("#oficinasotpv").attr('value', 'TPV');
			});

			//  Gestiona el envío del formulario 
			$('#liga-alqueria-form').validate(
			{
                submitHandler: function()
                {
                    //$("#tarjeta").prop("disabled",true);
                    //$("#oficinas").prop("disabled",true);
                                
					var formData = new FormData();
					formData.append("debug", "false");
					formData.append('responsable_nombre',   $('#responsable_nombre').val());
					formData.append('responsable_telefono', $('#responsable_telefono').val());
					formData.append('responsable_email',    $('#responsable_email').val());
					formData.append('responsable_dni',      $('#responsable_dni').val());
					formData.append('nombre_equipo',        $('#nombre_equipo').val());
					formData.append('categoria_equipo',     $('#categoria_equipo').val());
					formData.append('color_equip_princ',    $('#color_equip_princ').val());
					formData.append('color_equip_secun',    $('#color_equip_secun').val());
					formData.append('dia_partido',          $('#dia_partido').val());
					formData.append('hora_juego',           $('input:radio[name=hora_juego]:checked').val());
					
					formData.append('nombre_jugador1',   $('#nombre_jugador1').val());
					formData.append('dni_jugador1',      $('#dni_jugador1').val());
					formData.append('telefono_jugador1', $('#telefono_jugador1').val());
					formData.append('email_jugador1',    $('#email_jugador1').val());
					
					formData.append('nombre_jugador2',   $('#nombre_jugador2').val());
					formData.append('dni_jugador2',      $('#dni_jugador2').val());
					formData.append('telefono_jugador2', $('#telefono_jugador2').val());
					formData.append('email_jugador2',    $('#email_jugador2').val());
					
					formData.append('nombre_jugador3',   $('#nombre_jugador3').val());
					formData.append('dni_jugador3',      $('#dni_jugador3').val());
					formData.append('telefono_jugador3', $('#telefono_jugador3').val());
					formData.append('email_jugador3',    $('#email_jugador3').val());
					
					formData.append('nombre_jugador4',   $('#nombre_jugador4').val());
					formData.append('dni_jugador4',      $('#dni_jugador4').val());
					formData.append('telefono_jugador4', $('#telefono_jugador4').val());
					formData.append('email_jugador4',    $('#email_jugador4').val());
					
					formData.append('nombre_jugador5',   $('#nombre_jugador5').val());
					formData.append('dni_jugador5',      $('#dni_jugador5').val());
					formData.append('telefono_jugador5', $('#telefono_jugador5').val());
					formData.append('email_jugador5',    $('#email_jugador5').val());
					
					formData.append('nombre_jugador6',   $('#nombre_jugador6').val());
					formData.append('dni_jugador6',      $('#dni_jugador6').val());
					formData.append('telefono_jugador6', $('#telefono_jugador6').val());
					formData.append('email_jugador6',    $('#email_jugador6').val());
					
					formData.append('nombre_jugador7',   $('#nombre_jugador7').val());
					formData.append('dni_jugador7',      $('#dni_jugador7').val());
					formData.append('telefono_jugador7', $('#telefono_jugador7').val());
					formData.append('email_jugador7',    $('#email_jugador7').val());
					
					formData.append('nombre_jugador8',   $('#nombre_jugador8').val());
					formData.append('dni_jugador8',      $('#dni_jugador8').val());
					formData.append('telefono_jugador8', $('#telefono_jugador8').val());
					formData.append('email_jugador8',    $('#email_jugador8').val());
					
					formData.append('nombre_jugador9',      $('#nombre_jugador9').val());
					formData.append('dni_jugador9',         $('#dni_jugador9').val());
					formData.append('telefono_jugador9',    $('#telefono_jugador9').val());
					formData.append('email_jugador9',       $('#email_jugador9').val());
					
					formData.append('nombre_jugador10',     $('#nombre_jugador10').val());
					formData.append('dni_jugador10',        $('#dni_jugador10').val());
					formData.append('telefono_jugador10',   $('#telefono_jugador10').val());
					formData.append('email_jugador10',      $('#email_jugador10').val());
					
					formData.append('nombre_jugador11',     $('#nombre_jugador11').val());
					formData.append('dni_jugador11',        $('#dni_jugador11').val());
					formData.append('telefono_jugador11',   $('#telefono_jugador11').val());
					formData.append('email_jugador11',      $('#email_jugador11').val());
					
					formData.append('nombre_jugador12',     $('#nombre_jugador12').val());
					formData.append('dni_jugador12',        $('#dni_jugador12').val());
					formData.append('telefono_jugador12',   $('#telefono_jugador12').val());
					formData.append('email_jugador12',      $('#email_jugador12').val());
					
					formData.append('nombre_jugador13',     $('#nombre_jugador13').val());
					formData.append('dni_jugador13',        $('#dni_jugador13').val());
					formData.append('telefono_jugador13',   $('#telefono_jugador13').val());
					formData.append('email_jugador13',      $('#email_jugador13').val());
					
					formData.append('nombre_jugador14',     $('#nombre_jugador14').val());
					formData.append('dni_jugador14',        $('#dni_jugador14').val());
					formData.append('telefono_jugador14',   $('#telefono_jugador14').val());
					formData.append('email_jugador14',      $('#email_jugador14').val());
					
					formData.append('nombre_jugador15',     $('#nombre_jugador15').val());
					formData.append('dni_jugador15',        $('#dni_jugador15').val());
					formData.append('telefono_jugador15',   $('#telefono_jugador15').val());
					formData.append('email_jugador15',      $('#email_jugador15').val());
					
					formData.append('nombre_jugador16',     $('#nombre_jugador16').val());
					formData.append('dni_jugador16',        $('#dni_jugador16').val());
					formData.append('telefono_jugador16',   $('#telefono_jugador16').val());
					formData.append('email_jugador16',      $('#email_jugador16').val());
					
					formData.append('justificante_pago',    $('#justificante_pago')[0].files[0]);
					formData.append('oficinasotpv',         $('#oficinasotpv').val());

                    formData.append('autorizodatos',        $('#autorizodatos').is(":checked"));
                    formData.append('autorizoimagen',       $('#autorizoimagen').is(":checked"));
                                        
					$.ajax({
                        type:       "POST",
                        url:        "?r=formularios/LigaAlqueriaForm",
                        data:       formData,
                        dataType:   "json",
                        beforeSend: function ()
                        {   
                            $("#liga-alqueria-form-respuesta").html("<div class='alert alert-info pt-1 pb-1 mb-0'>Enviando la inscripción. Espere unos segundos para ir al pago online.</div>");
                        },
                        processData: false,     // tell jQuery not to process the data
                        contentType: false,     // tell jQuery not to set contentType
                        success: function(data)
                        {
                            //console.log(data);
                            //alert("stop");
                            if (data["response"] === "success") 
                            {
                                if(data['url_redireccion']!=="")
                                {
                                    //  Si estamos aqui, se hizo por TPV
                                    //  window.location.href = data['url_redireccion'];

                                    window.location.replace("https://servicios.alqueriadelbasket.com/"+data['url_redireccion']);
                                }
                                else
                                {
                                    //alert("ELSE");
                                    // window.location.href = "index.php?r=formularios/LigaAlqueriaFormPagoOficinasOK";
                                }
                            } 
                            else 
                            {
                                $("#liga-alqueria-form-respuesta").html("<div class='alert alert-danger'>" + data.message + "</div>");
                                $("#liga-alqueria-form-respuesta").fadeTo(4500, 500).slideUp(500, function () {
                                    $("#liga-alqueria-form-respuesta").slideUp(500);
                                });
                            }
                        }
                    });

					return false;
				}
			});
		</script>
	</body>
</html>