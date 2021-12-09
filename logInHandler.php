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
    $email = $_POST["email"];


    $check_user =
    "SELECT COUNT(*) FROM Users WHERE email = '$email'";

    $result = mysqli_query($conn, $check_user);

    //if count != 0 log the user in, else take them back to login page and alert them
    $count = $row = mysqli_fetch_array($result)[0];

    //THIS ISN"T WORKING ON CREATE ACCOUNT!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!1
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

    //ELSE SEND USER TO THE VOTE PAGE -- INlUDE THEIR INFO IN POST ???
    else{
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
            window.location.href='index.html'
          }
        }
        else{
          document.cookie = 'email=$email'
          window.location.href='index.html'
        }
      </script>
        ";
      //session_start();
      //$_SESSION['email']     = $email;
      //header('Location: index.html');
      //die(); //HOW TO SEND THE CURRENT USERS EMAIL TO THE NEXT PAGE !!!!!!!!!!!!!!!!!!!
    };

    //header("Location: logIn.html");
    //die();




  ?>


</body>
</html>
