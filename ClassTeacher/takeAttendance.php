<?php 
error_reporting(0);
include '../Includes/dbcon.php';
include '../Includes/session.php';

$query = "SELECT tblclass.className, tblclassarms.classArmName 
          FROM tblclassteacher
          INNER JOIN tblclass ON tblclass.Id = tblclassteacher.classId
          INNER JOIN tblclassarms ON tblclassarms.Id = tblclassteacher.classArmId
          WHERE tblclassteacher.Id = '$_SESSION[userId]'";
$rs = $conn->query($query);
$num = $rs->num_rows;
$rrw = $rs->fetch_assoc();

//session and Term
$querey = mysqli_query($conn, "SELECT * FROM tblsessionterm WHERE isActive ='1'");
$rwws = mysqli_fetch_array($querey);
$sessionTermId = $rwws['Id'];

$dateTaken = date("Y-m-d");

$qurty = mysqli_query($conn, "SELECT * FROM tblattendance WHERE classId = '$_SESSION[classId]' AND classArmId = '$_SESSION[classArmId]' AND dateTimeTaken='$dateTaken'");
$count = mysqli_num_rows($qurty);

if($count == 0){ //if Record does not exist, insert the new record
    //insert the students record into the attendance table on page load
    $qus = mysqli_query($conn, "SELECT * FROM tblstudents WHERE classId = '$_SESSION[classId]' AND classArmId = '$_SESSION[classArmId]'");
    while ($ros = $qus->fetch_assoc()) {
        $qquery = mysqli_query($conn, "INSERT INTO tblattendance(emailAddress, classId, classArmId, sessionTermId, status, dateTimeTaken) 
                                       VALUES ('$ros[emailAddress]', '$_SESSION[classId]', '$_SESSION[classArmId]', '$sessionTermId', '0', '$dateTaken')");
    }
}

if(isset($_POST['save'])){
  $emailAddress = $_POST['emailAddress'];
  $check1 = $_POST['check1'] ?? [];
  $check2 = $_POST['check2'] ?? [];
  $check3 = $_POST['check3'] ?? [];
  $N = count($emailAddress);

  // Check if the attendance has not been taken i.e., if no record has a status of 1
  $qurty = mysqli_query($conn, "SELECT * FROM tblattendance WHERE classId = '$_SESSION[classId]' AND classArmId = '$_SESSION[classArmId]' AND dateTimeTaken='$dateTaken' AND status = '1'");
  $count = mysqli_num_rows($qurty);

  if($count > 0){
      $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>Attendance has been taken for today!</div>";
  } else {
      // Update the status to 1 for the checkboxes checked
      for($i = 0; $i < $N; $i++) {
          $email = $emailAddress[$i]; // Email Address

          $status1 = in_array($email, $check1) ? 1 : 0;
          $status2 = in_array($email, $check2) ? 1 : 0;
          $status3 = in_array($email, $check3) ? 1 : 0;

          $qquery = mysqli_query($conn, "UPDATE tblattendance SET status1='$status1', status2='$status2', status3='$status3' WHERE emailAddress = '$email' AND dateTimeTaken='$dateTaken'");

          if ($qquery) {
              $statusMsg = "<div class='alert alert-success' style='margin-right:700px;'>Attendance Taken Successfully!</div>";
          } else {
              $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error Occurred!</div>";
          }
      }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/attnlg.jpg" rel="icon">
  <title>Dashboard</title>
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
  <script>
    function classArmDropdown(str) {
        if (str == "") {
            document.getElementById("txtHint").innerHTML = "";
            return;
        } else { 
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","ajaxClassArms2.php?cid="+str,true);
            xmlhttp.send();
        }
    }
  </script>
</head>
<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <?php include "Includes/sidebar.php";?>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <?php include "Includes/topbar.php";?>
        <!-- Topbar -->
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Take Attendance (Today's Date : <?php echo $todaysDate = date("m-d-Y");?>)</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">All Student in Class</li>
            </ol>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <!-- Form Basic -->
              <!-- Input Group -->
              <form method="post">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="card mb-4">
                      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">All Student in (<?php echo $rrw['className'].' - '.$rrw['classArmName'];?>) Class</h6>
                        <h6 class="m-0 font-weight-bold text-danger">Note: <i>Click on the checkboxes besides each student to take attendance!</i></h6>
                      </div>
                      <div class="table-responsive p-3">
                        <?php echo $statusMsg; ?>
                        <table class="table align-items-center table-flush table-hover">
                          <thead class="thead-light">
                            <tr>
                              <th>#</th>
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>Other Name</th>
                              <th>Email Address</th>
                              <th>Class</th>
                              <th>Class Arm</th>
                              <th>First Term </th>
                              <th>Second Term</th>
                              <th>Third Term</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $query = "SELECT tblstudents.Id, tblstudents.emailAddress, tblclass.className, tblclass.Id As classId, tblclassarms.classArmName, tblclassarms.Id AS classArmId, tblstudents.firstName,
                                      tblstudents.lastName, tblstudents.otherName, tblstudents.dateCreated
                                      FROM tblstudents
                                      INNER JOIN tblclass ON tblclass.Id = tblstudents.classId
                                      INNER JOIN tblclassarms ON tblclassarms.Id = tblstudents.classArmId
                                      WHERE tblstudents.classId = '$_SESSION[classId]' AND tblstudents.classArmId = '$_SESSION[classArmId]'";
                            $rs = $conn->query($query);
                            $num = $rs->num_rows;
                            $sn = 0;
                            $status = "";
                            if($num > 0) { 
                                while ($rows = $rs->fetch_assoc()) {
                                    $sn = $sn + 1;
                                    echo"
                                    <tr>
                                      <td>".$sn."</td>
                                      <td>".$rows['firstName']."</td>
                                      <td>".$rows['lastName']."</td>
                                      <td>".$rows['otherName']."</td>
                                      <td>".$rows['emailAddress']."</td>
                                      <td>".$rows['className']."</td>
                                      <td>".$rows['classArmName']."</td>
                                      <td><input name='check1[]' type='checkbox' value=".$rows['emailAddress']." class='form-control'></td>
                                      <td><input name='check2[]' type='checkbox' value=".$rows['emailAddress']." class='form-control'></td>
                                      <td><input name='check3[]' type='checkbox' value=".$rows['emailAddress']." class='form-control'></td>
                                    </tr>";
                                    echo "<input name='emailAddress[]' value=".$rows['emailAddress']." type='hidden' class='form-control'>";
                                }
                            } else {
                                echo "<div class='alert alert-danger' role='alert'>No Record Found!</div>";
                            }
                            ?>
                          </tbody>
                        </table>
                        <br>
                        <button type="submit" name="save" class="btn btn-primary">Take Attendance</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!--Row-->
        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
      <?php include "Includes/footer.php";?>
      <!-- Footer -->
    </div>
  </div>
  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
  <!-- Page level plugins -->
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>
</body>
</html>