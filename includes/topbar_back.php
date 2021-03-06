<header class="main-head clearfix">
	<div class="container-fluid container-menu no-gutters">

		<!-- Logo para la vista movil -->
		<div class="logo movil">
			<span id="logo-alqueria-container">
				<img width="111" height="65" id="logo-alqueria" src="img/logo-alqueria.png" alt="L´Alqueria del Basket">
			</span>
			<span id="logo-valencia-basket-container">
				<img width="111" height="65" id="logo-valencia-basket" src="img/logo-vbc-30-aniv.png" alt="Valencia Basket Club">
			</span>
			<span id="logo-cultura-esfuerzo-container">
				<img width="111" height="65" id="logo-cultura-esfuerzo" src="img/logo-cultura-esfuerzo.png" alt="Cultura del Esfuerzo">
			</span>
		</div>

		<!-- Mini-menu Hamburguesa -->
		<div class="mini-menu">
			<a href="#" class="toggle-mnu">
				<span></span>
			</a>
		</div>

		<!-- Desktop menu navigation -->
		<nav id="menu" class="nav-line hidden-sm hidden-xs nav-dark">
			<ul class="menu menuescritorio">
				<li class="logo mt-1 mb-1">
					<span id="logo-alqueria-container">
						<img width="111" height="65" id="logo-alqueria" src="img/logo-alqueria.png"
							 alt="L´Alqueria del Basket">
					</span>
					<span id="logo-valencia-basket-container">
						<img width="111" height="65" id="logo-valencia-basket" src="img/logo-vbc-30-aniv.png"
							 alt="Valencia Basket Club">
					</span>
					<span id="logo-cultura-esfuerzo-container">
						<img width="111" height="65" id="logo-cultura-esfuerzo" src="img/logo-cultura-esfuerzo.png"
							 alt="Cultura del Esfuerzo">
					</span>
				</li>

				<?php
					if (isset($_SESSION['rolusuario']) && ($_SESSION['rolusuario'] == "admin" || $_SESSION['rolusuario'] == "superadmin" || $_SESSION['rolusuario'] == "coordinador")) {
				?>
						<li>
							<a href="#">INSCRIPCIONES <i class="icon-left-arrow"></i></a>
							<ul class="submenu">
								<li>
									<a href="?r=campus/BackEscuelaCanteraInscripciones">ESCUELA Y CANTERA</a>
								</li>
								<li>
									<a href="?r=jugadores/Listar">ESCUELA Y CANTERA 20/21</a>
								</li>
								<li>
									<a href="?r=jornadas/BackJornadasDeteccionListarInscripciones">JORNADAS DETECCIÓN</a>
								</li>
								<li>
									<a href="?r=jornadasFormacion/BackJornadasFormacionListarInscripciones">JORNADAS FORMACIÓN ENTRENADORES</a>
								</li>
								<li>
									<a href="?r=patronato/Inscripciones">PATRONATO</a>
								</li>
								<li>
									<a href="?r=jugadores/ListarPatronato">PATRONATO 20/21</a>
								</li>
								<li>
									<a href="#">CAMPUS <i class="icon-left-arrow"></i></a>
									<ul class="submenu">
										<li>
											<a href="?r=campusmuro/BackCampusMuro">CAMPUS MURO DE LOS SUEÑOS</a>
										</li>
										<li>
											<a href="?r=campus/BackCampusPascua">CAMPUS PASCUA VB</a>
										</li>
										<li>
											<a href="?r=campusveranovb/BackCampusVerano">CAMPUS VERANO</a>
										</li>
										<li>
											<a href="?r=campus/BackCampusWorcester">CAMPUS WORCESTER</a>
										</li>
										<li>
											<a href="?r=campus/BackCampusSkillsCamp">SKILLS CAMP</a>
										</li>
										<li>
											<a href="?r=campus/BackCampusShootingCamp">SHOOTING ACADEMY</a>
										</li>
										<li>
											<a href="?r=campus/BackEscuelas">CAMPUS TECNIFICACIÓN FEMENINA</a>
										</li>
										<li>
											<a href="?r=campus/BackCampusImproveTalent">IMPROVE TALENT</a>
										</li>
										
										<li>
											<a href="?r=campus/BackCampusIbiza">CAMPUS IBIZA</a>
										</li>
										
										<li>
											<a href="?r=campus/BackCampusNavidad">CAMPUS NAVIDAD</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">ESCUELAS <i class="icon-left-arrow"></i></a>
									<ul class="submenu">
										<li>
											<a href="?r=escuelafallas/BackEscuelaFallas">ESCUELA DE FALLAS</a>
										</li>
										
										<li>
											<a href="?r=escuelapascua/BackEscuelaPascua">ESCUELA PASCUA</a>
										</li>
										<li>
											<a href="?r=campus/BackEscuelaVeranoVB">ESCUELA VERANO DEL VALENCIA BASKET</a>
										</li>
										<li>
											<a href="?r=campus/BackEscuelaVeranoAlq">ESCUELA VERANO DE L'ALQUERIA</a>
										</li>
										<li>
											<a href="?r=campus/BackEscuelaNavidadAlq">ESCUELA NAVIDAD DE L'ALQUERIA</a>
										</li>
									</ul>
								</li>
								<?php
									/*<li>
										<a href="?r=campus/BackEscuelaCanteraInscripcionesTemporada1819">ESCUELA Y CANTERA 18/19</a>
									</li>
									<li>
										<a href="?r=campus/BackEscuelaCanteraAltaInscripciones">ALTA INSCRIPCIONES</a>
									</li>
									<li>
										<a href="?r=campus/BackEscuelaCanteraAltaEquipos">ALTA EQUIPOS</a>
									</li>*/
								?>
								<li>
									<a href="?r=index/BackListarLicenciasFederacion1920">LICENCIAS FEDERACION 19/20</a>
								</li>
								<?php
									/*<li>
										<a href="?r=index/BackEquiposFederacion">ALTA EQUIPOS FEDERACION</a>
									</li>*/
								?>
								<li>
									<a href="?r=liga/BackLiga">LIGA</a>
								</li>
								<li>
									<a href="?r=index/BackVoluntarios">VOLUNTARIOS</a>
								</li>
								<li>
									<a href="?r=sportsclub/BackListarInscripciones">SPORTS CLUB</a>
								</li>
							</ul>
						</li>
				<?php
					}
					// Los usuarios con el rol coordinador no podrán ver las consultas
					if (isset($_SESSION['rolusuario']) && ($_SESSION['rolusuario'] != "coordinador" && $_SESSION['rolusuario'] != "encuestas" && $_SESSION['rolusuario'] != "recepcion" && $_SESSION['rolusuario'] != "entrenador" && $_SESSION['rolusuario'] != "gestion"  && $_SESSION['rolusuario'] != "mantenimiento")) {
				?>
						<li>
							<a href="#">CONSULTAS <i class="icon-left-arrow"></i></a>
							<ul class="submenu">
								<li>
									<a href="?r=campus/BackEscuelaCanteraOtrasConsultas">ESCUELA Y CANTERA</a>
								</li>
								<li>
									<a href="?r=campus/BackEscuelaCanteraOtrasConsultas_20_21">ESCUELA Y CANTERA 2020/21</a>
								</li>
								<li>
									<a href="?r=patronato/OtrasConsultas">PATRONATO</a>
								</li>
                                <li>
                                    <a href="?r=patronato/OtrasConsultas_20_21">PATRONATO 2020/21</a>
                                </li>
							</ul>
						</li>
				<?php
					}
					if (isset($_SESSION['rolusuario']) && ($_SESSION['rolusuario'] == "encuestas" || $_SESSION['rolusuario'] == "superadmin")) {
				?>
						<li>
							<a href="?r=encuestas/Back">ENCUESTAS</a>
						</li>
				<?php
					}

					if (isset($_SESSION['rolusuario']) && ($_SESSION['rolusuario'] == "entrenador" || $_SESSION['rolusuario'] == "superadmin" || $_SESSION['rolusuario'] == "coordinador" || $_SESSION['rolusuario'] == "gestion" || $_SESSION['rolusuario'] == "mantenimiento")) {
				?>
						<li>
							<a href="#">PISTAS / SALAS <i class="icon-left-arrow"></i></a>
							<ul class="submenu">
								<li>
									<a href="?r=pistas/ConsultaPistas">CONSULTA PISTAS</a>
								</li>
								<li>
									<a href="?r=pistas/ConsultaSalas">CONSULTA SALAS</a>
								</li>
								<li>
									<a href="?r=incidencias/incidencias">INCIDENCIAS</a>
								</li>
								

							</ul>
						</li>
				<?php
					}
					//gestion de reservas de cada usuario, entrenadores no porque van a parte en otro menu
					if (isset($_SESSION['rolusuario']) && ( $_SESSION['rolusuario'] == "superadmin" || $_SESSION['rolusuario'] == "coordinador" || $_SESSION['rolusuario'] == "gestion" || $_SESSION['rolusuario'] == "mantenimiento")) {
				?>
						<li>
							<a href="?r=reservasusuarios/BackGestionUser">GESTION USUARIO</a>
						</li>

				<?php
					}


					//FORMULARIO ENTRENADOR  - ENTRENAMIENTOS DE CADA ENTRENADOR
					if (isset($_SESSION['rolusuario']) &&  $_SESSION['rolusuario'] == "entrenador") {
				?>
						<li>
							<a href="?r=entrenamientos/BackEntrenamientos">ENTRENAMIENTOS</a>
						</li>

						<li>
							<a href="?r=pistas/ConsultaSalaEstudio">RESERVA SALA ESTUDIO</a>
						</li>

						<li>
							<a href="?r=index/VistaFormEntrenador">DATOS ENTRENADOR</a>
						</li>

				<?php
					}
					
					//GESTION GIMNASIO  - si el usuario es palcacer o pacasares podran ver la gestion del gimnasio
					if (isset($_SESSION['usuario']) && ($_SESSION['usuario'] == "palcacer" || $_SESSION['usuario'] == "pcasares" || $_SESSION['usuario'] == "admintessq" ))  {
				?>
						
						<li>
							<a href="?r=pistas/ConsultaPistaGimnasio">GIMNASIO</a>
						</li>
				<?php
					}

					
					//FORMULARIO ENTRENADOR  - ENTRENAMIENTOS DE CADA ENTRENADOR -RESERVA DE SALA ESTUDIO
					if (isset($_SESSION['rolusuario']) && ($_SESSION['rolusuario'] == "superadmin" || $_SESSION['rolusuario'] == "entrenador")) {
				?>
						
						<li>
							<a href="?r=pistas/ConsultaSalaEstudio">RESERVA SALA ESTUDIO</a>
						</li>
				<?php
					}
					if (isset($_SESSION['rolusuario']) && ($_SESSION['rolusuario'] == "superadmin" || $_SESSION['rolusuario'] == "coordinador" || $_SESSION['rolusuario'] == "gestion" || $_SESSION['rolusuario'] == "mantenimiento")) {
				?>
						<li>
							<a href="?r=calendario/EventosCalendario">EVENTOS</a>
						</li>
				<?php
					}
					if (isset($_SESSION['rolusuario']) && ($_SESSION['rolusuario'] == "recepcion" || $_SESSION['rolusuario'] == "superadmin")) {
				?>
						<li>
							<a href="?r=incidencias/BackIncidencias">CONSULTA INCIDENCIAS</a>
						</li>
				<?php
					}
					if (isset($_SESSION['rolusuario']) && ($_SESSION['rolusuario'] == "recepcion" || $_SESSION['rolusuario'] == "superadmin")) {
				?>
						<li>
							<a href="?r=index/PantallaRecepcion">PANTALLA RECEPCION</a>
						</li>
				<?php
					}
				?>
				<li>
					<form method="post" action="?r=login/cerrarSesion">
						<input class="btn" type="submit" value="CERRAR SESIÓN">
					</form>
				</li>
			</ul>
		</nav>


		<!-- Mobile menu navigation -->
		<div class="mob-menu">
			<ul class="menu">
				<?php
					if ((isset($_SESSION['rolusuario'])) && ($_SESSION['rolusuario'] == "admin" || $_SESSION['rolusuario'] == "superadmin" || $_SESSION['rolusuario'] == "coordinador")) {
				?>
						<li class="sub">
							<a href="#">INSCRIPCIONES <i class="icon-left-arrow"></i></a>
							<ul class="submenu">
								<li>
									<a href="?r=campus/BackEscuelaCanteraInscripciones">ESCUELA Y CANTERA</a>
								</li>
								<li>
									<a href="?r=jugadores/Listar">ESCUELA Y CANTERA 20/21</a>
								</li>
								<li>
									<a href="?r=jornadas/BackJornadasDeteccionListarInscripciones">JORNADAS DETECCIÓN</a>
								</li>
								<li>
									<a href="?r=jornadasFormacion/BackJornadasFormacionListarInscripciones">JORNADAS FORMACIÓN ENTRENADORES</a>
								</li>
								<li>
									<a href="?r=patronato/Inscripciones">PATRONATO</a>
								</li>
								<li>
									<a href="?r=jugadores/ListarPatronato">PATRONATO 20/21 </a>
								</li>
								<li class="sub2">
									<a href="#">CAMPUS <i class="icon-left-arrow"></i></a>
									<ul class="submenu">
										<li>
											<a href="?r=campusmuro/BackCampusMuro">CAMPUS MURO DE LOS SUEÑOS</a>
										</li>
										<li>
											<a href="?r=campus/BackCampusPascua">CAMPUS PASCUA VB</a>
										</li>
										<li>
											<a href="?r=campusveranovb/BackCampusVerano">CAMPUS VERANO</a>
										</li>
										<li>
											<a href="?r=campus/BackCampusWorcester">CAMPUS WORCESTER</a>
										</li>
										<li>
											<a href="?r=campus/BackCampusSkillsCamp">SKILLS CAMP</a>
										</li>
										<li>
											<a href="?r=campus/BackCampusShootingCamp">SHOOTING ACADEMY</a>
										</li>
										<li>
											<a href="?r=campus/BackEscuelas">CAMPUS TECNIFICACIÓN FEMENINA</a>
										</li>
										<li>
											<a href="?r=campus/BackCampusImproveTalent">IMPROVE TALENT</a>
										</li>
										<li>
											<a href="?r=campus/BackCampusIbiza">CAMPUS IBIZA</a>
										</li>
										<li>
											<a href="?r=campus/BackCampusNavidad">CAMPUS NAVIDAD</a>
										</li>
									</ul>
								</li>
								<li class="sub2">
									<a href="#">ESCUELAS <i class="icon-left-arrow"></i></a>
									<ul class="submenu">
										<li>
											<a href="?r=escuelafallas/BackEscuelaFallas">ESCUELA DE FALLAS DE L'ALQUERIA</a>
										</li>
										
										<li>
											<a href="?r=escuelapascua/BackEscuelaPascua">ESCUELA PASCUA DE L'ALQUERIA</a>
										</li>
										<li>
											<a href="?r=campus/BackEscuelaVeranoVB">ESCUELA VERANO DEL VALENCIA BASKET</a>
										</li>
										<li>
											<a href="?r=campus/BackEscuelaVeranoAlq">ESCUELA VERANO DE L'ALQUERIA</a>
										</li>
										<li>
											<a href="?r=campus/BackEscuelaNavidadAlq">ESCUELA NAVIDAD DE L'ALQUERIA</a>
										</li>
									</ul>
								</li>
								<?php
									/*<li>
										<a href="?r=campus/BackEscuelaCanteraInscripcionesTemporada1819">ESCUELA Y CANTERA 18/19</a>
									</li>
									<li>
										<a href="?r=campus/BackEscuelaCanteraAltaInscripciones">ALTA INSCRIPCIONES</a>
									</li>
									<li>
										<a href="?r=campus/BackEscuelaCanteraAltaEquipos">ALTA EQUIPOS</a>
									</li>*/
								?>
								<li>
									<a href="?r=index/BackListarLicenciasFederacion1920">LICENCIAS FEDERACION 19/20</a>
								</li>
								<?php
									/*<li>
										<a href="?r=index/BackEquiposFederacion">ALTA EQUIPOS FEDERACION</a>
									</li>*/
								?>
								<li>
									<a href="?r=liga/BackLiga">LIGA</a>
								</li>
								<li>
									<a href="?r=index/BackVoluntarios">VOLUNTARIOS</a>
								</li>
								<li>
									<a href="?r=sportsclub/BackListarInscripciones">SPORTS CLUB</a>
								</li>
							</ul>
						</li>
				<?php
					}
					// Los usuarios con el rol coordinador no podran ver las consultas
					if (isset($_SESSION['rolusuario']) && ($_SESSION['rolusuario'] != "coordinador" && $_SESSION['rolusuario'] != "encuestas" && $_SESSION['rolusuario'] != "recepcion" && $_SESSION['rolusuario'] != "entrenador" && $_SESSION['rolusuario'] != "gestion" && $_SESSION['rolusuario'] != "mantenimiento")) {
				?>
						<li class="sub">
							<a href="#">CONSULTAS <i class="icon-left-arrow"></i></a>
							<ul class="submenu">
								<li>
									<a href="?r=campus/BackEscuelaCanteraOtrasConsultas">ESCUELA Y CANTERA</a>
								</li>
                                <li>
                                    <a href="?r=campus/BackEscuelaCanteraOtrasConsultas_20_21">ESCUELA Y CANTERA 2020/21</a>
                                </li>
								<li>
									<a href="?r=patronato/OtrasConsultas">PATRONATO</a>
								</li>
                                <li>
                                    <a href="?r=patronato/OtrasConsultas_20_21">PATRONATO 2020/21</a>
                                </li>
							</ul>
						</li>
				<?php
					}
					if ($_SESSION['rolusuario'] != "encuestas" || $_SESSION['rolusuario'] == "superadmin") {
				?>
						<li>
							<a href="?r=encuestas/back">ENCUESTAS</a>
						</li>
				<?php
					}
					if ((isset($_SESSION['rolusuario'])) && ($_SESSION['rolusuario'] == "entrenador" || $_SESSION['rolusuario'] == "superadmin" || $_SESSION['rolusuario'] == "coordinador"  || $_SESSION['rolusuario'] == "gestion" || $_SESSION['rolusuario'] == "mantenimiento")) {
				?>
						<li class="sub">
							<a href="#">PISTAS / SALAS <i class="icon-left-arrow"></i></a>
							<ul class="submenu">
								<li>
									<a href="?r=pistas/ConsultaPistas">CONSULTA PISTAS</a>
								</li>
								<li>
									<a href="?r=pistas/ConsultaSalas">CONSULTA SALAS</a>
								</li>
								<li>
									<a href="?r=incidencias/incidencias">INCIDENCIAS</a>
								</li>
							</ul>
						</li>

				<?php
					}
					//gestion de reservas de cada usuario, entrenadores no porque van a parte en otro menu
					if (isset($_SESSION['rolusuario']) && ( $_SESSION['rolusuario'] == "superadmin" || $_SESSION['rolusuario'] == "coordinador" || $_SESSION['rolusuario'] == "gestion" || $_SESSION['rolusuario'] == "mantenimiento")) {
				?>
						<li>
							<a href="?r=reservasusuarios/BackGestionUser">GESTION USUARIO</a>
						</li>

				<?php
					}
				
					//ENTRENAMIENTOS DE CADA ENTRENADOR  -reserva asiento - dormulario entrenador
					if (isset($_SESSION['rolusuario']) && ($_SESSION['rolusuario'] == "superadmin" || $_SESSION['rolusuario'] == "entrenador")) {
				?>
						<li>
							<a href="?r=entrenamientos/BackEntrenamientos">ENTRENAMIENTOS</a>
						</li>

						<li>
							<a href="?r=pistas/ConsultaSalaEstudio">RESERVA SALA ESTUDIO</a>
						</li>

						<li>
							<a href="?r=index/VistaFormEntrenador">DATOS ENTRENADOR</a>
						</li>
				<?php
					}
					
					//GESTION GIMNASIO  - si el usuario es palcacer o pacasares podran ver la gestion del gimnasio
					if (isset($_SESSION['usuario']) && ($_SESSION['usuario'] == "palcacer" || $_SESSION['usuario'] == "pcasares" || $_SESSION['usuario'] == "admintessq" ))  {
				?>
						
						<li>
							<a href="?r=pistas/ConsultaPistaGimnasio">GIMNASIO</a>
						</li>
				<?php
					}

					
					if (isset($_SESSION['rolusuario']) && ($_SESSION['rolusuario'] == "superadmin" || $_SESSION['rolusuario'] == "coordinador" || $_SESSION['rolusuario'] == "gestion" || $_SESSION['rolusuario'] == "mantenimiento")) {
				?>
						<li>
							<a href="?r=calendario/EventosCalendario">EVENTOS</a>
						</li>
				<?php
					}
					if (isset($_SESSION['rolusuario']) && ($_SESSION['rolusuario'] == "recepcion" || $_SESSION['rolusuario'] == "superadmin")) {
				?>
						<li>
							<a href="?r=incidencias/BackIncidencias">CONSULTA INCIDENCIAS</a>
						</li>
				<?php
					}
					if (isset($_SESSION['rolusuario']) && ($_SESSION['rolusuario'] == "recepcion" || $_SESSION['rolusuario'] == "superadmin")) {
				?>
						<li>
							<a href="?r=index/PantallaRecepcion">PANTALLA RECEPCION</a>
						</li>
				<?php
					}
				?>
				<li>
					<form method="post" action="?r=login/cerrarSesion">
						<input class="btn" type="submit" value="CERRAR SESIÓN">
					</form>
				</li>
			</ul>
		</div>
	</div>
</header>