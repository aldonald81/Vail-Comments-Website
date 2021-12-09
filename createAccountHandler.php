<!doctype html>
<html lang='en'>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>
    <link rel='stylesheet' href='assets/css/styles.css'>

    <title>Handler</title>

</head>

<body>
  <?php
    require("./inc/dbConnection.php");


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


    //header("Location: logIn.html");
    //die();
  ?>

<script>
  //redirects to different page
  window.location.href='logIn.html';
</script>


</body>
</html>
