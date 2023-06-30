<?php
    session_start();
    //Wipes out all key value pairs of a given session
    session_destroy();
    header("Location: logIn.html");
    die();
?>
