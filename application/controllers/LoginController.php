<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    class LoginController extends Controller {
        protected $model;
        protected $view;
        
        function __construct($module) {
            parent::__construct($module);
            
            
            
        }
        function index(){
            $this->template= $this->view->getTemplate();
            $this->view->printTemplate();
        }
        function log(){
            $dades=array();
            foreach ($_POST as $camp => $valor) {
                $dades[$camp]=$valor;
            }
            $result=$this->model->get($dades['email']);
            if($result){
                Session::set('usuari',$result[0]['nom']);
                Session::set('islog',"TRUE");
                echo $result[0]['nom'];
                header('Location:../index.php');
            }
            
            
            
        }
    }
?>
