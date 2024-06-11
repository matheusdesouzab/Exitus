<?php 

require __DIR__ . '../../../../config/variables.php';

?>

<nav class="navbar fixed-bottom navbar-expand p-2 rounded-0 navbarBottomTeacher" id="navbarBottom" style="border-radius: 0px">

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav">

            <li class="nav-item active">
                <a name="home" class="nav-link" href="/portal-docente/home"><i class="fas fa-home"></i> <span>Home</span></a>
            </li>

            <li class="nav-item">
                <a name="turmas" class="nav-link" href="/portal-docente/turmas"><i class="fas fa-users"></i> <span>Turmas</span></a>
            </li>

            <?php $photo = ($_SESSION['Teacher']['profilePhoto'] ? $_SESSION['Teacher']['profilePhoto'] : 'foto-vazia.jpg') ?>

            <li class="nav-item">
                <a class="nav-link" id="settingsTeacherPortal" href="#"><img class="foto-perfil" src="<?= $app_url ?>/assets/img/teacherProfilePhotos/<?= $photo ?>" alt=""></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/portal-docente/sair" data-toggle="tooltip" data-placement="bottom" title="Sair da conta"><i class="fas fa-sign-out-alt"></i></a>
            </li>

        </ul>

    </div>

</nav>