
<?php

  require_once "../backend/session.php";
  require_once "../backend/config.php";

  if(isset($_POST['delete'])) {

    $id = $_POST['serviceid'];

    $updateQuery = "DELETE from services WHERE serviceID = ?";
    $updateStmt = $con->prepare($updateQuery);

    $updateStmt->bind_param("i", $id);

    if ($updateStmt->execute()) {
        echo '<script>alert("Service Deleted");</script>';
        echo '<script>window.location.href = "services.php";</script>';
    } else {
        echo '<script>alert("Error removing Service");</script>';
    }

    // Close the statement
    $updateStmt->close();
}

  if (!$login || $_SESSION['level'] != 'admin') {

    header('Location: login.php');
    exit();
  
  } else {
  
  
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <title>Beauty Salon - Services</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/xtremeadmin/" />
    <link href="../assets/dashboard/assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="../dist/js/pages/chartist/chartist-init.css" rel="stylesheet">
    <link href="../assets/dashboard/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <link href="../assets/dashboard/assets/libs/c3/c3.min.css" rel="stylesheet">
    <!-- Vector CSS -->
    <link href="../assets/dashboard/assets/libs/jvectormap/jquery-jvectormap.css" rel="stylesheet" />
    <link href="../assets/dashboard/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../dist/css/style.min.css" rel="stylesheet">
    <!-- Data Table -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <?php include('../components/topNavigation.php'); ?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <?php include('../components/sideNavigation.php'); ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <div class="row page-titles">
                <div class="col-md-5 col-12 align-self-center">
                    <h3 class="text-themecolor mb-0">Administrator Dashboard</h3>
                    <ol class="breadcrumb mb-0 p-0 bg-transparent">
                        <li class="breadcrumb-item active">Services</li>
                    </ol>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- Row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body overflow-hidden">
                                <div class="d-flex justify-content-between mb-3"> 
                                    <h4 class="card-title mt-1">Services</h4>
                                    <a class="btn btn-success text-light" data-toggle="modal"
                                        data-target="#primary-header-modal" 
                                        data-item_id='<?php //echo $record['item_id']; ?>' 
                                        data-iid='<?php //echo $record['iid']; ?>'>
                                        <b class="mdi mdi-plus mr-1"></b>Add Service
                                    </a>
                                </div>
                                    <div class="table-responsive">
                                    <table id="file_export" class="table table-bordered display w-100">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th class="text-center">Service</th>
                                                    <th class="text-center">Price</th>
                                                    <th class="text-center">Category</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php include('../backend/fetch_services.php'); ?>
                                        <?php foreach ($records as $record): ?>
                                            <tr>
                                                <td class="text-center"><?php 
                                                    echo 
                                                        '<div class="d-flex align-items-center justify-content-center p-1">
                                                            <span class="">'
                                                                .$record['service'].
                                                            '</span>
                                                        </div>'?>
                                                </td>
                                                <td class="text-center"><?php 
                                                    echo 
                                                        '<div class="d-flex align-items-center justify-content-center p-1">
                                                            <span class="">'
                                                                .$record['price'].
                                                            '</span>
                                                        </div>'?>
                                                </td>
                                                <td class="text-center"><?php 
                                                    echo 
                                                        '<div class="d-flex align-items-center justify-content-center p-1">
                                                            <span class="">'
                                                                .$record['optgroup'].
                                                            '</span>
                                                        </div>'?>
                                                </td>
                                                <td class="text-center"><?php 
                                                    echo '<button type="button" class="btn btn-warning text-light mr-2" id="sa-success" data-toggle="modal"
                                                    data-target="#warning-header-modal" data-id="'.$record['serviceID'].'" data-price="'.$record['price'].'"  data-service="'.$record['service'].'" data-opt="'.$record['optgroup'].'">Edit</button>';
                                                    echo '<button type="button" class="btn btn-danger text-light mr-2" id="sa-success" data-toggle="modal"
                                                    data-target="#danger-header-modal" data-id="'.$record['serviceID'].'">Delete</button>';
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->
            </div>

            <div id="primary-header-modal" class="modal fade" tabindex="-1" role="dialog"
                aria-labelledby="primary-header-modalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header modal-colored-header bg-success">
                            <h4 class="modal-title text-white" id="primary-header-modalLabel">
                                New Service
                            </h4>
                            <button type="button" class="close" data-dismiss="modal"
                                aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                        
                        <h6 class="mt-0">Required Fields(<i class="text-danger">*</i>)</h6>
                            <form class="mt-4" onsubmit="return validateForm()" id="serviceForm">
                                <div class="form-group">
                                    <h6 class="mt-0">Service Name<i class="text-danger">*</i></h6>
                                    <input type="text" class="form-control" name="service_name" id="timestamp"  required>
                                </div>
                                <div class="form-group">
                                    <h6 class="mt-0">Service Price<i class="text-danger">*</i></h6>
                                    <input type="text" class="form-control" name="service_price" id="timestamp" required >
                                </div>
                                <div class="form-group">
                                    <h6 class="mt-0">Service Category<i class="text-danger">*</i></h6>
                                    <input type="text" class="form-control" name="service_optgroup" id="timestamp" required >
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="addService" class="btn btn-success">Add</button>
                                    <button type="button" class="btn btn-light"
                                        data-dismiss="modal">Cancel</button>
                                </div>
                            </form>
                        </div>
                        
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.new request modal -->

            
            <div id="warning-header-modal" class="modal fade" tabindex="-1" role="dialog"
                aria-labelledby="primary-header-modalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header modal-colored-header bg-warning">
                            <h4 class="modal-title text-white" id="primary-header-modalLabel">
                                Edit Service
                            </h4>
                            <button type="button" class="close" data-dismiss="modal"
                                aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                        
                        <h6 class="mt-0">Required Fields(<i class="text-danger">*</i>)</h6>
                            <form class="mt-4" onsubmit="return validateForm()" id="editService">
                                <div class="form-group">
                                    <h6 class="mt-0">Service ID<i class="text-danger">*</i></h6>
                                    <input type="text" class="form-control" name="service_id" id="eservice_id" readonly required>
                                </div>
                                <div class="form-group">
                                    <h6 class="mt-0">Service Name<i class="text-danger">*</i></h6>
                                    <input type="text" class="form-control" name="service_name" id="eservice_name"  required>
                                </div>
                                <div class="form-group">
                                    <h6 class="mt-0">Service Price<i class="text-danger">*</i></h6>
                                    <input type="text" class="form-control" name="service_price" id="eservice_price" required >
                                </div>
                                <div class="form-group">
                                    <h6 class="mt-0">Service Category<i class="text-danger">*</i></h6>
                                    <input type="text" class="form-control" name="service_optgroup" id="eservice_optgroup" required >
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="edit" class="btn btn-warning">Update</button>
                                    <button type="button" class="btn btn-light"
                                        data-dismiss="modal">Cancel</button>
                                </div>
                            </form>
                        </div>
                        
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.new request modal -->

            <div id="danger-header-modal" class="modal fade" tabindex="-1" role="dialog"
                aria-labelledby="danger-header-modalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header modal-colored-header bg-danger">
                            <h4 class="modal-title text-white" id="danger-header-modalLabel">
                                Remove Service
                            </h4>
                            <button type="button" class="close" data-dismiss="modal"
                                aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                        
                            <form class="mt-4" action="" method="POST">
                                <div class="form-group">
                                    
                                <input type="hidden" name="serviceid" id="serviceid">
                                    <p>Are you sure you want to delete this service?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="delete" class="btn btn-danger">Yes</button>
                                    <button type="button" class="btn btn-light"
                                        data-dismiss="modal">No</button>
                                </div>
                            </form>
                        </div>
                        
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.delete dependant modal -->  

            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer">
                © 2024 Beauty Salon Administrator
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <div class="chat-windows"></div>
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/dashboard/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/dashboard/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/dashboard/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="../dist/js/app.min.js"></script>
    <script src="../dist/js/app.init.js"></script>
    <script src="../dist/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../assets/dashboard/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../assets/dashboard/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="../dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- chartist chart -->
    <script src="../assets/dashboard/assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="../assets/dashboard/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <!--c3 JavaScript -->
    <script src="../assets/dashboard/assets/libs/d3/dist/d3.min.js"></script>
    <script src="../assets/dashboard/assets/libs/c3/c3.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../assets/dashboard/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../assets/dashboard/assets/extra-libs/sparkline/sparkline.js"></script>
    <!-- Vector map JavaScript -->
    <script src="../assets/dashboard/assets/libs/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="../assets/dashboard/assets/extra-libs/jvector/jquery-jvectormap-us-aea-en.js"></script>
    <!-- Chart JS -->
    <script src="../dist/js/pages/dashboards/dashboard2.js"></script>
    <!--Custom JavaScript -->
    <script src="../../dist/js/custom.min.js"></script>
    <script src="../assets/libs/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="../assets/extra-libs/sweetalert2/sweet-alert.init.js"></script>
    <!-- DataTables -->
    <script src="../assets/dashboard/assets/libs/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../dist/js/pages/datatable/custom-datatable.js"></script>
    <script src="../dist/js/pages/datatable/datatable-advanced.init.js"></script>

</body>

</html>

<script>

    $('#serviceForm').submit(function (e) {
            e.preventDefault(); 

            var formData = $(this).serialize();

            $.ajax({
                type: 'POST',
                url: '../backend/add-service.php',
                data: formData,
                success: function (response) {
                   
                    if(response != "success") {
                        alert(response);
                    } else {
                        alert("Service Added Successfully");
                        window.location.href = 'services.php';
                    }
                },
                error: function (error) {
                    console.error('Error:', error);
                }
            });
        });

    $('#editService').submit(function (e) {
        e.preventDefault(); 

        var formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: '../backend/edit-service.php',
            data: formData,
            success: function (response) {
                
                if(response != "success") {
                    alert(response);
                } else {
                    alert("Service details updated");
                    window.location.href = 'services.php';
                }
            },
            error: function (error) {
                console.error('Error:', error);
            }
        });
    });

    $('#danger-header-modal').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget);
        
        var id = button.data('id');

        $('#serviceid').val(id);

    });

    

    $('#warning-header-modal').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget);

        var id = button.data('id');
        var serviceName = button.data('service');
        var servicePrice = button.data('price');
        var serviceOpt = button.data('opt');

        $('#eservice_id').val(id);
        $('#eservice_name').val(serviceName);
        $('#eservice_price').val(servicePrice);
        $('#eservice_optgroup').val(serviceOpt);

    });

</script>

<?php 

}

?>