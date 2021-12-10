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