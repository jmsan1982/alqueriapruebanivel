<?php

/*
@Author: José
Example usage:
    include("lib/classes/toJpg.php");
    $toJpg = new toJpg('img/firmas/', $signature); //$signature === firma sacada de canvas y pasada a controlador con $_POST
    $output = $toJpg->getJpg();
    // Mandar el $output a la DB como si fuera la firma.
*/

Class toJpg {

    private $folderPath;
    private $signature;

    function __construct($folderPath, $signature){
        $this->folderPath    = $folderPath;
        $this->signature    = $signature;
    }

    public function getJpg() {
        $image_parts = explode(";base64,", $this->signature);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file = $this->folderPath . uniqid() . '.png';
        file_put_contents($file, $image_base64);

        $image = imagecreatefrompng($file);
        $bg = imagecreatetruecolor(imagesx($image), imagesy($image));
        imagefill($bg, 0, 0, imagecolorallocate($bg, 255, 255, 255));
        imagealphablending($bg, TRUE);
        imagecopy($bg, $image, 0, 0, 0, 0, imagesx($image), imagesy($image));
        imagedestroy($image);
        $quality = 100; // 0 = low / smaller file, 100 = better / bigger file
        $newName = $this->folderPath . uniqid().'.jpg';
        imagejpeg($bg, $newName, $quality);
        imagedestroy($bg);

        //Abrir imagen creada para subirla
        $file = fopen($newName, "rb");
        $firmajugador = fread($file, 1000000);
        fclose($file);

        return $firmajugador;
    }

    public function getPath() {
        $image_parts = explode(";base64,", $this->signature);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file = $this->folderPath . uniqid() . '.png';
        file_put_contents($file, $image_base64);

        $image = imagecreatefrompng($file);
        $bg = imagecreatetruecolor(imagesx($image), imagesy($image));
        imagefill($bg, 0, 0, imagecolorallocate($bg, 255, 255, 255));
        imagealphablending($bg, TRUE);
        imagecopy($bg, $image, 0, 0, 0, 0, imagesx($image), imagesy($image));
        imagedestroy($image);
        $quality = 100; // 0 = low / smaller file, 100 = better / bigger file
        $newName = $this->folderPath . uniqid().'.jpg';
        imagejpeg($bg, $newName, $quality);
        imagedestroy($bg);

        return $newName;
    }
}
