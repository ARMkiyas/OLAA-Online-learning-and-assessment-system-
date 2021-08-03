<?php
$registor_error=0;
$re_mail=0;
require_once "backend/conn.php";
session_start();
$_SESSION["session_id"]=null;


if (isset($_POST['sign_in'])) { 


}
if (isset($_POST['register'])){


}

if(isset($_GET['registor_error']))
{  
    if($_GET['registor_error']==1){
        $registor_error=1;
        if(isset($_GET['mail_in'])){
            if($_GET['mail_in']==1){
                $re_mail=1;
            }else{
                $re_mail=0;
            }
        }
    }
    else{
        $registor_error=0;
    }
   
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>game</title>


    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/all.min.css">
 
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body style="background-color:#4393BD;" class="">

    <div class="d-flex justify-content-end mr-5 mt-2">
    <?php if (isset($_SESSION["session_id"])) {
                                echo "  <div class=\"dropdown\">
                                <button class=\"btn dropdown-toggle\" id=\"profile_dropdown\" type=\"button\" data-toggle=\"dropdown\">
                                    <img src=\"/up_files/profile.png\" height=\"50\" width=\"50\" class=\"img-fluid rounded-circle\" alt=\"profile_pic\">
                                </button>
                                <div class=\"dropdown-menu\">
                                    <a href=\"#\" class=\"dropdown-item\">Profile</a>
                                    <a href=\"#\" class=\"dropdown-item\">sign out</a>
                    
                                </div>
                            </div>";
                            } else {
                                echo " <div class=\"btn btn-success btn_styles m-3 rounded-pill\" id=\"btn_active\" data-toggle=\"modal\" id=\"start\" data-target=\"#account\">Get started</div>
                                ";
                            }  ?>   
      
      
    </div>
    <div class="container center_content">

        <header>
            <div class="h2 text-center text-white display-2 heading_text">APPS</div>
        </header>
        <div class="row mt-5 col-center-block">
            <div class="col col-center-block">
                <a href="<?php if (isset($_SESSION["session_id"])) {
                                echo "/quiz_app";
                            } else {
                                echo "#account";
                            }  ?>" data-toggle="modal" class="btn card  justify-content-center align-content-center card_prop col-center-block mt-3 mt-xl-0" style="background-color:#FFFF8D;">
                    <div class="card-text ">
                        <div class="h1">Quiz App</div>
                    </div>
                </a>

            </div>
            <div class="col ">

                <a href="#" class="btn card justify-content-center align-content-center col-center-block card_prop mt-3 mt-xl-0" style="background-color:#BDBDBD;" data-toggle="modal" data-target="#mymodal">
                    <div class="card-text ">
                        <div class="h1">Comming soon....!</div>
                    </div>
                </a>

            </div>
            <div class="col ">
                <a href="#" class="btn card justify-content-center align-content-center card_prop mt-3 mt-xl-0 col-center-block" style="background-color:#BDBDBD;" data-toggle="modal" data-target="#mymodal">
                    <div class="card-text ">
                        <div class="h1">Comming soon....!</div>
                    </div>
                </a>
            </div>
        </div>

    </div>
    <!-- modal -->



    <div class="modal fade" id="mymodal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title h5">
                        Notice
                    </div>
                    <button class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    sorry, page under construction, app will be released soon as possible, please be patient.
                </div>
                <div class="modal-footer">
                    <div class="btn btn-primary" data-dismiss="modal" style="width: 100px; border-radius: 10px;">
                        OK
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- form modal -->

    <div class="modal fade show"  id="account" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header modal-header-style">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link <?php if($registor_error==0){ echo 'active';}?>" id="home-tab" data-toggle="tab" href="#login" role="tab" aria-controls="home" aria-selected="true">Sign In</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link <?php if($registor_error==1){ echo 'active';}?>" id="profile-tab" data-toggle="tab" href="#signup" role="tab" aria-controls="profile" aria-selected="false">Register</a>
                        </li>

                    </ul>

                </div>

                <div class="modal-body form">
                    <div class="tab-content" id="myTabContent">
                        <!-- sign form  -->
                        <div class="tab-pane fade <?php if($registor_error==0){ echo 'show active';} ?>" id="login" role="tabpanel" aria-labelledby="signin-tab">


                            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" role="form" class="login_form" novalidate>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <div class="input-group">

                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-envelope "></i>
                                            </span>
                                        </div>
                                        <input type="text" name="login_email" class="form-control validate" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="abc@abc.com" required>

                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-key" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                        <input type="password" name="login_password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>



                                    </div>
                                    <label class="forgot" for=""><a href="#fogot_password" data-toggle="tab" role="tab" id="link_fogot">Forgot password ?</a></label>


                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1" value="remeber">Remember me</label>
                                </div>
                                <button type="submit" value="sign_in" class="btn btn-success btn-block ">Login <i class="fas fa-sign-in-alt"></i></button>
                                <button class="btn btn-block btn-danger" data-dismiss="modal">Close</button>
                            </form>


                        </div>

                        <!-- sign up form -->
                        <div class="tab-pane fade <?php if($registor_error==1){ echo 'show active';} ?>" id="signup" role="tabpanel" aria-labelledby="registor-tab">

                            <form enctype="multipart/form-data" action="/pages/register.php"  method="post" class="signup_form" novalidate>
                                <div class="form-group">
                                    <label for="name">Name<sup class="text-danger">*</sup></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-user-alt"></i>
                                            </div>

                                        </div>
                                        <input type="text" name="user_name" class="form-control" id="name" placeholder="Mohammed farnas" required>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="">Email address<sup class="text-danger">*</sup></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-envelope"></i>
                                            </div>
                                        </div>
                                        <input type="text" name="signup_email" class="form-control <?php if ($re_mail==1){echo 'is-invalid';}?>" id="email" placeholder="farnas@abc.com" required>
                                        <label id="email-error" class="invalid-feedback" for="email">You entered mail already in use</label>


                                    </div>
                                
                                    <small for="email" class="text-muted">We'll never share your email with anyone else.</small>
                                </div>
                                <div class="form-group">
                                    <label for="country">Country <sup class="text-danger">*</sup></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-globe-asia"></i></div>
                                        </div>
                                        <select class="custom-select" name="country">
                                            <option class="selected." value="0" selected>Choose...</option>
                                            
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="phone" class="">Phone no <small class="text-muted">(Optional)</small> </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-phone-alt"></i>
                                            </div>
                                        </div>
                                        <input type="number" name="user_phone" class="form-control" id="phone" placeholder="0123456789">
                                    </div>
                                    <small class="text-muted" for="phone">we'll never share your phone number with anyone else.</small>

                                </div>
                                <div class="form-group">
                                    <label for="signup_password" class="">Password<sup class="text-danger">*</sup></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-key"></i>
                                            </div>
                                        </div>
                                        <input type="password" name="signup_password" class="form-control" id="signup_password" placeholder="Password" value="" required>


                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="con_password" class="">Confirm Password<sup class="text-danger">*</sup></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-key"></i>
                                            </div>
                                        </div>
                                        <input type="password" name="con_signup_password" class="form-control" id="con_password"  placeholder="Password" value="" required>

                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="profile_pic">Profile picture <small class="text-muted">(optional)</small></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-upload"></i></div>
                                        </div>
                                        <div class="custom-file" id="file">
                                            <input type="file" class="custom-file-input" id="profile_pic" name="profile_pic" aria-describedby="inputGroupFileAddon01">
                                            <label class="custom-file-label" for="profile_pic">Choose file</label>
                                        </div>

                                    </div>
                                    <small class="text-muted" for="file">note: only png, jpeg and jpg image formats are allowed and image size must be less than 5MB</small>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="agree" value="agree" id="agree" required>
                                        <label for="agree" class="custom-control-label">I agree to the Terms and Conditions, and I hereby declare that the information given above is true and accurate to the best of my knowledge </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" value="register" name="register" class="btn btn-success btn-block "><i class="fas fa-user-plus"></i> Register Now..!</button>
                                    <button class="btn btn-block btn-danger" data-dismiss="modal">Close</button>

                                </div>




                            </form>

                        </div>

                        <div class="tab-pane fade" id="fogot_password" role="tabpanel" aria-labelledby="fogot-tab">
                            <form class="mt-3" id="forgot_password" action="">
                                <div class="form-group">
                                    <label for="email" class="">Email address</label>
                                    <input type="text" name="email" class="form-control" id="fotgot_password">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block" value="forgot"> Send Password Reset Link <i class="fas fa-paper-plane"></i></button>
                                    <button class="btn btn-block btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                            <div class="modal-footer">

                                <label class="forgot" for=""><a href="#login" id="back_login" data-toggle="tab" role="tab">Back to login page <i class="fas fa-arrow-circle-right"></i></a></label>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

<?php if($registor_error==1){ echo '<script>
   let btn= document.getElementById("btn_active");

   setTimeout(() => {
   btn.click();
   }, 100);

</script>'; } ?>
    <!-- -------------------------------scripts------------------------------------- -->



    <script type="text/javascript" src="/assets/js/jquery.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>

    <script type="text/javascript" src="/assets/js/popper.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

    <script src="/assets/js/main.js"></script>


</body>

</html>