<!DOCTYPE html>
<html lang="es">
    <?php require('includes/head.php'); ?>
    <link rel="stylesheet" href="css/form-styles.css">

    <body class="Pages">

        <?php require('includes/header.php'); ?>

        <!-- Start Page-Content -->
        <section id="page-content" class="overflow-x-hidden margin-top-header">

            <div class="block">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <h4 style="text-decoration:underline;"><b>TRATAMIENTO DE IMÁGENES</b></h4>
                            <p class="t-justify">Autorizo que LA FUNDACIÓ VALENCIA BASQUET 2000 trate mi imagen, parcial o total, en cualquier soporte grafico o visual (fotografía, video o similar) para su uso en los medios de difusión presentes y futuros de la fundación, (web, folletos, revistas del club, campeonatos, redes sociales, etc.)</p>
                            <p class="t-justify">Autorizo que  LA FUNDACIÓ VALENCIA BASQUET 2000 ceda mi imagen, parcial o total, en cualquier soporte grafico o visual (fotografía, video o similar) para el uso en los medios de difusión de terceros considerados de interes, (web, folletos, revistas, campeonatos, redes sociales, etc.)</p>
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
        <script src="js/jquery.validate.min.js"></script>

        <script type="text/javascript">
            /* SLIDER */
            $("#slideshow > div:gt(0)").hide();
            setInterval(function () {
                $('#slideshow > div:first')
                    .fadeOut("slow")
                    .next()
                    .fadeIn(2000)
                    .end()
                    .appendTo('#slideshow');
            }, 5000);

            /* FOCUS FECHA */
            $("#fecha").focus(function () {
                $(this).prop('type', 'date');
            });
            $("#fecha").focusout(function () {
                $(this).prop('type', 'text');
            });
        </script>
        <!-- Load Scripts End -->
    </body>
</html>