<?php 
    class Request
    {
        
        private $_controlador;
        private $_metode;
        
        
        public function __construct() 
        {
            $this->parseURI();
            
            
        }
        private function parseURI(){
            $parts = explode('/',$_SERVER['REQUEST_URI']);
            
            $nelem=count($parts);
            switch($nelem){
                case 2:
                    $this->_controlador=DEFAULT_CONTROLLER;
                    $this->_metode=DEFAULT_ACTION;
                    break;
                case 3:
                    if ($parts[2]=="index.php"){
                    $this->_controlador=DEFAULT_CONTROLLER;}
                        else {
                             $this->_controlador=$parts[2];
                        }
                    $this->_metode=DEFAULT_ACTION;
                    break;
                
                default:
                     $this->_controlador=$parts[2];
                     $this->_metode=$parts[3];
                    
                    break;
            }
                     
            
        }
        public function getControlador()
        {
            return $this->_controlador;
        }

        public function getMetode()
        {
            return $this->_metode;
        }

        public function getArgs()
        {
            return $this->_arguments;
        }
    }

?>