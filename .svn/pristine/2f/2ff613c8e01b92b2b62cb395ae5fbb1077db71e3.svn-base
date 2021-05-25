<!DOCTYPE html>
<html lang="es">
	<?php
		ob_start();
		require('includes/head.php');
	?>
	<link href="https://fonts.googleapis.com/css?family=Krona+One" rel="stylesheet">
	<style>
		body {
			font-family: 'Krona One', sans-serif;
		}

		.cabecera {
			z-index: 30;
			position: fixed;
			top: 0;
			webkit-background-size: cover;
			background-size: cover;
			background-position: center top;
			background-image: url("img/cabecerapantallarecep.png");
			width: 100%;
			height: 150px;
		}

		.backgroundimage {
			margin-top: 150px;
			webkit-background-size: cover;
		    background-size: cover;
		    background-position: center top;
			background-image: url("img/pista.jpg");
			width: 100%;
			height: -moz-calc(100vh - 150px);
		    height: -webkit-calc(100vh - 150px);
		    height: calc(100vh - 150px);
		}

		table {
			width: 100%;
			font-size: 20px;
			line-height: 1.8;
		}

		td {
			padding: 1px !important;
		}

		td.reloj {
			width: 1.5%;
			color: #ff7e00;
			padding-top: 21px;
			padding-left: 2px;
			padding-right: 2px;
		}

		td.hora {
			width: 23.5%;
			text-align: left;
			white-space: nowrap;
			color: #333;
		}

		td.pista {
			color: #333333;
		}

		td.equipo {
			color: #406da4;
			float: right;
			font-family: 'Krona One', sans-serif;
		}
	</style>

	<body>
		<script src="js/jquery.js"></script>
		<?php
			$hoy = date("d/m/Y");
		?>

		<nav class="navbar navbar-default cabecera ">
		</nav>

		<div class="container-fluid backgroundimage">
			<div class="row">
				<div class="col-12 t-center">
					<h4 class="mt-2 mb-1" style="color: #ff7e00;">
						<strong><?php echo $hoy;?></strong>
					</h4>

					<table>
					    <tbody>
							<!-- PAGINACIÓN -->
							<?php
								$imagen2 = 0; //para las imagenes que se muestran despues de la paginacion

								$num_total_registros = count($datos['partidos']);
								//echo $num_total_registros;
								$TAMANO_PAGINA = 14;

								if (isset($_GET['screen'])) { 
									$p = $_GET['screen']; 
								}
								else { 
									$p = 1; 
								}

								$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);

								paginar($datos['partidos'], $TAMANO_PAGINA, $p);

								function paginar($v, $l, $p) {
									$datehour = date('H:i:s');

									$paginas = ceil(count($v) / $l);
									$inicio = ($p-1)*$l; 
									$final = $p*$l; 

									for ($i = $inicio; $i < $final; $i++) {
										if (isset($v[$i])) {
											$partido = $v[$i]; 

											if (/*$partido['puntuado'] != 1 && */ $partido['hora_fin'] > $datehour) {
												$tipo = "";

												if ($partido['es_partido'] == 0) {
													$tipo = "(".$partido['tipo'].")";
												}
												else {
													$tipo = "(P)";
												}
							?>
												<tr>
													<td class="reloj">
														<i class="fa fa-clock-o" aria-hidden="true"></i>
													</td>	
													<td class="hora">
														<strong>
															<span><?php echo $partido['hora_ini']."/".$partido['hora_fin'];?></span>
															<span style="color: #ff7e00;"><?php echo $tipo;?></span>
															<span style="color: #ff7e00;"><?php echo $partido['pista'];?></span>
														</strong>
													</td>	
													<td class="equipo">
														<strong><?php echo utf8_encode($partido['equipo_local']);?></strong>
													</td>
													<td class="pista">
														<strong>(Vest: <?php echo $partido['vestuario_local'];?>)</strong>
													</td>
													<td class="equipo">
														<strong><?php echo utf8_encode($partido['equipo_visit']);?></strong>
													</td>
													<td class="pista">
														<strong>
															<?php
																if ($partido['vestuario_visit'] != "") {
															?>
																	(Vest: <?php echo $partido['vestuario_visit'];?>)
															<?php
																}
															?>
														</strong>
													</td>
												</tr>
										<?php
											}
											else if (/*$partido['puntuado'] == 1 &&*/ $partido['hora_fin'] < $datehour) {
										?>
												<tr>
													<td class="reloj">
														<i class="fa fa-clock-o" aria-hidden="true"></i>
													</td>
													<td class="hora">
														<strong>
															<span><?php echo $partido['hora_ini']."/".$partido['hora_fin'];?></span>
															<span style="color: #ff7e00;"><?php echo $tipo;?></span>
															<span style="color: #ff7e00;"><?php echo $partido['pista'];?></span>
														</strong>
													</td>
													<td class="equipo">
														<strong>
															<?php echo utf8_encode($partido['equipo_local']);?>
														</strong>
													</td>
													<td class="pista">
														<strong>(Vest: <?php echo $partido['vestuario_local'];?>)</strong>
													</td>
													<td class="equipo">
														<strong><?php echo utf8_encode($partido['equipo_visit']);?></strong>
													</td>
													<td class="pista">
														<strong>
															<?php
																if ($partido['vestuario_visit'] != "") {
															?>
																	(Vest: <?php echo $partido['vestuario_visit'];?>)
															<?php
																}
															?>
														</strong>
													</td>
												</tr>
										<?php
											}
										}
									} // fin for
									return;
								}  //fin Function

								if (!isset($_GET['screen'])) {
									$screen = 1;
								}
								else {
									$screen = $_GET['screen'];
								}

								if ($screen == 3) {
                                    header("refresh:11; url='?r=index/PantallaRecepcion'");?>
                                    <div id="player"></div>

                                    <script>
                                        // 2. This code loads the IFrame Player API code asynchronously.
                                        var tag = document.createElement('script');

                                        tag.src = "https://www.youtube.com/iframe_api";
                                        var firstScriptTag = document.getElementsByTagName('script')[0];
                                        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

                                        // 3. This function creates an <iframe> (and YouTube player)
                                        //    after the API code downloads.
                                        var player;
                                        function onYouTubeIframeAPIReady() {
                                            player = new YT.Player('player', {
                                                height: '638px',
                                                width: '60%',
                                                videoId: 'W-W26aeq2UA',
                                                playerVars: {
                                                    'autoplay': 1,
                                                    'loop': 1,
                                                    'mute': 1
                                                },
                                                events: {
                                                    'onReady': onPlayerReady,
                                                    'onStateChange': onPlayerStateChange,
                                                }
                                            });
                                        }

                                        // 4. The API will call this function when the video player is ready.
                                        function onPlayerReady(event) {
                                            event.target.playVideo();
                                        }

                                        // 5. The API calls this function when the player's state changes.
                                        //    The function indicates that when playing a video (state=1),
                                        //    the player should play for six seconds and then stop.
                                        var done = false;
                                        function onPlayerStateChange(event) {
                                            if (event.data == YT.PlayerState.PLAYING && !done) {
                                                setTimeout(stopVideo, 10000);
                                                done = true;
                                            }
                                        }
                                        function stopVideo() {
                                            player.stopVideo();
                                        }
                                    </script>
                                <?php } else {
                                    //Screen != 3
                                    if (!isset($_GET['img'])) {
                                        //Screen 1
                                        $imagen2 = 0; //para las imagenes que se muestran despues de la paginacion
                                        header("refresh:10; url='?r=index/PantallaRecepcion&screen=2&img=0'");
                                    }
                                    else {
                                        //Screen 2
                                        $imagen2 = $_GET['img'];
                                        header("refresh:10; url='?r=index/PantallaRecepcion&screen=3'");
                                    }


                                    if ($screen > $total_paginas && $imagen2 == 0) {
                                        echo "<img src='img/pantalla-recepcion-1.png' style='width:60%;top:0px;left:0px;'>";
                                        //SI SOLO SE MUESTRA UNA IMAGEN CAMBIAR LA LINEA COMENTADA DEL header
                                        //header("refresh:15; url='?r=index/PantallaRecepcion'");
                                        //header("refresh:15; url='?r=index/PantallaRecepcion&screen=$screen&img=1'");
                                    }

                                    elseif ($screen > $total_paginas && $imagen2 == 1) {
                                        echo "<img src='img/pantalla-recepcion-2.jpg' style='width:80%;top:0px;left:0px;'>";
                                        //header("refresh:15; url='?r=index/PantallaRecepcion'");
                                    }
                                }
							?>
							<!-- PAGINACION -->
						</tbody>
					</table>
				</div>
			</div>
		</div>

	<?php
		ob_end_flush();
	?>
	</body>
    <script>
        $(document).ready(function() {
            $("#video")[0].src += "?autoplay=1";
        });

    </script>
</html>