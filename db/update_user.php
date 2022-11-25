<?php 
include('./server.php');
$uname = $_POST['uname'];
$email = $_POST['email'];
$tel = $_POST['mobile'];
$referalCode = $_POST['referalCode'];
$adminprevillages = $_POST['adminprevillages'];
$status = $_POST['status'];
$id = $_POST['id'];

$sql = "UPDATE `users` SET  `username`='$uname' , `email`= '$email', `tel`='$mobile', `status`='$status',`adminprevillege`='$adminprevillege',`referalCode`='$referalCode' WHERE id='$id' ";
$query= mysqli_query($db,$sql);
$lastId = mysqli_insert_id($db);
if($query ==true)
{
   
    $data = array(
        // renamed status statu to avoid collision with the database field.
        'statu'=>'true',
       
    );

    echo json_encode($data);
}
else
{
     $data = array(
        'statu'=>'false',
      
    );

    echo json_encode($data);
} 

?>