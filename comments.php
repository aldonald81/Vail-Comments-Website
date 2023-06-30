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
    
      <title>Comments</title>
    
    </head>
    
    <body>";
    
    require("./inc/dbConnection.php");
 

  $email =  $_COOKIE['email'];

  echo"


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
          <a class='nav-link' href='vote.php'>Vote</a>
        </li>
        <li class='nav-item'>
          <a class='nav-link' href='analytics.php'>Analytics</a>
        </li>
        <li class='nav-item'>
          <a class='nav-link' href='#'><b>Comments</b></a>
        </li>
        <li class='nav-item'>
          <a class='nav-link' href='logoutHandler.php'>Log Out</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class='container'>
    <div class='row' style='text-align: center'>
        <form  action='commentsHandler.php' method='POST'>
            <label for='exampleFormControlTextarea3' style='font-size: 25px'>Comments about Vail Comments</label>
            <textarea class='form-control' style='font-size: 18px;display: block; margin-left: auto; margin-right: auto; width: 60%' id='comment' name='comment' rows='7' placeholder='Type here...'></textarea>
            <input class='btn btn-info btn-lg btn-block' style='color: black; background-color: #b1a7a6; border: none; width: 150px; height: 40px; display: block; margin-left: auto;margin-top:10px; margin-right: auto;' type='submit' value='Submit'>
        </form>
    </div>
</div>";
    }