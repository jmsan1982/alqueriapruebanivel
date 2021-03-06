<?php 
$errores=array(
/*
 *          errores tpv   getParameter('Ds_Response')
*/ 
    "0000"=>"",
    ""=>"Error tarjeta",
    "101"=>"Tarjeta caducada",
    "102"=>"Tarjeta en excepción transitoria o bajo sospecha de fraude",
    "106"=>"Intentos de PIN excedidos",
    "125"=>"Tarjeta no efectiva",
    "129"=>"Código de seguridad (CVV2/CVC2) incorrecto",
    "0129"=>"Código de seguridad (CVV2/CVC2) incorrecto",
    "180"=>"Tarjeta ajena al servicio",
    "184"=>"Error en la autenticación del titular",
    "0184"=>"Error en la autenticación del titular",
    "190"=>"Denegación del emisor sin especificar motivo",
    "0190"=>"Tarjeta denegada",
    "0104"=>"Tarjeta denegada",
    "191"=>"Fecha de caducidad errónea",
    "202"=>"Tarjeta en excepción transitoria o bajo sospecha de fraude con retirada de tarjeta",
    
    "904"=>"Comercio no registrado en FUC",
    "909"=>"Error de sistema",
    "913"=>"Pedido repetido",
    "944"=>"Sesión Incorrecta",
    "950"=>"Operación de devolución no permitida", 
    "912"=>"Emisor no disponible",

    "9912"=>"Emisor no disponible",
    "9064"=>"Número de posiciones de la tarjeta incorrecto",
    "9078"=>"Tipo de operación no permitida para esa tarjeta",
    "9093"=>"Tarjeta no existente",
    "9094"=>"Rechazo servidores internacionales",

    "9051"=>"Error número de pedido repetido",
    "9052"=>"Error genérico",
    
    "9104"=>"Denegada",   //Comercio con “titular seguro” y titular sin clave de compra segura
    "9218"=>"El comercio no permite op. seguras por entrada /operaciones",
    "9253"=>"Tarjeta no cumple el check-digit",
    "9256"=>"El comercio no puede realizar preautorizaciones",
    "9257"=>"Esta tarjeta no permite operativa de preautorizaciones",
    "9261"=>"Operación detenida por superar el control de restricciones en la entrada al SIS",
    "9282"=>"Denegada",
    
    "9913"=>"Error en la confirmación que el comercio envía al TPV Virtual (solo aplicable en la
opción de sincronización SOAP)",
    "9914"=>"Confirmación “KO” del comercio (solo aplicable en la opción de sincronización SOAP)",
    "9915"=>"A petición del usuario se ha cancelado el pago",
    "9928"=>"Anulación de autorización en diferido realizada por el SIS (proceso batch)",
    "9929"=>"Anulación de autorización en diferido realizada por el comercio",
    "9997"=>"Se está procesando otra transacción en SIS con la misma tarjeta",
   
    "9998"=>"Operación en proceso de solicitud de datos de tarjeta",
    "9999"=>"Sin finalizar"   //Operación que ha sido redirigida al emisor a autenticar
    
);
?>