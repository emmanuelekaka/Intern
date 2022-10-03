
<?php
include('./db/registerdBcon.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./fontawesome/css/all.min.css">
    <link rel="stylesheet" href="./fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="./static/register.css" type="text/css">
    <link rel="stylesheet" href="./static/css/bootstrap.min.css" type="text/css">
</head>
<body>
    <div class="navbar">
        <h2>VENDOR REGISTRATION</h2>
        <div>
            <a href="./login.php">Login</a>
            <a href="./register.php">Register</a>
        </div>
    </div>

    <div class="cont">
        <div class="error"></div>
        
        <form action="<?php $_SERVER['PHP_SELF']?>" method="post" autocomplete="off" id= "register">
            
            <div class="set">
                <div class="set-item">
                    <label for="fname">Firstname*</label>
                    <input type="text" name="fname" placeholder="John">
                    <div class="empty"></div>
                </div>
                <div class="set-item">
                    <label for="lname">LastName*</label>
                    <input type="text" name="lname" id="lname" placeholder="Mukisa">
                    <div class="empty"></div>
                </div>
            </div>
            
            <div class="set">
                <div class="set-item">
                    <label for="tel">Tel*</label>
                    <input type="text" name="tel" placeholder="+256777777777" id="tel">
                    <div class="empty"></div>
                </div>
                <div class="set-item">
                    <label for="email">Email *</label>
                    <input type="email" name="email" id="email" placeholder="john@gmail.com">
                    <div class="empty"></div>
                </div>
            </div>
            <div class="set">
                <div class="set-item">
                    <label for="nin">NIN *</label>
                    <input type="string" name="nin" placeholder="CM90002334DAIX1D" id="nin" >
                    <div class="empty"></div>
                </div>
                <div class="set-item">
                    <label for="referal">Referal Code</label>
                    <input type="text" name="referal" id="referal" placeholder="12Ax92" id="referal">
                    
                </div>
            </div>
            <div class="set">
                <div class="whole-row">
                    <label for="locality">Location *</label>
                    <input type="text" name="locality" placeholder="Banda" id="locality" class="in-whole">
                    <div class="empty"></div>
                </div>
            </div>
            <div class="set">
                <div class="set-item">
                    <label for="username">Username *</label>
                    <input type="text" name="username" placeholder="Drekali">
                    <div class="empty"></div>
                </div>
                <div class="set-item">
                    <label for="passcode">Password *</label>
                    <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-user-lock"></i></span>
                            <input type="password" class="form-control" id="passcode" placeholder="12qE4t" name="passcode">
                    </div>
                    <!-- <input type="password" name="passcode" id="passcode"> -->
                    <div class="empty"></div>
                    
                </div>
            </div>
            <div class="set-item">
                <input type="submit" value="Register" name="register" role="button" class="reg-but">
            </div>
            
            <h6 class="errornumber"></h6>
           
        
        </form>
        </div>
        <script src="./js/registervalidation.js"></script>
    
</body>
</html>