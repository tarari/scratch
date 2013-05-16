<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    class RegModel extends Model{
        protected $db;
        function __construct() {
            parent::__construct();
            
        }
        public function insert($login,$password,$email)
	{
		//realizamos la consulta de todos los items
            $sql="SELECT nom,email FROM usuaris WHERE email=:email";
                $sth=$this->db->prepare($sql);
                $sth->bindParam(':email',$email,PDO::PARAM_STR);
		$sth->execute();
                $result = $sth->fetchAll(PDO::FETCH_ASSOC);
                if ($result==null){
                    $sql="INSERT INTO usuaris(nom,password,email) 
                        VALUES (:login,md5(:password),:email)";
                    $q=$this->db->prepare($sql);
                    $q->execute(array(':login'=>$login,':password'=>$password,':email'=>$email));
                    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
                    return 0;
                }
                else return -1;
            
                
	}
    }
?>
