<?php
    //Check to see if user is logged in 
    //If they are not logged in take them to log in
    session_start();
    if(!isset($_SESSION["account"])){
      echo"
      <script language='Javascript'>
        window.location.href='logIn.html'
      </script>
      ";
    }
    else{
    echo"
    <!doctype html>
    <html lang='en'>
    <head>
      <meta charset='utf-8'>
      <meta name='viewport' content='width=device-width, initial-scale=1'>
      

      <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>
      <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
      <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css'>
      <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js'></script>
    
    
      <link rel='stylesheet' href='assets/css/styles.css'>
      
      <link rel='preconnect' href='https://fonts.googleapis.com'>
      <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
      <link href='https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap' rel='stylesheet'>
    
      <title>Vote</title>
    
    </head>
    
    <body>";
    
    require("./inc/dbConnection.php");
 

  $email =  $_COOKIE['email'];

  //Date of meals to display and query for
  date_default_timezone_set("America/New_York");
  $currentDate = date("Y-m-d");

  //storing as a string that we can query
  /*
  $favorites_query =
  "SELECT mealName FROM
  ((SELECT * FROM FavoriteMeals WHERE email = '$email') AS favorites
  LEFT JOIN
  (SELECT * FROM Meals) AS meals
  ON favorites.mealId = meals.mealId )"; //MIGHT NEED TO CHANGE TO MEALNAME
  */
  $favorites_query = "SELECT mealName FROM FavoriteMeals WHERE email = '$email'";

  $favorites_result = mysqli_query($conn, $favorites_query);

  $favorites = "";
  while ($row = mysqli_fetch_array($favorites_result)) {
    $favorites .= $row[0];
  }
  setcookie('favorite_meals', $favorites);



  echo "



  <nav class='navbar navbar-expand-lg navbar-light bg-light'>
    <a href='index.html'><img src='./assets/img/generated.svg' style='width: 200px; height: 40px'></a>
    <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
      <span class='navbar-toggler-icon'></span>
    </button>
    <div class='collapse navbar-collapse' id='navbarNav'>
      <ul class='navbar-nav'>
        <li class='nav-item'>
          <a class='nav-link' href='index.html'>About</a>
        </li>
        <li class='nav-item'>
          <a class='nav-link' href='#'><b>Vote</b></a>
        </li>
        <li class='nav-item'>
          <a class='nav-link' href='analytics.php'>Analytics</a>
        </li>
        <li class='nav-item'>
          <a class='nav-link' href='comments.php'>Comments</a>
        </li>
        <li class='nav-item'>
          <a class='nav-link' href='logoutHandler.php'>Log Out</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class='container'>
    <div class='row'>
      <div class='col-12'>
        <h1 style='margin:0'>Today's Menu Items</h1>
      </div>
    </div>

    <div class='row' style='text-align: center'>
      <div class='col-12'>
        <ul class='nav nav-tabs' style='float:none; display:inline-block;'>
          <li><a class='meal-time' data-toggle='tab' href='#breakfast'>Breakfast</a></li>
          <li class='active'><a class='meal-time' data-toggle='tab' href='#lunch'>Lunch</a></li>
          <li><a class='meal-time' data-toggle='tab' href='#dinner'>Dinner</a></li>
        </ul>
      </div>
    </div>
  ";
  //Change which one is active based on the time of day

  //Dynamically generate stuff for tabs
  echo"<div class='tab-content'>";

  //BREAKFAST ------------------------------
  //Making the elements that list the meals for Today
  $meal_query =
  "SELECT * FROM Meals WHERE mealPeriod = 'breakfast' AND mealDate = '$currentDate'
  ORDER BY score desc";

  $result = mysqli_query($conn, $meal_query);

  echo"<div id='breakfast' class='tab-pane fade'>";
  while ($row = mysqli_fetch_array($result)) {
      //Make a cookie for each meal item to keep track of whether or not they have been voted on ('chickenParm' = 'true') - voted on so don't show the arrows
      //Check to see if the meal item is true

      //Meal name with no whitespace (needed for cookies)
      $mealName = str_replace(' ', '', $row[1]);

      echo "<div class='row vote-row'>
      
        <div class='col-md-2 col-2'>
          <!-- How to best make this reproducable --->";
          //if($_COOKIE[$mealName] == ""){
          if(!isset($_COOKIE[$mealName])){
            //COULD ONLY SHOW THE ONES THAT HAVENT BEEN VOTED ON!!
            echo"
          <h2 class='scoresPiece'><a href='voteHandler.php?mealId=$row[0]&adjustment=1&mealname=$mealName&#breakfast'>▲</a></h2>
          <h2 class='scoresPiece'>$row[5]</h2>
          <h2 class='scoresPiece'><a href='voteHandler.php?mealId=$row[0]&adjustment=-1&mealname=$mealName&#breakfast'>▼</a></h2>
          ";
        }
          else{
            echo"<h2 class='scoresPiece'>$row[5]</h2>";
          };
        echo"
        </div>
        <div class='col-7' style='text-align: center'>
          <h1 class='vote-food-title'>$row[1]</h1>
          <!-- <p class='comment-vote'>Comments</p> -->
        </div>
        <div class='col-3' style='text-align: center'>";
        //Check to see whether the meal has already been favorited... if so, then show a remove from favorites option
        //if(!str_contains($favorites, $row[1])){
        if(strpos($favorites, $row[1]) === false){
          echo"<h1 style='margin: 0px'><a style='color: #daa520;' href='favoritesHandler.php?mealName=$row[1]&action=add&#breakfast'>★</a></h1>";
        }
        else{
          echo"<h6 style='margin: 0px'><a style='color: red; text-align:center' href='favoritesHandler.php?mealName=$row[1]&action=remove&#breakfast'>Remove from favorites</a></h6>";
        };
        echo"
        </div>
      </div>";
  }
  echo"</div>";

  //Lunch ---------------------
  //Making the elements that list the meals for Today
  $meal_query =
  "SELECT * FROM Meals WHERE mealPeriod = 'lunch' AND mealDate = '$currentDate'
  ORDER BY score desc";

  $result = mysqli_query($conn, $meal_query);

  echo"<div id='lunch' class='tab-pane fade in active'>";
  while ($row = mysqli_fetch_array($result)) {
      //Make a cookie for each meal item to keep track of whether or not they have been voted on ('chickenParm' = 'true') - voted on so don't show the arrows
      //Check to see if the meal item is true

      //Meal name with no whitespace (needed for cookies)
      $mealName = str_replace(' ', '', $row[1]);

      echo "<div class='row vote-row'>
      
        <div class='col-md-2 col-2'>
          <!-- How to best make this reproducable --->";
          //if($_COOKIE[$mealName] == ""){
          if(!isset($_COOKIE[$mealName])){
            //COULD ONLY SHOW THE ONES THAT HAVENT BEEN VOTED ON!!
            echo"
          <h2 class='scoresPiece'><a href='voteHandler.php?mealId=$row[0]&adjustment=1&mealname=$mealName&#lunch'>▲</a></h2>
          <h2 class='scoresPiece'>$row[5]</h2>
          <h2 class='scoresPiece'><a href='voteHandler.php?mealId=$row[0]&adjustment=-1&mealname=$mealName&#lunch'>▼</a></h2>
          ";
        }
          else{
            echo"<h2 class='scoresPiece'>$row[5]</h2>";
          };
        echo"
        </div>
        <div class='col-7' style='text-align: center'>
          <h1 class='vote-food-title'>$row[1]</h1>
          <!-- <p class='comment-vote'>Comments</p> -->
        </div>
        <div class='col-3' style='text-align: center'>";
        //Check to see whether the meal has already been favorited... if so, then show a remove from favorites option
        //if(!str_contains($favorites, $row[1])){
        if(strpos($favorites, $row[1]) === false){
          echo"<h1 style='margin: 0px'><a style='color: #daa520;' href='favoritesHandler.php?mealName=$row[1]&action=add&#lunch'>★</a></h1>";
        }
        else{
          echo"<h6 style='margin: 0px'><a style='color: red; text-align:center' href='favoritesHandler.php?mealName=$row[1]&action=remove&#lunch'>Remove from favorites</a></h6>";
        };
        echo"
        </div>
      </div>";
  }
  echo"</div>";


  //Dinner ---------------------
  //Making the elements that list the meals for Today
  $meal_query =
  "SELECT * FROM Meals WHERE mealPeriod = 'dinner' AND mealDate = '$currentDate'
  ORDER BY score desc";

  $result = mysqli_query($conn, $meal_query);

  echo"<div id='dinner' class='tab-pane fade'>";
  while ($row = mysqli_fetch_array($result)) {
      //Make a cookie for each meal item to keep track of whether or not they have been voted on ('chickenParm' = 'true') - voted on so don't show the arrows
      //Check to see if the meal item is true

      //Meal name with no whitespace (needed for cookies)
      $mealName = str_replace(' ', '', $row[1]);

      echo "<div class='row vote-row'>
      
        <div class='col-md-2 col-2'>
          <!-- How to best make this reproducable --->";
          //if($_COOKIE[$mealName] == ""){
          if(!isset($_COOKIE[$mealName])){
            //COULD ONLY SHOW THE ONES THAT HAVENT BEEN VOTED ON!!
            echo"
          <h2 class='scoresPiece'><a href='voteHandler.php?mealId=$row[0]&adjustment=1&mealname=$mealName&#dinner'>▲</a></h2>
          <h2 class='scoresPiece'>$row[5]</h2>
          <h2 class='scoresPiece'><a href='voteHandler.php?mealId=$row[0]&adjustment=-1&mealname=$mealName&#dinner'>▼</a></h2>
          ";
        }
          else{
            echo"<h2 class='scoresPiece'>$row[5]</h2>";
          };
        echo"
        </div>
        <div class='col-7' style='text-align: center'>
          <h1 class='vote-food-title'>$row[1]</h1>
          <!-- <p class='comment-vote'>Comments</p> -->
        </div>
        <div class='col-3' style='text-align: center'>";
        //Check to see whether the meal has already been favorited... if so, then show a remove from favorites option
        //if(!str_contains($favorites, $row[1])){
        if(strpos($favorites, $row[1]) === false){
          echo"<h1 style='margin: 0px'><a style='color: #daa520;' href='favoritesHandler.php?mealName=$row[1]&action=add&#dinner'>★</a></h1>";
        }
        else{
          echo"<h6 style='margin: 0px'><a style='color: red; text-align:center' href='favoritesHandler.php?mealName=$row[1]&action=remove&#dinner'>Remove from favorites</a></h6>";
        };
        echo"
        </div>
      </div>";
  }
  echo"</div>";


  } //end of else

?>


</body>
</html>

<script>
  var url = window.location.href;

 if(url.indexOf("#") != -1){
  //Get the tab to make active from url link
  var activeTab = url.substring(url.indexOf("#") + 1);

  //Remove old active tab classes
  $(".tab-pane").removeClass("in active");
  $(".nav-tabs li").removeClass("active");

  //Add active class to tab content
  $("#" + activeTab).addClass("in active");

  //Add active class to actual tab based on the tab content id
  $('a[href="#'+ activeTab +'"]').parent().addClass("active")
 }
</script>
