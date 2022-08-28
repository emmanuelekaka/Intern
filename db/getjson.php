<?php include('./server.php');?>
<?php
    $sql = "SELECT id,business,contact,Location, daily_sales,referal,time from business;";
    $result = mysqli_query($db, $sql);
    if ($result){
        $data = array();
        // Where our data is stored
        foreach($result as $item){
            $data[] = $item;            
        }
        //free results from memory
        mysqli_free_result($result);
        //close database
        mysqli_close($db);
        $dbase = json_encode($data);
        echo $dbase;
    }else{
        echo "mysqli_error executing the query";
    }          


?>