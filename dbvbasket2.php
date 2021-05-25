<?php
class dbvbasket2 extends PDO
{
    private static $instance = null;
 
    public function __construct()
    {
        require_once "config.php";
        parent::__construct('mysql:host=' . $dbvbasket2['dbvb_host'] . ';dbname=' . $dbvbasket2['dbvb_name'], $dbvbasket2['dbvb_user'], $dbvbasket2['dbvb_pass']);                
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

