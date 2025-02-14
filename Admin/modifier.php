<?php  
include '../Includes/dbcon.php';

// Fetch class list for dropdown
$classQuery = mysqli_query($conn, "SELECT * FROM tblclass ORDER BY className");

// Mapping of period IDs to names
$periods = [
    "1" => "Premier Période 08:30 - 12:00",
    "2" => "Seconde Période 12:10 - 15:30",
    "3" => "Troisième Période 15:40 - 18:30"
    
];

// Get the record to update
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = mysqli_query($conn, "SELECT emploi_du_temps.*, tblclass.className 
                                  FROM emploi_du_temps 
                                  INNER JOIN tblclass ON tblclass.Id = emploi_du_temps.classId
                                  WHERE emploi_du_temps.id='$id'");
    $row = mysqli_fetch_assoc($query);
}

if(isset($_POST['update'])){
    $classId = $_POST['classId'];
    $jour = $_POST['jour'];
    $periode = $_POST['periode'];
    $matiere = $_POST['matiere'];

    $updateQuery = "UPDATE emploi_du_temps SET classId='$classId', jour='$jour', periode='$periode', matiere='$matiere' WHERE id='$id'";
    
    if(mysqli_query($conn, $updateQuery)){
        header("location: emploiTemps.php");
    } else {
        echo "Erreur lors de la modification!";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Modifier la Séance</title>
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container">
    <h2 class="mt-3">Modifier la Séance</h2>
    <form method="post">
      <div class="form-group">
        <label>Classe</label>
        <select name="classId" class="form-control" required>
          <option value="">Sélectionnez une classe</option>
          <?php while ($classRow = mysqli_fetch_assoc($classQuery)) { ?>
            <option value="<?php echo $classRow['Id']; ?>" 
                <?php if($row['classId'] == $classRow['Id']) echo "selected"; ?>>
                <?php echo $classRow['className']; ?>
            </option>
          <?php } ?>
        </select>
      </div>
      <div class="form-group">
        <label>Jour</label>
        <select name="jour" class="form-control">
          <option value="LUNDI" <?php if($row['jour'] == "LUNDI") echo "selected"; ?>>Lundi</option>
          <option value="MARDI" <?php if($row['jour'] == "MARDI") echo "selected"; ?>>Mardi</option>
          <option value="MERCREDI" <?php if($row['jour'] == "MERCREDI") echo "selected"; ?>>Mercredi</option>
          <option value="JEUDI" <?php if($row['jour'] == "JEUDI") echo "selected"; ?>>Jeudi</option>
          <option value="VENDREDI" <?php if($row['jour'] == "VENDREDI") echo "selected"; ?>>Vendredi</option>
          <option value="SAMEDI" <?php if($row['jour'] == "SAMEDI") echo "selected"; ?>>Samedi</option>
        </select>
      </div>
      <div class="form-group">
        <label>Période</label>
        <select name="periode" class="form-control">
          <option value="">Sélectionnez une période</option>
          <?php foreach ($periods as $key => $value) { ?>
            <option value="<?php echo $key; ?>" <?php if($row['periode'] == $key) echo "selected"; ?>>
              <?php echo $value; ?>
            </option>
          <?php } ?>
        </select>
      </div>
      <div class="form-group">
        <label>Matière</label>
        <input type="text" name="matiere" value="<?php echo $row['matiere']; ?>" class="form-control" required>
      </div>
      <button type="submit" name="update" class="btn btn-success">Modifier</button>
      <a href="emploiTemps.php" class="btn btn-secondary">Annuler</a>
    </form>
  </div>
</body>
</html>
