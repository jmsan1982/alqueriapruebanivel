<!DOCTYPE html>
<html lang="es">
<?php  require('includes/head.php'); ?>
<body class="Pages">

		<?php  require('includes/header.php'); ?>
		<!-- Start Page-Content -->
		<section id="page-content" >
			<br /><br />
			<?php switch ($_SESSION['idioma']) {
			    case "val": ?>
			        <p style="text-align:center;font-weight: bold;">PER A PODER ACCEDIR A ALGUNES PANTALLES O CONTINGUTS<br /> ÉS NECESSARI PERTÀNYER AL COL·LECTIU DE L'ALQUERIA</p>
					<h2 style="text-align:center;"><span class="orange-text">PER FAVOR </span>IDENTIFÍQUESE</h2>
			    <?php    break;
			    case "cas": ?>
			        <p style="text-align:center;font-weight: bold;">PARA PODER ACCEDER A ALGUNAS PANTALLAS O CONTENIDOS<br /> ES NECESARIO PERTENECER AL COLECTIVO DE L'ALQUERIA</p>
					<h2 style="text-align:center;"><span class="orange-text">POR FAVOR </span>IDENTIFÍQUESE</h2>
			    <?php    break;
			    case "eng": ?>
			        <p style="text-align:center;font-weight: bold;">TO BE ABLE TO ACCESS SOME SCREENS OR CONTENTS<br /> IT IS NECESSARY TO BELONG TO THE COLLECTIVE OF L'ALQUERIA</p>
					<h2 style="text-align:center;"><span class="orange-text">PLEASE </span>LOGIN</h2>
			    <?php    break;
			   
			} ?>
			
			<!-- MAIN -->
			<div class="container login">

				<div class="col-md-6 col-sm-offset-1 col-lg-4 col-lg-offset-2">

					<?php switch ($_SESSION['idioma']) {
					    case "val": ?> <h4>Identificació d'usuaris</h4> <?php    break;
					    case "cas": ?> <h4>Identificación de usuarios</h4> <?php    break;
					    case "eng": ?> <h4>Identification of users</h4> <?php    break;
					} ?>

					<form class="boxed-form" role="form"  method="post" action="?r=login/identificarseusuario">
						<div class="form-group">
							<div class="col-sm-12" style="margin-bottom:15px;">
								<div class="input-group">
									<input type="text" class="form-control" name="usuario" placeholder="Usuario">
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-sm-12" style="margin-bottom:15px;">
								<div class="input-group">
									<input type="password" class="form-control" name="password" placeholder="Contraseña">
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-sm-12" style="margin-bottom:10px;">
								<label class="fancy-checkbox">
									<input type="checkbox">
									<?php switch ($_SESSION['idioma']) {
									    case "val": ?> Recordar contrasenya <?php    break;
									    case "cas": ?> Recordar contraseña <?php    break;
									    case "eng": ?> Remember password <?php    break;
									} ?>
								</label>
							</div>
						</div>
						<br /><br />
						<div class="form-group">
							<div class="col-xs-7">
								<?php switch ($_SESSION['idioma']) {
								    case "val": ?> <button type="submit" class="btn  btn-link-w"><span>Identificar-se</span></button> <?php  break;
								    case "cas": ?> <button type="submit" class="btn  btn-link-w"><span>Identificarse</span> </button> <?php  break;
								    case "eng": ?> <button type="submit" class="btn  btn-link-w"><span>Login</span></button> <?php  break;
								} ?>
							</div>
						</div>
					</form>
				</div>

				<div class="visible-xs"><br /><br /><br /></div>

				<div class="col-md-6 col-lg-4">
					<div class="login-copytext">
						<?php switch ($_SESSION['idioma']) {
						    case "val": ?> 
						    	<h4><i class="fa fa-lock"></i> Login Seguro</h4>
								<p>Identifique's amb el seu usuari i contrasenya per a poder tindre accés a la zona privada de L'Alqueria del Basket, en cas d'oblidar les seues dades d'accés, pose's en contacte amb València Basket.</p>
								<h4><i class="fa fa-user"></i> Zona privada</h4>
								<p>Zona reservada per als usuaris associats a L'Alqueria del Basket, si no pertany a este col·lectiu, per favor, no intente accedir, es tracta d'un àrea reservada a usuaris registrats.</p>
						    <?php  break;
						    case "cas": ?>
						    	<h4><i class="fa fa-lock"></i> Login Seguro</h4>
								<p>Identifíquese con su usuario y contraseña para poder tener acceso a la zona privada de L'Alqueria del Basket, en caso de olvidar sus datos de acceso, póngase en contacto con Valencia Basket.</p>
								<h4><i class="fa fa-user"></i> Zona privada</h4>
								<p>Zona reservada para los usuarios asociados a L'Alqueria del Basket, si no pertenece a este colectivo, por favor, no intente acceder, se trata de un area reservada a usuarios registrados.</p>
						    <?php  break;
						    case "eng": ?> 
						    	<h4><i class="fa fa-lock"></i> Login Seguro</h4>
								<p>Identify yourself with your username and password in order to have access to the private area of ​​L'Alqueria del Basket, in case you forget your access information, please contact Valencia Basket.</p>
								<h4><i class="fa fa-user"></i> Zona privada</h4>
								<p>Zone reserved for the users associated with L `basket of basketball, if you do not belong to this group, please do not try to access, it is an area reserved for registered users.</p>
						    <?php  break;
						    
						} ?>
					</div>
				</div>
			</div>
			<!-- END LOGIN BOX -->
		</section>	
	<?php require('includes/footer.php'); ?>
        <?php require "includes/cookies.php"; ?>
	<!-- END MAIN -->	
</body>
</html>