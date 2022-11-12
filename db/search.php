<?php include('./server.php');?>
<?php
if(empty($_POST['name'])){
    $sql = 'SELECT id,username,email,referal, referalCode,status,adminprevillages from users';
}else{
    $sql = "SELECT id,username,email,referal, referalCode,status,adminprevillages from users where username like '%".$_POST['name']."%'";
}
$result = mysqli_query($db, $sql);
if ($result){      
    $serv =mysqli_fetch_all($result, MYSQLI_ASSOC);
    if (mysqli_num_rows($result)>0){
        foreach($serv as $i){
            echo "
                <tr class = \"min\">
                    <td> ".$i['username']."</td>
                    <td> ".$i['email']."</td>
                    <td> ".$i['referal']."</td>
                    <td> ".$i['status']."</td>
                    <td> ".$i['referalCode']."</td>
                    <td> ".$i['adminprevillages']."</td>
                    <!-- Button trigger modal -->
 
                    <td>
                        <a href=\"useradmin.php?id=".$i['id']."\" class=\"btn btn-success\"data-bs-toggle=\"modal\" data-bs-target=\"#staticBackdrop\">View</a>
                    </td>

                   <td>
                        <a href=\"#adjust\" class=\"edit btn btn-transparent \"><i class=\"fa-solid fa-edit\"></i> <p class=\"d-none toEdit\">".$i['username']."</p></a>
                   </td>

                    <td>
                    <form action=\"./delete.php\" method=\"POST\">
                    <input  type=\"hidden\" name = \"id_del\" value=".$i['id'].">
                        <button type=\"submit\" name= \"delete\" class=\"btn btn-transparent\" ><i class=\"fa-solid fa-trash text-danger\"></i></button>
                    </form>
                    </td>
                </tr>
            "; 
        }    

    }else{
        echo "<h2>Username not available</h2>";
    }
    
    //free results from memory
    mysqli_free_result($result);
    //close database
    mysqli_close($db);
}
?>