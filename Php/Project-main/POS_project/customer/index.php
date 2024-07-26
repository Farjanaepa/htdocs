<?php 
include('connection.php');
include('cus_head.php');
include("../includes/sidebar.php");
include("../includes/nav.php");
?>

    <div class="container-fluid">
        <div class="row">
            <div class="container1">
                <div class="header-container text-center">
                    
                    <div class="btnAdd">
                        <a href="#!" data-id="" data-bs-toggle="modal" data-bs-target="#addUserModal" class="btn btn-dark">Add Customer</a>
                    </div>
                </div>
                <hr>
                <table id="example" class="table">
                    <thead>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="js/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/dt-1.10.25datatables.min.js"></script>

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
                    'url': 'fetch_data.php',
                    'type': 'post',
                },
                "aoColumnDefs": [{
                    "bSortable": false,
                    "aTargets": [5]
                },

                ]
            });
        });
        $(document).on('submit', '#addUser', function(e) {
            e.preventDefault();
            var city = $('#addCityField').val();
            var username = $('#addUserField').val();
            var mobile = $('#addMobileField').val();
            var email = $('#addEmailField').val();
            if (city != '' && username != '' && mobile != '' && email != '') {
                $.ajax({
                    url: "add_user.php",
                    type: "post",
                    data: {
                        city: city,
                        username: username,
                        mobile: mobile,
                        email: email
                    },
                    success: function(data) {
                        var json = JSON.parse(data);
                        var status = json.status;
                        if (status == 'true') {
                            mytable = $('#example').DataTable();
                            mytable.draw();
                            $('#addUserModal').modal('hide');
                        } else {
                            alert('failed');
                        }
                    }
                });
            } else {
                alert('Fill all the required fields');
            }
        });
        $(document).on('submit', '#updateUser', function(e) {
            e.preventDefault();
            //var tr = $(this).closest('tr');
            var city = $('#cityField').val();
            var username = $('#nameField').val();
            var mobile = $('#mobileField').val();
            var email = $('#emailField').val();
            var trid = $('#trid').val();
            var id = $('#id').val();
            if (city != '' && username != '' && mobile != '' && email != '') {
                $.ajax({
                    url: "update_user.php",
                    type: "post",
                    data: {
                        city: city,
                        username: username,
                        mobile: mobile,
                        email: email,
                        id: id
                    },
                    success: function(data) {
                        var json = JSON.parse(data);
                        var status = json.status;
                        if (status == 'true') {
                            table = $('#example').DataTable();
                            var button = '<td><a href="javascript:void();" data-id="' + id + '" class="btn btn-secondary btn-sm editbtn">Edit</a>  <a href="#!"  data-id="' + id + '"  class="btn btn-danger btn-sm deleteBtn">Delete</a></td>';
                            var row = table.row("[id='" + trid + "']");
                            row.row("[id='" + trid + "']").data([id, username, email, mobile, city, button]);
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
                url: "get_single_data.php",
                data: {
                    id: id
                },
                type: 'post',
                success: function(data) {
                    var json = JSON.parse(data);
                    $('#nameField').val(json.username);
                    $('#emailField').val(json.email);
                    $('#mobileField').val(json.mobile);
                    $('#cityField').val(json.city);
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
                    url: "delete_user.php",
                    data: {
                        id: id
                    },
                    type: "post",
                    success: function(data) {
                        var json = JSON.parse(data);
                        status = json.status;
                        if (status == 'success') {
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
                    <h5 class="modal-title" id="exampleModalLabel">Update Customer</h5>
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
                            <label for="cityField" class="col-md-3 form-label">City</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="cityField" name="City">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Add user Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Customer</h5>
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
                            <label for="addMobileField" class="col-md-3 form-label">Mobile</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="addMobileField" name="mobile">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="addCityField" class="col-md-3 form-label">City</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="addCityField" name="City">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <?php 
include("../includes/footer.php");
?>