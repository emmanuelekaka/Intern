<?php 
include_once('./header.php')?>
<?php
$db = mysqli_connect('localhost', 'root', '','intern');

if($db){
    $named = $_SESSION['username'];
    $sqlit = "SELECT username,email,tel, locality, referal from users where referal=(SELECT referalCode from users where username='$named');";
    if (mysqli_query($db, $sqlit)){
        $result = mysqli_query($db, $sqlit);
        $table =mysqli_fetch_all($result, MYSQLI_ASSOC);
       
        //free results from memory
        mysqli_free_result($result);
        //close database
       
    }

}else{
  echo "server error";
}
  $sql = "SELECT id,business,Contact,Location, daily_sales,referal,time from business;";
  $output = mysqli_query($db, $sql);
  if ($output){
      if (mysqli_num_rows($output)>0){
          $data =mysqli_fetch_all($output, MYSQLI_ASSOC);
          mysqli_free_result($output);
      }
  }
  mysqli_close($db);


?>

<div class="stable p-3">
    <h4 class="text-success mb-2 bg-light border rounded-1 p-2">TRANSACTIONS</h4>
  
    <div class="accordion mb-2" id="accordionExample">
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#call" aria-expanded="false" aria-controls="call">
              <h2>Businesses  Connected</h2>
          </button>
        </h2>
        <div id="call" class="accordion-collapse collapse" aria-labelledby="heading" data-bs-parent="#accordionExample">
          <div class="accordion-body">
          
              <table class="table">
              <thead>
                <tr>
                  <th scope="col" class="text-success  size">Business Name</th>
                  <th scope="col" class="text-success size">Contact</th>
                  <th scope="col" class="text-success size">Location</th>
                  <th scope="col" class="text-success size">Daily Sales</th>
                  <th scope="col" class="text-success size">Performance</th>
                </tr>
              </thead>
              <tbody>
                  
                
                <?php foreach($data as $item):?>
                   <?php if ($_SESSION['ref']==$item['referal']){?>
                    <tr>
                      <th scope="row"><?php echo $item["business"];  ?></th>
                      <td><?php echo $item["Contact"];  ?></td>
                      <td><?php echo $item["Location"];  ?></td>
                      <td><?php echo $item["daily_sales"];  ?></td>
                      <!-- Button trigger modal -->
    
                      <td><a href="" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#perform">performance</a></td>
                    </tr>
                  <?php } ?>
                <?php endforeach;?>
                
                
             
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Modal -->
    <div class="modal fade" id="perform" tabindex="-1" aria-labelledby="performmodal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title  text-success" id="performmodal">Daily Sales</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body ">
            <p class="text-center">Today Sales: Shs.200000</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
    //modal auto load
      $(window).on('load', function() {
        // $('#exampleModal').modal('show');
      });
    </script>


    <div class="accordion mb-2" id="accordionExample">
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              <h2>Agents Referred</h2>
          </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
          <div class="accordion-body">
          
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col"class="text-success  size">Vendor Name</th>
                    <th scope="col"class="text-success  size">Email</th>
                    <th scope="col"class="text-success  size">Location</th>
                    <th scope="col"class="text-success  size">Phone Number</th>
                    <th scope="col"class="text-success  size">Commission</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($table as $i):?>
                      <tr>
                        <th scope="row"><?php echo $i['username'];?></th>
                        <td><?php echo $i['email'];?></td>
                        <td><?php echo $i['locality'];?></td>
                        <td><?php echo $i['tel'];?></td>
                        <td>5000</td>
                      </tr>
                     
                  <?php endforeach;?>
                </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>



  <!-- <div class="bg-light border rounded-1 p-2">
      <h2>Businesses  Connected</h2>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Business Name</th>
            <th scope="col">Contact</th>
            <th scope="col">Location</th>
            <th scope="col">Sales</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">Banda Community Center</th>
            <td>+256783456473</td>
            <td>Banda</td>
            <td>shs.1000000</td>
          </tr>
          <tr>
            <th scope="row">Banda Computer Center</th>
            <td>+256783456473</td>
            <td>Banda</td>
            <td>shs.0</td>
          </tr>
          <tr>
            <th scope="row">Glossam Holdings</th>
            <td>+256783456473</td>
            <td>Banda</td>
            <td>shs.340000</td>
          </tr>
          <tr>
            <th scope="row">7 DAIZ</th>
            <td>+256783456473</td>
            <td>Banda</td>
            <td>shs.300000</td>
          </tr>
          <tr>
            <th scope="row">BAHE</th>
            <td>+256783456473</td>
            <td>Banda</td>
            <td>shs.200000</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="bg-light border rounded-1 p-2 mt-2">
      <h2>Vendors Referred</h2>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Vendor Name</th>
            <th scope="col">Email</th>
            <th scope="col">Location</th>
            <th scope="col">Phone Number</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">Ekaka</th>
            <td>ekaka@gmail.com</td>
            <td>Kyambogo</td>
            <td>+256783456473</td>
          </tr>
          <tr>
            <th scope="row">Timo</th>
            <td>timo@gmail.com</td>
            <td>Kawempe</td>
            <td>+256783456473</td>
          </tr>
          <tr>
            <th scope="row">Bwayo</th>
            <td>bwayo@gmail.com</td>
            <td>Banda</td>
            <td>+256783456473</td>
          </tr>
          <tr>
            <th scope="row">Stark</th>
            <td>stark@gmail.com</td>
            <td>Kireka</td>
            <td>+256783456473</td>
          </tr>
          <tr>
            <th scope="row">Morbious</th>
            <td>morbious@gmail.com</td>
            <td>Kiwatule</td>
            <td>+256783456473</td>
          </tr>
        </tbody>
      </table>
  </div> -->

</div>









<?php include_once('./footer.php')?>