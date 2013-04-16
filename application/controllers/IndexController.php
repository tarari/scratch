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

    function index() {
        
        // access to database and extract information
        // now generate contents and show it
        
        $this->template= $this->view->getTemplate();
        if(isset($_SESSION['usuari'])){
            Session::get('usuari');
            $stsession="Hola de nou ".$_SESSION['usuari']." Desconectar";
        }else{
            $stsession="<>";
        }
        // add the contents to template
        // three contents and the user if session is started
        $this->template=$this->view->extractData('sesion', $stsession,  $this->view->getTemplate());
         $this->view->setTemplate($this->template);
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
        // show the finish template
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
        $sql='SELECT desc_oferta,dataFin FROM OFERTES';
        $result=$this->model->rquery($sql);
        if ($result===FALSE){
            echo "SCRATCH::Database Error";
        }  else {
            while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $st=$st. $row['desc_oferta']. ' - '. $row['dataFin'].'<br />';
            
         }
        return $st;
        }
        return null;
    }
    function reserves(){
       $this->index();
        echo "Has de iniciar sessió</br>";
    }
}

?>
