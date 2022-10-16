<?php include('./server.php');?>
<?php
    // echo $_SESSION['username'];
    $named = $_POST['name'];
    $last = $_POST['last'];
    $ref = $_POST['ref'];
    // echo $named;
    // where referal=(SELECT referalCode from users where username='$named')
    if(empty($named)){
        $real = $_POST['real'];
        $start=$real." 00:00:01";
        $end=$last." 00:00:00";
        $sql = "SELECT id,business,contact,Location, daily_sales,time from business where referal = '$ref' AND time BETWEEN '$start' AND '$end';";
        
    }else{
        $start=$named." 00:00:01";
        $end=$last." 00:00:00";
        $sql = "SELECT id,business,contact,Location, daily_sales, time from business WHERE referal = '$ref' AND time BETWEEN '$start' AND '$end';";
                
    }
   
    
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