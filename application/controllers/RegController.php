<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    class RegController extends Controller {
        protected $model;
        protected $view;
        
        function __construct($module) {
            parent::__construct($module);
            
            
        }
        function re_session(){
            if(isset($_SESSION['usuari'])){

                Session::get('usuari');
                $stsession='Hola '.$_SESSION['usuari'].' <a href="{logout}">Sortir</a>';
            }else{
                $stsession='<p class="session">
                    <a href="{login}">Login</a> o <a href="{Registre}">Registre</a></p>';
            }
            $this->template=$this->view->extractData('sesion', $stsession,  $this->view->getTemplate());
            $this->view->setTemplate($this->template);
        }
        function index(){
            global $diccionari;
             $this->template= $this->view->getTemplate();
            $this->re_session();
              foreach ($diccionari['menu']['index'] as $item => $valor) {
            $this->template = $this->view->extractData($item, $valor, $this->template);
        }
         $this->view->setTemplate($this->template);
             $this->view->printTemplate();
        }
        function send(){
            //sends user data to db
            // first. collect data from form
            $dades=array();
            foreach ($_POST as $camp => $valor) {
                $dades[$camp]=$valor;
            }
            $this->model->insert($dades['usuari'],$dades['password'],$dades['email']);
            {
                header('Location:'.APP_W);
            }
            
                
            
            
            
        }
       
    }
?>
