<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Controller
 *
 * @author toni
 */
abstract class Controller {
     //put your code here
        protected $model;
        protected $view;
        abstract public function index();
        function __construct($module) {
            $this->view=  $this->setView($module);
            $this->model= $this->setModel($module);
        }
        protected function setModel($model){
            $model = $model . 'Model';
            $rutaModel = APP. 'models' . DS . $model . '.php';
        
        if(is_readable($rutaModel)){
            require_once $rutaModel;
            $mod = new $model;
            return $mod;
        }
        else {
            throw new Exception('Error de model');
        }
        }
        protected function setView($frame){
            $frame=$frame.'View';
            $rutaView= APP.'views'.DS.$frame.'.php';
            if (is_readable($rutaView)){
                require_once $rutaView;
                $vi= new $frame;
                return $vi;
            } else {
                throw new Exception('Error de vista');
            }
        }
    }

?>
