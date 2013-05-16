<?php

/*
 * This class extends the controller and it controls
 * the main view
 */

class ResController extends Controller {

    protected $model;
    protected $view;
    protected $template;
    protected $data;

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
    function index() {
        global $diccionari;
        // access to database and extract information
        // now generate contents and show it
        $this->template= $this->view->getTemplate();
        // add the contents to template
        // three contents
        $this->re_session();
        
        foreach ($diccionari['menu']['res'] as $item => $valor) {
            $this->template = $this->view->extractData($item, $valor, $this->template);
        }
         $this->view->setTemplate($this->template);
         if ((Session::get('islog')) === FALSE){
            $this->template=$this->view->extractData('missatge', 
                    'Sessió no iniciada',  $this->view->getTemplate());
             $this->view->setTemplate($this->template);
        }
        $this->view->printTemplate();
        
        
    }
    function contents1(){
        $st="";
        $sql='SELECT destinacio,data_vol FROM VOLS';
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
        $sql='SELECT nom,preu_base FROM HOTELS';
        $result=$this->model->rquery($sql);
        if ($result===FALSE){
            echo "SCRATCH::Database Error";
        }
        else {
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $st=$st. $row['nom']. ' - '. $row['preu_base'].'<br />';
            
         }
        return $st;
    }
        return null;
    }
    function contents3(){
        $st="";
        $sql='SELECT destinacio,data_vol FROM VOLS';
        $result=$this->model->rquery($sql);
        if ($result===FALSE){
            echo "SCRATCH::Database Error";
        }  else {
            while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $st=$st. $row['destinacio']. ' - '. $row['data_vol'].'<br />';
            
         }
        return $st;
        }
        return null;
    }
    function reserves(){
       $this->index();
        echo "Has de iniciar sessió</br>";
    }
    function hotels(){
         $this->template= $this->view->getTemplate();
         $this->view->printTemplate();
    }
    function vols(){
         $this->template= $this->view->getTemplate();
         $this->view->printTemplate();
    }
    function ofertes(){
         $this->template= $this->view->getTemplate();
         $this->view->printTemplate();
    }
}

?>
