<?php
    require("./inc/dbConnection.php");

    // CHeck to make sure user is present, alert them to create an account first
    $email = $_POST["email"];
    $code = $_POST["code"];

    //Should I check to see if code is correct here?? Or is there some way to check on submit on login page???
    $db_code_query = "SELECT code FROM Users WHERE email = '$email'";
    $result = mysqli_query($conn, $db_code_query);
    $db_code = mysqli_fetch_array($result)[0];
    //$db_code = 'asdf';


    $check_user =
    "SELECT COUNT(*) FROM Users WHERE email = '$email'";

    $result = mysqli_query($conn, $check_user);

    //if count != 0 log the user in, else take them back to login page and alert them
    $count = $row = mysqli_fetch_array($result)[0];

    // Case when the email entered is not associated with an account
    if($count == 0){
      echo"
      <script language='Javascript'>
      confirm = confirm('You don\'t have a swipe (i.e. an Account)! Let\'s create one!')
      if (confirm == true) {
        window.location.href='createAccount.html';
      }
      </script>
      ";

      //result = confirm(question);

      //header("Location: logIn.html");
      //die();
    }

    //Case when email is IN database and code is correct
    elseif ($code == $db_code) {
      //Creating session variables that indicate that the user is logged in
      session_start();
      //Removing any previous session data
      unset($_SESSION["account"]);
      //Setting data for this user
      $_SESSION["account"] = $email;
      $_SESSION["success"] = "Logged in";
      echo"
      <script language='Javascript'>
        //Ask user to accept cookies - store their email
        //Functions from W3 schools tutorial
        function setCookie(cname,cvalue,exdays) {
          const d = new Date();
          d.setTime(d.getTime() + (exdays*24*60*60*1000));
          let expires = 'expires=' + d.toGMTString();
          document.cookie = cname + '=' + cvalue + ';' + expires + ';path=/';
        }

        function getCookie(cname) {
          let name = cname + '=';
          let decodedCookie = decodeURIComponent(document.cookie);
          let ca = decodedCookie.split(';');
          for(let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') {
              c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
              return c.substring(name.length, c.length);
            }
          }
          return '';
        }

        function checkCookie() {
          let user = getCookie('username');
          if (user != '') {
            alert('Welcome again ' + user);
          } else {
             user = prompt('Please enter your name:','');
             if (user != '' && user != null) {
               setCookie('username', user, 30);
             }
          }
        }

        //document.cookie = 'acceptedCookies=;'
        //Cookie deletes when the browser is closed
        //Doesn't matter who logs in as long as they are using the same browser right now
        if(getCookie('acceptedCookies') == ''){
          let answer = confirm ('Accept Scoopies :>')
          if(answer){
            document.cookie = 'acceptedCookies=true'
            document.cookie = 'email=$email'
            window.location.href='vote.php'
          }
        }
        else{
          document.cookie = 'email=$email'
          window.location.href='vote.php'
        }
      </script>
        ";
      //$_SESSION['email']     = $email;
      //header('Location: index.html');
      //die(); //HOW TO SEND THE CURRENT USERS EMAIL TO THE NEXT PAGE !!!!!!!!!!!!!!!!!!!
    }

    //Case when code is wrong but email is in db
    elseif ($code != $db_code){
      echo"
      <script language='Javascript'>
      confirm = confirm('Your code is incorrect. Please retry')
      if (confirm == true) {
        window.location.href='logIn.html';
      }
      </script>
      ";
      //Could change so that it redirects after a certain period of time and display a different message
    }

    //header("Location: logIn.html");
    //die();




  ?>