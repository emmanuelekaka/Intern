 <?php
$db = mysqli_connect('localhost', 'root', '','intern');
if($db){
    $sql = "SELECT id,username,email,referal, referalCode,status,adminprevillages from users;";
    if (mysqli_query($db, $sql)){
        $result = mysqli_query($db, $sql);
        $serv =mysqli_fetch_all($result, MYSQLI_ASSOC);
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

//deleting
?>
 <?php foreach($serv as $i):?>
                <tr class="min">
                    <td><?php echo $i['username'];?></td>
                    <td><?php echo $i['email'];?></td>
                    <td><?php echo $i['referal'];?></td>
                    <td><?php echo $i['status'];?></td>
                    <td><?php echo $i['referalCode'];?></td>
                    <td><?php echo $i['adminprevillages'];?></td>
                    <!-- Button trigger modal -->
                    <td><a href="" class="btn btn-success"data-bs-toggle="modal" data-bs-target="#staticBackdrop">View</a> </td>
                    <td><a href="#adjust" class="btn edit text-start"><i class="fa-solid fa-edit"></i> <p class="d-none toEdit"><?php echo $i['username'];?></p></a></td>

                    <td>
                      <form action="./delete.php" method="POST">
                        <input  type="hidden" name = "id_del" value="<?php echo $i['id'];?>">
                        <button type="submit" name= "delete" class="btn btn-transparent" ><i class="fa-solid fa-trash"></i></button>
                      </form>
                     
                      
                    </td>
                </tr>
                
                
            <?php endforeach;?>