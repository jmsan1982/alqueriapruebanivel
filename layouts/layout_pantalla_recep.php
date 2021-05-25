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

								if (!isset($_GET['img'])) {
									
									$imagen2=0; //para las imagenes que se muestran despues de la paginacion
								}
								else {
									$imagen2 = $_GET['img'];
								}
								//echo $screen ."pag: " .$total_paginas. " img: ".$imagen2;

								if ($screen < $total_paginas) {
									$screen = $screen+1;
									header("refresh:20; url='?r=index/PantallaRecepcion&screen=$screen&img=0'");
									//header("refresh:5; url='?r=index/PantallaRecepcion&screen=$screen'");
								}
								elseif ($screen == $total_paginas) {
									
									/* COMENTAR LA SIGUIENTE LINEA PARA QUE NO APAREZCA LA IMGEN DEL ACTO DE BULLYING   */
									/* cortar y pegar aqui dentro la linea  197 */
									//echo "<img src='img/pantalla-recepcion-0.jpg' style='width:100%;position:fixed;top:0px;left:0px;'>";
									$screen = $screen+1;

									//header("refresh:20; url='?r=index/PantallaRecepcion'");
									header("refresh:20; url='?r=index/PantallaRecepcion&screen=$screen&img=0'");

									/*echo "<img src='img/pantalla-recepcion-1.jpg' style='width:80%;top:0px;left:0px;'>";
									header("refresh:10; url='?r=index/PantallaRecepcion'"); */
									/*if($_SESSION['video'] == "1"){
										echo"<video autoplay muted id='myVideo'>
											<source src='video/logomhlsports videomarcador.mp4' type='video/mp4'>
										</video> ";
										$_SESSION['video'] = "2";
									//echo "<img src='assets/img/marketingmeeting.png' style='width:100%;position:fixed;top:0px;left:0px;'>";
									header("refresh:9; url=?r=index/principal");
									}
									elseif($_SESSION['video'] == "2"){
										echo"<video autoplay muted id='myVideo'>
											<source src='video/video horizontal.mp4' type='video/mp4'>
										</video> ";
										$_SESSION['video'] = "1";
									//echo "<img src='assets/img/marketingmeeting.png' style='width:100%;position:fixed;top:0px;left:0px;'>";
									header("refresh:17; url=?r=index/principal");
									}*/
									
									//header("Location:?r=index/principal");

									/*if(date("l")=="Monday" || date("l")=="Tuesday" || date("l")=="Wednesday" || date("l")=="Thursday"){
										//echo "<img src='assets/img/cartelcampus.jpg' id='myVideo'";
										echo"<video autoplay muted loop id='myVideo'>
											<source src='video/video2rebajado.mp4' type='video/mp4'>
										</video> ";
										$self = $_SERVER['PHP_SELF'];
										//header("refresh:16; url=$self");
										header("refresh:10; url=$self");
									}
									elseif(date("l")=="Friday" || date("l")=="Saturday" || date("l")=="Sunday"){
										//echo "<img src='assets/img/cartelcampus.jpg' id='myVideo'";
										echo"<video autoplay muted loop id='myVideo'>
												<source src='video/video2rebajado.mp4' type='video/mp4'>
											</video> ";
										$self = $_SERVER['PHP_SELF'];
										header("refresh:10; url=$self");
									}*/
									
								}
								elseif ($screen > $total_paginas && $imagen2==0 ) {

									echo "<img src='img/pantalla-recepcion-2.jpg' style='width:80%;top:0px;left:0px;'>";
									//SI SOLO SE MUESTRA UNA IMAGEN CAMBIAR LA LINEA COMENTADA DEL header
									//header("refresh:15; url='?r=index/PantallaRecepcion'");
									header("refresh:15; url='?r=index/PantallaRecepcion&screen=$screen&img=1'");
	
								}
								elseif ($screen > $total_paginas && $imagen2==1 ) {

									echo "<img src='img/pantalla-recepcion-1.jpg' style='width:80%;top:0px;left:0px;'>";
									header("refresh:15; url='?r=index/PantallaRecepcion'");
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
</html>