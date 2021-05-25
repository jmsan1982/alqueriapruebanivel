<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>L'Alqueria del Basket</title>
		<meta name="description" content="">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

		<link rel="shortcut icon" href="favicon.png" type="image/x-icon">
		<link href="favicon.ico" rel="icon" type="image/x-icon" /> 
		<link rel="apple-touch-icon" href="favicon.ico">
		<link rel="apple-touch-icon" sizes="72x72" href="favicon.ico">
		<link rel="apple-touch-icon" sizes="114x114" href="favicon.ico">

		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>

		<link rel="stylesheet" href="css/bootstrapGrid.min.css">
		<link rel="stylesheet" href="css/header.min.css">
		<link rel="stylesheet" href="css/main.min.css">
		<link rel="stylesheet" href="css/footermodal.css">
		<link rel="stylesheet" href="backmeans/assets/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Condensed">
		<style>
			.alqueria-bg-box {
				margin: 0 15px;
				padding: 15px;
				border: 1px solid #ccc;
				background-color: #fafafa;
				background-repeat: repeat-y;
				background-position: center top;
				background-size: 100% auto;
				border-radius: 5px;
				min-height: 25vh;
			}
			@media (min-width: 768px) {
				.alqueria-bg-box {
					margin: auto;
				}
			}
		</style>
	</head>

	<body class="Pages gallery-W">
		<div class="wrapper">
			<?php require('includes/header_simplificado_2.php'); ?>

			<section id="page-content" class="margin-top-header" style="min-height:calc(100vh - 173px) !important;">
				<div class="block-Club-Gallery clearfix t-black t-center">
					<div class="b-wrap-club-gallery">
						<div class="container">
							<div class="row">
								<div class="col-12 col-md-12">
									<div class="text-wrap">
										<h2 class="section-title">
											<span class="orange-text"><?php echo $lang["ins_academy_tpv_ko_1"];?></span>
										</h2>
									</div>
								</div>

                                <div class="col-12 col-md-9 alqueria-bg-box mt-0">
                                    <p class='t-left'><?php echo $lang["ins_academy_tpv_ko_2"];?><br>
                                        <?php echo $lang["ins_academy_tpv_ko_3"];?></p>

                                    <p class='t-left'><b><?php echo $datos['Ds_Response_texto'];?></b></p>
                                    
									<a class="btn btn-link-o" href="?r=inscripciones/AlqueriaAcademy" style="width:100%;">
										<span style="margin-top: 15px;"><?php echo $lang["ins_academy_tpv_ko_4"];?></span>
									</a>
								</div>
                                
                                <div class="col-12 col-md-3 mt-0">
                                    <div class="contact-info-wrap t-center">
                                        <h4 class="section-title mt-0 mb-0 t-center">
                                            <span class="orange-text"><?php echo $lang["soporte_tecnico_titulo"];?></span>
                                        </h4>
                                        <p class="t-center">
                                            <strong><?php echo $lang["soporte_tecnico_texto"];?></strong>
                                        </p>
                                        <a href="https://wa.me/+34687717491" target="_blank" style="color: black; font-size: 1.3em;">
                                            <img src="img/wassap3.png" style="max-width: 50px;"><strong> WhatsApp 687717491</strong>
                                        </a>
                                    </div>
                                </div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<?php require('includes/footer_simplificado_2.php'); ?>

			<!-- Load Scripts Start -->
			<script src="js/libs.js"></script>
			<script src="js/common.js"></script>

			<!--[if lt IE 9]>
				<script src="libs/html5shiv/es5-shim.min.js"></script>
				<script src="libs/html5shiv/html5shiv.min.js"></script>
				<script src="libs/html5shiv/html5shiv-printshiv.min.js"></script>
				<script src="libs/respond/respond.min.js"></script>
			<![endif]-->
			<!-- Load Scripts End -->

		</div>
	</body>
</html>