
<?php

  require_once "../backend/session.php";
  require_once "../backend/config.php";

  
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('../backend/PHPMailer/Exception.php');
require('../backend/PHPMailer/SMTP.php');
require('../backend/PHPMailer/PHPMailer.php');
$mail = new PHPMailer(true);
  
  if(isset($_POST['approve'])) {

    $id = $_POST['apptida'];
    $email = $_POST['emaila'];
    $date = $_POST['dta'];
    $time = $_POST['tma'];

    $updateQuery = "UPDATE appointments SET status = 'approved' WHERE appointmentID = ?";
    $updateStmt = $con->prepare($updateQuery);

    $updateStmt->bind_param("i", $id);

    if ($updateStmt->execute()) {

        try {
    
            $resetcode = substr(str_shuffle(str_repeat($x='0123456789', ceil(6/strlen($x)) )),1,6);
            $mail->isSMTP();                                           
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'mmrbeautysalon@gmail.com';
            $mail->Password   = 'mavbqtmeisttayrs';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;
        

            $mail->setFrom('mmrbeautysalon@gmail.com', 'Beauty Salon - No Reply');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Appointment Request';
            $mail->Body    = '';
            $mail->Body .=
            "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
            <html dir='ltr' xmlns='http://www.w3.org/1999/xhtml'>
            
            <head>
                <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
                <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
                <link rel='icon' type='image/png' sizes='16x16' href='../assets/images/favicon.png'>
                <title>ECareNet - Appointment</title>
                <style>
                    body {
                        margin: 0;
                        font-family: Arial, sans-serif;
                        line-height: 1.6;
                        color: #514d6a;
                    }
            
                    .container {
                        background-color: #f8f9fa;
                        max-width: 100%;
                        margin-top: 5%;
                    }
            
                    .header {
                        background-color: #f8f9fa;
                        padding: 20px;
                        text-align: center;
                    }
            
                    .header img {
                        height: 60px;
                        width: 210px;
                    }
            
                    .section {
                        background-color: #007bff;
                        color: #fff;
                        padding: 10px;
                        text-align: center;
                    }
            
                    .content {
                        background-color: #f8f9fa;
                        padding: 40px;
                    }
            
                    .content p {
                        margin-bottom: 20px;
                    }
            
                    .content strong.text-primary {
                        color: #007bff;
                    }
            
                    .content strong.text-success {
                        color: #28a745;
                    }
            
                    .appointment-details {
                        background-color: #fff;
                        padding: 20px;
                        margin-top: 20px;
                    }
            
                    .appointment-details header {
                        font-weight: bold;
                    }
            
                    .list-unstyled {
                        list-style: none;
                        padding: 0;
                        margin: 0;
                    }
            
                    .list-group {
                        margin-bottom: 0;
                        padding-left: 0;
                    }
            
                    .list-group-item {
                        position: relative;
                        display: block;
                        padding: 0.75rem 1.25rem;
                        margin-bottom: -1px;
                        background-color: #fff;
                        border: 1px solid rgba(0, 0, 0, 0.125);
                    }
                </style>
            </head>
            
            <body>
                <div class='container'>
                    <div class='header' style='background-color: #f8f9fa; padding: 20px; text-align: center;'>
                    </div>
                    <div class='section' style='background-color: #a55cc2; color: #fff; padding: 30px; text-align: center;'>
                        <strong>Appointment Request</strong>
                    </div>
                    <div class='content' style='background-color: #f8f9fa; padding: 40px;'>
                        <p style='margin-bottom: 20px;'>
                            <b>Good day!</b>
                        </p>
                        
                        <div class='appointment-details' style='background-color: #fff; padding: 20px; margin-top: 20px;'>
                            <p style='margin-bottom: 20px;'>Your appointment request on <strong style='color: #a55cc2;'>$date, $time</strong> has been <strong style='color: #488614;'>APPROVED</strong>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </body>
            
            </html>";

            if($mail->send()) {

                echo '<script>alert("Appointment Approved");</script>';
                echo '<script>window.location.href = "approved.php";</script>';

            }

    
        } catch (Exception $e) {
            
        }

        
    } else {
        echo '<script>alert("Error removing Service");</script>';
    }

    $updateStmt->close();
}


