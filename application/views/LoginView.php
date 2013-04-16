<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    class LoginView extends View{
        protected $template;
        
        function __construct() {
            global $diccionari;
            parent::__construct();
            
            $this->template= $this->loadTemplate("login");
            //once the template is loaded
            // it's time to extract data from dictionary
            $this->template=$this->extractData('subtitol', $diccionari['subtitol']['login'],  $this->template);
            $this->template=$this->extractData('LOG', $diccionari['actions']['LOG'],  $this->template);
            $this->template=$this->extractData('missatge', $diccionari['missatge']['login'],  $this->template);

            
            
        }
    function getTemplate(){
        return $this->template;
    }
    function setTemplate($tmpl){
        $this->template=$tmpl;
    }
        
    }
?>
