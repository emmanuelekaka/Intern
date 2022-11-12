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
    <h3 class="text-primary mb-2 p-3 bg-light border rounded-2" >@c USER PROFILE</h3>
    <div class="userinfor" id="blur">
        <div class="portrait mb-3">
            <img src="../profile/<?php echo $item['pic'] ;?>" alt="">
            <!-- <script>
                console.log(document.queryselector('.portrait>img').src);
            </script> -->
            
        </div>
        
        <form action="../db/upload.php" method="post" enctype="multipart/form-data" class="border w-50 p-2 mb-3">
            <input type="file" class="mb-2 form-control " name="file" >
            <input type="hidden" name="user" value="<?php echo $_SESSION['username'];?>">
            <button type="submit" class="btn btn-primary upto" name="submit">set</button>
        </form>
        <div class="row w-50">
            <div class="col">
                 Phone Number
                <div class="mb-2 fw-bolder dfw"><?php echo htmlspecialchars($item['tel']);?></div>
            </div>
            <div class="col">
                Email
                <div class="mb-2 fw-bolder dfw"><?php echo $item['email'];?></div>
            </div>
        </div>
        <div class="row w-50">
            <div class="col">
                 NIN
            <div class="mb-2 fw-bolder dfw"><?php echo $item['nin'];?></div>
            </div>
            <div class="col">
                ReferalCode
            <div class="mb-2 fw-bolder dfw"><?php echo $item['referalCode'];?></div>
            </div>
        </div>
        
        <a id="blur" class="btn btn-primary update" onclick="toggleModal()">Edit</a>
        
    </div>


    <!-- Form for editing user inputs -->
    <form action="" method="post" class="inv">
        <h1>Change Password</h1>
        <h1>@<?php echo $_SESSION['username'];?></h1>
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