if(isset($_POST['reject'])) {

    $id = $_POST['apptidr'];
    $email = $_POST['emailr'];
    $date = $_POST['dtr'];
    $time = $_POST['tmr'];

    $updateQuery = "UPDATE appointments SET status = 'rejected' WHERE appointmentID = ?";
    $updateStmt = $con->prepare($updateQuery);

    $updateStmt->bind_param("i", $id);

    if ($updateStmt->execute()) {

        try {
    
            $resetcode = substr(str_shuffle(str_repeat($x='0123456789', ceil(6/strlen($x)) )),1,6);
            $mail->isSMTP();                                           
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'mmrbeautysalon@gmail.com';
            $mail->Password   = 'mavbqtmeisttayrs';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;
        

            $mail->setFrom('mmrbeautysalon@gmail.com', 'Beauty Salon - No Reply');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Appointment Request';
            $mail->Body    = '';
            $mail->Body .=
            "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
            <html dir='ltr' xmlns='http://www.w3.org/1999/xhtml'>
            
            <head>
                <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
                <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
                <link rel='icon' type='image/png' sizes='16x16' href='../assets/images/favicon.png'>
                <title>ECareNet - Appointment</title>
                <style>
                    body {
                        margin: 0;
                        font-family: Arial, sans-serif;
                        line-height: 1.6;
                        color: #514d6a;
                    }
            
                    .container {
                        background-color: #f8f9fa;
                        max-width: 100%;
                        margin-top: 5%;
                    }
            
                    .header {
                        background-color: #f8f9fa;
                        padding: 20px;
                        text-align: center;
                    }
            
                    .header img {
                        height: 60px;
                        width: 210px;
                    }
            
                    .section {
                        background-color: #007bff;
                        color: #fff;
                        padding: 10px;
                        text-align: center;
                    }
            
                    .content {
                        background-color: #f8f9fa;
                        padding: 40px;
                    }
            
                    .content p {
                        margin-bottom: 20px;
                    }
            
                    .content strong.text-primary {
                        color: #007bff;
                    }
            
                    .content strong.text-success {
                        color: #28a745;
                    }
            
                    .appointment-details {
                        background-color: #fff;
                        padding: 20px;
                        margin-top: 20px;
                    }
            
                    .appointment-details header {
                        font-weight: bold;
                    }
            
                    .list-unstyled {
                        list-style: none;
                        padding: 0;
                        margin: 0;
                    }
            
                    .list-group {
                        margin-bottom: 0;
                        padding-left: 0;
                    }
            
                    .list-group-item {
                        position: relative;
                        display: block;
                        padding: 0.75rem 1.25rem;
                        margin-bottom: -1px;
                        background-color: #fff;
                        border: 1px solid rgba(0, 0, 0, 0.125);
                    }
                </style>
            </head>
            
            <body>
                <div class='container'>
                    <div class='header' style='background-color: #f8f9fa; padding: 20px; text-align: center;'>
                    </div>
                    <div class='section' style='background-color: #a55cc2; color: #fff; padding: 30px; text-align: center;'>
                        <strong>Appointment Request</strong>
                    </div>
                    <div class='content' style='background-color: #f8f9fa; padding: 40px;'>
                        <p style='margin-bottom: 20px;'>
                            <b>Good day!</b>
                        </p>
                        
                        <div class='appointment-details' style='background-color: #fff; padding: 20px; margin-top: 20px;'>
                            <p style='margin-bottom: 20px;'>Your appointment request on <strong style='color: #a55cc2;'>$date, $time</strong> has been <strong style='color: #cc2d28;'>REJECTED</strong>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </body>
            
            </html>";

            if($mail->send()) {

                echo '<script>alert("Appointment Rejected");</script>';
                echo '<script>window.location.href = "rejected.php";</script>';
                
            }

    
        } catch (Exception $e) {
            
        }
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
    <title>Beauty Salon - Appointments</title>
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
                        <li class="breadcrumb-item active">Appointments</li>
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
                                    <h4 class="card-title mt-1">Appointment Requests ( Pending Requests )</h4>
                                </div>
                                    <div class="table-responsive">
                                    <table id="file_export" class="table table-bordered display w-100">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th class="text-center">Name</th>
                                                    <th class="text-center">Service</th>
                                                    <th class="text-center">Contact Number</th>
                                                    <th class="text-center">Appointment Date</th>
                                                    <th class="text-center">Appointment Time</th>
                                                    <th class="text-center">Status</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php include('../backend/fetch_pending.php'); ?>
                                        <?php foreach ($records as $record): ?>
                                            <tr>
                                                <td class="text-center"><?php 
                                                    echo 
                                                        '<div class="d-flex align-items-center justify-content-center p-1">
                                                            <span class="">'
                                                                .$record['firstname']." ".$record['lastname'].
                                                            '</span>
                                                        </div>'?>
                                                </td>
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
                                                                .$record['phone'].
                                                            '</span>
                                                        </div>'?>
                                                </td>
                                                <td class="text-center"><?php 
                                                    echo 
                                                        '<div class="d-flex align-items-center justify-content-center p-1">
                                                            <span class="">'
                                                                .$record['date'].
                                                            '</span>
                                                        </div>'?>
                                                </td>
                                                <td class="text-center"><?php 
                                                    echo 
                                                        '<div class="d-flex align-items-center justify-content-center p-1">
                                                            <span class="">'
                                                                .$record['time'].
                                                            '</span>
                                                        </div>'?>
                                                </td>
                                                <td class="text-center"><?php 
                                                    echo 
                                                        '<div class="d-flex align-items-center justify-content-center p-1">
                                                            <span class="">
                                                                <b class="badge badge-pill '
                                                                .($record['status'] == 'pending' ? 'badge-warning' : ($record['status'] == 'approved' ? 'badge-primary' : ($record['request_status'] == 'completed' ? 'badge-danger' : 'badge-success'))).
                                                                ' py-2 px-3 text-light">'.$record['status'].'</b>
                                                                
                                                            </span>
                                                        </div>'?>
                                                </td>
                                                <td class="text-center">
                                                        <?php
                                                            
                                                            if($record['status'] == 'approved' || $record['status'] == 'pending') {

                                                                echo '<button type="button" class="btn btn-success text-light mr-2" id="sa-success" data-toggle="modal"
                                                                    data-target="#success-header-modal" data-tm="'.$record['time'].'" data-dt="'.$record['date'].'" data-em="'.$record['email'].'" data-id="'.$record['appointmentID'].'">Approve</button>';
                                                                echo '<button type="button" class="btn btn-danger text-light" id="sa-success" data-toggle="modal"
                                                                    data-target="#danger-header-modal" data-tm="'.$record['time'].'" data-dt="'.$record['date'].'" data-em="'.$record['email'].'" data-id="'.$record['appointmentID'].'">Reject</button>';

                                                            } else {

                                                                echo '<button type="submit" class="btn btn-light" disabled>Cancel</button>';
                                                            }
                                                        
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
            <div id="success-header-modal" class="modal fade" tabindex="-1" role="dialog"
                aria-labelledby="danger-header-modalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header modal-colored-header bg-success">
                            <h4 class="modal-title text-white" id="danger-header-modalLabel">
                                Approve Appointment
                            </h4>
                            <button type="button" class="close" data-dismiss="modal"
                                aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                        
                            <form class="mt-4" action="" method="POST">
                                <div class="form-group">
                                    
                                <input type="hidden" name="apptida" id="apptida">
                                <input type="hidden" name="emaila" id="emaila">
                                <input type="hidden" name="dta" id="dta">
                                <input type="hidden" name="tma" id="tma">
                                    <p>Approve this appointment?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="approve" class="btn btn-success">Approve</button>
                                    <button type="button" class="btn btn-light"
                                        data-dismiss="modal">No</button>
                                </div>
                            </form>
                        </div>
                        
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.delete dependant modal -->
            
            <div id="danger-header-modal" class="modal fade" tabindex="-1" role="dialog"
                aria-labelledby="danger-header-modalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header modal-colored-header bg-danger">
                            <h4 class="modal-title text-white" id="danger-header-modalLabel">
                                Reject Appointment
                            </h4>
                            <button type="button" class="close" data-dismiss="modal"
                                aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                        
                            <form class="mt-4" action="" method="POST">
                                <div class="form-group">
                                    
                                <input type="hidden" name="apptidr" id="apptidr">
                                <input type="hidden" name="emailr" id="emailr">
                                <input type="hidden" name="dtr" id="dtr">
                                <input type="hidden" name="tmr" id="tmr">
                                    <p>Reject this appointment?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="reject" class="btn btn-danger">Reject</button>
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

    $('#success-header-modal').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget);

        var id = button.data('id');
        var em = button.data('em');
        var dt = button.data('dt');
        var tm = button.data('tm');

        $('#apptida').val(id);
        $('#emaila').val(em);
        $('#dta').val(dt);
        $('#tma').val(tm);

    });

    $('#danger-header-modal').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget);

        var id = button.data('id');
        var em = button.data('em');
        var dt = button.data('dt');
        var tm = button.data('tm');

        $('#apptidr').val(id);
        $('#emailr').val(em);
        $('#dtr').val(dt);
        $('#tmr').val(tm);

    });
    
</script>

<?php 

}

?>