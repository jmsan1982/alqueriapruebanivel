<?php
class db_2 extends PDO
{
    private static $instance = null;
 
    public function __construct()
    {
	   require_once "config.php";
        $dbalqueria = array(
        'dbalq_host' => 'localhost',
        'dbalq_name' => 'alqueria',
        'dbalq_user' => 'root',
        'dbalq_pass' => '');
       parent::__construct('mysql:host=' . $dbalqueria['dbalq_host'] . ';dbname=' . $dbalqueria['dbalq_name'], $dbalqueria['dbalq_user'], $dbalqueria['dbalq_pass']);                
    }
 
    public static function singleton()
    {
        if( self::$instance == null )
        {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    public static function sql($sql){
	return self::singleton()->query($sql);
    }
    
}
?>

