<nav class="navbar fixed-bottom navbar-expand p-2 rounded-0 navbarBottomTeacher" id="navbarBottom" style="border-radius: 0px">

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav">

            <li class="nav-item active">
                <a name="home" class="nav-link" href="/portal-docente/home"><i class="fas fa-home"></i> <span>Home</span></a>
            </li>

            <li class="nav-item">
                <a name="turmas" class="nav-link" href="/portal-docente/turmas"><i class="fas fa-users"></i> <span>Turmas</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="settingsTeacherPortal" href="#"><img class="foto-perfil" src="/assets/img/teacherProfilePhotos/<?= $_SESSION['Teacher']['profilePhoto'] ?>" alt="" onerror="/assets/img/teacherProfilePhotos/foto-vazia.jpg"></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/portal-docente/sair" data-toggle="tooltip" data-placement="bottom" title="Sair da conta"><i class="fas fa-sign-out-alt text-dark"></i></a>
            </li>

        </ul>

    </div>

</nav>