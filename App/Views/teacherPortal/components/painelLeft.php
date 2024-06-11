<?php 

require __DIR__ . '../../../../config/variables.php';

?>

<div id="left-panel" class="row">

    <nav id="sidebar">

        <div class="col-lg-12 logo d-flex justify-content-center"><img src="<?= $app_url ?>/assets/img/logo-components/logo-completa-branca.png" alt=""></div> 

        <ul class="sidebar-lists">

            <p>Navegação</p>

            <li id="minimize"><a  href="#"><i class="fas fa-chevron-circle-left text-white"></i><span class="link-name">Minimilizar</span></a></li>

            <li name="home"><a href="/portal-docente/home"><i class="fas fa-home"></i><span class="link-name">Home</span></a></li>

            <li name="turmas"><a href="/portal-docente/turmas"><i class="fas fa-boxes"></i><span class="link-name">Turmas</span></a></li>

            <li><a href="#" id="settingsTeacherPortal"><i class="fas fa-cog"></i><span class="link-name">Configurações</span></a></li>

        </ul>

    </nav>

</div>