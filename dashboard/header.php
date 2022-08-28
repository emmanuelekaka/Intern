<?php include('./auth.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../static/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../static/dash.css" type="text/css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
   
</head>
<body>
    <div class="main">
        <div class="sidebar">
            <div class="side-item1">
                 <i class="fa-solid fa-gauge" id="logo"></i>
                 <p class="p-head">DashBoard</p>
            </div>
            <ul class="side-item2">
               
               
                <li><a href="./statistics">Incomes</a></li>
                <li><a href="./transactions">Businesses Added</a></li>
                
                 <?php if ($_SESSION['previlleges']=="admin"){?>
                    <li><a href="./useradmin">Users</a></li>
                    <li><a href="./adminmore">More</a></li>
                    <li><a href="./adminlogs">Logs</a></li>
                 <?php }?>

            </ul>
            <script src="../js/highlighter.js"></script>
        </div>
        <div class="main_main">
            <div class="header">
                <p><a href="./dashboard.php">AGENT</a></p>
                
                <div>
                    <a href="../login.php" class="logout">Logout</a>
                    <a href="./userprofile.php" class="profile"><i class="fas fa-user" id="icon-logo"></i>Profile</a>

                </div>
                
            </div>
            <div class="main_show">
                <p>Hello <?php echo $_SESSION['username'];?></p>
                <div class="changing">