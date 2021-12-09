<!doctype html>
<html lang='en'>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel='stylesheet' href='assets/css/styles.css'>

    <title>Analytics</title>
</head>

<body>

  <?php
    require("./inc/dbConnection.php");

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
          <a class='nav-link' href='vote.php'>Vote</a>
        </li>
        <li class='nav-item'>
          <a class='nav-link' href='#'><b>Analytics</b></a>
        </li>
        <li class='nav-item'>
          <a class='nav-link' href='logoutHandler.php'>Log Out</a>
        </li>
      </ul>
    </div>
  </nav>

  <br>
  <br>

  ";
  //Querying DB to get data for tables
  $main_query = "SELECT * FROM Meals
    WHERE mealType = 'main'
    ORDER BY score desc;";

    $main_result = mysqli_query($conn, $main_query);

  $side_query = "SELECT * FROM Meals
    WHERE mealType = 'side'
    ORDER BY score desc;";

    $side_result = mysqli_query($conn, $side_query);

  $dessert_query = "SELECT * FROM Meals
    WHERE mealType = 'dessert'
    ORDER BY score desc;";

    $dessert_result = mysqli_query($conn, $dessert_query);

  echo "

  <div class='container'>

  <ul class='nav nav-tabs'>
    <li class='active'><a data-toggle='tab' href='#summaryData'>Summary Data</a></li>
    <li><a data-toggle='tab' href='#yourData'>Your Favorite Meals</a></li>
  </ul>

  <div class='tab-content'>
    <div id='summaryData' class='tab-pane fade in active'>
      <div class='row'>
          <div class='col-4'>
            <h1>Top Entrees</h1>
            <table>
              <thead>
                <tr>
                  <th>Rank</th>
                  <th>Food</th>
                  <th>Score</th>
                </tr>
              </thead>
              <tbody>
              ";
              $i=0;
              while ($row = mysqli_fetch_array($main_result)) {
                  $i++;
                  echo "
                  <tr>
                    <td>$i</td>
                    <td>$row[1]</td>
                    <td>$row[5]</td>
                  </tr>";
              };
        echo "
              </tbody>
            </table>
          </div>

          <div class='col-4'>
            <h1>Top Sides</h1>
            <table>
              <thead>
                <tr>
                  <th>Rank</th>
                  <th>Food</th>
                  <th>Score</th>
                </tr>
              </thead>
              <tbody>
              ";
                $i=0;
                while ($row = mysqli_fetch_array($side_result)) {
                    $i++;
                    echo "
                    <tr>
                      <td>$i</td>
                      <td>$row[1]</td>
                      <td>$row[5]</td>
                    </tr>";
                };
              echo "

              </tbody>
            </table>
          </div>

          <div class='col-4'>
            <h1>Top Desserts</h1>
            <table>
              <thead>
                <tr>
                  <th>Rank</th>
                  <th>Food</th>
                  <th>Score</th>
                </tr>
              </thead>
              <tbody>
              ";
                $i=0;
                while ($row = mysqli_fetch_array($dessert_result)) {
                    $i++;
                    echo "
                    <tr>
                      <td>$i</td>
                      <td>$row[1]</td>
                      <td>$row[5]</td>
                    </tr>";
                };
              echo "
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div id='yourData' class='tab-pane fade'>
      ";
      //USing arbitrary user id now... Should store when user logs in in the future???
      //HOW TO FIND THE cURRENT USER
      $userEmail = $_COOKIE['email'];
      $favorites_query =
      "SELECT email, favorites.mealId, mealName, mealType, mealDate FROM
      ((SELECT * FROM FavoriteMeals WHERE email = '$userEmail') AS favorites
      LEFT JOIN
      (SELECT * FROM Meals) AS meals
      ON favorites.mealId = meals.mealId )";

      $favorites_result = mysqli_query($conn, $favorites_query);

      echo "
        <div class='row'>
            <div class='col-12'>
              <h1>Your Favorite Foods</h1>
              <table>
                <thead>
                  <tr>
                    <th>Food Name</th>
                    <th>Food Type</th>
                    <th>Date Liked</th>
                  </tr>
                </thead>
                <tbody>
                ";
                $i=0;
                while ($row = mysqli_fetch_array($favorites_result)) {
                    $i++;
                    echo "
                    <tr>
                      <td>$row[2]</td>
                      <td>$row[3]</td>
                      <td>$row[4]</td>
                    </tr>";
                };
          echo "
                </tbody>
              </table>
            </div>
      </div>
    </div>



  </div>

  "
  ?>


    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p' crossorigin='anonymous'></script>


</body>
</html>
