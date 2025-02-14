<?php 
include 'Includes/dbcon.php';
session_start();
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
    <title>Code Camp BD - Connexion</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/ruang-admin.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-login">
    <!-- Contenu de la connexion -->
    <div class="container-login">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        <img src="img/logo/attnlg.jpg" style="width:100px;height:100px">
                                        <br><br>
                                        <h1 class="h4 text-gray-900 mb-4">Connexion</h1>
                                    </div>
                                    <form class="user" method="Post" action="">
                                        <div class="form-group">
                                            <input type="text" class="form-control" required name="username" id="exampleInputEmail" placeholder="Entrez l'adresse email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" required class="form-control" id="exampleInputPassword" placeholder="Entrez le mot de passe">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <!-- <label class="custom-control-label" for="customCheck">Se souvenir de moi</label> -->
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary btn-block" value="Se connecter" name="login" />
                                        </div>
                                    </form>

                                    <?php

  if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $password = md5($password);

    $query = "SELECT * FROM tblclassteacher WHERE emailAddress = '$username' AND password = '$password'";
    $rs = $conn->query($query);
    $num = $rs->num_rows;
    $rows = $rs->fetch_assoc();

    if($num > 0){

      $_SESSION['userId'] = $rows['Id'];
      $_SESSION['firstName'] = $rows['firstName'];
      $_SESSION['lastName'] = $rows['lastName'];
      $_SESSION['emailAddress'] = $rows['emailAddress'];
      $_SESSION['classId'] = $rows['classId'];
      $_SESSION['classArmId'] = $rows['classArmId'];

      echo "<script type = \"text/javascript\">
      window.location = (\"ClassTeacher/index.php\")
      </script>";
    }

    else{

      echo "<div class='alert alert-danger' role='alert'>
      Nom d'utilisateur/Mot de passe invalide !
      </div>";

    }
  }
?>

                                    <!-- <hr>
                    <a href="index.html" class="btn btn-google btn-block">
                      <i class="fab fa-google fa-fw"></i> Se connecter avec Google
                    </a>
                    <a href="index.html" class="btn btn-facebook btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Se connecter avec Facebook
                    </a> -->
                                    <hr>
                                    <div class="text-center">
                                        <a class="font-weight-bold small" href="classTeacherLogin.php">Connexion Enseignant de classe !</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <!-- <a class="font-weight-bold small" href=".php">Compte coopératif !</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a class="font-weight-bold small" href="forgotPassword.php">Mot de passe oublié ?</a> -->

                                    </div>
                                    <div class="text-center">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contenu de la connexion -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/ruang-admin.min.js"></script>
</body>

</html>
