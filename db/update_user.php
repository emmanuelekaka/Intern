<?php 
include('./server.php');
$username = $_POST['username'];
$email = $_POST['email'];
$tel = $_POST['mobile'];
$referalCode = $_POST['referalCode'];
$adminprevillages = $_POST['adminprevillages'];
$status = $_POST['status'];
$id = $_POST['id'];

$sql = "UPDATE `users` SET  `username`='$username' , `email`= '$email', `tel`='$mobile', `status`='$status',`adminprevillege`='$adminprevillege',`referalCode`='$referalCode' WHERE id='$id' ";
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