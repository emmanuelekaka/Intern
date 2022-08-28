<?php
//starting the session
    session_start();
    //unsetting of a Session
    unset($_SESSION['auth']);
    //unsetting the login credentials
    //redirect url
    header('Location:../login.php');
?>