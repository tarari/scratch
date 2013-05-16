<?php

/**
 * Description of Model
 * generalize the model we'll use in app.
 * @author toni
 */
class Model {
    //put your code here
    protected $db;
    protected $rows;
    function __construct() {
        $this->db=SPDO::singleton();
    }
    /*
     * query: pass a sql query and it returns 
     * such as results any rows
     */
    function rquery($sql){
        //extract rows passing a query
        $rows=$this->db->query($sql);       
        return $rows;
    }
}

?>
