<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    class LoginModel extends Model{
        protected $db;
        function __construct() {
            parent::__construct();
            //echo "soc el model login</br>";
        }
        public function get($email,$pword)
	{
		//realizamos la consulta de todos los items
                $sql="SELECT nom,email FROM USUARIS WHERE email=:email AND password=md5($pword)";
                $sth=$this->db->prepare($sql);
                $sth->bindParam(':email',$email,PDO::PARAM_STR);
		$sth->execute();
                $result = $sth->fetchAll(PDO::FETCH_ASSOC);
                return $result;
	}
        
            
        
    }
?>
