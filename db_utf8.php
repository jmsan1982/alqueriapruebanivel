<?php
	class db_utf8 extends PDO {
		private static $instance = null;

		public function __construct()
		{
			require_once "config.php";
			$db = array(
			'dbhost' => 'localhost',
			'dbname' => 'alqueriaforms',
			'dbuser' => 'root',
			'dbpass' => '');

			parent::__construct('mysql:host=' . $db['dbhost'] . ';dbname=' . $db['dbname'] .';charset=utf8', $db['dbuser'], $db['dbpass']);
		}


		public static function singleton()
		{
			if (self::$instance == null) {
				self::$instance = new self();
			}
			return self::$instance;
		}


		public static function sql($sql) {
			return self::singleton() -> query($sql);
		}
	}
?>