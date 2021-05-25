<!DOCTYPE html>
<html lang="es">
<?php  require('includes/head.php'); ?>
<body class="Pages">

		<?php  require('includes/header.php'); ?>
		<!-- Start Page-Content -->
		<section id="page-content" >
			
			<!-- MAIN -->
			<div class="container login">

				<div class="col-md-12 Col-lg-12" style="padding-left:25%;padding-right: 25%;">

					<?php switch ($_SESSION['idioma']) {
					    case "val": ?> <h4>Para visualizar el documento es necesario identificarse con usuario y contraseña</h4> <?php    break;
					    case "cas": ?> <h4>Para visualizar el documento es necesario identificarse con usuario y contraseña</h4> <?php    break;
					    case "eng": ?> <h4>Para visualizar el documento es necesario identificarse con usuario y contraseña</h4> <?php    break;
					} ?>

					<form class="boxed-form" role="form"  method="post" action="?r=login/identificarseusuariopdf">
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


			</div>
			<!-- END LOGIN BOX -->
		</section>	
	<?php require('includes/footer.php'); ?>
        <?php require "includes/cookies.php"; ?>
	<!-- END MAIN -->	
</body>
</html>