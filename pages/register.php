<?php 
    require_once "../backend/validation.php";

    $val=new validation($_POST['user_name'],$_POST['user_phone'],"sdgs","sdgs","sdgs","sdgs","sdgs","sdgs","sdgs","sdgs");
            
    echo trim("arjsg js k@dsg.com","")."<br>";
    $val->show();

    // header('Location:../index.php?registor_error=1&mail_in=1');
?>


