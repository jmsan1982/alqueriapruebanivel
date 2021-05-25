<?php
class db extends PDO
{
    private static $instance = null;
 
    public function __construct()
    {
        require_once "config.php";
        parent::__construct('mysql:host=' . $db['dbhost'] . ';dbname=' . $db['dbname'], $db['dbuser'], $db['dbpass']);                
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

