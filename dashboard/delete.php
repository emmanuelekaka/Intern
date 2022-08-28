<!-- Deletion complete -->
<?php
$conn = mysqli_connect('localhost', 'root', '','intern');
if($conn){
    if(isset($_POST['delete'])){
        $id_del = mysqli_real_escape_string($conn,$_POST['id_del']);
        echo $id_del."</br>";
        $sql = "DELETE FROM users WHERE id=$id_del;";
        $execute =mysqli_query($conn,$sql);
        if($execute){
            header("Location: ./useradmin.php");
        }
        else{
            echo "Error executing a delete command";
        }
    }
}else{
    echo "Error connecting to the database.";
}
?>