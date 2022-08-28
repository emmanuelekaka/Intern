<?php
    session_start();
        
    if ($_SESSION['auth'] == 'authentic'){
        
       //pass
    } 
    else{
        $_SESSION['message'] =='$password'.'and'.'username';
        header('Location:../login.php');
    }
?>