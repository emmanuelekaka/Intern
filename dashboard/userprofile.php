<?php 
include_once('./header.php');
$db = mysqli_connect('localhost', 'root', '','intern');
if($db){
    $named = $_SESSION['username'];
    
    $sql = "SELECT * from users where username='$named';";

    
   
    $result = mysqli_query($db, $sql);
    
    if ($result){
        
        $item =mysqli_fetch_assoc($result);
        
        //free results from memory
        mysqli_free_result($result);
        //close database
        mysqli_close($db);
    }else{
        echo "mysqli_error executing the query";
    }          

}else{
    echo "Error connecting to the database";
}
?>

<link rel="stylesheet" href="../static/profile.css">
<div class="userprofile p-3" >
    <h3 class="text-primary mb-2 p-3 bg-light border rounded-2" >USER PROFILE</h3>
    <div class="userinfor" id="blur">
        <div class="portrait bg-dark">
            <div class="uname rounded-pill display-5 fw-bolder"><?php echo $_SESSION['username'];?></div>
        </div>
        
        <div>
            Phone Number
            <div class="mb-2 fw-bolder dfw"><?php echo htmlspecialchars($item['tel']);?></div>
        </div>
        <div>
            Email
            <div class="mb-2 fw-bolder dfw"><?php echo $item['email'];?></div>
        </div>
        <div>
            NIN
            <div class="mb-2 fw-bolder dfw"><?php echo $item['nin'];?></div>
        </div>
        <div>
            ReferalCode
            <div class="mb-2 fw-bolder dfw"><?php echo $item['referalCode'];?></div>
        </div>
        
        <a id="blur" class="btn btn-primary update" onclick="toggleModal()">Edit</a>
        
    </div>
    <form action="" method="post" class="inv">
        <h1>Edit Your Profile</h1>
        <div class="mb-1">
        <label for="username" class="form-label">Username</label>
        <input type="string" class="form-control" id="username" value="<?php echo $_SESSION['username'];?>">
        </div>
        <div class="mb-1">
        <label for="exampleFormControlInput1" class="form-label">Email</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" value="<?php echo $item['email'];?>">
        </div>
        <div class="mb-1">
        <label for="number" class="form-label">PhoneNumber</label>
        <input type="string" class="form-control" id="number" value="<?php echo $item['tel'];?>">
        </div>
        <div class="mb-1">
        <label for="nin" class="form-label">NIN</label>
        <input type="string" class="form-control" id="nin" value="<?php echo $item['nin'];?>">
        </div>
        <a href="" class="btn btn-primary update">update</a>
        <a href="" class="btn btn-secondary ms-5 update">Cancel</a>
    </form>



</div>
<script type="text/javascript">
    const inv = document.querySelector('.inv')

    const toggleModal = ()=>{
        const blur = document.getElementById('blur');
        blur.style.filter = "blur(20px)"
        inv.style.display="initial"   
    }
</script>






<?php include_once('./footer.php')?>