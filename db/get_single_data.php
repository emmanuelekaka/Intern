<?php include('./server.php');
$id = $_POST['id'];
$sql = "SELECT * FROM users WHERE id='$id' LIMIT 1";
$query = mysqli_query($db,$sql);
$row = mysqli_fetch_assoc($query);
echo json_encode($row);
?>
