<?php
require "../backend/validation.php";

if (isset($_POST['register'])) {

     $val = new validation($_POST['user_name'], $_POST['signup_email'], $_POST['country'], $_POST['signup_password'], $_POST['con_signup_password'], $_POST['user_phone'], $_FILES['profile_pic'], $_POST['agree']);
    // $val = new validation("ds", $_POST['signup_email'], "d", $_POST['signup_password'], $_POST['con_signup_password'], $_POST['user_phone'], $_FILES['profile_pic'], $_POST['agree']); 
    $valid = $val->show();
    print_r($valid);
    if (!empty($valid)) {
         header('Location:../index.php?registor_error=1&mail_in=1');
        echo "error";
        die();
    } else {
        echo "no error";
    }
    



}
    // header('Location:../index.php');
    // die();
