<?php
  error_reporting(E_ALL ^ E_WARNING); //
  $servername = '127.0.0.1'; // Do not use 'localhost'

  $username = 'some-username';

  $password = 'some-password';

  // Create connection
  $conn = new mysqli($servername, $username, $password);

  // Check connection
  if ($conn->connect_error) {
      die('Connection failed: ' . $conn->connect_error);
  }

  $dbname = 'YourDbName';

  mysqli_select_db($conn, $dbname) or die('Could not open the $dbname');
?>
