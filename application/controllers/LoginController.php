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
              foreach ($diccionari['menu']['login'] as $item => $valor) {
            $this->template = $this->view->extractData($item, $valor, $this->template);
        }
         $this->view->setTemplate($this->template);
                $this->view->printTemplate();
        }
        function log(){
            $dades=array();
            foreach ($_POST as $camp => $valor) {
                $dades[$camp]=$valor;
            }
            $result=$this->model->get($dades['email'],$dades['password']);
            if($result){
                Session::set('usuari',$result[0]['nom']);
                Session::set('islog','TRUE');
                //echo $result[0]['nom'];
                header('Location:'.APP_W);
            }
            
            
            
        }
    }
?>
