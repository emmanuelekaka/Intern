<?php
session_start();
$db = mysqli_connect('localhost', 'root', '','intern');
if($db){
    //if tap on submit
    if(isset($_POST['submit'])){
        //This fetches the fields input in the form
        $username = mysqli_real_escape_string($db,$_POST['username']);
        $password = md5(mysqli_real_escape_string($db,$_POST['password']));
        $_SESSION['pass'] = $password;
        //sql querry to search for the presence of the user in the database
        $sql = "SELECT * from users WHERE username = '$username' AND passcode='$password';";
        // $previlleges = "SELECT adminprevillages from users WHERE username = '$username' AND passcode='$password';";
        //This fetches the results as a result of the querry to the database
        $result = mysqli_query($db, $sql);
        $row =mysqli_fetch_assoc($result);
        $prev = $row['adminprevillages'];
        

        //This counts the number of rows fetched
        $count = mysqli_num_rows($result);
        //session for authentication
        // $_SESSION['counter'] = $count;
        $_SESSION['auth'] = '';
        

        //the if statement is to check whether there is only one user associated to the username and password
        if ($count==1){
            $_SESSION['username'] = $row['username'];
            $_SESSION['ref'] = $row['referalCode'];
            $_SESSION['auth'] = 'authentic';
            $_SESSION['previlleges'] = $prev;
            
            //redirect url for successful login.
            header('Location: ./dashboard/dashboard.php');
        }else{
            //redirect url incase of an error 
            
            header('Location: ./login.php');
                
        }          
    }
}else{
    //failure to open the server
    echo "Error connecting to the database";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGONTO</title>
    <link rel="stylesheet" href="./static/main.css" type="text/css">
</head>
<body>
    <!-- container for logging in -->
    <!-- Here errors during signing in like wrong values are not covered -->
   
    <div class="container">
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" autocomplete="off" id="form">
            
            <div class="error">
        
            </div>
            <fieldset>
                <legend><h2>VENDOR LOGIN</h2> </legend>  
            <div class="login">
                <label for="username">Username</label>
                <input type="text" name="username" placeholder="johnDoe" id="username">
            </div>
            <div class="login">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" id="password">
            </div>
            <div class="butt">
                <input type="submit" role="action" href="register.php" value="Login" name="submit">
                <a href="./register.php" class="register">Register</a>
                <a href="">Forgot password</a>
            </div>
            </fieldset>
        </form>
        </div>
        <script src="./js/validation.js"></script>
        <!-- container for logging in -->
</body>
</html>