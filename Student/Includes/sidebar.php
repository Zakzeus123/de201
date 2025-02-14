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
            <span>Tableau de bord</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Cours et Classes
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseClasses" aria-expanded="true" aria-controls="collapseClasses">
            <i class="fas fa-chalkboard"></i>
            <span>Gérer les classes</span>
        </a>
        <div id="collapseClasses" class="collapse" aria-labelledby="headingClasses" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Gérer les classes</h6>
                <a class="collapse-item" href="viewClasses.php">Voir les classes</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Enseignants
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTeachers" aria-expanded="true" aria-controls="collapseTeachers">
            <i class="fas fa-chalkboard-teacher"></i>
            <span>Voir les enseignants</span>
        </a>
        <div id="collapseTeachers" class="collapse" aria-labelledby="headingTeachers" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Liste des enseignants</h6>
                <a class="collapse-item" href="viewTeachers.php">Voir les enseignants</a>
            </div>
        </div>
    </li>
    
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Session & Semestre
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSession" aria-expanded="true" aria-controls="collapseSession">
            <i class="fa fa-calendar-alt"></i>
            <span>Voir les sessions & semestres</span>
        </a>
        <div id="collapseSession" class="collapse" aria-labelledby="headingSession" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Gestion des sessions</h6>
                <a class="collapse-item" href="viewSessionTerm.php">Voir les sessions et semestres</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider">
</ul>
