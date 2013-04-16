<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class IndexView extends View {

    protected $template;
   
    

    function __construct() {
        global $diccionari;
        parent::__construct();
        $this->template = $this->loadTemplate("index");
        /*once the template is loaded
         * it's time to extract data from dictionary
         * 
         */
        $this->template = $this->extractData('subtitol', $diccionari['subtitol']['index'], $this->template);
        foreach ($diccionari['menu']['index'] as $item => $valor) {
            $this->template = $this->extractData($item, $valor, $this->template);
        }
        $this->template = $this->extractData('missatge', $diccionari['missatge']['index'], $this->template);

    }

    function getTemplate(){
        return $this->template;
    }
    function setTemplate($tmpl){
        $this->template=$tmpl;
    }
}

?>
