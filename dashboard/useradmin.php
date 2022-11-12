<?php include_once('./header.php');?>
<?php
$db = mysqli_connect('localhost', 'root', '','intern');

if($db){
    if (isset($_GET['id'])){
      $id = mysqli_real_escape_string($db, $_GET['id']);
      // echo $id;
      // Querying single fields of uername and reference
      $namelite = "SELECT username,referalCode from users where id='$id';";
      $ref = "SELECT referalCode from users where id='$id';";
      $user = mysqli_query($db, $namelite);
      $userquery = mysqli_query($db, $ref);
      $userdt = '';
      $userref = '';
      // convertuing the querried into strings
      $userdt =  $user->fetch_array()[0];
      $userref =  $userquery->fetch_array()[0];

      $sqlit = "SELECT username, email,tel, locality, referal from users where referal=(SELECT referalCode from users where id='$id');";
      if (mysqli_query($db, $sqlit)){
        $result = mysqli_query($db, $sqlit);
        $table =mysqli_fetch_all($result, MYSQLI_ASSOC);
        //free results from memory
        mysqli_free_result($result);
        //close database 
      }
      $sql = "SELECT id, business, Contact, Location, daily_sales, referal,time from business WHERE  referal = (SELECT referalCode from users where id='$id');";
      $output = mysqli_query($db, $sql);
      // print_r($output);
      if ($output){
        if (mysqli_num_rows($output)>0){
            $data =mysqli_fetch_all($output, MYSQLI_ASSOC);
            mysqli_free_result($output);
        }else{
          $data = null;
        }
      }
    }
}else{
  echo "server error";
}
 
  mysqli_close($db);
?>
<div class="ref d-none" ><?php echo $_SESSION['ref'];?></div>
<div class="stable">
  <div class="filter d-flex mb-3 p-3 bg-light border rounded-2">
    <h4 class="col-8 fw-bolder text-success">@<?php echo $userdt;?> User Details</h4>
  </div>
  <!-- Transactions -->
  
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
                  
                <!-- Fetching data to display on the interface. -->
                <?php if($data):?>
               
                <?php foreach($data as $item):?>
                    <tr>
                      <th scope="row"><?php echo $item["business"];  ?></th>
                      <td><?php echo $item["Contact"];  ?></td>
                      <td><?php echo $item["Location"];  ?></td>
                      <td><?php echo $item["daily_sales"];  ?></td>
                      <!-- Button trigger modal -->
    
                      <td><a href="" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#perform">performance</a></td>
                    </tr>
                <?php endforeach;?>
                <?php endif;?>
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Business Transactions -->
    <div class="accordion mb-2" id="accordionExample">
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#stat" aria-expanded="false" aria-controls="stat">
              <h2>Businesses  Statistics</h2>
          </button>
        </h2>
        <div id="stat" class="accordion-collapse collapse" aria-labelledby="heading" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <div class="barchart">

            <div  class="mb-2 p-2 bg-light border rounded-2 d-flex justify-content-between">
                <h4 >Line Graph</h4>
                <input type="search" name="month" id="month" class="getdb px-2 me-1" style="width:200px;border-radius:6px; outline:none;" placeholder="2022/08 (yyyy/mm)">
            </div>
            <canvas id="dream"class="charts mb-2 p-3 bg-light border rounded-2" >
            </canva>

        </div>
          
              
                  
          </div>
        </div>
      </div>
    </div>


  <!-- connected -->
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
    <!-- connected -->



</div>
<script src="../js/chart.min.js"></script>

<script src="../js/jquery.min.js"></script>
<script src="../js/line.js"></script>
<script src = "../static/js/bootstrap.bundle.min.js"></script>
<?php include_once('./footer.php');?>