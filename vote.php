<!doctype html>
<html lang='en'>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>
    <link rel='stylesheet' href='assets/css/styles.css'>

    <title>Vote</title>

</head>

<body>
  <?php
  require("./inc/dbConnection.php");

  //Query meals table and display options for today for upvotes

  //Secho "$status";

  $email =  $_COOKIE['email'];
  //Add cookies for all favorited meals so that they won't be refavorited
  //storing as a string that we can query
  $favorites_query =
  "SELECT mealName FROM
  ((SELECT * FROM FavoriteMeals WHERE email = '$email') AS favorites
  LEFT JOIN
  (SELECT * FROM Meals) AS Meals
  ON favorites.mealId = meals.mealId )";

  $favorites_result = mysqli_query($conn, $favorites_query);

  $favorites = "";
  while ($row = mysqli_fetch_array($favorites_result)) {
    $favorites .= $row[0];
  }
  setcookie('favorite_meals', $favorites);



  echo "



  <nav class='navbar navbar-expand-lg navbar-light bg-light'>
    <a class='navbar-brand' href='index.html'>Vail Commonts</a>
    <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
      <span class='navbar-toggler-icon'></span>
    </button>
    <div class='collapse navbar-collapse' id='navbarNav'>
      <ul class='navbar-nav'>
        <li class='nav-item'>
          <a class='nav-link' href='index.html'>Home</a>
        </li>
        <li class='nav-item'>
          <a class='nav-link' href='#'><b>Vote</b></a>
        </li>
        <li class='nav-item'>
          <a class='nav-link' href='analytics.php'>Analytics</a>
        </li>
        <li class='nav-item'>
          <a class='nav-link' href='logoutHandler.php'>Log Out</a>
        </li>
      </ul>
    </div>
  </nav>

  <br>

  <div class='container'>
    <div class='row'>
      <div class='col-12'>
        <h1 class='vote-header'>Today's Menu Items</h1>
      </div>
    </div>
  ";

  //Making the elements that list the meals for Today
  $meal_query =
  "SELECT * FROM Meals
  ORDER BY score desc";

  $result = mysqli_query($conn, $meal_query);

  /*
  $tuple_count = 0;
  $i = 1;
  while ($row = mysqli_fetch_array($result)) {
      $up_id = 'up-' . $i;
      $down_id = 'down-' . $i;
      $score_id = 'score-row' . $i;
      $tuple_count++;
      echo "<div class='row vote-row'>
        <div class='col-1'></div>
        <div class='col-1'>
          <!-- How to best make this reproducable --->
          <h2 class='scoresPiece'><a id=$up_id>▲</a></h2>
          <h2 class='scoresPiece' id=$score_id>$row[5]</h2>
          <h2 class='scoresPiece'><a id=$down_id>▼</a></h2>
        </div>
        <div class='col-9'>
          <h1 class='vote-food-title'>$row[1]</h1>
          <p class='comment-vote'>Comments</p>
        </div>
        <div class='col-1'></div>
      </div>";
      $i++;
  }

  */


  while ($row = mysqli_fetch_array($result)) {
      //Make a cookie for each meal item to keep track of whether or not they have been voted on ('chickenParm' = 'true') - voted on so don't show the arrows
      //Check to see if the meal item is true

      //Meal name with no whitespace (needed for cookies)
      $mealName = str_replace(' ', '', $row[1]);

      echo "<div class='row vote-row'>
        <div class='col-1'></div>
        <div class='col-1'>
          <!-- How to best make this reproducable --->";
          //if($_COOKIE[$mealName] == ""){
          if(!isset($_COOKIE[$mealName])){
            //COULD ONLY SHOW THE ONES THAT HAVENT BEEN VOTED ON!!
            echo"
          <h2 class='scoresPiece'><a href='voteHandler.php?mealId=$row[0]&adjustment=1&mealname=$mealName'>▲</a></h2>
          <h2 class='scoresPiece'>$row[5]</h2>
          <h2 class='scoresPiece'><a href='voteHandler.php?mealId=$row[0]&adjustment=-1&mealname=$mealName'>▼</a></h2>
          ";
        }
          else{
            echo"<h2 class='scoresPiece'>$row[5]</h2>";
          };
        echo"
        </div>
        <div class='col-8'>
          <h1 class='vote-food-title'>$row[1]</h1>
          <p class='comment-vote'>Comments</p>
        </div>
        <div class='col-2'>";
        //Check to see whether the meal has already been favorited... if so, then show a remove from favorites option
        //if(!str_contains($favorites, $row[1])){
        if(strpos($favorites, $row[1]) === false){
          echo"<h1><a style='color: #daa520' href='favoritesHandler.php?mealid=$row[0]&action=add'>★</a></h1>";
        }
        else{
          echo"<h6><a style='color: red' href='favoritesHandler.php?mealid=$row[0]&action=remove'>Remove from favorites</a></h6>";
        };
        echo"
        </div>
      </div>";
  }



  /*
  echo "
    <div class='row vote-row'>
      <div class='col-1'></div>
      <div class='col-1'>
        <!-- How to best make this reproducable --->
        <h2><a id='up-1'>▲</a></h2>
        <h2 id='score-row1'>121</h2>
        <h2><a id='down-1'>▼</a></h2>
      </div>
      <div class='col-9'>
        <h1 class='vote-food-title'>Scoopie</h1>
        <p class='comment-vote'>Comments</p>
      </div>
      <div class='col-1'></div>
    </div>

    <div class='row vote-row'>
      <div class='col-1'></div>
      <div class='col-1'>
        <!-- How to best make this reproducable --->
        <h2><a id='up-2'>▲</a></h2>
        <h2 id='score-row2'>90</h2>
        <h2><a id='down-2'>▼</a></h2>
      </div>
      <div class='col-9'>
        <h1 class='vote-food-title'>Ice Cream</h1>
        <p class='comment-vote'>Comments</p>
      </div>
      <div class='col-1'></div>
    </div>

    <div class='row vote-row'>
      <div class='col-1'></div>
      <div class='col-1'>
        <!-- How to best make this reproducable --->
        <h2><a id='up-3'>▲</a></h2>
        <h2 id='score-row3'>30</h2>
        <h2><a id='down-3'>▼</a></h2>
      </div>
      <div class='col-9'>
        <h1 class='vote-food-title'>Chicken Parm</h1>
        <p class='comment-vote'>Comments</p>
      </div>
      <div class='col-1'></div>
    </div>

    <div class='row vote-row'>
      <div class='col-1'></div>
      <div class='col-1'>
        <!-- How to best make this reproducable --->
        <h2><a id='up-4'>▲</a></h2>
        <h2 id='score-row4'>-22</h2>
        <h2><a id='down-4'>▼</a></h2>
      </div>
      <div class='col-9'>
        <h1 class='vote-food-title'>Pasta Bar</h1>
        <p class='comment-vote'>Comments</p>
      </div>
      <div class='col-1'></div>
    </div>
  </div>

  </div>

  "
  */

  /*
  echo "


    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p' crossorigin='anonymous'></script>

  <script>
      //HOST mysql server on DAVIDSON DOMAINS???

      // Creating the rows automatically and filling them with the information from the csv
      //Event listeners for clicks on arrows


      //Get the number of menu items so event listeners can be created for each FIGURE THIS OUT
      //Dynamically create the event listeners for arrows
      /*
      for(let i=1; i<=8; i++){
        var row = 'row' + i

        //UP
        var string = 'up-' + i
        var element = document.getElementById(string)

        element.addEventListener('click', adjustScore.bind(event, row, 1), false)

        //DOWN
        var string = 'down-' + i
        var element = document.getElementById(string)

        element.addEventListener('click', adjustScore.bind(event, row, -1), false)
      }

      function adjustScore(row, amount){
        valueId = 'score-' + row;
        console.log(valueId)

        score = document.getElementById(valueId);

        newScore = Number(score.innerText) + amount

        score.innerText = String(newScore)


      }

  </script>

  ";
  */
?>


</body>
</html>
