<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    class RegView extends View{
        protected $template;
        
        function __construct() {
            global $diccionari;
            parent::__construct();
            
            $this->template= $this->loadTemplate("reg");
            //once the template is loaded
            // it's time to extract data from dictionary
            $this->template=$this->extractData('subtitol', $diccionari['subtitol']['reg'],  $this->template);
            // menu links 
            foreach ($diccionari['menu']['reg'] as $item =>$valor) {
                $this->template=$this->extractData($item, $valor,  $this->template);
             }
             //form actions
            $this->template=$this->extractData('REGISTRAR', $diccionari['actions']['REGISTRAR'],  $this->template);
            // message
            $this->template = $this->extractData('missatge', $diccionari['missatge']['reg'], $this->template);
            
        }
        function getTemplate(){
        return $this->template;
    }
    function setTemplate($tmpl){
        $this->template=$tmpl;
    }
    }
?>
