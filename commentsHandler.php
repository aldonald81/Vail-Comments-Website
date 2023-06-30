<?php
//inc folder
    require("./inc/dbConnection.php");

    //MUST ENABLE OPEN SSL in php.ini file - extension=C:\Program Files\php\ext\php_openssl.dll
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    

    $comment= $_POST["comment"];

    $email =  $_COOKIE['email'];

    //Date of meals to display and query for
    date_default_timezone_set("America/New_York");
    $currentDate = date("Y-m-d");

    $insertComment =
    "INSERT INTO Comments VALUES('$email', '$comment', '$currentDate')";

    $result = mysqli_query($conn, $insertComment);

    header('Location: comments.php');
    die();

  ?>