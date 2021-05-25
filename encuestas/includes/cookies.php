<?php if (!isset($_SESSION['cookie'])) { ?>
    <div id="cookieswindow">
        <p id="parrafo1">Este sitio utiliza cookies</p>
        <p id="parrafo2">Si continúa navegando está dando su consentimiento para la aceptación de las mencionadas cookies, visite nuestra política de privacidad para mayor información.</p>
        <button type="button" id="buttoncookies">Aceptar</button>
    </div>
    <?php
}
//else {
   // echo "<script>alert('ola');$('#destacados-balon-link').trigger('click');</script>";
//}
?>

<script>
    $("#buttoncookies").click(function()
    {
        $('#cookieswindow').animate({
            borderRadius: '50px',
            width: '70px',
            left: '47%',
            height: '70px',
        }, 800);

        setTimeout(function () {
            $('#cookieswindow').addClass('newwindow');
        },670);

        $('#cookieswindow').animate({left: '-2000px'}, 2000);
        $('#cookieswindow').hide(3000);
        lanzar_animacion_balon_destacados();
        <?php $_SESSION['cookie'] = 'yes'; ?>
    });
         
    function lanzar_animacion_balon_destacados(){
        //alert("Entro en lanzar_animacion_balon_destacados");
        //$('.destacados-balon-effect').addClass('margin-top-balon');
        //$('#destacados-container').removeClass('margin-top-50');
        //$('#destacados-container').addClass('margin-top-100');
        //$('.destacados-container-col-container').removeClass('hidden');
        $('#destacados-container-destacados').removeClass('hidden');

        $('.destacados-container-col-container').addClass('destacados-container-effect');
        // Scroll to a certain element
//        $('#destacados-container-destacados').scrollIntoView({ 
//            behavior: 'smooth' 
//        });
        $('html, body').animate({
            scrollTop: $("#destacados-container-titulo-seccion").offset().top-100,
            behavior: 'smooth' 
        }, 1000);
        
        //  setTimeout(function () {
        //      $('#destacados-container').removeClass('destacados-container-effect');
        //      $('#cookieswindow').addClass('newwindow');
        // },3000);
    }
</script>