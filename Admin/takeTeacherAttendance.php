<?php 
error_reporting(0);
include '../Includes/dbcon.php';
include '../Includes/session.php';

$dateTaken = date("Y-m-d");

// Get active session and term
$query = mysqli_query($conn, "SELECT * FROM tblsessionterm WHERE isActive ='1'");
$row = mysqli_fetch_array($query);
$sessionTermId = $row['Id'];

// Check if attendance already exists for today
$query = mysqli_query($conn, "SELECT * FROM tblteacherattendance WHERE dateTimeTaken1='$dateTaken'");
$count = mysqli_num_rows($query);

if ($count == 0) { // If no attendance record exists, insert new records
    $teacherQuery = mysqli_query($conn, "SELECT * FROM tblclassteacher");
    while ($teacher = $teacherQuery->fetch_assoc()) {
        mysqli_query($conn, "INSERT INTO tblteacherattendance(emailAddress, sessionTermId, status1, status2, status3, dateTimeTaken1) 
                              VALUES ('$teacher[emailAddress]', '$sessionTermId', '0', '0', '0', '$dateTaken')");
    }
}

// Handle form submission
if (isset($_POST['save'])) {
    $emailAddress = $_POST['emailAddress'];
    $check1 = $_POST['check1'] ?? [];
    $check2 = $_POST['check2'] ?? [];
    $check3 = $_POST['check3'] ?? [];
    $N = count($emailAddress);

    // Check if attendance has already been taken
    $query = mysqli_query($conn, "SELECT * FROM tblteacherattendance WHERE dateTimeTaken1='$dateTaken' AND (status1 = '1' OR status2 = '1' OR status3 = '1')");
    $count = mysqli_num_rows($query);

    if ($count > 0) {
        $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>Attendance has already been taken for today!</div>";
    } else {
        // Update attendance statuses
        for ($i = 0; $i < $N; $i++) {
            $email = $emailAddress[$i]; // Teacher's email

            $status1 = in_array($email, $check1) ? 1 : 0;
            $status2 = in_array($email, $check2) ? 1 : 0;
            $status3 = in_array($email, $check3) ? 1 : 0;

            $updateQuery = mysqli_query($conn, "UPDATE tblteacherattendance 
                                                SET status1='$status1', status2='$status2', status3='$status3' 
                                                WHERE emailAddress = '$email' AND dateTimeTaken1='$dateTaken'");

            if ($updateQuery) {
                $statusMsg = "<div class='alert alert-success' style='margin-right:700px;'>Attendance Taken Successfully!</div>";
            } else {
                $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error occurred!</div>";
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
</head>
<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <?php include "Includes/sidebar.php"; ?>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <?php include "Includes/topbar.php"; ?>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Take Attendance for Teachers (Today's Date : <?php echo date("m-d-Y");?>)</h1>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <form method="post">
                <div class="card mb-4">
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">All Teachers</h6>
                  </div>
                  <div class="table-responsive p-3">
                    <?php echo $statusMsg; ?>
                    <table class="table align-items-center table-flush table-hover">
                      <thead class="thead-light">
                        <tr>
                          <th>#</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Email Address</th>
                          <th>First Term</th>
                          <th>Second Term</th>
                          <th>Third Term</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $query = "SELECT Id, firstName, lastName, emailAddress FROM tblclassteacher";
                        $rs = $conn->query($query);
                        $num = $rs->num_rows;
                        $sn = 0;
                        if($num > 0) { 
                            while ($rows = $rs->fetch_assoc()) {
                                $sn++;
                                echo "
                                <tr>
                                  <td>".$sn."</td>
                                  <td>".$rows['firstName']."</td>
                                  <td>".$rows['lastName']."</td>
                                  <td>".$rows['emailAddress']."</td>
                                  <td><input name='check1[]' type='checkbox' value='".$rows['emailAddress']."' class='form-control'></td>
                                  <td><input name='check2[]' type='checkbox' value='".$rows['emailAddress']."' class='form-control'></td>
                                  <td><input name='check3[]' type='checkbox' value='".$rows['emailAddress']."' class='form-control'></td>
                                </tr>";
                                echo "<input name='emailAddress[]' value='".$rows['emailAddress']."' type='hidden' class='form-control'>";
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
              </form>
            </div>
          </div>
        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
      <?php include "Includes/footer.php"; ?>
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
</body>
</html>