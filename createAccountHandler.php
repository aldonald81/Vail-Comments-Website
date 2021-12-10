<?php
//inc folder
    require("./inc/dbConnection.php");
//////////////
    //All data should be clean -- check data before form submission is allowed

    $first_name = $_POST["firstName"];
    $last_name = $_POST["lastName"];
    $class_year = $_POST["classYear"];
    $email = $_POST["email"];

    $insert_user =
    "INSERT INTO Users (fName, lName, classYear, email)
    VALUES('$first_name', '$last_name', '$class_year', '$email');";

    $result = mysqli_query($conn, $insert_user);
    //Write the new user to the database
    header("Location: logIn.html");
    die();
  ?>