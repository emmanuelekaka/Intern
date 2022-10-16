<?php include('./auth.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BCC</title>
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
               
               
                <li><i class="fa fa-money-bill me-2"></i><a href="./statistics">Incomes</a></li>
                <li><i class="fa fa-line-chart me-2"></i><a href="./transactions">Businesses</a></li>
                
                 <?php if ($_SESSION['previlleges']=="admin"){?>
                    <li><i class="fa fa-users me-2"></i><a href="./useradmin">Users</a></li>
                
                    <li><i class="fa fa-angles-right me-2"></i><a href="./adminmore">More</a></li>
                    <li><i class="fa fa-magic-wand-sparkles me-2"></i><a href="./adminlogs">Logs</a></li>
                 <?php }?>
                 <li><i class="fa fa-user me-2"></i><a href="./userprofile.php">Profile</a></li>
                <li><i class="fa fa-sign-out me-2"></i><a href="../login.php">Logout</a></li>

            </ul>
            <script src="../js/highlighter.js"></script>
        </div>
        <div class="main_main">
            <div class="header">
                <p><a href="./dashboard.php">AGENT PANEL</a></p>
                
                <!-- <div>
                    <a href="../login.php" class="logout">Logout</a>
                    <a href="./userprofile.php" class="profile"><i class="fas fa-user" id="icon-logo"></i>Profile</a>

                </div> -->
                
            </div>
            <div class="main_show">
                <p>Hello <?php echo $_SESSION['username'];?></p>
                <div class="changing">