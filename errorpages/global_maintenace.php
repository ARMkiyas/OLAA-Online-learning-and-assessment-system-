<?php

if (isset($_GET['error_code'])) {
    if($_GET['error_code']!=0){
        header('Location:../index.php');
        exit();
    }

} else {
    header('Location:../index.php');
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenance</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

    <style>
        .fitimg {
            width: 83%;
            object-fit: cover;
            height: auto;


        }

        .con {
            height: 98%;
            width: 98%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;

        }
    </style>
</head>

<body>

    <div class="container-fluid con">
        <img src="/assets/images/maintenace.svg" class="img-fluid img-responsive fitimg" alt="">

    </div>

    <script type="text/javascript" src="/assets/js/jquery.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="/assets/js/popper.js"></script>
</body>

</html>