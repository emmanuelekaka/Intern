<?php
include('./server.php');

if (isset($_POST['submit'])){
    // Values for storing 
    $file = $_FILES['file'];
    $user = $_POST['user'];
    // File Attributes
    $fileError = $_FILES['file']['error'];
    $filename = $_FILES['file']['name'];
    $filetempname = $_FILES['file']['tmp_name'];
    $filesize = $_FILES['file']['size'];
    // Image types
    $allowed = array('jpg', 'jpeg', 'png', 'pdf');
    $fileExt =  explode('.', $filename);
    $fileActualExt = strtolower(end($fileExt));
    if (in_array($fileActualExt,$allowed)){
        if ($fileError === 0){
            // Limiting the file size
            if ($filesize <1000000){
                $fileNew = uniqid('', true)."_".$fileActualExt;
                $destination = '../profile/'.$fileNew;
                move_uploaded_file($filetempname, $destination);
                $sql = "UPDATE `users` SET  `pic`='$fileNew' WHERE username= '$user'";
                $execute =mysqli_query($db,$sql);
                
            }
            header('Location: ../dashboard/userprofile.php');
        }else{
            echo "There was an error uploading the file";
        }
    }else{
        echo "You cannot upload this file type";
    }
}

?>