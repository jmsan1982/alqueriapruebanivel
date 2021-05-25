<?php
class dbvbasket extends PDO
{
    private static $instance = null;
 
    public function __construct()
    {
	   require_once "config.php";
       parent::__construct('mysql:host=' . $dbvbasket['dbvb_host'] . ';dbname=' . $dbvbasket['dbvb_name'], $dbvbasket['dbvb_user'], $dbvbasket['dbvb_pass']);                
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

