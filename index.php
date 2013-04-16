<?php
    
    define('DS', DIRECTORY_SEPARATOR);
    define('ROOT', realpath(dirname(__FILE__)) . DS);
    define('APP', ROOT . 'application' . DS);
    define('APP_W',dirname($_SERVER['SCRIPT_NAME']));
    define ('SYS',ROOT .'system'.DS);
    define('DEFAULT_CONTROLLER',"Index");
    define('DEFAULT_ACTION',"index");
    
     require 'config.inc';
     require_once APP.'config.php';
     require_once APP.'constants.php';
     
    abstract class Index{
               
        static function run(){
            try{
                Bootstrap::main(new Request());
            } catch(Exception $e){
            echo $e->getMessage();
            }
        }
    }
    Index::run();

?>
