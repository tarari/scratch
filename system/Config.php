<?php
class Config{
    private $vars;
    private static $instance;
 
    private function __construct()
    {
        $this->vars = array();
    }
 
    //Amb set desem les nostres variables de configuració.
    public function set($name, $value)
    {
        if(!isset($this->vars[$name]))
        {
            $this->vars[$name] = $value;
        }
    }
 
    //Amb get('nom_de_la_variable') recuperem un valor.
    public function get($name)
    {
        if(isset($this->vars[$name]))
        {
            return $this->vars[$name];
        }
    }
 
    public static function singleton()
    {
        if (!isset(self::$instance)) {
            $c = __CLASS__;
            self::$instance = new $c;
        }
         return self::$instance;
    }
}
/*
 Us:
 
 $config = Config::singleton();
 $config->set('nom', 'Federico');
 echo $config->get('nom');
 
 $config2 = Config::singleton();
 echo $config2->get('nom');
 
*/
?>