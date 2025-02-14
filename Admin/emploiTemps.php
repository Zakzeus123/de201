<?php
error_reporting(0);
include '../Includes/dbcon.php';
include '../Includes/session.php';

// Fetch classes from the database
$classQuery = mysqli_query($conn, "SELECT * FROM tblclass ORDER BY className");
$classArmQuery = mysqli_query($conn, "SELECT * FROM tblclassarms ORDER BY classArmName");

// Mapping of period IDs to names
$periods = [
    "1" => "Premier Période 08:30 - 12:00",
    "2" => "Seconde Période 12:10 - 15:30",
    "3" => "Troisième Période 15:40 - 18:30"
];

// Handle form submission
if (isset($_POST['add'])) {
    $classId = $_POST['classId'];
    $classArmId = $_POST['classArmId'];
    $jour = $_POST['jour'];
    $periode = $_POST['periode'];
    $matiere = $_POST['matiere'];

    $query = "INSERT INTO emploi_du_temps (classId, classArmName, jour, periode, matiere) 
              VALUES ('$classId', '$jour', '$classArmId', '$periode', '$matiere')";
    if (mysqli_query($conn, $query)) {
        $msg = "Ajout réussi!";
    } else {
        $msg = "Erreur lors de l'ajout!";
    }
}

// Handle deletion
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM emploi_du_temps WHERE id='$id'");
    header("location: emploiTemps.php");
}

// Fetch the schedule data
$scheduleQuery = mysqli_query($conn, "SELECT emploi_du_temps.*, tblclass.className, tblclassarms.classArmName 
                                      FROM emploi_du_temps 
                                      INNER JOIN tblclass ON tblclass.Id = emploi_du_temps.classId
                                      INNER JOIN tblclassarms ON tblclassarms.Id = emploi_du_temps.classArmId
                                      ORDER BY emploi_du_temps.classId, emploi_du_temps.classArmId, emploi_du_temps.jour, emploi_du_temps.periode");
?>
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Gestion de l'Emploi du Temps</title>
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>

<body>
    <div class="container">
        <h2 class="mt-3">Gestion de l'Emploi du Temps</h2>

        <!-- Form for adding a schedule -->
        <form method="post" class="mt-3">
            <div class="form-group">
                <label>Classe</label>
                <select name="classId" class="form-control" required>
                    <option value="">Sélectionnez une classe</option>
                    <?php while ($row = mysqli_fetch_assoc($classQuery)) { ?>
                        <option value="<?php echo $row['Id']; ?>"><?php echo $row['className']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label>Classe Armée</label>
                <select name="classArmId" class="form-control" required>
                    <option value="">Sélectionnez une classe armée</option>
                    <?php while ($row = mysqli_fetch_assoc($classArmQuery)) { ?>
                        <option value="<?php echo $row['Id']; ?>"><?php echo $row['classArmName']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label>Jour</label>
                <select name="jour" class="form-control">
                    <option value="LUNDI">Lundi</option>
                    <option value="MARDI">Mardi</option>
                    <option value="MERCREDI">Mercredi</option>
                    <option value="JEUDI">Jeudi</option>
                    <option value="VENDREDI">Vendredi</option>
                    <option value="SAMEDI">Samedi</option>
                </select>
            </div>

            <div class="form-group">
                <label>Période</label>
                <select name="periode" class="form-control">
                    <option value="">Sélectionnez une période</option>
                    <option value="1">Premier Période 08:30 - 12:00</option>
                    <option value="2">Seconde Période 12:10 - 15:30</option>
                    <option value="3">Troisième Période 15:40 - 18:30</option>
                </select>
            </div>

            <div class="form-group">
                <label>Matière</label>
                <input type="text" name="matiere" class="form-control" required>
            </div>

            <button type="submit" name="add" class="btn btn-success">Ajouter</button>
        </form>

        <hr>

        <!-- Schedule List -->
        <h3>Emploi du Temps Enregistré</h3>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Classe</th>
                    <th>Classe Armée</th>
                    <th>Jour</th>
                    <th>Période</th>
                    <th>Matière</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($scheduleQuery)) { ?>
                    <tr>
                        <td><?php echo $row['className']; ?></td>
                        <td><?php echo $row['classArmName']; ?></td>
                        <td><?php echo $row['jour']; ?></td>
                        <td><?php echo isset($periods[$row['periode']]) ? $periods[$row['periode']] : "Inconnue"; ?></td>
                        <td><?php echo $row['matiere']; ?></td>
                        <td>
                            <a href="modifier.php?id=<?php echo $row['id']; ?>" class="mx-2">
                                <i class="bi bi-pencil-square text-primary fs-5"></i>
                            </a>
                        </td>
                        <td>
                            <a href="emploiTemps.php?delete=<?php echo $row['id']; ?>" class="mx-2"
                               onclick="return confirm('Voulez-vous vraiment supprimer cette séance ?');">
                                <i class="bi bi-trash text-primary fs-5"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html> 