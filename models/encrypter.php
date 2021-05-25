

<?php

class encrypter {
 
    private static $Key = "tekokernel";
 
    public static function encrypt ($input) {
        $output = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5(Encrypter::$Key), $input, MCRYPT_MODE_CBC, md5(md5(Encrypter::$Key))));
        return $output;
    }
 
    public static function decrypt ($input) {
        $output = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5(Encrypter::$Key), base64_decode($input), MCRYPT_MODE_CBC, md5(md5(Encrypter::$Key))), "\0");
        return $output;
    }

    /*public static function encrypt ($input) {
        $output = base64_encode($input);
        return $output;
    }
 
    public static function decrypt ($input) {
        $output = base64_decode($input);
        return $output;
    }*/

    /*Realiza la búsqueda en la tabla quienes_somos para el buscador web*/
    public static function busquedaquienessomos ($cadena) {
        
        $query = db::singleton()->query("select * from quienes_somos where contenido_hc_".$_SESSION['idioma']." LIKE'%".$cadena."%'");
        if($query) 
            return $query->fetchAll();
        else
            return false;
    }


    /*Realiza la búsqueda en la tabla servicios para el buscador web*/
    public static function busquedaservicios ($cadena) {
        
        $query = db::singleton()->query("select * from servicios where contenido_servicio_".$_SESSION['idioma']." LIKE'%".$cadena."%'");
        if($query) 
            return $query->fetchAll();
        else
            return false;
    }



    /*Realiza la búsqueda en la tabla noticias para el buscador web*/
    public static function busquedanoticias ($cadena) {
        
        $query = db::singleton()->query("select * from noticias where contenido_noticia_".$_SESSION['idioma']." LIKE'%".$cadena."%'");
        if($query) 
            return $query->fetchAll();
        else
            return false;
    }

}

?>