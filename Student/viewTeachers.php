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
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Gestion des enseignants</title>
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
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
            <h1 class="h3 mb-0 text-gray-800">Liste des enseignants</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Accueil</a></li>
              <li class="breadcrumb-item active" aria-current="page">Enseignants</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Liste des enseignants</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Classe assignée</th>
                        <th>Section</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $query = "SELECT tblclassteacher.Id AS teacherId, tblclassteacher.firstName, tblclassteacher.lastName, 
                      tblclassteacher.emailAddress AS email, tblclassteacher.phoneNo AS phoneNumber, 
                      tblclass.className, tblclassarms.classArmName
                      FROM tblclassteacher
                      INNER JOIN tblclass ON tblclass.Id = tblclassteacher.classId
                      INNER JOIN tblclassarms ON tblclassarms.Id = tblclassteacher.classArmId";
            
                      $rs = $conn->query($query);
                      $sn = 0;
                      if ($rs->num_rows > 0) {
                        while ($row = $rs->fetch_assoc()) {
                          $sn++;
                          echo "<tr>
                                <td>{$sn}</td>
                                <td>{$row['firstName']}</td>
                                <td>{$row['lastName']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['phoneNumber']}</td>
                                <td>{$row['className']}</td>
                                <td>{$row['classArmName']}</td>
                                </tr>";
                        }
                      } else {
                        echo "<tr><td colspan='7' class='text-center text-danger'>Aucun enseignant trouvé !</td></tr>";
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
