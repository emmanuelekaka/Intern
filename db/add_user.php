<?php 
include('./server.php');
$username = $_POST['username'];
$email = $_POST['email'];
$tel = $_POST['mobile'];
$referalCode = $_POST['referalCode'];

$sql = "INSERT INTO `users` (`username`,`email`,`tel`,`referalCode`) values ('$username', '$email', '$tel', '$referalCode' )";
$query= mysqli_query($con,$sql);
$lastId = mysqli_insert_id($con);
if($query ==true)
{
   
    $data = array(
        'status'=>'true',
       
    );

    echo json_encode($data);
}
else
{
     $data = array(
        'status'=>'false',
      
    );

    echo json_encode($data);
} 

?>