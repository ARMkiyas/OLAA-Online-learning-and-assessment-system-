<!DOCTYPE html>
<?php

require 'mysql.php';
$conn = new mysqli($host, $db_username, $db_password, $db_name);

if ($conn->connect_error) {
    die("There is a problem connecting to the database please conntect administrator");
} else echo "connection etabilshed successfully";



if (isset($_POST["submit"])) {

    $id = $username = $name = $email = "";
    $id = uniqid();
    $username = $_POST['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
}
if (empty($username) && empty($username) && empty($name) && empty($email)) {
    echo "<br> Please fill all fieds";
} else {
    if (strlen($username) >= 40) {
        echo "<br> you entered username name is grader than 40";
    } else {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $qu = $conn->prepare("INSERT INTO user_info (ID, username, name, Email) VALUES(?,?,?,?)");
            $qu->bind_param("ssss", $id, $username, $name, $email);
            $qu->execute();
            $qu->close();
            echo "<br> your details recoded";
        } else {
            echo "<br> enter valid email";
        }
    }
}


$conn->close();

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .form {
            padding-top: 10px;
        }

        .input {
            margin-top: 10px;
            height: 25px;
        }
    </style>
</head>

<body>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" class="form">
        <input type="text" name="username" placeholder="Username" class="input" required>
        <br>
        <input type="text" name="name" placeholder="Name" class="input" required><br>
        <input type="email" name="email" placeholder="Email" class="input" required><br>
        <input type="submit" name="submit" class="input"><br>

    </form>
</body>

</html>