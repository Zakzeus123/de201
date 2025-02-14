<?php 
error_reporting(0);
include '../Includes/dbcon.php';
include '../Includes/session.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>View Teacher Attendance</title>
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">
    <?php include "Includes/sidebar.php"; ?>
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <?php include "Includes/topbar.php"; ?>

        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">View Teacher Attendance</h1>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">View Teacher Attendance</h6>
                </div>
                <div class="card-body">
                  <form method="post">
                    <div class="form-group row mb-3">
                      <div class="col-xl-6">
                        <label class="form-control-label">Select Date<span class="text-danger ml-2">*</span></label>
                        <input type="date" class="form-control" name="dateTaken" required>
                      </div>
                    </div>
                    <button type="submit" name="view" class="btn btn-primary">View Attendance</button>
                  </form>
                </div>
              </div>

              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Teacher Attendance</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email Address</th>
                        <th>First Term</th>
                        <th>Second Term</th>
                        <th>Third Term</th>
                        <th>Date</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if (isset($_POST['view'])) {
                        $dateTaken = $_POST['dateTaken'];

                        $query = "SELECT tblteacherattendance.Id, tblteacherattendance.status1, tblteacherattendance.status2, tblteacherattendance.status3, 
                                         tblteacherattendance.dateTimeTaken1, tblclassteacher.firstName, tblclassteacher.lastName, 
                                         tblclassteacher.emailAddress, tblterm.termName
                                  FROM tblteacherattendance
                                  INNER JOIN tblclassteacher ON tblclassteacher.emailAddress = tblteacherattendance.emailAddress
                                  INNER JOIN tblsessionterm ON tblsessionterm.Id = tblteacherattendance.sessionTermId
                                  INNER JOIN tblterm ON tblterm.Id = tblsessionterm.termId
                                  WHERE DATE(tblteacherattendance.dateTimeTaken1) = '$dateTaken'";

                        $rs = $conn->query($query);
                        if (!$rs) {
                          die("<tr><td colspan='9' class='text-center text-danger'>Query Error: " . $conn->error . "</td></tr>");
                        }

                        $num = $rs->num_rows;
                        $sn = 0;

                        if ($num > 0) {
                          while ($rows = $rs->fetch_assoc()) {
                            $status1 = ($rows['status1'] == '1') ? "Present" : "Absent";
                            $status2 = ($rows['status2'] == '1') ? "Present" : "Absent";
                            $status3 = ($rows['status3'] == '1') ? "Present" : "Absent";
                            $colour1 = ($rows['status1'] == '1') ? "#00FF00" : "#FF0000";
                            $colour2 = ($rows['status2'] == '1') ? "#00FF00" : "#FF0000";
                            $colour3 = ($rows['status3'] == '1') ? "#00FF00" : "#FF0000";
                            $sn++;
                            echo "
                            <tr>
                              <td>$sn</td>
                              <td>{$rows['firstName']}</td>
                              <td>{$rows['lastName']}</td>
                              <td>{$rows['emailAddress']}</td>
                              
                              <td style='background-color:$colour1'>$status1</td>
                              <td style='background-color:$colour2'>$status2</td>
                              <td style='background-color:$colour3'>$status3</td>
                              <td>{$rows['dateTimeTaken1']}</td>
                            </tr>";
                          }
                        } else {
                          echo "<tr><td colspan='9' class='text-center text-danger'>No Record Found!</td></tr>";
                        }
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php include "Includes/footer.php"; ?>
    </div>
  </div>

  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#dataTableHover').DataTable();
    });
  </script>
</body>
</html>
