<?php 
error_reporting(0);
include '../Includes/dbcon.php';
include '../Includes/session.php';

//------------------------SAUVEGARDER--------------------------------------------------

if(isset($_POST['save'])){
    
    $classId=$_POST['classId'];
    $classArmName=$_POST['classArmName'];
   
    $query=mysqli_query($conn,"select * from tblclassarms where classArmName ='$classArmName' and classId = '$classId'");
    $ret=mysqli_fetch_array($query);

    if($ret > 0){ 

        $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>Cette section de classe existe déjà !</div>";
    }
    else{

        $query=mysqli_query($conn,"insert into tblclassarms(classId,classArmName,isAssigned) value('$classId','$classArmName','0')");

    if ($query) {
        
        $statusMsg = "<div class='alert alert-success'  style='margin-right:700px;'>Créée avec succès !</div>";
    }
    else
    {
         $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>Une erreur est survenue !</div>";
    }
  }
}

//---------------------------------------ÉDITER-------------------------------------------------------------



//--------------------ÉDITER------------------------------------------------------------

 if (isset($_GET['Id']) && isset($_GET['action']) && $_GET['action'] == "edit")
	{
        $Id= $_GET['Id'];

        $query=mysqli_query($conn,"select * from tblclassarms where Id ='$Id'");
        $row=mysqli_fetch_array($query);

        //------------METTRE À JOUR-----------------------------

        if(isset($_POST['update'])){
    
            $classId=$_POST['classId'];
            $classArmName=$_POST['classArmName'];

            $query=mysqli_query($conn,"update tblclassarms set classId = '$classId', classArmName='$classArmName' where Id='$Id'");

            if ($query) {
                
                echo "<script type = \"text/javascript\">
                window.location = (\"createClassArms.php\")
                </script>"; 
            }
            else
            {
                $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>Une erreur est survenue !</div>";
            }
        }
    }


//--------------------------------SUPPRIMER------------------------------------------------------------------

  if (isset($_GET['Id']) && isset($_GET['action']) && $_GET['action'] == "delete")
	{
        $Id= $_GET['Id'];

        $query = mysqli_query($conn,"DELETE FROM tblclassarms WHERE Id='$Id'");

        if ($query == TRUE) {

                echo "<script type = \"text/javascript\">
                window.location = (\"createClassArms.php\")
                </script>";  
        }
        else{

            $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>Une erreur est survenue !</div>"; 
         }
      
  }


?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/attnlg.jpg" rel="icon">
<?php include 'includes/title.php';?>
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
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
            <h1 class="h3 mb-0 text-gray-800">Créer une Section de Classe</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Accueil</a></li>
              <li class="breadcrumb-item active" aria-current="page">Créer une Section de Classe</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <!-- Formulaire de Base -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Créer une Section de Classe</h6>
                    <?php echo $statusMsg; ?>
                </div>
                <div class="card-body">
                  <form method="post">
                    <div class="form-group row mb-3">
                        <div class="col-xl-6">
                        <label class="form-control-label">Sélectionner une Classe<span class="text-danger ml-2">*</span></label>
                         <?php
                        $qry= "SELECT * FROM tblclass ORDER BY className ASC";
                        $result = $conn->query($qry);
                        $num = $result->num_rows;		
                        if ($num > 0){
                          echo ' <select required name="classId" class="form-control mb-3">';
                          echo'<option value="">--Sélectionner une Classe--</option>';
                          while ($rows = $result->fetch_assoc()){
                          echo'<option value="'.$rows['Id'].'" >'.$rows['className'].'</option>';
                              }
                                  echo '</select>';
                              }
                            ?>  
                        </div>
                        <div class="col-xl-6">
                        <label class="form-control-label">Nom de la Section<span class="text-danger ml-2">*</span></label>
                      <input type="text" class="form-control" name="classArmName" value="<?php echo $row['classArmName'];?>" id="exampleInputFirstName" placeholder="Nom de la Section">
                        </div>
                    </div>
                      <?php
                    if (isset($Id))
                    {
                    ?>
                    <button type="submit" name="update" class="btn btn-warning">Mettre à jour</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php
                    } else {           
                    ?>
                    <button type="submit" name="save" class="btn btn-primary">Sauvegarder</button>
                    <?php
                    }         
                    ?>
                  </form>
                </div>
              </div>

              <!-- Groupe d'Entrée -->
                 <div class="row">
              <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Toutes les Sections de Classe</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>#</th>
                        <th>Nom de la Classe</th>
                        <th>Nom de la Section</th>
                         <th>Statut</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                      </tr>
                    </thead>
                   <tbody>

                  <?php
                      $query = "SELECT tblclassarms.Id,tblclassarms.isAssigned,tblclass.className,tblclassarms.classArmName 
                      FROM tblclassarms
                      INNER JOIN tblclass ON tblclass.Id = tblclassarms.classId";
                      $rs = $conn->query($query);
                      $num = $rs->num_rows;
                      $sn=0;
                      $status="";
                      if($num > 0)
                      { 
                        while ($rows = $rs->fetch_assoc())
                          {
                              if($rows['isAssigned'] == '1'){$status = "Assignée";}else{$status = "Non assignée";} 
                             $sn = $sn + 1;
                            echo"
                              <tr>
                                <td>".$sn."</td>
                                <td>".$rows['className']."</td>
                                <td>".$rows['classArmName']."</td>
                                <td>".$status."</td>
                                <td><a href='?action=edit&Id=".$rows['Id']."'><i class='fas fa-fw fa-edit'></i>Modifier</a></td>
                                <td><a href='?action=delete&Id=".$rows['Id']."'><i class='fas fa-fw fa-trash'></i>Supprimer</a></td>
                              </tr>";
                          }
                      }
                      else
                      {
                           echo   
                           "<div class='alert alert-danger' role='alert'>
                            Aucune donnée trouvée !
                            </div>";
                      }
                      

                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            </div>
          </div>
          <!--Fin du Row-->

          <!-- Lien de Documentation -->
          <!-- <div class="row">
            <div class="col-lg-12 text-center">
              <p>Pour plus de documentation, vous pouvez visiter<a href="https://getbootstrap.com/docs/4.3/components/forms/"
                  target="_blank">
                  la documentation des formulaires Bootstrap.</a> et <a
                  href="https://getbootstrap.com/docs/4.3/components/input-group/" target="_blank">la documentation des groupes d'entrées Bootstrap</a></p>
            </div>
          </div> -->

        </div>
        <!---Fin du Container Fluid-->
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
   <!-- Plugins de page -->
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Scripts personnalisés de la page -->
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID de dataTable 
      $('#dataTableHover').DataTable(); // ID de dataTable avec Hover
    });
  </script>
</body>

</html>