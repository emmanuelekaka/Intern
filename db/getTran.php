<?php include('./server.php');?>
<?php
    $sql = "SELECT id,business,contact,Location, daily_sales,referal,time from business;";
    $result = mysqli_query($db, $sql);
    if ($result){
        if (mysqli_num_rows($result)>0){
            $serv =mysqli_fetch_all($result, MYSQLI_ASSOC);
            mysqli_free_result($result);
            foreach($serv as $i){
                echo "
                    <tr class = \"border rounded-2 mb-2\">
                        <td> ".$i['business']."</td>
                        <td> ".$i['contact']."</td>
                        <td> ".$i['Location']."</td>
                        <td> ".$i['daily_sales']."</td>
                        
                        <td><a href=\"\" class=\"btn btn-dark\" data-bs-toggle=\"modal\" data-bs-target=\"#perform\">performance</a></td>
                    </tr>
                "; 
            }
            mysqli_free_result($result);
        }else{
            echo "<tr>No businesses Found</tr>";
        }  
    }else{
        echo "Server timed out";
    }          


?>