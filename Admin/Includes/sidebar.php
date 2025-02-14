<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
     <a class="sidebar-brand d-flex align-items-center bg-gradient-primary justify-content-center" href="index.php">
         <div class="sidebar-brand-icon">
             <img src="img/logo/attnlg.jpg">
         </div>
         <div class="sidebar-brand-text mx-3">Code Camp BD</div>
     </a>
     <hr class="sidebar-divider my-0">
     <li class="nav-item active">
         <a class="nav-link" href="index.php">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Tableau de bord</span></a>
     </li>
     <hr class="sidebar-divider">
     <div class="sidebar-heading">
         Classes et Branches de Classe
     </div>
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap" aria-expanded="true" aria-controls="collapseBootstrap">
             <i class="fas fa-chalkboard"></i>
             <span>Gérer les Classes</span>
         </a>
         <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Gérer les Classes</h6>
                 <a class="collapse-item" href="createClass.php">Créer une Classe</a>
                 <!-- <a class="collapse-item" href="#">Liste des Membres</a> -->
             </div>
         </div>
     </li>
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrapusers" aria-expanded="true" aria-controls="collapseBootstrapusers">
             <i class="fas fa-code-branch"></i>
             <span>Gérer les Branches de Classe</span>
         </a>
         <div id="collapseBootstrapusers" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Gérer les Branches de Classe</h6>
                 <a class="collapse-item" href="createClassArms.php">Créer une Branche de Classe</a>
                 <!-- <a class="collapse-item" href="usersList.php">Liste des Utilisateurs</a> -->
             </div>
         </div>
     </li>
     <hr class="sidebar-divider">
     <div class="sidebar-heading">
         Enseignants
     </div>
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrapassests" aria-expanded="true" aria-controls="collapseBootstrapassests">
             <i class="fas fa-chalkboard-teacher"></i>
             <span>Gérer les Enseignants</span>
         </a>
         <div id="collapseBootstrapassests" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Gérer les Enseignants de Classe</h6>
                 <a class="collapse-item" href="createClassTeacher.php">Créer un Enseignant de Classe</a>
                  <a class="collapse-item" href="takeTeacherAttendance.php">Prendre la Présence des Enseignants</a>
                 <a class="collapse-item" href="viewTeacherAttendance.php">Voir la Présence des Enseignants</a> 
             </div>
         </div>
     </li>
     <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrapschemes"
          aria-expanded="true" aria-controls="collapseBootstrapschemes">
          <i class="fas fa-home"></i>
          <span>Gérer les Schémas</span>
        </a>
        <div id="collapseBootstrapschemes" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Gérer les Schémas</h6>
             <a class="collapse-item" href="createSchemes.php">Créer un Schéma</a>
            <a class="collapse-item" href="schemeList.php">Liste des Schémas</a>
          </div>
        </div>
      </li> -->

     <hr class="sidebar-divider">
     <div class="sidebar-heading">
         Étudiants
     </div>
     </li>
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap2" aria-expanded="true" aria-controls="collapseBootstrap2">
             <i class="fas fa-user-graduate"></i>
             <span>Gérer les Étudiants</span>
         </a>
         <div id="collapseBootstrap2" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Gérer les Étudiants</h6>
                 <a class="collapse-item" href="createStudents.php">Créer un Étudiant</a>
                 <!-- <a class="collapse-item" href="#">Type d'Actifs</a> -->
             </div>
         </div>
     </li>

     <hr class="sidebar-divider">
     <div class="sidebar-heading">
         Session & Trimestre
     </div>
     </li>
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrapcon" aria-expanded="true" aria-controls="collapseBootstrapcon">
             <i class="fa fa-calendar-alt"></i>
             <span>Gérer la Session & le Trimestre</span>
         </a>
         <div id="collapseBootstrapcon" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Contribution</h6>
                 <a class="collapse-item" href="createSessionTerm.php">Créer une Session et un Trimestre</a>
                 <!-- <a class="collapse-item" href="addMemberToContLevel.php ">Ajouter un Membre au Niveau</a> -->
             </div>
         </div>
     </li>
     <hr class="sidebar-divider">
     <div class="sidebar-heading">
        Gestion des Emplois du Temps
     </div>
      <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrapassestss" aria-expanded="true" aria-controls="collapseBootstrapassests">
             <i class="fas fa-chalkboard-teacher"></i>
             <span>Gérer les Emplois du Temps<span>
         </a>
         <div id="collapseBootstrapassestss" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Gérer les Emplois du Temps</h6>
                 <a class="collapse-item" href="emploiTemps.php">Créer un Emploi du Temps</a>
                 <!-- <a class="collapse-item" href="assetsCategoryList.php">Liste des Catégories d'Actifs</a>
             <a class="collapse-item" href="createAssets.php">Créer des Actifs</a> -->
             <h6 class="collapse-header">Voir les Emplois du Temps</h6>
                 <a class="collapse-item" href="takeProf.php">Voir les Emplois du Temps</a>
             </div>
         </div>
     </li>
     <hr class="sidebar-divider">
     <!-- <li class="nav-item">
        <a class="nav-link" href="forms.html">
          <i class="fab fa-fw fa-wpforms"></i>
          <span>Formulaires</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
          aria-controls="collapseTable">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span>
        </a>
        <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Tables</h6>
            <a class="collapse-item" href="simple-tables.html">Tables Simples</a>
            <a class="collapse-item" href="datatables.html">DataTables</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="ui-colors.html">
          <i class="fas fa-fw fa-palette"></i>
          <span>Couleurs de l'Interface</span>
        </a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Exemples
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true"
          aria-controls="collapsePage">
          <i class="fas fa-fw fa-columns"></i>
          <span>Pages</span>
        </a>
        <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Exemples de Pages</h6>
            <a class="collapse-item" href="login.html">Connexion</a>
            <a class="collapse-item" href="register.html">Inscription</a>
            <a class="collapse-item" href="404.html">Page 404</a>
            <a class="collapse-item" href="blank.html">Page Vide</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Graphiques</span>
        </a>
      </li> -->
      <hr class="sidebar-divider">
 </ul>