<!-- Update complete -->
<?php
$conn = mysqli_connect('localhost', 'root', '','intern');
if($conn){
    if(isset($_POST['edit'])){
        $updatename = trim(stripslashes(mysqli_real_escape_string($conn,$_POST['update'])));
        $status = trim(stripslashes(mysqli_real_escape_string($conn,$_POST['status'])));
        $ref = trim(stripslashes(mysqli_real_escape_string($conn,$_POST['ref'])));
        $previllage = trim(stripslashes(mysqli_real_escape_string($conn,$_POST['previllage'])));
        $sql = "UPDATE  users set  status='$status',referalCode='$ref',adminprevillages='$previllage' WHERE username='$updatename';";
        $execute =mysqli_query($conn,$sql);
        if($execute){
            header("Location: ./useradmin.php");
            
            
        }
        else{
            header('Location: ./useradmin.php');
        }
    }
}else{
    echo "Database connection error";
}
?>