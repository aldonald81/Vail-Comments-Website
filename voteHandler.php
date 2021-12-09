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

    // CHeck to make sure user is present, alert them to create an account first



    // Program to display current page URL.

    $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ?
                    "https" : "http") . "://" . $_SERVER['HTTP_HOST'] .
                    $_SERVER['REQUEST_URI'];

    //echo $link;

    // Use parse_url() function to parse the URL
    // and return an associative array which
    // contains its various components
    //https://www.geeksforgeeks.org/how-to-get-parameters-from-a-url-string-in-php/#:~:text=The%20parameters%20from%20a%20URL%20string%20can%20be,the%20parameters%20are%20separated%20by%20the%20%3F%20character.
    $url_components = parse_url($link);

    // Use parse_str() function to parse the
    // string passed via URL
    parse_str($url_components['query'], $params);

    $mealId = $params['mealId'];
    $adjustment = $params['adjustment'];
    $mealName = $params['mealname'];
    // Display result

    if($adjustment == 1){
      $adjust_score =
      "UPDATE meals
      SET
      	score = score + 1
      WHERE
      	mealId = $mealId;";
      }
    else{
      $adjust_score =
      "UPDATE meals
      SET
      	score = score - 1
      WHERE
      	mealId = $mealId;";
    }

    $result = mysqli_query($conn, $adjust_score);

    //Create a cookie that makes sure the user can't vote on this meal item again at least through the end of the day
    setcookie($mealName, 'true', mktime(24,0,0));

    header('Location: vote.php');
    die();




  ?>


</body>
</html>
