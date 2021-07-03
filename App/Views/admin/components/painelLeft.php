<div id="left-panel" class="row">

    <nav id="sidebar">

        <div class="sidebar-header">Web Gest</div>

        <ul class="sidebar-lists">

            <p>Menu principal</p>

            <li><a href="#"><i class="fas fa-globe"></i><span class="link-name">Home</span></a></li>

            <li data-toggle="collapse" href="#student" role="button" aria-expanded="false" aria-controls="student" class="active link-collapse">
                <a><i class="fas fa-users"></i><span class="link-name">Aluno</span><i fa-angle-right class="fas fa-angle-right"></i></a>
            </li>

            <div class="collapse" id="student">
                <li><a href='/admin/aluno/cadastro'>Cadastrar</a></li>
                <li><a href='/admin/aluno/lista'>Buscar</a></li>
            </div>

            <li data-toggle="collapse" href="#teacher" role="button" aria-expanded="false" aria-controls="teacher" class="active link-collapse">
                <a><i class="fas fa-chalkboard-teacher"></i><span class="link-name">Docente</span><i fa-angle-right class="fas fa-angle-right"></i></a>
            </li>

            <div class="collapse" id="teacher">
                <li><a href='/admin/professor/cadastro'>Cadastrar</a></li>
                <li><a href='/admin/professor/lista'>Buscar</a></li>
            </div>

            <li><a href="/admin/gestao"><i class="fas fa-boxes"></i><span class="link-name">Gestão geral</span></a></li>

            <li><a href=""><i class="fas fa-cog"></i><span class="link-name">Configurações</span></a></li>


        </ul>

    </nav>

</div>