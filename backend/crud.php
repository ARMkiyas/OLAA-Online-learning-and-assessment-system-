<?php

class register {
   public $db;

    function __construct($co){
        $this->db =$co;
    }
    

    function signup($user_name,$email,$country,$phone,$password,$profile_pic_location){
        
        $sql=$this->db->prepare("INSERT INTO user_info( Name, Email, Country, Phone_no, Password, profile_pic) VALUES(:name,:email,:country,:phone,:password,:profile_pic)");
        $sql->bindparam(':name',$user_name,PDO::PARAM_STR); 
        $sql->bindparam(':email',$email,PDO::PARAM_STR);
        $sql->bindparam(':country',$country,PDO::PARAM_STR);
        $sql->bindparam(':phone',$phone,PDO::PARAM_STR);
        $sql->bindparam(':password',$password,PDO::PARAM_STR);
        $sql->bindparam(':profile_pic',$profile_pic_location,PDO::PARAM_STR);
        $sql->execute();

    }
}


?>