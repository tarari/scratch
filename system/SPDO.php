<?php
class SPDO extends PDO
{
	private static $instance = null;
 
	public function __construct()
	{
		$config = Config::singleton();
                try{
		parent::__construct('mysql:host=' . $config->get('dbhost') . ';dbname=' . $config->get('dbname'),
                $config->get('dbuser'), $config->get('dbpass'));}
                 catch (PDOException $e) {
                 echo 'Connection failed: ' . $e->getMessage();}
               
	}
 
	public static function singleton()
	{
		if( self::$instance == null )
		{
			self::$instance = new self();
		}
		return self::$instance;
	}
}
?>
