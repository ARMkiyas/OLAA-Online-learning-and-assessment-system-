<?php
    class validation{
    // vatidation variables

        private $invalid_mail=false ;
        private $invalid_file=false ;
        private $invalid_name=false ;
        private $invalid_password=false ;
        private $invalid_country=false ;
        private $phone_no=false ;
        private $agreement=false ;
        
        // variables for store form data
   


        // constructor
        function __construct($name,$email,$country,$password,$con_password,$phone,$profile_pic,$agreement){

            //call methods for validation
            $this->check_name($name);
            $this->check_email($email);
            $this->check_password($password);
            $this->check_phone($phone);
           
        }

        // name  validation  function
        private function check_name($name){
           if(strlen(trim($name," "))<=6 ){
            $this->invalid_name=true;
           }
        }

        //email validation function

        private function check_email($email){   
           if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $this->invalid_mail=true;
           }
        }
          private function check_password($password){
            if ($password<=8) {
                    $this->invalid_password=true;
            }

        }
        private function check_phone($phone){
            if($phone<10=){
                
            }
        }   




        function show(){
            $out=array("name"=>$this->invalid_name,"mail"=>$this->invalid_mail,"country"=>$this->invalid_country,"phone"=>$this->phone_no,"passsword"=>$this->invalid_password,"pro_pic"=>$this->invalid_file,"agree"=>$this->agreement);

            print_r($out);
         
        }

      
    }
   

?>