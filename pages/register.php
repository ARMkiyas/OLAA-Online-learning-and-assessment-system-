<?php 
    require "../backend/validation.php";

    if(!isset($_POST['register'])){
        
   
    header('Location:../index.php');
    die();

       
    }
    $val=new validation($_POST['user_name'],$_POST['signup_email'],$_POST['country'],$_POST['signup_password'],$_POST['con_signup_password'],$_POST['user_phone'],"sdgs",$_POST['agree']);
    $val->show();
    echo $val->get_country_code();
    // header('Location:../index.php?registor_error=1&mail_in=1');
