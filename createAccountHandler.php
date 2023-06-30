<?php
//inc folder
    require("./inc/dbConnection.php");

    //MUST ENABLE OPEN SSL in php.ini file - extension=C:\Program Files\php\ext\php_openssl.dll
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    
//////////////
    //All data should be clean -- check data before form submission is allowed

    

//////////////
    //All data should be clean -- check data before form submission is allowed

    $first_name = $_POST["firstName"];
    $last_name = $_POST["lastName"];
    $code = $_POST["code"];
    $email = $_POST["email"];

    setcookie('email', $email);

    //Check to make sure user doesn't already have an account
    $check_user =
    "SELECT COUNT(*) FROM Users WHERE email = '$email'";

    $result = mysqli_query($conn, $check_user);

    //if count != 0 log the user in, else take them back to login page and alert them
    $count = $row = mysqli_fetch_array($result)[0];

    // Case when the email entered is not associated with an account
    if($count == 1){
      echo"
      <script language='Javascript'>
      confirm = confirm('You already have a swipe (i.e. an Account)! Let\'s log in!')
      if (confirm == true) {
        window.location.href='logIn.html';
      }
      </script>
      ";
    } else{
      //$code = rand(1000, 10000); //Generating the random code
        
        $insert_user =
      "INSERT INTO Users (fName, lName, classYear, email, code)
      VALUES('$first_name', '$last_name', '0000', '$email', '$code');";

      $result = mysqli_query($conn, $insert_user);
      //Write the new user to the database

     ////////////////////////////////////
      // Send email user with random code with PHPMailer

      //Create an instance; passing `true` enables exceptions
      $mail = new PHPMailer(true);

      try {
          // Server settings
          $mail->SMTPDebug = SMTP::DEBUG_SERVER; // for detailed debug output
          $mail->isSMTP();
          $mail->Host = 'smtp.gmail.com';
          $mail->SMTPAuth = true;
          $mail->Username = 'vailcommonts@gmail.com'; // YOUR gmail email
          $mail->Password = 'vailcommonts8106$'; // YOUR gmail password
          $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
          $mail->Port = 587; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`


          $fullname = $first_name . " " . $last_name;
          // Sender and recipient settings
          $mail->setFrom('vailcommonts@gmail.com', 'Vail Comments');
          $mail->addAddress($email, $fullname);
          //$mail->addReplyTo('example@gmail.com', 'Sender Name'); // to set the reply to

          // Setting the email content
          $mail->IsHTML(true);
          $mail->Subject = "Welcome to Vail Comments";
          $mail->Body = "Welcome to Vail Comments! Receive alerts when your favorite meals are on the menu and express your feeling about the meals being served.  
          
          Your code to log in to Vail Comments is <b>" . $code . "</b>. 
          
          <br>
    
          Visit <a href='vailcomments.com'>vailcomments.com</a>!";
          $mail->AltBody = 'Welcome to Vail Comments! Receive alerts when your favorite meals are on the menu and express your feeling about the meals being served. Your code to log in to Vail Comments is ' . $code . '.';
          $mail->SMTPDebug = 0; //Gets rid of unecessary output
          $mail->send();
          echo "Email message sent.";

      } catch (Exception $e) {
          //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
          echo "
          <script language='Javascript'>
        confirm = confirm('There was an error with your email. Check to make sure it is a valid email address!')
        if (confirm == true) {
          window.location.href='createAccount.html';
        }
        </script>";
      };



      // Add this code to the database  --  move insert_user query to after code is generated

      //Tell the user that a code has been sent to their email
      echo"
        <script language='Javascript'>
        confirm = confirm('Use your gourmet code to log in! You will receive your code via email for future reference')
        if (confirm == true) {
          window.location.href='logIn.html';
        }
        </script>
        ";
    }
  
  ?>