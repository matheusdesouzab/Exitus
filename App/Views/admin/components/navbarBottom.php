<nav class="navbar fixed-bottom navbar-expand p-2 rounded-0" id="navbarBottom" style="border-radius: 0px">

<div class="collapse navbar-collapse" id="navbarSupportedContent">

    <ul class="navbar-nav">

        <li class="nav-item active">
            <a name="home" class="nav-link" href="/admin/home"><i class="fas fa-home"></i> <span>Home</span></a>
        </li>

        <li class="nav-item">
            <a name="gestao" class="nav-link" href="/admin/gestao"><i class="fas fa-sliders-h"></i> <span>Gestão</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-chart-pie"></i> <span>BI</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" id="settingsTeacherPortal" href="#"><img class="foto-perfil" src="/assets/img/adminProfilePhotos/<?= $_SESSION['Admin']['profilePhoto'] ?>" alt="" onerror="/assets/img/teacherProfilePhotos/foto-vazia.jpg"></a>
        </li>

    </ul>

</div>

</nav>