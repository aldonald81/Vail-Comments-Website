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



    // Program to display current page URL.

    $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ?
                    "https" : "http") . "://" . $_SERVER['HTTP_HOST'] .
                    $_SERVER['REQUEST_URI'];


    $url_components = parse_url($link);

    parse_str($url_components['query'], $params);

    $mealId = $params['mealid'];
    $action = $params['action'];

    $userEmail = $_COOKIE['email'];

    if($action == 'add'){
        $insert_favorite =
        "INSERT INTO FavoriteMeals VALUES('$userEmail', $mealId);";

        $result = mysqli_query($conn, $insert_favorite);
    }
    else{
      $remove_favorite =
      "DELETE FROM FavoriteMeals WHERE email = '$userEmail' AND mealId = $mealId;";

      $result = mysqli_query($conn, $remove_favorite);
    }


    header("Location: vote.php");
    die();





  ?>


</body>
</html>
