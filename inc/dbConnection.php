<?php
  error_reporting(E_ALL ^ E_WARNING); //
  $servername = '127.0.0.1'; // Do not use 'localhost'

  // In the Real World (TM), you should not connect using the root account.
  // Create a privileged account instead.
  //$username = 'alexand8_aldonald';
  $username = 'root';

  // In the Real World (TM), this password would be cracked in miliseconds.
  //$password = 'vailcommonts8106$';
  $password = '1234';

  // Create connection
  $conn = new mysqli($servername, $username, $password);

  // Check connection
  if ($conn->connect_error) {
      die('Connection failed: ' . $conn->connect_error);
  }

  //$dbname = 'alexand8_vailcommonts';
  $dbname = 'CommonsSchema';

  mysqli_select_db($conn, $dbname) or die('Could not open the $dbname');
?>
