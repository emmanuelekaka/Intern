<?php include('./header.php');?> 
<link rel="stylesheet" href="../static/css/datatables-1.10.25.min.css" type="text/css">
    <div class="row">
        <div class="container">
            <!-- <div class="btnAdd">
                <a href="#!" data-id="" data-bs-toggle="modal" data-bs-target="#addUserModal" class="btn btn-success btn-sm">Add User</a>
            </div> -->
            <div class="row mt-2 px-1">
                <!-- <div class="col-md-1"></div> -->
                <div class="col-md-12">
                    <table id="example" class="table ">
                    <thead>
                        <th>Id</th>
                        <th>User</th>
                        <th>Email</th>
                        <th>Tel</th>
                        <th>referalCode</th>
                        <th>Admin Privilleges</th>
                        <th>Options</th>
                    </thead>
                    <tbody>
                    </tbody>
                    </table>
                </div>
                <!-- <div class="col-md-1"></div> -->
            </div>
        </div>
    </div>
  <!-- Javascript inclussions in the file system -->
  <script src="../js/jquery.min.js"></script>
  <script src="../static/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="../js/dt-1.10.25datatables.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#example').DataTable({
        "fnCreatedRow": function(nRow, aData, iDataIndex) {
          $(nRow).attr('id', aData[0]);
        },
        'serverSide': 'true',
        'processing': 'true',
        'paging': 'true',
        'order': [],
        'ajax': {
          'url': '../db/fetch_data.php',
          'type': 'post',
        },
        "aoColumnDefs": [{
            "bSortable": false,
            // setting the columns in the table
            "aTargets": [6]
          },

        ]
      });
    });
    
    $(document).on('submit', '#updateUser', function(e) {
      e.preventDefault();
      //var tr = $(this).closest('tr');
      let referalCode = $('#referalCode').val();
      let username = $('#nameField').val();
      let tel = $('#mobileField').val();
      let email = $('#emailField').val();
      let trid = $('#trid').val();
      let id = $('#id').val();
      if (referalCode != '' && username != '' && tel != '' && email != '') {
        $.ajax({
          url: "../db/update_user.php",
          type: "post",
          data: {
            referalCode: referalCode,
            username: username,
            tel: tel,
            email: email,
            id: id
          },
          success: function(data) {
            var json = JSON.parse(data);
            var statu = json.statu;
            if (statu == 'true') {
              // Paginated table
              table = $('#example').DataTable();

              var button = '<td><a href="javascript:void();" data-id="' + id + '" class="btn btn-info btn-sm editbtn">Edit</a>  <a href="#!"  data-id="' + id + '"  class="btn btn-danger btn-sm deleteBtn">Delete</a></td>';
              var row = table.row("[id='" + trid + "']");
              row.row("[id='" + trid + "']").data([id, username, email, tel, referalCode, button]);
              $('#exampleModal').modal('hide');
            } else {
              alert('failed');
            }
          }
        });
      } else {
        alert('Fill all the required fields');
      }
    });
    $('#example').on('click', '.editbtn ', function(event) {
      var table = $('#example').DataTable();
      var trid = $(this).closest('tr').attr('id');
      // console.log(selectedRow);
      var id = $(this).data('id');
      $('#exampleModal').modal('show');

      $.ajax({
        url: "../db/get_single_data.php",
        data: {
          id: id
        },
        type: 'post',
        success: function(data) {
          var json = JSON.parse(data);
          $('#nameField').val(json.username);
          $('#emailField').val(json.email);
          $('#mobileField').val(json.tel);
          $('#referalCode').val(json.referalCode);
          $('#status').val(json.status);
          $('#previlleges').val(json.adminprevillege);
          $('#id').val(id);
          $('#trid').val(trid);
        }
      })
    });

    $(document).on('click', '.deleteBtn', function(event) {
      var table = $('#example').DataTable();
      event.preventDefault();
      var id = $(this).data('id');
      if (confirm("Are you sure want to delete this User ? ")) {
        $.ajax({
          url: "../db/delete_user.php",
          data: {
            id: id
          },
          type: "post",
          success: function(data) {
            var json = JSON.parse(data);
            statu = json.statu;
            if (statu == 'success') {
              //table.fnDeleteRow( table.$('#' + id)[0] );
              //$("#example tbody").find(id).remove();
              //table.row($(this).closest("tr")) .remove();
              $("#" + id).closest('tr').remove();
            } else {
              alert('Failed');
              return;
            }
          }
        });
      } else {
        return null;
      }



    })
  </script>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="updateUser">
            <input type="hidden" name="id" id="id" value="">
            <input type="hidden" name="trid" id="trid" value="">
            <div class="mb-3 row">
              <label for="nameField" class="col-md-3 form-label">Name</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="nameField" name="name">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="emailField" class="col-md-3 form-label">Email</label>
              <div class="col-md-9">
                <input type="email" class="form-control" id="emailField" name="email">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="mobileField" class="col-md-3 form-label">Mobile</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="mobileField" name="mobile">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="referalCode" class="col-md-3 form-label">ReferalCode<i class="fa-solid fa-computer-mouse ms-3 text-primary gen"></i></label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="referalCode" name="ref">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="referalCode" class="col-md-3 form-label">Account Status</label>
              <div class="col-md-9">
                <select class="form-select" name="status" id = "status">
                        <option selected>select</option >
                        <option value="Active">Active</option>
                        <option value="Suspended">Suspended</option>
                        <option value="Inactive">Inactive</option>
                      </select>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="referalCode" class="col-md-3 form-label">Asign Admin previllages</label>
              <div class="col-md-9">
                <select class="form-select" name="previlleges" id ="previlleges">
                        <option selected>select</option>
                        <option value="user">user</option>
                        <option value="admin">admin</option>
                </select>
              </div>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Add user Modal -->
  <!-- <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="addUser" action="">
            <div class="mb-3 row">
              <label for="addUserField" class="col-md-3 form-label">Name</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="addUserField" name="name">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="addEmailField" class="col-md-3 form-label">Email</label>
              <div class="col-md-9">
                <input type="email" class="form-control" id="addEmailField" name="email">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="addMobileField" class="col-md-3 form-label">Tel</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="addMobileField" name="mobile">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="addreferalCode" class="col-md-3 form-label">referalCode</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="addreferalCode" name="referalCode">
              </div>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div> -->
<script src="../js/refer.js"></script>
<?php include_once('./footer.php')?>