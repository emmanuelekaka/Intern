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
<!-- Default user profile -->
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


    <!-- Form for editing user inputs -->
    <form action="" method="post" class="inv">
        <h1>Edit Your Profile</h1>
        <!-- Username update -->
        <div class="mb-1">
            <label for="username" class="form-label">Username</label>
            <input type="string" class="form-control" id="username" value="<?php echo $_SESSION['username'];?>">
        </div>
        <!-- Old password -->
        <div class="mb-1">
            <label for="exampleFormControlInput1" class="form-label">Old Password</label>
            <input type="email" class="form-control" id="exampleFormControlInput1">
        </div>
         <!-- New password -->
        <div class="mb-1">
            <label for="exampleFormControlInput1" class="form-label">New Password</label>
            <input type="email" class="form-control" id="exampleFormControlInput1">
        </div>
         <!-- New password -->
        <div class="mb-1">
            <label for="exampleFormControlInput1" class="form-label">Confirm Password</label>
            <input type="email" class="form-control" id="exampleFormControlInput1">
        </div>
         <!-- Submit -->
        <button type="submit" name="submitedit" class="btn btn-primary update">update</button>
        <a href="" class="btn btn-secondary ms-5 update">Cancel</a>
    </form>



</div>
<!-- Styling in javascript that blurs out the page to show the updating page -->
<script type="text/javascript">
    const inv = document.querySelector('.inv')

    const toggleModal = ()=>{
        const blur = document.getElementById('blur');
        blur.style.filter = "blur(20px)"
        inv.style.display="initial"   
    }
</script>






<?php include_once('./footer.php')?>