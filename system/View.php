<?php

/**
 * Description of View
 *
 * @author toni
 */
class View {
    //it consts about one template
    // and data from/for model
    protected  $template;
    
    protected  $_request;
    function __construct() {
        $this->_request=new Request();
       
    }
    // now, the view's methods
    function loadTemplate($frame){
        // it searchs template on public/tpl
        $path=APP.'public'.DS.'tpl'.DS.$frame.'.html';
        $html=  file_get_contents($path);
        return $html;
    }
    function loadData($datas){
        $this->data=$datas;
    }
    function extractData($var,$cont,$where){
        //locate data $var from dictionary $cont and
        //it puts in template $where
        $html=str_replace('{'.$var.'}', $cont,$where);
        return $html;
        
    }
    function loadContents($contents){
        $this->contents=$contents;
        
    }
    function printTemplate(){
           // echo $this->template;
            eval("?>".$this->template."<?");
            
        }
        
}

?>
