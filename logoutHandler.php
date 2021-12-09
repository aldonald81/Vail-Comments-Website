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
  if (session_status() === PHP_SESSION_ACTIVE){
        echo "fa;lksdjf;lkasdjf;kasjdf;jksadkfl;jlkas;jdf";
        session_destroy();
      }

  //session_destroy();
   //unset($_SESSION["username"]);
   //unset($_SESSION["password"]);

   echo 'You have cleaned session';
   header('Refresh: 2; URL = logIn.html');

    //header("Location: logIn.html");
    //die();




  ?>


</body>
</html>
