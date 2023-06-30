<?php
  error_reporting(E_ALL ^ E_WARNING); //
  $servername = '127.0.0.1'; // Do not use 'localhost'

  //$username = 'some-username';
  $username = 'root';


  // $password = 'some-password';
  $password = '1234';

  // Create connection
  $conn = new mysqli($servername, $username, $password);

  // Check connection
  if ($conn->connect_error) {
      die('Connection failed: ' . $conn->connect_error);
  }

  $dbname = 'YourDbName';
  $dbname = 'CommonsSchema';

  mysqli_select_db($conn, $dbname) or die('Could not open the $dbname');
?>
