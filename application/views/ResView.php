<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class ResView extends View {

    protected $template;
    
    

    function __construct() {
        global $diccionari;
        parent::__construct();
        $this->template = $this->loadTemplate("res");
        /*once the template is loaded
         * it's time to extract data from dictionary
         * 
         */
        $this->template = $this->extractData('subtitol', $diccionari['subtitol']['res'], $this->template);
        foreach ($diccionari['menu']['res'] as $item => $valor) {
            $this->template = $this->extractData($item, $valor, $this->template);
        }
         $this->template = $this->extractData('missatge', $diccionari['missatge']['res'], $this->template);

    }

    function getTemplate(){
        return $this->template;
    }
    function setTemplate($tmpl){
        $this->template=$tmpl;
    }
}

?>
