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
            <!-- Links for navigating between pages. -->
            <ul class="side-item2">
               
               <?php if ($_SESSION['previlleges']=="user"){?>
                <li><a href="./statistics"><i class="fa fa-money-bill me-sm-0 me-md-2"></i><span class="span-name">Incomes</span></a></li>
                <li><a href="./transactions"><i class="fa fa-line-chart me-sm-0 me-md-2"></i><span class="span-name">Businesses</span></a></li>
                <?php }?>
                
                 <?php if ($_SESSION['previlleges']=="admin"){?>
                    <!-- user link -->
                    <li><a href="./adminuserdetail"><i class="fa fa-users me-sm-0 me-md-2"></i><span class="span-name">Users</span></a></li>
                    <!-- User Detail link -->
                    <!-- <li><i class="fa fa-user me-2"></i><a href="./useradmin">UserDetail</a></li> -->
                    <!-- more link -->
                    <li><a href="./adminmore"><i class="fa fa-angles-right me-sm-0 me-md-2"></i><span class="span-name">More</span></a></li>
                    <!-- User logs link -->
                    <li><a href="./adminlogs"><i class="fa fa-magic-wand-sparkles me-sm-0 me-md-2"></i><span class="span-name">Logs</span></a></li>
                 <?php }?>
                 <!-- profile link -->
                 <li><a href="./userprofile.php"><i class="fa fa-user me-sm-0 me-md-2"></i><span class="span-name">Profile</span></a></li>
                 <!-- Logout link -->
                <li><a href="../login.php"><i class="fa fa-sign-out me-sm-0 me-md-2"></i><span class="span-name">Logout</span></a></li>

            </ul>
            <!-- Links for navigating between pages. -->

            <script src="../js/highlighter.js"></script>
        </div>
        <div class="main_main">
            <div class="header">
                <i class="fa fa-bars fs-4 me-5" id="controller"></i>
                <a href="./dashboard.php">AGENT PANEL</a>
                
                
                
            </div>
            <div class="main_show">
                <p>Hello <?php echo $_SESSION['username'];?></p>
                <div class="changing">