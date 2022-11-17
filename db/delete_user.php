<?php 
include('./server.php');

$user_id = $_POST['id'];
$sql = "UPDATE users SET status='Suspended'WHERE id='$user_id'";
$delQuery =mysqli_query($db,$sql);
if($delQuery==true)
{
	 $data = array(
        'statu'=>'success',
       
    );

    echo json_encode($data);
}
else
{
     $data = array(
        'statu'=>'failed',
      
    );

    echo json_encode($data);
} 

?>