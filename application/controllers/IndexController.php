<?php

/*
 * This class extends the controller and it controls
 * the main view
 */

class IndexController extends Controller {

    protected $model;
    protected $view;
    protected $template;
    

    function __construct($module) {
        parent::__construct($module);
        
    }
    /*
     * re_session: comprove and load data associated with session
     */
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
    
    function index() {
        global $diccionari;
        // access to database and extract information
        // now generate contents and show it
        // first the template
        $this->template= $this->view->getTemplate();
        // the session
        $this->re_session();
        // the menu links from dictionary
        foreach ($diccionari['menu']['index'] as $item => $valor) {
            $this->template = $this->view->extractData($item, $valor, $this->template);
        }
         $this->view->setTemplate($this->template);
         // the rest of contents
        $this-> contents();
        
        // show the finish template
        $this->view->printTemplate();
        
        
    }
    function logout(){
        Session::destroy('usuari');
        header('Location:../index.php');
        //echo $_SESSION['usuari'];
    }
    function contents(){
        $st1=$this->contents1();
        $st2=$this->contents2();
        $st3=$this->contents3();
        // three substitutions & loads the changes to the template
        
        $this->template=$this->view->extractData('cont1', $st1,  $this->view->getTemplate());
        $this->view->setTemplate($this->template);
        $this->template=$this->view->extractData('cont2', $st2,  $this->view->getTemplate());
        $this->view->setTemplate($this->template);
        $this->template=$this->view->extractData('cont3', $st3,  $this->view->getTemplate());
        $this->view->setTemplate($this->template);
    }
    
    
    function contents1(){
        $st="";
        $sql='SELECT destinacio,data_vol FROM vols LIMIT 3';
        $result=$this->model->rquery($sql);
        if ($result===FALSE){
            echo "SCRATCH::Database Error";
        }
        else{
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $st=$st. $row['destinacio']. ' - '. $row['data_vol'].'<br />';
            
         }
        return $st;
    }
        return null;
    }
     
    function contents2(){
        $st="";
        $sql='SELECT nom,preu_base FROM hotels LIMIT 3';
        $result=$this->model->rquery($sql);
        if ($result===FALSE){
            echo "SCRATCH::Database Error";
        }
        else {
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $st=$st.'Hotel '. $row['nom']. ' - '. $row['preu_base'].' &euro;<br />';
            
         }
        return $st;
    }
        return null;
    }
    function contents3(){
        $st="";
        $sql='SELECT desc_oferta,dataFin FROM ofertes LIMIT 3';
        $result=$this->model->rquery($sql);
        if ($result===FALSE){
            echo "SCRATCH::Database Error";
        }  else {
            while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $st=$st. $row['desc_oferta']. ' - Fins a: '. $row['dataFin'].'<br />';
            
         }
        return $st; 
        }
        return null;
    }
    
}

?>
