<?php 
require __DIR__ . '../../../../config/variables.php';
?>

<div id="left-panel" class="row">

    <nav id="sidebar">

    <div class="col-lg-12 logo d-flex justify-content-center mb-3"><img src="<?= $app_url ?>/assets/img/logo-components/logo-completa-branca.png" alt=""></div>

        <ul class="sidebar-lists">

            <li id="minimize"><a  href="#"><i class="fas fa-chevron-circle-left text-white"></i><span class="link-name">Minimilizar</span></a></li>

            <li name="home"><a href="/admin/home"><i class="fas fa-home"></i><span class="link-name">Home</span></a></li>

            <li name="gestao"><a href="/admin/gestao"><i class="fas fa-sliders-h"></i><span class="link-name">Gestão geral</span></a></li>

            <hr class='bg-white col-lg-9 mx-auto'>

            <p>Navegação</p>

            <li data-toggle="collapse" href="#student" role="button" aria-expanded="false" aria-controls="student" class="active link-collapse" name="aluno">
                <a><i class="fas fa-users"></i><span class="link-name">Aluno</span><i fa-angle-right class="fas fa-angle-right pr-3"></i></a>
            </li>

            <div class="collapse" id="student">
                <li><a href='/admin/aluno/cadastro'>Cadastrar</a></li>
                <li><a href='/admin/aluno/lista'>Buscar</a></li>
            </div>

            <li data-toggle="collapse" href="#teacher" name="professor" role="button" aria-expanded="false" aria-controls="teacher" class="active link-collapse">
                <a><i class="fas fa-chalkboard-teacher"></i><span class="link-name">Docente</span><i fa-angle-right class="fas fa-angle-right pr-3"></i></a>
            </li>

            <div class="collapse" id="teacher">
                <li><a href='/admin/professor/cadastro'>Cadastrar</a></li>
                <li><a href='/admin/professor/lista'>Buscar</a></li>
            </div>         

            <?php if(($_SESSION['Admin']['hierarchyFunction'] == 1)){ ?>
            
            <li data-toggle="collapse" href="#administrador" role="button" aria-expanded="false" aria-controls="admin" class="active link-collapse" name="administrador">
                <a><i class="fas fa-user-cog"></i><span class="link-name">Administrador</span><i fa-angle-right class="fas fa-angle-right pr-3"></i></a>
            </li>

            <div class="collapse" id="administrador">
                <li><a href='/admin/administrador/cadastro'>Cadastrar</a></li>
                <li><a href='/admin/administrador/lista'>Buscar</a></li>
            </div>

            <?php } ?>

            <div class="footer-panel">
                <li><a class="" href="#" id="settings"><i class="fas fa-cog"></i><span class="link-name">Configurações</span></a></li>
            </div>

        </ul>


    </nav>

</div>