<?php


class validation
{

    // vatidation variables

    private $invalid_mail = false;
    private $invalid_file = false;
    private $invalid_name = false;
    private $invalid_password = false;
    private $invalid_country = true;
    private $invalid_phone_no = false;
    private $invalid_agree = false;
    private $mail_in_use = false;
    // extras

    private $country_code;
    // variables for store form data



    // constructor
    function __construct($name, $email, $country, $password, $con_password, $phone, $profile_pic, $agree)
    {

        //call methods for validation
        $this->check_name($name);
        $this->check_email($email);
        $this->check_agree($agree);
        $this->check_password($password, $con_password);
        $this->check_phone($phone);
        $this->check_country($country);
        $this->check_profile($profile_pic);
    }

    // name  validation  function
    private function check_name($name)
    {
        if (strlen(trim($name, " ")) <= 6) {
            $this->invalid_name = true;
        }
    }

    //email validation function

    private function check_email($email)
    {
        require_once 'conn.php';
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->invalid_mail = true;
        } 
        //check already email in use or not
        elseif (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $qu = $conn->prepare("SELECT `id` FROM `user_info` WHERE Email=:email");
            $qu->bindparam(':email', $email, PDO::PARAM_STR);
            $qu->execute();
            $res = $qu->fetch(PDO::FETCH_ASSOC);
            if(!empty($res)) {
                $this->mail_in_use= true;
            }
        }
    }

    // country validaion  function

    private function check_country($country)
    {
        $data = file_get_contents("../assets/includes/countries.json");
        $data = json_decode($data, true);
        foreach ($data as $row) {
            if ($row['name'] == $country) {
                $this->invalid_country = false;
                $this->country_code = $row["callingCodes"][0];
                break;
            }
        }
    }

    //agree validation  function
    private function check_agree($agree)
    {
        if (trim($agree, " ") != "agree") {
            $this->invalid_agree = true;
        }
    }

    //password validation function

    private function check_password($password, $con_password)
    {
        $pattan = "/^(?=.*\d)(?=.*[A-Za-z])[0-9a-zA-Z]{8,}$/";
        if (!preg_match($pattan, $password) || $password != $con_password) {
            $this->invalid_password = true;
        }
    }

    // phone number validation function
    private function check_phone($phone)
    {
        if (!empty(trim($phone, " ")) && !preg_match("/\d{10}/", $phone)) {
            $this->invalid_phone_no = true;
        }
    }

    // profile picture validation function

    private function check_profile($pic)
    {

        $allowed_files = array("png", "jpg", "jpeg");



        if (!$pic['error'] > 0) {


            $file_name_extension = strtolower(pathinfo(basename($pic['name']), PATHINFO_EXTENSION));
            $check = getimagesize($pic['tmp_name']);
            if ($check == false) {
                echo "check";
                $this->invalid_file = true;
            }
            if (!in_array($file_name_extension, $allowed_files)) {
                echo "arr";
                $this->invalid_file = true;
            }
            if ($pic['size'] >= 5242880) {
                echo "size";
                $this->invalid_file = true;
            }
        }
    }

    function show()
    {
        $valid = array("user_name" => $this->invalid_name, "signup_email" => $this->invalid_mail, "country" => $this->invalid_country, "user_phone" => $this->invalid_phone_no, "signup_password" => $this->invalid_password, "profile_pic" => $this->invalid_file, "agree" => $this->invalid_agree,"mail_in_use"=>$this->mail_in_use);
        $out = array();
        foreach ($valid as $name => $value) {
            if ($value) {
                $out += array($name => $value);
            }
        }
        return $out;
    }

    function get_country_code()
    {
        return "+" . $this->country_code;
    }

    function invalid_password(){

        return $this->invalid_password;

    }

    function mail_in_use(){
        return $this->mail_in_use;
    }


}
