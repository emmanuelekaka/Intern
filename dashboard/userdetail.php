<?php include_once('./header.php');?>
<div class="stable">
  <div class="filter d-flex mb-3 p-3 bg-light border rounded-2">
    <h4 class="col-8 fw-bolder text-success">User Details</h4>
    <input type="search" placeholder="search" id="search" class="col-4 custom rounded-pill ps-2">
  </div>
  
<table class="table p-3 bg-light border rounded-2">
  <thead>
    <tr>
      
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Referred</th>
      <th scope="col">Account Status</th>
      <th scope="col">User Code</th>
      <th scope="col">Previllages</th>
      <th scope="col">UserDetail</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody id="output">
    
  </tbody>
</table>
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">@View</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body bg-dark ">
                  <table class="table text-light text-center">
                    <tbody>
                      <tr>
                        <th scope="row">Name</th>
                        <td>Taibo</td>
                        
                      </tr>
                      <tr>
                        <th scope="row">Surname</th>
                        <td>taibo</td>
                      </tr>
                      <tr>
                        <th scope="row">Email</th>
                        <td>taibo@gmail.com</td>
                      </tr>
                      <tr>
                        <th scope="row">Referal</th>
                        <td>To04fc</td>
                      </tr>
                      <tr>
                        <th scope="row">Contact</th>
                        <td>0777119929</td>
                      </tr>
                      <tr>
                        <th scope="row">Location</th>
                        <td>Banda</td>
                      </tr>
                      <tr>
                        <th scope="row">Nin</th>
                        <td>CM0006756ADX</td>
                      </tr>
                    </tbody>
                  </table>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a type="button" class="btn btn-primary">Download Details</a>
              </div>
            </div>
          </div>
        </div>
    <div class="adjust" id="adjust">
      <h4 class="fw-bolder text-success p-3 bg-light border rounded-2">ADMIN APPROVAL</h4>
      <p class="querryName display-6 text-primary"></p>
    <table class="table p-3 bg-light border rounded-2">
        <thead>
          
            <tr>
              <th scope="col">Assign Account Status</th>
              <th scope="col">Assign Referal Code</th>
              <th scope="col">Assign administrative  Previllages</th>
              <th scope="col">Save</th>
            </tr>
          </thead>
          <tbody>
            <form action="./updateWzRef.php" method="post">
                <tr>
                    <td>
                      <select class="form-select" name="status">
                        <option selected>select</option >
                        <option value="Active">Active</option>
                        <option value="Suspended">Suspended</option>
                        <option value="Inactive">Inactive</option>
                      </select>
                    </td>
                    <td><div class="generate">
                      <input type="text" class="form-control" placeholder="AX56rY" name="ref"><i class="fa-solid fa-computer-mouse ms-3 text-primary gen"></i>
                    </div></td>
                    <td>
                      <select class="form-select" name="previllage">
                        <option selected>select</option>
                        <option value="user">user</option>
                        <option value="admin">admin</option>
                      </select>
                    </td>
                    <!-- Updating fields to add in referal code. and previllages button -->
                    <td>
                      <input  type="hidden" name = "update" class="updateName">
                      <button type="submit" name= "edit" class="btn btn-transparent" ><i class="fa-solid fa-folder text-primary"></i></button>
                      
                    </td>
                </tr>
              </form>
        </tbody>
    </table>
    </div>
    </div>
    
      
        
      </div>
    







<script src="../js/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
      $.ajax({
                type:'GET',
                url:'../db/search.php',
                success:function(data){
                  $("#output").html(data);
                  
                }
      });
      // Executed during searching of a particular record
      $("#search").keyup(function(){
          $.ajax({
                type:'POST',
                url:'../db/search.php',
                data:{
                  name:$("#search").val(),
                },
                success:function(data){
                  $("#output").html(data);
                  
                }
          });
      });
      
    });
</script>
<script src="../js/adjust.js"></script>
<script src="../js/refer.js"></script>
<?php include_once('./footer.php');?>