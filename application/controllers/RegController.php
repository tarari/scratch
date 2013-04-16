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
        function index(){
            
             $this->view->printTemplate();
        }
        function send(){
            //sends user data to db
            // first. collect data from form
            $dades=array();
            foreach ($_POST as $camp => $valor) {
                $dades[$camp]=$valor;
            }
            print_r($dades);
            $sql='INSERT INTO USUARIS(nom,password,email) VALUES ($dades["usuari"],$dades["password"],$dades["email"])';
            
            $result=$this->model->rquery($sql);
            if ($result===FALSE){
            echo "SCRATCH::Database Error";}
        }
       
    }
?>
