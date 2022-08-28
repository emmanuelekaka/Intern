<?php include_once('./header.php')?>
<?php
$db = mysqli_connect('localhost', 'root', '','intern');
if($db){
    $sql = "SELECT id,business,contact,Location, daily_sales,referal,time from business;";
    $result = mysqli_query($db, $sql);
    if ($result){
        $data = array();
        // Where our data is stored 
        foreach($result as $item){
            $data[] = $item;            
        }
        $serv =mysqli_fetch_all($result, MYSQLI_ASSOC);
        //free results from memory
        mysqli_free_result($result);
        //close database
        mysqli_close($db);
        print json_encode($data);
    }else{
        echo "mysqli_error executing the query";
    }          

}else{
    echo "Error connecting to the database";
}

//deleting
?>