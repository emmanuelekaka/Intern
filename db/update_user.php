<?php 
include('./server.php');
$username = $_POST['username'];
$email = $_POST['email'];
$tel = $_POST['mobile'];
$referalCode = $_POST['referalCode'];
$id = $_POST['id'];

$sql = "UPDATE `users` SET  `username`='$username' , `email`= '$email', `tel`='$mobile',  `referalCode`='$referalCode' WHERE id='$id' ";
$query= mysqli_query($db,$sql);
$lastId = mysqli_insert_id($db);
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