
<?php
$db = mysqli_connect('localhost', 'root', '','intern');


if($db){
    if(isset($_POST['register'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname']; 
        $tel = $_POST['tel'];
        $email = $_POST['email']; 
        $nin = $_POST['nin'];
        $locality = $_POST['locality'];
        
        $referal =  $_POST['referal'] ;
        // $temp = $referal;
        $referal = $referal != '' ? $referal:'self'; 
        $username = $_POST['username']; 
        $passcode = $_POST['passcode']; 
        $passcode = md5($passcode);
        // $test=mysqli_query($db, "SELECT id from users WHERE username = $username");
        // $counter = mysqli_num_rows($test);
        // if($counter==0){
        $sql = "INSERT INTO users(fname, lname, tel, email, nin, locality, referal, username, passcode) VALUES ('$fname','$lname', '$tel', '$email', '$nin', '$locality', '$referal', '$username', '$passcode')";
        echo "Hey";
        if (mysqli_query($db, $sql)){
                header('Location: ./login.php');
        }else{
                echo "Failed";
                echo "mysqli_error:".mysqli_error($db);
        }  

    }
        
             
}else{
    echo "Error connecting .......";
}
?>