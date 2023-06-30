<?php
require("./inc/dbConnection.php");

//Switching the user's email settings for their favorited item
$email =  $_COOKIE['email'];


$link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ?
                "https" : "http") . "://" . $_SERVER['HTTP_HOST'] .
                $_SERVER['REQUEST_URI'];

$url_components = parse_url($link);

parse_str($url_components['query'], $params);

$mealName = $params['mealName'];
$type = $params['type'];

if($type == 'drop'){
    $updateAlert = "DELETE FROM FavoriteMeals WHERE mealName = '$mealName' AND email = '$email';";
}
else{
    $updateAlert = "INSERT INTO FavoriteMeals VALUES('$email', '$mealName', true);";
}


$result = mysqli_query($conn, $updateAlert);

header('Location: analytics.php');
    die();

?>

