<?php
    
   class Bootstrap{
        static function main(Request $req){
           
            Session::init();
            //inicialitzem variable de sessió islog
            Session::set('islog',FALSE);
            $desti=$req->getControlador();
            $accio=$req->getMetode();
            if($desti=="") $desti=DEFAULT_CONTROLLER;
            // redirigir cap una altra adreça
            
            $controllerName=  ucfirst(strtolower($desti)).'Controller';
            $rutaControlador = APP . 'controllers' . DS . $controllerName . '.php';
            //echo $rutaControlador;
            //si existeix el fitxer, el carreguem i  instanciem
            // el controlador
            if(is_readable($rutaControlador)){
                require_once $rutaControlador;
                $controller = new $controllerName(($desti));
                
                if(is_callable(array($controller, $accio))){
                    $accio = $req->getMetode();
                }
                else{
                    $accio = DEFAULT_ACTION;
                }
                if(isset($args)){
                    call_user_func_array(array($controller, $accio, $args));
                }
                else{
                    call_user_func(array($controller, $accio));
                }
            } 
            
           
            
        
    }
        
}
?>
